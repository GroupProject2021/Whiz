<?php
    // Load configurations
    require_once 'config/config.php';

    // Load libraries (Manual loading)
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Database.php';

    // Auto load libraries (Automatic loading)
    spl_autoload_register(function($className) {
        require_once 'libraries/'.$className.'.php';
    });
?>