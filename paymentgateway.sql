-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 11:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paymentgateway`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `payment_id` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `firstname`, `lastname`, `email`, `phone`, `amount`, `payment_id`, `status`) VALUES
(4, 'Priya', 'Gupta', 'priyagupta@gmail.com', 2147483647, 100, 'pay_LUsDaTzFnLo4pU', 'completed'),
(5, 'Vinay', 'Thakur', 'vinay@gmail.com', 2147483647, 100, 'pay_LUsLhNMzk1YdL5', 'completed'),
(6, 'Vijay', 'Gupta', 'vijay@gmail.com', 2147483647, 100, 'pay_LUsRSMEjCEkOym', 'completed'),
(7, 'Priya', 'Gupta', 'priyagupta@gmail.com', 2147483647, 100, 'pay_LUueFRK0wJx8C6', 'completed'),
(8, 'Vijay', 'Thakur', 'vijay@gmail.com', 987655432, 300, 'pay_LUvfCgDnHq3HzY', 'completed'),
(9, 'Vinay', 'Thakur', 'vinay@gmail.com', 2147483647, 1001, '', 'pending'),
(10, 'Vinay', 'Thakur', 'vinay@gmail.com', 2147483647, 1001, '', 'pending'),
(11, 'Priya', 'Gupta', 'priyagupta@gmail.com', 2147483647, 300, '', 'pending'),
(12, 'Priya', 'Paswan', 'admin@admin1.com', 2147483647, 300, '', 'pending'),
(13, 'Mamta', 'Gupta', 'mamta@gmail.com', 2147483647, 300, '', 'pending'),
(14, 'Vinay', 'Thakur', 'priyagupta@gmail.com', 2147483647, 300, '', 'pending'),
(15, 'Vinay', 'Thakur', 'priyagupta@gmail.com', 2147483647, 300, '', 'pending'),
(16, 'Vinay', 'Thakur', 'priyagupta@gmail.com', 2147483647, 300, '', 'pending'),
(17, 'Vinay', 'Thakur', 'priyagupta@gmail.com', 2147483647, 300, '', 'pending'),
(18, 'Vinay', 'Thakur', 'priyagupta@gmail.com', 2147483647, 300, '', 'pending'),
(19, 'Vinay', 'Thakur', 'priyagupta@gmail.com', 2147483647, 300, 'pay_LUyRCZoSVF01jr', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`id`, `Name`, `amount`) VALUES
(1, 'Silver', 200),
(2, 'Gold', 300),
(3, 'Priemum', 1001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
