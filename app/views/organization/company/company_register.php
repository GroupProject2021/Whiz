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
            <form action="<?php echo URLROOT; ?>/organizations/company_register" method="post">
                <h1>Company Register</h1>
                <p>Please fill in this form to create an account</p>
                <hr class="form-hr">

                <!-- company name -->
                <span class="form-invalid"><?php echo $data['comname_err']; ?></span><br>
                <input type="text" placeholder=" " name="comname" id="comname" value="<?php echo $data['comname']; ?>">
                <label>Company Name</label>

                <!-- company address -->
                <span class="form-invalid"><?php echo $data['address_err']; ?></span><br>
                <input type="text" placeholder=" " name="address" id="address" value="<?php echo $data['address']; ?>">
                <label>Company address</label>

                <!-- company email -->
                <span class="form-invalid"><?php echo $data['email_err']; ?></span><br>
                <input type="text" placeholder=" " name="email" id="email" value="<?php echo $data['email']; ?>">
                <label>Company email</label>

                <!-- password -->
                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>
                <div class="password-area">
                    <div class="pasword-content">                    
                        <input type="password" placeholder=" " name="password" id="password" value="<?php echo $data['password']; ?>">                        
                        <label>Password</label>
                    </div>
                    <div class="toggle-password">
                        <img src="<?php echo URLROOT; ?>/imgs/form/hide-eye-icon.png" class="hide-password-eye" width="25px" height="20px" alt="hide">
                        <img src="<?php echo URLROOT; ?>/imgs/form/show-eye-icon.png" class="show-password-eye" width="25px" height="20px" alt="show">
                    </div>
                </div>
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="policy-length">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Minimum 8 Characters
                        </div>
                        <div class="policy-number">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Contains a number
                        </div>
                        <div class="policy-uppercase">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Contains uppercase
                        </div>
                        <div class="policy-special">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Contains special characters
                        </div>
                    </div>
                </div>

                <!-- confirm password -->
                <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span><br>
                <div class="password-area">
                    <div class="pasword-content">                    
                        <input type="password" placeholder=" " name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>">                        
                        <label>Confirm Password</label>
                    </div>
                    <div class="toggle-confirm-password">
                        <img src="<?php echo URLROOT; ?>/imgs/form/hide-eye-icon.png" class="hide-password-eye" width="25px" height="20px" alt="hide">
                        <img src="<?php echo URLROOT; ?>/imgs/form/show-eye-icon.png" class="show-password-eye" width="25px" height="20px" alt="show">
                    </div>
                </div>       
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="policy-password-match">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Passwords are matching
                        </div>
                    </div>
                </div>


                <!-- phone number -->
                <span class="form-invalid"><?php echo $data['phn_no_err']; ?></span><br>
                <input type="text" placeholder=" " name="phn_no" id="phn_no" value="<?php echo $data['phn_no']; ?>">
                <label>Phone number</label>
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="phn_no-validation">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Your phone number is valid
                        </div>
                    </div>
                </div>

                <!-- company web address -->
                <span class="form-invalid"><?php echo $data['website_err']; ?></span><br>
                <input type="text" placeholder=" " name="website" id="website" value="<?php echo $data['website']; ?>">
                <label>Company web address</label>

                <!-- founder -->
                <span class="form-invalid"><?php echo $data['founder_err']; ?></span><br>
                <input type="text" placeholder=" " name="founder" id="founder" value="<?php echo $data['founder']; ?>">
                <label>Founder</label>

                <!-- founded year -->
                <span class="form-invalid"><?php echo $data['founded_year_err']; ?></span><br>
                <input type="text" placeholder=" " name="founded_year" id="founded_year" value="<?php echo $data['founded_year']; ?>">
                <label>Founded Year</label>

                <!-- no. of current employees -->
                <span class="form-invalid"><?php echo $data['cur_emp_err']; ?></span><br>
                <input type="text" placeholder=" " name="cur_emp" id="cur_emp" value="<?php echo $data['cur_emp']; ?>">
                <label>No. of Current Employees</label>

                <!-- company size -->
                <span class="form-invalid"><?php echo $data['emp_size_err']; ?></span><br>
                <input type="text" placeholder=" " name="emp_size" id="emp_size" value="<?php echo $data['emp_size']; ?>">
                <label>Comapny Size</label>

                <!-- registered company? -->
                <br><p class="form-bold">Registered Company?</p><br>
                <input type="radio"  name="registered" value="Yes">Yes
                <input type="radio"  name="registered" value="No">No
                <span class="form-invalid"><?php echo $data['registered_err']; ?></span><br>

                <!-- overview -->
                <span class="form-invalid"><?php echo $data['overview_err']; ?></span><br>
                <input type="text" placeholder=" " name="overview" id="overview" value="<?php echo $data['overview']; ?>">
                <label>Overview</label>

                <!-- services -->
                <span class="form-invalid"><?php echo $data['services_err']; ?></span><br>
                <input type="text" placeholder=" " name="services" id="services" value="<?php echo $data['services']; ?>">
                <label>Services</label>

                <hr class="form-hr">
                <p>By creating an account you agree to our <a class="form-link" href="#">Terms & Privacy</a></p>
                <button type="submit" class="form-submit">Register</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Already have an account? <a class="form-link" href="<?php echo URLROOT; ?>/commons/login">Sign in</a></p>
        </div>

        <!-- java script form validation -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/form.js"></script>
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/imageupload.js"></script>
    </body>
</html>