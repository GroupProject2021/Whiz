<?php
    // Load configurations
    require_once 'config/config.php';

    // Load helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    require_once 'helpers/image_upload_helper.php';
    require_once 'helpers/verification_code_sender.php';
    require_once 'helpers/password_reset_sender.php';

    // Load libraries (Manual loading)
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Database.php';

    // Auto load libraries (Automatic loading)
    spl_autoload_register(function($className) {
        require_once 'libraries/'.$className.'.php';
    });
?>