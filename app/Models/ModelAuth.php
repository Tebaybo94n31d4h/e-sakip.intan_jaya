<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
	public function login_user($username, $password)
	{
		$query = $this->db->query("CALL login('$username', '$password', '')");
		return 	$query->getRow();
	}

	// public function hak_akses($menu)
	// {
	// 	return $this->db->table("Call hak_akses_view")
	// }

}
