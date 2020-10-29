@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fa fa-home"></i> Dashboard</h1>
    </div>
    <div class="container-fluid">
        <div id="panel-advancedoptions">
            <div class="row">
                <div class="col-md-3">
                    <a class="info-tiles tiles-inverse has-footer" href="#">
                        <div class="tiles-heading">
                            <div class="pull-left">Submissions</div>
                            <div class="pull-right">
                                <div id="tileorders" class="sparkline-block"></div>
                            </div>
                        </div>
                        <div class="tiles-body">
                            <div class="text-center">1,249</div>
                        </div>
                        <div class="tiles-footer">
                            <div class="pull-left">manage submissions</div>
                            <div class="pull-right percent-change">+20.7%</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="info-tiles tiles-green has-footer" href="#">
                        <div class="tiles-heading">
                            <div class="pull-left">Quote</div>
                            <div class="pull-right">
                                <div id="tilerevenues" class="sparkline-block"></div>
                            </div>
                        </div>
                        <div class="tiles-body">
                            <div class="text-center">250</div>
                        </div>
                        <div class="tiles-footer">
                            <div class="pull-left">see all quotes</div>
                            <div class="pull-right percent-change">+17.2%</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="info-tiles tiles-blue has-footer" href="#">
                        <div class="tiles-heading">
                            <div class="pull-left">Refer</div>
                            <div class="pull-right">
                                <div id="tiletickets" class="sparkline-block"></div>
                            </div>
                        </div>
                        <div class="tiles-body">
                            <div class="text-center">598</div>
                        </div>
                        <div class="tiles-footer">
                            <div class="pull-left">see all refer</div>
                            <div class="pull-right percent-change">+10.3%</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="info-tiles tiles-alizarin has-footer" href="#">
                        <div class="tiles-heading">
                            <div class="pull-left">Decline</div>
                            <div class="pull-right">
                                <div id="tilemembers" class="sparkline-block"></div>
                            </div>
                        </div>
                        <div class="tiles-body">
                            <div class="text-center">120</div>
                        </div>
                        <div class="tiles-footer">
                            <div class="pull-left">see all decline</div>
                            <div class="pull-right percent-change">-11.1%</div>
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
                                            <span class="hidden-xs">Submission Per Month</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab-revenues" data-toggle="tab">
                                            <i class="fa fa-bar-chart-o visible-xs"></i> 
                                            <span class="hidden-xs">Outcomes</span>
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
                                    <div class="btn-toolbar pull-right">
                                        <div class="btn-group">
                                            <a href='#' class="btn btn-default dropdown-toggle" data-toggle='dropdown'>
                                                <i class="fa fa-cloud-download visible-xs"></i>
                                                <span class="hidden-xs">Export as </span> 
                                                <i class="fas fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Text File (*.txt)</a></li>
                                                <li><a href="#">Excel File (*.xlsx)</a></li>
                                                <li><a href="#">PDF File (*.pdf)</a></li>
                                            </ul>
                                        </div>
                                    </div>
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
	<script src="{{ asset('plugins/easypiechart/jquery.easypiechart.js') }}"></script> <!-- EasyPieChart -->
	<script src="{{ asset('plugins/switchery/switchery.js') }}"></script> <!-- Switchery -->
	<script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script> <!-- FullCalendar -->

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

	<script src="{{ asset('demo/demo-index.js') }}"></script> <!-- Initialize scripts for this page-->

    <script>
        $(document).ready(function() {
            
        });
    </script>
@endpush
