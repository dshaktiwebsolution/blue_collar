@extends('auth.master')

@section('body')
    <!-- athentication Section -->
    <div class="page-ath-wrap page-form-left">
        <div class="page-back-btn">
            <a href="index.html">
                <i class="feather icon-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>
        <div class="page-ath-gfx">
            <a href="index.html" class="page-ath-logo">
                <h5>Blue Collar</h5>
            </a>
            <div class="page-ath-image">
                <img src="{{ asset('assets') }}/images/auth-img/login-in-as.svg" alt="">
            </div>
        </div>
        <div class="page-ath-content">
            <div class="page-ath-form">
                <div class="page-ath-title">
                    <h2>Welcome Back</h2>
                    <div class="form-footer-link">
                        <p>Don't have an account? <a href="{{ url('/signup-company') }}">Register</a></p>
                    </div>
                </div>
                <div class="page-form-data">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('empcheck') }}" method="post">
                        @csrf
                        <div class="row m-0">
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">E-mail</label>
                                        <input type="text" name="email" class="form-control floating-control"
                                            autocomplete="off">
                                        <div class="right-icon">
                                            <img src="{{ asset('assets') }}/images/auth-icon/email.png"
                                                class="input-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">Password</label>
                                        <input type="password" name="password" class="form-control floating-control">
                                        <div class="right-icon">
                                            <img src="{{ asset('assets') }}/images/auth-icon/lock.png"
                                                class="input-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="forgrot-link">
                                    <a href="forgot-password.html">Forget Password</a>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <input type="submit" name="login" class="auth-btn mt-auth default-btn btn-block"
                                    value="Log In">
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="divider">
                                    <div class="divider-text">Log in as</div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="auth-social">
                                    <ul>
                                        <li><a href="{{ route('auth_facebook') }}" class="fb-btn"><img
                                                    src="{{ asset('assets') }}/images/auth-social/fb.png" alt=""></a></li>
                                        <li><a href="{{ route('auth_gogole') }}" class="gle-btn"><img
                                                    src="{{ asset('assets') }}/images/auth-social/google.png" alt=""></a>
                                        </li>
                                        <li><a href="{{ route('auth_linkedin') }}" class="lin-btn"><img
                                                    src="{{ asset('assets') }}/images/auth-social/linkedin.png" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" class="mob-btn"><img
                                                    src="{{ asset('assets') }}/images/auth-social/mobile.png" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
