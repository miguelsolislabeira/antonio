-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-02-2020 a las 17:22:40
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `idGen` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(100) NOT NULL,
  PRIMARY KEY (`idGen`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGen`, `genero`) VALUES
(1, 'Drama'),
(2, 'Comedia'),
(3, 'Terror'),
(4, 'Thriller'),
(5, 'Ciencia-Ficción'),
(6, 'Aventuras'),
(7, 'Malditos Millenials'),
(8, 'Acción'),
(9, 'Costumbrismo español');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pertenece`
--

INSERT INTO `pertenece` (`idPertenece`, `idSer`, `idGen`) VALUES
(1, 1, 4),
(2, 2, 1),
(3, 3, 7),
(4, 4, 8),
(5, 5, 2),
(6, 6, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`idSer`, `titulo`, `fecha`, `temporadas`, `puntuacion`, `plataforma`, `argumento`) VALUES
(1, 'Tell me a Story', '2018-09-22', 2, 4.00, 'HBO', 'Cuentos populares adaptados a la convulsa sociedad en la que vivimos'),
(2, 'The Deuce', '2017-09-21', 3, 4.60, 'HBO', 'De cómo nació la industria del porno en el NY de finales de los 70 y principios de los 80.\r\nJames Franco está fetén'),
(3, 'Euphoria', '2019-10-27', 1, 4.10, 'HBO', 'Madre mía cómo están las cabezas de los adolescentes!'),
(4, 'Narcos', '2017-05-09', 4, 4.30, 'Netflix', 'De cómo una buena serie tenía que haberse quedado en la primera temporada o, si acaso, en la segunda.'),
(5, 'Farmacia de Guardia', '1994-11-26', 10, 4.90, 'Antena 3', 'Para adentro, Romerales!!'),
(6, 'Lleno, por favor', '1993-05-06', 4, 4.99, 'Antena 3', 'Alfredo Landa dando lo mejor de sí');

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
