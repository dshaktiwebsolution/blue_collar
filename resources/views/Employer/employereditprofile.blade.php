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
                                    <a href="{{url('/employerviewprofile')}}">
                                        <i class="feather icon-arrow-left"></i>
                                        <span>Back</span>
                                    </a>
                                </div>
                                <h5>Edit Profile</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form id="individual_reg_form" action="{{ url('/employerupdateprofile') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                        <div class="col-lg-4 mb-box">
                            <div class="dash-data-card h-100 mb-0 min-height">
                                <div class="profile-area border-0 employer-profile">
                                    <div class="profile-image">

                                        @if (!empty(auth()->user()->uimage))
                                            <img src="public/assets/photo/pic/{{ auth()->user()->uimage->image }}" class="profile-main-image"  id="profileimg">
                                        @else
                                            <img src="public/assets/images/default-user.png" class="profile-main-image"  id="profileimg">
                                        @endif

                                        <div class="profile-change-btn">
                                            <input accept="image/*" name="image" type="file" class="profileinput" />
                                            <img src="public/assets/images/dashboard/profile/edit-icon.png" alt="" />
                                        </div>
                                    </div>
                                    <h5>{{ auth()->user()->name }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mb-box">
                            <div class="dash-data-card h-100 mb-0">
                                <div class="profile-box">
                                    <h5 class="profile-head">Basic details</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">Enter name</label>
                                                    <input type="text" name="name" class="form-control floating-control" value="{{ auth()->user()->name }}" required />
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/user.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">Mobile number</label>
                                                    <input type="text" name="mobile_number" id="mobile_number" class="form-control floating-control" value="{{ auth()->user()->mobile_number }}" required />
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/mobile.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">Email ID</label>
                                                    <input type="text" name="email" id="email" class="form-control floating-control" value="{{ auth()->user()->email }}" required />
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/email.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if (auth()->user()->user_type == 0)
                                            
                                        <div class="col-md-6">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">Company name</label>
                                                    <input type="text" name="company_name" class="form-control floating-control" value="{{ auth()->user()->company_name }}" />
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/users.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">About Company</label>
                                                    <textarea name="about_company" class="form-control floating-control">{{ auth()->user()->about_company }}</textarea>
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/users.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        @endif
                                        <div class="col-md-6">
                                            <div class="form-group select2Part floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">State</label>
                                                    <select name="state_id" id="state" class="form-control customSelect floating-control" required>
                                                        @foreach ($states as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == auth()->user()->state ? "selected" : "" }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/select.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group select2Part floating-group">
                                                <div class="input-icon-right">
                                                    <label class="floating-label">City</label>
                                                    <select name="city_id" id="city" class="form-control customSelect floating-control" autocomplete="off" required>
                                                        <option value="">City</option>
                                                        @foreach ($cities as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == auth()->user()->city ? "selected" : "" }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="right-icon">
                                                        <img src="public/assets/images/auth-icon/select.png" class="input-img" alt="" />
                                                    </div>
                                                </div>
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-8">
                            <div class="buttons-group text-center">
                                <button type="submit" class="default-btn">Save</button>
                                <a href="{{url('/employerviewprofile')}}" class="default-btn btn-red">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection


@section('script')
   <script>
        $(document).ready(function () {

            EMAIL = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/;
            NUMBER = /^[0-9 ]*$/;

            $('#individual_reg_form').validate({
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