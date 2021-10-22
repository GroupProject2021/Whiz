$(document).ready(function() {
    $("#ol_school").keyup(function() {
        var searchText = $(this).val();
        
        if(searchText != '') {
            $.ajax({
                url: URLROOT+"/Students_ProfileUpgrade/schoolList/"+searchText,
                method: 'post',
                success: function(response) {
                    $("#show-list").html(response);
                }
            });
        }
        else {
            $("#show-list").html('');
        }
    });

    $(document).on("click", ".show-list-item", function() {
        $("#ol_school").val($(this).text());
        $("#show-list").html('');
    })
});