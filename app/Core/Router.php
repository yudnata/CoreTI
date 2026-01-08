<?php

namespace App\Core;

class Router
{
    private static array $routes = [];

    public static function get(string $path, string $action): void
    {
        self::$routes['GET'][$path] = $action;
    }

    public static function post(string $path, string $action): void
    {
        self::$routes['POST'][$path] = $action;
    }

    public static function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = self::getUri();

        if (isset(self::$routes[$method])) {
            foreach (self::$routes[$method] as $route => $action) {
                $pattern = preg_replace('/\{(\w+)\}/', '([^/]+)', $route);
                $pattern = '#^' . $pattern . '$#';

                if (preg_match($pattern, $uri, $matches)) {
                    array_shift($matches);

                    list($controller, $method) = explode('@', $action);
                    $controllerClass = "App\\Controllers\\{$controller}";

                    if (class_exists($controllerClass)) {
                        $instance = new $controllerClass();
                        if (method_exists($instance, $method)) {
                            call_user_func_array([$instance, $method], $matches);
                            return;
                        }
                    }
                }
            }
        }

        self::notFound();
    }

    private static function getUri(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $uri = parse_url($uri, PHP_URL_PATH);

        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        if ($basePath !== '/' && $basePath !== '\\') {
            $uri = str_replace($basePath, '', $uri);
        }

        $uri = '/' . trim($uri, '/');
        return $uri === '' ? '/' : $uri;
    }

    private static function notFound(): void
    {
        http_response_code(404);
        echo '<h1>404 - Page Not Found</h1>';
        exit;
    }
}
