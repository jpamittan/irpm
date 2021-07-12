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
        $response = $request->get('Response');
        $response = json_decode($response, true);
        if (isset($_GET['env'])) {
            if ($_GET['env'] == "preprod") {
                config(['sqlsvr.connection' => 'sqlsrv_exl_pre']);
            } else if ($_GET['env'] == "production") {
                config(['sqlsvr.connection' => 'sqlsrv_exl_prd']);
            }
        } else {
            config(['sqlsvr.connection' => 'sqlsrv_exl']);
        }
        $submission = Submission::where('submission_id', $response['submissionId'])
            ->with('latestSubmissionMods')
            ->first();
        $view = 'lob.el.success';
        if ($submission->latestSubmissionMods) {
            if ($submission->latestSubmissionMods->outcome_type_id == 2) {
                // Refer
                $view = 'lob.el.success';
            } else if ($submission->latestSubmissionMods->outcome_type_id == 3) {
                // Decline
                $view = 'lob.el.decline';
            }
        }

        return view($view, [
            'response' => $response,
            'businessName' => $submission->business_name
        ]);
    }
}
