<?php

namespace App\Models;

use CodeIgniter\Model;

class NumberingModel extends Model
{
    protected $table = 'numberings';
    protected $allowedFields = ['group1', 'group2', 'group3', 'group3_sub', 'group4', 'group5', 'group6', 'pdf_filename'];

}
