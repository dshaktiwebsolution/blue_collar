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
                                    <a href="{{url('/employerviewprofile')}}">
                                        <i class="feather icon-arrow-left"></i>
                                        <span>Back</span>
                                    </a>
                                </div>
                                <h5>Edit Profile</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="javascript:void(0);">
                    <div class="row">
                        <div class="col-lg-4 mb-box">
                            <div class="dash-data-card h-100 mb-0 min-height">
                                <div class="profile-area border-0 employer-profile">
                                    <div class="profile-image">
                                        <img src="public/assets/images/default-user.png" alt="" class="profile-main-image" id="profileimg" />
                                        <div class="profile-change-btn">
                                            <input accept="image/*" type="file" class="profileinput" />
                                            <img src="public/assets/images/dashboard/profile/edit-icon.png" alt="" />
                                        </div>
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
                                        <div class="col-md-6">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">Enter name</label>
                                                    <input type="text" class="form-control floating-control" value="Blue Collar" />
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/user.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">Mobile number</label>
                                                    <input type="text" class="form-control floating-control" value="+91 99*** ***00" />
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/mobile.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">Email ID</label>
                                                    <input type="text" class="form-control floating-control" value="BlueCollar@gmail.com" />
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/email.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">Company name</label>
                                                    <input type="text" class="form-control floating-control" value="Bluecollar technology" />
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/users.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">Password</label>
                                                    <input type="text" class="form-control floating-control" value="12345567" />
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/lock.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">State</label>
                                                    <select name="" id="" class="form-control customSelect floating-control">
                                                        <option value="">State</option>
                                                        <option value="State 1" selected>Gujarat</option>
                                                        <option value="State 2">State 2</option>
                                                        <option value="State 3">State 3</option>
                                                        <option value="State 4">State 4</option>
                                                    </select>
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/select.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">City</label>
                                                    <select name="" id="" class="form-control customSelect floating-control">
                                                        <option value="">City</option>
                                                        <option value="City 1" selected>Surat</option>
                                                        <option value="City 2">City 2</option>
                                                        <option value="City 3">City 3</option>
                                                        <option value="City 4">City 4</option>
                                                    </select>
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/select.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-8">
                            <div class="buttons-group text-center">
                                <button type="submit" class="default-btn">Save</button>
                                <a href="{{url('/employerviewprofile')}}" class="default-btn btn-red">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection