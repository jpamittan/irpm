<?php

namespace App\Http\Controllers;

use Auth, DB;
use App\Models\{
    Submission,
    SubmissionMod
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        config(['sqlsvr.connection' => Auth::user()->db_connection]);
        $latestSubmissions = Submission::groupBy('submission_id')
            ->select([
                'submission_id',
                DB::raw('MAX(id) as id'),
                DB::raw('MAX(version) as latest_version')
            ]);
        $submissionMod = SubmissionMod::groupBy('outcome_type_id')
            ->where('outcome_type_id', '!=', null)
            ->orderBy('outcome_type_id', 'DESC')
            ->select([
                'submission_mods.outcome_type_id',
                DB::raw('COUNT(submission_mods.outcome_type_id) as outcome_type_count')
            ])
            ->rightJoinSub($latestSubmissions, 'sb', function ($query) {
                $query->on('submission_mods.submissions_id', '=', 'sb.id');
            })
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
            'connection' => Auth::user()->db_connection,
            'quoteCount' => $quoteCount,
            'referCount' => $referCount,
            'declineCount' => $declineCount
        ]);
    }
}
