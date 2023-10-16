<?php

namespace App\web\Controllers;

use App\web\Models\DashboardModel;

class DashboardController
{
    private DashboardModel $dashboardModel;
    private array $currentBalance;

    public function __construct()
    {
        @session_start();
        if(!$_SESSION['logged']){
            redirect(URL."/index");
        }
        $this->dashboardModel = new DashboardModel();
        $this->currentBalance = $this->dashboardModel->current_balance($_SESSION['email']);
    }

    public function customer(){

        $getTransaction = $this->dashboardModel->getTransactions($_SESSION['email']);

        return view("customer/dashboard", ["balance" => $this->currentBalance, "transaction" => $getTransaction]);
    }

    public function admin(){
        echo "test";die;
        //$getTransaction = $this->dashboard->getTransactions($_SESSION['email']);

        return view("admin/dashboard");
    }
}