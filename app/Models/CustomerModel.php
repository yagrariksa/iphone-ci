<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model {

    protected $table = 'customer';

    protected $allowedFields = ['email', 'password','alamat', 'nama'];

    public function getAll(){
        return $this->findAll();
    }
    
}