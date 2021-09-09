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
                <label for="comname"><p class="form-bold">Company Name</p></label>
                <input type="text" placeholder="Enter university name" name="comname" id="comname" value="<?php echo $data['comname']; ?>">
                <span class="form-invalid"><?php echo $data['comname_err']; ?></span><br>

                <label for="address"><p class="form-bold">Company Address</p></label>
                <input type="text" placeholder="Enter address" name="address" id="address" value="<?php echo $data['address']; ?>">
                <span class="form-invalid"><?php echo $data['address_err']; ?></span><br>

                <label for="email"><p class="form-bold">Company Email</p></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span><br>

                <label for="password"><p class="form-bold">Password</p></label>
                <input type="password" placeholder="Enter password" name="password" id="password" value="<?php echo $data['password']; ?>">
                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>

                <label for="confirm_password"><p class="form-bold">Confirm password</p></label>
                <input type="password" placeholder="Enter confirm password" name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span><br>

                <label for="phn_no"><p class="form-bold">Phone number</p></label>
                <input type="text" placeholder="Enter phone number" name="phn_no" id="phn_no" value="<?php echo $data['phn_no']; ?>">
                <span class="form-invalid"><?php echo $data['phn_no_err']; ?></span><br>

                <label for="website"><p class="form-bold">Company Web Address</Address></p></label>
                <input type="text" placeholder="Enter web address" name="website" id="website" value="<?php echo $data['website']; ?>">
                <span class="form-invalid"><?php echo $data['website_err']; ?></span><br>

                <label for="founder"><p class="form-bold">Founder</p></label>
                <input type="text" placeholder="Enter founder name" name="founder" id="founder" value="<?php echo $data['founder']; ?>">
                <span class="form-invalid"><?php echo $data['founder_err']; ?></span><br>

                <label for="founded_year"><p class="form-bold">Founded Year</p></label>
                <input type="text" placeholder="Enter founder name" name="founded_year" id="founded_year" value="<?php echo $data['founded_year']; ?>">
                <span class="form-invalid"><?php echo $data['founded_year_err']; ?></span><br>

                <label for="cur_emp"><p class="form-bold">No. of Current employees</p></label>
                <input type="text" placeholder="Enter no. of employees" name="cur_emp" id="cur_emp" value="<?php echo $data['cur_emp']; ?>">
                <span class="form-invalid"><?php echo $data['cur_emp_err']; ?></span><br>

                <label for="emp_size"><p class="form-bold">Company Size</p></label>
                <input type="text" placeholder="Enter capable no. of employees" name="emp_size" id="emp_size" value="<?php echo $data['emp_size']; ?>">
                <span class="form-invalid"><?php echo $data['emp_size_err']; ?></span><br>

                <label for="registered"><p class="form-bold">Registered Company?</p></label><br>
                <input type="radio"  name="registered" value="Yes">Yes
                <input type="radio"  name="registered" value="No">No
                <span class="form-invalid"><?php echo $data['registered_err']; ?></span><br>

                <label for="overview"><p class="form-bold">Overview</p></label>
                <input type="text" placeholder="Enter overview" name="overview" id="overview" value="<?php echo $data['overview']; ?>">
                <span class="form-invalid"><?php echo $data['overview_err']; ?></span><br>

                <label for="services"><p class="form-bold">Services</p></label>
                <input type="text" placeholder="Enter specialities of company" name="services" id="services" value="<?php echo $data['services']; ?>">
                <span class="form-invalid"><?php echo $data['services_err']; ?></span><br>

                <hr class="form-hr">
                <p>By creating an account you agree to our <a class="form-link" href="#">Terms & Privacy</a></p>
                <button type="submit" class="form-submit">Register</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Already have an account? <a class="form-link" href="<?php echo URLROOT; ?>/commons/login">Sign in</a></p>
        </div>
    </body>
</html>