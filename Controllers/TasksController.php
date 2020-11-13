<?php
namespace AHT_MVC1\Controllers;

use AHT_MVC1\Core\Controller;
use AHT_MVC1\Models\TaskModel;
use AHT_MVC1\Models\TaskRepository;

class TasksController extends Controller
{

    function index()
    {
       $task =new TaskRepository();
        $d['tasks'] = $task->getAll();
        $this->set($d);
        $this->render("index");
    }


    function create()
    {
        if (isset($_POST["title"]))
        {
            
            $taskM= new TaskModel();
            $taskM->setTitle($_POST['title']);
            $taskM->setDescription($_POST['description']);
            $taskM->setCreate(date("Y-m-d H:i:s"));

            $taskR=new TaskRepository();
            if ($taskR->add($taskM)){
                header("Location: " . WEBROOT . "Tasks/index");
            }

        }

        $this->render("create");
    }

    function edit($id)
    {
        $taskR= new TaskRepository();
        $d["task"] = $taskR->find($id);
        if (isset($_POST["title"]))
        {
            $taskM=new TaskModel();
            $taskM->setId($id);
            $taskM->setTitle($_POST['title']);
            $taskM->setDescription($_POST['description']);
            $taskM->setUpdate(date("Y-m-d H:i:s"));

            $taskR= new TaskRepository();

            if ($taskR->edit($taskM)){

                header("Location: " . WEBROOT . "Tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");

    }

    function delete($id)
    {
        $task = new TaskRepository();
        if($task->delete($id)){
            header("Location: " . WEBROOT . "Tasks/index");
        }

    }
}
