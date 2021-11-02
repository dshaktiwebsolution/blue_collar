   // --------preloader--------------
$(window).on('load', function() {
    $('.preloader').fadeOut('slow');
    $('.cube-wrapper').fadeOut();

    /**** On Edit job Post form job time disabled input for close day ****/
    if(jQuery('table.job_time').length){
        jQuery('table.job_time .radio-box input[type="checkbox"]').each(function(){
            if(jQuery(this).prop('checked')){
                jQuery(this).closest('tr').find('input[type="text"]').attr("disabled", "disabled");
                jQuery(this).closest('tr').find('input[type="text"]').val('');
            }

        })

    } 
     /*** Job Time ***/
    setTimeout(function(){
jQuery("select[name='start_time']").select2("destroy").select2();
jQuery("select[name='end_time']").select2("destroy").select2();
    },2000);
   

});



// ------wow-animation
if ($('.wow').length) {
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true
    });
    wow.init();
}



// --------------add active class-on another-page move----------
jQuery(document).ready(function($){
    // Get current path and find target link
    var path = window.location.pathname.split("/").pop();

    // Account for home page with empty path
    if ( path == '' ) {
        path = 'index.html';
    }

    var target = $('.nav-bar ul li a[href="'+path+'"]');
    // Add active class to target link
    target.parent().addClass('active');
 

});



// -----menu-Toggler------
$('.toggle-btn').on('click', function(){
    $('.menu-part').slideToggle(300);
    // $(".header-wrapper").toggleClass("header-light");
});
if ($(window).width() < 992){
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll >= 15){
            $('.menu-part').slideUp(300);

        }else{
            $('.menu-part').slideUp(300);
            // $(".header-wrapper").removeClass("header-light");
        }
    });
}


// ---add-sticky-header-class on-scroll
$(window).scroll(function(){
    var headerHeight = $('.header-wrapper');
    var scroll = $(window).scrollTop();
    if (scroll >= 30){
        headerHeight.addClass('header-sticky');
    }else{
        headerHeight.removeClass('header-sticky');
    }
});



// -----------floatin-label-js-------
$('.floating-group').find('.floating-control').each(function (index, ele) {
    var $ele = $(ele);
    if($ele.val() != '' || $ele.is(':selected') === true){
        $ele.parents('.floating-group').addClass('focused');
    }
})

$('.form-fade-group').find('.fade-control').each(function (index, ele) {
    var $ele = $(ele);
    if($ele.val() != '' || $ele.is(':selected') === true){
        $ele.parents('.form-fade-group').addClass('focused');
    }
})


$('.floating-control').on('focus', function (e) {
    $(this).parents('.floating-group').addClass('focused');
}).on('blur', function(){
    if($(this).val().length > 0){
        $(this).parents('.floating-group').addClass('focused');
    }else{
        $(this).parents('.floating-group').removeClass('focused');
    }
});
$('.floating-control').on('change', function (e) {
    if($(this).is('select')){
        if($(this).val() === $("option:first", $(this)).val()) {
            $(this).parents('.floating-group').removeClass('focused');
        }
        else{
            $(this).parents('.floating-group').addClass('focused');
        }
    }
})


