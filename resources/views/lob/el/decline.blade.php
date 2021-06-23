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
                <div class="alert alert-dismissable alert-danger">
					<h3><i class="fas fa-times-circle"></i> Decline!</h3> 
					<p>
                        Thank you for your interest in SynchronoSure&lsquo;s Excess program, unfortunately this risk does not fit our current Excess Underwriting appetite.
                    </p>
				</div>
            </div>
        </div>
    </div>
@endsection
