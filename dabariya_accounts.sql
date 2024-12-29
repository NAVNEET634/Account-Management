-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2022 at 08:14 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dabariya_accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `Assets`
--

CREATE TABLE `Assets` (
  `Id` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `WarrantyDate` date NOT NULL,
  `FileName` varchar(300) NOT NULL,
  `Price` decimal(5,2) NOT NULL,
  `Notes` varchar(500) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CSRTransaction`
--

CREATE TABLE `CSRTransaction` (
  `Id` int(10) NOT NULL,
  `PersonId` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `CreditedBy` decimal(10,2) NOT NULL,
  `DebitedBy` decimal(10,2) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `FD`
--

CREATE TABLE `FD` (
  `Id` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `PersonName` int(10) NOT NULL,
  `BankName` varchar(100) NOT NULL,
  `StartDate` date NOT NULL,
  `MaturityDate` date NOT NULL,
  `DepositAmount` decimal(10,2) NOT NULL,
  `MaturityAmount` decimal(10,2) NOT NULL,
  `InterestRate` decimal(10,2) NOT NULL,
  `AccountNumber` varchar(100) NOT NULL,
  `SavingType` varchar(10) NOT NULL,
  `ReInvestment` varchar(20) NOT NULL,
  `ReInvestmentDetail` varchar(300) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Insurance`
--

CREATE TABLE `Insurance` (
  `Id` int(20) NOT NULL,
  `UserId` int(10) NOT NULL,
  `CompanyName` varchar(200) NOT NULL,
  `PolicyNumber` int(12) NOT NULL,
  `Tenure` int(10) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Renewal` varchar(50) NOT NULL,
  `StartDate` date NOT NULL,
  `MaturityDate` date NOT NULL,
  `PaidAmount` decimal(10,2) NOT NULL,
  `Comments` varchar(250) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Person`
--

CREATE TABLE `Person` (
  `Id` int(20) NOT NULL,
  `UserId` int(10) NOT NULL,
  `PersonName` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SystemAdmin`
--

CREATE TABLE `SystemAdmin` (
  `Id` int(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Assets`
--
ALTER TABLE `Assets`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `CSRTransaction`
--
ALTER TABLE `CSRTransaction`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `FD`
--
ALTER TABLE `FD`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Insurance`
--
ALTER TABLE `Insurance`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `SystemAdmin`
--
ALTER TABLE `SystemAdmin`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Assets`
--
ALTER TABLE `Assets`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CSRTransaction`
--
ALTER TABLE `CSRTransaction`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `FD`
--
ALTER TABLE `FD`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Insurance`
--
ALTER TABLE `Insurance`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Person`
--
ALTER TABLE `Person`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SystemAdmin`
--
ALTER TABLE `SystemAdmin`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
