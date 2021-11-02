@extends('Jobseeker.master')

@section('body')
    <?php
    $loc_array = array();
    $role_array = array();
    $srole_array = array();
    $time_array = array();
    ?>
    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section">
            <div class="container">
                <form  action="{{url('/search')}}" method="get" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="job-search-box">
                                <h4>Find your next job</h4>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="faq-input-box mr-0 mb-0">
                                                <i class="feather icon-search faq-icon"></i>
                                                <input type="text"  name="search_job"class="faq-input" placeholder="Job Title" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="faq-input-box mr-0 mb-0">
                                                <i class="feather icon-map-pin faq-icon"></i>
                                                <input type="text" name="search_location" class="faq-input" placeholder="Location"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group select2Part select2arrow jobsearch-select w-100">
                                            <div class="faq-input-box mr-0 mb-0">
                                                <i class="feather icon-search faq-icon"></i>
                                                <select name="search_role" id="" class="selectcustom">
                                                    <option value="">Job Category</option>
                                                    @foreach($all_locations as $val)
                                                        <option value="{{$val->job_role}}">{{$val->job_role}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="faq-submit btn-block" value="search">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            <div class="filter-sidebar">
                                <div class="filter-box">
                                    <h5 class="filter-title">Location</h5>
                                    <div class="form-group select2Part select2arrow w-100 mb-0">
                                        <select name="job_location" id="" class="selectcustom">
                                            <option value="">All Job Location</option>
                                            @foreach($all_locations as $val)
                                                <?php
                                                $cur_loc = "$val->city,$val->state";
                                                if(!in_array($cur_loc,$loc_array)){
                                                array_push($loc_array, $cur_loc);
                                                ?>
                                                <option value="{{$val->city}},{{$val->state}}">{{$val->city}},{{$val->state}}</option>
                                                <?php } ?>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-box">
                                    <h5 class="filter-title">Job Type</h5>
                                    <div class="form-group mb-0">
                                        @foreach($all_locations as $val)
                                            <?php
                                            $cur_role = $val->job_type;
                                            if(!in_array($cur_role,$time_array)){
                                            array_push($time_array, $cur_role);
                                            ?>
                                            <div class="custom-control custom-checkbox mb-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="job_type" id="jobtype1{{$val->id}}" value="{{ $val->job_type }}" >
                                                <label class="custom-control-label" for="jobtype1{{$val->id}}">{{ ($val->job_type == 'Permanent') ? 'Full Time' : 'Part Time' }}</label>
                                            </div>
                                            <?php } ?>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="filter-box">
                                    <h5 class="filter-title">Job Category</h5>
                                    <div class="form-group mb-0" style="min-height: 280px; overflow: auto;">
                                        @foreach($all_locations as $val)
                                            <?php
                                            $cur_role = $val->job_role;
                                            if(!in_array($cur_role,$role_array)){
                                            array_push($role_array, $cur_role);
                                            ?>
                                            <div class="custom-control custom-checkbox mb-checkbox">
                                                <input type="checkbox" name="category_input" class="custom-control-input" id="jobcat1{{$val->id}}" value="{{$val->job_role}}">
                                                <label class="custom-control-label" for="jobcat1{{$val->id}}">{{$val->job_role}}</label>
                                            </div>
                                            <?php } ?>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="filter-box">
                                    <h5 class="filter-title">Salary</h5>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" name="salary_input" class="custom-control-input" id="jobsalary1"  value="20000">
                                            <label class="custom-control-label" for="jobsalary1">10000 - 20000</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" name="salary_input" class="custom-control-input" id="jobsalary2"   value="30000">
                                            <label class="custom-control-label" for="jobsalary2">21000 - 30000</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" name="salary_input" class="custom-control-input" id="jobsalary3"  value="40000">
                                            <label class="custom-control-label" for="jobsalary3">31000 - 40000</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-box">
                                    <h5 class="filter-title">Experience</h5>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_experience" id="jobexperience1" value="6 Month">
                                            <label class="custom-control-label" for="jobexperience1">0-6 Months</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_experience" id="jobexperience2" value="2 Year">
                                            <label class="custom-control-label" for="jobexperience2">1 - 2 Years</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_experience" id="jobexperience3" value="5 Year ">
                                            <label class="custom-control-label" for="jobexperience3">3 - 5 years</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_experience" id="jobexperience4" value="5+ Year">
                                            <label class="custom-control-label" for="jobexperience4">5 Years +</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-box">
                        <div class="dash-data-card h-100 mb-0">

                            @if(isset($filter_job))
                                @if(empty($filter_job))
                                    <div>No Jobs Found in this filter.</div>
                                @endif
                                @foreach($filter_job as $val)
                                    <div class="job-box">
                                        <div class="job-like-toggle">
                                            <?php $checked = (is_array($saved_by_current_user) && in_array($val->id,$saved_by_current_user)) ? "checked" : "";  ?>

                                            <input type="checkbox" class="job-like-input" data-id="{{$val->id}}" id="joblike1{{$val->id}}" data-userid="{{ !empty($user_id) ? $user_id : '' }}" <?= $checked; ?>/>
                                            <label for="joblike1{{$val->id}}" class="job-like-label">
                                                <i class="far fa-heart"></i>
                                            </label>
                                        </div>
                                        <a href="{{url('/jobseeker-detail')}}/{{$val->id}}">
                                            <div class="job-left-box">
                                                <div class="job-image-box">
                                                    <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                                </div>
                                                <div class="job-main-data">

                                                    <h5>{{$val->job_title}}</h5>
                                                    <ul>
                                                        <li>{{$val->city}},{{$val->state}}</li>
                                                        <li>Salary:<span>{{$val->min_salary}}  - {{$val->max_salary}} </span></li>
                                                    </ul>
                                                    <h6>Posted :<span>{!! time_elapsed_string($val->creation_date) !!}</span></h6>
                                                </div>
                                            </div>
                                            <div class="job-right-box">

                                                <div class="job-tags">
                                                    <div class="job-tag {{ ($val->job_type == 'Permanent') ? 'blue-tag' : 'yellow-tag' }}">{{ ($val->job_type == 'Permanent') ? 'Full Time' : 'Part Time' }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                @foreach($Job as $val)
                                    <div class="job-box">
                                        <div class="job-like-toggle">

                                            <?php $checked = (is_array($saved_by_current_user) && in_array($val->id,$saved_by_current_user)) ? "checked" : "";  ?>

                                            <input type="checkbox" class="job-like-input" data-id="{{$val->id}}" data-userid="{{ !empty($user_id) ? $user_id : '' }}" id="joblike1{{$val->id}}" <?= $checked; ?> />
                                            <label for="joblike1{{$val->id}}" class="job-like-label">
                                                <i class="far fa-heart"></i>
                                            </label>
                                        </div>
                                        <a href="{{url('/jobseeker-detail')}}/{{$val->id}}">
                                            <div class="job-left-box">
                                                <div class="job-image-box">
                                                    <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                                </div>
                                                <div class="job-main-data">

                                                    <h5>{{$val->job_title}}</h5>
                                                    <ul>
                                                        <li>{{$val->city}},{{$val->state}}</li>
                                                        <li>Salary:<span>{{$val->min_salary}}  - {{$val->max_salary}} </span></li>
                                                    </ul>
                                                    <h6>Posted :<span>{!! time_elapsed_string($val->creation_date) !!}</span></h6>

                                                </div>
                                            </div>
                                            <div class="job-right-box">

                                                <div class="job-tags">
                                                    <div class="job-tag {{ ($val->job_type == 'Permanent') ? 'blue-tag' : 'yellow-tag' }}">{{ ($val->job_type == 'Permanent') ? 'Full Time' : 'Part Time' }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dash-pagination pagination-right">
                            @if(isset($filter_job))
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        @if(($filter_job_count) > 1)

                                            @if(!isset($request_data['page']) || $request_data['page'] == 1)
                                                <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);"><i class="fa fa-chevron-left"></i></a></li>
                                            @else
                                                <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);" data-id="{{$request_data['page']-1}}" data-href="/jobseeker/?page={{$request_data['page']-1}}"><i class="fa fa-chevron-left"></i></a></li>
                                            @endif

                                            @for($i=1; $i<=$filter_job_count; $i++)
                                                <li class="page-item {{ ($i == 1) ? "active" : ""; }}"><a class="page-link" href="javascript:void(0);" data-id="{{$i}}" data-href="/jobseeker/?pass_filter={{$filter_url."&action=filter_jobs&page=".$i}}">{{$i}}</a></li>
                                            @endfor

                                            @if($filter_job_count > 1 && isset($request_data['page']) && $filter_job_count!=$request_data['page'])

                                                <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);" data-id="{{$request_data['page']+1}}" data-href="/jobseeker/?page={{$request_data['page']+1}}"><i class="fa fa-chevron-right"></i></a></li>
                                            @else
                                                <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);"><i class="fa fa-chevron-right"></i></a></li>
                                            @endif

                                        @endif
                                    </ul>
                                </nav>
                            @else
                                {{$Job->links('Jobseeker/pagination')}}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection