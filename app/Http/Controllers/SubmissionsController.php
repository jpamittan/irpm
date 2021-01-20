<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\{
    Submission,
    SubmissionReview
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubmissionsController extends Controller
{
    public function index(): View
    {
        return view('submissions.index');
    }

    public function datatables(Request $request)
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
        $totalRecords = Submission::select('count(*) as allcount')
            ->whereNotNull('modfactor_id')
            ->count();
        $totalRecordswithFilter = Submission::select('count(*) as allcount')
            ->where('submission_id', 'like', '%' . $searchValue . '%')
            ->orWhere('business_name', 'like', '%' . $searchValue . '%')
            ->orWhere('agent', 'like', '%' . $searchValue . '%')
            ->whereNotNull('modfactor_id')
            ->count();
        if ($columnName == 'description') {
            $columnName = 'outcome_type.' . $columnName;
        } else {
            $columnName = 'submissions.' . $columnName;
        }
        $records = Submission::orderBy($columnName, $columnSortOrder)
            ->where('submissions.submission_id', 'like', '%' . $searchValue . '%')
            ->orWhere('submissions.business_name', 'like', '%' . $searchValue . '%')
            ->orWhere('submissions.agent', 'like', '%' . $searchValue . '%')
            ->whereNotNull('submissions.modfactor_id')
            ->leftJoin('submission_mods', 'submission_mods.submissions_id', '=', 'submissions.id')
            ->leftJoin('outcome_type', 'outcome_type.id', '=', 'submission_mods.outcome_type_id')
            ->select([
                'submissions.id',
                'submissions.submission_id',
                'submissions.version',
                'submissions.business_name',
                'submissions.agent',
                'outcome_type.description',
                'submissions.created_at'
            ])
            ->skip($start)
            ->take($rowperpage)
            ->get();
        $data_arr = array();
        foreach ($records as $record) {
            $data_arr[] = array(
                'id' => $record->id,
                'submission_id' => $record->submission_id,
                'version' => $record->version,
                'business_name' => $record->business_name,
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

        return view('submissions.details', [
            'submission' => $submission,
            'submissionReviews' => $submissionReviews,
        ]);
    }
}
