<?php

namespace App\web\Controllers;

use App\web\Models\DashboardModel;

class AdminDashboardController
{
    private DashboardModel $dashboardModel;

    public function __construct()
    {
        @session_start();
        if(!$_SESSION['admin_logged']){
            redirect(URL."/admin");
        }
        $this->dashboardModel = new DashboardModel();
    }

    public function admin(){
        // echo "test";die;
        $getCustomers = $this->dashboardModel->getCustomers();

        return view("admin/dashboard", ["customers" => $getCustomers]);
    }

    public function transactions($email=""){

        $getTransactions = $this->dashboardModel->getAllTransactions($email);

        return view("admin/transactions", ["transactions" => $getTransactions]);
    }
}