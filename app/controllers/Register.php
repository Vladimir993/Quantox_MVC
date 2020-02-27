<?php

namespace App\Controllers;

use App\Core\Controller;

class Register extends Controller
{
	public function index()
	{
		$this->render("register");
	}
}
