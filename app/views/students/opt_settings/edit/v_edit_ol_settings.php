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
                        <h1>student profile > G.C.E(O/L) details Edit</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <div class="settings-form-edit-container">
                            <form action="<?php echo URLROOT; ?>/C_S_Settings/editSettingsOL/" method="post" enctype="multipart/form-data">
                                <div class="settings-header">
                                        <div class="settings-header-item"><a href="<?php echo URLROOT.'/C_S_Settings/settings/'.$_SESSION['user_id']; ?>"><input class="cancel-button" type="button" value="Cancel"></a></div>
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
                                        <td>

                                        </td>
                                        <td>
                                            <!-- school search list -->
                                            <div class="list-group" class="show-list" id="show-list">
                                                <!-- sample element -->
                                                <!-- <div class="show-list-item">HRCC</div> -->
                                            </div>
                                        </td>
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
                                    <tr>
                                        <th colspan="7">
                                            OL Result sheet (PDF or Clear Image) <span style="color: red;">[OPTIONAL]</span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                        <div class="file-form-drag-area">
                                            <div class="file-icon">
                                                <?php if($data['is_ol_file_exists']): ?>
                                                    <img src="<?php echo URLROOT; ?>/imgs/components/fileUpload/tick-icon.png" id="file_image_placeholder" width="90px" height="90px" alt="file_image">
                                                <?php else: ?>
                                                    <img src="<?php echo URLROOT; ?>/imgs/components/fileUpload/upload-icon.png" id="file_image_placeholder" width="90px" height="90px" alt="file_image">
                                                <?php endif; ?>
                                            </div>
                                            <div class="file-right-content">
                                                <!-- file upload area title -->
                                                <?php if($data['is_ol_file_exists']): ?>
                                                <div class="file-description"><b>You have already uploaded a valid file</b></div>
                                                <?php else: ?>
                                                <div class="file-description"><b>Drag & Drop to Upload File</b></div>
                                                <?php endif; ?>
                                                <!-- file upload area description -->
                                                <?php if($data['is_ol_file_exists']): ?>
                                                <div class="file-description">Click here to <a href="<?php echo URLROOT.'/files/OL_Result_Sheets/'.$data['file_name']; ?>">Download</a> your file.(<?php echo substr($data['file_name'], 11); ?>)</div>
                                                <?php else: ?>
                                                <div class="file-description">Make sure that you upload a file as PDF, JPJ, JPEG or PNG.</div>
                                                <?php endif; ?>
                                                <!-- file upload button -->
                                                <div class="file-form-upload">
                                                    <input type="file" name="file_to_be_upload" id="file_to_be_upload" onchange="displayImage(this)" style="display: none;">
                                                    <?php if($data['is_ol_file_exists']): ?>
                                                    Change File
                                                    <?php else: ?>
                                                    Browse File
                                                    <?php endif; ?>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="form-validation">
                                            <div class="profile-image-validation">
                                                <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                                                <?php if($data['is_ol_file_exists']): ?>
                                                Changed the existing file
                                                <?php else: ?>
                                                Select a file
                                                <?php endif; ?>
                                            </div>
                                        </div>  
                                        </td>
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

        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

        <!-- common settings js -->
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';
        </script>

        <!-- ol edit js -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/studentRelated/opt_settings/edit/olEdit.js"></script>
        
        <!-- javascipt -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/fileUpload/fileUpload.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>