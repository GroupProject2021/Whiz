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
            <form action="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToUndergraduateGraduate" method="post">
                <h1>Student Undergraduate/Graduate details</h1>
                <p>Please fill the following details but you can skip this now and fill those in later as well.</p>
                <hr class="form-hr">

                <!-- university type -->
                <p class="form-bold">University type</p>
                <select name="uni_type" id="uni_type" class="form-select">
                    <option value="Government">Government</option>
                    <option value="Semi-Government">Semi-Government</option>
                    <option value="Private">Private</option>
                </select>
                <span class="form-invalid"><?php echo $data['uni_type_err']; ?></span><br>

                <!-- university name -->
                <input type="text" placeholder=" " name="uni_name" id="uni_name" value="<?php echo $data['uni_name']; ?>">
                <label>University name</label>
                <span class="form-invalid"><?php echo $data['uni_name_err']; ?></span><br>

                <!-- university search list -->
                <div class="list-group" class="show-list" id="show-list-1">
                    <!-- sample element -->
                    <!-- <div class="show-list-item">HRCC</div> -->
                </div>

                <!-- degree name -->
                <input type="text" placeholder=" " name="degree" id="degree" value="<?php echo $data['degree']; ?>">
                <label>Degree name</label>
                <span class="form-invalid"><?php echo $data['degree_err']; ?></span><br>

                <!-- degree search list -->
                <div class="list-group" class="show-list" id="show-list-2">
                    <!-- sample element -->
                    <!-- <div class="show-list-item">HRCC</div> -->
                </div>
                
                <!-- gpa -->
                <p class="form-bold">GPA</p>
                <table width="100%">
                    </tr>
                    <tr>                        
                        <td width="75%">
                            <input type="range" min="0" max="4.0000" step="0.0001" oninput="fetch_gpa_value()" class="form-slider" placeholder="Enter GPA" name="gpa" id="gpa" value="<?php echo $data['gpa']; ?>">
                        </td>
                        <td>
                            <input type="text" value="2.0000" oninput="fetch_gpa()" name="gpa_value" id="gpa_value">
                            <!-- <span id="gpa_value"></span> -->
                        </td>
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['gpa_err']; ?></span><br>

                <hr class="form-hr">
                <p>
                    <input type="checkbox" required>
                    I do here by certify above details that I have entered are true and correct. <a class="form-link" href="#">Terms & Privacy</a>
                </p>
                <button type="submit" class="form-skip-button">Skip</button>
                <button type="submit" class="form-next-button">Next</button>
            </form>
        </div>
        <div class="form-container signin">
            <p>Contact for help? <a class="form-link" href="<?php echo URLROOT; ?>/students/login">Help & Services</a></p>
        </div>

        <!-- jquery -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
        
        <!-- common settings js -->
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';
        </script>
        
        <!-- upgrade js -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/studentRelated/opt_upgrades/al_to_ug_Upgrade.js"></script>

    </body>
</html>