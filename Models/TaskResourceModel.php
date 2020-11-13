<?php

namespace AHT_MVC1\Models;

use AHT_MVC1\Core\Model;
use AHT_MVC1\Core\ResourceModel;
use AHT_MVC1\Models\TaskModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $task =new TaskModel();
        parent::_init('tasks', null, $task );
    }
}
