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
                        <h1>Enrolment List > <?php echo $data['title'];?> > View Link
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="button-panel">
                            <a href="<?php echo URLROOT.'/C_M_Enrolment_List/enrolStudentList/'.$_SESSION['current_viewing_post_id']; ?>"><input class="btn8 post-back" type="button" value="Back"></a>
                            <a href="<?php echo URLROOT.'/C_M_Enrolment_List/editlink/'.$_SESSION['current_viewing_post_id']; ?>"><input class="btn6 post-back" type="button" value="Edit"></a>
                        </div>
                        <div class="table-section">
                            <div class="link"><a href="<?php echo $data['link'];?>"><?php echo $data['link'];?></a></div>
                        </div>
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