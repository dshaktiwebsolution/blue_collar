@extends('Home.master')

@section('body')

<div class="page-content-area">
    <!-- Hero Section -->
    <section class="section-padding hero-section pb-0">
        <div class="banner-pattern pattern1">
            <img src="{{asset('assets')}}/images/banner-pattern.svg" alt="">
        </div>
        <div class="banner-pattern pattern2">
            <img src="{{asset('assets')}}/images/banner-pattern.svg" alt="">
        </div>
        <div class="container">
            <div class="main-hero-slider owl-carousel owl-theme" id="main-hero-slider">
                <div class="hero-slide">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-5">
                            <div class="hero-box">
                                <h2>India’s Largest<br> Blue Collar Job Platform </h2>
                                <p>Find Jobs From All Over India</p>

                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="hero-data-img">
                                <img src="{{asset('assets')}}/images/banner1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-5">
                            <div class="hero-box">
                               <h2>India’s Largest<br> Blue Collar Job Platform </h2>
                               <p>
                                    <span>Post Free Jobs</span>
                                    <span>Take Interviews</span>
                                    <span>Hire Employees </span>
                               </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="hero-data-img">
                                <img src="{{asset('assets')}}/images/banner2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Whatsapp-Section -->
    <section class="section-padding whatsapp-section">
        <div class="container">
            <div class="row flex-row-reverse align-items-center">
                <div class="col-lg-5 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="whtsapp-mobile-img">
                        <img src="{{asset('assets')}}/images/whatsapp-device.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-7 wow zoomIn" data-wow-delay="0.2s">
                    <div class="whatsapp-box">
                        <h4>Get access to jobs <br>on Whatsapp</h4>
                        <ul>
                            <li>Less than 1 min registration on Whatsapp</li>
                            <li>Lakhs of Verified jobs</li>
                            <li>Get calls directly</li>
                        </ul>
                        <a href="https://web.whatsapp.com/send?phone=14155238886&text=join+dark-nothing" class="default-btn" target="_blank">Register With Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Browse-Section -->
    <section class="section-padding browse-section">
        <div class="container">
            <div class="row flex-row-reverse align-items-center justify-content-between">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="browse-img-box">
                        <img src="{{asset('assets')}}/images/browse-img.png" alt="">
                    </div>
                </div>
                <div class="col-lg-7 wow zoomIn" data-wow-delay="0.2s">
                    <div class="browse-box">
                        <h4>Hire Blue Collar Workers</h4>
                        <ul>
                            <li>Post free jobs</li>
                            <li>Get access to verified employee profiles</li>
                        </ul>
                         @if (Route::has('login'))
                         @auth
                        <a href="{{ url('/employer-dashboard') }}" class="default-btn white-btn">Post Free Job</a>
                        @else
                        <a href="{{ url('/login') }}" class="default-btn white-btn">Post Free Job</a>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Counter Section -->
    <section class="section-padding Counter-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 wow zoomIn" data-wow-delay="0.2s">
                    <div class="section-title">
                        <h2>Blue Collar Facts</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-sm-6 mb-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="cate-box">
                        <div class="counter-detail">
                            <img src="{{asset('assets')}}/images/counter/users.svg" alt="">
                            <h5>1 Crore +</h5>
                            <span>Users</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6 mb-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="cate-box">
                        <div class="counter-detail">
                            <img src="{{asset('assets')}}/images/counter/interviews.svg" alt="">
                            <h5>80 Lacks +</h5>
                            <span>Interview Last Month</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6 mb-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="cate-box">
                        <div class="counter-detail">
                            <img src="{{asset('assets')}}/images/counter/jobs.svg" alt="">
                            <h5>15 Lakhs +</h5>
                            <span>Jobs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    

    <!-- Client Section -->
    <section class="section-padding clinet-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 wow zoomIn" data-wow-delay="0.2s">
                    <div class="section-title">
                        <h2>Our Clients</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam etmetus effici turac fringilla lorem facilisis.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-12 mt-5">
                    <div class="client-data-slider owl-carousel owl-theme" id="client-slider">
                        <div class="client-box">
                            <a href="javascript:void(0);">
                                <img src="{{asset('assets')}}/images/client-logos/google.svg" alt="">
                            </a>
                        </div>
                        <div class="client-box">
                            <a href="javascript:void(0);">
                                <img src="{{asset('assets')}}/images/client-logos/yahoo.svg" alt="">
                            </a>
                        </div>
                        <div class="client-box">
                            <a href="javascript:void(0);">
                                <img src="{{asset('assets')}}/images/client-logos/flipkart.svg" alt="">
                            </a>
                        </div>
                        <div class="client-box">
                            <a href="javascript:void(0);">
                                <img src="{{asset('assets')}}/images/client-logos/amazon.svg" alt="">
                            </a>
                        </div>
                        <div class="client-box">
                            <a href="javascript:void(0);">
                                <img src="{{asset('assets')}}/images/client-logos/youtube.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="section-padding testimonial-section">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.2s">
                    <div class="testi-heading">
                        <h2>What our client says about us</h2>
                    </div>
                </div>
            </div>
            <div class="testi-main-content">
                <div class="testimonial-slider owl-carousel owl-theme" id="testimonial-slider">
                    <div class="testi-slide">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-5 col-lg-5 wow fadeInDown" data-wow-delay="0.2s">
                                <div class="testi-user-box">
                                    <div class="testi-img">
                                        <div class="testi-bg-box"></div>
                                        <img src="{{asset('assets')}}/images/testimonial/user1.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="testi-detail-box">
                                    <div class="testi-icon testi-icon1">
                                        <img src="{{asset('assets')}}/images/testimonial/quote-left.svg" alt="">
                                    </div>
                                    <div class="testi-users-text">
                                        <h5>Joncy Roy</h5>
                                        <h6>UI / UX Designer</h6>
                                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum.</p>
                                    </div>
                                    <div class="testi-icon testi-icon2">
                                        <img src="{{asset('assets')}}/images/testimonial/quote-right.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testi-slide">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-5 col-lg-5 wow fadeInDown" data-wow-delay="0.2s">
                                <div class="testi-user-box">
                                    <div class="testi-img">
                                        <div class="testi-bg-box"></div>
                                        <img src="{{asset('assets')}}/images/testimonial/user2.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="testi-detail-box">
                                    <div class="testi-icon testi-icon1">
                                        <img src="{{asset('assets')}}/images/testimonial/quote-left.svg" alt="">
                                    </div>
                                    <div class="testi-users-text">
                                        <h5>Johny Smith</h5>
                                        <h6>Co-Founder</h6>
                                        <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                    </div>
                                    <div class="testi-icon testi-icon2">
                                        <img src="{{asset('assets')}}/images/testimonial/quote-right.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testi-slide">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-5 col-lg-5 wow fadeInDown" data-wow-delay="0.2s">
                                <div class="testi-user-box">
                                    <div class="testi-img">
                                        <div class="testi-bg-box"></div>
                                        <img src="{{asset('assets')}}/images/testimonial/user3.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="testi-detail-box">
                                    <div class="testi-icon testi-icon1">
                                        <img src="{{asset('assets')}}/images/testimonial/quote-left.svg" alt="">
                                    </div>
                                    <div class="testi-users-text">
                                        <h5>Clodia Max</h5>
                                        <h6>Sr. IOS Developer</h6>
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search.</p>
                                    </div>
                                    <div class="testi-icon testi-icon2">
                                        <img src="{{asset('assets')}}/images/testimonial/quote-right.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection