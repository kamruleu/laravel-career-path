<?php

namespace App\web\Models;

use App\web\Models\Model;

class DashboardModel extends Model
{
    public function current_balance($email){
        // echo $email;
        $column = "sum(amount*sign) as balance";
        $where = "customer_email = '".$email."'";
        $query = $this->select("transactions", $column, $where);
        return $query;
    }

    public function getTransactions($email){
        $column = "(select name from customers where customers.email = transactions.customer_email) as name, customer_email, amount, sign, entry_time";
        $where = "customer_email = '".$email."'";
        $query = $this->select("transactions", $column, $where);
        return $query;
    }

    public function getCustomers(){
        $column = "id, name, email";
        $where = "1=1";
        $query = $this->select("customers", $column, $where);
        return $query;
    }

    public function getAllTransactions($email){
        $condition = "1=1";
        if($email){
            $condition = "customer_email = '".$email."'";
        }
        $column = "(select name from customers where customers.email = transactions.customer_email) as name, customer_email, amount, sign, entry_time";
        $where = $condition;
        $query = $this->select("transactions", $column, $where);
        return $query;
    }
}