@extends('layouts.master')

@push('css')
    <link href="{{ asset('plugins/switchery/switchery.css') }}" type="text/css" rel="stylesheet"> <!-- Switchery -->
@endpush

@section('content')
    <div class="page-heading">
        <h1><i class="fa fa-home"></i> Dashboard</h1>
    </div>
    <div class="container-fluid">
        <div id="panel-advancedoptions">
            <div class="row">
                <div class="col-md-3">
                    <a class="info-tiles tiles-inverse has-footer" href="{{ route('submissions.index') }}">
                        <div class="tiles-heading">
                            <div class="pull-left">Total Unique Submissions</div>
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="tiles-body">
                            <div class="text-center">{{ number_format($quoteCount + $referCount + $declineCount) }}</div>
                        </div>
                        <div class="tiles-footer">
                            <div class="pull-left">Manage submissions</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="info-tiles tiles-green has-footer" href="{{ route('submissions.filter', ['outcomeTypeId' => 1]) }}">
                        <div class="tiles-heading">
                            <div class="pull-left">Total Latest Version Quote</div>
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="tiles-body">
                            <div class="text-center">{{ number_format($quoteCount) }}</div>
                        </div>
                        <div class="tiles-footer">
                            <div class="pull-left">See all quotes</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="info-tiles tiles-blue has-footer" href="{{ route('submissions.filter', ['outcomeTypeId' => 2]) }}">
                        <div class="tiles-heading">
                            <div class="pull-left">Total Latest Version Refer</div>
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="tiles-body">
                            <div class="text-center">{{ number_format($referCount) }}</div>
                        </div>
                        <div class="tiles-footer">
                            <div class="pull-left">See all refer</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="info-tiles tiles-alizarin has-footer" href="{{ route('submissions.filter', ['outcomeTypeId' => 3]) }}">
                        <div class="tiles-heading">
                            <div class="pull-left">Total Latest Version Decline</div>
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="tiles-body">
                            <div class="text-center">{{ number_format($declineCount) }}</div>
                        </div>
                        <div class="tiles-footer">
                            <div class="pull-left">See all decline</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default panel-btn-focused" id="p1"
                        data-widget-editbutton="false">
                        <div class="panel-heading">
                            <h2>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab-visitor" data-toggle="tab">
                                            <i class="fa fa-user visible-xs"></i> 
                                            <span class="hidden-xs">Submissions Per Day</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab-revenues" data-toggle="tab">
                                            <i class="fa fa-bar-chart-o visible-xs"></i> 
                                            <span class="hidden-xs">Submissions Per Month</span>
                                        </a>
                                    </li>
                                </ul>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="clearfix">
                                    <button class="btn btn-default pull-left" id="daterangepicker2">
                                        <i class="fa fa-calendar visible-xs"></i>
                                        <span class="hidden-xs" style="text-transform: uppercase;">
                                            <?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?>
                                        </span> 
                                        <i class="fas fa-angle-down"></i>
                                    </button>
                                </div>
                                <div id="tab-visitor" class="tab-pane active">
                                    <div id="visitors-stats" style="height:250px;"
                                        class="demo-graph graph-1"></div>
                                </div>
                                <div id="tab-revenues" class="tab-pane">
                                    <div id="revenues-stats" style="height: 250px;"
                                        class="demo-graph graph-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-btn-focused" id="p2">
                                <div class="panel-heading">
                                    <h2>Submission By State</h2>
                                </div>
                                <div class="panel-body bg-gray">
                                    <div class="map-world">
                                        <div class="row mb20">
                                            <div class="map col-md-12">
                                                <span>USA Map</span>
                                            </div>
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
	<script src="{{ asset('plugins/switchery/switchery.js') }}"></script> <!-- Switchery -->
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
    <script>
        $(document).ready(function() {
            //------------------------------
            // Date Range Picker
            //------------------------------
            $('#daterangepicker2').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                opens: 'right',
                startDate: moment().subtract('days', 29),
                endDate: moment()
            },
            function(start, end) {
                $('#daterangepicker2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });
            //------------------------------
            // Maps
            //------------------------------
            $mapusa = $(".map-world");
            $mapusa.mapael({
                map : {
                    name : "usa_states",
                    zoom: {
                        enabled: false,
                        maxLevel : 10
                    }
                },
                plots: {
                    'ny' : {
                        latitude: 40.717079,
                        longitude: -74.00116,
                        value : 200001,
                        tooltip: {content : "New York<br />Submissions: 530,000,000"}
                    },
                    'io' : {
                        latitude :42.032974, 
                        longitude :-93.581543, 
                        value : 500000000, 
                        tooltip: {content : "Iowa<br />Submissions: 500,000,000"}
                    },
                    'sf' : {
                        latitude: 37.792032,
                        longitude: -122.394613,
                        value : 12000, 
                        tooltip: {content : "San Francisco<br />Submissions: 600,000"}
                    },
                    'pa' : {
                        latitude: 19.493204,
                        longitude: -154.8199569,
                        value : 450, 
                        tooltip: {content : "Pahoa<br />Submissions: 600,000"}
                    },
                    'lo' : {
                        latitude :30.391830, 
                        longitude :-92.329102, 
                        value : 600000, 
                        tooltip: {content : "Louisiana<br />Submissions: 600,000"}
                    },
                    'mo' : {
                        latitude :46.965260, 
                        longitude :-109.533691, 
                        value : 200000001, 
                        tooltip: {content : "Montana<br />Submissions: 200,000,001"}
                    },
                    'or': {
                        latitude :44.000000, 
                        longitude :-120.500000, 
                        value : 200001, 
                        tooltip: {content : "Oregon<br />Submissions: 200,001"}
                    }
                }
            });
            //------------------------------
            // Flot
            //------------------------------
            var d1 = [];
            for (var i = 0; i <= 30; i += 1) {
                d1.push([i, parseInt(Math.random() * 70 + 135)]);
            }
            var d2 = [];
            for (var i = 0; i <= 30; i += 1) {
                d2.push([i, parseInt(Math.random() * 20) + 5]);
            }
            var d3 = [];
            for (var i = 0; i <= 30; i += 1) {
                d3.push([i, parseInt(Math.random() * 70 + 40)]);
            }
            var stack = false,
                bars = true,
                lines = true,
                steps = false;
            function plotWithOptions() {
                $.plot("#visitors-stats", [{
                        data: d1, 
                        label: "Quote",
                        lines: {
                            show: lines,
                            fill: 0.1,
                            steps: steps,
                            lineWidth: 1.25
                        },
                        points: {
                            show: true,
                            radius: 2.5
                        }
                    }, {
                        data: d2, 
                        label: "Refer",
                        lines: {
                            show: lines,
                            fill: 0.1,
                            steps: steps,
                            lineWidth: 1.25
                        },
                        points: {
                            show: true,
                            radius: 2.5
                        }
                    }, {
                        data: d3, 
                        label: "Decline",
                        lines: {
                            show: lines,
                            fill: 0.1,
                            steps: steps,
                            lineWidth: 1.25
                        },
                        points: {
                            show: true,
                            radius: 2.5
                        }
                    }], {
                    series: {
                        shadowSize: 0,
                        stack: stack
                    },
                    grid: {
                        labelMargin: 10,
                        hoverable: true,
                        clickable: true,
                        borderWidth: 0,
                        borderColor: 'rgba(0, 0, 0, 0.06)'
                    },
                    yaxis: { 
                        tickColor: 'rgba(0, 0, 0, 0.04)', 
                        font: {
                            color: 'rgba(0, 0, 0, 0.4)'
                        }
                    },
                    xaxis: { 
                        tickColor: 'rgba(0, 0, 0, 0.04)',
                        tickDecimals: 0,
                        ticks: 20,
                        font: {
                            color: 'rgba(0, 0, 0, 0.4)'
                        }
                    },
                    colors: ["#52cda0", "#72a7d3", "#e98a72"],
                    tooltip: true,
                    tooltipOpts: {
                        content: "%s: %y"
                    }
                });
            }
            plotWithOptions();
            // flot 2
            var do1 = [];
            var do2 = [];
            var do3 = [];
            for (var i = 1; i < 13; i++) {
                do1.push([i, parseInt(Math.random() * 30 + 20)]);
                do2.push([i, parseInt(Math.random() * 30 + 10)]);
                do3.push([i, parseInt(Math.random() * 10 + 10)]);
            }
            var dos = new Array();
            dos.push({
                data:do1,
                label: "Quote",
                bars: {
                    show: true,
                    barWidth: 0.125,
                    lineWidth: 1,
                    fill: 0.4,
                    order: 1
                }
            });
            dos.push({
                data:do2,
                label: "Refer",
                bars: {
                    show: true,
                    barWidth: 0.125,
                    lineWidth: 1,
                    fill: 0.4,
                    order: 2,
                }
            });
            dos.push({
                data:do3,
                label: "Decline",
                bars: {
                    show: true,
                    barWidth: 0.1,
                    lineWidth: 1,
                    fill: 0.4,
                    order: 3,
                }
            });
            var stack = false,
                bars = true,
                lines = true,
                steps = false;
            function plotWithOptions2() {
                $.plot($("#revenues-stats"), dos, {
                    series: {
                        bars: {
                            show: true,
                            //lineWidth: 0.75
                        }
                    },
                    grid: {
                        labelMargin: 10,
                        hoverable: true,
                        clickable: true,
                        tickColor: 'rgba(0, 0, 0, 0.06)',
                        borderWidth: 0,
                        borderColor: 'rgba(0, 0, 0, 0.06)'
                    },
                    colors: ["#52cda0", "#72a7d3", "#e98a72"],
                    tooltip: true,
                    tooltipOpts: {
                        content: "%s: %y"
                    },
                    xaxis: {
                        autoscaleMargin: 0.05,
                        tickColor: 'rgba(0, 0, 0, 0.00)',
                        ticks: [[1, "Jan"], [2, "Feb"], [3, "Mar"], [4, "Apr"],[5, "May"], [6, "Jun"], [7, "Jul"], [8, "Aug"],[9, "Sep"], [10, "Oct"], [11, "Nov"], [12, "Dec"]],
                        tickDecimals: 0,
                        font: {
                            color: 'rgba(0, 0, 0, 0.4)'
                        }
                    },
                    yaxis: {
                        tickColor: 'rgba(0, 0, 0, 0.04)',
                        font: {
                            color: 'rgba(0, 0, 0, 0.4)'
                        },
                        tickFormatter: function (val, axis) {
                            return val;
                        }
                    },
                });
            }
            plotWithOptions2();
        });
    </script>
@endpush
