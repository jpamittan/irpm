@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fas fa-university"></i> Automated Clearing House</h1>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <a href="{{ route('dashboard.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
            </div>
        </div>

        <div id="panel-advancedoptions">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-ctrls panel-ctrls-limit">
                            </div>
                        </div>
                        <div class="panel-body panel-no-padding">
                            <table id="ach" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>NIPR</th>
                                        <th>FEIN</th>
                                        <th>Routing Number</th>
                                        <th>Account Number</th>
                                        <th>Modified By</th>
                                        <th>Date Modified</th>
                                        <th style="width: 150px; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
	<script src="{{ asset('plugins/form-daterangepicker/moment.min.js') }}"></script> <!-- Moment.js for Date Range Picker -->
    <!-- DataTable -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#ach').dataTable({
                language: {
                    lengthMenu: "_MENU_",
                    searchPlaceholder: "Search..."
                },
                iDisplayLength: 20,
                processing: true,
                serverSide: true,
                ajax: "{{ route('ach.datatables') }}",
                order: [
                    [ 0, "asc" ]
                ],
                columns: [
                    { data: 'agent_name', name: 'AgentName' },
                    { data: 'nipr', name: 'NIPR' },
                    { data: 'fein', name: 'FEIN' },
                    { data: 'routing_number' },
                    { data: 'account_number' },
                    { data: 'modified_by' },
                    { data: 'modified_at' },
                    {
                        data: 'id',
                        name: 'EntityId',
                        render: function (data, type, row) {
                            return `<a href="/ach/details/${data}"><button class="btn btn-small btn-info" style="width: 100%;">Update</button></a>`;
                        }
                    }
                ]
            });
            $('.panel-ctrls-limit').append("&nbsp;&nbsp;Page Limit");
            $('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
            $('.panel-ctrls').append("<i class='separator'></i>");
            $('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");
            $('.panel-footer').append($(".dataTable+.row"));
            $('.dataTables_paginate>ul.pagination').addClass("pull-right m0");
        });
    </script>
@endpush
