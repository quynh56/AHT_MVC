<?php
namespace AHT_MVC1;
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
//        echo"<pre>";
//        print_r($this->request);
//        echo "</pre>";
        $name = $this->request->controller . "Controller";
        $file = ROOT . 'controllers/' . $name .'.php' ;
//        print_r($file);
        require_once "$file";
        $controller = new $name();
        return $controller;
    }

}
?>