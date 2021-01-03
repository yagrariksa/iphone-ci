<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model {

    protected $table = 'transaksi';

    protected $allowedFields = [
        'id_pembeli','status',
        'total','total_barang','alamat'
    ];

    public function getAll(){
        return $this->findAll();
    }
    
}