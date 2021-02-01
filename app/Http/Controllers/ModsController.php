<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\{
    Submission,
    SubmissionMod
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        dd($request);
        // $premisesMod = $request->input('premises-mod');
        // $premisesComm = $request->input('premises-comm');
        // $equipmentMod = $request->input('equipment-mod');
        // $equipmentComm = $request->input('equipment-comm');
        // $classificationMod = $request->input('classification-mod');
        // $classificationComm = $request->input('classification-comm');
        // $cooperationMod = $request->input('cooperation-mod');
        // $cooperationcomm = $request->input('cooperation-comm');

        // $submission = Submission::find($submissionId);
        // $newSubmission = new Submission;
        // $newSubmission->submission_id = $submission->submission_id;
        // $newSubmission->policy_id = $submission->policy_id;
        // $newSubmission->version = intval($submission->version) + 1;
        // $newSubmission->business_name = $submission->business_name;
        // $newSubmission->insured_name = $submission->insured_name;
        // $newSubmission->program_name = $submission->program_name;
        // $newSubmission->agency = $submission->agency;
        // $newSubmission->agent = $submission->agent;
        // $newSubmission->modfactor_id = $submission->modfactor_id;
        // $newSubmission->us_state_id = $submission->us_state_id;
        // $newSubmission->producer_id = $submission->producer_id;
        // $newSubmission->line_of_business = $submission->line_of_business;
        // $newSubmission->class_code = $submission->class_code;
        // $newSubmission->state = $submission->state;
        // $newSubmission->json = $submission->json;
        // $newSubmission->issuer = $submission->issuer;
        // $newSubmission->expiry = $submission->expiry;
        // $newSubmission->scope = $submission->scope;
        // $newSubmission->operating_in = $submission->operating_in;
        // $newSubmission->created_at = Carbon::now();
        // $newSubmission->updated_at = Carbon::now();
        // $newSubmission->save();

        // $submissionMod = SubmissionMod::where('submissions_id', $submissionId)
        //     -first();
        // $newSubmissionMod = new SubmissionMod;
        // $newSubmissionMod->submissions_id = $newSubmission->id;
        // $newSubmissionMod->min = $submissionMod->min;
        // $newSubmissionMod->max = $submissionMod->max;

        // $newSubmissionMod->management_outcome = $submissionMod->management_outcome;
        // $newSubmissionMod->location_outcome = $request->input('location-mod');
        // $newSubmissionMod->building_features_outcome = $submissionMod->building_features_outcome;
        // $newSubmissionMod->premises_equipment_outcome = $submissionMod->premises_equipment_outcome;
        // $newSubmissionMod->employees_outcome = $request->input('employees-mod');
        // $newSubmissionMod->protection_outcome = $submissionMod->protection_outcome;
        // $newSubmissionMod->overall_outcome = $request->input('total-mod');

        // $newSubmissionMod->outcome_type_id = $submissionMod->outcome_type_id;

        // $newSubmissionMod->comments_in_total = $request->input('total-comm');
        // $newSubmissionMod->comments_in_management = $submissionMod->comments_in_management;
        // $newSubmissionMod->comments_in_location = $request->input('location-comm');
        // $newSubmissionMod->comments_building_features = $submissionMod->comments_building_features;
        // $newSubmissionMod->comments_premises_equipment = $submissionMod->comments_premises_equipment;
        // $newSubmissionMod->comments_employees = $request->input('employees-comm');
        // $newSubmissionMod->comments_protection = $submissionMod->comments_protection;

        // $newSubmissionMod->underwriter_users_id = Auth::user()->id;
        
        // $signature = $request->file('signature')->getRealPath();
        // $logo = file_get_contents($signature);
        // $base64 = base64_encode($logo);
        // $newSubmissionMod->signature = $base64;

        // $newSubmissionMod->created_at = Carbon::now();
        // $newSubmissionMod->updated_at = Carbon::now();
        // $newSubmissionMod->save();
    }
}
