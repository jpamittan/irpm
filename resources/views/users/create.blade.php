@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fas fa-users"></i> Create User</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <a href="{{ route('users.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
            </div>
        </div>
        <div id="panel-advancedoptions">
            <div class="panel panel-default" data-widget-editbutton="false" id="p1">
                <form action="{{ route('users.createPost') }}" class="form-horizontal row-border" method="post">
                    @csrf
                    <div class="panel-heading">
                        <h2>Create User Form</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
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
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Admin</label>
                            <div class="col-sm-8">
                                <label class="radio icheck">
                                    <input type="radio" name="is_admin" value="0" checked>
                                    No
                                </label>
                                <label class="radio icheck">
                                    <input type="radio" name="is_admin" value="1">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn-primary btn" id="create-btn"><i class="fas fa-save"></i> Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
    <script src="{{ asset('plugins/switchery/switchery.js') }}"></script> <!-- Switchery -->
    <script>
        $(document).ready(function() {
            $("#password, #verify_password").keyup(checkPasswordMatch);
        });
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#verify_password").val();
            if (password && confirmPassword) {
                if (password != confirmPassword) {
                    $('#create-btn').prop('disabled', true);
                    $('#pwd-msg-container').show();
                    $("#password-msg-label").html("<span class='text-danger'><i class='fas fa-key'></i> Passwords do not match!</span>");
                } else {
                    $('#create-btn').prop('disabled', false);
                    $("#password-msg-label").html("<span class='text-success'><i class='fas fa-key'></i> Passwords match.</span>");
                }
            } else {
                $('#pwd-msg-container').hide();
            }
        }
    </script>
@endpush
