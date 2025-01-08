-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 02:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inbentadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbenta_users`
--

CREATE TABLE `inbenta_users` (
  `id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(255) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inbenta_users`
--

INSERT INTO `inbenta_users` (`id`, `store_name`, `username`, `email`, `password`, `reg_date`) VALUES
(1, 'Fiona&#39;s Store', 'fionayoung', 'fionayoung@gmail.com', '$2y$10$U9EU7/ObeYA14a/cD7CT..hj9pA34QV6zOZdpCYgKVTuMUGBOTVn.', '0000-00-00'),
(2, 'Renyel&#39;s Moto Parts', 'renyel', 'renyel@gmail.com', '$2y$10$z.yw6dnb2ljj0pAKuaSIpe478LkxzKwxQ8Yh2TrENfB7.uJULA4s.', '0000-00-00'),
(3, 'Aori', 'aori', 'aori@gmail.com', '$2y$10$OxThXxmcPICxFESTAkuTL.0ldTbQOaXeIdYBZt8Z/aJgQGfoC7rLK', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_aori`
--

CREATE TABLE `inventory_aori` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_availability` varchar(14) NOT NULL,
  `product_price_1` decimal(6,2) DEFAULT NULL,
  `product_price_1_per` varchar(14) DEFAULT NULL,
  `product_price_2` decimal(6,2) DEFAULT NULL,
  `product_price_2_per` varchar(14) DEFAULT NULL,
  `product_price_3` decimal(6,2) DEFAULT NULL,
  `product_price_3_per` varchar(14) DEFAULT NULL,
  `product_add_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_aori`
--

INSERT INTO `inventory_aori` (`id`, `product_name`, `product_availability`, `product_price_1`, `product_price_1_per`, `product_price_2`, `product_price_2_per`, `product_price_3`, `product_price_3_per`, `product_add_date`) VALUES
(1, 'What', 'not_available', 232.00, '/piece', 3212.00, '/dozen', 123.00, '/case', '2025-01-08 21:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_fionayoung`
--

CREATE TABLE `inventory_fionayoung` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `is_available` varchar(14) DEFAULT NULL,
  `product_price_per_piece` decimal(6,2) DEFAULT NULL,
  `per_piece` varchar(12) DEFAULT NULL,
  `product_price_per_dozen` decimal(6,2) DEFAULT NULL,
  `per_dozen` varchar(12) DEFAULT NULL,
  `product_price_per_box` decimal(6,2) DEFAULT NULL,
  `per_box` varchar(12) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_fionayoung`
--

INSERT INTO `inventory_fionayoung` (`id`, `product_name`, `is_available`, `product_price_per_piece`, `per_piece`, `product_price_per_dozen`, `per_dozen`, `product_price_per_box`, `per_box`, `date_added`) VALUES
(1, 'Milo', 'available', 0.00, ' ', 0.00, ' ', 0.00, ' ', '2023-05-25 21:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_renyel`
--

CREATE TABLE `inventory_renyel` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `is_available` varchar(14) DEFAULT NULL,
  `product_price_per_piece` decimal(6,2) DEFAULT NULL,
  `per_piece` varchar(12) DEFAULT NULL,
  `product_price_per_dozen` decimal(6,2) DEFAULT NULL,
  `per_dozen` varchar(12) DEFAULT NULL,
  `product_price_per_box` decimal(6,2) DEFAULT NULL,
  `per_box` varchar(12) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_renyel`
--

INSERT INTO `inventory_renyel` (`id`, `product_name`, `is_available`, `product_price_per_piece`, `per_piece`, `product_price_per_dozen`, `per_dozen`, `product_price_per_box`, `per_box`, `date_added`) VALUES
(1, 'dawdas', 'available', 0.00, ' ', 0.00, ' ', 0.00, ' ', '2023-05-25 17:54:06'),
(2, 'dasda', 'available', 0.00, ' ', 0.00, ' ', 0.00, ' ', '2023-05-25 17:54:14'),
(3, 'what', 'available', 0.00, ' ', 0.00, ' ', 0.00, ' ', '2023-05-25 17:54:19'),
(4, 'dawdadadsa', 'available', 0.00, ' ', 0.00, ' ', 0.00, ' ', '2023-05-25 17:54:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbenta_users`
--
ALTER TABLE `inbenta_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `inventory_aori`
--
ALTER TABLE `inventory_aori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `inventory_fionayoung`
--
ALTER TABLE `inventory_fionayoung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `inventory_renyel`
--
ALTER TABLE `inventory_renyel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbenta_users`
--
ALTER TABLE `inbenta_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory_aori`
--
ALTER TABLE `inventory_aori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_fionayoung`
--
ALTER TABLE `inventory_fionayoung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_renyel`
--
ALTER TABLE `inventory_renyel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
