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
	protected function render($view,$template = true)
	{
		if ($template) {

			require '../app/views/templates/header.php';

			require '../app/views/templates/footer.php';
		}

		require '../app/views/'. $view .'.php';

		$this->view = $view;
	}

}