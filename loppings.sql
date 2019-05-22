-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 11:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loppings`
--

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `OfferID` int(11) NOT NULL,
  `OfferName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `OfferImgPath` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `OfferPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`OfferID`, `OfferName`, `OfferImgPath`, `OfferPrice`) VALUES
(6, 'Großer Döner', '/res/doener.png', 4.5),
(7, 'Vegetarischer Döner', '/res/doenerveg.png', 3.5),
(8, 'Döner Pizza', '/res/doenerpiz.png', 5.5),
(9, 'Kleiner Döner', '/res/doenersmall.png', 3.5),
(10, 'Lamacun', '/res/lahmacun.png', 4.5),
(11, 'Borgar', '/res/burger.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `Adress` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `OrderTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Bestellt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `fOrderID` int(11) NOT NULL,
  `fOfferID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`OfferID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`fOrderID`,`fOfferID`,`ItemID`),
  ADD KEY `fOfferID` (`fOfferID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `OfferID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`fOfferID`) REFERENCES `offer` (`OfferID`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`fOrderID`) REFERENCES `order` (`OrderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
