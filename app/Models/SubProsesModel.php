<?php

namespace App\Models;

use CodeIgniter\Model;

class SubProsesModel extends Model
{
    protected $table            = 'sub_proses_produksi';
    protected $primaryKey       = 'no';

    protected $allowedFields    = ['no_sub_proses', 'jenis_sub_proses', 'proses'];

    public function getItemSub($Proses)
    {
        // Lakukan query untuk mengambil data ITEM berdasarkan nilai SUPPLIER 2024
        return $this->select('no_sub_proses , jenis_sub_proses, proses')
            ->where('proses', $Proses)
            ->findAll();
    }

    public function getAllData()
    {
        return $this->select('sub_proses_produksi.*')
            ->findAll();
    }
}
