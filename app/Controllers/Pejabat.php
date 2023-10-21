<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PejabatModel;

class Pejabat extends BaseController
{
    public function __construct()
    {
        $this->PejabatModel = new PejabatModel();
        helper('form');
    }
    public function index()
    {
        $currentpage = $this->request->getVar('page_pejabat') ? $this->request->getVar('page_pejabat') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pejabat = $this->PejabatModel->search($keyword);
        } else {
            $pejabat = $this->PejabatModel;
        }

        $data = [
            'title' => 'Daftar Kode pejabat',
            'pejabat' => $pejabat->orderBy('id', 'DESC')->paginate(10, 'pejabat'),
            'pager' => $this->PejabatModel->pager,
            'currentpage' => $currentpage,
            'isi' => 'pejabat'
        ];
        return view('layout/wrapper', $data);
    }
    public function addpejabat()
    {
        // Validasi data yang dikirim dari formulir
        $validationRules = [
            'nama_pejabat' => 'required',
            'nip' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, lakukan penyimpanan ke database atau tindakan lainnya
            $data = [
                'nama_pejabat' => $this->request->getPost('nama_pejabat'),
                'nip' => $this->request->getPost('nip'),
            ];
            $this->PejabatModel->addpejabat($data);

            return redirect()->to('pejabat')->with('success', 'Data berhasil disimpan');
        } else {
            // Data tidak valid, kembalikan ke formulir dengan pesan kesalahan
            return redirect()->to('pejabat')->withInput()->with('errors', \Config\Services::validation()->getErrors());
        }
    }
    public function editpejabat($id)
    {
        $pejabat = $this->PejabatModel->find($id);

        if ($pejabat) {
            $data = [
                'id' => $id,
                'nama_pejabat' => $this->request->getPost('nama_pejabat'),
                'nip' => $this->request->getPost('nip'),
            ];

            $this->PejabatModel->editpejabat($data);

            return redirect()->to(site_url('pejabat'))->with('success', 'Data pengguna berhasil diperbarui.');
        } else {
            return redirect()->to('pejabat')->with('error', 'User tidak ditemukan');
        }
    }
    public function delpejabat($id)
    {
        $pejabat = $this->PejabatModel->find($id);

        if ($pejabat) {
            $this->PejabatModel->deletepejabat($id);
            return redirect()->to('pejabat')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('pejabat')->with('error', 'User tidak ditemukan');
        }
    }
}
