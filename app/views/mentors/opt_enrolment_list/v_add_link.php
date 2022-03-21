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
                        <h1><a href="<?php echo URLROOT; ?>/C_M_Enrolment_List/index">Enrolment List</a>
                        >
                        <a href="<?php echo URLROOT.'/C_M_Enrolment_List/enrolStudentList/'.$_SESSION['current_viewing_post_id']; ?>"><?php echo $data['title'];?></a>
                        > Upload Link  
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                    <a href="<?php echo URLROOT.'/C_M_Enrolment_List/enrolStudentList/'.$_SESSION['current_viewing_post_id']; ?>"><button class="btn8 post-back">Back</button></a>
                        <br>
                    
                        <form action="<?php echo URLROOT; ?>/C_M_Enrolment_List/addlink" method="post" enctype="multipart/form-data">
                            <div class="post-creator">
                                 <div class="post-creator-subtitle">                                    
                                    <input type="date" name="date" id="date" autocomplete="off" placeholder="Date" value="<?php echo $data['date']; ?>">
                                    <span class="form-invalid"><?php echo $data['date_err']; ?></span>
                                </div>
                                <div class="post-creator-subtitle">                                    
                                    <input type="time" name="time" id="time" autocomplete="off" placeholder="Time" value="<?php echo $data['time']; ?>">
                                    <span class="form-invalid"><?php echo $data['time_err']; ?></span>
                                </div>
                                <div class="post-creator-content">
                                    <textarea name="body" id="body" cols="30" rows="10" placeholder="Link"><?php echo $data['body']; ?></textarea>
                                </div>
                                <hr>
                                <button type="submit" class="post-creator-submit">Upload</button>
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