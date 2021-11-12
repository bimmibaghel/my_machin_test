-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 12:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `machine_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `text`, `file`) VALUES
(9, 'ben ten', 'hello fresher', 'uploads/2380319b1affde32601bc865163b3c0f.jpg'),
(40, 'ben', 'batch 19', 'uploads/46f6207e610545049d0f81182781ad21.png'),
(41, 'ookk', 'lllll', 'uploads/b6c324aac0b423d50d9eb1364bf992e8.jpg'),
(42, 'ss', 'ss', 'uploads/76eced4ba7fb309a6a75bb2ea79be025.jpg'),
(46, 'qqq', 'qqqq', 'uploads/be2828a52a7a0a137cacfd65375175f5.jpg'),
(47, 'qqq', 'qqqq', 'uploads/fbd3cda74540a409e85a073600f511d7.png'),
(48, 'qqq', 'qqqq', 'qqq'),
(49, 'qqq', 'qqqq', 'qqqq'),
(50, 'qqq', 'qqqq', 'qqq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
