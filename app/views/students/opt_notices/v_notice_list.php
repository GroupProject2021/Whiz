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
                        <h1>Notices</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                    <div class="card-flex-box">
                    
                    <!-- NOTICE POST -->
                   <?php foreach($data['posts'] as $post): ?>
                    <?php $exp_date = date('Y-m-d', strtotime($post->paid_date. ' + 1 months')) ?>
                    <?php if($post->type == "noticepost" ): ?>
                        <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Notices/show/<?php echo $post->post_id; ?>" class="card-link">
                        <div class="coursepost">
                            <?php if($post->image != null):?>
                            <div class="pic">
                                <img src="<?php echo URLROOT.'/imgs/posts/notices/'.$post->image; ?>" alt="">
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
                                <div class="title"><?php echo $post->noticeName; ?></div>
                                <div class="postedby"><?php echo $post->first_name.' '.$post->last_name; ?></div>
                            </div>
                            <div class="coursepost-stats">
                                <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                <div class="ups-count"><?php echo $post->ups; ?></div>
                                <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                <div class="downs-count"><?php echo $post->downs; ?></div>
                                <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                <div class="comments-count"><?php echo $post->comment_count; ?></div>
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