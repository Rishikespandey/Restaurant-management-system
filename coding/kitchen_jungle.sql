-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 06:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitchen jungle`
--

-- --------------------------------------------------------

--
-- Table structure for table `chinese`
--

CREATE TABLE `chinese` (
  `ID` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Price` int(10) NOT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chinese`
--

INSERT INTO `chinese` (`ID`, `Name`, `Price`, `icon`) VALUES
(5, 'Hakka Noodles', 90, 'noodle.jpg'),
(6, 'Gravi Munchurian', 120, 'gravi.jpg'),
(7, 'Fried Rice', 100, 'fried.jpg'),
(8, 'Spring Roll', 140, 'spring.jpg'),
(9, 'Tandoori Momos', 160, 'tundri.jpg'),
(10, 'Cheese Roll', 120, 'cheese.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Contact_us_id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Help` varchar(100) NOT NULL,
  `Subject` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Contact_us_id`, `Name`, `Email`, `Help`, `Subject`, `Date`) VALUES
(1, 'Amit', 'as@gmai.com', '', 'hlo', '2021-12-14 00:00:00'),
(15, 'aman', 'aman@gmail.com', 'I need help with my online order', 'write something\r\n', '2022-01-10 00:00:00'),
(16, 'aman', 'aman@gmail.com', 'I need help with my online order', 'write something\r\n', '2022-01-10 00:00:00'),
(17, 'aman', 'aman@gmail.com', 'I need help with my online order', 'write something\r\n', '2022-01-10 21:16:18'),
(18, 'aman', 'aman@gmail.com', 'I need help with my online order', 'write something\r\n', '2022-01-10 21:17:28'),
(19, 'aman', 'aman@gmail.com', 'I need help with my online order', 'write something\r\n', '2022-01-10 21:17:59'),
(20, 'aman', 'aman@gmail.com', 'I need help with my online order', 'write something\r\n', '2022-01-10 21:18:24'),
(21, 'aman', 'aman@gmail.com', 'I need help with my online order', 'write something\r\n', '2022-01-10 21:18:25'),
(22, 'aman', 'aman@gmail.com', 'I need help with my online order', 'write something\r\n', '2022-01-10 21:18:28'),
(23, 'aman', 'aman@gmail.com', 'I need help with my online order', 'ascasc', '2022-01-10 21:23:33'),
(24, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:23:57'),
(25, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:24:33'),
(26, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:25:11'),
(27, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:26:00'),
(28, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:26:02'),
(29, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:26:36'),
(30, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:28:41'),
(31, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:29:23'),
(32, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:29:24'),
(33, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:29:57'),
(34, 'aman', 'ASX@GMAIL.COM', 'There is a photo/review that is bothering me and I would like to report it.', 'cacadcaca', '2022-01-10 21:29:58'),
(35, 'aman', 'ASX@GMAIL.COM', 'I found incorrect/outdated information on a page', 'asdasdasd', '2022-01-10 21:31:18'),
(36, 'aman', 'ASX@GMAIL.COM', 'I found incorrect/outdated information on a page', 'asdasdasd', '2022-01-10 21:31:26'),
(37, 'Hlo', 'aman@gmail.com', 'I found incorrect/outdated information on a page', 'found', '2022-01-11 12:59:21'),
(38, 'test1', 'aman@gmail.com', 'I need help with my online order', 'sdv', '2022-01-11 13:01:17'),
(39, 'test2', 'aman@gmail.com', 'I need help with my online order', 'sdfd', '2022-01-11 13:03:40'),
(40, 'aman', 'ASX@GMAIL.COM', 'I need help with my online order', 'sad', '2022-01-11 13:05:19'),
(41, 'aman', 'aman@gmail.com', 'I need help with my online order', 'ascas', '2022-01-11 13:06:09'),
(42, 'aman', 'aman@gmail.com', 'I need help with my online order', 'asxas', '2022-01-11 13:09:02'),
(43, 'test1', 'ASX@GMAIL.COM', 'I need help with my online order', 'test1', '2022-01-11 13:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `kj`
--

CREATE TABLE `kj` (
  `CustomerID` int(20) NOT NULL,
  `Name` text NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kj`
--

