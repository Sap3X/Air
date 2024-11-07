-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 06:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `FLIGHT_CODE` int(5) NOT NULL,
  `AIRLINE_ID` varchar(10) NOT NULL,
  `AIRLINE_NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`FLIGHT_CODE`, `AIRLINE_ID`, `AIRLINE_NAME`) VALUES
(1001, '980001', 'Air India'),
(1002, '980001', 'Air India');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `A_NAME` varchar(50) NOT NULL,
  `STATE` varchar(30) NOT NULL,
  `COUNTRY` varchar(30) NOT NULL,
  `C_NAME` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`A_NAME`, `STATE`, `COUNTRY`, `C_NAME`) VALUES
('dabolim_airport', 'GA', '91', ''),
('mangalore_international_airport', 'KA', '91', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `C_NAME` varchar(30) NOT NULL,
  `STATE` varchar(30) NOT NULL,
  `COUNTRY` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`C_NAME`, `STATE`, `COUNTRY`) VALUES
('', 'GA', '91'),
('mangalore', 'KA', '91');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `A_NAME` varchar(50) DEFAULT NULL,
  `AIRLINE_ID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`A_NAME`, `AIRLINE_ID`) VALUES
('dabolim_airport', '980001'),
('mangalore_international_airport', '980001');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `SOURCE` varchar(50) NOT NULL,
  `DESTINATION` varchar(50) NOT NULL,
  `DEPARTURE` varchar(20) DEFAULT NULL,
  `ARRIVAL` varchar(20) DEFAULT NULL,
  `DURATION` varchar(20) DEFAULT NULL,
  `FLIGHT_CODE` char(10) NOT NULL,
  `AIRLINE_ID` varchar(10) DEFAULT NULL,
  `PRICE_BUSINESS` int(15) DEFAULT NULL,
  `PRICE_ECONOMY` int(15) DEFAULT NULL,
  `PRICE_STUDENTS` int(15) DEFAULT NULL,
  `PRICE_DIFFERENTLYABLED` int(15) DEFAULT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`SOURCE`, `DESTINATION`, `DEPARTURE`, `ARRIVAL`, `DURATION`, `FLIGHT_CODE`, `AIRLINE_ID`, `PRICE_BUSINESS`, `PRICE_ECONOMY`, `PRICE_STUDENTS`, `PRICE_DIFFERENTLYABLED`, `DATE`) VALUES
('mangalore', 'bangalore', '12:00', '13:00', '1', '1002', '980001', 9800, 7000, 4200, 4400, '2024-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `PASSPORT_NO` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `FNAME` varchar(50) NOT NULL,
  `MNAME` varchar(50) DEFAULT NULL,
  `LNAME` varchar(50) NOT NULL,
  `PASSPORT_NO` char(8) NOT NULL,
  `AGE` int(3) DEFAULT NULL,
  `SEX` char(1) DEFAULT NULL,
  `PHONE` char(10) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `FLIGHT_CODE` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`FNAME`, `MNAME`, `LNAME`, `PASSPORT_NO`, `AGE`, `SEX`, `PHONE`, `ADDRESS`, `FLIGHT_CODE`) VALUES
('Sapekcha', 'Don', 'Bhandari', '12345678', 20, 'M', '9108951347', 'Itahari 6', '1002'),
('Sapekcha', 'Don', 'Bhandari', '21345678', 20, 'M', '9108951347', 'Itahari 6', '1002'),
('Sapekcha', 'Don', 'Bhandari', '22345678', 20, 'M', '9108951347', 'Itahari 6', '1002');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `PRICE` int(20) DEFAULT NULL,
  `TYPE` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selected`
--

CREATE TABLE `selected` (
  `FLIGHT_CODE` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TICKET_NO` int(11) NOT NULL,
  `PRICE` int(15) DEFAULT NULL,
  `SOURCE` varchar(30) DEFAULT NULL,
  `DESTINATION` varchar(30) DEFAULT NULL,
  `DATE_OF_TRAVEL` date DEFAULT NULL,
  `PASSPORT_NO` char(8) DEFAULT NULL,
  `FLIGHT_CODE` char(10) DEFAULT NULL,
  `TYPE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TICKET_NO`, `PRICE`, `SOURCE`, `DESTINATION`, `DATE_OF_TRAVEL`, `PASSPORT_NO`, `FLIGHT_CODE`, `TYPE`) VALUES
(4, 9800, 'mangalore', 'bangalore', '2024-11-06', '12345678', '1002', 'BUSINESS CLASS'),
(5, 9800, 'mangalore', 'bangalore', '2024-11-06', '22345678', '1002', 'BUSINESS CLASS'),
(6, 9800, 'mangalore', 'bangalore', '2024-11-06', '21345678', '1002', 'BUSINESS CLASS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`FLIGHT_CODE`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`A_NAME`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`C_NAME`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`FLIGHT_CODE`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`PASSPORT_NO`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TICKET_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TICKET_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
