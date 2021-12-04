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
                            View
                        </h1>                            
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="upper">
                            <!-- side images -->
                            <div class="side-image">
                                <!-- <div class="logo-image">
                                    <img src="<?php echo URLROOT.'/profileimages/admin/governmentUniversity/logo/'.$data['uni_detials']->logo; ?>" alt="">
                                </div>                             -->
                                <div class="wall-image">
                                    <img src="<?php echo URLROOT.'/profileimages/admin/governmentUniversity/bgImg/'.$data['uni_detials']->bg_img; ?>" alt="">
                                </div>
                            </div>

                            <div class="details">
                                <h1><?php echo $data['gov_course']->gov_course_name; ?></h1>
                                <h4><?php echo $data['gov_course']->uni_name; ?></h4>
                                <p>Unicode: <?php echo $data['gov_course']->unicode; ?></p>
                                <br>
                                <h4>Intake</h4>
                                <div class="poles">
                                    <div class="pole-prg-bar bar1">
                                        <progress max="<?php echo $data['total_intake']; ?>" value="<?php echo $data['gov_course']->purposed_intake; ?>" id="prgBar"></progress>
                                        <div class="percentage" id="percentage"><?php if($data['gov_course']->purposed_intake != 0){ echo number_format(($data['gov_course']->purposed_intake / $data['total_intake']) *100, 1, '.', '');} else { echo 0;} ?>%</div>
                                    </div>
                                    <div class="text">
                                        <div class="applied" id="applied"><?php echo $data['gov_course']->purposed_intake; ?> Intake</div>
                                        <div class="capacity"> of <?php echo $data['total_intake']; ?> Total</div>
                                    </div>
                                </div>
                                <br>
                                <h4>Duration: <?php echo $data['gov_course']->duration; ?> Years</h4>
                            </div>
                        </div>

                        <br>
                        <h2>Description</h2>
                        <br>
                        <p><?php echo $data['gov_course']->description; ?></p>

                        
                                                              
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>