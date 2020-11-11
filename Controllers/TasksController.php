<?php
namespace AHT_MVC1\Controllers;

use AHT_MVC1\Core\Controller;
use AHT_MVC1\Models\Task;

class TasksController extends Controller
{

    function index()
    {
        
        $task =new Task();
        $d['tasks'] = $task->showAllTasks();
        $this->set($d);
        $this->render("index");
    }


    function create()
    {
        if (isset($_POST["title"]))
        {
            
            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "Tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "Tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");

    }

    function delete($id)
    {
     

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "Tasks/index");
        }
    }
}
