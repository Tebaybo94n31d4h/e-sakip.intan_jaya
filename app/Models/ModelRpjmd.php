<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Database\BaseBuilder;

class ModelRpjmd
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function insertPeriode($data)
    {
        $builder = $this->db->table('periode');
        $builder->insert($data);
    }



}
