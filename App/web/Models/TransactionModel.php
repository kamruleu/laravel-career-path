<?php

namespace App\web\Models;

class TransactionModel extends Model
{
    public function create($column, $values){
        $query = $this->insert("transactions", $column, $values);
        return $query;
    }
}