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
                            <form action="<?php echo URLROOT; ?>/C_S_Settings/editSettingsUG" method="post">
                                <div class="settings-header">
                                        <div class="settings-header-item"><h2>University details</h2></div>
                                        <div class="settings-header-item"><a href="<?php echo URLROOT; ?>/C_S_Settings/settings"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                        <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                        <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                                </div>                      
                                <br>
                                <div class="table-section">
                                <table class="settings-table">
                                    <tr>
                                        <th class="A">University</th>
                                        <td class="B"><p><input type="text" name="uni_name" id="uni_name" value="<?php echo $data['uni_name'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['uni_name_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Degree</th>
                                        <td class="B"><p><input type="text" name="degree" id="degree" value="<?php echo $data['degree'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['degree_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">GPA</th>
                                        <td class="B"><p><input type="text" name="gpa" id="gpa" value="<?php echo $data['gpa'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['gpa_err']; ?></td>
                                    </tr>
                                </table> 
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>