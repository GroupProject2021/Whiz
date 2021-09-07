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
            <form action="<?php echo URLROOT; ?>/organizations/university_register" method="post">
                <h1>University Register</h1>
                <p>Please fill in this form to create an account</p>
                <hr class="form-hr">
                <label for="uniname"><p class="form-bold">University Name</p></label>
                <input type="text" placeholder="Enter university name" name="uniname" id="uniname" value="<?php echo $data['uniname']; ?>">
                <span class="form-invalid"><?php echo $data['uniname_err']; ?></span><br>

                <label for="address"><p class="form-bold">Address</p></label>
                <input type="text" placeholder="Enter address" name="address" id="address" value="<?php echo $data['address']; ?>">
                <span class="form-invalid"><?php echo $data['address_err']; ?></span><br>

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

                <label for="website"><p class="form-bold">Web Address</Address></p></label>
                <input type="text" placeholder="Enter web address" name="website" id="website" value="<?php echo $data['website']; ?>">
                <span class="form-invalid"><?php echo $data['website_err']; ?></span><br>

                <label for="founder"><p class="form-bold">Founder</p></label>
                <input type="text" placeholder="Enter founder name" name="founder" id="founder" value="<?php echo $data['founder']; ?>">
                <span class="form-invalid"><?php echo $data['founder_err']; ?></span><br>

                <label for="founded_year"><p class="form-bold">Founded Year</p></label>
                <input type="text" placeholder="Enter founder name" name="founded_year" id="founded_year" value="<?php echo $data['founded_year']; ?>">
                <span class="form-invalid"><?php echo $data['founded_year_err']; ?></span><br>

                <label for="approved"><p class="form-bold">UGC Approved?</p></label><br>
                <input type="radio"  name="approved" value="Yes">Yes
                <input type="radio"  name="approved" value="No">No
                <span class="form-invalid"><?php echo $data['approved_err']; ?></span><br>

                <label for="rank"><p class="form-bold">World Rank</p></label>
                <input type="text" placeholder="Enter world rank" name="rank" id="rank" value="<?php echo $data['rank']; ?>">
                <span class="form-invalid"><?php echo $data['rank_err']; ?></span><br>

                <label for="amount"><p class="form-bold">Student Amount</p></label>
                <input type="text" placeholder="Enter capable no. of students" name="amount" id="amount" value="<?php echo $data['amount']; ?>">
                <span class="form-invalid"><?php echo $data['amount_err']; ?></span><br>

                <label for="rate"><p class="form-bold">Graduate Job Rate</p></label>
                <input type="text" placeholder="Enter job rate" name="rate" id="rate" value="<?php echo $data['rate']; ?>">
                <span class="form-invalid"><?php echo $data['rate_err']; ?></span><br>

                <label for="descrip"><p class="form-bold">Description</p></label>
                <input type="text" placeholder="Enter description" name="descrip" id="descrip" value="<?php echo $data['descrip']; ?>">
                <span class="form-invalid"><?php echo $data['descrip_err']; ?></span><br>

                <label for="type"><p class="form-bold">University Type</p></label><br>
                <input type="radio" name="type" value="Semi Government">Semi-Government(Government Affiliated)<br>
                <input type="radio" name="type" value="Private">Private
                <span class="form-invalid"><?php echo $data['type_err']; ?></span><br>

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