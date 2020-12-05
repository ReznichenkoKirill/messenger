<?php

use Controllers\error404;

class Router
{
    static public function init()
    {
        session_start();
        $uri = $_SERVER['REQUEST_URI'];
        $uriArray = explode('/', $uri);
        array_shift($uriArray);
        $controllerName = (!empty($uriArray[0])) ? mb_strtolower($uriArray[0]) : 'index';
        $action = (!empty($uriArray[1])) ? mb_strtolower($uriArray[1]) : 'index';
        $controllerClass = '\Controllers\\' . ucfirst($controllerName);
        if (!class_exists($controllerClass)) {
            self::error_404();
        }
        $controller = new $controllerClass;
        if (!method_exists($controller, $action)) {
            self::error_404();
        }
        $controller->$action();
    }

    static public function error_404()
    {
        http_response_code(404);
        $controller = new error404();
        $controller->index();
        exit();
    }

    static public function redirect($url)
    {
        header('Location: ' . $url);
    }
}