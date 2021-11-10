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
                <img src="{{ asset('assets') }}/images/auth-img/signup-as-job-seeker.svg" alt="">
            </div>
        </div>
        <div class="page-ath-content">
            <div class="page-ath-form">
                <div class="page-ath-title">
                    <h2>Enter your mobile number</h2>
                    <div class="form-footer-link">
                        <p>Let's get started just enter your number.</p>
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

                    <form action="{{ route('jobcheck') }}" method="POST">
                        @csrf
                        <div class="row m-0">
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">Mobile number</label>
                                        <input type="text" class="form-control floating-control" name="mobile_number">
                                        @error('mobile_number')<span style="color:red">{{$message}}</span> @enderror
                                        <div class="right-icon">
                                            <img src="{{ asset('assets') }}/images/auth-icon/email.png"
                                                class="input-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <input type="submit" name="" class="auth-btn mt-auth default-btn btn-block"
                                    value="Sent OTP">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
