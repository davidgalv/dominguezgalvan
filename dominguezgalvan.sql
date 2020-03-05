-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2020 a las 22:48:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dominguezgalvan`
--
CREATE DATABASE IF NOT EXISTS `dominguezgalvan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dominguezgalvan`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ubication` varchar(255) NOT NULL,
  `userid` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `name`, `fecha`, `description`, `ubication`, `userid`) VALUES
(29, 'Foto1', '2020-03-05', 'Jaja mira un meme', './imagenes/carlos/Foto1.jpg', 8),
(30, 'Foto2', '2020-03-05', 'Que picaro', './imagenes/carlos/Foto2.jpg', 8),
(31, 'Foto3', '2020-03-05', 'Jaja tan cierto', './imagenes/Jakl2/Foto3.jpg', 9),
(32, 'Foto4', '2020-03-05', 'Tan real xD', './imagenes/Jakl2/Foto4.jpg', 9),
(33, 'Foto5', '2020-03-05', 'jaja si por favor', './imagenes/Linko/Foto5.jpg', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` mediumint(9) NOT NULL,
  `user` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `name`, `passwd`, `mail`, `admin`) VALUES
(1, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@admin.com', 1),
(8, 'Carlos', 'Herpic', '81dc9bdb52d04dc20036dbd8313ed055', 'carlos@iaw.com', 0),
(9, 'David', 'Jakl2', '81dc9bdb52d04dc20036dbd8313ed055', 'david@iaw.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
