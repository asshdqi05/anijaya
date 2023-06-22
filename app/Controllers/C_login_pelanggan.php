<?php

namespace App\Controllers;

use App\Models\M_login_pelanggan;

class C_login_pelanggan extends BaseController
{
    public function index()
    {
        return view('front/V_login_pelanggan');
    }

    public function login()
    {
        $session = session();
        $model = new M_login_pelanggan();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'             => $data['id'],
                    'nama_pelanggan' => $data['nama_pelanggan'],
                    'alamat'         => $data['alamat'],
                    'nohp'           => $data['nohp'],
                    'email'          => $data['email'],
                    'username'       => $data['username'],
                    'password'       => $data['password'],
                    'logged_in_pelanggan'      => TRUE
                ];
                $session->set($ses_data);
                $session->setflashdata('sukses', 'Login Berhasil.');
                return redirect()->to(base_url('C_home_pelanggan'));
            } else {
                $session->setFlashdata('error', 'Password Anda Salah!');
                return redirect()->to(base_url('C_login_pelanggan'));
            }
        } else {
            $session->setFlashdata('error', 'Username Tidak Terdaftar!');
            return redirect()->to(base_url('C_login_pelanggan'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('C_login_pelanggan'));
    }
}
