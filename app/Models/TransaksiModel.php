<?php namespace App\Models;


namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'ID_Produk';
    protected $allowedFields = ['ID_Produk', 'Nama_Produk', 'ID_Kategori', 'Stock', 'Harga_Beli', 'Created_at','Updated_at','Deleted_at'];
    
    public function getTransaksiBarang()
    {
        return $this->findAll();
    }
}
