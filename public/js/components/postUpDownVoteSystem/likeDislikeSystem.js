// For post like dislike system
$(document).ready(function() {
    // initial set of like and dislike states
    if($('#likeBtn').hasClass('active')) {
        isLiked = true;
    }
    else {
        isLiked = false;
    }

    if($('#dislikeBtn').hasClass('active')) {
        isDisliked = true;
    }
    else {                    
        isDisliked = false;
    }

    // for likes
    $('#like').click(function(event) {
        event.preventDefault();

        if(isLiked == false) {
            if(isDisliked == true || $('#dislikeBtn').hasClass('active')) {
                $('#dislikeBtn').removeClass('active');
                isDisliked = false;

                decDown();
            }

            $('#likeBtn').addClass('active');
            isLiked = true;

            incUp();
        }
        else {
            $('#likeBtn').removeClass('active');
            isLiked = false;

            decUp();
        }
    })

    // for dislikes
    $('#dislike').click(function(event) {
        event.preventDefault();

        if(isDisliked == false) {
            if(isLiked == true || $('#likeBtn').hasClass('active')) {
                $('#likeBtn').removeClass('active');
                isLiked = false;

                decUp();
            }

            $('#dislikeBtn').addClass('active');
            isDisliked = true;

            incDown();
        }
        else {
            $('#dislikeBtn').removeClass('active');
            isDisliked = false;

            decDown();
        }

    })

    function incUp() {
        $.ajax({
            url: URLROOT+"/Posts_UpvoteDownvote/incUp/"+CURRENT_POST,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#like-count').text(strMessage);
            }
        })
    }

    function decUp() {
        $.ajax({
            url: URLROOT+"/Posts_UpvoteDownvote/decUp/"+CURRENT_POST,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#like-count').text(strMessage);
            }
        })
    }

    function incDown() {
        $.ajax({
            url: URLROOT+"/Posts_UpvoteDownvote/incDown/"+CURRENT_POST,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#dislike-count').text(strMessage);
            }
        })
    }

    function decDown() {
        $.ajax({
            url: URLROOT+"/Posts_UpvoteDownvote/decDown/"+CURRENT_POST,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#dislike-count').text(strMessage);
            }
        })
    }
})