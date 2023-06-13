-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 05:21 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `district` varchar(100) NOT NULL,
  `subdistrict` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address_card` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`district`, `subdistrict`, `city`, `address_card`) VALUES
('vnvn', 'ssddd', 'cvb', 1000000000000017),
('ddddd', 'ffff', 'wer', 1000000000000018),
('cox', 'ramu', 'palong', 1000000000000020),
('chittagong', 'hathazari', 'Jobra', 1000000000000021),
('Chittagong', 'Hathazari', 'Fatehpur', 1000000000000024),
('Chittagong', 'Hathazari', 'Fatehpur', 1000000000000025),
('Chittagong', 'Chittagong Sadar', 'Chawk Bazar', 1000000000000026),
('Chittagong', 'Sitakunda', 'Bhatiari', 1000000000000027),
('Chittagong', 'Hathazari', 'Fatehpur', 1000000000000029),
('Cox\'s Bazar', 'Cox', 'Naniarchar', 1000000000000031),
('Cox\'s Bazar', 'Cox', 'Burighat', 1000000000000032),
('Cox\'s Bazar', 'Cox', 'Naniarchar', 1000000000000033),
('Cox\'s Bazar', 'Ramu', 'Khunia palong', 1000000000000034),
('Chittagong', 'Hathazari', 'Forhadabad', 1000000000000035);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Monir', 'ahmad@gmail.com', 'a906449d5769fa7361d7ecc6aa3f6d28');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'bata'),
(2, 'asus'),
(3, 'del'),
(4, 'samsung'),
(5, 'iphone'),
(6, 'oppo'),
(7, 'rich man');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(9, 'Daisy'),
(10, 'Dandelion'),
(11, 'Rose'),
(12, 'Sunflower'),
(13, 'Tulip');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `s_id`, `name`) VALUES
(1, 1, 'Chawk Bazar'),
(2, 1, 'Anderkilla'),
(3, 2, 'Fatehpur'),
(4, 2, 'Forhadabad'),
(5, 3, 'Bhatiari'),
(6, 3, 'Kumira'),
(7, 4, 'Khurushkul'),
(8, 4, 'Islampur'),
(9, 5, 'Chakmarkul'),
(10, 5, 'Khunia palong'),
(11, 6, 'Haldia Palong'),
(12, 6, 'Raja Palong'),
(13, 7, 'Nhila'),
(14, 7, 'St.Martin Dwip'),
(15, 8, 'Balukhali'),
(16, 8, 'Kutukchari'),
(17, 9, 'Chandraghona'),
(18, 9, 'Chitmorom'),
(19, 10, 'Naniarchar'),
(20, 10, 'Burighat');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Chittagong'),
(2, 'Cox\'s Bazar'),
(3, 'Rangamati');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `userID` int(11) NOT NULL,
  `prdID` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `Dislikes` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply` varchar(1000) NOT NULL,
  `reply_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`userID`, `prdID`, `likes`, `Dislikes`, `rating`, `comment`, `comment_date`, `reply`, `reply_time`) VALUES
(2, 35, 1, 0, 2, 'okkkkkkkk', '2023-01-12 16:53:16', '', '2023-01-10 08:50:09'),
(2, 36, 0, 1, 5, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(2, 37, 0, 0, 1, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(2, 41, 0, 1, 1, 'Beauty of Dandelion...asdf', '2023-01-12 16:55:09', '', '2023-01-10 08:50:09'),
(2, 40, 0, 0, 4, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(2, 55, 0, 1, 4, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(2, 56, 1, 0, 3, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(2, 57, 0, 1, 3, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(2, 45, 0, 0, 3, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(3, 35, 1, 0, 3, 'Oh, this product is not so good.', '2023-01-12 02:28:35', '', '2023-01-10 08:50:09'),
(3, 41, 0, 0, 0, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(3, 45, 1, 0, 0, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(3, 56, 1, 0, 0, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(3, 50, 1, 0, 0, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(3, 55, 0, 0, 0, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(2, 50, 1, 0, 3, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(2, 51, 0, 0, 2, '', '2023-01-10 08:49:31', '', '2023-01-10 08:50:09'),
(3, 36, 0, 0, 4, 'hello', '2023-01-11 17:31:47', '', '2023-01-11 15:38:11'),
(2, 46, 1, 0, 2, '', '2023-06-12 00:10:51', '', '2023-06-12 00:10:51'),
(2, 47, 1, 0, 0, '', '2023-06-12 00:11:30', '', '2023-06-12 00:11:30'),
(2, 52, 0, 1, 0, '', '2023-06-12 00:11:57', '', '2023-06-12 00:11:57'),
(2, 60, 1, 0, 4, '', '2023-06-12 01:11:35', '', '2023-06-12 01:11:35'),
(2, 42, 0, 0, 3, '', '2023-06-12 01:31:23', '', '2023-06-12 01:31:23'),
(21, 58, 1, 0, 3, 'It looks good', '2023-06-13 00:11:07', '', '2023-06-13 00:10:16'),
(21, 59, 0, 0, 2, 'Hello, This tulip are loos awesome', '2023-06-13 00:12:12', '', '2023-06-13 00:11:46'),
(21, 61, 0, 1, 4, '', '2023-06-13 03:43:38', '', '2023-06-13 03:43:38'),
(21, 56, 0, 1, 5, '', '2023-06-13 05:00:24', '', '2023-06-13 05:00:24'),
(21, 41, 0, 0, 2, '', '2023-06-13 05:00:50', '', '2023-06-13 05:00:50'),
(21, 51, 1, 0, 2, '', '2023-06-13 05:00:55', '', '2023-06-13 05:00:55'),
(21, 57, 0, 1, 5, '', '2023-06-13 05:01:05', '', '2023-06-13 05:01:05'),
(21, 52, 0, 0, 4, '', '2023-06-13 05:01:19', '', '2023-06-13 05:01:19'),
(21, 50, 1, 0, 4, '', '2023-06-13 05:01:21', '', '2023-06-13 05:01:21'),
(21, 55, 0, 1, 3, '', '2023-06-13 05:05:01', '', '2023-06-13 05:05:01'),
(21, 60, 0, 1, 5, '', '2023-06-13 14:10:23', '', '2023-06-13 14:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_info_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `p_id`, `qty`, `order_info_id`) VALUES
(1920, 46, 2, 1000000000000025),
(1921, 60, 1, 1000000000000025),
(1922, 36, 1, 1000000000000026),
(1923, 58, 1, 1000000000000027),
(1924, 59, 1, 1000000000000029),
(1925, 60, 2, 1000000000000031),
(1926, 59, 1, 1000000000000032),
(1927, 60, 1, 1000000000000032),
(1928, 60, 1, 1000000000000033),
(1929, 59, 1, 1000000000000034),
(1930, 61, 1, 1000000000000035);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `cardnumber` bigint(17) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pmode` varchar(100) NOT NULL,
  `date` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`cardnumber`, `user_id`, `phone`, `pmode`, `date`, `status`) VALUES
