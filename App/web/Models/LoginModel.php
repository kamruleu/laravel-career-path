<?php

namespace App\web\Models;

class LoginModel extends Model
{

    public function create($column, $values){
        $query = $this->insert("customers", $column, $values);
        return $query;
    }

    public function getCustomer($where){
        $query = $this->select("customers", "*", $where);
        return $query;
    }

    public function getUser($where){
        $query = $this->select("users", "*", $where);
        return $query;
    }

    public function createAdmin($column, $values){
        $query = $this->insert("users", $column, $values);
        return $query;
    }
}