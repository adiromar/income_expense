-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 09:17 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `income_expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `year` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `expenses` decimal(13,2) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `year`, `month`, `expenses`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2020', 'apr', '2333.00', '2020-12-27', 1, '2020-12-27 06:22:31', '2020-12-27 06:48:08'),
(2, '2020', 'feb', '45.00', '2020-12-27', 1, '2020-12-27 07:04:56', '2020-12-27 07:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `year` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `income` decimal(13,2) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `year`, `month`, `income`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2020', 'mar', '23000.00', '2020-12-27', 1, '2020-12-27 06:04:32', '2020-12-27 06:48:42'),
(2, '', '', '1200.00', '2020-12-27', 1, '2020-12-27 07:51:49', NULL),
(3, '', '', '4200.00', '2020-12-22', 1, '2020-12-27 07:51:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `full_name` varchar(191) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(191) NOT NULL,
  `status` bigint(6) DEFAULT NULL,
  `user_role` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `full_name`, `email`, `password`, `status`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'aditya', 'aditya@gmail.com', 'd0c1cd6eea0629927391819eabac783f542c36e9', 1, 1, '2020-12-27 05:07:33', NULL),
(2, 'test', 'test@test.com', '4233137d1c510f2e55ba5cb220b864b11033f156', 1, 1, '2020-12-27 06:29:40', NULL),
(3, 'nath', 'nath@gmail.com', 'f98faead97191a97c75abef5488ce22ff6dc1d3a', 1, 1, '2020-12-27 08:08:06', NULL),
(4, 'test user', 'test@tet.com', '4233137d1c510f2e55ba5cb220b864b11033f156', 1, 1, '2020-12-27 08:11:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
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
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
