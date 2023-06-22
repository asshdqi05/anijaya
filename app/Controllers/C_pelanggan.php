<?php

namespace App\Controllers;

class C_pelanggan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Pelanggan';
        $data['data'] = $db->table('pelanggan')->get()->getResult();

        return view('master/V_pelanggan', $data);
    }

    public function save_pelanggan()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getpost('password'), PASSWORD_DEFAULT)
        ];
        $db->table('pelanggan')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_pelanggan'));
    }

    public function edit_pelanggan()
    {
        $db   = \Config\Database::connect();

        if ($this->request->getVar('password') == "") {
            $pw = $this->request->getVar('old_password');
        } else {
            $pw = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $pw,
        ];
        $id = $this->request->getPost('id');
        $db->table('pelanggan')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_pelanggan'));
    }

    public function delete_pelanggan()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('pelanggan')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_pelanggan'));
    }
}
