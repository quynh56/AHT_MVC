<?php
namespace AHT_MVC1;

use AHT_MVC1\Request;
use AHT_MVC1\Router;
use AHT_MVC1\Controllers\TasksController;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();
        // echo 111;
        // var_dump($controller);
        // die;
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        // $taskcon=" AHT_MVC1\Controllers\TasksController";
        // $taskcon= explode('\\',$taskcon);
        // $taskcon= array_slice($taskcon,2);
        // $taskcon=implode('',$taskcon);
        // $taskcon =substr($taskcon,0,-10);
        // $name= $taskcon."Controller"; 
        // echo $name;
        // $file= ROOT .'controllers/'. $name .'.php';
        // // echo $file;
        // die;
        // require_once"$file";
        
        // $name = $this->request->controller . "Controller";
        // print_r($name);
        // $file =  ROOT . 'controllers/' . $name .'.php' ;
        // require_once "$file";
        // $controller = new $name;
        
        // echo $name;
        // die;
        $controller = new TasksController;
        return $controller;
    }

}
?>