<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'tb_karyawan';
    protected $primaryKey = 'id_karyawan'; 
    protected $allowedFields = ['id_karyawan','nama_karyawan','no_telp','id_departemen'];
}

