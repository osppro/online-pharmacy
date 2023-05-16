-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 06:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Pain Killers'),
(3, 'Ant-Biotics');

-- --------------------------------------------------------

--
-- Table structure for table `drug_store`
--

CREATE TABLE `drug_store` (
  `drug_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `drug_name` varchar(200) NOT NULL,
  `drug_qnty` varchar(200) NOT NULL,
  `drug_buying_price` varchar(200) NOT NULL,
  `drug_selling_price` varchar(200) NOT NULL,
  `manufacturer_name` varchar(200) NOT NULL,
  `manufacturer_phone` varchar(200) NOT NULL,
  `manufacturer_location` varchar(200) NOT NULL,
  `expiry_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_store`
--

INSERT INTO `drug_store` (`drug_id`, `cat_id`, `drug_name`, `drug_qnty`, `drug_buying_price`, `drug_selling_price`, `manufacturer_name`, `manufacturer_phone`, `manufacturer_location`, `expiry_date`) VALUES
(1, 1, 'Panadhol', '20', '40', '100', 'David', '07069949', 'Kampala', '2023-06-10'),
(2, 1, 'Headache', '50', '30', '50', 'David', '07069949', 'Kampala', '2023-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `drug_summary`
--

CREATE TABLE `drug_summary` (
  `sid` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `drug_name` varchar(200) NOT NULL,
  `drug_qnty` varchar(200) NOT NULL,
  `drug_price` varchar(200) NOT NULL,
  `man_name` varchar(200) NOT NULL,
  `man_phone` varchar(200) NOT NULL,
  `man_location` varchar(200) NOT NULL,
  `man_expiry` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phone` varchar(200) NOT NULL,
  `customer_location` varchar(200) NOT NULL,
  `customer_qunatity` int(11) NOT NULL,
  `order_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `drug_id`, `customer_name`, `customer_phone`, `customer_location`, `customer_qunatity`, `order_date`) VALUES
(6, 1, 'oguti david', '0704487563', 'ok', 34, '2023-05-16 18:59:03'),
(7, 2, 'oguti david', '0704487563', 'ok', 50, '2023-05-16 19:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `u_type` varchar(100) NOT NULL,
  `date_registered` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `password`, `u_type`, `date_registered`) VALUES
(1, 'osp pro', 'osppro@gmail.com', '3a8e55937df0d596fca0943b924306c9', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `drug_store`
--
ALTER TABLE `drug_store`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `drug_summary`
--
ALTER TABLE `drug_summary`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drug_store`
--
ALTER TABLE `drug_store`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drug_summary`
--
ALTER TABLE `drug_summary`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
