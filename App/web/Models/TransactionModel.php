<?php

namespace App\web\Models;

class TransactionModel extends Model
{
    public function create($column, $values){
        $query = $this->insert("transactions", $column, $values);
        return $query;
    }

    public function current_balance($email){
        // echo $email;
        $column = "sum(amount*sign) as balance";
        $where = "customer_email = '".$email."'";
        $query = $this->select("transactions", $column, $where);
        return $query;
    }

    public function getValidEmail($email){
        // echo $email;
        $column = "email";
        $where = "email = '".$email."'";
        $query = $this->select("customers", $column, $where);
        return $query;
    }
}