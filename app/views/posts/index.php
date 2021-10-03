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
                        <?php flash('post_message'); ?>

                        <a href="<?php echo URLROOT; ?>/posts/add"><button class="btn3">CREATE POST</button></a>
                        <br>
                    

                    <?php //foreach($data['posts'] as $post): ?>
                        <!-- I added this later. So now it will only show the posts that are related to the user. Remove if statement and it will show all the posts -->
                        <?php //if($post->id == $_SESSION['user_id']): ?>
                            <!-- <div class="post">
                                <div class="post-header">
                                        <div class="post-header-icon"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt=""></div>
                                        <div class="post-header-actortypeicon"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($post->actor_type).'-'.getActorSpecializedTypeForIcons($post->actor_type, $post->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                        <div class="post-header-postedby"><?php echo $post->name; ?></div>
                                        <div class="post-header-verified"><img src="<?php echo URLROOT;?>/imgs/verified.png" alt=""></div>
                                        <div class="post-header-postedtime"><?php echo convertedToReadableTimeFormat($post->postCreated); ?></div>
                                </div>
                                <div class="post-body">
                                    <div class="post-body-title"><?php echo $post->title; ?></div>
                                    <div class="post-body-content">
                                        <?php echo $post->body; ?>
                                        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More...</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="post-footer">
                                    <button id="like">
                                        <div class="post-footer-likebtn"><img src="<?php echo URLROOT;?>/imgs/like.png" alt=""></div>
                                        <div class="post-footer-text" id="like-count"><?php echo $post->ups; ?></div>
                                    </button>
                                    <button>
                                        <div class="post-footer-dislikebtn"><img src="<?php echo URLROOT;?>/imgs/like.png" alt=""></div>
                                        <div class="post-footer-text"><?php echo $post->downs; ?></div>
                                    </button> -->
                                    <!-- <div class="post-footer-input"><input type="text" placeholder="Comment..." name="post-comment" id="post-comment" class="post-comment"></div>
                                    <button>
                                        <div class="post-footer-commentbtn"><img src="<?php echo URLROOT;?>/imgs/comment.png" alt=""></div>
                                    </button> -->
                                    <!-- <button>
                                        <div class="post-footer-sharebtn"><img src="<?php echo URLROOT;?>/imgs/share.png" alt=""></div>
                                        <div class="post-footer-text">Share</div>
                                    </button>
                                </div>
                            </div>
                            <br> -->
                        <?php //endif; ?>
                    <?php //endforeach; ?>

                    <?php foreach($data['posts'] as $post): ?>
                    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="card-link">
                    <div class="post">
                        <?php if($post->image != null):?>
                            <div class="post-header">
                                <img src="<?php echo URLROOT.'/imgs/POSTS/'.$post->image; ?>" alt="">
                            </div>
                        <?php endif; ?>
                            <div class="post-details">
                                <div class="profpic"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt=""></div>
                                <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($post->actor_type).'-'.getActorSpecializedTypeForIcons($post->actor_type, $post->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                <div class="postedby"><?php echo $post->name; ?></div>
                                <?php if($post->status == 'verified'): ?>
                                <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                <?php endif; ?>
                            </div>
                            <div class="postedat"><?php echo convertedToReadableTimeFormat($post->postCreated); ?></div>
                            <div class="post-body">
                                <div class="title"><?php echo $post->title; ?></div>
                                <div class="postedby"><?php echo $post->body; ?></div>
                                <!-- PROGRESS BAR CURRENTLY NOT ACTIVE - LATER ON CAN USE FOR JOB APPLICATIONS -->
                                <!-- <div class="progress">
                                    <progress class="applied-bar" value="50" max="100"></progress>
                                    <div class="text">
                                        <div class="applied">50 applied</div>
                                        <div class="capacity">of 100 capacity</div>
                                    </div>
                                </div>                             -->
                                <!-- <div class="price">View more</div> -->
                                <div class="stats">
                                    <div class="ups"><img src="<?php echo URLROOT.'/imgs/up-icon.png'; ?>" alt=""></div>
                                    <div class="ups-count" id="like-count"><?php echo $post->ups; ?></div>
                                    <div class="downs"><img src="<?php echo URLROOT.'/imgs/down-icon.png'; ?>" alt=""></div>
                                    <div class="downs-count"><?php echo $post->downs; ?></div>
                                    <div class="rate">3.0</div>
                                    <?php for($i=0; $i <5; $i++):?>
                                    <div class="stars"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <?php endfor;?>
                                    <div class="enrollment">(10,623)</div>
                                </div>          
                            </div>
                        </div>
                        </a>
                        <br>
                        <?php endforeach; ?>

                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>

        <script>
            // var upBtns = document.getElementsByClassName("post-footer-likebtn");

            // for(i = 0; i < upBtns.length; i++) {
            //     upBtns[i].addEventListener("click", function() {
            //         upBtns[i].classList.add("liked");
            //     });

            //     console.log(i);
            // }            
        </script>

        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
        <script>
            // for likes
            $('#like').click(function(event) {
                    event.preventDefault();

                $.ajax({
                    url: "<?php echo URLROOT;?>/posts/incUp/2",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(strMessage) {
                        $('#like-count').text(strMessage);
                    }
                })})
        </script>
<?php require APPROOT.'/views/inc/footer.php'; ?>