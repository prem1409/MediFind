-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2016 at 11:42 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `MediFind`
--

-- --------------------------------------------------------

--
-- Table structure for table `Chemist`
--

CREATE TABLE IF NOT EXISTS `Chemist` (
  `Chemist` varchar(15) NOT NULL,
  `Chemist_Name` int(11) NOT NULL,
  `Address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Chemist_Has`
--

CREATE TABLE IF NOT EXISTS `Chemist_Has` (
  `Chemist_ID` int(15) NOT NULL,
  `Medicine_name` int(30) NOT NULL,
  `Quantity` int(3) NOT NULL,
  UNIQUE KEY `Chemist_ID` (`Chemist_ID`),
  UNIQUE KEY `Medicine_name` (`Medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE IF NOT EXISTS `Location` (
  `Chemist_ID` varchar(15) NOT NULL,
  `Chemist` varchar(50) NOT NULL,
  `Latitude` decimal(15,0) NOT NULL,
  `Longitude` decimal(15,0) NOT NULL,
  PRIMARY KEY (`Chemist_ID`),
  UNIQUE KEY `Latitude` (`Latitude`,`Longitude`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table Stores Data About Chemist Locations in Mumbai';

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `phno` bigint(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='signup table';

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`fname`, `mname`, `lname`, `age`, `phno`, `gender`, `email`, `password`) VALUES
('Atharva', 'Rajendra', 'Patil', 19, 8425959435, 'Male', 'atharvapatil1996@gmail.com', 'atharva123'),
('a', 'a', 'a', 12, 12, 'Male', 'a@12.com', 'a'),
('a', 'a', 'a', 12, 123, 'Male', 'a@123.com', '$2a$10$3yDt6S63TpdzQ'),
('a', 'a', 'a', 12, 13, 'Male', '12@12.com', '$2a$10$Lc7NvPWn1q/.e');

-- --------------------------------------------------------

--
-- Table structure for table `Medicine_Info`
--

CREATE TABLE IF NOT EXISTS `Medicine_Info` (
  `Medicine_Name` varchar(25) NOT NULL,
  `Drug_1` varchar(30) NOT NULL,
  `Drug_2` varchar(30) NOT NULL,
  `Drug_3` varchar(30) NOT NULL,
  `Manufacturer` varchar(50) NOT NULL,
  `Drug_Quantity` int(5) NOT NULL,
  PRIMARY KEY (`Medicine_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
