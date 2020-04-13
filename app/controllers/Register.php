<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validation;
use App\Models\UserType;

class Register extends Controller
{
	private $username;
	private $email;
	private $password;
	private $languages;
	private $frameworks;
	private $sub_frameworks;

	public function __construct()
	{
		$this->model = new UserType();
		$this->languages = $this->model->getAllLanguages();
		$this->frameworks = $this->model->getAllFrameworks();
		$this->sub_frameworks = $this->model->getAllSubFrameworks();
	}

	public function index()
	{	
		
		if (isset($_SESSION['user'])){
			$this->redirect("Home\index");
		}

		$this->render("register",
			[
				"languages"=>$this->languages,
				"frameworks"=>$this->frameworks,
				"sub_frameworks"=>$this->sub_frameworks
			]);

		if (isset($_POST['register'])) {

			$this->username = $_POST['username'];
			$this->email    = $_POST['email'];
			$this->password = $_POST['password'];

			if (!Validation::isEmptyFields([$_POST['username'],$_POST['email'],$_POST['password'],$_POST['repeatPassword']])) {

				if ($this->registerValidation() === 0){

					echo $GLOBALS['err_matchPass'];
					return;

				}

				if ($this->registerValidation() == true){

					$this->model->addNewUser($_POST['username'],$_POST['email'],$_POST['password'],$_POST['userType'],$_POST['language'],$_POST['framework'],$_POST['sub_framework']);

					echo $GLOBALS['successRegister'];

					return;

				}else{

					$loginError = new Error($GLOBALS['err_register']);
					$loginError->printError();
				}
			}else{

				$emptyFError = new Error($GLOBALS['err_emptyFields']);
				$emptyFError->printError();
			}	
			
		}
	}

	public function registerValidation()
	{
		if (isset($_POST['email'],$_POST['password'])) {
			return Validation::registerCompare(
				[
					"email"=>$_POST['email'],
					"password"=>$_POST['password'],
					"repeatPassword"=>$_POST['repeatPassword']
				],

				$this->model->getAllUsers()
			);
		}else{
			$this->redirect("Home\index");
			
		}
		
	}
}
