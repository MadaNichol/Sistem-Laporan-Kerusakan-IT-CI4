-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 01:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_adam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_departemen`
--

CREATE TABLE `tb_departemen` (
  `id_departemen` varchar(30) NOT NULL,
  `departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_departemen`
--

INSERT INTO `tb_departemen` (`id_departemen`, `departemen`) VALUES
('DPT01', 'IT'),
('DPT02', 'Finance'),
('DPT03', 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` varchar(30) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `id_departemen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `no_telp`, `id_departemen`) VALUES
('K01', 'People', '123', 'DPT01'),
('K02', 'Manusia', '123', 'DPT02'),
('K03', 'Orang', '123', 'DPT03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(30) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTG01', 'Software'),
('KTG02', 'Jaringan'),
('KTG03', 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` varchar(30) NOT NULL,
  `id_kategori` varchar(30) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `id_karyawan` varchar(30) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `keterangan_pengaduan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `id_kategori`, `nama_kategori`, `id_karyawan`, `nama_karyawan`, `tgl_pengaduan`, `keterangan_pengaduan`) VALUES
('P01', 'KTG02', 'Jaringan', 'K02', 'Manusia', '2025-06-27', 'Tidak ada jaringan'),
('P02', 'KTG03', 'Hardware', 'K01', 'People', '2025-06-28', 'Example'),
('P03', 'KTG01', 'Software', 'K03', 'Orang', '2025-06-28', 'Example');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` varchar(30) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
('1', 'Admin'),
('2', 'Staff IT'),
('3', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff_it`
--

CREATE TABLE `tb_staff_it` (
  `id_staff_it` varchar(30) NOT NULL,
  `nama_staff_it` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_staff_it`
--

INSERT INTO `tb_staff_it` (`id_staff_it`, `nama_staff_it`, `no_telp`) VALUES
('IT01', 'Alpi', '123'),
('IT02', 'Bayur', '123'),
('IT03', 'Agoy', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_staff_it` varchar(30) NOT NULL,
  `id_pengaduan` varchar(30) NOT NULL,
  `id_vendor` varchar(30) NOT NULL,
  `status_tiket` varchar(50) NOT NULL,
  `keterangan_tindakan` text NOT NULL,
  `tgl_tiket` date NOT NULL,
  `nama_staff_it` varchar(100) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`id_tiket`, `id_staff_it`, `id_pengaduan`, `id_vendor`, `status_tiket`, `keterangan_tindakan`, `tgl_tiket`, `nama_staff_it`, `nama_vendor`) VALUES
(1, 'IT02', 'P01', 'V03', 'Proses', 'Example', '2025-06-20', 'Bayur', 'QWERTY'),
(2, 'IT03', 'P01', 'V02', 'Proses', 'Example', '2025-06-24', 'Agoy', 'XYZ'),
(3, 'IT01', 'P01', 'V01', 'Proses', 'Example', '2025-06-09', 'Alpi', 'ABC'),
(5, 'IT02', 'P01', 'V01', 'Proses', 'y', '2025-07-17', 'Bayur', 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `id_role`) VALUES
(2, 'Admin', '123', '1'),
(3, 'IT', '123', '2'),
(4, 'Karyawan', '123', '3');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` varchar(30) NOT NULL,
  `nama_vendor` varchar(20) NOT NULL,
  `kontak_vendor` varchar(25) NOT NULL,
  `nama_perusahaan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `kontak_vendor`, `nama_perusahaan`) VALUES
('V01', 'ABC', '123', 'Y'),
('V02', 'XYZ', '123', 'A'),
('V03', 'QWERTY', '123', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_departemen` (`id_departemen`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_staff_it`
--
ALTER TABLE `tb_staff_it`
  ADD PRIMARY KEY (`id_staff_it`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_staff_it` (`id_staff_it`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD CONSTRAINT `tb_karyawan_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `tb_departemen` (`id_departemen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD CONSTRAINT `tb_pengaduan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengaduan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD CONSTRAINT `tb_tiket_ibfk_2` FOREIGN KEY (`id_staff_it`) REFERENCES `tb_staff_it` (`id_staff_it`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tiket_ibfk_3` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tiket_ibfk_4` FOREIGN KEY (`id_pengaduan`) REFERENCES `tb_pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
