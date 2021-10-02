<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/studentSideBar/student_sidebar.php'?>

        <div class="main-content">
            <!-- TOP Navigation -->
            <?php require APPROOT.'/views/inc/components/topnav.php'?>

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>course selection</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div>
                            <a href="<?php echo URLROOT; ?>/Posts/index"><button class="btn1">Private courses</button></a>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govCourseList"><button class="btn2">Government courses</button></a>
                        </div>
                        <div>
                                
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