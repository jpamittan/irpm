@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fa fa-fw fa-cog"></i> Mods</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-12" style="padding: 0px 20px 20px 20px;">
                    <a href="{{ route('submissions.details', ['submissionId' => $submission->id]) }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
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
                                        0.96
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        1.08
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
                                        0.97
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-2" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        1.07
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
                                        0.99
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-3" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        1.05
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
                                        0.99
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-4" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        1.05
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
                                        0.99
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-5" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        1.03
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
                                        1
                                    </div>
                                    <div class="col-md-10">
                                        <div id="slider-range-min-6" class="slider danger"></div>
                                    </div>
                                    <div class="col-md-1">
                                        Max
                                        <br>
                                        1.02
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
                                        <button class="btn btn-midnightblue"><i
                                                class="fa fa-calculator"></i>
                                            Calculate</button>
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
                                            <span class="text-success"><b>0.98</b></span>
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
                                            <span class="text-success"><b>Quote</b></span>
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
                                        <input type="text" class="form-control" value="Jay" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        Last name:
                                        <br>
                                        <input type="text" class="form-control" value="Josselyn" readonly>
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
                                        <form action="mods.html" class="dropzone"></form>
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
                                        <a href="submissionDetails.html" class="btn btn-danger"
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
    <script src="{{ asset('plugins/form-daterangepicker/daterangepicker.js') }}"></script> <!-- Date Range Picker -->
	<script src="{{ asset('plugins/form-daterangepicker/moment.min.js') }}"></script> <!-- Moment.js for Date Range Picker -->
	<script src="{{ asset('plugins/easypiechart/jquery.easypiechart.js') }}"></script> <!-- EasyPieChart -->
	<!-- Charts -->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.min.js') }}"></script> <!-- Flot Main File -->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.stack.min.js') }}"></script> <!-- Flot Stacked Charts Plugin -->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.orderBars.min.js') }}"></script> <!-- Flot Ordered Bars Plugin-->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.resize.min.js') }}"></script> <!-- Flot Responsive -->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.tooltip.min.js') }}"></script> <!-- Flot Tooltips -->
	<!-- Maps -->
	<script src="{{ asset('plugins/jQuery-Mapael/js/raphael/raphael-min.js') }}"></script> <!-- Load Raphael as Dependency -->
	<script src="{{ asset('plugins/jQuery-Mapael/js/jquery.mapael.js') }}"></script> <!-- jQuery Mapael -->
	<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.min.js') }}"></script> <!-- MouseWheel Support -->
	<script src="{{ asset('plugins/jQuery-Mapael/js/maps/world_countries.js') }}"></script>
	<script src="{{ asset('plugins/jQuery-Mapael/js/maps/usa_states.js') }}"></script> <!-- Vector Data of USA States -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
	<script src="{{ asset('demo/demo-jqueryui-slider.js') }}"></script>
	<script src="{{ asset('plugins/dropzone/dropzone.min.js') }}"></script> <!-- Dropzone Plugin -->
    <script>
        $(document).ready(function() {
            
        });
    </script>
@endpush
