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
            <form action="<?php echo URLROOT; ?>/Students_ProfileUpgrades/upgradeToAlQualified" method="post">
                <h1>Student AL details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr class="form-hr">
                <label for="al_school"><p class="form-bold">AL school</p></label>
                <input type="text" placeholder="Enter al school name" name="al_school" id="al_school" value="<?php echo $data['al_school']; ?>">
                <span class="form-invalid"><?php echo $data['al_school_err']; ?></span><br>

                <label for="stream"><p class="form-bold">Stream</p></label>
                <input type="text" placeholder="Enter ol stream name" name="stream" id="stream" value="<?php echo $data['stream']; ?>">
                <span class="form-invalid"><?php echo $data['stream_err']; ?></span><br>

                <label for="z_score"><p class="form-bold">Z-Score</p></label>
                <input type="text" placeholder="Enter z score" name="z_score" id="z_score" value="<?php echo $data['z_score']; ?>">
                <span class="form-invalid"><?php echo $data['z_score_err']; ?></span><br>

                <label for="al_district"><p class="form-bold">District</p></label>
                <input type="text" placeholder="Enter district" name="al_district" id="al_district" value="<?php echo $data['al_district']; ?>">
                <span class="form-invalid"><?php echo $data['al_district_err']; ?></span><br>

                <label for="general_test_grade"><p class="form-bold">General Test grade</p></label>
                <input type="text" placeholder="Enter general test grade" name="general_test_grade" id="general_test_grade" value="<?php echo $data['general_test_grade']; ?>">
                <span class="form-invalid"><?php echo $data['general_test_grade_err']; ?></span><br>

                <label for="general_english_grade"><p class="form-bold">General English grade</p></label>
                <input type="text" placeholder="Enter district" name="general_english_grade" id="general_english_grade" value="<?php echo $data['general_english_grade']; ?>">
                <span class="form-invalid"><?php echo $data['general_english_grade_err']; ?></span><br>

                <label for="al_results"><p class="form-bold">AL Results</p></label>
                <table class="form-table">
                    <tr>
                        <th>Subject 1</th>
                        <td><input type="radio" name="radio_subject_1">A</td>
                        <td><input type="radio" name="radio_subject_1">B</td>
                        <td><input type="radio" name="radio_subject_1">C</td>
                        <td><input type="radio" name="radio_subject_1">D</td>
                        <td><input type="radio" name="radio_subject_1">E</td>
                        <td><input type="radio" name="radio_subject_1">F</td>
                    </tr>
                    <tr>
                        <th>Subject 2</th>
                        <td><input type="radio" name="radio_subject_2">A</td>
                        <td><input type="radio" name="radio_subject_2">B</td>
                        <td><input type="radio" name="radio_subject_2">C</td>
                        <td><input type="radio" name="radio_subject_2">D</td>
                        <td><input type="radio" name="radio_subject_2">E</td>
                        <td><input type="radio" name="radio_subject_2">F</td>
                    </tr>
                    <tr>
                        <th>Subject 3</th>
                        <td><input type="radio" name="radio_subject_3">A</td>
                        <td><input type="radio" name="radio_subject_3">B</td>
                        <td><input type="radio" name="radio_subject_3">C</td>
                        <td><input type="radio" name="radio_subject_3">D</td>
                        <td><input type="radio" name="radio_subject_3">E</td>
                        <td><input type="radio" name="radio_subject_3">F</td>
                    </tr>
                </table>

                <hr class="form-hr">
                <p>I do here by certify above details that I have entered are true and correct. <a class="form-link" href="#">Terms & Privacy</a></p>
                <button type="submit" class="form-skip-button">Skip</button>
                <button type="submit" class="form-next-button">Next</button>
            </form>
        </div>
        <div class="form-container signin">
            <p>Contact for help? <a class="form-link" href="<?php echo URLROOT; ?>/students/login">Help & Services</a></p>
        </div>
    </body>
</html>