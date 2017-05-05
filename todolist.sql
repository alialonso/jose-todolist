-- create database todolist;
USE todolist;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2017 a las 18:56:06
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todolist`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `comentarios` varchar(256) DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario` int(11) NOT NULL,
  `vencimiento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id`, `nombre`, `comentarios`, `fecha`, `usuario`, `vencimiento`, `completada`) VALUES
(1, 'lista con fecha', 'kj kj ñlj ñiñ j', '2017-03-09 02:44:09', 0, '2018-03-01 00:00:00', 1),
(2, 'lista con fecha', 'kj kj ñlj ñiñ j', '2017-03-05 02:48:05', 0, '2018-03-01 00:00:00', 1),
(3, 'lista compra', 'kj kj lj i j', '0000-00-00 00:00:00', 2, '2018-03-01 00:00:00', 0),
(4, 'lista con fecha 4', 'kj kj lj i j lista 4', '0000-00-00 00:00:00', 2, '2018-03-01 00:00:00', 0),
(5, 'lista  5', '5555555555555 5555555555', '2017-03-07 02:58:07', 2, '2018-03-01 00:00:00', 0),
(6, 'lista con fecha', 'kj kj ñlj ñiñ j', '0000-00-00 00:00:00', 0, '2018-03-01 00:00:00', 1),
(7, 'lista con fecha 7', 'kj kj lj i j', '2017-03-29 03:27:29', 2, '2018-03-01 00:00:00', 1),
(8, 'lista con fecha', 'kj kj ñlj ñiñ j', '0000-00-00 00:00:00', 0, '2018-03-01 00:00:00', 1),
(9, 'lista con fecha', 'kj kj ñlj ñiñ j', '2017-03-24 03:30:24', 0, '2018-03-01 00:00:00', 1),
(10, 'lista con fecha 10', 'kj kjlj i j lllllllllllllll', '0000-00-00 00:00:00', 2, '2019-03-01 00:00:00', 0),
(11, 'lista con fecha', 'kj kj ñlj ñiñ j', '2017-03-21 04:30:21', 0, '2018-03-01 00:00:00', 1),
(12, 'lista con fecha', 'kj kj ñlj ñiñ j', '2017-03-01 04:31:01', 0, '2018-03-01 00:00:00', 1),
(13, 'lista con fecha', 'kj kj ñlj ñiñ j', '2017-03-09 04:34:09', 0, '2018-03-01 00:00:00', 1),
(14, 'lista con fecha', 'kj kj ñlj ñiñ j', '0000-00-00 00:00:00', 0, '2018-03-01 00:00:00', 1),
(15, 'lista con fecha', 'kj kj ñlj ñiñ j', '0000-00-00 00:00:00', 0, '2018-03-01 00:00:00', 1),
(16, 'lista con fecha', 'kj kj ñlj ñiñ j', '0000-00-00 00:00:00', 0, '2018-03-01 00:00:00', 1),
(17, 'lista con fecha', 'kj kj ñlj ñiñ j', '0000-00-00 00:00:00', 0, '2018-03-01 00:00:00', 1),
(18, 'lista con fecha', 'kj kj ñlj ñiñ j', '2017-03-07 04:44:07', 0, '2018-03-01 00:00:00', 1),
(19, 'lista con fecha', 'kj kj ñlj ñiñ j', '0000-00-00 00:00:00', 0, '2018-03-01 00:00:00', 1),
(20, 'lista con fecha', 'kj kj ñlj ñiñ j', '0000-00-00 00:00:00', 0, '2018-03-01 00:00:00', 1),
(21, 'lista con fecha', 'kj kj ñlj ñiñ j', '0000-00-00 00:00:00', 5, '2018-03-01 00:00:00', 1),
(22, 'lista con fecha', 'kj kj ñlj ñiñ j', '2017-03-30 07:08:30', 5, '2018-03-01 00:00:00', 1),
(23, 'lista con fecha 23', 'kj kj lj ij', '2017-03-04 08:58:04', 2, '2018-03-01 00:00:00', 1),
(24, 'lista con fecha', 'kj kj ñlj ñiñ j', '2017-03-10 10:33:10', 4, '2018-03-01 00:00:00', 1),
(25, 'lista con fecha 25', 'jh 123 hhjklhjklh', '2017-03-29 12:32:29', 2, '2018-03-01 00:00:00', 0),
(26, 'lista con fecha 26', 'kj kj  j', '2017-03-11 12:52:11', 2, '2018-03-01 00:00:00', 1),
(27, 'lista de la compra', 'para comprar', '2017-03-22 06:21:11', 3, '2017-03-30 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `texto` varchar(256) NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `lista` int(11) NOT NULL,
  `finalizacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activa` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `texto`, `fecha`, `lista`, `finalizacion`, `activa`) VALUES
