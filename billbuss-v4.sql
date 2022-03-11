-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 11:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billbuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` text NOT NULL,
  `admin` text NOT NULL,
  `stock_id` text NOT NULL,
  `type` varchar(64) NOT NULL,
  `model` varchar(64) NOT NULL,
  `barcode` text NOT NULL,
  `SKU` varchar(50) NOT NULL,
  `HSN` varchar(50) NOT NULL,
  `Unit` text NOT NULL,
  `GST` text NOT NULL,
  `S_Unit_Price` text NOT NULL,
  `P_Unit_Price` text NOT NULL,
  `Gross` text NOT NULL,
  `Tax` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `admin`, `stock_id`, `type`, `model`, `barcode`, `SKU`, `HSN`, `Unit`, `GST`, `S_Unit_Price`, `P_Unit_Price`, `Gross`, `Tax`) VALUES
(20, 'Shoess new news', 'active', 'khanzaidan786@gmail.com', '5', 'Service', 'World Worrld', 'ABC123', '55', 'ss', 'Select Unit', '24', '', '100', '124', '24'),
(21, 'Iphone 128GB', 'active', 'khanzaidan786@gmail.com', '5', 'Service', 'World Worrld', 'APPLE22', '55', 'ss', 'Select Unit', '50', '', '12500', '12550', '50');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(64) NOT NULL,
  `coupon_type` varchar(64) NOT NULL,
  `coupon_value` varchar(64) NOT NULL,
  `start_date` varchar(64) NOT NULL,
  `end_date` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `coupon_type`, `coupon_value`, `start_date`, `end_date`, `status`, `admin`) VALUES
(5, 'ABC123', 'percentage', '1000', '', '', 'active', 'khanzaidan786@gmail.com'),
(6, 'C11', 'Fixed', '100', '2022-03-10', '', 'active', 'khanzaidan786@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `title` varchar(160) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `title`, `symbol`, `status`) VALUES
(4, 'Crypto', 'Doge', 'active'),
(5, 'Percentage', '%', 'active'),
(6, 'Dollar', '$', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(166) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `state` varchar(64) NOT NULL,
  `district` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `state`, `district`, `address`, `admin`) VALUES
(1, 'Rohan', 'Sidhu', 'sidhuroh@outlook.com', '8107296654', 'Rajasthan', 'Jaipur', 'D-1002, Rosewood Apartments, Sirsi Road', 'khanzaidan786@gmail.com'),
(2, 'Roohi', 'Sidhu', 'sidhuroh@outlook.com', '8888888888', 'Rajasthan', 'Jaipur', 'D-1002, Rosewood Apartments, Sirsi Road', 'zee@outlook.com'),
(3, 'Roohi', 'Sidhu', 'sidhuroh@outlook.com', '8888888888', 'Rajasthan', 'Jaipur', 'Rosewood Apartments, D-1002', 'khanzaidan786@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `percent` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gst`
--

INSERT INTO `gst` (`id`, `title`, `percent`, `status`) VALUES
(1, 'GST 10%', '10.00', 'active'),
(3, 'GST 6%', '6.00', 'active'),
(4, '10', '10', 'active'),
(5, '10', '10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_rand` varchar(64) NOT NULL,
  `invoice_for` varchar(164) NOT NULL,
  `invoice_date` varchar(64) NOT NULL,
  `admin` text NOT NULL,
  `saved` varchar(10) NOT NULL,
  `discount_amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_rand`, `invoice_for`, `invoice_date`, `admin`, `saved`, `discount_amt`) VALUES
