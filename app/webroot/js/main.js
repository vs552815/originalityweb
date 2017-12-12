/* global webURL */
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
       var obj2=$(this).attr('data-id');
      
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
                       var url = webURL + "users/story_comment/" + obj2;
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

///////////////////////////////////////////////////////////////
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
                       window.location.href = webURL + "users/go_live";
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
       var obj=$(this).attr('rel');
      
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
    $('.logo-upload').css({width:'100%',float:'none'});
    $('.logo-upload1').css({width:'100%',margin:'0'});
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
                 $('#hiddenfield_cimg').val( resp);
             $('#select-cmpnyimg').show();
              $("#cttt").hide();
              $('.logo-upload').css({width:'50%',float:'left'});
               $('.logo-upload1').css({width:'50%',margin:'0 auto'});
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
     $('.logo-main').css({width:'100%',float:'none'});
    $('.logo-main1').css({width:'100%',margin:'0'});
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
                 $('#hiddenfield_cimg1').val( resp);
             $('#select-cmpnyimg1').show();
              $("#cttt1").hide();
                $('.logo-main').css({width:'50%',float:'left'});
    $('.logo-main1').css({width:'50%',margin:'0 auto'});
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
                 $('#hiddenfield_uimg').val( resp);
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
                    window.location.href =  "";
                } else {
                    swal("", "That email address already in Originalityweb.", "error");
                    //$('#SignupPopup').modal('hide');
                    
                }
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
    
    $(document).ready(function(){
    $('.diable-btn').attr('disabled',true);
    $('#Comment_sol').keyup(function(){
        if($(this).val().length !=0)
            $('.diable-btn').attr('disabled', false);            
        else
            $('.diable-btn').attr('disabled',true);
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