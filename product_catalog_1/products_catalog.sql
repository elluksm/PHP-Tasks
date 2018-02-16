-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2017 at 08:28 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products_catalog`
--
CREATE DATABASE IF NOT EXISTS `products_catalog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `products_catalog`;

-- --------------------------------------------------------

--
-- Table structure for table `cd_dvd_discs`
--

CREATE TABLE IF NOT EXISTS `cd_dvd_discs` (
  `id` int(255) NOT NULL,
  `title` char(255) NOT NULL,
  `price` float NOT NULL,
  `size` int(10) NOT NULL,
  `manufacturer` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cd_dvd_discs`
--

INSERT INTO `cd_dvd_discs` (`id`, `title`, `price`, `size`, `manufacturer`) VALUES
(1, 'CD-R', 0.99, 700, 'Verbatim'),
(2, 'DVD-RW', 3.99, 4700, 'ACME');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE IF NOT EXISTS `furniture` (
  `id` int(255) NOT NULL,
  `title` char(255) NOT NULL,
  `price` float NOT NULL,
  `size` char(255) NOT NULL,
  `material` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `title`, `price`, `size`, `material`) VALUES
(1, 'Bed NICOL NC 24/160', 199.99, '200x160', 'oak'),
(2, 'Coffee table Salome', 59.79, '50x70', 'glass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cd_dvd_discs`
--
ALTER TABLE `cd_dvd_discs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Furniture_ID` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cd_dvd_discs`
--
ALTER TABLE `cd_dvd_discs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
