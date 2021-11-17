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
                    <h2>Forgot your password ?</h2>
                    <p class="page-ath-text">Enter your e-mail address and we'll send you a link to reset your password</p>
                </div>
                <div class="page-form-data">
                    <form action="{{ route('submit_forget_password') }}" method="POST">
                        @csrf

                        <div class="row m-0">
                            <div class="col-md-12 p-0">
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">E-mail</label>
                                        <input type="email" name="email" class="form-control floating-control" required>
                                        <div class="right-icon">
                                            <img src="assets/images/auth-icon/email.png" class="input-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <input type="submit" name="forget_password" class="auth-btn mt-auth default-btn btn-block"
                                    value="Sent">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
