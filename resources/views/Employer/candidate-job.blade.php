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
                                    <a href="{{url('/active-jobs')}}">
                                        <i class="feather icon-arrow-left"></i>
                                        <span>Back</span>
                                    </a>
                                </div>
                                <h5>Candidates</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="profile-head mb-4">User Experience Design</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-box">
                        <div class="cand-box">
                            <a href="javascript:void(0);" class="cand-download-btn"><img src="public/assets/images/dashboard/download-resume.png" alt=""></a>
                            <a href="{{url('/candidate-detail')}}" class="cand-link-box">
                                <div class="cand-img">
                                    <img src="public/assets/images/default-user.png" alt="">
                                </div>
                                <div class="cand-detail">
                                    <h4>Homer Simpson</h4>
                                    <h5>User Experience Designer</h5>
                                    <h6>Skills :<span>Design, Graphic Designer</span></h6>
                                    <h6>Experience :<span>2 Year</span></h6>
                                </div>
                                <div class="cand-btn">
                                    <div class="cand-view-btn">View Details</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-box">
                        <div class="cand-box">
                            <a href="javascript:void(0);" class="cand-download-btn"><img src="public/assets/images/dashboard/download-resume.png" alt=""></a>
                            <a href="{{url('/candidate-detail')}}" class="cand-link-box">
                                <div class="cand-img">
                                    <img src="public/assets/images/default-user.png" alt="">
                                </div>
                                <div class="cand-detail">
                                    <h4>Homer Simpson</h4>
                                    <h5>User Experience Designer</h5>
                                    <h6>Skills :<span>Design, Graphic Designer</span></h6>
                                    <h6>Experience :<span>2 Year</span></h6>
                                </div>
                                <div class="cand-btn">
                                    <div class="cand-view-btn">View Details</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-box">
                        <div class="cand-box">
                            <a href="javascript:void(0);" class="cand-download-btn"><img src="public/assets/images/dashboard/download-resume.png" alt=""></a>
                            <a href="{{url('/candidate-detail')}}" class="cand-link-box">
                                <div class="cand-img">
                                    <img src="public/assets/images/default-user.png" alt="">
                                </div>
                                <div class="cand-detail">
                                    <h4>Homer Simpson</h4>
                                    <h5>User Experience Designer</h5>
                                    <h6>Skills :<span>Design, Graphic Designer</span></h6>
                                    <h6>Experience :<span>2 Year</span></h6>
                                </div>
                                <div class="cand-btn">
                                    <div class="cand-view-btn">View Details</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-box">
                        <div class="cand-box">
                            <a href="javascript:void(0);" class="cand-download-btn"><img src="public/assets/images/dashboard/download-resume.png" alt=""></a>
                            <a href="{{url('/candidate-detail')}}" class="cand-link-box">
                                <div class="cand-img">
                                    <img src="public/assets/images/default-user.png" alt="">
                                </div>
                                <div class="cand-detail">
                                    <h4>Homer Simpson</h4>
                                    <h5>User Experience Designer</h5>
                                    <h6>Skills :<span>Design, Graphic Designer</span></h6>
                                    <h6>Experience :<span>2 Year</span></h6>
                                </div>
                                <div class="cand-btn">
                                    <div class="cand-view-btn">View Details</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-box">
                        <div class="cand-box">
                            <a href="javascript:void(0);" class="cand-download-btn"><img src="public/assets/images/dashboard/download-resume.png" alt=""></a>
                            <a href="{{url('/candidate-detail')}}" class="cand-link-box">
                                <div class="cand-img">
                                    <img src="public/assets/images/default-user.png" alt="">
                                </div>
                                <div class="cand-detail">
                                    <h4>Homer Simpson</h4>
                                    <h5>User Experience Designer</h5>
                                    <h6>Skills :<span>Design, Graphic Designer</span></h6>
                                    <h6>Experience :<span>2 Year</span></h6>
                                </div>
                                <div class="cand-btn">
                                    <div class="cand-view-btn">View Details</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-box">
                        <div class="cand-box">
                            <a href="javascript:void(0);" class="cand-download-btn"><img src="public/assets/images/dashboard/download-resume.png" alt=""></a>
                            <a href="{{url('/candidate-detail')}}" class="cand-link-box">
                                <div class="cand-img">
                                    <img src="public/assets/images/default-user.png" alt="">
                                </div>
                                <div class="cand-detail">
                                    <h4>Homer Simpson</h4>
                                    <h5>User Experience Designer</h5>
                                    <h6>Skills :<span>Design, Graphic Designer</span></h6>
                                    <h6>Experience :<span>2 Year</span></h6>
                                </div>
                                <div class="cand-btn">
                                    <div class="cand-view-btn">View Details</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dash-pagination pagination-right mt-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);"><i class="fa fa-chevron-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                                    <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);">...</a></li>
                                    <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);">Next</a></li>
                                    <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);"><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection