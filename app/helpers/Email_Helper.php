<?php
    function sendVerificationCode($email) {
        $_SESSION['verification_sent_email'] = $email;
        
        $verificationCode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        // body contain image taken from google drive logo.png
        /* 
            later create a new gmail for whiz
            then store that image on that drive
            then copy the link like following

            Drive link preview: https://drive.google.com/file/d/10XKWTckkC-tquXJYrDyQrluabr51FAJL/view
            Set it as this: https://drive.google.com/uc?export=view&id=10XKWTckkC-tquXJYrDyQrluabr51FAJL
        */
        
        $receiver = $email;
        $subject = "Whiz account email verification code";

        $replaceContent = array('%verificationCode%');
        $replaceContent_Data = array($verificationCode);
        $body =  str_replace($replaceContent, $replaceContent_Data, file_get_contents('../app/templates/email/user_verification_code.php'));
            
        $header = "From:whizweblk@gmail.com";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if(mail($receiver, $subject, $body, $header)) {
            // set the verification code
            $_SESSION['verification_code'] = $verificationCode;

            return true;
        }
        else {
            // unset the sent verificaiton code
            unset($_SESSION['verification_code']);

            return false;
        }
    }

    function sendAdminVerificationCode($email, $data) {
        $_SESSION['admin_verification_sent_email'] = $email;
        
        $verificationCode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        // body contain image taken from google drive logo.png
        /* 
            later create a new gmail for whiz
            then store that image on that drive
            then copy the link like following

            Drive link preview: https://drive.google.com/file/d/10XKWTckkC-tquXJYrDyQrluabr51FAJL/view
            Set it as this: https://drive.google.com/uc?export=view&id=10XKWTckkC-tquXJYrDyQrluabr51FAJL
        */
        $receiver = $email;
        $subject = "Whiz account admin verification code";

        $replaceContent = array('%name%', '%email%', '%user_role%', '%verificationCode%');
        $replaceContent_Data = array($data['name'], $data['email'], $data['user_role'], $verificationCode);
        $body = str_replace($replaceContent, $replaceContent_Data, file_get_contents('../app/templates/email/admin_request_code.php'));
            
        $header = "From:whizweblk@gmail.com";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if(mail($receiver, $subject, $body, $header)) {
            // set the verification code
            $_SESSION['admin_verification_code'] = $verificationCode;

            return true;
        }
        else {
            // unset the sent verificaiton code
            unset($_SESSION['admin_verification_code']);

            return false;
        }
    }

    function sendAdminAcknowledgement($email, $data) {
        $_SESSION['admin_verification_sent_email'] = $email;
        
        $verificationCode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        // body contain image taken from google drive logo.png
        /* 
            later create a new gmail for whiz
            then store that image on that drive
            then copy the link like following

            Drive link preview: https://drive.google.com/file/d/10XKWTckkC-tquXJYrDyQrluabr51FAJL/view
            Set it as this: https://drive.google.com/uc?export=view&id=10XKWTckkC-tquXJYrDyQrluabr51FAJL
        */
        $receiver = $email;
        $subject = "Whiz account admin verification code";
        
        
        $replaceContent = array('%name%', '%email%', '%user_role%');
        $replaceContent_Data = array($data['name'], $data['email'], $data['user_role']);
        $body = str_replace($replaceContent, $replaceContent_Data, file_get_contents('../app/templates/email/admin_acknowledgement.php'));
          
        $header = "From:whizweblk@gmail.com";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if(mail($receiver, $subject, $body, $header)) {
            // set the verification code
            $_SESSION['admin_verification_code'] = $verificationCode;

            return true;
        }
        else {
            // unset the sent verificaiton code
            unset($_SESSION['admin_verification_code']);

            return false;
        }
    }

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
        
        $replaceContent = array('%email%');
        $replaceContent_Data = array($email);
        $body = str_replace($replaceContent, $replaceContent_Data, file_get_contents('../app/templates/email/user_forgot_password.php'));
                     
        $header = "From:whizweblk@gmail.com";
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


// sending session link
    function sendMentorSessionLink($email, $data) {
        $_SESSION['session_link_sent_email'] = $email;
        
        // body contain image taken from google drive logo.png
        /* 
            later create a new gmail for whiz
            then store that image on that drive
            then copy the link like following

            Drive link preview: https://drive.google.com/file/d/10XKWTckkC-tquXJYrDyQrluabr51FAJL/view
            Set it as this: https://drive.google.com/uc?export=view&id=10XKWTckkC-tquXJYrDyQrluabr51FAJL
        */
        $receiver = $email;
        $subject = "Whiz mentor session link";

        $replaceContent = array('%title%', '%link%');
        $replaceContent_Data = array($data['title'], $data['link']);
        $body = str_replace($replaceContent, $replaceContent_Data, file_get_contents('../app/templates/email/mentor_session_link.php'));
            
        $header = "From:whizweblk@gmail.com";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if(mail($receiver, $subject, $body, $header)) {
            // set the verification code
            // $_SESSION['admin_verification_code'] = $verificationCode;

            return true;
        }
        else {
            // unset the sent verificaiton code
            unset($_SESSION['admin_verification_code']);

            return false;
        }
    }
?>