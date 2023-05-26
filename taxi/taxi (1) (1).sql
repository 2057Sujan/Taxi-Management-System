-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 07:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pickup` varchar(255) NOT NULL,
  `dropLocation` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `book_status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `driver_id`, `name`, `pickup`, `dropLocation`, `phone`, `book_status`, `date`) VALUES
(7, 2, 'Harry Kane', 'as', 'as', '9898989898', 'accept', '2023-03-16'),
(10, 7, 'Ram Sharma', 'asdf', 'asdf', '9898989898', 'accept', '2023-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `experience` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `email`, `password`, `type`, `experience`, `status`, `image`) VALUES
(7, ' harry', ' harry@gmail.com', ' 123', '50-50', 5, 0, 'harry.jpg'),
(8, 'Messi', 'messi@gmail.com', '123', 'rent', 5, 0, 'messi.jpg'),
(13, 'as', 'as@12.com', '12', 'rent', 1, 0, 'harry.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `earning_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `earning` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`earning_id`, `driver_id`, `earning`, `date`) VALUES
(1, 1, 150, '2023-03-16'),
(2, 1, 350, '2023-03-16'),
(3, 2, 50, '2023-03-16'),
(6, 8, 150, '2023-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `expenditure_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `details` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`expenditure_id`, `driver_id`, `details`, `amount`, `date`) VALUES
(1, 7, 'Glass', 28, '2022-08-08'),
(2, 4, 'Granite', 98, '2023-03-23'),
(3, 4, 'Vinyl', 27, '2023-01-13'),
(NULL, 8, '', 1000, '2023-05-20'),
(NULL, 8, 'Petrol', 100, '2023-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `taxi`
--

CREATE TABLE `taxi` (
  `taxi_id` int(11) NOT NULL,
  `taxi_number` varchar(255) NOT NULL,
  `made_year` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `taxi_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxi`
--

INSERT INTO `taxi` (`taxi_id`, `taxi_number`, `made_year`, `image`, `taxi_status`) VALUES
(4, 'CD45AA454', 2019, 'suzuki.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taxi_taken`
--

CREATE TABLE `taxi_taken` (
  `id` int(11) NOT NULL,
  `taxi_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxi_taken`
--

INSERT INTO `taxi_taken` (`id`, `taxi_id`, `driver_id`) VALUES
(1, 4, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`earning_id`);

--
-- Indexes for table `taxi`
--
ALTER TABLE `taxi`
  ADD PRIMARY KEY (`taxi_id`);

--
-- Indexes for table `taxi_taken`
--
ALTER TABLE `taxi_taken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `earning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taxi`
--
ALTER TABLE `taxi`
  MODIFY `taxi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taxi_taken`
--
ALTER TABLE `taxi_taken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
