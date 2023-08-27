-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 04:37 AM
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
-- Database: `ukom`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `nomor_identitas` varchar(32) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `durasi_menginap` int(11) NOT NULL,
  `termasuk_breakfast` tinyint(1) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama_pemesan`, `jenis_kelamin`, `nomor_identitas`, `id_produk`, `tanggal_pesan`, `durasi_menginap`, `termasuk_breakfast`, `total_bayar`, `created_at`, `updated_at`) VALUES
(1, 'aa', 'L', '1234567890123456', 1, '2023-08-26', 1, 0, 0, '2023-08-26 03:28:32', '2023-08-26 03:28:32'),
(2, 'praba', 'L', '1234567890123456', 3, '2023-08-31', 4, 0, 0, '2023-08-26 04:01:37', '2023-08-26 04:01:37'),
(3, 'veda', 'L', '0987654321098765', 3, '2023-08-16', 4, 1, 0, '2023-08-26 04:05:34', '2023-08-26 04:05:34'),
(4, 'juga', 'L', '1234567890123456', 3, '2023-08-30', 7, 1, 0, '2023-08-26 04:09:30', '2023-08-26 04:09:30'),
(5, 'zidan', 'L', '1234567890123456', 3, '2023-08-31', 10, 1, 15000000, '2023-08-26 04:12:19', '2023-08-26 04:12:19'),
(6, 'xxjxjx', 'L', '1234567890123456', 3, '2023-08-24', 8, 1, 10880000, '2023-08-26 04:13:45', '2023-08-26 04:13:45'),
(7, 'Budiman', 'P', '7777444422221111', 3, '2023-08-31', 12, 1, 16280000, '2023-08-27 02:24:35', '2023-08-27 02:24:35'),
(8, 'Mukidi', 'P', '9191353577774444', 2, '2023-08-29', 1, 0, 1000000, '2023-08-27 02:26:45', '2023-08-27 02:26:45'),
(9, 'Bejo', 'L', '5566223388990000', 1, '2023-08-31', 3, 1, 1580000, '2023-08-27 02:28:00', '2023-08-27 02:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(32) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar_produk` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `gambar_produk`, `created_at`, `updated_at`) VALUES
(1, 'Standard Room', 500000, 'img/standard-room-780x480.jpg', '2023-08-26 02:48:50', '2023-08-26 02:48:50'),
(2, 'Deluxe Room', 1000000, 'img/deluxe-room-780x480.jpg', '2023-08-26 02:49:46', '2023-08-26 02:49:46'),
(3, 'Executive Room', 1500000, 'img/executive-room-780x480.jpg', '2023-08-26 02:50:34', '2023-08-26 02:50:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
