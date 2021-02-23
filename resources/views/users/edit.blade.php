@extends('layouts.master')

@push('css')
    <link href="{{ asset('plugins/iCheck/skins/square/_all.css') }}" type="text/css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-heading">
        <h1><i class="fas fa-users"></i> Edit User</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <a href="{{ route('users.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
            </div>
        </div>
        <div id="panel-advancedoptions">
            <div class="panel panel-default" data-widget-editbutton="false" id="p1">
                <form action="{{ route('users.editPost', ['user' => $user->id]) }}" class="form-horizontal row-border" method="post">
                    @csrf
                    <div class="panel-heading">
                        <h2><i class="fas fa-user-edit"></i> Edit User</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Admin</label>
                            <div class="col-sm-8 icheck-square">
                                <label class="radio aero icheck">
                                    <input type="radio" name="is_admin" value="0" {{ (!$user->is_admin) ? 'checked' : '' }}>
                                    No
                                </label>
                                <label class="radio aero icheck">
                                    <input type="radio" name="is_admin" value="1" {{ ($user->is_admin) ? 'checked' : '' }}>
                                    Yes
                                </label>
                            </div>
                        </div>
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
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Active</label>
                            <div class="col-sm-8">
                                <ul class="demo-btns mb-10 xs">
                                    <li>
                                        <input 
                                            class="bootstrap-switch" 
                                            type="checkbox" 
                                            name="status"
                                            data-size="small" 
                                            data-on-text="<i class='fa fa-check'></i>" 
                                            data-on-color="success" 
                                            data-off-text="<i class='fa fa-times'></i>" 
                                            data-off-color="danger" 
                                            {{ ($user->status == 1) ? 'checked' : '' }} />
                                        </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn-primary btn"><i class="fas fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="panel-advancedoptions">
            <div class="panel panel-default" data-widget-editbutton="false" id="p1">
                <form action="{{ route('users.savePassword', ['user' => $user->id]) }}" class="form-horizontal row-border" method="post">
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
            <div class="panel panel-danger" data-widget-editbutton="false" id="p1">
                <form id="deleteForm" action="{{ route('users.delete', ['user' => $user->id]) }}" class="form-horizontal row-border" method="get">
                    @csrf
                    <div class="panel-heading">
                        <h2><i class="fas fa-trash-alt"></i> Delete User Account</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Delete account</label>
                            <div class="col-sm-8">
                                <a data-toggle="modal" href="#deleteModal" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- .container-fluid -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2 class="modal-title">Delete user</h2>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete the user account?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="deleteYes">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@push('scripts')
    <script src="{{ asset('plugins/bootstrap-switch/bootstrap-switch.js') }}"></script> <!-- BS Switch -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script> <!-- iCheck -->
    <script>
        $(document).ready(function() {
            //Bootstrap Switch
	        $('input.bootstrap-switch').bootstrapSwitch();
            $("#password, #verify_password").keyup(checkPasswordMatch);
            $('#deleteYes').click(function() {
                $('#deleteForm').trigger('submit');
            })
            var myArr=["square"];
            var aCol=['aero'];
            for (var i = 0; i < myArr.length; ++i) {
                for (var j = 0; j < aCol.length; ++j) {
                    $('.icheck-' + myArr[i] + ' .' + aCol[j] + '.icheck input').iCheck({checkboxClass: 'icheckbox_' + myArr[i] + '-' + aCol[j],radioClass: 'iradio_' + myArr[i] + '-' + aCol[j]});
                }
            }
        });
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
