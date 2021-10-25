$(document).ready(function() { 
    var prgBarVal = $("#prgBar").val();
})

$("#applyBtn").click(function(event) {
    event.preventDefault();

    var prgBarVal = $("#prgBar").val();
    var inc_dec_Amount = INC_DEC_AMOUNT;

    if($(".interation").hasClass("applied")) {
        if(prgBarVal > 0) {
            // increment
            console.log(prgBarVal - inc_dec_Amount);
            $("#prgBar").val(prgBarVal - inc_dec_Amount);

            // set button
            $(".interation").removeClass("applied");

            decApply();
        }
    }
    else {
        if(prgBarVal < 100) {
            // increment
            console.log('app ' + prgBarVal + inc_dec_Amount);
            // $("#prgBar").val(prgBarVal + inc_dec_Amount);

            // set button
            $(".interation").addClass("applied");

            incApply();
        }
    }
})

function incApply() {
        $.ajax({
            url: URLROOT+"/C_S_Stu_To_ProfessionalGuider/incEnroll/"+CURRENT_POST,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#applied').text(strMessage + " Applied");
                location.reload();
            }
        })
    }

    function decApply() {
        $.ajax({
            url: URLROOT+"/C_S_Stu_To_ProfessionalGuider/decEnroll/"+CURRENT_POST,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#applied').text(strMessage + " Applied");
            }
        })
    }