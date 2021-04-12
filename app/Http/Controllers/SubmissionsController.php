<?php

namespace App\Http\Controllers;

use Auth, DB;
use App\Models\{
    Submission,
    SubmissionReview
};
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class SubmissionsController extends Controller
{
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
            ->rightJoin('submission_mods', 'submission_mods.submissions_id', '=', 'submissions.id')
            ->rightJoin('outcome_type', 'outcome_type.id', '=', 'submission_mods.outcome_type_id');
        if (session('filterOutcomeTypeID')) {
            $queryTotalRecords->where('submission_mods.outcome_type_id', '=', session('filterOutcomeTypeID'));
        }
        $totalRecords = $queryTotalRecords->count();
        $queryTotalRecordswithFilter = Submission::whereNotNull('submissions.business_name')
            ->rightJoin('submission_mods', 'submission_mods.submissions_id', '=', 'submissions.id')
            ->rightJoin('outcome_type', 'outcome_type.id', '=', 'submission_mods.outcome_type_id');
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
            ->rightJoin('submission_mods', 'submission_mods.submissions_id', '=', 'submissions.id')
            ->rightJoin('outcome_type', 'outcome_type.id', '=', 'submission_mods.outcome_type_id')
            ->select([
                'submissions.id',
                'submissions.submission_id',
                'submissions.version',
                'submissions.business_name',
                'submissions.line_of_business',
                'submissions.agent',
                'outcome_type.description',
                'submissions.created_at'
            ])
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
        foreach ($records as $record) {
            $data_arr[] = array(
                'id' => $record->id,
                'submission_id' => $record->submission_id,
                'version' => $record->version,
                'business_name' => $record->business_name,
                'line_of_business' => $record->line_of_business,
                'agent' => $record->agent,
                'description' => $record->description,
                'created_at' => $record->created_at
            );
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
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
            ->get();
        $submissionAPILogs = SubmissionReview::where('submissions_id', $submission->id)
            ->where('question_text', 'LIKE', '%|%')
            ->select([
                'question_text',
                'answer_text'
            ])
            ->get();
        $ONEviewContextToken = null;
        foreach ($submissionAPILogs as $log) {
            if ($log->question_text == "API|Finalize Quote Token") {
                $ONEviewContextToken = $log->answer_text;
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

        return view('submissions.details', [
            'submission' => $submission,
            'submissionAPILogs' => $submissionAPILogs,
            'submissionReviews' => $sortedSubmissionReviews,
            'lob' => Auth::user()->db_connection,
            'ONEviewContextToken' => $ONEviewContextToken
        ]);
    }

    public function upload(string $lob, int $submissionId, int $version, Request $request): View
    {
        $attachment = $request->file('attachment');
        $path = "/" . $lob . "/" . $submissionId . "/" . $version;
        $file_name = str_replace(" ", "_", $attachment->getClientOriginalName());
        $storage = Storage::disk('public')->putFileAs($path, $attachment, $file_name);
        dd([
            'lob' => $lob,
            'submissionId' => $submissionId,
            'version' => $version,
            'path' => $storage,
            'url' => env('APP_URL') . '/storage/' . $storage,
            'file_name' => $file_name,
            'file_ext' => $attachment->getClientOriginalExtension(),
            'file_size' => $attachment->getSize(),
            'size_unit' => "bytes",
            'uploaded_by' => Auth::user()->full_name,
            'created_at' => Carbon::now()
        ]);
    }
}
