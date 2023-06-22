<?php

namespace App\Controllers;

use App\Models\M_faktur;

class C_pemesanan extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Pemesanan';
        $data['data'] = $db->table('pemesanan')->select('*,pemesanan.id as id_pemesanan')
            ->join('pelanggan', 'pelanggan.id=pemesanan.id_pelanggan', 'left')
            ->where('pemesanan.status', 3)
            ->orderBy('pemesanan.tanggal', 'desc')
            ->get()->getResult();
        return view('pemesanan/V_list_pemesanan', $data);
    }

    public function add()
    {
        $model = new M_faktur();
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Tambah Pemesanan';
        $data['no_faktur'] = $model->get_faktur_pesanan();
        $data['barang'] = $db->table('barang')->get()->getResult();
        $data['pelanggan'] = $db->table('pelanggan')->get()->getResult();
        return view('pemesanan/V_tambah_pemesanan', $data);
    }

    public function save_temp()
    {
        $db   = \Config\Database::connect();
        $dt['id_pelanggan'] = $this->request->getVar('id_pelanggan');
        $id_barang = $this->request->getVar('id_barang');
        $data = [
            'id_pelanggan' => $this->request->getVar('id_pelanggan'),
            'id_barang' => $this->request->getVar('id_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga' => $this->request->getVar('harga'),
            'qty' => $this->request->getVar('qty'),
        ];
        $db->table('temp_pesan')->insert($data);
        $barang = $db->table('barang')->getWhere(['id' => $id_barang])->getRow();
        $stok = $barang->stok - $this->request->getVar('qty');
        $data = [
            'stok' => $stok,
        ];
        $db->table('barang')->update($data, array('id' => $id_barang));
        return view('pemesanan/V_temp_pesan', $dt);
    }

    public function delete_temp()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getVar('id');
        $data_temp = $db->table('temp_pesan')->getWhere(['id' => $id])->getRow();
        $barang = $db->table('barang')->getWhere(['id' => $data_temp->id_barang])->getRow();
        $stok = $barang->stok +  $data_temp->qty;
        $data = [
            'stok' => $stok,
        ];
        $db->table('barang')->update($data, array('id' => $data_temp->id_barang));
        $dt['id_pelanggan'] = $this->request->getVar('id_pelanggan');
        $db->table('temp_pesan')->delete(array('id' => $id));
        return view('pemesanan/V_temp_pesan', $dt);
    }

    public function save()
    {
        $db   = \Config\Database::connect();
        $id_pelanggan = $this->request->getPost('id_pelanggan');
        $data = array(
            'tanggal' => date('Y-m-d'),
            'no_faktur' => $this->request->getPost('no_faktur'),
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'status' => 3,
            'tipe' => 1,
        );
        $db->table('pemesanan')->insert($data);
        $id_pemesanan = $db->insertID();

        $total = 0;
        $data = $db->table('temp_pesan')->getWhere(['id_pelanggan' => $id_pelanggan])->getResult();
        foreach ($data as $d) {
            // $barang = $db->table('barang')->getWhere(['id' => $d->id_barang])->getRow();
            // $stok = $barang->stok - $d->qty;
            // $data = [
            //     'stok' => $stok,
            // ];
            // $db->table('barang')->update($data, array('id' => $d->id_barang));

            $sub = $d->harga * $d->qty;
            $total = $total + $sub;
        }

        $data = array(
            'tanggal' => date('Y-m-d'),
            'id_pemesanan' => $id_pemesanan,
            'jumlah' => $total
        );
        $db->table('pembayaran')->insert($data);

        $db->query("INSERT INTO detail_pemesanan (id_pemesanan,id_barang,nama_barang,harga,qty)SELECT '$id_pemesanan',id_barang,nama_barang,harga,qty from temp_pesan");
        $db->table('temp_pesan')->delete(array('id_pelanggan' => $id_pelanggan));

        session()->setflashdata('sukses', 'Data Pemesanan Berhasil Di Simpan.');
        return redirect()->to(base_url('C_pemesanan/add'));
    }

    public function cetak_nota($faktur)
    {
        $db   = \Config\Database::connect();
        $pesan = $db->table('pemesanan')->getWhere(['no_faktur' => $faktur])->getRow();
        $data['pemesanan'] = $db->table('pemesanan')->select('*,pemesanan.id as id_pemesanan')
            ->join('pelanggan', 'pelanggan.id=pemesanan.id_pelanggan')
            ->where('pemesanan.no_faktur', $faktur)
            ->get()->getRow();
        $data['detail'] = $db->table('detail_pemesanan')->getWhere(['id_pemesanan' => $pesan->id])->getResult();
        return view('pemesanan/V_nota_pesan', $data);
    }

    public function hapus()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $data = $db->table('detail_pemesanan')->getWhere(['id_pemesanan' => $id])->getResult();
        foreach ($data as $d) {
            $barang = $db->table('barang')->getWhere(['id' => $d->id_barang])->getRow();
            $stok = $barang->stok + $d->qty;
            $data = [
                'stok' => $stok,
            ];
            $db->table('barang')->update($data, array('id' => $d->id_barang));
        }
        $db->table('detail_pemesanan')->delete(array('id_pemesanan' => $id));
        $db->table('pembayaran')->delete(array('id_pemesanan' => $id));
        $db->table('pemesanan')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_pemesanan'));
    }

    public function list_barang()
    {
        $db   = \Config\Database::connect();
        $data['barang'] = $db->table('barang')->get()->getResult();
        return view('pemesanan/V_list_barang', $data);
    }
}
