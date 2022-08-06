-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 05:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--
CREATE DATABASE IF NOT EXISTS `ecom` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecom`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `weight` float NOT NULL,
  `inStock` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `weight`, `inStock`) VALUES
(10, 'Shampoo', 5, 3, 1),
(11, 'Chips', 8, 1, 1),
(12, 'IPhone5s', 10, 5, 1),
(13, 'Microsoft Surface', 15, 20, 1),
(14, 'laptop', 49, 30, 1),
(15, 'iphone6s', 80, 2, 1),
(17, 'Samsung Note10 LITE', 55, 35, 1),
(18, 'LGTV', 60, 20, 1),
(19, 'SamsungTV', 50, 23, 1),
(20, 'Nokie', 45, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `itemsInCart` int(5) NOT NULL DEFAULT 0,
  `active` int(1) NOT NULL DEFAULT 1,
  `admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `itemsInCart`, `active`, `admin`) VALUES
(1, 'admin', 'admin@admin.com', 'admin ', 'NONE', 0, 1, 1),
(2, 'jack', 'jack@jack.com', 'jack', 'Mars', 0, 1, 0),
(5, 'Maria', 'Maria@Maria.com', 'Maria', 'NY', 0, 1, 0),
(6, 'bob', 'bob@bob.com', 'bob', 'Iran', 0, 1, 0),
(7, 'bob', 'bob@bob.com', 'bob', 'Iran', 0, 1, 0),
(8, 'ale', 'alex@alex.com', 'alex', 'Japan', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
