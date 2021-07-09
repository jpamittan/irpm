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
        dd($request->all());

        config(['sqlsvr.connection' => 'sqlsrv_exl']);

        $submission = Submission::with('latestSubmissionMods')
            ->where('line_of_business', 'XSUMB')    
            ->whereNotNull('modfactor_id')
            ->latest('created_at')
            ->first();

        $view = ($submission->latestSubmissionMods->outcome_type_id == "3") 
            ? 'lob.el.decline'
            : 'lob.el.success';

        return view($view, [
            'submission' => $submission
        ]);
    }
}
