-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 06:10 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs project`
--

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `LoanID` int(11) NOT NULL,
  `Borrower` int(11) NOT NULL,
  `Lender` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `DateIssued` datetime NOT NULL,
  `DateDue` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone_No` int(11) NOT NULL,
  `Gender` text NOT NULL,
  `UserType` text NOT NULL,
  `AccStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Email`, `ID`, `Password`, `Phone_No`, `Gender`, `UserType`, `AccStatus`) VALUES
('Jane Doe', 'jd@strathmore.edu', 2, '$2y$10$noAomIJkUt76w4DpyL7ugePSdMg6UZr4jyN6XgRUvxhCaJNL5/8FG', 722534987, 'Female', 'User', 'Invalid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
