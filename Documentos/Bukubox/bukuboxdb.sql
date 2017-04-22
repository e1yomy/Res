-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-06-2016 a las 05:13:16
-- Versión del servidor: 5.5.45-cll-lve
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bukuboxdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amistad`
--

CREATE TABLE IF NOT EXISTS `amistad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lector1_id` int(11) NOT NULL,
  `lector2_id` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `nombre`) VALUES
(2, 'Daniel Roy Greenfeld'),
(3, 'Robert C.Martin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_libro`
--

CREATE TABLE IF NOT EXISTS `autor_libro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `autor_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `autor_libro`
--

INSERT INTO `autor_libro` (`id`, `autor_id`, `libro_id`) VALUES
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE IF NOT EXISTS `cajas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lector_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `estado_lectura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pag_leidas` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `lector_id`, `libro_id`, `estado_lectura`, `pag_leidas`, `calificacion`, `fecha_registro`) VALUES
(2, 3, 2, 'Leyendo', 0, 5, '2016-06-06 08:00:24'),
(4, 1, 2, 'Completo', 0, 3, '2016-06-06 10:57:06'),
(5, 1, 3, 'Completo', 550, 3, '2016-06-06 11:00:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE IF NOT EXISTS `citas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lector_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `no_pagina` int(11) NOT NULL,
  `capitulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `user_id`, `rol`, `activo`) VALUES
(1, 1, 'Master', 1),
(3, 3, 'Master', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE IF NOT EXISTS `deseos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lector_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE IF NOT EXISTS `generos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `generos_nombre_unique` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Programación', 'C#, Java, HTML, CSS, JavaScript, C++, Asm, Python');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_inicio`
--

CREATE TABLE IF NOT EXISTS `imagen_inicio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url_imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `imagen_inicio`
--

INSERT INTO `imagen_inicio` (`id`, `url_imagen`) VALUES
(1, '/storage/app/public/imagen_inicio/fondo_capa.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectores`
--

CREATE TABLE IF NOT EXISTS `lectores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cuenta_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `url_avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `lectores`
--

INSERT INTO `lectores` (`id`, `cuenta_id`, `nombre`, `apellido`, `fecha_nacimiento`, `url_avatar`, `nota`, `activo`) VALUES
(1, 1, 'Jiovanna', 'Manriquez', '1994-02-13', '/storage/app/public/perfil/perfil-buku.png', NULL, 1),
(3, 3, 'Alma', 'Aviles', '0000-00-00', '/storage/app/public/perfil/foto_con_traje_y_corbata1.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `isbn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_portada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paginas` int(11) DEFAULT NULL,
  `sinopsis` text COLLATE utf8_unicode_ci,
  `editorial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edicion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idioma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `isbn`, `titulo`, `url_portada`, `paginas`, `sinopsis`, `editorial`, `edicion`, `idioma`, `forma`, `fecha_publicacion`, `fecha_registro`) VALUES
(2, '', 'Two Scoops of Django', 'https://cdn.shopify.com/s/files/1/0304/6901/products/two-scoops-django-1.8-best-practices_abe21353-2734-4208-8566-c95e22759f59_large.png?v=1432913237', 0, '                                    ', '', '', 'espanol', 'fisica', '0000-00-00', '2016-06-06 08:00:24'),
(3, '', 'Codigo limpio', 'http://multimedia.fnac.com/multimedia/ES/images_produits/ES/ZoomPE/6/0/1/9788441532106.jpg', 550, 'Cada año, se invierten innumerables horas y se pierden numerosos recursos debido a código mal escrito, ralentizando el desarrollo, disminuyendo la productividad, generando graves fallos e incluso pudiendo acabar con la organización o empresa. \n\nEl reconocido experto de software Robert C. Martin, junto con sus colegas de Object Mentor, nos presentan sus óptimas técnicas y metodologías ágiles para limpiar el código sobre la marcha y crearlo de forma correcta, de este modo mejorará como programador.\n\nEsta obra se divide en tres partes. La primera describe los principios, patrones y prácticas para crear código limpio. La segunda incluye varios casos de estudio cuya complejidad va aumentando. Cada ejemplo es un ejercicio de limpieza y transformación de código con problemas. La tercera parte del libro contiene una lista de heurística y síntomas de código erróneo (smells) confeccionada al crear los casos prácticos. El resultado es una base de conocimientos que describe cómo pensamos cuando creamos, leemos y limpiamos código.\n\nImprescindible para cualquier desarrollador, ingeniero de software, director de proyectos, jefe de equipo o analista de sistemas interesado en crear código de mejor calidad.\n\n¡El libro que todo programador debe leer!                           ', 'Anaya', '', 'espanol', 'pdf', '0000-00-00', '2016-06-06 11:00:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_genero`
--

CREATE TABLE IF NOT EXISTS `libro_genero` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genero_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `libro_genero`
--

INSERT INTO `libro_genero` (`id`, `genero_id`, `libro_id`) VALUES
(1, 0, 0),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_20_042211_lector', 1),
('2016_04_20_042926_libro', 1),
('2016_04_20_045544_autor', 1),
('2016_04_20_050009_autor_libro', 1),
('2016_04_20_122001_solicitud_amistad', 1),
('2016_04_20_122215_amistad', 1),
('2016_04_20_122451_caja', 1),
('2016_04_20_122708_cita', 1),
('2016_04_20_123509_cuenta', 1),
('2016_04_20_133216_libro_genero', 1),
('2016_04_20_133406_genero', 1),
('2016_04_28_072816_deseo', 1),
('2016_05_25_142338_imagen_inicio', 2),
('2016_05_25_142821_objetivos', 2),
('2016_05_25_142831_patrocinadores', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE IF NOT EXISTS `objetivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url_imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`id`, `url_imagen`, `texto`) VALUES
(1, '/storage/app/public/objetivos/icono1.png', 'Crea tu lista de deseos.'),
(2, '/storage/app/public/objetivos/icono2.png', 'Registra tus libros.'),
(3, '/storage/app/public/objetivos/icono3.png', 'Comparte con amigos.'),
(4, '/storage/app/public/objetivos/icono4.png', 'Mira tus logros de lectura.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinadores`
--

CREATE TABLE IF NOT EXISTS `patrocinadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url_imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_pagina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_amistad`
--

CREATE TABLE IF NOT EXISTS `solicitud_amistad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lector_emisor_id` int(11) NOT NULL,
  `lector_receptor_id` int(11) NOT NULL,
  `fecha_solicitud` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `solicitud_amistad`
--

INSERT INTO `solicitud_amistad` (`id`, `lector_emisor_id`, `lector_receptor_id`, `fecha_solicitud`) VALUES
(1, 1, 3, '2016-06-06 10:47:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jiovanna', 'jiovanna@gmail.com', '$2y$10$bDo.Um8lb3mgJKBv5iIMDOXWKAcDa2cIdDcBu0YjMw8KxHGPEKrJS', '2eKIi8zknvPorTD5rQL8pPuYU3yAUOb5QNXHtsWZJGHYpgLaAoqaEd7epa87', '2016-05-26 04:48:15', '2016-06-06 18:07:08'),
(3, 'Edgar2518', 'edgar16nm@gmail.com', '$2y$10$a.BGbIqyeC6Uf8TsJAu5reyaEMEFEpmtexHmxgooE/6/Yz216zC2K', 'rZNdJ8HnoQzNpDm9GYd2z3Xs3P9mylL7jI8V4IXtbC2xAAhGYsj9JNh5UgN8', '2016-06-06 08:22:30', '2016-06-06 14:52:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
