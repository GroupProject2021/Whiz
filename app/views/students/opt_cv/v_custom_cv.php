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
                            <a href="<?php echo URLROOT; ?>/C_S_CV/index">my cv</a>
                            >
                            upload CV
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        
                        <form action="<?php echo URLROOT; ?>/C_S_CV/uploadCustomCV" method="post" enctype="multipart/form-data">
                            <p>Upload your CV here</p>
                            <br>
                            <div class="file-upload-area">
                                <?php //require APPROOT.'/views/inc/components/fileUpload/fileUpload.php'?>   
                                <div class="file-form-drag-area">
                                            <div class="file-icon">
                                                <?php if($data['is_cv_file_exists']): ?>
                                                    <img src="<?php echo URLROOT; ?>/imgs/components/fileUpload/tick-icon.png" id="file_image_placeholder" width="90px" height="90px" alt="file_image">
                                                <?php else: ?>
                                                    <img src="<?php echo URLROOT; ?>/imgs/components/fileUpload/upload-icon.png" id="file_image_placeholder" width="90px" height="90px" alt="file_image">
                                                <?php endif; ?>
                                            </div>
                                            <div class="file-right-content">
                                                <!-- file upload area title -->
                                                <?php if($data['is_cv_file_exists']): ?>
                                                <div class="file-description"><b>You have already uploaded a valid file</b></div>
                                                <?php else: ?>
                                                <div class="file-description"><b>Drag & Drop to Upload File</b></div>
                                                <?php endif; ?>
                                                <!-- file upload area description -->
                                                <?php if($data['is_cv_file_exists']): ?>
                                                <div class="file-description">Click here to <a href="<?php echo URLROOT.'/files/CVs/'.$data['file_name']; ?>">Download</a> your file.(<?php echo substr($data['file_name'], 11); ?>)</div>
                                                <?php else: ?>
                                                <div class="file-description">Make sure that you upload a file as PDF, JPJ, JPEG or PNG.</div>
                                                <?php endif; ?>
                                                <!-- file upload button -->
                                                <div class="file-form-upload">
                                                    <input type="file" name="file_to_be_upload" id="file_to_be_upload" onchange="displayImage(this)" style="display: none;">
                                                    <?php if($data['is_cv_file_exists']): ?>
                                                    Change File
                                                    <?php else: ?>
                                                    Browse File
                                                    <?php endif; ?>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="form-validation">
                                            <div class="profile-image-validation">
                                                <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                                                <?php if($data['is_cv_file_exists']): ?>
                                                Changed the existing file
                                                <?php else: ?>
                                                Select a file
                                                <?php endif; ?>
                                            </div>
                                        </div> 

                                <br>
                                <button type="submit" class="form-submit">Upload</button>
                            </div>

                        </form>
                        
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        
        <!-- javascipt -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/fileUpload/fileUpload.js"></script>
<?php require APPROOT.'/views/inc/footer.php'; ?>
