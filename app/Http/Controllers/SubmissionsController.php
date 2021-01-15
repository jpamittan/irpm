<?php

namespace App\Http\Controllers;

use App\Models\Submission;
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
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Submission::select('count(*) as allcount')
            ->whereNotNull('modfactor_id')
            ->count();
        $totalRecordswithFilter = Submission::select('count(*) as allcount')
            ->where('submission_id', 'like', '%' . $searchValue . '%')
            ->orWhere('business_name', 'like', '%' . $searchValue . '%')
            ->orWhere('agent', 'like', '%' . $searchValue . '%')
            ->whereNotNull('modfactor_id')
            ->count();

        // Fetch records
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

    public function details(Submission $submission): View
    {
        dd($submission);

        return view('submissions.details');
    }
}
