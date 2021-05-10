@extends('layouts.master')

@push('css')
    <style>
        .slider-value-text {
            border: none;
            width: 40px;
            text-align: center;
        }
        #totalPercent {
            font-weight: bold;
            text-align: center;
            width: 80px;
        }
        #comment-total {
            max-width: 100%;
            min-width: 100%;
            min-height: 100px;
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
                            <button type="button" class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-sky">
                        <div class="panel-heading ">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <b>Risk Characteristics</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <b>UW Engine</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <b>Gradient AI</b>
                                </div>
                                <div class="col-md-4" style="text-align: center;">
                                    <b>Used</b>
                                </div>
                                <div class="col-md-3" style="text-align: center;">
                                    <b>Comments</b>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <b>A. Premises</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-info">{{ $uwEngine['premises'] }}</span>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-primary">{{ $gradientAI['premises'] }}</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            Min
                                            <br>
                                            {{ number_format($ncci['premises']['min'], 2, '.', '') }}
                                        </div>
                                        <div class="col-md-8">
                                            <div id="slider-range-min" class="slider danger"></div>
                                        </div>
                                        <div class="col-md-2">
                                            Max
                                            <br>
                                            {{ number_format($ncci['premises']['max'], 2, '.', '') }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="slider-value" style="text-align: center;">
                                        Value:
                                        <input 
                                            type="text" 
                                            class="slider-value slider-value-text" 
                                            id="slider-range-min-amount" 
                                            name="premises-mod" 
                                            value="{{ 
                                                number_format(
                                                    (((floatval($gradientAI['premises']) - 1) + (floatval($uwEngine['premises']) - 1)) + 1), 
                                                    2, 
                                                    '.', 
                                                    ''
                                                ) 
                                            }}" 
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <textarea class="form-control autosize" name="premises-comm"></textarea>
                                </div>
                            </div>
                            <hr class="outsider">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <b>B. Classification</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-info">{{ $uwEngine['classification'] }}</span>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-primary">{{ $gradientAI['classification'] }}</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            Min
                                            <br>
                                            {{ number_format($ncci['classification']['min'], 2, '.', '') }}
                                        </div>
                                        <div class="col-md-8">
                                            <div id="slider-range-min-2" class="slider danger"></div>
                                        </div>
                                        <div class="col-md-2">
                                            Max
                                            <br>
                                            {{ number_format($ncci['classification']['max'], 2, '.', '') }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="slider-value" style="text-align: center;">
                                        Value:
                                        <input 
                                            type="text" 
                                            class="slider-value slider-value-text" 
                                            id="slider-range-min-amount-2" 
                                            name="classification-mod" 
                                            value="{{ 
                                                number_format(
                                                    (((floatval($gradientAI['classification']) - 1) + (floatval($uwEngine['classification']) - 1)) + 1), 
                                                    2, 
                                                    '.', 
                                                    ''
                                                ) 
                                            }}" 
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <textarea class="form-control autosize" name="classification-comm"></textarea>
                                </div>
                            </div>
                            <hr class="outsider">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <b>C. Health</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-info">{{ $uwEngine['health'] }}</span>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-primary">{{ $gradientAI['health'] }}</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            Min
                                            <br>
                                            {{ number_format($ncci['health']['min'], 2, '.', '') }}
                                        </div>
                                        <div class="col-md-8">
                                            <div id="slider-range-min-3" class="slider danger"></div>
                                        </div>
                                        <div class="col-md-2">
                                            Max
                                            <br>
                                            {{ number_format($ncci['health']['max'], 2, '.', '') }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="slider-value" style="text-align: center;">
                                        Value:
                                        <input 
                                            type="text" 
                                            class="slider-value slider-value-text" 
                                            id="slider-range-min-amount-3" 
                                            name="health-mod" 
                                            value="{{ 
                                                number_format(
                                                    (((floatval($gradientAI['health']) - 1) + (floatval($uwEngine['health']) - 1)) + 1), 
                                                    2, 
                                                    '.', 
                                                    ''
                                                ) 
                                            }}" 
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <textarea class="form-control autosize" name="health-comm"></textarea>
                                </div>
                            </div>
                            <hr class="outsider">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <b>D. Equipment</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-info">{{ $uwEngine['equipment'] }}</span>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-primary">{{ $gradientAI['equipment'] }}</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            Min
                                            <br>
                                            {{ number_format($ncci['equipment']['min'], 2, '.', '') }}
                                        </div>
                                        <div class="col-md-8">
                                            <div id="slider-range-min-4" class="slider danger"></div>
                                        </div>
                                        <div class="col-md-2">
                                            Max
                                            <br>
                                            {{ number_format($ncci['equipment']['max'], 2, '.', '') }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="slider-value" style="text-align: center;">
                                        Value:
                                        <input 
                                            type="text" 
                                            class="slider-value slider-value-text" 
                                            id="slider-range-min-amount-4" 
                                            name="equipment-mod" 
                                            value="{{ 
                                                number_format(
                                                    (((floatval($gradientAI['equipment']) - 1) + (floatval($uwEngine['equipment']) - 1)) + 1), 
                                                    2, 
                                                    '.', 
                                                    ''
                                                ) 
                                            }}" 
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <textarea class="form-control autosize" name="equipment-comm"></textarea>
                                </div>
                            </div>
                            <hr class="outsider">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <b>E. Employees</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-info">{{ $uwEngine['employees'] }}</span>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-primary">{{ $gradientAI['employees'] }}</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            Min
                                            <br>
                                            {{ number_format($ncci['employees']['min'], 2, '.', '') }}
                                        </div>
                                        <div class="col-md-8">
                                            <div id="slider-range-min-5" class="slider danger"></div>
                                        </div>
                                        <div class="col-md-2">
                                            Max
                                            <br>
                                            {{ number_format($ncci['employees']['max'], 2, '.', '') }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="slider-value" style="text-align: center;">
                                        Value:
                                        <input 
                                            type="text" 
                                            class="slider-value slider-value-text" 
                                            id="slider-range-min-amount-5" 
                                            name="employees-mod" 
                                            value="{{ 
                                                number_format(
                                                    (((floatval($gradientAI['employees']) - 1) + (floatval($uwEngine['employees']) - 1)) + 1), 
                                                    2, 
                                                    '.', 
                                                    ''
                                                ) 
                                            }}" 
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <textarea class="form-control autosize" name="employees-comm"></textarea>
                                </div>
                            </div>
                            <hr class="outsider">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <b>F. Management</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-info">{{ $uwEngine['management'] }}</span>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-primary">{{ $gradientAI['management'] }}</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            Min
                                            <br>
                                            {{ number_format($ncci['management']['min'], 2, '.', '') }}
                                        </div>
                                        <div class="col-md-8">
                                            <div id="slider-range-min-6" class="slider danger"></div>
                                        </div>
                                        <div class="col-md-2">
                                            Max
                                            <br>
                                            {{ number_format($ncci['management']['max'], 2, '.', '') }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="slider-value" style="text-align: center;">
                                        Value:
                                        <input 
                                            type="text" 
                                            class="slider-value slider-value-text" 
                                            id="slider-range-min-amount-6" 
                                            name="management-mod" 
                                            value="{{ 
                                                number_format(
                                                    (((floatval($gradientAI['management']) - 1) + (floatval($uwEngine['management']) - 1)) + 1), 
                                                    2, 
                                                    '.', 
                                                    ''
                                                ) 
                                            }}" 
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <textarea class="form-control autosize" name="management-comm"></textarea>
                                </div>
                            </div>
                            <hr class="outsider">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <b>G. Organization</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-info">{{ $uwEngine['organization'] }}</span>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <span class="badge badge-primary">{{ $gradientAI['organization'] }}</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            Min
                                            <br>
                                            {{ number_format($ncci['organization']['min'], 2, '.', '') }}
                                        </div>
                                        <div class="col-md-8">
                                            <div id="slider-range-min-7" class="slider danger"></div>
                                        </div>
                                        <div class="col-md-2">
                                            Max
                                            <br>
                                            {{ number_format($ncci['organization']['max'], 2, '.', '') }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="slider-value" style="text-align: center;">
                                        Value:
                                        <input 
                                            type="text" 
                                            class="slider-value slider-value-text" 
                                            id="slider-range-min-amount-7" 
                                            name="organization-mod" 
                                            value="{{ 
                                                number_format(
                                                    (((floatval($gradientAI['organization']) - 1) + (floatval($uwEngine['organization']) - 1)) + 1), 
                                                    2, 
                                                    '.', 
                                                    ''
                                                ) 
                                            }}" 
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <textarea class="form-control autosize" name="organization-comm"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;padding-top: 20px;">
                                    <b>Overall</b>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <hr class="outsider" style="margin-top: 0;">
                                    <span class="badge badge-info">{{ $uwEngine['overall'] }}</span>
                                </div>
                                <div class="col-md-1" style="text-align: center;">
                                    <hr class="outsider" style="margin-top: 0;">
                                    <span class="badge badge-primary">{{ $gradientAI['overall'] }}</span>
                                </div>
                                <div class="col-md-4">
                                    &nbsp;
                                </div>
                                <div class="col-md-3">
                                    &nbsp;
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
                                            <textarea class="form-control autosize" name="total-comm" id="comment-total"></textarea>
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
            let premisesInitValue = newPremisesOutcome = parseFloat('{{ number_format((((floatval($gradientAI["premises"]) - 1) + (floatval($uwEngine["premises"]) - 1)) + 1), 2, '.', '') }}');
            let classificationInitValue = newClassificationOutcome = parseFloat('{{ number_format((((floatval($gradientAI["classification"]) - 1) + (floatval($uwEngine["classification"]) - 1)) + 1), 2, '.', '') }}');
            let healthInitValue = newHealthOutcome = parseFloat('{{ number_format((((floatval($gradientAI["health"]) - 1) + (floatval($uwEngine["health"]) - 1)) + 1), 2, '.', '') }}');
            let equipmentInitValue = newEquipmentOutcome = parseFloat('{{ number_format((((floatval($gradientAI["equipment"]) - 1) + (floatval($uwEngine["equipment"]) - 1)) + 1), 2, '.', '') }}');
            let employeesInitValue = newEmployeesOutcome = parseFloat('{{ number_format((((floatval($gradientAI["employees"]) - 1) + (floatval($uwEngine["employees"]) - 1)) + 1), 2, '.', '') }}');
            let managementInitValue = newManagementOutcome = parseFloat('{{ number_format((((floatval($gradientAI["management"]) - 1) + (floatval($uwEngine["management"]) - 1)) + 1), 2, '.', '') }}');
            let organizationInitValue = newOrganizationOutcome = parseFloat('{{ number_format((((floatval($gradientAI["organization"]) - 1) + (floatval($uwEngine["organization"]) - 1)) + 1), 2, '.', '') }}');
            $("#slider-range-min").slider({
                range: "min",
                value: premisesInitValue,
                min: {{ $ncci['premises']['min'] }},
                max: {{ $ncci['premises']['max'] }},
                step: 0.01,
                slide: function (event, ui) {
                    newPremisesOutcome = ui.value;
                    $("#slider-range-min-amount").val(ui.value);
                }
            });
            $("#slider-range-min-amount").text($("#slider-range-min").slider("value"));
            $("#slider-range-min-2").slider({
                range: "min",
                value: classificationInitValue,
                min: {{ $ncci['classification']['min'] }},
                max: {{ $ncci['classification']['max'] }},
                step: 0.01,
                slide: function (event, ui) {
                    newClassificationOutcome = ui.value;
                    $("#slider-range-min-amount-2").val(ui.value);
                }
            });
            $("#slider-range-min-amount-2").text($("#slider-range-min-2").slider("value"));
            $("#slider-range-min-3").slider({
                range: "min",
                value: healthInitValue,
                min: {{ $ncci['health']['min'] }},
                max: {{ $ncci['health']['max'] }},
                step: 0.01,
                slide: function (event, ui) {
                    newHealthOutcome = ui.value;
                    $("#slider-range-min-amount-3").val(ui.value);
                }
            });
            $("#slider-range-min-amount-3").text($("#slider-range-min-3").slider("value"));
            $("#slider-range-min-4").slider({
                range: "min",
                value: equipmentInitValue,
                min: {{ $ncci['equipment']['min'] }},
                max: {{ $ncci['equipment']['max'] }},
                step: 0.01,
                slide: function (event, ui) {
                    newEquipmentOutcome = ui.value;
                    $("#slider-range-min-amount-4").val(ui.value);
                }
            });
            $("#slider-range-min-amount-4").text($("#slider-range-min-4").slider("value"));
            $("#slider-range-min-5").slider({
                range: "min",
                value: employeesInitValue,
                min: {{ $ncci['employees']['min'] }},
                max: {{ $ncci['employees']['max'] }},
                step: 0.01,
                slide: function (event, ui) {
                    newEmployeesOutcome = ui.value;
                    $("#slider-range-min-amount-5").val(ui.value);
                }
            });
            $("#slider-range-min-amount-5").text($("#slider-range-min-5").slider("value"));
            $("#slider-range-min-6").slider({
                range: "min",
                value: managementInitValue,
                min: {{ $ncci['management']['min'] }},
                max: {{ $ncci['management']['max'] }},
                step: 0.01,
                slide: function (event, ui) {
                    newManagementOutcome = ui.value;
                    $("#slider-range-min-amount-6").val(ui.value);
                }
            });
            $("#slider-range-min-amount-6").text($("#slider-range-min-6").slider("value"));
            $("#slider-range-min-7").slider({
                range: "min",
                value: organizationInitValue,
                min: {{ $ncci['organization']['min'] }},
                max: {{ $ncci['organization']['max'] }},
                step: 0.01,
                slide: function (event, ui) {
                    newOrganizationOutcome = ui.value;
                    $("#slider-range-min-amount-7").val(ui.value);
                }
            });
            $("#slider-range-min-amount-7").text($("#slider-range-min-7").slider("value"));
            //calculate
            $("#btnCalculate").click(() => {
                if (premisesInitValue == newPremisesOutcome) {
                    diffnewPremisesOutcome = (premisesInitValue - 1);
                    console.log("diffnewPremisesOutcome: " + premisesInitValue + " - 1");
                    console.log("= " + premisesInitValue.toFixed(2));
                } else {
                    diffnewPremisesOutcome = (newPremisesOutcome - 1);
                    console.log("diffnewPremisesOutcome: " + newPremisesOutcome + " - 1");
                    console.log("= " + newPremisesOutcome.toFixed(2));
                }
                console.log("-------------------------------------------------------");
                if (classificationInitValue == newClassificationOutcome) {
                    diffnewClassificationOutcome = (classificationInitValue - 1);
                    console.log("diffnewClassificationOutcome: " + classificationInitValue + " - 1");
                    console.log("= " + classificationInitValue.toFixed(2));
                } else {
                    diffnewClassificationOutcome = (newClassificationOutcome - 1);
                    console.log("diffnewClassificationOutcome: " + newClassificationOutcome + " - 1");
                    console.log("= " + newClassificationOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                if (healthInitValue == newHealthOutcome) {
                    diffnewHealthOutcome = (healthInitValue - 1);
                    console.log("diffnewHealthOutcome: " + healthInitValue + " - 1");
                    console.log("= " + healthInitValue.toFixed(2));
                } else {
                    diffnewHealthOutcome = (newHealthOutcome  - 1);
                    console.log("diffnewHealthOutcome: " + newHealthOutcome + " - 1");
                    console.log("= " + newHealthOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                if (equipmentInitValue == newEquipmentOutcome) {
                    diffnewEquipmentOutcome = (equipmentInitValue - 1);
                    console.log("diffnewEquipmentOutcome: " + equipmentInitValue + " - 1");
                    console.log("= " + equipmentInitValue.toFixed(2));
                } else {
                    diffnewEquipmentOutcome = (newEquipmentOutcome - 1);
                    console.log("diffnewEquipmentOutcome: " + newEquipmentOutcome + " - 1");
                    console.log("= " + newEquipmentOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                if (employeesInitValue == newEmployeesOutcome) {
                    diffnewEmployeesOutcome = (employeesInitValue - 1);
                    console.log("diffnewEmployeesOutcome: " + employeesInitValue + " - 1");
                    console.log("= " + employeesInitValue.toFixed(2));
                } else {
                    diffnewEmployeesOutcome = (newEmployeesOutcome - 1);
                    console.log("diffnewEmployeesOutcome: " + newEmployeesOutcome + " - 1");
                    console.log("= " + newEmployeesOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                if (managementInitValue == newManagementOutcome) {
                    diffnewManagementOutcome = (managementInitValue - 1);
                    console.log("diffnewManagementOutcome: " + managementInitValue + " - 1");
                    console.log("= " + managementInitValue.toFixed(2));
                } else {
                    diffnewManagementOutcome = (newManagementOutcome - 1);
                    console.log("diffnewManagementOutcome: " + newManagementOutcome + " - 1");
                    console.log("= " + newManagementOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                if (organizationInitValue == newOrganizationOutcome) {
                    diffnewOrganizationOutcome = (organizationInitValue - 1);
                    console.log("diffnewOrganizationOutcome: " + organizationInitValue + " - 1");
                    console.log("= " + organizationInitValue.toFixed(2));
                } else {
                    diffnewOrganizationOutcome = (newOrganizationOutcome - 1);
                    console.log("diffnewOrganizationOutcome: " + newOrganizationOutcome + " - 1");
                    console.log("= " + newOrganizationOutcome.toFixed(2));
                }
                console.log("-----------------------------------");
                let total = diffnewPremisesOutcome
                    + diffnewClassificationOutcome
                    + diffnewHealthOutcome
                    + diffnewEquipmentOutcome
                    + diffnewEmployeesOutcome
                    + diffnewManagementOutcome
                    + diffnewOrganizationOutcome;
                console.log("Sum: " + diffnewPremisesOutcome.toFixed(2) + " + " + diffnewClassificationOutcome.toFixed(2) + " + " + diffnewHealthOutcome.toFixed(2) + " + " + diffnewEquipmentOutcome.toFixed(2) + " + " + diffnewEmployeesOutcome.toFixed(2) + " + " + diffnewManagementOutcome.toFixed(2) + " + " + diffnewOrganizationOutcome.toFixed(2));
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
