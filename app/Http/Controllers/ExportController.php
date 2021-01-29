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
        $sortedSubmissionReviews = Arr::collapse([
            $wordAnswers,
            $minusOneAnswers,
            $zeroAnswers,
            $oneAnswers,
            $nullAnswers
        ]);

        $pdf = PDF::loadView('export.pdf', [
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
