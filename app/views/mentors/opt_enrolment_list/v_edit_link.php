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
                        <h1>Enrolment List > <?php echo $data['title'];?> > Edit Link </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="settings-form-edit-container">
                        <!-- <form action="<?php echo URLROOT; ?>/C_M_Enrolment_List/editlink" method="post"> -->
                        <form action="<?php echo URLROOT; ?>/C_M_Enrolment_List/editlink/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="settings-header">
                                    <div class="settings-header-item"><a href="<?php echo URLROOT.'/C_M_Enrolment_List/viewlink/'.$_SESSION['current_viewing_post_id']; ?>"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                    <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                    <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                            </div>                      
                            <br>
                            <div class="table-section">
                                <input type="text" name="link" id="link" value="<?php echo $data['body'];?>"></p>
                                <span class="form-invalid"><?php echo $data['body_err']; ?>   
                            </div>
                        </form>
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