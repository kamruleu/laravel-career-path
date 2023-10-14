<?php

namespace App\web\Controllers;

use App\web\Models\TransactionModel;

class TransactionController
{
    public function __construct()
    {
        @session_start();
        if(!$_SESSION['logged']){
            redirect(URL."/index");
        }
    }

    public function deposit() {
        return view("customer/deposit");
    }

    public function add_deposit() {
        // echo $_SESSION['name'];die;
        $result = null;
        $message = null;
        $column = "customer_email, category_id, amount, sign, entry_time";
        $values = "('".$_SESSION['email']."','1','".$_POST['amount']."','1','".date('Y-m-d H:i:s')."')";

        $model = new TransactionModel();
        $result = $model->create($column, $values);

        if($result){
            $message = "Deposit successfully!";
        }else{
            $message = "Failed to  deposit!";
        }

        return view("customer/deposit", ["message" => $message]);
    }

    public function withdraw() {
        return view("customer/withdraw");
    }

    public function add_withdraw() {
        $result = null;
        $message = null;
        $column = "customer_email, category_id, amount, sign, entry_time";
        $values = "('".$_SESSION['email']."','2','".$_POST['amount']."','-1','".date('Y-m-d H:i:s')."')";

        $model = new TransactionModel();
        $result = $model->create($column, $values);

        if($result){
            $message = "Withdraw successfully!";
        }else{
            $message = "Failed to  withdraw!";
        }

        return view("customer/withdraw", ["message" => $message]);
    }

    public function transfer() {
        return view("customer/transfer");
    }

    public function add_transfer() {
        $result = null;
        $message = null;
        $column = "customer_email, category_id, amount, sign, entry_time";
        $values = "('".$_SESSION['email']."','3','".$_POST['amount']."','-1','".date('Y-m-d H:i:s')."'), ('".$_POST['email']."','4','".$_POST['amount']."','1','".date('Y-m-d H:i:s')."')";

        $model = new TransactionModel();
        $result = $model->create($column, $values);

        if($result){
            $message = "Transfer successfully!";
        }else{
            $message = "Failed to  transfer!";
        }
        return view("customer/transfer", ["message" => $message]);
    }
}