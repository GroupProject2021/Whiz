$(document).ready(function() {
    // for comments insert
    $('#thread-comment-btn').click(function(event) {
        event.preventDefault();

        console.log($('.thread-comment').val());

        // submit only if input area is not empty
        if(!($('.thread-comment').val() == 0)) {
            $.ajax({
                url: URLROOT+"/CommunityThreadComments/comment/"+CURRENT_POST,
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(strMessage) {
                    $('#msg').text(strMessage);
                }
            })                

            // COMMENT VALIDATIONS MUST BE ADDED

            $.ajax({
                url: URLROOT+"/CommunityThreadComments/showComments/"+CURRENT_POST,
                dataType: "html",
                success: function(results) {
                    $('#results').html(results);
                }
            })        

            $('.thread-comment').val('');             
        }
    })

    // onload show comments
    $.ajax({
        url: URLROOT+"/CommunityThreadComments/showComments/"+CURRENT_POST,
        dataType: "html",
        success: function(results) {
            $('#results').html(results);
        }
    })
})
// For comment like dislike system
function addCommentUp(commentId) {
    // alert('#comment-like-count'+commentId);
    if($('#comment_likebtn'+commentId).hasClass('active')) {
        $('#comment_likebtn'+commentId).removeClass('active');

        decCommentUp(commentId);
    }
    else {
        if($('#comment_dislikebtn'+commentId).hasClass('active')) {
            $('#comment_dislikebtn'+commentId).removeClass('active');

            decCommentDown(commentId);
        }

        $('#comment_likebtn'+commentId).addClass('active');

        incCommentUp(commentId);
    }
}

function addCommentDown(commentId) {
    // alert(commentId);
    if($('#comment_dislikebtn'+commentId).hasClass('active')) {
        $('#comment_dislikebtn'+commentId).removeClass('active');

        decCommentDown(commentId);
    }
    else {
        if($('#comment_likebtn'+commentId).hasClass('active')) {
            $('#comment_likebtn'+commentId).removeClass('active');

            decCommentUp(commentId);
        }

        $('#comment_dislikebtn'+commentId).addClass('active');

        incCommentDown(commentId);
    }
}

function incCommentUp(commentId) {
    $.ajax({
            url: URLROOT+"/CommunityThreadComments/incCommentUp/"+commentId,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#comment-like-count'+commentId).text(strMessage);
            }
    })
}

function decCommentUp(commentId) {
    $.ajax({
            url: URLROOT+"/CommunityThreadComments/decCommentUp/"+commentId,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#comment-like-count'+commentId).text(strMessage);
            }
    })
}

function incCommentDown(commentId) {
    $.ajax({
            url: URLROOT+"/CommunityThreadComments/incCommentDown/"+commentId,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#comment-dislike-count'+commentId).text(strMessage);
            }
    })
}

function decCommentDown(commentId) {
    $.ajax({
            url: URLROOT+"/CommunityThreadComments/decCommentDown/"+commentId,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                $('#comment-dislike-count'+commentId).text(strMessage);
            }
    })
}            

function deleteComment(commentId) {
    $.ajax({
            url: URLROOT+"/CommunityThreadComments/deleteComment/"+commentId,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage) {
                location.reload();
            }
    })
}