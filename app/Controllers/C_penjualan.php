<?php

namespace App\Controllers;

use App\Models\M_faktur;

class C_penjualan extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Penjualan';
        $data['data'] = $db->table('penjualan')
            ->orderBy('penjualan.tanggal', 'desc')
            ->get()->getResult();
        return view('penjualan/V_list_penjualan', $data);
    }

    public function add()
    {
        $model = new M_faktur();
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Tambah Penjualan';
        $data['no_faktur'] = $model->get_faktur_jual();
        $data['barang'] = $db->table('barang')->get()->getResult();
        return view('penjualan/V_tambah_penjualan', $data);
    }

    public function save_temp()
    {
        $db   = \Config\Database::connect();
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga' => $this->request->getVar('harga'),
            'qty' => $this->request->getVar('qty'),
        ];
        $db->table('temp_jual')->insert($data);
        return view('penjualan/V_temp_jual');
    }

    public function delete_temp()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getVar('id');
        $db->table('temp_jual')->delete(array('id' => $id));
        return view('penjualan/V_temp_jual');
    }

    public function save()
    {
        $db   = \Config\Database::connect();
        $data = array(
            'tanggal' => date('Y-m-d'),
            'no_faktur' => $this->request->getPost('no_faktur'),
        );
        $db->table('penjualan')->insert($data);
        $id_penjualan = $db->insertID();

        $data = $db->table('temp_jual')->get()->getResult();
        foreach ($data as $d) {
            $barang = $db->table('barang')->getWhere(['id' => $d->id_barang])->getRow();
            $stok = $barang->stok - $d->qty;
            $data = [
                'stok' => $stok,
            ];
            $db->table('barang')->update($data, array('id' => $d->id_barang));
        }

        $db->query("INSERT INTO detail_penjualan (id_penjualan,id_barang,nama_barang,harga_barang,qty)SELECT '$id_penjualan',id_barang,nama_barang,harga,qty from temp_jual");
        $db->table('temp_jual')->emptyTable();


        session()->setflashdata('sukses', 'Data Penjualan Berhasil Di Simpan.');
        return redirect()->to(base_url('C_penjualan/add'));
    }

    public function cetak_nota($faktur)
    {
        $db   = \Config\Database::connect();
        $jual = $db->table('penjualan')->getWhere(['no_faktur' => $faktur])->getRow();
        $data['penjualan'] = $db->table('penjualan')->getWhere(['no_faktur' => $faktur])->getRow();
        $data['detail'] = $db->table('detail_penjualan')->getWhere(['id_penjualan' => $jual->id])->getResult();
        return view('penjualan/V_nota_jual', $data);
    }

    public function hapus()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $data = $db->table('detail_penjualan')->getWhere(['id_penjualan' => $id])->getResult();
        foreach ($data as $d) {
            $barang = $db->table('barang')->getWhere(['id' => $d->id_barang])->getRow();
            $stok = $barang->stok + $d->qty;
            $data = [
                'stok' => $stok,
            ];
            $db->table('barang')->update($data, array('id' => $d->id_barang));
        }
        $db->table('detail_penjualan')->delete(array('id_penjualan' => $id));
        $db->table('penjualan')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_penjualan'));
    }
}
