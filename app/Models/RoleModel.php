<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'tb_role';
    protected $primaryKey = 'id_role'; 
    protected $allowedFields = ['id_role','role'];
}

