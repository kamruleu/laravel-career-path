<?php

namespace App\web\Models;

class CustomerModel extends Model
{
    public function getAll(){
        $query = $this->select("categories");
        return $query;
    }

    public function create($column, $values){
        $query = $this->insert("customers", $column, $values);
        return $query;
    }
}