-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Mai 2019 um 13:15
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `loppings`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `offer`
--

CREATE TABLE `offer` (
  `OfferID` int(11) NOT NULL,
  `OfferName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `OfferImgPath` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `OfferPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `offer`
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
-- Tabellenstruktur für Tabelle `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `Adress` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `OrderTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Bestellt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `order`
--

INSERT INTO `order` (`OrderID`, `Adress`, `OrderTime`, `Status`) VALUES
(8, 'xd xd 12344', '2019-05-23 10:56:46', 'Geliefert'),
(9, 'w asdasd 12345', '2019-05-23 11:03:35', 'Geliefert'),
(10, 'r r 11235', '2019-05-23 11:06:05', 'Geliefert');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orderitem`
--

CREATE TABLE `orderitem` (
  `ItemID` int(11) NOT NULL,
  `fOrderID` int(11) NOT NULL,
  `fOfferID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `orderitem`
--

INSERT INTO `orderitem` (`ItemID`, `fOrderID`, `fOfferID`) VALUES
(2, 8, 6),
(3, 8, 6),
(4, 8, 6),
(5, 8, 6),
(6, 8, 6),
(7, 8, 6),
(8, 9, 11),
(9, 9, 11),
(10, 10, 11),
(11, 10, 11),
(12, 10, 11),
(13, 10, 11);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`OfferID`);

--
-- Indizes für die Tabelle `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indizes für die Tabelle `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`ItemID`,`fOrderID`,`fOfferID`),
  ADD UNIQUE KEY `ItemID` (`ItemID`),
  ADD KEY `fOfferID` (`fOfferID`),
  ADD KEY `fOrderID` (`fOrderID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `offer`
--
ALTER TABLE `offer`
  MODIFY `OfferID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`fOfferID`) REFERENCES `offer` (`OfferID`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`fOrderID`) REFERENCES `order` (`OrderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
