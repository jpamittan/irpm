@extends('layouts.master')

@push('css')
    <link href="{{ asset('plugins/switchery/switchery.css') }}" type="text/css" rel="stylesheet"> <!-- Switchery -->
    <link href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <style>
        .datepicker {
            width: 200px !important;
        }
        #daterangepicker3 {
            padding-top: 0;
            padding-bottom: 0;
        }
        #yearpicker {
            background-color: transparent !important;
            border: 0 !important;
            padding: 0 !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
            width: 30px;
            display: inline-block;
            text-align: center;
        }
        input[readonly] {
            cursor: pointer !important;
        }
    </style>
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
                                        <a href="#tab-visitor" id="tab-visitor-link" data-toggle="tab">
                                            <i class="fa fa-user visible-xs"></i> 
                                            <span class="hidden-xs">Submissions Per Day</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="#tab-revenues" id="tab-revenues-link" data-toggle="tab">
                                            <i class="fa fa-bar-chart-o visible-xs"></i> 
                                            <span class="hidden-xs">Submissions Per Month</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="clearfix">
                                    <button class="btn btn-default pull-left" id="daterangepicker2" style="display: block;">
                                        <i class="fa fa-calendar visible-xs"></i>
                                        <span class="hidden-xs" style="text-transform: uppercase;">
                                            <?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?>
                                        </span> 
                                        <i class="fas fa-angle-down"></i>
                                    </button>
                                    <button class="btn btn-default pull-left" id="daterangepicker3" style="display: none;">
                                        YEAR
                                        <input type="text" class="form-control" id="yearpicker" value="<?php echo date("Y"); ?>" readonly>
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
                                    <h2>Submission By Location</h2>
                                </div>
                                <div class="panel-body bg-gray">
                                    <div class="map-usa">
                                        <div class="row">
                                            <div class="map col-md-12">
                                                <span>USA Map</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mt20">
                                                    <div class="plotLegend">
                                                        <span></span>
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
    <!-- Bootstrap Datepicker -->
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            let lastDateRange = null;
            let lastYear = null;
            let connection = '{{ $connection }}';
            $('#tab-visitor-link').click(() => {
                $("#daterangepicker2").show();
                $("#daterangepicker3").hide();
            });
            $('#tab-revenues-link').click(() => {
                $("#daterangepicker2").hide();
                $("#daterangepicker3").show();
            });
            //------------------------------
            // Year Picker
            //------------------------------
            $("#daterangepicker3").click(() => {
                $("#yearpicker").focus();
            });
            $("#yearpicker").datepicker({
                autoclose: true,
                format: " yyyy",
                viewMode: "years",
                minViewMode: "years"
            });

            //------------------------------
            // Date Range Picker
            //------------------------------
            $('#daterangepicker2').daterangepicker({
                showDropdowns: true,
                // format: 'MM ,YYYY',
                opens: 'down',
                startDate: moment().startOf('month'),
                endDate: moment().endOf('month')
            },
            function(start, end) {
                lastDateRange = start.format('MMMM DD, YYYY') + ' - ' + end.format('MMMM DD, YYYY');
                $('#daterangepicker2 span').html(lastDateRange);
                //------------------------------
                // Flot
                //------------------------------
                // flot 1 line
                $.ajax({
                    type: 'GET',
                    url: `/api/${connection}/reports/line?month=${start.format('MM')}&year=${start.format('YYYY')}`,
                    accepts: {
                        text: "application/json"
                    },
                    dataType: 'json',
                    success: function(res) {
                        let lineObj = {};
                        res.map(rec => {
                            if (!lineObj.hasOwnProperty(rec.day.toString())) {
                                lineObj[rec.day.toString()] = {
                                    quote: 0,
                                    refer: 0,
                                    decline: 0
                                }
                            }
                            if (rec.outcome_type_id == 1) {
                                lineObj[rec.day.toString()].quote += rec.total;
                            }
                            if (rec.outcome_type_id == 2) {
                                lineObj[rec.day.toString()].refer += rec.total;
                            }
                            if (rec.outcome_type_id == 3) {
                                lineObj[rec.day.toString()].decline += rec.total;
                            }
                        });
                        var d1 = [],
                            d2 = [],
                            d3 = [];
                        for (var key in lineObj) {
                            if (lineObj.hasOwnProperty(key)) {
                                d1.push([
                                    parseInt(key),
                                    lineObj[key].quote
                                ]);
                                d2.push([
                                    parseInt(key),
                                    lineObj[key].refer
                                ]);
                                d3.push([
                                    parseInt(key),
                                    lineObj[key].decline
                                ]);
                            }
                        }
                        function sortFunction(a, b) {
                            if (a[0] === b[0]) {
                                return 0;
                            } else {
                                return (a[0] < b[0]) ? -1 : 1;
                            }
                        }
                        d1.sort(sortFunction);
                        d2.sort(sortFunction);
                        d3.sort(sortFunction);
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
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
            }).on('hide.daterangepicker', function (ev, picker) {
                $('.table-condensed tbody tr:nth-child(2) td').click();
                alert(picker.startDate.format('MM/YYYY'));
            });
            //------------------------------
            // Maps
            //------------------------------
            $.ajax({
                type: 'GET',
                url: `/api/${connection}/reports/map`,
                accepts: {
                    text: "application/json"
                },
                dataType: 'json',
                success: function(res) {
                    let plotObj = {};
                    res.map((loc, index) => {
                        plotObj[`${(loc.state).toLowerCase()}_${index}`] = {
                            latitude: parseFloat(loc.latitude),
                            longitude: parseFloat(loc.longitude),
                            value: parseFloat(loc.total),
                            tooltip: {
                                content: `${loc.city}<br />Submissions: ${loc.total}`
                            }
                        }
                    });
                    $mapusa = $(".map-usa");
                    $mapusa.mapael({
                        map: {
                            name : "usa_states",
                            zoom: {
                                enabled: false
                            }
                        },
                        legend: {
                            plot: {
                                display : true,
                                title :"Legend", 
                                slices: [
                                    {
                                        max :50,
                                        attrs : {
                                            fill : "#9dfd9a"
                                        },
                                        attrsHover :{
                                            transform : "s1.5",
                                            "stroke-width" : 1
                                        }, 
                                        label :"Less than 50 submissions",
                                        size : 5
                                    },
                                    {
                                        min :50,
                                        max :100,
                                        attrs : {
                                            fill : "#6ce7ff"
                                        },
                                        attrsHover :{
                                            transform : "s1.5",
                                            "stroke-width" : 1
                                        },
                                        label :"Between 50 and 100 submissions",
                                        size : 15
                                    },
                                    {
                                        min :100,
                                        attrs : {
                                            fill : "#d3baff"
                                        },
                                        attrsHover :{
                                            transform : "s1.5",
                                            "stroke-width" : 1
                                        },
                                        label :"More than 100 submissions",
                                        size : 20
                                    }
                                ]
                            }
                        },
                        plots: plotObj
                    });
                },
                error: function(res) {
                    console.log(res);
                }
            });
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
