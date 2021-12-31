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
                        <h1>Job Vacancy post > Create</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <a href="<?php echo URLROOT;?>/Posts_C_O_JobAds/index"><button class="btn8">Back</button></a>
                        <br>
                    
                        <form action="<?php echo URLROOT; ?>/Posts_C_O_JobAds/add" method="post" enctype="multipart/form-data">
                            <div class="post-creator">
                                <div class="post-creator-image">
                                    <img src="" alt="" id="image_placeholder" style="display: none;">
                                </div>
                                <div class="post-creator-title">
                                    <input type="text" name="job_name" id="job_name" autocomplete="off" placeholder="Job Title" value="<?php echo $data['job_name']; ?>">
                                    <span class="form-invalid"><?php echo $data['job_name_err']; ?></span>
                                    <div class="image-select"><img src="<?php echo URLROOT.'/imgs/components/posts/add-image-icon.png'; ?>" alt="" id="addImageBtn" onclick="toggleBrowse()"></div>
                                    <div class="image-select"><img src="<?php echo URLROOT.'/imgs/components/posts/remove-image-icon.png'; ?>" alt="" id="removeImageBtn" onclick="removeImage()" style="display: none;"></div>
                                    <input type="file" name="image" id="image" onchange="displayImage(this)" style="display: none;">
                                    <span class="form-invalid"><?php echo $data['image_err']; ?></span>
                                </div>
                                
                                <hr>
                                <div class="post-creator-content">
                                    <textarea name="job_content" id="content" cols="30" rows="25" placeholder="Job Content"><?php echo $data['job_content']; ?></textarea>
                                    <span class="form-invalid"><?php echo $data['job_content_err']; ?></span>
                                </div>
                                <br>
                                <hr>
                                <button type="submit" class="post-creator-submit">PAY FOR VACANCY</button>
                            </div>
                        </form>
                        <div><h4><p><i>* Once you pay for a Job Vacancy it will be appeared for users for one month.</i></p></h4></div>

                   </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        
        <!-- post add javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/posts/postsAdd.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>