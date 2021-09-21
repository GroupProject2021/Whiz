<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>
        
        <!-- LOGIN FORM -->
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/commons/login" method="post">
                <div class="logo">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/logo.png" alt="logo">
                </div>
                <center>
                    <h1>Sign in</h1>
                    <p>Please enter your credentials</p>
                </center>

                <hr  class="form-hr">

                <!-- flash message -->              
                <?php flash('register_success'); ?>

                <!-- email -->
                <br>
                <input type="text" placeholder=" " name="email" id="email" value="<?php echo $data['email']; ?>">
                <label>Email</label>
                <div class="bottom-content"><a href="#" class="form-link">Forgot email?</a></div>
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>
     
                <!-- password -->
                <br>
                <div class="password-area">
                    <div class="pasword-content">                    
                        <input type="password" placeholder=" " name="password" id="password" value="<?php echo $data['password']; ?>">                        
                        <label>Password</label>
                        <div class="bottom-content"><a href="#" class="form-link">Forgot password?</a></div>
                    </div>
                    <div class="toggle-password">
                        <img src="<?php echo URLROOT; ?>/imgs/form/hide-eye-icon.png" class="hide-password-eye" width="25px" height="20px" alt="hide">
                        <img src="<?php echo URLROOT; ?>/imgs/form/show-eye-icon.png" class="show-password-eye" width="25px" height="20px" alt="show">
                    </div>
                </div>                
                <span class="form-invalid"><?php echo $data['password_err']; ?></span>

                <!-- captcha checker -->
                <br>
                <div class="captcha-wrapper">
                    <div class="captcha-area">
                        <div class="captcha-img">
                            <img src="<?php echo URLROOT; ?>/imgs/captcha/captcha-bg-1.jpg" alt="">
                            <span class="captcha">K 4 j v Y O</span>
                        </div>
                        <button class="reload-btn"><img src="<?php echo URLROOT; ?>/imgs/captcha/reload-icon.png" alt=""></button>
                    </div>
                    <div class="input-area">
                        <input class="captcha-input" type="text" placeholder="Enter captcha" maxlength = "6" required  name="captcha_value" id="captcha_value" value="<?php echo $data['captcha_value']; ?>">
                        <button class="check-btn">Check</button>
                    </div>
                    <div class="status-txt"></div>
                </div>
                <div class="captcha-matched-alert">
                    <div class="matched-tick "><img src="<?php echo URLROOT;?>/imgs/captcha/matched-tick-icon.png" alt=""></div>
                    <div class="matched-content">Captcha matched successfully</div>
                </div>
                <span class="form-invalid"><?php echo $data['captcha_value_err']; ?></span>
                
                <hr  class="form-hr">

                <button type="submit" class="form-submit">Login</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Don't have an account? <a class="form-link" href="<?php echo URLROOT; ?>/Commons/registerRedirect">Create an account</a></p>
        </div>

        <!-- java script form validation -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/form.js"></script>

        <script>
            const captcha = document.querySelector(".captcha");
            const reloadBtn = document.querySelector(".reload-btn");
            const inputField = document.querySelector(".captcha-input");
            const checkBtn = document.querySelector(".check-btn");
            const statusTxt = document.querySelector(".status-txt");
            const captchaWrapper = document.querySelector(".captcha-wrapper");
            const captchaMatchedMsg = document.querySelector(".captcha-matched-alert");

            // storing all captcha characters in arrray;
            let allCharacters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                                 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
                                 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
                                 '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

            function getCaptcha() {
                for(let i = 0; i < 6; i++) {
                    let randomChar = allCharacters[Math.floor(Math.random() * allCharacters.length)];
                    captcha.innerHTML += ' '+randomChar;

                }
            };

            function refreshCaptcha() {
                statusTxt.innerText = "";
                inputField.value = "";
                captcha.innerText = "";
                getCaptcha();
            }

            function showCaptchaMatchedMsg() {
                captchaMatchedMsg.style.visibility = "visible";
                captchaMatchedMsg.style.height = "54px";
            }

            function hideCaptchaMatchedMsg() {
                captchaMatchedMsg.style.visibility = "hidden";
                captchaMatchedMsg.style.height = 0;
            }

            hideCaptchaMatchedMsg();

            refreshCaptcha();

            reloadBtn.addEventListener("click", () => {
                captcha.innerHTML = "";
                getCaptcha();
            });

            checkBtn.addEventListener("click", (e) => {
                e.preventDefault();

                let inputVal = inputField.value.split('').join(' ');

                if(inputVal == captcha.innerText) {
                    // statusTxt.style.color = "#4db2ec";
                    // statusTxt.innerText = "You are not a robot";
                    inputField.value = "true";

                    captchaWrapper.style.visibility = "hidden";  
                    captchaWrapper.style.height = 0;
                    
                    showCaptchaMatchedMsg();
                }
                else {
                    statusTxt.style.color = "#ff0000";
                    statusTxt.innerText = "Captcha not matched, Please try again";

                    setTimeout(() => {
                        refreshCaptcha();
                    }, 2000);
                }
            });

        </script>
    </body>
</html>