<?php

namespace App\Models;

use CodeIgniter\Model;

class AsalusulModel extends Model
{
    protected $table = 'asalusul';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sumber'];


    public function addasal($data)
    {
        return $this->insert($data);
    }

    public function editasal($data)
    {
        return $this->update($data['id'], $data);
    }

    public function deleteasal($id)
    {
        return $this->delete($id);
    }

    public function search($keyword)
    {
        return $this->like('sumber', $keyword);
    }
}
