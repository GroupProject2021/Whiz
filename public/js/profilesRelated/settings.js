$(document).ready(function() {        
    $('#btn1').click(function(event) {
        if($('#btn1').hasClass('active')) {
            $('#btn1').removeClass('active');
            toggleGeneralDetails(0);
        }
        else {
            $('#btn1').addClass('active');
            toggleGeneralDetails(1);
        }
    })

    $('#btn2').click(function(event) {
        if($('#btn2').hasClass('active')) {
            $('#btn2').removeClass('active');
            toggleSocialDetails(0);
        }
        else {
            $('#btn2').addClass('active');
            toggleSocialDetails(1);
        }
    })

    function toggleGeneralDetails(x) {
        $.ajax({
            url: URLROOT+"/Account_Settings/toggleGeneralDetails/"+USER_ID+"/"+x,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(res) {
                // alert(res);
            }
        })
    }

    function toggleSocialDetails(x) {
        $.ajax({
            url: URLROOT+"/Account_Settings/toggleSocialDetails/"+USER_ID+"/"+x,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(res) {
                // alert(res);
            }
        })
    }
})