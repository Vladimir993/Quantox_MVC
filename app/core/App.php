<?php

namespace App\Core;

class App
{
	private $url_controller = "Home";
	private $url_action = "index";
	private $url_params = [];

	// Route user to requested page.
	function __construct()
	{
		/*
		 * $urlArray[0] = controller(Page)
		 * $urlArray[1] = method(action)
		 * $urlArray[2,3,4...] = parameters for method.
		*/
		$urlArray = $this->parseUrl();

		// If page doesn't requested, then route to default page Home.
		// If action doesn't requested, then call default action index.
		if (empty($urlArray[0])) {

			$controller  =  "App\Controllers\\$this->url_controller";

		}elseif (file_exists("../app/controllers/" .$urlArray[0]. ".php")) {

			$this->url_controller = $urlArray[0];

			$controller  =  "App\Controllers\\$this->url_controller";

			unset($urlArray[0]);

			if (isset($urlArray[1])){

				if (method_exists($controller , $urlArray[1])){

					$this->url_action = $urlArray[1];

				}else{

					die("Error action");
				}

				unset($urlArray[1]);
			}
		}else{

			die('Error page');
		}

		$this->url_controller = $controller;
		
		$this->url_controller = new $this->url_controller();

		$this->url_params = $urlArray ? array_values($urlArray) : [];

		call_user_func_array([$this->url_controller, $this->url_action], $this->url_params);

	}

	/**
     * Split url and convert to array.
     *
     * @return array
     */
	public function parseUrl()
	{
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL)) ; 
		}
	}
}