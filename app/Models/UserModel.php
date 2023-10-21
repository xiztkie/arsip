<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role'];
    public function login($username, $password)
    {
        return $this->where('username', $username)
                    ->first();
    }

    public function search($keyword)
    {
        return $this->like('username', $keyword);
    }
}
