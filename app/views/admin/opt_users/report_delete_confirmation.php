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
                        <h1>Reports confirmation</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        

                        <div class="report-confirm-form">
                            <div class="content">Do you want to delete this profile</div>
                            <div class="footer">
                                <div class="left"><a href="<?php echo URLROOT.'/C_A_Users/deleteReportedAccount/'.$data['report_id'];?>"><button class="btn3">Yes</button></a></div>
                                <div class="right"><a href="<?php echo URLROOT; ?>/C_A_Users/reports"><button class="btn4">No</button></a></div>
                            </div>
                        </div>

                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>

        
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/adminRelated/report.js"></script>


<?php require APPROOT.'/views/inc/footer.php'; ?>