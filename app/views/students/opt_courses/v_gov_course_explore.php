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
                            Explore
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <h1><?php echo $data['course_name']?></h1>

                        <p>This course offered by following universities. Click view for more detials.</p>
                        <br>

                        <table class="gov-course-table">
                            <tr>
                                <th>Unicode</th>
                                <th>Government university name</th>
                            </tr>
                        <?php foreach($data['associated_universities'] as $uni): ?>
                            <tr>
                                <td class="gov-course-index"><?php echo $uni->unicode; ?></td>
                                <td class="gov-course-name"><a class="post-link" href="<?php echo URLROOT.'/C_S_Course/govCourseViewMore/'.$uni->unicode; ?>"><?php echo $uni->uni_name; ?></a></td>
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