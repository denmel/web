<?php

class Route
{
    static function start(): void
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Kid';
        $action_name = 'getAll';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        $controller_path = "app/Http/controllers/$controller_name.php";

        if (file_exists($controller_path)) {
            include_once $controller_path;
        } else {
            Route::ErrorPage404();
        }

        $controller = new $controller_name;

        if (method_exists($controller, $action_name)) {
            $controller->$action_name();
        } else {
            Route::ErrorPage404();
        }
    }

    static function ErrorPage404(): void
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404.html');
    }
}