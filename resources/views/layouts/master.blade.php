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
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css">

        <!-- Styles -->
        <link href="{{ asset('css/styles.css') }}" type="text/css" rel="stylesheet"> <!-- Core CSS with all styles -->
        <link href="{{ asset('css/custom.css') }}" type="text/css" rel="stylesheet"> <!-- Custom styles -->
        <link href="{{ asset('plugins/jstree/dist/themes/avalon/style.min.css') }}" type="text/css" rel="stylesheet"> <!-- jsTree -->
        <link href="{{ asset('plugins/codeprettifier/prettify.css') }}" type="text/css" rel="stylesheet"> <!-- Code Prettifier -->
        <link href="{{ asset('plugins/iCheck/skins/minimal/blue.css') }}" type="text/css" rel="stylesheet"> <!-- iCheck -->
        <link href="{{ asset('plugins/jScrollPane/style/jquery.jscrollpane.css') }}" type="text/css" rel="stylesheet"> <!-- jsTree -->
        <link href="{{ asset('plugins/form-daterangepicker/daterangepicker-bs3.css') }}" type="text/css" rel="stylesheet"> <!-- DateRangePicker -->
        <link href="{{ asset('plugins/switchery/switchery.css') }}" type="text/css" rel="stylesheet"> <!-- Switchery -->
        <link href="{{ asset('plugins/fullcalendar/fullcalendar.css') }}" type="text/css" rel="stylesheet"> <!-- FullCalendar -->
        <link href="{{ asset('js/jqueryui.css') }}" type="text/css" rel="stylesheet">
	    <link href="{{ asset('plugins/dropzone/css/dropzone.css') }}" type="text/css" rel="stylesheet"> <!-- Dropzone Plugin -->
    </head>
    <body class="infobar-offcanvas">
        <header id="topnav" class="navbar navbar-primary navbar-fixed-top clearfix" role="banner">
            <a id="leftmenu-trigger" class="" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
            <a class="navbar-brand" href="{{ route('dashboard.index') }}"></a>
            <ul class="nav navbar-nav toolbar pull-right">
                <li class="dropdown toolbar-icon-bg">
                    <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'>
                        <span class="icon-bg"><i class="fa fa-fw fa-bell"></i></span>
                        <span class="badge badge-alizarin">5</span>
                    </a>
                    <div class="dropdown-menu notifications arrow">
                        <div class="dd-header">
                            Notifications
                        </div>
                        <ul class="scrollthis">
                            <li class="">
                                <a href="#" class="notification-success">
                                    <div class="notification-icon"><i class="fa fa-check fa-fw"></i></div>
                                    <div class="notification-content"><strong>Lorem ipsum</strong> dolor sit amet
                                        consectetur adipisicing elit!</div>
                                    <div class="notification-time">40m</div>
                                </a>
                            </li>
                            <li class="">
                                <a href="#" class="notification-danger">
                                    <div class="notification-icon"><i class="fa fa-times fa-fw"></i></div>
                                    <div class="notification-content">Etiam porta sem malesuada</div>
                                    <div class="notification-time">5h</div>
                                </a>
                            </li>
                            <li class="">
                                <a href="#" class="notification-inverse">
                                    <div class="notification-icon"><i class="fa fa-cloud fa-fw"></i></div>
                                    <div class="notification-content"><strong>Nesciunt</strong> reprehenderit provident
                                        distinctio eveniet cupiditate atque</div>
                                    <div class="notification-time">16h</div>
                                </a>
                            </li>
                            <li class="">
                                <a href="#" class="notification-warning">
                                    <div class="notification-icon"><i class="fa fa-warning fa-fw"></i></div>
                                    <div class="notification-content">Aperiam accusamus modi ipsum officia quas nisi!</div>
                                    <div class="notification-time">1d</div>
                                </a>
                            </li>
                            <li class="">
                                <a href="#" class="notification-primary">
                                    <div class="notification-icon"><i class="fa fa-comment fa-fw"></i></div>
                                    <div class="notification-content">Officiis modi ipsum officia ad dolor sit amet
                                        consectetur sit voluptatem accusantium doloremque laudantium totam rem aperiam</div>
                                    <div class="notification-time">8d</div>
                                </a>
                            </li>
                        </ul>
                        <div class="dd-footer">
                            <a href="#">View all notifications</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown toolbar-icon-bg demo-search-hidden mr5">
                    <a href="#" class="dropdown-toggle tooltips" data-toggle="dropdown">
                        <span class="icon-bg"><i class="fa fa-fw fa-search"></i></span></a>
                    <div class="dropdown-menu arrow search dropdown-menu-form">
                        <div class="dd-header">
                            Search
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="">
                            <span class="input-group-btn">
                                <a class="btn btn-primary" href="#">Search</a>
                            </span>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                        <span class="hidden-xs">{{ Auth::user()->full_name }}</span>
                        <img class="img-circle" src="{{ asset('demo/avatar/avatar_06.png') }} " alt="Dangerfield" />
                    </a>
                    <ul class="dropdown-menu userinfo">
                        <li>
                            <a href="#">
                                <span class="pull-left">Edit Profile</span> <i class="pull-right fas fa-pencil-alt"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="pull-left">Account Settings</span> <i class="pull-right fas fa-cogs"></i>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <span class="pull-left">Sign Out</span> <i class="pull-right fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-default">
                    <div class="static-sidebar">
                        <div class="sidebar">
                            <div class="widget stay-on-collapse" id="widget-sidebar">
                                <span class="widget-heading">Menu</span>
                                <nav role="navigation" class="widget-body">
                                    <ul class="acc-menu">
                                        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
                                        <li><a href="{{ route('submissions.index') }}"><i class="fa fa-briefcase"></i><span>Submissions</span></a></li>
                                        @if (Auth::user()->is_admin)
                                            <li><a href="{{ route('users.index') }}"><i class="fas fa-users"></i><span>Users</span></a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            @yield('content')
                        </div> <!-- #page-content -->
                    </div>
                    <footer role="contentinfo">
                        <div class="clearfix">
                            <ul class="list-unstyled list-inline pull-left">
                                <li>
                                    <h6 style="margin: 0;"> &copy; 2020 Synchronosure</h6>
                                </li>
                            </ul>
                            <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top">
                                <i class="fa fa-arrow-up"></i>
                            </button>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ asset('js/jqueryui-1.9.2.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/sparklines/jquery.sparklines.min.js') }}"></script>
        <script src="{{ asset('plugins/jstree/dist/jstree.min.js') }}"></script>
        <script src="{{ asset('plugins/codeprettifier/prettify.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}"></script>
        <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
        <script src="{{ asset('js/enquire.min.js') }}"></script>
        <script src="{{ asset('plugins/bootbox/bootbox.js') }}"></script>
        <script src="{{ asset('js/application.js') }}"></script>
        <script src="{{ asset('demo/demo.js') }}"></script>
        <script src="{{ asset('demo/demo-switcher.js') }}"></script>
        <script src="{{ asset('plugins/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
        @stack('scripts')
    </body>
</html>
