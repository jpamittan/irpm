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
                                                <td><span class="text-primary">2 - 1</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Insured: </b></td>
                                                <td><span class="text-primary">Patrick Jones</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Agency: </b></td>
                                                <td><span class="text-primary">Test agency</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Agent: </b></td>
                                                <td><span class="text-primary">Test agent</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Program: </b></td>
                                                <td><span class="text-primary">gig-BOP</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>State: </b></td>
                                                <td><span class="text-primary">ME</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="options">
                                    <div class="btn-toolbar" style="text-align: right;">
                                        <a href="{{ route('mods.index') }}" class="btn btn-default"><i class="fa fa-fw fa-cog"></i> Mods</a>
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
                                                        <th style="width: 150px;">Outcome</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="odd">
                                                        <td>uwq_002</td>
                                                        <td>Management Experience</td>
                                                        <td>Less than 3 years in Industry</td>
                                                        <td>-1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>uwq_022</td>
                                                        <td>ManufactureLabelUnderContract</td>
                                                        <td>Others</td>
                                                        <td>-1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>uwq_001</td>
                                                        <td>YearsInBusiness</td>
                                                        <td>12 months - 35 months</td>
                                                        <td>0</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>API_018</td>
                                                        <td>Sprinkler system</td>
                                                        <td>false</td>
                                                        <td>0</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>uwq_174</td>
                                                        <td>RefrigerationContractSnackYN</td>
                                                        <td>Y</td>
                                                        <td>1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>API_012</td>
                                                        <td># of liens & judgments</td>
                                                        <td>0</td>
                                                        <td>1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>API_013</td>
                                                        <td>Prior litigation history</td>
                                                        <td>0</td>
                                                        <td>1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>API_014</td>
                                                        <td>OSHA</td>
                                                        <td>0</td>
                                                        <td>1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>uwq_024</td>
                                                        <td>AllergyIngredientsYN</td>
                                                        <td>N</td>
                                                        <td>1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>uwq_026</td>
                                                        <td>CulinarySchoolTrainingYN</td>
                                                        <td>Y</td>
                                                        <td>1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>uwq_027</td>
                                                        <td>RefrigerationEquipmentMaintainedServicedYN</td>
                                                        <td>Y</td>
                                                        <td>1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>uwq_028</td>
                                                        <td>DiacetylYN</td>
                                                        <td>N</td>
                                                        <td>1</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>uwq_031</td>
                                                        <td>OnlineOverNinetyPCT</td>
                                                        <td>N</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>uwq_032</td>
                                                        <td>SellCannabisMarijuanaRelatedProductsYN</td>
                                                        <td>N</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>uwq_033</td>
                                                        <td>SellHempCBDRelatedProductsYN</td>
                                                        <td>N</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>uwq_037</td>
                                                        <td>SellVapingProductsSuppliesYN</td>
                                                        <td>N</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>uwq_046</td>
                                                        <td>OnlineSalesYN</td>
                                                        <td>N</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>uwq_172</td>
                                                        <td>SellAlcoholYN</td>
                                                        <td>N</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>uwq_025</td>
                                                        <td>ProductsLabelWarningYN</td>
                                                        <td>Y</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>uwq_023</td>
                                                        <td>FoodBeverageHumanConsumptionYN</td>
                                                        <td>Y</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
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
   
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
	<script src="{{ asset('demo/demo-datatables.js') }}"></script> <!-- Initialize scripts for this page-->

    <script>
        $(document).ready(function() {
            
        });
    </script>
@endpush
