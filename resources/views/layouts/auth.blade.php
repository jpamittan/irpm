<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="{{ asset('plugins/iCheck/skins/minimal/blue.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" type="text/css" rel="stylesheet"> <!-- Core CSS with all styles -->
        <link href="{{ asset('css/custom.css') }}" type="text/css" rel="stylesheet"> <!-- Custom styles -->
    </head>
    <body class="antialiased focused-form">

        @yield('content')
        
        <script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ asset('js/jqueryui-1.9.2.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        @stack('scripts')
    </body>
</html>
