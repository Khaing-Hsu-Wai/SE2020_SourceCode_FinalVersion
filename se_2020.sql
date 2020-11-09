-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2020 at 06:25 AM
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
(4, 'COCOOIL', '419538481.jpg', 50, 10000, 1, 'coco'),
(5, 'Slipper', '143447724.jpg', 100, 15000, 2, 'color'),
(6, 'Dryer', '1921451681.jpg', 150, 8000, 2, 'White'),
(7, 'Headphone', '1383573989.jpg', 30, 25000, 2, 'Color'),
(8, 'Mascara', '1093836972.jpg', 50, 6000, 1, 'One'),
(9, 'Bag', '1860974322.jpg', 20, 25000, 2, 'Two color'),
(10, 'Hand Bag', '501912770.jpg', 30, 10000, 2, 'one'),
(11, 'Watch', '35793238.jpg', 15, 20000, 1, 'one color'),
(12, 'Sneaker', '714862616.jpg', 55, 35000, 2, 'Two Color'),
(13, 'Lipstick', '2116109644.jpg', 5, 7500, 1, 'one'),
(14, 'Sunglass', '1106606300.jpg', 80, 45000, 2, 'des'),
(15, 'Sneaker', '1730555399.jpg', 35, 15000, 2, '2'),
(17, 'Phone', '1658572552.jpg', 50, 600000, 0, '-');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
