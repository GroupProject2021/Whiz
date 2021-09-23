<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>
        
        <!-- LOGIN FORM -->
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/commons/userEmailVerification" method="post">
                <div class="logo">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/logo.png" alt="logo">
                </div>
                <center>
                    <h1>Please verify your email</h1>
                </center>

                <hr  class="form-hr">

                <!-- flash message -->              
                <?php flash('register_success'); ?>

                <!-- email -->
                <input type="text" placeholder=" " name="otp" id="otp">
                <label>Enter the verification code</label>
                <span class="form-invalid"><?php echo $data['otp_err']; ?></span>
                <div class="bottom-content"><a href="<?php echo URLROOT; ?>/Commons/resendVerificationCode" class="form-link">Didn't recieve yet? Resend the verification code.</a></div>
                
                <!-- flash message -->              
                <?php flash('resend_verification_successfull'); ?>
                <?php flash('resend_verification_failed'); ?>

                <hr  class="form-hr">

                <button type="submit" class="form-submit">Login</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Don't have an account? <a class="form-link" href="<?php echo URLROOT; ?>/Commons/registerRedirect">Create an account</a></p>
        </div>

        <!-- java script form validation -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/form.js"></script>
    </body>
</html>