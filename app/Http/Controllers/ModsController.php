<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\{
    Submission,
    SubmissionLocation,
    SubmissionMod,
    SubmissionReview,
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function save(Request $request, string $submissionId)
    {
        try {
            config(['sqlsvr.connection' => Auth::user()->db_connection]);
            $submission = Submission::find($submissionId);
            $newSubmission = new Submission;
            $newSubmission->submission_id = $submission->submission_id;
            $newSubmission->policy_id = $submission->policy_id;
            $newSubmission->version = intval($submission->version) + 1;
            $newSubmission->business_name = $submission->business_name;
            $newSubmission->insured_name = $submission->insured_name;
            $newSubmission->program_name = $submission->program_name;
            $newSubmission->agency = $submission->agency;
            $newSubmission->agent = $submission->agent;
            $newSubmission->modfactor_id = $submission->modfactor_id;
            $newSubmission->us_state_id = $submission->us_state_id;
            $newSubmission->producer_id = $submission->producer_id;
            $newSubmission->line_of_business = $submission->line_of_business;
            $newSubmission->class_code = $submission->class_code;
            $newSubmission->state = $submission->state;
            $newSubmission->json = $submission->json;
            $newSubmission->issuer = $submission->issuer;
            $newSubmission->expiry = $submission->expiry;
            $newSubmission->scope = $submission->scope;
            $newSubmission->operating_in = $submission->operating_in;
            $newSubmission->created_at = Carbon::now();
            $newSubmission->updated_at = Carbon::now();
            $newSubmission->save();
            $submissionMod = SubmissionMod::where('submissions_id', $submissionId)
                ->first();
            $newSubmissionMod = new SubmissionMod;
            $newSubmissionMod->submissions_id = $newSubmission->id;
            $newSubmissionMod->min = $submissionMod->min;
            $newSubmissionMod->max = $submissionMod->max;
            $newSubmissionMod->management_outcome = $request->input('classification-mod');
            $newSubmissionMod->location_outcome = $request->input('location-mod');
            $newSubmissionMod->building_features_outcome = $request->input('equipment-mod');
            $newSubmissionMod->premises_equipment_outcome = $request->input('premises-mod');
            $newSubmissionMod->employees_outcome = $request->input('employees-mod');
            $newSubmissionMod->protection_outcome = $request->input('cooperation-mod');
            $newSubmissionMod->overall_outcome = $request->input('total-mod');
            $newSubmissionMod->outcome_type_id = $submissionMod->outcome_type_id;
            $newSubmissionMod->comments_in_total = $request->input('total-comm');
            $newSubmissionMod->comments_in_management = $request->input('classification-comm');
            $newSubmissionMod->comments_in_location = $request->input('location-comm');
            $newSubmissionMod->comments_building_features = $request->input('equipment-comm');
            $newSubmissionMod->comments_premises_equipment = $request->input('premises-comm');
            $newSubmissionMod->comments_employees = $request->input('employees-comm');
            $newSubmissionMod->comments_protection = $request->input('cooperation-comm');
            $newSubmissionMod->underwriter_users_id = Auth::user()->id;

            $filenameWithExt = $request->file('signature')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('signature')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . $newSubmission->id . '_' . $newSubmission->version . '.' . $extension;
            $path = $request->file('signature')->storeAs('public/signatures', $fileNameToStore);
            $newSubmissionMod->signature = $fileNameToStore;

            $newSubmissionMod->created_at = Carbon::now();
            $newSubmissionMod->updated_at = Carbon::now();
            $newSubmissionMod->save();

            $submissionReviews = SubmissionReview::where('submissions_id', $submissionId)
                ->get();
            foreach ($submissionReviews as $review) {
                $newSubmissionReviews = new SubmissionReview;
                $newSubmissionReviews->submissions_id = $newSubmission->id;
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
                $newSubmissionLocation->submissions_id = $newSubmission->id;
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
            $redirect = '/submissions/details/' . $newSubmission->id . '?save=1';
        } catch (\Exception $e) {
            dd($e->getMessage());
            $redirect = '/submissions/details/' . $submission->id . '?save=0';
        }

        return redirect($redirect);
    }
}
