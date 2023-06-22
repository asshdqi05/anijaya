<?php

namespace App\Controllers;

class C_satuan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Satuan';
        $data['data'] = $db->table('satuan')->get()->getResult();
        return view('master/V_satuan', $data);
    }

    public function save_satuan()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $db->table('satuan')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_satuan'));
    }

    public function edit_satuan()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $id = $this->request->getPost('id');
        $db->table('satuan')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_satuan'));
    }

    public function delete_satuan()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('satuan')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_satuan'));
    }
}