// --------select2-------
$(document).ready(function() {
    //---- select2 single----
    $('.customSelect').each(function() {
        var dropdownParents = $(this).parents('.select2Part')
        $(this).select2({
            dropdownParent: dropdownParents,
            minimumResultsForSearch: -1
        }).on("select2:open", function (e) {
            $(this).parents('.floating-group').addClass('focused');
        }).on("select2:close", function (e) {
            if($(this).find(':selected').val() === ''){
                $(this).parents('.floating-group').removeClass('focused');
            }
        });
    });

    //---- select2 multiple----
    $('.customSelectMultiple').each(function() {
        var dropdownParents = $(this).parents('.select2Part');
        // var placehldrget = $(this).attr("data-placeholder");
        $(this).select2({
            dropdownParent: dropdownParents,
            // placeholder: placehldrget,
            // tags: true,
            // closeOnSelect: false,
        }).on("select2:open", function (e) {
            $(this).parents('.floating-group').addClass('focused');
        }).on("select2:close", function (e) {
            if($(this).val() != ''){
                $(this).parents('.floating-group').addClass('focused');
            }else{
                $(this).parents('.floating-group').removeClass('focused');
            }
        }).on("select2:select", function (e) {
            $(this).parents('.floating-group').addClass('focused');
        }).on("select2:unselect", function (e) {
            $(this).parents('.floating-group').addClass('focused');
        })
    });

    //---- select2 multiple-with tags---
    $('.customSelectMultipleTags').each(function() {
        var dropdownParents = $(this).parents('.select2Part');
        // var placehldrgettags = $(this).attr("data-placeholder");
        $(this).select2({
            dropdownParent: dropdownParents,
            // placeholder: placehldrgettags,
            tags: true,
            // closeOnSelect: false,
        }).on("select2:open", function (e) {
            $(this).parents('.form-fade-group').addClass('focused');
        }).on("select2:close", function (e) {
            if($(this).val() != ''){
                $(this).parents('.form-fade-group').addClass('focused');
            }else{
                $(this).parents('.form-fade-group').removeClass('focused');
            }
        }).on("select2:select", function (e) {
            $(this).parents('.form-fade-group').addClass('focused');
        }).on("select2:unselect", function (e) {
            $(this).parents('.form-fade-group').addClass('focused');
        })
    });
});


// -hero-slider------
if ($('#main-hero-slider').length) {
    $('#main-hero-slider').owlCarousel({
        loop:true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        mouseDrag: false,
        touchDrag:false,
        dots: false,
        nav:true,
        navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        items: 1,
        margin:0,
        autoplay:true,
        autoplayTimeout:7000
    });
}



// --client-slider---------
if ($('#client-slider').length) {
    $('#client-slider').owlCarousel({
        loop:true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        dots: false,
        nav:false,
        navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        items: 5,
        margin:0,
        responsive:{
            0:{
                items:2
            },
            480:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            }
        }
    });
}



// -testimonial-slider------
if ($('#testimonial-slider').length) {
    $('#testimonial-slider').owlCarousel({
        loop:true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        mouseDrag: false,
        touchDrag:false,
        dots: true,
        nav:true,
        navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        items: 1,
        margin:0,
    });
}


// ------custom-scrollbar--------
if ($('.custom-scrollbar').length) {
    $('.custom-scrollbar').perfectScrollbar();
}




// ----otp-auto-focus-------
$(".otp-inputbar").on("keyup keydown keypress", function (e) {
    if ($(this).val()) {
        $(this).next().focus();
    }
    var KeyID = e.keyCode;
    switch (KeyID) {
        case 8:
            $(this).val("");
            $(this).prev().focus();
            break;
        case 46:
            $(this).val("");
            $(this).prev().focus();
            break;
        default:
            break;
    }
});




// -------file-upload----------
$(document).ready(function() {
    $(document).on('change', '.file-upload input[type="file"]', function() {
        var filename = $(this).val();
        if (/^\s*$/.test(filename)) {
            setTimeout(function(){
                $(this).parents(".file-upload").find(".file-select-name").text("No file Chosen");
            },240)
            $(this).parents(".file-upload").removeClass("selected");
        } else {
            $(this).parents(".file-upload").addClass("selected");
            $(this).parents(".file-upload").find(".file-select-name").text(filename.substring(filename.lastIndexOf("\\") + 1, filename.length));
        }
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
                // alert(uploadFile.closest(".file-upload").find('.imagePreview').length);
                uploadFile.closest(".file-upload").find('.imagePreview').css("background-image", "url(" + this.result + ")");
            }
        }
    });

});





// -------contact-map--------
var marker;
function createMap(){
    var opts = {
        center: {
            lat: -33.865143,
            lng: 151.209900,
        },
        zoom: 13,
        styles: [

        ],
        maxZoom: 20,
        minZoom: 0,
        mapTypeId: 'roadmap',
    };

    opts.clickableIcons = true;
    opts.disableDoubleClickZoom = false;
    opts.draggable = true;
    opts.keyboardShortcuts = true;
    opts.scrollwheel = true;

    var map = new google.maps.Map(document.getElementById('mappart'), opts);
    var image = 'assets/images/map-pin.svg';
    marker = new google.maps.Marker({
        map:map,
        draggable:false,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(-33.865143, 151.209900),
        // icon: image
    });
}





