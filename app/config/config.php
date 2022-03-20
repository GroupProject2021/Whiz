<?php
    // Database parameters
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'whiz_db');

    // Payment gateway parameters
    define('PG_MERCHANT_ID', '1219553');
    define('INTAKE_NOTICE_PRICE', 100);         // Organization --> University
    define('JOB_ADVERTISEMENT_PRICE', 150);     // Organization --> Company
    define('BANNER_PRICE', 100);                // Mentor --> Professional Guider
    define('POSTER_PRICE', 100);                // Mentor --> Teacher

    // App root
    define('APPROOT', dirname(dirname(__FILE__)));
    // Public Root
    define('PUBROOT', dirname(dirname(dirname(__FILE__))).'\public');
    // URL root
    define('URLROOT', 'http://localhost/whiz');
    // Site name
    define('SITENAME', 'Whiz');
?>