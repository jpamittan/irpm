@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fa fa-fw fa-cog"></i> Mods</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-12" style="padding: 0px 20px 20px 20px;">
                    <a href="{{ route('submissions.details', ['submissionId' => $submissionMod->submissions_id]) }}">
                        <button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-sky">
                    <div class="panel-heading ">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>Risk Characteristics</b>
                            </div>
                            <div class="col-md-4" style="text-align: center;">
                                <b>Used</b>
                            </div>
                            <div class="col-md-4" style="text-align: center;">
                                <b>Comments</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>A. Location</b>
                                <br>
                                <small>Premises organization, housekeeping, yard protection</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        Min
                                        <br>
                                        {{ number_format($submissionMod->location_outcome, 2, '.', '') }}
                                    </div>
                                    <div class="col-md-8">
                                        <div id="slider-range-min" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-2">
                                        Max
                                        <br>
                                        1.10
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value" id="slider-range-min-amount"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control autosize"></textarea>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>B. Premises</b>
                                <br>
                                <small>Cooperation in matters of safeguarding and proper handling of
                                    property covered</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        Min
                                        <br>
                                        {{ number_format($submissionMod->premises_equipment_outcome, 2, '.', '') }}
                                    </div>
                                    <div class="col-md-8">
                                        <div id="slider-range-min-2" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-2">
                                        Max
                                        <br>
                                        1.10
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value" id="slider-range-min-amount-2"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control autosize"></textarea>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>C. Equipment</b>
                                <br>
                                <small>Age, condition, scheduled maintenance</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        Min
                                        <br>
                                        {{ number_format($submissionMod->building_features_outcome, 2, '.', '') }}
                                    </div>
                                    <div class="col-md-8">
                                        <div id="slider-range-min-3" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-2">
                                        Max
                                        <br>
                                        1.10
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value" id="slider-range-min-amount-3"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control autosize"></textarea>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>D. Classification</b>
                                <br>
                                <small>Age, condition, and unusual structural features</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        Min
                                        <br>
                                        {{ number_format($submissionMod->management_outcome, 2, '.', '') }}
                                    </div>
                                    <div class="col-md-8">
                                        <div id="slider-range-min-4" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-2">
                                        Max
                                        <br>
                                        1.10
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value" id="slider-range-min-amount-4"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control autosize"></textarea>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>E. Employees</b>
                                <br>
                                <small>Selection, training, supervision and experience</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        Min
                                        <br>
                                        {{ number_format($submissionMod->employees_outcome, 2, '.', '') }}
                                    </div>
                                    <div class="col-md-8">
                                        <div id="slider-range-min-5" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-2">
                                        Max
                                        <br>
                                        1.06
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value" id="slider-range-min-amount-5"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control autosize"></textarea>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>F. Cooperation</b>
                                <br>
                                <small>Care, condition, and type</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        Min
                                        <br>
                                        {{ number_format($submissionMod->protection_outcome, 2, '.', '') }}
                                    </div>
                                    <div class="col-md-8">
                                        <div id="slider-range-min-6" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-2">
                                        Max
                                        <br>
                                        1.04
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value" id="slider-range-min-amount-6"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control autosize"></textarea>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div id="panel-advancedoptions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <button class="btn btn-midnightblue" id="btnCalculate">
                                            <i class="fa fa-calculator"></i> Calculate
                                        </button>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div id="panel-advancedoptions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <h3>
                                            Total Mods %:
                                            <br>
                                            @if ($submissionMod->outcome_type_id == 1)
                                                <span style="color: #37bf8d;"><b id="totalPercent">{{ $submissionMod->overall_outcome }}</b></span>
                                            @elseif ($submissionMod->outcome_type_id == 2)
                                                <span style="color: #5394c9;"><b id="totalPercent">{{ $submissionMod->overall_outcome }}</b></span>
                                            @elseif ($submissionMod->outcome_type_id == 3)
                                                <span style="color: #e36d4f;"><b id="totalPercent">{{ $submissionMod->overall_outcome }}</b></span>
                                            @else
                                                <b>{{ $submissionMod->overall_outcome }}</b>
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                            <div class="row" style="display: none;">
                                <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <h3>
                                            Outcome:
                                            <br>
                                            @if ($submissionMod->outcome_type_id == 1)
                                                <span style="color: #37bf8d;"><b>{{ $submissionMod->outcomeType->description }}</b></span>
                                            @elseif ($submissionMod->outcome_type_id == 2)
                                                <span style="color: #5394c9;"><b>{{ $submissionMod->outcomeType->description }}</b></span>
                                            @elseif ($submissionMod->outcome_type_id == 3)
                                                <span style="color: #e36d4f;"><b>{{ $submissionMod->outcomeType->description }}</b></span>
                                            @else
                                                <b>{{ $submissionMod->outcomeType->description }}</b>
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4" style="text-align: center;">
                                        Comments on Total %:
                                        <br><br>
                                        <textarea class="form-control autosize"></textarea>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-toyo">
                    <div class="panel-heading ">
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                                <b>Underwriter</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="col-md-6">
                                        First name:
                                        <br>
                                        <input type="text" class="form-control" value="{{ $underWriterFname }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        Last name:
                                        <br>
                                        <input type="text" class="form-control" value="{{ $underWriterLname }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="padding: 25px;">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h2>E-signature Upload</h2>
                                        <div class="options"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select file</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="...">
                                            </span>
                                            <span class="fileinput-filename"></span>
                                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="col-md-6">
                                        <a href="{{ route('submissions.details', ['submissionId' => $submissionMod->submissions_id]) }}" class="btn btn-danger"
                                            style="float: left;"><i class="fa fa-times"></i>
                                            Cancel</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-success" style="float: right;"><i
                                                class="fa fa-save"></i>
                                            Save</a>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
    <script src="{{ asset('plugins/form-jasnyupload/fileinput.min.js') }}"></script> <!-- Date Range Picker -->
    <script>
        // Mapping risks to currently labeled
        // location = {{ $submissionMod->location_outcome }}
        // premises = {{ $submissionMod->premises_equipment_outcome }}
        // equipment = {{ $submissionMod->building_features_outcome }}
        // classification = {{ $submissionMod->management_outcome }}
        // employees = {{ $submissionMod->employees_outcome }}
        // cooperation = {{ $submissionMod->protection_outcome }}
        $(document).ready(function() {
            let locationOutcomeMaxValue = 1.10;
            let newlocationOutcome = 0;
            let premisesEquipmentOutcomeMaxValue = 1.10;
            let newPremisesEquipmentOutcome = 0;
            let buildingFeaturesOutcomeMaxValue = 1.10;
            let newBuildingFeaturesOutcome = 0;
            let managementOutcomeMaxValue = 1.10;
            let newManagementOutcome = 0;
            let employeesOutcomeMaxValue = 1.06;
            let newEmployeesOutcome = 0;
            let protectionOutcomeMaxValue = 1.04;
            let newProtectionOutcome = 0;
            $("#slider-range-min").slider({
                range: "min",
                value: {{ $submissionMod->location_outcome }},
                min: {{ $submissionMod->location_outcome }},
                max: locationOutcomeMaxValue,
                step: 0.01,
                slide: function (event, ui) {
                    newlocationOutcome = ui.value;
                    $("#slider-range-min-amount").text(ui.value);
                }
            });
            $("#slider-range-min-amount").text($("#slider-range-min").slider("value"));
            $("#slider-range-min-2").slider({
                range: "min",
                value: {{ $submissionMod->premises_equipment_outcome }},
                min: {{ $submissionMod->premises_equipment_outcome }},
                max: premisesEquipmentOutcomeMaxValue,
                step: 0.01,
                slide: function (event, ui) {
                    newPremisesEquipmentOutcome = ui.value;
                    $("#slider-range-min-amount-2").text(ui.value);
                }
            });
            $("#slider-range-min-amount-2").text($("#slider-range-min-2").slider("value"));
            $("#slider-range-min-3").slider({
                range: "min",
                value: {{ $submissionMod->building_features_outcome }},
                min: {{ $submissionMod->building_features_outcome }},
                max: buildingFeaturesOutcomeMaxValue,
                step: 0.01,
                slide: function (event, ui) {
                    newBuildingFeaturesOutcome = ui.value;
                    $("#slider-range-min-amount-3").text(ui.value);
                }
            });
            $("#slider-range-min-amount-3").text($("#slider-range-min-3").slider("value"));
            $("#slider-range-min-4").slider({
                range: "min",
                value: {{ $submissionMod->management_outcome }},
                min: {{ $submissionMod->management_outcome }},
                max: managementOutcomeMaxValue,
                step: 0.01,
                slide: function (event, ui) {
                    newManagementOutcome = ui.value;
                    $("#slider-range-min-amount-4").text(ui.value);
                }
            });
            $("#slider-range-min-amount-4").text($("#slider-range-min-4").slider("value"));
            $("#slider-range-min-5").slider({
                range: "min",
                value: {{ $submissionMod->employees_outcome }},
                min: {{ $submissionMod->employees_outcome }},
                max: employeesOutcomeMaxValue,
                step: 0.01,
                slide: function (event, ui) {
                    newEmployeesOutcome = ui.value;
                    $("#slider-range-min-amount-5").text(ui.value);
                }
            });
            $("#slider-range-min-amount-5").text($("#slider-range-min-5").slider("value"));
            $("#slider-range-min-6").slider({
                range: "min",
                value: {{ $submissionMod->protection_outcome }},
                min: {{ $submissionMod->protection_outcome }},
                max: protectionOutcomeMaxValue,
                step: 0.01,
                slide: function (event, ui) {
                    newProtectionOutcome = ui.value;
                    $("#slider-range-min-amount-6").text(ui.value);
                }
            });
            $("#slider-range-min-amount-6").text($("#slider-range-min-6").slider("value"));
            $("#btnCalculate").click(() => {
                /*
                o	If the mod factor for location is for example change from 0.95 to 0.97 
                    because the location is in a bad part of town. You will subtract 97 from 100 and the answer is -3. 
                o	Let’s say the other one is premises and the underwriter increased it from 0.93 to 0.94. 
                    You will calculate this as 94-100=-6
                o	Continue the same thing with other mod factors.
                o	Add all the numbers, in this example add -3 and -6, total is -9. 
                o	Next, subtract this from 100. So that would be 100-9=91. 
                o	Make it a percent – so that becomes .91. 
                o	Display this when the u/w clicks on rerate. 
                o	Remove the Status:Quote or Status:Refer from that screen. The underwriter will make these changes in 
                    the oneview system [whether to change from refer to quote]. 
                o	Add a button to print to pdf. 
                */
                diffNewlocationOutcome = (100 - newlocationOutcome) % 1;
                diffNewPremisesEquipmentOutcome = (100 - newPremisesEquipmentOutcome) % 1;
                diffNewBuildingFeaturesOutcome = (100 - newBuildingFeaturesOutcome) % 1;
                diffNewManagementOutcome = (100 - newManagementOutcome) % 1;
                diffNewEmployeesOutcome = (100 - newEmployeesOutcome) % 1;
                diffNewProtectionOutcome = (100 - newProtectionOutcome) % 1;

                console.log("newlocationOutcome: " + diffNewlocationOutcome);
                console.log("newPremisesEquipmentOutcome: " + diffNewPremisesEquipmentOutcome);
                console.log("newBuildingFeaturesOutcome: " + diffNewBuildingFeaturesOutcome);
                console.log("newManagementOutcome: " + diffNewManagementOutcome);
                console.log("newEmployeesOutcome: " + diffNewEmployeesOutcome);
                console.log("newProtectionOutcome: " + diffNewProtectionOutcome);

                let total = diffNewlocationOutcome 
                    + diffNewPremisesEquipmentOutcome 
                    + diffNewBuildingFeaturesOutcome 
                    + diffNewManagementOutcome 
                    + diffNewEmployeesOutcome 
                    + diffNewProtectionOutcome;

                console.log("Sum: " + total);

                total = (100 - total) / 100;

                console.log("percentage: " + total);

                $("#totalPercent").html(total.toFixed(2));
            });
        });
    </script>
@endpush
