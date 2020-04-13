<?php

namespace App\Controllers;

use App\Core\Controller;

class Error extends Controller
{		
	private $error = null;

	public function __construct($error)
	{
		$this->error = $error;
	}

	public function printError()
	{
		echo $this->error;
	}

	public function notFound404()
	{
		$this->render("notFound404",["notFound" => $this->error]);
	}
}