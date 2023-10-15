<?php

namespace App\web\Controllers;

use App\web\Models\DashboardModel;

class DashboardController
{
    private DashboardModel $dashboard;
    private array $currentBalance;

    public function __construct()
    {
        @session_start();
        if(!$_SESSION['logged']){
            redirect(URL."/index");
        }
        $this->dashboard = new DashboardModel();
        $this->currentBalance = $this->dashboard->current_balance($_SESSION['email']);
    }

    public function customer(){

        $getTransaction = $this->dashboard->getTransactions($_SESSION['email']);

        return view("customer/dashboard", ["balance" => $this->currentBalance, "transaction" => $getTransaction]);
    }
}