-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2021 pada 06.34
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahsp_db`
--
CREATE DATABASE IF NOT EXISTS `ahsp_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ahsp_db`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ahsp_level_1`
--

CREATE TABLE `ahsp_level_1` (
  `id` int(11) NOT NULL,
  `kode_lvl_1` varchar(128) NOT NULL,
  `divisi` varchar(128) NOT NULL,
  `uraian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ahsp_level_1`
--

INSERT INTO `ahsp_level_1` (`id`, `kode_lvl_1`, `divisi`, `uraian`) VALUES
(58, '1', 'Divisi 1', 'Design Development'),
(59, '2', 'Divisi 2', 'Sitework'),
(60, '3', 'Divisi 3', 'Pekerjaan Struktural'),
(61, '4', 'Divisi 4', 'Pekerjaan Arsitektur'),
(62, '5', 'Divisi 5', 'Pekerjaan Mekanikal'),
(63, '6', 'Divisi 6', 'Pekerjaan Elektrikal'),
(64, '7', 'Divisi 7', 'Fasilitas Eksterior Bangunan'),
(65, '8', 'Divisi 8', 'Miscellaneous Work');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ahsp_level_2`
--

CREATE TABLE `ahsp_level_2` (
  `id` int(11) NOT NULL,
  `kode_lvl_1` varchar(128) NOT NULL,
  `kode_lvl_2` varchar(128) NOT NULL,
  `uraian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ahsp_level_2`
--

INSERT INTO `ahsp_level_2` (`id`, `kode_lvl_1`, `kode_lvl_2`, `uraian`) VALUES
(25, '1', '1.1', 'Dokumen Kontrak'),
(26, '1', '1.2', 'Asuransi dan Jaminan'),
(27, '2', '2.1', 'Setting-out'),
(29, '2', '2.2', 'Site-work'),
(30, '2', '2.3', 'Mobilisasi dan demobilisasi'),
(31, '3', '3.2', 'Pekerjaan Struktural di Bawah Tanah'),
(32, '1', '1.3', 'Shop drawing dan as-built drawing'),
(33, '1', '1.4', 'Site Management'),
(34, '1', '1.5', 'Dokumentasi Proyek'),
(35, '2', '2.4', 'Pembersihan Lahan dan Removal'),
(36, '2', '2.5', 'Gajian, pemotongan, timbunan, dan buangan'),
(37, '3', '3.1', 'Pekerjaan Struktural di Atas Tanah'),
(38, '3', '3.3', 'Rangka Atap'),
(39, '4', '4.1', 'Beton'),
(40, '4', '4.2', 'Logam'),
(41, '4', '4.3', 'Kayu dan Plastik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ahsp_level_3`
--

CREATE TABLE `ahsp_level_3` (
  `id` int(11) NOT NULL,
  `kode_lvl_2` varchar(128) NOT NULL,
  `kode_lvl_3` varchar(128) NOT NULL,
  `uraian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ahsp_level_3`
--

INSERT INTO `ahsp_level_3` (`id`, `kode_lvl_2`, `kode_lvl_3`, `uraian`) VALUES
(8, '2.2', '2.2.1', 'Pekerjaan Persiapan'),
(9, '3.2', '3.2.1', 'Pekerjaan Pondasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ahsp_level_4`
--

CREATE TABLE `ahsp_level_4` (
  `id` int(11) NOT NULL,
  `kode_lvl_3` varchar(128) NOT NULL,
  `kode_lvl_4` varchar(128) NOT NULL,
  `uraian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ahsp_level_4`
--

INSERT INTO `ahsp_level_4` (`id`, `kode_lvl_3`, `kode_lvl_4`, `uraian`) VALUES
(5, '2.2.1', '2.2.1.1', 'Pembuatan 1 m2 pagar sementara dari kayu'),
(6, '3.2.1', '3.2.1.1', 'Pemasangan Pondasi Batu Belah 1PC 3PP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telp` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `nip`, `nama`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(1, '123', 'Valent', '2021-09-01', 'Laki-laki', 'Pakri 1', '08123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nip`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, '123', '$2y$10$PvS8KkeRTza7bCCa0uVBGeR7NCZHZQzic0pdFk0rysxkyTWhCITlO', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ahsp_level_1`
--
ALTER TABLE `ahsp_level_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_lvl_1` (`kode_lvl_1`);

--
-- Indeks untuk tabel `ahsp_level_2`
--
ALTER TABLE `ahsp_level_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_lvl_1` (`kode_lvl_1`),
  ADD KEY `kode_lvl_2` (`kode_lvl_2`);

--
-- Indeks untuk tabel `ahsp_level_3`
--
ALTER TABLE `ahsp_level_3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ahsp_level_4`
--
ALTER TABLE `ahsp_level_4`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ahsp_level_1`
--
ALTER TABLE `ahsp_level_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `ahsp_level_2`
--
ALTER TABLE `ahsp_level_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `ahsp_level_3`
--
ALTER TABLE `ahsp_level_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ahsp_level_4`
--
ALTER TABLE `ahsp_level_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
