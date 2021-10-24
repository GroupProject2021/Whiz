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
        <form action="<?php echo URLROOT; ?>/mentors/registerasteacher" method="post"  enctype="multipart/form-data">
                <h1>Teacher Register</h1>
                <p>Please fill in this form to create an account</p>
                <hr class="form-hr">

                <!-- profile picture -->
                <p class="form-bold">Profile picture</p>
                <?php require APPROOT.'/views/inc/components/imageUpload/imageUpload.php'?>   
                <span class="form-invalid"><?php echo $data['profile_image_err']; ?></span>

                <!-- name -->
                <br>
                <table>
                    <tr>
                        <td>
                            <input type="text" placeholder=" " name="first_name" id="first_name" value="<?php echo $data['first_name']; ?>">
                            <label>First name</label>
                        </td>
                        <td>

                        </td>
                        <td>
                            <input type="text" placeholder=" " name="last_name" id="last_name" value="<?php echo $data['last_name']; ?>">
                            <label>Last name</label>
                        </td>
                    </tr>
                </table>
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="first_name-validation">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Your first name is valid
                        </div>
                        <div class="last_name-validation">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Your last name is valid
                        </div>
                    </div>
                </div>
                <span class="form-invalid"><?php echo $data['name_err']; ?></span><br>
                
                <!-- email -->
                <input type="text" placeholder=" " name="email" id="email" value="<?php echo $data['email']; ?>">
                <label>Email</label>
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="email-validation">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Your email address is valid
                        </div>
                    </div>
                </div>                
                <span class="form-invalid"><?php echo $data['email_err']; ?></span><br>

                <!-- phone number -->
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
                <span class="form-invalid"><?php echo $data['phn_no_err']; ?></span><br>

                <!--address -->
                <input type="text" placeholder=" " name="address" id="address" value="<?php echo $data['address']; ?>">
                <label>Address</label>
                <span class="form-invalid"><?php echo $data['address_err']; ?></span><br>

                <!-- gender -->
                <p class="form-bold">Gender</p>
                <select name="gender" id="gender" class="form-select">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    <option value="Not perfer to say">Not perfer to say</option>
                </select>
                <!-- <input type="text" placeholder="Enter gender" name="gender" id="gender" value="<?php echo $data['gender']; ?>"> -->
                <span class="form-invalid"><?php echo $data['gender_err']; ?></span><br>

                <!-- <label for="subject1"><p class="form-bold">Subject 1</p></label>
                <input type="text" placeholder="Enter sub 1" name="subject1" id="subject1" value="<?php echo $data['subject1']; ?>">
                <span class="form-invalid"><?php echo $data['subject1_err']; ?></span><br>

                <label for="subject2"><p class="form-bold">Subject 2</p></label>
                <input type="text" placeholder="Enter sub 2" name="subject2" id="subject2" value="<?php echo $data['subject2']; ?>">
                <span class="form-invalid"><?php echo $data['subject2_err']; ?></span><br>

                <label for="subject3"><p class="form-bold">Subject 3</p></label>
                <input type="text" placeholder="Enter sub 3" name="subject3" id="subject3" value="<?php echo $data['subject3']; ?>">
                <span class="form-invalid"><?php echo $data['subject3_err']; ?></span><br> -->

                <!-- password -->
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
                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>

                <!-- confirm password -->
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
                <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span><br>
                <hr class="form-hr">
                <!-- agree table -->
                <table class="agree-table">
                    <tr>
                        <td>
                            <input type="checkbox" required>
                        </td>
                        <td>
                            creating an account you agree to our <a class="form-link" href="<?php echo URLROOT.'/Pages/privacy'?>">Terms & Privacy</a>
                        </td>
                    </tr>
                </table>
                
                <button type="submit" class="form-submit">Register</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Already have an account? <a class="form-link" href="<?php echo URLROOT; ?>/commons/login">Sign in</a></p>
        </div>
        
        <!-- java script form validation -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/validations/completeFormValidation.js"></script>
    </body>
</html>