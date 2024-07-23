<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'ID_Kategori';
    protected $allowedFields = ['Nama_Kategori'];
}
