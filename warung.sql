-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 03:38 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warung`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_kategori` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_kategori`, `id_barang`, `gambar`, `nama_barang`, `stok`, `harga`) VALUES
(2, 1, '1.jpg', 'Indomie Goreng rasa Ayam Geprek ', 5, 3000),
(2, 8, '2.jpg', 'Salping Sale Pisang', 8, 5000),
(3, 3, '3.jpg', 'Aqua botol 600ml', 16, 4000),
(3, 4, '4.jpg', 'Cincau Madu 135ml', 20, 1000),
(3, 5, '5.jpg', 'Teh Rio', 19, 1000),
(3, 6, '6.jpg', 'Okky Jelly Drink 150ml', 22, 1000),
(3, 7, '7.jpg', 'Kopikap Cappucinno 150ml', 16, 1000),
(4, 10, '8.jpg', 'Sun Kara Santan Instan', 18, 4000),
(9, 2, '9.jpg', 'Boom detergen bubuk', 8, 5000),
(9, 9, '10.jpg', 'Lidah Buaya Sabun Colek', 8, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `bar_id_kategori` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `bar_id_kategori`, `id_barang`, `nama_kategori`) VALUES
(1, NULL, NULL, 'Sembako'),
(2, NULL, NULL, 'Makanan'),
(3, NULL, NULL, 'Minuman'),
(4, NULL, NULL, 'Bahan Masak'),
(5, NULL, NULL, 'Baju Anak '),
(6, NULL, NULL, 'Baju Muslim'),
(7, NULL, NULL, 'Kesehatan dan Kecantikan'),
(8, NULL, NULL, 'Perlengkapan Mandi'),
(9, NULL, NULL, 'Perlengkapan Rumah Tangga'),
(10, NULL, NULL, 'Rokok');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `alamat`, `no_telepon`, `username`, `password`) VALUES
(1, 'Sarah Mustika Dewi', 'Lampung Barat', '08537916671', 'sarahm', 'Sarahmd_01');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(25) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_kategori`,`id_barang`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `FK_memiliki_3` (`bar_id_kategori`,`id_barang`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK_memiliki` (`id_pembeli`),
  ADD KEY `FK_memiliki_2` (`id_kategori`,`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_memiliki_4` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `FK_memiliki_3` FOREIGN KEY (`bar_id_kategori`,`id_barang`) REFERENCES `barang` (`id_kategori`, `id_barang`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_memiliki` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `FK_memiliki_2` FOREIGN KEY (`id_kategori`,`id_barang`) REFERENCES `barang` (`id_kategori`, `id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
