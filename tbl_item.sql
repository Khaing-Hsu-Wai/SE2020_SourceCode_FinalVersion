-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 03:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(12) NOT NULL,
  `price` int(12) NOT NULL,
  `warehouse_id` int(12) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `name`, `image`, `stock`, `price`, `warehouse_id`, `description`) VALUES
(22, 'Girl Wear', '1479051796.jpg', 20, 15000, 1, 'Girl'),
(23, 'Sunglass', '2041987426.jpg', 100, 15000, 1, 'Boy or Girl'),
(24, 'Handbag', '1270446629.jpg', 1, 10000, 2, 'Blue Color'),
(25, 'Slipper Shoe', '1555765727.jpg', 2, 1000, 1, 'All Color'),
(26, 'Hair Dryer', '1998244613.jpg', 10, 13000, 1, 'Only One Color'),
(27, 'Mascara', '2061974519.jpg', 10, 12000, 1, 'Girl'),
(28, 'Lipstick', '556231706.jpg', 10, 12000, 2, 'Girl'),
(29, 'Phone', '684559392.jpg', 12, 350000, 1, 'OPPO'),
(30, 'COCOOIL', '2027647802.jpg', 15, 1000, 1, 'Oil'),
(31, 'Sneaker', '86898740.jpg', 23, 25000, 1, 'Warehouse'),
(32, 'Router', '1897571171.jpg', 12, 78900, 1, 'Sim Router');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
