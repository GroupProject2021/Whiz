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
                            upload custom
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        
                        <form action="<?php echo URLROOT; ?>/C_S_CV/uploadCustomCV" method="post" enctype="multipart/form-data">
                            <p>Upload your CV here</p>
                            <br>
                            <div class="file-upload-area">
                                <?php require APPROOT.'/views/inc/components/fileUpload/fileUpload.php'?>   
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
<?php require APPROOT.'/views/inc/footer.php'; ?>
