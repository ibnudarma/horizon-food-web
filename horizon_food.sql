-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2025 at 07:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horizon_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` char(36) COLLATE utf8mb4_general_ci NOT NULL DEFAULT (uuid()),
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('customer','seller') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `email`, `password`, `role`, `created_at`) VALUES
('d6a3af1d-2074-11f0-9a08-3822e22e3cc1', 'seller@example.com', 'horizonfood', 'seller', '2025-04-23 18:57:43'),
('eda30ad6-2074-11f0-9a08-3822e22e3cc1', 'customer@example.com', 'horizonfood', 'customer', '2025-04-23 18:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`, `created_at`) VALUES
(1, 'makanan', '2025-04-23 19:30:02'),
(2, 'minuman', '2025-04-23 19:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int NOT NULL,
  `account_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `account_id`, `nama`, `no_hp`, `created_at`) VALUES
(1, 'eda30ad6-2074-11f0-9a08-3822e22e3cc1', 'Adnan Fauzi', '+6281213042914', '2025-04-23 19:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `customer_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`customer_id`, `menu_id`, `jumlah`) VALUES
(1, 1, 2),
(1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int NOT NULL,
  `seller_id` int NOT NULL,
  `nama_menu` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `category_id` int NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tersedia` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `seller_id`, `nama_menu`, `harga`, `category_id`, `gambar`, `tersedia`, `created_at`) VALUES
(1, 1, 'Nasi Goreng', 12000, 1, NULL, 1, '2025-04-23 19:36:20'),
(2, 1, 'Es Teh Manis', 5000, 2, NULL, 1, '2025-04-23 19:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` char(36) COLLATE utf8mb4_general_ci NOT NULL DEFAULT (uuid()),
  `pesanan_id` int NOT NULL,
  `jumlah_pembayaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL,
  `customer_id` int NOT NULL,
  `seller_id` int NOT NULL,
  `status` enum('pending','diproses','selesai','dibatalkan') COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `total` int NOT NULL,
  `catatan` text COLLATE utf8mb4_general_ci,
  `waktu_pesanan` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `customer_id`, `seller_id`, `status`, `total`, `catatan`, `waktu_pesanan`) VALUES
(1, 1, 1, 'pending', 34000, 'nasi goreng pedes sedeng dan es teh manis di pisah es nya', '2025-04-23 21:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_menu`
--

CREATE TABLE `pesanan_menu` (
  `pesanan_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `nama_menu` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_menu` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan_menu`
--

INSERT INTO `pesanan_menu` (`pesanan_id`, `menu_id`, `nama_menu`, `harga_menu`, `jumlah`) VALUES
(1, 1, 'Nasi Goreng', 12000, 2),
(1, 2, 'Es Teh Manis', 5000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id_seller` int NOT NULL,
  `account_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kantin` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `logo_kantin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi_kantin` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id_seller`, `account_id`, `nama`, `nama_kantin`, `logo_kantin`, `deskripsi_kantin`, `created_at`) VALUES
(1, 'd6a3af1d-2074-11f0-9a08-3822e22e3cc1', 'DEDIH', 'KANTIN KOSWARA', NULL, NULL, '2025-04-23 19:17:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `account_id` (`account_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fk_menu_category` (`category_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_pesanan_customer` (`customer_id`),
  ADD KEY `fk_pesanan_seller` (`seller_id`);

--
-- Indexes for table `pesanan_menu`
--
ALTER TABLE `pesanan_menu`
  ADD PRIMARY KEY (`pesanan_id`,`menu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id_seller`),
  ADD UNIQUE KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id_seller` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`id_account`) ON DELETE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pesanan_seller` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id_seller`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan_menu`
--
ALTER TABLE `pesanan_menu`
  ADD CONSTRAINT `pesanan_menu_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `pesanan_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `fk_seller_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`id_account`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
