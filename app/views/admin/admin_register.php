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
            <form action="<?php echo URLROOT; ?>/admins/register" method="post" enctype="multipart/form-data">
                <h1>Admin Register</h1>
                <p>Organizational purposes only</p>
                <hr class="form-hr">    

                <!-- profile picture -->
                <p class="form-bold">Profile picture</p>
                <?php require APPROOT.'/views/inc/components/imageUpload/imageUpload.php'?>  
                <span class="form-invalid"><?php echo $data['profile_image_err']; ?></span><br>

                <!-- name -->
                <input type="text" placeholder=" " name="name" id="name" value="<?php echo $data['name']; ?>">
                <label>Name</label>
                <span class="form-invalid"><?php echo $data['name_err']; ?></span><br>

                <!-- email -->
                <br>
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

                <!-- phone number -->
                <input type="text" placeholder=" " name="phn_no" id="phn_no" value="<?php echo $data['phn_no']; ?>" maxlength = "10">
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

                <!-- user role -->
                <input type="text" placeholder=" " name="user_role" id="user_role" value="<?php echo $data['user_role']; ?>">
                <label>User role</label>
                <span class="form-invalid"><?php echo $data['user_role_err']; ?></span><br>

                <hr class="form-hr">

                <!-- agree table -->
                <table class="agree-table">
                    <tr>
                        <td>
                            <input type="checkbox" required>
                        </td>
                        <td>
                            creating an account you agree to our <a class="form-link" href="#">Terms & Privacy</a>
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