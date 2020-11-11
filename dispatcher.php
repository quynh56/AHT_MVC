<?php
namespace AHT_MVC1;

use AHT_MVC1\Request;
use AHT_MVC1\Router;

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
        $taskcon=$this->request->controller . "Controller";
        $controller=$taskcon="AHT_MVC1\Controllers\\".$taskcon;
        return new $controller;
    }

}
?>