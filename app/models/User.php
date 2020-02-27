<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
	public function getAllUsersTypes()
	{
		$query = $this->conn->query("SELECT * FROM users_types");
		
		if (mysqli_num_rows($query) > 0) {

			$res = $query->fetch_all(MYSQLI_ASSOC);
			
			return $res;
		}
	}
}