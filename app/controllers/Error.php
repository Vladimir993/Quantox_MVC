<?php

namespace App\Controllers;

use App\Core\Controller;

class Error extends Controller
{
	public function index()
	{

	}

    public function fields()
    {

        $this->render("errors/emptyFields");
    }

    public function errorUser()
    {
    	$this->render("errors/errorUser");
    }
}