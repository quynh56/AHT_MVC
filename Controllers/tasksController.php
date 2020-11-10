<?php
 namespace AHT_MVC1\tasksController;
 use AHT_MVC1\models as task ;
class tasksController extends Controller
{

    function index()
    {
        $model_task= new task\Task();
        require(ROOT . $model_task. '.php');

        $tasks = new Task();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }


    function create()
    {
        if (isset($_POST["title"]))
        {
            $model_task= new task\Task();
            require(ROOT . $model_task. '.php');
            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $model_task= new task\Task();
        require(ROOT . $model_task. '.php');
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
//        require_once ("Views/Layouts/default.php");

    }

    function delete($id)
    {
        require(ROOT . 'Models/Task.php');

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
