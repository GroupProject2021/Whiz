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
                <table class="form-table">
                    <tr>
                        <td>
                            <input type="password" placeholder="Enter password" name="password" id="password" value="<?php echo $data['password']; ?>">
                        </td>
                        <td>
                            <div class="toggle-password">
                                <img src="<?php echo URLROOT; ?>/imgs/form/hide-eye-icon.png" class="hide-password-eye" width="25px" height="20px" alt="hide">
                                <img src="<?php echo URLROOT; ?>/imgs/form/show-eye-icon.png" class="show-password-eye" width="25px" height="20px" alt="show">
                            </div>
                        </td>                    
                    </tr>
                </table>
                <div class="password-policies">
                    <div class="policy-length">
                        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                        Minimum 8 Characters
                    </div>
                    <div class="policy-number">
                        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                        Contains a number
                    </div>
                    <div class="policy-uppercase">
                        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                        Contains uppercase
                    </div>
                    <div class="policy-special">
                        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                        Contains special characters
                    </div>
                </div>
                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>

                <label for="confirm_password"><p class="form-bold">Confirm password</p></label>
                <table class="form-table">
                    <tr>
                        <td>
                            <input type="password" placeholder="Enter confirm password" name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                        </td>
                        <td>
                            <div class="toggle-confirm-password">
                                <img src="<?php echo URLROOT; ?>/imgs/form/hide-eye-icon.png" class="hide-password-eye" width="25px" height="20px" alt="hide">
                                <img src="<?php echo URLROOT; ?>/imgs/form/show-eye-icon.png" class="show-password-eye" width="25px" height="20px" alt="show">
                            </div>
                        </td>
                    </tr>
                </table>                
                <div class="password-policies">
                    <div class="policy-password-match">
                        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" class="show-password-eye" width="15px" height="15px" alt="green-tick">
                        Passwords are matching
                    </div>
                </div>
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

        <script>
            function _id(name) {
                return document.getElementById(name);
            }

            function _class(name) {
                return document.getElementsByClassName(name);
            }

            // show/ hide eye toggle
            _class("toggle-password")[0].addEventListener("click", function() {
                _class("toggle-password")[0].classList.toggle("active");

                if(_id("password").getAttribute("type") == "password") {
                    _id("password").setAttribute("type", "text");
                }
                else {
                    _id("password").setAttribute("type", "password");
                }
            });

            // Password policies check on password
            _id("password").addEventListener("keyup", function() {
                let password = _id("password").value;

                if(password.length >= 8) {
                    _class("policy-length")[0].classList.add("active");
                }
                else {
                    _class("policy-length")[0].classList.remove("active");
                }
                
                if(/[0-9]/.test(password)) {
                    _class("policy-number")[0].classList.add("active");
                }
                else {
                    _class("policy-number")[0].classList.remove("active");
                }

                if(/[A-Z]/.test(password)) {
                    _class("policy-uppercase")[0].classList.add("active");
                }
                else {
                    _class("policy-uppercase")[0].classList.remove("active");
                }

                if(/[^a-zA-Z0-9]/.test(password)) {
                    _class("policy-special")[0].classList.add("active");
                }
                else {
                    _class("policy-special")[0].classList.remove("active");
                }
            });

            // show/ hide eye toggle on confirm password
            _class("toggle-confirm-password")[0].addEventListener("click", function() {
                _class("toggle-confirm-password")[0].classList.toggle("active");

                if(_id("confirm_password").getAttribute("type") == "password") {
                    _id("confirm_password").setAttribute("type", "text");
                }
                else {
                    _id("confirm_password").setAttribute("type", "password");
                }
            });

            // Password matching check on both password and confirm password - BI-DIRECTIONAL PASSWORD MATCH
            _id("password").addEventListener("keyup", function() {
                let password = _id("password").value;
                let confirm_password = _id("confirm_password").value;

                if(password == confirm_password && password.length != 0) {
                    _class("policy-password-match")[0].classList.add("active");
                }
                else {
                    _class("policy-password-match")[0].classList.remove("active");
                }
            });

            _id("confirm_password").addEventListener("keyup", function() {
                let password = _id("password").value;
                let confirm_password = _id("confirm_password").value;

                if(password == confirm_password && confirm_password.length != 0) {
                    _class("policy-password-match")[0].classList.add("active");
                }
                else {
                    _class("policy-password-match")[0].classList.remove("active");
                }
            });
        </script>
    </body>
</html>