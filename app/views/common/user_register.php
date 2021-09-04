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
            <h1>Registration</h1>
            <p>Please select your type</p>
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