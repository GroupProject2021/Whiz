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
                        <h1>Course post > Create</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <a href="<?php echo URLROOT;?>/Posts_C_O_CoursePosts/index"><button class="btn8">Back</button></a>
                        <br>
                    
                        <form action="<?php echo URLROOT; ?>/Posts_C_O_CoursePosts/add" method="post" enctype="multipart/form-data">
                            <div class="post-creator">
                                <div class="post-creator-image">
                                    <img src="" alt="" id="image_placeholder" style="display: none;">
                                </div>
                                <div class="post-creator-title">
                                    <input type="text" name="course_name" id="course_name" autocomplete="off" placeholder="Course Name" value="<?php echo $data['course_name']; ?>">
                                    <span class="form-invalid"><?php echo $data['course_name_err']; ?></span>
                                    <div class="image-select"><img src="<?php echo URLROOT.'/imgs/components/posts/add-image-icon.png'; ?>" alt="" id="addImageBtn" onclick="toggleBrowse()"></div>
                                    <div class="image-select"><img src="<?php echo URLROOT.'/imgs/components/posts/remove-image-icon.png'; ?>" alt="" id="removeImageBtn" onclick="removeImage()" style="display: none;"></div>
                                    <input type="file" name="image" id="image" onchange="displayImage(this)" style="display: none;">
                                    <span class="form-invalid"><?php echo $data['image_err']; ?></span>
                                </div>
                                <hr>
                                <div class="post-creator-content">
                                    <input type="text" name="degree" id="degree" autocomplete="off" placeholder="Degree Name" value="<?php echo $data['provide_degree']; ?>">
                                    <span class="form-invalid"><?php echo $data['provide_degree_err']; ?></span>
                                    <input type="text" name="course_fee" id="course_fee" autocomplete="off" placeholder="Course Fee" value="<?php echo $data['course_fee']; ?>">
                                    <span class="form-invalid"><?php echo $data['course_fee_err']; ?></span>
                                    <textarea name="content" id="content" cols="30" rows="25" placeholder="Course Content"><?php echo $data['course_content']; ?></textarea>
                                    <span class="form-invalid"><?php echo $data['course_content_err']; ?></span>
                                </div>
                                <br>
                                <hr>
                                <button type="submit" class="post-creator-submit">Post</button>
                            </div>
                        </form>

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