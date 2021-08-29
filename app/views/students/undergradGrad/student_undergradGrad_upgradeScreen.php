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
        <form action="<?php echo URLROOT; ?>/students_undergradGrad_upgradeScreen/register" method="post">
            <div class="container">
                <h1>Student Undergraduate/Graduate details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr>
                <label for="uni_name"><b>University name</b></label>
                <input type="text" placeholder="Enter university name" name="uni_name" id="uni_name" value="<?php echo $data['uni_name']; ?>">
                <span class="invalid"><?php echo $data['uni_name_err']; ?></span><br>

                <label for="degree"><b>Degree</b></label>
                <input type="text" placeholder="Enter degree" name="degree" id="degree" value="<?php echo $data['degree']; ?>">
                <span class="invalid"><?php echo $data['degree_err']; ?></span><br>

                <label for="gpa"><b>GPA</b></label>
                <input type="text" placeholder="Enter GPA" name="gpa" id="gpa" value="<?php echo $data['gpa']; ?>">
                <span class="invalid"><?php echo $data['gpa_err']; ?></span><br>
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