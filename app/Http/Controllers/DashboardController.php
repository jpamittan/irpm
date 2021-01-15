<?php

namespace App\Http\Controllers;

use DB;
use App\Models\SubmissionMod;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        $submissionMod = SubmissionMod::groupBy('outcome_type_id')
            ->where('outcome_type_id', '!=', null)
            ->select([
                'outcome_type_id',
                DB::raw('count(*) as outcome_type_count')
            ])
            ->get();
        $quoteCount = 0;
        $referCount = 0;
        $declineCount = 0;
        foreach ($submissionMod as $mod) {
            if ($mod->outcome_type_id == 1) {
                $quoteCount = $mod->outcome_type_count;
            } else if ($mod->outcome_type_id == 2) {
                $referCount = $mod->outcome_type_count;
            } else if ($mod->outcome_type_id == 3) {
                $declineCount = $mod->outcome_type_count;
            }
        }

        return view('index', [
            'quoteCount' => $quoteCount,
            'referCount' => $referCount,
            'declineCount' => $declineCount,
        ]);
    }
}
