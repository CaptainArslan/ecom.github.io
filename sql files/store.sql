-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 09:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
-- Table structure for table `customer_message`
--

CREATE TABLE `customer_message` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_message`
--

INSERT INTO `customer_message` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 527177660, 1326782755, 'hello world'),
(2, 527177660, 1326782755, 'arslan??'),
(3, 527177660, 1326782755, 'hello man where are you ?'),
(4, 527177660, 1326782755, 'where ?'),
(5, 527177660, 1326782755, 'hello world'),
(6, 1357700699, 1326782755, 'hey man'),
(7, 1357700699, 1326782755, 'how are you?'),
(8, 1326782755, 1357700699, 'hello world'),
(9, 527177660, 1326782755, 'hello'),
(10, 527177660, 1326782755, 'how are you'),
(11, 527177660, 1326782755, 'how are you '),
(12, 527177660, 1326782755, 'bro how are you'),
(13, 527177660, 1326782755, 'L P C'),
(14, 1326782755, 527177660, 'hello '),
(15, 1357700699, 527177660, 'hello'),
(16, 527177660, 1357700699, 'hello'),
(17, 527177660, 1357700699, 'how are you ?'),
(18, 527177660, 1357700699, 'im fine how are you?'),
(19, 527177660, 1357700699, ' im fiine'),
(20, 1357700699, 527177660, 'hello'),
(21, 527177660, 1326782755, 'pagal he kya'),
(22, 1326782755, 527177660, 'to ho ga '),
(23, 1326782755, 527177660, 'hello'),
(24, 1326782755, 527177660, 'im ilyas from your university of sargodha'),
(25, 527177660, 1326782755, 'o wow that\'s great'),
(26, 527177660, 1326782755, 'from which class?'),
(27, 1326782755, 527177660, 'BSCS'),
(28, 527177660, 1326782755, 'means My senior?'),
(29, 1326782755, 527177660, 'yes'),
(30, 1326782755, 527177660, 'asdfadsfasdf haasd fha sdghasgasdf'),
(31, 1326782755, 527177660, 'hello'),
(32, 1326782755, 527177660, 'asghdfas dgfgasdf'),
(33, 1326782755, 527177660, 'asdjkagsddfgasdfgasdghagsdfhgaasdffgjhasdgfjhasgdkfjfhgassdfhfgkjasdhfghasdgfghasdg'),
(34, 527177660, 1326782755, 'hy'),
(35, 1326782755, 527177660, 'hello'),
(36, 1326782755, 527177660, 'bro how are youo'),
(37, 527177660, 1326782755, 'im fine bro '),
(38, 527177660, 1326782755, 'you tell'),
(39, 1326782755, 527177660, '..'),
(40, 1357700699, 527177660, 'hello'),
(41, 1357700699, 527177660, '...'),
(42, 1357700699, 527177660, 'hello bro how are you '),
(43, 527177660, 1357700699, 'im fine '),
(44, 1357700699, 527177660, 'hello'),
(45, 1357700699, 527177660, 'how are you '),
(46, 1357700699, 527177660, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `date_time` datetime NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `product_code` varchar(500) NOT NULL,
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

INSERT INTO `orders` (`date_time`, `order_id`, `product_code`, `user_id`, `product_name`, `product_img`, `product_quantity`, `product_price`, `product_tax`, `grand_total`, `user_address`, `user_city`, `user_zip`, `user_state`) VALUES
('2021-12-27 07:11:01', '1075600858', 'Red_Printed_Shirt_1', 3, 'Red Printed Shirt', 'product-1.jpg', '5', 250, 50, 300, 'Garden town', 'gujranwala', '522501', 'gujranwala'),
('2021-12-27 07:13:00', '339897198', 'Red_Printed_Shirt_1', 3, 'Red Printed Shirt', 'product-1.jpg', '1', 50, 10, 60, 'Garden town', 'gujranwala', '522501', 'gujranwala'),
('2021-12-27 07:12:06', '868784245', 'Red_Printed_Shirt_1', 3, 'Red Printed Shirt', 'product-1.jpg', '2', 100, 20, 120, 'Kaccha Fattomand Road Gujranwala', 'gujranwala', '522501', 'gujranwala');

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
(1, '2021-08-01', 'Red_Printed_Shirt_1', 'Red Printed Shirt', 'product-1.jpg', 50, 10, 3, 'Medium', 100, 'Red', 4.5, NULL, NULL),
(2, '2021-08-02', 'Black_Jogger_02', 'Black Jogger', 'product-2.jpg', 45, 20, 2, 'Medium', 10, 'Black', 3.5, NULL, NULL),
(3, '2021-08-03', 'Grey_Trouser_03', 'Grey Trouser', 'product-3.jpg', 50, 30, 3, 'Large', 20, 'grey', 3, NULL, NULL),
(4, '2021-08-04', 'Blue_Printed_04', 'Blue Printed Shirt', 'product-4.jpg', 45, 40, 3, 'Medium', 26, 'Blue', 4, NULL, NULL),
(5, '2021-08-05', 'Grey_Shoes-05', 'Grey Shoes', 'product-5.jpg', 50, 20, 2, 'Large', 40, 'grey', 3.5, NULL, NULL),
(6, '2021-08-06', 'Black_Puma_Printed_Shirt_06', 'Black Puma Printed Shirt', 'product-6.jpg', 45, 30, 3, 'Medium', 40, 'Black', 4.5, NULL, NULL),
(7, '2021-08-07', 'Pack_Of_Socks_07', 'Multi color Socks Pack', 'product-7.jpg', 50, 10, 2, 'Large', 10, 'Multicolor', 3, NULL, NULL),
(8, '2021-08-08', 'Royal_Black_Wrist_Watch_08', 'Royal Black Watch', 'product-8.jpg', 45, 25, 1, 'Medium', 50, 'Black', 4, NULL, NULL),
(9, '2021-08-09', 'Black_Rolex_Wrist_Watch_09', 'Royal Black Rolex', 'product-9.jpg', 60, 25, 1, 'Large', 60, 'Black', 5, NULL, NULL),
(10, '2021-08-10', 'Black_Jogger_Shoes_10', 'Black Running Jogger', 'product-10.jpg', 45, 15, 2, 'Extra Large', 20, 'Black', 3.5, NULL, NULL),
(11, '2021-08-11', 'Grey_Jogger_11', 'Grey Jogger', 'product-11.jpg', 80, 35, 2, 'Large', 30, 'Grey', 4.5, NULL, NULL),
(12, '2021-08-12', 'Black_Trousers_12', 'Black Trouser', 'product-12.jpg', 35, 20, 3, 'Large', 30, 'Black', 4, NULL, NULL),
(15, '2021-08-25', 'BON_01', 'Brand O Neck Long Sleeves T-Shirt', 'Brand_O_Neck Long_Sleeves_T-Shirt.jpg', 50, 10, 1, 'Large', 30, 'Black, Blue, Grey', 4, NULL, NULL),
(16, '2021-08-25', 'ld5', 'LD 5 Smart Fitness Watch Tracker', 'ld5-smart watch fitness tracker.jfif', 100, 15, 1, 'large', 50, 'Black', 3, NULL, NULL),
(17, '2021-08-25', 'pure_white_wrist_watch_01', 'Pure White Wrist Watch', 'pure-white-wrist-watch.jpg', 50, 10, 1, 'Large', 30, 'White', 2.5, NULL, NULL),
(18, '2021-08-25', 'spycamwatch', 'Smart Spy Camera Wrist Watch', 'spy camera wrist watch.jpg', 100, 15, 1, 'large', 50, 'Black,Silver', 5, NULL, NULL);

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
  `user_role` varchar(100) NOT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_zip` varchar(50) DEFAULT NULL,
  `user_state` varchar(255) DEFAULT NULL,
  `user_unique_id` int(11) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `user_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `date`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_confirm_password`, `user_role`, `user_address`, `user_city`, `user_zip`, `user_state`, `user_unique_id`, `user_img`, `user_status`) VALUES
