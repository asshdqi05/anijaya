<?php

namespace App\Controllers;

class C_profil extends BaseController
{

    public function index()
    {
        $session = session();
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Profil pelanggan';
        $data['data'] = $db->table('pelanggan')->getWhere(['id' => $session->id])->getRow();
        $data['session'] = session();
        return view('profil_pelanggan/V_profil', $data);
    }

    public function update()
    {
        $db   = \Config\Database::connect();
        if ($this->request->getVar('password') == "") {
            $pw = $this->request->getVar('old_password');
        } else {
            $pw = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $data = [
            'nama_pelanggan' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('no_telepon'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $pw,
        ];
        $id = $this->request->getPost('id');
        $db->table('pelanggan')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_profil'));
    }
}
