@extends('Employer.master')

@section('body')

    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dash-header-flex">
                            <div class="dash-page-title">
                                <h5>Profile</h5>
                            </div>
                            <a href="{{url('/employereditprofile')}}" class="default-btn btn-small">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-box">
                        <div class="dash-data-card h-100 mb-0 min-height">
                            <div class="profile-area border-0 employer-profile">
                                <div class="profile-image">

                                    @if (!empty(auth()->user()->uimage))
                                        <img src="public/assets/photo/pic/{{ auth()->user()->uimage->image }}" class="profile-main-image" alt="">
                                    @else
                                        <img src="public/assets/images/default-user.png" class="profile-main-image" alt="">
                                    @endif
                                    
                                </div>
                                <h5>{{ auth()->user()->name }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            <div class="profile-box">
                                <h5 class="profile-head">Basic details</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Enter name</div>
                                            <div class="set-input">{{ auth()->user()->name }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Mobile no</div>
                                            <div class="set-input">+91 {{ auth()->user()->mobile_number }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Email ID</div>
                                            <div class="set-input">{{ auth()->user()->email }}</div>
                                        </div>
                                    </div>

                                    @if (auth()->user()->user_type == 0)
                                        
                                        <div class="col-md-6 mb-3">
                                            <div class="form-set-data">
                                                <div class="set-label">Company name</div>
                                                <div class="set-input">{{ auth()->user()->company_name }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-set-data">
                                                <div class="set-label">About Company</div>
                                                <div class="set-input">{{ auth()->user()->about_company }}</div>
                                            </div>
                                        </div>

                                    @endif
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">State</div>
                                            <div class="set-input">{{ \DB::table('states')->where('id', auth()->user()->state)->value('name'); }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">City</div>
                                            <div class="set-input">{{ \DB::table('cities')->where('id', auth()->user()->city)->value('name'); }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection