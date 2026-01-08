<?php

define('BASE_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP_PATH', BASE_PATH . 'app' . DIRECTORY_SEPARATOR);
define('CONFIG_PATH', BASE_PATH . 'config' . DIRECTORY_SEPARATOR);
define('PUBLIC_PATH', BASE_PATH . 'public' . DIRECTORY_SEPARATOR);

$appConfig = require CONFIG_PATH . 'app.php';
date_default_timezone_set($appConfig['timezone']);

define('APP_DEBUG', $appConfig['debug'] ?? false);

if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = APP_PATH;

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

require APP_PATH . 'Helpers' . DIRECTORY_SEPARATOR . 'functions.php';

App\Core\Session::start();

$dbConfig = require CONFIG_PATH . 'database.php';
App\Core\Database::init($dbConfig);

require CONFIG_PATH . 'routes.php';

App\Core\Router::dispatch();
