<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\SubmissionMod;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ModsController extends Controller
{
    public function index(string $submissionId): View
    {
        config(['sqlsvr.connection' => Auth::user()->db_connection]);
        $submissionMod = SubmissionMod::where('submissions_id', $submissionId)
            ->with('submission')
            ->with('outcomeType')
            ->first();

        return view('mods.index', [
            'submissionMod' => $submissionMod,
            'underWriterFname' => Auth::user()->first_name,
            'underWriterLname' => Auth::user()->last_name,
        ]);
    }
}
