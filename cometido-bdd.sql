-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2021 a las 14:40:28
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
-- Base de datos: `cometido`
--
CREATE DATABASE IF NOT EXISTS `cometido` DEFAULT CHARACTER SET utf32 COLLATE utf32_spanish2_ci;
USE `cometido`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre_ciudad` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `fk_id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

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
  `motivo_cometido` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `tranporte_ida` int(11) NOT NULL,
  `transporte_regreso` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `descreipcion` varchar(100) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `fk_id_item` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `fk_id_director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `cant_funcionarios` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`, `cant_funcionarios`, `piso`, `estado`) VALUES
(2, 'Departamento de Ventas', 12, 1, 1),
(4, 'Departamento de Ventas', 12, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `fk_id_cometido` int(11) NOT NULL,
  `fk_id_sector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_presupuestario`
--

CREATE TABLE `item_presupuestario` (
  `id_item` int(11) NOT NULL,
  `nombre_item` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf32_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion_comitido`
--

CREATE TABLE `modificacion_comitido` (
  `id_modificacion` int(11) NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `transporte_regreso` int(11) DEFAULT NULL,
  `transporte_ida` int(11) DEFAULT NULL,
  `con_viatico` tinyint(1) DEFAULT NULL,
  `dias_sin_pernoctar` int(11) DEFAULT NULL,
  `dias_con_pernoctar` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fk_id_cometido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto`
--

CREATE TABLE `monto` (
  `id_monto` int(11) NOT NULL,
  `monto_sin_pernoctar` int(11) NOT NULL,
  `monto_con_pernoctar` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fk_id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `nombre_provincia` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `fk_id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id_region` int(11) NOT NULL,
  `nombre_region` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `numero_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id_sector` int(11) NOT NULL,
  `nombre_sector` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `fk_id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `mail` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `rut` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `tipo_funcionario` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `fk_id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `mail`, `rut`, `estado`, `grado`, `tipo_funcionario`, `role`, `fk_id_departamento`) VALUES
(1, 'Rodrigo', 'rodrigo_3006@hotmail.com', 19671144, 1, 12, 0, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `patente` varchar(8) COLLATE utf32_spanish2_ci NOT NULL,
  `modelo` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `marca` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `tipo_combustible` int(11) NOT NULL,
  `num_chasis` varchar(100) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `kilometraje` int(11) NOT NULL,
  `rendimiento` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `combustible_litros` int(11) NOT NULL,
  `combustible_pesos` int(11) NOT NULL,
  `kilometros_salida` int(11) NOT NULL,
  `kilometros_llegada` int(11) NOT NULL,
  `kilometros_total` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `observaciones` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `fk_id_vehiculo` int(11) NOT NULL,
  `fk_id_cometido` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

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
  ADD KEY `fk_id` (`fk_id`),
  ADD KEY `fk_id_director` (`fk_id_director`);

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
-- Indices de la tabla `modificacion_comitido`
--
ALTER TABLE `modificacion_comitido`
  ADD PRIMARY KEY (`id_modificacion`),
  ADD KEY `fk_id_cometido` (`fk_id_cometido`);

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
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `fk_id` (`fk_id`);

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
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cometido`
--
ALTER TABLE `cometido`
  MODIFY `id_cometido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item_presupuestario`
--
ALTER TABLE `item_presupuestario`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modificacion_comitido`
--
ALTER TABLE `modificacion_comitido`
  MODIFY `id_modificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `cometido_user_fk_id` FOREIGN KEY (`fk_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cometido_user_fk_id_director` FOREIGN KEY (`fk_id_director`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `destino_cometido_fk_id_cometido` FOREIGN KEY (`fk_id_cometido`) REFERENCES `cometido` (`id_cometido`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `destino_sector_fk_id_sector` FOREIGN KEY (`fk_id_sector`) REFERENCES `sector` (`id_sector`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `modificacion_comitido`
--
ALTER TABLE `modificacion_comitido`
  ADD CONSTRAINT `modificacion_comitido_cometido_fk_id_cometido` FOREIGN KEY (`fk_id_cometido`) REFERENCES `cometido` (`id_cometido`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_user_fk_id` FOREIGN KEY (`fk_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
