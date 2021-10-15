<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/sidebar.php'?>

        <div class="main-content">
            <!-- TOP Navigation -->
            <header>
                <?php require APPROOT.'/views/inc/components/topnav.php'?>
            </header>
            
            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>Posts</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">


                    <a href="<?php echo URLROOT;?>/Posts_C_O_CoursePosts/index"><button class="btn8 post-back">Back</button></a>
                                                                          
                            <div class="post">
                                <?php if($data['post']->image != null):?>
                                    <div class="post-header">
                                        <img src="<?php echo URLROOT.'/imgs/posts/courseposts/'.$data['post']->image; ?>" alt="">
                                    </div>  
                                <?php endif; ?>
                                <div class="post-details">
                                    <div class="profpic"><a class="post-link" href="<?php echo URLROOT.'/C_S_Settings/settings/'.$data['user']->id;?>"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($data['user']->actor_type).'/'.$data['user']->profile_image;?>" alt=""></a></div>
                                    <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($data['user']->actor_type).'-'.getActorSpecializedTypeForIcons($data['user']->actor_type, $data['user']->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                    <div class="postedby"><a class="post-link" href="<?php echo URLROOT.'/C_S_Settings/settings/'.$data['user']->id;?>"><?php echo $data['user']->first_name.' '.$data['user']->last_name; ?></a></div>
                                    <?php if($data['user']->status == 'verified'): ?>
                                    <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                    <?php endif; ?>
                                    <div class="postedat"><?php echo convertedToReadableTimeFormat($data['post']->created_at); ?></div>
                                    <!-- edit delete options -->
                                    <?php if($data['post']->user_id == $_SESSION['user_id']): ?>    
                                        <div class="post-control-buttons">                                        
                                            <a href="<?php echo URLROOT?>/Posts_C_O_CoursePosts/edit/<?php echo $data['post']->id;?>">
                                                <button class="post-header-editbtn">Edit</button>
                                            </a>
                                            <form action="<?php echo URLROOT; ?>/Posts_C_O_CoursePosts/delete/<?php echo $data['post']->id; ?>" method="post">
                                                <input type="submit" value="Delete" class="post-header-deletebtn">
                                            </form>
                                        </div>
                                     <?php endif; ?>
                                </div>
                                <div class="post-body">
                                    <div class="title"><?php echo $data['post']->title; ?></div>
                                    <div class="postedby"><?php echo $data['post']->body; ?></div>
                                </div>
                                <form method="post">
                                <div class="post-footer">
                                    <button id="like" >
                                        <?php if($data['self_interaction'] == 'liked'):?>
                                            <div class="post-footer-likebtn active" id="likeBtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/up-icon.png" alt=""></div>
                                        <?php else: ?>
                                            <div class="post-footer-likebtn" id="likeBtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/up-icon.png" alt=""></div>
                                        <?php endif; ?>
                                        <div class="post-footer-text" id="like-count"><?php echo $data['ups']; ?></div>
                                    </button>
                                    <button id="dislike">
                                        <?php if($data['self_interaction'] == 'disliked'):?>
                                            <div class="post-footer-dislikebtn active" id="dislikeBtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/down-icon.png" alt=""></div>                                            
                                        <?php else: ?>
                                            <div class="post-footer-dislikebtn" id="dislikeBtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/down-icon.png" alt=""></div>
                                        <?php endif; ?>
                                        <div class="post-footer-text" id="dislike-count"><?php echo $data['downs']; ?></div>
                                    </button>
                                    <div class="post-footer-input"><input type="text" placeholder="Comment..." name="post-comment" id="post-comment" class="post-comment"></div>
                                    <button id="comment">
                                        <div class="post-footer-commentbtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/comment-icon.png" alt=""></div>
                                    </button>
                                    <button id="share">
                                        <div class="post-footer-sharebtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/share-icon.png" alt=""></div>
                                        <div class="post-footer-text">Share</div>
                                    </button>
                                </div>
                                </form>
                            </div>
                            <br>

                            <!-- REVIEW RATING SYSTEM -->
                            <div class="ratingSystem">
                                <?php require APPROOT.'/views/inc/components/ratingSystem/ratingSystem.php'?>
                            </div>

                            <br>

                            <!-- COMMENT THREAD - AJAX REQUESTS IN REAL-TIME -->
                            <div id="results"></div>
                            
                        </div>

                        <!-- test msg for comment results - CHECK FOR COMMENT INSERTING ONLY -->
                        <!-- <div id="msg"></div> -->

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>

        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

        <!-- javacript for like dislike systen -->
        <script>
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
                        url: "<?php echo URLROOT;?>/Posts_C_O_CoursePosts/incUp/<?php echo $_SESSION['current_viewing_post_id']?>",
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
                        url: "<?php echo URLROOT;?>/Posts_C_O_CoursePosts/decUp/<?php echo $_SESSION['current_viewing_post_id']?>",
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
                        url: "<?php echo URLROOT;?>/Posts_C_O_CoursePosts/incDown/<?php echo $_SESSION['current_viewing_post_id']?>",
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
                        url: "<?php echo URLROOT;?>/Posts_C_O_CoursePosts/decDown/<?php echo $_SESSION['current_viewing_post_id']?>",
                        method: "post",
                        data: $('form').serialize(),
                        dataType: "text",
                        success: function(strMessage) {
                            $('#dislike-count').text(strMessage);
                        }
                    })
                }
            })

            
        </script>

        <!-- javascript for comment system -->
        <script>
             $(document).ready(function() {
                // for comments insert
                $('#comment').click(function(event) {
                    event.preventDefault();

                    // submit only if input area is not empty
                    if(!($('.post-comment').val() == 0)) {
                        $.ajax({
                            url: "<?php echo URLROOT;?>/Comments/comment/<?php echo $_SESSION['current_viewing_post_id']?>",
                            method: "post",
                            data: $('form').serialize(),
                            dataType: "text",
                            success: function(strMessage) {
                                $('#msg').text(strMessage);
                            }
                        })                

                        // COMMENT VALIDATIONS MUST BE ADDED

                        $.ajax({
                            url: "<?php echo URLROOT;?>/Comments/showComments/<?php echo $_SESSION['current_viewing_post_id']?>",
                            dataType: "html",
                            success: function(results) {
                                $('#results').html(results);
                            }
                        })        

                        $('.post-comment').val('');             
                    }
                })

                // onload show comments
                $.ajax({
                    url: "<?php echo URLROOT;?>/Comments/showComments/<?php echo $_SESSION['current_viewing_post_id']?>",
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
                        url: "<?php echo URLROOT;?>/Comments/incCommentUp/"+commentId,
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
                        url: "<?php echo URLROOT;?>/Comments/decCommentUp/"+commentId,
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
                        url: "<?php echo URLROOT;?>/Comments/incCommentDown/"+commentId,
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
                        url: "<?php echo URLROOT;?>/Comments/decCommentDown/"+commentId,
                        method: "post",
                        data: $('form').serialize(),
                        dataType: "text",
                        success: function(strMessage) {
                            $('#comment-dislike-count'+commentId).text(strMessage);
                        }
                })
            }
        </script>

<?php require APPROOT.'/views/inc/footer.php'; ?>
