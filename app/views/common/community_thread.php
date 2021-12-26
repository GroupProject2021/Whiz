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
                            <a href="<?php echo URLROOT; ?>/C_S_Course/index">Community</a>
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <a href=""><button class="btn1">Create Thread</button></a>
                        <div>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govCourseList"><button class="btn3">My threads</button></a>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govUniversityList"><button class="btn1">All threads</button></a>
                        </div>

                        <br>

                        
                        <div class="thread">
                            <div class="thread-details">
                                        <div class="profpic"><a class="post-link" href=""><img src="<?php echo URLROOT.'/imgs/prof.jpg';?>" alt=""></a></div>
                                        <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/prof.jpg';?>" alt=""></div>
                                        <div class="postedby"><a class="post-link" href="">Dhanushka sandakelum</a></div>
                                        <?php //if($data['user']->status == 'verified'): ?>
                                        <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                        <?php //endif; ?>
                                        <?php //if($data['post']->user_id == $_SESSION['user_id']): ?>    
                                            <div class="post-control-buttons">                                        
                                                <a href="">
                                                    <button class="post-header-editbtn">Edit</button>
                                                </a>
                                                <form action="" method="post">
                                                    <input type="submit" value="Delete" class="post-header-deletebtn">
                                                </form>
                                            </div>
                                        <?php //endif; ?>
                                        <div class="postedat">Just now</div>
                            </div>
                            <a href="" class="card-link">
                            <div class="thread-header">I have this following question</div>
                            <div class="thread-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi voluptatibus beatae as
                                pernatur officia? Nemo animi corporis est rerum accusamus sequi do
                                loremque. Est enim, perspiciatis molestiae ipsa aspernatur similique sequi iure?
                            </div>
                            <div class="thread-footer">
                                <div class="views">
                                    <img src="<?php echo URLROOT.'/imgs/view-icon.png'?>" alt="">
                                </div>
                                <div class="views-amount">10000 Views</div>
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