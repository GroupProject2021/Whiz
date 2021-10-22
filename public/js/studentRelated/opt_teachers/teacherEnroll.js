$(document).ready(function() { 
                var prgBarVal = $("#prgBar").val();
                $("#percentage").text(prgBarVal + "%");
            })

            $("#applyBtn").click(function(event) {
                event.preventDefault();

                var prgBarVal = $("#prgBar").val();
                var inc_dec_Amount = INC_DEC_AMOUNT;

                if($(".interation").hasClass("applied")) {
                    if(prgBarVal > 0) {
                        // increment
                        $("#prgBar").val(prgBarVal - inc_dec_Amount);

                        // set prg text
                        $("#percentage").text(prgBarVal - inc_dec_Amount + "%");

                        // set button
                        $(".interation").removeClass("applied");

                        decApply();
                    }
                }
                else {
                    if(prgBarVal < 100) {
                        // increment
                        $("#prgBar").val(prgBarVal + inc_dec_Amount);

                        // set prg text
                        $("#percentage").text(prgBarVal + inc_dec_Amount + "%");

                        // set button
                        $(".interation").addClass("applied");

                        incApply();
                    }
                }
            })

            function incApply() {
                    $.ajax({
                        url: URLROOT+"/C_S_Stu_To_Teacher/incEnroll/"+CURRENT_POST,
                        method: "post",
                        data: $('form').serialize(),
                        dataType: "text",
                        success: function(strMessage) {
                            $('#applied').text(strMessage + " Applied");
                        }
                    })
                }

                function decApply() {
                    $.ajax({
                        url: URLROOT+"/C_S_Stu_To_Teacher/decEnroll/"+CURRENT_POST,
                        method: "post",
                        data: $('form').serialize(),
                        dataType: "text",
                        success: function(strMessage) {
                            $('#applied').text(strMessage + " Applied");
                        }
                    })
                }