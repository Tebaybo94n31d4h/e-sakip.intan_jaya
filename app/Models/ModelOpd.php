<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOpd extends Model
{
	// protected $table                = 'opd_hdr';
	// protected $primaryKey           = 'id';
	// protected $returnType           = 'object';
	// protected $allowedFields        = ['kode','nama_opd','alamat_opd'];

	public function ambilopd()
	{
		$query = $this->db->query("CALL opd_view()");
        $results = $query->getResult();
        return $results;
		
	}

	public function selecttypeopd()
	{
		$query = $this->db->query("SELECT * FROM tipe_opd");
        $results = $query->getResult();
        return $results;
		
	}

	
}
