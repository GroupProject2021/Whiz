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

                            foreach($data['streams'] as $stream) {
                                echo '<a class="card-link" href="'.URLROOT.'/students_dashboard/streamSelectionRedirect/'.$index.'">';
                                echo '<div class="normal-stream-recommend-card">';
                                echo '  <div class="stream-recommend-card-number">';
                                echo '      <h1>1</h1>';
                                echo '  </div>';
                                echo '  <div class="stream-recommend-card-title">';
                                echo '      <p>'.$stream->stream_name.'</p>';
                                echo '  </div>';
                                echo '  <div class="stream-recommend-card-analytics">';
                                echo '      <p>Points</p>';
                                echo '      <h1>4</h1>';
                                echo '  </div>';
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