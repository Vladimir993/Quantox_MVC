<?php

namespace App\Core;

class Connection {

    private static $instance = null;
  	private $conn;
  
  	const HOST = 'localhost';
  	const USER = 'root';
	  const PASS = '';
   
  	private function __construct()
  	{
  		  $this->conn = mysqli_connect(SELF::HOST, SELF::USER, SELF::PASS);
  	}
  	
  	public static function getInstance()
  	{
      	if(!self::$instance){
        		self::$instance = new Connection();
      	}
   
    	  return self::$instance;
  	}
  
  	public function getConnection()
  	{
    	return $this->conn;
  	}
}
