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