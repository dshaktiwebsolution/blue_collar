@extends('auth.master')

@section('body')
    <!-- athentication Section -->
    <div class="page-ath-wrap">
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
                <img src="public/assets/images/auth-img/signup-otp-as-personal.svg" alt="">
            </div>
        </div>
        <div class="page-ath-content">
            <div class="page-ath-form page-auth-whatsapp">
                <div class="page-ath-title">
                    <h2>Sign up as a Job Seeker</h2>
                    <div class="form-footer-link">
                        <p>Already a member? <a href="{{ url('/job-login') }}">Log in</a></p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="signup-as-job-seeker-whatsapp-mobile.html" class="wap-btn btn-block"><i
                                    class="fab fa-whatsapp mr-2"></i><span>Chat with whatsapp</span></a>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="divider mt-2 mb-2">
                                <div class="divider-text">Or</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-form-data">
                    <form action="{{ url('job') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row m-0">
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">First name</label>
                                        <input type="text" name="first_name" class="form-control floating-control"
                                            autocomplete="off" value="{{ old('first_name') }}">
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/user.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('first_name')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">Last name</label>
                                        <input type="text" name="last_name" class="form-control floating-control"
                                            autocomplete="off" value="{{ old('last_name') }}">
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/user.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('last_name')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">Mobile number</label>
                                        <input type="text" name="mobile_number" class="form-control floating-control"
                                            autocomplete="off" value="{{ old('mobile_number') }}">
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/mobile.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('mobile_number')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">E-mail</label>
                                        <input type="text" name="email" class="form-control floating-control"
                                            autocomplete="off" value="{{ old('email') }}">
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/email.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('email')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">Enter Adharcard Number</label>
                                        <input type="text" name="adharcard_number" class="form-control floating-control"
                                            autocomplete="off" value="{{ old('adharcard_number') }}">
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/id-card.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('adharcard_number')<span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">Proof Id Number</label>
                                        <input type="text" name="proofid_number" class="form-control floating-control"
                                            autocomplete="off" value="{{ old('proofid_number') }}" />
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/id-card.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('proofid_number')<span style="color:red">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <div class="input-icon-right">
                                        <div class="file-upload">
                                            <div class="file-select">
                                                <button type="button" class="file-upload-label">Upload Id Image
                                                    (Optional)</button>
                                                <div class="file-select-name">Upload Id Image</div>
                                                <input type="file" name="image" class="file-upload-input"
                                                    value="{{ old('image') }}">
                                            </div>
                                        </div>
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/imgupload.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('image')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">Age</label>
                                        <input type="text" name="age" class="form-control floating-control"
                                            autocomplete="off" value="{{ old('age') }}" />
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/pantone.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('age')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <div class="input-icon-right">
                                        <div class="radio-group">
                                            <div class="radio-box">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="gender" id="male" class="custom-control-input"
                                                        value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="male">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="gender" id="female"
                                                        class="custom-control-input" value="Female"
                                                        {{ old('gender') == 'Female' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/face.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('gender')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">Job profile</label>
                                        <input type="text" name="job_profile" class="form-control floating-control"
                                            autocomplete="off" value="{{ old('job_profile') }}">
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/edit.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('job_profile')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group select2Part select2multipletags form-fade-group">
                                    <div class="input-icon-right">
                                        <label class="fade-label">Skills</label>
                                        <select class="form-control customSelectMultipleTags fade-control" name="skills[]"
                                            multiple>
                                            <option value="Design"
                                                {{ is_array(old('skills')) && in_array('Design', old('skills')) ? 'selected' : '' }}>
                                                Design</option>
                                            <option value="Graphic Designer"
                                                {{ is_array(old('skills')) && in_array('Graphic Designer', old('skills')) ? 'selected' : '' }}>
                                                Graphic Designer</option>
                                            <option value="Java"
                                                {{ is_array(old('skills')) && in_array('Java', old('skills')) ? 'selected' : '' }}>
                                                Java</option>
                                            <option value="Script"
                                                {{ is_array(old('skills')) && in_array('Script', old('skills')) ? 'selected' : '' }}>
                                                Script</option>
                                            <option value="HTML"
                                                {{ is_array(old('skills')) && in_array('HTML', old('skills')) ? 'selected' : '' }}>
                                                HTML</option>
                                            <option value="CSS"
                                                {{ is_array(old('skills')) && in_array('CSS', old('skills')) ? 'selected' : '' }}>
                                                CSS</option>
                                        </select>
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/bulb.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('skills[]')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group floating-group">
                                    <div class="input-icon-right">
                                        <label class="floating-label">Preferred city for job</label>
                                        <input type="text" name="job_city" class="form-control floating-control"
                                            autocomplete="off" value="{{ old('job_city') }}">
                                        <div class="right-icon">
                                            <img src="public/assets/images/auth-icon/compass.png" class="input-img"
                                                alt="">
                                        </div>
                                        @error('job_city')<span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label">Education</label>
                                            <input type="text" name="education" class="form-control floating-control"
                                                autocomplete="off" value="{{ old('education') }}">
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/book.png" class="input-img"
                                                    alt="">
                                            </div>
                                            @error('education')<span style="color:red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group">
                                        <div class="input-icon-right">
                                            <div class="radio-group">
                                                <div class="radio-box">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="job_working" id="exper1"
                                                            class="custom-control-input" value="Experience"
                                                            {{ old('job_working') == 'Experience' ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="exper1">Experience</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="job_working" id="exper2"
                                                            class="custom-control-input" value="Fresher"
                                                            {{ old('job_working') == 'Fresher' ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="exper2">Fresher</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/briefcase.png"
                                                    class="input-img" alt="">
                                            </div>
                                            @error('job_working')<span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group">
                                        <div class="input-icon-right">
                                            <div class="radio-group radio-group-with-label">
                                                <label class="form-label">Currently Working</label>
                                                <div class="radio-box">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="currently_working" id="datay"
                                                            class="custom-control-input" value="Yes"
                                                            {{ old('currently_working') == 'Yes' ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="datay">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="currently_working" id="datan"
                                                            class="custom-control-input" value="No"
                                                            {{ old('currently_working') == 'No' ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="datan">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/briefcase.png"
                                                    class="input-img" alt="">
                                            </div>
                                            @error('currently_working')<span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label">Current Company/last company</label>
                                            <input type="text" name="curlast_company" class="form-control floating-control"
                                                autocomplete="off" value="{{ old('curlast_company') }}">
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/users.png" class="input-img"
                                                    alt="">
                                            </div>
                                            @error('curlast_company')<span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group">
                                        <div class="input-icon-right">
                                            <div class="radio-group">
                                                <div class="radio-box">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="job_time" id="time1"
                                                            class="custom-control-input" value="Part Time"
                                                            {{ old('job_time') == 'Part Time' ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="time1">Part Time</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="job_time" id="time2"
                                                            class="custom-control-input" value="Full Time"
                                                            {{ old('job_time') == 'Full Time' ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="time2">Full Time</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/clock.png" class="input-img"
                                                    alt="">
                                            </div>
                                            @error('job_time')<span style="color:red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label">Salary (If experienced)</label>
                                            <input type="text" name="salary" class="form-control floating-control"
                                                autocomplete="off" value="{{ old('salary') }}">
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/dollar.png" class="input-img"
                                                    alt="">
                                            </div>
                                            @error('salary')<span style="color:red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label">Language (speaking & writing)</label>
                                            <input type="text" name="language" class="form-control floating-control"
                                                autocomplete="off" value="{{ old('language') }}">
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/globe.png" class="input-img"
                                                    alt="">
                                            </div>
                                            @error('language')<span style="color:red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group">
                                        <div class="input-icon-right">
                                            <div class="file-upload">
                                                <div class="file-select">
                                                    <button type="button" class="file-upload-label">Upload resume
                                                        (optional)</button>
                                                    <div class="file-select-name">Upload resume (optional)</div>
                                                    <input type="file" name="upload_resume" class="file-upload-input"
                                                        value="{{ old('upload_resume') }}">
                                                </div>
                                            </div>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/upload.png" class="input-img"
                                                    alt="">
                                            </div>
                                            @error('upload_resume')<span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <input type="submit" name="" class="auth-btn mt-auth default-btn btn-block"
                                        value="Register">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
