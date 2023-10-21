<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DatalokasiModel;


class Datalokasi extends BaseController
{

    public function __construct()
    {
        $this->DatalokasiModel = new DatalokasiModel();
        helper('form');
    }
    public function index()
    {
        $currentpage = $this->request->getVar('page_datalokasi') ? $this->request->getVar('page_datalokasi') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $lokasi = $this->DatalokasiModel->search($keyword);
        } else {
            $lokasi = $this->DatalokasiModel;
        }

        $data = [
            'title' => 'Daftar Kode Lokasi',
            'lokasi' => $lokasi->orderBy('id', 'DESC')->paginate(10, 'lokasi'),
            'pager' => $this->DatalokasiModel->pager,
            'currentpage' => $currentpage,
            'isi' => 'datalokasi'
        ];
        return view('layout/wrapper', $data);
    }
    public function addlokasi()
    {
        // Validasi data yang dikirim dari formulir
        $validationRules = [
            'nama_lokasi' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, lakukan penyimpanan ke database atau tindakan lainnya
            $data = [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            ];
            $this->DatalokasiModel->addlokasi($data);

            return redirect()->to('datalokasi')->with('success', 'Data berhasil disimpan');
        } else {
            // Data tidak valid, kembalikan ke formulir dengan pesan kesalahan
            return redirect()->to('datalokasi')->withInput()->with('errors', \Config\Services::validation()->getErrors());
        }
    }
    public function editlokasi($id)
    {
        $lokasi = $this->DatalokasiModel->find($id);

        if ($lokasi) {
            $data = [
                'id' => $id,
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            ];

            $this->DatalokasiModel->editlokasi($data);

            return redirect()->to(site_url('datalokasi'))->with('success', 'Data pengguna berhasil diperbarui.');
        } else {
            return redirect()->to('datalokasi')->with('error', 'User tidak ditemukan');
        }
    }
    public function dellokasi($id)
    {
        $lokasi = $this->DatalokasiModel->find($id);

        if ($lokasi) {
            $this->DatalokasiModel->deletelokasi($id);
            return redirect()->to('datalokasi')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('datalokasi')->with('error', 'User tidak ditemukan');
        }
    }
}
