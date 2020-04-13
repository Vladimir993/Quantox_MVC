<?php

namespace App\Models;

use App\Core\ConnectionDb;

class User
{

	public static function getAllUsers(	)
	{
		$conn = ConnectionDb::getInstance()->getConnection();

		$sql  = "SELECT name,email,password FROM users";

		$query = $conn->prepare($sql);

		$query->execute();

		if (true) {

			$res = $query->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($res as $key => $value) {

				$users[$key] = $value;
			}

			return $users;
		}
	}


	//method to add a new user
	public static function addNewUser($name,$email,$password,$userType= null,$language = null,$framework = null,$sub_fw = null)
	{
		$conn = ConnectionDb::getInstance()->getConnection();

		$conn->query("INSERT INTO users(name,email,password)VALUES('$name','$email','$password')");

		$sql = "";

		$userId = $conn->query("SELECT users.id FROM users WHERE users.email = '$email'")->fetch()[0];

		$userTypeId = $conn->query("SELECT users_types.id FROM users_types WHERE users_types.name = '$userType'")->fetch()[0];

		$languageId = $conn->query("SELECT languages.id FROM languages WHERE languages.name = '$language'")->fetch()[0];

		$frameworkId = $conn->query("SELECT frameworks_and_libraries.id FROM frameworks_and_libraries WHERE frameworks_and_libraries.name = '$framework'")->fetch()[0];

		$sub_framework = $conn->query("SELECT subtypes_framework.id FROM subtypes_framework WHERE subtypes_framework.name = '$sub_fw'")->fetch()[0];

		if($userTypeId != null) {
			$sql  .= "INSERT INTO users_users_types(user,user_type)VALUES($userId,$userTypeId); ";

			if($language != null) {
				$sql  .= "INSERT INTO users_languages(user,language)VALUES($userId,$languageId); ";

				if($framework != null) {
					$sql  .= "INSERT INTO users_frameworks(user,framework)VALUES($userId,$frameworkId); ";

					if($sub_fw != null) {
						$sql  .= "INSERT INTO users_subtypes_framework(user,subtype_framework)VALUES($userId,$sub_framework)";
					}
				}
			}
		}
		if ($sql != "") {
			$conn->exec($sql);
		}
		
	}


}