// --------selectcustom--------
if ($('.selectcustom').length) {
    $('.selectcustom').each(function() {
        var dropdownParents = $(this).parents('.select2Part')
        $(this).select2({
            dropdownParent: dropdownParents,
            minimumResultsForSearch: -1
        });
    });
}





// -----thankyou-alert----
if ($('.thankalert').length) {
    $(".thankalert").click(function(){
        Swal.fire({
            customClass: {
                container: "custom-sweetalert",
                // image: "success-img",
            },
            // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
            // text: 'Modal with a custom image.',
            html:
            '<div class="customalert-box thankyou-alert">'+
            '<div class="alert-image">' +
            '<img src="/public/assets/images/dashboard/thankyou-img.png" alt="">' +
            '</div>' +
            '<h6>Thank You</h6>' +
            '<p>Your job is posted successfully</p>' +
            '</div>',
            // imageUrl: "/public/assets/images/dashboard/success.png",
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            imageAlt: "Custom image",
        });
    });
}




// ----delete-alert----------
if ($('.deletalert').length) {

    $(document).on("click",".deletalert", function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var call_small_btn = 0;
        if(jQuery(this).hasClass("delete-act")){
                call_small_btn = 1;
        }
        var cur_id = $(this).attr('data-id');
        Swal.fire({
            customClass: {
                container: "custom-sweetalert",
                // image: "success-img",
                confirmButton: 'alert-btn delete-btn' ,
                cancelButton: 'alert-btn cancel-btn',
            },
            // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
            // text: 'Modal with a custom image.',
            html:
            '<div class="customalert-box delete-alert">'+
            '<div class="alert-image">' +
            '<img src="/public/assets/images/dashboard/delete-img.png" alt="">' +
            '</div>' +
            '<h6>Are You Sure ?</h6>' +
            '<p>You want to delete this job</p>' +
            '</div>',
            // imageUrl: "public/assets/images/dashboard/success.png",
            showCloseButton: true,
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
            closeOnConfirm: false,
            imageAlt: "Custom image",
        })
            .then((result) => {
            if (result.isConfirmed) {
            var data = {
                "_token": $('input[name="csrf-token"]').val(),
                "id": cur_id,
            }
            $.ajax({
                url: "/employer-delete-post/"+cur_id,
                data:data,
                success: function (responce){
                    
                    Swal.fire({
                        customClass: {
                            container: "custom-sweetalert",

                            // image: "success-img",
                        },
                        // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
                        // text: 'Modal with a custom image.',
                        html:
                        '<div class="customalert-box thankyou-alert">'+
                        '<div class="alert-image">' +
                        '<img src="/public/assets/images/dashboard/thankyou-img.png" alt="">' +
                        '</div>' +
                        '<h6>Deleted!!</h6>' +
                        '<p>Your job is successfully deleted.</p>' +
                        '</div>',
                        // imageUrl: "public/assets/images/dashboard/success.png",
                        showCloseButton: true,
                        showCancelButton: false,
                        showConfirmButton: false,
                        imageAlt: "Custom image",
                    }).then((result) => {
                        
                        if(call_small_btn == 0){
                            window.location.href = '/employer-dashboard';
                        } else {
                            location.reload();
                        }
                    
                })

                }
            })

        }
    })
        $('.alert-btn.delete-btn').attr('data-id',cur_id );
    });
}


// -----apply-job-success-alert----
if ($('.applyalert').length) {
    /*$(".applyalert").click(function(){
        Swal.fire({
            customClass: {
                container: "custom-sweetalert",
                // image: "success-img",
            },
            // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
            // text: 'Modal with a custom image.',
            html:
                '<div class="customalert-box apply-alert">'+
                    '<div class="alert-image">' +
                        '<img src="/public/assets/images/dashboard/success-check.png" alt="">' +
                    '</div>' +
                    '<h6>Success!!!</h6>' +
                    '<p>You have applied successfully</p>' +
                '</div>',
            // imageUrl: "/public/assets/images/dashboard/success.png",
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            imageAlt: "Custom image",
        });
    })*/
}


