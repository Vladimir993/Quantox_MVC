<?php

namespace App\Core;

use App\Controllers\Error;
use App\Core\Session;

class App
{
	private $url_controller;
	private $url_action;
	private $url_params;

	public function __construct()
	{	
		/*
		 * $urlArray[0] = controller(Page)
		 * $urlArray[1] = method(action)
		 * $urlArray[2,3,4...] = parameters for method.
		*/
		$urlArray = $this->parseUrl();

		// var_dump(rtrim($_GET['url'],'/'));
		// If page doesn't requested, then set default page Home.
		// If action doesn't requested, then set default action index.
		if (!empty($urlArray[0])){

			$this->url_controller = "App\Controllers\\".$urlArray[0];

		}else{

			$this->url_controller = "App\Controllers\\".$GLOBALS['home_page'];								
		}

		if (!empty($urlArray[1])) {

			$this->url_action = $urlArray[1];
		}else{

			$this->url_action = $GLOBALS['action'];	

		}

		unset($urlArray[0]);

		unset($urlArray[1]);

		$this->url_params = $urlArray ? array_values($urlArray) : [];
		

	}

	// Route user to requested page.
	public function handle()
	{
		// Start session
		Session::init();
			
		try {

			if (class_exists($this->url_controller) && method_exists($this->url_controller, $this->url_action)) {

				$this->url_controller = new $this->url_controller;

				call_user_func_array([$this->url_controller, $this->url_action], $this->url_params);	

			}else{

				throw new \Exception($GLOBALS['err_notFound']);
			}			
		
		} catch (\Exception $err){
			
			$err404 = new Error($err->getMessage());

			$err404->notFound404();
		}
	
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