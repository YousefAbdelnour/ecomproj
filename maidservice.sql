-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2024 at 02:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maidservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `AccountId` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password_Hash` varchar(60) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`AccountId`, `Username`, `Password_Hash`, `Status`) VALUES
(1, 'RootAdmin', '$2y$10$wN57PQn1UeugG/EUFX1l0OV7y2frJk.UJEq0h/H0vwG1BLyYJaf0S', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `AddressId` int(11) NOT NULL,
  `ProfileId` int(11) NOT NULL,
  `Building_Number` varchar(10) NOT NULL,
  `Street_Name` varchar(50) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Job`
--

CREATE TABLE `Job` (
  `JobId` int(11) NOT NULL,
  `AddressId` int(11) NOT NULL,
  `Time_Of_Job` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` tinyint(4) NOT NULL,
  `House_Size` tinyint(4) NOT NULL,
  `Spots_Left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE `Message` (
  `MessageId` int(11) NOT NULL,
  `Sender_AccountId` int(11) NOT NULL,
  `Reciever_AccountId` int(11) NOT NULL,
  `Message_Text` varchar(1000) NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Payment_Log`
--

CREATE TABLE `Payment_Log` (
  `Payment_Id` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `Confirmation_Number` varchar(50) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Profile`
--

CREATE TABLE `Profile` (
  `ProfileId` int(11) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Phone_Number` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`AccountId`),
  ADD UNIQUE KEY `Username_Account_Unique` (`Username`);

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`AddressId`),
  ADD KEY `Address_To_Account_FK` (`ProfileId`);

--
-- Indexes for table `Job`
--
ALTER TABLE `Job`
  ADD PRIMARY KEY (`JobId`),
  ADD KEY `Job_To_Address_FK` (`AddressId`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`MessageId`),
  ADD KEY `Message_To_Account_Sender_FK` (`Sender_AccountId`),
  ADD KEY `Message_To_Account_Reciever_FK` (`Reciever_AccountId`);

--
-- Indexes for table `Payment_Log`
--
ALTER TABLE `Payment_Log`
  ADD PRIMARY KEY (`Payment_Id`),
  ADD KEY `Payment_To_Account_FK` (`AccountId`);

--
-- Indexes for table `Profile`
--
ALTER TABLE `Profile`
  ADD PRIMARY KEY (`ProfileId`),
  ADD KEY `Profile_To_Account_FK` (`AccountId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Job`
--
ALTER TABLE `Job`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payment_Log`
--
ALTER TABLE `Payment_Log`
  MODIFY `Payment_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Profile`
--
ALTER TABLE `Profile`
  MODIFY `ProfileId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `Address_To_Profile_FK` FOREIGN KEY (`ProfileId`) REFERENCES `Profile` (`ProfileId`);

--
-- Constraints for table `Job`
--
ALTER TABLE `Job`
  ADD CONSTRAINT `Job_To_Address_FK` FOREIGN KEY (`AddressId`) REFERENCES `Address` (`AddressId`);

--
-- Constraints for table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `Message_To_Account_Reciever_FK` FOREIGN KEY (`Reciever_AccountId`) REFERENCES `Account` (`AccountId`),
  ADD CONSTRAINT `Message_To_Account_Sender_FK` FOREIGN KEY (`Sender_AccountId`) REFERENCES `Account` (`AccountId`);

--
-- Constraints for table `Payment_Log`
--
ALTER TABLE `Payment_Log`
  ADD CONSTRAINT `Payment_To_Account_FK` FOREIGN KEY (`AccountId`) REFERENCES `Account` (`AccountId`);

--
-- Constraints for table `Profile`
--
ALTER TABLE `Profile`
  ADD CONSTRAINT `Profile_To_Account_FK` FOREIGN KEY (`AccountId`) REFERENCES `Account` (`AccountId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
