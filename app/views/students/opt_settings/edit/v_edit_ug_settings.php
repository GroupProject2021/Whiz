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
                        <h1>Beginner dashboard</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="settings-form-edit-container">
                            <form action="<?php echo URLROOT; ?>/C_S_Settings/editSettingsUG" method="post">
                                <div class="settings-header">
                                        <div class="settings-header-item"><h2>University details</h2></div>
                                        <div class="settings-header-item"><a href="<?php echo URLROOT.'/C_S_Settings/settings/'.$_SESSION['user_id']; ?>"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                        <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                        <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                                </div>                      
                                <br>
                                <div class="table-section">
                                <table class="settings-table">
                                    <tr>
                                        <th class="A">University Type</th>
                                        <td class="B">
                                            <select name="uni_type" id="uni_type">
                                                <?php foreach($data['uni_type_list'] as $uniType):?>
                                                    <?php if($uniType->uni_type_name == $data['uni_type']): ?>
                                                        <option value="<?php echo $uniType->uni_type_name; ?>" selected><?php echo $uniType->uni_type_name; ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $uniType->uni_type_name; ?>"><?php echo $uniType->uni_type_name; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['uni_name_err']; ?></td>
                                    </tr>
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