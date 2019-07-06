-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 05:19 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `allartist` ()  SELECT * FROM artist$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `allorders` ()  SELECT * FROM orders$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'pareshan@gmail.com', 'pareshan'),
(2, 'qq@gmail.com', 'qq');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(100) NOT NULL,
  `artist_name` varchar(200) NOT NULL,
  `artist_phone` int(100) NOT NULL,
  `artist_location` varchar(200) NOT NULL,
  `artist_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_phone`, `artist_location`, `artist_email`) VALUES
(6, 'John Opera ', 123466, 'Sweden', 'jopera@gmail.com'),
(7, 'Whitney Scott', 12355456, 'Italy', 'wscott@gmail.com'),
(8, 'Sefe Abe', 236645, 'Japan', 'sabe@gmail.com'),
(9, 'Ralph Watt', 45686, 'Paris', 'rwatt@gmail.com'),
(10, 'Sofia Minner', 56895, 'England', 'sminner@gmail.com'),
(11, 'Anna Dolf', 849565, 'Russia', 'adolf@gmail.com'),
(12, 'Justin Musoo', 455666, 'Canada', 'jmusoo@gmail.com'),
(13, 'Garret Wilton', 78945, 'New York', 'gwilton@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `painting_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Abstract Art'),
(2, 'Representational Art'),
(3, 'Figure Art'),
(4, 'History Art'),
(5, 'Portrait Art'),
(6, 'Genre Art'),
(7, 'Landscape Art'),
(9, 'Still Life Art'),
(14, 'Modern Art');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(100) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_ip`, `customer_email`, `customer_password`, `customer_name`, `address`, `phone`) VALUES
(1, '::1', 'abc@gmail.com', '123', 'rai yang', 'street1', 456234);

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `drr` AFTER DELETE ON `customer` FOR EACH ROW UPDATE orders SET customer_id=null WHERE old.customer_id=customer_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `gallery_id` int(100) NOT NULL,
  `gallery_name` text NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`gallery_id`, `gallery_name`, `location`) VALUES
(2, 'Egypt Art Galleryy', 'Cario, Egypt'),
(3, 'Berlin Art Gallery', 'Berlin, Germany'),
(4, 'Indian Art Gallery', 'Mumbai, India');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `customer_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `painting_id` int(100) NOT NULL,
  `amount` int(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`customer_id`, `order_id`, `painting_id`, `amount`, `Address`, `date`) VALUES
(1, 18, 6, 500, 'street1', '2018-11-12 18:38:26'),
(1, 19, 18, 356, 'street1', '2018-11-13 07:19:37'),
(1, 21, 12, 255, 'street1', '2018-11-13 07:23:07'),
(1, 22, 17, 265, 'street1', '2018-11-17 20:02:53'),
(1, 24, 9, 256, 'street1', '2018-11-17 20:04:55'),
(1, 25, 8, 198, 'street1', '2018-11-19 18:49:13'),
(1, 28, 5, 456, 'street1', '2018-11-19 18:50:11'),
(1, 31, 3, 300, 'street1', '2018-11-19 19:19:31'),
(1, 32, 4, 199, 'street1', '2018-11-19 19:20:06'),
(1, 33, 15, 456, 'street1', '2018-11-24 06:55:06');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `dele` AFTER INSERT ON `orders` FOR EACH ROW DELETE FROM painting WHERE NEW.painting_id=painting_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `painting`
--

CREATE TABLE `painting` (
  `painting_id` int(100) NOT NULL,
  `painting_cat` int(100) NOT NULL,
  `artist_id` int(100) NOT NULL,
  `painting_title` varchar(255) NOT NULL,
  `painting_price` int(100) NOT NULL,
  `gallery_id` int(100) NOT NULL,
  `painting_desc` text NOT NULL,
  `painting_image` text NOT NULL,
  `painting_displaydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `painting_keywords` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `painting`
--

INSERT INTO `painting` (`painting_id`, `painting_cat`, `artist_id`, `painting_title`, `painting_price`, `gallery_id`, `painting_desc`, `painting_image`, `painting_displaydate`, `painting_keywords`) VALUES
(7, 2, 11, 'The Serenity of Heart', 147, 2, '<p><em><strong>The serenity of heart can only be vanished with right amount of time in ones life which can be relative to many constrainst present in drama of life from person to person.</strong></em></p>', 'r1.jpg', '2018-11-12 15:16:30', 'reprensentational, anna dolf, serenity, egypt, road,man'),
(11, 2, 7, 'Miles To Go', 235, 2, '<p><em><strong>Brace your hearts to cover million miles.</strong></em></p>', 'rep4.jpg', '2018-11-12 16:59:24', 'representational,egypt, cycles,miles,whitney'),
(13, 3, 9, 'The Broad Edges', 147, 4, '<p><em><strong>Think as much as you can.</strong></em></p>', 'fig5.jpg', '2018-11-12 17:04:40', 'figure,mind,ralph,indian'),
(16, 5, 12, 'The Oldage', 189, 3, '<p><em><strong>The time is the lord.</strong></em></p>', 'pot4.jpg', '2018-11-12 17:13:24', 'potrait,justin,oldage,berlin'),
(20, 14, 8, 'The Aura', 265, 3, '<p><em><strong>Like if you like.</strong></em></p>', 'mod5.jpg', '2018-11-12 17:21:38', 'modern,sefe,berlin,aura,women');

--
-- Triggers `painting`
--
DELIMITER $$
CREATE TRIGGER `dete` AFTER DELETE ON `painting` FOR EACH ROW DELETE FROM cart WHERE old.painting_id=painting_id
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`painting_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `c3` (`customer_id`);

--
-- Indexes for table `painting`
--
ALTER TABLE `painting`
  ADD PRIMARY KEY (`painting_id`),
  ADD KEY `c1` (`artist_id`),
  ADD KEY `c2` (`gallery_id`),
  ADD KEY `c4` (`painting_cat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `gallery_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `painting`
--
ALTER TABLE `painting`
  MODIFY `painting_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `painting`
--
ALTER TABLE `painting`
  ADD CONSTRAINT `c1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `c2` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`gallery_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `c4` FOREIGN KEY (`painting_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
