<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'user';

    protected $allowedFields = ['email', 'password','admin'];

    public function getAll(){
        return $this->findAll();
    }
    
}