<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sidebar.php'?>

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
                            $x = $data['recommended_streams'];
                            
                            foreach($x as $x => $x_value) {
                                echo 'key='.$x.', value='.$x_value;
                                echo '<br>';
                            }
                        ?>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php flash('settings_message'); ?>
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
                                echo '<a class="card-link" href="'.URLROOT.'/students_dashboard/streamSelectionRedirect/'.$index.'">';
                                if($recommendStream_value >= 4) {
                                    echo '<div class="good-stream-recommend-card">';
                                }
                                elseif($recommendStream_value > 2) {
                                    echo '<div class="normal-stream-recommend-card">';
                                }
                                else {
                                    echo '<div class="bad-stream-recommend-card">';
                                }
                                echo '  <div class="stream-recommend-card-number">';
                                echo '      <h1>'.$index.'</h1>';
                                echo '  </div>';
                                echo '  <div class="stream-recommend-card-title">';
                                echo '      <p>'.$recommendStream.'</p>';
                                echo '  </div>';
                                echo '  <div class="stream-recommend-card-analytics">';
                                echo '      <p>Point | '.$recommendStream_value.'</p>';
                                echo '  </div>';
                                echo '</div>';
                                echo '</a>';
                                $index++;
                            }

                            print_r($streams);

                            // foreach($data['streams'] as $stream) {
                            //     echo '<a class="card-link" href="'.URLROOT.'/students_dashboard/streamSelectionRedirect/'.$index.'">';
                            //     echo '<div class="normal-stream-recommend-card">';
                            //     echo '  <div class="stream-recommend-card-number">';
                            //     echo '      <h1>1</h1>';
                            //     echo '  </div>';
                            //     echo '  <div class="stream-recommend-card-title">';
                            //     echo '      <p>'.$stream->stream_name.'</p>';
                            //     echo '  </div>';
                            //     echo '  <div class="stream-recommend-card-analytics">';
                            //     echo '      <p>Points 4</p>';
                            //     echo '  </div>';
                            //     echo '</div>';
                            //     echo '</a>';
                            //     $index++;
                            // }
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