<?php

namespace App\web\storage;

use PDO;

class DB 
{
    private PDO $conn;

    public function __construct()
    {
        $config = require_once __DIR__ . "./../../../config.php";
        
        try {

            $this->conn = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['user'], $config['password']);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";

          } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }

    public function createTable($sql) {

        try {
            $this->conn->exec($sql);
        } catch (\PDOException $e) {
          echo $e->getMessage();
        }
        
    }
}
