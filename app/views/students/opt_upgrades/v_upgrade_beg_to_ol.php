<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP Navigation -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>

        <!-- REGISTRATION FORM -->
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToOlQualified" method="post" enctype="multipart/form-data">
                <h1>Student OL details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr class="form-hr">

                <!-- ol school -->
                <br>
                <input type="text" placeholder=" " name="ol_school" id="ol_school" value="<?php echo $data['ol_school']; ?>">
                <label>OL School</label>
                <span class="form-invalid"><?php echo $data['ol_school_err']; ?></span><br>

                <!-- school search list -->
                <div class="list-group" class="show-list" id="show-list">
                    <!-- sample element -->
                    <!-- <div class="show-list-item">HRCC</div> -->
                </div>

                <!-- district -->
                <p class="form-bold">District</p>
                <select name="ol_district" id="ol_district" class="form-select">
                    <?php foreach($data['district_list'] as $district):?>
                        <option value="<?php echo $district->district_name; ?>"><?php echo $district->district_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form-invalid"><?php echo $data['ol_district_err']; ?></span><br>

                <!-- ol results -->
                <p class="form-bold">OL Results</p>
                <table class="form-table">
                    <tr>
                        <th colspan="6">Religion</th>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <select name="religion" id="religion" class="form-select">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Religion'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_religion" value="A" checked>A</td>
                        <td><input type="radio" name="radio_religion" value="B">B</td>
                        <td><input type="radio" name="radio_religion" value="C">C</td>
                        <td><input type="radio" name="radio_religion" value="S">S</td>
                        <td><input type="radio" name="radio_religion" value="E">E</td>
                        <td><input type="radio" name="radio_religion" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th colspan="6">Primary Language</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <select name="primary_language" id="primary_language" class="form-select">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Primary Language'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_primary_language" value="A" checked>A</td>
                        <td><input type="radio" name="radio_primary_language" value="B">B</td>
                        <td><input type="radio" name="radio_primary_language" value="C">C</td>
                        <td><input type="radio" name="radio_primary_language" value="S">S</td>
                        <td><input type="radio" name="radio_primary_language" value="E">E</td>
                        <td><input type="radio" name="radio_primary_language" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th colspan="6">Secondary Language</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <select name="secondary_language" id="secondary_language" class="form-select">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Secondary Language'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_secondary_language" value="A" checked>A</td>
                        <td><input type="radio" name="radio_secondary_language" value="B">B</td>
                        <td><input type="radio" name="radio_secondary_language" value="C">C</td>
                        <td><input type="radio" name="radio_secondary_language" value="S">S</td>
                        <td><input type="radio" name="radio_secondary_language" value="E">E</td>
                        <td><input type="radio" name="radio_secondary_language" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th colspan="6">History</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <select name="history" id="history" class="form-select">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'History'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_history" value="A" checked>A</td>
                        <td><input type="radio" name="radio_history" value="B">B</td>
                        <td><input type="radio" name="radio_history" value="C">C</td>
                        <td><input type="radio" name="radio_history" value="S">S</td>
                        <td><input type="radio" name="radio_history" value="E">E</td>
                        <td><input type="radio" name="radio_history" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th colspan="6">Science</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <select name="science" id="science" class="form-select">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Science'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_science" value="A" checked>A</td>
                        <td><input type="radio" name="radio_science" value="B">B</td>
                        <td><input type="radio" name="radio_science" value="C">C</td>
                        <td><input type="radio" name="radio_science" value="S">S</td>
                        <td><input type="radio" name="radio_science" value="E">E</td>
                        <td><input type="radio" name="radio_science" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th colspan="6">Mathematics</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <select name="mathematics" id="mathematics" class="form-select">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Mathematics'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_mathematics" value="A" checked>A</td>
                        <td><input type="radio" name="radio_mathematics" value="B">B</td>
                        <td><input type="radio" name="radio_mathematics" value="C">C</td>
                        <td><input type="radio" name="radio_mathematics" value="S">S</td>
                        <td><input type="radio" name="radio_mathematics" value="E">E</td>
                        <td><input type="radio" name="radio_mathematics" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th colspan="6">Basket 1 Subject</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <select name="basket1" id="basket1" class="form-select">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_category == 'Basket 1'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_basket_1" value="A" checked>A</td>
                        <td><input type="radio" name="radio_basket_1" value="B">B</td>
                        <td><input type="radio" name="radio_basket_1" value="C">C</td>
                        <td><input type="radio" name="radio_basket_1" value="S">S</td>
                        <td><input type="radio" name="radio_basket_1" value="E">E</td>
                        <td><input type="radio" name="radio_basket_1" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th colspan="6">Basket 2 Subject</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <select name="basket2" id="basket2" class="form-select">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_category == 'Basket 2'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_basket_2" value="A" checked>A</td>
                        <td><input type="radio" name="radio_basket_2" value="B">B</td>
                        <td><input type="radio" name="radio_basket_2" value="C">C</td>
                        <td><input type="radio" name="radio_basket_2" value="S">S</td>
                        <td><input type="radio" name="radio_basket_2" value="E">E</td>
                        <td><input type="radio" name="radio_basket_2" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th colspan="6">Basket 3 Subject</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <select name="basket3" id="basket3" class="form-select">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_category == 'Basket 3'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_basket_3" value="A" checked>A</td>
                        <td><input type="radio" name="radio_basket_3" value="B">B</td>
                        <td><input type="radio" name="radio_basket_3" value="C">C</td>
                        <td><input type="radio" name="radio_basket_3" value="S">S</td>
                        <td><input type="radio" name="radio_basket_3" value="E">E</td>
                        <td><input type="radio" name="radio_basket_3" value="F">F</td>                        
                    </tr>
                    <tr></tr>
                    <tr>
                        <th colspan="6">
                            OL Result sheet (PDF or Clear Image) <span style="color: red;">[OPTIONAL]</span>
                        </th>
                    </tr>
                    <tr>
                    <td colspan="6">
                        <div class="file-form-drag-area">
                            <div class="file-icon">
                                    <img src="<?php echo URLROOT; ?>/imgs/components/fileUpload/upload-icon.png" id="file_image_placeholder" width="90px" height="90px" alt="file_image">
                            </div>
                            <div class="file-right-content">
                                <!-- file upload area title -->
                                <div class="file-description"><b>Drag & Drop to Upload File</b></div>
                                <!-- file upload area description -->
                                <div class="file-description">Make sure that you upload a file as PDF, JPJ, JPEG or PNG.</div>
                                <!-- file upload button -->
                                <div class="file-form-upload">
                                    <input type="file" name="file_to_be_upload" id="file_to_be_upload" onchange="displayImage(this)" style="display: none;">
                                    Browse File
                                </div>
                            </div>    
                        </div>
                        <div class="form-validation">
                            <div class="profile-image-validation">
                                <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                                Select a file
                            </div>
                        </div>  
                        </td>
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['ol_results_err']; ?></span><br>

                <hr class="form-hr">
                <p>
                    <input type="checkbox" required>
                    I do here by certify above details that I have entered are true and correct. <a class="form-link" href="<?php echo URLROOT.'/Pages/privacy'?>">Terms & Privacy</a>
                </p>
                <button type="submit" class="form-next-button">Next</button>
            </form>
        </div>
        <div class="form-container signin">
            <p>Contact for help? <a class="form-link" href="<?php echo URLROOT.'/Pages/services'?>">Help & Services</a></p>
        </div>
        </form>

         <!-- java script form validation -->
         <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/form.js"></script>
        
        <!-- jquery -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

        <!-- common settings js -->
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';
        </script>
        
        <!-- upgrade js -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/studentRelated/opt_upgrades/beg_to_ol_Upgrade.js"></script>

        <!-- javascipt -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/fileUpload/fileUpload.js"></script>

    </body>
</html>