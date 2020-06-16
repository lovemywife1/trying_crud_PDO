-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 11 mei 2020 om 12:10
-- Serverversie: 5.7.26
-- PHP-versie: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_db3`
--
CREATE DATABASE IF NOT EXISTS `crud_db3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crud_db3`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Nederland'),
(2, 'Belgie'),
(3, 'Malediven');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `publisher` varchar(45) NOT NULL,
  `releasedate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `game`
--

INSERT INTO `game` (`id`, `name`, `publisher`, `releasedate`) VALUES
(1, 'FIFI 2019', 'EA', '2019-12-12 00:00:00'),
(2, 'Overwatch', 'EA', '2019-12-12 00:00:00'),
(3, 'Halo 3', 'Bungy', '2019-12-12 00:00:00'),
(4, 'League of Legends', 'Blizzard', '2019-12-12 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_person_country_idx` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `person`
--

INSERT INTO `person` (`id`, `firstname`, `lastname`, `is_active`, `country_id`) VALUES
(2, 'Denny44444', 'asdfasd2', 0, 3),
(4, 'asdf asdf ', 'asdf asdf ', 0, 2),
(5, 'sdfgsdfgasdf22', 'asdfasdfsdf22', 1, 1),
(6, 'yyyyyyy', 'yyyyy', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person_game`
--

DROP TABLE IF EXISTS `person_game`;
CREATE TABLE IF NOT EXISTS `person_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_persongame_person_idx` (`person_id`),
  KEY `fk_persongame_game_idx` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `person_game`
--

INSERT INTO `person_game` (`id`, `person_id`, `game_id`) VALUES
(15, 5, 2),
(16, 5, 3),
(17, 5, 1),
(18, 6, 1),
(19, 6, 2),
(20, 2, 2);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fk_person_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `person_game`
--
ALTER TABLE `person_game`
  ADD CONSTRAINT `fk_persongame_game` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persongame_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
