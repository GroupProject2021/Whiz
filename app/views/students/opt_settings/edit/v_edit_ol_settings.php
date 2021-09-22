<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/studentSideBar/student_sidebar.php'?>

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
                            <form action="<?php echo URLROOT; ?>/C_S_Settings/editSettingsOL" method="post">
                                <div class="settings-header">
                                        <div class="settings-header-item"><h2>OL details</h2></div>
                                        <div class="settings-header-item"><a href="<?php echo URLROOT; ?>/C_S_Settings/settings"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                        <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                        <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                                </div>                      
                                <br>
                                <div class="table-section">
                                <table class="settings-table">
                                    <tr>
                                        <th class="A">OL School</th>
                                        <td class="B" colspan="6"><p><input type="text" name="ol_school" id="ol_school" value="<?php echo $data['ol_school'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_school_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">OL District</th>
                                        <td class="B" colspan="6">
                                            <select name="ol_district" id="ol_district">
                                                <?php foreach($data['district_list'] as $district):?>
                                                    <?php if($district->district_name == $data['ol_district']): ?>
                                                        <option value="<?php echo $district->district_name; ?>" selected><?php echo $district->district_name; ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $district->district_name; ?>"><?php echo $district->district_name; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['ol_district_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="religion" id="religion">
                                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                                    <?php if($subjects->ol_type == 'Religion'):?>
                                                        <?php if($subjects->ol_sub_id == $data['ol_sub1_id']): ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>" selected><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_religion'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_religion" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_religion" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="primary_language" id="primary_language">
                                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                                    <?php if($subjects->ol_type == 'Primary Language'):?>
                                                        <?php if($subjects->ol_sub_id == $data['ol_sub2_id']): ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>" selected><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_primary_language'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_primary_language" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_primary_language" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="secondary_language" id="secondary_language">
                                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                                    <?php if($subjects->ol_type == 'Secondary Language'):?>
                                                        <?php if($subjects->ol_sub_id == $data['ol_sub3_id']): ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>" selected><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_secondary_language'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_secondary_language" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_secondary_language" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="history" id="history">
                                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                                    <?php if($subjects->ol_type == 'History'):?>
                                                        <?php if($subjects->ol_sub_id == $data['ol_sub4_id']): ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>" selected><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_history'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_history" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_history" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="science" id="science">
                                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                                    <?php if($subjects->ol_type == 'Science'):?>
                                                        <?php if($subjects->ol_sub_id == $data['ol_sub5_id']): ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>" selected><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_science'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_science" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_science" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="mathematics" id="mathematics">
                                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                                    <?php if($subjects->ol_type == 'Mathematics'):?>
                                                        <?php if($subjects->ol_sub_id == $data['ol_sub6_id']): ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>" selected><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_mathematics'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_mathematics" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_mathematics" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="basket1" id="basket1">
                                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                                    <?php if($subjects->ol_category == 'Basket 1'):?>
                                                        <?php if($subjects->ol_sub_id == $data['ol_sub7_id']): ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>" selected><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_basket_1'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_basket_1" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_basket_1" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="basket2" id="basket2">
                                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                                    <?php if($subjects->ol_category == 'Basket 2'):?>
                                                        <?php if($subjects->ol_sub_id == $data['ol_sub8_id']): ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>" selected><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_basket_2'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_basket_2" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_basket_2" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="basket3" id="basket3">
                                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                                    <?php if($subjects->ol_category == 'Basket 3'):?>
                                                        <?php if($subjects->ol_sub_id == $data['ol_sub9_id']): ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>" selected><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_basket_3'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_basket_3" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_basket_3" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>                                        
                                        <span class="form-invalid"><?php echo $data['ol_results_err']; ?></span><br>
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