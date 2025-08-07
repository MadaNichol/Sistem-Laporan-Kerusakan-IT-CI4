<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table = 'vendor';
    protected $primaryKey = 'id_vendor'; 
    protected $allowedFields = ['id_vendor','nama_vendor','kontak_vendor','nama_perusahaan'];
}

