-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2017 a las 18:50:56
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
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `id_lista` int(11) DEFAULT NULL,
  `nombre_item` varchar(50) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `completado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id_item`, `id_lista`, `nombre_item`, `fecha_creacion`, `completado`) VALUES
(1, 3, 'cocos', '2017-03-26', 1),
(2, 3, 'uvas', '2017-03-27', 1),
(3, 3, 'dfasdfdsaf', '2017-03-27', 1),
(4, 3, 'dsfsadfsad', '2017-03-27', 1),
(5, 3, 'gfddsafgfdsg', '2017-03-27', 1),
(6, 3, 'cocos', '2017-03-27', 1),
(7, 9, 'fjdsajfÃ±lÂ´dsajfÃ±Ã¡', '2017-03-27', 1),
(8, 9, 'sadfsadfsadvf', '2017-03-27', 1),
(9, 9, 'sadfdsafdsaf', '2017-03-27', 1),
(10, 3, 'fsdfsafd', '2017-03-27', 1),
(11, 4, 'dfsdfsdf', '2017-03-27', 0),
(12, 3, 'dsfsdfdsf', '2017-03-28', 1),
(13, 4, 'dsfasfd', '2017-03-28', 0),
(14, 4, 'sfdsadf', '2017-03-28', 0),
(15, 10, 'safdsfsd', '2017-03-28', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id_lista` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_lista` varchar(30) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `completada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id_lista`, `id_usuario`, `nombre_lista`, `fecha_creacion`, `fecha_caducidad`, `completada`) VALUES
(3, 1, 'dsfafdasfd', '2017-03-17', '2017-03-29', 0),
(4, 1, 'fsdfasdf', '2017-03-17', '2017-03-25', 0),
(5, 1, 'sadfsadfsadfdsaf', '2017-03-23', '2017-03-31', 0),
(6, 2, 'cosas1', '2017-03-27', '2017-03-31', 0),
(9, 3, 'fsafgsfdgdfb', '2017-03-27', '2017-03-15', 0),
(10, 1, 'dfasdfdsafsadf', '2017-03-27', '2017-03-03', 0),
(11, 1, 'sdfdsf', '2017-03-28', '2017-03-09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `email`) VALUES
(1, 'cris', 'cris', 'cris@cris.com'),
(2, 'kuri', 'kuri', 'kuri@kuri.com'),
(3, 'paco', 'paco', 'paco@paco.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `list_id_fk` (`id_lista`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id_lista`),
  ADD KEY `lis_usu_fk` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `list_id_fk` FOREIGN KEY (`id_lista`) REFERENCES `listas` (`id_lista`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `lis_usu_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