// -----repost-job-success-alert----
if ($('.successalert').length) {
    $(document).on("click", ".successalert", function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var cur_id = $(this).attr('data-id');
        var data = {
            "_token": $('input[name="csrf-token"]').val(),
            "id": cur_id,
        }
        $.ajax({
            url: "/employer-repost-job/"+cur_id,
            data:data,
            success: function (responce){
                Swal.fire({
                    customClass: {
                        container: "custom-sweetalert",
                        // image: "success-img",
                    },
                    // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
                    // text: 'Modal with a custom image.',
                    html:
                    '<div class="customalert-box success-alert">'+
                    '<div class="alert-image">' +
                    '<img src="/public/assets/images/dashboard/success-check.png" alt="">' +
                    '</div>' +
                    '<h6>Success!!!</h6>' +
                    '<p>Your job is re-posted successfully</p>' +
                    '</div>',
                    // imageUrl: "public/assets/images/dashboard/success.png",
                    showCloseButton: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    imageAlt: "Custom image",
                })
                    .then(function () {
                        location.reload();
                    });
            }
        })
        $('.reshape-act.successalert').attr('data-id',cur_id );
    });
}



// -------fileupload-with-preview-----
// if ($('#profileinput').length) {
//     profileinput.onchange = evt => {
//       const [profilefile] = profileinput.files
//       if (profilefile) {
//         profileimg.src = URL.createObjectURL(profilefile)
//       }
//     }
// }



// -----proof-image
if ($('#proofinput').length) {
    proofinput.onchange = evt => {
        const [prooffile] = proofinput.files
        if (prooffile) {
            proofimg.src = URL.createObjectURL(prooffile)
        }
    }
}





// --------job-post-quill-editor-js
if ($(".compose-post-box").length) {
    var icons = Quill.import("ui/icons");
    icons["bold"] = '<i class="fa fa-bold" aria-hidden="true"></i>';
    icons["italic"] = '<i class="fa fa-italic" aria-hidden="true"></i>';
    icons["underline"] = '<i class="fa fa-underline" aria-hidden="true"></i>';
    icons["image"] = '<i class="fa fa-picture-o" aria-hidden="true"></i>';
    icons["code"] = '<i class="fa fa-code" aria-hidden="true"></i>';
    icons["blockquote"] = '<i class="fa fa-quote-left"></i>'

    var quill = new Quill(".compose-post-box", {
        modules: {
            toolbar: '.post-compose-buttons'
        },
        placeholder: "Compose an epic...",
        theme: "snow",
    })
}



// ---------croppie-file-upload-------
if ($('.profileinput').length) {
    var $uploadCrop,
        tempFilename,
        rawImg,
        imageId;
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $('#cropImagePop').modal('show');
                rawImg = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
        else {
            console.log("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 160,
            height: 160,
            type: 'circle'
        },
        enforceBoundary: false,
        enableExif: true
    });
    $('#cropImagePop').on('shown.bs.modal', function(){
        $('.cr-slider-wrap').prepend('<p>Image Zoom</p>');
        $uploadCrop.croppie('bind', {
            url: rawImg
        }).then(function(){
            console.log('jQuery bind complete');
        });
    });

    $('#cropImagePop').on('hidden.bs.modal', function(){
        $('.profileinput').val('');
        $('.cr-slider-wrap p').remove();
    });

    $('.profileinput').on('change', function () {
        readFile(this);
    });

    $('.replacePhoto').on('click', function(){
        $('#cropImagePop').modal('hide');
        $('.profileinput').trigger('click');
    })

    $('#cropImageBtn').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'base64',
            // format: 'jpeg',
            backgroundColor : "#ffffff",
            format: 'png',
            size: {
                width: 160,
                height: 160
            }
        }).then(function (resp) {
            $('#profileimg').attr('src', resp);
            $('#cropImagePop').modal('hide');
            $('.profileinput').val('');
        });
    });
}

