<?php
    // Load configurations
    require_once 'config/config.php';

    // Load helpers
    require_once 'helpers/FileUpload_Helper.php';
    require_once 'helpers/HTML_Helper.php';
    require_once 'helpers/PDF_Helper.php';
    require_once 'helpers/URL_Helper.php';
    require_once 'helpers/Session_Helper.php';
    require_once 'helpers/ImageUpload_Helper.php';
    require_once 'helpers/Email_Helper.php';
    require_once 'helpers/TimeConvert_Helper.php';
    require_once 'helpers/Redirect_Helper.php';
    require_once 'helpers/RateCount_Helper.php';
    require_once 'helpers/Security_Helper.php';

    // Auto load libraries (Automatic loading)
    spl_autoload_register(function($className) {
        require_once 'libraries/'.$className.'.php';
    });
?>