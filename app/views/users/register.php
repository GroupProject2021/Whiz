<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/users/register_style.css">
    </head>
    <body>
        <form action="" method="">
            <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account</p>
                <hr>
                <label for="email"><b>Name</b></label>
                <input type="text" placeholder="Enter email" name="name" id="name" required>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter email" name="email" id="email" required>
                <label for="email"><b>Password</b></label>
                <input type="text" placeholder="Enter email" name="password" id="password" required>
                <label for="email"><b>Confirm password</b></label>
                <input type="text" placeholder="Enter email" name="confirm_password" id="confirm_password" required>
                <hr>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a></p>
                <button type="submit" class="registerBtn">Register</button>
            </div>
            <div class="container signin">
                <p>Already have an account? <a href="#">Sign in</a></p>
            </div>
        </form>
    </body>
</html>