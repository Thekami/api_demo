-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.15-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para api_demo
DROP DATABASE IF EXISTS `api_demo`;
CREATE DATABASE IF NOT EXISTS `api_demo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `api_demo`;

-- Volcando estructura para tabla api_demo.personas
DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT '',
  `primer_ap` varchar(100) DEFAULT '',
  `segundo_ap` varchar(100) DEFAULT '',
  `direccion` varchar(100) DEFAULT '',
  `telefono` varchar(50) DEFAULT '',
  `status` int(11) DEFAULT NULL,
  `asignado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla api_demo.personas: 9 rows
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` (`id`, `nombres`, `primer_ap`, `segundo_ap`, `direccion`, `telefono`, `status`, `asignado`) VALUES
	(2, 'Oscar', 'Hernandez', '-', '-', '0', 1, 1),
	(3, 'Miguel Angel', 'Hidalgo', 'Cruz', '-', '0', 1, 1),
	(4, 'Miguel Angel', 'Vargas', 'Vazquez', '-', '0', 0, 1),
	(5, 'orlando', 'leal', 'ramires', ',', '0', 1, 1),
	(6, 'armando', 'delgado', 'martinez', ',', '0', 1, 1),
	(7, 'marselino', 'alcaras', 'sanches', ',', '0', 1, 1),
	(8, 'jose luis', 'ramires', 'ocha', ',', '0', 1, 1),
	(9, 'jose alexeiv', 'garcia', 'zuñiga', ',', '0', 1, 1),
	(10, 'fernando', 'perez', 'gonzales', ',', '0', 1, 1);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla api_demo.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla api_demo.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `username`, `password`, `tipo`, `status`) VALUES
	(1, 'angel', 'torres', 1, 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
