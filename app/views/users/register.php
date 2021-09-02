<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/users/register_style.css">
    </head>
    <body>
        <!-- NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>

        <!-- REGISTRATION FORM -->
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
            <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account</p>
                <hr>
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter email" name="name" id="name" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span><br>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="invalid"><?php echo $data['email_err']; ?></span><br>
                <label for="password"><b>Password</b></label>
                <input type="text" placeholder="Enter email" name="password" id="password" value="<?php echo $data['password']; ?>">
                <span class="invalid"><?php echo $data['password_err']; ?></span><br>
                <label for="confirm_password"><b>Confirm password</b></label>
                <input type="text" placeholder="Enter email" name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                <span class="invalid"><?php echo $data['confirm_password_err']; ?></span><br>
                <hr>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a></p>
                <button type="submit" class="registerBtn">Register</button>
            </div>
            <div class="container signin">
                <p>Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Sign in</a></p>
            </div>
        </form>
    </body>
</html>