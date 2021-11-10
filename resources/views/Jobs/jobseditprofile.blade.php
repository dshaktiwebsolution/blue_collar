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
                                <div class="page-back-btn">
                                    <a href="{{url('/jobsviewprofile')}}">
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
                            <div class="dash-data-card h-100 mb-0">
                                <div class="profile-area">
                                    <div class="profile-image mb-5">
                                        <img src="{{asset('assets')}}/images/default-user.png" alt="" class="profile-main-image" id="profileimg">
                                        <div class="profile-change-btn">
                                            <input accept="image/*" type='file' class="profileinput" />
                                            <img src="{{asset('assets')}}/images/dashboard/profile/edit-icon.png" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group floating-group">
                                        <label class="floating-label">Name</label>
                                        <input type="text" class="form-control floating-control" value="Alex John">
                                    </div>
                                    <div class="form-group floating-group">
                                        <label class="floating-label">Position</label>
                                        <input type="text" class="form-control floating-control" value="Ui / Ux Designer">
                                    </div>
                                </div>
                                <div class="profile-box mb-2">
                                    <h5 class="profile-head">Skill</h5>
                                    <div class="form-group select2Part select2multipletags form-fade-group without-icon">
                                        <label class="fade-label">Skills</label>
                                        <select class="form-control customSelectMultipleTags fade-control" multiple>
                                            <option value="1" selected>Design</option>
                                            <option value="2" selected>Graphic Designer</option>
                                            <option value="3">Java</option>
                                            <option value="4">Script</option>
                                            <option value="5">HTML</option>
                                            <option value="6">CSS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mb-box">
                            <div class="dash-data-card h-100 mb-0">
                                <div class="profile-box mb-4">
                                    <h5 class="profile-head">Basic details</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Mobile no</label>
                                                <input type="text" class="form-control floating-control" value="+91 99*** ***00">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Email id</label>
                                                <input type="text" class="form-control floating-control" value="alexjohn@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Job profile</label>
                                                <input type="text" class="form-control floating-control" value="Sixtheeth Telecom">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part select2arrow floating-group without-icon profile-form-group">
                                                <label class="floating-label">Location</label>
                                                <select name="" id="" class="form-control customSelect floating-control">
                                                    <option value="">Select City</option>
                                                    <option value="City 1" selected>Surat</option>
                                                    <option value="City 2">City 2</option>
                                                    <option value="City 3">City 3</option>
                                                    <option value="City 4">City 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part select2arrow floating-group without-icon profile-form-group">
                                                <label class="floating-label">Preferred city for job</label>
                                                <select name="" id="" class="form-control customSelect floating-control">
                                                    <option value="">Select City</option>
                                                    <option value="City 1" selected>Surat</option>
                                                    <option value="City 2">City 2</option>
                                                    <option value="City 3">City 3</option>
                                                    <option value="City 4">City 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part select2arrow floating-group without-icon profile-form-group">
                                                <label class="floating-label">Education</label>
                                                <select name="" id="" class="form-control customSelect floating-control">
                                                    <option value="">Select Education</option>
                                                    <option value="Education 1" selected>Mca</option>
                                                    <option value="Education 2">Bca</option>
                                                    <option value="Education 3">B.Com</option>
                                                    <option value="Education 4">M.com</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group profile-form-group">
                                                <div class="radio-group radio-group-with-label">
                                                    <label class="form-label">Experience</label>
                                                    <div class="radio-box">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="exworkyesno" id="datayst" class="custom-control-input" checked>
                                                            <label class="custom-control-label" for="datayst">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="exworkyesno" id="datanst" class="custom-control-input">
                                                            <label class="custom-control-label" for="datanst">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group profile-form-group">
                                                <div class="radio-group radio-group-with-label">
                                                    <label class="form-label">Current working</label>
                                                    <div class="radio-box">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="curworkyesno" id="dataycr" class="custom-control-input" checked>
                                                            <label class="custom-control-label" for="dataycr">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="curworkyesno" id="datancr" class="custom-control-input">
                                                            <label class="custom-control-label" for="datancr">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Current company</label>
                                                <input type="text" class="form-control floating-control" value="Sixtheeth Telecom">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group profile-form-group">
                                                <div class="radio-group radio-group-with-label">
                                                    <label class="form-label">Job type</label>
                                                    <div class="radio-box">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="jtworkyesno" id="datayjt" class="custom-control-input" checked>
                                                            <label class="custom-control-label" for="datayjt">Full Time</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="jtworkyesno" id="datanjt" class="custom-control-input">
                                                            <label class="custom-control-label" for="datanjt">Part Time</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Salary (per month)</label>
                                                <input type="text" class="form-control floating-control" value="15000">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part select2arrow floating-group without-icon profile-form-group">
                                                <label class="floating-label">Language</label>
                                                <select name="" id="" class="form-control customSelect floating-control">
                                                    <option value="">Select Education</option>
                                                    <option value="Language 1" selected>English</option>
                                                    <option value="Language 2">Gujarati</option>
                                                    <option value="Language 3">Hindi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Age</label>
                                                <input type="text" class="form-control floating-control" value="25">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group profile-form-group">
                                                <div class="radio-group radio-group-with-label">
                                                    <label class="form-label">Gender</label>
                                                    <div class="radio-box">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="genderdata" id="malege" class="custom-control-input" checked>
                                                            <label class="custom-control-label" for="malege">Male</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="genderdata" id="femalege" class="custom-control-input">
                                                            <label class="custom-control-label" for="femalege">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-box">
                                    <h5 class="profile-head">ID proof details</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-set-data">
                                                <div class="set-label">ID proof number</div>
                                                <div class="set-input">1234567890</div>
                                                <div class="set-image">
                                                    <img src="{{asset('assets')}}/images/dashboard/profile/proof.jpg" alt="" id="proofimg">
                                                    <div class="edit-proof-btn">
                                                        <input type="file" id="proofinput">
                                                        <img src="{{asset('assets')}}/images/dashboard/profile/edit-icon.png" alt="" class="proofiledit-icon">
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
                                <a href="jobseeker-view-profile.html" class="default-btn btn-red">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>

@endsection