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
            <form action="<?php echo URLROOT; ?>/admins/adminRequestEmail" method="post">
                <div class="logo">
                    <img src="<?php echo URLROOT; ?>/imgs/logo.png" alt="logo">
                </div>
                <center>
                    <h1>Admin access request</h1>
                    <p>[Organizational purposes only]</p>
                </center>
                <br>

                <hr  class="form-hr">

                <!-- flash message -->              
                <?php flash('admin_access_request'); ?>

                <!-- email -->
                <input type="text" placeholder=" " name="email" id="email">
                <label>Enter requesting admin email address</label>
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="email-validation">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Your email address is valid
                        </div>
                    </div>
                </div>       
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>
                <br>

                <hr  class="form-hr">

                <button type="submit" class="form-submit">Verify</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Need help? <a class="form-link" href="<?php echo URLROOT; ?>/Commons/registerRedirect">Contact Us</a></p>
        </div>

        <!-- java script form validation -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/validations/emailValidation.js"></script>
    </body>
</html>