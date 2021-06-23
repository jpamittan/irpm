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
                <div class="alert alert-dismissable alert-success">
					<h3><i class="fas fa-check-circle"></i> Successful!</h3> 
					<p>
                        Thank you for your submission! The underwriter will review and get back to you shortly.
                    </p>
                    <br>
                    <p>
                        Submission ID: <span class="text-primary"><u>{{ $submission->submission_id }}</u></span>
                        <br>
                        Insured name: <span class="text-primary"><u>{{ $submission->business_name }}</u></span>
                    </p>
				</div>
            </div>
        </div>
    </div>
@endsection
