-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2021 pada 19.02
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
(59, '2', 'Divisi 2', 'Sitework');

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
(30, '2', '2.3', 'Mobilisasi dan demobilisasi');

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ahsp_level_1`
--
ALTER TABLE `ahsp_level_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `ahsp_level_2`
--
ALTER TABLE `ahsp_level_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `ahsp_level_3`
--
ALTER TABLE `ahsp_level_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ahsp_level_4`
--
ALTER TABLE `ahsp_level_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
