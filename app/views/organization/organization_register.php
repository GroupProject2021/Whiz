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
            <h1>Organization Registration</h1>
            <p>Please select your type</p>
            <hr  class="form-hr">
            <center>
                <a href="<?php echo URLROOT; ?>/organizations/university_register"><button class="form-actor-button">University</button></a>
                <br>
                <a href="<?php echo URLROOT; ?>/organizations/company_register"><button class="form-actor-button">Company</button></a>
            </center>            
        </div>
        <div class="form-container content">
            <p>Already have an account? <a class="form-link" href="<?php echo URLROOT; ?>/commons/login">Sign in</a></p>
        </div>
    </body>
</html>