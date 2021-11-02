@extends('Employer.master')

@section('body')
    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-box">
                        <div class="dash-data-card mb-0 boxshadow-none">
                            <div class="active-job-area">
                                <div class="active-job-img">
                                    <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                </div>
                                @foreach($company as $val)
                                <h5>{{ $val->company_name}}</h5>
                                <p>Since : {{$val->company_year}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-box">
                        <div class="active-job-list-box">
                            {{session()->get('message')}}
                            @foreach($inactive_job as $val)
                                @if(isset($data['job_status']) == 0)
                                    <div class="actjob-box">
                                        <a href="{{url('/employer-job-listing')}}/{{$val->job_slug}}" class="actjob-left">
                                            <div class="actjob-img">
                                                <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                            </div>
                                            <div class="actjob-detail">
                                                <h5>{{$val->job_title}}</h5>
                                                <ul>
                                                    <li><img src="{{asset('assets')}}/images/dashboard/jobs/location.svg" alt=""><span>{{$val->city}}, {{$val->state}}.</span></li>
                                                    <li><img src="{{asset('assets')}}/images/dashboard/jobs/email.svg" alt=""><span>Experience : <?php
                                                            $min_year   = floor($val->min_experience / 12);
                                                            $min_month  = floor($val->min_experience % 12);
                                                            $max_year   = floor($val->max_experience / 12);
                                                            $max_month  = floor($val->max_experience % 12);

                                                            $min_str = (($min_year) > 0) ? $min_year.' Years ': '';
                                                            $min_str .= (($min_month) > 0) ? $min_month.' Months' : '';
                                                            $max_str = (($max_year) > 0) ? $max_year.' Years ': '';
                                                            $max_str .= (($max_month) > 0) ? $max_month.' Months' : '';

                                                            $full_str = !empty($min_str) ? $min_str.' - ' : '';
                                                            $full_str .= (!empty($max_str)) ? $max_str : '';
                                                            echo $full_str;
                                                            ?></span></li>
                                                    <li><img src="{{asset('assets')}}/images/dashboard/jobs/rupee.svg" alt=""><span>Salary : {{$val->min_salary}}-{{$val->max_salary}}</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                        <div class="act-badge-button">
                                            <div class="act-actions">
                                                <a href="{{url('/employer-edit-post')}}/{{$val->job_slug}}" class="act-btn edit-act"><img src="{{asset('assets')}}/images/dashboard/post/edit.svg" alt=""></a>
                                                <button class="act-btn reshape-act successalert" data-id="{{$val->id}}"><img src="{{asset('assets')}}/images/dashboard/post/reshape.svg" alt=""></button>
                                                <button class="act-btn delete-act deletalert" data-id="{{$val->id}}" ><img src="{{asset('assets')}}/images/dashboard/post/delete.svg" alt=""></button>
                                            </div>
                                            <div class="act-tags">
                                                <div class="act-tag {{ ($val->job_type == 'Permanent') ? 'blue-tag' : 'yellow-tag' }}">{{ ($val->job_type == 'Permanent') ? 'Full Time' : 'Part Time' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="no_inactive_jobs">No Saved Jobs Found.</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dash-pagination pagination-right">
                            {{$inactive_job->links('Jobs/pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection