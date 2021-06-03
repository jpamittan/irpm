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
        $gradientAI = [];
        $uwEngine = [];
        $ncci = null;
        $view = 'mods.tgl';
        $submissionMod = SubmissionMod::where('submissions_id', $submissionId)
            ->with('submission')
            ->with('outcomeType')
            ->first();
        // Map Risks to Submission Reviews
        if ($submissionMod->submission->line_of_business == 'WRKCMP') {
            // WC
            $view = 'mods.wc';
            $submissionReviews = SubmissionReview::where('submissions_id', $submissionId)
                ->where(function($query) {
                    $query->where('question_text', 'LIKE', 'Modfactor|Matched|%')
                        ->orwhere('question_text', 'LIKE', 'API|Gradient AI|Modfactor|%')
                        ->orWhere('question_text', 'API|ISO Small Business|Address.State');
                })
                ->get();
            foreach ($submissionReviews as $review) {
                if ($review->question_text == 'Modfactor|Matched|Premises') {
                    $uwEngine['premises'] = $review->answer_text;
                } else if ($review->question_text == 'Modfactor|Matched|Classification') {
                    $uwEngine['classification'] = $review->answer_text;
                } else if ($review->question_text == 'Modfactor|Matched|Health') {
                    $uwEngine['health'] = $review->answer_text;
                } else if ($review->question_text == 'Modfactor|Matched|Equipment') {
                    $uwEngine['equipment'] = $review->answer_text;
                } else if ($review->question_text == 'Modfactor|Matched|Employees') {
                    $uwEngine['employees'] = $review->answer_text;
                } else if ($review->question_text == 'Modfactor|Matched|Management') {
                    $uwEngine['management'] = $review->answer_text;
                } else if ($review->question_text == 'Modfactor|Matched|Organization') {
                    $uwEngine['organization'] = $review->answer_text;
                } else if ($review->question_text == 'Modfactor|Matched|Overall') {
                    $uwEngine['overall'] = $review->answer_text;
                } else if ($review->question_text == 'API|Gradient AI|Modfactor|Premises') {
                    $gradientAI['premises'] = $review->answer_text;
                } else if ($review->question_text == 'API|Gradient AI|Modfactor|Classification') {
                    $gradientAI['classification'] = $review->answer_text;
                } else if ($review->question_text == 'API|Gradient AI|Modfactor|Health') {
                    $gradientAI['health'] = $review->answer_text;
                } else if ($review->question_text == 'API|Gradient AI|Modfactor|Equipment') {
                    $gradientAI['equipment'] = $review->answer_text;
                } else if ($review->question_text == 'API|Gradient AI|Modfactor|Employees') {
                    $gradientAI['employees'] = $review->answer_text;
                } else if ($review->question_text == 'API|Gradient AI|Modfactor|Management') {
                    $gradientAI['management'] = $review->answer_text;
                } else if ($review->question_text == 'API|Gradient AI|Modfactor|Organization') {
                    $gradientAI['organization'] = $review->answer_text;
                } else if ($review->question_text == 'API|Gradient AI|Modfactor|Overall') {
                    $gradientAI['overall'] = $review->answer_text;
                } else if ($review->question_text == 'API|ISO Small Business|Address.State') {
                    $ncci = config('ncci.' . $review->answer_text);
                }
            }
        } else {
            // TGL
            $submissionReviews = SubmissionReview::where('submissions_id', $submissionId)
                ->where('question_text', 'LIKE', '%modfactor|final|%')
                ->get();
        }

        return view($view, [
            'submissionMod' => $submissionMod,
            'underWriterFname' => Auth::user()->first_name,
            'underWriterLname' => Auth::user()->last_name,
            'gradientAI' => $gradientAI,
            'uwEngine' => $uwEngine,
            'ncci' => $ncci
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
                $newSubmissionMod->premises_outcome = $request->input('premises-mod');
                $newSubmissionMod->classification_outcome = $request->input('classification-mod');
                $newSubmissionMod->health_outcome = $request->input('health-mod');
                $newSubmissionMod->equipment_outcome = $request->input('equipment-mod');
                $newSubmissionMod->employees_outcome = $request->input('employees-mod');
                $newSubmissionMod->management_outcome = $request->input('management-mod');
                $newSubmissionMod->organization_outcome = $request->input('organization-mod');

                $newSubmissionMod->overall_outcome = $request->input('total-mod');
                $newSubmissionMod->outcome_type_id = $submissionMod->outcome_type_id;

                $newSubmissionMod->comments_in_total = $request->input('total-comm');
                $newSubmissionMod->comments_in_premises = $request->input('premises-comm');
                $newSubmissionMod->comments_in_classification = $request->input('classification-comm');
                $newSubmissionMod->comments_in_health = $request->input('health-comm');
                $newSubmissionMod->comments_in_equipment = $request->input('equipment-comm');
                $newSubmissionMod->comments_employees = $request->input('employees-comm');
                $newSubmissionMod->comments_in_management = $request->input('management-comm');
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
                $request->all(),
                $submission->line_of_business,
                $submissionId,
                $newSubmission->id
            ));
            $redirect = '/submissions/details/' . $newSubmission->id . '?save=1';
        } catch (\Exception $e) {
            dd($e);
            $redirect = '/submissions/details/' . $submission->id . '?save=0';
        }

        return redirect($redirect);
    }
}
