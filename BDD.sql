-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2021 a las 18:56:58
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cometido2`
--
CREATE DATABASE IF NOT EXISTS `cometido2` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `cometido2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre_ciudad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fk_id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre_ciudad`, `estado`, `fk_id_provincia`) VALUES
(1, 'chillan', 1, 1),
(2, 'chillan 2', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cometido`
--

CREATE TABLE `cometido` (
  `id_cometido` int(11) NOT NULL,
  `con_viatico` tinyint(1) NOT NULL,
  `dias_sin_pernoctar` int(11) NOT NULL,
  `dias_con_pernoctar` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `motivo_cometido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tranporte_ida` int(11) NOT NULL,
  `transporte_regreso` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `descreipcion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fk_id_item` int(11) NOT NULL,
  `fk_id_funcionario` int(11) NOT NULL,
  `fk_id_director` int(11) DEFAULT NULL,
  `fk_id_jefe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cometido`
--

INSERT INTO `cometido` (`id_cometido`, `con_viatico`, `dias_sin_pernoctar`, `dias_con_pernoctar`, `monto`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`, `motivo_cometido`, `tranporte_ida`, `transporte_regreso`, `estado`, `descreipcion`, `fk_id_item`, `fk_id_funcionario`, `fk_id_director`, `fk_id_jefe`) VALUES
(1, 1, 1, 1, 12000, '2021-11-07', '2021-11-01', '15:36:00', '14:36:00', 'asd', 0, 2, 0, 'asd', 1, 1, NULL, NULL),
(2, 1, 1, 2, 12000, '2021-11-12', '2021-11-20', '00:47:00', '19:51:00', 'asd', 1, 0, 0, 'asd', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cant_funcionarios` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`, `cant_funcionarios`, `piso`, `estado`) VALUES
(1, 'Choferes', 5, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `fk_id_cometido` int(11) NOT NULL,
  `fk_id_sector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `fk_id_cometido`, `fk_id_sector`) VALUES
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 2),
(10, 1, 1),
(11, 1, 1),
(12, 1, 2),
(13, 1, 1),
(14, 1, 2),
(15, 1, 3),
(16, 1, 2),
(17, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_presupuestario`
--

CREATE TABLE `item_presupuestario` (
  `id_item` int(11) NOT NULL,
  `nombre_item` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `descripcion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `item_presupuestario`
--

INSERT INTO `item_presupuestario` (`id_item`, `nombre_item`, `porcentaje`, `estado`, `descripcion`) VALUES
(1, 'Ley 12.000', 5, 1, 'este es el item de la 12000'),
(2, 'Ley 12.000 - 2', 10, 1, 'este es el item de la 12000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto`
--

CREATE TABLE `monto` (
  `id_monto` int(11) NOT NULL,
  `monto_sin_pernoctar` int(11) NOT NULL,
  `monto_con_pernoctar` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fk_id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `monto`
--

INSERT INTO `monto` (`id_monto`, `monto_sin_pernoctar`, `monto_con_pernoctar`, `grado`, `estado`, `fk_id_item`) VALUES
(1, 5555, 5555, 2, 1, 2),
(2, 10000, 10000, 1, 1, 1),
(3, 1212, 1212, 3, 1, 2),
(4, 8888, 8888, 8, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `nombre_provincia` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fk_id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nombre_provincia`, `estado`, `fk_id_region`) VALUES
(1, 'provincia nuble', 1, 16),
(3, 'diguillin', 1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id_region` int(11) NOT NULL,
  `nombre_region` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `numero_region` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id_region`, `nombre_region`, `numero_region`, `estado`) VALUES
(15, 'region 15', 15, 1),
(16, 'nuble', 16, 1),
(17, 'Atacama', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id_sector` int(11) NOT NULL,
  `nombre_sector` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fk_id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id_sector`, `nombre_sector`, `estado`, `fk_id_ciudad`) VALUES
(1, 'Los Volcanes 1', 1, 1),
(2, 'Las Mariposas 1', 1, 1),
(3, 'Los Volcanes 3', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rut` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `tipo_funcionario` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `authKey` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `accessToken` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT 1,
  `fk_id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `email`, `rut`, `estado`, `grado`, `tipo_funcionario`, `role`, `password`, `authKey`, `accessToken`, `activate`, `fk_id_departamento`) VALUES
(1, 'Chofer', 'null', 22222222, 1, 25, 1, 2, 'asd', 'asd', 'asd', 1, 1),
(3, 'Chofer', 'null', 22222222, 1, 25, 1, 1, 'asd', 'asd', 'asd', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `patente` varchar(8) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_combustible` int(11) NOT NULL,
  `num_chasis` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `kilometraje` int(11) NOT NULL,
  `rendimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `hora_salida` time DEFAULT NULL,
  `hora_llegada` time DEFAULT NULL,
  `combustible_litros` int(11) DEFAULT NULL,
  `combustible_pesos` int(11) DEFAULT NULL,
  `kilometros_salida` int(11) DEFAULT NULL,
  `kilometros_llegada` int(11) DEFAULT NULL,
  `kilometros_total` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `observaciones` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fk_id_vehiculo` int(11) NOT NULL,
  `fk_id_cometido` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `fk_id_provincia` (`fk_id_provincia`);

--
-- Indices de la tabla `cometido`
--
ALTER TABLE `cometido`
  ADD PRIMARY KEY (`id_cometido`),
  ADD KEY `fk_id_item` (`fk_id_item`),
  ADD KEY `fk_id_funcionario` (`fk_id_funcionario`),
  ADD KEY `fk_id_director` (`fk_id_director`),
  ADD KEY `fk_id_jefe` (`fk_id_jefe`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_destino`),
  ADD KEY `fk_id_cometido` (`fk_id_cometido`),
  ADD KEY `fk_id_sector` (`fk_id_sector`);

--
-- Indices de la tabla `item_presupuestario`
--
ALTER TABLE `item_presupuestario`
  ADD PRIMARY KEY (`id_item`);

--
-- Indices de la tabla `monto`
--
ALTER TABLE `monto`
  ADD PRIMARY KEY (`id_monto`),
  ADD KEY `fk_id_item` (`fk_id_item`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `fk_id_region` (`fk_id_region`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id_region`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id_sector`),
  ADD KEY `fk_id_ciudad` (`fk_id_ciudad`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_departamento` (`fk_id_departamento`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `fk_id_vehiculo` (`fk_id_vehiculo`),
  ADD KEY `fk_id_cometido` (`fk_id_cometido`),
  ADD KEY `fk_id` (`fk_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cometido`
--
ALTER TABLE `cometido`
  MODIFY `id_cometido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `item_presupuestario`
--
ALTER TABLE `item_presupuestario`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `monto`
--
ALTER TABLE `monto`
  MODIFY `id_monto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_provincia_fk_id_provincia` FOREIGN KEY (`fk_id_provincia`) REFERENCES `provincia` (`id_provincia`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `cometido`
--
ALTER TABLE `cometido`
  ADD CONSTRAINT `cometido_item_presupuestario_fk_id_item` FOREIGN KEY (`fk_id_item`) REFERENCES `item_presupuestario` (`id_item`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cometido_user_fk_id_director` FOREIGN KEY (`fk_id_director`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cometido_user_fk_id_funcionario` FOREIGN KEY (`fk_id_funcionario`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cometido_user_fk_id_jefe` FOREIGN KEY (`fk_id_jefe`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `destino_cometido_fk_id_cometido` FOREIGN KEY (`fk_id_cometido`) REFERENCES `cometido` (`id_cometido`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `destino_sector_fk_id_sector` FOREIGN KEY (`fk_id_sector`) REFERENCES `sector` (`id_sector`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `monto`
--
ALTER TABLE `monto`
  ADD CONSTRAINT `monto_item_presupuestario_fk_id_item` FOREIGN KEY (`fk_id_item`) REFERENCES `item_presupuestario` (`id_item`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_region_fk_id_region` FOREIGN KEY (`fk_id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `sector`
--
ALTER TABLE `sector`
  ADD CONSTRAINT `sector_ciudad_fk_id_ciudad` FOREIGN KEY (`fk_id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_departamento_fk_id_departamento` FOREIGN KEY (`fk_id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_cometido_fk_id_cometido` FOREIGN KEY (`fk_id_cometido`) REFERENCES `cometido` (`id_cometido`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_user_fk_id` FOREIGN KEY (`fk_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_vehiculo_fk_id_vehiculo` FOREIGN KEY (`fk_id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
