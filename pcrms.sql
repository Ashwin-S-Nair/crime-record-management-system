-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 09:49 AM
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
-- Database: `pcrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `case_ID` int(20) NOT NULL,
  `court_name` varchar(255) NOT NULL,
  `court_city` varchar(255) NOT NULL,
  `crime_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`case_ID`, `court_name`, `court_city`, `crime_ID`) VALUES
(3548, 'Coimbatore District Court', 'Coimbatore', 2518),
(3612, 'Coimbatore District Court', 'Coimbatore', 6218),
(4518, 'Salem District Court', 'Salem', 9251),
(5163, 'Chennai City Civil Court', 'Chennai', 8861),
(5689, 'Kanchipuram District Court', 'Kanchipuram', 6541),
(6356, 'Chennai City Civil Court', 'Chennai', 9314),
(6842, 'Kanchipuram District Court', 'Kanchipuram', 1025),
(8312, 'Madras High Court', 'Chennai', 5642);

-- --------------------------------------------------------

--
-- Table structure for table `courtstaffs`
--

CREATE TABLE `courtstaffs` (
  `Username` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courtstaffs`
--

INSERT INTO `courtstaffs` (`Username`, `Pass`) VALUES
('court1', '1258');

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `crime_ID` bigint(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `criminal_ID` bigint(11) NOT NULL,
  `victim_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`crime_ID`, `type`, `date`, `city`, `station`, `criminal_ID`, `victim_ID`) VALUES
(1025, 'Arson', '2024-01-05', 'Kanchipuram', 'B5 Walajabad', 2142, 9999),
(2518, 'Cybercrime', '2024-02-12', 'Coimbatore', 'D3 Podanur', 1000, 4810),
(5642, 'Hit and Run', '2024-03-19', 'Chennai', 'F3 Nungambakkam', 1201, 3577),
(6218, 'Fraud', '2024-04-01', 'Coinbatore', 'C1 Katoor', 1000, 5638),
(6541, 'Hit and Run', '2024-04-14', 'Kanchipuram', 'B1 Big Kanchipuram', 5391, 2054),
(8861, 'Burglary', '2024-05-07', 'Chennai', 'B1 North Beach', 1203, 3579),
(9251, 'Assault', '2024-05-18', 'Salem', 'B4 Annadhanapatti', 8320, 5382),
(9314, 'Assault', '2024-01-29', 'Chennai', 'H2 Guduvancheri', 1201, 3578);

--
-- Triggers `crime`
--
DELIMITER $$
CREATE TRIGGER `crime_tigger` BEFORE DELETE ON `crime` FOR EACH ROW INSERT INTO crimes1 values(old.crime_id,old.type,old.date,old.city,old.station,old.criminal_ID,old.victim_ID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `crimes1`
--

CREATE TABLE `crimes1` (
  `crime_ID` bigint(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `criminal_ID` int(20) NOT NULL,
  `victim_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `criminal_ID` bigint(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `identity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`criminal_ID`, `name`, `city`, `street`, `identity`) VALUES
(1000, 'Unidentified Suspect', 'Unknown', 'Unknown', 0),
(1201, 'Achuth S', 'Chennai', 'Guduvancheri', 9902145),
(1203, 'Ashwin S Nair', 'Palakkad', 'Pattambi', 9582014),
(2142, 'Ajay Verma', 'Kanchipuram', 'Walajabad', 2195814),
(5391, 'Manoj Singh', 'Kanchipuram', 'Kanchipuram', 5831053),
(8320, 'Rajesh Kumar', 'Salem', 'Yercaud', 9864512),
(9999, 'Multiple Suspects', 'N/A', 'N/A', 0);

--
-- Triggers `criminal`
--
DELIMITER $$
CREATE TRIGGER `crimn_trgr` BEFORE DELETE ON `criminal` FOR EACH ROW INSERT INTO criminal1 values(old.criminal_ID,old.name,old.city,old.street,old.identity)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `criminal1`
--

CREATE TABLE `criminal1` (
  `criminal_ID` bigint(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `identity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `criminal_summary`
-- (See below for the actual view)
--
CREATE TABLE `criminal_summary` (
`criminal_ID` bigint(11)
,`name` varchar(255)
,`total_crimes` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `name` varchar(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`name`, `id`) VALUES
('role', 1);

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE `victim` (
  `victim_ID` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `identity` int(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `victim`
--

INSERT INTO `victim` (`victim_ID`, `name`, `identity`, `city`, `station`) VALUES
(2054, 'Tarun Sharma', 6841267, 'Kanchipuram', 'B1 Big Kanchipuram'),
(3577, 'Abhilash K V', 9245162, 'Chennai', 'H2 Guduvancheri'),
(3578, 'Milan P Joseph', 9691605, 'Chennai', 'H2 Guduvancheri'),
(3579, 'John Doe', 9384721, 'Chennai', 'K4 Anna Nagar'),
(4810, 'Siddharth Menon', 8654135, 'Coimbatore', 'D3 Podanur'),
(5382, 'Vikash Khatri', 3624501, 'Salem', 'B4 Annadhanapatti'),
(5638, 'Arjun Gupta', 8453921, 'Coimbatore', 'C1 Katoor');

-- --------------------------------------------------------

--
-- Structure for view `criminal_summary`
--
DROP TABLE IF EXISTS `criminal_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `criminal_summary`  AS SELECT `cr`.`criminal_ID` AS `criminal_ID`, `cr`.`name` AS `name`, count(0) AS `total_crimes` FROM (`criminal` `cr` left join `crime` `c` on(`cr`.`criminal_ID` = `c`.`criminal_ID`)) GROUP BY `cr`.`criminal_ID`, `cr`.`name` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`case_ID`);

--
-- Indexes for table `courtstaffs`
--
ALTER TABLE `courtstaffs`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`crime_ID`),
  ADD KEY `crime no` (`criminal_ID`);

--
-- Indexes for table `crimes1`
--
ALTER TABLE `crimes1`
  ADD PRIMARY KEY (`crime_ID`),
  ADD KEY `crime no` (`criminal_ID`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`criminal_ID`);

--
-- Indexes for table `criminal1`
--
ALTER TABLE `criminal1`
  ADD PRIMARY KEY (`criminal_ID`);

--
-- Indexes for table `victim`
--
ALTER TABLE `victim`
  ADD PRIMARY KEY (`victim_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crime`
--
ALTER TABLE `crime`
  ADD CONSTRAINT `crime no` FOREIGN KEY (`criminal_ID`) REFERENCES `criminal` (`criminal_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


START TRANSACTION;
UPDATE courts SET court_name = 'Madras High Court' WHERE case_ID = 3548;
COMMIT;

START TRANSACTION;
UPDATE Court SET court_name = 'Chennai City Civil Court' WHERE case_ID = 3548;
COMMIT;


START TRANSACTION;
UPDATE Criminal SET street = 'New Street' 
WHERE criminal_ID = 2142;
COMMIT;
