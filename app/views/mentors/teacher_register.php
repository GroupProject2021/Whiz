<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
          <!-- Styles -->
          <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/mentor_register_navbar.php'?>

        <!-- REGISTRATION FORM -->
        
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/mentors/registerasteacher" method="post">
                <h1>Teacher Register</h1>
                <p>Please fill in this form to create an account</p>
                <hr class="form-hr">

                <!-- name -->
                <span class="form-invalid"><?php echo $data['name_err']; ?></span><br>
                <input type="text" placeholder=" " name="name" id="name" value="<?php echo $data['name']; ?>">
                <label>Name</label>

                <!-- email -->
                <span class="form-invalid"><?php echo $data['email_err']; ?></span><br>
                <input type="text" placeholder=" " name="email" id="email" value="<?php echo $data['email']; ?>">
                <label>Email</label>

                
                <span class="form-invalid"><?php echo $data['school_err']; ?></span><br>
                <input type="text" placeholder=" " name="school" id="school" value="<?php echo $data['school']; ?>">
                <label>School</label>

                <!-- <label for="subjects"><p class="form-bold">Subject</p></label>
                <input type="text" placeholder="Enter subject" name="subjects" id="subjects" value="<?php echo $data['subjects']; ?>">
                <span class="form-invalid"><?php echo $data['subjects_err']; ?></span><br> -->

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