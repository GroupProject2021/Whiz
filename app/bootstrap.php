<?php
    // Load configurations
    require_once 'config/config.php';

    // Load helpers
    require_once 'helpers/URL_Helper.php';
    require_once 'helpers/Session_Helper.php';
    require_once 'helpers/ImageUpload_Helper.php';
    require_once 'helpers/EmailVerification_Helper.php';
    require_once 'helpers/ForgotPassword_Helper.php';
    require_once 'helpers/TimeConvert_Helper.php';

    // Auto load libraries (Automatic loading)
    spl_autoload_register(function($className) {
        require_once 'libraries/'.$className.'.php';
    });
?>