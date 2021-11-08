<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJumlah extends Model
{
	public function jmlhopdp()
	{  
		$query = $this->db->query('opd_hdr');
		if($query->getNumRows()>0)
		{
			return $query->getNumRows();
		}
		else
		{
			return 0;
		}
	}
}
