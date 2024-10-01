<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailProject extends Model
{
    protected $table            = 'detail_project';
    protected $primaryKey       = 'id_detail';
    protected $allowedFields    = ['id_project','user_id','id_drafter','nama_drafter','nama_project','nama_part','created_at'];

    public function deleteByFields($nama_part, $nama_project, $id_drafter)
    {
        return $this->where('nama_part', $nama_part)
            ->where('nama_project', $nama_project)
            ->where('id_drafter', $id_drafter)
            ->delete();
    }
    public function updateNamaPart($id_drafter, $nama_project, $old_nama_part, $new_nama_part)
    {
        return $this->where('id_drafter', $id_drafter)
            ->where('nama_project', $nama_project)
            ->where('nama_part', $old_nama_part)
            ->set('nama_part', $new_nama_part)
            ->update();
    }

}
