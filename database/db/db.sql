-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2023 a las 00:38:41
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mys_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `orden_compra_id` bigint(20) UNSIGNED DEFAULT NULL,
  `puntuacion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carrito_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_producto`
--

CREATE TABLE `carrito_producto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carrito_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad_carrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_comuna` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `nombre_comuna`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Arica', 1, NULL, NULL),
(2, 'Camarones', 1, NULL, NULL),
(3, 'General Lagos', 1, NULL, NULL),
(4, 'Putre', 1, NULL, NULL),
(5, 'Alto Hospicio', 2, NULL, NULL),
(6, 'Iquique', 2, NULL, NULL),
(7, 'Camiña', 2, NULL, NULL),
(8, 'Colchane', 2, NULL, NULL),
(9, 'Huara', 2, NULL, NULL),
(10, 'Pica', 2, NULL, NULL),
(11, 'Pozo Almonte', 2, NULL, NULL),
(12, 'Antofagasta', 3, NULL, NULL),
(13, 'Mejillones', 3, NULL, NULL),
(14, 'Sierra Gorda', 3, NULL, NULL),
(15, 'Taltal', 3, NULL, NULL),
(16, 'Calama', 3, NULL, NULL),
(17, 'Ollague', 3, NULL, NULL),
(18, 'San Pedro de Atacama', 3, NULL, NULL),
(19, 'María Elena', 3, NULL, NULL),
(20, 'Tocopilla', 3, NULL, NULL),
(21, 'Chañaral', 4, NULL, NULL),
(22, 'Diego de Almagro', 4, NULL, NULL),
(23, 'Caldera', 4, NULL, NULL),
(24, 'Copiapó', 4, NULL, NULL),
(25, 'Tierra Amarilla', 4, NULL, NULL),
(26, 'Alto del Carmen', 4, NULL, NULL),
(27, 'Freirina', 4, NULL, NULL),
(28, 'Huasco', 4, NULL, NULL),
(29, 'Vallenar', 4, NULL, NULL),
(30, 'Canela', 5, NULL, NULL),
(31, 'Illapel', 5, NULL, NULL),
(32, 'Los Vilos', 5, NULL, NULL),
(33, 'Salamanca', 5, NULL, NULL),
(34, 'Andacollo', 5, NULL, NULL),
(35, 'Coquimbo', 5, NULL, NULL),
(36, 'La Higuera', 5, NULL, NULL),
(37, 'La Serena', 5, NULL, NULL),
(38, 'Paihuaco', 5, NULL, NULL),
(39, 'Vicuña', 5, NULL, NULL),
(40, 'Combarbalá', 5, NULL, NULL),
(41, 'Monte Patria', 5, NULL, NULL),
(42, 'Ovalle', 5, NULL, NULL),
(43, 'Punitaqui', 5, NULL, NULL),
(44, 'Río Hurtado', 5, NULL, NULL),
(45, 'Isla de Pascua', 6, NULL, NULL),
(46, 'Calle Larga', 6, NULL, NULL),
(47, 'Los Andes', 6, NULL, NULL),
(48, 'Rinconada', 6, NULL, NULL),
(49, 'San Esteban', 6, NULL, NULL),
(50, 'La Ligua', 6, NULL, NULL),
(51, 'Papudo', 6, NULL, NULL),
(52, 'Petorca', 6, NULL, NULL),
(53, 'Zapallar', 6, NULL, NULL),
(54, 'Hijuelas', 6, NULL, NULL),
(55, 'La Calera', 6, NULL, NULL),
(56, 'La Cruz', 6, NULL, NULL),
(57, 'Limache', 6, NULL, NULL),
(58, 'Nogales', 6, NULL, NULL),
(59, 'Olmué', 6, NULL, NULL),
(60, 'Quillota', 6, NULL, NULL),
(61, 'Algarrobo', 6, NULL, NULL),
(62, 'Cartagena', 6, NULL, NULL),
(63, 'El Quisco', 6, NULL, NULL),
(64, 'El Tabo', 6, NULL, NULL),
(65, 'San Antonio', 6, NULL, NULL),
(66, 'Santo Domingo', 6, NULL, NULL),
(67, 'Catemu', 6, NULL, NULL),
(68, 'Llaillay', 6, NULL, NULL),
(69, 'Panquehue', 6, NULL, NULL),
(70, 'Putaendo', 6, NULL, NULL),
(71, 'San Felipe', 6, NULL, NULL),
(72, 'Santa María', 6, NULL, NULL),
(73, 'Casablanca', 6, NULL, NULL),
(74, 'Concón', 6, NULL, NULL),
(75, 'Juan Fernández', 6, NULL, NULL),
(76, 'Puchuncaví', 6, NULL, NULL),
(77, 'Quilpué', 6, NULL, NULL),
(78, 'Quintero', 6, NULL, NULL),
(79, 'Valparaíso', 6, NULL, NULL),
(80, 'Villa Alemana', 6, NULL, NULL),
(81, 'Viña del Mar', 6, NULL, NULL),
(82, 'Colina', 7, NULL, NULL),
(83, 'Lampa', 7, NULL, NULL),
(84, 'Tiltil', 7, NULL, NULL),
(85, 'Pirque', 7, NULL, NULL),
(86, 'Puente Alto', 7, NULL, NULL),
(87, 'San José de Maipo', 7, NULL, NULL),
(88, 'Buin', 7, NULL, NULL),
(89, 'Calera de Tango', 7, NULL, NULL),
(90, 'Paine', 7, NULL, NULL),
(91, 'San Bernardo', 7, NULL, NULL),
(92, 'Alhué', 7, NULL, NULL),
(93, 'Curacaví', 7, NULL, NULL),
(94, 'María Pinto', 7, NULL, NULL),
(95, 'Melipilla', 7, NULL, NULL),
(96, 'San Pedro', 7, NULL, NULL),
(97, 'Cerrillos', 7, NULL, NULL),
(98, 'Cerro Navia', 7, NULL, NULL),
(99, 'Conchalí', 7, NULL, NULL),
(100, 'El Bosque', 7, NULL, NULL),
(101, 'Estación Central', 7, NULL, NULL),
(102, 'Huechuraba', 7, NULL, NULL),
(103, 'Independencia', 7, NULL, NULL),
(104, 'La Cisterna', 7, NULL, NULL),
(105, 'La Granja', 7, NULL, NULL),
(106, 'La Florida', 7, NULL, NULL),
(107, 'La Pintana', 7, NULL, NULL),
(108, 'La Reina', 7, NULL, NULL),
(109, 'Las Condes', 7, NULL, NULL),
(110, 'Lo Barnechea', 7, NULL, NULL),
(111, 'Lo Espejo', 7, NULL, NULL),
(112, 'Lo Prado', 7, NULL, NULL),
(113, 'Macul', 7, NULL, NULL),
(114, 'Maipú', 7, NULL, NULL),
(115, 'Ñuñoa', 7, NULL, NULL),
(116, 'Pedro Aguirre Cerda', 7, NULL, NULL),
(117, 'Peñalolén', 7, NULL, NULL),
(118, 'Providencia', 7, NULL, NULL),
(119, 'Pudahuel', 7, NULL, NULL),
(120, 'Quilicura', 7, NULL, NULL),
(121, 'Quinta Normal', 7, NULL, NULL),
(122, 'Recoleta', 7, NULL, NULL),
(123, 'Renca', 7, NULL, NULL),
(124, 'San Miguel', 7, NULL, NULL),
(125, 'San Joaquín', 7, NULL, NULL),
(126, 'San Ramón', 7, NULL, NULL),
(127, 'Santiago', 7, NULL, NULL),
(128, 'Vitacura', 7, NULL, NULL),
(129, 'El Monte', 7, NULL, NULL),
(130, 'Isla de Maipo', 7, NULL, NULL),
(131, 'Padre Hurtado', 7, NULL, NULL),
(132, 'Peñaflor', 7, NULL, NULL),
(133, 'Talagante', 7, NULL, NULL),
(134, 'Codegua', 8, NULL, NULL),
(135, 'Coínco', 8, NULL, NULL),
(136, 'Coltauco', 8, NULL, NULL),
(137, 'Doñihue', 8, NULL, NULL),
(138, 'Graneros', 8, NULL, NULL),
(139, 'Las Cabras', 8, NULL, NULL),
(140, 'Machalí', 8, NULL, NULL),
(141, 'Malloa', 8, NULL, NULL),
(142, 'Mostazal', 8, NULL, NULL),
(143, 'Olivar', 8, NULL, NULL),
(144, 'Peumo', 8, NULL, NULL),
(145, 'Pichidegua', 8, NULL, NULL),
(146, 'Quinta de Tilcoco', 8, NULL, NULL),
(147, 'Rancagua', 8, NULL, NULL),
(148, 'Rengo', 8, NULL, NULL),
(149, 'Requínoa', 8, NULL, NULL),
(150, 'San Vicente de Tagua Tagua', 8, NULL, NULL),
(151, 'La Estrella', 8, NULL, NULL),
(152, 'Litueche', 8, NULL, NULL),
(153, 'Marchihue', 8, NULL, NULL),
(154, 'Navidad', 8, NULL, NULL),
(155, 'Peredones', 8, NULL, NULL),
(156, 'Pichilemu', 8, NULL, NULL),
(157, 'Chépica', 8, NULL, NULL),
(158, 'Chimbarongo', 8, NULL, NULL),
(159, 'Lolol', 8, NULL, NULL),
(160, 'Nancagua', 8, NULL, NULL),
(161, 'Palmilla', 8, NULL, NULL),
(162, 'Peralillo', 8, NULL, NULL),
(163, 'Placilla', 8, NULL, NULL),
(164, 'Pumanque', 8, NULL, NULL),
(165, 'San Fernando', 8, NULL, NULL),
(166, 'Santa Cruz', 8, NULL, NULL),
(167, 'Cauquenes', 9, NULL, NULL),
(168, 'Chanco', 9, NULL, NULL),
(169, 'Pelluhue', 9, NULL, NULL),
(170, 'Curicó', 9, NULL, NULL),
(171, 'Hualañé', 9, NULL, NULL),
(172, 'Licantén', 9, NULL, NULL),
(173, 'Molina', 9, NULL, NULL),
(174, 'Rauco', 9, NULL, NULL),
(175, 'Romeral', 9, NULL, NULL),
(176, 'Sagrada Familia', 9, NULL, NULL),
(177, 'Teno', 9, NULL, NULL),
(178, 'Vichuquén', 9, NULL, NULL),
(179, 'Colbún', 9, NULL, NULL),
(180, 'Linares', 9, NULL, NULL),
(181, 'Longaví', 9, NULL, NULL),
(182, 'Parral', 9, NULL, NULL),
(183, 'Retiro', 9, NULL, NULL),
(184, 'San Javier', 9, NULL, NULL),
(185, 'Villa Alegre', 9, NULL, NULL),
(186, 'Yerbas Buenas', 9, NULL, NULL),
(187, 'Constitución', 9, NULL, NULL),
(188, 'Curepto', 9, NULL, NULL),
(189, 'Empedrado', 9, NULL, NULL),
(190, 'Maule', 9, NULL, NULL),
(191, 'Pelarco', 9, NULL, NULL),
(192, 'Pencahue', 9, NULL, NULL),
(193, 'Río Claro', 9, NULL, NULL),
(194, 'San Clemente', 9, NULL, NULL),
(195, 'San Rafael', 9, NULL, NULL),
(196, 'Talca', 9, NULL, NULL),
(197, 'Bulnes', 10, NULL, NULL),
(198, 'Chillán', 10, NULL, NULL),
(199, 'Chillán Viejo', 10, NULL, NULL),
(200, 'Cobquecura', 10, NULL, NULL),
(201, 'Coelemu', 10, NULL, NULL),
(202, 'Coihueco', 10, NULL, NULL),
(203, 'El Carmen', 10, NULL, NULL),
(204, 'Ninhue', 10, NULL, NULL),
(205, 'Ñiquen', 10, NULL, NULL),
(206, 'Pemuco', 10, NULL, NULL),
(207, 'Pinto', 10, NULL, NULL),
(208, 'Portezuelo', 10, NULL, NULL),
(209, 'Quirihue', 10, NULL, NULL),
(210, 'Ránquil', 10, NULL, NULL),
(211, 'Treguaco', 10, NULL, NULL),
(212, 'Quillón', 10, NULL, NULL),
(213, 'San Carlos', 10, NULL, NULL),
(214, 'San Fabián', 10, NULL, NULL),
(215, 'San Ignacio', 10, NULL, NULL),
(216, 'San Nicolás', 10, NULL, NULL),
(217, 'Yungay', 10, NULL, NULL),
(218, 'Arauco', 11, NULL, NULL),
(219, 'Cañete', 11, NULL, NULL),
(220, 'Contulmo', 11, NULL, NULL),
(221, 'Curanilahue', 11, NULL, NULL),
(222, 'Lebu', 11, NULL, NULL),
(223, 'Los Álamos', 11, NULL, NULL),
(224, 'Tirúa', 11, NULL, NULL),
(225, 'Alto Biobío', 11, NULL, NULL),
(226, 'Antuco', 11, NULL, NULL),
(227, 'Cabrero', 11, NULL, NULL),
(228, 'Laja', 11, NULL, NULL),
(229, 'Los Ángeles', 11, NULL, NULL),
(230, 'Mulchén', 11, NULL, NULL),
(231, 'Nacimiento', 11, NULL, NULL),
(232, 'Negrete', 11, NULL, NULL),
(233, 'Quilaco', 11, NULL, NULL),
(234, 'Quilleco', 11, NULL, NULL),
(235, 'San Rosendo', 11, NULL, NULL),
(236, 'Santa Bárbara', 11, NULL, NULL),
(237, 'Tucapel', 11, NULL, NULL),
(238, 'Yumbel', 11, NULL, NULL),
(239, 'Chiguayante', 11, NULL, NULL),
(240, 'Concepción', 11, NULL, NULL),
(241, 'Coronel', 11, NULL, NULL),
(242, 'Florida', 11, NULL, NULL),
(243, 'Hualpén', 11, NULL, NULL),
(244, 'Hualqui', 11, NULL, NULL),
(245, 'Lota', 11, NULL, NULL),
(246, 'Penco', 11, NULL, NULL),
(247, 'San Pedro de La Paz', 11, NULL, NULL),
(248, 'Santa Juana', 11, NULL, NULL),
(249, 'Talcahuano', 11, NULL, NULL),
(250, 'Tomé', 11, NULL, NULL),
(251, 'Carahue', 12, NULL, NULL),
(252, 'Cholchol', 12, NULL, NULL),
(253, 'Cunco', 12, NULL, NULL),
(254, 'Curarrehue', 12, NULL, NULL),
(255, 'Freire', 12, NULL, NULL),
(256, 'Galvarino', 12, NULL, NULL),
(257, 'Gorbea', 12, NULL, NULL),
(258, 'Lautaro', 12, NULL, NULL),
(259, 'Loncoche', 12, NULL, NULL),
(260, 'Melipeuco', 12, NULL, NULL),
(261, 'Nueva Imperial', 12, NULL, NULL),
(262, 'Padre Las Casas', 12, NULL, NULL),
(263, 'Perquenco', 12, NULL, NULL),
(264, 'Pitrufquén', 12, NULL, NULL),
(265, 'Pucón', 12, NULL, NULL),
(266, 'Saavedra', 12, NULL, NULL),
(267, 'Temuco', 12, NULL, NULL),
(268, 'Teodoro Schmidt', 12, NULL, NULL),
(269, 'Toltén', 12, NULL, NULL),
(270, 'Vilcún', 12, NULL, NULL),
(271, 'Villarrica', 12, NULL, NULL),
(272, 'Angol', 12, NULL, NULL),
(273, 'Collipulli', 12, NULL, NULL),
(274, 'Curacautín', 12, NULL, NULL),
(275, 'Ercilla', 12, NULL, NULL),
(276, 'Lonquimay', 12, NULL, NULL),
(277, 'Los Sauces', 12, NULL, NULL),
(278, 'Lumaco', 12, NULL, NULL),
(279, 'Purén', 12, NULL, NULL),
(280, 'Renaico', 12, NULL, NULL),
(281, 'Traiguén', 12, NULL, NULL),
(282, 'Victoria', 12, NULL, NULL),
(283, 'Corral', 13, NULL, NULL),
(284, 'Lanco', 13, NULL, NULL),
(285, 'Los Lagos', 13, NULL, NULL),
(286, 'Máfil', 13, NULL, NULL),
(287, 'Mariquina', 13, NULL, NULL),
(288, 'Paillaco', 13, NULL, NULL),
(289, 'Panguipulli', 13, NULL, NULL),
(290, 'Valdivia', 13, NULL, NULL),
(291, 'Futrono', 13, NULL, NULL),
(292, 'La Unión', 13, NULL, NULL),
(293, 'Lago Ranco', 13, NULL, NULL),
(294, 'Río Bueno', 13, NULL, NULL),
(295, 'Ancud', 14, NULL, NULL),
(296, 'Castro', 14, NULL, NULL),
(297, 'Chonchi', 14, NULL, NULL),
(298, 'Curaco de Vélez', 14, NULL, NULL),
(299, 'Dalcahue', 14, NULL, NULL),
(300, 'Puqueldón', 14, NULL, NULL),
(301, 'Queilén', 14, NULL, NULL),
(302, 'Quemchi', 14, NULL, NULL),
(303, 'Quellón', 14, NULL, NULL),
(304, 'Quinchao', 14, NULL, NULL),
(305, 'Calbuco', 14, NULL, NULL),
(306, 'Cochamó', 14, NULL, NULL),
(307, 'Fresia', 14, NULL, NULL),
(308, 'Frutillar', 14, NULL, NULL),
(309, 'Llanquihue', 14, NULL, NULL),
(310, 'Los Muermos', 14, NULL, NULL),
(311, 'Maullín', 14, NULL, NULL),
(312, 'Puerto Montt', 14, NULL, NULL),
(313, 'Puerto Varas', 14, NULL, NULL),
(314, 'Osorno', 14, NULL, NULL),
(315, 'Puero Octay', 14, NULL, NULL),
(316, 'Purranque', 14, NULL, NULL),
(317, 'Puyehue', 14, NULL, NULL),
(318, 'Río Negro', 14, NULL, NULL),
(319, 'San Juan de la Costa', 14, NULL, NULL),
(320, 'San Pablo', 14, NULL, NULL),
(321, 'Chaitén', 14, NULL, NULL),
(322, 'Futaleufú', 14, NULL, NULL),
(323, 'Hualaihué', 14, NULL, NULL),
(324, 'Palena', 14, NULL, NULL),
(325, 'Aisén', 15, NULL, NULL),
(326, 'Cisnes', 15, NULL, NULL),
(327, 'Guaitecas', 15, NULL, NULL),
(328, 'Cochrane', 15, NULL, NULL),
(329, 'Ohiggins', 15, NULL, NULL),
(330, 'Tortel', 15, NULL, NULL),
(331, 'Coihaique', 15, NULL, NULL),
(332, 'Lago Verde', 15, NULL, NULL),
(333, 'Chile Chico', 15, NULL, NULL),
(334, 'Río Ibáñez', 15, NULL, NULL),
(335, 'Antártica', 16, NULL, NULL),
(336, 'Cabo de Hornos', 16, NULL, NULL),
(337, 'Laguna Blanca', 16, NULL, NULL),
(338, 'Punta Arenas', 16, NULL, NULL),
(339, 'Río Verde', 16, NULL, NULL),
(340, 'San Gregorio', 16, NULL, NULL),
(341, 'Porvenir', 16, NULL, NULL),
(342, 'Primavera', 16, NULL, NULL),
(343, 'Timaukel', 16, NULL, NULL),
(344, 'Natales', 16, NULL, NULL),
(345, 'Torres del Paine', 16, NULL, NULL),
(346, 'Cabildo', 6, NULL, NULL);

