<?php

namespace App\Core;

class Model extends ConnectionDb
{
	function __construct()
	{

		$this->getConnection();
	}


}