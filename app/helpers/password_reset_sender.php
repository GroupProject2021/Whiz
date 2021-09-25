<?php
    function sendPasswordReset($email) {
        // body contain image taken from google drive logo.png
        /* 
            later create a new gmail for whiz
            then store that image on that drive
            then copy the link like following

            Drive link preview: https://drive.google.com/file/d/10XKWTckkC-tquXJYrDyQrluabr51FAJL/view
            Set it as this: https://drive.google.com/uc?export=view&id=10XKWTckkC-tquXJYrDyQrluabr51FAJL
        */

        // body contains localhost redirect link
        /*
            Since we are currently using xamp localhost development we used only resent link as the localhost redirection
            password-reset-button link: http://localhost/whiz/Commons/userPasswordReset

            After deploying on server this must be changed with domain
            for example: www.whiz.lk/Commons/userPasswordReset
        */
        $receiver = $email;
        $subject = "Whiz account password reset";
        $body =    '<html>
                        <head>
                            <style>
                                body {  
                                    font-family: Arial, Helvetica, sans-serif;
                                }                            

                                .email-body{
                                    background-color: #FFF8F6;
                                    box-shadow: 0 4px 8px 0 #888888;
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

                                .password-reset-button input{
                                    background-color: #4a73f8;
                                    color: #f1f4ff;
                                    padding: 16px 20px;
                                    margin: 8px 0;
                                    border: none;
                                    cursor: pointer;
                                    width: 30%;
                                    opacity: 0.9;
                                    border-radius: 3px;
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
                        <p>Password reset</p>
                        <div class="email-content">
                            A request has been received to change the password for your Whiz account.
                        </div>
                        <div class="password-reset-button">
                            <a href="http://localhost/whiz/Commons/userPasswordReset">
                                <input type="button" name="reset" id="reset" value="Reset password">
                            </a>
                        </div>
                        <div class="email-footer">
                            If you did not initiate this request, please contact us immediately at <a href="www.whiz.lk/contact">Contact</a>.
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
            // set the password reset sent mail
            $_SESSION['password_reset_sent_email'] = $email;

            return true;
        }
        else {
            // unset the password reset sent mail
            if(isset($_SESSION['password_reset_sent_email'])) {
                unset($_SESSION['password_reset_sent_email']);
            }

            return false;
        }
    }
?>