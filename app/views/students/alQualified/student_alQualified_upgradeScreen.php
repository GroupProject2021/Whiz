<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/components/topnav.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/users/upgrade_style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>

        <!-- REGISTRATION FORM -->
        <form action="<?php echo URLROOT; ?>/students_alQualified_upgradeScreen/register" method="post">
            <div class="container">
                <h1>Student AL details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr>
                <label for="al_school"><b>AL school</b></label>
                <input type="text" placeholder="Enter al school name" name="al_school" id="al_school" value="<?php echo $data['al_school']; ?>">
                <span class="invalid"><?php echo $data['al_school_err']; ?></span><br>

                <label for="stream"><b>Stream</b></label>
                <input type="text" placeholder="Enter ol stream name" name="stream" id="stream" value="<?php echo $data['stream']; ?>">
                <span class="invalid"><?php echo $data['stream_err']; ?></span><br>

                <label for="z_score"><b>Z-Score</b></label>
                <input type="text" placeholder="Enter z score" name="z_score" id="z_score" value="<?php echo $data['z_score']; ?>">
                <span class="invalid"><?php echo $data['z_score_err']; ?></span><br>

                <label for="al_district"><b>District</b></label>
                <input type="text" placeholder="Enter district" name="al_district" id="al_district" value="<?php echo $data['al_district']; ?>">
                <span class="invalid"><?php echo $data['al_district_err']; ?></span><br>

                <label for="general_test_grade"><b>General Test grade</b></label>
                <input type="text" placeholder="Enter general test grade" name="general_test_grade" id="general_test_grade" value="<?php echo $data['general_test_grade']; ?>">
                <span class="invalid"><?php echo $data['general_test_grade_err']; ?></span><br>

                <label for="general_english_grade"><b>General English grade</b></label>
                <input type="text" placeholder="Enter district" name="general_english_grade" id="general_english_grade" value="<?php echo $data['general_english_grade']; ?>">
                <span class="invalid"><?php echo $data['general_english_grade_err']; ?></span><br>

                <label for="al_results"><b>AL Results</b></label>
                <ul>
                    <li class="ul-listitem">
                        Subject 1
                        <lable class="ul-radioset">
                            <lable class="ul-container">                        
                                <input type="radio" checked="checked" name="radio_mathematics">A
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_mathematics">B
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_mathematics">C
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_mathematics">D
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_mathematics">E
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_mathematics">F
                            </lable>
                        </lable>
                    </li>

                    <li class="ul-listitem">
                        Subject 2
                        <lable class="ul-radioset">
                            <lable class="ul-container">                        
                                <input type="radio" checked="checked" name="radio_science">A
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_science">B
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_science">C
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_science">D
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_science">E
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_science">F
                            </lable>
                        </lable>
                    </li>

                    <li class="ul-listitem">
                        Subject 3
                        <lable class="ul-radioset">
                            <lable class="ul-container">                        
                                <input type="radio" checked="checked" name="radio_english">A
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_english">B
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_english">C
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_english">D
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_english">E
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_english">F
                            </lable>
                        </lable>
                    </li>
                </ul>

                <hr>
                <p>I do here by certify above details that I have entered are true and correct. <a href="#">Terms & Privacy</a></p>
                <button type="submit" class="skipBtn">Skip</button>
                <button type="submit" class="NextBtn">Next</button>
            </div>
            <div class="container signin">
                <p>Contact for help? <a href="<?php echo URLROOT; ?>/students/login">Help & Services</a></p>
            </div>
        </form>
    </body>
</html>