// ---------Pagination-------
jQuery(document).on("click", "a.page-link", function() {

    if (!jQuery(this).closest("li").hasClass('page-prvnxt-btn')) {

        jQuery(".page-item").removeClass("active");
        jQuery(this).closest(".page-item").addClass("active");
        var pid = jQuery(this).attr("data-id");
        var plink = jQuery(this).attr("data-href");
    } else {

        if (jQuery(this).find(".fa-chevron-left").length) {
            var pid = jQuery("li.page-item.active a").attr("data-id");
            if (pid != 1) {
                pid = parseInt(pid) - 1;
                var plink = jQuery("li.page-item a[data-id='" + pid + "']").attr("data-href");
            }


        } else {
            var pid = jQuery("li.page-item.active a").attr("data-id");
            pid = parseInt(pid) + 1;

            if (jQuery("li.page-item a[data-id='" + pid + "']").length) {
                var plink = jQuery("li.page-item a[data-id='" + pid + "']").attr("data-href");
            } else {  var plink = '';   }
        }
    }

    if (plink != '') {

        jQuery.ajax({
            type: "get",
            url: plink,
            data: {},
            success: function (res) {
                jQuery(".col-lg-8.mb-box .dash-data-card.h-100.mb-0").html(jQuery(res).find(".col-lg-8.mb-box .dash-data-card.h-100.mb-0").html());
                jQuery(".col-lg-12.mb-box .dash-data-card.h-100.mb-0").html(jQuery(res).find(".col-lg-12.mb-box .dash-data-card.h-100.mb-0").html());
                jQuery(".col-lg-8.mb-box .active-job-list-box").html(jQuery(res).find(".col-lg-8.mb-box .active-job-list-box").html());
                jQuery("ul.pagination").html(jQuery(res).find("ul.pagination").html());
                //console.log(res);

            }
        })
    }
});
jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

//--------Save Job--------//
jQuery(document).on("click", ".job-like-input", function(){
    if(jQuery(this).prop("checked")){
        var is_save_job = 1;
    } else {
        var is_save_job = 0;
    }
    var job_id = jQuery(this).attr("data-id");
    var user_id = jQuery(this).attr("data-userid");

    if(user_id != '') {

        jQuery.ajax({
            type: "post",
            url: "/jobs",
            data: {action: "saved_user_job", is_save_job: is_save_job, job_id: job_id},
            success: function (res) {
                if (is_save_job == 1) {
                    Swal.fire({
                        customClass: {
                            container: "custom-sweetalert",
                            // image: "success-img",
                        },
                        // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
                        // text: 'Modal with a custom image.',
                        html: '<div class="customalert-box apply-alert">' +
                        '<div class="alert-image">' +
                        '<img src="/public/assets/images/dashboard/success.png" alt="">' +
                        '</div>' +
                        '<h6>Success!!!</h6>' +
                        '<p>Job Saved successfully</p>' +
                        '</div>',
                        // imageUrl: "public/assets/images/dashboard/success.png",
                        showCloseButton: true,
                        showCancelButton: false,
                        showConfirmButton: false,
                        imageAlt: "Custom image",
                    }) .then(function () {
                        //$("showCloseButton").click(function(){
                        location.reload(true);
                        // location.reload();
                    });
                } else {
                    Swal.fire({
                        customClass: {
                            container: "custom-sweetalert",
                            // image: "success-img",
                        },
                        // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
                        // text: 'Modal with a custom image.',
                        html: '<div class="customalert-box apply-alert">' +
                        '<div class="alert-image">' +
                        '<img src="/public/assets/images/dashboard/success.png" alt="">' +
                        '</div>' +
                        '<h6>Success!!!</h6>' +
                        '<p>Job Remove from saved jobs.</p>' +
                        '</div>',
                        // imageUrl: "public/assets/images/dashboard/success.png",
                        showCloseButton: true,
                        showCancelButton: false,
                        showConfirmButton: false,
                        imageAlt: "Custom image",
                    }) .then(function () {
                        location.reload();
                    });
                }

            }
        });

    } else {
        jQuery(this).prop("checked", false);
        Swal.fire({
            customClass: {
                container: "custom-sweetalert",
                // image: "success-img",
            },
            // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
            // text: 'Modal with a custom image.',
            html: '<div class="customalert-box apply-alert red-alert">' +
            '<div class="alert-image">' +
            '<img src="/public/assets/images/dashboard/delete-img.png" alt="">' +
            '</div>' +
            '<h6>Unable to save job</h6>' +
            '<p>You must be login to save this job. Please <a href="/login"> login here.</a></p>' +
            '</div>',
            // imageUrl: "public/assets/images/dashboard/success.png",
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            imageAlt: "Custom image",
        });
    }
});

