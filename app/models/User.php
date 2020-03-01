<?php

namespace App\Models;

use App\Core\ConnectionDb;

class User
{

	public static function getAllUsers(	)
	{
		$conn = ConnectionDb::getInstance()->getConnection();

		$query = $conn->query("SELECT name,email,password FROM users");

		if (mysqli_num_rows($query) > 0) {

			$res = $query->fetch_all(MYSQLI_ASSOC);

			foreach ($res as $key => $value) {

				$users[$key] = $value;
			}

			return $users;
		}
	}

	public static function getAllUsersTypes()
	{
		$conn = ConnectionDb::getInstance()->getConnection();

		$query = $conn->query("SELECT * FROM users_types");
		
		if (mysqli_num_rows($query) > 0) {

			$res = $query->fetch_all(MYSQLI_ASSOC);

			foreach ($res as $key => $value) {

				$users_types[$key] = $value;
			}

			return $users_types;
		}
	}


}