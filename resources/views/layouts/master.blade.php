<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="data:image/gif;base64,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">        
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css">
        <!-- Styles -->
        <link href="{{ asset('css/styles.css') }}" type="text/css" rel="stylesheet"> <!-- Core CSS with all styles -->
        <link href="{{ asset('css/custom.css') }}" type="text/css" rel="stylesheet"> <!-- Custom styles -->
        <link href="{{ asset('plugins/jstree/dist/themes/avalon/style.min.css') }}" type="text/css" rel="stylesheet"> <!-- jsTree -->
        <link href="{{ asset('plugins/codeprettifier/prettify.css') }}" type="text/css" rel="stylesheet"> <!-- Code Prettifier -->
        <link href="{{ asset('plugins/iCheck/skins/minimal/blue.css') }}" type="text/css" rel="stylesheet"> <!-- iCheck -->
        <link href="{{ asset('plugins/jScrollPane/style/jquery.jscrollpane.css') }}" type="text/css" rel="stylesheet"> <!-- jsTree -->
        <link href="{{ asset('plugins/form-daterangepicker/daterangepicker-bs3.css') }}" type="text/css" rel="stylesheet"> <!-- DateRangePicker -->
        <link href="{{ asset('js/jqueryui.css') }}" type="text/css" rel="stylesheet">
        @stack('css')
    </head>
    <body class="infobar-offcanvas">
        <header id="topnav" class="navbar navbar-primary navbar-fixed-top clearfix" role="banner">
            <a id="leftmenu-trigger" class="" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
            <a class="navbar-brand" href="{{ route('dashboard.index') }}"></a>
            <ul class="nav navbar-nav toolbar pull-right">
                <!-- <li class="dropdown toolbar-icon-bg">
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
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                        <span class="hidden-xs">{{ Auth::user()->full_name }}</span>
                        <!-- <img 
                            class="img-circle" 
                            src="{{ asset('demo/avatar/avatar_06.png') }}" 
                            alt="{{ substr(ucwords(Auth::user()->first_name), 0, 1) }}{{ substr(ucwords(Auth::user()->last_name), 0, 1) }}" 
                        /> -->
                    </a>
                    <ul class="dropdown-menu userinfo">
                        <!-- <li>
                            <a href="#">
                                <span class="pull-left">Edit Profile</span> <i class="pull-right fas fa-pencil-alt"></i>
                            </a>
                        </li> -->
                        <li>
                            <a href="{{ route('settings.index', ['user' => Auth::id()]) }}">
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
                                        @if (
                                            Auth::user()->is_admin || 
                                            in_array('ach', json_decode(Auth::user()->permissions, true))
                                        )
                                            <li><a href="{{ route('ach.index') }}"><i class="fas fa-university"></i><span>ACH</span></a></li>
                                        @endif
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
        <script src="{{ asset('js/enquire.min.js') }}"></script>
        <script src="{{ asset('plugins/bootbox/bootbox.js') }}"></script>
        <script src="{{ asset('js/application.js') }}"></script>
        @stack('scripts')
    </body>
</html>