(1, 'texto 1 en nota 4', '0000-00-00 00:00:00', 4, '2017-03-23 05:51:40', 1),
(2, 'nota1 en lista 7', '2017-03-23 09:11:23', 7, '2017-03-23 06:52:53', 1),
(3, 'peras', '2017-03-26 04:12:26', 4, '2017-03-23 06:02:51', 1),
(4, 'xcsxcx ', '2017-03-12 04:53:12', 4, '2017-03-22 08:31:21', 0),
(5, 'ir a rioshopping', '0000-00-00 00:00:00', 4, '2017-03-22 08:38:49', 0),
(6, '46643 n 436 ', '0000-00-00 00:00:00', 4, '2017-03-22 08:39:41', 0),
(7, 'toma nota', '0000-00-00 00:00:00', 4, '2017-03-21 18:53:59', 1),
(8, 'fresas', '2017-03-06 06:56:06', 3, '2017-03-23 06:17:25', 0),
(9, 'tomates', '2017-03-05 06:59:05', 3, '2017-03-23 06:17:44', 0),
(10, 'limones', '2017-03-30 07:12:30', 3, '2017-03-23 06:17:46', 1),
(11, 'ir al mÃ©dico', '2017-03-30 07:57:30', 5, '2017-03-23 06:01:52', 0),
(12, 'melones', '0000-00-00 00:00:00', 3, '2017-03-23 05:40:39', 0),
(13, 'sandias', '0000-00-00 00:00:00', 3, '2017-03-23 05:40:40', 0),
(14, 'ver a luis', '0000-00-00 00:00:00', 5, '2017-03-23 06:02:27', 1),
(15, 'ver a juan', '2017-03-14 09:23:14', 5, '2017-03-23 06:02:28', 1),
(16, 'ir al baloncesto', '2017-03-19 09:24:19', 10, '2017-03-22 09:29:11', 1),
(17, 'ir al mÃ©dico', '0000-00-00 00:00:00', 7, '2017-03-23 06:52:52', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `apellidos` varchar(256) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `comentarios` varchar(256) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `tipo_de_pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellidos`, `dni`, `email`, `sexo`, `telefono`, `comentarios`, `usuario`, `password`, `tipo_de_pago`) VALUES
(2, 'pepe', 'gutierrez bernal', '123456', 'pepe@gmail.com', 'M', '999999999', 'comentar + + + + + 33', 'pepe', '123456', 1),
(3, 'pepin', 'gutierrez perez', '12345678K', 'pepe@gmail.com', 'M', '666666666', 'comentarios', 'pepin', '123456', NULL),
(4, 'luis', 'fer', '123456789', 'alialonso69', 'F', '668888888', 'ccc', 'luis', '123456', 2),
(5, 'alfredo', 'kkk', '44444', 'aa', 'F', '888888', 'ttttttt tret', 'alf', '123456', 1),
(6, 'elsa', 'alonso', '4567232123', 'elsa@e.es', 'F', '5641237447', 'comentarios elsa', 'elsa', '123456', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_pago`
--

CREATE TABLE `tipo_de_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_pago`
--

INSERT INTO `tipo_de_pago` (`id`, `nombre`) VALUES
(1, 'Paypal'),
(2, 'A la entrega');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `per_usu_uk` (`usuario`);

--
-- Indices de la tabla `tipo_de_pago`
--
ALTER TABLE `tipo_de_pago`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_de_pago`
--
ALTER TABLE `tipo_de_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
