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
                                    <img src="public/assets/images/default-user.png" class="profile-main-image" alt="">
                                </div>
                                <h5>Alex John</h5>
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
                                            <div class="set-input">Blue Collar</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Mobile no</div>
                                            <div class="set-input">+91 99*** ***00</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Email ID</div>
                                            <div class="set-input">BlueCollar@gmail.com</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Company name</div>
                                            <div class="set-input">Bluecollar technology</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">About Company</div>
                                            <div class="set-input">Bluecollar technology is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">Password</div>
                                            <div class="set-input">12345567</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">State</div>
                                            <div class="set-input">Gujarat</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-set-data">
                                            <div class="set-label">City</div>
                                            <div class="set-input">Surat</div>
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