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
                        <h1>Received CVs</h1>
                    </div>
                    <br>
                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        
                        <table class="gov-course-table">
                            <tr>                                
                                <th>Applicant</th>                                
                                <th colspan="2">CV</th>                                
                                <th></th>
                            </tr>
                            <tr><td colspan="3"><hr></td></tr>
                            <?php foreach($data['applied_cv_list'] as $cv): ?>
                            <tr>
                                <td class="gov-course-name">
                                    <a href="<?php echo URLROOT;?>/C_S_Settings/settings/<?php echo $cv->user_id; ?>/<?php echo $_SESSION['user_id']; ?>" class="post-link">
                                        <?php echo $cv->first_name.' '.$cv->last_name; ?>
                                    </a>
                                </td>                               
                                <td class="gov-course-intake"><?php echo substr($cv->cv_file_name, 11);?></td>
                                
                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/files/CVs/'.$cv->cv_file_name;?>"><button class="btn3">Download CV</button></a></td>
                                </tr>
                                <tr><td colspan="4"><hr></td></tr>
                            <?php endforeach; ?>
                        </table>

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