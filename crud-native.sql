-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 07:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-native`
--

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `id` int(11) NOT NULL,
  `kode_pesanan` varchar(100) DEFAULT NULL,
  `tanggal_pesanan` datetime DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `jenis_pesanan` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`id`, `kode_pesanan`, `tanggal_pesanan`, `nama_pemesan`, `jenis_pesanan`, `jumlah`, `harga`) VALUES
(1, 'LNDR001', '0000-00-00 00:00:00', 'Yusron', 'regular', '1Kg', 10000),
(3, 'LNDR004', '0000-00-00 00:00:00', 'Angga', 'regular', '2kg', 200000),
(4, 'LNDR007', '2022-10-30 00:00:00', 'Agus', 'regular', '10kg', 100000),
(5, 'LNDR0011', '0000-00-00 00:00:00', 'Reza', '', '10kg', 100000),
(9, 'Igor Holman', '1987-02-10 00:00:00', 'Raya Cooke', 'express', 'Ignacia Kent', 68),
(10, 'Ava Sellers', '1979-11-08 00:00:00', 'Maggie Ashley', 'regular', 'Keaton Larsen', 372);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `alamat`, `password`) VALUES
(1, '0909', 'Agus', 'Bogor', '$2y$10$WESbK4JHkwaaEB54Pj.H/OGAV/qAk3BfO1ngFJbgx0qfR2yE.jA4K');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `kode_service` varchar(100) DEFAULT NULL,
  `tanggal_service` varchar(100) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `jenis_service` varchar(100) DEFAULT NULL,
  `nama_montir` varchar(100) DEFAULT NULL,
  `harga_service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `kode_service`, `tanggal_service`, `nama_pelanggan`, `jenis_service`, `nama_montir`, `harga_service`) VALUES
(1, '001', '02022022', 'Adul', 'Tune Up', 'Agit', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laundry`
--
ALTER TABLE `laundry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