-- --------------------------------------------------------



--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado_oferta` int(11) NOT NULL,
  `precio_oferta` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_compra`
--

CREATE TABLE `ordenes_compra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comuna_id` bigint(20) UNSIGNED DEFAULT NULL,
  `envio` tinyint(1) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado_retiro` int(11) NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra_producto`
--

CREATE TABLE `orden_compra_producto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden_compra_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad_orden_compra` int(11) NOT NULL,
  `precio_orden_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(9999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagenes` varchar(999) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `oferta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_region` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `nombre_region`, `created_at`, `updated_at`) VALUES
(1, 'Arica y Parinacota', NULL, NULL),
(2, 'Tarapacá', NULL, NULL),
(3, 'Antofagasta', NULL, NULL),
(4, 'Atacama', NULL, NULL),
(5, 'Coquimbo', NULL, NULL),
(6, 'Valparaiso', NULL, NULL),
(7, 'Metropolitana de Santiago', NULL, NULL),
(8, 'Libertador General Bernardo OHiggins', NULL, NULL),
(9, 'Maule', NULL, NULL),
(10, 'Ñuble', NULL, NULL),
(11, 'Biobío', NULL, NULL),
(12, 'La Araucanía', NULL, NULL),
(13, 'Los Ríos', NULL, NULL),
(14, 'Los Lagos', NULL, NULL),
(15, 'Aisén del General Carlos Ibáñez del Campo', NULL, NULL),
(16, 'Magallanes y de la Antártica Chilena', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_rol` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_metadata`
--

CREATE TABLE `users_metadata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comuna_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rol_id` bigint(20) UNSIGNED NOT NULL,
  `apellido_paterno` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitantes`
--

CREATE TABLE `visitantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calificaciones_user_id_foreign` (`user_id`),
  ADD KEY `calificaciones_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carritos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `carrito_producto`
--
ALTER TABLE `carrito_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carritos_productos_carrito_id_foreign` (`carrito_id`),
  ADD KEY `carritos_productos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comunas_region_id_foreign` (`region_id`);

--
--

-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes_compra`
--
ALTER TABLE `ordenes_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordenes_compra_user_id_foreign` (`user_id`),
  ADD KEY `ordenes_compra_comuna_id_foreign` (`comuna_id`);

--
-- Indices de la tabla `orden_compra_producto`
--
ALTER TABLE `orden_compra_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden_compra_productos_orden_compra_id_foreign` (`orden_compra_id`),
  ADD KEY `orden_compra_productos_producto_id_foreign` (`producto_id`);

--


--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`),
  ADD KEY `productos_oferta_id_foreign` (`oferta_id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `users_metadata`
--
ALTER TABLE `users_metadata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_metadata_comuna_id_foreign` (`comuna_id`),
  ADD KEY `users_metadata_rol_id_foreign` (`rol_id`),
  ADD KEY `users_metadata_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrito_producto`
--
ALTER TABLE `carrito_producto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--


-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes_compra`
--
ALTER TABLE `ordenes_compra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_compra_producto`
--
ALTER TABLE `orden_compra_producto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_metadata`
--
ALTER TABLE `users_metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `calificaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito_producto`
--
ALTER TABLE `carrito_producto`
  ADD CONSTRAINT `carritos_productos_carrito_id_foreign` FOREIGN KEY (`carrito_id`) REFERENCES `carritos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carritos_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD CONSTRAINT `comunas_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`id`);

--
-- Filtros para la tabla `ordenes_compra`
--
ALTER TABLE `ordenes_compra`
  ADD CONSTRAINT `ordenes_compra_comuna_id_foreign` FOREIGN KEY (`comuna_id`) REFERENCES `comunas` (`id`),
  ADD CONSTRAINT `ordenes_compra_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orden_compra_producto`
--
ALTER TABLE `orden_compra_producto`
  ADD CONSTRAINT `orden_compra_productos_orden_compra_id_foreign` FOREIGN KEY (`orden_compra_id`) REFERENCES `ordenes_compra` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orden_compra_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `productos_oferta_id_foreign` FOREIGN KEY (`oferta_id`) REFERENCES `ofertas` (`id`);

--
-- Filtros para la tabla `users_metadata`
--
ALTER TABLE `users_metadata`
  ADD CONSTRAINT `users_metadata_comuna_id_foreign` FOREIGN KEY (`comuna_id`) REFERENCES `comunas` (`id`),
  ADD CONSTRAINT `users_metadata_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_metadata_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
