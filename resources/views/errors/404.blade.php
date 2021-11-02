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
        <title>Page Not Found 404</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets')}}/images/favicon/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets')}}/images/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets')}}/images/favicon/favicon-16x16.png" />
        <link rel="manifest" href="{{asset('assets')}}/images/favicon/site.webmanifest" />
        <link rel="mask-icon" href="{{asset('assets')}}/images/favicon/safari-pinned-tab.svg" color="#5bbad5" />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/animate.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/fontawesome.min.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/feathericon.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/owl.carousel.min.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/quill-snow.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/croppie.css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css" />
    </head>
    <body class="no-header-footer">
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
                        <a href="index.html">
                            <h5>Blue Collar</h5>
                        </a>
                    </div>
                    <div class="menu-part mr-auto">
                        <nav class="nav-bar">
                            <ul class="d-lg-flex menu-lists">
                                <!-- <li><a href="index.html">Home</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="faq.html">FAQs</a></li> -->
                                <li class="d-lg-none"><a href="signup-as-employer-or-jobseeker.html">Register</a></li>
                                <li class="d-lg-none"><a href="login-as-employer-or-jobseeker.html">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="account-right">
                        <ul class="d-flex align-items-center">
                            <li class="d-none d-lg-block">
                                <div class="login-button-group">
                                    <a class="header-btn signup-btn" href="signup-as-employer-or-jobseeker.html"><i class="fas fa-sign-in-alt mr-1"></i> <span>Register</span></a>
                                    <a class="header-btn signin-btn" href="login-as-employer-or-jobseeker.html"><i class="fas fa-sign-in-alt mr-1"></i> <span>Login</span></a>
                                </div>
                            </li>
                            <!-- <li>
                                <div class="profile_log dropdown">
                                    <div class="header-profile-user" data-toggle="dropdown" data-display="static">
                                        <a href="javascript:void(0);">
                                            <img src="assets/images/default-user.png" alt="" class="profile-img">
                                            <span>Alex John</span>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="actions-links-data">
                                            <ul>
                                                <li><a href="javascript:void(0);">View Profile</a></li>
                                                <li><a href="javascript:void(0);">Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                    <div class="toggle-btn d-lg-none">
                        <a href="javascript:void(0);"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-content-area">
            <!-- Hero Section -->
            <section class="section-padding error-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-5">
                            <div class="page-nf-box">
                                <img src="{{asset('assets')}}/images/404.png" alt="">
                                <h5>LOOKS LIKE YOU'RE LOST</h5>
                                <p>The page you are looking for not available.</p>
                                <a href="{{ url('/') }}" class="default-btn fw btn-block"><span>Go to home</span><i class="feather icon-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="footer-bg footer-wrapper">
            <div class="footer-main">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-3">
                            <div class="footer-logo-area">
                                <a href="javascript:void(0);">
                                    <h5 class="footer-logo">Blue Collar</h5>
                                </a>
                                <p>
                                    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="footer-links">
                                        <h5>About</h5>
                                        <ul>
                                            <li><a href="javascript:void(0);">About Us</a></li>
                                            <li><a href="javascript:void(0);">Features</a></li>
                                            <li><a href="javascript:void(0);">New</a></li>
                                            <li><a href="javascript:void(0);">Careers</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="footer-links">
                                        <h5>Company</h5>
                                        <ul>
                                            <li><a href="javascript:void(0);">FAQs</a></li>
                                            <li><a href="javascript:void(0);">Blogs</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="footer-links">
                                        <h5>Support</h5>
                                        <ul>
                                            <li><a href="javascript:void(0);">Account</a></li>
                                            <li><a href="javascript:void(0);">Support Center</a></li>
                                            <li><a href="javascript:void(0);">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="subscribe-box">
                                <h5>Get in Touch</h5>
                                <p>
                                    Question and Feedback? <br />
                                    We Love to hear for you.
                                </p>
                                <form action="javascript:void(0)">
                                    <div class="subsribe-input-box">
                                        <div class="subscribe-data-box">
                                            <input type="text" class="input-form" placeholder="Enter Gmail" />
                                            <button type="submit" class="subscribe-btn"><i class="far fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                    <!-- <label class="error-msg">Please enter valid email address</label> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-box">
                                <p>Copyright &copy; 2021 All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-social">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Auth-modal-box -->
        <div class="modal fade auth-modal" id="authmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <button type="button" class="auth-close-btn" data-dismiss="modal" aria-label="Close">
                <i class="feather icon-x"></i>
            </button>
            <div class="modal-dialog modal-dialog-centered modal-auth-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <div class="sign-box">
                                        <div class="sign-data-box">
                                            <div class="sign-icon">
                                                <img src="{{asset('assets')}}/images/auth-img/signup-as-company.svg" alt="" />
                                            </div>
                                            <div class="sign-text">
                                                <h5>Sign up as a company</h5>
                                                <p>Let's work together</p>
                                            </div>
                                        </div>
                                        <div class="sign-btn-box">
                                            <a href="signup-as-company.html" class="default-btn">Register now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="sign-box">
                                        <div class="sign-data-box">
                                            <div class="sign-icon">
                                                <img src="{{asset('assets')}}/images/auth-img/signup-as-individual.svg" alt="" />
                                            </div>
                                            <div class="sign-text">
                                                <h5>Sign up as an individual</h5>
                                                <p>Let's work Like boss</p>
                                            </div>
                                        </div>
                                        <div class="sign-btn-box">
                                            <a href="signup-as-personal.html" class="default-btn">Register now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--js -->
        <script src="{{asset('assets')}}/js/jquery-3.4.1.min.js"></script>
        <script src="{{asset('assets')}}/js/popper.min.js"></script>
        <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
        <script src="{{asset('assets')}}/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="{{asset('assets')}}/js/select2.full.min.js"></script>
        <script src="{{asset('assets')}}/js/wow.min.js"></script>
        <script src="{{asset('assets')}}/js/sweetalert2.min.js"></script>
        <script src="{{asset('assets')}}/js/quill.min.js"></script>
        <script src="{{asset('assets')}}/js/croppie.min.js"></script>
        <script src="{{asset('assets')}}/js/custom.js"></script>
    </body>
</html>
