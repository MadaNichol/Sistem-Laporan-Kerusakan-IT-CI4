<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'tb_pengaduan';
    protected $primaryKey = 'id_pengaduan'; 
    protected $allowedFields = ['id_pengaduan','id_kategori','nama_kategori','id_karyawan','nama_karyawan','tgl_pengaduan','keterangan_pengaduan'];
}

