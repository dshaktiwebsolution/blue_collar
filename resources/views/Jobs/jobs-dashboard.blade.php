@extends('Jobs.master')

@section('body')
    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section">
            <div class="container dash-pattern">
                <div class="dash-design pattern1"><img src="{{asset('assets')}}/images/dashboard/pattern/1.png" alt=""></div>
                <div class="dash-design pattern2"><img src="{{asset('assets')}}/images/dashboard/pattern/2.png" alt=""></div>
                <div class="dash-design pattern3"><img src="{{asset('assets')}}/images/dashboard/pattern/3.png" alt=""></div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="dash-card dash-blue">
                            <a href="{{url('/jobs')}}">
                            <div class="dash-text-icon">
                                <h4>{{$count}}</h4>
                            </div>
                            <div class="dash-text">
                                <h6>Total Jobs</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="dash-card dash-green">
                            <a href="{{url('/jobs-applied')}}">
                            <div class="dash-text-icon">
                                <h4>{{$applied_job_count}}</h4>
                            </div>
                            <div class="dash-text">
                                <h6>Applied Jobs</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="dash-card dash-red">
                            <a href="{{url('/jobs-saved-jobs')}}">
                            <div class="dash-text-icon">
                                <h4>{{$saved_job_count}}</h4>
                            </div>
                            <div class="dash-text">
                                <h6>Saved Jobs</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row master-dash-data-card">
                    <div class="col-lg-6">
                        <div class="dash-skill-card dash-data-card">
                            <div class="dash-card-title">
                                <h5>Jobs based on your skill</h5>
                            </div>
                            <div class="dash-skill-data">
                                @foreach($job_based_skills as $val)
                                    <div class="skill-data">
                                        <a href="{{url('/jobs-detail')}}/{{$val->job_slug}}">
                                            <div class="skill-img">
                                                <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                            </div>
                                            <div class="skill-text">
                                                    <h6>{{$val->job_title}}</h6>
                                                <ul>
                                                    <li>
                                                        <div class="skill-icon">
                                                            <img src="{{asset('assets')}}/images/dashboard/skill/fulltime.png" alt="">
                                                        </div>
                                                        <span>{{($val->job_type == 'Permanent') ? 'Full Time' : 'Part Time' }}</span>
                                                    </li>
                                                    <li>
                                                        <div class="skill-icon">
                                                            <img src="{{asset('assets')}}/images/dashboard/skill/view.png" alt="">
                                                        </div>
                                                        <span>10 views</span>
                                                    </li>
                                                    <li>
                                                        <div class="skill-icon">
                                                            <img src="{{asset('assets')}}/images/dashboard/skill/circle.png" alt="">
                                                        </div>
                                                        <span>{{ \DB::table("user_jobs")->whereJobId($val->id)->count() }} applied</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            
                            <img src="{{asset('assets')}}/images/dashboard/pattern/4.png" class="card-pattern" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="dash-activity-card dash-data-card">
                            <div class="dash-card-title">
                                <h5>Activity</h5>
                                <!-- <div class="dash-card-title-right">
                                    <a href="javascript:void(0);" class="notifi-action">
                                        <img src="{{asset('assets')}}/images/dashboard/activity/notification.svg" alt="">
                                    </a>
                                </div> -->
                            </div>
                            <div class="dash-act-box">
                                @foreach($main_arr as $val)
                                     <div class="act-data">
                                        {!! $val['html'] !!}
                                    </div>
                                     @endforeach
                            </div>
                            <img src="{{asset('assets')}}/images/dashboard/pattern/4.png" class="card-pattern" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection