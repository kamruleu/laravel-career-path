<?php

namespace App\web\Database;

use App\web\storage\DB;

class Migration
{
    private DB $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function run(){
        $all_files = glob(__DIR__ . '/migrations/*');
        foreach ($all_files as $file_path) {
            if(is_file($file_path)){
                $sql = file_get_contents($file_path);
                $this->db->createTable($sql);
            }
        }
    }
}