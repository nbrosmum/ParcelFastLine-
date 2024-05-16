-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 09:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcelfastline`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_record`
--

CREATE TABLE `inventory_record` (
  `Item_ID` int(25) NOT NULL,
  `Shipping_Item` varchar(50) NOT NULL,
  `Item_Weight` double NOT NULL,
  `Shipping_Address` varchar(50) NOT NULL,
  `Date&Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` enum('Pending','Shipped','Delivered') NOT NULL,
  `Estimate_Duration` int(25) NOT NULL,
  `Delivery_Method` enum('By Ship','By Plane') NOT NULL,
  `Staff_ID` int(25) NOT NULL,
  `User_ID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_record`
--

INSERT INTO `inventory_record` (`Item_ID`, `Shipping_Item`, `Item_Weight`, `Shipping_Address`, `Date&Time`, `Status`, `Estimate_Duration`, `Delivery_Method`, `Staff_ID`, `User_ID`) VALUES
(35356, 'Digital item', 5.93273, '61 Oak Alley', '2022-01-12 21:50:55', 'Shipped', 7, 'By Ship', 2, 2),
(36987, 'Sport Accessries', 21.2822, '38374 Continental Terrace', '2022-01-12 21:51:55', 'Pending', 5, 'By Plane', 1, 3),
(43269, 'Digital item', 15.28967, '9 Ridgeway Lane', '2022-10-30 21:51:32', 'Pending', 5, 'By Plane', 2, 3),
(43857, 'Clothing', 5.7314, '44552 Derek Point', '2022-12-22 21:51:54', 'Pending', 5, 'By Plane', 1, 3),
(52072, 'Digital item', 9.49389, '72486 Arkansas Drive', '2022-07-18 21:52:15', 'Pending', 5, 'By Ship', 1, 4),
(52686, 'Computer & Accessories', 15.28116, '5 Tennyson Trail', '2022-05-27 22:52:32', 'Pending', 7, 'By Plane', 1, 2),
(55154, 'Document', 0.85787, '70 Prentice Lane', '2022-10-12 21:52:57', 'Shipped', 7, 'By Plane', 1, 7),
(55319, 'Digital item', 17.01112, '7138 Prairie Rose Lane', '2022-10-27 21:53:00', 'Delivered', 7, 'By Plane', 1, 4),
(60505, 'Clothing', 7.33691, '3478 Scofield Court', '2022-09-30 20:00:00', 'Delivered', 7, 'By Ship', 1, 3),
(60637, 'Computer & Accessories', 10.73382, '7167 American Ash Crossing', '2022-07-21 21:53:40', 'Shipped', 3, 'By Plane', 1, 3),
(63002, 'Digital item', 7.31492, '01470 Dwight Parkway', '2022-08-17 13:00:00', 'Shipped', 3, 'By Plane', 2, 1),
(123456, 'Computer & Accessories', 3.12773, '35 Buell Way', '2022-10-20 21:49:11', 'Delivered', 7, 'By Plane', 1, 3),
(234876, 'Accessory', 5.2342, 'No 14, Tmn weina, Jln nana, 43200, kl, Malaysia', '2022-10-31 11:59:21', 'Shipped', 6, 'By Ship', 2, 3),
(456789, 'Bags & Luggage', 10.2342, 'No 6, Tmn weina, Jln nana, 43000, kl, Malaysia', '2022-10-21 11:49:36', 'Pending', 6, 'By Plane', 2, 4),
(603122, 'Clothing thing', 5.6797, '890 Coleman Junction', '2022-10-18 21:50:26', 'Pending', 2, 'By Plane', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_record`
--
ALTER TABLE `inventory_record`
  ADD PRIMARY KEY (`Item_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_record`
--
ALTER TABLE `inventory_record`
  ADD CONSTRAINT `Staff_ID` FOREIGN KEY (`Staff_ID`) REFERENCES `staff_account` (`Staff_ID`),
  ADD CONSTRAINT `User_ID` FOREIGN KEY (`User_ID`) REFERENCES `user_account` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
