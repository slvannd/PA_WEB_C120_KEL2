-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 06:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etam_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` int(255) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `jumlah`, `gambar`) VALUES
(1, 'baju', 399000, 4, 'BajuPink.png'),
(5, 'Sepatu pinky', 900000, 4, 'Sepatu pinky.png');

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `ID` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`ID`, `username`, `pass`) VALUES
(1, 'Silvia', 'a030babd90bf9783f0f3cd940f76f0f9'),
(2, 'Riana', '218833ded6193ca34a2114286a0d41fa'),
(3, 'Asrina', '5f0ae357fe685fa3eb5c5fd781191b0b');

-- --------------------------------------------------------

--
-- Table structure for table `loginmember`
--

CREATE TABLE `loginmember` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginmember`
--

INSERT INTO `loginmember` (`id`, `username`, `password`) VALUES
(1, 'novia', '$2y$10$s.yWZfogz5.QrGSd89aKkOQIwrYoOgV5FNJQeQeQ8vGH6PkOOFREq');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `nama_pembeli` varchar(20) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `nama_pembeli`, `id_barang`, `jumlah`, `total`) VALUES
(1, '12-11-2022', 'novia', 1, 1, 399000),
(2, '12-11-2022', 'novia', 1, 1, 399000),
(3, '12-11-2022', 'novia', 1, 2, 798000),
(4, '12-11-2022', 'novia', 5, 1, 900000),
(5, '12-11-2022', 'novia', 5, 1, 900000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginmember`
--
ALTER TABLE `loginmember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loginmember`
--
ALTER TABLE `loginmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
