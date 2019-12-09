-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-12-2019 a las 18:40:32
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `precio` double UNSIGNED NOT NULL,
  `foto` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `disponible` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `descripcion`, `precio`, `foto`, `disponible`, `created`, `color`) VALUES
(1, 'iPhone', '11', 809, 'inegro11.jpg', 'S', '2019-03-10 19:07:16', 'negro'),
(2, 'iPhone', '11', 809, 'iblanco11.jpg', 'S', '2019-03-10 19:07:16', 'blanco'),
(3, 'iPhone', 'X', 1029, 'inegrox.jpg', 'S', '2019-03-10 19:07:16', 'negro'),
(4, 'iPhone', 'X', 1029, 'iblancox.jpg', 'S', '2019-03-10 19:07:16', 'blanco'),
(5, 'Samsung Galaxy', 'A70', 339, 'samnegroa70.jpg', 'S', '2019-03-10 19:07:17', 'negro'),
(6, 'Samsung Galaxy', 'A70', 339, 'samazula70.jpg', 'S', '2019-03-10 19:07:17', 'azul'),
(7, 'Samsung Galaxy', 'A10', 169, 'samazula10.jpg', 'S', '2019-03-10 19:07:17', 'azul'),
(8, 'Samsung Galaxy', 'A10', 169, 'samplataa10.jpg', 'S', '2019-03-10 19:07:17', 'plateado'),
(9, 'Xiaomi', 'Mi A3', 249, 'xiablancoa3.jpg', 'S', '2019-03-10 19:07:17', 'blanco'),
(10, 'Xiaomi', 'Mi A3', 249, 'xiaazula3.jpg', 'S', '2019-03-10 19:07:17', 'azul'),
(11, 'Xiaomi', 'Mi A3', 249, 'xianegroa3.jpg', 'S', '2019-11-04 22:32:57', 'negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `hashpass` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `email`, `hashpass`, `created`) VALUES
(1, 'JUAN ORTIZ', 'juan@dominio.es', '$2y$10$c7gKrdI3JDeB/ZDy.7Hc.eZV1NLsFeSv0xyfnLt8pRdAChdI74kIO', '2019-03-10 19:07:16'),
(2, 'ANA MERINO', 'ana@hotmail.com', '$2y$10$uS6ZcjmuoT0fp/lxypAhA.MeQtHBzJTQeSCYpOGsAe4/egayUEYEm', '2019-03-10 19:07:16'),
(3, 'admin', 'admin@admin.com', '$2y$10$N13VAa26xLcVb3I9gsJHFe5Sf2XLQv/6M5KIjUk.DIGmD5x8sfK02', '2019-12-08 11:53:01'),
(6, 'mario', 'mario@mario.com', '$2y$10$QG5jcZePIr9ZpZ0JK03ef.9FpH3V5RtqRdRzhVZxm/GYDZH/epmqS', '2019-12-09 11:32:51'),
(7, 'pep', 'carlo@dominio.es', '$2y$10$is5a6ldSXnzSJG5ZygOc7.dZza4p5GZ/7kB/uIw3J0okz/We3mJWu', '2019-12-09 11:34:03'),
(9, 'marcos', 'mar@m.com', '$2y$10$pNEkAzYxnbgI/tW6.fCh9uSp2j33hSIDELmteoza6MFj1XQL/om/G', '2019-12-09 14:12:12'),
(10, 'pepe', 'pepillo@gmail.com', '$2y$10$LEQFuDB7nGCYxJ2uQOrEwuUbOz4yliuCflEcDgmN9btgPyp4BUeIe', '2019-12-09 14:18:32'),
(11, 'carla', 'carla@carla.com', '$2y$10$p2YsTZLOEGqDMFXdaxw72uFBGseV92DwNuoXHwAUdFkswZXMRY27S', '2019-12-09 18:01:59'),
(12, 'manu', 'manu@manu.com', '$2y$10$HxEDLJu4nyvDWfkmE.C/n.Wy7QhE3ALZ2LcwlmQi45XtQOjPDGkWa', '2019-12-09 18:19:46'),
(13, 'mercos', 'mercos@mercos.com', '$2y$10$ew8igPrxOdx.TqyDnIzei.JVF0ZHxQwiqobJPbxvYzkw.ycfhtsOu', '2019-12-09 18:22:58'),
(14, 'hshhs', 'jsjsjs@hotmail.com', '$2y$10$jPS/rXRvVJAo3tIAPk4GEeSYL6a5evSqmn7VNWoma65GmpnYF3sti', '2019-12-09 18:27:56'),
(15, 'JonNoriega', 'jonnoriega@gmail.com', '$2y$10$1Jt8budQyKzjDMQetV0D8eXj5pRGvyT/1D48/7VWg4e863PVxZkwO', '2019-12-09 19:27:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id_cliente` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `fecha_venta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Estado` varchar(40) COLLATE latin1_spanish_ci NOT NULL DEFAULT 'En proceso...',
  `num` int(200) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`,`id_articulo`),
  KEY `compras_ida_FK` (`id_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ida_FK` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id`),
  ADD CONSTRAINT `compras_idc_FK` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
