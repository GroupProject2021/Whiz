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
                        <h1>Admissible government university courses</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                    
                    <div>
                                <table class="gov-course-table">
                                    <tr>
                                        <th>No.</th>
                                        <th>Government course name</th>
                                        <th></th>
                                    </tr>
                                    <?php foreach($data['courses'] as $govCourse): ?>
                                    <tr>
                                        <td class="gov-course-index"><?php echo $govCourse->gov_course_id; ?></td>
                                        <td class="gov-course-name"><?php echo $govCourse->gov_course_name; ?></td>
                                        <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_S_Course/govCourseExplore/'.$govCourse->gov_course_id;?>"><button class="btn3">EXPLORE</button></a></td>
                                    </tr>
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