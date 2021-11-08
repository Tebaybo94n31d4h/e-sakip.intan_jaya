<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSubBidang extends Model
{
	protected $table                = 'sub_bidang';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['bidang_id','kode','nama_sub_bidang',];
	
}
