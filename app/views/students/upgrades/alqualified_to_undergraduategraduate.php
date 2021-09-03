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
            <form action="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToUndergraduateGraduate" method="post">
                <h1>Student Undergraduate/Graduate details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr class="form-hr">
                <label for="uni_name"><p class="form-bold">University name</p></label>
                <input type="text" placeholder="Enter university name" name="uni_name" id="uni_name" value="<?php echo $data['uni_name']; ?>">
                <span class="form-invalid"><?php echo $data['uni_name_err']; ?></span><br>

                <label for="degree"><p class="form-bold">Degree</p></label>
                <input type="text" placeholder="Enter degree" name="degree" id="degree" value="<?php echo $data['degree']; ?>">
                <span class="form-invalid"><?php echo $data['degree_err']; ?></span><br>

                <label for="gpa"><p class="form-bold">GPA</p></label>
                <input type="text" placeholder="Enter GPA" name="gpa" id="gpa" value="<?php echo $data['gpa']; ?>">
                <span class="form-invalid"><?php echo $data['gpa_err']; ?></span><br>
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