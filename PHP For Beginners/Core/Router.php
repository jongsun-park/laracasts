<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        // $this->routes[] = compact('method', 'uri', 'controller');

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }
    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }
    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function abort($code = 404)
    {
        http_response_code($code);

        view("{$code}.view.php");
        die();
    }

    public function only($key)
    {

        // 가장 최근에 등록한 라우트의 미들웨어에 $key 지정
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }


    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {

            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if ($route['middleware']) {
                    $middleware = Middleware::MAP[$route['middleware']];
                    (new $middleware())->handle();
                }

                Middleware::resolve($route['middleware']);
                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }
}
