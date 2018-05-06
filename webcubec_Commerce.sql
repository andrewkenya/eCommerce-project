-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2018 at 08:42 AM
-- Server version: 5.5.56-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcubec_Commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'andrewthiarara@gmail.com', 'Appsmoment'),
(2, 'user@mail.com', 'mail');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(4, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(8, 'FAMILY,LIVING ROOM-ACCENT STORAGE & CHEST'),
(9, 'DINING & KITCHEN'),
(10, 'BEDROOMS'),
(11, 'ENTRYWAY'),
(12, 'HOME OFFICE'),
(13, 'LIGHTING,PILLOW & MORE');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(3, '::1', 'Antonio', 'antonio@gmail.com', 'antonio', 'Nepal', 'nepal', '2222222222', '11111 nepal', 'Anto-Neosoul.jpg'),
(5, '::1', 'ken', 'ken@yahoo.com', 'ken', 'India', 'indian', '5555555', '4141 uu', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `design_id` int(100) NOT NULL,
  `design_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`design_id`, `design_title`) VALUES
(3, 'Table'),
(5, 'Drawers'),
(11, 'Bookcases');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `order_date` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_design` int(100) NOT NULL,
  `product_title` text NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_design`, `product_title`, `product_price`, `product_desc`, `product_img1`, `product_keywords`) VALUES
(10, 8, 5, 'Athens Iron & Wooden Console', 822, '<p>Visala Media Stand</p>', '202630_large.jpg', 'Wooden Console'),
(11, 8, 5, 'Carla 4 Door Locker', 770, '<p>A Carla 4 Door Locker,Blackorder now!</p>', 'Door Locker.jpg', 'Door Locker'),
(12, 8, 5, 'Diesel Iron 6 Drawer Chest', 223, '<p>Diesel Iron 6 Drawer Chest</p>', 'Diesel.jpg', ' Iron 6 Drawer'),
(13, 0, 5, 'Iron Suitcase', 933, '<p>A Iron Suitcase, 10 Drawer</p>', 'Iron Suitcase.jpg', '10 Drawer Suitcase'),
(14, 8, 5, '8 Drawer Console, Natural Limewash', 313, '<p>A&nbsp;8 Drawer Console, Natural Limewash</p>', '202630_large.jpg', 'Drawer,Living Room'),
(15, 8, 11, 'Antique Barrister Bookcase, Natural', 987, '<p>Antique Barrister Bookcase</p>', 'Antique Bookcase.jpg', ' Barrister '),
(17, 8, 11, 'Bedford Library Shelves, Rustic Gray Wash', 547, '<p>Bedford Library Shelves, Rustic Gray Wash</p>', 'Rustic.jpg', 'Rustic Gray Wash Shelves'),
(18, 8, 11, 'Charlotte Bookcase', 117, '<p>Charlotte Bookcase 39\", Glacier Gray</p>', 'Charlotte_Bookcase.jpg', 'Bookcase 39'),
(19, 0, 11, ' Mansfield Iron Bookshelf', 1596, '<p>Mansfield Iron Bookshelf</p>', 'Mansfield.jpg', 'Mansfield  Bookshelf'),
(20, 8, 11, 'Reynolds Ladder Bookshelf', 266, '<p>Reynolds Ladder Bookshelf</p>', 'Bookladder.jpg', 'Reynolds Ladder '),
(22, 8, 3, 'Table, Antique Bronze', 95, '<p>Table, Antique Bronze classic coffee tables</p>', 'Antique Bronze.jpg', ' Antique Bronze'),
(23, 8, 3, 'Alenka Stump, Honey', 158, '<p>Alenka Stump, Honey&nbsp;Side-Tables-&amp;-Coffee-Tables</p>', 'Alenka Stump.jpg', 'Side-Tables-&-Coffee-Tables'),
(24, 8, 3, 'Live Edge Side Table', 98, '<p>Atlas Live Edge Side Table, Walnut</p>', 'End_Table_Walnut.jpg', 'Live Edge Side Table, Walnut'),
(25, 8, 3, 'Bedford Side Table, Rustic Tobacco ', 212, '<h2 style=\"font-weight: 400; margin: 1px 0px; font-family: Lato, sans-serif, Georgia, serif; font-size: 0.813em; line-height: 1.3; color: #666666;\"><strong><span style=\"color: #666666; font-family: Lato, sans-serif, Georgia, serif;\"><span style=\"font-size: 8.943px;\">Bedford Side Table, Rustic Tobacco&nbsp;</span></span></strong></h2>\r\n<p class=\"price\" style=\"font-family: Lato, sans-serif, Georgia, serif; margin: 0px; font-size: 0.73em; color: #4e4e4e; zoom: 1; -webkit-font-smoothing: antialiased;\"><span class=\"price_dollar_collection\" style=\"font-size: 8.541px; vertical-align: top; position: relative; top: 3px;\">&nbsp;</span></p>', 'Lake_View_Side_Table.jpg', 'Bedford Table, Rustic Tobacco '),
(26, 8, 3, 'Aurora Accent Table', 247, '<p>Aurora Accent Table, Dark Brown</p>', 'Aurora Accent Table.jpg', 'Aurora Accent Table,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`design_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `design_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
