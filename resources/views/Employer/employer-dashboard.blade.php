@extends('Employer.master')

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

                                <div class="dash-text-icon">
                                    <h4>{{$count}}</h4>
                                </div>
                                <div class="dash-text">
                                    <h6>Job Posted</h6>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="dash-card dash-green">
                            <a href="{{url('/active-jobs')}}">
                            <div class="dash-text-icon">
                                <h4>{{$active_count}}</h4>
                            </div>
                            <div class="dash-text">
                                <h6>Active Jobs</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="dash-card dash-red">
                            <a href="{{url('/inactive-jobs')}}">
                            <div class="dash-text-icon">
                                <h4>{{$inactive_count}}</h4>
                            </div>
                            <div class="dash-text">
                                <h6>Inactive Jobs</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row master-dash-data-card">
                    <div class="col-lg-6">
                        <div class="application-card dash-data-card">
                            <div class="dash-card-title">
                                <h5>New Application</h5>
                                <div class="dash-card-title-right" >
                                    <a href="javascript:void(0);" class="today-action">Today</a>
                                </div>
                            </div>
                            <div class="application-box">
                                    @foreach($the_job as $val)
                                    <div class="app-user-box">
                                        <a href="javascript:void(0);">
                                            <div class="app-user-img" >
                                                <img src="{{asset('assets')}}/images/default-user.png" alt="">
                                            </div>
                                            <div class="app-user-text">
                                                <h6>{{$val->con_name}}</h6>
                                                <p>Applied for {{$val-> job_role}}</p>
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
                                        {!!  $val['html'] !!}
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
