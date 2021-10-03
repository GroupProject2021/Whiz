<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/studentSideBar/student_sidebar.php'?>

        <div class="main-content">
            <!-- TOP Navigation -->
            <header>
                <?php require APPROOT.'/views/inc/components/topnav.php'?>
            </header>

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>professional guider list</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single middle-panel-single-3cols">

                    <a href="<?php echo URLROOT; ?>/C_S_Stu_To_ProfessionalGuider/professionalGuiderViewMore" class="card-link">  
                        <div class="pg">
                            <div class="pg-header">
                                <img src="<?php echo URLROOT.'/imgs/prof.jpg';?>" alt="">
                            </div>
                            <div class="pg-body">
                                <div class="name">Dhanushka sandakelum </div>
                                <div class="description">hi im Dhanushka. whats up everyone! im a professional guider</div>
                                <div class="stats">
                                    <div class="icon"><img src="<?php echo URLROOT.'/imgs/cardsRelatedIcons/posts-icon.png'?>" alt=""></div>
                                    <div class="posts">100 posts</div>
                                    <div class="icon"><img src="<?php echo URLROOT.'/imgs/cardsRelatedIcons/enrolment-icon.png'?>" alt=""></div>
                                    <div class="enrollments">10,625</div>
                                    <div class="icon"><img src="<?php echo URLROOT.'/imgs/cardsRelatedIcons/rate-icon.png'?>" alt=""></div>
                                    <div class="rate">4.0/5.0</div>
                                </div>                                
                            </div>
                            <div class="pg-footer">
                                <a href=""><button class="btn4">View</button></a>
                            </div>
                        </div>
                    </a>  

                        <br>

                        
                    </div>

                        <div class="banner">
                            <div class="banner-header">
                                <img src="<?php echo URLROOT.'/imgs/banner.jpg'; ?>" alt="">
                            </div>
                            <div class="banner-body">
                                <div class="title">PHP for Beginners (Banner)</div>
                                <div class="postedby">Dhanushka sandakelum</div>
                                <div class="stats">
                                    <div class="ups"><img src="<?php echo URLROOT.'/imgs/up-icon.png'; ?>" alt=""></div>
                                    <div class="ups-count">100</div>
                                    <div class="downs"><img src="<?php echo URLROOT.'/imgs/down-icon.png'; ?>" alt=""></div>
                                    <div class="downs-count">96</div>
                                    <div class="rate">3.0</div>
                                    <?php for($i=0; $i <5; $i++):?>
                                    <div class="stars"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <?php endfor;?>
                                    <div class="enrollment">(10,623)</div>
                                </div>                            
                                <div class="price">Rs. 1000.00</div>
                            </div>
                        </div>

                        <br>

                        <div class="t">
                            <div class="t-header">
                                <img src="<?php echo URLROOT.'/imgs/prof.jpg';?>" alt="">
                            </div>
                            <div class="t-body">
                                <div class="name">Dhanushka sandakelum</div>
                                <div class="description">hi im Dhanushka. whats up everyone! im a teacher</div>
                                <div class="stats">
                                    <div class="icon"><img src="<?php echo URLROOT.'/imgs/cardsRelatedIcons/posts-icon.png'?>" alt=""></div>
                                    <div class="posts">100 posts</div>
                                    <div class="icon"><img src="<?php echo URLROOT.'/imgs/cardsRelatedIcons/enrolment-icon.png'?>" alt=""></div>
                                    <div class="enrollments">10,625</div>
                                    <div class="icon"><img src="<?php echo URLROOT.'/imgs/cardsRelatedIcons/rate-icon.png'?>" alt=""></div>
                                    <div class="rate">4.0/5.0</div>
                                </div>                                
                            </div>
                            <div class="t-footer">
                                <a href=""><button class="btn3">View</button></a>
                            </div>
                        </div>

                        <br>

                        <div class="poster">
                            <div class="poster-header">
                                <img src="<?php echo URLROOT.'/imgs/banner.jpg'; ?>" alt="">
                            </div>
                            <div class="poster-body">
                                <div class="title">PHP for Beginners (poster)</div>
                                <div class="postedby">Dhanushka sandakelum</div>
                                <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. In et fuga, ullam odit quidem illo consequuntur temporibus pariatur dicta similique non eaque voluptatum velit distinctio, vitae nisi blanditiis, saepe exercitationem!</div>
                                <div class="stats">
                                    <div class="ups"><img src="<?php echo URLROOT.'/imgs/up-icon.png'; ?>" alt=""></div>
                                    <div class="ups-count">100</div>
                                    <div class="downs"><img src="<?php echo URLROOT.'/imgs/down-icon.png'; ?>" alt=""></div>
                                    <div class="downs-count">96</div>
                                    <div class="rate">3.0</div>
                                    <?php for($i=0; $i <5; $i++):?>
                                    <div class="stars"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <?php endfor;?>
                                    <div class="enrollment">(10,623)</div>
                                </div>                            
                                <div class="price">Rs. 1000.00</div>
                            </div>
                        </div>

                        <br>

                        <div class="job">
                            <div class="job-header">
                                <img src="<?php echo URLROOT.'/imgs/banner.jpg'; ?>" alt="">
                            </div>
                            <div class="job-details">
                                <div class="profpic"><img src="<?php echo URLROOT.'/imgs/prof.jpg'; ?>" alt=""></div>
                                <div class="postedby">Dhanushka sandakelum</div>
                                <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                            </div>
                            <div class="postedat">Just now</div>
                            <div class="job-body">
                                <div class="title">Data Analysist</div>
                                <div class="postedby">Requesting a experinced data analysists for XYZ company Colombo 7.</div>
                                <div class="progress">
                                    <progress class="applied-bar" value="50" max="100"></progress>
                                    <div class="text">
                                        <div class="applied">50 applied</div>
                                        <div class="capacity">of 100 capacity</div>
                                    </div>
                                </div>                            
                                <div class="price">View more</div>
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