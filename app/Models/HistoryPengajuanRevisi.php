<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryPengajuanRevisi extends Model
{
    protected $table            = 'history_pengajuan_revisi';
    protected $primaryKey       = 'id';
    
    protected $allowedFields    = ['nama_pengaju','komentar_pengaju','id_nomor_drawing'];

}
