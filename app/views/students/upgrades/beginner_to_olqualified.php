<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>

        <!-- REGISTRATION FORM -->
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToOlQualified" method="post">
                <h1>Student OL details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr class="form-hr">
                <label for="ol_school"><p class="form-bold">OL school</p></label>
                <input type="text" placeholder="Enter ol school name" name="ol_school" id="ol_school" value="<?php echo $data['ol_school']; ?>">
                <span class="form-invalid"><?php echo $data['ol_school_err']; ?></span><br>

                <label for="ol_district"><p class="form-bold">District</p></label>
                <select name="ol_district" id="ol_district">
                    <?php foreach($data['district_list'] as $district):?>
                        <option value="<?php echo $district->district_name; ?>"><?php echo $district->district_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form-invalid"><?php echo $data['ol_district_err']; ?></span><br>

                <label for="ol_results"><p class="form-bold">OL Results</p></label>
                <table class="form-table">
                    <tr>
                        <th rowspan="2">Religion</th>
                        <td colspan="5">
                            <select name="religion" id="religion">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Religion'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_religion" value="B">B</td>
                        <td><input type="radio" name="radio_religion" value="C">C</td>
                        <td><input type="radio" name="radio_religion" value="D">D</td>
                        <td><input type="radio" name="radio_religion" value="E">E</td>
                        <td><input type="radio" name="radio_religion" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th rowspan="2">Primary Language</th>
                        <td colspan="5">
                            <select name="primary_language" id="primary_language">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Primary Language'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_primary_language" value="B">B</td>
                        <td><input type="radio" name="radio_primary_language" value="C">C</td>
                        <td><input type="radio" name="radio_primary_language" value="D">D</td>
                        <td><input type="radio" name="radio_primary_language" value="E">E</td>
                        <td><input type="radio" name="radio_primary_language" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th rowspan="2">Secondary Language</th>
                        <td colspan="5">
                            <select name="secondary_language" id="secondary_language">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Secondary Language'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_secondary_language" value="B">B</td>
                        <td><input type="radio" name="radio_secondary_language" value="C">C</td>
                        <td><input type="radio" name="radio_secondary_language" value="D">D</td>
                        <td><input type="radio" name="radio_secondary_language" value="E">E</td>
                        <td><input type="radio" name="radio_secondary_language" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th rowspan="2">History</th>
                        <td colspan="5">
                            <select name="history" id="history">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'History'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_history" value="B">B</td>
                        <td><input type="radio" name="radio_history" value="C">C</td>
                        <td><input type="radio" name="radio_history" value="D">D</td>
                        <td><input type="radio" name="radio_history" value="E">E</td>
                        <td><input type="radio" name="radio_history" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th rowspan="2">Science</th>
                        <td colspan="5">
                            <select name="science" id="science">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Science'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_science" value="B">B</td>
                        <td><input type="radio" name="radio_science" value="C">C</td>
                        <td><input type="radio" name="radio_science" value="D">D</td>
                        <td><input type="radio" name="radio_science" value="E">E</td>
                        <td><input type="radio" name="radio_science" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th rowspan="2">Mathematics</th>
                        <td colspan="5">
                            <select name="mathematics" id="mathematics">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_type == 'Mathematics'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_mathematics" value="B">B</td>
                        <td><input type="radio" name="radio_mathematics" value="C">C</td>
                        <td><input type="radio" name="radio_mathematics" value="D">D</td>
                        <td><input type="radio" name="radio_mathematics" value="E">E</td>
                        <td><input type="radio" name="radio_mathematics" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th rowspan="2">Basket 1 Subject</th>
                        <td colspan="5">
                            <select name="basket1" id="basket1">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_category == 'Basket 1'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_basket_1" value="B">B</td>
                        <td><input type="radio" name="radio_basket_1" value="C">C</td>
                        <td><input type="radio" name="radio_basket_1" value="D">D</td>
                        <td><input type="radio" name="radio_basket_1" value="E">E</td>
                        <td><input type="radio" name="radio_basket_1" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th rowspan="2">Basket 2 Subject</th>
                        <td colspan="5">
                            <select name="basket2" id="basket2">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_category == 'Basket 2'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_basket_2" value="B">B</td>
                        <td><input type="radio" name="radio_basket_2" value="C">C</td>
                        <td><input type="radio" name="radio_basket_2" value="D">D</td>
                        <td><input type="radio" name="radio_basket_2" value="E">E</td>
                        <td><input type="radio" name="radio_basket_2" value="F">F</td>                        
                    </tr>
                    <tr>
                        <th rowspan="2">Basket 3 Subject</th>
                        <td colspan="5">
                            <select name="basket3" id="basket3">
                                <?php foreach($data['ol_subject_list'] as $subjects):?>
                                    <?php if($subjects->ol_category == 'Basket 3'):?>
                                        <option value="<?php echo $subjects->ol_sub_id; ?>"><?php echo $subjects->ol_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="radio_basket_3" value="B">B</td>
                        <td><input type="radio" name="radio_basket_3" value="C">C</td>
                        <td><input type="radio" name="radio_basket_3" value="D">D</td>
                        <td><input type="radio" name="radio_basket_3" value="E">E</td>
                        <td><input type="radio" name="radio_basket_3" value="F">F</td>                        
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['ol_results_err']; ?></span><br>

                <hr class="form-hr">
                <p>I do here by certify above details that I have entered are true and correct. <a class="form-link" href="#">Terms & Privacy</a></p>
                <button type="submit" class="form-skip-button">Skip</button>
                <button type="submit" class="form-next-button">Next</button>
            </form>
        </div>
        <div class="form-container signin">
            <p>Contact for help? <a class="form-link" href="<?php echo URLROOT; ?>/students/login">Help & Services</a></p>
        </div>
        </form>
    </body>
</html>