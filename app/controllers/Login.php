<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validation;
use App\Core\Session;
use App\Models\User;

class Login extends Controller
{
	public function index()
	{	
		// The user is forbidden to go to the login page if logged in
		if (isset($_SESSION['user'])){
			
			$this->redirect($GLOBALS[$home_page]);
		}

		$this->model = new User();
		$this->render("login");

		if (isset($_GET['login'])) {

			if (!Validation::isEmptyFields([$_GET['email'],$_GET['password']])) {

				if ($this->loginValidation()){

					$loggedUser = $this->loginValidation()['name'];

					Session::set("user",$loggedUser);

					$this->redirect("Home\index");
				}else{

					$loginError = new Error($GLOBALS['err_login']);
					$loginError->printError();
				}
			}else{

				$emptyFError = new Error($GLOBALS['err_emptyFields']);
				$emptyFError->printError();
			}	
			
		}
	}

	public function loginValidation()
	{
		
		if (isset($_GET['email'],$_GET['password'])) {
			return Validation::loginCompare(
				[
					"email"=>$_GET['email'],
					"password"=>$_GET['password']
				],

				$this->model->getAllUsers()
			);
		}else{
			$this->redirect("Home\index");
			
		}
		
	}

}