@extends('auth.admin_master')

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
                    <h2>Admin Login</h2>
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
                    <form id="admin_login_form" action="{{ route('check_admin') }}" method="post">
                        @csrf
                        <div class="row m-0">
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">E-mail</label>
                                        <input type="text" name="email" class="form-control floating-control"
                                            autocomplete="off" required>
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
                                        <input type="password" name="password" class="form-control floating-control" required>
                                        <div class="right-icon">
                                            <img src="{{ asset('assets') }}/images/auth-icon/lock.png"
                                                class="input-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <input type="submit" name="login" class="auth-btn mt-auth default-btn btn-block"
                                    value="Log In">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
   <script>
        $(document).ready(function () {

            EMAIL = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/;

            $('#admin_login_form').validate({
                rules: {
                    email: {
                        pattern: EMAIL,
                    },
                },
            });

        });
    </script>
@endsection