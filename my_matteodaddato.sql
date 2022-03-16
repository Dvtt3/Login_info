-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2022 alle 12:33
-- Versione del server: 8.0.21
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_matteodaaddato`
--
CREATE DATABASE IF NOT EXISTS `my_matteodaaddato` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `my_matteodaaddato`;

-- --------------------------------------------------------

--
-- Struttura della tabella `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(15) NOT NULL,
  `Cognome` varchar(15) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=16 ;

--
-- Dump dei dati per la tabella `Users`
--

INSERT INTO `Users` (`ID`, `Nome`, `Cognome`, `Email`, `Telefono`, `Password`) VALUES
(12, 'Matteo', 'DAddato', 'matteo.daddato.1nito@gmail.com', '3386857265', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(13, 'Luca', 'Rossi', 'sdfoafsd@asdasd.com', '3386857111', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(14, 'sofia', 'dadda', 'sofiamontanari@yahoo.com', '3475678907', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(15, 'cere', 'andre', 'matteodd2003@hotmail.com', '1233456546', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
