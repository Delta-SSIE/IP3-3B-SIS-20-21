<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

mb_internal_encoding("UTF-8");

require_once __DIR__ . "/../vendor/autoload.php";

spl_autoload_register(function ($className) {
    include __DIR__ . "/{$className}.class.php";
});

use Tracy\Debugger;
Debugger::enable();