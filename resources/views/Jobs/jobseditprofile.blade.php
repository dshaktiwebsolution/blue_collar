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
                <form  id="jobs_reg_form" action="{{ url('/jobsupdateprofile') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row">
                        <div class="col-lg-4 mb-box">
                            <div class="dash-data-card h-100 mb-0">
                                <div class="profile-area">
                                    <div class="profile-image mb-5">
                                       
                                        @if (!empty(auth()->user()->uimage))
                                            <img src="public/assets/photo/pic/{{ auth()->user()->uimage->image }}" class="profile-main-image" id="profileimg">
                                        @else
                                            <img src="public/assets/images/default-user.png" class="profile-main-image" id="profileimg">
                                        @endif
                                        <div class="profile-change-btn">
                                            <input accept="image/*" name="image" type='file' class="profileinput" />
                                            <img src="{{asset('assets')}}/images/dashboard/profile/edit-icon.png" alt="">
                                        </div>
                                    </div>
                                    <h5 style="margin-top:0px">{{ auth()->user()->first_name ." ". auth()->user()->last_name }}</h5>
                                </div>
                                <div class="profile-box mb-2">
                                    <h5 class="profile-head">Skill</h5>
                                    <div class="form-group select2Part select2multipletags form-fade-group without-icon">
                                        <label class="fade-label">Skills</label>
                                        <select name="skills[]" class="form-control customSelectMultipleTags fade-control" multiple required>
                                             @php
                                                 $skills = explode(",", auth()->user()->skills);
                                             @endphp 
                                             
                                             @foreach ($skills as $item)
                                                <option value="{{ $item }}" selected>{{ $item }}</option>
                                             @endforeach

                                        </select>
                                    </div>
                                    <div></div>
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
                                                <input type="text" name="mobile_number" id="mobile_number" class="form-control floating-control" value="{{ auth()->user()->mobile_number }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Email id</label>
                                                <input type="text" name="email" id="email" class="form-control floating-control" value="{{ auth()->user()->email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Job profile</label>
                                                <input type="text" name="job_profile" id="job_profile" class="form-control floating-control" value="{{ auth()->user()->job_profile }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part select2arrow floating-group without-icon profile-form-group">
                                                <label class="floating-label">Preferred city for job</label>
                                                <input type="text" name="job_city" class="form-control floating-control" value="{{ auth()->user()->job_city }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part select2arrow floating-group without-icon profile-form-group">
                                                <label class="floating-label">Education</label>
                                                <input type="text" name="education" class="form-control floating-control" value="{{ auth()->user()->education }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Current company</label>
                                                <input type="text" name="curlast_company" class="form-control floating-control" value="{{ auth()->user()->curlast_company }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group profile-form-group">
                                                <div class="radio-group radio-group-with-label">
                                                    <label class="form-label">Job type</label>
                                                    <div class="radio-box">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="job_time" id="full_time" class="custom-control-input" {{ auth()->user()->job_time == "Full Time" ? "checked" : "" }} value="Full Time" required>
                                                            <label class="custom-control-label" for="full_time">Full Time</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="job_time" id="part_time" class="custom-control-input"  {{ auth()->user()->job_time == "Part Time" ? "checked" : "" }} required value="Part Time">
                                                            <label class="custom-control-label" for="part_time">Part Time</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Salary (per month)</label>
                                                <input type="text" name="salary" class="form-control floating-control" value="{{ auth()->user()->salary }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part select2arrow floating-group without-icon profile-form-group">
                                                <label class="floating-label">Language</label>
                                                <input type="text" name="language" class="form-control floating-control" value="{{ auth()->user()->language }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group profile-form-group">
                                                <label class="floating-label">Age</label>
                                                <input type="text" name="age" class="form-control floating-control" value="{{ auth()->user()->age }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group profile-form-group">
                                                <div class="radio-group radio-group-with-label">
                                                    <label class="form-label">Gender</label>
                                                    <div class="radio-box">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="gender" id="malege" class="custom-control-input" {{ auth()->user()->gender == "Male" ? "checked" : "" }} value="Male" required>
                                                            <label class="custom-control-label" for="malege">Male</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="gender" id="femalege" class="custom-control-input" {{ auth()->user()->gender == "Female" ? "checked" : "" }} value="Female" required>
                                                            <label class="custom-control-label" for="femalege">Female</label>
                                                        </div>
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
                                <a href="{{ url('/jobsviewprofile') }}" class="default-btn btn-red">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>

@endsection



@section('script')
   <script>
        $(document).ready(function () {

            EMAIL = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/;
            NUMBER = /^[0-9 ]*$/;

            $('#jobs_reg_form').validate({
                rules: {
                    email: {
                        pattern: EMAIL,
                        maxlength: 90,
                        remote: {
                                type: 'get',
                                url: '{{ route("check_email_exists_in_users") }}',
                                data: {
                                    'email': function () {return $("#email").val(); }
                                },
                                dataFilter: function (data) {
                                var json = JSON.parse(data);
                                console.log(json.message)
                                if (json.status == 0) {
                                    return "\"" + json.message + "\"";
                                } else {
                                    return 'true';
                                }
                            }
                        }
                    },
                    mobile_number: {
                        required: true, 
                        minlength:10,                       
                        pattern: NUMBER,
                        maxlength: 10,
                        remote: {
                            type: 'get',
                            url: '{{ route("check_mobile_number_exists_in_users") }}',
                            data: {
                                'mobile_number': function () {return $("#mobile_number").val(); }
                            },
                            dataFilter: function (data) {
                                var json = JSON.parse(data);
                                if (json.status == 0) {
                                    return "\"" + json.message + "\"";
                                } else {
                                    return 'true';
                                }
                            }
                        }
                    },
                },
            });
            
        });
    </script>
@endsection