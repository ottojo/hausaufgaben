-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Dez 2015 um 21:48
-- Server-Version: 5.6.26
-- PHP-Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hausaufgaben`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
  `hId` int(11) NOT NULL,
  `uId` int(11) NOT NULL,
  `hCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hDeadline` datetime DEFAULT NULL,
  `hSubject` text NOT NULL,
  `bId` int(11) DEFAULT NULL,
  `hSite` int(11) DEFAULT NULL,
  `hExerciseNumber` int(11) DEFAULT NULL,
  `hNotes` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `homework`
--

INSERT INTO `homework` (`hId`, `uId`, `hCreationDate`, `hDeadline`, `hSubject`, `bId`, `hSite`, `hExerciseNumber`, `hNotes`) VALUES
(1, 6, '2015-11-22 16:50:50', '2015-12-24 00:00:00', 'Mathe', 1, 40, 5, 'Nur Teilaufgabe a und c'),
(2, 6, '2015-11-22 17:07:06', '2015-11-24 18:06:12', 'Mathe', 1, 40, 6, 'a'),
(3, 6, '2015-11-22 17:10:27', '2015-12-22 18:07:24', 'Deutsch', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uId` int(11) NOT NULL,
  `uFirstName` varchar(255) NOT NULL,
  `uLastName` varchar(255) NOT NULL,
  `uEmail` varchar(255) NOT NULL,
  `uHashedPassword` varchar(255) NOT NULL,
  `uSessionKey` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uId`, `uFirstName`, `uLastName`, `uEmail`, `uHashedPassword`, `uSessionKey`) VALUES
(1, 'Hans', 'Wurst', 'a@b.c', '$2y$10$iDxajeIPcXEhcDydBfQyZOl3cAbHJFCrkN64OqbD9o7v1NgVf/moG', '$2y$10$ZUaCGtC9RkCBfkrX90j3Keh26IrGI7.8HKj/uNGmcbmcjHrzRCl8C'),
(2, 'a', 'a', 'a', '$2y$10$YV0rikE9o6JoiiYzngDPdunAIBKrQVtmyCVhSxp/St/pCpgK/Pywy', '$2y$10$THUO3OxBpqsc3if08y8LdOaVveos/MnwrunvNAHc66.CvLcRVXjAG'),
(6, 'Jonas', 'Otto', 'jottosmail@gmail.com', '$2y$10$IwMHCCVBX.UryLngOTxyyOy.Voe9UlWH74DZmySFuu1FivRBcsx6W', '$2y$10$lbLH/ljRZfdwOOf2mJIed.uCPWcQb5Jqgh7VgAFZYPCyhAGmNCve2'),
(7, 'Barack', 'Obama', 'barack@usa.gov', '$2y$10$Xc.ZTZih6oV.aGL3tbqn6e6ipr/XGZ70QVHJYcUoIyQxAEVm1vYGa', '$2y$10$RNH9Z1JMvWaVp4ZHd.K16.DYPGOj4jCxxYZ9cYJVPmtFrMJvI7vYu');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`hId`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uId`),
  ADD UNIQUE KEY `uId` (`uId`),
  ADD UNIQUE KEY `uEmail` (`uEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `homework`
--
ALTER TABLE `homework`
  MODIFY `hId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
