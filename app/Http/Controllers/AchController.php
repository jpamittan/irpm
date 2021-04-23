<?php

namespace App\Http\Controllers;

use Auth, DB;
use App\Models\{
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
}
