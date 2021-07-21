<?php

namespace App\Http\Controllers;

use Auth, DB;
use App\Models\{
    Attachment,
    Submission,
    SubmissionReview,
    User
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\{
    RedirectResponse,
    Request
};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SubmissionsController extends Controller
{
    protected $allUsers = null;

    public function index(): View
    {
        session(['filterOutcomeTypeID' => null]);

        return view('submissions.index');
    }

    public function filter(int $outcomeTypeId): View
    {
        session(['filterOutcomeTypeID' => $outcomeTypeId]);

        return view('submissions.index');
    }

    public function datatables(Request $request): string
    {
        config(['sqlsvr.connection' => Auth::user()->db_connection]);
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];
        $queryTotalRecords = Submission::whereRaw('submissions.business_name IS NOT NULL')
            ->leftJoin('submission_mods', 'submission_mods.submissions_id', '=', 'submissions.id')
            ->leftJoin('outcome_type', 'outcome_type.id', '=', 'submission_mods.outcome_type_id');
        if (session('filterOutcomeTypeID')) {
            $queryTotalRecords->where('submission_mods.outcome_type_id', '=', session('filterOutcomeTypeID'));
        }
        $totalRecords = $queryTotalRecords->count();
        $queryTotalRecordswithFilter = Submission::whereNotNull('submissions.business_name')
            ->leftJoin('submission_mods', 'submission_mods.submissions_id', '=', 'submissions.id')
            ->leftJoin('outcome_type', 'outcome_type.id', '=', 'submission_mods.outcome_type_id');
        if ($searchValue) {
            $queryTotalRecordswithFilter->where('submissions.submission_id', 'like', '%' . $searchValue . '%')
                ->orWhere('submissions.business_name', 'like', '%' . $searchValue . '%')
                ->orWhere('submissions.agent', 'like', '%' . $searchValue . '%')
                ->orWhere('outcome_type.description', 'like', '%' . $searchValue . '%');
        }
        if (session('filterOutcomeTypeID')) {
            $queryTotalRecordswithFilter->where('submission_mods.outcome_type_id', '=', session('filterOutcomeTypeID'));
        }
        $totalRecordswithFilter = $queryTotalRecordswithFilter->count();
        if ($columnName == 'description') {
            $columnName = 'outcome_type.' . $columnName;
        } else {
            $columnName = 'submissions.' . $columnName;
        }
        $queryRecords = Submission::orderBy($columnName, $columnSortOrder)
            ->whereNotNull('submissions.business_name')
            ->leftJoin('submission_mods', 'submission_mods.submissions_id', '=', 'submissions.id')
            ->leftJoin('outcome_type', 'outcome_type.id', '=', 'submission_mods.outcome_type_id')
            ->select([
                'submissions.id',
                'submissions.submission_id',
                'submissions.version',
                'submissions.business_name',
                'submissions.line_of_business',
                'submissions.agent',
                'submission_mods.underwriter_users_id',
                'outcome_type.description',
                'submissions.created_at'
            ])
            ->distinct()
            ->skip($start)
            ->take($rowperpage);
        if ($searchValue) {
            $queryRecords->where('submissions.submission_id', 'like', '%' . $searchValue . '%')
                ->orWhere('submissions.business_name', 'like', '%' . $searchValue . '%')
                ->orWhere('submissions.agent', 'like', '%' . $searchValue . '%')
                ->orWhere('outcome_type.description', 'like', '%' . $searchValue . '%');
        }
        if (session('filterOutcomeTypeID')) {
            $queryRecords->where('submission_mods.outcome_type_id', '=', session('filterOutcomeTypeID'));
        }
        $records = $queryRecords->get();
        $data_arr = array();

        $this->allUsers = User::all();

        foreach ($records as $record) {
            $data_arr[] = array(
                'id' => $record->id,
                'submission_id' => $record->submission_id,
                'version' => $record->version,
                'business_name' => $record->business_name,
                'line_of_business' => $record->line_of_business,
                'agent' => ($record->underwriter_users_id) 
                    ? $this->getUsername($record->underwriter_users_id) 
                    : $record->agent,
                'description' => $record->description,
                'created_at' => $record->created_at
            );
        }
        $response = array(
            'draw' => intval($draw),
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecordswithFilter,
            'aaData' => $data_arr
        );

        echo json_encode($response);
        exit;
    }

    protected function getUsername(int $userId): ?string
    {
        foreach ($this->allUsers as $user) {
            if ($user->id == $userId) {
                return $user->fullname;
            }
        }

        return null;
    }

    public function details(string $submissionId): View
    {
        config(['sqlsvr.connection' => Auth::user()->db_connection]);
        $submission = Submission::find($submissionId);
        $operatingInArr = json_decode($submission->operating_in);
        sort($operatingInArr);
        $concatStates = "";
        foreach ($operatingInArr as $operatingIn) {
            $concatStates .= $operatingIn . ', ';
        }
        $submission->operating_in = rtrim($concatStates, ", ");
        $submissionReviews = SubmissionReview::where('submissions_id', $submission->id)
            ->where('question_text', 'NOT LIKE', '%|%')
            ->select([
                'question_id',
                'question_text',
                'answer_value',
                'answer_text'
            ])
            ->get();
        $submissionAPILogs = SubmissionReview::where('submissions_id', $submission->id)
            ->where('question_text', 'LIKE', '%|%')
            ->where('question_text', 'NOT LIKE', '%API|Performance%')
            ->select([
                'question_text',
                'answer_value',
                'answer_text'
            ])
            ->get();
        $ONEviewContextToken = null;
        $totalScore = null;
        $averageScore = null;
        $hasAPIScores = false;
        foreach ($submissionAPILogs as $log) {
            if ($log->question_text == "API|Finalize Quote Token") {
                $ONEviewContextToken = $log->answer_text;
            }
            if ($log->question_text == "Modfactor|Final|Score|Total") {   
                $totalScore = $log->answer_text;
            }
            if ($log->question_text == "Modfactor|Final|Score|Average") {
                $averageScore = $log->answer_text;
            }
            if ($log->answer_value != "" && $log->answer_value != null) {
                $hasAPIScores = true;
            }
        }
        $nullAnswers = [];
        $minusOneAnswers = [];
        $zeroAnswers = [];
        $oneAnswers = [];
        $wordAnswers = [];
        foreach ($submissionReviews as $review) {
            if ($review->answer_value == '-1') {
                $minusOneAnswers[] = $review;
            } else if ($review->answer_value == '0') {
                $zeroAnswers[] = $review;
            } else if ($review->answer_value == '1') {
                $oneAnswers[] = $review;
            } else if ($review->answer_value == null) {
                $nullAnswers[] = $review;
            } else {
                $wordAnswers[] = $review;
            }
        }
        usort($wordAnswers, function($a, $b) {
            return strcmp($a->answer_value, $b->answer_value);
        });
        $sortedSubmissionReviews = Arr::collapse([
            $wordAnswers,
            $minusOneAnswers,
            $zeroAnswers,
            $oneAnswers,
            $nullAnswers
        ]);
        $attachments = Attachment::where('version', $submission->version)
            ->where('line_of_business', $submission->line_of_business)
            ->where('submission_id', $submission->submission_id)
            ->get();
        if (Auth::user()->db_connection == "sqlsrv_exl_prd") {
            $url = "https://products.synchronosure.com/el/api/api/attachment/list?submissionId=" . $submission->submission_id;
        } else if (Auth::user()->db_connection == "sqlsrv_exl_pre") {
            $url = "https://preprod-el.synchronosure.com/api/api/attachment/list?submissionId=" . $submission->submission_id;
        } else {
            $url = "https://uat-el.synchronosure.com/api/api/attachment/list?submissionId=" . $submission->submission_id;
        }
        $response = Http::post($url);
        $filteredAccordAttachments = array_filter(
            json_decode($response->body(), true) ?? [], 
            function ($attachment) use ($submission) {
                return $attachment['version'] == $submission->version;
            }
        );

        return view('submissions.details', [
            'attachments' => $attachments,
            'lob' => Auth::user()->db_connection,
            'submission' => $submission,
            'submissionAPILogs' => $submissionAPILogs,
            'submissionReviews' => $sortedSubmissionReviews,
            'ONEviewContextToken' => $ONEviewContextToken,
            'totalScore' => $totalScore,
            'averageScore' => $averageScore,
            'filteredAccordAttachments' => $filteredAccordAttachments,
            'hasAPIScores' => $hasAPIScores
        ]);
    }

    public function upload(string $lob, string $id, int $submissionId, int $version, Request $request): RedirectResponse
    {
        $file = $request->file('attachment');
        $path = "/" . $lob . "/" . $submissionId . "/" . $version;
        $file_name = str_replace(" ", "_", $file->getClientOriginalName());
        $storage = Storage::disk('public')->putFileAs($path, $file, $file_name);
        $attachment = new Attachment;
        $attachment->submission_id = $submissionId;
        $attachment->version = $version;
        $attachment->line_of_business = $lob;
        $attachment->path = $storage;
        $attachment->url = env('APP_URL') . '/storage/' . $storage;
        $attachment->file_name = $file_name;
        $attachment->file_ext = $file->getClientOriginalExtension();
        $attachment->file_size = $file->getSize();
        $attachment->size_unit = "bytes";
        $attachment->uploaded_by = Auth::user()->full_name;
        $attachment->save();

        return redirect(
            route('submissions.details', [
                'submissionId' => $id
            ])
        );
    }
}
