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
                            <form action="<?php echo URLROOT; ?>/students_dashboard/editSettingsOL" method="post">
                                <div class="settings-header">
                                        <div class="settings-header-item"><h2>OL details</h2></div>
                                        <div class="settings-header-item"><a href="<?php echo URLROOT; ?>/students_dashboard/settings"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                        <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                        <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                                </div>                      
                                <br>
                                <div class="table-section">
                                <table class="settings-table">
                                    <tr>
                                        <th class="A">OL School</th>
                                        <td class="B"><p><input type="text" name="ol_school" id="ol_school" value="<?php echo $data['ol_school'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_school_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">OL District</th>
                                        <td class="B"><p><input type="text" name="ol_district" id="ol_district" value="<?php echo $data['ol_district'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_district_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Mathematics</th>
                                        <td class="B"><p><input type="text" name="ol_sub1_grade" id="ol_sub1_grade" value="<?php echo $data['ol_sub1_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_sub1_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Science</th>
                                        <td class="B"><p><input type="text" name="ol_sub2_grade" id="ol_sub2_grade" value="<?php echo $data['ol_sub2_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_sub2_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">English</th>
                                        <td class="B"><p><input type="text" name="ol_sub3_grade" id="ol_sub3_grade" value="<?php echo $data['ol_sub3_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_sub3_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Sinhala</th>
                                        <td class="B"><p><input type="text" name="ol_sub4_grade" id="ol_sub4_grade" value="<?php echo $data['ol_sub4_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_sub4_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">History</th>
                                        <td class="B"><p><input type="text" name="ol_sub5_grade" id="ol_sub5_grade" value="<?php echo $data['ol_sub5_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_sub5_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Religion</th>
                                        <td class="B"><p><input type="text" name="ol_sub6_grade" id="ol_sub6_grade" value="<?php echo $data['ol_sub6_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_sub6_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Basket 1</th>
                                        <td class="B"><p><input type="text" name="ol_sub7_grade" id="ol_sub7_grade" value="<?php echo $data['ol_sub7_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_sub7_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Basket 2</th>
                                        <td class="B"><p><input type="text" name="ol_sub8_grade" id="ol_sub8_grade" value="<?php echo $data['ol_sub8_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_sub8_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Basket 3</th>
                                        <td class="B"><p><input type="text" name="ol_sub9_grade" id="ol_sub9_grade" value="<?php echo $data['ol_sub9_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_sub9_grade_err']; ?></td>
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