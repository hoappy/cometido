-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2022 a las 15:23:49
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
(1, 'Arica', 1, 1),
(2, 'Camarones', 1, 1),
(3, 'General Lagos', 1, 2),
(4, 'Putre', 1, 2),
(5, 'Alto Hospicio', 1, 3),
(6, 'Iquique', 1, 3),
(7, 'Camiña', 1, 4),
(8, 'Colchane', 1, 4),
(9, 'Huara', 1, 4),
(10, 'Pica', 1, 4),
(11, 'Pozo Almonte', 1, 4),
(12, 'Tocopilla', 1, 5),
(13, 'María Elena', 1, 5),
(14, 'Calama', 1, 6),
(15, 'Ollague', 1, 6),
(16, 'San Pedro de Atacama', 1, 6),
(17, 'Antofagasta', 1, 7),
(18, 'Mejillones', 1, 7),
(19, 'Sierra Gorda', 1, 7),
(20, 'Taltal', 1, 7),
(21, 'Chañaral', 1, 8),
(22, 'Diego de Almagro', 1, 8),
(23, 'Copiapó', 1, 9),
(24, 'Caldera', 1, 9),
(25, 'Tierra Amarilla', 1, 9),
(26, 'Vallenar', 1, 10),
(27, 'Alto del Carmen', 1, 10),
(28, 'Freirina', 1, 10),
(29, 'Huasco', 1, 10),
(30, 'La Serena', 1, 11),
(31, 'Coquimbo', 1, 11),
(32, 'Andacollo', 1, 11),
(33, 'La Higuera', 1, 11),
(34, 'Paihuano', 1, 11),
(35, 'Vicuña', 1, 11),
(36, 'Ovalle', 1, 12),
(37, 'Combarbalá', 1, 12),
(38, 'Monte Patria', 1, 12),
(39, 'Punitaqui', 1, 12),
(40, 'Río Hurtado', 1, 12),
(41, 'Illapel', 1, 13),
(42, 'Canela', 1, 13),
(43, 'Los Vilos', 1, 13),
(44, 'Salamanca', 1, 13),
(45, 'La Ligua', 1, 14),
(46, 'Cabildo', 1, 14),
(47, 'Zapallar', 1, 14),
(48, 'Papudo', 1, 14),
(49, 'Petorca', 1, 14),
(50, 'Los Andes', 1, 15),
(51, 'San Esteban', 1, 15),
(52, 'Calle Larga', 1, 15),
(53, 'Rinconada', 1, 15),
(54, 'San Felipe', 1, 16),
(55, 'Llaillay', 1, 16),
(56, 'Putaendo', 1, 16),
(57, 'Santa María', 1, 16),
(58, 'Catemu', 1, 16),
(59, 'Panquehue', 1, 16),
(60, 'Quillota', 1, 17),
(61, 'La Cruz', 1, 17),
(62, 'La Calera', 1, 17),
(63, 'Nogales', 1, 17),
(64, 'Hijuelas', 1, 17),
(65, 'Valparaíso', 1, 18),
(66, 'Viña del Mar', 1, 18),
(67, 'Concón', 1, 18),
(68, 'Quintero', 1, 18),
(69, 'Puchuncaví', 1, 18),
(70, 'Casablanca', 1, 18),
(71, 'Juan Fernández', 1, 18),
(72, 'San Antonio', 1, 19),
(73, 'Cartagena', 1, 19),
(74, 'El Tabo', 1, 19),
(75, 'El Quisco', 1, 19),
(76, 'Algarrobo', 1, 19),
(77, 'Santo Domingo', 1, 19),
(78, 'Isla de Pascua', 1, 20),
(79, 'Quilpué', 1, 21),
(80, 'Limache', 1, 21),
(81, 'Olmué', 1, 21),
(82, 'Villa Alemana', 1, 21),
(83, 'Colina', 1, 22),
(84, 'Lampa', 1, 22),
(85, 'Tiltil', 1, 22),
(86, 'Santiago', 1, 23),
(87, 'Vitacura', 1, 23),
(88, 'San Ramón', 1, 23),
(89, 'San Miguel', 1, 23),
(90, 'San Joaquín', 1, 23),
(91, 'Renca', 1, 23),
(92, 'Recoleta', 1, 23),
(93, 'Quinta Normal', 1, 23),
(94, 'Quilicura', 1, 23),
(95, 'Pudahuel', 1, 23),
(96, 'Providencia', 1, 23),
(97, 'Peñalolén', 1, 23),
(98, 'Pedro Aguirre Cerda', 1, 23),
(99, 'Ñuñoa', 1, 23),
(100, 'Maipú', 1, 23),
(101, 'Macul', 1, 23),
(102, 'Lo Prado', 1, 23),
(103, 'Lo Espejo', 1, 23),
(104, 'Lo Barnechea', 1, 23),
(105, 'Las Condes', 1, 23),
(106, 'La Reina', 1, 23),
(107, 'La Pintana', 1, 23),
(108, 'La Granja', 1, 23),
(109, 'La Florida', 1, 23),
(110, 'La Cisterna', 1, 23),
(111, 'Independencia', 1, 23),
(112, 'Huechuraba', 1, 23),
(113, 'Estación Central', 1, 23),
(114, 'El Bosque', 1, 23),
(115, 'Conchalí', 1, 23),
(116, 'Cerro Navia', 1, 23),
(117, 'Cerrillos', 1, 23),
(118, 'Puente Alto', 1, 24),
(119, 'San José de Maipo', 1, 24),
(120, 'Pirque', 1, 24),
(121, 'San Bernardo', 1, 25),
(122, 'Buin', 1, 25),
(123, 'Paine', 1, 25),
(124, 'Calera de Tango', 1, 25),
(125, 'Melipilla', 1, 26),
(126, 'Alhué', 1, 26),
(127, 'Curacaví', 1, 26),
(128, 'María Pinto', 1, 26),
(129, 'San Pedro', 1, 26),
(130, 'Isla de Maipo', 1, 27),
(131, 'El Monte', 1, 27),
(132, 'Padre Hurtado', 1, 27),
(133, 'Peñaflor', 1, 27),
(134, 'Talagante', 1, 27),
(135, 'Codegua', 1, 28),
(136, 'Coínco', 1, 28),
(137, 'Coltauco', 1, 28),
(138, 'Doñihue', 1, 28),
(139, 'Graneros', 1, 28),
(140, 'Las Cabras', 1, 28),
(141, 'Machalí', 1, 28),
(142, 'Malloa', 1, 28),
(143, 'Mostazal', 1, 28),
(144, 'Olivar', 1, 28),
(145, 'Peumo', 1, 28),
(146, 'Pichidegua', 1, 28),
(147, 'Quinta de Tilcoco', 1, 28),
(148, 'Rancagua', 1, 28),
(149, 'Rengo', 1, 28),
(150, 'Requínoa', 1, 28),
(151, 'San Vicente de Tagua Tagua', 1, 28),
(152, 'Chépica', 1, 29),
(153, 'Chimbarongo', 1, 29),
(154, 'Lolol', 1, 29),
(155, 'Nancagua', 1, 29),
(156, 'Palmilla', 1, 29),
(157, 'Peralillo', 1, 29),
(158, 'Placilla', 1, 29),
(159, 'Pumanque', 1, 29),
(160, 'San Fernando', 1, 29),
(161, 'Santa Cruz', 1, 29),
(162, 'La Estrella', 1, 30),
(163, 'Litueche', 1, 30),
(164, 'Marchigüe', 1, 30),
(165, 'Navidad', 1, 30),
(166, 'Paredones', 1, 30),
(167, 'Pichilemu', 1, 30),
(168, 'Curicó', 1, 31),
(169, 'Hualañé', 1, 31),
(170, 'Licantén', 1, 31),
(171, 'Molina', 1, 31),
(172, 'Rauco', 1, 31),
(173, 'Romeral', 1, 31),
(174, 'Sagrada Familia', 1, 31),
(175, 'Teno', 1, 31),
(176, 'Vichuquén', 1, 31),
(177, 'Talca', 1, 32),
(178, 'San Clemente', 1, 32),
(179, 'Pelarco', 1, 32),
(180, 'Pencahue', 1, 32),
(181, 'Maule', 1, 32),
(182, 'San Rafael', 1, 32),
(183, 'Curepto', 1, 33),
(184, 'Constitución', 1, 32),
(185, 'Empedrado', 1, 32),
(186, 'Río Claro', 1, 32),
(187, 'Linares', 1, 33),
(188, 'San Javier', 1, 33),
(189, 'Parral', 1, 33),
(190, 'Villa Alegre', 1, 33),
(191, 'Longaví', 1, 33),
(192, 'Colbún', 1, 33),
(193, 'Retiro', 1, 33),
(194, 'Yerbas Buenas', 1, 33),
(195, 'Cauquenes', 1, 34),
(196, 'Chanco', 1, 34),
(197, 'Pelluhue', 1, 34),
(198, 'Bulnes', 1, 35),
(199, 'Chillán', 1, 35),
(200, 'Chillán Viejo', 1, 35),
(201, 'El Carmen', 1, 35),
(202, 'Pemuco', 1, 35),
(203, 'Pinto', 1, 35),
(204, 'Quillón', 1, 35),
(205, 'San Ignacio', 1, 35),
(206, 'Yungay', 1, 35),
(207, 'Cobquecura', 1, 36),
(208, 'Coelemu', 1, 36),
(209, 'Ninhue', 1, 36),
(210, 'Portezuelo', 1, 36),
(211, 'Quirihue', 1, 36),
(212, 'Ránquil', 1, 36),
(213, 'Treguaco', 1, 36),
(214, 'San Carlos', 1, 37),
(215, 'Coihueco', 1, 37),
(216, 'San Nicolás', 1, 37),
(217, 'Ñiquén', 1, 37),
(218, 'San Fabián', 1, 37),
(219, 'Alto Biobío', 1, 38),
(220, 'Antuco', 1, 38),
(221, 'Cabrero', 1, 38),
(222, 'Laja', 1, 38),
(223, 'Los Ángeles', 1, 38),
(224, 'Mulchén', 1, 38),
(225, 'Nacimiento', 1, 38),
(226, 'Negrete', 1, 38),
(227, 'Quilaco', 1, 38),
(228, 'Quilleco', 1, 38),
(229, 'San Rosendo', 1, 38),
(230, 'Santa Bárbara', 1, 38),
(231, 'Tucapel', 1, 38),
(232, 'Yumbel', 1, 38),
(233, 'Concepción', 1, 39),
(234, 'Coronel', 1, 39),
(235, 'Chiguayante', 1, 39),
(236, 'Florida', 1, 39),
(237, 'Hualpén', 1, 39),
(238, 'Hualqui', 1, 39),
(239, 'Lota', 1, 39),
(240, 'Penco', 1, 39),
(241, 'San Pedro de La Paz', 1, 39),
(242, 'Santa Juana', 1, 39),
(243, 'Talcahuano', 1, 39),
(244, 'Tomé', 1, 39),
(245, 'Arauco', 1, 40),
(246, 'Cañete', 1, 40),
(247, 'Contulmo', 1, 40),
(248, 'Curanilahue', 1, 40),
(249, 'Lebu', 1, 40),
(250, 'Los Álamos', 1, 40),
(251, 'Tirúa', 1, 40),
(252, 'Angol', 1, 41),
(253, 'Collipulli', 1, 41),
(254, 'Curacautín', 1, 41),
(255, 'Ercilla', 1, 41),
(256, 'Lonquimay', 1, 41),
(257, 'Los Sauces', 1, 41),
(258, 'Lumaco', 1, 41),
(259, 'Purén', 1, 41),
(260, 'Renaico', 1, 41),
(261, 'Traiguén', 1, 41),
(262, 'Victoria', 1, 41),
(263, 'Temuco', 1, 42),
(264, 'Carahue', 1, 42),
(265, 'Cholchol', 1, 42),
(266, 'Cunco', 1, 42),
(267, 'Curarrehue', 1, 42),
(268, 'Freire', 1, 42),
(269, 'Galvarino', 1, 42),
(270, 'Gorbea', 1, 42),
(271, 'Lautaro', 1, 42),
(272, 'Loncoche', 1, 42),
(273, 'Melipeuco', 1, 42),
(274, 'Nueva Imperial', 1, 42),
(275, 'Padre Las Casas', 1, 42),
(276, 'Perquenco', 1, 42),
(277, 'Pitrufquén', 1, 42),
(278, 'Pucón', 1, 42),
(279, 'Saavedra', 1, 42),
(280, 'Teodoro Schmidt', 1, 42),
(281, 'Toltén', 1, 42),
(282, 'Vilcún', 1, 42),
(283, 'Villarrica', 1, 42),
(284, 'Valdivia', 1, 43),
(285, 'Corral', 1, 43),
(286, 'Lanco', 1, 43),
(287, 'Los Lagos', 1, 43),
(288, 'Máfil', 1, 43),
(289, 'Mariquina', 1, 43),
(290, 'Paillaco', 1, 43),
(291, 'Panguipulli', 1, 43),
(292, 'La Unión', 1, 44),
(293, 'Futrono', 1, 44),
(294, 'Lago Ranco', 1, 44),
(295, 'Río Bueno', 1, 44),
(297, 'Osorno', 1, 45),
(298, 'Puerto Octay', 1, 45),
(299, 'Purranque', 1, 45),
(300, 'Puyehue', 1, 45),
(301, 'Río Negro', 1, 45),
(302, 'San Juan de la Costa', 1, 45),
(303, 'San Pablo', 1, 45),
(304, 'Calbuco', 1, 46),
(305, 'Cochamó', 1, 46),
(306, 'Fresia', 1, 46),
(307, 'Frutillar', 1, 46),
(308, 'Llanquihue', 1, 46),
(309, 'Los Muermos', 1, 46),
(310, 'Maullín', 1, 46),
(311, 'Puerto Montt', 1, 46),
(312, 'Puerto Varas', 1, 46),
(313, 'Ancud', 1, 47),
(314, 'Castro', 1, 47),
(315, 'Chonchi', 1, 47),
(316, 'Curaco de Vélez', 1, 47),
(317, 'Dalcahue', 1, 47),
(318, 'Puqueldón', 1, 47),
(319, 'Queilén', 1, 47),
(320, 'Quellón', 1, 47),
(321, 'Quemchi', 1, 47),
(322, 'Quinchao', 1, 47),
(323, 'Chaitén', 1, 48),
(324, 'Futaleufú', 1, 48),
(325, 'Hualaihué', 1, 48),
(326, 'Palena', 1, 48),
(327, 'Lago Verde', 1, 49),
(328, 'Coihaique', 1, 49),
(329, 'Aysén', 1, 50),
(330, 'Cisnes', 1, 50),
(331, 'Guaitecas', 1, 50),
(332, 'Río Ibáñez', 1, 51),
(333, 'Chile Chico', 1, 51),
(334, 'Cochrane', 1, 52),
(335, 'O\'Higgins', 1, 52),
(336, 'Tortel', 1, 52),
(337, 'Natales', 1, 53),
(338, 'Torres del Paine', 1, 53),
(339, 'Laguna Blanca', 1, 54),
(340, 'Punta Arenas', 1, 54),
(341, 'Río Verde', 1, 54),
(342, 'San Gregorio', 1, 54),
(343, 'Porvenir', 1, 55),
(344, 'Primavera', 1, 55),
(345, 'Timaukel', 1, 55),
(346, 'Cabo de Hornos', 1, 56),
(347, 'Antártica', 1, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cometido`
--

CREATE TABLE `cometido` (
  `id_cometido` int(11) NOT NULL,
  `con_viatico` tinyint(1) NOT NULL,
  `dias_sin_pernoctar` int(11) NOT NULL,
  `dias_con_pernoctar` int(11) NOT NULL,
  `monto` int(11) DEFAULT NULL,
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
(30, 0, 0, 0, NULL, '2022-01-10', '2022-01-10', '13:45:00', '16:51:00', 'prueba sistema', 1, 1, 0, 'preuba sistema', 3, 3, NULL, NULL);

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
(1, 'Departamento 1', 5, 0, 1);

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
(26, 30, 199),
(27, 30, 204);

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
(3, 'Prueba item', 12, 1, 'detalle del item');

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
(1, 'Arica', 1, 1),
(2, 'Parinacota', 1, 1),
(3, 'Iquique', 1, 2),
(4, 'El Tamarugal', 1, 2),
(5, 'Tocopilla', 1, 3),
(6, 'El Loa', 1, 3),
(7, 'Antofagasta', 1, 3),
(8, 'Chañaral', 1, 4),
(9, 'Copiapó', 1, 4),
(10, 'Huasco', 1, 4),
(11, 'Elqui', 1, 5),
(12, 'Limarí', 1, 5),
(13, 'Choapa', 1, 5),
(14, 'Petorca', 1, 6),
(15, 'Los Andes', 1, 6),
(16, 'San Felipe de Aconcagua', 1, 6),
(17, 'Quillota', 1, 6),
(18, 'Valparaiso', 1, 6),
(19, 'San Antonio', 1, 6),
(20, 'Isla de Pascua', 1, 6),
(21, 'Marga Marga', 1, 6),
(22, 'Chacabuco', 1, 7),
(23, 'Santiago', 1, 7),
(24, 'Cordillera', 1, 7),
(25, 'Maipo', 1, 7),
(26, 'Melipilla', 1, 7),
(27, 'Talagante', 1, 7),
(28, 'Cachapoal', 1, 8),
(29, 'Colchagua', 1, 8),
(30, 'Cardenal Caro', 1, 8),
(31, 'Curicó', 1, 9),
(32, 'Talca', 1, 9),
(33, 'Linares', 1, 9),
(34, 'Cauquenes', 1, 9),
(35, 'Diguillín', 1, 10),
(36, 'Itata', 1, 10),
(37, 'Punilla', 1, 10),
(38, 'Bio Bío', 1, 11),
(39, 'Concepción', 1, 11),
(40, 'Arauco', 1, 11),
(41, 'Malleco', 1, 12),
(42, 'Cautín', 1, 12),
(43, 'Valdivia', 1, 13),
(44, 'Ranco', 1, 13),
(45, 'Osorno', 1, 14),
(46, 'Llanquihue', 1, 14),
(47, 'Chiloé', 1, 14),
(48, 'Palena', 1, 14),
(49, 'Coyhaique', 1, 15),
(50, 'Aysén', 1, 15),
(51, 'General Carrera', 1, 15),
(52, 'Capitán Prat', 1, 15),
(53, 'Última Esperanza', 1, 16),
(54, 'Magallanes', 1, 16),
(55, 'Tierra del Fuego', 1, 16),
(56, 'Antártica Chilena', 1, 16);

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
(1, 'Arica y Parinacota', 15, 1),
(2, 'Tarapacá', 1, 1),
(3, 'Antofagasta', 2, 1),
(4, 'Atacama', 3, 1),
(5, 'Coquimbo', 4, 1),
(6, 'Valparaiso', 5, 1),
(7, 'Metropolitana de Santiago', 13, 1),
(8, 'Libertador General Bernardo O\'Higgins', 6, 1),
(9, 'Maule', 7, 1),
(10, 'Ñuble', 16, 1),
(11, 'Biobío', 8, 1),
(12, 'La Araucanía', 9, 1),
(13, 'Los Ríos', 15, 1),
(14, 'Los Lagos', 10, 1),
(15, 'Aysén del General Carlos Ibáñez del Campo', 11, 1),
(16, 'Magallanes y de la Antártica Chilena', 13, 1);

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
(1, 'Arica', 1, 1),
(2, 'Camarones', 1, 2),
(3, 'General Lagos', 1, 3),
(4, 'Putre', 1, 4),
(5, 'Alto Hospicio', 1, 5),
(6, 'Iquique', 1, 6),
(7, 'Camiña', 1, 7),
(8, 'Colchane', 1, 8),
(9, 'Huara', 1, 9),
(10, 'Pica', 1, 10),
(11, 'Pozo Almonte', 1, 11),
(12, 'Tocopilla', 1, 12),
(13, 'María Elena', 1, 13),
(14, 'Calama', 1, 14),
(15, 'Ollague', 1, 15),
(16, 'San Pedro de Atacama', 1, 16),
(17, 'Antofagasta', 1, 17),
(18, 'Mejillones', 1, 18),
(19, 'Sierra Gorda', 1, 19),
(20, 'Taltal', 1, 20),
(21, 'Chañaral', 1, 21),
(22, 'Diego de Almagro', 1, 22),
(23, 'Copiapó', 1, 23),
(24, 'Caldera', 1, 24),
(25, 'Tierra Amarilla', 1, 25),
(26, 'Vallenar', 1, 26),
(27, 'Alto del Carmen', 1, 27),
(28, 'Freirina', 1, 28),
(29, 'Huasco', 1, 29),
(30, 'La Serena', 1, 30),
(31, 'Coquimbo', 1, 31),
(32, 'Andacollo', 1, 32),
(33, 'La Higuera', 1, 33),
(34, 'Paihuano', 1, 34),
(35, 'Vicuña', 1, 35),
(36, 'Ovalle', 1, 36),
(37, 'Combarbalá', 1, 37),
(38, 'Monte Patria', 1, 38),
(39, 'Punitaqui', 1, 39),
(40, 'Río Hurtado', 1, 40),
(41, 'Illapel', 1, 41),
(42, 'Canela', 1, 42),
(43, 'Los Vilos', 1, 43),
(44, 'Salamanca', 1, 44),
(45, 'La Ligua', 1, 45),
(46, 'Cabildo', 1, 46),
(47, 'Zapallar', 1, 47),
(48, 'Papudo', 1, 48),
(49, 'Petorca', 1, 49),
(50, 'Los Andes', 1, 50),
(51, 'San Esteban', 1, 51),
(52, 'Calle Larga', 1, 52),
(53, 'Rinconada', 1, 53),
(54, 'San Felipe', 1, 54),
(55, 'Llaillay', 1, 55),
(56, 'Putaendo', 1, 56),
(57, 'Santa María', 1, 57),
(58, 'Catemu', 1, 58),
(59, 'Panquehue', 1, 59),
(60, 'Quillota', 1, 60),
(61, 'La Cruz', 1, 61),
(62, 'La Calera', 1, 62),
(63, 'Nogales', 1, 63),
(64, 'Hijuelas', 1, 64),
(65, 'Valparaíso', 1, 65),
(66, 'Viña del Mar', 1, 66),
(67, 'Concón', 1, 67),
(68, 'Quintero', 1, 68),
(69, 'Puchuncaví', 1, 69),
(70, 'Casablanca', 1, 70),
(71, 'Juan Fernández', 1, 71),
(72, 'San Antonio', 1, 72),
(73, 'Cartagena', 1, 73),
(74, 'El Tabo', 1, 74),
(75, 'El Quisco', 1, 75),
(76, 'Algarrobo', 1, 76),
(77, 'Santo Domingo', 1, 77),
(78, 'Isla de Pascua', 1, 78),
(79, 'Quilpué', 1, 79),
(80, 'Limache', 1, 80),
(81, 'Olmué', 1, 81),
(82, 'Villa Alemana', 1, 82),
(83, 'Colina', 1, 83),
(84, 'Lampa', 1, 84),
(85, 'Tiltil', 1, 85),
(86, 'Santiago', 1, 86),
(87, 'Vitacura', 1, 87),
(88, 'San Ramón', 1, 88),
(89, 'San Miguel', 1, 89),
(90, 'San Joaquín', 1, 90),
(91, 'Renca', 1, 91),
(92, 'Recoleta', 1, 92),
(93, 'Quinta Normal', 1, 93),
(94, 'Quilicura', 1, 94),
(95, 'Pudahuel', 1, 95),
(96, 'Providencia', 1, 96),
(97, 'Peñalolén', 1, 97),
(98, 'Pedro Aguirre Cerda', 1, 98),
(99, 'Ñuñoa', 1, 99),
(100, 'Maipú', 1, 100),
(101, 'Macul', 1, 101),
(102, 'Lo Prado', 1, 102),
(103, 'Lo Espejo', 1, 103),
(104, 'Lo Barnechea', 1, 104),
(105, 'Las Condes', 1, 105),
(106, 'La Reina', 1, 106),
(107, 'La Pintana', 1, 107),
(108, 'La Granja', 1, 108),
(109, 'La Florida', 1, 109),
(110, 'La Cisterna', 1, 110),
(111, 'Independencia', 1, 111),
(112, 'Huechuraba', 1, 112),
(113, 'Estación Central', 1, 113),
(114, 'El Bosque', 1, 114),
(115, 'Conchalí', 1, 115),
(116, 'Cerro Navia', 1, 116),
(117, 'Cerrillos', 1, 117),
(118, 'Puente Alto', 1, 118),
(119, 'San José de Maipo', 1, 119),
(120, 'Pirque', 1, 120),
(121, 'San Bernardo', 1, 121),
(122, 'Buin', 1, 122),
(123, 'Paine', 1, 123),
(124, 'Calera de Tango', 1, 124),
(125, 'Melipilla', 1, 125),
(126, 'Alhué', 1, 126),
(127, 'Curacaví', 1, 127),
(128, 'María Pinto', 1, 128),
(129, 'San Pedro', 1, 129),
(130, 'Isla de Maipo', 1, 130),
(131, 'El Monte', 1, 131),
(132, 'Padre Hurtado', 1, 132),
(133, 'Peñaflor', 1, 133),
(134, 'Talagante', 1, 134),
(135, 'Codegua', 1, 135),
(136, 'Coínco', 1, 136),
(137, 'Coltauco', 1, 137),
(138, 'Doñihue', 1, 138),
(139, 'Graneros', 1, 139),
(140, 'Las Cabras', 1, 140),
(141, 'Machalí', 1, 141),
(142, 'Malloa', 1, 142),
(143, 'Mostazal', 1, 143),
(144, 'Olivar', 1, 144),
(145, 'Peumo', 1, 145),
(146, 'Pichidegua', 1, 146),
(147, 'Quinta de Tilcoco', 1, 147),
(148, 'Rancagua', 1, 148),
(149, 'Rengo', 1, 149),
(150, 'Requínoa', 1, 150),
(151, 'San Vicente de Tagua Tagua', 1, 151),
(152, 'Chépica', 1, 152),
(153, 'Chimbarongo', 1, 153),
(154, 'Lolol', 1, 154),
(155, 'Nancagua', 1, 155),
(156, 'Palmilla', 1, 156),
(157, 'Peralillo', 1, 157),
(158, 'Placilla', 1, 158),
(159, 'Pumanque', 1, 159),
(160, 'San Fernando', 1, 160),
(161, 'Santa Cruz', 1, 161),
(162, 'La Estrella', 1, 162),
(163, 'Litueche', 1, 163),
(164, 'Marchigüe', 1, 164),
(165, 'Navidad', 1, 165),
(166, 'Paredones', 1, 166),
(167, 'Pichilemu', 1, 167),
(168, 'Curicó', 1, 168),
(169, 'Hualañé', 1, 169),
(170, 'Licantén', 1, 170),
(171, 'Molina', 1, 171),
(172, 'Rauco', 1, 172),
(173, 'Romeral', 1, 173),
(174, 'Sagrada Familia', 1, 174),
(175, 'Teno', 1, 175),
(176, 'Vichuquén', 1, 176),
(177, 'Talca', 1, 177),
(178, 'San Clemente', 1, 178),
(179, 'Pelarco', 1, 179),
(180, 'Pencahue', 1, 180),
(181, 'Maule', 1, 181),
(182, 'San Rafael', 1, 182),
(183, 'Curepto', 1, 183),
(184, 'Constitución', 1, 184),
(185, 'Empedrado', 1, 185),
(186, 'Río Claro', 1, 186),
(187, 'Linares', 1, 187),
(188, 'San Javier', 1, 188),
(189, 'Parral', 1, 189),
(190, 'Villa Alegre', 1, 190),
(191, 'Longaví', 1, 191),
(192, 'Colbún', 1, 192),
(193, 'Retiro', 1, 193),
(194, 'Yerbas Buenas', 1, 194),
(195, 'Cauquenes', 1, 195),
(196, 'Chanco', 1, 196),
(197, 'Pelluhue', 1, 197),
(198, 'Bulnes', 1, 198),
(199, 'Chillán', 1, 199),
(200, 'Chillán Viejo', 1, 200),
(201, 'El Carmen', 1, 201),
(202, 'Pemuco', 1, 202),
(203, 'Pinto', 1, 203),
(204, 'Quillón', 1, 204),
(205, 'San Ignacio', 1, 205),
(206, 'Yungay', 1, 206),
(207, 'Cobquecura', 1, 207),
(208, 'Coelemu', 1, 208),
(209, 'Ninhue', 1, 209),
(210, 'Portezuelo', 1, 210),
(211, 'Quirihue', 1, 211),
(212, 'Ránquil', 1, 212),
(213, 'Treguaco', 1, 213),
(214, 'San Carlos', 1, 214),
(215, 'Coihueco', 1, 215),
(216, 'San Nicolás', 1, 216),
(217, 'Ñiquén', 1, 217),
(218, 'San Fabián', 1, 218),
(219, 'Alto Biobío', 1, 219),
(220, 'Antuco', 1, 220),
(221, 'Cabrero', 1, 221),
(222, 'Laja', 1, 222),
(223, 'Los Ángeles', 1, 223),
(224, 'Mulchén', 1, 224),
(225, 'Nacimiento', 1, 225),
(226, 'Negrete', 1, 226),
(227, 'Quilaco', 1, 227),
(228, 'Quilleco', 1, 228),
(229, 'San Rosendo', 1, 229),
(230, 'Santa Bárbara', 1, 230),
(231, 'Tucapel', 1, 231),
(232, 'Yumbel', 1, 232),
(233, 'Concepción', 1, 233),
(234, 'Coronel', 1, 234),
(235, 'Chiguayante', 1, 235),
(236, 'Florida', 1, 236),
(237, 'Hualpén', 1, 237),
(238, 'Hualqui', 1, 238),
(239, 'Lota', 1, 239),
(240, 'Penco', 1, 240),
(241, 'San Pedro de La Paz', 1, 241),
(242, 'Santa Juana', 1, 242),
(243, 'Talcahuano', 1, 243),
(244, 'Tomé', 1, 244),
(245, 'Arauco', 1, 245),
(246, 'Cañete', 1, 246),
(247, 'Contulmo', 1, 247),
(248, 'Curanilahue', 1, 248),
(249, 'Lebu', 1, 249),
(250, 'Los Álamos', 1, 250),
(251, 'Tirúa', 1, 251),
(252, 'Angol', 1, 252),
(253, 'Collipulli', 1, 253),
(254, 'Curacautín', 1, 254),
(255, 'Ercilla', 1, 255),
(256, 'Lonquimay', 1, 256),
(257, 'Los Sauces', 1, 257),
(258, 'Lumaco', 1, 258),
(259, 'Purén', 1, 259),
(260, 'Renaico', 1, 260),
(261, 'Traiguén', 1, 261),
(262, 'Victoria', 1, 262),
(263, 'Temuco', 1, 263),
(264, 'Carahue', 1, 264),
(265, 'Cholchol', 1, 265),
(266, 'Cunco', 1, 266),
(267, 'Curarrehue', 1, 267),
(268, 'Freire', 1, 268),
(269, 'Galvarino', 1, 269),
(270, 'Gorbea', 1, 270),
(271, 'Lautaro', 1, 271),
(272, 'Loncoche', 1, 272),
(273, 'Melipeuco', 1, 273),
(274, 'Nueva Imperial', 1, 274),
(275, 'Padre Las Casas', 1, 275),
(276, 'Perquenco', 1, 276),
(277, 'Pitrufquén', 1, 277),
(278, 'Pucón', 1, 278),
(279, 'Saavedra', 1, 279),
(280, 'Teodoro Schmidt', 1, 280),
(281, 'Toltén', 1, 281),
(282, 'Vilcún', 1, 282),
(283, 'Villarrica', 1, 283),
(284, 'Valdivia', 1, 284),
(285, 'Corral', 1, 285),
(286, 'Lanco', 1, 286),
(287, 'Los Lagos', 1, 287),
(288, 'Máfil', 1, 288),
(289, 'Mariquina', 1, 289),
(290, 'Paillaco', 1, 290),
(291, 'Panguipulli', 1, 291),
(292, 'La Unión', 1, 292),
(293, 'Futrono', 1, 293),
(294, 'Lago Ranco', 1, 294),
(295, 'Río Bueno', 1, 295),
(297, 'Osorno', 1, 297),
(298, 'Puerto Octay', 1, 298),
(299, 'Purranque', 1, 299),
(300, 'Puyehue', 1, 300),
(301, 'Río Negro', 1, 301),
(302, 'San Juan de la Costa', 1, 302),
(303, 'San Pablo', 1, 303),
(304, 'Calbuco', 1, 304),
(305, 'Cochamó', 1, 305),
(306, 'Fresia', 1, 306),
(307, 'Frutillar', 1, 307),
(308, 'Llanquihue', 1, 308),
(309, 'Los Muermos', 1, 309),
(310, 'Maullín', 1, 310),
(311, 'Puerto Montt', 1, 311),
(312, 'Puerto Varas', 1, 312),
(313, 'Ancud', 1, 313),
(314, 'Castro', 1, 314),
(315, 'Chonchi', 1, 315),
(316, 'Curaco de Vélez', 1, 316),
(317, 'Dalcahue', 1, 317),
(318, 'Puqueldón', 1, 318),
(319, 'Queilén', 1, 319),
(320, 'Quellón', 1, 320),
(321, 'Quemchi', 1, 321),
(322, 'Quinchao', 1, 322),
(323, 'Chaitén', 1, 323),
(324, 'Futaleufú', 1, 324),
(325, 'Hualaihué', 1, 325),
(326, 'Palena', 1, 326),
(327, 'Lago Verde', 1, 327),
(328, 'Coihaique', 1, 328),
(329, 'Aysén', 1, 329),
(330, 'Cisnes', 1, 330),
(331, 'Guaitecas', 1, 331),
(332, 'Río Ibáñez', 1, 332),
(333, 'Chile Chico', 1, 333),
(334, 'Cochrane', 1, 334),
(335, 'O\'Higgins', 1, 335),
(336, 'Tortel', 1, 336),
(337, 'Natales', 1, 337),
(338, 'Torres del Paine', 1, 338),
(339, 'Laguna Blanca', 1, 339),
(340, 'Punta Arenas', 1, 340),
(341, 'Río Verde', 1, 341),
(342, 'San Gregorio', 1, 342),
(343, 'Porvenir', 1, 343),
(344, 'Primavera', 1, 344),
(345, 'Timaukel', 1, 345),
(346, 'Cabo de Hornos', 1, 346),
(347, 'Antártica', 1, 347);

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
  `fk_id_departamento` int(11) NOT NULL,
  `verification_code` varchar(250) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `email`, `rut`, `estado`, `grado`, `tipo_funcionario`, `role`, `password`, `authKey`, `accessToken`, `activate`, `fk_id_departamento`, `verification_code`) VALUES
(3, 'Rodrigo Andres Garcia Trautmann', 'hoappy.p@gmail.com', 19671144, 1, 0, 2, 8, 'canvMpHUCkkUg', 'f4d661e3e13840a61a474453ce7782d7e54a09673d8df2571fdf29794861f93116b7f396361a516c6b0f51c7a1603e2f4d35d73ee547aa6d7f139fd5f1a2e39c25550d32a89dddc0a302c907db0f84a4f4b7e3a5994b93e9342df5775624b2885b3b9376', 'fe5cb35c942326531317b67bd0a6c115bf5a74ee11a5e9feca2418aa70108aeb46ccf81affa3d58877fdc5ef534c1abfab57becb9c2830315d1dd8142834aed8c0ea8b5151586e632abf1ca0fb1e3e682b00da479cbcc97df721dea997df6384ecffaeaa', 1, 1, '2bf7a63a');

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
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `id_vehiculo` (`id_vehiculo`);

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
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT de la tabla `cometido`
--
ALTER TABLE `cometido`
  MODIFY `id_cometido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `item_presupuestario`
--
ALTER TABLE `item_presupuestario`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `monto`
--
ALTER TABLE `monto`
  MODIFY `id_monto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
