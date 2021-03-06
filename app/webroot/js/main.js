/* global webURL */
$(document).on('click', '.next a', function (e) {
    $.ajax({
        type: "POST",
        url: $(this).attr('href'),
        dataType: 'json',
        success: function (data) {

            //$('#pagi').remove();
            $('.more-items').append(data.data);
            $('#pagination').html(data.pagination);
            //$('#sorting-table').html(data.sort_p);
        }
    });
    var pageurl = $(this).attr('href');
    if (pageurl != window.location) {
        // window.history.pushState({path: pageurl}, '', pageurl);
    }
    e.preventDefault();
    return false;
});



$(document).on('click', '.forget-modal', function (e) {
    $('#LoginPopup').modal('hide');
    setTimeout(function () {
        $('#forgot-password').modal('show');
    }, 350)
});
$(document).ready(function () {
    setTimeout(function () {
        $('#reset-password').modal('show');
    }, 200);
});
///////////////////////////////////////////////////////////
jQuery(document).ready(function ($) {
    //////////////////////
    $('#timepicker1').timepicker();
    ///////////////////////
    $('.hide-login').on('click', function () {
        $('#LoginPopup').modal('hide');
    });
    $('.hide-signup').on('click', function () {
        $('#SignupPopup').modal('hide');
    });


    $('#checkLogin').on('click', function () {
        // var obj=$(this).attr('rel');
        var obj2 = $(this).attr('data-id');
        var comment_box = $('#Comment_obj').val();
        var url = webURL + "users/checkLogin";
        $.ajax({
            type: "POST",
            url: url,
            data: {}, // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                   
                    if (comment_box.length === 0) {
                        alert('please enter something first');
                        return false;
                    } else {
                         var url = webURL + "users/story_comment/" + obj2;
                    }
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {commentstory: $('#Comment_obj').val()}, // serializes the form's elements.
                        dataType: 'json',
                        context: this,
                        success: function (data)
                        {
                            console.info(data); // show response from the php script.
                            if (data.status == 'success') {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        }
                    });

                } else {
                    $('.show-alert').show();
                    // $('#LoginPopup').modal('show');
                }
            }
        });
    });

///////////////////////////////////////////////////////////////go live page check
    $('.go-live-text').on('click', function () {
        var url = webURL + "users/checkLiveLogin";
        $.ajax({
            type: "POST",
            url: url,
            data: {}, // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                    window.location.href = webURL + "users/add_live_stream";
                } else {
                    $('#LoginPopup').modal('show');

                }
            }
        });
    });

///////////////////////////////////////////////////////////////add trending viddeo
    $('.go-trending-text').on('click', function () {
        var url = webURL + "users/checkLiveLogin";
        $.ajax({
            type: "POST",
            url: url,
            data: {}, // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                    window.location.href = webURL + "users/add_video";
                } else {
                    $('#LoginPopup').modal('show');

                }
            }
        });
    });



///////////////////////////////////////////////////////////////
    $("#frmLogin").submit(function (e) {
        var url = webURL + "users/ajax_login"; // the script where you handle the form input.
        // alert(url); return false;
        $.ajax({
            type: "POST",
            url: url,
            data: $("#frmLogin").serialize(), // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {

                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                    window.location.href = "";
//                    window.location.href = webURL + "users/home";

                } else {

                    bootbox.alert({
                        title: "<img src='http://35.166.163.212/img/images/icon.png' style='width:25px;    float: left;'> <h4 style='    float: left;    margin-top: 4px;'> Message</h4>",
                        message: "Invalid Login Credentials",
                        callback: function () {
                            console.log('Invalid Login Credentials');
                        }
                    })
                    //$('#LoginPopup').modal('hide');
                }
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });





    $('#commentLogin').on('click', function () {
        // var obj=$(this).attr('rel');
        var obj = $(this).attr('rel');

        var url = webURL + "users/checkLogin";
        $.ajax({
            type: "POST",
            url: url,
            data: {}, // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                    var url = webURL + "users/question_comment/" + obj;
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {commentsolution: $('#Comment_sol').val()}, // serializes the form's elements.
                        dataType: 'json',
                        context: this,
                        success: function (data)
                        {
                            console.info(data); // show response from the php script.
                            if (data.status == 'success') {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        }
                    });

                } else {
                    $('.show-alert').show();
                    // $('#LoginPopup').modal('show');
                }
            }
        });
    });

    ///////////////////////////forget password
    $("#frmForgot").submit(function (e) {
        var url = webURL + "users/user_forgot";
        // alert(url); return false;
        $.ajax({
            type: "POST",
            url: url,
            data: $("#frmForgot").serialize(), // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.forgot-set-html
                if (data.status == 'success') {
                    $('#frmForgot').hide();
                    $('.forgot-set-html').html(data.message);
                } else {
                    $('.forgot-set-html').html(data.message);
                }
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
//////////////////////////////////////reset pssword
    $("#user_resets").submit(function (e) {
        var url = webURL + "users/password_reset"; // the script where you handle the form input.
        // alert(url); return false;
        $.ajax({
            type: "POST",
            url: url,
            data: $("#user_resets").serialize(), // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                    $('.hide-reset-form').hide();
                    $('.rest-success-data').html(data.message);
                } else {
                    $('.error-data').html(data.message);

                    // alert(data.message);
                }
            }

        });
        e.preventDefault(); // avoid to execute the actual submit of the form.        
    });
    //////////////////////////////////////////////////////////////////////////////////////
       $('#gamingcomment').on('click', function () {
        // var obj=$(this).attr('rel');
        var obj = $(this).attr('data-id');
         var comment_text = $('#Comment_story').val();
      //  alert(obj);return false;
        var url = webURL + "users/checkLogin";
        $.ajax({
            type: "POST",
            url: url,
            data: {}, // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                    if (comment_text.length === 0) {
                        alert('please enter something first');
                        return false;
                    } else {
                         var url2 = webURL + "users/gaming_comment/" + obj;
                    }
                   
                   // alert(url2);return false;
                    $.ajax({
                        type: "POST",
                        url: url2,
                        data: {commentsolution: $('#Comment_story').val()}, // serializes the form's elements.
                        dataType: 'json',
                        context: this,
                        success: function (data)
                        {
                            console.info(data); // show response from the php script.
                            if (data.status == 'success') {
                                location.reload();
                            } else {
                               location.reload();
                            }
                        }
                    });

                } else {
                    $('.show-alert').show();
                    // $('#LoginPopup').modal('show');
                }
            }
        });
    });


});



