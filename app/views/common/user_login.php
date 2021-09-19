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
            <form action="<?php echo URLROOT; ?>/commons/login" method="post">
                <div class="logo">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/logo.png" alt="logo">
                </div>
                <center>
                    <h1>Sign in</h1>
                    <p>Please enter your credentials</p>
                </center>

                <hr  class="form-hr">

                <!-- flash message -->              
                <?php flash('register_success'); ?>

                <!-- email -->
                <br>
                <input type="text" placeholder=" " name="email" id="email" value="<?php echo $data['email']; ?>">
                <label>Email</label>
                <div class="bottom-content"><a href="#" class="form-link">Forgot email?</a></div>
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>
     
                <!-- password -->
                <br>
                <div class="password-area">
                    <div class="pasword-content">                    
                        <input type="password" placeholder=" " name="password" id="password" value="<?php echo $data['password']; ?>">                        
                        <label>Password</label>
                        <div class="bottom-content"><a href="#" class="form-link">Forgot password?</a></div>
                    </div>
                    <div class="toggle-password">
                        <img src="<?php echo URLROOT; ?>/imgs/form/hide-eye-icon.png" class="hide-password-eye" width="25px" height="20px" alt="hide">
                        <img src="<?php echo URLROOT; ?>/imgs/form/show-eye-icon.png" class="show-password-eye" width="25px" height="20px" alt="show">
                    </div>
                </div>                
                <span class="form-invalid"><?php echo $data['password_err']; ?></span>
                
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