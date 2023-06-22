<?php

namespace App\Controllers;

class C_pengeluaran extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Pengeluaran';
        $data['data'] = $db->table('pengeluaran')->get()->getResult();

        return view('V_pengeluaran', $data);
    }

    public function save_pengeluaran()
    {
        $db   = \Config\Database::connect();
        $data = [
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $db->table('pengeluaran')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_pengeluaran'));
    }

    public function edit_pengeluaran()
    {
        $db   = \Config\Database::connect();
        $data = [
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan')

        ];
        $id = $this->request->getPost('id');
        $db->table('pengeluaran')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_pengeluaran'));
    }

    public function delete_pengeluaran()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('pengeluaran')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_pengeluaran'));
    }
}
