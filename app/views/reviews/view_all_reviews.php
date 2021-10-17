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
                        <h1>Stream seleciton</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <!-- BACK BUTTON -->
                        <?php if($_SESSION['currect_viewing_post_type'] == 'Banner'):?>
                            <div class="btn1"><a href="<?php echo URLROOT.'/Posts_C_M_Banners/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                        <?php elseif($_SESSION['currect_viewing_post_type'] == 'Poster'):?>
                            <div class="btn1"><a href="<?php echo URLROOT.'/Posts_C_M_Posters/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                        <?php elseif($_SESSION['currect_viewing_post_type'] == 'Advertisement'):?>
                            <div class="btn1"><a href="<?php echo URLROOT.'/Posts_C_O_Advertisement/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
                        <?php elseif($_SESSION['currect_viewing_post_type'] == 'Course Post'):?>
                            <div class="btn1"><a href="<?php echo URLROOT.'/Posts_C_O_CoursePosts/show/'.$_SESSION['current_viewing_post_id'];?>" class="card-link">Back</a></div>
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