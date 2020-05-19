<?php


namespace app\core;


use app\exceptions\AppException;

class Router
{
    private static $rules;
    private static $route;
    private static $params;

    public static function routed(): void
    {
        self::readConfig();
        $url = self::parseUrl();
        self::prepareRoute($url);
        self::runController();
    }

    private static function readConfig(): void
    {
        self::$rules = require CONFIG_DIR . '/routes.php';
    }

    private static function parseUrl(): string
    {
        return trim($_SERVER['QUERY_STRING'], '/');
    }

    private static function prepareRoute($url): void
    {
        $route = self::matchRoute($url);
        if ($route) {
            self::$params = $route;
            $preparedRoute['controller'] = self::prepareControllerName($route['controller'], $route['prefix']);
            $preparedRoute['action'] = self::prepareActionName($route['action']);
            self::$route = $preparedRoute;
        } else {
            throw new AppException('Page not found', 404);
        }
    }

    private static function runController(): void
    {
        if (file_exists(ROOT_DIR . '/' . self::$route['controller'] . '.php')) {
            $controllerObject = new self::$route['controller'](self::$params);
            if (method_exists($controllerObject, self::$route['action'])) {
                $controllerObject->{self::$route['action']}();
            } else {
                throw new AppException('Method not found', 404);
            }
        } else {
            throw new AppException('Controller not found', 404);
        }
    }

    private static function matchRoute($url): array
    {
        foreach (self::$rules as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                $route['action'] = $route['action'] ?? 'index';
                $route['params'] = $route['params'] ?? '';
                $route['prefix'] = $route['prefix'] ?? '';
                return $route;
            }
        }
        return[];
    }

    private static function prepareControllerName($controllerName, $prefix): string
    {
        return 'app\controllers\\' . $prefix . self::strToCamelCase($controllerName) . 'Controller';
    }

    private static function prepareActionName($actionName): string
    {
        return 'action' . self::strToCamelCase($actionName);
    }

    private static function strToCamelCase($string): string
    {
        return ucfirst(strtolower($string));
    }
}