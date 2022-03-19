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
                    <div class="middle-panel-single">
                        <!-- <div class="middle-left-panel"> -->
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/course-dashboard.jpg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Courses</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> By choosing Courses option, you will have the opportunity to post about courses you have offered.</li>
                                            <li><span class="dashboard-red-bullet">*</span> Students will see your courses through these published courses.</li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/Posts_C_O_CoursePosts/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                </div>
                            </div>
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/notice.png'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Intake Notices</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> This option will be published details of your course intakes for a month by doing payment.</li>
                                            <li><span class="dashboard-red-bullet">*</span> Students will see your notices through these published intake notices.</li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/Posts_C_O_IntakeNotices/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
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