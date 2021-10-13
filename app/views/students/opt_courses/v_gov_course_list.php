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
                        <h1>Government Courses</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div>
                            <a href=""><button class="btn1">Private courses</button></a>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govCourseList"><button class="btn2">Government courses</button></a>
                        </div>
                        <div>
                                <table class="gov-course-table">
                                    <tr>
                                        <th>No.</th>
                                        <th>Government course name</th>
                                        <th colspan="2">Offered university</th>
                                        <th>Duration</th>
                                        <th>Intake</th>
                                        <th></th>
                                    </tr>
                                    <tr><td colspan="7"><hr></td></tr>
                                    <?php foreach($data['courses'] as $govCourse): ?>
                                    <tr>
                                        <td class="gov-course-index"><?php echo $govCourse->gov_course_id; ?></td>
                                        <td class="gov-course-name"><?php echo $govCourse->gov_course_name; ?></td>
                                        <td class="gov-course-uniicon"><img src="<?php echo URLROOT.'/imgs/prof.jpg'?>" alt=""></td>
                                        <td class="gov-course-uniname">UCSC</td>
                                        <td class="gov-course-duration">4 Years</td>
                                        <td class="gov-course-intake">200</td>
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