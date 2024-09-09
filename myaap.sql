-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 03:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myaap`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(50) NOT NULL,
  `nama_bank` varchar(30) DEFAULT NULL,
  `nomor_rekening` varchar(30) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `nama_bank`, `nomor_rekening`, `keterangan`) VALUES
(8, 'BCA', '12345678', ''),
(9, 'BRI', '0876578', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(50) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `keterangan`) VALUES
(3, 'Gaji', ''),
(4, 'BONUS', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(50) NOT NULL,
  `tanggal_pemasukan` datetime DEFAULT NULL,
  `kategori_id` int(50) DEFAULT NULL,
  `bank_id` int(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `nominal_pemasukan` decimal(16,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `tanggal_pemasukan`, `kategori_id`, `bank_id`, `keterangan`, `nominal_pemasukan`) VALUES
(12, '2023-07-20 00:00:00', 3, 8, 'Gaji Bulanan', '1000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(50) NOT NULL,
  `tanggal_pengeluaran` datetime DEFAULT NULL,
  `kategori_id` varchar(50) DEFAULT NULL,
  `bank_id` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `nominal_pengeluaran` decimal(16,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal_pengeluaran`, `kategori_id`, `bank_id`, `keterangan`, `nominal_pengeluaran`) VALUES
(4, '2023-07-06 00:00:00', '3', '9', 'GAJI', '1000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(50) NOT NULL,
  `tanggal_transfer` datetime NOT NULL,
  `kategori_id` varchar(50) DEFAULT NULL,
  `bank_asal_id` varchar(50) DEFAULT NULL,
  `bank_tujuan_id` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `nominal_transfer` decimal(16,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `tanggal_transfer`, `kategori_id`, `bank_asal_id`, `bank_tujuan_id`, `keterangan`, `nominal_transfer`) VALUES
(9, '2023-07-05 00:00:00', '4', '9', '8', '-', '10000000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
