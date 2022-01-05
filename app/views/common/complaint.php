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
                        <h1>Profile > Report <?php echo $data['profile_name']; ?></h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <a href="<?php echo URLROOT;?>/Commons/profileview/<?php echo $data['profile_id'];?>"><button class="btn8">Back</button></a>
                        <br>
                    
                        <form action="<?php echo URLROOT; ?>/Commons/complaint/<?php echo $data['profile_id']; ?>/<?php echo $data['profile_name']; ?>" method="post" enctype="multipart/form-data">
                            <div class="post-creator">
                                <div class="post-creator-title">
                                    <input type="text" name="complaint" id="complaint" autocomplete="off" placeholder="Complaint Description" value="<?php echo $data['complaint']; ?>">
                                    <span class="form-invalid"><?php echo $data['complaint_err']; ?></span>
                                </div>
                                
                                <br>
                                <hr>
                                <button type="submit" class="post-creator-submit">REPORT PROFILE</button>
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