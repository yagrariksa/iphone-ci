<?php namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model {

    protected $table = 'barang';

    protected $allowedFields = ['nama_barang', 'stok_barang','kategori','harga_barang','satuan_barang'];

    public function getAll(){
        return $this->findAll();
    }
    
}