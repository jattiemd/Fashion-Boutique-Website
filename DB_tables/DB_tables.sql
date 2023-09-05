-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 04:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aelahn`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `item_id` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'customer',
  `ip_address` varchar(255) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(255) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `streetAddress` varchar(50) NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postalCode` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `user_type`, `ip_address`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `streetAddress`, `suburb`, `city`, `postalCode`) VALUES
(1, 'admin', '', 'admin', 'admin', 'admin@gmail.com', '$2y$10$JYKhhD4x/vJ8Mv.Tvs4.ou.ZAorsj6VJ16Q8HmB8fxGgoc8sLcfqG', 123456789, '123 main road', 'Southern suburb', 'cape town', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `item_names` varchar(255) NOT NULL,
  `total_items` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `deliver_to` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'clothing',
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `category`, `name`, `description`, `img1`, `img2`, `img3`, `price`, `quantity`, `date_added`) VALUES
(1, 'clothing', 'Aelahn Signature Long Sleeve Sheath', 'Aelahn Signature Long Sleeve Sheath...', 'clothing1.jpg', '', '', '1200.00', 100, '2023-05-30 19:05:31'),
(3, 'clothing', 'long sleeve whatever', 'Item description...', 'clothing3.jpg', '', '', '1000.00', 100, '2023-05-30 19:05:31'),
(4, 'accessories', 'Aelahn Signature Leather Grab Bag', 'Aelahn Signature Leather Grab Bag\r\n\r\nFeatures:\r\n\r\nReal Leather\r\nRing Handles', 'accessories1.jpg', '', '', '3000.00', 100, '2023-06-01 14:02:32'),
(5, 'accessories', 'Aelahn Statement Set (Black)', 'This Statement Set includes: <br>\r\nAelahn Pleather Slip-on <br>\r\nAelahn Signature Sun glasses <br>\r\n2x lipstick (Color - Signature ombre)\r\n', 'accessories2.jpg', '', '', '1500.00', 100, '2023-06-01 14:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_card_details`
--

CREATE TABLE `user_card_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `exp_month` int(2) NOT NULL,
  `exp_year` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_products` int(255) NOT NULL,
  `amount_due` varchar(100) NOT NULL,
  `deliver_to` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user_card_details`
--
ALTER TABLE `user_card_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_card_details`
--
ALTER TABLE `user_card_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
