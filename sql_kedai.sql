-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 11:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kedai`
--

-- --------------------------------------------------------

--
-- Table structure for table `bandingan`
--

CREATE TABLE `bandingan` (
  `idbandingan` int(11) NOT NULL,
  `idpembeli` varchar(4) DEFAULT NULL,
  `idproduk` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bandingan`
--

INSERT INTO `bandingan` (`idbandingan`, `idpembeli`, `idproduk`) VALUES
(2, '1', '2'),
(4, '1', '4');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `idpembeli` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `namapembeli` varchar(30) DEFAULT NULL,
  `tarikhdaftar` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`idpembeli`, `email`, `password`, `namapembeli`, `tarikhdaftar`) VALUES
(1, 'slumberjer@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'Ahmad Hanis', '2023-04-26 09:52:36.697833'),
(2, 'alidavi@gmail.com', 'abc123', 'Ali Davi', '2023-04-26 13:27:15.246970'),
(3, 'haris@gmail.com', '893b3c49b8f10d8b72e0c021bce0cf3fa791773f', ' Haris Sultan', '2023-04-26 15:14:36.872579'),
(4, 'cheong@gmail.com', '90bbf3c1595af9501238c35424e73990be5d443e', ' Cheong Hong', '2023-04-26 15:14:36.873596'),
(5, 'suhaimi@gmail.com', '893b3c49b8f10d8b72e0c021bce0cf3fa791773f', ' Suhaimi Abu', '2023-04-26 15:19:36.693690'),
(6, 'leongc@gmail.com', 'ee0368c127984b2d480e6ba6c0d00c4d1f78c7fe', ' Leong Chin', '2023-04-26 15:19:36.694729'),
(7, 'tipah@gmail.com', '90bbf3c1595af9501238c35424e73990be5d443e', '  Tipah Asli', '2023-04-26 15:19:36.695631');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `idpenjual` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `tarikhdaftar` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `namapenjual` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`idpenjual`, `email`, `password`, `tarikhdaftar`, `namapenjual`) VALUES
(1, 'm.aqielakhtar@gmail.com', '4061c2ee636f985a548b64734e5cbb406ce6953b', '2023-04-26 11:29:05.648950', 'Aqiel Akhtar'),
(2, 'aziz@uum.edu.my', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '2023-04-26 13:21:18.170009', 'Abdul Aziz '),
(3, 'budi@gmail.com', '281aca05b2074f6fbae230e45cf81923f3e41602', '2023-04-26 15:16:44.087441', 'Budiman'),
(4, 'muthu@gmail.com', 'de71d2940ea10ce8077b166340838d4e242499ae', '2023-04-26 15:16:44.089229', 'Muthu Sammy'),
(5, 'halimah@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '2023-04-26 15:40:45.812086', 'Halimah Mansur'),
(6, 'zachary@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '2023-04-26 17:23:30.252456', ' Zakri Rem');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(4) NOT NULL,
  `namaproduk` varchar(30) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `harga` double(10,2) DEFAULT NULL,
  `idpenjual` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `keterangan`, `harga`, `idpenjual`) VALUES
(1, 'Proton Axia', 'Second hand year 2012', 28000.00, '1'),
(2, 'Proton X70 CBU', 'Used tahun 2010', 68000.00, '1'),
(3, 'Proton exora', 'Tahun 2017, Bold', 26000.00, '1'),
(4, 'Hyundai Starex', 'Tahun 2016', 45000.00, '1'),
(5, 'Proton X50', 'Full spec tahun 2022', 68000.00, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bandingan`
--
ALTER TABLE `bandingan`
  ADD PRIMARY KEY (`idbandingan`),
  ADD KEY `bandingan_produk` (`idproduk`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`idpembeli`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`idpenjual`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idpenjual` (`idpenjual`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bandingan`
--
ALTER TABLE `bandingan`
  MODIFY `idbandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `idpembeli` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `idpenjual` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
