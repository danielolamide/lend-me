-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 08:41 AM
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
-- Database: `cs_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ComplaintID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Complaint` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imageupload`
--

CREATE TABLE `imageupload` (
  `upload_id` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liveborrower`
--

CREATE TABLE `liveborrower` (
  `User_ID` int(11) NOT NULL,
  `BorrowerName` text NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `Description` varchar(255) NOT NULL,
  `LoanAmount` int(11) NOT NULL,
  `LoanLength` int(11) NOT NULL,
  `LoanInterest` int(11) NOT NULL,
  `liveStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liveborrower`
--

INSERT INTO `liveborrower` (`User_ID`, `BorrowerName`, `Status`, `Description`, `LoanAmount`, `LoanLength`, `LoanInterest`, `liveStatus`) VALUES
(102214, 'Daniel Ola', 0, 'Food', 100, 10, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `LoanID` varchar(5) NOT NULL,
  `BorrowerID` int(11) NOT NULL,
  `LenderID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `DateIssued` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DateDue` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`LoanID`, `BorrowerID`, `LenderID`, `Amount`, `DateIssued`, `DateDue`) VALUES
('1', 12345, 9999, 200, '2018-10-25 09:59:15', '2018-10-30 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus`
--

CREATE TABLE `loanstatus` (
  `User_ID` int(11) NOT NULL,
  `loanAvailability` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `SuggestionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Suggestion` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `TransactionType` text NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TID`, `User_ID`, `Amount`, `TransactionType`, `TimeStamp`) VALUES
(1, 102214, 1000, 'Cash Deposit', '2018-10-15 10:08:12'),
(2, 12345, 100, 'Cash Deposit', '2018-10-20 08:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ID_Number` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone_No` int(10) NOT NULL,
  `Gender` text NOT NULL,
  `UserType` int(11) NOT NULL,
  `AccStatus` varchar(1) NOT NULL,
  `UserRating` int(11) NOT NULL DEFAULT '0',
  `loanCount` int(11) NOT NULL DEFAULT '0',
  `borrowCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Email`, `ID_Number`, `Password`, `Phone_No`, `Gender`, `UserType`, `AccStatus`, `UserRating`, `loanCount`, `borrowCount`) VALUES
('Malik Ibrahim', 'malik.mohamed@strathmore.edu', 9999, '$2y$10$Y27HclQB14QmtK2gl0eP/uPok.xcjceaRphwpH6lWhRgmpIvIuopG', 0, 'Male', 1, '1', 0, 1, 0),
('NIcole Yiega', 'nicole.muswanya@strathmore.edu', 12345, '$2y$10$A8nyi2W./5eMt06.8tm8Te2/ZxTvE6zGx/AZOEnuOXI8BUZVHs/ty', 725346793, 'Female', 2, '1', 0, 0, 0),
('Daniel Ola', 'joseph.wole@strathmore.edu', 102214, '$2y$10$A8nyi2W./5eMt06.8tm8Te2/ZxTvE6zGx/AZOEnuOXI8BUZVHs/ty', 2147483647, 'Male', 1, '1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeID` int(11) NOT NULL,
  `UserType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeID`, `UserType`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `User_ID` int(11) NOT NULL,
  `WalletID` int(11) NOT NULL,
  `WalletBalance` bigint(20) NOT NULL DEFAULT '0',
  `WalletHistory` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`User_ID`, `WalletID`, `WalletBalance`, `WalletHistory`) VALUES
(102214, 1, 1000, 1000),
(9999, 2, 0, 0),
(12345, 3, 100, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ComplaintID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `imageupload`
--
ALTER TABLE `imageupload`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `liveborrower`
--
ALTER TABLE `liveborrower`
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `BorrowerID` (`BorrowerID`,`LenderID`),
  ADD KEY `LenderID` (`LenderID`);

--
-- Indexes for table `loanstatus`
--
ALTER TABLE `loanstatus`
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`SuggestionID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_Number`),
  ADD KEY `UserType` (`UserType`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`WalletID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ComplaintID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imageupload`
--
ALTER TABLE `imageupload`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `SuggestionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `WalletID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imageupload`
--
ALTER TABLE `imageupload`
  ADD CONSTRAINT `imageupload_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID_Number`);

--
-- Constraints for table `liveborrower`
--
ALTER TABLE `liveborrower`
  ADD CONSTRAINT `liveborrower_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID_Number`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`BorrowerID`) REFERENCES `users` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`LenderID`) REFERENCES `users` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loanstatus`
--
ALTER TABLE `loanstatus`
  ADD CONSTRAINT `loanStatus_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID_Number`);

--
-- Constraints for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `suggestions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID_Number`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserType`) REFERENCES `usertype` (`UserTypeID`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
