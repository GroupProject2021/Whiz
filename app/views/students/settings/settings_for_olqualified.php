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
                        <?php flash('settings_message'); ?>
                            <div class="settings-header">
                                    <div class="settings-header-item"><h2>Basic details</h2></div>
                                    <div class="settings-header-item"><a href="<?php echo URLROOT; ?>/students_dashboard/editSettingsBeginner"><input class="edit-button" type="button" value="Edit"></a></div>
                            </div>                      
                            <br>
                            <div class="table-section">
                                <table class="settings-table">
                                    <tr>
                                        <th class="A">Name</th>
                                        <td class="B"><p><?php echo $data['name'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Email</th>
                                        <td class="B"><p><?php echo $data['email'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Password</th>
                                        <td class="B"><p><?php echo $data['password'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Gender</th>
                                        <td class="B"><p><?php echo $data['gender'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Date of birth</th>
                                        <td class="B"><p><?php echo $data['date_of_birth'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Address</th>
                                        <td class="B"><p><?php echo $data['address'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Phone number</th>
                                        <td class="B"><p><?php echo $data['phn_no'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                </table>
                            </div>

                            <br><br>
                            <div class="settings-header">
                                <div class="settings-header-item"><h2>OL details</h2></div>
                                <div class="settings-header-item"><a href="<?php echo URLROOT; ?>/students_dashboard/editSettingsOL"><input class="edit-button" type="button" value="Edit"></a></div>
                            </div>
                            <br>
                            <div class="table-section"> 
                                <table class="settings-table">
                                    <tr>
                                        <th class="A">OL School</th>
                                        <td class="B"><p><?php echo $data['ol_school'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">District</th>
                                        <td class="B"><p><?php echo $data['ol_district'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Mathematics</th>
                                        <td class="B"><p><?php echo $data['ol_sub1_grade'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Science</th>
                                        <td class="B"><p><?php echo $data['ol_sub2_grade'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">English</th>
                                        <td class="B"><p><?php echo $data['ol_sub3_grade'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Sinhala</th>
                                        <td class="B"><p><?php echo $data['ol_sub4_grade'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">History</th>
                                        <td class="B"><p><?php echo $data['ol_sub5_grade'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Religion</th>
                                        <td class="B"><p><?php echo $data['ol_sub6_grade'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Basket 1</th>
                                        <td class="B"><p><?php echo $data['ol_sub7_grade'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Basket 2</th>
                                        <td class="B"><p><?php echo $data['ol_sub8_grade'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Basket 3</th>
                                        <td class="B"><p><?php echo $data['ol_sub9_grade'];?></p></td>
                                        <td class="C"><input class="edit-button" type="button" value="Edit"></td>
                                    </tr>
                                </table>
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