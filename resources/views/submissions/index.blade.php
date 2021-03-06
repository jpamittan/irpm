@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fa fa-briefcase"></i> Submissions</h1>
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
                            <table id="submission" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 120px;">Submission ID</th>
                                        <th style="width: 80px;">Version</th>
                                        <th>Business Name</th>
                                        <th style="width: 200px;">Line of Business</th>
                                        <th style="width: 200px;">Underwriter Name</th>
                                        <th style="width: 120px;">Outcome</th>
                                        <th style="width: 180px;">Date submission</th>
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
            $('#submission').dataTable({
                language: {
                    lengthMenu: "_MENU_",
                    searchPlaceholder: "Search..."
                },
                iDisplayLength: 20,
                processing: true,
                serverSide: true,
                ajax: "{{ route('submissions.datatables') }}",
                order: [
                    [ 6, "desc" ]
                ],
                columns: [
                    { data: 'submission_id', name: 'submissions.submission_id' },
                    { data: 'version', name: 'submissions.version' },
                    { data: 'business_name', name: 'submissions.business_name' },
                    { data: 'line_of_business', name: 'submissions.line_of_business' },
                    {
                        data: 'agent',
                        name: 'submissions.agent',
                        render: function (data, type, row) {
                            return (data) ? data : "N/A";
                        }
                    },
                    {
                        data: 'description',
                        name: 'outcome_type.description',
                        render: function (data, type, row) {
                            if (data == 'Quote') {
                                return `<b style="color: #37bf8d;">${data}</b>`;
                            } else if (data == 'Refer') {
                                return `<b style="color: #5394c9;">${data}</b>`;
                            } else if (data == 'Decline') {
                                return `<b style="color: #e36d4f;">${data}</b>`;
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'submissions.created_at',
                        render: function (data, type, row) {
                            if (data) {
                                return moment(data).format('MM/DD/YYYY hh:mm A');
                            }
                            return data;
                        }
                    },
                    {
                        data: 'id',
                        name: 'submissions.id',
                        render: function (data, type, row) {
                            return `<a href="/submissions/details/${data}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>`;
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
