<?php

namespace App\Http\Controllers;

use App\Models\{
    Submission
};
use Illuminate\Http\Request;

class ExcessLiabilityController extends Controller
{
    public function index(Request $Request)
    {
        config(['sqlsvr.connection' => 'sqlsrv_exl']);
        $submission = Submission::where('modfactor_id', 4)
            ->where('line_of_business', 'XSUMB')
            ->latest('created_at')
            ->first();

        return view('lob.el.index', [
            'submission' => $submission
        ]);
    }
}
