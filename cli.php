<?php
use App\BankingApp;

require_once __DIR__ . '/vendor/autoload.php';

$cliApp = new BankingApp();
$cliApp->run();