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
                <h1>Student OL details<?php echo $_SESSION['user_id'];?></h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr class="form-hr">
                <label for="ol_school"><p class="form-bold">OL school</p></label>
                <input type="text" placeholder="Enter ol school name" name="ol_school" id="ol_school" value="<?php echo $data['ol_school']; ?>">
                <span class="form-invalid"><?php echo $data['ol_school_err']; ?></span><br>

                <label for="ol_district"><p class="form-bold">District</p></label>
                <input type="text" placeholder="Enter district" name="ol_district" id="ol_district" value="<?php echo $data['ol_district']; ?>">
                <span class="form-invalid"><?php echo $data['ol_district_err']; ?></span><br>

                <label for="ol_results"><p class="form-bold">OL Results</p></label>
                <table class="form-table">
                    <tr>
                        <th>Mathematics</th>
                        <td><input type="radio" name="radio_mathematics">A</td>
                        <td><input type="radio" name="radio_mathematics">B</td>
                        <td><input type="radio" name="radio_mathematics">C</td>
                        <td><input type="radio" name="radio_mathematics">D</td>
                        <td><input type="radio" name="radio_mathematics">E</td>
                        <td><input type="radio" name="radio_mathematics">F</td>
                    </tr>
                    <tr>
                        <th>Science</th>
                        <td><input type="radio" name="radio_science">A</td>
                        <td><input type="radio" name="radio_science">B</td>
                        <td><input type="radio" name="radio_science">C</td>
                        <td><input type="radio" name="radio_science">D</td>
                        <td><input type="radio" name="radio_science">E</td>
                        <td><input type="radio" name="radio_science">F</td>
                    </tr>
                    <tr>
                        <th>English</th>
                        <td><input type="radio" name="radio_english">A</td>
                        <td><input type="radio" name="radio_english">B</td>
                        <td><input type="radio" name="radio_english">C</td>
                        <td><input type="radio" name="radio_english">D</td>
                        <td><input type="radio" name="radio_english">E</td>
                        <td><input type="radio" name="radio_english">F</td>
                    </tr>
                    <tr>
                        <th>Sinhala</th>
                        <td><input type="radio" name="radio_sinhala">A</td>
                        <td><input type="radio" name="radio_sinhala">B</td>
                        <td><input type="radio" name="radio_sinhala">C</td>
                        <td><input type="radio" name="radio_sinhala">D</td>
                        <td><input type="radio" name="radio_sinhala">E</td>
                        <td><input type="radio" name="radio_sinhala">F</td>
                    </tr>
                    <tr>
                        <th>History</th>
                        <td><input type="radio" name="radio_history">A</td>
                        <td><input type="radio" name="radio_history">B</td>
                        <td><input type="radio" name="radio_history">C</td>
                        <td><input type="radio" name="radio_history">D</td>
                        <td><input type="radio" name="radio_history">E</td>
                        <td><input type="radio" name="radio_history">F</td>
                    </tr>
                    <tr>
                        <th>Religion</th>
                        <td><input type="radio" name="radio_religion">A</td>
                        <td><input type="radio" name="radio_religion">B</td>
                        <td><input type="radio" name="radio_religion">C</td>
                        <td><input type="radio" name="radio_religion">D</td>
                        <td><input type="radio" name="radio_religion">E</td>
                        <td><input type="radio" name="radio_religion">F</td>
                    </tr>
                    <tr>
                        <th>Basket 1</th>
                        <td><input type="radio" name="radio_basket_1">A</td>
                        <td><input type="radio" name="radio_basket_1">B</td>
                        <td><input type="radio" name="radio_basket_1">C</td>
                        <td><input type="radio" name="radio_basket_1">D</td>
                        <td><input type="radio" name="radio_basket_1">E</td>
                        <td><input type="radio" name="radio_basket_1">F</td>
                    </tr>
                    <tr>
                        <th>Basket 2</th>
                        <td><input type="radio" name="radio_basket_2">A</td>
                        <td><input type="radio" name="radio_basket_2">B</td>
                        <td><input type="radio" name="radio_basket_2">C</td>
                        <td><input type="radio" name="radio_basket_2">D</td>
                        <td><input type="radio" name="radio_basket_2">E</td>
                        <td><input type="radio" name="radio_basket_2">F</td>
                    </tr>
                    <tr>
                        <th>Basket 3</th>
                        <td><input type="radio" name="radio_basket_3">A</td>
                        <td><input type="radio" name="radio_basket_3">B</td>
                        <td><input type="radio" name="radio_basket_3">C</td>
                        <td><input type="radio" name="radio_basket_3">D</td>
                        <td><input type="radio" name="radio_basket_3">E</td>
                        <td><input type="radio" name="radio_basket_3">F</td>
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
        </form>
    </body>
</html>