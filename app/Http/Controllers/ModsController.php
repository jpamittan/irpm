<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Jobs\ModifyModQueue;
use App\Models\{
    Submission,
    SubmissionMod,
    SubmissionReview
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\{
    RedirectResponse,
    Request
};
use Illuminate\Support\Facades\Storage;

class ModsController extends Controller
{
    public function index(string $submissionId): View
    {
        config(['sqlsvr.connection' => Auth::user()->db_connection]);
        $view = 'mods.tgl';
        $submissionMod = SubmissionMod::where('submissions_id', $submissionId)
            ->with('submission')
            ->with('outcomeType')
            ->first();
        // Map Risks to Submission Reviews
        $submissionReviews = SubmissionReview::where('submissions_id', $submissionId)
            ->where('question_text', 'LIKE', '%modfactor|final|%')
            ->get();
        if ($submissionMod->submission->line_of_business == 'WRKCMP') {
            $view = 'mods.wc';
            if (! $submissionMod->underwriter_users_id) {
                foreach ($submissionReviews as $review) {
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

        return view($view, [
            'submissionMod' => $submissionMod,
            'underWriterFname' => Auth::user()->first_name,
            'underWriterLname' => Auth::user()->last_name,
        ]);
    }

    public function save(Request $request, string $submissionId): RedirectResponse
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
            if ($submission->line_of_business == 'WRKCMP') {
                $newSubmissionMod->management_outcome = $request->input('classification-mod');
                $newSubmissionMod->location_outcome = $request->input('location-mod');
                $newSubmissionMod->building_features_outcome = $request->input('equipment-mod');
                $newSubmissionMod->premises_equipment_outcome = $request->input('premises-mod');
                $newSubmissionMod->employees_outcome = $request->input('employees-mod');
                $newSubmissionMod->protection_outcome = $request->input('cooperation-mod');
                $newSubmissionMod->organization_outcome = $request->input('organization-mod');

                $newSubmissionMod->overall_outcome = $request->input('total-mod');

                $newSubmissionMod->outcome_type_id = $submissionMod->outcome_type_id;
                $newSubmissionMod->comments_in_total = $request->input('total-comm');
                $newSubmissionMod->comments_in_management = $request->input('classification-comm');
                $newSubmissionMod->comments_in_location = $request->input('location-comm');
                $newSubmissionMod->comments_building_features = $request->input('equipment-comm');
                $newSubmissionMod->comments_premises_equipment = $request->input('premises-comm');
                $newSubmissionMod->comments_employees = $request->input('employees-comm');
                $newSubmissionMod->comments_protection = $request->input('cooperation-comm');
                $newSubmissionMod->comments_organization = $request->input('organization-comm');
            } else if ($submission->line_of_business == 'CGL') {
                $newSubmissionMod->location_outcome = $request->input('location-mod');
                $newSubmissionMod->premises_equipment_outcome = $request->input('premises-mod');
                $newSubmissionMod->building_features_outcome = $request->input('equipment-mod');
                $newSubmissionMod->management_outcome = $request->input('classification-mod');
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
            }
            $newSubmissionMod->underwriter_users_id = Auth::user()->id;
            if ($request->has('signature')) {
                $filenameWithExt = $request->file('signature')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('signature')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . $newSubmission->id . '_' . $newSubmission->version . '.' . $extension;
                $path = $request->file('signature')->storeAs('public/signatures', $fileNameToStore);
                $newSubmissionMod->signature = $fileNameToStore;
            }
            $newSubmissionMod->created_at = Carbon::now();
            $newSubmissionMod->updated_at = Carbon::now();
            $newSubmissionMod->save();
            $this->dispatch(new ModifyModQueue(
                $submissionId,
                $newSubmission->id
            ));
            $redirect = '/submissions/details/' . $newSubmission->id . '?save=1';
        } catch (\Exception $e) {
            $redirect = '/submissions/details/' . $submission->id . '?save=0';
        }

        return redirect($redirect);
    }
}
