<?php

use App\web\Database\Migration;
use App\web\storage\DB;

require_once __DIR__ . '/vendor/autoload.php';

$migration = new Migration(new DB());

$migration->run();