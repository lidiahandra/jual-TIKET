-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 01:02 PM
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
-- Database: `pembelian_tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `email`, `password`, `created_at`) VALUES
(1, 'Caca Wilda Andika', 'caca@gmail.com', '$2y$10$DMKoDjOZ4pW.P.2620b2NO/7r0CQ.5ImTnVa2qmxL0L4fVOXz1IP6', '2018-12-13 08:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Comedy', '2018-12-13 08:02:29'),
(2, 'Action', '2018-12-13 08:02:29'),
(3, 'Adventure', '2018-12-25 05:56:38'),
(4, 'Fantasy', '2018-12-25 05:56:38'),
(5, 'Horor', '2018-12-25 05:56:38'),
(6, 'Historycal', '2018-12-25 05:56:38'),
(7, 'Animation', '2018-12-25 05:57:30'),
(8, 'Documentary', '2018-12-25 05:57:30'),
(9, 'Sport', '2018-12-25 05:57:52'),
(10, 'Music', '2018-12-25 05:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `chair` varchar(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `id_product`, `chair`, `amount`, `created_at`) VALUES
(6, 1, 35, 'P10 - P11', 2, '2018-12-25 23:50:59'),
(7, 1, 36, 'C3 - C4', 2, '2018-12-26 01:06:38'),
(8, 2, 35, 'G10 - G11', 2, '2018-12-25 18:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `rating` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` int(11) DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '/assets/img/uploads/default.jpg',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_category`, `title`, `year`, `rating`, `date`, `time`, `price`, `image`, `created_at`) VALUES
(35, 1, 'The Avatar', '2018', 6, '2018-12-25', '22:30:00', 800, '/assets/img/uploads/default.jpg', '2018-12-25 22:19:04'),
(36, 7, 'The Insidious', '2018', 9.7, '2018-12-25', '22:15:00', 900, '/assets/img/uploads/36.jpg', '2018-12-25 23:16:19'),
(37, 5, 'The Avatar', '2018', 6.4, '2018-12-25', '23:30:00', 200, '/assets/img/uploads/37.jpg', '2018-12-25 23:29:18'),
(39, 1, 'The legend of ang', '2018', 0.1, '2018-12-25', '19:00:00', 400, '/assets/img/uploads/39.jpg', '2018-12-25 18:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `no_hp`, `created_at`) VALUES
(1, 'Akikazu Andika', 'akikazuandika@mail.com', '$2y$10$AQjO8kP/DUopk0oKzX/ECu2a9lMiVmil0xnLRZon57w8oqeq8dtD6', 'sawahan', '085712345678', '2018-12-22 17:57:26'),
(2, 'Andika Wilda', 'asd@asd.com', '$2y$10$nxbKW/7ixv1Z3ZOz2efRVeH82dtvHrGUfC9zXMyKCIK5nSCNNEd0.', 'sawahan garum', '10293810923', '2018-12-25 18:22:58'),
(3, 'Andika Wilda', 'asdasd@asd.com', '$2y$10$BvbNzlEWCu.hCFng/NhH1O7ohsCJsd7RdqS7Llatg0KInmIHduPxy', 'sawahan garum', '1231231231', '2018-12-25 18:46:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
