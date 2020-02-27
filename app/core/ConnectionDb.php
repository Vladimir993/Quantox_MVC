<?php

namespace App\Core;

class ConnectionDb {

    private static $instance = null;
  	protected $conn;
  
  	const HOST = 'localhost';
  	const USER = 'root';
	  const PASS = '';
    const DB   = 'quantox';
	
  	private static function getInstance()
  	{
      	if(!self::$instance){
        		self::$instance = mysqli_connect(SELF::HOST, SELF::USER, SELF::PASS, SELF::DB );
      	}
   
    	  return self::$instance;
  	}
  
  	public function getConnection()
  	{
      self::getInstance();
    	$this->conn = self::$instance;
  	}
}
