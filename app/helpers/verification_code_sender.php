<?php
    function sendVerificationCode($email) {
        $_SESSION['verification_sent_email'] = $email;
        
        $verificationCode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $receiver = $email;
        $subject = "Forget password";
        $body = "Your verification code is ".$verificationCode;
        $sender = "From:segroupproject2021@gmail.com";

        if(mail($receiver, $subject, $body, $sender)) {
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