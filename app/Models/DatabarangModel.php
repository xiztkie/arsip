<?php

namespace App\Models;

use CodeIgniter\Model;

class DatabarangModel extends Model
{
    protected $table = 'databarang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['lokasi_id', 'kode_brg', 'jenis_brg', 'merk', 'bahan', 'noreg', 'asalusul_id', 'tahun', 'kondisi',  'harga'];


    public function addbarang($data)
    {
        return $this->insert($data);
    }

    public function editbarang($data)
    {
        return $this->update($data['id'], $data);
    }

    public function deletebarang($id)
    {
        return $this->delete($id);
    }

    public function search($keyword)
    {
        return $this->Like('kode_brg', $keyword)
            ->orLike('jenis_brg', $keyword)
            ->orLike('merk', $keyword)
            ->orLike('noreg', $keyword)
            ->orLike('tahun', $keyword)
            ->orLike('kondisi', $keyword)
            ->orLike('ukuran', $keyword)
            ->orLike('no_rangka', $keyword)
            ->orLike('no_mesin', $keyword)
            ->orLike('plat', $keyword)
            ->orLike('bpkb', $keyword)
            ->orLike('harga', $keyword)
            ->orLike('ket', $keyword);
    }
}
