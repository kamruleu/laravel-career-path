<?php

namespace App\web\Controllers;

class TransactionController
{
    public function __construct()
    {
        @session_start();
    }

    public function deposit() {
        return view("customer/deposit");
    }

    public function withdraw() {
        return view("customer/withdraw");
    }

    public function transfer() {
        return view("customer/transfer");
    }
}