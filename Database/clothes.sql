-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 12:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_cart`
--

CREATE TABLE `add_cart` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(100) NOT NULL,
  `quantitys` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_cart`
--

INSERT INTO `add_cart` (`id`, `transaction_number`, `quantitys`, `product_id`, `size`, `price`, `user_id`) VALUES
(28, '1631204625', 1, 4, 0, 789, 2),
(80, '1631204625', 1, 2, 0, 789, 2),
(81, '1631204625', 2, 3, 0, 789, 2),
(83, '1631204625', 5, 5, 0, 555, 2),
(84, '1631187007', 1, 3, 0, 789, 1),
(85, '1631187007', 1, 1, 0, 789, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `menu_id`, `category_name`) VALUES
(1, 1, 'Shirt'),
(2, 1, 'T-Shirt'),
(3, 1, 'Long-Shirts'),
(4, 1, 'Ladies-Shorts'),
(5, 1, 'Ladies-Pant'),
(6, 2, 'Kurta'),
(7, 2, 'Suit'),
(8, 2, 'Belt'),
(9, 2, 'Watches'),
(10, 2, 'Men-Pants');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `t_price` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `f_name` varchar(150) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `p_address` varchar(250) NOT NULL,
  `o_address` varchar(250) NOT NULL,
  `country` varchar(100) NOT NULL,
  `p_code` varchar(20) NOT NULL,
  `p_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `transaction_number`, `user_id`, `shipping`, `t_price`, `email`, `f_name`, `l_name`, `p_address`, `o_address`, `country`, `p_code`, `p_number`) VALUES
(1, '0', 2, 0, 0, 'matrrepviztole094@gmail.com', 'Rana', 'Zubair', 'CHak 209 R.B', 'Ads', 'Pakistan', '38000', '090078601'),
(2, '0', 2, 0, 0, 'matrrepviztole094@gmail.com', 'Rana', 'Zubair', 'CHak 209 R.B', 'Ads', 'Pakistan', '38000', '090078601666666'),
(3, '0', 2, 0, 0, '', 'Rana', 'Zubair', 'as', 'sss', 'Pakistan', '38000', '090078601'),
(4, '0', 1, 0, 0, '', 'Rana', 'Zubair', 'CHak 209 R.B', '', 'Pakistan', '38000', '090078601'),
(5, '0', 0, 0, 0, '', '', '', '', '', '', '', ''),
(6, '0', 1, 0, 0, '', '', '', '', '', '', '', ''),
(7, '0', 1, 0, 0, '', '', '', '', '', '', '', ''),
(8, '0', 0, 200, 789, '', '', '', '', '', '', '', ''),
(9, '0', 0, 0, 400, '1578', '', '', '', '', '', '', ''),
(10, '0', 0, 0, 400, '1578', '', '', '', '', '', '', ''),
(11, '0', 0, 0, 400, '1578', '', '', '', '', '', '', ''),
(12, '0', 0, 0, 400, '1578', '', '', '', '', '', '', ''),
(13, '0', 0, 0, 400, '1578', '', '', '', '', '', '', ''),
(14, '0', 0, 0, 400, '1578', '', '', '', '', '', '', ''),
(15, '0', 0, 0, 400, '1578', '', '', '', '', '', '', ''),
(16, '0', 0, 0, 400, '1578', '', '', '', '', '', '', ''),
(17, '0', 0, 400, 1578, 'admin@ggmaic.com', '', '', '', '', '', '', ''),
(18, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(19, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(20, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(21, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(22, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(23, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(24, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(25, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(26, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(27, '0', 0, 400, 1578, '', '', '', '', '', '', '', ''),
(28, '0', 0, 400, 1578, 'jamal@yahoo.com', 'Rana', 'Zubair', 'CHak 209 R.B', '', 'Pakistan', '38000', '090078601'),
(29, '1631186429', 0, 400, 1578, 'jamal@yahoo.com', 'Rana', 'Zubair', 'CHak 209 R.B', '', 'Pakistan', '38000', '090078601'),
(30, '1631186445', 0, 400, 1578, 'jamal@yahoo.com', 'Rana', 'Zubair', 'CHak 209 R.B', '', 'Pakistan', '38000', '090078601'),
(31, '1631187007', 1, 400, 1578, 'jamal@yahoo.com', 'Rana', 'Zubair', 'CHak 209 R.B', '', 'Pakistan', '38000', '090078601'),
(32, '1631204625', 2, 1800, 5931, '', '', '', 'Chak #109 G.B', '', '', '', '0300000000');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'Girls'),
(2, 'Boys');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` varchar(255) NOT NULL,
  `length` varchar(5) NOT NULL,
  `color` varchar(50) NOT NULL,
  `detail` varchar(2000) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `img2` varchar(200) NOT NULL,
  `available_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `menu_id`, `title`, `price`, `length`, `color`, `detail`, `img1`, `img2`, `available_stock`) VALUES
(1, 1, 1, 'Dress', '789', '12', 'Black', 'White Shirt\r\nBlack Pant\r\nRed Tie\r\n', '1.jpg', '2.jpg', 10),
(2, 2, 1, 'Ladies', '789', '12', 'Black', 'Pkfs dj', '3.jpg', '4.jpg', 10),
(3, 3, 1, 'Ladies', '789', '12', 'Black', 'Pkfs dj', '5.jpg', '6.jpg', 10),
(4, 6, 2, 'Boy', '789', '78', 'white', 'shdkfj', 'boy1.jpg', 'boy2.jpg', 2),
(5, 1, 1, 'Suit', '555', '60', 'Red', 'Red Shirt\r\nWhite Pant\r\nTie', '9.jpg', '10.jpg', 10),
(6, 1, 1, 'Suit', '555', '60', 'Red', 'Red Shirt\r\nWhite Pant\r\nTie', '7.jpg', '8.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`id`, `product_id`, `img`) VALUES
(1, 1, '9.jpg'),
(2, 1, '10.jpg'),
(3, 3, 'b55.jpg'),
(4, 3, 'bb66.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmpass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `first_name`, `last_name`, `phone_number`, `address`, `email`, `password`, `confirmpass`) VALUES
(1, '', '', '', '', 'ali@gmail.com', 'abc@1', ''),
(2, 'Jamal', 'Khan', '090078601', 'CHak 209 R.B', 'jamal@yahoo.com', 'jamal123', ''),
(3, '', '', '', '', '', '123455', ''),
(4, '', '', '', '', '', '12345', ''),
(5, '', '', '', '', '', 'asdf', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_cart`
--
ALTER TABLE `add_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_cart`
--
ALTER TABLE `add_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
