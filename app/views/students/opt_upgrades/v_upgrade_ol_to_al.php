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
            <form action="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToAlQualified" method="post">
                <h1>Student AL details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr class="form-hr">

                <!-- al school -->
                <br>
                <input type="text" placeholder=" " name="al_school" id="al_school" value="<?php echo $data['al_school']; ?>">
                <label>AL School</label>
                <span class="form-invalid"><?php echo $data['al_school_err']; ?></span><br>

                <!-- stream -->
                <p class="form-bold">Stream</p>
                <select name="stream" id="stream" class="form-select">
                    <?php foreach($data['stream_list'] as $stream):?>
                        <option value="<?php echo $stream->stream_id; ?>"><?php echo $stream->stream_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form-invalid"><?php echo $data['stream_err']; ?></span><br>

                <!-- z-score -->
                <p class="form-bold">Z-Score</p>
                <table class="form-table">
                    <tr>
                        <td width="80%">
                            <input type="range" min="0" max="4.0000" step="0.0001" class="form-slider" oninput="fetch_z_score_value()" name="z_score" id="z_score" value="<?php echo $data['z_score']; ?>">
                        </td>
                        <td>
                            <input type="text" value="2.0000" oninput="fetch_z_score()" name="z_score_value" id="z_score_value">
                        </td>
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['z_score_err']; ?></span>

                <!-- district -->
                <p class="form-bold">District</p>
                <select name="al_district" id="al_district" class="form-select">
                    <?php foreach($data['district_list'] as $district):?>
                        <option value="<?php echo $district->district_name; ?>"><?php echo $district->district_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form-invalid"><?php echo $data['al_district_err']; ?></span><br>

                <!-- general test grade -->
                <p class="form-bold">General Test grade</p>
                <table class="form-table">
                    <tr>
                        <td width="80%">
                            <input type="range" min="0" max="100" step="1" class="form-slider" oninput="fetch_general_test_grade_value()" name="general_test_grade" id="general_test_grade" value="<?php echo $data['general_test_grade']; ?>">
                        </td>
                        <td>
                            <input type="text" value="50" oninput="fetch_general_test_grade()" name="general_test_grade_value" id="general_test_grade_value">
                        </td>
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['general_test_grade_err']; ?></span>

                <!-- general english grade -->
                <p class="form-bold">General English grade</p>
                <table class="form-table">
                    <tr>
                        <td><input type="radio" name="radio_general_english" id="radio_general_english" value="A" checked>A</td>
                        <td><input type="radio" name="radio_general_english" id="radio_general_english" value="B">B</td>
                        <td><input type="radio" name="radio_general_english" id="radio_general_english" value="C">C</td>
                        <td><input type="radio" name="radio_general_english" id="radio_general_english" value="D">D</td>
                        <td><input type="radio" name="radio_general_english" id="radio_general_english" value="E">E</td>
                        <td><input type="radio" name="radio_general_english" id="radio_general_english" value="F">F</td>
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['radio_general_english_err']; ?></span>

                <!-- al results -->
                <p class="form-bold">AL Results</p>
                <table class="form-table">
                    <!-- subject 1 - depend on stream -->
                    <tr>
                        <th>Subject 1</th>
                        <td colspan="6">
                            <select name="subject1" id="subject1" class="form-select">
                                <?php foreach($data['al_subject_list'] as $subjects):?>
                                    <?php if($subjects->al_stream_id == 1):?>
                                        <option value="<?php echo $subjects->al_sub_id; ?>"><?php echo $subjects->al_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td><input type="radio" name="radio_subject_1" value="A" checked>A</td>
                        <td><input type="radio" name="radio_subject_1" value="B">B</td>
                        <td><input type="radio" name="radio_subject_1" value="C">C</td>
                        <td><input type="radio" name="radio_subject_1" value="D">D</td>
                        <td><input type="radio" name="radio_subject_1" value="E">E</td>
                        <td><input type="radio" name="radio_subject_1" value="F">F</td>                        
                    </tr>
                    <!-- subject 2 - depend on stream + subject 1-->
                    <tr>
                        <th>Subject 2</th>
                        <td colspan="6">
                            <select name="subject2" id="subject2" class="form-select">
                                <?php foreach($data['al_subject_list'] as $subjects):?>
                                    <?php if($subjects->al_stream_id == 1):?>
                                        <option value="<?php echo $subjects->al_sub_id; ?>"><?php echo $subjects->al_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td><input type="radio" name="radio_subject_2" value="A" checked>A</td>
                        <td><input type="radio" name="radio_subject_2" value="B">B</td>
                        <td><input type="radio" name="radio_subject_2" value="C">C</td>
                        <td><input type="radio" name="radio_subject_2" value="D">D</td>
                        <td><input type="radio" name="radio_subject_2" value="E">E</td>
                        <td><input type="radio" name="radio_subject_2" value="F">F</td>                        
                    </tr>
                    <!-- subject 3 - depend on stream + subject 1 + subject 2-->
                    <tr>
                        <th>Subject 3</th>
                        <td colspan="6">
                            <select name="subject3" id="subject3" class="form-select">
                                <?php foreach($data['al_subject_list'] as $subjects):?>
                                    <?php if($subjects->al_stream_id == 1):?>
                                        <option value="<?php echo $subjects->al_sub_id; ?>"><?php echo $subjects->al_sub_name; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                        </th>
                        <td><input type="radio" name="radio_subject_3" value="A" checked>A</td>
                        <td><input type="radio" name="radio_subject_3" value="B">B</td>
                        <td><input type="radio" name="radio_subject_3" value="C">C</td>
                        <td><input type="radio" name="radio_subject_3" value="D">D</td>
                        <td><input type="radio" name="radio_subject_3" value="E">E</td>
                        <td><input type="radio" name="radio_subject_3" value="F">F</td>                        
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['al_results_err']; ?></span><br>
                <input type="text" name="subjects_validity" id="subjects_validity" value="<?php $data['subjects_validity']; ?>" style="width: fit-content; display: none;">
                <div class="form-validation">
                                    <div class="subjects-validation">
                                        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                                        Your subject selection are valid
                                    </div>
                                </div>

                <hr class="form-hr">
                <p>
                    <input type="checkbox" required>
                    I do here by certify above details that I have entered are true and correct. <a class="form-link" href="#">Terms & Privacy</a>
                </p>
                <button type="submit" class="form-skip-button">Skip</button>
                <button type="submit" class="form-next-button">Next</button>
            </form>
        </div>

        
        <div id="results"></div>


        <div class="form-container signin">
            <p>Contact for help? <a class="form-link" href="<?php echo URLROOT; ?>/students/login">Help & Services</a></p>
        </div>

        
        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/studentRelated/al_UpgradeAndEdit.js"></script>
        
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
        <script>
            // stream change
            $('#stream').on("change", function() {
                var streamId = $('#stream').val();

                $.ajax({
                    url: "<?php echo URLROOT;?>/C_S_Settings/changeStream/"+streamId,
                    method: "post"
                }).done (function(res) {
                    // console.log(res); // for testing only
                    subjects = JSON.parse(res);
                    
                    // selection options resetting
                    isSetSelected = false;
                    $('#subject1').children().remove();
                    subjects.forEach(function(subject) {
                        if(isSetSelected) {
                            $('#subject1').append('<option value="'+subject.al_sub_id+'" selected>'+subject.al_sub_name+'</option>');
                            isSetSelected = true;
                        }
                        else {
                            $('#subject1').append('<option value="'+subject.al_sub_id+'">'+subject.al_sub_name+'</option>');
                        }
                    })

                    isSetSelected = false;
                    $('#subject2').children().remove();
                    subjects.forEach(function(subject) {
                        if(isSetSelected) {
                            $('#subject2').append('<option value="'+subject.al_sub_id+'" selected>'+subject.al_sub_name+'</option>');
                        }
                        else {
                            $('#subject2').append('<option value="'+subject.al_sub_id+'">'+subject.al_sub_name+'</option>')
                        }
                    })

                    isSetSelected = false;
                    $('#subject3').children().remove();
                    subjects.forEach(function(subject) {
                        if(isSetSelected) {
                            $('#subject3').append('<option value="'+subject.al_sub_id+'" selected>'+subject.al_sub_name+'</option>');
                        }
                        else {
                            $('#subject3').append('<option value="'+subject.al_sub_id+'">'+subject.al_sub_name+'</option>')
                        }
                    })

                    // called form al_UpgradeAndEdit JS file
                    initialUniqueSubjectsSetting();
                })
            })
        </script>

    </body>
</html>