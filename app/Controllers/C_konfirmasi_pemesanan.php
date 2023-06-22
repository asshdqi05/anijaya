<?php

namespace App\Controllers;

class C_konfirmasi_pemesanan extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Pemesanan';
        $data['data'] = $db->table('pemesanan')->select('*,pemesanan.id as id_pemesanan')
            ->join('pelanggan', 'pelanggan.id=pemesanan.id_pelanggan')
            ->where('pemesanan.status', 2)
            ->orderBy('pemesanan.tanggal', 'desc')
            ->get()->getResult();
        return view('konfirmasi_pemesanan/V_list_pemesanan', $data);
    }

    public function detail($faktur)
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Detail Pemesanan';
        $pesan = $db->table('pemesanan')->getWhere(['no_faktur' => $faktur])->getRow();
        $data['pemesanan'] = $db->table('pemesanan')->select('*,pemesanan.id as id_pemesanan')
            ->join('pelanggan', 'pelanggan.id=pemesanan.id_pelanggan')
            ->where('pemesanan.no_faktur', $faktur)
            ->get()->getRow();
        $data['detail'] = $db->table('detail_pemesanan')->getWhere(['id_pemesanan' => $pesan->id])->getResult();
        return view('konfirmasi_pemesanan/V_konfirmasi', $data);
    }

    public function konfirmasi_pemesanan($id = "")
    {
        $db   = \Config\Database::connect();

        $data = [
            'status' => 3
        ];
        $db->table('pemesanan')->update($data, array('id' => $id));

        session()->setflashdata('sukses', 'Pemesanan Berhasil Dikonfirmasi.');
        return redirect()->to(base_url('C_konfirmasi_pemesanan'));
    }
}
