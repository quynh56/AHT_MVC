<?php

/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 11/12/2020
 * Time: 1:39 PM
 */

namespace AHT_MVC1\Core;
use AHT_MVC1\Core\Model;
use AHT_MVC1\Core\ResourceModelInterface;
use AHT_MVC1\Config\Database;

class ResourceModel implements ResourceModelInterface
{
    private $id;
    private $model;
    private $table;
    public function _init($table, $id, $model)
    {
        $this->id = $id;
        $this->model = $model;
        $this->table = $table;
    }
    public function save($model)
    {

        $arrModel= $model->getProperties();

        $placeholder=[];
        $insert_key=[];
        $placeUpdate=[];
        if ($model->getId()===null){
            //insert
            foreach ($arrModel as $key=>$value){
                $insert_key[] =$key;
                array_push($placeholder, ':'.$key);

            }
            $strKeyIns= implode(', ',$insert_key);
            $strPlaceholder=implode(', ',$placeholder);
            $sql_insert="INSERT INTO $this->table ({$strKeyIns}) VALUES ({$strPlaceholder})";
            $obj_insert =Database::getBdd()->prepare($sql_insert);
            return $obj_insert->execute($arrModel);
        }else{
            foreach ($arrModel as $k=>$item){
                array_push($placeUpdate, $k.' = :'.$k);
            }

            //update
            $strPlaceUpdate=implode(', ',$placeUpdate);
            $sql_update="UPDATE {$this->table} SET $strPlaceUpdate WHERE id=:id";
            $obj_update=Database::getBdd()->prepare($sql_update);
            return $obj_update->execute($arrModel);
        }
        // TODO: Implement save() method.

    }
    public function getAll()
    {
        $sql_select = "SELECT * FROM $this->table";
        $obj_select = Database::getBdd()->prepare($sql_select);
        $obj_select->execute();
        return $obj_select->fetchAll();
    }
    public function find($id)
    {
        $sql_find = "SELECT * FROM $this->table WHERE id = $id";
        $obj_find = Database::getBdd()->prepare($sql_find);

        $obj_find->execute();
        return $obj_find->fetch();
    }
    public function delete($id)
    {
        $sql_delete = "DELETE FROM $this->table WHERE id=$id";
        $obj_delete = Database::getBdd()->prepare($sql_delete);

        return $obj_delete->execute();
        // TODO: Implement delete() method.
    }
}
