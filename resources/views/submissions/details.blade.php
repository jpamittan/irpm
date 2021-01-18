@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fa fa-briefcase"></i> Submission Review</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-12" style="padding: 0px 20px 20px 20px;">
                    <a href="{{ route('submissions.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-profile">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-responsive table-userinfo">
                                    <table class="table table-condensed" style="margin: 0;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 120px;"><b>Submission ID: </b></td>
                                                <td><span class="text-primary">{{ $submission->submission_id }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Version: </b></td>
                                                <td><span class="text-primary">{{ $submission->version }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Insured: </b></td>
                                                <td><span class="text-primary">{{ $submission->business_name ?? "N/A" }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Agency: </b></td>
                                                <td><span class="text-primary">{{ $submission->agency ??  "N/A" }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Agent: </b></td>
                                                <td><span class="text-primary">{{ $submission->agent ??  "N/A" }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Program: </b></td>
                                                <td><span class="text-primary">{{ $submission->line_of_business ??  "N/A" }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>State: </b></td>
                                                <td><span class="text-primary">{{ $submission->operating_in }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="options">
                                    <div class="btn-toolbar" style="text-align: right;">
                                        <a href="{{ route('mods.index', ['submissionId' => $submission->id]) }}" class="btn btn-default"><i class="fa fa-fw fa-cog"></i> Mods</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div id="panel-advancedoptions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-ctrls">
                                            </div>
                                        </div>
                                        <div class="panel-body panel-no-padding">
                                            <table id="submissionDetails" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 150px;">Question No</th>
                                                        <th>Question Description</th>
                                                        <th style="width: 400px;">Answer</th>
                                                        <th style="width: 80px;">Score</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($submissionReviews as $review)
                                                        <tr class="odd">
                                                            <td>{{ $review->question_id }}</td>
                                                            <td>{{ $review->question_text }}</td>
                                                            <td>{{ $review->answer_text }}</td>
                                                            <td>{{ $review->answer_value }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="panel-footer"></div>
                                        </div>
                                    </div>
                                </div>
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
    <!-- Switchery -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#submissionDetails').dataTable({
                "language": {
                    "lengthMenu": "_MENU_"
                },
                'iDisplayLength': 20,
                "paging": false,
                "order": [[ 3, "desc" ]]
            });
            $('.panel-ctrls-limit').append("&nbsp;&nbsp;Limit");
            $('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
            $('.panel-ctrls').append("<i class='separator'></i>");
            $('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");
            $('.panel-footer').append($(".dataTable+.row"));
            $('.dataTables_paginate>ul.pagination').addClass("pull-right m0");
        });
    </script>
@endpush
