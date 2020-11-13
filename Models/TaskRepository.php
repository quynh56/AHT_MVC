<?php

namespace AHT_MVC1\Models;

use AHT_MVC1\Models\TaskResourceModel;

class TaskRepository extends TaskResourceModel
{

    public function add($model)
    {
        return $this->save($model);
    }
    public function get($id)
    {
        return $this->find($id);
    }
    public function delete($id)
    {
        return parent::delete($id);
    }
    public function getAll()
    {
        return parent::getAll();
    }
    public function edit($model){
        return $this->save($model);
    }
}
