<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validation;
use App\Core\Session;

class Login extends Controller
{

	public function index()
	{

		$this->render("login");
	}

	public function loginValidation()
	{

		if (isset($_GET['password'],$_GET['email'])) {

			$this->render("login");

			$this->loadModel("User");

			$userInput = ['email' => $_GET['email'], 'password' => $_GET['password']];

			if (Validation::isEmptyFields($userInput)) {

				return $this->redirect(Error,"fields");
			}

			$dbUser =  Validation::loginCompare([

						"email"=>$userInput['email'],
						"password"=>$userInput['password']
						],
					$this->model->getAllUsers()
				);

			if (empty($dbUser)) {

				return $this->redirect(Error,"errorUser");
	
			}

			Session::set("user",$dbUser['name']);
			$this->redirect(new Home,"loggedIn");
				
		}

		else{
			$this->redirect(new Login,"index");			
		}


	}
}