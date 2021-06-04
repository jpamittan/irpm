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
use Carbon\Carbon;
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
        config(['sqlsvr.ach' => Auth::user()->ach_connection]);
        config(['sqlsvr.codeeast' => Auth::user()->codeeast_connection]);
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

        $achTable = null;
        $codeeastTable = null;
        if (Auth::user()->ach_connection == "sqlsrv_ach_uat") {
            $achTable = "ACH_UAT";
        } else {
            $achTable = "ACH";
        }
        if (Auth::user()->codeeast_connection == "sqlsrv_codeeast_uat") {
            $codeeastTable = "CodeEast_UAT";
        } else {
            $codeeastTable = "CodeEast";
        }

        if ($searchValue) {
            $queryTotalRecordswithFilter = BrokerAgent::where($codeeastTable . '.dbo.Meta_BrokerAgent.AgentName', 'like', '%' . $searchValue . '%')
                ->orWhere($codeeastTable . '.dbo.Meta_BrokerAgent.NIPR', 'like', '%' . $searchValue . '%')
                ->orWhere($codeeastTable . '.dbo.Meta_BrokerAgent.FEIN', 'like', '%' . $searchValue . '%');
        }
        if (in_array($columnName, ['AgentRoutingNumber', 'AccountNumber', 'ModifiedBy', 'DateTimeModified'])) {
            $columnName = $achTable . '.dbo.Agents.' . $columnName;
        } else {
            $columnName = $codeeastTable . '.dbo.Meta_BrokerAgent.' . $columnName;
        }
        $totalRecordswithFilter = $queryTotalRecordswithFilter->count();
        $queryRecords = BrokerAgent::orderBy($columnName, $columnSortOrder)
            ->leftJoin($achTable . '.dbo.Agents', $achTable . '.dbo.Agents.AgentKey', '=', $codeeastTable . '.dbo.Meta_BrokerAgent.EntityId')
            ->select([
                $codeeastTable . '.dbo.Meta_BrokerAgent.EntityId',
                $codeeastTable . '.dbo.Meta_BrokerAgent.AgentName',
                $codeeastTable . '.dbo.Meta_BrokerAgent.NIPR',
                $codeeastTable . '.dbo.Meta_BrokerAgent.FEIN',
                $achTable . '.dbo.Agents.AgentRoutingNumber',
                $achTable . '.dbo.Agents.AccountNumber',
                $achTable . '.dbo.Agents.ModifiedBy',
                $achTable . '.dbo.Agents.DateTimeModified'
            ])
            ->skip($start)
            ->take($rowperpage);
        if ($searchValue) {
            $queryRecords->where('CodeEast.dbo.Meta_BrokerAgent.AgentName', 'like', '%' . $searchValue . '%')
                ->orWhere('CodeEast.dbo.Meta_BrokerAgent.NIPR', 'like', '%' . $searchValue . '%')
                ->orWhere('CodeEast.dbo.Meta_BrokerAgent.FEIN', 'like', '%' . $searchValue . '%');
        }
        $records = $queryRecords->get();
        $data_arr = array();
        foreach ($records as $record) {
            $data_arr[] = array(
                'id' => $record->EntityId,
                'agent_name' => $record->AgentName,
                'nipr' => $record->NIPR,
                'fein' => $record->FEIN,
                'routing_number' => ($record->AgentRoutingNumber) ? true : false,
                'account_number' => ($record->AccountNumber) ? true : false,
                'modified_by' => $record->ModifiedBy,
                'modified_at' => $record->DateTimeModified,
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
        config(['sqlsvr.ach' => Auth::user()->ach_connection]);
        config(['sqlsvr.codeeast' => Auth::user()->codeeast_connection]);
        $brokerAgent = BrokerAgent::where('EntityId', $entityId)
            ->with('allStates')
            ->with('contacts')
            ->first();
        $ach = DB::connection(Auth::user()->ach_connection)
            ->select("
                EXEC dbo.[usp_DataDecrypt] @table = 'Agents',
                    @whereclause = '[AgentKey] = ''{$brokerAgent->EntityId}'' AND [AgentName] = ''{$brokerAgent->AgentName}'''
            ");
        $achDetails = Agent::where('AgentKey', $entityId)
            ->first();
        $AgentRoutingNumber = ($ach[0]->AgentRoutingNumber) ? "******" . substr($ach[0]->AgentRoutingNumber, -3) : "N/A";
        $AccountNumber = ($ach[0]->AccountNumber) ? "******" . substr($ach[0]->AccountNumber, -3) : "N/A";

        return view('ach.details', [
            'AgentRoutingNumber' => $AgentRoutingNumber,
            'AccountNumber' => $AccountNumber,
            'achDetails' => $achDetails,
            'brokerAgent' => $brokerAgent
        ]);
    }

    public function update(string $entityId, Request $request): RedirectResponse
    {
        config(['sqlsvr.ach' => Auth::user()->ach_connection]);
        config(['sqlsvr.codeeast' => Auth::user()->codeeast_connection]);
        $agent = Agent::where('AgentKey', $entityId)
            ->first();
        $user = Auth::user()->full_name;
        $now = Carbon::now();
        if (!$agent) {
            $agent = new Agent;
            $agent->AgentKey = $entityId;
            $agent->AgentName = $request->get('agent_name');
            $agent->CreatedBy = $user;
            $agent->save();
        }
        $agent->BankName = $request->get('bank_name');
        $agent->AccountType = $request->get('type_of_account');
        $agent->BankStreetAddressLine1 = $request->get('address_line_1');
        $agent->BankStreetAddressLine2 = $request->get('address_line_2');
        $agent->BankCity = $request->get('address_city');
        $agent->BankState = $request->get('address_state');
        $agent->BankZIP = $request->get('address_zip');
        $agent->save();
        $agentName = mysql_real_escape_string($request->get('agent_name'));
        $result = DB::connection(Auth::user()->ach_connection)
            ->statement("
                EXEC dbo.[usp_UpdateEncryptedTable] 
                @table = 'Agents',
                @UpdateFilter = '[AgentKey] = ''{$entityId}'' AND [AgentName] = ''{$agentName}''',
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
