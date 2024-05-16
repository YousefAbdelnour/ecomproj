-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2024 at 05:27 AM
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
  `Password_Hash` varchar(1000) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 1,
  `IsAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `secret` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`AccountId`, `Username`, `Password_Hash`, `IsActive`, `IsAdmin`, `secret`) VALUES
(1, 'RootAdmin', '$2y$10$y517Cs.weITHjOVyhMfbLOAPZeOwJexQML7DM43eLAu.SEFTTxaGu', 0, 1, NULL),
(3, 'another admin', '$2y$10$hqGwxnDGCJESqMuR3h5tiOX1rQQO6yvYZxLlHygpX7hQ6jnaXjyGm', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Account_Job`
--

CREATE TABLE `Account_Job` (
  `AccountId` int(11) NOT NULL,
  `JobId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Account_Profile`
--

CREATE TABLE `Account_Profile` (
  `ProfileId` int(11) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL,
  `AccountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Account_Profile`
--

INSERT INTO `Account_Profile` (`ProfileId`, `Name`, `Phone_Number`, `AccountId`) VALUES
(2, 'RootAdmin', '0000000000', 1),
(3, 'another admin', '0000000000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `AddressId` int(11) NOT NULL,
  `Customer_ProfileId` int(11) NOT NULL,
  `Building_Number` varchar(10) NOT NULL,
  `Street_Name` varchar(50) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`AddressId`, `Customer_ProfileId`, `Building_Number`, `Street_Name`, `ZipCode`, `State`, `Country`) VALUES
(12, 2, '1', '136, Rue Renaud', 'J7V 6C2', 'Québec', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerId` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password_Hash` varchar(60) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 1,
  `secret` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CustomerId`, `Username`, `Password_Hash`, `IsActive`, `secret`) VALUES
(2, 'DonutMan', '$2y$10$ranjfxqT81DPyJXxc6JxHexuEiZao1/Ry7MnXY4/C8uLYlz44pQLW', 0, NULL),
(3, 'DonutMan2', '$2y$10$9jFizh0i.uLwWaM0Yhm5bOKW4rc4wpV0X89zz.Z/tusQsJzewC91.', 0, NULL),
(4, 'customeruzi', '$2y$10$BfQWDnl/MroZah603/xro.AT63Wuvj0Morc8AEoqGw4.Ga2b3wJvy', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Customer_Profile`
--

CREATE TABLE `Customer_Profile` (
  `Customer_ProfileId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL,
  `CustomerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Customer_Profile`
--

INSERT INTO `Customer_Profile` (`Customer_ProfileId`, `Name`, `Phone_Number`, `CustomerId`) VALUES
(1, 'Uzi Canozi', '1111111111', 3),
(2, 'yousef', '4384381111', 4),
(3, 'customer', '4388312030', 2);

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
  `Spots_Left` int(11) NOT NULL,
  `Description` text NOT NULL,
  `MaidId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Job`
--

INSERT INTO `Job` (`JobId`, `AddressId`, `Time_Of_Job`, `Status`, `House_Size`, `Spots_Left`, `Description`, `MaidId`) VALUES
(1, 12, '2024-05-24 12:20:00', 0, 6, 0, 'jacob puked in my car', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE `Message` (
  `MessageId` int(11) NOT NULL,
  `SenderId` int(11) NOT NULL,
  `ReceiverId` int(11) NOT NULL,
  `Message_Text` varchar(1000) NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Receiver_Type` tinyint(4) NOT NULL,
  `Sender_Type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`MessageId`, `SenderId`, `ReceiverId`, `Message_Text`, `Title`, `TimeStamp`, `Receiver_Type`, `Sender_Type`) VALUES
(1, 2, 1, 'hi', 'from customer', '2024-05-16 02:59:44', 0, 1),
(2, 2, 1, 'asd', 'from customer 2', '2024-05-16 03:25:03', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Payment_Log`
--

CREATE TABLE `Payment_Log` (
  `Payment_Id` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Confirmation_Number` varchar(50) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Indexes for table `Account_Job`
--
ALTER TABLE `Account_Job`
  ADD UNIQUE KEY `Uniqueness` (`AccountId`,`JobId`),
  ADD KEY `Account_Job_To_Job` (`JobId`);

--
-- Indexes for table `Account_Profile`
--
ALTER TABLE `Account_Profile`
  ADD PRIMARY KEY (`ProfileId`),
  ADD KEY `Profile_To_Account_FK` (`AccountId`);

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`AddressId`),
  ADD KEY `Address_To_Account_FK` (`Customer_ProfileId`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerId`),
  ADD UNIQUE KEY `Customer_Username_UK` (`Username`);

--
-- Indexes for table `Customer_Profile`
--
ALTER TABLE `Customer_Profile`
  ADD PRIMARY KEY (`Customer_ProfileId`),
  ADD KEY `Customer_Profile_To_Customer_FK` (`CustomerId`);

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
  ADD KEY `Message_To_Account_Sender_FK` (`SenderId`),
  ADD KEY `Message_To_Account_Reciever_FK` (`ReceiverId`);

--
-- Indexes for table `Payment_Log`
--
ALTER TABLE `Payment_Log`
  ADD PRIMARY KEY (`Payment_Id`),
  ADD KEY `Payment_To_Account_FK` (`AccountId`),
  ADD KEY `Payment_To_Customer_FK` (`CustomerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Account_Profile`
--
ALTER TABLE `Account_Profile`
  MODIFY `ProfileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Customer_Profile`
--
ALTER TABLE `Customer_Profile`
  MODIFY `Customer_ProfileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Job`
--
ALTER TABLE `Job`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Payment_Log`
--
ALTER TABLE `Payment_Log`
  MODIFY `Payment_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Account_Job`
--
ALTER TABLE `Account_Job`
  ADD CONSTRAINT `Account_Job_To_Account_FK` FOREIGN KEY (`AccountId`) REFERENCES `Account` (`AccountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Account_Job_To_Job` FOREIGN KEY (`JobId`) REFERENCES `Job` (`JobId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Account_Profile`
--
ALTER TABLE `Account_Profile`
  ADD CONSTRAINT `Profile_To_Account_FK` FOREIGN KEY (`AccountId`) REFERENCES `Account` (`AccountId`);

--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `Address_To_CustomerProfile_FK` FOREIGN KEY (`Customer_ProfileId`) REFERENCES `Customer_Profile` (`Customer_ProfileId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Customer_Profile`
--
ALTER TABLE `Customer_Profile`
  ADD CONSTRAINT `Customer_Profile_To_Customer_FK` FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Job`
--
ALTER TABLE `Job`
  ADD CONSTRAINT `Job_To_Address_FK` FOREIGN KEY (`AddressId`) REFERENCES `Address` (`AddressId`);

--
-- Constraints for table `Payment_Log`
--
ALTER TABLE `Payment_Log`
  ADD CONSTRAINT `Payment_To_Account_FK` FOREIGN KEY (`AccountId`) REFERENCES `Account` (`AccountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Payment_To_Customer_FK` FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
