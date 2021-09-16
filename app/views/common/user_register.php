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
            <div class="logo">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/logo.png" alt="logo">
            </div>
            <center>
                <h1>Sign up</h1>
                <p>Please enter your type</p>
            </center>

            <hr  class="form-hr">
            <center>
                <a href="<?php echo URLROOT; ?>/students/register"><button class="form-actor-button">Student</button></a>
                <br>
                <a href="<?php echo URLROOT; ?>/organizations/register"><button class="form-actor-button">Organization</button></a>
                <br>
                <a href="<?php echo URLROOT; ?>/mentors/register"><button class="form-actor-button">Mentor</button></a>
            </center>            
        </div>
        <div class="form-container content">
            <p>Already have an account? <a class="form-link" href="<?php echo URLROOT; ?>/commons/login">Sign in</a></p>
        </div>
    </body>
</html>