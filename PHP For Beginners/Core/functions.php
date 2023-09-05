<?php

use Core\Response;
use Core\Session;

function dd($value)
{
    echo "
<pre>";
    var_dump($value);
    echo "</pre>";

    die(); // do not execute after this

}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    view("{$code}.view.php");
    die();
}


function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

// relative to base path
function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    // Import variables into the current symbol table from an array
    // extract(['foo' => 'bar'])
    // $foo = 'bar';
    require base_path("views/{$path}");
}

function redirect($path = '/')
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}
