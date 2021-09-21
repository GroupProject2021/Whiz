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

                <!-- profile picture -->
                <p class="form-bold">Profile picture</p>
                <div class="form-drag-area">
                    <div class="icon">
                        <img src="<?php echo URLROOT; ?>/imgs/form/profile-image-placeholder.png" id="profile_image_placeholder" width="90px" height="90px" alt="profile_image">
                    </div>
                    <div class="description">Drag & Drop to Upload File</div>
                    <div class="form-upload">
                        <input type="file" name="profile_image" id="profile_image" onchange="displayImage(this)" style="display: none;">
                        Browse File
                    </div>
                </div>
                <div class="form-validation">
                    <div class="profile-image-validation">
                        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                        Select a profile picture
                    </div>
                </div>            
                <span class="form-invalid"><?php echo $data['profile_image_err']; ?></span>

                <!-- university name -->
                <br>
                <input type="text" placeholder=" " name="uniname" id="uniname" value="<?php echo $data['uniname']; ?>">
                <label>University Name</label>
                <span class="form-invalid"><?php echo $data['uniname_err']; ?></span>

                <!-- address -->
                <br>
                <input type="text" placeholder=" " name="address" id="address" value="<?php echo $data['address']; ?>">
                <label>Address</label>
                <span class="form-invalid"><?php echo $data['address_err']; ?></span>

                <!-- email -->
                <br>
                <input type="text" placeholder=" " name="email" id="email" value="<?php echo $data['email']; ?>">
                <label>Email</label>
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="email-validation">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Your email address is valid
                        </div>
                    </div>
                </div> 
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>

                <!-- password -->
                <br>
                <div class="password-area">
                    <div class="pasword-content">                    
                        <input type="password" placeholder=" " name="password" id="password" value="<?php echo $data['password']; ?>">                        
                        <label>Password</label>
                    </div>
                    <div class="toggle-password">
                        <img src="<?php echo URLROOT; ?>/imgs/form/hide-eye-icon.png" class="hide-password-eye" width="25px" height="20px" alt="hide">
                        <img src="<?php echo URLROOT; ?>/imgs/form/show-eye-icon.png" class="show-password-eye" width="25px" height="20px" alt="show">
                    </div>
                </div>
                <div class="bottom-content">
                    <div class="form-validation">
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
                </div>
                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>

                <!-- confirm password -->
                <div class="password-area">
                    <div class="pasword-content">                    
                        <input type="password" placeholder=" " name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>">                        
                        <label>Confirm Password</label>
                    </div>
                    <div class="toggle-confirm-password">
                        <img src="<?php echo URLROOT; ?>/imgs/form/hide-eye-icon.png" class="hide-password-eye" width="25px" height="20px" alt="hide">
                        <img src="<?php echo URLROOT; ?>/imgs/form/show-eye-icon.png" class="show-password-eye" width="25px" height="20px" alt="show">
                    </div>
                </div>       
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="policy-password-match">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Passwords are matching
                        </div>
                    </div>
                </div>
                <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span><br>

                <!-- phone number -->
                <input type="text" placeholder=" " name="phn_no" id="phn_no" value="<?php echo $data['phn_no']; ?>">
                <label>Phone number</label>
                <div class="bottom-content">
                    <div class="form-validation">
                        <div class="phn_no-validation">
                            <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                            Your phone number is valid
                        </div>
                    </div>
                </div>
                <span class="form-invalid"><?php echo $data['phn_no_err']; ?></span><br>

                <!-- website -->
                <input type="text" placeholder=" " name="website" id="website" value="<?php echo $data['website']; ?>">
                <label>Website</label>
                <span class="form-invalid"><?php echo $data['website_err']; ?></span>

                <!-- founder -->
                <br>
                <input type="text" placeholder=" " name="founder" id="founder" value="<?php echo $data['founder']; ?>">
                <label>Founder</label>
                <span class="form-invalid"><?php echo $data['founder_err']; ?></span>

                <!-- founded year -->
                <br>
                <input type="text" placeholder=" " name="founded_year" id="founded_year" value="<?php echo $data['founded_year']; ?>">
                <label>Founded Year</label>
                <span class="form-invalid"><?php echo $data['founded_year_err']; ?></span>

                <!-- ugc approved? -->
                <br>
                <p class="form-bold">UGC Approved?</p><br>
                <input type="radio"  name="approved" value="Yes">Yes
                <input type="radio"  name="approved" value="No">No
                <span class="form-invalid"><?php echo $data['approved_err']; ?></span><br>

                <!-- world rank -->
                <br>
                <!-- <input type="text" placeholder=" " name="rank" id="rank" value="<?php echo $data['rank']; ?>"> -->
                <!-- <label>World Rank</label> -->
                <p class="form-bold">World Rank</p>
                <table width="100%">
                    </tr>
                    <tr>                        
                        <td width="75%">
                            <input type="range" min="0" max="10000" step="1" oninput="fetch_wr_value()" class="form-slider" placeholder="Enter World Rank" name="rank" id="rank" value="<?php echo $data['rank']; ?>">
                        </td>
                        <td>
                            <input type="text" value="5000" oninput="fetch_wr()" name="rank_value" id="rank_value">
                            <!-- <span id="gpa_value"></span> -->
                        </td>
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['rank_err']; ?></span>

                <!-- student amount -->
                <br>
                <!-- <input type="text" placeholder=" " name="amount" id="amount" value="<?php echo $data['amount']; ?>"> -->
                <!-- <label>Student Amount</label> -->
                <p class="form-bold">Student Amount</p>
                <table width="100%">
                    </tr>
                    <tr>                        
                        <td width="75%">
                            <input type="range" min="0" max="10000" step="1" oninput="fetch_sa_value()" class="form-slider" placeholder="Enter Student Amount" name="amount" id="amount" value="<?php echo $data['amount']; ?>">
                        </td>
                        <td>
                            <input type="text" value="5000" oninput="fetch_sa()" name="amount_value" id="amount_value">
                            <!-- <span id="gpa_value"></span> -->
                        </td>
                    </tr>
                </table>
                <span class="form-invalid"><?php echo $data['amount_err']; ?></span>

                <!-- graduate job rate -->
                <br>
                <input type="text" placeholder=" " name="rate" id="rate" value="<?php echo $data['rate']; ?>">
                <label>Graduate Job Rate</label>
                <span class="form-invalid"><?php echo $data['rate_err']; ?></span>

                <!-- description -->
                <br>
                <input type="text" placeholder=" " name="descrip" id="descrip" value="<?php echo $data['descrip']; ?>">
                <label>Desciption</label>
                <span class="form-invalid"><?php echo $data['descrip_err']; ?></span>

                <!-- university type -->
                <br>
                <br><p class="form-bold">University Type</p><br>
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

        <!-- java script form validation -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/form.js"></script>
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/imageupload.js"></script>

        <script>
            // student amount range slider
            function fetch_sa_value() {
                var amount_value = document.getElementById("amount").value;
                document.getElementById("amount_value").value = amount_value;
            }

            function fetch_sa() {
                var amount = document.getElementById("amount_value").value;
                document.getElementById("amount").value = amount;
            }

            // world rank range slider
            function fetch_wr_value() {
                var rank_value = document.getElementById("rank").value;
                document.getElementById("rank_value").value = rank_value;
            }

            function fetch_wr() {
                var rank = document.getElementById("rank_value").value;
                document.getElementById("rank").value = rank;
            }
        </script>
    </body>
</html>