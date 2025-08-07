<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffitModel extends Model
{
    protected $table = 'tb_staff_it';
    protected $primaryKey = 'id_staff_it'; 
    protected $allowedFields = ['id_staff_it','nama_staff_it','no_telp'];
}

