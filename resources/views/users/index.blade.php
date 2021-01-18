@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fas fa-users"></i> Users</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <a href="{{ route('dashboard.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
            </div>
        </div>
        <div id="user-msg"></div>
        <div id="panel-advancedoptions">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ route('users.create') }}" style="width: 100px;display: inline-block;">
                                <button class="btn btn-small btn-indigo" style="width: 100%;">
                                    <i class="fas fa-user-plus"></i> Create
                                </button>
                            </a>
                            <div class="panel-ctrls panel-ctrls-limit">
                            </div>
                        </div>
                        <div class="panel-body panel-no-padding">
                            <table id="users" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 120px;">ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Admin</th>
                                        <th style="width: 120px;">Status</th>
                                        <th>Created At</th>
                                        <th style="width: 150px; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->admin }}</td>
                                            <td>{{ $user->status_label }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                                    <button class="btn btn-small btn-primary" style="width: 100%;"><i class="fas fa-pencil-alt"></i> Edit</button>
                                                </a>
                                            </td>
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
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
    <script src="{{ asset('plugins/switchery/switchery.js') }}"></script> <!-- Switchery -->
    <!-- DataTable -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#users').dataTable({
                language: {
                    lengthMenu: "_MENU_",
                    searchPlaceholder: "Search..."
                },
                iDisplayLength: 20,
                order: [[ 1, "desc" ]]
            });
            $('.panel-ctrls-limit').append("&nbsp;&nbsp;Limit");
            $('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
            $('.panel-ctrls').append("<i class='separator'></i>");
            $('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");
            $('.panel-footer').append($(".dataTable+.row"));
            $('.dataTables_paginate>ul.pagination').addClass("pull-right m0");
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const created = urlParams.get('created');
            const updated = urlParams.get('updated');
            const changepassword = urlParams.get('changepassword');
            const deleted = urlParams.get('deleted');
            const error = urlParams.get('error');
            if (created === "1") {
                setNotif('success', '<i class="fas fa-check"></i>&nbsp; User added successfully.');
            }
            if (updated === "1") {
                setNotif('success', '<i class="fas fa-check"></i>&nbsp; User updated successfully.');
            }
            if (changepassword === "1") {
                setNotif('success', '<i class="fas fa-check"></i>&nbsp; User\'s password changed successfully.');
            }
            if (deleted === "1") {
                setNotif('success', '<i class="fas fa-check"></i>&nbsp; User deleted successfully.');
            }
            if (error === "1") {
                setNotif('danger', '<i class="fa fa-fw fa-times"></i>&nbsp; An error has occured. Please try again.');
            }
        });
        function setNotif(type, msg) {
            $('#user-msg').html(
                '<div class="row">'+
                    '<div class="col-md-12" style="margin-bottom: 20px;">'+
                        '<div class="form-group">'+
                            '<div class="col-xs-12" style="padding: 0;">'+
                                '<div class="alert alert-dismissable alert-'+type+'" style="margin: 0;">'+
                                    msg +
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
        }
    </script>
@endpush
