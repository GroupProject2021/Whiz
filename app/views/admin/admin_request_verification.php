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
            <form action="<?php echo URLROOT; ?>/Admins/adminRequestVerification" method="post">
                <div class="logo">
                    <img src="<?php echo URLROOT; ?>/imgs/logo.png" alt="logo">
                </div>
                <center>
                    <h1>Please verify your email</h1>
                    <p>[Organizational purposes only]</p>
                </center>
                <br>

                <hr  class="form-hr">

                <!-- flash message -->              
                <?php flash('requested'); ?>

                <!-- email -->
                <input type="text" placeholder=" " name="otp" id="otp" maxlength = "6">
                <label>Enter the verification code</label>
                <span class="form-invalid"><?php echo $data['otp_err']; ?></span>
                <div class="bottom-content"><a href="<?php echo URLROOT; ?>/Admins/adminResendVerificationCode" class="form-link">Didn't recieve yet? Resend admin request message again.</a></div>
                
                <!-- flash message -->              
                <?php flash('resend_verification_successfull'); ?>
                <?php flash('resend_verification_failed'); ?>

                <br>
                <hr  class="form-hr">

                <button type="submit" class="form-submit">Verify</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Need help? <a class="form-link" href="<?php echo URLROOT; ?>/Commons/registerRedirect">Contact Us</a></p>
        </div>

        <!-- java script form validation -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/form.js"></script>
    </body>
</html>