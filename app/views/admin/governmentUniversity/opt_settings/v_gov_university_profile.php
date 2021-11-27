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
                            >
                            view
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                                            
                    <div class="uni-profile">
                        <div class="header">
                            <div class="imagearea">
                            <form action="<?php echo URLROOT; ?>/C_O_Settings/editProfilePic" method="post" enctype="multipart/form-data">
                                <div class="wall">
                                    <img src="<?php echo URLROOT.'/profileimages/admin/governmentUniversity/bgImg/'.$data['bg_img']; ?>" alt="">
                                </div>
                                <div class="profpic">
                                <img src="<?php echo URLROOT.'/profileimages/admin/governmentUniversity/logo/'.$data['logo']; ?>" alt="" id="profile_image_placeholder">
                                    <input type="file" name="profile_image" id="profile_image" onchange="displayImage(this)" style="display: none;">
                                    <!-- profile pic edit area -->
                                    <!-- <?php if($data['user']->id == $_SESSION['user_id']): ?> -->
                                    <div class="profile-pic-edit-area">
                                        <!-- flash message -->              
                                        <!-- <?php flash('profile_image_upload'); ?> -->
                                        <div class="btn1-small" onclick="toggleBrowse(); " id="edit_profpic_click">Edit Profile Picture</div>
                                        <input type="submit" value="Save Changes" class="btn1-small" id="save_profilepic_click" style="display: none;">
                                        <div class="btn1-small" onclick="cancelProfPicChange(); " id="canceledit_profpic_click" style="display: none;">Cancel</div>
                                    </div>
                                    <!-- <?php endif; ?> -->
                                </div>
                                
                            </form>
                            </div>
                            <div class="details">
                                <div class="name">
                                    <?php echo $data['uni_name'];?>
                                    <!-- <?php if($data['user']->status == 'verified'): ?>
                                        <img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt="">
                                    <?php endif; ?> -->
                                </div>
                                
                                <hr>

                                <!-- university details -->
                                <div class="division">
                                    <div class="division-name">University details</div>
                                    <!-- <?php if($data['user']->id == $_SESSION['user_id']): ?>
                                    <div class="editable">
                                        <a href="<?php echo URLROOT; ?>/C_O_Settings/editSettingsUniversity"><button class="btn1-small">Edit</button></a>
                                    </div>
                                    <?php endif; ?> -->
                                </div>
                                <div class="beginner-detials">
                                    <div class="world_rank">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/admin/governmentUniversity/world-rank-icon.png'; ?>" alt="">World Rank</div>
                                        <div class="text"><?php echo $data['world_rank'];?></div>                                        
                                    </div>
                                    <div class="student_amount">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/admin/governmentUniversity/student-amount-icon.png'; ?>" alt="">Student Amount</div>
                                        <div class="text"><?php echo $data['student_amount'];?></div>
                                    </div>
                                    <div class="graduate_job_rate">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/admin/governmentUniversity/job-rate-icon.png'; ?>" alt="">Graduate Job Rate</div>
                                        <div class="text"><?php echo $data['graduate_job_rate'];?></div>                                        
                                    </div>
                                    <div class="description">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/admin/governmentUniversity/description-icon.png'; ?>" alt="">Description</div>
                                        <div class="text"><?php echo $data['description'];?></div>
                                    </div>
                                </div>
                                <hr>
                                <!-- art stream -->
                                <?php if($data['IsStream1Exist']): ?>
                                <div class="division">
                                    <div class="division-name">Art stream related </div>
                                </div>
                                <div class="beginner-detials-single">
                                    <?php foreach($data['course_offerings'] as $courseOffering): ?>
                                        <?php if($courseOffering->stream_id == 1): ?>
                                        <div class="courseoffering">
                                            <div class="title"><?php echo $courseOffering->unicode; ?></div>
                                            <div class="text"><?php echo $courseOffering->gov_course_name; ?></div>                                        
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <br>
                                <?php endif; ?>

                                <!-- commerce stream -->
                                <?php if($data['IsStream2Exist']): ?>
                                <div class="division">
                                    <div class="division-name">Commerce stream related </div>
                                </div>
                                <div class="beginner-detials-single">
                                    <?php foreach($data['course_offerings'] as $courseOffering): ?>
                                        <?php if($courseOffering->stream_id == 2): ?>
                                        <div class="courseoffering">
                                            <div class="title"><?php echo $courseOffering->unicode; ?></div>
                                            <div class="text"><?php echo $courseOffering->gov_course_name; ?></div>                                        
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <br>
                                <?php endif; ?>

                                <!-- Biological Science stream -->
                                <?php if($data['IsStream3Exist']): ?>
                                <div class="division">
                                    <div class="division-name">Biological Science stream related </div>
                                </div>
                                <div class="beginner-detials-single">
                                    <?php foreach($data['course_offerings'] as $courseOffering): ?>
                                        <?php if($courseOffering->stream_id == 3): ?>
                                        <div class="courseoffering">
                                            <div class="title"><?php echo $courseOffering->unicode; ?></div>
                                            <div class="text"><?php echo $courseOffering->gov_course_name; ?></div>                                        
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <br>
                                <?php endif; ?>

                                <!-- Physical Science (Maths) stream -->
                                <?php if($data['IsStream4Exist']): ?>
                                <div class="division">
                                    <div class="division-name">Physical Science (Maths) stream related </div>
                                </div>
                                <div class="beginner-detials-single">
                                    <?php foreach($data['course_offerings'] as $courseOffering): ?>
                                        <?php if($courseOffering->stream_id == 4): ?>
                                        <div class="courseoffering">
                                            <div class="title"><?php echo $courseOffering->unicode; ?></div>
                                            <div class="text"><?php echo $courseOffering->gov_course_name; ?></div>                                        
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <br>
                                <?php endif; ?>

                                <!-- Engineering Technology stream -->
                                <?php if($data['IsStream5Exist']): ?>
                                <div class="division">
                                    <div class="division-name">Engineering Technology stream related </div>
                                </div>
                                <div class="beginner-detials-single">
                                    <?php foreach($data['course_offerings'] as $courseOffering): ?>
                                        <?php if($courseOffering->stream_id == 5): ?>
                                        <div class="courseoffering">
                                            <div class="title"><?php echo $courseOffering->unicode; ?></div>
                                            <div class="text"><?php echo $courseOffering->gov_course_name; ?></div>                                        
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <br>
                                <?php endif; ?>

                                <!-- Biosystems Technology(BST) stream -->
                                <?php if($data['IsStream6Exist']): ?>
                                <div class="division">
                                    <div class="division-name">Biosystems Technology(BST) stream related </div>
                                </div>
                                <div class="beginner-detials-single">
                                    <?php foreach($data['course_offerings'] as $courseOffering): ?>
                                        <?php if($courseOffering->stream_id == 6): ?>
                                        <div class="courseoffering">
                                            <div class="title"><?php echo $courseOffering->unicode; ?></div>
                                            <div class="text"><?php echo $courseOffering->gov_course_name; ?></div>                                        
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <br>
                                <?php endif; ?>

                                <!-- Other stream -->
                                <?php if($data['IsStream7Exist']): ?>
                                <div class="division">
                                    <div class="division-name">Other stream related </div>
                                </div>
                                <div class="beginner-detials-single">
                                    <?php foreach($data['course_offerings'] as $courseOffering): ?>
                                        <?php if($courseOffering->stream_id == 7): ?>
                                        <div class="courseoffering">
                                            <div class="title"><?php echo $courseOffering->unicode; ?></div>
                                            <div class="text"><?php echo $courseOffering->gov_course_name; ?></div>                                        
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                                
                                <hr>
                         
                            </div>
                        </div>
                        <div class="body">

                        </div>

                        <div class="footer">

                        </div>
                    </div>

                    <br>

                    <div class="stu-profile-tail">
                        
                    </div>


                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        
        <!-- jquery -->        
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

        <!-- javascript profile image change -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/profilesRelated/profileImageChange.js"></script>

        <!-- common settings js -->
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';
            var USER_ID = '<?php echo $data['user']->id; ?>';
        </script>

        <!-- javascript profile follow related  -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/profilesRelated/profileStatsAndConnections.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>