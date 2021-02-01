<?php

namespace App\Http\Service;

use Carbon\Carbon;
use App\Models\{
    SubmissionLocation,
    SubmissionReview
};

class ModifyModService
{
    public function run(string $submissionId, string $newSubmissionId): void
    {
        $submissionReviews = SubmissionReview::where('submissions_id', $submissionId)
            ->get();
        foreach ($submissionReviews as $review) {
            $newSubmissionReviews = new SubmissionReview;
            $newSubmissionReviews->submissions_id = $newSubmissionId;
            $newSubmissionReviews->question_id = $review->question_id;
            $newSubmissionReviews->question_text = $review->question_text;
            $newSubmissionReviews->answer_text = $review->answer_text;
            $newSubmissionReviews->answer_value = $review->answer_value;
            $newSubmissionReviews->created_at = Carbon::now();
            $newSubmissionReviews->save();
        }
        $submissionLocations = SubmissionLocation::where('submissions_id', $submissionId)
            ->get();
        foreach ($submissionLocations as $location) {
            $newSubmissionLocation = new SubmissionLocation;
            $newSubmissionLocation->submissions_id = $newSubmissionId;
            $newSubmissionLocation->location_number = $review->location_number;
            $newSubmissionLocation->highest_floor = $review->highest_floor;
            $newSubmissionLocation->address_line_01 = $review->address_line_01;
            $newSubmissionLocation->address_line_02 = $review->address_line_02;
            $newSubmissionLocation->city = $review->city;
            $newSubmissionLocation->state = $review->state;
            $newSubmissionLocation->zip = $review->zip;
            $newSubmissionLocation->county = $review->county;
            $newSubmissionLocation->payroll = $review->payroll;
            $newSubmissionLocation->include_terrorism_tria_cover = $review->include_terrorism_tria_cover;
            $newSubmissionLocation->exclude_nbcr_terrorism = $review->exclude_nbcr_terrorism;
            $newSubmissionLocation->created_at = Carbon::now();
            $newSubmissionLocation->save();
        }
    }
}