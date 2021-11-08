<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMenu extends Model
{

	public function menu()
	{
		$query = $this->db->query("SELECT had.hak_akses_hdr_id, had.modul_id,had.is_active,had.is_view,had.is_insert,had.is_update,
                                        had.is_delete,m.nama_modul
                                    FROM hak_akses_dtl had
                                    LEFT JOIN hak_akses_hdr hah ON hah.id = had.hak_akses_hdr_id
                                    RIGHT JOIN modul m ON m.id = had.modul_id
                                    WHERE had.hak_akses_hdr_id = 
                                    ");
        $results = $query->getResult();
        return $results;
		
	}

	
}
