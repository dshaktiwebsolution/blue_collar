@extends('auth.master')

@section('body')

 <div class="page-content-area">
            <!-- Hero Section -->
            <section class="section-padding auth-both-section pb-0">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6">
                            <div class="auth-both-img">
                                <img src="public/assets/images/auth-img/signup-as-a-employer-or-jobseekers.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="auth-both-box">
                                <div class="auth-single-card">
                                    <h4>Employer</h4>
                                    <p>Hire staff with ease.</p>
                                    <button class="default-btn" data-toggle="modal" data-target="#authmodal">Register Now</button>
                                </div>
                                <div class="auth-single-card">
                                    <h4>Job Seeker</h4>
                                    <p>Find Job in just one click.</p>
                                    <a href="{{url('/signup-jobs')}}" class="default-btn">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection        
