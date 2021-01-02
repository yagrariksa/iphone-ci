<?php namespace App\Models;

use CodeIgniter\Model;

class BarangTerbeliModel extends Model {

    protected $table = 'barangterbeli';

    protected $allowedFields = [
        'transaksi_id','nama_barang',
        'harga_barang','jumlah_beli',
        'subtotal'
    ];

    public function getAll(){
        return $this->findAll();
    }
    
}