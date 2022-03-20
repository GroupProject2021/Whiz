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
                        <h1>AL Qualified dashboard</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel">
                        <div class="middle-left-panel">      
                            <div class="dashboard-title">My Enrollments</div>

                            <!-- Professional guider enrollments -->
                         <?php if(empty($data['prof_guider_enrollments'])):?>
                                <!-- empty - show idle -->
                                <div class="dashboard-content-idle-container proGuider">
                                    <div class="left">
                                        <div class="image">
                                            <img src="<?php echo URLROOT.'/imgs/dashboard/pro-guider-dashboard.jpg'; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="title">Professinal guiders</div>
                                        <div class="body">
                                            <ul>
                                                <li><span class="dashboard-red-bullet">*</span> By choosing Professional Guiders option, you can enroll with there sessions,comment and review guider sessions.</li>
                                                <li><span class="dashboard-red-bullet">*</span> This is a good opportunity to prepare yourself before going to some academic or inductrial level.</li>
                                            </ul>
                                        </div>
                                        <a href="<?php echo URLROOT;?>/C_S_Stu_To_ProfessionalGuider/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                    </div>
                                </div>
                            <?php else: ?>      
                            <div class="dashboard-content-title">Professional guiders</div>
                              <div class="dashboard-content-container">
                                <?php foreach($data['prof_guider_enrollments'] as $prof_enroll): ?>
                                <a href="<?php echo URLROOT; ?>/C_S_Stu_To_ProfessionalGuider/show/<?php echo $prof_enroll->post_id; ?>" class="card-link">
                                <div class="enrollment-container">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/posts/banners/'.$prof_enroll->image; ?>" alt="">
                                    </div>
                                    <div class="right">
                                        <div class="up">
                                            <div class="title"><?php echo $prof_enroll->title; ?></div>
                                            <div class="applied-date"><?php echo convertedToReadableTimeFormat($prof_enroll->applied_date); ?></div>
                                        </div>
                                        <div class="down">
                                            <div class="capacity bar-prof-guider">
                                                <progress max="100" value="<?php if($prof_enroll->capacity != 0){ echo ($prof_enroll->applied / $prof_enroll->capacity) * 100;} else {echo 0;} ?>" id="prgBar"></progress>
                                            </div>
                                            <div class="capacity-text">
                                                Applied: <?php echo $prof_enroll->applied; ?>/ <?php echo $prof_enroll->capacity; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                <?php endforeach; ?>
                              </div>
                            <?php endif; ?>

                            <?php if(empty($data['teacher_enrollments'])):?>
                                <!-- empty - show idle -->
                                <div class="dashboard-content-idle-container teacher">
                                    <div class="left">
                                        <div class="image">
                                            <img src="<?php echo URLROOT.'/imgs/dashboard/teacher-dashboard.jpg'; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="title">Teachers</div>
                                        <div class="body">
                                            <ul>
                                                <li><span class="dashboard-red-bullet">*</span> You can view posters published by teachers who conduct pre-university classes.</li>
                                                <li><span class="dashboard-red-bullet">*</span> Enroll,comment and review options are available in here as well.</li>
                                            </ul>
                                        </div>
                                        <a href="<?php echo URLROOT;?>/C_S_Stu_To_Teacher/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                    </div>
                                </div>
                            <?php else: ?>   
                            <!-- Teacher enrollments -->
                            <div class="dashboard-content-title">Teachers</div>
                              <div class="dashboard-content-container">
                                <?php foreach($data['teacher_enrollments'] as $teacher_enroll): ?>
                                <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Teacher/show/<?php echo $teacher_enroll->post_id; ?>" class="card-link">
                                <div class="enrollment-container">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/posts/posters/'.$teacher_enroll->image; ?>" alt="">
                                    </div>
                                    <div class="right">
                                        <div class="up">
                                            <div class="title"><?php echo $teacher_enroll->title; ?></div>
                                            <div class="applied-date"><?php echo convertedToReadableTimeFormat($teacher_enroll->applied_date); ?></div>
                                        </div>
                                        <div class="down">
                                            <div class="capacity bar-teacher">
                                                <progress max="100" value="<?php if($teacher_enroll->capacity != 0){ echo ($teacher_enroll->applied / $teacher_enroll->capacity) * 100;} else {echo 0;} ?>" id="prgBar"></progress>
                                            </div>
                                            <div class="capacity-text">
                                                Applied: <?php echo $teacher_enroll->applied; ?>/ <?php echo $teacher_enroll->capacity; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                <?php endforeach; ?>
                              </div>
                            <?php endif; ?>

                        </div> 

                        <div class="middle-right-panel">
                            <!-- Notices -->
                            <div class="notices">
                                <h2><a href="<?php echo URLROOT; ?>/C_S_Stu_To_Notices/index" class="post-link">Notices</a></h2>
                                <hr>

                                <div class="slideshow-container">
                                    <?php $total = count($data['notices']); $current = 1; ?>
                                    <?php foreach($data['notices'] as $notice):?>
                                        <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Notices/show/<?php echo $notice->post_id; ?>" class="card-link">
                                        <div class="mySlides fade">
                                            <div class="numbertext"><?php echo $current; ?> / <?php echo $total; ?></div>
                                            <img src="<?php echo URLROOT.'/imgs/posts/notices/'.$notice->image; ?>" style="width:100%">
                                            <div class="text"><?php echo $notice->noticeName; ?></div>

                                            <!-- increment -->
                                            <?php $current = $current + 1; ?>
                                        </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                                <br>
                                <div class="slideshow-dots" style="text-align:center">
                                    <?php foreach($data['notices'] as $notice):?>
                                        <span class="dot"></span> 
                                    <?php endforeach; ?>
                                </div>
                                
                                <p>Listed notices are from your following <b>Organization | University</b> profiles</p>
                                <a href="<?php echo URLROOT.'/profileStatsAndConnections/followings/'.$_SESSION['user_id']; ?>" class="card-link"><div class="notice-btn">Follow more Organization | University</div></a>
                                
                                
                            </div>
                            <div class="updates">
                                <h2><a href="<?php echo URLROOT.'/profileStatsAndConnections/followings/'.$_SESSION['user_id']; ?>" class="post-link">Following List </a></h2>
                                <hr>
                                <div class="index-following-list">
                                <?php
                                // initial user list
                                    foreach($data['following'] as $follower) {
                                        switch($follower->actor_type) {
                                            case "Student": 
                                                echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$follower->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                                                break;

                                            case "Organization": 
                                                echo '<a href="'.URLROOT.'/C_O_Settings/settings/'.$follower->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                                                break;

                                            case "Mentor": 
                                                echo '<a href="'.URLROOT.'/C_M_Settings/settings/'.$follower->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                                                break;

                                            default:
                                                // do nothing
                                        }
                                        
                                        echo '<div class="index-user-block">';
                                        echo    '<div class="pic"><img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($follower->actor_type).'/'.$follower->profile_image.'" alt=""></div>';
                                        echo    '<div class="name">'.$follower->first_name.' '.$follower->last_name.'</div>';
                                        if($follower->status == 'verified'){
                                            echo    '<div class="verified"><img src="'.URLROOT.'/imgs/verified.png" alt=""></div>';
                                        }
                                        echo '</div>';
                                        echo '</a>';
                                    }
                                ?>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>

        
        <!-- Carousels -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/carousels/slideshow.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>