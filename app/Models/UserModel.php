<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
 
    protected $allowedFields    = ['username','password','role'];
    public function cek_login($username, $password)
    {
        $query = $this->query('SELECT * FROM users WHERE username = \'' . $username . '\' AND password = \'' . $password . '\'');

        return $query->getRowArray();
    }

}
