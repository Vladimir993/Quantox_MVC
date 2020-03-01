<?php

namespace App\Controllers;

use App\Core\Controller;

class Login extends Controller
{
	public function index()
	{

		
		$this->render("login");
	}

	public function loginValidation()
	{
		$this->loadModel("User");
		var_dump($this->model->getUser("name",["email",'vlada@gmail.com']));
		// if (isset($_GET['login'])) {
		// 	if ($this->model->getUser("email","email",$_GET['email'])) {
		// 		session_start();
		// 		$_SESSION['user'] = $_GET['email'];
		// 		$this->redirect(new Home,"index");
		// 	}
		// }
		
		
	}
}