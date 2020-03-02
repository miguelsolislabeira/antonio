-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-03-2020 a las 17:12:46
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `misseries`
--
CREATE DATABASE IF NOT EXISTS `misseries` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `misseries`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `idGen` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(100) NOT NULL,
  PRIMARY KEY (`idGen`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGen`, `genero`) VALUES
(7, 'Malditos Millenials'),
(9, 'Costumbrismo español'),
(15, 'felipito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece`
--

DROP TABLE IF EXISTS `pertenece`;
CREATE TABLE IF NOT EXISTS `pertenece` (
  `idPertenece` int(11) NOT NULL AUTO_INCREMENT,
  `idSer` int(11) NOT NULL,
  `idGen` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPertenece`),
  KEY `idSer` (`idSer`),
  KEY `pertenece_ibfk_2` (`idGen`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pertenece`
--

INSERT INTO `pertenece` (`idPertenece`, `idSer`, `idGen`) VALUES
(16, 38, 9),
(21, 48, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `idSer` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `temporadas` tinyint(4) NOT NULL,
  `puntuacion` float(6,2) NOT NULL,
  `plataforma` varchar(255) DEFAULT NULL,
  `argumento` text NOT NULL,
  PRIMARY KEY (`idSer`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`idSer`, `titulo`, `fecha`, `temporadas`, `puntuacion`, `plataforma`, `argumento`) VALUES
(38, 'Prueba insert', '2020-12-31', 2, 3.00, 'Netflix', 'ñ'),
(45, 'Otra Prueba insert', '2020-12-29', 3, 3.00, 'HBO', 'polilolo'),
(46, 'opopopojhjh', '2020-12-29', 2, 3.00, 'Netflix', 'qqqq'),
(47, 'opopopojhjh', '2020-12-29', 2, 3.00, 'Netflix', 'qqqq'),
(48, 'opopopojhjh', '2020-12-29', 2, 3.00, 'Netflix', 'qqqq');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pertenece`
--
ALTER TABLE `pertenece`
  ADD CONSTRAINT `pertenece_ibfk_1` FOREIGN KEY (`idSer`) REFERENCES `serie` (`idSer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pertenece_ibfk_2` FOREIGN KEY (`idGen`) REFERENCES `genero` (`idGen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
