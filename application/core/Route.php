<?php
class Route
{
    static function start()
    {
        $controller_name = 'Main';
        $action_name = 'index';
        $uri = $_SERVER['REQUEST_URI'];
        $uri=explode('?', $uri);
        $routes = explode('/', $uri[0]);

        if ( !empty($routes[1]) )
        {	
            $controller_name = $routes[1];
        }
        if ( !empty($routes[2]))
        {
            $action_name = $routes[2];
        }
        if(isset($_GET['r']))
        {
            $sss = explode('/', $_GET['r']);
            $controller_name = $sss[0];
            $action_name = $sss[1];
        }
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }
        else
        {
            Route::ErrorPage404();
        }
        $controller = new $controller_name;
        $action = $action_name;
        if(method_exists($controller, $action))
        {
        	$controller->$action();
        }
        else
        {
             Route::ErrorPage404();
        }
    
    }
    
    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
