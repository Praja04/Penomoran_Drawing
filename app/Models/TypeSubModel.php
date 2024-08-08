<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeSubModel extends Model
{
    protected $table            = 'type_sub_proses';
    protected $primaryKey       = 'no';

    protected $allowedFields    = ['no_type', 'proses', 'type_sub_proses', 'sub_proses'];

    public function getAllData()
    {
        return $this->select('type_sub_proses.*')
            ->findAll();
    }

    public function getItemType($proses)
    {
        // Lakukan query untuk mengambil data ITEM berdasarkan nilai SUPPLIER 2024
        return $this->select('no_type , type_sub_proses, proses,sub_proses')
            ->where('proses', $proses)
            ->findAll();
    }
    public function getItemType2($subProses)
    {
        // Lakukan query untuk mengambil data ITEM berdasarkan nilai SUPPLIER 2024
        return $this->select('no_type , type_sub_proses, proses,sub_proses')
            ->where('sub_proses', $subProses)
            ->findAll();
    }
}
