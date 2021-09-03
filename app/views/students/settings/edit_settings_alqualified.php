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
                        <h1>Beginner dashboard</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="settings-form-edit-container">
                            <form action="<?php echo URLROOT; ?>/students_dashboard/editSettingsAL" method="post">
                                <div class="settings-header">
                                    <div class="settings-header-item"><h2>AL details</h2></div>
                                    <div class="settings-header-item"><a href="<?php echo URLROOT; ?>/students_dashboard/settings"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                    <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                    <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                                </div>                      
                                <br>
                                <div class="table-section">  
                                <table class="settings-table">
                                    <tr>
                                        <th class="A">AL School</th>
                                        <td class="B"><p><input type="text" name="al_school" id="al_school" value="<?php echo $data['al_school'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['al_school_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">AL District</th>
                                        <td class="B"><p><input type="text" name="al_district" id="al_district" value="<?php echo $data['al_district'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['al_district_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Stream</th>
                                        <td class="B"><p><input type="text" name="stream" id="stream" value="<?php echo $data['stream'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['stream_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Z-Score</th>
                                        <td class="B"><p><input type="text" name="z_score" id="z_score" value="<?php echo $data['z_score'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['z_score_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">General test grade</th>
                                    <td class="B"><p><input type="text" name="al_general_test_grade" id="al_general_test_grade" value="<?php echo $data['al_general_test_grade'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['al_general_test_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">General english grade</th>
                                    <td class="B"><p><input type="text" name="al_general_english_grade" id="al_general_english_grade" value="<?php echo $data['al_general_english_grade'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['al_general_english_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Subject 1</th>
                                        <td class="B"><p><input type="text" name="al_sub1_grade" id="al_sub1_grade" value="<?php echo $data['al_sub1_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['al_sub1_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Subject 2</th>
                                        <td class="B"><p><input type="text" name="al_sub2_grade" id="al_sub2_grade" value="<?php echo $data['al_sub2_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['al_sub2_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Subject 3</th>
                                        <td class="B"><p><input type="text" name="al_sub3_grade" id="al_sub3_grade" value="<?php echo $data['al_sub3_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['al_sub3_grade_err']; ?></td>
                                    </tr>
                                </table> 
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>