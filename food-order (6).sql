-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 07:32 AM
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
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(34, 'Head', 'hakuna matata', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(7, 'Pizza', 'Food_Category_395.jpg', 'Yes', 'Yes'),
(15, 'burger', 'Food_Category_27.jpg', 'Yes', 'Yes'),
(16, 'desserts', 'Food_Category_257.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(11, 'Cheesy Moroccan Pizza', 'Cheesy pizza made with freshly peeled tomatoes and spiced herbs', '290.00', 'Food-Name-196.jpg', 7, 'Yes', 'Yes'),
(12, 'Pancakes', 'Light and fluffy pancakes made with fresh and juicy selected blueberries', '175.00', 'Food-Name-935.png', 16, 'Yes', 'Yes'),
(13, 'ISM Special Burger', 'Made with Italian sauce and organic vegetables,garnished with fresh coriander', '125.00', 'Food-Name-744.jpg', 15, 'Yes', 'Yes'),
(14, 'Virgin Mojito', 'Brimming with fresh mint,fresh lime juice,club soda and plenty of ice!', '115.00', 'Food-Name-771.jpg', 16, 'Yes', 'Yes'),
(15, 'Pani Puri', 'fried puri stuffed with onions,coriander and a  mixture of dal with spices served with  water', '50.00', 'Food-Name-174.jpg', 15, 'Yes', 'Yes'),
(16, 'Momos', 'Delicious bite-sized dumplings made with a spoonful of stuffing wrapped in dough', '120.00', 'Food-Name-668.jpg', 15, 'Yes', 'Yes'),
(17, 'Doughnut', 'A comfort dessert that tastes absolutely divine,made from leavened fried dough', '80.00', 'Food-Name-701.jpg', 16, 'Yes', 'No'),
(20, 'Strawberry icecream shake', 'A milkshake made with strawberries, whipped cream and filled with secrets', '150.00', 'Food-Name-998.jpg', 16, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `id`) VALUES
('Strawberry icecream shake', '150.00', 2, '300.00', '2022-11-19 06:25:58', 'Ordered', 'Nitya', '9876524310', 'nitya@gmail.com', 'Hyd', 26),
('Momos', '120.00', 1, '120.00', '2022-11-19 06:32:56', 'Ordered', 'nitya', '9297257339', 'nitya@gmail.com', 'Hyd', 27),
('Virgin Mojito', '115.00', 1, '115.00', '2022-11-19 06:54:43', 'Ordered', 'nitya', '9297257339', 'nitya@gmail.com', 'Hyd', 28),
('Virgin Mojito', '115.00', 1, '115.00', '2022-11-19 06:56:10', 'Ordered', 'nitya', '9297257339', 'nitya@gmail.com', 'Hyd', 29),
('Virgin Mojito', '115.00', 1, '115.00', '2022-11-19 06:56:19', 'Ordered', 'nitya', '8451320.', 'nitya@gmail.com', 'Hyd', 30),
('Virgin Mojito', '115.00', 1, '115.00', '2022-11-19 06:59:35', 'Ordered', 'nitya', '8451320.', 'nitya@gmail.com', 'Hyd', 31),
('Virgin Mojito', '115.00', 1, '115.00', '2022-11-19 06:59:52', 'Ordered', 'Aditya Sinha', '13', '20je0673@cse.iitism.ac.in', '8978465130', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
