<?php

use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH =  __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    // dd($class); // string(8) "Database"
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \Core\Router();

$routes = require base_path('routes.php'); // return [...]

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    // single place 
    Session::flash('errors',  $exception->errors);
    Session::flash('old',  $exception->old);

    // return redirect('/login');
    // dynamic
    return redirect($router->previousUrl());
}

Session::unflash();