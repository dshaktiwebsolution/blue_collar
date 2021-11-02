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
                                <h5>Saved Jobs</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            @if(isset($save_job))
                                @foreach($save_job as $val)

                                    <div class="job-box">
                                        <div class="job-like-toggle">
                                            <?php $checked = (is_array($saved_by_current_user) && in_array($val->id,$saved_by_current_user)) ? "checked" : "";  ?>
                                            <input type="checkbox" class="job-like-input" data-id="{{$val->id}}" id="joblike1{{$val->id}}" <?= $checked; ?>/>
                                            <label for="joblike1{{$val->id}}" class="job-like-label">
                                                <i class="far fa-heart"></i>
                                            </label>
                                        </div>
                                        <a href="{{url('/jobs-detail')}}/{{$val->job_slug}}">
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
                                                    <div class="job-tag blue-tag">View Details</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="no_saved_jobs">No Saved Jobs Found.</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            <div class="recent-job-title">
                                <h5>Recent jobs</h5>
                            </div>
                            <div class="row">
                                @foreach($recent_job as $val)
                                    <div class="col-lg-12 col-md-6">
                                        <div class="job-box recent-job-box">
                                            <div class="job-like-toggle">
                                                <?php $checked = (is_array($saved_by_current_user) && in_array($val->id,$saved_by_current_user)) ? "checked" : "";  ?>
                                                <input type="checkbox" class="job-like-input" data-id="{{$val->id}}" id="joblike1{{$val->id}}"<?= $checked; ?>/>
                                                <label for="joblike1{{$val->id}}" class="job-like-label">
                                                    <i class="far fa-heart"></i>
                                                </label>
                                            </div>
                                            <a href="{{url('/jobs-detail')}}/{{$val->job_slug}}">
                                                <div class="job-left-box">
                                                    <div class="job-image-box">
                                                        <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                                    </div>
                                                    <div class="job-main-data">
                                                        <h5>{{$val->job_title}}</h5>
                                                        <ul>
                                                            <li>{{$val->city}},{{$val->state}}</li>
                                                            <li>Salary:<span>{{$val->min_salary}} - {{$val->max_salary}}</span></li>
                                                        </ul>
                                                        <h6>Posted :<span>{!! time_elapsed_string($val->creation_date) !!}</span></h6>
                                                    </div>
                                                    <div class="job-detail-link">
                                                        <div class="job-link">View Details</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dash-pagination pagination-center">
                            {{$save_job->links('Jobs/pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection