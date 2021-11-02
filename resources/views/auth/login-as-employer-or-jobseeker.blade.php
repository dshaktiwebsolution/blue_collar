@extends('auth.master')

@section('body')
 <div class="page-content-area">
            <!-- Hero Section -->
            <section class="section-padding auth-both-section pb-0">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6">
                            <div class="auth-both-img">
                                <img src="public/assets/images/auth-img/login-as-employer-or-jobseeker.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="auth-both-box">
                                <div class="auth-single-card auth-hover-card">
                                    <h4>Employer</h4>
                                    <p>Hire staff with ease.</p>
                                    <a href="{{url('/employer-login')}}" class="default-btn default-outline-btn">Login</a>
                                </div>
                                <div class="auth-single-card auth-hover-card">
                                    <h4>Job Seeker</h4>
                                    <p>Find Job in just one click.</p>
                                    <a href="{{url('/job-login')}}" class="default-btn default-outline-btn">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


@endsection