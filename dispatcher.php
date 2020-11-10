<?php
namespace AHT_MVC1;

use AHT_MVC1\Controllers\tasksController;
use AHT_MVC1\Request;
use AHT_MVC1\Router;
class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        // $controller = $this->loadController();
        $taskcon=" AHT_MVC1\Controllers\tasksController";
        $controller = new $taskcon;
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $taskcon=" AHT_MVC1\Controllers\tasksController";
        
        // $name = $this->request->controller . "Controller";
        // print_r($name);
        // $file =  . 'controllers/' . $name .'.php' ;
        // require_once "$file";
        $controller = new $taskcon();
        return $controller;
    }

}
?>