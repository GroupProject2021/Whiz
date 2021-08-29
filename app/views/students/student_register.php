<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/components/topnav.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/users/register_style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>

        <!-- REGISTRATION FORM -->
        <form action="<?php echo URLROOT; ?>/students/register" method="post">
            <div class="container">
                <h1>Student Register</h1>
                <p>Please fill in this form to create an account</p>
                <hr>
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter name" name="name" id="name" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span><br>

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter address" name="address" id="address" value="<?php echo $data['address']; ?>">
                <span class="invalid"><?php echo $data['address_err']; ?></span><br>

                <label for="gender"><b>Gender</b></label>
                <input type="text" placeholder="Enter gender" name="gender" id="gender" value="<?php echo $data['gender']; ?>">
                <span class="invalid"><?php echo $data['gender_err']; ?></span><br>

                <label for="date_of_birth"><b>Date of Birth</b></label>
                <input type="text" placeholder="Enter date of birth" name="date_of_birth" id="date_of_birth" value="<?php echo $data['date_of_birth']; ?>">
                <span class="invalid"><?php echo $data['date_of_birth_err']; ?></span><br>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="invalid"><?php echo $data['email_err']; ?></span><br>

                <label for="password"><b>Password</b></label>
                <input type="text" placeholder="Enter password" name="password" id="password" value="<?php echo $data['password']; ?>">
                <span class="invalid"><?php echo $data['password_err']; ?></span><br>

                <label for="confirm_password"><b>Confirm password</b></label>
                <input type="text" placeholder="Enter confirm password" name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                <span class="invalid"><?php echo $data['confirm_password_err']; ?></span><br>

                <label for="phn_no"><b>Phone number</b></label>
                <input type="text" placeholder="Enter phone number" name="phn_no" id="phn_no" value="<?php echo $data['phn_no']; ?>">
                <span class="invalid"><?php echo $data['phn_no_err']; ?></span><br>
                <hr>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a></p>
                <button type="submit" class="registerBtn">Register</button>
            </div>
            <div class="container signin">
                <p>Already have an account? <a href="<?php echo URLROOT; ?>/students/login">Sign in</a></p>
            </div>
        </form>
    </body>
</html>