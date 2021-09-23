<?php
    function sendVerificationCode($email) {
        $_SESSION['verification_sent_email'] = $email;
        
        $verificationCode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $receiver = $email;
        $subject = "Whiz account email verification code";

        // body contain image taken from google drive logo.png
        /* 
            later create a new gmail for whiz
            then store that image on that drive
            then copy the link like following

            Drive link preview: https://drive.google.com/file/d/10XKWTckkC-tquXJYrDyQrluabr51FAJL/view
            Set it as this: https://drive.google.com/uc?export=view&id=10XKWTckkC-tquXJYrDyQrluabr51FAJL
        */
        $body =    '<html>
                        <head>
                            <style>
                                body {  
                                    font-family: Arial, Helvetica, sans-serif;
                                }                            

                                .email-body{
                                    background-color: #FFF8F6;
                                    width: 600px;
                                    margin: 0 auto;
                                    height: auto;
                                    text-align: center;
                                    color: #363636;
                                }

                                p {
                                    font-size: 30px;
                                    height: 30px;								
                                }

                                .email-title {  
                                    background-image: linear-gradient(to right, #ffa502, #ffd79f , #f5ffac);
                                }

                                .email-title img {
                                    height: 100px;
                                    width: 100px;
                                }

                                .email-content {
                                    padding-top: 13px;
                                    padding-left: 100px;
                                    padding-right: 100px;
                                    padding-bottom: 20px;
                                    font-size: 14px;
                                    height: 50px;
                                }

                                .email-code {
                                    font-size: 35px;
                                    font-weight: bold;
                                    height: auto;
                                    line-height: 70px;
                                    vertical-align: middle;
                                }

                                .email-footer {
                                    margin-top: 30px;
                                    padding-left: 80px;
                                    padding-right: 80px;
                                    padding-bottom: 30px;
                                    font-size: 12px;
                                    color: gray;
                                    border-bottom: 8px solid #ffa502;
                                }
                                
                                .copyright {
                                    margin-top: 40px;
                                    text-align: center;
                                    font-size: 12px;
                                    color: gray;
                                }

                                .link {
                                    margin-top: 30px;
                                    font-size: 15px;
                                }
                            </style>
                        </head>
                    <body>
                        <div class="email-body">
                        <div class="email-title">
                            <img src="https://drive.google.com/uc?export=view&id=10XKWTckkC-tquXJYrDyQrluabr51FAJL" alt="">
                        </div>					
                        <p>Hi there</p>
                        <div class="email-content">
                            You have successfully created a Whiz account, Please enter the following code at the user verification form and complete the registration.
                        </div>
                        <div class="email-code">'.
                            $verificationCode
                        .'</div>
                        <div class="email-footer">
                            Didn\'t create Whiz account? It\'s likely someone just typed in your email address by accident. Feel free to ignore this email.
                            <br><br>
                            <div class="link">
                                Visit us: <a href="www.whiz.lk">www.whiz.lk</a>
                            </div>						
                        </div>
                        </div>
                        <div class="copyright">
                            This email sent by <br>
                        Whiz 2021. All rights reserved.
                        </div>
                    </body>
                </html>';
            
        $header = "From:segroupproject2021@gmail.com";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if(mail($receiver, $subject, $body, $header)) {
            // set the verification code
            $_SESSION['verification_code'] = $verificationCode;
            
            // flash('resend_verification_successfull', 'Verification code resend succcessfully');
            // redirect('Commons/userEmailVerification');

            return true;
        }
        else {
            // flash('resend_verification_failed', 'Verification code resend failed! Check your internet connection or please try again waiting few minutes.');
            // redirect('Commons/userEmailVerification');

            // unset the sent verificaiton code
            unset($_SESSION['verification_code']);

            return false;
        }
    }
?>