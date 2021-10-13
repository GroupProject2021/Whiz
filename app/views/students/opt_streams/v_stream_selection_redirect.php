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
                        <h1>Stream selection</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php flash('settings_message'); ?>
                        <div class="settings-header">
                                <div class="settings-header-item"><h2><?php echo $data['stream_name']; ?> Stream</h2></div>
                        </div>                                      
                        <br>

                        <form action="" method="post">
                            <h3>Select a subject</h3>
                            <select name="subject1" id="subject1" class="custom-select">
                                <?php
                                    foreach($data['al_subject_list'] as $al_subject) {
                                        echo '<option value="'.$al_subject->al_sub_id.'">';
                                        echo $al_subject->al_sub_name;
                                        echo '</option>';
                                    }
                                ?>
                            </select>
                            <br>

                            <h3>Select another subject</h3>
                            <select name="subject2" id="subject2" class="custom-select">
                                <?php
                                    foreach($data['al_subject_list'] as $al_subject) {
                                        echo '<option value="'.$al_subject->al_sub_id.'">';
                                        echo $al_subject->al_sub_name;
                                        echo '</option>';
                                    }
                                ?>
                            </select>
                            <br>

                            <h3>Select one more subject</h3>
                            <select name="subject3" id="subject3" class="custom-select">
                                <?php
                                    foreach($data['al_subject_list'] as $al_subject) {
                                        echo '<option value="'.$al_subject->al_sub_id.'">';
                                        echo $al_subject->al_sub_name;
                                        echo '</option>';
                                    }
                                ?>
                            </select>
                            <br>
                            
                            <button type="submit" class="btn1" >OK</button>
                        </form>
                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>