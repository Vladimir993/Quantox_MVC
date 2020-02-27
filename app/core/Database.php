<?php

namespace App\Core;

class Database extends Connection
{
	function __construct()
	{
		$this->getInstance();
	}
}