(2, '2021-11-03 08:23:19', 'arslan', 'arslan99@gmail.com', '0316985246', '$2y$10$rBRDkfjmagCpx50DAx4Ud.KfSUvki0v.DZyIwE7T5xbq8TgOF.0U6', '$2y$10$AoU.Fb3RfYKG8rB3lNgbV.FEltzSAVtil8EW2W9QEQy4F0LP6UNJO', '', '', '', '', '', NULL, NULL, NULL),
(3, '2021-12-13 07:54:39', 'fahad', 'fahad@gmail.com', '03698521475', '$2y$10$lqUcOxwHI/ZnZ3fqLHC9fuCF1./ZQJnGqVOqU6MKVlEOAKx4Vlm4C', '$2y$10$yc3NYYgX8/C75j2Nb3wv7.77.rUgp2CMFSUj6/wZyqSkCfnoq6gnm', '', '', '', '', '', NULL, NULL, NULL),
(4, '2021-12-14 07:21:58', 'zaman', 'zaman@gmail.com', '03625987415', '$2y$10$7Q9QDO1Spi.Se6bGGdmLsOt9h6uzsK7XUVU8egNlCbbOAhwj770uO', '$2y$10$iKJHQIhQKU/cH1auM307Jel7iRnL4RROvE2ZOsLhNJlFs85ItwD3i', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2021-12-29 08:00:04', 'qaz', 'qaz@gmail.com', '1', '$2y$10$AuDR1XetD2P7Svxgqnel5uDEX7Joq7k9i4Sh6bFVUsXlU8FTtvHnC', '$2y$10$KlKvjiKLqLqCi.8o6Cy7n.5jYQv5AcKkWb3qr8sJR2ZaM4veSOaL6', 'U', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_message`
--
ALTER TABLE `customer_message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `order_id` (`order_id`);

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
-- AUTO_INCREMENT for table `customer_message`
--
ALTER TABLE `customer_message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
