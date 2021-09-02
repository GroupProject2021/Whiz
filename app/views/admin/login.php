<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/users/login_style.css">
    </head>
    <body>
        <!-- NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/admin_login_navbar.php'?>
        <!-- LOGIN FORM -->
        <form action="<?php echo URLROOT; ?>/admin/login" method="post">
            <div class="form-container">
                <h1>Admin Login</h1>
                <p>Please enter your credentials</p>
                <hr>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="invalid"><?php echo $data['email_err']; ?></span><br>

                <label for="password"><b>Password</b></label>
                <input type="text" placeholder="Enter password" name="password" id="password" value="<?php echo $data['password']; ?>">
                <span class="invalid"><?php echo $data['password_err']; ?></span><br>
                <hr>
                <button type="submit" class="loginBtn">Login</button>
            </div>
            <div class="form-container register">
                <p>Don't have an account? <a href="<?php echo URLROOT; ?>/admin/register">Register</a></p>
            </div>
        </form>
    </body>
</html>