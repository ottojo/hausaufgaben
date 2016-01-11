-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Jan 2016 um 17:42
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
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = latin1;

--
-- Daten für Tabelle `books`
--

INSERT INTO `books` (`bId`, `bTitle`) VALUES
  (1, 'Mathematik Oberstufe Band 12'),
  (2, 'Informatik Oberstufe'),
  (3, 'Deutschbuch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
  `uId`           INT(11)    NOT NULL,
  `hId`           INT(11)    NOT NULL,
  `bId`           INT(11)             DEFAULT NULL,
  `hPageNr`       INT(11)             DEFAULT NULL,
  `hExerciseNr`   INT(11)             DEFAULT NULL,
  `hCreationTime` TIMESTAMP  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hDeadline`     DATETIME   NOT NULL,
  `hSubject`      TEXT       NOT NULL,
  `hNotes`        TEXT       NOT NULL,
  `hDone`         TINYINT(1) NOT NULL DEFAULT '0'
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 36
  DEFAULT CHARSET = latin1;

--
-- Daten für Tabelle `homework`
--

INSERT INTO `homework` (`uId`, `hId`, `bId`, `hPageNr`, `hExerciseNr`, `hCreationTime`, `hDeadline`, `hSubject`, `hNotes`, `hDone`) VALUES
  (7, 30, 1, 5, 6, '2016-01-11 16:34:49', '2016-01-13 00:00:00', 'Mathe', 'Aufgaben A und B', 0),
  (7, 31, NULL, NULL, NULL, '2016-01-11 16:35:17', '2016-01-13 00:00:00', 'Mathe',
   'Arbeitsblatt zur GLF\r\nRotationskÃ¶rper', 0),
  (7, 32, NULL, NULL, NULL, '2016-01-11 16:35:49', '2016-08-11 00:00:00', 'Informatik', 'GLF', 0),
  (6, 33, 1, 5, 6, '2016-01-11 16:36:50', '2016-01-15 00:00:00', 'Math', 'PIN for nukes is 1234', 1),
  (6, 34, NULL, NULL, NULL, '2016-01-11 16:37:29', '2016-01-27 00:00:00', 'Politics', 'Speech about gun control', 0),
  (5, 35, 1, 5, 6, '2016-01-11 16:38:31', '2016-02-24 00:00:00', 'Math', 'IMPORTANT!!!11!    New Topic', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uId`             INT(11)      NOT NULL,
  `uFirstName`      VARCHAR(255) DEFAULT NULL,
  `uLastName`       VARCHAR(255) DEFAULT NULL,
  `uEmail`          VARCHAR(255) DEFAULT NULL,
  `uHashedPassword` varchar(255) DEFAULT NULL,
  `uSessionKey`     VARCHAR(255) NOT NULL
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 8
  DEFAULT CHARSET = latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uId`, `uFirstName`, `uLastName`, `uEmail`, `uHashedPassword`, `uSessionKey`) VALUES
  (5, 'Bill', 'Gates', 'bill.gates@gmail.com', '$2y$10$ItpsPJZza/lVj4eQ8d2QjuAnPHU8P1O.p0XhVlC5i027Ml50uVaNW',
   '$2y$10$vER9xutM8tGrH9Ps3.Uur.mCmNh8Y/E1iaveJ/02BQUNyXs57iENO'),
  (6, 'Barack', 'Obama', 'barack.obama@gmail.com', '$2y$10$EVuuVdOV/ag8DAeQcgtj/em4Tot14pFMBqCNEkDp7bxzDE./icJ5W',
   '$2y$10$MUbykz3qXkl9awFRbl4QqerSIp0m1FYh7fc.xnoEoGRugxIzEgZXq'),
  (7, 'Jonas', 'Otto', 'jottosmail@gmail.com', '$2y$10$rGWYO5kE.OK3esmqhC0iVuLxxKlT2OKAMzscb/Asv2.g5ISh6GTdC',
   '$2y$10$DFhmj8z2JTIJ/DNfVzTBeu47ICZe/P32.gX5MRjdnXxfLPkPze9Ky');

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
MODIFY `bId` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT für Tabelle `homework`
--
ALTER TABLE `homework`
MODIFY `hId` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 36;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
MODIFY `uId` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
