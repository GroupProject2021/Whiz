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
                        <h1>Add Courses and University</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <form action="<?php echo URLROOT; ?>/C_A_Government_University/addCourseUniversity" method="post">
                            <table>
                                <tr>
                                    <td>Course</td>
                                    <td>
                                        <select name="courses" id="courses" class="form-select">
                                            <?php foreach($data['courses_list'] as $course):?>                                                
                                                <option value="<?php echo $course->gov_course_id; ?>"><?php echo $course->gov_course_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>   
                                <tr>
                                    <td>University</td>
                                    <td>
                                        <select name="universities" id="universities" class="form-select">
                                            <?php foreach($data['universities_list'] as $university):?>
                                                <option value="<?php echo $university->gov_uni_id; ?>"><?php echo $university->uni_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>     
                                <tr>
                                    <td>Uni Code</td>
                                    <td>
                                        <input type="text" name="unicode" id="unicode" value="<?php echo $data['unicode']; ?>">
                                    </td>
                                </tr>        
                                <tr>
                                    <td>Purposed intake</td>
                                    <td>
                                        <input type="text" name="purposed_intake" id="purposed_intake" value="<?php echo $data['purposed_intake']; ?>">
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Duration</td>
                                    <td>
                                        <input type="text" name="duration" id="duration" value="<?php echo $data['duration']; ?>">
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Description</td>
                                    <td>
                                        <input type="text" name="description" id="description" value="<?php echo $data['description']; ?>">
                                    </td>
                                </tr>                    
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="form-next-button">Add</button>
                                    </td>
                                </tr>        
                            </table>                            
                        </form>
                        <span class="form-invalid"><?php echo $data['unicode_err']; ?></span><br>
                        <span class="form-invalid"><?php echo $data['purposed_intake_err']; ?></span><br>
                        <span class="form-invalid"><?php echo $data['duration_err']; ?></span><br>
                        <span class="form-invalid"><?php echo $data['description_err']; ?></span><br>
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