<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/users/upgrade_style.css">
    </head>
    <body>
        <!-- NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/student_navbar.php'?>

        <!-- REGISTRATION FORM -->
        <form action="<?php echo URLROOT; ?>/students_olQualified_upgradeScreen/register" method="post">
            <div class="container">
                <h1>Student OL details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr>
                <label for="ol_school"><b>OL school</b></label>
                <input type="text" placeholder="Enter ol school name" name="ol_school" id="ol_school" value="<?php echo $data['ol_school']; ?>">
                <span class="invalid"><?php echo $data['ol_school_err']; ?></span><br>

                <label for="ol_district"><b>District</b></label>
                <input type="text" placeholder="Enter district" name="ol_district" id="ol_district" value="<?php echo $data['ol_district']; ?>">
                <span class="invalid"><?php echo $data['ol_district_err']; ?></span><br>

                <label for="ol_results"><b>OL Results</b></label>
                <ul>
                    <li class="ul-listitem">
                        Mathematics
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
                        Science
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
                        English
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

                    <li class="ul-listitem">
                        Sinhala
                        <lable class="ul-radioset">
                            <lable class="ul-container">                        
                                <input type="radio" checked="checked" name="radio_sinhala">A
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_sinhala">B
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_sinhala">C
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_sinhala">D
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_sinhala">E
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_sinhala">F
                            </lable>
                        </lable>
                    </li>

                    <li class="ul-listitem">
                        History
                        <lable class="ul-radioset">
                            <lable class="ul-container">                        
                                <input type="radio" checked="checked" name="radio_history">A
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_history">B
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_history">C
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_history">D
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_history">E
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_history">F
                            </lable>
                        </lable>
                    </li>

                    <li class="ul-listitem">
                        Religion
                        <lable class="ul-radioset">
                            <lable class="ul-container">                        
                                <input type="radio" checked="checked" name="radio_religion">A
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_religion">B
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_religion">C
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_religion">D
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_religion">E
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_religion">F
                            </lable>
                        </lable>
                    </li>

                    <li class="ul-listitem">
                        Basket 1
                        <lable class="ul-radioset">
                            <lable class="ul-container">                        
                                <input type="radio" checked="checked" name="radio_basket1">A
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket1">B
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket1">C
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket1">D
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket1">E
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket1">F
                            </lable>
                        </lable>
                    </li>

                    <li class="ul-listitem">
                        Basket 2
                        <lable class="ul-radioset">
                            <lable class="ul-container">                        
                                <input type="radio" checked="checked" name="radio_basket2">A
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket2">B
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket2">C
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket2">D
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket2">E
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket2">F
                            </lable>
                        </lable>
                    </li>

                    <li class="ul-listitem">
                        Basket 3
                        <lable class="ul-radioset">
                            <lable class="ul-container">                        
                                <input type="radio" checked="checked" name="radio_basket3">A
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket3">B
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket3">C
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket3">D
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket3">E
                            </lable>
                            <lable class="ul-container">                        
                                <input type="radio" name="radio_basket3">F
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