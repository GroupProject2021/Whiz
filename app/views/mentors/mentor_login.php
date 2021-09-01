<html lang="en">
    <head>
    <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/mentor_login_navbar.php'?>
        <!-- LOGIN FORM -->
        
         <div class="form-container">
            <form action="<?php echo URLROOT; ?>/mentors/login" method="post">
                <h1>Mentor Login</h1>
                <p>Please enter your credentials</p>
                <hr class="form-hr">
                <!-- flash message -->              
                <?php flash('register_success'); ?>

                <label for="email"><p class="form-bold">Email</p></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span><br>

                <label for="password"><p class="form-bold">Password</p></label>
                <input type="text" placeholder="Enter password" name="password" id="password" value="<?php echo $data['password']; ?>">
                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>
                <hr class="form-hr">
                <button type="submit" class="form-submit">Login</button>
            </form>
         </div>
         <div class="form-container content">
            <p>Don't have an account? <a class="form-link" href="<?php echo URLROOT; ?>/mentors/register">Register</a></p>
        </div>
       
    </body>
</html>