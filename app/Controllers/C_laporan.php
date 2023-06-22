<?php

namespace App\Controllers;

class C_laporan extends BaseController
{
    public function laporan_penjualan()
    {
        $data['judul_halaman'] = 'Laporan Penjualan Per Periode';
        return view('laporan_penjualan/V_tanggal', $data);
    }

    public function cetak_laporan_penjualan()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Penjualan Per Periode';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('penjualan')->select('*')
            ->where('penjualan.tanggal >=', $tanggal_awal)
            ->where('penjualan.tanggal <=', $tanggal_akhir)
            ->orderBy('penjualan.tanggal', 'desc')
            ->get()->getResult();
        return view('laporan_penjualan/V_cetak_penjualan', $data);
    }

    public function laporan_pemesanan()
    {
        $data['judul_halaman'] = 'Laporan Pemesanan Per Periode';
        return view('laporan_pemesanan/V_tanggal', $data);
    }

    public function cetak_laporan_pemesanan()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Pemesanan Per Periode';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('pemesanan')->select('*,pemesanan.id as id_pemesanan')
            ->join('pelanggan', 'pelanggan.id=pemesanan.id_pelanggan')
            ->where('pemesanan.status', 3)
            ->where('pemesanan.tanggal >=', $tanggal_awal)
            ->where('pemesanan.tanggal <=', $tanggal_akhir)
            ->orderBy('pemesanan.tanggal', 'desc')
            ->get()->getResult();
        return view('laporan_pemesanan/V_cetak_pemesanan', $data);
    }

    public function cetak_laporan_pemesanan_online()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Pemesanan Online Per Periode';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('pemesanan')->select('*,pemesanan.id as id_pemesanan')
            ->join('pelanggan', 'pelanggan.id=pemesanan.id_pelanggan')
            ->where('pemesanan.status', 3)
            ->where('pemesanan.tipe', 2)
            ->where('pemesanan.tanggal >=', $tanggal_awal)
            ->where('pemesanan.tanggal <=', $tanggal_akhir)
            ->orderBy('pemesanan.tanggal', 'desc')
            ->get()->getResult();
        return view('laporan_pemesanan/V_cetak_pemesanan_online', $data);
    }

    public function cetak_laporan_pemesanan_ditempat()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Pemesanan Online Per Periode';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('pemesanan')->select('*,pemesanan.id as id_pemesanan')
            ->join('pelanggan', 'pelanggan.id=pemesanan.id_pelanggan')
            ->where('pemesanan.status', 3)
            ->where('pemesanan.tipe', 1)
            ->where('pemesanan.tanggal >=', $tanggal_awal)
            ->where('pemesanan.tanggal <=', $tanggal_akhir)
            ->orderBy('pemesanan.tanggal', 'desc')
            ->get()->getResult();
        return view('laporan_pemesanan/V_cetak_pemesanan_ditempat', $data);
    }


    public function cetak_laporan_barang()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Barang';

        $data['data'] = $db->table('barang')->select('*,barang.id as id_barang')->join('satuan', 'satuan.id=barang.satuan_barang')->get()->getResult();
        return view('laporan_barang/V_laporan_barang', $data);
    }

    public function cetak_laporan_pelanggan()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Pelanggan';

        $data['data'] = $db->table('pelanggan')->get()->getResult();
        return view('laporan_pelanggan/V_laporan_pelanggan', $data);
    }

    public function laporan_pengeluaran()
    {
        $data['judul_halaman'] = 'Laporan Pengeluaran';
        return view('laporan_pengeluaran/V_tanggal', $data);
    }

    public function cetak_laporan_pengeluaran()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Pengeluaran Per Periode';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('pengeluaran')->select('*')
            ->where('pengeluaran.tanggal >=', $tanggal_awal)
            ->where('pengeluaran.tanggal <=', $tanggal_akhir)
            ->orderBy('pengeluaran.tanggal', 'desc')
            ->get()->getResult();
        return view('laporan_pengeluaran/V_cetak_pengeluaran', $data);
    }
}
