<?php

namespace App\Controllers;

class C_front extends BaseController
{
    public function index()
    {
        return view('front/V_home');
    }

    public function tentang()
    {
        return view('front/V_tentang');
    }

    public function layanan()
    {
        return view('front/V_layanan');
    }

    public function kontak()
    {
        return view('front/V_kontak');
    }

    public function registrasi()
    {
        return view('front/V_registrasi');
    }

    public function save_reg()
    {
        $db   = \Config\Database::connect();
        $validation = $this->validate([
            'username' => [
                'rules' => 'is_unique[pelanggan.username]',
                'errors' => ['is_unique' => 'Username Sudah Terdaftar!!, Silahkan Masukan Username Lain.'],
            ]
        ]);

        if ($validation == TRUE) {
            $data = [
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'alamat' => $this->request->getPost('alamat'),
                'nohp' => $this->request->getPost('nohp'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getpost('password'), PASSWORD_DEFAULT)
            ];
            $db->table('pelanggan')->insert($data);
            session()->setflashdata('sukses', 'Registrasi Akun Berhasil. Silahkan Login');
            return redirect()->to(base_url('C_login_pelanggan'));
        } else {
            $val = \Config\Services::validation();
            session()->setflashdata('error', $val->listErrors());
            return redirect()->to(base_url('C_front/registrasi'));
        }
    }
}
