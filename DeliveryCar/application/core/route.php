<?php

namespace application\core;

class Route
{

    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {
            $controller_name = ucfirst($routes[1]);
        }

        // получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        $controller_name = 'application\controllers\Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            if ( !empty($routes[3]) )
            {
                $params_name = str_replace('_',' ',$routes[3]);
                $controller->$action($params_name);
            }else{
                $controller->$action();
            }
        }
        else
        {
            Route::ErrorPage404();
        }

    }

    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

}
