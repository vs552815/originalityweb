/* global webURL */
///////////////////////////////////////////////////////////
jQuery(document).ready(function ($) {
   
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
                    swal("", "Please login first.", "error");
                    $('#LoginPopup').modal('show');
                }
            }
        });
    });

///////////////////////////////////////////////////////////
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
                    window.location.href = webURL + "users/home";

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


 });
 
 
 
 ///////////////////////////////////////////////////////////////////
$uploadCrr = $('#upload-cpnyimg').croppie({
    enableExif: true,
     viewport: {
        width: 350,
        height: 350,
        type: 'circle'
    },
    boundary: {
        width: 370,
        height: 370
    },
    showZoomer: false
});

$('#my_cimg').on('change', function () {
    $('#cttt').show();
    $('#select-cmpnyimg').hide();
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
        width: 250,
        height: 250,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    },
    showZoomer: false
});

$('#my_uimg').on('change', function () {
    $('#1cttt').show();
    $('#select-uimg').hide();
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
                    swal("", "That email address already in Gameing Geek.", "error");
                    //$('#SignupPopup').modal('hide');
                    
                }
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });