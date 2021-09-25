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
                        <?php flash('post_message'); ?>

                        <a href="<?php echo URLROOT; ?>/posts/add"><button class="btn3">CREATE POST</button></a>
                        <br>
                    

                    <?php foreach($data['posts'] as $post): ?>
                        <!-- I added this later. So now it will only show the posts that are related to the user. Remove if statement and it will show all the posts -->
                        <?php //if($post->id == $_SESSION['user_id']): ?>
                            <div class="post">
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
                                    </button>
                                    <!-- <div class="post-footer-input"><input type="text" placeholder="Comment..." name="post-comment" id="post-comment" class="post-comment"></div>
                                    <button>
                                        <div class="post-footer-commentbtn"><img src="<?php echo URLROOT;?>/imgs/comment.png" alt=""></div>
                                    </button> -->
                                    <button>
                                        <div class="post-footer-sharebtn"><img src="<?php echo URLROOT;?>/imgs/share.png" alt=""></div>
                                        <div class="post-footer-text">Share</div>
                                    </button>
                                </div>
                            </div>
                            <br>
                        <?php //endif; ?>
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