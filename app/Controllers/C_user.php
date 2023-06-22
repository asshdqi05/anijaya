<?php

namespace App\Controllers;

use App\Models\M_user;

class C_user extends BaseController
{
    public function index()
    {
        $data['judul_halaman'] = 'User Manajemen';
        $model = new M_user();
        $data['judul_halaman'] = "Data User";
        $data['data_user'] = $model->getAll()->getResult();
        $data['data_level'] = $model->getLevel()->getResult();
        return view('master/V_user', $data);
    }

    public function save_user()
    {
        $model = new M_user();
        $data = array(
            'nama_user' => $this->request->getpost('nama_user'),
            'username' => $this->request->getpost('username'),
            'password' => password_hash($this->request->getpost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getpost('level')
        );

        $model->saveuser($data);
        session()->setflashdata('sukses', 'Data Berhasil Di Simpan.');
        return redirect()->to(base_url('C_user'));
    }

    public function edit_user()
    {
        $model = new M_user();
        $id = $this->request->getPost("id_user");
        if ($this->request->getVar('password') == "") {
            $pw = $this->request->getVar('old_password');
        } else {
            $pw = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }
        $data = array(
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => $pw,
            'level' => $this->request->getPost('level')
        );

        $model->edituser($data, $id);
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_user'));
    }
    public function delete_user()
    {
        $model = new M_user();
        $id = $this->request->getPost("id");
        $model->deleteUser($id);
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_user'));
    }
}
