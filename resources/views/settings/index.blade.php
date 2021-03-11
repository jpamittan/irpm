@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fas fa-cogs"></i> Account Settings</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-12" style="padding: 0px 20px 20px 20px;">
                    <a href="{{ route('dashboard.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
                </div>
            </div>
            <div id="user-msg" style="padding: 10px;"></div>
            <div class="col-md-12">
                <div id="panel-advancedoptions">
                    <div class="panel panel-default" data-widget-editbutton="false" id="p1">
                        <form action="{{ route('settings.savePassword', ['user' => $user->id]) }}" class="form-horizontal row-border" method="post">
                            @csrf
                            <div class="panel-heading">
                                <h2><i class="fas fa-key"></i> Change Password</h2>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Verify Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="verify_password" id="verify_password" required>
                                    </div>
                                </div>
                                <div class="form-group" id="pwd-msg-container" style="display: none;">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8" id="password-msg-label"></div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn-primary btn" id="changepass-btn"><i class="fas fa-key"></i> Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="panel-advancedoptions">
                    <div class="panel panel-default" data-widget-editbutton="false" id="p1">
                        <form action="{{ route('settings.saveEnvironment', ['user' => $user->id]) }}" class="form-horizontal row-border" method="post">
                            @csrf
                            <div class="panel-heading">
                                <h2>Environment Configuration</h2>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        <i class="fas fa-database"></i> Environment Connection
                                    </label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="db_connection" required>
                                            @foreach ($environments as $env)
                                                <optgroup label="{{ $env['name'] }}">
                                                    @foreach ($env['connections'] as $key => $value)
                                                        @if ($key == $user->db_connection)
                                                            <option value="{{ $key }}" selected>{{ $value }} *</option>
                                                        @else
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn-primary btn"><i class="fas fa-save"></i> Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const save = urlParams.get('save');
            if (save === "1") {
                setNotif('success', '<i class="fas fa-check"></i>&nbsp; Account settings udpated successfully.');
            } else if (save === "0") {
                setNotif('danger', '<i class="fa fa-fw fa-times"></i>&nbsp; An error has occured. Please try again.');
            }
            $("#password, #verify_password").keyup(checkPasswordMatch);
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
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#verify_password").val();
            if (password && confirmPassword) {
                if (password != confirmPassword) {
                    $('#changepass-btn').prop('disabled', true);
                    $('#pwd-msg-container').show();
                    $("#password-msg-label").html("<span class='text-danger'><i class='fas fa-key'></i> Passwords do not match!</span>");
                } else {
                    $('#changepass-btn').prop('disabled', false);
                    $("#password-msg-label").html("<span class='text-success'><i class='fas fa-key'></i> Passwords match.</span>");
                }
            } else {
                $('#pwd-msg-container').hide();
            }
        }
    </script>
@endpush
