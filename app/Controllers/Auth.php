<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        helper(['form', 'url']);
    }

    public function login()
    {
            return view('index');
    }

    public function processLogin()
    {

        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ]
        ])) {
            // Jika validasi berhasil
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->UserModel->login($username, $password);
            if ($cek) {

                if (password_verify($password, $cek['password'])) {
                    // Jika password cocok
                    session()->set('log', true);
                    session()->set('username', $cek['username']);
                    session()->set('role', $cek['role']);

                    return redirect()->to(route_to('dashboard')); // Gunakan route_to() untuk mengarahkan ke rute "dashboard"
                } else {
                    // Jika password tidak cocok
                    session()->setFlashdata('pesan', 'Username / Password Anda Salah. <br>Silahkan Login Kembali.');
                    return redirect()->to(route_to('login'));
                }
            } else {
                // Jika data tidak cocok
                session()->setFlashdata('pesan', 'Username / Password Anda Salah. <br>Silahkan Login Kembali.');
                return redirect()->to(route_to('login'));
            }
        } else {
            // Jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(route_to('login'));
        }
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('role');

        session()->setFlashdata('pesan', 'Anda Telah Logout !!!');
        return redirect()->to(base_url('login'));
    }
}
