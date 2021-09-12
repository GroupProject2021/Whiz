<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>

        <!-- REGISTRATION FORM -->
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/students/register" method="post">
                <h1>Student Register</h1>
                <p>Please fill in this form to create an account</p>
                <hr class="form-hr">
                <label for="name"><p class="form-bold">Name</p></label>
                <input type="text" placeholder="Enter name" name="name" id="name" value="<?php echo $data['name']; ?>">
                <span class="form-invalid"><?php echo $data['name_err']; ?></span><br>

                <label for="address"><p class="form-bold">Address</p></label>
                <input type="text" placeholder="Enter address" name="address" id="address" value="<?php echo $data['address']; ?>">
                <span class="form-invalid"><?php echo $data['address_err']; ?></span><br>

                <label for="gender"><p class="form-bold">Gender</p></label>
                <select name="gender" id="gender" class="form-select">
                    <option value="Male">Male</option>
                    <option value="Male">Female</option>
                    <option value="Male">Other</option>
                    <option value="Male">Not perfer to say</option>
                </select>
                <!-- <input type="text" placeholder="Enter gender" name="gender" id="gender" value="<?php echo $data['gender']; ?>"> -->
                <span class="form-invalid"><?php echo $data['gender_err']; ?></span><br>

                <label for="date_of_birth"><p class="form-bold">Date of Birth</p></label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-date-select">
                <!-- <input type="text" placeholder="Enter date of birth" name="date_of_birth" id="date_of_birth" value="<?php echo $data['date_of_birth']; ?>"> -->
                <span class="form-invalid"><?php echo $data['date_of_birth_err']; ?></span><br>

                <label for="email"><p class="form-bold">Email</p></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span><br>

                <label for="password"><p class="form-bold">Password</p></label>
                <input type="password" placeholder="Enter password" name="password" id="password" value="<?php echo $data['password']; ?>">
                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>

                <label for="confirm_password"><p class="form-bold">Confirm password</p></label>
                <input type="password" placeholder="Enter confirm password" name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span><br>

                <label for="phn_no"><p class="form-bold">Phone number</p></label>
                <input type="text" placeholder="Enter phone number" name="phn_no" id="phn_no" value="<?php echo $data['phn_no']; ?>">
                <span class="form-invalid"><?php echo $data['phn_no_err']; ?></span><br>
                <hr class="form-hr">
                <p>By creating an account you agree to our <a class="form-link" href="#">Terms & Privacy</a></p>
                <button type="submit" class="form-submit">Register</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Already have an account? <a class="form-link" href="<?php echo URLROOT; ?>/commons/login">Sign in</a></p>
        </div>
    </body>
</html>