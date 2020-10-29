@extends('layouts.auth')

@section('content')
    <div class="container" id="forgotpassword-form">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <a href="#" class="login-logo"><img src="{{ asset('img/synchronosure_blue_trans_logo.png') }}"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Forgot Password</h2></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('resetPassword') }}">
                            @csrf
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <p>Enter your email to reset your password</p>
                                    <div class="input-group">							
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div id="result"></div>
                            <div class="panel-footer">
                                <div class="clearfix">
                                    <a href="{{ route('login') }}" class="btn btn-default pull-left">
                                        <i class="fas fa-arrow-left"></i>&nbsp; Go Back
                                    </a>
                                    <input type="submit" class="btn btn-primary pull-right" value="Reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const email = urlParams.get('email');
            if (email === "true") {
                $('#result').html(
                    '<div class="form-group">'+
                        '<div class="col-xs-12">'+
                            '<div class="alert alert-dismissable alert-success" style="margin: 0;">'+
                                '<i class="fas fa-check"></i>&nbsp; New password sent in your email.'+
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            }
            if (email === "false") {
                $('#result').html(
                    '<div class="form-group">'+
                        '<div class="col-xs-12">'+
                            '<div class="alert alert-dismissable alert-danger" style="margin: 0;">'+
                                '<i class="fa fa-fw fa-times"></i>&nbsp; Email is not registered.'+
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            }
        });
    </script>
@endpush
