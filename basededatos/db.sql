-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para dominguezgalvan
CREATE DATABASE IF NOT EXISTS `dominguezgalvan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dominguezgalvan`;

-- Volcando estructura para tabla dominguezgalvan.imagenes
CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ubication` varchar(255) NOT NULL,
  `userid` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dominguezgalvan.imagenes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
REPLACE INTO `imagenes` (`id`, `name`, `fecha`, `description`, `ubication`, `userid`) VALUES
	(24, 'herpic huele mal', '2020-03-03', 'prueba', './imagenes/victor/herpic huele mal.jpg', 5),
	(25, 'soy david el no homo', '2020-03-03', 'herpic es mi novio', './imagenes/david/soy david el no homo.jpg', 7),
	(26, 'barduco come pitos', '2020-03-03', '', './imagenes/diego/barduco come pitos.jpg', 4);
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;

-- Volcando estructura para tabla dominguezgalvan.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dominguezgalvan.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`id`, `user`, `name`, `passwd`, `mail`, `admin`) VALUES
	(4, 'barduco', 'diego', '81dc9bdb52d04dc20036dbd8313ed055', 'dczc@gmail.com', 0),
	(5, 'linko', 'victor', '81dc9bdb52d04dc20036dbd8313ed055', 'linko@gmail.com', 0),
	(6, 'herpic', 'carlos', '81dc9bdb52d04dc20036dbd8313ed055', 'herpic@gmail.com', 0),
	(7, 'jakl2', 'david', '81dc9bdb52d04dc20036dbd8313ed055', 'jak@gmail.com', 0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
