<?php

namespace App\Models;

use App\Core\ConnectionDb;
use App\Models\User;

class UserType extends User
{
	public static function getAllUsersTypes()
	{
		$conn = ConnectionDb::getInstance()->getConnection();

		$sql  = "SELECT * FROM users_types";

		$query = $conn->prepare($sql);

		$query->execute();
		
		if (true) {

			$res = $query->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($res as $key => $value) {

				$users_types[$key] = $value;
			}

			return $users_types;
		}
	}

	public static function getAllLanguages($userType = null)
	{
		$conn = ConnectionDb::getInstance()->getConnection();

		$sql = "SELECT languages.id,languages.name,languages.user_type FROM languages JOIN users_types ON users_types.id = languages.user_type";
		
		if ($userType != null) {
			$sql .= " WHERE users_types.name = '$userType'";

		}
		$query = $conn->query($sql);

		if (true) {
			$res = $query->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($res as $key => $value) {
				$languages[$key] = $value;

			}
			return $languages;

		}

	}

	public static function getAllFrameworks($language = null)
	{
		$conn = ConnectionDb::getInstance()->getConnection();

		$sql = ("SELECT frameworks_and_libraries.id,frameworks_and_libraries.name,frameworks_and_libraries.language FROM frameworks_and_libraries JOIN languages ON languages.id = frameworks_and_libraries.language");

		if ($language != null) {
			$sql .= " WHERE languages.name = '$language'";
		}
		$query = $conn->query($sql);
		if (true) {
			$res = $query->fetchAll(\PDO::FETCH_ASSOC);
			foreach ($res as $key => $value) {
				$frameworks[$key] = $value;
			}
			return $frameworks;
		}
	}

	public static function getAllSubFrameworks($framework = null)
	{
		$conn = ConnectionDb::getInstance()->getConnection();

		$sql = (" SELECT subtypes_framework.id,subtypes_framework.name,subtypes_framework.framework FROM subtypes_framework JOIN frameworks_and_libraries ON frameworks_and_libraries.id = subtypes_framework.framework");
		if ($framework != null) {
			$sql .= " WHERE frameworks_and_libraries.name = '$framework'";
		}
		$query = $conn->query($sql);
		if (true) {
			$res = $query->fetchAll(\PDO::FETCH_ASSOC);
			foreach ($res as $key => $value) {
				$sub_frameworks[$key] = $value;
			}
			return $sub_frameworks;
		}
	}


		
}