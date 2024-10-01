<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table            = 'project';
    protected $primaryKey       = 'id_project';
    protected $allowedFields    = ['user_id','nama_pengaju','nama_project','keterangan_project','created_at'];

    public function getAllData()
    {
        return $this->select('project.*')
        ->orderBy('created_at','DESC')
        ->findAll();
    }

    public function hasDetail($id_project)
    {
        // Load DetailProject model
        $detailProject = new DetailProject();

        // Cek apakah ada detail project dengan id_project yang diberikan
        $detail = $detailProject->where('id_project', $id_project)->first();

        // Jika ditemukan data detail, return 1, jika tidak return 0
        return $detail ? 1 : 0;
    }
}