//----------Apply job-----------//
jQuery(document).on("click", ".default-btn.applyalert", function(){

    var job_id = jQuery(this).attr("data-id");
    var user_id = jQuery(this).attr("data-userid");
    if(user_id != '') {
        jQuery.ajax({
            type: "post",
            url: "/jobs",
            data: {action: "applied_user_job", job_id: job_id},
            success: function (res) {
                Swal.fire({
                    customClass: {
                        container: "custom-sweetalert",
                        // image: "success-img",
                    },
                    // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
                    // text: 'Modal with a custom image.',
                    html: '<div class="customalert-box apply-alert">' +
                    '<div class="alert-image">' +
                    '<img src="/public/assets/images/dashboard/success.png" alt="">' +
                    '</div>' +
                    '<h6>Success!!!</h6>' +
                    '<p>You have applied successfully</p>' +
                    '</div>',
                    // imageUrl: "public/assets/images/dashboard/success.png",
                    showCloseButton: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    imageAlt: "Custom image",
                });
                jQuery(".default-btn.applyalert").attr("disabled", "disabled");
                jQuery(".default-btn.applyalert").css("background-color", "gray");
                jQuery(".default-btn.applyalert").text("Already Applied");
                jQuery(".default-btn.applyalert").removeClass("applyalert");
            }
        });
    } else {
        Swal.fire({
            customClass: {
                container: "custom-sweetalert",
                // image: "success-img",
            },
            // title: '<div class="alert-pop-success"><h6>Success!!!</h6><p>You have applied successfully</p></div>',
            // text: 'Modal with a custom image.',
            html: '<div class="customalert-box apply-alert red-alert">' +
            '<div class="alert-image">' +
            '<img src="/public/assets/images/dashboard/delete-img.png" alt="">' +
            '</div>' +
            '<h6>Unable to Apply</h6>' +
            '<p>You must be login to Apply on this job. Please <a href="/login"> login here.</a></p>' +
            '</div>',
            // imageUrl: "public/assets/images/dashboard/success.png",
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            imageAlt: "Custom image",
        });
    }
});

jQuery(document).on("change", ".custom-control-input,select[name='job_location']", function(){
    var pass_filter = {};
    jQuery(".custom-control-input:checked").each(function(){
        if(pass_filter[jQuery(this).attr('name')] == undefined){
            pass_filter[jQuery(this).attr('name')] = [];
        }
        pass_filter[jQuery(this).attr('name')].push(jQuery(this).val());
    });
    if(jQuery('select[name="job_location"]').val() != ''){
        if(pass_filter['job_location'] == undefined){
            pass_filter['job_location'] = [];
        }
        pass_filter['job_location'].push(jQuery('select[name="job_location"]').val());
    }

    setTimeout(function(){
        jQuery.ajax({
            type:"get",
            url:"",
            data:{action:"filter_jobs",pass_filter:jQuery.param(pass_filter)},
            success:function(res){
                //console.log(jQuery(res).find(".col-lg-8.mb-box .dash-data-card.h-100.mb-0").html());
                jQuery(".col-lg-8.mb-box .dash-data-card.h-100.mb-0").html(jQuery(res).find(".col-lg-8.mb-box .dash-data-card.h-100.mb-0").html());
                jQuery(".dash-pagination.pagination-center").html(jQuery(res).find(".dash-pagination.pagination-center").html());
                if(jQuery(".dash-pagination.pagination-right").length){
                    jQuery(".dash-pagination.pagination-right").html(jQuery(res).find(".dash-pagination.pagination-right").html());
                }
                /*jQuery(".filter-sidebar").html(jQuery(res).find(".filter-sidebar").html());
                setTimeout(function(){
                         $('.selectcustom').each(function() {
                            var dropdownParents = $(this).parents('.select2Part')
                            $(this).select2({
                                dropdownParent: dropdownParents,
                                minimumResultsForSearch: -1
                            });
                        });
                },100);*/
               

            }
        })
    },200);

});

 /*** for Disabled time when click on close checkbox ***/
