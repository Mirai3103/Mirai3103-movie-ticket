<?php

use Core\Attributes\Route;

class Router
{
    /*
    {
        pattern: string,
        function: callable
        method: string
    }
        */
    public static array $routes = [];

    public static function register(string $pattern, callable $function, string $method = 'GET')
    {
        static::$routes[] = [
            'pattern' => $pattern,
            'function' => $function,
            'method' => $method
        ];
    }

    public static function load_from_class($class)
    {
        $reflector = new ReflectionClass($class);
        $methods = $reflector->getMethods(ReflectionMethod::IS_STATIC);
        foreach ($methods as $method) {
            $attributes = $method->getAttributes(Route::class);
            foreach ($attributes as $attribute) {
                $route = $attribute->newInstance();
                $pattern = $route->path;
                $callback = $class . '::' . $method->getName();
                $httpMethod = $route->method;

                static::register($pattern, $callback, $httpMethod);
            }
        }

    }

    public static function dispatch()
    {

        $requestUri = $_SERVER['REQUEST_URI'];
        $requestUri = explode('?', $requestUri)[0];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $result = static::match($requestUri, $requestMethod);

        if (!$result) {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
    public static function build()
    {
        usort(static::$routes, function ($a, $b) {
            return strlen($a['pattern']) > strlen($b['pattern']) ? 1 : -1;
        });
    }

    public static function match($requestUri, $requestMethod)
    {
        foreach (static::$routes as $route) {
            $pattern = $route['pattern'];
            $method = $route['method'];

            if ($requestMethod !== $method) {
                continue;
            }
            if (strpos($pattern, '{') === false) {
                if ($pattern === $requestUri) {
                    $callback = $route['function'];
                    call_user_func($callback);
                    return true;
                }
                continue;
            }
            $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
            $pattern = preg_replace('/{([\w]+)}/', '(?<$1>\w+)', $pattern);

            if (preg_match($pattern, $requestUri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                $callback = $route['function'];
                call_user_func_array($callback, array_values($params));
                return true;
            }
        }

        return false;
    }

}