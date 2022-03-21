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
                        <h1>Admin dashboard</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <!-- user details -->
                        <div class="user-amount-container">
                            <div class="title">
                                <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/Users" class="post-link">
                                Users <span class="gray-text">[Total - <?php echo $data['total_user_amount']; ?>]</span>
                                </a>
                            </div>
                            <div class="content">
                                <div class="item">
                                    <div class="sub-title type1"><a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaActorTypes/Student" class="post-link">Students</a></div>
                                    <div class="sub-content">
                                        <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaSpecializedActorTypes/Beginner" class="card-link">
                                        <div class="single-item">
                                            <div class="left">Beginners</div>
                                            <div class="right"><?php echo $data['beginner_amount'];?></div>
                                        </div>
                                        </a>
                                        <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaSpecializedActorTypes/OL" class="card-link">
                                        <div class="single-item">
                                            <div class="left">O/L Qualified</div>
                                            <div class="right"><?php echo $data['ol_qualifed_amount'];?></div>
                                        </div>
                                        </a>
                                        <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaSpecializedActorTypes/AL" class="card-link">
                                        <div class="single-item">
                                            <div class="left">A/L Qualified</div>
                                            <div class="right"><?php echo $data['al_qualifed_amount'];?></div>
                                        </div>
                                        </a>
                                        <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaSpecializedActorTypes/UG" class="card-link">
                                        <div class="single-item">
                                            <div class="left">Undergrad/ Grads</div>
                                            <div class="right"><?php echo $data['undergrad_grad_amount'];?></div>
                                        </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="sub-title type2"><a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaActorTypes/Organization" class="post-link">Organizations</a></div>
                                    <div class="sub-content">
                                        <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaSpecializedActorTypes/University" class="card-link">
                                        <div class="single-item">
                                            <div class="left">Universities</div>
                                            <div class="right"><?php echo $data['university_amount'];?></div>
                                        </div>
                                        </a>
                                        <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaSpecializedActorTypes/Company" class="card-link">
                                        <div class="single-item">
                                            <div class="left">Companies</div>
                                            <div class="right"><?php echo $data['company_amount'];?></div>
                                        </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="sub-title type3"><a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaActorTypes/Mentor" class="post-link">Mentors</a></div>
                                    <div class="sub-content">
                                        <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaSpecializedActorTypes/ProGuider" class="card-link">
                                        <div class="single-item">
                                            <div class="left">Professional guiders</div>
                                            <div class="right"><?php echo $data['pro_guider_amount'];?></div>
                                        </div>
                                        </a>
                                        <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/UsersViaSpecializedActorTypes/Teacher" class="card-link">
                                        <div class="single-item">
                                            <div class="left">Teachers</div>
                                            <div class="right"><?php echo $data['teacher_amount'];?></div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <br>

                        <!-- post details -->
                        <div class="post-amount-container">
                            <div class="title"><a href="<?php echo URLROOT; ?>/C_A_Admin_Dashboard/PostsRevenues" class="post-link">Posts <span class="gray-text">[Total - <?php echo $data['total_post_amount']; ?>]</a></div>
                            <div class="content">
                                <div class="item">
                                    <div class="sub-title type1">Course posts</div>
                                    <div class="sub-content">                                        
                                        <div class="revenue">
                                            None
                                        </div>
                                        <div class="name">Revenue</div>
                                        <div class="amount"><?php echo $data['course_post_amount']; ?></div>
                                        <div class="name">Total</div>
                                        <div class="ratio">
                                            <div class="prg-bar type1">
                                                <progress value="<?php echo $data['course_post_amount']; ?>" max="<?php echo $data['total_post_amount']; ?>"></progress>
                                            </div>
                                            <div class="rate"><?php echo getPercentageRounded($data['course_post_amount'], $data['total_post_amount'], 1); ?>%</div>
                                        </div>
                                    </div>
                                </div>

                                <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/PostsRevenuesViaPostTypes/noticepost" class="card-link">
                                <div class="item">
                                    <div class="sub-title type2">Intake notices</div>
                                    <div class="sub-content">
                                        <div class="revenue">
                                            Rs.<?php echo $data['intake_notice_revenue'] ?>
                                        </div>
                                        <div class="name">Revenue</div>
                                        <div class="amount"><?php echo $data['intake_notice_amount']; ?></div>
                                        <div class="name">Total</div>
                                        <div class="ratio">
                                            <div class="prg-bar type2">
                                                <progress value="<?php echo $data['intake_notice_amount']; ?>" max="<?php echo $data['total_post_amount']; ?>"></progress>
                                            </div>
                                            <div class="rate"><?php echo getPercentageRounded($data['intake_notice_amount'], $data['total_post_amount'], 1); ?>%</div>
                                        </div>
                                    </div>
                                </div>
                                </a>

                                <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/PostsRevenuesViaPostTypes/jobpost" class="card-link">
                                <div class="item">
                                    <div class="sub-title type3">Job advertisements</div>
                                    <div class="sub-content">
                                        <div class="revenue">
                                            Rs.<?php echo $data['job_ads_revenue'] ?>
                                        </div>
                                        <div class="name">Revenue</div>
                                        <div class="amount"><?php echo $data['job_ads_amount']; ?></div>
                                        <div class="name">Total</div>
                                        <div class="ratio">
                                            <div class="prg-bar type3">
                                                <progress value="<?php echo $data['job_ads_amount']; ?>" max="<?php echo $data['total_post_amount']; ?>"></progress>
                                            </div>
                                            <div class="rate"><?php echo getPercentageRounded($data['job_ads_amount'], $data['total_post_amount'], 1); ?>%</div>
                                        </div>
                                    </div>
                                </div>
                                </a>

                                <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/PostsRevenuesViaPostTypes/banner" class="card-link">
                                <div class="item">
                                    <div class="sub-title type4">Banners</div>
                                    <div class="sub-content">
                                        <div class="revenue">
                                            Rs.<?php echo $data['banner_revenue'] ?>
                                        </div>
                                        <div class="name">Revenue</div>
                                        <div class="amount"><?php echo $data['banner_amount']; ?></div>
                                        <div class="name">Total</div>
                                        <div class="ratio">
                                            <div class="prg-bar type4">
                                                <progress value="<?php echo $data['banner_amount']; ?>" max="<?php echo $data['total_post_amount']; ?>"></progress>
                                            </div>
                                            <div class="rate"><?php echo getPercentageRounded($data['banner_amount'], $data['total_post_amount'], 1); ?>%</div>
                                        </div>
                                    </div>
                                </div>
                                </a>

                                <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/PostsRevenuesViaPostTypes/poster" class="card-link">
                                <div class="item">
                                    <div class="sub-title type5">Posters</div>
                                    <div class="sub-content">
                                        <div class="revenue">
                                            Rs.<?php echo $data['poster_revenue'] ?>
                                        </div>
                                        <div class="name">Revenue</div>
                                        <div class="amount"><?php echo $data['poster_amount']; ?></div>
                                        <div class="name">Total</div>
                                        <div class="ratio">
                                            <div class="prg-bar type5">
                                                <progress value="<?php echo $data['poster_amount']; ?>" max="<?php echo $data['total_post_amount']; ?>"></progress>
                                            </div>
                                            <div class="rate"><?php echo getPercentageRounded($data['poster_amount'], $data['total_post_amount'], 1); ?>%</div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="footer-content">
                                <div class="title">Total revenue: </div>
                                <div class="amount">Rs.<?php echo $data['intake_notice_revenue'] + 
                                                                  $data['job_ads_revenue'] +
                                                                  $data['banner_revenue'] +
                                                                  $data['poster_revenue']; ?>.00</div>
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

        
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>