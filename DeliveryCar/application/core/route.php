<?php

namespace application\core;
use application\controllers;

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
        if (class_exists ($controller_name)){
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
                    if($action_name == 'action_info' || $action_name == 'action_add' || $action_name == 'action_information'){
                        Route::ErrorPage404();
                    }else{
                        $controller->$action();
                    }
                }
            }
            else
            {
                Route::ErrorPage404();
            }
        } else{
            Route::ErrorPage404();
        }
       // $controller = new $controller_name;


    }

    static function ErrorPage404()
    {
        $contr = new controllers\Controller_Page404;
        $contr ->action_index();
    }

}
