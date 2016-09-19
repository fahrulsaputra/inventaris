-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2016 at 06:46 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`) VALUES
('BRG000001', 'Kursi'),
('BRG000002', 'Meja'),
('BRG000003', 'Printer'),
('BRG000004', 'Papan Tulis');

-- --------------------------------------------------------

--
-- Table structure for table `header_inventaris`
--

CREATE TABLE `header_inventaris` (
  `kode_inventaris` varchar(50) NOT NULL,
  `tgl_inventaris` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `kode_inventaris` varchar(15) NOT NULL,
  `kode_barang` varchar(15) DEFAULT NULL,
  `tahun_perolehan` varchar(50) DEFAULT NULL,
  `baik` int(25) DEFAULT NULL,
  `rusak_total` int(50) DEFAULT NULL,
  `perlu_perbaikan` int(50) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`kode_inventaris`, `kode_barang`, `tahun_perolehan`, `baik`, `rusak_total`, `perlu_perbaikan`, `lokasi`) VALUES
('INV000001', 'BRG000001', '2016', 43, 1, 2, 'Ruangan D1'),
('INV000002', 'BRG000002', '2016', 22, 2, 1, 'Ruangan D2');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `kode_lokasi` varchar(15) NOT NULL,
  `nama_lokasi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`kode_lokasi`, `nama_lokasi`) VALUES
('LKS000001', 'Ruangan Dekan'),
('LKS000002', 'Ruangan Wakil Dekan I'),
('LKS000003', 'Ruangan D1'),
('LKS000004', 'Ruangan D2'),
('LKS000005', 'Ruangan D3'),
('LKS000006', 'Ruangan D4');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(20) NOT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kode_aset` varchar(20) DEFAULT NULL,
  `keterangan` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_peminjaman`, `nama`, `kode_aset`, `keterangan`) VALUES
('PJM000001', '2016-08-02', 'Fahrul Saputra', 'INV000001', 'Notebook (1 Pcs)'),
('PJM000002', '2016-08-03', 'Fahrul Saputra', 'INV000002', 'Keyboard (3 Pcs)');

-- --------------------------------------------------------

--
-- Table structure for table `penempatan`
--

CREATE TABLE `penempatan` (
  `id_penempatan` varchar(15) NOT NULL,
  `tgl_penempatan` date DEFAULT NULL,
  `lokasi` varchar(45) DEFAULT NULL,
  `kode_aset` varchar(15) DEFAULT NULL,
  `keterangan` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penempatan`
--

INSERT INTO `penempatan` (`id_penempatan`, `tgl_penempatan`, `lokasi`, `kode_aset`, `keterangan`) VALUES
('PPT000001', '2016-08-16', 'Ruangan Dekan', 'INV000002', 'Keyboard (2 Pcs)');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` varchar(20) NOT NULL,
  `tgl_pengadaan` date DEFAULT NULL,
  `jenis_pengadaan` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` varchar(30) DEFAULT NULL,
  `total` varchar(30) DEFAULT NULL,
  `keterangan` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `tgl_pengadaan`, `jenis_pengadaan`, `nama_barang`, `jumlah`, `harga`, `total`, `keterangan`) VALUES
('PGD000003', '2016-09-07', 'Pembelian', 'AC', 10, '2.000.000', '20.000.000', 'LG Split T-2'),
('PGD000004', '2016-09-04', 'Pengajuan', 'Papan Tulis Spidol', 21, 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` varchar(20) NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kode_aset` varchar(45) DEFAULT NULL,
  `keterangan` tinytext,
  `kondisi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `tgl_pengembalian`, `tgl_peminjaman`, `nama`, `kode_aset`, `keterangan`, `kondisi`) VALUES
('KMB000001', '2016-08-01', '2016-08-02', 'Fahrul Saputra', 'INV000001', 'Notebook (1 pcs)', 'Baik'),
('KMB000002', '2016-08-01', '2016-08-03', 'Fahrul Saputra', 'INV000002', 'Keyboard (3 Pcs)', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(15) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `password` text,
  `level` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `user`, `password`, `level`) VALUES
(8, 'andi', 'af2a4c9d4c4956ec9d6ba62213eed568', 'Yayasan'),
(14, 'fahrul', '21232f297a57a5a743894a0e4a801fc3', 'Admin (Bag.Sapras Fakultas)'),
(15, 'sanda', '1cdac5ad084879e80e5b67c51baa9095', 'Bag.Sapras Universitas'),
(16, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin (Bag.Sapras Fakultas)');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `kode_pimpinan` varchar(15) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `nama_pimpinan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`kode_pimpinan`, `jabatan`, `nama_pimpinan`) VALUES
('PMP000001', 'Dekan', 'Prof. Dr. H. Andi Rasyid Pananrangi, S.H.,M.Pd'),
('PMP000002', 'Wakil Dekan II', 'Iqbal, S.Kom.,M.M'),
('PMP000003', 'Kepala BAU', 'Arjang, S.T.,M.T.,M.M'),
('PMP000004', 'Wakil Rektor II', 'Drs. H. Mulyono Caco, M.M'),
('PMP000005', 'Rektor', 'Prof. Dr. H. Baso Amang, S.E.,M.Si');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(15) NOT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `supplier`, `alamat`, `no_telp`) VALUES
(1, 'Toko Gunung Sari', 'Jln. Onta Baru No.4', '085254028229'),
(2, 'CV. Jaya Timur', 'Jln. Veteran Utara No.8', '082142345687');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `kode_barang` varchar(15) NOT NULL,
  `tahun_perolehan` varchar(20) NOT NULL,
  `baik` int(11) NOT NULL,
  `rusak_total` int(11) NOT NULL,
  `perlu_perbaikan` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`kode_inventaris`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`kode_lokasi`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id_penempatan`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`kode_pimpinan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
