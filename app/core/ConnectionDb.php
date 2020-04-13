<?php

namespace App\Core;

class ConnectionDb {

    private static $instance;
    public $conn;

   
    private function __construct()
    {   
      $this->conn =  new \PDO("mysql:host=".$GLOBALS['host'].";dbname=".$GLOBALS['db'], $GLOBALS['user'], $GLOBALS['password']);
    }
    
    public static function getInstance()
    {
      if(!self::$instance){
        self::$instance = new ConnectionDb();
      }
   
      return self::$instance;
    }
  
    public function getConnection()
    {
      return $this->conn;
      
    }
}
