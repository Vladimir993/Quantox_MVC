<?php

namespace App\Controllers;

use App\Core\Controller;

class Login extends Controller
{
	public function index()
	{
		$this->render("login");
	}
}