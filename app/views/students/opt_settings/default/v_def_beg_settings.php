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
                        <!-- <img src="<?php echo URLROOT; ?>/imgs/dashboard/sidebar-icon.png"> -->
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
                                <div class="settings-header-item"><a href="<?php echo URLROOT; ?>/C_S_Settings/edit_beginnerSettings"><input class="edit-button" type="button" value="Edit"></a></div>
                        </div>                      
                        <br>
                        <div class="table-section">
                            <table class="settings-table">
                                <tr>
                                    <th class="A">Name</th>
                                    <td class="B"><p><?php echo $data['name'];?></p></td>
                                </tr>
                                <tr>
                                    <th class="A">Email</th>
                                    <td class="B"><p><?php echo $data['email'];?></p></td>
                                </tr>
                                <tr>
                                    <th class="A">Password</th>
                                    <td class="B"><p><?php echo $data['password'];?></p></td>
                                </tr>
                                <tr>
                                    <th class="A">Gender</th>
                                    <td class="B"><p><?php echo $data['gender'];?></p></td>
                                </tr>
                                <tr>
                                    <th class="A">Date of birth</th>
                                    <td class="B"><p><?php echo $data['date_of_birth'];?></p></td>
                                </tr>
                                <tr>
                                    <th class="A">Address</th>
                                    <td class="B"><p><?php echo $data['address'];?></p></td>
                                </tr>
                                <tr>
                                    <th class="A">Phone number</th>
                                    <td class="B"><p><?php echo $data['phn_no'];?></p></td>
                                </tr>
                            </table>
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