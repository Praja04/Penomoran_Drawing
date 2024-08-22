<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisProject extends Model
{
    protected $table            = 'jenis_project';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_project'];

    public function getAllData()
    {
        return $this->select('jenis_project.*')
        ->findAll();
    }
}
