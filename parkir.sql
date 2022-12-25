-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2022 pada 12.26
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keluar`
--

CREATE TABLE `tbl_keluar` (
  `kd_keluar` varchar(50) NOT NULL,
  `kd_masuk` varchar(50) DEFAULT NULL,
  `tgl_jam_masuk` datetime DEFAULT NULL,
  `tgl_jam_keluar` datetime DEFAULT NULL,
  `lama_parkir_keluar` varchar(50) DEFAULT NULL,
  `total_keluar` int(11) DEFAULT NULL,
  `status_keluar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_keluar`
--

INSERT INTO `tbl_keluar` (`kd_keluar`, `kd_masuk`, `tgl_jam_masuk`, `tgl_jam_keluar`, `lama_parkir_keluar`, `total_keluar`, `status_keluar`) VALUES
('WJ00000001', 'WJ00000001', '2022-06-20 21:25:43', '2022-06-20 21:27:36', '0 Jam,1 Menit', 15000, 1),
('WJ00000002', 'WJ00000002', '2022-06-20 22:21:05', '2022-06-21 16:21:10', '18 Jam,0 Menit', 8000, 1),
('WJ00000003', 'WJ00000003', '2022-06-20 22:22:32', '2022-06-21 17:06:53', '18 Jam,44 Menit', 8000, 1),
('WJ00000004', 'WJ00000004', '2022-06-21 17:14:45', '2022-06-21 17:21:22', '0 Jam,6 Menit', 15000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masuk`
--

CREATE TABLE `tbl_masuk` (
  `kd_masuk` varchar(50) NOT NULL,
  `steam` varchar(10) DEFAULT NULL,
  `no_plat` varchar(10) DEFAULT NULL,
  `merk_motor` varchar(30) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `status_masuk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_masuk`
--

INSERT INTO `tbl_masuk` (`kd_masuk`, `steam`, `no_plat`, `merk_motor`, `tgl_masuk`, `status_masuk`) VALUES
('WJ00000001', 'Sudah', 'F1234SS', 'Vario merah', '2022-06-20 21:25:43', 2),
('WJ00000002', 'Tidak', 'F4444EE', 'Beat Karbu', '2022-06-20 22:21:05', 2),
('WJ00000003', 'Tidak', 'F3333EE', 'Revo', '2022-06-20 22:22:32', 2),
('WJ00000004', 'Sudah', 'F1111EE', 'Aerox', '2022-06-21 17:14:45', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_plat` varchar(10) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `no_plat`, `image`, `password`, `role_id`, `tanggal_input`) VALUES
(1, 'Abdullah Indra Nugraha', 'admin', 'default.jpg', '$2y$10$IMECEpURj5X9Bcn1diPFA.Oq2JoHvBw3xsAO8xNKMs6Gq1slaQtL6', 1, 1655777830),
(11, 'Rizal Surya', 'F1234SS', 'default.jpg', '$2y$10$UReIOF7Oq6yMdRgN.IUFQex9aLURmJIOElZrxQknQN/q564CHbqQC', 2, 1655777830),
(14, 'Devira', 'F4444EE', 'default.jpg', '$2y$10$lN49gdaObjGAPk0mzrWBgOD7Un840hn/2ORl7CW3fwbaOddYYHdQy', 2, 1655802340),
(15, 'Tania', 'F3333EE', 'default.jpg', '$2y$10$T0y7cjrI.7CiVNFivcQer.TdwRjGT0qMF6LdR5KwQBX4wQTWZYtvO', 2, 1655805643),
(16, 'Faishal', 'F1111EE', 'default.jpg', '$2y$10$K.oUY.hBfnPF59pGLDnomO5sp5z/tLlADua3a0eGkz8owRhP0XLJ6', 2, 1655806449);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `tbl_keluar`
--
ALTER TABLE `tbl_keluar`
  ADD PRIMARY KEY (`kd_keluar`);

--
-- Indeks untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  ADD PRIMARY KEY (`kd_masuk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
