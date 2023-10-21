<?php

namespace App\Models;

use CodeIgniter\Model;

class DatalokasiModel extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_lokasi', 'nama_lokasi'];


    public function addlokasi($data)
    {
        return $this->insert($data);
    }

    public function editlokasi($data)
    {
        return $this->update($data['id'], $data);
    }

    public function deletelokasi($id)
    {
        return $this->delete($id);
    }

    public function search($keyword)
    {
        return $this->like('kode_lokasi', $keyword)->orLike('nama_lokasi', $keyword);
    }
}
