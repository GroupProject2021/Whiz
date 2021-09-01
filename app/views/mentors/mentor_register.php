<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
          <!-- Styles -->
          <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/mentor_register_navbar.php'?>

        <!-- REGISTRATION FORM -->
        
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/mentors/register" method="post">
                <h1>Mentor Register</h1>
                <p>Please fill in this form to create an account</p>
                <hr class="form-hr">
                <label for="name"><p class="form-bold">Name</p></label>
                <input type="text" placeholder="Enter name" name="name" id="name" value="<?php echo $data['name']; ?>">
                <span class="form-invalid"><?php echo $data['name_err']; ?></span><br>

                <label for="email"><p class="form-bold">Email</p></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span><br>

                <label for="mentor_type"><p class="form-bold">Mentor Type</p></label>
                <input type="text" placeholder="Enter mentor type" name="mentor_type" id="mentor_type" value="<?php echo $data['mentor_type']; ?>">
                <span class="form-invalid"><?php echo $data['mentor_type_err']; ?></span><br>

                <label for="password"><p class="form-bold">Password</p></label>
                <input type="text" placeholder="Enter password" name="password" id="password" value="<?php echo $data['password']; ?>">
                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>

                <label for="confirm_password"><p class="form-bold">Confirm password</p></label>
                <input type="text" placeholder="Re-enter password" name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span><br>
                <hr class="form-hr">
                <p>By creating an account you agree to our <a class="form-link" href="#">Terms & Privacy</a></p>
                <button type="submit" class="form-submit">Register</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Already have an account? <a class="form-link" href="<?php echo URLROOT; ?>/mentors/login">Sign in</a></p>
        </div>
        
    </body>
</html>