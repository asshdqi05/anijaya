<?php

namespace App\Controllers;

use App\Models\M_faktur;

class C_pemesanan_front extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $session = session();
        $data['judul_halaman'] = 'Data Pemesanan';
        $data['data'] = $db->table('pemesanan')->select('*,pemesanan.id as id_pemesanan')
            ->join('pelanggan', 'pelanggan.id=pemesanan.id_pelanggan', 'left')
            ->where('pelanggan.id', $session->id)
            ->orderBy('pemesanan.tanggal', 'desc')
            ->get()->getResult();
        return view('pemesanan_front/V_list_pemesanan', $data);
    }

    public function add()
    {
        $model = new M_faktur();
        $session = session();
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Tambah Pemesanan';
        $data['no_faktur'] = $model->get_faktur_pesanan();
        $data['barang'] = $db->table('barang')->get()->getResult();
        $data['pelanggan'] = $session;
        return view('pemesanan_front/V_tambah_pemesanan', $data);
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
        return view('pemesanan_front/V_temp_pesan', $dt);
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
        return view('pemesanan_front/V_temp_pesan', $dt);
    }

    public function save()
    {
        $db   = \Config\Database::connect();
        $id_pelanggan = $this->request->getPost('id_pelanggan');
        $data = array(
            'tanggal' => date('Y-m-d'),
            'no_faktur' => $this->request->getPost('no_faktur'),
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'status' => 1,
            'tipe' => 2,
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
        return redirect()->to(base_url('C_pemesanan_front'));
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
        return view('pemesanan_front/V_nota_pesan', $data);
    }

    public function pembatalan()
    {
        $db   = \Config\Database::connect();
        $id_pemesanan = $this->request->getPost('id');

        $data = [
            'status' => 4
        ];
        $db->table('pemesanan')->update($data, array('id' => $id_pemesanan));


        $data = $db->table('detail_pemesanan')->getWhere(['id_pemesanan' => $id_pemesanan])->getResult();
        foreach ($data as $d) {
            $barang = $db->table('barang')->getWhere(['id' => $d->id_barang])->getRow();
            $stok = $barang->stok + $d->qty;
            $data = [
                'stok' => $stok,
            ];
            $db->table('barang')->update($data, array('id' => $d->id_barang));
        }

        session()->setflashdata('sukses', 'pemesanan Berhasil Dibatalkan.');
        return redirect()->to(base_url('C_pemesanan_front'));
    }

    public function pembayaran($id = "")
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Pembayaran Pemesanan';
        $data['data_pemesanan'] = $db->table('pemesanan')->select('*,pemesanan.id as id_pemesanan')
            ->join('pelanggan', 'pelanggan.id=pemesanan.id_pelanggan')
            ->where('pemesanan.id', $id)->get()->getRow();
        $data['detail_pemesanan'] = $db->table('detail_pemesanan')->getWhere(['id_pemesanan' => $id])->getResult();
        return view('pemesanan_front/V_pembayaran', $data);
    }

    public function konfirmasi_pembayaran()
    {
        $db   = \Config\Database::connect();

        $id_pemesanan = $this->request->getPost('id_pemesanan');
        $validation = $this->validate([
            'bukti' => 'uploaded[bukti]
            |mime_in[bukti,image/jpg,image/jpeg,image/gif,image/png,image]
            |max_size[bukti,4096]'
        ]);

        if ($validation == FALSE) {
            $val = \Config\Services::validation();
            session()->setflashdata('error', $val->listErrors());
            return redirect()->to(base_url('C_pemesanan_front/pembayaran/' . $id_pemesanan));
        } else {
            $upload = $this->request->getFile('bukti');
            $newName = $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/file/bukti_pembayaran/', $newName);

            $data_pemesanan = [
                'status' => 2
            ];
            $db->table('pemesanan')->update($data_pemesanan, array('id' => $id_pemesanan));

            $data = [
                'tanggal' => date('Y-m-d'),
                'bukti' => $newName
            ];
            $db->table('pembayaran')->update($data, ['id_pemesanan' => $id_pemesanan]);
            session()->setflashdata('sukses', 'Konfirmasi Pembayaran berhasil. Silahkan menunggu Admin untuk Mengkonfirmasi Pemesanan.');
            return redirect()->to(base_url('C_pemesanan_front'));
        }
    }

    public function list_barang()
    {
        $db   = \Config\Database::connect();
        $data['barang'] = $db->table('barang')->get()->getResult();
        return view('pemesanan/V_list_barang', $data);
    }
}