(1000000000000025, 2, '01690073321', 'cod', '2023-06-12', 'ordered'),
(1000000000000026, 2, '01690073', 'bKash', '2023-06-12', 'ordered'),
(1000000000000027, 2, '1690073321', 'bKash', '2023-06-12', 'ordered'),
(1000000000000029, 2, '01690073321', 'bKash', '2023-06-12', 'ordered'),
(1000000000000031, 21, '01690073321', 'bKash', '2023-06-13', 'ordered'),
(1000000000000032, 21, '01690073321', 'bKash', '2023-06-13', 'ordered'),
(1000000000000033, 21, '01690073321', 'bKash', '2023-06-13', 'ordered'),
(1000000000000034, 21, '01690073321', 'bKash', '2023-06-13', 'ordered'),
(1000000000000035, 21, '01690073321', 'Nagad', '2023-06-13', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_title`, `product_price`, `product_image`, `description`) VALUES
(36, 9, 'Daisy 02', 200, 'Daisy (2).jpg', 'ddddddd'),
(37, 9, 'Daisy 030', 302, 'Daisy 030.jpg', 'gggggg'),
(38, 9, 'Daisy 04', 150, 'Daisy (4).jpg', 'fdertttttttt'),
(39, 9, 'Daisy 05', 150, 'Daisy (5).jpg', 'fdertttttttt'),
(40, 10, 'Dandelion 01', 100, 'Dandelion (1).jpg', 'dddddddddddd'),
(41, 10, 'Dandelion 02', 200, 'Dandelion (2).jpg', 'ddddddd'),
(42, 10, 'Dandelion 03', 300, 'Dandelion (3).jpg', 'gggggg'),
(44, 10, 'Dandelion 05', 150, 'Dandelion (5).jpg', 'fdertttttttt'),
(45, 11, 'Rose 01', 100, 'Rose (1).jpg', 'dddddddddddd'),
(46, 11, 'Rose 02', 100, 'Rose (2).jpg', 'ddddddd'),
(47, 11, 'Rose 03', 300, 'Rose (3).jpg', 'gggggg'),
(48, 11, 'Rose 04', 150, 'Rose (4).jpg', 'fdertttttttt'),
(49, 11, 'Rose 05', 150, 'Rose (5).jpg', 'fdertttttttt'),
(50, 12, 'Sunflower 01', 100, 'Sunflower (1).jpg', 'dddddddddddd'),
(51, 12, 'Sunflower 02', 100, 'Sunflower (2).jpg', 'ddddddd'),
(52, 12, 'Sunflower 03', 300, 'Sunflower (3).jpg', 'gggggg'),
(53, 12, 'Sunflower 04', 150, 'Sunflower (4).jpg', 'fdertttttttt'),
(54, 12, 'Sunflower 05', 150, 'Sunflower (5).jpg', 'fdertttttttt'),
(55, 13, 'Tulip 01', 100, 'Tulip (1).jpg', 'dddddddddddd'),
(56, 13, 'Tulip 02', 100, 'Tulip (2).jpg', 'ddddddd'),
(57, 13, 'Tulip 03', 300, 'Tulip (3).jpg', 'gggggg'),
(58, 13, 'Tulip 04', 150, 'Tulip (4).jpg', 'fdertttttttt'),
(59, 13, 'Tulip 05', 150, 'Tulip (5).jpg', 'fdertttttttt'),
(60, 9, 'Daisy22', 100, 'Daisy22.jpg', 'hello'),
(61, 12, 'SunFlower00', 100, 'SunFlower00.jpg', 'sunflower');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`num`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `subdistrict`
--

CREATE TABLE `subdistrict` (
  `id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subdistrict`
--

INSERT INTO `subdistrict` (`id`, `d_id`, `name`) VALUES
(1, 1, 'Chittagong Sadar'),
(2, 1, 'Hathazari'),
(3, 1, 'Sitakunda'),
(4, 2, 'Sadar'),
(5, 2, 'Ramu'),
(6, 2, 'Teknaf'),
(7, 2, 'Ukhia'),
(8, 3, 'Rangamati Sadar'),
(9, 3, 'Kaptai'),
(10, 3, 'Naniarchar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `verification_code` varchar(10) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `verification_code`, `email_verified_at`) VALUES
(1, 'Monir', 'ahhh@gmail.com', 'e8dc4081b13434b45189a720b77b6818', '', NULL),
(2, 'asdf', 'asdf1234@gmail.com', '1adbb3178591fd5bb0c248518f39bf6d', '', NULL),
(3, 'monir1', 'monir1@gmail.com', '7c1adec8cb2cdf918139ff008923836e', '', NULL),
(21, 'Monir Ahmad', 'ahmad.csecu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '274468', '2023-06-12 21:40:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD UNIQUE KEY `address_card` (`address_card`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`cardnumber`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subdistrict`
--
ALTER TABLE `subdistrict`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1932;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `cardnumber` bigint(17) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000000000038;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `subdistrict`
--
ALTER TABLE `subdistrict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
