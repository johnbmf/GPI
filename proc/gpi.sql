-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-08-2018 a las 02:06:59
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gpi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesolicitud`
--

DROP TABLE IF EXISTS `detallesolicitud`;
CREATE TABLE IF NOT EXISTS `detallesolicitud` (
  `sol_id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `item_id` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detallesolicitud`
--

INSERT INTO `detallesolicitud` (`sol_id`, `nombre`, `cantidad`, `item_id`) VALUES
(3578, 'Tuberia cobre 1m', 3, '2'),
(3578, 'Pala', 2, '4'),
(3578, 'Placa Compactadora', 10, '6'),
(3579, 'Tuberia cobre 1m', 3, '2'),
(3579, 'Pala', 2, '4'),
(3579, 'Placa Compactadora', 10, '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `item_id` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`item_id`, `nombre`, `categoria`, `stock`) VALUES
('1', 'Luminaria LED', 'MATERIAL', 10),
('2', 'Tuberia cobre 1m', 'MATERIAL', 5),
('3', 'Calvos 1 pulgada', 'MATERIAL', 10),
('4', 'Pala', 'HERRAMIENTA', 50),
('5', 'Carretilla', 'HERRAMIENTA', 40),
('6', 'Placa Compactadora', 'HERRAMIENTA', 5),
('7', 'Rotomartillo 1500W', 'HERRAMIENTA', 6),
('8', 'Cemento 25kg', 'MATERIAL', 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE IF NOT EXISTS `solicitud` (
  `sol_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` date NOT NULL,
  `fecha_limite` date NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=666666667 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`sol_id`, `fecha_creacion`, `fecha_limite`, `estado`, `comentario`) VALUES
(3578, '2018-08-06', '2018-08-09', 'PENDIENTE', 'Despacho por entrada secundaria debido a trabajos en la entrada principal.'),
(3579, '2018-08-06', '2018-08-09', 'PENDIENTE', 'Despacho por entrada secundaria debido a trabajos en la entrada principal.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `user` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user`, `pass`, `tipo`) VALUES
('admin', 'MTIzNDU2', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
