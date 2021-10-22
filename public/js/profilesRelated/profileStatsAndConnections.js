$(document).ready(function() {
    // follow and following features

$("#followBtn").on("click", function() {
    $("#follow").css("display", "none");
    $("#following").css("display", "block");
})

$("#followingBtn").on("click", function() {
    $("#following").css("display", "none")
    $("#follow").css("display", "block");
})

    // for followers
    $('#followBtn').click(function(event) {
        event.preventDefault();

    $.ajax({
        url: URLROOT+"/profileStatsAndConnections/follow/"+USER_ID,
        method: "post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(strMessage) {
            $('#followers-count').text(strMessage);
        }
    })})

    // $('#followBtn').click(function(event) {
    //     event.preventDefault();

    // $.ajax({
    //     url: "<?php echo URLROOT.'/C_S_Settings/settings/'.$data['user']->id; ?>",
    //     method: "post",
    //     data: $('form').serialize(),
    //     dataType: "text",
    //     success: function(strMessage) {
    //         // $('#followers-count').text(strMessage);
    //     }
    // })})

    // for followings
    // $('#followingBtn').click(function(event) {
    //     event.preventDefault();

    // $.ajax({
    //     url: "<?php echo URLROOT.'/profileStatsAndConnections/unfollow/'.$data['user']->id; ?>",
    //     method: "post",
    //     data: $('form').serialize(),
    //     dataType: "text",
    //     success: function(strMessage) {
    //         $('#followers-count').text(strMessage);
    //     }
    // })})
})