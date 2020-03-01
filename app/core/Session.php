<?php

namespace App\Core;

class Session
{
	public static function init()
	{	
		if (!isset($_SESSION)) {
			session_start();

		}
		
	}

	public static function set($sessionName,$sessionValue)
	{
		Session::init();
		$_SESSION[$sessionName] = $sessionValue;
	}

	public static function get($sessionName)
	{
		Session::init();
		return $_SESSION[$sessionName];
	}

	public static function destroy()
	{
		session_destroy();
	}
}