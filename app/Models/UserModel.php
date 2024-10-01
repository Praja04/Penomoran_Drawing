<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user_pce';
    // protected $primaryKey       = 'id';

    protected $allowedFields    = ['npk', 'nama', 'role','email'];
    public function cek_login($username, $password)
    { 
        $query = $this->query('SELECT * FROM users WHERE username = \'' . $username . '\' AND password = \'' . $password . '\'');

        return $query->getRowArray();
    }

    public function getAllData()
    {
        return $this->select('nama,npk')
        ->findAll();
    }
}
