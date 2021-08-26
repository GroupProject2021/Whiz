<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/users/login_style.css">
    </head>
    <body>
        <!-- NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/navbar.php'?>
        <!-- LOGIN FORM -->
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
            <div class="container">
                <h1>Login</h1>
                <p>Please enter your credentials</p>
                <hr>
                <!-- flash message -->              
                <?php flash('register_success'); ?>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="invalid"><?php echo $data['email_err']; ?></span><br>
                <label for="password"><b>Password</b></label>
                <input type="text" placeholder="Enter email" name="password" id="password" value="<?php echo $data['password']; ?>">
                <span class="invalid"><?php echo $data['password_err']; ?></span><br>
                <hr>
                <button type="submit" class="loginBtn">Login</button>
            </div>
            <div class="container register">
                <p>Don't have an account? <a href="<?php echo URLROOT; ?>/users/register">Register</a></p>
            </div>
        </form>
    </body>
</html>