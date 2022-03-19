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
                        <h1>Company dashboard</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <!-- <div class="middle-left-panel"> -->
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/job-dashboard.jpg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Vaccancies</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> By choosing Job Advertisements option, you will have the opportunity to post an ad for a month by doing payment about vacancies you have.</li>
                                            <li><span class="dashboard-red-bullet">*</span> Undergraduates and Graduates Students will see your ads through these published job vacancies.</li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/Posts_C_O_JobAds/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                </div>
                            </div>
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/cv.jpeg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Recieved CVs</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> This option will show you the CV list of who have applied for your vacancies.</li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/C_O_C_Cvs/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
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