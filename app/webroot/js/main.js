/* global webURL */
///////////////////////////////////////////////////////////
jQuery(document).ready(function ($) {
  $('#checkLogin').on('click', function () {
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
                    if (data.account_type_id == 3) {
                        window.location.href = webURL + "users/postjob";
                    } else {
                        window.location.href = webURL + "users/home";
                    }

                } else {

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