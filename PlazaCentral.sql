-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `empaques_limpio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendaempaques`
--

DROP TABLE IF EXISTS `tiendaempaques`;

CREATE TABLE `tiendaempaques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_barras` varchar(255) DEFAULT NULL,
  `des_Item` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `num-caja` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ref` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcado de datos para la tabla `tiendaempaques` (Puedes eliminar los INSERT si quieres empezar vacío)
INSERT INTO `tiendaempaques` (`id`, `codigo_barras`, `des_Item`, `cantidad`, `num-caja`, `fecha_registro`, `Ref`) VALUES
(1, '3', '3', 1, 3, '2024-07-25 05:00:00', '3'),
(2, '7770023', 'DEF5678', 2, 2, '2024-07-25 05:00:00', 'REF003'),
-- Agrega aquí más datos si es necesario
(47, '7043722', 'TOOL SET', 1, 2, '2024-08-02 12:45:59', 'TOY3722');

COMMIT;
