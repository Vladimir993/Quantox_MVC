<?php

namespace App\Core;

abstract class Controller
{
	protected $view = null;
	protected $data = null;
	protected $model = null;
	/**
	 * Takes the appropriate one view
	 *
	 * @param string $view
	 * @param boolean $template	 
	 *
	 * @return void.
	**/

	protected function render($view, $data = [])
	{


			require '../app/views/'.$view.'/template/header.php';

			require '../app/views/'. $view .DIRECTORY_SEPARATOR. $view .'.php';

			require '../app/views/'.$view.'/template/footer.php';


		$this->view = $view;
		$this->data = $data;
	}

	/**
	 * Redirect user location.
	 *
	 * @param object $page
	 * @return void
	**/
	public function redirect($page)
	{
		header("location:http://localhost/Quantox_MVC/public/". $page);
	}

}