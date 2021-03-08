<?php

namespace App;

use App;

class Kernel
{

    public $defaultControllerName = 'Home';

    public $defaultActionName = "index";

    public function launch()
    {

        list($controllerName, $actionName, $params) = App::$router->resolve();
        echo $this->launchAction($controllerName, $actionName, $params);

    }


    public function launchAction($controllerName, $actionName, $params)
    {

        $controllerName = empty($controllerName) ? $this->defaultControllerName : ucfirst($controllerName);

        if(!file_exists(ROOTPATH.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$controllerName.'Controller.php')){
            //throw new \App\Exceptions\InvalidRouteException();
        }
        require_once ROOTPATH.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$controllerName.'Controller.php';
        if(!class_exists("\\controllers\\".ucfirst($controllerName))){
            //throw new \App\Exceptions\InvalidRouteException();
        }
        $controllerName = "\\controllers\\".ucfirst($controllerName);
        $controller = new $controllerName;
        $actionName = empty($actionName) ? $this->defaultActionName : str_replace('-','_', $actionName);
        if (!method_exists($controller, $actionName)){
            //throw new \App\Exceptions\InvalidRouteException();
        }
        return $controller->$actionName($params);

    }

}