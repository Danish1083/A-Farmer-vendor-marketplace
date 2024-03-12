-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 05:11 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Grains'),
(3, 'Fruits'),
(4, 'Vegetables'),
(5, 'Fiber and Textile Products'),
(6, 'Nursery and Floriculture');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmer_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `farm_location` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`farmer_id`, `username`, `password`, `full_name`, `email`, `farm_location`, `phone_number`) VALUES
(33, 'Shafeeq', '$2y$10$LBT8EkIS3i6m1lHXLML/DOPBTT3FaDpgilW5gwsSGtmydKDlrwNLS', 'Shafeeq Gujjar', 'Shafa@gmail.com', 'GD-45 Okara', '03028090100'),
(34, 'Arqam', '$2y$10$bSMcBWxVP/xsnB2X.Z0OiuEsb.C6AqVJKFv9fdP7BMJfP.3.VSGo.', 'M. Arqam Khan ', 'Shafa@gmail.com', 'Chinighot', '03028090100'),
(35, 'BhagatSingh22', '$2y$10$eE5jK6Dlluy0BSfOl3eviOx40sOi.S99tB5/YrtDLl28ie4gaa.G6', 'BhagatSingh', 'Shafa@gmail.com', 'Chinighot', '03028090100'),
(36, 'Choudhry', '$2y$10$pEtxFS/8JoWlQ.aH/o/VxOczDmONsFYKciBoBoBTPrfinSdxXa7LC', 'Chodry', 'ch@gmail.com', 'Qasoor', '032334233'),
(37, 'Lebaa', '$2y$10$7w5gN1i9AxafTSYR1qjSAuRWTaTiPe8Il1YdUfyf5IoN.NgCu/sx2', 'Laba', 'sd@gmail.com', 'adsds', '3456789098765');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `proposed_price` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `farmer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `proposed_price`, `picture`, `description`, `category_id`, `farmer_id`) VALUES
(16, 'Banana', 80, 'Banana.jpg', 'Price is according to per dozen. price is negotiateable', 3, 33),
(17, 'Barley', 400, 'barley.jpg', 'Price is according to per kg\r\nPrice is non negotiable', 1, 33),
(18, 'Cotton', 100, 'cotton (1).jpg', 'It will be accordingly to per Kg', 5, 34),
(19, 'Wool ', 450, 'wool.jpeg', 'Accordingly to per Kg\r\nPrice is negotiateable', 5, 34),
(20, 'Potted Plants', 12, 'pottedPlants.jpg', 'Good flowers beleive me God Promise', 6, 33),
(21, 'Tomato', 400, 'tomato.jpg', 'GOOD.\r\nPrice is accordingly to per kg\r\nPrice is non negotiable', 4, 33),
(22, 'Cocumber', 400, 'cocumber.jpg', '500 per kg', 4, 33),
(23, 'Banana', 40, 'Banana.jpg', 'Good\r\nPrice is non negotiatable', 3, 36),
(24, 'Grapes', 2334, 'Apple.jpg', 'good v good', 3, 37);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'Putin', 'Putin@gmail.com', '4d26d3deb4671f01ee4f36e537d3d52d'),
(4, 'Danish', 'Putidd@gmail.com', 'acaa511d855f34fdb38c7d25aec9d926'),
(6, 'Danishjkjkjnkjnk', 'ljhkj@gmail.com', '0841f62bfa7b07c75fdf2f0f7316b1d3'),
(7, 'Stallin', 'Putiddd@gmail.com', '3febe861aca3f102d38bd755b77b3ddb');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(13) NOT NULL,
  `email` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `username`, `password`, `full_name`, `address`, `phone_number`, `email`) VALUES
(10, 'NooreFatima', '$2y$10$UdwFPR7L1k70GrCV/snx4us315ZA3q3LDFsZI.MOCQjdSD8bHz5m.', 'Noor e Fatima', 'Lahore- Cant ', 2147483647, 'Noora@gmail.com'),
(11, 'Bhagat Singh', '$2y$10$QjkFq59820etw/fP.jvJYOvBJK/W3oFA6lPtAaKlhTy72VPRwH.YC', 'Bhaggat Singh', 'Lahore- Cant', 2147483647, 'Nsdfsd@gmail.com'),
(12, 'Vendor2233', '$2y$10$YXXDnSscKR2HwpdLZmgszeFisgw0.O2qVIvAw1BJ66utW9Y0OL3ji', 'Shahid', 'ad', 2147483647, 'dani.ahmad233@gmail.com'),
(13, 'Danish22', '$2y$10$s6z2TWwCqlLpdDttqIEbUOIR/nHqn1IfQfyBr639XwJYXAR3MHiwu', 'Danish AHmad', 'Lahore- Cant', 2147483647, 'Noora@gmail.com'),
(14, 'Uss', '$2y$10$9NL3PtmguxC5LJxzO4hV9uggGIlAnrTJeRudN188w6FXPubqA1H1G', 'Usama', 'Qasoor', 20020202, 'Das@gmail.com'),
(15, 'Lelin', '$2y$10$surTVrmKLZDDXJLbq54Bzuu1obM6uEzlRwOguH5qRJAw3c2UOjFHG', 'Lelin', 'yuudgjkdrfgjk', 2147483647, 'ljhkj@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmer_id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `fk_farmer_id` (`farmer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_farmer_id` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`farmer_id`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
