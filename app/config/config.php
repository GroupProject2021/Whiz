<?php
    // Database parameters
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'whiz_db');

    // Payment gatewar parameters
    define('PG_MERCHANT_ID', '1219553');

    // App root
    define('APPROOT', dirname(dirname(__FILE__)));
    // Public Root
    define('PUBROOT', dirname(dirname(dirname(__FILE__))).'\public');
    // URL root
    define('URLROOT', 'http://localhost/whiz');
    // Site name
    define('SITENAME', 'Whiz');
?>