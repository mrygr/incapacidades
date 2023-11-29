-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-11-2023 a las 07:17:17
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `incapacidades_empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
CREATE TABLE IF NOT EXISTS `colaboradores` (
  `id_colaborador` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_colaborador` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email_colaborador` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_colaborador` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_colaborador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id_colaborador`, `nombre_colaborador`, `email_colaborador`, `telefono_colaborador`, `password`) VALUES
('10258547896', 'Emanuel David Henao Giraldo', 'emanuel.giraldo3@gmail.com', '3245678901', '$2y$10$RtHeoAXUThE4MvqSkdABY.6P/Org4VnuVLV./w/UywmmvuFOrrawm'),
('14567896541', 'Felipe Duran Zapata', 'fedaza@gmail.com', '3214567321', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incapacidades`
--

DROP TABLE IF EXISTS `incapacidades`;
CREATE TABLE IF NOT EXISTS `incapacidades` (
  `id_incapacidad` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_incapacidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `ruta_archivos` longtext COLLATE utf8_spanish_ci NOT NULL,
  `estado_incapacidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'REPORTADA',
  `id_colaborador` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_incapacidad`),
  KEY `colaboradorXincapacidad` (`id_colaborador`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`nombre`, `cedula`, `email`, `contrasena`) VALUES
('yercin', 1088325831, 'yercin.gonzalez@utp.edu.co', '1234'),
('yercin', 1088325832, 'yercin.gonzalez@utp.edu.c', ''),
('Lucas', 12345, 'lucas@utp.edu.co', '1234');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incapacidades`
--
ALTER TABLE `incapacidades`
  ADD CONSTRAINT `colaboradorXincapacidad` FOREIGN KEY (`id_colaborador`) REFERENCES `colaboradores` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
