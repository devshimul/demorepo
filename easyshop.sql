-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 07:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`) VALUES
(1, 'Samsung'),
(2, 'Sony'),
(3, 'Nokia'),
(4, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_msg` varchar(255) NOT NULL,
  `comment_status` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`user_id`, `user_name`, `user_email`, `user_msg`, `comment_status`) VALUES
(1, 'SHIMUL HOSSAIN  ', 'sbshimul000@gmail.com', 'hi', 1),
(2, 'SHIMUL HOSSAIN  ', 'admin@gmail.com', 'hi How are your', 1),
(3, 'SHIMUL HOSSAIN  ', 'admin@gmail.com', 'hh', 1),
(4, 'SHIMUL HOSSAIN  ', 'mahadi@gmail.com', 'hi', 1),
(5, 'SHIMUL HOSSAIN  ', 'sbshimul000@gmail.com', 'hi', 1),
(6, 'Imran hossain', 'imran@gmail.com', 'Hello sir my name is imran hossain. I have continue my study in bSC in CSE at world univercity of bangladesh. Just 3 Semester yet to complete my academic cariculam. \r\nafter this 3 stupic semester will go I become a engineer.', 1),
(7, 'SHIMUL HOSSAIN  ', 'imran@gmail.com', '	Hello sir my name is imran hossain. I have continue my study in bSC in CSE at world univercity of bangladesh. Just 3 Semester yet to complete my academic cariculam. after this 3 stupic semester will go I become a engineer.	Hello sir my name is imran hoss', 1),
(8, 'anower', 'anower@gmail.com', '	Hello sir my name is Anower hossain. I have continue my study in bSC in CSE at world univercity of bangladesh. Just 3 Semester yet to complete my academic cariculam. after this 3 stupic semester will go I become a engineer.', 1),
(9, 'anower', 'anower@gmail.com', '	Hello sir my name is Anower hossain. I have continue my study in bSC in CSE at world univercity of bangladesh. Just 3 Semester yet to complete my academic cariculam. after this 3 stupic semester will go I become a engineer.', 1),
(10, 'sujan', 'sujan@gmail.com', 'hi', 1),
(11, 'Shimul Hossain', 'sbshimul000@gmail.com', 'fffasdfdasdfddf', 1),
(12, 'Shimul Hossain', 'sbshimul000@gmail.com', 'hello', 1),
(13, 'sujan', 'imran@gmail.com', 'ytyrt', 1),
(14, 'Shimul Hossain', 'sbshimul000@gmail.com', 'jjjjj', 1),
(15, 'Shimul Hossain', 'shimulhossain@gmail.com', 'Hello world ', 1),
(16, 'Shimul Hossain', 'sbshimul000@gmail.com', 'hello', 1),
(17, 'sujan', 'sbshimul000@gmail.com', 'gggg', 1),
(18, 'SHIMUL HOSSAIN  ', 'sbshimul00@gmail.com', 'gggg', 1),
(19, 'SHIMUL HOSSAIN  ', 'sbshimul00@gmail.com', 'gggg', 1),
(20, 'Imran hossain', 'admin@gmail.com', 'ghjhgkj', 1),
(21, 'Imran hossain', 'sbshimul000@gmail.com', 'gkjnl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(20) NOT NULL,
  `product_id` int(30) NOT NULL,
  `product_qnt` int(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `delivery_status` enum('new','confirmed','delivered','cenceled') NOT NULL DEFAULT 'new',
  `delivery_date` date NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `product_id`, `product_qnt`, `total_amount`, `customer_id`, `customer_name`, `customer_email`, `contact_number`, `delivery_address`, `payment_method`, `payment_status`, `delivery_status`, `delivery_date`, `order_date`) VALUES
(1, 5, 1, 26099, 21, 'Sujan Miah', 'sujan@gmail.com', '01738836990', 'Mirpur-1', 'cod', '0', 'new', '2021-01-15', '2021-01-14'),
(3, 4, 4, 208100, 0, 'Shimul ', 'shimul@gmail.com', '68787', 'mirpur', 'cod', '1', 'delivered', '2021-01-15', '2021-01-14'),
(4, 3, 1, 41099, 21, 'Imran hossain', 'admin@gmail.com', '4454', 'dfgnm', 'cod', '0', 'confirmed', '2021-01-15', '2021-01-14'),
(5, 5, 8, 208092, 21, 'Imran hossain', 'admin@gmail.com', '14545', 'gfhjghj', 'cod', '1', 'delivered', '2021-01-14', '2021-01-14'),
(6, 5, 5, 130095, 0, 'Imran hossain', 'admin@gmail.com', '14545', 'dfghfh', 'cod', '1', 'delivered', '2021-01-15', '2021-01-15'),
(7, 4, 4, 208100, 21, 'anower', 'arif@gmail.com', '14545', 'gggggg', 'cod', '0', 'cenceled', '0000-00-00', '2021-01-15'),
(8, 5, 2, 52098, 0, 'Imran hossain', 'sbshimul000@gmail.com', '4454', 'dhjk', 'cod', '0', 'cenceled', '0000-00-00', '2021-01-15'),
(10, 4, 1, 52100, 0, 'Imran hossain', 'admin@gmail.com', '14545', 'dfadsf', 'cod', '0', 'cenceled', '0000-00-00', '2021-01-15'),
(11, 3, 1, 41099, 0, 'Imran hossain', 'sbshimul000@gmail.com', '4454', 'DDSDSD', 'cod', '0', 'confirmed', '0000-00-00', '2021-01-15'),
(12, 4, 1, 52100, 0, 'SHIMUL HOSSAIN  ', 'admin@gmail.com', '14545', 'ck', 'cod', '0', 'new', '0000-00-00', '2021-01-15'),
(13, 3, 1, 41099, 0, 'Imran hossain', 'sbshimul000@gmail.com', '2343', 'erewr', 'cod', '0', 'confirmed', '2021-01-15', '2021-01-15'),
(14, 2, 1, 40100, 0, 'gg', 'admin@gmail.com', '14545', 'dfghjk', 'cod', '1', 'delivered', '2021-01-15', '2021-01-15'),
(15, 3, 1, 41099, 0, '222', 'admin@gmail.com', '14545', 'cvnmk', 'cod', '0', 'confirmed', '2021-01-16', '2021-01-15'),
(16, 4, 1, 52100, 0, '22255', 'sbshimul000@gmail.com', '14545', 'dsfgh', 'cod', '0', 'cenceled', '0000-00-00', '2021-01-16'),
(17, 4, 1, 52100, 0, 'Sohorob', 'sohorob@gmail.com', '2222', 'mirpur', 'cod', '1', 'delivered', '2021-01-16', '2021-01-16'),
(18, 2, 4, 160100, 0, 'mahadi', 'mahadi@gmail.com', '222', 'london', 'cod', '1', 'delivered', '2021-01-16', '2021-01-16'),
(19, 4, 10, 520100, 0, 'Israfil', 'israfil@gmail.com', '2211', 'maxico', 'cod', '1', 'delivered', '2021-01-16', '2021-01-16'),
(20, 5, 5, 130095, 0, 'Sohorob ddd', 'sohorob@gmail.com', '2222', 'fdfdf', 'cod', '1', 'delivered', '2021-01-16', '2021-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(3) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qnt` int(20) NOT NULL,
  `product_img` varchar(20) NOT NULL,
  `catagory_id` int(3) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `font_camera` varchar(255) NOT NULL,
  `back_camera` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `rom` varchar(255) NOT NULL,
  `operating_system` varchar(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_qnt`, `product_img`, `catagory_id`, `battery`, `font_camera`, `back_camera`, `ram`, `rom`, `operating_system`, `processor`, `description`) VALUES
(1, 'Nokia 1.3', 10999, 50, '523977.jpg', 3, 'Lithium-polymer 4000 mAh', '8 Megapixel', '32 Megapixel', '3 GB', '32 GB', 'andriod 9.0', '1.4 octa core', '                    Nokia 2.3 comes with 6.2 inches HD+ screen. It has a a Full-View waterdrop-notch design. The back camera is of dual 13+2 MP with Autofocus, LED Flash, depth sensor etc. and Full HD video recording. The front camera is of 5 MP. Nokia 2.3 comes with 4000 mAh big battery. It has 2 GB RAM, 2.0 GHz quad-core CPU and PowerVR GE8320 GPU. It is powered by a Mediatek MT6761 Helio A22 (12 nm) chipset. The device comes with 32 GB internal storage and shared MicroSD slot. There is no fingerprint sensor in this phone.                        '),
(2, 'Galaxy-A80', 40000, 41, '95938.jpg', 1, 'Lithium-polymer 5200 mAh', '32 Megapixel', 'Dual 13+12 Megapixel', '6 GB', '64 GB', 'Android Pie v9.0', '2.4 Octa core', '                    Samsung-Galazy_A80 comes with 6.2 inches HD+ screen. It has a a Full-View waterdrop-notch design. The back camera is of dual 13+2 MP with Autofocus, LED Flash, depth sensor etc. and Full HD video recording. The front camera is of 5 MP. Nokia 2.3 comes with 4000 mAh big battery. It has 2 GB RAM, 2.0 GHz quad-core CPU and PowerVR GE8320 GPU. It is powered by a Mediatek MT6761 Helio A22 (12 nm) chipset. The device comes with 32 GB internal storage and shared MicroSD slot. There is no fingerprint sensor in this phone.                        '),
(3, 'Sony-Xperia-1', 40999, 16, '967395.jpg', 2, 'Lithium-polymer 3200 mAh', '13 Megapixel', 'Dual 13+12 Megapixel', '3 GB', '32 GB', 'andriod 10.0', '1.6 octa core', '                    Sony-Xperia-1 comes with 6.2 inches HD+ screen. It has a a Full-View waterdrop-notch design. The back camera is of dual 13+2 MP with Autofocus, LED Flash, depth sensor etc. and Full HD video recording. The front camera is of 5 MP. Nokia 2.3 comes with 4000 mAh big battery. It has 2 GB RAM, 2.0 GHz quad-core CPU and PowerVR GE8320 GPU. It is powered by a Mediatek MT6761 Helio A22 (12 nm) chipset. The device comes with 32 GB internal storage and shared MicroSD slot. There is no fingerprint sensor in this phone.                        '),
(4, 'Xiomi-Mi-10T-pro', 52000, 12, '873337.jpg', 4, 'Lithium-polymer 5200 mAh', '32 Megapixel', '32 Megapixel', '3 GB', '64 GB', 'Android Pie v9.0', '2.4 Octa core', '                                        Sony-Xperia-1 comes with 6.2 inches HD+ screen. It has a a Full-View waterdrop-notch design. The back camera is of dual 13+2 MP with Autofocus, LED Flash, depth sensor etc. and Full HD video recording. The front camera is of 5 MP. Nokia 2.3 comes with 4000 mAh big battery. It has 2 GB RAM, 2.0 GHz quad-core CPU and PowerVR GE8320 GPU. It is powered by a Mediatek MT6761 Helio A22 (12 nm) chipset. The device comes with 32 GB internal storage and shared MicroSD slot. There is no fingerprint sensor in this phone.                                                '),
(5, 'Redmi-Note-8', 25999, 21, '981551.jpg', 4, 'Lithium-polymer 5200 mAh', '32 Megapixel', 'Dual 32+12 Megapixel', '4 GB', '128 GB', 'andriod 10.0', '2.4 Octa core', ' Redmi-Note-8 comes with 6.2 inches HD+ screen. It has a a Full-View waterdrop-notch design. The back camera is of dual 13+2 MP with Autofocus, LED Flash, depth sensor etc. and Full HD video recording. The front camera is of 5 MP. Nokia 2.3 comes with 4000 mAh big battery. It has 2 GB RAM, 2.0 GHz quad-core CPU and PowerVR GE8320 GPU. It is powered by a Mediatek MT6761 Helio A22 (12 nm) chipset. The device comes with 32 GB internal storage and shared MicroSD slot. There is no fingerprint sensor in this phone.                        '),
(8, 'Redmi-K30-Ultra', 50000, 50, '617460.jpg', 4, '60000 Mah', '32 pixel', '64 pixel', '6 GB', '64 GB', 'android', 'Deca-core 2.6', 'This is Xiomi with 6.2 inches HD+ screen. It has a a Full-View waterdrop-notch design. The back camera is of dual 13+2 MP with Autofocus, LED Flash, depth sensor etc. and Full HD video recording. The front camera is of 5 MP. Nokia 2.3 comes with 4000 mAh big battery. It has 2 GB RAM, 2.0 GHz quad-core CPU and PowerVR GE8320 GPU. It is powered by a Mediatek MT6761 Helio A22 (12 nm) chipset. The device comes with 32 GB internal storage and shared MicroSD slot. There is no fingerprint sensor i\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` enum('N','Y') NOT NULL DEFAULT 'N',
  `token_code` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` int(20) NOT NULL DEFAULT 0,
  `points` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_status`, `token_code`, `role`, `status`, `points`) VALUES
(2, 'Shimul Hossain', '01738836990', '$2y$10$H8mw4zUBcPrXJNCTLmCpOunYSBL2Xm5LTy4aJcXeo1GVp.E6.v8gG', 'Y', '', 'user', 1, 0),
(3, 'Shimul Hossain', 'mahadi@gmail.com', '$2y$10$HG8EU9Wxj.CuZ6cIt23OGeq7bmG.zfX64BRXy5DDzZm8YSDhJXale', 'N', '', 'user', 0, 0),
(4, 'Shimul Hossain', '0173883699033', '$2y$10$ZIHsocGEKfRq1WQgWc/B2eOepOSDPM.kl1p1hoqJ4OAYxQIGPLpmW', 'N', '', 'user', 1, 0),
(5, 'Shimul Hossain', 'imran@gmail.com', '$2y$10$HLJCwCa.5.wOdQGLxrM/y.SBXh8U4dxsrsIXM8VvPiL01XI/EYtiy', 'N', '', 'user', 0, 0),
(6, 'Shimul Hossain', 'sujan222@gmail.com', '$2y$10$Y6eQl/WugL8xC2KRdbWo/.4Z9La7/LZgfMq0f9z/FTlAK5p2w7dq.', 'N', '', 'user', 1, 0),
(7, 'Shimul Hossain', 'sbshimul000@gmail.com66', '$2y$10$TVpMVrLtB9HP62nR3T22X.2Sr7eNizNRuIlkaNGMnT8Xf4cKmhElu', 'N', '', 'user', 0, 0),
(8, 'Shimul Hossain', 'sbshimuyyl000@gmail.com', '$2y$10$.mFI4RL09zKn/Hv6f5v5nu1QI/ZkFFrr58psuj.26KiystvoMWe42', 'N', '', 'user', 1, 0),
(9, 'arif', 'arif@gmail.com', '$2y$10$0Dy9KX.6oOa17Gpr8kBOyejaYSuzsti5UEQKK5jkGRIJIZo6d9iH2', 'N', '', 'user', 0, 0),
(12, 'Shimul Hossain', 'sujan2ddd22@gmail.com', '$2y$10$sTrH1.H291FssW9tQOTWbOScNPAg2nVrQHo2Ua7fhgaASUrq0bAA2', 'N', 'f87fe6a3c2bb520984bcddd7e963faf4', 'user', 1, 0),
(13, 'Shimul Hossain', 'sbshiddmul000@gmail.com', '$2y$10$4oKDsI3Z/BrZ9W9oaBo2feFUVJnlKDEM0Q93kFMv./wqgaqtQJfzG', 'N', '091ded6c702867d8f8a677e5ab366fda', 'user', 0, 0),
(21, 'Shimul Hossain', 'sbshimul000@gmail.com', '$2y$10$pRxMR9ug6oeYNTXQjEhso.N4FiZSBwyTjLF5OzGz.cIEEp7We4rde', 'Y', '7ac11eff167b2005ed4afb03668ff9df', 'user', 1, 0),
(22, 'mahadi', 'mahadi2se@gmail.com', '$2y$10$xMjrQ1XMQLm78ZyBjxGXXe5b6uQzRCjg.s/NxVk5F6/kAATIBY4xi', 'N', 'd7d7c0276eddddf6032af5f5545cac64', 'user', 0, 0),
(23, 'Admin', 'admin@gmail.com', '$2y$10$iWeIGhb91QqFs9GmCPs5mu4IrLcxzPqp4LMirQf1udJn403YKgktm', 'Y', '81691b072bc08a116b80125c5c4a8be4', 'admin', 1, 0),
(24, 'mahadi', 'sbstrtrhimul000@gmail.com', '$2y$10$8zuAmWL5r1eB4gpzyjR2iukKeis03CvU6uRzcO.Zf9rqwgwIMdha6', 'N', 'ba83c8525b3b43c83a7264e69c64dc63', 'user', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
