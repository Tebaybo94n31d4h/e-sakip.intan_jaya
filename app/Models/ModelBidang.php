<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBidang extends Model
{
	protected $table                = 'bidang';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['kode','nama_bidang'];

	public function ambilopd()
	{
		$query = $this->db->query("CALL opd_view()");
        $results = $query->getResult();
        return $results;
		
	}

	public function selecttypebidang()
	{
		$query = $this->db->query("SELECT * FROM tipe_bidang");
        $results = $query->getResult();
        return $results;
		
	}

	
}
