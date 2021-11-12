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
    <title>Admin</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="public/assets/images/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="public/assets/images/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon/favicon-16x16.png" />
    <link rel="manifest" href="public/assets/images/favicon/site.webmanifest" />
    <link rel="mask-icon" href="public/assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="public/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="public/assets/css/fontawesome.min.css" />
    <link rel="stylesheet" type="text/css" href="public/assets/css/feathericon.css" />
    <link rel="stylesheet" type="text/css" href="public/assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="public/assets/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" type="text/css" href="public/assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/quill-snow.min.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/croppie.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/style.css" />
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
<header class="header-wrapper">
    <div class="container">
        <div class="header-part">
            <div class="logo-part">
                <a href="{{url('/')}}">
                    <h5>Blue Collar</h5>
                </a>
            </div>
            <div class="menu-part mr-auto">
                <nav class="nav-bar">
                    <ul class="d-lg-flex menu-lists">
                        <li class="{{ Request::is('inactive*') ? 'active' : '' }}"><a href="{{url('/inactive')}}">Inactive</a></li>
                        <li class="{{ Request::is('active*') ? 'active' : '' }}"><a href="{{url('/active')}}">Active</a></li>
                        <li class="{{ Request::segment(1) == 'users' ? 'active' : '' }}"><a href="{{url('/users')}}">Users</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

