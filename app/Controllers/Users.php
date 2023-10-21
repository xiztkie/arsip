<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        helper('form');
    }
    public function index()
    {

        $currentpage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $this->UserModel->search($keyword);
        } else {
            $user = $this->UserModel;
        }

        $data = [
            'title' => 'Daftar User',
            'users' => $user->orderBy('id', 'DESC')->paginate(10, 'users'),
            'pager' => $this->UserModel->pager,
            'currentpage' => $currentpage,
            'isi' => 'users'
        ];

        return view('layout/wrapper', $data);
    }


    public function create()
    {
        // Validasi data yang dikirim dari formulir
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, lakukan penyimpanan ke database atau tindakan lainnya
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $role = $this->request->getPost('role');

            $data = [
                'username' => $username,
                'password' => $hashedPassword,
                'role' => $role,
            ];

            $this->UserModel->insert($data);

            return redirect()->to('users')->with('success', 'Data berhasil disimpan');
        } else {
            // Data tidak valid, kembalikan ke formulir dengan pesan kesalahan
            return redirect()->to('users')->withInput()->with('errors', \Config\Services::validation()->getErrors());
        }
    }

    public function update($id)
    {
        $user = $this->UserModel->find($id);
        $password = $this->request->getPost('password');
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        if ($user) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $hashedPassword,
                'role' => $this->request->getPost('role'),
            ];

            $this->UserModel->update($id, $data);

            return redirect()->to(site_url('users'))->with('success', 'Data pengguna berhasil diperbarui.');
        } else {
            return redirect()->to('users')->with('error', 'User tidak ditemukan');
        }
    }

    public function delete($id)
    {
        $user = $this->UserModel->find($id);

        if ($user) {
            $this->UserModel->delete($id);
            return redirect()->to('users')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('users')->with('error', 'User tidak ditemukan');
        }
    }
}
