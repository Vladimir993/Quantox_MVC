<?php

namespace App\Core;

class ConnectionDb {

    private static $instance;
    public $conn;
  
    private const HOST = 'localhost';
    private const USER = 'root';
    private const PASS = '';
    private const DB   = 'quantox';
   
    private function __construct()
    {   
      $this->conn =  mysqli_connect(SELF::HOST,SELF::USER,SELF::PASS,SELF::DB);
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
