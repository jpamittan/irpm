<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ModsController extends Controller
{
    public function index(Submission $submission): View
    {
        return view('mods.index', [
            'submission' => $submission
        ]);
    }
}
