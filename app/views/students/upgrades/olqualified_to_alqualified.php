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
            <form action="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToAlQualified" method="post">
                <h1>Student AL details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr class="form-hr">
                <label for="al_school"><p class="form-bold">AL school</p></label>
                <input type="text" placeholder="Enter al school name" name="al_school" id="al_school" value="<?php echo $data['al_school']; ?>">
                <span class="form-invalid"><?php echo $data['al_school_err']; ?></span><br>

                <!-- stream -->
                <label for="stream"><p class="form-bold">Stream</p></label>
                <select name="stream" id="stream">
                    <?php foreach($data['stream_list'] as $stream):?>
                        <option value="<?php echo $stream->stream_id; ?>"><?php echo $stream->stream_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form-invalid"><?php echo $data['stream_err']; ?></span><br>

                <label for="z_score"><p class="form-bold">Z-Score</p></label>
                <input type="text" placeholder="Enter z score" name="z_score" id="z_score" value="<?php echo $data['z_score']; ?>">
                <span class="form-invalid"><?php echo $data['z_score_err']; ?></span><br>

                <label for="al_district"><p class="form-bold">District</p></label>
                <select name="al_district" id="al_district">
                    <?php foreach($data['district_list'] as $district):?>
                        <option value="<?php echo $district->district_name; ?>"><?php echo $district->district_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form-invalid"><?php echo $data['al_district_err']; ?></span><br>

                <label for="general_test_grade"><p class="form-bold">General Test grade</p></label>
                <input type="text" placeholder="Enter general test grade" name="general_test_grade" id="general_test_grade" value="<?php echo $data['general_test_grade']; ?>">
                <table class="form-table">
                <span class="form-invalid"><?php echo $data['general_test_grade_err']; ?></span><br>

                <label for="radio_general_english"><p class="form-bold">General English grade</p></label>
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
                <span class="form-invalid"><?php echo $data['radio_general_english_err']; ?></span><br>

                <label for="al_results"><p class="form-bold">AL Results</p></label>
                <table class="form-table">
                    <!-- subject 1 - depend on stream -->
                    <tr>
                        <th>Subject 1</th>
                        <td colspan="5">
                            <select name="subject1" id="subject1">
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
                        <td><input type="radio" name="radio_subject_1" value="A">A</td>
                        <td><input type="radio" name="radio_subject_1" value="B">B</td>
                        <td><input type="radio" name="radio_subject_1" value="C">C</td>
                        <td><input type="radio" name="radio_subject_1" value="D">D</td>
                        <td><input type="radio" name="radio_subject_1" value="E">E</td>
                        <td><input type="radio" name="radio_subject_1" value="F">F</td>                        
                    </tr>
                    <!-- subject 2 - depend on stream + subject 1-->
                    <tr>
                        <th>Subject 2</th>
                        <td colspan="5">
                            <select name="subject2" id="subject2">
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
                        <td><input type="radio" name="radio_subject_2" value="A">A</td>
                        <td><input type="radio" name="radio_subject_2" value="B">B</td>
                        <td><input type="radio" name="radio_subject_2" value="C">C</td>
                        <td><input type="radio" name="radio_subject_2" value="D">D</td>
                        <td><input type="radio" name="radio_subject_2" value="E">E</td>
                        <td><input type="radio" name="radio_subject_2" value="F">F</td>                        
                    </tr>
                    <!-- subject 3 - depend on stream + subject 1 + subject 2-->
                    <tr>
                        <th>Subject 3</th>
                        <td colspan="5">
                            <select name="subject3" id="subject3">
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
                        <td><input type="radio" name="radio_subject_3" value="A">A</td>
                        <td><input type="radio" name="radio_subject_3" value="B">B</td>
                        <td><input type="radio" name="radio_subject_3" value="C">C</td>
                        <td><input type="radio" name="radio_subject_3" value="D">D</td>
                        <td><input type="radio" name="radio_subject_3" value="E">E</td>
                        <td><input type="radio" name="radio_subject_3" value="F">F</td>                        
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['al_results_err']; ?></span><br>

                <hr class="form-hr">
                <p>I do here by certify above details that I have entered are true and correct. <a class="form-link" href="#">Terms & Privacy</a></p>
                <button type="submit" class="form-skip-button">Skip</button>
                <button type="submit" class="form-next-button">Next</button>
            </form>
        </div>
        <div class="form-container signin">
            <p>Contact for help? <a class="form-link" href="<?php echo URLROOT; ?>/students/login">Help & Services</a></p>
        </div>

        
        <script>
            var stream = document.getElementById("stream");


            stream.addEventListener("change", function() {
                // alert(this.value);
                // a.placeholder = this.value;

                var selected_stream = this.value;

            });
        </script>
    </body>
</html>