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
                        <h1>Course + University</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <a href="<?php echo URLROOT.'/C_A_Government_University/addCourseUniversity'; ?>" class="btn1-small form-link">Add course + university</a>
                    
                        <br>

                        <table>
                        <?php foreach($data['courses_university_list'] as $course_uni): ?>
                            <tr>
                                <td><?php echo $course_uni->id; ?></td>
                                <td><?php echo $course_uni->gov_course_name; ?></td>
                                <td><?php echo $course_uni->uni_name; ?></td>
                                <td><?php echo $course_uni->unicode; ?></td>
                                <td><?php echo $course_uni->purposed_intake; ?></td>
                                <td><?php echo $course_uni->duration; ?></td>
                                <td><?php echo $course_uni->description; ?></td>
                                <td><a href="<?php echo URLROOT.'/C_A_Government_University/editCourseUniversity/'.$course_uni->id; ?>">Edit</a></td>
                                <td><a href="<?php //echo URLROOT.'/C_A_Government_University/deleteCourseUniversity/'.$course_uni->id; ?>">Delete</a></td>
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

        
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>