///////////////////////////////////////////////////////////////////
$uploadCrr = $('#upload-cpnyimg').croppie({
    enableExif: true,
    viewport: {
        width: 250,
        height: 250,
        type: 'circle'
    },
    boundary: {
        width: 260,
        height: 260
    },
    showZoomer: false
});

$('#my_cimg').on('change', function () {
    $('#cttt').show();
    $('#select-cmpnyimg').hide();
    $('.logo-upload').css({width: '100%', float: 'none'});
    $('.logo-upload1').css({width: '100%', margin: '0'});
    $('.logo-main').hide();
    //$('#hide-remove-button1').hide();
    var reader = new FileReader();
    reader.onload = function (e) {
        $uploadCrr.croppie('bind', {
            url: e.target.result
        }).then(function () {
            console.log('jQuery bind complete');
        });

    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-cimg').on('click', function (ev) {
    $uploadCrr.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        $('#select-cmpnyimg').attr('src', resp);
        $('#hiddenfield_cimg').val(resp);
        $('#select-cmpnyimg').show();
        $("#cttt").hide();
        $('.logo-upload').css({width: '50%', float: 'left'});
        $('.logo-upload1').css({width: '50%', margin: '0 auto'});
        $('.logo-main').show();

    });
});

$(document).ready(function () {
    $("#select-cmpnyimg").click(function () {
        $("input[id='my_cimg']").click();
    });
});
///////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////
$uploadCrrimg = $('#upload-cpnyimg1').croppie({
    enableExif: true,
    viewport: {
        width: 600,
        height: 350,
        type: 'square'
    },
    boundary: {
        width: 650,
        height: 400
    },
    showZoomer: false
});

$('#my_cimg1').on('change', function () {
    $('#cttt1').show();
    $('#select-cmpnyimg1').hide();
    $('.logo-main').css({width: '100%', float: 'none'});
    $('.logo-main1').css({width: '100%', margin: '0'});
    $('.logo-upload').hide();
    //$('#hide-remove-button1').hide();
    var reader = new FileReader();
    reader.onload = function (e) {
        $uploadCrrimg.croppie('bind', {
            url: e.target.result
        }).then(function () {
            console.log('jQuery bind complete');
        });

    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-cimg1').on('click', function (ev) {
    $uploadCrrimg.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        $('#select-cmpnyimg1').attr('src', resp);
        $('#hiddenfield_cimg1').val(resp);
        $('#select-cmpnyimg1').show();
        $("#cttt1").hide();
        $('.logo-main').css({width: '50%', float: 'left'});
        $('.logo-main1').css({width: '50%', margin: '0 auto'});
        $('.logo-upload').show();

    });
});

$(document).ready(function () {
    $("#select-cmpnyimg1").click(function () {
        $("input[id='my_cimg1']").click();
    });
});
///////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////
$uploadC = $('#upload-uimg').croppie({
    enableExif: true,
    viewport: {
        width: 150,
        height: 150,
        type: 'circle'
    },
    boundary: {
        width: 160,
        height: 160
    },
    showZoomer: false
});

