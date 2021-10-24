$(document).ready(function() {
    $("#search-user").keyup(function() {
        var searchText = $(this).val();
        
        if(searchText != '') {
            $.ajax({
                url: URLROOT+"/profileStatsAndConnections/searchUserByName/"+searchText,
                method: 'post',
                success: function(response) {
                    $("#show-userlist").html(response);
                }
            });
        }
        else {
            $("#show-userlist").html('');
        }
    });

    $(document).on("click", ".show-userlist-item", function() {
        $("#search-user").val('');
        $("#show-userlist").html('');
    })
});