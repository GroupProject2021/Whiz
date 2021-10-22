$(document).ready(function() {
    // uni type select
    $(document).on("click", "#uni_type", function() {
        $("#uni_name").val('');
        $("#show-list-1").html('');
        $("#degree").val('');
        $("#show-list-2").html('');
    });


    // uni name search            
    $("#uni_name").keyup(function() {
        var searchText = $(this).val();
        
        if($("#uni_type").children("option:selected").val() == "Government") {
            if(searchText != '') {
                $.ajax({
                    url: URLROOT+"/Students_ProfileUpgrade/universityList/"+searchText,
                    method: 'post',
                    success: function(response) {
                        $("#show-list-1").html(response);
                    }
                });
            }
            else {
                $("#show-list-1").html('');
            }
        }
    });

    $(document).on("click", ".show-list-item-1", function() {
        $("#uni_name").val($(this).text());
        $("#show-list-1").html('');
    });

    // degree search
    $("#degree").keyup(function() {
        var searchText = $(this).val();
        
        if($("#uni_type").children("option:selected").val() == "Government") {
            if(searchText != '') {
                $.ajax({
                    url: URLROOT+"/Students_ProfileUpgrade/degreeList/"+searchText,
                    method: 'post',
                    success: function(response) {
                        $("#show-list-2").html(response);
                    }
                });
            }
            else {
                $("#show-list-2").html('');
            }
        }
    });

    $(document).on("click", ".show-list-item-2", function() {
        $("#degree").val($(this).text());
        $("#show-list-2").html('');
    })
});