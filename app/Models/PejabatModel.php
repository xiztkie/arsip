<?php

namespace App\Models;

use CodeIgniter\Model;

class PejabatModel extends Model
{
    protected $table = 'pejabat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nip', 'nama_pejabat'];


    public function addpejabat($data)
    {
        return $this->insert($data);
    }

    public function editpejabat($data)
    {
        return $this->update($data['id'], $data);
    }

    public function deletepejabat($id)
    {
        return $this->delete($id);
    }

    public function search($keyword)
    {
        return $this->like('nip', $keyword)->orLike('nama_pejabat', $keyword);
    }
}
