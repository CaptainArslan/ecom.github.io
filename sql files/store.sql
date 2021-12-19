-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 08:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `date_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_quantity` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_tax` float NOT NULL,
  `grand_total` float NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_city` varchar(500) NOT NULL,
  `user_zip` varchar(500) NOT NULL,
  `user_state` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`date_time`, `user_id`, `product_name`, `product_img`, `product_quantity`, `product_price`, `product_tax`, `grand_total`, `user_address`, `user_city`, `user_zip`, `user_state`) VALUES
('2021-12-14 07:36:38', 4, 'Red Printed Shirt', 'product-1.jpg', '1', 50, 10, 60, 'Kaccha Fattomand Road Gujranwala', 'gujranwala', '522501', 'gujranwala'),
('2021-12-20 00:06:17', 2, 'Blue Printed Shirt', 'product-4.jpg', '10', 450, 400, 850, 'kachha Fattomand T=', '', '', ''),
('2021-12-20 00:06:17', 2, 'Grey Trouser', 'product-3.jpg', '10', 500, 300, 800, 'kachha Fattomand T=', '', '', ''),
('2021-12-20 00:06:17', 2, 'Brand O Neck Long Sleeves T-Shirt', 'Brand_O_Neck Long_Sleeves_T-Shirt.jpg', '10', 500, 100, 600, 'kachha Fattomand T=', '', '', ''),
('2021-12-20 00:06:17', 2, 'LD 5 Smart Fitness Watch Tracker', 'ld5-smart watch fitness tracker.jfif', '10', 1000, 150, 1150, 'kachha Fattomand T=', '', '', '');

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
  `product_offer` varchar(500) DEFAULT NULL,
  `product_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `date`, `product_code`, `product_name`, `product_image`, `product_price`, `product_tax`, `product_category_id`, `product_size`, `product_quantity`, `product_color`, `product_rating`, `product_discount`, `product_offer`, `product_description`) VALUES
(1, '2021-08-01', 'Red_Printed_Shirt_1', 'Red Printed Shirt', 'product-1.jpg', 50, 10, 3, 'Medium', 10, 'Red', 4.5, NULL, NULL, ''),
(2, '2021-08-02', 'Black_Jogger_02', 'Black Jogger', 'product-2.jpg', 45, 20, 2, 'Medium', 10, 'Black', 3.5, NULL, NULL, ''),
(3, '2021-08-03', 'Grey_Trouser_03', 'Grey Trouser', 'product-3.jpg', 50, 30, 3, 'Large', 20, 'grey', 3, NULL, NULL, ''),
(4, '2021-08-04', 'Blue_Printed_04', 'Blue Printed Shirt', 'product-4.jpg', 45, 40, 3, 'Medium', 30, 'Blue', 4, NULL, NULL, ''),
(5, '2021-08-05', 'Grey_Shoes-05', 'Grey Shoes', 'product-5.jpg', 50, 20, 2, 'Large', 40, 'grey', 3.5, NULL, NULL, ''),
(6, '2021-08-06', 'Black_Puma_Printed_Shirt_06', 'Black Puma Printed Shirt', 'product-6.jpg', 45, 30, 3, 'Medium', 40, 'Black', 4.5, NULL, NULL, ''),
(7, '2021-08-07', 'Pack_Of_Socks_07', 'Multi color Socks Pack', 'product-7.jpg', 50, 10, 2, 'Large', 10, 'Multicolor', 3, NULL, NULL, ''),
(8, '2021-08-08', 'Royal_Black_Wrist_Watch_08', 'Royal Black Watch', 'product-8.jpg', 45, 25, 1, 'Medium', 50, 'Black', 4, NULL, NULL, ''),
(9, '2021-08-09', 'Black_Rolex_Wrist_Watch_09', 'Royal Black Rolex', 'product-9.jpg', 60, 25, 1, 'Large', 60, 'Black', 5, NULL, NULL, ''),
(10, '2021-08-10', 'Black_Jogger_Shoes_10', 'Black Running Jogger', 'product-10.jpg', 45, 15, 2, 'Extra Large', 20, 'Black', 3.5, NULL, NULL, ''),
(11, '2021-08-11', 'Grey_Jogger_11', 'Grey Jogger', 'product-11.jpg', 80, 35, 2, 'Large', 30, 'Grey', 4.5, NULL, NULL, ''),
(12, '2021-08-12', 'Black_Trousers_12', 'Black Trouser', 'product-12.jpg', 35, 20, 3, 'Large', 30, 'Black', 4, NULL, NULL, ''),
(15, '2021-08-25', 'BON_01', 'Brand O Neck Long Sleeves T-Shirt', 'Brand_O_Neck Long_Sleeves_T-Shirt.jpg', 50, 10, 1, 'Large', 30, 'Black, Blue, Grey', 4, NULL, NULL, ''),
(16, '2021-08-25', 'ld5', 'LD 5 Smart Fitness Watch Tracker', 'ld5-smart watch fitness tracker.jfif', 100, 15, 1, 'large', 50, 'Black', 3, NULL, NULL, ''),
(17, '2021-08-25', 'pure_white_wrist_watch_01', 'Pure White Wrist Watch', 'pure-white-wrist-watch.jpg', 50, 10, 1, 'Large', 30, 'White', 2.5, NULL, NULL, ''),
(18, '2021-08-25', 'spycamwatch', 'Smart Spy Camera Wrist Watch', 'spy camera wrist watch.jpg', 100, 15, 1, 'large', 50, 'Black,Silver', 5, NULL, NULL, '');

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
(1, '2021-08-01', '01', 'Menswear', 'category-1.jpg', ''),
(2, '2021-08-10', '02', 'Footwear', 'category-2.jpg', ''),
(3, '2021-08-01', '03', 'Clothes', 'category-3.jpg', '');

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
(1, '2021-08-11 23:02:34', 'Coca Cola', 'logo-coca-cola.png', 'Coca Cola Logo '),
(2, '0000-00-00 00:00:00', 'Godrej Logo', 'logo-godrej.png', 'Godrej Logo'),
(3, '2021-08-11 23:02:34', 'Oppo', 'logo-oppo.png', 'Oppo Logo '),
(4, '2021-08-11 23:02:34', 'Paypal Logo', 'logo-paypal.png', 'Paypal Logo'),
(5, '2021-08-11 23:02:34', 'Phillips', 'logo-philips.png', 'Phillips Logo ');

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
  `user_confirm_password` varchar(500) NOT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_zip` varchar(50) DEFAULT NULL,
  `user_state` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `date`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_confirm_password`, `user_address`, `user_city`, `user_zip`, `user_state`) VALUES
(2, '2021-11-03 08:23:19', 'arslan', 'arslan99@gmail.com', '0316985246', '$2y$10$rBRDkfjmagCpx50DAx4Ud.KfSUvki0v.DZyIwE7T5xbq8TgOF.0U6', '$2y$10$AoU.Fb3RfYKG8rB3lNgbV.FEltzSAVtil8EW2W9QEQy4F0LP6UNJO', '', '', '', ''),
(3, '2021-12-13 07:54:39', 'fahad', 'fahad@gmail.com', '03698521475', '$2y$10$lqUcOxwHI/ZnZ3fqLHC9fuCF1./ZQJnGqVOqU6MKVlEOAKx4Vlm4C', '$2y$10$yc3NYYgX8/C75j2Nb3wv7.77.rUgp2CMFSUj6/wZyqSkCfnoq6gnm', '', '', '', ''),
(4, '2021-12-14 07:21:58', 'zaman', 'zaman@gmail.com', '03625987415', '$2y$10$7Q9QDO1Spi.Se6bGGdmLsOt9h6uzsK7XUVU8egNlCbbOAhwj770uO', '$2y$10$iKJHQIhQKU/cH1auM307Jel7iRnL4RROvE2ZOsLhNJlFs85ItwD3i', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `date_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_tax` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_city` varchar(50) NOT NULL,
  `user_zip` int(11) NOT NULL,
  `user_state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`date_time`, `user_id`, `product_name`, `product_img`, `product_quantity`, `product_price`, `product_tax`, `grand_total`, `user_address`, `user_city`, `user_zip`, `user_state`) VALUES
('2021-12-13 12:40:33', 3, 'red shitrt', '', 0, 0, 0, 0, '', '', 0, '');

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
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
