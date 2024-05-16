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
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `User_ID` int(25) NOT NULL,
  `UName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `UContact_Number` varchar(25) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`User_ID`, `UName`, `Email`, `Password`, `UContact_Number`, `Address`) VALUES
(1, 'Nbros Mum', 'nbrosm@gmail.com', '11122', '012314436', 'no 6,Tmn Satu,Jln tiga 12345,kl,kl'),
(2, 'ali', 'ali@mail.com', '12345', '01234567789', 'no1,tmn dua, jln tiga, 50000,kl malaysia'),
(3, 'ahbu', 'ahbu@email.com', '12345', '01233456667', 'no1 jln tiga tmn lala lorong 38 12345 kl malaysia'),
(4, 'wei lin', 'wl@email.com', '11122', '01233456789', 'happy garden 1234'),
(7, 'jun jie', 'jj@email.com', '12345', '0122345678', 'no 7 jln nana tmn gigi 12345 kl kl'),
(8, 'test', 'test', 'pass', '0124567890', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `User_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
