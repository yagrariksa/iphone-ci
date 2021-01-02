<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'user';

    protected $allowedFields = ['email', 'password'];

    public function getAll(){
        return $this->findAll();
    }
    
}