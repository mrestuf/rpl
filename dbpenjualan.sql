-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 02:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `stok` int(100) NOT NULL,
  `satuan_brg` varchar(5) NOT NULL,
  `harga_barang` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`kode_barang`, `nama_barang`, `stok`, `satuan_brg`, `harga_barang`) VALUES
('BG_001', 'Le Mineral', 50, 'DUS', 40000),
('BG_002', 'Indomie Goreng', 35, 'DUS', 110000),
('BG_003', 'Gulaku', 30, 'Kg', 14000),
('BG_004', 'Minyak Goreng Bimoli', 35, 'Liter', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail`
--

CREATE TABLE `tbdetail` (
  `id_detail` varchar(6) NOT NULL,
  `no_transaksi` varchar(6) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `qty` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbdetail`
--

INSERT INTO `tbdetail` (`id_detail`, `no_transaksi`, `kode_barang`, `qty`, `subtotal`) VALUES
('DTL001', 'TRA001', 'BG_001', 3, 120000),
('DTL002', 'TRA001', 'BG_004', 2, 44000),
('DTL003', 'TRA001', 'BG_002', 1, 110000),
('DTL004', 'TRA001', 'BG_003', 1, 14000),
('DTL005', 'TRA002', 'BG_003', 2, 28000),
('DTL006', 'TRA002', 'BG_004', 2, 44000),
('DTL007', 'TRA003', 'BG_001', 1, 40000),
('DTL008', 'TRA003', 'BG_002', 1, 110000),
('DTL009', 'TRA004', 'BG_001', 1, 40000),
('DTL010', 'TRA004', 'BG_003', 1, 14000),
('DTL011', 'TRA004', 'BG_004', 1, 22000),
('DTL012', 'TRA005', 'BG_003', 1, 14000),
('DTL013', 'TRA005', 'BG_001', 1, 40000),
('DTL014', 'TRA006', 'BG_003', 2, 28000),
('DTL015', 'TRA006', 'BG_001', 1, 40000),
('DTL016', 'TRA006', 'BG_004', 1, 22000),
('DTL017', 'TRA007', 'BG_002', 1, 110000),
('DTL018', 'TRA008', 'BG_003', 1, 14000),
('DTL019', 'TRA008', 'BG_004', 2, 44000),
('DTL020', 'TRA009', 'BG_002', 1, 110000),
('DTL021', 'TRA009', 'BG_001', 1, 40000),
('DTL022', 'TRA010', 'BG_002', 1, 110000);

-- --------------------------------------------------------

--
-- Table structure for table `tbpegawai`
--

CREATE TABLE `tbpegawai` (
  `nip` varchar(6) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpegawai`
--

INSERT INTO `tbpegawai` (`nip`, `nama_pegawai`) VALUES
('PEG001', 'Budi'),
('PEG002', 'Mingyu');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `no_transaksi` varchar(6) NOT NULL,
  `nip` varchar(6) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`no_transaksi`, `nip`, `tgl_transaksi`, `total`) VALUES
('TRA001', 'PEG002', '2022-02-04', 164000),
('TRA002', 'PEG002', '2022-02-04', 72000),
('TRA003', 'PEG002', '2022-02-04', 150000),
('TRA004', 'PEG002', '2022-02-04', 76000),
('TRA005', 'PEG002', '2022-02-04', 54000),
('TRA006', 'PEG001', '2022-02-05', 90000),
('TRA007', 'PEG001', '2022-02-06', 110000),
('TRA008', 'PEG001', '2022-02-06', 58000),
('TRA009', 'PEG001', '2022-02-06', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hakakses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `hakakses`) VALUES
('admin', 'admin', 'ADMIN'),
('pegawai', 'pegawai', 'PEGAWAI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbdetail`
--
ALTER TABLE `tbdetail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `no_transaksi` (`no_transaksi`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tbpegawai`
--
ALTER TABLE `tbpegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
