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
            <?php if(isset($_SESSION['user_id'])) : ?>
                <?php if($_SESSION['specialized_actor_type'] == 'Professional Guider'): ?>
                    <!-- Professional guider -->
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Banners > View</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel-single">
                        <a href="<?php echo URLROOT;?>/Mentors_dashboard/banner"><button class="btn8 post-back">Back</button></a>
                            <br>
                            <div class="post">
                                <?php if($data['post']->image != null):?>
                                    <div class="post-header">
                                        <img src="<?php echo URLROOT.'/imgs/POSTS/'.$data['post']->image; ?>" alt="">
                                    </div>  
                                <?php endif; ?>
                                <div class="post-details">
                                    <div class="profpic"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($data['user']->actor_type).'/'.$data['user']->profile_image;?>" alt=""></div>
                                    <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($data['user']->actor_type).'-'.getActorSpecializedTypeForIcons($data['user']->actor_type, $data['user']->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                    <div class="postedby"><?php echo $data['user']->name; ?></div>
                                    <?php if($data['user']->status == 'verified'): ?>
                                    <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                    <?php endif; ?>
                                    <?php if($data['post']->user_id == $_SESSION['user_id']): ?>    
                                        <div class="post-control-buttons">                                        
                                            <a href="<?php echo URLROOT?>/Mentors_dashboard/editBanner/<?php echo $data['post']->id;?>">
                                                <button class="post-header-editbtn">Edit</button>
                                            </a>
                                            <form action="<?php echo URLROOT; ?>/Mentors_dashboard/deleteBanner/<?php echo $data['post']->id; ?>" method="post">
                                                <input type="submit" value="Delete" class="post-header-deletebtn">
                                            </form>
                                        </div>
                                     <?php endif; ?>
                                </div>
                                <div class="postedat"><?php echo convertedToReadableTimeFormat($data['post']->created_at); ?></div>
                                <div class="post-body">
                                    <div class="title"><?php echo $data['post']->title; ?></div>
                                    <div class="postedby"><?php echo $data['post']->body; ?></div>
                                </div>
                                <form method="post">
                                <div class="post-footer">
                                    <button id="like" >
                                        <!-- <?php if($data['self_interaction'] == 'liked'):?> -->
                                            <div class="post-footer-likebtn active" id="likeBtn"><img src="<?php echo URLROOT;?>/imgs/up-icon.png" alt=""></div>
                                        <?php else: ?>
                                            <div class="post-footer-likebtn" id="likeBtn"><img src="<?php echo URLROOT;?>/imgs/up-icon.png" alt=""></div>
                                        <?php endif; ?>
                                        <div class="post-footer-text" id="like-count"><?php echo $data['ups']; ?></div>
                                    </button>
                                    <button id="dislike">
                                        <!-- <?php if($data['self_interaction'] == 'disliked'):?> -->
                                            <div class="post-footer-dislikebtn active" id="dislikeBtn"><img src="<?php echo URLROOT;?>/imgs/down-icon.png" alt=""></div>                                            
                                        <?php else: ?>
                                            <div class="post-footer-dislikebtn" id="dislikeBtn"><img src="<?php echo URLROOT;?>/imgs/down-icon.png" alt=""></div>
                                        <?php endif; ?>
                                        <div class="post-footer-text" id="dislike-count"><?php echo $data['downs']; ?></div>
                                    </button>
                                    <div class="post-footer-input"><input type="text" placeholder="Comment..." name="post-comment" id="post-comment" class="post-comment"></div>
                                    <button id="comment">
                                        <div class="post-footer-commentbtn"><img src="<?php echo URLROOT;?>/imgs/comment.png" alt=""></div>
                                    </button>
                                    <button id="share">
                                        <div class="post-footer-sharebtn"><img src="<?php echo URLROOT;?>/imgs/share-icon.png" alt=""></div>
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
                    </div>
                <?php elseif($_SESSION['specialized_actor_type'] == 'Teacher'): ?>
                    <!-- Teacher -->
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Posters > View</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel">
                            <a href="<?php echo URLROOT;?>/Mentors_dashboard/poster"><button class="btn8 post-back">Back</button></a>
                            <br>
                            <div class="post">
                                <?php if($data['post']->image != null):?>
                                    <div class="post-header">
                                        <img src="<?php echo URLROOT.'/imgs/POSTS/'.$data['post']->image; ?>" alt="">
                                    </div>  
                                <?php endif; ?>
                                <div class="post-details">
                                    <div class="profpic"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($data['user']->actor_type).'/'.$data['user']->profile_image;?>" alt=""></div>
                                    <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($data['user']->actor_type).'-'.getActorSpecializedTypeForIcons($data['user']->actor_type, $data['user']->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                    <div class="postedby"><?php echo $data['user']->name; ?></div>
                                    <?php if($data['user']->status == 'verified'): ?>
                                    <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                    <?php endif; ?>
                                    <?php if($data['post']->user_id == $_SESSION['user_id']): ?>    
                                        <div class="post-control-buttons">                                        
                                            <a href="<?php echo URLROOT?>/Mentors_dashboard/editPoster/<?php echo $data['post']->id;?>">
                                                <button class="post-header-editbtn">Edit</button>
                                            </a>
                                            <form action="<?php echo URLROOT; ?>/Mentors_dashboard/deletePoster/<?php echo $data['post']->id; ?>" method="post">
                                                <input type="submit" value="Delete" class="post-header-deletebtn">
                                            </form>
                                        </div>
                                     <?php endif; ?>
                                </div>
                                <div class="postedat"><?php echo convertedToReadableTimeFormat($data['post']->created_at); ?></div>
                                <div class="post-body">
                                    <div class="title"><?php echo $data['post']->title; ?></div>
                                    <div class="postedby"><?php echo $data['post']->body; ?></div>
                                </div>
                                <form method="post">
                                <div class="post-footer">
                                    <button id="like" >
                                        <!-- <?php if($data['self_interaction'] == 'liked'):?> -->
                                            <div class="post-footer-likebtn active" id="likeBtn"><img src="<?php echo URLROOT;?>/imgs/up-icon.png" alt=""></div>
                                        <?php else: ?>
                                            <div class="post-footer-likebtn" id="likeBtn"><img src="<?php echo URLROOT;?>/imgs/up-icon.png" alt=""></div>
                                        <?php endif; ?>
                                        <div class="post-footer-text" id="like-count"><?php echo $data['ups']; ?></div>
                                    </button>
                                    <button id="dislike">
                                        <!-- <?php if($data['self_interaction'] == 'disliked'):?> -->
                                            <div class="post-footer-dislikebtn active" id="dislikeBtn"><img src="<?php echo URLROOT;?>/imgs/down-icon.png" alt=""></div>                                            
                                        <?php else: ?>
                                            <div class="post-footer-dislikebtn" id="dislikeBtn"><img src="<?php echo URLROOT;?>/imgs/down-icon.png" alt=""></div>
                                        <?php endif; ?>
                                        <div class="post-footer-text" id="dislike-count"><?php echo $data['downs']; ?></div>
                                    </button>
                                    <div class="post-footer-input"><input type="text" placeholder="Comment..." name="post-comment" id="post-comment" class="post-comment"></div>
                                    <button id="comment">
                                        <div class="post-footer-commentbtn"><img src="<?php echo URLROOT;?>/imgs/comment.png" alt=""></div>
                                    </button>
                                    <button id="share">
                                        <div class="post-footer-sharebtn"><img src="<?php echo URLROOT;?>/imgs/share-icon.png" alt=""></div>
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
                    </div>
                <?php else: ?>
                    <!-- Nothing here -->
                <?php endif;?>
            <?php endif; ?> 

                    <!-- BOTTOM PANEL -->
                    <!-- <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div> -->
                </div>                    
            </main>
        </div>

        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
        <script>
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
                        url: "<?php echo URLROOT;?>/posts/incUp/<?php echo $_SESSION['current_viewing_post_id']?>",
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
                        url: "<?php echo URLROOT;?>/posts/decUp/<?php echo $_SESSION['current_viewing_post_id']?>",
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
                        url: "<?php echo URLROOT;?>/posts/incDown/<?php echo $_SESSION['current_viewing_post_id']?>",
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
                        url: "<?php echo URLROOT;?>/posts/decDown/<?php echo $_SESSION['current_viewing_post_id']?>",
                        method: "post",
                        data: $('form').serialize(),
                        dataType: "text",
                        success: function(strMessage) {
                            $('#dislike-count').text(strMessage);
                        }
                    })
                }

                // for comments insert
                $('#comment').click(function(event) {
                    event.preventDefault();

                    // submit only if input area is not empty
                    if(!($('.post-comment').val() == 0)) {
                        $.ajax({
                            url: "<?php echo URLROOT;?>/posts/comment/<?php echo $_SESSION['current_viewing_post_id']?>",
                            method: "post",
                            data: $('form').serialize(),
                            dataType: "text",
                            success: function(strMessage) {
                                $('#msg').text(strMessage);
                            }
                        })                

                        // COMMENT VALIDATIONS MUST BE ADDED

                        $.ajax({
                            url: "<?php echo URLROOT;?>/posts/showComments/<?php echo $_SESSION['current_viewing_post_id']?>",
                            dataType: "html",
                            success: function(results) {
                                $('#results').html(results);
                            }
                        })                        
                    }
                })

                // onload show comments
                $.ajax({
                    url: "<?php echo URLROOT;?>/posts/showComments/<?php echo $_SESSION['current_viewing_post_id']?>",
                    dataType: "html",
                    success: function(results) {
                        $('#results').html(results);
                    }
                })
            })
        </script>

<?php require APPROOT.'/views/inc/footer.php'; ?>