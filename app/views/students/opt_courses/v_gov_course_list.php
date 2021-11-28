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
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govCourseList"><button class="btn3">Government courses</button></a>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govUniversityList"><button class="btn1">Show Government University list</button></a>
                        </div>
                        <br>
                        <div>
                            
                            <?php if($_SESSION['specialized_actor_type'] == 'AL qualified'): ?>
                                <a href="<?php echo URLROOT.'/C_S_Course/getAdmissibleGovCourseList/'.$_SESSION['user_id']; ?>"><button class="btn2">Show my Government courses</button></a>
                            <?php else: ?>
                                <a href="" onclick="alert('Upgrade to AL Qualified to unlock this feature')"><button class="btn2 disabled">Show my Government courses</button></a>
                            <?php endif; ?>                        
                        </div>
                        <br>
                        <div>
                                <table class="gov-course-table">
                                    <tr>
                                        <th>No.</th>
                                        <th>Government course name</th>
                                        <th></th>
                                    </tr>
                                    <tr><td colspan="7"><hr></td></tr>
                                    <?php foreach($data['courses'] as $govCourse): ?>
                                    <tr>
                                        <td class="gov-course-index"><?php echo $govCourse->gov_course_id; ?></td>
                                        <td class="gov-course-name"><?php echo $govCourse->gov_course_name; ?></td>
                                        <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_S_Course/govCourseViewMore/'.$govCourse->gov_course_id;?>"><button class="btn3">View more</button></a></td>
                                    </tr>
                                    <tr><td colspan="7"><hr></td></tr>
                                    <?php endforeach; ?>
                                </table>
                            <hr>
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