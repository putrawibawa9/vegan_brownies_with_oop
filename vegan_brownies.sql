-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 10:00 PM
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
-- Database: `vegan_brownies`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_admin`, `Username`, `Password`) VALUES
(1, 'maya', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Id_pelanggan` int(11) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Nama_pelanggan` varchar(30) NOT NULL,
  `No_pelanggan` int(11) DEFAULT NULL,
  `Alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Id_pelanggan`, `Password`, `Nama_pelanggan`, `No_pelanggan`, `Alamat_pelanggan`) VALUES
(8, '123', 'maya', 0, 'Ketewel');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `Id_pesanan` int(11) NOT NULL,
  `Id_pelanggan` int(11) NOT NULL,
  `Id_produk` int(11) NOT NULL,
  `Alamat_pesanan` text NOT NULL,
  `Total_pesanan` int(11) NOT NULL,
  `Tgl_pesanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`Id_pesanan`, `Id_pelanggan`, `Id_produk`, `Alamat_pesanan`, `Total_pesanan`, `Tgl_pesanan`) VALUES
(16, 8, 16, 'Ketewel', 20000, '2023-12-22'),
(17, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(18, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(20, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(21, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(23, 8, 12, 'Ketewel', 23231, '2023-12-22'),
(24, 8, 16, 'Ketewel', 20000, '2023-12-22'),
(25, 8, 12, 'Ketewel', 23231, '2023-12-22'),
(27, 8, 16, 'Ketewel', 20000, '2023-12-22'),
(28, 8, 17, 'Ketewel', 20000, '2023-12-22'),
(29, 10, 17, 'Sukawati', 20000, '2023-12-22'),
(31, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(32, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(33, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(34, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(35, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(36, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(37, 12, 8, 'jember', 20000, '2023-12-22'),
(38, 8, 8, 'Ketewel', 20000, '2023-12-22'),
(39, 15, 8, 'admin', 20000, '2023-12-22'),
(40, 8, 8, 'Ketewel', 20000, '2023-12-24'),
(41, 16, 8, 'negarea', 20000, '2023-12-24'),
(45, 0, 15, '', 23231, '2023-12-24'),
(59, 8, 11, 'Ketewel', 20000, '2023-12-26'),
(60, 8, 11, 'Ketewel', 20000, '2023-12-28'),
(62, 8, 11, 'Ketewel', 20000, '2023-12-29'),
(63, 8, 11, 'Ketewel', 20000, '2023-12-29'),
(68, 8, 20, 'Ketewel', 10000, '2023-12-29'),
(70, 8, 20, 'Ketewel', 10000, '2023-12-29'),
(71, 19, 22, 'Ketewel', 20000, '2023-12-29'),
(72, 8, 15, 'Ketewel', 23231, '2023-12-29'),
(74, 8, 20, 'Ketewel', 10000, '2023-12-29'),
(75, 8, 20, 'Ketewel', 10000, '2023-12-29'),
(76, 8, 15, 'Ketewel', 23231, '2024-01-01'),
(78, 8, 20, 'Ketewel', 10000, '2024-01-01'),
(79, 8, 13, 'Ketewel', 23231, '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Id_produk` int(11) NOT NULL,
  `Nama_produk` varchar(30) NOT NULL,
  `Foto_produk` varchar(30) NOT NULL,
  `Stok_produk` int(11) NOT NULL,
  `Deskripsi_produk` text NOT NULL,
  `Harga_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id_produk`, `Nama_produk`, `Foto_produk`, `Stok_produk`, `Deskripsi_produk`, `Harga_produk`) VALUES
(13, 'Brownies Klasik Fudgy', '10.jpg', 13, 'Nikmati kenikmatan klasik dari Brownies Fudgy kami. Setiap gigitan adalah perjalanan ke dalam kelezatan cokelat yang kaya. Camilan sempurna untuk memuaskan keinginan manis Anda.', 23231),
(15, 'Salted Caramel Brownies', '12.jpg', 13, 'Tingkatkan pengalaman rasa Anda dengan Brownies Karamel Garam kami. Keseimbangan sempurna antara manis dan asin, brownies ini adalah kenikmatan gurme yang akan merangsang selera Anda', 23231),
(20, 'Nutty Espresso Brownies', '14.jpg', 12, 'Rasakan cita rasa berani dari Brownies Espresso Berbiji kami. Perpaduan harmonis antara espresso pekat dan biji-bijian renyah, brownies ini adalah variasi berkafein dari favorit klasik', 10000),
(22, 'Raspberry Swirl Brownies', '15.jpg', 13, 'Tambahkan kebahagiaan buah ke dalam hari Anda dengan Brownies Pusaran Raspberry kami. Rasa manis-tart dari raspberry menyatu dalam setiap gigitan, menciptakan simfoni rasa yang menyegarkan dan lezat', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Id_transaksi` int(11) NOT NULL,
  `Id_pesanan` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Bukti` blob NOT NULL,
  `Bank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Id_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`Id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `Id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `Id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `Id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
