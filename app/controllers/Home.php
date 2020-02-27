<?php

namespace App\Controllers;

use App\Core\Controller;

class Home extends Controller
{
	public function index()
	{
		$this->loadModel("User");
		

		$this->render("home",[
			"users_types" => $this->model->getAllUsersTypes()
		]);
	}
}
