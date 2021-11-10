<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Employer </title>
    <!-- Favicon -->
    <!--<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets') }}/images/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/images/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/favicon/favicon-16x16.png" /> 
    <link rel="manifest" href="{{ asset('assets') }}/images/favicon/site.webmanifest" />  -->
    <link rel="mask-icon" href="{{ asset('assets') }}/images/favicon/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/fontawesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/feathericon.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/quill-snow.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/croppie.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/style.css" />

    
    <style>
        label.error{
            color: red;
        }
    </style>
</head>

<body class="dashboard-page header-white">
    <!-- loader -->
    <div class="preloader">
        <div class="cube-wrapper">
            <div class="cube-folding">
                <span class="leaf1"></span>
                <span class="leaf2"></span>
                <span class="leaf3"></span>
                <span class="leaf4"></span>
            </div>
            <span class="loading" data-name="Loading">Loading</span>
        </div>
    </div>

    <!-- Header -->
    <header class="header-wrapper">
        <div class="container">
            <div class="header-part">
                <div class="logo-part">
                    <a href="{{ url('/') }}">
                        <h5>Blue Collar</h5>
                    </a>
                </div>
                <div class="menu-part mr-auto">
                    <nav class="nav-bar">
                        <ul class="d-lg-flex menu-lists">
                            <li class="{{ Request::is('employer-dashboard*') ? 'active' : '' }}"><a
                                    href="{{ url('/employer-dashboard') }}">Dashboard</a></li>
                            <li class="{{ Request::is('employer-post-job*') ? 'active' : '' }}"><a
                                    href="{{ url('/employer-post-job') }}">Post Job</a></li>
                            <li class="{{ Request::is('active-jobs*') ? 'active' : '' }}"><a
                                    href="{{ url('/active-jobs') }}">Active Jobs</a></li>
                            <li class="{{ Request::is('inactive-jobs*') ? 'active' : '' }}"><a
                                    href="{{ url('/inactive-jobs') }}">Inactive Jobs</a></li>
                            <!-- <li class="d-lg-none"><a href="signup-as-employer-or-jobseeker.html">Sign Up</a></li>
                        <li class="d-lg-none"><a href="login-as-employer-or-jobseeker.html">Sign In</a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="account-right">
                    <ul class="d-flex align-items-center">
                        <!-- <li class="d-none d-lg-block">
                        <div class="login-button-group">
                            <a class="header-btn signup-btn" href="signup-as-employer-or-jobseeker.html"><i class="fas fa-sign-in-alt mr-1"></i> <span>Sign Up</span></a>
                            <a class="header-btn signin-btn" href="login-as-employer-or-jobseeker.html"><i class="fas fa-sign-in-alt mr-1"></i> <span>Sign In</span></a>
                        </div>
                    </li> -->
                        <li>
                            <div class="profile_log dropdown">
                                <div class="header-profile-user" data-toggle="dropdown" data-display="static">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('assets') }}/images/default-user.png" alt=""
                                            class="profile-img">
                                        <span>{{ auth()->user()->name }}</span>
                                    </a>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="actions-links-data">
                                        <ul>
                                            <li><a href="{{ url('/employerviewprofile') }}">View Profile</a></li>
                                            <li>
                                                <form id="logout_form" action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <a href="javascript:{}" onclick="document.getElementById('logout_form').submit();">Logout</a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="toggle-btn d-lg-none">
                    <a href="javascript:void(0);"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </header>
