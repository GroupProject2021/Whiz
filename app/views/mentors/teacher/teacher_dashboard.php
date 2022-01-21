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
                        <h1>Dashboard</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single-new">
                        <?php if(empty($data['details'])):?>
                            <!-- empty - show idle -->
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/poster.jpg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Posters</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> By choosing Posters option, you will have the opportunity to post an ad about the classes you are going to take.</li>
                                            <li><span class="dashboard-red-bullet">*</span> Students will enrol with your classes through these published posters.</li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/Posts_C_M_Posters/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                </div>
                            </div>
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/enrollments.jpg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Enrolment List</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> This option will show you the student list who have been enolled with your classes through the poster</li>
                                            <!-- <li><span class="dashboard-red-bullet">*</span> Students will enrol with your classes through these published posters.</li> -->
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/C_M_Enrolment_List/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                </div>
                            </div>
                        <?php else: ?>  
                            <h3><center>Upcoming Sessions</center></h3>
                            <br>
                            <br>
                            <!-- <?php print_r($data)?> -->
                            <table class="gov-course-table">
                            <?php foreach($data['details'] as $details): ?>
                                    <?php if($details->user_id == $_SESSION['user_id'] ): ?>
                                <tr>
                                    <td class="gov-course-name"><?php echo $details->title; ?></td>
                                    <td class="gov-course-name"><?php echo $details->date; ?></td>
                                    <td class="gov-course-name"><?php echo $details->time; ?></td>
                                    <td class="gov-course-viewmore"><a href="<?php echo $details->body;?>"><button class="btn3">Click here to join</button></a></td>

                                </tr>
                                    <tr><td colspan="4"><hr></td></tr>
                                    <?php else: ?>
                                        <h3><center>You have no upcoming sessions</center></h3>
                                    <?php endif; ?>
                            <?php endforeach; ?>
                            </table>
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