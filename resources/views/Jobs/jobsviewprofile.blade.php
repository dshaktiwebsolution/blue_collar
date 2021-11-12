@extends('Jobs.master')

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
                            <a href="{{ url('/jobseditprofile') }}" class="default-btn btn-small">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            <div class="profile-area">
                                <div class="profile-image">
                                    
                                    @if (!empty(auth()->user()->uimage))
                                        <img src="public/assets/photo/pic/{{ auth()->user()->uimage->image }}"
                                            class="profile-main-image" id="profileimg">
                                    @else
                                        <img src="public/assets/images/default-user.png" class="profile-main-image">
                                    @endif
                                </div>
                                <h5>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h5>
                                <p>{{ auth()->user()->job_profile }}</p>
                            </div>
                            <div class="profile-box mb-2">
                                <h5 class="profile-head">Skill</h5>
                                <div class="skill-tags">
                                    @php
                                        $skills = explode(',', auth()->user()->skills);
                                    @endphp

                                    @foreach ($skills as $item)
                                        <div class="skilldata-tag">{{ $item }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            <div class="profile-box mb-4">
                                <h5 class="profile-head">Basic details</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Mobile no</div>
                                            <div class="set-input">{{ auth()->user()->mobile_number }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Email ID</div>
                                            <div class="set-input">{{ auth()->user()->email }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Job profile</div>
                                            <div class="set-input">{{ auth()->user()->job_profile }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Preferred city for job</div>
                                            <div class="set-input">{{ auth()->user()->job_city }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Education</div>
                                            <div class="set-input">{{ auth()->user()->education }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Current company</div>
                                            <div class="set-input">{{ auth()->user()->curlast_company }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Job type</div>
                                            <div class="set-input">{{ auth()->user()->job_time }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Salary (per month)</div>
                                            <div class="set-input">{{ auth()->user()->salary }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Language</div>
                                            <div class="set-input">{{ auth()->user()->language }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Age</div>
                                            <div class="set-input">{{ auth()->user()->age }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Gender</div>
                                            <div class="set-input">{{ auth()->user()->gender }}</div>
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
