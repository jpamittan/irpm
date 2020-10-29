<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubmissionsController extends Controller
{
    public function index(): View
    {
        return view('submissions.index');
    }

    public function details(): View
    {
        return view('submissions.details');
    }
}
