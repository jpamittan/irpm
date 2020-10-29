@extends('layouts.auth')

@section('content')
    <div class="container" id="login-form">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <a href="#" class="login-logo"><img src="{{ asset('img/synchronosure_blue_trans_logo.png') }}"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Login</h2></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('auth') }}">
                            @csrf
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <a href="{{ route('forgotPassword') }}" class="pull-left">Forgot password?</a>
                                    <div class="checkbox-inline icheck pull-right pt0">
                                        <label for="remember_me">
                                            <input type="checkbox" name="remember_me" id="remember_me"></input>
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @if (! $authenticate)
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="alert alert-dismissable alert-danger" style="margin: 0;">
                                            <i class="fa fa-fw fa-times"></i>&nbsp; Invalid email / password.
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="panel-footer">
                                <div class="clearfix">
                                    <input type="submit" class="btn btn-primary login-link" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
