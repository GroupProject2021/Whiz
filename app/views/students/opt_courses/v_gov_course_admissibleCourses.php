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
                            <a href="<?php echo URLROOT.'/C_S_Course/getAdmissibleGovCourseList/'.$_SESSION['user_id']; ?>">My courses</a>
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div>
                            <a href="<?php echo URLROOT.'/C_S_Course/getRecommendedGovCourseList/'.$_SESSION['user_id']; ?>"><button class="btn3">Recommend Government courses</button></a>
                        </div>
                        <br>

                        <table>
                            <tr>
                                <th>Unicode</th>
                                <th>Course name</th>
                                <th>University</th>
                                <th>Z-Score</th>
                            </tr>
                        <?php foreach($data['admissible_courses'] as $course):?>
                            <tr>
                                <td><?php echo $course->unicode; ?></td>
                                <td><?php echo $course->gov_course_name; ?></td>
                                <td><?php echo $course->uni_name; ?></td>
                                <td><?php echo $course->z_score; ?></td>
                            </tr>
                        <?php endforeach; ?>    
                        </table>                
                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>