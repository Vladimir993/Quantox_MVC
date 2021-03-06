<?php

namespace App\Core;

class Validation
{
	/**
	 * Compare user input data with data in database.
	 * 
	 * @param array $userInput
	 * @param array $dbUsers
	 *
	 * @return assoc array
	**/
	public static function loginCompare($userInput, $dbUsers)
	{
		for($i=0;$i<count($dbUsers);$i++){

			if ($dbUsers[$i]["email"] == $userInput["email"] && 
				$dbUsers[$i]["password"] == $userInput["password"]){

					return $dbUsers[$i];
			}
					
		}
	}

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