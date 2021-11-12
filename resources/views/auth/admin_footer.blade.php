<!-- Footer -->
<footer class="dashboard-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dash-copyright">
                    <p>Copyright © 2021 All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<footer class="footer-bg footer-wrapper">
    <div class="footer-main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="footer-logo-area">
                        <a href="javascript:void(0);">
                            <h5 class="footer-logo">Blue Collar</h5>
                        </a>
                        <p>
                            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-sm-4 wow fadeInDown" data-wow-delay="0.3s">
                            <div class="footer-links">
                                <h5>About</h5>
                                <ul>
                                    <li><a href="javascript:void(0);">About Us</a></li>
                                    <li><a href="javascript:void(0);">Features</a></li>
                                    <li><a href="javascript:void(0);">New</a></li>
                                    <li><a href="javascript:void(0);">Careers</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeInDown" data-wow-delay="0.4s">
                            <div class="footer-links">
                                <h5>Company</h5>
                                <ul>
                                    <li><a href="javascript:void(0);">FAQs</a></li>
                                    <li><a href="javascript:void(0);">Blogs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeInDown" data-wow-delay="0.5s">
                            <div class="footer-links">
                                <h5>Support</h5>
                                <ul>
                                    <li><a href="javascript:void(0);">Account</a></li>
                                    <li><a href="javascript:void(0);">Support Center</a></li>
                                    <li><a href="javascript:void(0);">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInDown" data-wow-delay="0.6s">
                    <div class="subscribe-box">
                        <h5>Get in Touch</h5>
                        <p>
                            Question and Feedback? <br />
                            We Love to hear for you.
                        </p>
                        <form action="javascript:void(0)">
                            <div class="subsribe-input-box">
                                <div class="subscribe-data-box">
                                    <input type="text" class="input-form" placeholder="Enter Gmail" />
                                    <button type="submit" class="subscribe-btn"><i class="far fa-paper-plane"></i></button>
                                </div>
                            </div>
                            <!-- <label class="error-msg">Please enter valid email address</label> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 wow fadeInDown" data-wow-delay="0.8s">
                    <div class="copyright-box">
                        <p>Copyright &copy; 2021 All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInDown" data-wow-delay="1.0s">
                    <div class="footer-social">
                        <ul>
                            <li>
                                <a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Auth-modal-box -->
<div class="modal fade auth-modal" id="authmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <button type="button" class="auth-close-btn" data-dismiss="modal" aria-label="Close">
        <i class="feather icon-x"></i>
    </button>
    <div class="modal-dialog modal-dialog-centered modal-auth-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-6">
                            <div class="sign-box">
                                <div class="sign-data-box">
                                    <div class="sign-icon">
                                        <img src="{{asset('assets')}}/images/auth-img/signup-as-company.svg" alt="" />
                                    </div>
                                    <div class="sign-text">
                                        <h5>Sign up as a company</h5>
                                        <p>Let's work together</p>
                                    </div>
                                </div>
                                <div class="sign-btn-box">
                                    <a href="{{url('/signup-company')}}" class="default-btn">Register now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="sign-box">
                                <div class="sign-data-box">
                                    <div class="sign-icon">
                                        <img src="{{asset('assets')}}/images/auth-img/signup-as-individual.svg" alt="" />
                                    </div>
                                    <div class="sign-text">
                                        <h5>Sign up as an individual</h5>
                                        <p>Let's work Like boss</p>
                                    </div>
                                </div>
                                <div class="sign-btn-box">
                                    <a href="{{url('/signup-person')}}" class="default-btn">Register now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--js -->
<script src="{{asset('assets')}}/js/jquery-3.4.1.min.js"></script>
<script src="{{asset('assets')}}/js/popper.min.js"></script>
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('assets')}}/js/perfect-scrollbar.jquery.min.js"></script>
<script src="{{asset('assets')}}/js/select2.full.min.js"></script>
<script src="{{asset('assets')}}/js/wow.min.js"></script>
<script src="{{asset('assets')}}/js/sweetalert2.min.js"></script>
<script src="{{asset('assets')}}/js/quill.min.js"></script>
<script src="{{asset('assets')}}/js/croppie.min.js"></script>
<script src="{{asset('assets')}}/js/custom.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
   
</body>
</html>