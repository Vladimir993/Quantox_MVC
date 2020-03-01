<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
class Home extends Controller
{
	public function index()
	{
		Session::init();

		$this->loadModel("User");
		
		if (isset($_SESSION['user'])) {

			$this->render("home",[
					"username" => @Session::get("user"),
					"user_types" => $this->model->getAllUsersTypes()
				]);

		}else{
			$this->render("home",[
				"user_types" => $this->model->getAllUsersTypes()
			]);
		}
	
	}

	public function logout()
	{
		Session::init();
		session_destroy();
		$this->redirect(new Home,"index");

	}
}
