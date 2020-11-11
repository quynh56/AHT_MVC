<?php
namespace AHT_MVC1;

use AHT_MVC1\Request;
use AHT_MVC1\Router;
use AHT_MVC1\Controllers\TasksController;

use AHT_MVC1\Core\Controller;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $taskcon=" AHT_MVC1\Controllers\TasksController";
        $taskcon= explode('\\',$taskcon);
        $taskcon= array_slice($taskcon,2);
        $taskcon=implode('',$taskcon);
        $taskcon =substr($taskcon,0,-10);
        $name= $taskcon."Controller"; 
        $controller=$taskcon="AHT_MVC1\Controllers\\".$name;
        return new $controller;
    }

}
?>