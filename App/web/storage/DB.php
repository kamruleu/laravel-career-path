
<?php

// namespace App\web\storage;

class DB 
{
    private string $serverName = "localhost";
    private string $databaseName = "bangubank";
    private string $userName = "root";
    private string $password = "";
    private PDO $conn;

    public function __construct()
    {
        
        try {
            $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->databaseName", $this->userName, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }

    public function test() {
        echo "Test";
    }
}

$db = new DB();
$db->test();
