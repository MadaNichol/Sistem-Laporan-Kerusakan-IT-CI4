<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
    protected $table = 'tb_tiket';
    protected $primaryKey = 'id_tiket'; 
    protected $allowedFields = ['id_tiket','id_staff_it','id_pengaduan','id_vendor','nama_staff_it','nama_vendor','status_tiket','keterangan_tindakan','tgl_tiket'];
}

