<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TahunModel;
use App\Models\DatalokasiModel;
use App\Models\PejabatModel;
use App\Models\DatabarangModel;

class Databarang extends BaseController
{
    public function __construct()
    {
        $this->datalokasiModel = new DatalokasiModel();
        $this->databarangModel = new DatabarangModel();
        $this->pejabatModel = new PejabatModel();
        $this->tahunModel = new TahunModel();
        helper('form');
    }
    public function index()
    {
        $currentpage = $this->request->getVar('page_databarang') ? $this->request->getVar('page_databarang') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $databarang = $this->databarangModel->search($keyword);
        } else {
            $databarang = $this->databarangModel;
        }

        $data = [
            'title' => 'Data Barang',
            'lokasi' => $this->datalokasiModel->findAll(),
            'tahun' => $this->tahunModel->findAll(),
            'pejabat' => $this->pejabatModel->findAll(),
            'databarang' => $databarang->select('databarang.*, lokasi.nama_lokasi')
                ->join('lokasi', 'lokasi.id = databarang.lokasi_id', 'left')
                ->findAll(),
            'currentpage' => $currentpage,
            'isi' => 'databarang'
        ];

        return view('layout/wrapper', $data);
    }

    public function addbarang()
    {
        // Validasi data yang dikirim dari formulir
        $validationRules = [
            'lokasi_id' => 'required',
            'kode_brg' => 'required',
            'jenis_brg' => 'required',
            'merk' => 'required',
            'noreg' => 'required', // Perbaiki nama field
            'tahun' => 'required',
            'kondisi' => 'required',
            'bahan' => 'required',
            'harga' => 'required|numeric', // Pastikan harga adalah angka
        ];

        if ($this->validate($validationRules)) {
            // Data valid, lakukan penyimpanan ke database atau tindakan lainnya
            $data = [
                'lokasi_id' => (int) $this->request->getPost('lokasi_id'), // Konversi ke integer jika diperlukan
                'kode_brg' => $this->request->getPost('kode_brg'),
                'jenis_brg' => $this->request->getPost('jenis_brg'),
                'merk' => $this->request->getPost('merk'),
                'noreg' => $this->request->getPost('noreg'), // Sesuaikan dengan nama validasi
                'tahun' => $this->request->getPost('tahun'),
                'kondisi' => $this->request->getPost('kondisi'),
                'bahan' => $this->request->getPost('bahan'),
                'harga' => $this->request->getPost('harga'),
            ];

            $this->databarangModel->addbarang($data);

            return redirect()->to('databarang')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->to('databarang')->with('error', 'Periksa kembali inputan anda');
        }
    }

    public function editbarang($id)
    {
        $barang = $this->databarangModel->find($id);

        if ($barang) {
            $data = [
                'id' => $id,
                'lokasi_id' => $this->request->getPost('lokasi_id'),
                'kode_brg' => $this->request->getPost('kode_brg'),
                'jenis_brg' => $this->request->getPost('jenis_brg'),
                'merk' => $this->request->getPost('merk'),
                'noreg' => $this->request->getPost('noreg'),
                'tahun' => $this->request->getPost('tahun'),
                'kondisi' => $this->request->getPost('kondisi'),
                'bahan' => $this->request->getPost('bahan'),
                'harga' => $this->request->getPost('harga'),
            ];

            $this->databarangModel->editbarang($data);

            return redirect()->to(site_url('databarang'))->with('success', 'Data pengguna berhasil diperbarui.');
        } else {
            return redirect()->to('databarang')->with('error', 'User tidak ditemukan');
        }
    }
    public function delbarang($id)
    {
        $barang = $this->databarangModel->find($id);

        if ($barang) {
            $this->databarangModel->deletebarang($id);
            return redirect()->to('databarang')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('databarang')->with('error', 'User tidak ditemukan');
        }
    }
}
