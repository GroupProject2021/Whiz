<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sidebar.php'?>

        <div class="main-content">
            <header>                
                <div class="menu-toggle">
                    <button type="button" class="sidebar-handle">
                        <img src="<?php echo URLROOT; ?>/imgs/dashboard/sidebar-icon.png">
                    </button>
                </div>
                
                <!-- TOP NAVIGATION BAR -->
                <div class="topnav">
                    <?php require APPROOT.'/views/inc/components/topnav.php'?>
                </div>
            </header>

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>Posts</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">


                    <a href="<?php echo URLROOT;?>/posts/index"><button class="btn8 post-back">Back</button></a>
                                                                          
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
                                            <a href="<?php echo URLROOT?>/posts/edit/<?php echo $data['post']->id;?>">
                                                <button class="post-header-editbtn">Edit</button>
                                            </a>
                                            <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                                                <input type="submit" value="Delete" class="post-header-deletebtn">
                                            </form>
                                        </div>
                                     <?php endif; ?>
                                </div>
                                <div class="postedat"><?php echo convertedToReadableTimeFormat($data['post']->created_at); ?></div>
                                <div class="post-body">
                                    <div class="title"><?php echo $data['post']->title; ?></div>
                                    <div class="postedby"><?php echo $data['post']->body; ?></div>
                                    <!-- PROGRESS BAR CURRENTLY NOT ACTIVE - LATER ON CAN USE FOR JOB APPLICATIONS -->
                                    <!-- <div class="progress">
                                        <progress class="applied-bar" value="50" max="100"></progress>
                                        <div class="text">
                                            <div class="applied">50 applied</div>
                                            <div class="capacity">of 100 capacity</div>
                                        </div>
                                    </div>                             -->
                                    <!-- <div class="price">View more</div> -->
                                </div>
                                <form method="post">
                                <div class="post-footer">
                                    <button id="like">
                                        <div class="post-footer-likebtn"><img src="<?php echo URLROOT;?>/imgs/up-icon.png" alt=""></div>
                                        <div class="post-footer-text" id="like-count"><?php echo $data['ups']; ?></div>
                                    </button>
                                    <button id="dislike">
                                        <div class="post-footer-dislikebtn"><img src="<?php echo URLROOT;?>/imgs/down-icon.png" alt=""></div>
                                        <div class="post-footer-text" id="dislike-count"><?php echo $data['downs']; ?></div>
                                    </button>
                                    <div class="post-footer-input"><input type="text" placeholder="Comment..." name="post-comment" id="post-comment" class="post-comment"></div>
                                    <button id="comment">
                                        <div class="post-footer-commentbtn"><img src="<?php echo URLROOT;?>/imgs/comment.png" alt=""></div>
                                    </button>
                                    <button>
                                        <div class="post-footer-sharebtn"><img src="<?php echo URLROOT;?>/imgs/share.png" alt=""></div>
                                        <div class="post-footer-text">Share</div>
                                    </button>
                                </div>
                                </form>
                            </div>
                            <br>

                            <div class="review-area">
                                <div class="review-title">Reviews</div>
                                <div class="review-content">
                                    <div class="left">
                                        <div class="rate-no"><?php echo $data['avg_rate']; ?></div>
                                        <div class="rate-stars">
                                            <?php for($i = 1; $i <= round($data['avg_rate'], 0); $i++): ?>
                                                <div class="star active"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                            <?php endfor; ?>
                                            <?php for($i = round($data['avg_rate'], 0) + 1; $i <= 5; $i++): ?>
                                                <div class="star"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="total-text">Total Reviews</div>
                                        <div class="total-rate-amount">
                                            <div class="user-icon"><img src="<?php echo URLROOT.'/imgs/user-icon.png'; ?>" alt=""></div>
                                            <div class="user-count"><?php echo $data['total_reviews']; ?></div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="right-content">
                                            <div class="rate-bar-area">
                                                <div class="rate-side-no">5</div>
                                                <div class="prg-bar">                                                    
                                                    <div class="rate-bar1" style="width: <?php echo $data['rate5']; ?>%;"></div>
                                                </div>
                                            </div>
                                            <div class="rate-bar-area">
                                                <div class="rate-side-no">4</div>
                                                <div class="prg-bar">
                                                    <div class="rate-bar2" style="width: <?php echo $data['rate4']; ?>%;"></div>
                                                </div>
                                            </div>
                                            <div class="rate-bar-area">
                                                <div class="rate-side-no">3</div>
                                                <div class="prg-bar">
                                                    <div class="rate-bar3" style="width: <?php echo $data['rate3']; ?>%;"></div>
                                                </div>
                                            </div>
                                            <div class="rate-bar-area">
                                                <div class="rate-side-no">2</div>
                                                <div class="prg-bar">
                                                    <div class="rate-bar4" style="width: <?php echo $data['rate2']; ?>%;"></div>
                                                </div>
                                            </div>
                                            <div class="rate-bar-area">
                                                <div class="rate-side-no">1</div>
                                                <div class="prg-bar">
                                                    <div class="rate-bar5" style="width: <?php echo $data['rate1']; ?>%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="interactable-show">
                                    <div class="write-a-review"><a href="<?php echo URLROOT.'/Reviews/add'; ?>" class="review-link">Write a review</a></div>
                                    <div class="see-all-reviews"><a href="<?php echo URLROOT.'/Reviews/viewAll'; ?>" class="review-link">See all reviews</a></div>
                                </div>
                            </div>

                            <br>

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
        <script>
            $(document).ready(function() {
                // for likes
                $('#like').click(function(event) {
                    event.preventDefault();

                $.ajax({
                    url: "<?php echo URLROOT;?>/posts/incUp/<?php echo $_SESSION['current_viewing_post_id']?>",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(strMessage) {
                        $('#like-count').text(strMessage);
                    }
                })})

                // for dislikes
                $('#dislike').click(function(event) {
                    event.preventDefault();

                $.ajax({
                    url: "<?php echo URLROOT;?>/posts/incDown/<?php echo $_SESSION['current_viewing_post_id']?>",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(strMessage) {
                        $('#dislike-count').text(strMessage);
                    }
                })})

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
