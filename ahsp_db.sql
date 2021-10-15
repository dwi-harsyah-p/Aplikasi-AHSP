-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2021 pada 05.23
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
(64, '7', 'Divisi 7', 'Fasilitas Eksterior Bangunan');

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
(8, '2.2', '2.2.1', 'Pekerjaan Persiapan');

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
(5, '2.2.1', '2.2.1.1', 'Pembuatan 1 m2 pagar sementara dari kayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id` int(11) NOT NULL,
  `uraian` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `harga` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `uraian` varchar(128) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `harga` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `image` varchar(255) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `no_telp` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `nip`, `nama`, `tgl_lahir`, `jenis_kelamin`, `image`, `alamat`, `id_daerah`, `no_telp`) VALUES
(1, '123', 'Dwi Harsyah Prasetya', '2002-02-10', 'Laki-laki', 'IMG-20190430-WA0047.jpg', 'Jl. Pakri 1 Rusunawa Polda Sumsel No.103 Kel Duku Kec Ilir Timur II', 2, '0823628800'),
(2, '111', 'Valentino Rossi46', '1990-05-23', 'Laki-laki', 'EFFECTS.jpg', 'Kota Palembang', 2, '08523104616'),
(12, '112', 'Fanisa Diva Refitra', '2001-11-15', 'Perempuan', 'IMG_20190426_142715.jpeg', 'Kota Palembang', 3, '123'),
(13, '222', 'Myah Zabillah', '2001-01-01', '', 'default.jpg', '', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daerah`
--

CREATE TABLE `daerah` (
  `id` int(11) NOT NULL,
  `daerah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daerah`
--

INSERT INTO `daerah` (`id`, `daerah`) VALUES
(2, 'Palembang'),
(3, 'Lahat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upah`
--

CREATE TABLE `upah` (
  `id` int(11) NOT NULL,
  `uraian` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `harga` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '123', '$2y$10$QnWHJLDGHjAFvpZRRbQYI.3Rmmi1CQRCF3hvOzne.eR92MAr0qnUO', 1, 1, 1630833298),
(2, '111', '$2y$10$b1ezdsnQss92b/OtJH1tmeim762HjwmIsnLHdWYCsK6ofGKpGDzq6', 2, 0, 1629985556),
(16, '112', '$2y$10$TcffkHHGIR0FqMz1ahVZseD4wjR4Z3WP6qsZKagO8RDRJd39LG2UW', 2, 1, 1634113977),
(17, '222', '$2y$10$P.mlDgke1BHExbM/Lktkp.VG7LljGleeD.N8gUFjW2Joioagea32i', 2, 1, 1634267270);

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
(1, 'Admin\r\n'),
(2, 'User');

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
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `upah`
--
ALTER TABLE `upah`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `daerah`
--
ALTER TABLE `daerah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `upah`
--
ALTER TABLE `upah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
