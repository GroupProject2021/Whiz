<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/studentSideBar/student_sidebar.php'?>

        <div class="main-content">
            <header>                
                <div class="menu-toggle">
                    <label for="sidebar-toggle">
                        <img src="<?php echo URLROOT; ?>/imgs/dashboard/sidebar-icon.png">
                    </label>
                </div>
                
                <!-- TOP NAVIGATION BAR -->
                <div class="topnav">
                    <?php require APPROOT.'/views/inc/components/topnav.php'?>
                </div>
            </header>

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>Stream recommendaiton</h1>
                        <?php
                            // FOR TESTING ONLY
                            // $x = $data['recommended_streams'];
                            
                            // foreach($x as $x => $x_value) {
                            //     echo '<b>key</b>='.$x.', <b>point weight</b>='.$x_value[0].', <b>controller method</b>='.$x_value[1];
                            //     echo '<br>';
                            // }
                        ?>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="settings-header">
                                <div class="settings-header-item"><h2>Results</h2></div>
                        </div>                                      
                        <br>               
                        <?php
                            $index = 1;     
                            
                            $streams = $data['streams'];
                            $recommendStream = $data['recommended_streams'];

                            foreach($recommendStream as $recommendStream => $recommendStream_value) {
                                // there is an issue in index linking -- fix it
                                echo '<a class="card-link" href="'.URLROOT.'/students_dashboard/streamSelectionRedirect/'.$recommendStream_value[1].'">';
                                if($recommendStream_value[0] >= 4) {
                                    echo '<div class="good-stream-recommend-card">';
                                }
                                elseif($recommendStream_value[0] > 2) {
                                    echo '<div class="normal-stream-recommend-card">';
                                }
                                else {
                                    echo '<div class="bad-stream-recommend-card">';
                                }
                                echo '<table class="stream-recommend-card-table">';
                                echo    '<tr>';
                                echo        '<th>'.$index.'</th>';
                                echo        '<td class="stream-recommend-card-table-title">'.$recommendStream.'</td>';
                                echo        '<td class="stream-recommend-card-table-points">Points '.$recommendStream_value[0].'</td>';
                                echo    '</tr>';
                                echo '</table>';
                                echo '</div>';
                                echo '</a>';
                                $index++;
                            }

                            // FOR TESTING ONLY
                            // print_r($streams);
                        ?>
                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>