jQuery(document).on("click", ".radio-box input[type='checkbox']", function(){
    if(jQuery(this).prop("checked")){
        jQuery(this).closest('tr').find('select').attr("disabled", "disabled");
        jQuery(this).closest('tr').find('select').val('');
        jQuery(this).closest('tr').find('.select2').removeClass('select2-container--focus');
    } else {
        jQuery(this).closest('tr').find('select').removeAttr("disabled");
    }
});
jQuery(document).on('change','.value-time-job input',function(){
    var time = jQuery(this).val();
    jQuery('.job-duration .input-group span').text(time);
});

jQuery(document).ready(function(){
    var time_load = jQuery('.value-time-job input:checked').val();
    jQuery('.job-duration .input-group span').text(time_load);
    if(jQuery("input[name='jtno']:checked").length){
        if(jQuery("input[name='jtno']:checked").val() == 'Permanent'){
            jQuery("input[name='jtno'][value='Permanent']").click();
            jQuery("input[name='jtno'][value='Permanent']").trigger('click');
        }
    }
    if(jQuery('select[name="state"]').length){
        if(jQuery('select[name="state"]').attr('value') != ''){
            setTimeout(function(){
                var sel_state = jQuery('select[name="state"]').attr('value');
                jQuery('select[name="state"]').val(sel_state);
                jQuery('select[name="state"]').change();
            },500);
        }
         if(jQuery('select[name="city"]').attr('value') != ''){
            setTimeout(function(){
                var sel_city = jQuery('select[name="city"]').attr('value');
                jQuery('select[name="city"] option[value="'+sel_city+'"]').prop("selected",true);
                jQuery('select[name="city"]').change();
            },700);
        }
    }

    var company_load = jQuery('.business-value input:checked').val();
    jQuery('.business-value-selector label').text(company_load+' Name');
    jQuery('.business-value-selector input').attr('placeholder','Enter Your '+company_load+' Name');

});

 /*** for Disabled Permanent Click Event***/
 jQuery(document).on('click','.input_val .custom-control-input',function(){
        var inputval = jQuery(this).val();
        if(inputval == "Permanent"){
        jQuery('.value-time-job,.job-duration').hide();
        }else{
        jQuery('.value-time-job,.job-duration').show();
        }
})

jQuery(document).on('click','.top-experience input',function(){
    var inputval = jQuery(this).val();
    if(inputval == "fresher"){
    jQuery('.under-experience').hide();
    }else{
    jQuery('.under-experience').show();
    }
});

jQuery(document).on('click','.top-experience input',function(){
    var inputval = jQuery(this).val();
    if(inputval == "fresher"){
    jQuery('.under-experience').hide();
    }else{
    jQuery('.under-experience').show();
    }
});
jQuery(document).on('click','.business-value input',function(){
var company_load = jQuery('.business-value input:checked').val();
    jQuery('.business-value-selector label').text(company_load+' Name');
    jQuery('.business-value-selector input').attr('placeholder','Enter Your'+company_load+' Name');
});


 jQuery(document).on('click','.job-category-filter .see-all-job',function(){
    jQuery(this).closest('.job-category-filter').addClass('full-show-height');
 })

if(jQuery('.job-category-filter .custom-control').length <= 3){
jQuery('.see-all-job').hide();
jQuery('.job-category-filter').addClass('full-show-height');
}else{
    jQuery('.see-all-job').show();
    jQuery('.job-category-filter').removeClass('full-show-height');

}

jQuery('#fresher').change(function(){
    jQuery('.under-experience select').val();
})

