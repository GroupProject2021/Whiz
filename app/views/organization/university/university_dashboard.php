<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
                        <h1>University dashboard</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single-new">
                        <!-- Course posts -->
                        <?php if(empty($data['courses_amount'])):?>
                            <!-- empty - show idle -->
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/pro-guider-dashboard.jpg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Courses</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> dummy </li>
                                            <li><span class="dashboard-red-bullet">*</span> dummy </li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/C_S_Stu_To_ProfessionalGuider/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                </div>
                            </div>
                        <?php else: ?>      
                            <div class="dashboard-content-title">Courses</div>
                            <div class="dashboard-content-container">
                            <?php foreach($data['course_posts'] as $coursePost): ?>
                                <?php if($coursePost->private_uni_id == $_SESSION['user_id']): ?>
                                    <?php if($coursePost->type == "coursepost"): ?>
                                        <a href="<?php echo URLROOT; ?>/Posts_C_O_CoursePosts/show/<?php echo $coursePost->post_id; ?>" class="card-link">
                                            <div class="dashboard-analytics-container">
                                                <div class="left">
                                                    <?php if($coursePost->image != null):?>
                                                    <div class="pic">
                                                        <img src="<?php echo URLROOT.'/imgs/posts/courseposts/'.$coursePost->image; ?>" alt="">
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="right">
                                                    <div class="title"><?php echo $coursePost->courseName; ?></div>
                                                    <div class="coursepost-stats">
                                                        <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                                        <div class="ups-count"><?php echo $coursePost->ups; ?></div>
                                                        <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                                        <div class="downs-count"><?php echo $coursePost->downs; ?></div>
                                                        <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                                        <div class="comments-count"><?php echo $coursePost->comment_count; ?></div>
                                                        <div class="rate"><?php echo countRate($coursePost->review_count, $coursePost->rate1, $coursePost->rate2, $coursePost->rate3, $coursePost->rate4, $coursePost->rate5); ?></div>
                                                        <?php 
                                                            $rate = countRate($coursePost->review_count, $coursePost->rate1, $coursePost->rate2, $coursePost->rate3, $coursePost->rate4, $coursePost->rate5);

                                                            for($i=0; $i <ceil($rate); $i++) {
                                                                echo '<div class="rate-star active"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                            }

                                                            for($i=0; $i <5 - ceil($rate); $i++) {
                                                                echo '<div class="rate-star"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                            }
                                                            
                                                            ?>
                                                        <div class="reviews">REVIEWS (<?php echo $coursePost->review_count; ?>)</div>
                                                    </div>         
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Intake notices -->
                        <?php if(empty($data['intake_notices_amount'])):?>
                            <!-- empty - show idle -->
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/pro-guider-dashboard.jpg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Intake notices</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> dummy </li>
                                            <li><span class="dashboard-red-bullet">*</span> dummy </li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/C_S_Stu_To_ProfessionalGuider/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                </div>
                            </div>
                        <?php else: ?>  
                            <div class="dashboard-content-title">Intake notices</div>    
                            <div class="dashboard-content-container">
                            <?php foreach($data['intake_notices'] as $intakeNotice): ?>
                                <?php if($intakeNotice->private_uni_id == $_SESSION['user_id']): ?>
                                    <?php if($intakeNotice->type == "noticepost"): ?>
                                        <a href="<?php echo URLROOT; ?>/Posts_C_O_IntakeNotices/show/<?php echo $intakeNotice->post_id; ?>" class="card-link">
                                            <div class="dashboard-analytics-container">
                                                <div class="left">
                                                    <?php if($intakeNotice->image != null):?>
                                                    <div class="pic">
                                                        <img src="<?php echo URLROOT.'/imgs/posts/notices/'.$intakeNotice->image; ?>" alt="">
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="right">
                                                    <div class="title"><?php echo $intakeNotice->noticeName; ?></div>
                                                    <div class="coursepost-stats">
                                                        <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                                        <div class="ups-count"><?php echo $intakeNotice->ups; ?></div>
                                                        <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                                        <div class="downs-count"><?php echo $intakeNotice->downs; ?></div>
                                                        <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                                        <div class="comments-count"><?php echo $intakeNotice->comment_count; ?></div>
                                                        <div class="rate"><?php echo countRate($intakeNotice->review_count, $intakeNotice->rate1, $intakeNotice->rate2, $intakeNotice->rate3, $intakeNotice->rate4, $intakeNotice->rate5); ?></div>
                                                        <?php 
                                                            $rate = countRate($intakeNotice->review_count, $intakeNotice->rate1, $intakeNotice->rate2, $intakeNotice->rate3, $intakeNotice->rate4, $intakeNotice->rate5);

                                                            for($i=0; $i <ceil($rate); $i++) {
                                                                echo '<div class="rate-star active"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                            }

                                                            for($i=0; $i <5 - ceil($rate); $i++) {
                                                                echo '<div class="rate-star"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                            }
                                                            
                                                            ?>
                                                        <div class="reviews">REVIEWS (<?php echo $intakeNotice->review_count; ?>)</div>
                                                    </div>         
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>