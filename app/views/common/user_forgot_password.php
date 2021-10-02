<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP Navigation -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>
        
        <!-- LOGIN FORM -->
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/commons/forgetPassword" method="post">
                <div class="logo">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/logo.png" alt="logo">
                </div>
                <center>
                    <h1>Forgot password</h1>
                </center>

                <hr  class="form-hr">

                <!-- email -->
                <input type="text" placeholder=" " name="email" id="email">
                <label>Enter your email address</label>
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="email-validation">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Your email address is valid
                        </div>
                    </div>
                </div>       
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>
                
                <!-- flash message -->              
                <?php flash('send_password_reset_successfull'); ?>
                <?php flash('send_password_reset_failed'); ?>

                <hr  class="form-hr">

                <button type="submit" class="form-submit">Continue</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Don't have an account? <a class="form-link" href="<?php echo URLROOT; ?>/Commons/registerRedirect">Create an account</a></p>
        </div>

        <!-- java script form validation -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/validations/emailValidation.js"></script>
    </body>
</html>