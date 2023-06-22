-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2022 at 11:18 AM
-- Server version: 5.7.19
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anijaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `satuan_barang` int(11) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `satuan_barang`, `harga_barang`, `stok`, `foto`) VALUES
(8, 'Buku', 12, 50000, 81, '1645179113_cc3ff52b8c182b720217.jpg'),
(9, 'pulpen', 13, 40000, 90, '1645179222_6d9e9a29feb4e94d877c.jpg'),
(10, 'Penghapus', 6, 5000, 100, '1645179285_24d4b33405cb89d54e74.jpg'),
(11, 'Pensil', 13, 30000, 198, '1645179317_c4fea68400470ac6328c.jpg'),
(12, 'Tipe x', 6, 5000, 301, '1645179479_4a531d105c7107c09716.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id`, `id_pemesanan`, `id_barang`, `nama_barang`, `harga`, `qty`) VALUES
(1, 3, 8, 'Buku', 50000, 5),
(2, 3, 8, 'Buku', 50000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga_barang` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_penjualan`, `id_barang`, `nama_barang`, `harga_barang`, `qty`) VALUES
(1, 1, 8, 'Buku', 50000, 1),
(2, 1, 10, 'Penghapus', 5000, 1),
(3, 1, 11, 'Pensil', 30000, 1),
(4, 2, 8, 'Buku', 50000, 1),
(5, 3, 12, 'Tipe x', 5000, 2),
(6, 4, 8, 'Buku', 50000, 1),
(7, 7, 10, 'Penghapus', 5000, 1),
(8, 9, 11, 'Pensil', 30000, 1),
(9, 11, 10, 'Penghapus', 5000, 1),
(10, 12, 10, 'Penghapus', 5000, 1),
(11, 15, 11, 'Pensil', 30000, 1),
(12, 16, 8, 'Buku', 50000, 1),
(13, 18, 9, 'pulpen', 40000, 1),
(14, 20, 10, 'Penghapus', 5000, 1),
(15, 22, 10, 'Penghapus', 5000, 1),
(16, 25, 10, 'Penghapus', 5000, 1),
(17, 28, 9, 'pulpen', 40000, 1),
(18, 30, 11, 'Pensil', 30000, 1),
(19, 31, 11, 'Pensil', 30000, 1),
(20, 32, 12, 'Tipe x', 5000, 1),
(21, 33, 11, 'Pensil', 30000, 1),
(22, 34, 12, 'Tipe x', 5000, 2),
(23, 35, 11, 'Pensil', 30000, 1),
(24, 36, 12, 'Tipe x', 5000, 1),
(25, 37, 11, 'Pensil', 30000, 1),
(26, 38, 11, 'Pensil', 30000, 2),
(27, 38, 8, 'Buku', 50000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id` int(1) NOT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id`, `level`) VALUES
(1, 'admin'),
(2, 'kasir'),
(3, 'pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nohp` char(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `alamat`, `nohp`, `email`, `username`, `password`) VALUES
(3, 'ani', 'medan', '0987654', 'sdfghj', 'ani', '$2y$10$xCCTEL0agynmtE7iTVrY9OR1U/LO7EfIiV2vLMYCeSLQp/zqgpwum'),
(4, 'Syafiq', 'Padang', '3435435', 'asshidqi05@gmail.com', 'syafiq', '$2y$10$oXNbWOGO.zXJvGwgPfsxtuBsWaPQ95qJRkFnJ0OO2.JjcARsiFR9a');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pemesanan`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 1, 0, '2022-02-24', NULL),
(2, 2, 0, '2022-02-24', NULL),
(3, 3, 500000, '2022-02-26', '1645858158_d0be2c29c2156d3335ec.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(255) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=Belum bayar.\r\n2=Menunggu Konfirmasi.\r\n3=Di konfirmasi / Sudah Bayar.\r\n4= Batal.',
  `tipe` int(11) NOT NULL COMMENT '1= ditempat\r\n2=online'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `no_faktur`, `id_pelanggan`, `tanggal`, `status`, `tipe`) VALUES
(1, 'FP-2402220001', 4, '2022-02-24', 4, 2),
(2, 'FP-2402220002', 4, '2022-02-24', 4, 2),
(3, 'FP-2402220003', 4, '2022-02-24', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `jumlah`, `tanggal`, `keterangan`) VALUES
(1, 20000, '2022-02-01', 'banyak kali'),
(2, 1000000, '2022-03-05', 'beli mobil'),
(5, 500000, '2022-03-05', 'KPR');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `no_faktur` char(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_faktur`, `tanggal`) VALUES
(1, 'FJ-1802220001', '2022-02-18'),
(2, 'FJ-1802220002', '2022-02-18'),
(3, 'FJ-1802220003', '2022-02-18'),
(4, 'FJ-1802220004', '2022-02-18'),
(5, 'FJ-1802220004', '2022-02-18'),
(6, 'FJ-1802220004', '2022-02-18'),
(7, 'FJ-1802220005', '2022-02-18'),
(8, 'FJ-1802220005', '2022-02-18'),
(9, 'FJ-1802220006', '2022-02-18'),
(10, 'FJ-1802220006', '2022-02-18'),
(11, 'FJ-1802220007', '2022-02-18'),
(12, 'FJ-1802220008', '2022-02-18'),
(13, 'FJ-1802220009', '2022-02-18'),
(14, 'FJ-1802220010', '2022-02-18'),
(15, 'FJ-1802220011', '2022-02-18'),
(16, 'FJ-1802220012', '2022-02-18'),
(17, 'FJ-1802220012', '2022-02-18'),
(18, 'FJ-1802220013', '2022-02-18'),
(19, 'FJ-1802220013', '2022-02-18'),
(20, 'FJ-1802220014', '2022-02-18'),
(21, 'FJ-1802220014', '2022-02-18'),
(22, 'FJ-1802220015', '2022-02-18'),
(23, 'FJ-1802220015', '2022-02-18'),
(24, 'FJ-1802220015', '2022-02-18'),
(25, 'FJ-1802220016', '2022-02-18'),
(26, 'FJ-1802220016', '2022-02-18'),
(27, 'FJ-1802220016', '2022-02-18'),
(28, 'FJ-1802220017', '2022-02-18'),
(29, 'FJ-1802220017', '2022-02-18'),
(30, 'FJ-1802220018', '2022-02-18'),
(31, 'FJ-1802220019', '2022-02-18'),
(32, 'FJ-1802220020', '2022-02-18'),
(33, 'FJ-1802220021', '2022-02-18'),
(34, 'FJ-1802220022', '2022-02-18'),
(35, 'FJ-1802220023', '2022-02-18'),
(36, 'FJ-1802220024', '2022-02-18'),
(37, 'FJ-1802220025', '2022-02-18'),
(38, 'FJ-0503220001', '2022-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama_satuan`, `keterangan`) VALUES
(4, 'kg', 'kilogram'),
(5, 'pisc', 'pisc'),
(6, 'unit', 'unit'),
(7, 'Rim', 'rim'),
(8, 'Roll', 'Roll'),
(9, 'Dus', 'dus'),
(10, 'Bal', 'bal'),
(11, 'Gulung', 'gulung'),
(12, 'lusin', 'lusin'),
(13, 'kotak', 'kotak');

-- --------------------------------------------------------

--
-- Table structure for table `temp_jual`
--

CREATE TABLE `temp_jual` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_pesan`
--

CREATE TABLE `temp_pesan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `username`, `password`, `level`) VALUES
(7, 'aji', 'esse', '$2y$10$tIJ31QfAz.Xao1RZfNUfZOKczRv4xZGC/GO7sOjZr6tNCvkmPrKu6', 2),
(8, 'ani', 'ani', '$2y$10$jeDDmlSbG.W7wze/lQhjzeVna/22eH981MKc2ioyyXINzcHxspmfm', 3),
(9, 'admin', 'admin', '$2y$10$vWVy3OsDxt2GOeY3cQszzeeIRlx5mi.4zuFXVg/hXNaWk6JsRwKie', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_jual`
--
ALTER TABLE `temp_jual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_pesan`
--
ALTER TABLE `temp_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `temp_jual`
--
ALTER TABLE `temp_jual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_pesan`
--
ALTER TABLE `temp_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
