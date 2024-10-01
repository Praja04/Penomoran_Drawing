<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenProjectModel extends Model
{
    protected $table            = 'dokumen_project';
    protected $primaryKey       = 'id_dokumen';
    protected $allowedFields    = ['id_project','nama_project','nama_dokumen','dokumen','created_at'];

}
