-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2020 pada 10.46
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

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
-- Struktur dari tabel `tbl_suratkeluar`
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
-- Dumping data untuk tabel `tbl_suratkeluar`
--

INSERT INTO `tbl_suratkeluar` (`id_surat`, `nomor_surat`, `tanggal_surat_dibuat`, `tujuan_surat`, `perihal`, `keterangan`, `file_suratkeluar`) VALUES
(1, '123', '2020-05-05', 'SEKDA', '-', '-', '1051522218_Untitled.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_suratmasuk`
--

CREATE TABLE `tbl_suratmasuk` (
  `id_surat` int(4) NOT NULL,
  `nomor_surat` varchar(30) NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `ditujukan` enum('admin','pegawai','bdg_plip','bdg_pkp','bdg_tik','bdg_tkpbe','bdg_ps','subbdg_uk','subbdg_k','subbdg_pp','kepala','sekretaris') NOT NULL,
  `file_suratmasuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_suratmasuk`
--

INSERT INTO `tbl_suratmasuk` (`id_surat`, `nomor_surat`, `asal_surat`, `tanggal_terima`, `tanggal_surat`, `perihal`, `keterangan`, `ditujukan`, `file_suratmasuk`) VALUES
(8, '1235', 'afgs', '2020-05-06', '2020-06-05', 'gfhs', 'jfjjf', 'bdg_plip', '1319701060_B. Lampung.docx.pdf'),
(9, '143', 'asfsfa', '2020-06-06', '2020-06-05', 'adfasf', '355', 'kepala', '2042957487_B. Lampung.docx.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('admin','pegawai','bdg_plip','bdg_pkp','bdg_tik','bdg_tkpbe','bdg_ps','subbdg_uk','subbdg_k','subbdg_pp') NOT NULL,
  `ruangan` enum('bdg_plip','bdg_pkp','bdg_tik','bdg_tkpbe','bdg_ps','subbdg_uk','subbdg_k','subbdg_pp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nik`, `nama`, `role`, `ruangan`) VALUES
(1, 'admin', 'admin', 1111111111, 'Akbar Rinaldy', 'admin', 'subbdg_uk'),
(2, 'plip', 'plip', 12345678, 'plip', 'pegawai', 'bdg_plip'),
(3, 'tik', 'tik', 1334, 'tik', 'pegawai', 'bdg_tik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_suratkeluar`
--
ALTER TABLE `tbl_suratkeluar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_suratkeluar`
--
ALTER TABLE `tbl_suratkeluar`
  MODIFY `id_surat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  MODIFY `id_surat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
