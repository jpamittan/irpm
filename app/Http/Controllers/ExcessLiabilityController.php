<?php

namespace App\Http\Controllers;

use App\Models\{
    Submission
};
use Illuminate\Http\Request;

class ExcessLiabilityController extends Controller
{
    public function index(Request $request)
    {
        if (isset($_GET['env'])) {
            if ($_GET['env'] == "preprod") {
                config(['sqlsvr.connection' => 'sqlsrv_exl_pre']);
            } else if ($_GET['env'] == "production") {
                config(['sqlsvr.connection' => 'sqlsrv_exl_prd']);
            }
        } else {
            config(['sqlsvr.connection' => 'sqlsrv_exl']);
        }
        $response = $request->get('Response');
        $response = json_decode($response, true);
        $view = ($response['action'] == "Refer" || $response['action'] == "Quote") 
            ? 'lob.el.success'
            : 'lob.el.decline';
        $submission = Submission::where('submission_id', $response['submissionId'])
            ->first();

        return view($view, [
            'response' => $response,
            'businessName' => $submission->business_name
        ]);
    }
}
