<?php

namespace App\Core;

class Controller
{
	
	/**
	 * Takes the appropriate one view
	 *
	 * @param string $view
	 * @param boolean $template	 
	 *
	 * @return void.
	**/ 
	protected function render($view, $data = [], $template = true)
	{
		if ($template) {

			require '../app/views/templates/header.php';

			require '../app/views/templates/footer.php';
		}

		require '../app/views/'. $view .'.php';

		$this->view = $view;
		$this->data = $data;
	}

	protected function loadModel($model)
	{
		
		$model = "App\Models\\$model";

		$this->model = new $model();
	}

	/**
	 * Redirect user location.
	 *
	 * @param object $class
	 * @param string $method
	 * @return void
	**/
	function redirect($class,$method)
	{
		header("location:http://localhost/Quantox_MVC/public/" . 
		(new \ReflectionClass($class))->getShortName() . DIRECTORY_SEPARATOR . $method);
	}

}