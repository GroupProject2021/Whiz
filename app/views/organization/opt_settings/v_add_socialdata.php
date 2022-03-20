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
                        <h1>Profile > Social profile detials</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="settings-form-edit-container">
                        <form action="<?php echo URLROOT.'/C_O_Settings/addSocialProfileDetails/'.$_SESSION['user_id']; ?>" method="post">
                            <div class="settings-header">
                                    <div class="settings-header-item"><a href="<?php echo URLROOT.'/C_O_Settings/settings/'.$_SESSION['user_id'].'/'.$_SESSION['user_id']; ?>"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                    <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                    <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                            </div>                      
                            <br>
                            <div class="table-section">
                            <table class="settings-table">
                                <tr>
                                    <th class="A">Facebook</th>
                                    <td class="B"><p><input type="text" name="facebook" id="facebook" value="<?php echo $data['facebook'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['facebook_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">LinkedIn</th>
                                    <td class="B"><p><input type="text" name="linkedin" id="linkedin" value="<?php echo $data['linkedin'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['linkedin_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Twitter</th>
                                    <td class="B"><p><input type="text" name="twitter" id="twitter" value="<?php echo $data['twitter'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['twitter_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Instagram</th>
                                    <td class="B"><p><input type="text" name="instagram" id="instagram" value="<?php echo $data['instagram'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['instagram_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Medium</th>
                                    <td class="B"><p><input type="text" name="medium" id="medium" value="<?php echo $data['medium'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['medium_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Printerest</th>
                                    <td class="B"><p><input type="text" name="printerest" id="printerest" value="<?php echo $data['printerest'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['printerest_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Youtube</th>
                                    <td class="B"><p><input type="text" name="youtube" id="youtube" value="<?php echo $data['youtube'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['youtube_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Reddit</th>
                                    <td class="B"><p><input type="text" name="reddit" id="reddit" value="<?php echo $data['reddit'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['reddit_err']; ?></td>
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