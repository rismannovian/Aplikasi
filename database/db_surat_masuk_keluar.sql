-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mar 2018 pada 02.35
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat_masuk_keluar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `no_disposisi` varchar(15) NOT NULL,
  `no_agenda` varchar(15) NOT NULL,
  `no_surat` varchar(15) NOT NULL,
  `kepada` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `jenis_surat` varchar(15) NOT NULL,
  `tanggapan` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`no_disposisi`, `no_agenda`, `no_surat`, `kepada`, `keterangan`, `jenis_surat`, `tanggapan`) VALUES
('DSP002', 'SM002', 'SM002', 'riannnn', 'hai', 'Surat Pribadi', 'sad'),
('DSP001', 'SM001', 'SM001', 'rani', 'apa kabar', 'Surat Pribadi', 'belum ada'),
('DSP003', 'SM003', '12/ASA/2018', 'SMKN2', 'bla balabla', 'Surat Pribadi', 'belum dija');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` varchar(15) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama_depan`, `nama_belakang`, `password`) VALUES
('rian', 'rian', 'praditya', 'rian'),
('devi', 'devi', 'devi', 'devi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `no_agenda` varchar(15) NOT NULL,
  `id` varchar(15) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `no_surat` varchar(15) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `tanggapan` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`no_agenda`, `id`, `jenis_surat`, `tanggal_kirim`, `no_surat`, `pengirim`, `perihal`, `tanggapan`) VALUES
('SM003', 'rian', 'Surat Pribadi', '2018-02-05', 'SMK2/002', 'SMKN2', 'bla balabla', 'terjawab'),
('SM001', 'rian', 'Surat Pribadi', '0000-00-00', 'SM001', 'rani', 'apa kabar', 'Terkirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `no_agenda` varchar(15) NOT NULL,
  `id` varchar(15) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `perihal` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`no_agenda`, `id`, `jenis_surat`, `tanggal_kirim`, `tanggal_terima`, `no_surat`, `pengirim`, `penerima`, `perihal`) VALUES
('SM003', 'rian', 'Surat Pribadi', '2018-02-05', '2018-02-10', '12/ASA/2018', 'ASA', 'SMKN2', 'bla balabla'),
('SM002', 'rian', 'Surat Pribadi', '2018-02-07', '2018-02-09', 'SM002', 'riannnn', 'riannnn', 'hai'),
('SM001', 'rian', 'Surat Pribadi', '2018-02-05', '2018-02-07', 'SM001', 'rian', 'rani', 'apa kabar'),
('SM004', 'rian', 'Surat Resmi', '2018-02-02', '2018-02-05', 'ASA/012/12', 'ASA', 'SMKN2', 'blansbasldkkask');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`no_disposisi`),
  ADD UNIQUE KEY `no_agenda` (`no_agenda`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`no_agenda`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`no_agenda`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
