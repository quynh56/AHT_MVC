<?php
namespace AHT_MVC1\Core;
   class Model
    {
        public function getProperties(){
            return get_object_vars($this);
        }
    }
