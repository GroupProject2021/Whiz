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
                        <h1>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/index">courses</a>
                            >
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govCourseList">Government</a>
                            >
                            <a href="<?php echo URLROOT; ?>/C_S_Course/getRecommendedGovCourseList">Recommendation</a>
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="under-construction">
                            <div class="img">
                                <img src="<?php echo URLROOT; ?>/imgs/under-construction.png" height="200px" alt="logo">
                            </div>
                            <div class="title">Government courses Recommendation</div>
                            <div class="text">
                            THIS PAGE IS CURRENTLY UNDER CONSTRUCTION !
                            </div>
                        </div>
                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>