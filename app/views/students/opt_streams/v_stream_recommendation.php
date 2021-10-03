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
                                echo '<a href="'.URLROOT.'/C_S_Stream/streamSelectionRedirect/'.$index.'" class="card-link">';
                                if($recommendStream_value[0] >= 4) {
                                    echo '<div class="rec-stream good">';
                                }
                                elseif($recommendStream_value[0] > 2) {
                                    echo '<div class="rec-stream avg">';
                                }
                                else {
                                    echo '<div class="rec-stream bad">';
                                }
                                echo    '<div class="index">'.$index.'</div>';
                                echo    '<div class="name">'.$recommendStream.'</div>';
                                echo    '<div class="points">';
                                echo        '<div class="bar"><progress value="'.$recommendStream_value[0].'" max="6"></progress></div>';
                                echo        '<div class="text"><b>'.$recommendStream_value[0].' points</b> out of 6</div>';
                                echo    '</div>';
                                echo '</div>';
                                echo '</a>';

                                $index++;
                            }
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