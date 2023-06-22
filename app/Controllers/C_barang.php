<?php

namespace App\Controllers;

class C_barang extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        if (!$this->validate([])) {
            $data['validation'] = $this->validator;
        }
        $data['judul_halaman'] = 'Data Barang';
        $data['data'] = $db->table('barang')->select('*,barang.id as id_barang')->join('satuan', 'satuan.id=barang.satuan_barang', 'left')->get()->getResult();
        $data['datasatuan'] = $db->table('satuan')->get()->getResult();
        return view('master/V_barang', $data);
    }

    public function save_barang()
    {
        $db   = \Config\Database::connect();
        $validation = $this->validate([
            'foto' => 'uploaded[foto]
            |mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image]
            |max_size[foto,4096]'
        ]);
        if ($validation == FALSE) {
            return $this->index();
        } else {
            $upload = $this->request->getFile('foto');
            $newName = $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/file/gambar_barang/', $newName);
            $data = [
                'nama_barang' => $this->request->getPost('nama_barang'),
                'satuan_barang' => $this->request->getPost('satuan_barang'),
                'harga_barang' => $this->request->getPost('harga_barang'),
                'stok' => $this->request->getPost('stok'),
                'foto' => $newName
            ];
            $db->table('barang')->insert($data);
            session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        }
        return redirect()->to(base_url('C_barang'));
    }

    public function edit_barang()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $validation = $this->validate([
            'foto' => 'uploaded[foto]
            |mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image]
            |max_size[foto,4096]'
        ]);

        if ($validation == FALSE) {
            $data = [
                'nama_barang' => $this->request->getPost('nama_barang'),
                'satuan_barang' => $this->request->getPost('satuan_barang'),
                'harga_barang' => $this->request->getPost('harga_barang'),
                'stok' => $this->request->getPost('stok')
            ];
        } else {
            $dt = $db->table('barang')->getWhere(['id' => $id])->getRow();
            $gambar = $dt->foto;
            $path = '../public/file/gambar_barang/';
            unlink($path . $gambar);
            $upload = $this->request->getFile('foto');
            $newName = $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/file/gambar_barang/', $newName);
            $data = [
                'nama_barang' => $this->request->getPost('nama_barang'),
                'satuan_barang' => $this->request->getPost('satuan_barang'),
                'harga_barang' => $this->request->getPost('harga_barang'),
                'stok' => $this->request->getPost('stok'),
                'foto' => $newName
            ];
        }
        $db->table('barang')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_barang'));
    }

    public function delete_barang()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $dt = $db->table('barang')->getWhere(['id' => $id])->getRow();
        $gambar = $dt->foto;
        $path = '../public/file/gambar_barang/';
        unlink($path . $gambar);
        $db->table('barang')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_barang'));
    }
}
