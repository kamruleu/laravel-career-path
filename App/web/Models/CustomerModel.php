<?php

namespace App\web\Models;

class CustomerModel extends Model
{

    public function create($column, $values){
        $query = $this->insert("customers", $column, $values);
        return $query;
    }

    public function getCustomer($where){
        $query = $this->select("customers", "*", $where);
        return $query;
    }
}