@extends('Employer.master')

@section('body')

<style>
    .dashboard-section{
        padding-top: 82px;
        padding-bottom: 0;
    }
    .job-post-box{
        border-radius: 0;
    }
    form{
        margin-bottom: 0;
    }
</style>
    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section job-post-section">
            <form action="{{url('/update-job-post')}}/{{$tbl_job->id}}" enctype="multipart/form-data" method="post" >
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-5 full-left-side">
                        <div class="master">
                            <h1>First, tell us about the position</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form action="{{url('/inactive-jobs')}}">
                            <div class="job-post-box">
                                <h5 class="jobpost-head">Basic Detail</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Job title</label>
                                            <input type="text" class="post-control" name="job_title" placeholder="Enter your job title" autocomplete="off" value="{{$tbl_job->job_title}}"/>
                                            @error('job_title')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Job role</label>
                                            <input type="text" class="post-control" name="job_role" placeholder="Enter the job role" autocomplete="off" value="{{$tbl_job->job_role}}"/>
                                            @error('job_role')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                   <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Work from home available</label>
                                            <div class="radio-group radio-group-with-label border-0 p-0">
                                                <div class="radio-box">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="wfha" id="yeswfh1" class="custom-control-input" value="Yes" {{($tbl_job->work_home == "Yes") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="yeswfh1">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="wfha" id="yeswfh2" class="custom-control-input" value="No" {{($tbl_job->work_home == "No") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="yeswfh2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Job type</label>
                                            <div class="radio-group radio-group-with-label border-0 p-0">
                                                <div class="radio-box input_val">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="job_type" id="jt1" class="custom-control-input" value="Permanent"  {{($tbl_job->job_type == "Permanent") ? "checked" : ""}}>
                                                        <label class="custom-control-label" for="jt1">Permanent</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="job_type" id="jt2" class="custom-control-input" value="Contractual" {{($tbl_job->job_type == "Contractual") ? "checked" : ""}}>
                                                        <label class="custom-control-label" for="jt2">Contractual</label>
                                                    </div>
                                                </div>
                                                @error('job_type')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-6 value-time-job">
                                        <div class="post-form-group">
                                            <label class="post-label">Job contract type</label>
                                            <div class="radio-group radio-group-with-label border-0 p-0">
                                                <div class="radio-box">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="hdm" id="hdm1" class="custom-control-input" value="Hours" {{($tbl_job->job_day == "Hours") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="hdm1">Hours</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" name="hdm" id="hdm2" class="custom-control-input" value="Days" {{($tbl_job->job_day == "Days") ? "checked" : ""}}>
                                                        <label class="custom-control-label" for="hdm2">Days</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="hdm" id="hdm3" class="custom-control-input" value="Month" {{($tbl_job->job_day == "Month") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="hdm3">Month</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 job-duration">
                                            <div class="post-form-group">
                                                <label class="post-label">Job duration</label>
                                                <!-- <input type="text" class="post-control" placeholder="Enter the job role" /> -->
                                                <div class="input-group">
                                                    <input type="text" class="form-control post-control" name="job_duration" placeholder="Enter the duration" autocomplete="off"  value="{{$tbl_job->job_duration}}">
                                                    <span class="input-group-addon">Months</span>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group mb-0">
                                            <label class="post-label">Salary</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="post-form-group salary-icon">
                                                        <i class="fas fa-rupee-sign"></i>
                                                        <input type="text" class="post-control" name="min_salary" placeholder="Min. Salary" autocomplete="off" value="{{$tbl_job->min_salary}}"/>
                                                        @error('min_salary')<span style="color:red">{{$message}}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="post-form-group salary-icon">
                                                        <i class="fas fa-rupee-sign"></i>
                                                        <input type="text" class="post-control" name="max_salary" placeholder="Max . Salary" autocomplete="off" value="{{$tbl_job->max_salary}}"/>
                                                        @error('max_salary')<span style="color:red">{{$message}}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">No. of openings</label>
                                            <input type="text" class="post-control" name="company_opening" placeholder="Enter your No. of openings" autocomplete="off" value="{{$tbl_job->company_opening}}"/>
                                            @error('company_opening')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Job Days:</label>
                                            <div class="select2Part select2arrow">
                                                <select class="form-control customSelect" name="company_working_days" value="{{$tbl_job->company_job_days}}">
                                                    <option value="">Select Your Working Days</option>
                                                    <option value="Monday to Friday" {{($tbl_job->company_job_days == "Monday to Friday") ? "selected" : "" }}>Monday to Friday</option>
                                                    <option value="Monday to Saturday" {{($tbl_job->company_job_days == "Monday to Saturday") ? "selected" : "" }}>Monday to Saturday</option>
                                                    <option value="Monday to Sunday" {{($tbl_job->company_job_days == "Monday to Sunday") ? "selected" : "" }}>Monday to Sunday</option>
                                                </select>
                                                @error('company_working_days')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="post-form-group mb-0">
                                            <label class="post-label">Working Timings</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="post-form-group">
                                                       
                                                        <select class="form-control customSelect" name="start_time">
                                                        <option value="">Select Working Start Time</option>
                                                        @php
                                                        $i = 0;

                                                        for($i=1; $i<=24; $i++){
                                                            $sel = '';
                                                            if($i<=12){
                                                                 $sel = ($tbl_job->job_time_start == $i .':00 AM') ? "selected" : "" ;
                                                                 echo '<option value="'.$i .':00 AM" '.$sel.' >'. $i .':00 AM</option>'; 
                                                            }else{
                                                                 $sel = ($tbl_job->job_time_start == $i .':00 PM') ? "selected" : "" ;
                                                                 echo '<option value="'.$i .':00 PM" '.$sel.' >'. $i .':00 PM</option>'; 
                                                            }
                                                        }
                                                        @endphp
                                                        </select>  
                                                        @error('start_time')<span style="color:red">{{$message}}</span> @enderror 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="post-form-group">
                                                        <select class="form-control customSelect" name="end_time">
                                                        <option value="">Select Working End Time</option>
                                                        @php
                                                        $i = 0;
                                                        for($i=1; $i<=24; $i++){
                                                            $sel = '';
                                                            if($i<=12){
                                                                $sel = ($tbl_job->job_time_end == $i .':00 AM') ? "selected" : "" ;
                                                                echo '<option value="'.$i .':00 AM" '.$sel.' >'. $i .':00 AM</option>'; 
                                                            }else{
                                                                $sel = ($tbl_job->job_time_end == $i .':00 PM') ? "selected" : "" ;
                                                                echo '<option value="'.$i .':00 PM" '.$sel.' >'. $i .':00 PM</option>'; 
                                                            }
                                                        }
                                                        @endphp
                                                       </select>
                                                       @error('end_time')<span style="color:red">{{$message}}</span> @enderror 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Min Education</label>
                                            <div class="select2Part select2arrow">
                                                <select class="form-control customSelect" name="education" value="{{$tbl_job->company_education}}">
                                                    <option value="">Select Your Min Education</option>
                                                    <option value="10th or Below 10th" {{($tbl_job->company_education == "10th or Below 10th") ? "selected" : "" }}>10th or Below 10th</option>
                                                    <option value="12th Pass" {{($tbl_job->company_education == "12th Pass") ? "selected" : "" }}>12th Pass</option>
                                                    <option value="Diploma" {{($tbl_job->company_education == "Diploma") ? "selected" : "" }}>Diploma</option>
                                                    <option value="Graduate" {{($tbl_job->company_education == "Graduate") ? "selected" : "" }}>Graduate</option>
                                                    <option value="Post Graduate" {{($tbl_job->company_education == "Post Graduate") ? "selected" : "" }}>Post Graduate</option>  
                                                </select>
                                                @error('education')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group mb-0 top-experience">
                                            <label class="post-label">Experience</label>
                                             <div class="radio-group radio-group-with-label border-0 p-0">
                                                <div class="radio-box">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="experience" id="fresher" class="custom-control-input" value="fresher" {{($tbl_job->experience_custom == "fresher") ? "checked" : ""}} checked>
                                                        <label class="custom-control-label" for="fresher">Fresher</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="experience" id="experience" class="custom-control-input" value="experience" {{($tbl_job->experience_custom == "experience") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="experience">Experience</label>
                                                    </div>
                                                </div>
                                                @error('experience')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="post-form-group mb-0 under-experience" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="post-form-group">
                                                        <div class="select2Part select2multipletags form-fade-group without-icon">
                                                                <select class="form-control customSelectMultipleTags fade-control" name="min_experience" value={{$tbl_job->min_experience}}>
                                                                    <option value="">Min. Experience</option>
                                                                    <option value="6" {{($tbl_job->min_experience == "6") ? "selected" : "" }}>6 Month</option>
                                                                    <option value="12" {{($tbl_job->min_experience == "12") ? "selected" : "" }}>1 Year</option>
                                                                    <option value="18" {{($tbl_job->min_experience == "18") ? "selected" : "" }}>1 Year 6 Month</option>
                                                                    <option value="24" {{($tbl_job->min_experience == "24") ? "selected" : "" }}>2 Year</option>
                                                                    <option value="30" {{($tbl_job->min_experience == "30") ? "selected" : "" }}>2 Year 6 month</option>
                                                                    <option value="36" {{($tbl_job->min_experience == "36") ? "selected" : "" }}>3 Year</option>
                                                                    <option value="42" {{($tbl_job->min_experience == "42") ? "selected" : "" }}>3 Year 6 Month</option>
                                                                    <option value="48"{{($tbl_job->min_experience == "48") ? "selected" : "" }}>4 Year</option>
                                                                    <option value="54"{{($tbl_job->min_experience == "54") ? "selected" : "" }}>4 Year 6 month</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="select2Part select2multipletags form-fade-group without-icon">
                                                        <select class="form-control customSelectMultipleTags fade-control" name="max_experience" value={{$tbl_job->max_experience}}>
                                                            <option value="">Max. Experience</option>
                                                            <option value="6" {{($tbl_job->max_experience == "6") ? "selected" : "" }}>6 Month</option>
                                                            <option value="12" {{($tbl_job->max_experience == "12") ? "selected" : "" }}>1 Year</option>
                                                            <option value="18" {{($tbl_job->max_experience == "18") ? "selected" : "" }}>1 Year 6 Month</option>
                                                            <option value="24" {{($tbl_job->max_experience == "24") ? "selected" : "" }}>2 Year</option>
                                                            <option value="30" {{($tbl_job->max_experience == "30") ? "selected" : "" }}>2 Year 6 month</option>
                                                            <option value="36"{{($tbl_job->max_experience == "36") ? "selected" : "" }}>3 Year</option>
                                                            <option value="42" {{($tbl_job->max_experience == "42") ? "selected" : "" }}>3 Year 6 Month</option>
                                                            <option value="48"{{($tbl_job->max_experience == "48") ? "selected" : "" }}>4 Year</option>
                                                            <option value="54"{{($tbl_job->max_experience == "54") ? "selected" : "" }}>4 Year 6 month</option>
                                                            <option value="60"{{($tbl_job->max_experience == "60") ? "selected" : "" }}>5 Year </option>
                                                            <option value="66"{{($tbl_job->max_experience == "66") ? "selected" : "" }}>5+ Year </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Gender</label>
                                            <div class="radio-group radio-group-with-label border-0 p-0">
                                                <div class="radio-box">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="gender" id="ml1" class="custom-control-input" value="Male" {{($tbl_job->gender == "Male") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="ml1">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="gender" id="fml2" class="custom-control-input" value="Female" {{($tbl_job->gender == "Female") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="fml2">Female</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="gender" id="bl2" class="custom-control-input" value="Both"{{($tbl_job->gender == "Both") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="bl2">Both</label>
                                                    </div> 
                                                </div>
                                                @error('gender')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <h5 class="jobpost-head">Candidate Requirements</h5>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Skills</label>
                                            <div class="select2Part select2multipletags form-fade-group without-icon">
                                                <label class="fade-label">Skills</label>
                                                <select class="form-control customSelectMultipleTags fade-control" name="skills[]" multiple >
                                                    <option value="Design" {{ (@unserialize($tbl_job->skills) == true) && is_array(unserialize($tbl_job->skills)) && in_array('Design', unserialize($tbl_job->skills)) ? "selected" : "" }}>Design</option>
                                                    <option value="Graphic Designer" {{ (@unserialize($tbl_job->skills) == true) && is_array(unserialize($tbl_job->skills)) && in_array('Graphic Designer', unserialize($tbl_job->skills)) ? "selected" : "" }}>Graphic Designer</option>
                                                    <option value="Java" {{ (@unserialize($tbl_job->skills) == true) && is_array(unserialize($tbl_job->skills)) && in_array('Java',unserialize($tbl_job->skills)) ? "selected" : "" }}>Java</option>
                                                    <option value="Script" {{ (@unserialize($tbl_job->skills) == true) && is_array(unserialize($tbl_job->skills)) &&  in_array('Script', unserialize($tbl_job->skills)) ? "selected" : "" }}>Script</option>
                                                    <option value="HTML" {{ (@unserialize($tbl_job->skills) == true) && is_array(unserialize($tbl_job->skills)) && in_array('HTML',unserialize($tbl_job->skills)) ? "selected" : "" }}>HTML</option>
                                                    <option value="CSS" {{ (@unserialize($tbl_job->skills) == true) &&  is_array(unserialize($tbl_job->skills)) && in_array('CSS',unserialize($tbl_job->skills)) ? "selected" : "" }}>CSS</option>
                                                </select>
                                                @error('skills')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>                               
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Qualification</label>
                                            <input type="text" class="post-control"name="qualification" placeholder="Enter the qualification" autocomplete="off" value="{{$tbl_job->qualification}}" />
                                            @error('qualification')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group mb-0">
                                            <label class="post-label">Age</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="post-form-group">
                                                        <input type="text" class="post-control"name="min_age" placeholder="Min. Age" autocomplete="off" value="{{$tbl_job->min_age}}"/>
                                                        @error('min_age')<span style="color:red">{{$message}}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="post-form-group">
                                                        <input type="text" class="post-control" name="max_age" placeholder="Max . Age" autocomplete="off" value="{{$tbl_job->max_age}}" />
                                                        @error('max_age')<span style="color:red">{{$message}}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Language</label>
                                            <div class="select2Part select2multipletags form-fade-group without-icon">
                                                <label class="fade-label">Language</label>
                                                <select class="form-control customSelectMultipleTags fade-control" name="language[]" multiple>
                                                    <option value="English" {{ (@unserialize($tbl_job->language) == true) && is_array(unserialize($tbl_job->language)) && in_array('English', unserialize($tbl_job->language)) ? "selected" : "" }} >English</option>
                                                    <option value="Hindi" {{ (@unserialize($tbl_job->language) == true) && is_array(unserialize($tbl_job->language)) && in_array('Hindi', unserialize($tbl_job->language)) ? "selected" : "" }}>Hindi</option>
                                                    <option value="Gujarati" {{ (@unserialize($tbl_job->language) == true) && is_array(unserialize($tbl_job->language)) && in_array('Gujarati', unserialize($tbl_job->language)) ? "selected" : "" }}>Gujarati</option>
                                                    <option value="Punjabi" {{ (@unserialize($tbl_job->language) == true) && is_array(unserialize($tbl_job->language)) && in_array('Punjabi', unserialize($tbl_job->language)) ? "selected" : "" }}>Punjabi</option>
                                                </select>
                                                @error('language')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="post-form-group">
                                            <label class="post-label">Benefits</label>
                                            <input type="text" class="post-control" name="benefits" placeholder="Enter the benefit" autocomplete="off" value="{{$tbl_job->benefits}}"/>
                                            @error('benefits')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="post-form-group">
                                            <label class="post-label">Job description</label>
                                            <div class="post-compose-editor">
                                                <div class="post-compose-buttons">
                                                    <div class="editor-tool-box">
                                                        <div class="editor-block">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                            <button class="ql-link"></button>
                                                        </div>
                                                        <div class="editor-block">
                                                            <button class="ql-blockquote"></button>
                                                            <button class="ql-indent" value="-1"></button>
                                                            <button class="ql-indent" value="+1"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-align" value=""></button>
                                                            <button class="ql-align" value="center"></button>
                                                            <button class="ql-align" value="right"></button>
                                                            <button class="ql-align" value="justify"></button>
                                                        </div>
                                                        <div class="editor-block">
                                                            <button class="ql-undo" onclick="quill.history.undo();"><i class="fa fa-undo"></i></button>
                                                            <button class="ql-redo" onclick="quill.history.redo();"><i class="fa fa-redo"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="compose-post-box"></div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-lg-12">
                                        <div class="post-form-group">
                                            <label class="post-label">How do you want candidates to contact you</label>
                                            <div class="radio-group radio-group-with-label border-0 p-0">
                                                <div class="radio-box">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="contact_type" id="cnct1" class="custom-control-input" value="Call you" {{($tbl_job->candidates_contact == "Call you") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="cnct1">Call you</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="contact_type" id="cnct2" class="custom-control-input" value="Send resumes" {{($tbl_job->candidates_contact == "Send resumes") ? "checked" : ""}}>
                                                        <label class="custom-control-label" for="cnct2">Send resumes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="contact_type" id="cnct3" class="custom-control-input" value="Both" {{($tbl_job->candidates_contact == "Both") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="cnct3">Both</label>
                                                    </div>
                                                </div>
                                                @error('contact_type')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <h5 class="jobpost-head">Interview Information</h5>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">Select Your Business</label>
                                            <div class="radio-group radio-group-with-label border-0 p-0 business-value">
                                                <div class="radio-box">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="business" id="company" class="custom-control-input" value="Company" {{($tbl_job->business_type == "Company") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="company">Company</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="business" id="consultant" class="custom-control-input" value="Consultant" {{($tbl_job->business_type == "Consultant") ? "checked" : ""}} >
                                                        <label class="custom-control-label" for="consultant">Consultant</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="business" id="individual" class="custom-control-input" value="Individual"{{($tbl_job->business_type == "Individual") ? "checked" : ""}}>
                                                        <label class="custom-control-label" for="individual">Individual</label>
                                                    </div> 
                                                </div>
                                                @error('business')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 company-name business-value-selector company">
                                        <div class="post-form-group">
                                            <label class="post-label">Company Name</label>
                                            <input type="text" class="post-control" name="business_name" placeholder="Enter your Company name" autocomplete="off" value="{{$tbl_job->company_name}}"/>
                                            @error('business_name')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <script src="{{asset('assets')}}/js/cities.js"></script>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">State</label>
                                            <div class="select2Part select2arrow">
                                                <select name="state" id="sts" class="form-control customSelect" onchange="print_city('state', this.selectedIndex);" value="{{$tbl_job->state}}">
                                                    <!-- <option value="" {{(old('state') == "") ? "selected" : "" }}></option> -->
                                                </select>
                                                @error('state')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-form-group">
                                            <label class="post-label">City</label>
                                            <div class="select2Part select2arrow">                                         
                                                <select  name="city" id ="state" class="form-control customSelect" value="{{$tbl_job->city}}">
                                                    <option value="">Choose the city</option>
                                                </select>
                                                @error('city')<span style="color:red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 Flat-address">
                                        <div class="post-form-group">
                                            <label class="post-label">Your Address</label>
                                            <input type="text" class="post-control" name="company_address" placeholder="Enter your Address" autocomplete="off" value="{{$tbl_job->company_address}}"/>
                                            @error('company_address')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="post-form-group mb-0">
                                            <label class="post-label">Contact person</label>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="post-form-group">
                                                        <input type="text" class="post-control"name="name" placeholder="Enter the name" autocomplete="off" value="{{$tbl_job->con_name}}" />
                                                        @error('name')<span style="color:red">{{$message}}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="post-form-group">
                                                        <input type="text" class="post-control"name="number" placeholder="Enter the number" autocomplete="off" value="{{$tbl_job->con_number}}" />
                                                        @error('number')<span style="color:red">{{$message}}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="post-form-group">
                                                        <input type="text" class="post-control" name="email" placeholder="Enter the email address" autocomplete="off" value="{{$tbl_job->con_email}}" />
                                                        @error('email')<span style="color:red">{{$message}}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script language="javascript">print_state("sts");</script>
                                    <div class="col-lg-12 buttons-group text-right mt-5">
                                        <textarea id="hidden_desc" name="job_desc" style="display:none">{{$tbl_job->job_desc}}</textarea>
                                        <button type="submit"class="default-btn">Update</button>
                                        <a href="{{url('/inactive-jobs')}}" class="default-btn btn-red">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </section>


    </div>




    
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if(jQuery("#hidden_desc").val() != ''){
            jQuery(".ql-editor").html(jQuery("#hidden_desc").val());
        }

    jQuery('.ql-editor').bind('DOMSubtreeModified', function(){
               if(!jQuery(this).hasClass("ql-blank")){
            jQuery("#hidden_desc").val(jQuery(this).html());
        } else {
            jQuery("#hidden_desc").val('');
        }
    });
    });
</script>