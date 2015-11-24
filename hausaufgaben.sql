-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Nov 2015 um 16:31
-- Server Version: 5.6.16
-- PHP-Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `hausaufgaben`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
  `uId` int(11) NOT NULL,
  `hId` int(11) NOT NULL AUTO_INCREMENT,
  `bId` int(11) NOT NULL,
  `hPageNr` int(11) NOT NULL,
  `hExerciseNr` int(11) NOT NULL,
  `hCreationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hDeadline` datetime NOT NULL,
  `hSubject` text NOT NULL,
  `hNotes` text NOT NULL,
  `hDone` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`hId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uId` int(11) NOT NULL AUTO_INCREMENT,
  `uFirstName` varchar(255) DEFAULT NULL,
  `uLastName` varchar(255) DEFAULT NULL,
  `uEmail` varchar(255) DEFAULT NULL,
  `uHashedPassword` varchar(255) DEFAULT NULL,
  `uSessionKey` varchar(255) NOT NULL,
  PRIMARY KEY (`uId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uId`, `uFirstName`, `uLastName`, `uEmail`, `uHashedPassword`, `uSessionKey`) VALUES
(1, 'Hans', 'Wurst', 'a@b.c', '$2y$10$iDxajeIPcXEhcDydBfQyZOl3cAbHJFCrkN64OqbD9o7v1NgVf/moG', ''),
(2, 'Jonas', 'Otto', 'jottosmail@gmail.com', '$2y$10$baPK0amca8jlCD630y5MKuLc0YwqBl.TfyH67G7AvxFsAiAwHAh8u', '$2y$10$uYNY8vOgcz1QOdlrrDPETe2j2cy6wowQZyn0PgriXdlPGNsFu9AWa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
