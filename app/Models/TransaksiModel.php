<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model {

    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';

    protected $useTimestamps = true;
    protected $createdField  = 'waktu_transaksi';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'id_pembeli','status',
        'total','total_barang','alamat'
    ];

    public function getAll(){
        return $this->findAll();
    }
    
}