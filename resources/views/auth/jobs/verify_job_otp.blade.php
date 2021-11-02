@extends('auth.master')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('body')
    <div class="page-ath-wrap">
        <div class="page-back-btn">
            <a href="index.html">
                <i class="feather icon-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>
        <div class="page-ath-gfx">
            <a href="index.html" class="page-ath-logo">
                <h5>Blue Collar</h5>
            </a>
            <div class="page-ath-image">
                <img src="{{ asset('assets') }}/images/auth-img/signup-otp-as-company.svg" alt="">
            </div>
        </div>
        <div class="page-ath-content">
            <div class="page-ath-form">
                <div class="page-ath-title">
                    <h2>Enter Verification Code</h2>
                    <div class="form-footer-link">
                        <p>We have just sent a verification code to <br> +91 {{ substr($user->mobile_number, 0, 2) }}***
                            ***{{ substr($user->mobile_number, -2) }}</p>
                    </div>
                </div>
                <div class="page-form-data">
                    <form action="{{ route('verify_job_otp') }}" method="POST" id="verify_job_otp">
                        @csrf

                        <input type="hidden" name="mobile_number" value="{{ $user->mobile_number }}">
                        <div class="row m-0">
                            <div class="col-md-12 p-0">
                                <div class="form-group-input otp-form-group mb-3">
                                    <input type="text" minlength="1" maxlength="1" class="otp-inputbar"
                                        name="verify_otp[]" id="verify_otp_1">
                                    <input type="text" minlength="1" maxlength="1" class="otp-inputbar"
                                        name="verify_otp[]" id="verify_otp_2">
                                    <input type="text" minlength="1" maxlength="1" class="otp-inputbar"
                                        name="verify_otp[]" id="verify_otp_3">
                                    <input type="text" minlength="1" maxlength="1" class="otp-inputbar"
                                        name="verify_otp[]" id="verify_otp_4">
                                </div>
                                <span class="text-danger verify_otp_error"></span>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="forgrot-link text-left">
                                    <a href="javascript:void(0);">Send code again</a>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <input type="button" name="" class="auth-btn mt-auth default-btn btn-block verify_otp_btn"
                                    value="Verify">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".verify_otp_btn").click(function() {
                var verify_otp_1 = $("#verify_otp_1").val().trim();
                var verify_otp_2 = $("#verify_otp_2").val().trim();
                var verify_otp_3 = $("#verify_otp_3").val().trim();
                var verify_otp_4 = $("#verify_otp_4").val().trim();

                if (verify_otp_1 == "" || verify_otp_2 == "" || verify_otp_3 == "" || verify_otp_4 == "") {
                    $(".verify_otp_error").text("Please enter your verification code.");
                } else {
                    var data = new FormData(verify_job_otp);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('verify_job_otp') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == 1) {
                                window.location.href = "{{ url('/jobs-dashboard') }}"
                            } else {
                                $(".verify_otp_error").text("Please enter valid verification code.");
                            }
                        }
                    });
                }

            });
        });
    </script>
@endsection
