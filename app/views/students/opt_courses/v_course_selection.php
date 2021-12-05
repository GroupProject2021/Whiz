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
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <div class="course-card-panel">
                            <!-- goverment course card -->
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govCourseList">
                            <div class="course-card">
                                <div class="course-card-image">
                                    <img src="<?php echo URLROOT.'/imgs/pages/coursePage/gov_course_wall.png'; ?>" alt="">
                                </div>
                                <div class="course-card-content">
                                    <div class="course-card-title">Government Courses</div>
                                    <div class="course-card-description">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt debitis natu
                                        s nam est doloribus fuga atque ipsa ea accusamus autem quam possimus cumque, vo
                                        luptatibus eaque pariatur, aspernatur veritatis officia reiciendis?
                                    </div>
                                </div>
                            </div>
                            </a>

                            <!-- private course card -->
                            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_PriUniversity/index">
                            <div class="course-card">
                                <div class="course-card-image">
                                    <img src="<?php echo URLROOT.'/imgs/pages/coursePage/pri_course_wall.jpg'; ?>" alt="">
                                </div>
                                <div class="course-card-content">
                                    <div class="course-card-title">Private Courses</div>
                                    <div class="course-card-description">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt debitis natu
                                        s nam est doloribus fuga atque ipsa ea accusamus autem quam possimus cumque, vo
                                        luptatibus eaque pariatur, aspernatur veritatis officia reiciendis?
                                    </div>
                                </div>
                            </div>
                            </a>
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