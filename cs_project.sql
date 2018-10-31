-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2018 at 10:42 AM
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
-- Table structure for table `imageUpload`
--

CREATE TABLE `imageUpload` (
  `upload_id` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imageUpload`
--

INSERT INTO `imageUpload` (`upload_id`, `User_ID`, `status`) VALUES
(1, 102214, 1),
(2, 99012, 0),
(3, 120000, 0),
(4, 94673, 0);

-- --------------------------------------------------------

--
-- Table structure for table `liveBorrower`
--

CREATE TABLE `liveBorrower` (
  `LiveID` int(11) NOT NULL,
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
-- Dumping data for table `liveBorrower`
--

INSERT INTO `liveBorrower` (`LiveID`, `User_ID`, `BorrowerName`, `Status`, `Description`, `LoanAmount`, `LoanLength`, `LoanInterest`, `liveStatus`) VALUES
(1, 99012, 'Afandi Indaitsi', 50, 'Farming', 600, 2, 10, 1),
(2, 120000, 'Isaack Motanya', 0, 'Business\r\n', 1000, 10, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loanFunding`
--

CREATE TABLE `loanFunding` (
  `Fund_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL,
  `Amount_Funded` int(11) NOT NULL DEFAULT '0',
  `Amount_Left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanFunding`
--

INSERT INTO `loanFunding` (`Fund_ID`, `User_ID`, `Total_Amount`, `Amount_Funded`, `Amount_Left`) VALUES
(1, 99012, 600, 300, 300),
(2, 120000, 1000, 0, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `LoanID` int(5) NOT NULL,
  `BorrowerID` int(11) NOT NULL,
  `LenderID` int(11) NOT NULL,
  `Amount` bigint(20) NOT NULL,
  `DateIssued` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DateDue` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `paymentStatus` int(11) NOT NULL DEFAULT '0',
  `percentageLoaned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`LoanID`, `BorrowerID`, `LenderID`, `Amount`, `DateIssued`, `DateDue`, `paymentStatus`, `percentageLoaned`) VALUES
(2, 99012, 102214, 300, '2018-10-30 21:23:24', '2018-12-30 20:07:04', 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `loanStatus`
--

CREATE TABLE `loanStatus` (
  `statusID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `loanAvailability` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanStatus`
--

INSERT INTO `loanStatus` (`statusID`, `User_ID`, `loanAvailability`) VALUES
(1, 102214, 1),
(2, 99012, 1),
(3, 120000, 1),
(4, 94673, 0);

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
(2, 102214, 100, 'Cash Withdrawal', '2018-10-24 11:28:20'),
(3, 99012, 1000, 'Cash Deposit', '2018-10-25 12:36:46'),
(4, 120000, 10000, 'Cash Deposit', '2018-10-25 12:39:19'),
(5, 102214, 10000, 'Cash Deposit', '2018-10-25 12:51:26'),
(6, 102214, 10000, 'Cash Deposit', '2018-10-29 08:36:32'),
(9, 102214, 300, 'Send Loan Funding', '2018-10-30 20:07:04'),
(10, 99012, 300, 'Receive Loan Funding', '2018-10-30 20:07:04');

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
  `UserType` text NOT NULL,
  `AccStatus` varchar(1) NOT NULL,
  `UserRating` int(11) NOT NULL DEFAULT '0',
  `loanCount` int(11) NOT NULL DEFAULT '0',
  `borrowCount` int(11) NOT NULL DEFAULT '0',
  `defaultCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Email`, `ID_Number`, `Password`, `Phone_No`, `Gender`, `UserType`, `AccStatus`, `UserRating`, `loanCount`, `borrowCount`, `defaultCount`) VALUES
('cyril owuor', 'cyril.odwuor@strathmore.edu', 94673, '$2y$10$uVoXsrqgrxoLvVkkG/LTU.CCXjB4hQSbXdebs9USopQLx1nsBNzuG', 799988867, 'Male', '2', '1', 0, 0, 0, 0),
('Afandi Indaitsi', 'afandi.indiatsi@strathmore.edu', 99012, '$2y$10$VE6tbMlvLvVuR.RjWKbveuXqRdGB1jgUZNyLn7R.RxcqVYhFn1Pb.', 712345678, 'Female', '2', '1', 0, 0, 1, 0),
('Daniel Ola', 'joseph.wole@strathmore.edu', 102214, '$2y$10$VE6tbMlvLvVuR.RjWKbveuXqRdGB1jgUZNyLn7R.RxcqVYhFn1Pb.', 798502767, 'Male', '2', '1', 0, 1, 0, 0),
('Isaack Motanya', 'isaack.motanya@strathmore.edu', 120000, '$2y$10$VE6tbMlvLvVuR.RjWKbveuXqRdGB1jgUZNyLn7R.RxcqVYhFn1Pb.', 712345677, 'Male', '2', '1', 0, 0, 1, 0);

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
(102214, 1, 9700, 10000),
(99012, 2, 1300, 1000),
(120000, 3, 10000, 10000),
(94673, 4, 0, 0);

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
-- Indexes for table `imageUpload`
--
ALTER TABLE `imageUpload`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `liveBorrower`
--
ALTER TABLE `liveBorrower`
  ADD PRIMARY KEY (`LiveID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `loanFunding`
--
ALTER TABLE `loanFunding`
  ADD PRIMARY KEY (`Fund_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `BorrowerID` (`BorrowerID`,`LenderID`),
  ADD KEY `LenderID` (`LenderID`);

--
-- Indexes for table `loanStatus`
--
ALTER TABLE `loanStatus`
  ADD PRIMARY KEY (`statusID`),
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
  ADD PRIMARY KEY (`ID_Number`);

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
-- AUTO_INCREMENT for table `imageUpload`
--
ALTER TABLE `imageUpload`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `liveBorrower`
--
ALTER TABLE `liveBorrower`
  MODIFY `LiveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loanFunding`
--
ALTER TABLE `loanFunding`
  MODIFY `Fund_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `LoanID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loanStatus`
--
ALTER TABLE `loanStatus`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `SuggestionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `WalletID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imageUpload`
--
ALTER TABLE `imageUpload`
  ADD CONSTRAINT `imageupload_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID_Number`);

--
-- Constraints for table `liveBorrower`
--
ALTER TABLE `liveBorrower`
  ADD CONSTRAINT `liveborrower_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID_Number`);

--
-- Constraints for table `loanFunding`
--
ALTER TABLE `loanFunding`
  ADD CONSTRAINT `loanfunding_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID_Number`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`BorrowerID`) REFERENCES `users` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`LenderID`) REFERENCES `users` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loanStatus`
--
ALTER TABLE `loanStatus`
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
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
