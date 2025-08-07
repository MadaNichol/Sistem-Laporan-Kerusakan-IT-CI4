<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartemenModel extends Model
{
    protected $table = 'tb_departemen';
    protected $primaryKey = 'id_departemen'; 
    protected $allowedFields = ['id_departemen','departemen'];
}

