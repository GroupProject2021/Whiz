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
                        <h1>Enrolment List > <?php echo $data['title'];?></h1>
                    </div>
                    <!-- <br> -->
                    <div class="button-panel">
                            <a href="<?php echo URLROOT;?>/C_M_Enrolment_List/index"><button class="btn8 post-back">Back</button></a>
                            <!-- <a href="<?php echo URLROOT;?>/C_M_Enrolment_List/addlink"><button class="btn1 post-back">Upload Link</button></a> -->
                            <!-- <a href="<?php echo URLROOT.'/C_M_Enrolment_List/addlink/'.$_SESSION['current_viewing_post_id']; ?>" button class="btn1 post-back">Link</a> -->

                            <!-- wip -->
                            <?php if($data['link'] != Null):?>
                                <a href="<?php echo URLROOT.'/C_M_Enrolment_List/viewlink/'.$_SESSION['current_viewing_post_id']; ?>"><input class="btn1 post-back" type="button" value="View Link"></a>
                                  
                            <?php else: ?>
                                <a href="<?php echo URLROOT.'/C_M_Enrolment_List/addlink/'.$_SESSION['current_viewing_post_id']; ?>"><input class="btn1 post-back" type="button" value="Add Link"></a>

                            <?php endif; ?>
                            <!-- wip -->
                        
                    </div>
                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                    <?php flash('post_message'); ?>
                       
                        <div>
                        <table class="gov-course-table">
                            <tr>
                                <th>    </th>
                                <th>Student Name</th>
                                <th>Student Type</th>
                                <!-- <th colspan="2">Offered university</th> -->
                                <th colspan="2">Enrolled at</th>
                                <!-- <th>Intake</th> -->
                                <th></th>
                            </tr>
                            <tr><td colspan="4"><hr></td></tr>
                            
                            <?php foreach($data['enrollments'] as $studentList): ?>
                                
                                <tr>
                                    <td class="gov-course-uniicon"><img src="<?php echo URLROOT.'/profileimages/student/'.$studentList->profile_image; ?>" alt=""></td>
                                    <td class="gov-course-name"><?php echo $studentList->first_name.' '.$studentList->last_name; ?></td>
                                    <td class="gov-course-name"><?php echo $studentList->specialized_actor_type; ?></td>
                                    <td class="gov-course-intake"><?php echo $studentList->applied_date; ?></td>
                                </tr>
                                <tr><td colspan="4"><hr></td></tr>
                                
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