INSERT INTO `kj` (`CustomerID`, `Name`, `Phone`, `Email`, `Password`, `Date`) VALUES
(63, 'Aman Verma', '1111111111', 'ks168937@gmail.com', 'Aman123', '2021-10-21'),
(85, 'test', '9876543210', 'amanverma2545@gmail.com', '$2y$10$IWfHH10YmTehvkf.Y7rMpuPgo6nQW2w35s/cGLU0/7wT885tjwfw6', '2022-01-12'),
(86, 'Aman Verma', '6280851068', 'aman12@gmail.com', '$2y$10$Y/NdTjrm2bfRx2YsDHc5n.482TzVUxKmfI9GVg5kdF214jw8XnGZm', '2022-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Menuid` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(20) NOT NULL,
  `Icon` text NOT NULL,
  `Categories` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Menuid`, `Name`, `Price`, `Icon`, `Categories`) VALUES
(2, 'Panner Butter Masala', 150, 'panner.jpeg', 'veg'),
(3, 'Champ Gravy', 150, 'champ.jpg', 'veg'),
(4, 'Dal Makhani', 120, 'Dal-Makhani.jpg', 'veg'),
(5, 'Dum Aloo', 140, 'dum.jpg', 'veg'),
(6, 'Mix. Veg', 130, 'mix.jpg', 'veg'),
(7, 'Malai Kofta', 130, 'malli.jpg', 'veg'),
(8, 'Afghani chicken', 360, 'af.jpg', 'non-veg'),
(9, 'Butter chicken', 320, 'butter.jpg', 'non-veg'),
(10, 'Chilli Chicken', 320, 'chicken.jpg', 'non-veg'),
(11, 'Kadai Chicken', 420, 'kd.jpg', 'non-veg'),
(12, 'Mutton', 620, 'mutton.jpg', 'non-veg'),
(13, 'Pop Fish', 720, 'fish.jpg', 'non-veg'),
(14, 'Hakka Noodles', 90, 'noodle.jpg', 'chinese'),
(15, 'Gravi Munchurian', 120, 'gravi.jpg', 'chinese'),
(16, 'Fried Rice', 100, 'fried.jpg', 'chinese'),
(17, 'Spring Roll', 140, 'spring.jpg', 'chinese'),
(18, 'Tandoori Momos', 160, 'tundri.jpg', 'chinese'),
(19, 'Cheese Roll', 120, 'cheese.jfif', 'chinese'),
(25, 'Chhana', 150, 'channa.jpg', 'cheese'),
(26, 'Bandel', 140, 'bandel.jpg', 'cheese'),
(27, 'Kalari', 170, 'kalari.jpg', 'cheese'),
(28, 'Kalimpong Cheese', 165, 'Kalimpong Cheese.jpg', 'cheese'),
(29, 'Khoya', 140, '7. Khoya.jpg', 'cheese'),
(30, ' Cheese Tikka ', 220, 'Cheese Tikka.jpg', 'cheese'),
(31, 'Farmhouse', 420, '1.jpg', 'pizza'),
(32, 'Veggie Paradise', 360, '2.jpg', 'pizza'),
(33, 'Veg Extravaganza', 400, '3.jpg', 'pizza'),
(34, 'Mexican Green Wave', 420, '4.jpg', 'pizza'),
(35, 'Cheese n Corn', 309, '5.jpg', 'pizza'),
(36, 'Cheese n Tomato', 320, '6.jpg', 'pizza'),
(37, 'Almond Malai Kulf', 250, 'kulfi.jpg', 'desert'),
(38, 'Pistachio Phirni', 280, '4. Pistachio Phirni.jpg', 'desert'),
(39, 'Fudgy Chewy Brown', 270, '5. Fudgy Chewy Brownies.jpg', 'desert'),
(40, 'Chocolate Coffee ', 290, '8. Chocolate Coffee Truffle.jpg', 'desert'),
(41, 'Hot Cointreau Sou', 250, '9. Hot Cointreau Souffle.jpg', 'desert'),
(42, 'Tawa Ice Cream', 250, 'ice cream.jpg', 'desert');

-- --------------------------------------------------------

--
-- Table structure for table `non-veg`
--

CREATE TABLE `non-veg` (
  `id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Price` int(10) NOT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `non-veg`
--

INSERT INTO `non-veg` (`id`, `Name`, `Price`, `icon`) VALUES
(1, 'Afghani chicken', 360, 'af.jpg'),
(2, 'Butter chicken', 320, 'butter.jpg'),
(3, 'Chilli Chicken', 320, 'chicken.jpg'),
(4, 'Kadai Chicken', 420, 'kd.jpg'),
(5, 'Mutton', 620, 'mutton.jpg'),
(6, 'Pop Fish', 720, 'fish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(20) NOT NULL,
  `CustomerID` int(20) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `CustomerID`, `Amount`, `Date`, `Payment_status`) VALUES
(22, 63, 640, '2022-01-08 19:14:07', 1),
(23, 63, 4130, '2022-01-09 18:01:29', 1),
(24, 63, 5940, '2022-01-12 10:55:51', 1),
(25, 86, 1810, '2022-01-12 14:14:55', 1),
(26, 86, 4560, '2022-01-12 17:49:40', 1),
(27, 86, 320, '2022-01-12 17:52:50', 0),
(28, 86, 150, '2022-01-12 22:49:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_order`
--

CREATE TABLE `sub_order` (
  `OrderID` int(20) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `Price` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_order`
--

INSERT INTO `sub_order` (`OrderID`, `Item_name`, `Price`, `Quantity`) VALUES
(22, 'Butter chicken', 320, 1),
(22, 'Chilli Chicken', 320, 1),
(23, 'Hakka Noodles', 90, 2),
(23, 'Gravi Munchurian', 120, 14),
(23, 'Afghani chicken', 360, 5),
(23, 'Butter chicken', 320, 1),
(23, 'Panner Butter Masala', 150, 1),
(24, 'Bandel', 140, 10),
(24, 'Dal Makhani', 120, 10),
(24, 'Butter chicken', 320, 1),
(24, 'Chilli Chicken', 320, 1),
(24, 'Kadai Chicken', 420, 1),
(24, 'Spring Roll', 140, 1),
(24, 'Chhana', 150, 1),
(24, 'Farmhouse', 420, 1),
(24, 'Veggie Paradise', 360, 1),
(24, ' Cheese Tikka ', 220, 1),
(24, 'Kalari', 170, 1),
(24, 'Pistachio Phirni', 280, 1),
(24, 'Almond Malai Kulf', 250, 1),
(24, 'Chocolate Coffee ', 290, 1),
(25, 'Panner Butter Masala', 150, 2),
(25, 'Champ Gravy', 150, 5),
(25, 'Veg Extravaganza', 400, 1),
(25, 'Veggie Paradise', 360, 1),
(26, 'Farmhouse', 420, 10),
(26, 'Veggie Paradise', 360, 1),
(27, 'Butter chicken', 320, 1),
(28, 'Panner Butter Masala', 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_booking`
--

CREATE TABLE `table_booking` (
  `Booking_id` int(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone_number` bigint(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Booking_date` datetime NOT NULL,
  `Table_no.` int(5) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_booking`
--

INSERT INTO `table_booking` (`Booking_id`, `Name`, `Phone_number`, `Email`, `Booking_date`, `Table_no.`, `Date`) VALUES
(1, 'Amit', 2132233232, 'sa', '2022-01-12 15:37:14', 1, '2022-01-12 14:37:49'),
(3, 'aman', 6280851068, 'ks168937@gmail.com', '0000-00-00 00:00:00', 1, '2022-01-12 15:57:25'),
(4, 'aman', 6280851068, 'ks168937@gmail.com', '0000-00-00 00:00:00', 1, '2022-01-12 16:01:06'),
(5, 'aman', 6280851068, 'ks168937@gmail.com', '0000-00-00 00:00:00', 1, '2022-01-12 16:01:50'),
(6, 'aman', 6280851068, 'ks168937@gmail.com', '2022-01-13 00:00:00', 1, '2022-01-12 16:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `veg`
--

CREATE TABLE `veg` (
  `ID` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(5) NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `veg`
--

INSERT INTO `veg` (`ID`, `Name`, `Price`, `icon`) VALUES
(32, 'Panner Butter Masala', 150, 'panner.jpeg'),
(33, 'Champ Gravy', 150, 'champ.jpg'),
(34, 'Dam Makhani', 120, 'Dal-Makhani.jpg'),
(35, 'Dum Aloo', 140, 'dum.jpg'),
(36, 'Mix. Veg', 130, 'mix.jpg'),
(37, 'Malai Kofta', 130, 'malli.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chinese`
--
ALTER TABLE `chinese`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`Contact_us_id`);

--
-- Indexes for table `kj`
--
ALTER TABLE `kj`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `UNIQUE` (`Phone`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Menuid`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `Icon` (`Icon`) USING HASH;

--
-- Indexes for table `non-veg`
--
ALTER TABLE `non-veg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `table_booking`
--
ALTER TABLE `table_booking`
  ADD PRIMARY KEY (`Booking_id`);

--
-- Indexes for table `veg`
--
ALTER TABLE `veg`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chinese`
--
ALTER TABLE `chinese`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Contact_us_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `kj`
--
ALTER TABLE `kj`
  MODIFY `CustomerID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Menuid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `non-veg`
--
ALTER TABLE `non-veg`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `table_booking`
--
ALTER TABLE `table_booking`
  MODIFY `Booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `veg`
--
ALTER TABLE `veg`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `kj` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
