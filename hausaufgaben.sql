-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Jan 2016 um 16:38
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
-- Tabellenstruktur für Tabelle `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bId`    INT(11) NOT NULL,
  `bTitle` TEXT    NOT NULL
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = latin1;

--
-- Daten für Tabelle `books`
--

INSERT INTO `books` (`bId`, `bTitle`) VALUES
  (1, 'Mathematik Oberstufe Band 12');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
  `uId`           int(11)    NOT NULL,
  `hId`           INT(11)    NOT NULL,
  `bId`           INT(11)             DEFAULT NULL,
  `hPageNr`       INT(11)             DEFAULT NULL,
  `hExerciseNr`   INT(11)             DEFAULT NULL,
  `hCreationTime` timestamp  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hDeadline`     datetime   NOT NULL,
  `hSubject`      text       NOT NULL,
  `hNotes`        text       NOT NULL,
  `hDone`         TINYINT(1) NOT NULL DEFAULT '0'
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 10
  DEFAULT CHARSET = latin1;

--
-- Daten für Tabelle `homework`
--

INSERT INTO `homework` (`uId`, `hId`, `bId`, `hPageNr`, `hExerciseNr`, `hCreationTime`, `hDeadline`, `hSubject`, `hNotes`, `hDone`) VALUES
  (2, 1, 1, 10, 4, '2015-11-24 15:39:03', '2016-02-13 00:00:00', 'Mathe', 'Nur A und B', 0),
  (2, 3, NULL, NULL, NULL, '2016-01-08 13:53:54', '2016-07-14 00:00:00', 'Informatik',
   'Simulation des Urknalls in Whitespace schreiben', 0),
  (2, 4, NULL, NULL, NULL, '2016-01-08 13:53:54', '2016-07-14 00:00:00', 'Informatik',
   'Simulation des Bla in Whitespace schreiben', 0),
  (2, 5, NULL, NULL, NULL, '2016-01-08 13:53:54', '2016-07-14 00:00:00', 'Informatik',
   'Simulation des Schule in Whitespace schreiben', 0),
  (2, 6, NULL, NULL, NULL, '2016-01-08 13:53:54', '2016-07-14 00:00:00', 'Informatik',
   'Simulation des Käsimir in Whitespace schreiben', 0),
  (2, 7, NULL, NULL, NULL, '2016-01-08 13:53:54', '2016-07-14 00:00:00', 'Informatik',
   'Simulation des Informatik in Whitespace schreiben', 0),
  (2, 8, NULL, NULL, NULL, '2016-01-08 13:53:54', '2016-07-14 00:00:00', 'Informatik',
   'Simulation des Computer in Whitespace schreiben', 0),
  (2, 9, 1, 2, 3, '2016-01-08 13:53:54', '2016-07-14 00:00:00', 'Informatik', '', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uId`             INT(11)      NOT NULL,
  `uFirstName`      varchar(255) DEFAULT NULL,
  `uLastName`       varchar(255) DEFAULT NULL,
  `uEmail`          varchar(255) DEFAULT NULL,
  `uHashedPassword` varchar(255) DEFAULT NULL,
  `uSessionKey`     VARCHAR(255) NOT NULL
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uId`, `uFirstName`, `uLastName`, `uEmail`, `uHashedPassword`, `uSessionKey`) VALUES
(1, 'Hans', 'Wurst', 'a@b.c', '$2y$10$iDxajeIPcXEhcDydBfQyZOl3cAbHJFCrkN64OqbD9o7v1NgVf/moG', ''),
  (2, 'Jonas', 'Otto', 'jottosmail@gmail.com', '$2y$10$baPK0amca8jlCD630y5MKuLc0YwqBl.TfyH67G7AvxFsAiAwHAh8u',
   '$2y$10$XIVN4cVbjcEvjeWaME5BWe.p0S2nur2f0p8tdpk4m775dAMNdDoJu');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `books`
--
ALTER TABLE `books`
ADD PRIMARY KEY (`bId`);

--
-- Indizes für die Tabelle `homework`
--
ALTER TABLE `homework`
ADD PRIMARY KEY (`hId`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`uId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `books`
--
ALTER TABLE `books`
MODIFY `bId` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT für Tabelle `homework`
--
ALTER TABLE `homework`
MODIFY `hId` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 10;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
MODIFY `uId` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
