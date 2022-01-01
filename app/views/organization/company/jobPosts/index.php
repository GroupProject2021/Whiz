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
                        <h1>Job Vacancy post</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php flash('post_message'); ?>

                        <a href="<?php echo URLROOT; ?>/Posts_C_O_JobAds/add"><button class="btn3">CREATE JOB ADVERTISEMENT</button></a>
                        <br><br><br>

                    <div class="card-flex-box">
                    
                    <!-- JOB POST -->
                   <?php foreach($data['posts'] as $post): ?>
                    <?php $exp_date = date('Y-m-d', strtotime($post->paid_date. ' + 1 months')) ?>
                    <?php if($post->type == "jobpost" ): ?>
                        <a href="<?php echo URLROOT; ?>/Posts_C_O_JobAds/show/<?php echo $post->post_id; ?>" class="card-link">
                        <div class="coursepost">
                            <?php if($post->image != null):?>
                            <div class="pic">
                                <img src="<?php echo URLROOT.'/imgs/posts/jobads/'.$post->image; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="coursepost-body">
                                <div class="user-pic">
                                    <img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt="">
                                </div>
                                <div class="postedat">
                                    <?php if(date("Y-m-d") > $exp_date){ echo "<font color=red>(Expired)</font>";} ?>
                                    Posted At: <?php echo convertedToReadableTimeFormat($post->postCreated); ?>
                                </div>
                                <div class="title"><?php echo $post->jobName; ?></div>
                                <div class="postedby"><?php echo $post->first_name.' '.$post->last_name; ?></div>
                            </div>
                            <div class="coursepost-stats">
                                <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                <div class="ups-count"><?php echo $post->ups; ?></div>
                                <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                <div class="downs-count"><?php echo $post->downs; ?></div>
                                <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                <div class="comments-count"><?php echo $post->comment_count; ?></div>
                                <div class="rate"><?php echo countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5); ?></div>
                                <?php 
                                    $rate = countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5);

                                    for($i=0; $i <ceil($rate); $i++) {
                                        echo '<div class="rate-star active"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                    }

                                    for($i=0; $i <5 - ceil($rate); $i++) {
                                        echo '<div class="rate-star"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                    }
                                    
                                    ?>
                                <div class="reviews">REVIEWS (<?php echo $post->review_count; ?>)</div>
                            </div>          
                        </div>
                        </a>
                        <br>
                        <br>
                    <?php endif; ?>
                    <?php endforeach; ?>

                    </div>

                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>