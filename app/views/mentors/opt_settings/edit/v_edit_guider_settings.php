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
                        <h1>Profile > Edit</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="settings-form-edit-container">
                        <form action="<?php echo URLROOT; ?>/C_M_Settings/editSettingsGuider" method="post">
                            <div class="settings-header">
                                    <div class="settings-header-item"><h2>Basic details</h2></div>
                                    <div class="settings-header-item"><a href="<?php echo URLROOT.'/C_M_Settings/settings/'.$_SESSION['user_id']; ?>"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                    <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                    <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                            </div>                      
                            <br>
                            <div class="table-section">
                            <table class="settings-table">
                                <tr>
                                    <th class="A">First name</th>
                                    <td class="B"><p><input type="text" name="first_name" id="first_name" value="<?php echo $data['first_name'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['name_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Last name</th>
                                    <td class="B"><p><input type="text" name="last_name" id="last_name" value="<?php echo $data['last_name'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['name_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Gender</th>
                                    <td class="B"><p><input type="text" name="gender" id="gender" value="<?php echo $data['gender'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['gender_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Institute</th>
                                    <td class="B"><p><input type="text" name="institute" id="institute" value="<?php echo $data['institute'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['institute_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Address</th>
                                    <td class="B"><p><input type="text" name="address" id="address" value="<?php echo $data['address'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['address_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Phone number</th>
                                    <td class="B"><p><input type="text" name="phn_no" id="phn_no" value="<?php echo $data['phn_no'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['phn_no_err']; ?></td>
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