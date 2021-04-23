<?php

namespace App\Http\Controllers;

use Auth, DB;
use App\Models\{
    Agent,
    Submission,
    SubmissionMod
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AchController extends Controller
{
    public function index(): View
    {
        config(['sqlsvr.connection' => Auth::user()->db_connection]);
        
        return view('ach.index', [
            
        ]);
    }

    public function datatables(Request $request): string
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['name'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];
        $totalRecords = Agent::count();
        $queryTotalRecordswithFilter = Agent::whereNotNull('AgentName');
        if ($searchValue) {
            $queryTotalRecordswithFilter = Agent::where('AgentName', 'like', '%' . $searchValue . '%')
                ->orWhere('NIPR', 'like', '%' . $searchValue . '%')
                ->orWhere('FEIN', 'like', '%' . $searchValue . '%');
        }
        $totalRecordswithFilter = $queryTotalRecordswithFilter->count();
        $queryRecords = Agent::orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage);
        if ($searchValue) {
            $queryRecords->where('AgentName', 'like', '%' . $searchValue . '%')
                ->orWhere('NIPR', 'like', '%' . $searchValue . '%')
                ->orWhere('FEIN', 'like', '%' . $searchValue . '%');
        }
        $records = $queryRecords->get();
        $data_arr = array();
        foreach ($records as $record) {
            $data_arr[] = array(
                'id' => $record->EntityId,
                'agent_name' => $record->AgentName,
                'nipr' => $record->NIPR,
                'fein' => $record->FEIN,
                'agent_routing_number' => "",
                'account_number' => "",
                'modified_by' => "",
                'modified_at' => ""
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

    public function details(string $entityId)
    {
        dd($entityId);
    }
}
