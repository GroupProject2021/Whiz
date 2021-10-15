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
                        <h1>Jobs</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                    
                    <?php foreach($data['posts'] as $post): ?>
                    <?php if($post->type == "advertisement"): ?>
                    <div class="post">
                        <?php if($post->image != null):?>
                            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Company/show/<?php echo $post->postId; ?>" class="card-link">
                                <div class="post-header">
                                    <img src="<?php echo URLROOT.'/imgs/posts/advertisements/'.$post->image; ?>" alt="">
                                </div>
                            </a>
                        <?php endif; ?>
                            <div class="post-details">
                                <div class="profpic"><a class="post-link" href="<?php echo URLROOT.'/C_S_Settings/settings/'.$post->userId;?>"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt=""></a></div>
                                <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($post->actor_type).'-'.getActorSpecializedTypeForIcons($post->actor_type, $post->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                <div class="postedby"><a class="post-link" href="<?php echo URLROOT.'/C_S_Settings/settings/'.$post->userId;?>"><?php echo $post->first_name.' '.$post->last_name; ?></a></div>
                                <?php if($post->status == 'verified'): ?>
                                <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                <?php endif; ?>
                                <div class="postedat"><?php echo convertedToReadableTimeFormat($post->postCreated); ?></div>
                            </div>
                            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Company/show/<?php echo $post->postId; ?>" class="card-link">
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
                                    </div>                            
                                    <div class="price">View more</div> -->
                                    <div class="stats">
                                        <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                        <div class="ups-count" id="like-count"><?php echo $post->ups; ?></div>
                                        <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                        <div class="downs-count"><?php echo $post->downs; ?></div>
                                        <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                        <div class="comments-count"><?php echo $post->comment_count; ?></div>
                                        <div class="rate"><?php echo countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5); ?></div>
                                        <?php 
                                        $rate = countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5);

                                        for($i=0; $i <ceil($rate); $i++) {
                                            echo '<div class="stars active"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                        }

                                        for($i=0; $i <5 - ceil($rate); $i++) {
                                            echo '<div class="stars"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                        }
                                        
                                        ?>
                                        
                                        <div class="enrollment">REVIEWS (<?php echo $post->review_count; ?>)</div>
                                    </div>          
                                </div>
                            </a>
                        </div>
                        <br>
                        <?php endif; ?>
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