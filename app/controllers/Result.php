<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserType;

class Result extends Controller
{
	private $user_types;
	private $languages;
	private $frameworks;
	private $sub_frameworks;

	public function __construct()
	{
		$this->user_types = UserType::getAllUsersTypes();
		$this->languages = UserType::getAllLanguages();
		$this->frameworks = UserType::getAllFrameworks();
		$this->sub_frameworks = UserType::getAllSubFrameworks();
	}

	public function index()
	{
		if (isset($_SESSION['user'])) {

			$this->render("result",
				["user_types"=>$this->user_types,
				"languages"=>$this->languages,
				"frameworks"=>$this->frameworks,
				"sub_frameworks"=>$this->sub_frameworks
			]);

		}else{

			$loginError = new Error($GLOBALS['err_notLogin']);
			$loginError->printError();
		}

	}
}
