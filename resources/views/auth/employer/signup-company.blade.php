@extends('auth.master')

@section('body')

 <!-- athentication Section -->
        <div class="page-ath-wrap page-form-left">
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
                    <img src="public/assets/images/auth-img/signup-company.svg" alt="">
                </div>
            </div>
            <div class="page-ath-content">
                <div class="page-ath-form">
                    <div class="page-ath-title">
                        <h2>Sign up as a company</h2>
                        <div class="form-footer-link">
                           <p>Already a member? <a href="{{url('/emp-login')}}">Log in</a></p>
                        </div>
                    </div>
                    <div class="page-form-data">
                        <form action="{{url('company')}}" method="POST" id="company_reg_form">
                            @csrf

                            <input type="hidden" name="user_type" value="0">
                            <div class="row m-0">
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label" >Company Name</label>
                                            <input type="text" name="company_name" class="form-control floating-control" autocomplete="off" value="{{old('company_name')}}" required>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/users.png" class="input-img" alt="">
                                            </div>
                                            @error('company_name')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label" >Your full name</label>
                                            <input type="text" name="name" class="form-control floating-control" autocomplete="off" value="{{old('name')}}" required>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/user.png" class="input-img" alt="">
                                            </div>
                                            @error('name')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label" >About Company</label>
                                            <textarea rows="5"  name="about_company" class="form-control floating-control" autocomplete="off" required> {{old('about_company')}}</textarea>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/about-company-note.png" class="input-img" alt="">
                                            </div>
                                            @error('about_company')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label" >Web-site</label>
                                            <input type="text" name="web-site" class="form-control floating-control" autocomplete="off" value="{{old('web-site')}}" required>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/globe.png" class="input-img" alt="">
                                            </div>
                                            @error('web-site')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label" >E-mail</label>
                                            <input type="text" name="email" id="email" class="form-control floating-control" autocomplete="off" value="{{old('email')}}" required>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/email.png" class="input-img" alt="">
                                            </div>
                                            @error('email')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label" >Mobile number</label>
                                            <input type="text"  name="mobile_number" id="mobile_number" class="form-control floating-control" autocomplete="off" value="{{old('mobile_number')}}" required>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/mobile.png" class="input-img" alt="">
                                            </div>
                                        </div>
                                        @error('mobile_number')<span style="color:red">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group select2Part floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label" >State </label>
                                            <select name="state" id="state" class="form-control customSelect floating-control" autocomplete="off" required>
                                                
                                                @foreach ($states as $item)
                                                    <option value="{{ $item->id }}" {{(old('state') == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/select.png" class="input-img" alt="">
                                            </div>
                                            @error('state')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group select2Part floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label" >City </label>
                                            <select name="city" id="city" class="form-control customSelect floating-control" autocomplete="off" required>
                                                
                                            </select>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/select.png" class="input-img" alt="">
                                            </div>
                                            @error('city')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label" >Password</label>
                                            <input type="password"  name="password" id="password2" class="form-control floating-control" autocomplete="off" required>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/lock.png" class="input-img" alt="">
                                            </div>
                                            @error('password')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group floating-group">
                                        <div class="input-icon-right">
                                            <label class="floating-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control floating-control" autocomplete="off" required>
                                            <div class="right-icon">
                                                <img src="public/assets/images/auth-icon/lock.png" class="input-img" alt="">
                                            </div>
                                            @error('confirm_password')<span style="color:red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                     <input type="submit" name="" class="auth-btn mt-auth default-btn btn-block" value="Register">
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
        $(document).ready(function () {

            EMAIL = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/;
            NUMBER = /^[0-9 ]*$/;

            $('#company_reg_form').validate({
                rules: {
                    email: {
                        pattern: EMAIL,
                        maxlength: 90,
                        remote: {
                                type: 'get',
                                url: '{{ route("check_email_exists_in_users") }}',
                                data: {
                                    'email': function () {return $("#email").val(); }
                                },
                                dataFilter: function (data) {
                                var json = JSON.parse(data);
                                console.log(json.message)
                                if (json.status == 0) {
                                    return "\"" + json.message + "\"";
                                } else {
                                    return 'true';
                                }
                            }
                        }
                    },
                    mobile_number: {
                        required: true, 
                        minlength:10,                       
                        pattern: NUMBER,
                        maxlength: 10,
                        remote: {
                            type: 'get',
                            url: '{{ route("check_mobile_number_exists_in_users") }}',
                            data: {
                                'mobile_number': function () {return $("#mobile_number").val(); }
                            },
                            dataFilter: function (data) {
                                var json = JSON.parse(data);
                                if (json.status == 0) {
                                    return "\"" + json.message + "\"";
                                } else {
                                    return 'true';
                                }
                            }
                        }
                    },
                    confirm_password: {
                        required: true,      
                        equalTo: "#password2"
                    }, 
                },
                messages: {
                    email: {
                        remote: "Email already in use!"
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "state"){
                    error.appendTo( element.parent("div").next("div") );
                    } else if (element.attr("name") == "city"){
                    error.appendTo( element.parent("div").next("div") );
                    } else {
                    error.insertAfter(element);
                    }
                }
            });

            $("#state").on('change', function() {
            var state_id = $(this).val();
            if(state_id) {
                $.ajax({
                    url: '{{ route("get_city_by_state_id") }}',
                    type: "GET",
                    data: { state_id: state_id },
                    success:function(response) {

                        $("#city").empty();
                        $.each(response, function(key, value) {
                            $("#city").append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });


                    }
                });
            }else{
                $("#city").empty();
            }
        });
        });
    </script>
@endsection