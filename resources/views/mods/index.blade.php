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
                                <b>A. Management</b>
                                <br>
                                <small>Cooperation in matters of safeguarding and proper handling of
                                    property covered</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-1">
                                        Min
                                        <br>
                                        {{ $submissionMod->min }}
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        {{ $submissionMod->max }}
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
                                <b>B. Location</b>
                                <br>
                                <small>Accessibility, congestion, and exposures</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-1">
                                        Min
                                        <br>
                                        {{ $submissionMod->min }}
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-2" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        {{ $submissionMod->max }}
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value"
                                        id="slider-range-min-amount-2"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control autosize"></textarea>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>C. Building Features</b>
                                <br>
                                <small>Age, condition, and unusual structural features</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-1">
                                        Min
                                        <br>
                                        {{ $submissionMod->min }}
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-3" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        {{ $submissionMod->max }}
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value"
                                        id="slider-range-min-amount-3"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control autosize"></textarea>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>D. Premises &amp; Equipment</b>
                                <br>
                                <small>Care, condition, and type</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-1">
                                        Min
                                        <br>
                                        {{ $submissionMod->min }}
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-4" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        {{ $submissionMod->max }}
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value"
                                        id="slider-range-min-amount-4"></span>
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
                                <small>Selection, training, supervision, and experience</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-1">
                                        Min
                                        <br>
                                        {{ $submissionMod->min }}
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-5" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        {{ $submissionMod->max }}
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value"
                                        id="slider-range-min-amount-5"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control autosize"></textarea>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <b>F. Protection</b>
                                <br>
                                <small>Not otherwise recognized</small>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="col-md-1">
                                        Min
                                        <br>
                                        {{ $submissionMod->min }}
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-6" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        {{ $submissionMod->max }}
                                    </div>
                                </div>
                                <br>
                                <div class="slider-value" style="text-align: center;">
                                    Value:
                                    <span class="slider-value"
                                        id="slider-range-min-amount-6"></span>
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
                                        <button class="btn btn-midnightblue">
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
                                                <span style="color: #37bf8d;"><b>{{ $submissionMod->overall_outcome }}</b></span>
                                            @elseif ($submissionMod->outcome_type_id == 2)
                                                <span style="color: #5394c9;"><b>{{ $submissionMod->overall_outcome }}</b></span>
                                            @elseif ($submissionMod->outcome_type_id == 3)
                                                <span style="color: #e36d4f;"><b>{{ $submissionMod->overall_outcome }}</b></span>
                                            @else
                                                <b>{{ $submissionMod->overall_outcome }}</b>
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
        $(document).ready(function() {
            $("#slider-range-min").slider({
                range: "min",
                value: {{ $submissionMod->management_outcome }},
                min: {{ $submissionMod->min }},
                max: {{ $submissionMod->max }},
                step: 0.01,
                slide: function (event, ui) {
                    $("#slider-range-min-amount").text(ui.value);
                }
            });
            $("#slider-range-min-amount").text($("#slider-range-min").slider("value"));
            $("#slider-range-min-2").slider({
                range: "min",
                value: {{ $submissionMod->location_outcome }},
                min: {{ $submissionMod->min }},
                max: {{ $submissionMod->max }},
                step: 0.01,
                slide: function (event, ui) {
                    $("#slider-range-min-amount-2").text(ui.value);
                }
            });
            $("#slider-range-min-amount-2").text($("#slider-range-min-2").slider("value"));
            $("#slider-range-min-3").slider({
                range: "min",
                value: {{ $submissionMod->building_features_outcome }},
                min: {{ $submissionMod->min }},
                max: {{ $submissionMod->max }},
                step: 0.01,
                slide: function (event, ui) {
                    $("#slider-range-min-amount-3").text(ui.value);
                }
            });
            $("#slider-range-min-amount-3").text($("#slider-range-min-3").slider("value"));
            $("#slider-range-min-4").slider({
                range: "min",
                value: {{ $submissionMod->premises_equipment_outcome }},
                min: {{ $submissionMod->min }},
                max: {{ $submissionMod->max }},
                step: 0.01,
                slide: function (event, ui) {
                    $("#slider-range-min-amount-4").text(ui.value);
                }
            });
            $("#slider-range-min-amount-4").text($("#slider-range-min-4").slider("value"));
            $("#slider-range-min-5").slider({
                range: "min",
                value: {{ $submissionMod->employees_outcome }},
                min: {{ $submissionMod->min }},
                max: {{ $submissionMod->max }},
                step: 0.01,
                slide: function (event, ui) {
                    $("#slider-range-min-amount-5").text(ui.value);
                }
            });
            $("#slider-range-min-amount-5").text($("#slider-range-min-5").slider("value"));
            $("#slider-range-min-6").slider({
                range: "min",
                value: {{ $submissionMod->protection_outcome }},
                min: {{ $submissionMod->min }},
                max: {{ $submissionMod->max }},
                step: 0.01,
                slide: function (event, ui) {
                    $("#slider-range-min-amount-6").text(ui.value);
                }
            });
            $("#slider-range-min-amount-6").text($("#slider-range-min-6").slider("value"));
        });
    </script>
@endpush
