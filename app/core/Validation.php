<?php

namespace App\Core;

class Validation
{

	/**
	 * Check fields.
	 * 
	 * @param array $fields
	 *
	 * @return boolean
	**/
	public static function isEmptyFields($fields)
	{
		if (is_array($fields)) 
		{
			foreach ($fields as $key => $value) 
			{
				if (empty($value)) 
				{
					return true;
				}
			}
		}
		
		return false;	
			
	}	

	/**
	 * Compare user login input data with data in database.
	 * If user doesn't exist return empty array.	 
	 * If user exist return array with user info.
	 *
	 * @param array $userInput
	 * @param array $dbUsers
	 *
	 * @return array.
	**/
	public static function loginCompare($userInput, $dbUsers)
	{
		$user = [];

		for($i=0;$i<count($dbUsers);$i++){

			if ($dbUsers[$i]["email"] == $userInput["email"] && 
				$dbUsers[$i]["password"] == $userInput["password"]){

					$user =  $dbUsers[$i];
					break;
			}
					
		}
		return $user;
	}

	/**
	 * Compare user register input data with data in database.
	 * 
	 * @param assoc array $fields
	 * @param array[array[assoc arry],...] $dbUsers
	 *
	 * @return assoc array
	**/
	public static function registerCompare($fields, $dbUsers)
	{
		for($i=0;$i<count($dbUsers);$i++)
		{
			if ($dbUsers[$i]["email"] == $fields["email"] ) 
			{
					
				return false;
			}
			else if ($fields['password']!=$fields['repeatPassword']) {

				return 0;
			}
				
		}
			
		return true;
			
	}	
}