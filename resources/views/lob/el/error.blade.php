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
                <div class="alert alert-dismissable alert-primary">
					<h3><i class="fas fa-exclamation-triangle"></i> Ooops</h3> 
					<p>
                        No submission ID. If you cancelled the submission or any problem occured please try again.
                    </p>
				</div>
            </div>
        </div>
    </div>
@endsection
