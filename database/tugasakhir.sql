-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 04:45 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suratkeluar`
--

CREATE TABLE `tbl_suratkeluar` (
  `id_surat` int(4) NOT NULL,
  `nomor_surat` varchar(30) NOT NULL,
  `tanggal_surat_dibuat` date NOT NULL,
  `tujuan_surat` varchar(60) NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file_suratkeluar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suratkeluar`
--

INSERT INTO `tbl_suratkeluar` (`id_surat`, `nomor_surat`, `tanggal_surat_dibuat`, `tujuan_surat`, `perihal`, `keterangan`, `file_suratkeluar`) VALUES
(1, '123', '2020-05-05', 'SEKDA', '-', '-', '1051522218_Untitled.png'),
(2, '123', '2020-07-20', 'SEKDA', '-', '-', '1635876801_Transkrip Sementara_2.pdf'),
(3, '1234', '2020-07-20', 'SEKDA', '-', '-', '1572687137_Transkrip Sementara_2.pdf'),
(4, '1111', '2020-07-23', 'ssss', '-', '-', '23-07-2020-Transkrip Sementara_2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suratmasuk`
--

CREATE TABLE `tbl_suratmasuk` (
  `id_surat` int(4) NOT NULL,
  `nomor_surat` varchar(30) NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `ditujukan` enum('Kepala Dinas','Sekretaris','Bidang Pengelolaan dan Layanan Informasi Publik','Bidang Pengelolaan Komunikasi Publik','Bidang Teknologi Informasi dan Komunikasi','Bidang Tata Kelola Pemerintahan Berbasis Elektronik','Bidang Persandian dan Statistik','Sub Bagian Umum dan Kepegawaian','Sub Bagian Keuangan','Sub Bagian Perencanaan dan Pelaporan') NOT NULL,
  `status` enum('Diambil','Diantar') NOT NULL,
  `oleh` varchar(30) NOT NULL,
  `file_suratmasuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suratmasuk`
--

INSERT INTO `tbl_suratmasuk` (`id_surat`, `nomor_surat`, `asal_surat`, `tanggal_terima`, `tanggal_surat`, `perihal`, `keterangan`, `ditujukan`, `status`, `oleh`, `file_suratmasuk`) VALUES
(18, '32143', 'aag', '2020-06-11', '2020-05-07', 'dhydj', 'jgkgkkg', 'Bidang Pengelolaan dan Layanan Informasi Publik', 'Diambil', 'asdasf', '225003582_PKN - Copy.pdf'),
(20, '123', 'Gubernur Lampung', '2020-06-12', '2020-06-11', 'Surat Udangan', '-', 'Bidang Teknologi Informasi dan Komunikasi', 'Diantar', 'SADAF', '1443992898_PKN - Copy.pdf'),
(21, '1345', 'asdas', '2020-07-20', '2020-07-20', 'Test test', 'kadkf', 'Sekretaris', 'Diambil', 'asdasf', 'doc.pdf'),
(22, '11/2020-2019', 'Gubernur Lampung', '2020-07-23', '2020-07-22', 'rapat terbatas', '-', 'Kepala Dinas', 'Diantar', 'Akbar', '23-07-2020-Transkrip Sementara.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('admin','pegawai','bdg_plip','bdg_pkp','bdg_tik','bdg_tkpbe','bdg_ps','subbdg_uk','subbdg_k','subbdg_pp') NOT NULL,
  `ruangan` enum('Kepala Dinas','Sekretaris','Bidang Pengelolaan dan Layanan Informasi Publik','Bidang Pengelolaan Komunikasi Publik','Bidang Teknologi Informasi dan Komunikasi','Bidang Tata Kelola Pemerintahan Berbasis Elektronik','Bidang Persandian dan Statistik','Sub Bagian Umum dan Kepegawaian','Sub Bagian Keuangan','Sub Bagian Perencanaan dan Pelaporan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nik`, `nama`, `role`, `ruangan`) VALUES
(1, 'admin', 'admin', 1111111111, 'Akbar Rinaldy', 'admin', ''),
(2, 'plip', 'plip', 12345678, 'Bidang Pengelolaan dan Layanan Informasi Publik', 'pegawai', 'Bidang Pengelolaan dan Layanan Informasi Publik'),
(3, 'tik', 'tik', 1334, 'tik', 'pegawai', 'Bidang Teknologi Informasi dan Komunikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_suratkeluar`
--
ALTER TABLE `tbl_suratkeluar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_suratkeluar`
--
ALTER TABLE `tbl_suratkeluar`
  MODIFY `id_surat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  MODIFY `id_surat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
