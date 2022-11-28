-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2022 a las 09:33:06
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

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`id`, `user_id`) VALUES
(150, 2);

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

--
-- Volcado de datos para la tabla `carrito_producto`
--

INSERT INTO `carrito_producto` (`id`, `carrito_id`, `producto_id`, `cantidad_carrito`) VALUES
(140, 150, 42, 2),
(142, 150, 41, 3),
(143, 150, 40, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`) VALUES
(1, 'Ornamentales'),
(2, 'Plantas de Interior'),
(3, 'Plantas de Exterior'),
(4, 'Suculentas'),
(5, 'Árboles Frutales'),
(6, 'Maceteros'),
(7, 'Tierra de Hojas'),
(8, 'Accesorios');

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
(329, 'O\'higgins', 15, NULL, NULL),
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
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(63, '2014_10_12_000000_create_users_table', 1),
(64, '2014_10_12_100000_create_password_resets_table', 1),
(65, '2019_08_19_000000_create_failed_jobs_table', 1),
(66, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(67, '2022_11_07_213101_create_regiones_table', 1),
(68, '2022_11_07_214424_create_comunas_table', 1),
(69, '2022_11_07_214548_create_roles_table', 1),
(70, '2022_11_07_214625_create_users_metadata_table', 1),
(71, '2022_11_10_170237_create_categorias_table', 1),
(72, '2022_11_14_024234_create_ofertas_table', 2),
(73, '2022_11_14_024937_create_productos_table', 3),
(74, '2022_11_14_030352_add_producto_id_to_ofertas_table', 4),
(75, '2022_11_14_030616_drop_producto_id_to_ofertas_table', 5),
(76, '2022_11_14_030730_drop_producto_id_to_ofertas_table', 6),
(77, '2022_11_14_030938_add_producto_id_to_ofertas_table', 7),
(78, '2022_11_14_031517_create_producto_categoria_table', 8),
(79, '2022_11_15_011955_drop_producto_categoria_table', 9),
(80, '2022_11_15_012308_drop_producto_categoria_table', 10),
(81, '2022_11_15_012349_create_producto_categoria_table', 11),
(82, '2022_11_15_013250_create_categoria_producto_table', 12),
(83, '2022_11_15_013322_drop_producto_categoria_table', 12),
(84, '2022_11_15_062137_drop_categoria_proucto_table', 13),
(85, '2022_11_15_062230_drop_categoria_proucto_table', 14),
(86, '2022_11_15_064226_add_categoria_id_to_proucto_table', 15),
(87, '2022_11_16_053113_add_column_created_at_at_productos_table', 16),
(88, '2022_11_16_055758_add_column_updated_at_at_productos_table', 17),
(89, '2022_11_18_030258_drop_column_producto_id_at_ofertas_table', 18),
(90, '2022_11_18_205759_add_column_created_at_at_ofertas_table', 19),
(91, '2022_11_18_205932_add_column_updated_at_at_ofertas_table', 20),
(92, '2022_11_18_210132_add_column_created_at_at_ofertas_table', 21),
(93, '2022_11_18_210314_add_column_created_at_at_ofertas_table', 22),
(94, '2022_11_18_211914_add_column_oferta_id_at_productos_table', 23),
(95, '2022_11_20_224506_create_carrito_table', 24),
(96, '2022_11_20_224946_drop_carrito_producto_table', 25),
(97, '2022_11_20_225121_create_carritos_producto_table', 26),
(98, '2022_11_20_225458_drop_carritos_producto_table', 27),
(99, '2022_11_20_225600_create_carritos_table', 28),
(100, '2022_11_20_225642_create_carritos_productos_table', 29),
(101, '2022_11_21_021408_rename_carritos_producto_table', 30),
(102, '2022_11_21_030857_rename_cantidad_column', 31),
(103, '2022_11_24_000440_drop_total_column_carritos_table', 32);

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

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `fecha_inicio`, `fecha_fin`, `estado_oferta`, `precio_oferta`, `updated_at`, `created_at`) VALUES
(1, '2022-11-25', '2022-11-30', 1, 1000, '2022-11-18', '2022-11-18'),
(2, '2022-11-24', '2022-11-30', 1, 3900, '2022-11-18', '2022-11-18'),
(3, '2022-11-24', '2022-11-30', 1, 10000, '2022-11-20', '2022-11-20'),
(4, '2022-11-30', '2022-12-30', 0, 6300, '2022-11-20', '2022-11-20'),
(5, '2022-11-24', '2022-11-27', 1, 1000, '2022-11-20', '2022-11-20'),
(6, '2022-11-24', '2022-11-27', 0, 1000, '2022-11-20', '2022-11-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

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
  `oferta_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `cantidad`, `precio`, `descripcion`, `imagenes`, `categoria_id`, `created_at`, `updated_at`, `oferta_id`) VALUES
