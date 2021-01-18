<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Submission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ModsController extends Controller
{
    public function index(string $submissionId): View
    {
        config(['sqlsvr.connection' => Auth::user()->db_connection]);
        $submission = Submission::find($submissionId);

        return view('mods.index', [
            'submission' => $submission
        ]);
    }
}
