-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2024 at 05:32 AM
-- Server version: 8.0.36
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL,
  `kompetensi_keahlian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(4, 'X RMT 1', 'REKAYASA MUSIK TERAPAN'),
(5, 'X RMT 2', 'REKAYASA MUSIK TERAPAN'),
(6, 'X RMT 3', 'REKAYASA MUSIK TERAPAN'),
(7, 'XI RMT 1', 'REKAYASA MUSIK TERAPAN'),
(8, 'XI RMT 2', 'REKAYASA MUSIK TERAPAN'),
(9, 'XI RMT 3', 'REKAYASA MUSIK TERAPAN'),
(10, 'XII RMT 1', 'REKAYASA MUSIK TERAPAN'),
(11, 'XII RMT 2', 'REKAYASA MUSIK TERAPAN'),
(12, 'XII RMT 3', 'REKAYASA MUSIK TERAPAN');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_petugas` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_spp` int NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bulan_dibayar` varchar(50) DEFAULT NULL,
  `tahun_dibayar` varchar(4) DEFAULT NULL,
  `jumlah_bayar` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `id_siswa`, `id_spp`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `jumlah_bayar`) VALUES
(4, 8, 28, 2, NULL, 'Januari', NULL, NULL),
(5, 8, 28, 2, NULL, 'Februari', NULL, 25000),
(6, 9, 28, 2, '2024-02-23', 'Maret', '2024', 75000),
(7, 8, 28, 2, NULL, 'April', NULL, NULL),
(8, 8, 28, 2, NULL, 'Mei', NULL, NULL),
(9, 8, 28, 2, NULL, 'Juni', NULL, NULL),
(10, 8, 28, 2, NULL, 'Juli', NULL, NULL),
(11, 8, 28, 2, NULL, 'Agustus', NULL, NULL),
(12, 8, 28, 2, NULL, 'September', NULL, NULL),
(13, 9, 28, 2, '2024-02-23', 'Oktober', '2024', 75000),
(14, 9, 28, 2, '2024-02-23', 'November', '2024', 75000),
(15, 9, 28, 2, '2024-02-23', 'Desember', '2024', 75000),
(16, 8, 29, 2, NULL, 'Januari', NULL, NULL),
(17, 8, 29, 2, NULL, 'Februari', NULL, NULL),
(18, 9, 30, 2, NULL, 'Januari', NULL, NULL),
(19, 9, 31, 2, '2024-04-10', 'Januari', '2024', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int NOT NULL,
  `id_users` int NOT NULL,
  `nama_petugas` varchar(55) DEFAULT NULL,
  `no_hp_petugas` varchar(25) DEFAULT NULL,
  `alamat_petugas` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `id_users`, `nama_petugas`, `no_hp_petugas`, `alamat_petugas`) VALUES
(7, 23, 'Yanto Suherman', '0813434342525', 'Bogor'),
(8, 24, 'Rini Agustina', '0853-8604-918', 'Tajur Bogor'),
(9, 2, 'Wahyono Wicaksono', '081299483895', 'Kandang Roda'),
(10, 33, 'Adit Saputra', '+62-838-555-610', 'Cisarua');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `id_users` int NOT NULL,
  `id_spp` int NOT NULL,
  `id_kelas` int NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nis` varchar(8) DEFAULT NULL,
  `nama_siswa` varchar(35) DEFAULT NULL,
  `alamat_siswa` varchar(128) DEFAULT NULL,
  `no_telepon_siswa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_users`, `id_spp`, `id_kelas`, `nisn`, `nis`, `nama_siswa`, `alamat_siswa`, `no_telepon_siswa`) VALUES
(28, 30, 2, 6, '88355045', '88355045', 'Ni Fitri', 'Sukasari Tajur Bogor', '+628645906535'),
(29, 31, 2, 5, '12345', '12345', 'Putri Syafirah', 'Metro Residence Bogor', '+628645906535'),
(30, 32, 2, 6, '98763', '98763', 'Jessica Arlyn', 'Babakan Madang', '081338586395'),
(31, 34, 2, 4, '451353', '451353', 'Muhammad Gusmanto', 'Metro Residence Bogor', '085288725671');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int NOT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `nominal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(2, '2024', 75000),
(6, '2025', 80000),
(7, '2024', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `level` enum('Admin','Petugas','Siswa') DEFAULT NULL,
  `gambar` varchar(150) DEFAULT NULL,
  `remember_token` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `level`, `gambar`, `remember_token`) VALUES
(2, 'admin', '$2y$10$o1QlNQiLkHgSC/lerkt8kecJx3sXvtYJw.9F45dYBheIoZQT.4eJe', 'Admin', '65d6d29e51788.png', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(3, '', '$2y$10$NWT.KdSLlEaHq5W35JITZOnC1n2SEjJK5uf5QPQrZEHbygbimRHtW', 'Petugas', 'avatar4.png', ''),
(4, '0117231726', '$2y$10$fUEYPEKa2n8qsraXf8jiTufugBi3bIYv4HVf2SK/nFHwVCnPyMA/y', 'Siswa', 'avatar5.png', NULL),
(14, '0117231726', '$2y$10$zE4RXM8sE9Hi2BH9PJniVuM5U8cGQlvrpZMF7p1YA6JPDt6wYnqT2', 'Siswa', 'avatar5.png', NULL),
(22, '01172317323', '$2y$10$O.mabyuqsU0lxFxjMj6qOupMiM.Kc97GwB1cVOQTMGThyk.0.O5R.', 'Siswa', 'avatar5.png', NULL),
(23, 'yantosuherman@mail.com', '$2y$10$4eUi6/1pr5vbb5g6kmki4Otu4rbA6eF1nqsHb9iisuX2W6Z7/5rE.', 'Petugas', 'avatar4.png', NULL),
(24, 'riniagustinaadminsmkpivibgr@belajar', '$2y$10$bOYCXd6jpfYDjwRMGfidz.L1qHcke5PZ8zqs0lojXvqFBDdgu0LKy', 'Admin', '5856.png', NULL),
(30, '88355045', '$2y$10$w/5knvdzYTv.d8b7WZ.zMuwmKVHByUqss8bd58resUUW.pDQ2vUym', 'Siswa', '65d6e6dbc7a08.png', ''),
(31, '12345', '$2y$10$5aEvo6aYNPnQV3r1XSutuu4F7R1vCRMyc09fpPp3Rlky0.ucWe0TC', 'Siswa', 'avatar5.png', NULL),
(32, '98763', '$2y$10$Lzu5YibRiYUMNds30Y0YbOl05R0qxv5PDVfP3MuQ9AjxWogGXbkKu', 'Siswa', 'avatar5.png', ''),
(33, 'adit123', '$2y$10$JdrsU03k4WpHCsDyyzW4UOWPSM6UmUB7PKDTXpxnfYeTyoQlBix9m', 'Petugas', 'avatar4.png', ''),
(34, '451353', '$2y$10$gyMRyudZRRxn4w3CJJfAPul3YzOC6okuew80nfSu5xlbkqCLuXhua', 'Siswa', '65d81e8b98e0e.png', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `petugas_ibfk_1` (`id_users`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `siswa_ibfk_1` (`id_users`),
  ADD KEY `siswa_ibfk_2` (`id_spp`),
  ADD KEY `siswa_ibfk_3` (`id_kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
