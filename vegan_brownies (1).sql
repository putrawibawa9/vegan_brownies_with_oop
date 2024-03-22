-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 07:04 PM
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
(1, 'nia', '123'),
(2, 'maya@gmail.com', '1234'),
(3, 'maya', '1234');

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
(8, '123', 'nia', 0, 'Ketewel'),
(9, '1234', 'maya', 0, 'maya@gmail.com'),
(10, '123', 'agus', NULL, 'Ketewel');

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
(70, 8, 20, 'Ketewel', 10000, '2023-12-29'),
(71, 19, 22, 'Ketewel', 20000, '2023-12-29'),
(72, 8, 15, 'Ketewel', 23231, '2023-12-29'),
(74, 8, 20, 'Ketewel', 10000, '2023-12-29'),
(75, 8, 20, 'Ketewel', 10000, '2023-12-29'),
(76, 8, 15, 'Ketewel', 23231, '2024-01-01'),
(78, 8, 20, 'Ketewel', 10000, '2024-01-01'),
(79, 8, 13, 'Ketewel', 23231, '2024-01-02'),
(80, 9, 13, 'maya@gmail.com', 25000, '2024-03-01'),
(81, 9, 13, 'maya@gmail.com', 25000, '2024-03-02'),
(82, 9, 13, 'maya@gmail.com', 25000, '2024-03-13'),
(83, 9, 13, 'maya@gmail.com', 25000, '2024-03-13'),
(84, 8, 13, 'Ketewel', 25000, '2024-03-22'),
(85, 8, 13, 'Ketewel', 25000, '2024-03-22'),
(86, 9, 15, 'maya@gmail.com', 23231, '2024-03-22');

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
(13, 'Brownies Klasik Fudgy', '10.jpg', 13, 'Nikmati kenikmatan klasik dari Brownies Fudgy kami. Setiap gigitan adalah perjalanan ke dalam kelezatan cokelat yang kaya. Camilan sempurna untuk memuaskan keinginan manis Anda.', 25000),
(15, 'Salted Caramel Brownies', '12.jpg', 13, 'Tingkatkan pengalaman rasa Anda dengan Brownies Karamel Garam kami. Keseimbangan sempurna antara manis dan asin, brownies ini adalah kenikmatan gurme yang akan merangsang selera Anda', 23231),
(20, 'Nutty Espresso Brownies', '14.jpg', 12, 'Rasakan cita rasa berani dari Brownies Espresso Berbiji kami. Perpaduan harmonis antara espresso pekat dan biji-bijian renyah, brownies ini adalah variasi berkafein dari favorit klasik', 10000),
(22, 'Raspberry Swirl Brownies', '15.jpg', 13, 'Tambahkan kebahagiaan buah ke dalam hari Anda dengan Brownies Pusaran Raspberry kami. Rasa manis-tart dari raspberry menyatu dalam setiap gigitan, menciptakan simfoni rasa yang menyegarkan dan lezat', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `kode_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(70) NOT NULL,
  `merk_mobil` varchar(70) NOT NULL,
  `cc_mobil` int(11) NOT NULL,
  `warna_mobil` varchar(50) NOT NULL,
  `harga_mobil` int(11) NOT NULL,
  `tanggal_launching_mobil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`kode_mobil`, `nama_mobil`, `merk_mobil`, `cc_mobil`, `warna_mobil`, `harga_mobil`, `tanggal_launching_mobil`) VALUES
(6, 'rush', 'toyota', 200, 'hijau', 30000, '2024-03-14'),
(9, 'toyota', '200', 0, '100000', 2024, '0000-00-00'),
(10, 'toyota', '200', 0, '30000', 2024, '0000-00-00');

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
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`kode_mobil`);

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
  MODIFY `Id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `Id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `Id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `kode_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