(40, 'Taza', 23, 2352, 'Beauval, Saskatchewan is a northern village located in Northern Saskatchewan, near Lac Île-à-la-Crosse. It was founded in the early 20th century as a Roman Catholic mission and as a transportation centre.\r\n\r\nHighway 165 goes through the community. Highway 918 three kilometres east leads north to Patuanak. Eight kilometres east is the hamlet of Lac La Plonge on Lac La Plonge. Eight kilometres west where Highway 165 joins Highway 155 is Beauval Forks. The Beauval Airport along with several businesses are located there.\r\n\r\nBeauval is situated in the valley of the Beaver River hence the name \"beautiful valley\" or \"beau val\" in French. The population of Beauval was 756 in 2011.[6]||The 2017–18 UMKC Kangaroos men\'s basketball team represented the University of Missouri–Kansas City during the 2017–18 NCAA Division I men\'s basketball season. The Kangaroos, led by fifth-year head coach Kareem Richardson, played their home games at the Municipal Auditorium, with one home game at the Swinney Recreation Center, as members of the Western Athletic Conference. They finished the season 10–22, 5–9 in WAC play to finish in a tie for sixth place. They lost in the quarterfinals of the WAC tournament to Grand Canyon.||Pseudoanthidium rotundiventre is a species of leaf-cutting bee in the genus Pseudoanthidium, of the family Megachilidae. It is endemic to Sri Lanka.||Otoño--Invierno--Primavera--Verano', '40-1.jpg', 1, '2022-11-17', '2022-11-18', 1),
(41, 'Caja', 995, 32125, 'Yalghaar (English: \"Assault\" or \"Attack\"; previously known as Delta Echo Foxtrot)[1] is a 2017 Pakistani war-epic film directed by Hassan Rana.[2] The film is produced by MindWorks Media and is based on the true story of Pakistan Army\'s Swat Operation.[3] Yalghaar was facilitated by Brigadier Syed Mujtaba Tirmizi from Inter-Services Public Relations -ISPR.\r\n\r\nThe film \"explores what happens in the lives of those involved, including the militants and how all of them are affected at a personal level because of the ongoing operation\". It stars Shaan Shahid in the lead role, along with Humayun Saeed, Adnan Siddiqui, Armeena Khan, Aleeze Nasser, Ayesha Omer, Sana Bucha, Bilal Ashraf.[1] It is the most expensive Pakistani movie to date.[4] Apart from budget and extensive cast, the film features 150 written characters. On 19 December 2014, Hassan Waqas Rana revealed that this film is a tribute to slain children of the 2014 Peshawar school attack.[5]||The Malian Union for Democracy and Development (French: Union Malienne pour la Démocratie et le Développement, UMADD} was a political party in the Ménaka Cercle area of Mali. It was seen as a party of the Ikelan, although many supporters were from the Imghad population.[1]', '41-1.jpg', 8, '2022-11-17', '2022-11-20', 4),
(42, 'Filtros', 20, 9999, 'The New Year Honours 1964 were appointments in many of the Commonwealth realms of Queen Elizabeth II to various orders and honours to reward and highlight good works by citizens of those countries. They were announced on 1 January 1964 to celebrate the year passed and mark the beginning of 1964.[1][2]||Dettey is a commune in the Saône-et-Loire department in the region of Bourgogne-Franche-Comté in eastern France.||Sergey Nikolayevich \"Chizh\" Chigrakov (Russian: Серге́й Николаевич Чиграков; born 6 February 1961 in Dzerzhinsk) is a Russian rock performer and songwriter. Most of his current songs are recorded with his band, Chizh & Co.\r\n\r\nChigrakov has performed on stage since the age of 14, playing the bass guitar in clubs in his home town Dzerzhinsk. He graduated from a musical school and college in the same town, and then studied at the Leningrad Institute of Culture and the jazz studio of the Leningrad Conservatory. There he learned to play the accordion and drums. Chigrakov then worked as an instructor in Dzerzhinsk, while playing the guitar and singing in a metal group.||Verano', '42-1.jpg', 4, '2022-11-17', '2022-11-20', 6),
(43, 'Paracetamol', 0, 5210, 'Digital Speech Standard (DSS) is a proprietary compressed digital audio file format defined by the International Voice Association, a co-operative venture by Olympus, Philips and Grundig Business Systems.\r\n\r\nDSS was originally developed in 1994 by Grundig with the University of Nuremberg. In 1997, the digital speech standard was released, which was based on the previous codec. It is commonly used on digital dictation recorders. Modern psychoacoustical codecs that perform nearly as well at only slightly higher bitrates have led to this speech coding standard being less used in modern voice recording equipment.||Hermann Adolf Maurer (born April 26, 1941) is an Austrian computer scientist, serving as Professor of Computer Science at the Graz University of Technology. He has supervised over 40 dissertations, written more than 20 books and over 600 scientific articles, and started or been involved with a number of companies.||Ruppert Stadium was a baseball stadium in Newark, New Jersey, in the area now known as the Ironbound. Originally named Davids\' Stadium after Charles L. Davids, owner of the Newark Bears,[2] it was home to the minor league Newark Bears of the International League from 1926 to 1949, and to the Negro leagues Newark Stars in 1926 and Newark Eagles from 1936 to 1948. It was also the home field of the short-lived Newark Bears of the first American Football League in 1926.[3][4][5] The stadium was named for Jacob Ruppert, a baseball team owner who built the farm system of the New York Yankees.[6]||Primavera', '43-1.jpg', 1, '2022-11-17', '2022-11-18', 2),
(44, 'Pantalla', 999, 99999, 'Living with the Past is a live album by Jethro Tull. The first half (first LP of the 2019 vinyl reissue[3]) contains material from the Hammersmith Apollo performance on 25 November 2001[4][5] and features songs from different eras of Tull\'s history as well as some pieces from Ian Anderson\'s solo albums: \"The Habanero Reel\", \"The Water Carrier\" (DVD only) from The Secret Language of Birds and the instrumental \"In the Grip of Stronger Stuff\" from Divinities: Twelve Dances with God. Aside from \"Cheerio\" (the conclusion from the Hammersmith concert), other recordings are collected in the second half.||Mariya Petrovna Nesterenko (Russian: Мария Петровна Нестеренко; 1910 – 28 October 1941) was a Soviet pilot who rose to the rank of major in the Air Force and became a deputy regimental commander before she was executed for being the wife of Hero of the Soviet Union Pavel Rychagov, a victim of one of NKVD chief Lavrentiy Beria\'s purges of the air force. She, her husband, and the other victims were posthumously rehabilitated after Stalin died.[1][2]||John (III) de Mowbray, 4th Baron Mowbray (24 June 1340 – 19 October 1368) was an English peer. He was slain near Constantinople while en route to the Holy Land.||Otoño--Invierno', '44-1.jpg', 1, '2022-11-17', '2022-11-17', NULL),
(45, 'Caja', 991, 12313, 'asdUncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17||Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17||Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17||Invierno', '45-1.jpg', 3, '2022-11-18', '2022-11-18', NULL),
(46, 'Tabaco', 991, 1231, 'Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17||Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17Uncaught TypeError: Cannot read properties of null (reading \'CodeMirror\')\r\n    at <anonymous>:7:17', '46-1.jpg', 6, '2022-11-18', '2022-11-18', NULL),
(47, 'Control', 515, 19000, '<div class=\"swiper-slide space-y-3\">  \r\n                @foreach ($ofertas as $oferta) \r\n                        @if($contador == 2)\r\n                            @break||<div class=\"swiper-slide space-y-3\">  \r\n                @foreach ($ofertas as $oferta) \r\n                        @if($contador == 2)\r\n                            @break\r\n                        @endif\r\n                        <div class=\"flex\">\r\n                            <img class=\"h-32\" src=\"{{asset(\'storage/imagenes/\'.$oferta->imagenes)}}\"  alt=\"\">\r\n                            <ul>\r\n                                <li>\r\n                                    <p class=\"ml-3\">\r\n                                        {{$oferta->nombre_producto}}\r\n                                    </p>\r\n                                </li>\r\n                                <li>\r\n                                    <p class=\"ml-3 font-semibold\">\r\n                                        ${{ number_format($oferta->oferta->precio_oferta, 0, \",\", \".\")}}||<div class=\"swiper-slide space-y-3\">  \r\n                @foreach ($ofertas as $oferta) \r\n                        @if($contador == 2)\r\n                            @break\r\n                        @endif\r\n                        <div class=\"flex\">||Invierno', '47-1.jpg|47-2.jpg|47-3.jpg', 5, '2022-11-20', '2022-11-20', 3),
(48, 'Plato', 992, 999999, '<div class=\"grid xl:grid-cols-5 gap-4\">                        \r\n                        <div class=\"xl:col-start-2 xl:col-span-3 galeria\">\r\n                            <div class=\"flex justify-center items-center\">\r\n                                <img id=\"preview-imagen-1\" class=\"xl:object-cover md:object-scale-down py-15 px-5 mb-5 mt-10\" src=\"\" alt=\"\">\r\n                            </div>\r\n                        </div>      \r\n                    </div>||<div class=\"grid xl:grid-cols-5 gap-4\">                        \r\n                        <div class=\"xl:col-start-2 xl:col-span-3 galeria\">\r\n                            <div class=\"flex justify-center items-center\">\r\n                                <img id=\"preview-imagen-1\" class=\"xl:object-cover md:object-scale-down py-15 px-5 mb-5 mt-10\" src=\"\" alt=\"\">\r\n                            </div>\r\n                        </div>      \r\n                    </div>', '48-1.jpg|48-2.jpg', 8, '2022-11-21', '2022-11-21', NULL),
(49, 'Botella', 993, 999999, 'composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload||composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload composer.json in autoload', '49-1.jpg', 7, '2022-11-22', '2022-11-22', NULL),
(50, 'cable', 994, 99999, 'fsfdsfsdfsdf||sdfsdfsdfsdf||fsdfsdfsdfsdfsdf||Primavera--Verano', '50-1.jpg', 4, '2022-11-24', '2022-11-24', NULL);

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
(8, 'Libertador General Bernardo O\'Higgins', NULL, NULL),
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

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre_rol`, `created_at`, `updated_at`) VALUES
(1, 'administrador', NULL, NULL),
(2, 'cliente', NULL, NULL);

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

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Gastón', 'gaston584@gmail.com', NULL, '$2y$10$c/ZcMara/9qZK3J1.TefKeUWIrTLooYTboU3JUl/Nl9y/Gv8xOZD.', NULL, '2022-11-10 20:24:00', '2022-11-10 20:24:00'),
(3, 'dasdad', 'gaston581@gmail.com', NULL, '$2y$10$sRSzkJv4YFomMXLYkBBZ1OVf2NuEoFujw.VM8/ossXBNlmOF2qFZe', NULL, '2022-11-14 05:34:16', '2022-11-14 05:34:16'),
(4, 'Damian', 'gaston582@gmail.com', NULL, '$2y$10$5ycsmHs6/OPQDAg7sa/KpOycYNvdcmL1TGZS1o1MCwjJM717E9g4K', NULL, '2022-11-22 23:54:59', '2022-11-22 23:54:59');

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

--
-- Volcado de datos para la tabla `users_metadata`
--

INSERT INTO `users_metadata` (`id`, `direccion`, `comuna_id`, `user_id`, `rol_id`, `apellido_paterno`, `apellido_materno`, `telefono`, `created_at`, `updated_at`) VALUES
(2, 'calle nueva 2647', 1, 2, 1, 'Toledo', 'Becerra', '966419506', '2022-11-10 20:24:00', '2022-11-10 20:24:00'),
(3, 'dasdada', 1, 3, 2, 'dadsada', 'dasdad', '966419507', '2022-11-14 05:34:16', '2022-11-14 05:34:16'),
(4, 'prat 456', 1, 4, 2, 'Toledo', 'Mardones', '982655612', '2022-11-22 23:54:59', '2022-11-22 23:54:59');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
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
  ADD KEY `users_metadata_user_id_foreign` (`user_id`),
  ADD KEY `users_metadata_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `carrito_producto`
--
ALTER TABLE `carrito_producto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users_metadata`
--
ALTER TABLE `users_metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

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
  ADD CONSTRAINT `users_metadata_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
