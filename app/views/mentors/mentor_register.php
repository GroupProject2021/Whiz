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
            <h1>Mentor Registration</h1>
            <p>Please select your type</p>
            <hr  class="form-hr">
            <center>
                <a href="<?php echo URLROOT; ?>/mentors/registerasprofguider"><button class="form-actor-button">Professional Guider</button></a>
                <br>
                <a href="<?php echo URLROOT; ?>/mentors/registerasteacher"><button class="form-actor-button">Teacher</button></a>
            </center>            
        </div>
        <div class="form-container content">
            <p>Already have an account? <a class="form-link" href="<?php echo URLROOT; ?>/students/login">Sign in</a></p>
        </div>
    </body>
</html>