(19, '969516', '3', '07-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(20, '730146', '', '07-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(22, '068432', '', '07-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(23, '502486', '', '07-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(24, '507587', '', '07-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(25, '086973', '', '07-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(26, '546848', '', '08-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(27, '254366', '', '08-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(29, '463720', '', '08-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(30, '787658', '', '08-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(31, '320946', '', '08-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(32, '147617', '', '08-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(33, '087576', '1', '08-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(34, '771660', '', '08-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(35, '084321', '', '08-03-2022', 'khanzaidan786@gmail.com', '0', 0),
(36, '991786', '3', '09-03-2022', 'khanzaidan786@gmail.com', '0', 1000),
(37, '423439', '3', '09-03-2022', 'khanzaidan786@gmail.com', '0', 10);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item` text NOT NULL,
  `qty` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `invoice_id` text NOT NULL,
  `admin` text NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item`, `qty`, `price`, `discount`, `tax`, `amount`, `invoice_id`, `admin`, `bid`) VALUES
(49, 'Mobile', '1', '13000', '5%', '5%', '14000', '068432', 'khanzaidan786@gmail.com', 0),
(50, 'Shoess new news', '1', '100', '5', '24', '124', '086973', 'khanzaidan786@gmail.com', 0),
(51, 'Iphone 128GB', '1', '12500', '%', '50', '12550', '086973', 'khanzaidan786@gmail.com', 0),
(52, 'Shoess new news', '12', '100', '5', '24', '124', '546848', 'khanzaidan786@gmail.com', 0),
(53, 'Shoess new news', '1', '100', '%', '24', '124', '546848', 'khanzaidan786@gmail.com', 0),
(54, 'Iphone 128GB', '10', '100', '5', '50', '1050', '254366', 'khanzaidan786@gmail.com', 0),
(55, 'Iphone 128GB', '1', '12500', '5', '50', '12550', '787658', 'khanzaidan786@gmail.com', 0),
(59, 'Iphone 128GB', '1', '100', '5', '24', '124', '841871', 'khanzaidan786@gmail.com', 0),
(60, 'Shoess new news', '11', '100', '%', '24', '1124', '841871', 'khanzaidan786@gmail.com', 0),
(89, 'Shoess new news', '10', '100', '5', '24', '1240', '087576', 'khanzaidan786@gmail.com', 0),
(90, 'Shoess new news', '1', '100', '%', '24', '124', '087576', 'khanzaidan786@gmail.com', 0),
(98, 'Shoess new news', '10', '100', '5', '30', '1300', '969516', 'khanzaidan786@gmail.com', 0),
(99, 'Shoess new news', '1', '100', '%', '24', '124', '969516', 'khanzaidan786@gmail.com', 0),
(100, 'Iphone 128GB', '1', '12500', '', '50', '12550', '969516', 'khanzaidan786@gmail.com', 0),
(101, 'Shoess new news', '1', '100', '', '24', '124', '969516', 'khanzaidan786@gmail.com', 0),
(102, 'Shoess new news', '1', '100', '5', '24', '124', '771660', 'khanzaidan786@gmail.com', 0),
(107, 'Iphone 128GB', '10', '125000', '5', '500', '125500', '991786', 'khanzaidan786@gmail.com', 21),
(109, 'Shoess new news', '10', '1000', '5', '240', '1240', '423439', 'khanzaidan786@gmail.com', 20);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `status`) VALUES
(1, 'Jaipur', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `status` text NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `status`, `admin`) VALUES
(3, 'Jacket', 'active', 'sidhuroh@gmail.com'),
(5, 'Jeans', 'active', 'khanzaidan786@gmail.com'),
(6, 'Shoes', 'active', 'quicksoftssc@gmail.com'),
(7, 'laptop', 'active', 'khanzaidan786@gmail.com'),
(9, 'Mobile', 'active', 'khanzaidan786@gmail.com'),
(11, 'yyr', 'active', 'khanzaidan786@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `store_name` varchar(64) NOT NULL,
  `store_desc` text NOT NULL,
  `status` text NOT NULL,
  `store_by` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `store_desc`, `status`, `store_by`) VALUES
(1, 'Dominoses', 'Great Pizza By Dominos', 'active', 'sidhuroh@gmail.com'),
(2, 'Rohan Sidhu', 'World', 'active', 'sidhuroh@gmail.com'),
(4, 'Rohan Sidhu', 'Vaishali Nagar, Jaipur, Rajasthan, Jaipur, Jaipur', 'inactive', 'sidhuroh@gmail.com'),
(5, 'WTP', 'GT Road, Jaipur Rajasthan', 'active', 'sidhuroh@gmail.com'),
(6, 'AadharMarket', 'Sirsi Road, Pachyawala, Jaipur, Rajasthan', 'active', 'sidhuroh@gmail.com'),
(8, 'BigBazaar', 'Vaishali', 'active', 'zee@outlook.com'),
(9, 'WTP2', 'Jaiour', 'active', 'zee@outlook.com'),
(10, 'Levis', 'Jaipur Rajasthan', 'active', 'khanzaidan786@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `percent` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `title`, `percent`, `status`) VALUES
(1, '0 % Tax', '10.00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `symbol` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `symbol`, `status`) VALUES
(2, 'MILIMETER', 'ML', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(166) NOT NULL,
  `email` varchar(166) NOT NULL,
  `password` text NOT NULL,
  `logo_img` varchar(166) NOT NULL,
  `user_type` varchar(64) NOT NULL,
  `added_on` text NOT NULL,
  `added_to` text NOT NULL,
  `store_count` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `phone` text NOT NULL,
  `author` varchar(64) NOT NULL,
  `administrator` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `logo_img`, `user_type`, `added_on`, `added_to`, `store_count`, `status`, `phone`, `author`, `administrator`) VALUES
(13, 'veekshith', 'digitalveekshith@gmail.com', 'Veekshith@123', '', 'superadmin', '', '', '50', 'active', '8107296654', '', ''),
(14, 'Rohan Sidhu', 'sidhuroh@gmail.com', 'sidhuroh@123', '', 'storeadmin', '', '', '15', 'active', '8107296654', '', ''),
(15, 'veekshith', '', 'Rohan@y0809', '', 'storeadmin', '2021-09-09', '', '10', 'inactive', '8107296654', '', ''),
(16, 'veekshith', '', 'Rohan', '', 'storeadmin', '2021-09-09', '', '10', '', '8107296654', '', ''),
(17, 'Rohan', 'sidhuroh@outlook.com', 'Rohan@y0809', '', 'storeadmin', '2021-09-09', '', '10', '', '8107296654', '', ''),
(18, 'Yashika', 'yashishekhawats01@gmail.com', 'Rohan@y0809', '', 'storeadmin', '2021-09-09', '', '10', '', '7725967457', '', ''),
(20, 'Akash', 'Kumar@dominoses.com', 'Rohan@123', '', 'substoreadmin', '2021-09-30', '', '10', 'active', '9876543210', 'WTP', 'sidhuroh@gmail.com'),
(21, 'Rohan Motihar', 'quicksoftssc@gmail.com', 'Rohan', '', 'storeadmin', '2021-11-23', '', '50', 'active', '09545215154', '', 'digitalveekshith@gmail.com'),
(22, 'Final', 'sidhurohan@gmail.com', 'Rohan', '', 'storeadmin', '2021-11-23', '', '', 'active', '1234567890', 'AadharMarket', 'sidhuroh@gmail.com'),
(23, 'Bajre', 'sidhurohanna@gmail.com', 'Rohan', '', 'substoreadmin', '2021-11-23', '', '', 'active', '1234567890', 'WTP', 'sidhuroh@gmail.com'),
(24, 'Rohan', 'info@gmail.com', 'Rohan@123', '', 'substoreadmin', '2021-11-25', '', '', 'active', '8107296654', 'BIG', 'sidhuroh@outlook.com'),
(26, 'Zaidan khan', 'khanzaidan786@gmail.com', 'Zaidan@123', 'c0ZAoKpTuszMOYN/logo.jpeg', 'storeadmin', '', '', '', 'active', '7727084375', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
