<?php

use App\Enums\Http\Status;
use Core\Router;

define('BASE_DIR', dirname(__DIR__));
require_once BASE_DIR . '/vendor/autoload.php';

//Router::put('api/resourse');
try {
    die(Router::dispatch($_SERVER['REQUEST_URI']));
} catch (Exception $exception) {
    var_dump($exception);
}