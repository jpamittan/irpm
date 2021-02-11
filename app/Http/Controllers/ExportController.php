<?php

namespace App\Http\Controllers;

use Auth, PDF;
use App\Models\{
    Submission,
    SubmissionReview,
    SubmissionMod,
    User
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ExportController extends Controller
{
    public function pdf(string $submissionId)
    {
        config(['sqlsvr.connection' => Auth::user()->db_connection]);
        $view = 'export.cgl';
        $submission = Submission::find($submissionId);
        $submissionMod = SubmissionMod::where('submissions_id', $submissionId)
            ->with('submission')
            ->with('outcomeType')
            ->first();
        $underWriter = User::find($submissionMod->underwriter_users_id);
        $submissionReviews = SubmissionReview::where('submissions_id', $submission->id)
            ->where('question_text', 'NOT LIKE', '%|%')
            ->get();
        $submissionAPILogs = SubmissionReview::where('submissions_id', $submission->id)
            ->where('question_text', 'LIKE', '%|%')
            ->select([
                'question_text',
                'answer_text'
            ])
            ->get();
        if ($submissionMod->submission->line_of_business == 'WRKCMP') {
            $view = 'export.wc';
            if (! $submissionMod->underwriter_users_id) {
                foreach ($submissionAPILogs as $review) {
                    if ($review->question_text == 'Modfactor|Final|Health') {
                        $submissionMod->location_outcome = $review->answer_text;
                    } else if ($review->question_text == 'Modfactor|Final|Premises') {
                        $submissionMod->premises_equipment_outcome = $review->answer_text;
                    } else if ($review->question_text == 'Modfactor|Final|Equipment') {
                        $submissionMod->building_features_outcome = $review->answer_text;
                    } else if ($review->question_text == 'Modfactor|Final|Management') {
                        $submissionMod->management_outcome = $review->answer_text;
                    } else if ($review->question_text == 'Modfactor|Final|Employees') {
                        $submissionMod->employees_outcome = $review->answer_text;
                    } else if ($review->question_text == 'Modfactor|Final|Classification') {
                        $submissionMod->protection_outcome = $review->answer_text;
                    } else if ($review->question_text == 'Modfactor|Final|Organization') {
                        $submissionMod->organization_outcome = $review->answer_text;
                    } else if ($review->question_text == 'Modfactor|Final|Overall') {
                        $submissionMod->overall_outcome = $review->answer_text;
                    }
                }
            }
        }
        $nullAnswers = [];
        $minusOneAnswers = [];
        $zeroAnswers = [];
        $oneAnswers = [];
        $wordAnswers = [];
        foreach ($submissionReviews as $review) {
            if ($review->answer_value == '-1') {
                $minusOneAnswers[] = $review;
            } else if ($review->answer_value == '0') {
                $zeroAnswers[] = $review;
            } else if ($review->answer_value == '1') {
                $oneAnswers[] = $review;
            } else if ($review->answer_value == null) {
                $nullAnswers[] = $review;
            } else {
                $wordAnswers[] = $review;
            }
        }
        usort($wordAnswers, function($a, $b) {
            return strcmp($a->answer_value, $b->answer_value);
        });
        $sortedSubmissionReviews = Arr::collapse([
            $wordAnswers,
            $minusOneAnswers,
            $zeroAnswers,
            $oneAnswers,
            $nullAnswers
        ]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView($view, [
            'submission' => $submission,
            'underWriter' => $underWriter,
            'submissionMod' => $submissionMod,
            'submissionAPILogs' => $submissionAPILogs,
            'submissionReviews' => $sortedSubmissionReviews,
        ]);

        return $pdf->save(storage_path() . '/app/public/' . $submission->submission_id . '-' . $submission->version . '.pdf')
            ->stream($submission->submission_id . '-' . $submission->version . '.pdf');
    }
}
