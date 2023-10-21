<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TahunModel;

class Masterdata extends BaseController
{
    public function __construct()
    {
        $this->TahunModel = new TahunModel();
        helper('form');
    }
    
    public function index()
    {
        $currentpage = $this->request->getVar('page_tahun') ? $this->request->getVar('page_tahun') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $tahun = $this->TahunModel->search($keyword);
        } else {
            $tahun = $this->TahunModel;
        }

        $data = [
            'title' => 'Daftar Tahun Pembelian',
            'tahun' => $tahun->orderBy('id', 'DESC')->paginate(10, 'tahun'),
            'pager' => $this->TahunModel->pager,
            'currentpage' => $currentpage,
            'isi' => 'tahun'
        ];
        return view('layout/wrapper', $data);
    }
    public function addtahun()
    {
        // Validasi data yang dikirim dari formulir
        $validationRules = [
            'tahun' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, lakukan penyimpanan ke database atau tindakan lainnya
            $data = [
                'tahun' => $this->request->getPost('tahun')
            ];
            $this->TahunModel->addtahun($data);

            return redirect()->to('tahun')->with('success', 'Data berhasil disimpan');
        } else {
            // Data tidak valid, kembalikan ke formulir dengan pesan kesalahan
            return redirect()->to('tahun')->withInput()->with('errors', \Config\Services::validation()->getErrors());
        }
    }
    public function edittahun($id)
    {
        $tahun = $this->TahunModel->find($id);

        if ($tahun) {
            $data = [
                'id' => $id,
                'tahun' => $this->request->getPost('tahun'),
            ];

            $this->TahunModel->edittahun($data);

            return redirect()->to(site_url('tahun'))->with('success', 'Data pengguna berhasil diperbarui.');
        } else {
            return redirect()->to('tahun')->with('error', 'User tidak ditemukan');
        }
    }
    public function deltahun($id)
    {
        $tahun = $this->TahunModel->find($id);

        if ($tahun) {
            $this->TahunModel->deletetahun($id);
            return redirect()->to('tahun')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('tahun')->with('error', 'User tidak ditemukan');
        }
    }
}
