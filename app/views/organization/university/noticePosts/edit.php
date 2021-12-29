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
                        <h1>Intake Notice post > Edit</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <a href="<?php echo URLROOT;?>/Posts_C_O_IntakeNotices/index"><button class="btn8">Back</button></a>
                        <br>
                    
                        <form action="<?php echo URLROOT; ?>/Posts_C_O_IntakeNotices/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="post-creator">
                                <div class="post-creator-image" id="post-creator-image">
                                    <img src="<?php if($data['image_name'] != null){ echo URLROOT.'/imgs/posts/notices/'.$data['image_name'];}else{ echo '';} ?>" alt="" id="image_placeholder" style="display: none;">
                                    <input type="text" name="isImageRemoved" id="isImageRemoved" style="display: none;">
                                </div>
                                <div class="post-creator-title">
                                    <input type="text" name="notice_name" id="notice_name" autocomplete="off" placeholder="Notice Title" value="<?php echo $data['notice_name']; ?>">
                                    <span class="form-invalid"><?php echo $data['notice_name_err']; ?></span>
                                    <div class="image-select"><img src="<?php echo URLROOT.'/imgs/components/posts/add-image-icon.png'; ?>" alt="" id="addImageBtn" onclick="toggleBrowse()"></div>
                                    <div class="image-select"><img src="<?php echo URLROOT.'/imgs/components/posts/remove-image-icon.png'; ?>" alt="" id="removeImageBtn" onclick="removeImage()" style="display: none;"></div>
                                    <input type="file" name="image" id="image" onchange="displayImage(this)" style="display: none;">
                                    <span class="form-invalid"><?php echo $data['image_err']; ?></span>
                                </div>
                                <hr>
                                
                                <hr>
                                <div class="post-creator-content">
                                    <textarea name="notice_content" id="content" cols="30" rows="25" placeholder="Notice Content"><?php echo $data['notice_content']; ?></textarea>
                                    <span class="form-invalid"><?php echo $data['notice_content_err']; ?></span>
                                </div>
                                <br>
                                <hr>
                                <button type="submit" class="post-creator-submit">Save</button>
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
        
        <!-- post edit javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/posts/postsEdit.js"></script>
        
<?php require APPROOT.'/views/inc/footer.php'; ?>