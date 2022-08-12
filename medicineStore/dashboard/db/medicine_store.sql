-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 07:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicine_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1 for active,\r\n0 for deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'aabb2100033f0352fe7458e412495148', 1),
(2, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 0);

-- --------------------------------------------------------

--
-- Table structure for table `allproducts`
--

CREATE TABLE `allproducts` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `old_price` varchar(11) DEFAULT NULL,
  `new_price` varchar(100) NOT NULL,
  `items` varchar(11) NOT NULL,
  `sold_out` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allproducts`
--

INSERT INTO `allproducts` (`id`, `product_name`, `productId`, `cat_id`, `product_title`, `product_image`, `old_price`, `new_price`, `items`, `sold_out`, `status`) VALUES
(52, 'Napa Shirap (60 Ml)', 'NapaShirap(60ml)_1659966836', 37, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '62f11574de562_1659966836.jpeg', '120', '80', '200', '197', 1),
(53, 'Test', 'Test_1659966904', 36, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '62f115b89ef12_1659966904.jpg', '100', '40', '', '', 0),
(54, 'Thermometer', 'thermometer_1659966942', 29, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '62f115dec3731_1659966942.jpg', '', '40', '50', '30', 1),
(55, 'Rabeca (20 Mg)', 'Rabeca(20mg)_1659968196', 37, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '62f11ac48fe3a_1659968196.jpg', '', '40', '150', '', 1),
(56, 'Test', 'Test_1660112458', 37, '', '62f34e4a8d683_1660112458.jpg', '', '50', '50', '', 0),
(57, 'Test', 'Test_1660112511', 37, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '62f34e7fee236_1660112511.jpg', '', '', '200', '', 0),
(58, 'Atorvastatin', 'Atorvastatin_1660225581', 37, '', '62f5082d9ff05_1660225581.jpg', '', '500', '100', '', 1),
(59, 'Euthyrox', 'Euthyrox_1660225625', 37, '', '62f508591152f_1660225625.JPG', '', '300', '500', '', 1),
(60, 'Losartan', 'Losartan_1660226700', 37, '', '62f50c8c8e75b_1660226700.jpg', '', '500', '500', '', 1),
(61, 'Gabapentin', 'Gabapentin_1660226783', 37, '', '62f50cdf0ddb7_1660226783.jpg', '280', '260', '150', '', 1),
(62, 'Hydrochlorothiazide', 'Hydrochlorothiazide_1660226905', 37, '', '62f50d5901a35_1660226905.jpg', '420', '400', '300', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`) VALUES
(25, 'Homeopathy', 0),
(26, 'Vitamins And Suppliments', 0),
(27, 'Ayurveda', 0),
(28, 'Health Food & Drinks', 0),
(29, 'Healthcare devices', 1),
(30, 'Skincare', 0),
(37, 'Medicine', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customerId` varchar(255) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customerId`, `customer_email`, `password`, `phone`, `address`, `status`) VALUES
(3, 'Mark', 'Mark1660155865', 'Customer@help.com', '1adbb3178591fd5bb0c248518f39bf6d', '0154878515', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', 1),
(8, 'Rahul', 'Rahul1660205345', 'rahul@yahoo.com', '1adbb3178591fd5bb0c248518f39bf6d', '015674591542', '04,Gulshan,Dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `products` text NOT NULL,
  `address` text NOT NULL,
  `total` varchar(10) NOT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `email`, `phone`, `products`, `address`, `total`, `payment_status`, `status`) VALUES
(1, 'Mark', 'Customer@help.com', '0154878515', 'Rabeca (20 Mg)(3)Thermometer(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '210', 1, 1),
(2, 'Mark', 'Customer@help.com', '0154878515', 'Rabeca (20 Mg)(3)Thermometer(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '210', 1, 1),
(3, 'Mark', 'Customer@help.com', '0154878515', 'Rabeca (20 Mg)(3)Thermometer(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '210', 1, 1),
(4, 'Mark', 'Customer@help.com', '0154878515', 'Rabeca (20 Mg)(3)Thermometer(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '210', 1, 1),
(5, 'Mark', 'Customer@help.com', '0154878515', 'Napa Shirap (60 Ml)(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '130', 1, 1),
(6, 'Mark', 'Customer@help.com', '0154878515', 'Napa Shirap (60 Ml)(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '130', 1, 1),
(7, 'Mark', 'Customer@help.com', '0154878515', 'Rabeca (20 Mg)(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '90', 1, 1),
(8, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)Euthyrox(3)Thermometer(5)Atorvastatin(5)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '4150', 1, 1),
(9, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)Euthyrox(3)Thermometer(5)Atorvastatin(5)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '4150', 1, 1),
(10, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)Euthyrox(3)Thermometer(5)Atorvastatin(5)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '4150', 1, 1),
(11, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)Euthyrox(3)Thermometer(5)Atorvastatin(5)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '4150', 1, 1),
(12, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)Euthyrox(3)Thermometer(5)Atorvastatin(5)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '4150', 1, 1),
(13, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)Euthyrox(3)Thermometer(5)Atorvastatin(5)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '4150', 1, 1),
(14, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)Euthyrox(3)Thermometer(5)Atorvastatin(5)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '4150', 1, 1),
(15, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)Euthyrox(3)Thermometer(5)Atorvastatin(5)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '4150', 1, 1),
(16, 'Mark', 'Customer@help.com', '0154878515', '', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '', 1, 1),
(17, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '550', 1, 1),
(18, 'Mark', 'Customer@help.com', '0154878515', '', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '', 1, 1),
(19, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '550', 1, 1),
(20, 'Mark', 'Customer@help.com', '0154878515', 'Euthyrox(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '350', 1, 0),
(21, 'Mark', 'Customer@help.com', '0154878515', 'Euthyrox(1)Losartan(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '850', 1, 1),
(22, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(3)Euthyrox(4)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '2750', 1, 1),
(23, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(4)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '2050', 1, 0),
(24, 'Mark', 'Customer@help.com', '0154878515', 'Losartan(4)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '2050', 3, 1),
(25, 'Mark', 'Customer@help.com', '0154878515', 'Gabapentin(1)', '07,Foy\'s Lake Housing Society, Foy\'s Lake Chittagong', '310', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allproducts`
--
ALTER TABLE `allproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customerId` (`customerId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `allproducts`
--
ALTER TABLE `allproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
