<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHakAkses extends Model
{
	protected $table                = 'hak_akses_dtl';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['kode','modul_id','nama_hak_akses'];

    public function getModul($id)
    {
        $query = $this->db->query("CALL hak_akses_dtl_view($id)");
        $results = $query->getResult();
        return $results;
    }
	
}
