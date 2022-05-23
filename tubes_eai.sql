-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2022 at 07:32 AM
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
-- Database: `tubes_eai`
--

-- --------------------------------------------------------

--
-- Table structure for table `kebijakan`
--

CREATE TABLE `kebijakan` (
  `nomor_peraturan` int(255) NOT NULL,
  `nama_peraturan` varchar(255) NOT NULL,
  `isi_peraturan` varchar(255) NOT NULL,
  `tempat_di_tempatkan` varchar(255) NOT NULL,
  `tanggal_di_tetapkan` date NOT NULL,
  `nama_penandatanganan` varchar(255) NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perizinan`
--

CREATE TABLE `perizinan` (
  `no_izin` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `KJPP` varchar(255) NOT NULL,
  `tanggal_izin` date NOT NULL,
  `klasifikasi_izin` varchar(255) NOT NULL,
  `no_register_penilai` int(255) NOT NULL,
  `no_induk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profesi_keuangan`
--

CREATE TABLE `profesi_keuangan` (
  `id_user` int(255) NOT NULL,
  `NIK` int(255) NOT NULL,
  `NPW` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `gelar` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `umur` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
--

CREATE TABLE `sanksi` (
  `nomor_kebijakan` int(255) NOT NULL,
  `judul_kebijakan` varchar(255) NOT NULL,
  `nama_penandatanganan` varchar(255) NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `tempat_ditetapkan` varchar(255) NOT NULL,
  `tanggal_ditetapkan` date NOT NULL,
  `tentang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `st`
--

CREATE TABLE `st` (
  `no_surat` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `nomor_izin` int(255) NOT NULL,
  `lingkup_kegiatan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  `tempat_id` varchar(255) NOT NULL,
  `tanggal_ttd` date NOT NULL,
  `nama_penandatangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kebijakan`
--
ALTER TABLE `kebijakan`
  ADD PRIMARY KEY (`nomor_peraturan`);

--
-- Indexes for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`no_izin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `profesi_keuangan`
--
ALTER TABLE `profesi_keuangan`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`nomor_kebijakan`);

--
-- Indexes for table `st`
--
ALTER TABLE `st`
  ADD PRIMARY KEY (`no_surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD CONSTRAINT `perizinan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `profesi_keuangan` (`id_user`);

--
-- Constraints for table `st`
--
ALTER TABLE `st`
  ADD CONSTRAINT `st_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `profesi_keuangan` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
