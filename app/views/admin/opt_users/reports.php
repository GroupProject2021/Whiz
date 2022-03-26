<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
                        <h1>Reports</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        
                        <table class="gov-course-table">
                            <tr>                                
                                <th>Report</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php foreach($data['report_list'] as $reportItem): ?>
                            <tr>
                                <td class="gov-course-name" style="width: 60%;"><?php echo $reportItem->report; ?></td>                                
                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_A_Users/deleteReportedAccount/'.$reportItem->reported_id;?>"><button class="btn4">Delete Reported profile</button></a></td>
                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_S_Settings/settings/'.$reportItem->reported_id.'/'.$_SESSION['user_id'];?>"><button class="btn2">Reported profile</button></a></td>
                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_S_Settings/settings/'.$reportItem->reporter_id.'/'.$_SESSION['user_id'];?>"><button class="btn3">Reporter's profile</button></a></td>
                            </tr>
                            <tr><td colspan="4"><hr></td></tr>
                            <?php endforeach; ?>
                        </table>

                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>

        
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>