$('#my_uimg').on('change', function () {
    $('#1cttt').show();
    $('#select-uimg').hide();
    $("#my_uimg").hide();
    //$('#hide-remove-button1').hide();
    var reader = new FileReader();
    reader.onload = function (e) {
        $uploadC.croppie('bind', {
            url: e.target.result
        }).then(function () {
            console.log('jQuery bind complete');
        });

    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload').on('click', function (ev) {
    $uploadC.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {

        $('#select-uimg').attr('src', resp);
        $('#hiddenfield_uimg').val(resp);
        $('#select-uimg').show();
        $("#1cttt").hide();
        $("#my_uimg").hide();

    });
});

$(document).ready(function () {
    $("#select-uimg").click(function () {
        $("input[id='my_uimg']").click();
    });
});
///////////////////////////////////////////////////////////


$("#createuser").submit(function (e) {
    var url = webURL + "users/registerCompany"; // the script where you handle the form input.
    $.ajax({
        type: "POST",
        url: url,
        data: $("#createuser").serialize(), // serializes the form's elements.
        dataType: 'json',
        context: this,
        success: function (data)
        {
            console.info(data); // show response from the php script.
            if (data.status == 'success') {
                window.location.href = "";
            } else {
                swal("", "That email address already in GameingHub.", "error");
                //$('#SignupPopup').modal('hide');

            }
        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});

$(document).ready(function () {
    $('.diable-btn').attr('disabled', true);
    $('#Comment_sol').keyup(function () {
        if ($(this).val().length != 0)
            $('.diable-btn').attr('disabled', false);
        else
            $('.diable-btn').attr('disabled', true);
    });

    //////////////////////////////////////////////////////
    $(".watermark-btn").click(function (e) {
        var url = webURL + "users/addwatermark";

        $.ajax({
            type: "POST",
            url: url,
            data: {name: $('.watermark-text').val()}, // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                    location.reload();
                } else {
                    location.reload();
                }
            }
        });
    });


    //////////////////////////////////////////////////////
    $(".watermark-btn").click(function (e) {
        var url = webURL + "users/addwatermark";

        $.ajax({
            type: "POST",
            url: url,
            data: {name: $('.watermark-text').val()}, // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                    location.reload();
                } else {
                    location.reload();
                }
            }
        });
    });

    //////////////////////////////////////////////////////
    $(".edit-watermark-btn").click(function (e) {
        var url = webURL + "users/addwatermark";

        $.ajax({
            type: "POST",
            url: url,
            data: {name: $('.edit-watermark-text').val()}, // serializes the form's elements.
            dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (data.status == 'success') {
                    location.reload();
                } else {
                    location.reload();
                }
            }
        });
    });

    $(".tab-data").on('click', function () {

        var obj = $(this).attr('rel');
        // alert(obj);return false;
        var url = webURL + "users/getdatabycategory";

        $.ajax({
            type: "POST",
            url: url,
            data: {obj_name: obj}, // serializes the form's elements.
            // dataType: 'json',
            context: this,
            success: function (data)
            {
                console.info(data); // show response from the php script.
                if (!$.trim(data)) {
                    swal("", "no result found !", "warning");
                } else {
                    $('.tab-data-container').html(data);
                }

            }
        });
    });

});


$("#open-menu").click(function () {
    $(".fade-bg").fadeToggle();
    $("ul.fab-menu-inner").toggleClass("popin popout");
    $("#open-menu > i").toggleClass("fa-bars fa-times", "slow");
});





// /////////////////////////////////////////////////////////////////// this is for home header images
//$uploadC = $('#upload-uimg').croppie({
//    enableExif: true,
//     viewport: {
//        width: 150,
//        height: 150,
//        type: 'circle'
//    },
//    boundary: {
//        width: 160,
//        height: 160
//    },
//    showZoomer: false
//});
//
//$('#my_uimg').on('change', function () {
//    $('#1cttt').show();
//    $('#select-uimg').hide();
//     $("#my_uimg").hide();
//    //$('#hide-remove-button1').hide();
//    var reader = new FileReader();
//    reader.onload = function (e) {
//        $uploadC.croppie('bind', {
//            url: e.target.result
//        }).then(function () {
//            console.log('jQuery bind complete');
//        });
//
//    }
//    reader.readAsDataURL(this.files[0]);
//});
//
//$('.upload').on('click', function (ev) {
//    $uploadC.croppie('result', {
//        type: 'canvas',
//        size: 'viewport'
//    }).then(function (resp) {
//        
//                 $('#select-uimg').attr('src', resp);
//                 $('#hiddenfield_uimg').val( resp);
//             $('#select-uimg').show();
//              $("#1cttt").hide();
//              $("#my_uimg").hide();
//               
//    });
//});
//
//$(document).ready(function () {
//    $("#select-uimg").click(function () {
//        $("input[id='my_uimg']").click();
//    });
//});
/////////////////////////////////////////////////////////////