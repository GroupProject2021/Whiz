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
                        <h1>Stream seleciton</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php flash('settings_message'); ?>
                        <div class="settings-header">
                                <div class="settings-header-item"><h2>Select any stream</h2></div>
                        </div>                                      
                        <br>
                        <?php
                            $index = 1;

                            // foreach($data['streams'] as $stream) {
                            //     echo '<a class="card-link" href="'.URLROOT.'/C_S_Stream/streamSelectionRedirect/'.$index.'">';
                            //     echo '<div class="stream-selection-card">';
                            //     echo '  <div class="stream-selection-card-title">';
                            //     echo '      <p>'.$stream->stream_name.'</p>';
                            //     echo '  </div>';
                            //     echo '</div>';
                            //     echo '</a>';
                            //     $index++;
                            // }

                            
                        ?>

                        <?php
                            $index = 1;

                            foreach($data['streams'] as $stream) {
                                echo '<a href="'.URLROOT.'/C_S_Stream/streamSelectionRedirect/'.$index.'" class="card-link">';
                                echo    '<div class="stream">';
                                echo        '<div class="index">'.$index.'</div>';
                                echo        '<div class="name">'.$stream->stream_name.'</div>';
                                echo    '</div>';
                                echo '</a>';
                                $index++;
                            }
                        ?>

                        <a href="<?php echo URLROOT?>/C_S_Stream/streamRecommendation"><button class="btn2">Recommend stream</button></a>
                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>