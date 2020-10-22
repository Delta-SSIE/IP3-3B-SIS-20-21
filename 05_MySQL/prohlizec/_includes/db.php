<?php

define('CHARSET', 'utf8mb4');
define("DB_HOST", '127.0.0.1');
define('DB', 'ip_3');
define('DB_USER', 'www-aplikace');
define('DB_PASS', 'Bezpe4n0Heslo.');

function dbConnect() {
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB.";charset=".CHARSET;

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    return new PDO($dsn, DB_USER, DB_PASS, $options);
}