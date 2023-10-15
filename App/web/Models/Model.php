<?php

namespace App\web\Models;

use PDO;

class Model
{
    protected PDO $pdo;
    public function __construct()
    {
        $config = require_once __DIR__ . "./../../../config.php";
        //print_r($config);die;
        try {

            $this->pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['user'], $config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo "Connected";
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function insert($table, $fields, $values){
        $sql = "INSERT INTO $table ($fields) VALUES $values";
        $stmt = $this->pdo->prepare($sql);
        try {
            if($stmt->execute()){
                return $this->pdo->lastInsertId();
            };
        } catch (\PDOException $e) {
            //echo $e->getMessage();
        }
        return null;
    }

    public function select($table, $fields="*", $where="1=1"){
        $sql = "SELECT $fields FROM $table WHERE $where";
        // echo "SELECT $fields FROM $table WHERE $where";
        $stmt = $this->pdo->prepare($sql);
        try {
            if($stmt->execute()){
                return $stmt->fetchAll();
            };
        } catch (\PDOException $e) {
            //echo $e->getMessage();
        }
        return [];
    }

    public function update($table, $fields, $where){
        $sql = "UPDATE $table SET $fields WHERE $where";
        $stmt = $this->pdo->prepare($sql);
        try {
            if($stmt->execute()){
                return $stmt->rowCount();
            };
        } catch (\PDOException $e) {
            //echo $e->getMessage();
        }
        return null;
    }

    public function delete($table, $where){
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->pdo->prepare($sql);
        try {
            if ($stmt->execute()) {
                return $stmt->rowCount();
            }
        } catch (\PDOException $e) {
            //echo $e->getMessage();
        }
        return null;
    }
}