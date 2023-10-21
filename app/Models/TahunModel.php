<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunModel extends Model
{
    protected $table = 'tahun';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tahun'];


    public function addtahun($data)
    {
        return $this->insert($data);
    }

    public function edittahun($data)
    {
        return $this->update($data['id'], $data);
    }

    public function deletetahun($id)
    {
        return $this->delete($id);
    }

    public function search($keyword)
    {
        return $this->like('tahun', $keyword);
    }
}
