-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 04:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumb_7ds`
--

-- --------------------------------------------------------

--
-- Table structure for table `heroes_tb`
--

CREATE TABLE `heroes_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type_id` varchar(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heroes_tb`
--

INSERT INTO `heroes_tb` (`id`, `name`, `type_id`, `photo`) VALUES
(1, 'Nunchaku', '1', 'avatar/portrait_78.png'),
(2, 'Holy Knight Escanor', '2', 'avatar/portrait_100.png'),
(3, 'The Grizzly Sin of Sloth', '3', 'avatar/portrait_8.png'),
(4, 'Heart Of The Land', '1', 'avatar/portrait_58.png'),
(5, 'A New Adventure', '3', 'avatar/portrait_77.png'),
(6, 'Bringer Of Disaster', '2', 'avatar/portrait_72.png'),
(7, 'Camelot\'s Sword', '1', 'avatar/portrait_74.png'),
(8, 'Liones\'s Hero', '3', 'avatar/portrait_4.png'),
(20, 'Zhongli', '5', 'avatar/portrait_169.png'),
(22, 'Zhongli', '6', 'avatar/portrait_169.png'),
(23, 'Zhongli', '7', 'avatar/portrait_169.png'),
(24, 'Zhongli', '1', 'avatar/portrait_169.png');

-- --------------------------------------------------------

--
-- Table structure for table `type_db`
--

CREATE TABLE `type_db` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_db`
--

INSERT INTO `type_db` (`id`, `name`) VALUES
(1, 'Strengh'),
(2, 'HP'),
(3, 'Agility');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `heroes_tb`
--
ALTER TABLE `heroes_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_db`
--
ALTER TABLE `type_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `heroes_tb`
--
ALTER TABLE `heroes_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `type_db`
--
ALTER TABLE `type_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
