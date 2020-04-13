<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\UserType;

class Home extends Controller
{

	public function index()
	{	
		// If the user hasn't logged in
		if (!isset($_SESSION['user'])) {

			$this->render("home");

			return;
		}

		$this->model = new UserType;

		$this->render("home",
			[
				"username" => Session::get("user"),
				"user_types" => $this->model->getAllUsersTypes()
			]);

	
	}

	public function logout()
	{
		session_destroy();
		$this->redirect("Home\index");

	}


}
