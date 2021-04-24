<?php

namespace App\Http\Controllers;

use Auth, DB;
use App\Models\{
    Agent,
    BrokerAgent,
    BrokerAgentAllStates,
    Submission,
    SubmissionMod
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\{
    RedirectResponse,
    Request
};

class AchController extends Controller
{
    public function index(): View
    {
        return view('ach.index');
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
        $totalRecords = BrokerAgent::count();
        $queryTotalRecordswithFilter = BrokerAgent::whereNotNull('AgentName');
        if ($searchValue) {
            $queryTotalRecordswithFilter = BrokerAgent::where('AgentName', 'like', '%' . $searchValue . '%')
                ->orWhere('NIPR', 'like', '%' . $searchValue . '%')
                ->orWhere('FEIN', 'like', '%' . $searchValue . '%');
        }
        $totalRecordswithFilter = $queryTotalRecordswithFilter->count();
        $queryRecords = BrokerAgent::orderBy($columnName, $columnSortOrder)
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
                'routing_number' => "",
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

    public function details(string $entityId): View
    {
        $brokerAgent = BrokerAgent::where('EntityId', $entityId)
            ->with('allStates')
            ->with('contacts')
            ->first();
        $ach = DB::connection('sqlsrv_ach')
            ->select("
                EXEC dbo.[usp_DataDecrypt] @table = 'Agents',
                    @whereclause = '[AgentKey] = ''{$brokerAgent->EntityId}'' AND [AgentName] = ''{$brokerAgent->AgentName}'''
            ");
        $AgentRoutingNumber = ($ach[0]->AgentRoutingNumber) ? "******" . substr($ach[0]->AgentRoutingNumber, -3) : "N/A";
        $AccountNumber = ($ach[0]->AccountNumber) ? "******" . substr($ach[0]->AccountNumber, -3) : "N/A";

        return view('ach.details', [
            'brokerAgent' => $brokerAgent,
            'AgentRoutingNumber' => $AgentRoutingNumber,
            'AccountNumber' => $AccountNumber
        ]);
    }

    public function update(string $entityId, Request $request): RedirectResponse
    {
        $agent = Agent::where('AgentKey', $entityId)
            ->first();
        $user = Auth::user()->full_name;
        if (!$agent) {
            $agent = new Agent;
            $agent->AgentKey = $entityId;
            $agent->AgentName = $request->get('agent_name');
            $agent->CreatedBy = $user;
            $agent->save();
        }
        $result = DB::connection('sqlsrv_ach')
            ->statement("
                EXEC dbo.[usp_UpdateEncryptedTable] 
                @table = 'Agents',
                @UpdateFilter = '[AgentKey] = ''{$entityId}'' AND [AgentName] = ''{$request->get('agent_name')}''',
                @UpdateColumn = '[AgentRoutingNumber] = ''{$request->get('routing_number')}'' AND [AccountNumber] = ''{$request->get('account_number')}'' AND [ModifiedBy] = ''{$user}'''
            ");
        
        return redirect(
            route('ach.details', [
                'entityId' => $entityId,
                'save' => $result
            ])
        );
    }
}
