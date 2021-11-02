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
                                <div class="page-back-btn">
                                    <a href="{{url('/candidate-job')}}">
                                        <i class="feather icon-arrow-left"></i>
                                        <span>Back</span>
                                    </a>
                                </div>
                                <h5>Candidate Details</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            <div class="profile-area">
                                <div class="profile-image">
                                    <img src="public/assets/images/default-user.png" class="profile-main-image" alt="">
                                </div>
                                <h5>Alex John</h5>
                                <p>UI / UX Designer</p>
                            </div>
                            <div class="profile-box mb-2">
                                <h5 class="profile-head">Skill</h5>
                                <div class="skill-tags">
                                    <div class="skilldata-tag">Design</div>
                                    <div class="skilldata-tag">Graphic Designer</div>
                                </div>
                            </div>
                            <div class="profile-box text-center mt-4">
                                <a href="javascript:void(0);" class="download-resume"><span>Download Resume</span><img src="public/assets/images/dashboard/download-resume.png" alt=""> </a>
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
                                            <div class="set-input">+91 99*** ***00</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Email ID</div>
                                            <div class="set-input">alexjohn@gmail.com</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Job profile</div>
                                            <div class="set-input">Sixtheeth Telecom</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Location</div>
                                            <div class="set-input">Surat</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Preferred city for job</div>
                                            <div class="set-input">Surat</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Education</div>
                                            <div class="set-input">Mca</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Experienced</div>
                                            <div class="set-input">Yes</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Currently working</div>
                                            <div class="set-input">Yes</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Current company</div>
                                            <div class="set-input">Sixtheeth Telecom</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Job type</div>
                                            <div class="set-input">Full Time</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Salary (per month)</div>
                                            <div class="set-input">15000</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Language</div>
                                            <div class="set-input">English</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Age</div>
                                            <div class="set-input">25</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Gender</div>
                                            <div class="set-input">Male</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-box mb-4">
                                <h5 class="profile-head">ID proof details</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">ID proof number</div>
                                            <div class="set-input">1234567890</div>
                                            <div class="set-image"><img src="public/assets/images/dashboard/profile/proof.jpg" alt=""></div>
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
