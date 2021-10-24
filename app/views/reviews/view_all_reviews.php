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
                        <h1>Reviews</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <!-- BACK BUTTON -->
                        <?php if($_SESSION['currect_viewing_post_type'] == 'Banner'):?>
                            <?php if($_SESSION['actor_type'] == 'Student'):?>
                                <div class="btn1"><a href="<?php echo URLROOT.'/Posts_C_M_Banners/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                            <?php elseif($_SESSION['actor_type'] == 'Mentor'): ?>
                                <div class="btn1"><a href="<?php echo URLROOT.'/C_S_Stu_To_ProfessionalGuider/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                            <?php else: ?>
                                <!-- nothing -->
                            <?php endif; ?>
                        <?php elseif($_SESSION['currect_viewing_post_type'] == 'Poster'):?>
                            <?php if($_SESSION['actor_type'] == 'Student'):?>
                                <div class="btn1"><a href="<?php echo URLROOT.'/Posts_C_M_Posters/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                            <?php elseif($_SESSION['actor_type'] == 'Mentor'): ?>
                                <div class="btn1"><a href="<?php echo URLROOT.'/C_S_Stu_To_Teacher/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                            <?php else: ?>
                                 <!-- nothing -->
                            <?php endif; ?>
                        <?php elseif($_SESSION['currect_viewing_post_type'] == 'Advertisement'):?>
                            <?php if($_SESSION['actor_type'] == 'Student'):?>
                                <div class="btn1"><a href="<?php echo URLROOT.'/Posts_C_O_Advertisement/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                            <?php elseif($_SESSION['actor_type'] == 'Organization'): ?>
                                <div class="btn1"><a href="<?php echo URLROOT.'/C_S_Stu_To_Company/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                            <?php else: ?>
                                 <!-- nothing -->
                            <?php endif; ?>
                        <?php elseif($_SESSION['currect_viewing_post_type'] == 'Course Post'):?>
                            <?php if($_SESSION['actor_type'] == 'Student'):?>
                                <div class="btn1"><a href="<?php echo URLROOT.'/Posts_C_O_CoursePosts/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                            <?php elseif($_SESSION['actor_type'] == 'Organization'): ?>
                                <div class="btn1"><a href="<?php echo URLROOT.'/C_S_Stu_To_PriUniversity/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                            <?php else: ?>
                                 <!-- nothing -->
                            <?php endif; ?>
                        <?php else: ?>
                            <!-- nothing -->
                        <?php endif;?>


                        <!-- VIEW ALL REVIEWS -->
                        <?php require APPROOT.'/views/inc/components/reviewSystem/viewAllReviews.php'?>

                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>