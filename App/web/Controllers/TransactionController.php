<?php

namespace App\web\Controllers;

use App\web\Models\TransactionModel;
use Exception;

class TransactionController
{
    private TransactionModel $transaction;
    private array $currentBalance;
    public function __construct()
    {
        @session_start();
        if(!$_SESSION['logged']){
            redirect(URL."/index");
        }
        $this->transaction = new TransactionModel();
        $this->currentBalance = $this->transaction->current_balance($_SESSION['email']);
    }

    public function deposit() {
        return view("customer/deposit", ["balance"=> $this->currentBalance]);
    }

    public function add_deposit() {
        // echo $_SESSION['name'];die;
        $result = null;
        $message = null;
        try {

            if(!$_SESSION['email']){
                throw new Exception("Sorry! You deposit not allow!");
            }

            if(isset($_POST['amount']) && $_POST['amount'] <= 0){
                throw new Exception("Sorry! Amount would be greater than 0!");
            }

            $column = "customer_email, category_id, amount, sign, entry_time";
            $values = "('".$_SESSION['email']."','1','".$_POST['amount']."','1','".date('Y-m-d H:i:s')."')";

            $result = $this->transaction->create($column, $values);

            if(!$result){
                throw new Exception("Sorry! Failed to deposit!");
            }

        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        

        if($result){
            $message = "Deposit successfully!";
        }

        return view("customer/deposit", ["message" => $message, "balance"=> $this->currentBalance]);
    }

    public function withdraw() {
        return view("customer/withdraw", ["balance"=> $this->currentBalance]);
    }

    public function add_withdraw() {
        $result = null;
        $message = null;
        try {

            if(!$_SESSION['email']){
                throw new Exception("Sorry! You withdraw not allow!");
            }

            if(isset($_POST['amount']) && $_POST['amount'] <= 0){
                throw new Exception("Sorry! Amount would be greater than 0!");
            }

            if($this->currentBalance[0]['balance'] < $_POST['amount']){
                throw new Exception("Sorry! You have not sufficient balance!");
            }

            $column = "customer_email, category_id, amount, sign, entry_time";
            $values = "('".$_SESSION['email']."','2','".$_POST['amount']."','-1','".date('Y-m-d H:i:s')."')";

            $result = $this->transaction->create($column, $values);

            if(!$result){
                throw new Exception("Sorry! Failed to withdraw!");
            }

        } catch (Exception $e) {
            $message = $e->getMessage();
        }

        if($result){
            $message = "Withdraw successfully!";
        }

        return view("customer/withdraw", ["message" => $message, "balance"=> $this->currentBalance]);
    }

    public function transfer() {
        return view("customer/transfer", ["balance"=> $this->currentBalance]);
    }

    public function add_transfer() {
        $result = null;
        $message = null;
        try {

            if(!$_SESSION['email']){
                throw new Exception("Sorry! You transfer not allow!");
            }

            if(isset($_POST['email']) && !$_POST['email']){
                throw new Exception("Sorry! Enter email!");
            }

            if(isset($_POST['amount']) && $_POST['amount'] <= 0){
                throw new Exception("Sorry! Amount would be greater than 0!");
            }

            if($this->currentBalance[0]['balance'] < $_POST['amount']){
                throw new Exception("Sorry! You have not sufficient balance!");
            }

            $getValidEmail = $this->transaction->getValidEmail($_POST['email']);

            if(count($getValidEmail) == 0){
                throw new Exception("Sorry! Invalid email!");
            }

            $column = "customer_email, category_id, amount, sign, entry_time";
            $values = "('".$_SESSION['email']."','3','".$_POST['amount']."','-1','".date('Y-m-d H:i:s')."'), ('".$_POST['email']."','4','".$_POST['amount']."','1','".date('Y-m-d H:i:s')."')";

            $result = $this->transaction->create($column, $values);

            if(!$result){
                throw new Exception("Sorry! Failed to transfer!");
            }

        } catch (Exception $e) {
            $message = $e->getMessage();
        }

        if($result){
            $message = "Transfer successfully!";
        }

        return view("customer/transfer", ["message" => $message, "balance"=> $this->currentBalance]);
    }
}