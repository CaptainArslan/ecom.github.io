-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 02:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `product_code` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_price` float NOT NULL,
  `product_tax` float NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_size` varchar(500) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_color` varchar(500) NOT NULL,
  `product_rating` float DEFAULT NULL,
  `product_discount` float DEFAULT NULL,
  `product_offer` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `date`, `product_code`, `product_name`, `product_image`, `product_price`, `product_tax`, `product_category_id`, `product_size`, `product_quantity`, `product_color`, `product_rating`, `product_discount`, `product_offer`) VALUES
(1, '2021-08-01', 'Red_Printed_Shirt_1', 'Red Printed Shirt', '\\ecom\\img\\product_img\\product-1.jpg', 50, 10, 3, 'Medium', 10, 'Red', 4.5, NULL, NULL),
(2, '2021-08-02', 'Black_Jogger_02', 'Black Jogger', '\\ecom\\img\\product_img\\product-2.jpg', 45, 20, 2, 'Medium', 10, 'Black', 3.5, NULL, NULL),
(3, '2021-08-03', 'Grey_Trouser_03', 'Grey Trouser', '\\ecom\\img\\product_img\\product-3.jpg', 50, 30, 3, 'Large', 20, 'grey', 3, NULL, NULL),
(4, '2021-08-04', 'Blue_Printed_04', 'Blue Printed Shirt', '\\ecom\\img\\product_img\\product-4.jpg', 45, 40, 3, 'Medium', 30, 'Blue', 4, NULL, NULL),
(5, '2021-08-05', 'Grey_Shoes-05', 'Grey Shoes', '\\ecom\\img\\product_img\\product-5.jpg', 50, 20, 2, 'Large', 40, 'grey', 3.5, NULL, NULL),
(6, '2021-08-06', 'Black_Puma_Printed_Shirt_06', 'Black Puma Printed Shirt', '\\ecom\\img\\product_img\\product-6.jpg', 45, 30, 3, 'Medium', 40, 'Black', 4.5, NULL, NULL),
(7, '2021-08-07', 'Pack_Of_Socks_07', 'Multi color Socks Pack', '\\ecom\\img\\product_img\\product-7.jpg', 50, 10, 2, 'Large', 10, 'Multicolor', 3, NULL, NULL),
(8, '2021-08-08', 'Royal_Black_Wrist_Watch_08', 'Royal Black Watch', '\\ecom\\img\\product_img\\product-8.jpg', 45, 25, 1, 'Medium', 50, 'Black', 4, NULL, NULL),
(9, '2021-08-09', 'Black_Rolex_Wrist_Watch_09', 'Royal Black Rolex', '\\ecom\\img\\product_img\\product-9.jpg', 60, 25, 1, 'Large', 60, 'Black', 5, NULL, NULL),
(10, '2021-08-10', 'Black_Jogger_Shoes_10', 'Black Running Jogger', '\\ecom\\img\\product_img\\product-10.jpg', 45, 15, 2, 'Extra Large', 20, 'Black', 3.5, NULL, NULL),
(11, '2021-08-11', 'Grey_Jogger_11', 'Grey Jogger', '\\ecom\\img\\product_img\\product-11.jpg', 80, 35, 2, 'Large', 30, 'Grey', 4.5, NULL, NULL),
(12, '2021-08-12', 'Black_Trousers_12', 'Black Trouser', '\\ecom\\img\\product_img\\product-12.jpg', 35, 20, 3, 'Large', 30, 'Black', 4, NULL, NULL),
(15, '2021-08-25', 'BON_01', 'Brand O Neck Long Sleeves T-Shirt', '\\ecom\\img\\product_img\\Brand_O_Neck Long_Sleeves_T-Shirt.jpg', 50, 10, 1, 'Large', 30, 'Black, Blue, Grey', 4, NULL, NULL),
(16, '2021-08-25', 'ld5', 'LD 5 Smart Fitness Watch Tracker', '\\ecom\\img\\product_img\\ld5-smart watch fitness tracker.jfif', 100, 15, 1, 'large', 50, 'Black', 3, NULL, NULL),
(17, '2021-08-25', 'pure_white_wrist_watch_01', 'Pure White Wrist Watch', '\\ecom\\img\\product_img\\pure-white-wrist-watch.jpg', 50, 10, 1, 'Large', 30, 'White', 2.5, NULL, NULL),
(18, '2021-08-25', 'spycamwatch', 'Smart Spy Camera Wrist Watch', '\\ecom\\img\\product_img\\spy camera wrist watch.jpg', 100, 15, 1, 'large', 50, 'Black,Silver', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `category_id` int(11) NOT NULL,
  `category_date` date NOT NULL,
  `category_code` varchar(500) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `category_image` varchar(500) NOT NULL,
  `category_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`category_id`, `category_date`, `category_code`, `category_name`, `category_image`, `category_description`) VALUES
(1, '2021-08-01', '01', 'Menswear', '\\ecom\\img\\categories\\category-1.jpg', ''),
(2, '2021-08-10', '02', 'Footwear', '\\ecom\\img\\categories\\category-2.jpg', ''),
(3, '2021-08-01', '03', 'Clothes', '\\ecom\\img\\categories\\category-3.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `sponsers_logo`
--

CREATE TABLE `sponsers_logo` (
  `sponser_id` int(11) NOT NULL,
  `sponser_date` datetime NOT NULL,
  `sponser_name` varchar(500) NOT NULL,
  `sponser_image` varchar(500) NOT NULL,
  `sponser_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsers_logo`
--

INSERT INTO `sponsers_logo` (`sponser_id`, `sponser_date`, `sponser_name`, `sponser_image`, `sponser_description`) VALUES
(1, '2021-08-11 23:02:34', 'Coca Cola', '\\ecom\\img\\supponserlogo\\logo-coca-cola.png', 'Coca Cola Logo '),
(2, '0000-00-00 00:00:00', 'Godrej Logo', '\\ecom\\img\\supponserlogo\\logo-godrej.png', 'Godrej Logo'),
(3, '2021-08-11 23:02:34', 'Oppo', '\\ecom\\img\\supponserlogo\\logo-oppo.png', 'Oppo Logo '),
(4, '2021-08-11 23:02:34', 'Paypal Logo', '\\ecom\\img\\supponserlogo\\logo-paypal.png', 'Paypal Logo'),
(5, '2021-08-11 23:02:34', 'Phillips', '\\ecom\\img\\supponserlogo\\logo-philips.png', 'Phillips Logo ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_phone` varchar(500) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_confirm_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `date`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_confirm_password`) VALUES
(1, '2021-08-23 02:18:29', 'Arslan', 'mughalarslan996@gmail.com', '03177638978', '$2y$10$OJEjAsLMq0zTPUrHHyR5Lu8zMxfnpONiDsIravZHYvsFaPWnTbEY.', '$2y$10$x6VI9eAoH0tFGYbXGfWmweRI7nSz1RIT98s2FQS3OL9kb.ZWOc3IW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `sponsers_logo`
--
ALTER TABLE `sponsers_logo`
  ADD PRIMARY KEY (`sponser_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sponsers_logo`
--
ALTER TABLE `sponsers_logo`
  MODIFY `sponser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;