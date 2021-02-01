@extends('layouts.master')

@push('css')
    <style>
        .slider-value-text {
            border: none;
        }
        #totalPercent {
            font-weight: bold;
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <div class="page-heading">
        <h1><i class="fa fa-fw fa-cog"></i> Mods</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('mods.save', ['submissionId' => $submissionMod->submissions_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
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
                                        <input type="text" class="slider-value slider-value-text" id="slider-range-min-amount" name="location-mod" value="{{ number_format($submissionMod->location_outcome, 2, '.', '') }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control autosize" name="location-comm"></textarea>
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
                                        <input type="text" class="slider-value slider-value-text" id="slider-range-min-amount-2" name="premises-mod" value="{{ number_format($submissionMod->premises_equipment_outcome, 2, '.', '') }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control autosize" name="premises-comm"></textarea>
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
                                        <input type="text" class="slider-value slider-value-text" id="slider-range-min-amount-3" name="equipment-mod" value="{{ number_format($submissionMod->building_features_outcome, 2, '.', '') }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control autosize" name="equipment-comm"></textarea>
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
                                        <input type="text" class="slider-value slider-value-text" id="slider-range-min-amount-4" name="classification-mod" value="{{ number_format($submissionMod->management_outcome, 2, '.', '') }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control autosize" name="classification-comm"></textarea>
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
                                        <input type="text" class="slider-value slider-value-text" id="slider-range-min-amount-5" name="employees-mod" value="{{ number_format($submissionMod->employees_outcome, 2, '.', '') }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control autosize" name="employees-comm"></textarea>
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
                                        <input type="text" class="slider-value slider-value-text" id="slider-range-min-amount-6" name="cooperation-mod" value="{{ number_format($submissionMod->protection_outcome, 2, '.', '') }}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control autosize" name="cooperation-comm"></textarea>
                                </div>
                            </div>
                            <hr class="outsider">
                            <div id="panel-advancedoptions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4" style="text-align: center;">
                                            <button type="button" class="btn btn-midnightblue" id="btnCalculate">
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
                                                    <span style="color: #37bf8d;">                                                        
                                                        <input type="text" class="slider-value-text" id="totalPercent" name="total-mod" value="{{ number_format($submissionMod->overall_outcome, 2) }}" readonly/>
                                                    </span>
                                                @elseif ($submissionMod->outcome_type_id == 2)
                                                    <span style="color: #5394c9;">
                                                        <input type="text" class="slider-value-text" id="totalPercent" name="total-mod" value="{{ number_format($submissionMod->overall_outcome, 2) }}" readonly/>
                                                    </span>
                                                @elseif ($submissionMod->outcome_type_id == 3)
                                                    <span style="color: #e36d4f;">
                                                        <input type="text" class="slider-value-text" id="totalPercent" name="total-mod" value="{{ number_format($submissionMod->overall_outcome, 2) }}" readonly/>
                                                    </span>
                                                @else
                                                    <input type="text" class="slider-value-text" id="totalPercent" name="total-mod" value="{{ number_format($submissionMod->overall_outcome, 2) }}" readonly/>
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
                                            <textarea class="form-control autosize" name="total-comm"></textarea>
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
                                                    <input type="file" name="signature">
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
                                            <a href="{{ route('submissions.details', ['submissionId' => $submissionMod->submissions_id]) }}" 
                                               class="btn btn-danger"
                                               style="float: left;"
                                            >
                                                <i class="fa fa-times"></i> Cancel
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a data-toggle="modal"
                                               href="#myModal"
                                               class="btn btn-success"
                                               style="float: right;"
                                            >
                                                <i class="fa fa-save"></i> Save
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h2 class="modal-title"><i class="fa fa-fw fa-cog"></i> Mod Modification</h2>
                            </div>
                            <div class="modal-body">
                                <h4><i class="fas fa-exclamation-triangle text-warning"></i> Are you sure to modify Mod risk factors and total Mods?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </form>
        </div>
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
    <!-- Date Range Picker -->
    <script src="{{ asset('plugins/form-jasnyupload/fileinput.min.js') }}"></script>
    <script>
        // Mapping risks to currently labeled
        $(document).ready(function() {
            let locationOutcomeMinValue = parseFloat('{{ $submissionMod->location_outcome }}');
            let premisesEquipmentOutcomeMinValue = parseFloat('{{ $submissionMod->premises_equipment_outcome }}');
            let buildingFeaturesOutcomeMinValue = parseFloat('{{ $submissionMod->building_features_outcome }}');
            let managementOutcomeMinValue = parseFloat('{{ $submissionMod->management_outcome }}');
            let employeesOutcomeMinValue = parseFloat('{{ $submissionMod->employees_outcome }}');
            let protectionOutcomeMinValue = parseFloat('{{ $submissionMod->protection_outcome }}');

            let newlocationOutcome = parseFloat('{{ $submissionMod->location_outcome }}');
            let newPremisesEquipmentOutcome = parseFloat('{{ $submissionMod->premises_equipment_outcome }}');
            let newBuildingFeaturesOutcome = parseFloat('{{ $submissionMod->building_features_outcome }}');
            let newManagementOutcome = parseFloat('{{ $submissionMod->management_outcome }}');
            let newEmployeesOutcome = parseFloat('{{ $submissionMod->employees_outcome }}');
            let newProtectionOutcome = parseFloat('{{ $submissionMod->protection_outcome }}');
            
            let locationOutcomeMaxValue = 1.10;
            let premisesEquipmentOutcomeMaxValue = 1.10;
            let buildingFeaturesOutcomeMaxValue = 1.10;
            let managementOutcomeMaxValue = 1.10;
            let employeesOutcomeMaxValue = 1.06;
            let protectionOutcomeMaxValue = 1.04;
            $("#slider-range-min").slider({
                range: "min",
                value: {{ $submissionMod->location_outcome }},
                min: {{ $submissionMod->location_outcome }},
                max: locationOutcomeMaxValue,
                step: 0.01,
                slide: function (event, ui) {
                    newlocationOutcome = ui.value;
                    $("#slider-range-min-amount").val(ui.value);
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
                    $("#slider-range-min-amount-2").val(ui.value);
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
                    $("#slider-range-min-amount-3").val(ui.value);
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
                    $("#slider-range-min-amount-4").val(ui.value);
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
                    $("#slider-range-min-amount-5").val(ui.value);
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
                    $("#slider-range-min-amount-6").val(ui.value);
                }
            });
            $("#slider-range-min-amount-6").text($("#slider-range-min-6").slider("value"));
            $("#btnCalculate").click(() => {
                if (newlocationOutcome == locationOutcomeMinValue) {
                    diffNewlocationOutcome = (locationOutcomeMinValue - 1);
                    console.log("diffNewlocationOutcome: " + locationOutcomeMinValue + " - 1");
                    console.log("= " + diffNewlocationOutcome.toFixed(2));
                } else {
                    diffNewlocationOutcome = (newlocationOutcome - 1);
                    console.log("diffNewlocationOutcome: " + newlocationOutcome + " - 1");
                    console.log("= " + diffNewlocationOutcome.toFixed(2));
                }
                console.log("-------------------------------------------------------");
                if (newPremisesEquipmentOutcome == premisesEquipmentOutcomeMinValue) {
                    diffNewPremisesEquipmentOutcome = (premisesEquipmentOutcomeMinValue - 1);
                    console.log("diffNewPremisesEquipmentOutcome: " + premisesEquipmentOutcomeMinValue + " - 1");
                    console.log("= " + diffNewPremisesEquipmentOutcome.toFixed(2));
                } else {
                    diffNewPremisesEquipmentOutcome = (newPremisesEquipmentOutcome - 1);
                    console.log("diffNewPremisesEquipmentOutcome: " + newPremisesEquipmentOutcome + " - 1");
                    console.log("= " + diffNewPremisesEquipmentOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                if (newBuildingFeaturesOutcome == buildingFeaturesOutcomeMinValue) {
                    diffNewBuildingFeaturesOutcome = (buildingFeaturesOutcomeMinValue - 1);
                    console.log("diffNewBuildingFeaturesOutcome: " + buildingFeaturesOutcomeMinValue + " - 1");
                    console.log("= " + diffNewBuildingFeaturesOutcome.toFixed(2));
                } else {
                    diffNewBuildingFeaturesOutcome = (newBuildingFeaturesOutcome  - 1);
                    console.log("diffNewBuildingFeaturesOutcome: " + newBuildingFeaturesOutcome + " - 1");
                    console.log("= " + diffNewBuildingFeaturesOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                if (newManagementOutcome == managementOutcomeMinValue) {
                    diffNewManagementOutcome = (managementOutcomeMinValue - 1);
                    console.log("diffNewManagementOutcome: " + managementOutcomeMinValue + " - 1");
                    console.log("= " + diffNewManagementOutcome.toFixed(2));
                } else {
                    diffNewManagementOutcome = (newManagementOutcome - 1);
                    console.log("diffNewManagementOutcome: " + newManagementOutcome + " - 1");
                    console.log("= " + diffNewManagementOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                if (newEmployeesOutcome == employeesOutcomeMinValue) {
                    diffNewEmployeesOutcome = (employeesOutcomeMinValue - 1);
                    console.log("diffNewEmployeesOutcome: " + employeesOutcomeMinValue + " - 1");
                    console.log("= " + diffNewEmployeesOutcome.toFixed(2));
                } else {
                    diffNewEmployeesOutcome = (newEmployeesOutcome - 1);
                    console.log("diffNewEmployeesOutcome: " + newEmployeesOutcome + " - 1");
                    console.log("= " + diffNewEmployeesOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                if (newProtectionOutcome == protectionOutcomeMinValue) {
                    diffNewProtectionOutcome = (protectionOutcomeMinValue - 1);
                    console.log("diffNewProtectionOutcome: " + protectionOutcomeMinValue + " - 1");
                    console.log("= " + diffNewProtectionOutcome.toFixed(2));
                } else {
                    diffNewProtectionOutcome = (newProtectionOutcome - 1);
                    console.log("diffNewProtectionOutcome: " + newProtectionOutcome + " - 1");
                    console.log("= " + diffNewProtectionOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                let total = diffNewlocationOutcome
                    + diffNewPremisesEquipmentOutcome
                    + diffNewBuildingFeaturesOutcome
                    + diffNewManagementOutcome
                    + diffNewEmployeesOutcome
                    + diffNewProtectionOutcome;
                console.log("Sum: " + diffNewlocationOutcome.toFixed(2) + " + " + diffNewPremisesEquipmentOutcome.toFixed(2) + " + " + diffNewBuildingFeaturesOutcome.toFixed(2) + " + " + diffNewManagementOutcome.toFixed(2) + " + " + diffNewEmployeesOutcome.toFixed(2) + " + " + diffNewProtectionOutcome.toFixed(2));
                console.log("= " + total.toFixed(2));
                total += 1;
                console.log("Raw total: " + total);
                total = round(total, 2);
                console.log("Total Mods\%: " + total);
                $("#totalPercent").val(total);
            });
        });
        function round(value, decimals) {
            return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
        }
    </script>
@endpush
