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
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govUniversityList">University List</a>
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govCourseList"><button class="btn3">Government courses</button></a>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govUniversityList"><button class="btn1">Government Universities</button></a>
                        </div>
                        <br>
                        <div>
                                <table class="gov-course-table">
                                    <tr>
                                        <th>No.</th>
                                        <th>Logo</th>
                                        <th>Government University name</th>
                                        <th></th>
                                    </tr>
                                    <tr><td colspan="7"><hr></td></tr>
                                    <?php foreach($data['universities'] as $govUniversity): ?>
                                    <tr>
                                        <td class="gov-course-index"><?php echo $govUniversity->gov_uni_id; ?></td>
                                        <td class="gov-course-uniicon"><img src="<?php echo URLROOT.'/profileimages/admin/governmentUniversity/logo/'.$govUniversity->logo?>" alt=""></td>
                                        <td class="gov-course-name"><?php echo $govUniversity->uni_name; ?></td> 
                                        <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_A_Government_University_Settings/settings/'.$govUniversity->gov_uni_id;?>"><button class="btn3">View more</button></a></td>
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