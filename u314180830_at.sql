
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-01-2018 a las 01:17:45
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u314180830_at`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audio`
--

CREATE TABLE IF NOT EXISTS `audio` (
  `id_audio` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `artista` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion_audio` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_audio`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_compra_venta`
--

CREATE TABLE IF NOT EXISTS `comentario_compra_venta` (
  `id_comentario_compra_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_compra_venta` int(11) NOT NULL,
  `titulo` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_comentario_compra_venta`),
  KEY `titulo` (`titulo`),
  KEY `id_compra_venta` (`id_compra_venta`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_evento`
--

CREATE TABLE IF NOT EXISTS `comentario_evento` (
  `id_comentario_evento` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_evento` int(11) NOT NULL,
  `titulo` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_comentario_evento`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_evento` (`id_evento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_hoy_necesito`
--

CREATE TABLE IF NOT EXISTS `comentario_hoy_necesito` (
  `id_comentario_hoy_necesito` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_hoy_necesito` int(11) NOT NULL,
  `titulo` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_comentario_hoy_necesito`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_hoy_necesito` (`id_hoy_necesito`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `comentario_hoy_necesito`
--

INSERT INTO `comentario_hoy_necesito` (`id_comentario_hoy_necesito`, `id_usuario`, `id_hoy_necesito`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 8, 2, 'TituloComentario', 'Este es el contenido del comentario', '2018-01-27 21:25:12'),
(2, 8, 2, 'Comentario2', 'Prueba 2', '2018-01-27 21:45:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_noticia`
--

CREATE TABLE IF NOT EXISTS `comentario_noticia` (
  `id_comentario_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_comentario_noticia`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_noticia` (`id_noticia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_venta`
--

CREATE TABLE IF NOT EXISTS `compra_venta` (
  `id_compra_venta` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resumen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `transmision` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_combustible` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kilometraje` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_estatus` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cont_visitas` int(11) NOT NULL,
  `url_facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_twitter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_compra_venta`),
  KEY `id_estatus` (`id_estatus`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `compra_venta`
--

INSERT INTO `compra_venta` (`id_compra_venta`, `titulo`, `resumen`, `descripcion`, `marca`, `modelo`, `transmision`, `tipo_combustible`, `precio`, `kilometraje`, `id_estatus`, `fecha`, `cont_visitas`, `url_facebook`, `url_twitter`) VALUES
(1, 'Prueba Compra/Venta', 'Prueba de resumen compra o venta', 'Prueba de descripcion', 'Ibiza', 2015, 'Estandar', 'Gasolina', '1,000,000', '20,000', 1, '2018-01-27', 1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_por_email`
--

CREATE TABLE IF NOT EXISTS `contacto_por_email` (
  `id_contacto_por_email` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_envio` date NOT NULL,
  PRIMARY KEY (`id_contacto_por_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id_estatus`, `descripcion`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resumen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fecha_alta` date NOT NULL,
  `cont_visitas` int(11) NOT NULL,
  `url_facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_twitter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `titulo`, `resumen`, `descripcion`, `fecha`, `hora`, `fecha_alta`, `cont_visitas`, `url_facebook`, `url_twitter`) VALUES
(1, 'autos time', 'creando prueba 2', 'prueba 2', '2017-05-30', '23:24:00', '2017-05-22', 2, 'Criistiian Retureta', ''),
(2, 'Prueba Evento 1', 'Prueba de mi primer evento', 'Esta es la descripci?n de la prueba ', '2018-01-31', '10:00:00', '2018-01-27', 1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_compra_venta`
--

CREATE TABLE IF NOT EXISTS `foto_compra_venta` (
  `id_foto_compra_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra_venta` int(11) DEFAULT NULL,
  `numero_foto` int(11) DEFAULT NULL,
  `ubicacion_foto` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_foto_compra_venta`),
  KEY `id_compra_venta` (`id_compra_venta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `foto_compra_venta`
--

INSERT INTO `foto_compra_venta` (`id_foto_compra_venta`, `id_compra_venta`, `numero_foto`, `ubicacion_foto`) VALUES
(2, 1, 1, 'images/fEventos/evento1/foto1.jpg'),
(3, 1, 2, 'images/fEventos/evento1/foto2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_evento`
--

CREATE TABLE IF NOT EXISTS `foto_evento` (
  `id_foto_evento` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) DEFAULT NULL,
  `numero_foto` int(11) DEFAULT NULL,
  `ubicacion_foto` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_foto_evento`),
  KEY `id_evento` (`id_evento`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `foto_evento`
--

INSERT INTO `foto_evento` (`id_foto_evento`, `id_evento`, `numero_foto`, `ubicacion_foto`) VALUES
(2, 1, 1, 'images/fEventos/evento1/foto1.jpg'),
(3, 2, 1, 'images/fEventos/evento2/foto1.jpg'),
(4, 2, 2, 'images/fEventos/evento2/foto2.jpg'),
(5, 2, 3, 'images/fEventos/evento2/foto3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_hoy_necesito`
--

CREATE TABLE IF NOT EXISTS `foto_hoy_necesito` (
  `id_foto_hoy_necesito` int(11) NOT NULL AUTO_INCREMENT,
  `id_hoy_necesito` int(11) DEFAULT NULL,
  `numero_foto` int(11) DEFAULT NULL,
  `ubicacion_foto` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_foto_hoy_necesito`),
  KEY `id_hoy_necesito` (`id_hoy_necesito`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `foto_hoy_necesito`
--

INSERT INTO `foto_hoy_necesito` (`id_foto_hoy_necesito`, `id_hoy_necesito`, `numero_foto`, `ubicacion_foto`) VALUES
(2, 1, 1, 'images/fHoyNecesito/hoyNecesito1/foto1.jpg'),
(4, 2, 2, 'images/fHoyNecesito/hoyNecesito2/foto2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_noticia`
--

CREATE TABLE IF NOT EXISTS `foto_noticia` (
  `id_foto_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `id_noticia` int(11) DEFAULT NULL,
  `numero_foto` int(11) DEFAULT NULL,
  `ubicacion_foto` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_foto_noticia`),
  KEY `id_noticia` (`id_noticia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_fotos`
--

CREATE TABLE IF NOT EXISTS `galeria_fotos` (
  `id_galeria_fotos` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ubicacion_foto` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_alta` date DEFAULT NULL,
  PRIMARY KEY (`id_galeria_fotos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `galeria_fotos`
--

INSERT INTO `galeria_fotos` (`id_galeria_fotos`, `titulo`, `descripcion`, `ubicacion_foto`, `fecha_alta`) VALUES
(1, 'Mi J?nior ', 'Este es mi carro', 'images/fGaleriaInicial/foto1.jpg', '2018-01-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_humor`
--

CREATE TABLE IF NOT EXISTS `galeria_humor` (
  `id_humor` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci,
  `ubicacion_foto` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_alta` date DEFAULT NULL,
  PRIMARY KEY (`id_humor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `galeria_humor`
--

INSERT INTO `galeria_humor` (`id_humor`, `titulo`, `descripcion`, `ubicacion_foto`, `fecha_alta`) VALUES
(1, 'Homero', 'Hay prioridades', 'images/fGaleriaHumor/imagen.jpg', '2016-07-13'),
(2, 'Señales', 'Verdadero Significado', 'images/fGaleriaHumor/imagen1.jpg', '2016-07-13'),
(3, 'Prioridad', 'Hay prioridades', 'images/fGaleriaHumor/imagen2.jpg', '2016-07-20'),
(4, 'Ya se sabe', 'Si ya sabe', 'images/fGaleriaHumor/imagen3.jpg', '2016-07-20'),
(5, 'Con amigos', 'Sin presiones', 'images/fGaleriaHumor/imagen4.jpg', '2016-07-20'),
(6, 'Optimus', 'Solo en M', 'images/fGaleriaHumor/imagen5.jpg', '2016-07-20'),
(7, 'Lavame', 'Todos lo hemos hecho', 'images/fGaleriaHumor/imagen6.jpg', '2016-07-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_selfie`
--

CREATE TABLE IF NOT EXISTS `galeria_selfie` (
  `id_selfie` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ubicacion_foto` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_alta` date DEFAULT NULL,
  PRIMARY KEY (`id_selfie`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `galeria_selfie`
--

INSERT INTO `galeria_selfie` (`id_selfie`, `titulo`, `descripcion`, `ubicacion_foto`, `fecha_alta`) VALUES
(8, 'Cristiano ', 'Cool', 'images/fGaleriaSelfies/foto7.jpg', '2016-07-13'),
(7, 'David B.', 'Relax', 'images/fGaleriaSelfies/foto6.jpg', '2016-07-13'),
(6, 'Jason S.', 'El Transportador', 'images/fGaleriaSelfies/foto5.png', '2016-07-13'),
(5, 'Vin & Mich', 'Saga Rapido y Furioso', 'images/fGaleriaSelfies/foto4.jpg', '2016-07-13'),
(4, 'Jordana B.', 'Saga Rapido y Furioso', 'images/fGaleriaSelfies/foto3.jpg', '2016-07-13'),
(3, 'Paul W. ', 'Saga Rapido y Furioso', 'images/fGaleriaSelfies/foto2.jpg', '2016-07-13'),
(2, 'Michelle R', 'Saga Rapido y Furioso', 'images/fGaleriaSelfies/foto1.png', '2016-07-13'),
(1, 'Vin Diesel', 'Saga Rapido y Furioso', 'images/fGaleriaSelfies/foto.jpg', '2016-07-13'),
(9, 'feria band', 'lomejor que se puede vivir', 'images/fGaleriaSelfies/foto8.jpg', '2017-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoy_necesito`
--

CREATE TABLE IF NOT EXISTS `hoy_necesito` (
  `id_hoy_necesito` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resumen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci,
  `fecha` date NOT NULL,
  `cont_visitas` int(11) NOT NULL,
  `url_facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_twitter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_hoy_necesito`),
  KEY `id_hoy_necesito` (`id_hoy_necesito`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `hoy_necesito`
--

INSERT INTO `hoy_necesito` (`id_hoy_necesito`, `titulo`, `resumen`, `descripcion`, `fecha`, `cont_visitas`, `url_facebook`, `url_twitter`) VALUES
(1, 'prueba 3', 'prueba 3', 'awiwis', '2017-05-22', 6, 'Criistiian Retureta', ''),
(2, 'Mec?nico ', 'Servicios de Mec?nico ', 'Soy mec?nico y me pongo a sus ?rdenes ', '2018-01-27', 6, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `resumen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `url_facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_twitter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `cont_visitas` int(11) NOT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `titulo` (`titulo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES
(1, 'Macho Alfa Lomo Plateado'),
(2, 'Dama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario Sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion_foto` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apodo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `nombre` (`nombre`),
  KEY `apodo` (`apodo`),
  KEY `id_estatus` (`id_estatus`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_sexo` (`id_sexo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `id_estatus`, `nombre`, `id_sexo`, `email`, `PASSWORD`, `ubicacion_foto`, `apodo`, `fecha_alta`, `fecha_baja`) VALUES
(1, 1, 1, 'Luis Marin', 1, 'luismarin.glez@gmail.com', '072c0d1ed8e51946a3b7e96e04f752f09a6644de', 'images/fUsuarios/usuario1.jpg', 'RuSSo', '2016-06-23', NULL),
(7, 2, 1, 'cristian', 1, 'returetac64@gmail.com', 'cc8fc1e47c813599966d45c69eacf46f0515ec4e', 'images/fUsuarios/usuario2.jpg', 'retureta', '2017-05-22', NULL),
(8, 2, 1, 'Luis', 1, 'luismarin.glez@gmail.com', '68ec5b8044764dac156864c1fb3f1ee674b83547', 'images/fUsuarios/usuario8.jpg', 'Russo', '2018-01-27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_compra_venta`
--

CREATE TABLE IF NOT EXISTS `usuario_compra_venta` (
  `id_usuario_compra_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_compra_venta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_compra_venta`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_compra_venta` (`id_compra_venta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario_compra_venta`
--

INSERT INTO `usuario_compra_venta` (`id_usuario_compra_venta`, `id_usuario`, `id_compra_venta`) VALUES
(2, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_evento`
--

CREATE TABLE IF NOT EXISTS `usuario_evento` (
  `id_usuario_evento` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_evento`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_evento` (`id_evento`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario_evento`
--

INSERT INTO `usuario_evento` (`id_usuario_evento`, `id_usuario`, `id_evento`) VALUES
(2, 7, 1),
(3, 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_galeria_fotos`
--

CREATE TABLE IF NOT EXISTS `usuario_galeria_fotos` (
  `id_usuario_galeria_fotos` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_galeria_fotos` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_galeria_fotos`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_galeria_fotos` (`id_galeria_fotos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario_galeria_fotos`
--

INSERT INTO `usuario_galeria_fotos` (`id_usuario_galeria_fotos`, `id_usuario`, `id_galeria_fotos`) VALUES
(3, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_hoy_necesito`
--

CREATE TABLE IF NOT EXISTS `usuario_hoy_necesito` (
  `id_usuario_hoy_necesito` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_hoy_necesito` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_hoy_necesito`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_hoy_necesito` (`id_hoy_necesito`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario_hoy_necesito`
--

INSERT INTO `usuario_hoy_necesito` (`id_usuario_hoy_necesito`, `id_usuario`, `id_hoy_necesito`) VALUES
(2, 7, 1),
(3, 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_noticia`
--

CREATE TABLE IF NOT EXISTS `usuario_noticia` (
  `id_usuario_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_noticia`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_noticia` (`id_noticia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_selfie`
--

CREATE TABLE IF NOT EXISTS `usuario_selfie` (
  `id_usuario_selfie` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_selfie` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_selfie`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_selfie` (`id_selfie`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `usuario_selfie`
--

INSERT INTO `usuario_selfie` (`id_usuario_selfie`, `id_usuario`, `id_selfie`) VALUES
(33, 1, 7),
(32, 1, 6),
(31, 1, 5),
(30, 1, 4),
(29, 1, 3),
(28, 1, 2),
(27, 1, 1),
(26, 1, 1),
(34, 7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_votos_galeria_fotos`
--

CREATE TABLE IF NOT EXISTS `usuario_votos_galeria_fotos` (
  `id_usuario_votos_galeria_fotos` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_galeria_fotos` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_votos_galeria_fotos`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_galeria_fotos` (`id_galeria_fotos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario_votos_galeria_fotos`
--

INSERT INTO `usuario_votos_galeria_fotos` (`id_usuario_votos_galeria_fotos`, `id_usuario`, `id_galeria_fotos`) VALUES
(3, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_votos_selfie`
--

CREATE TABLE IF NOT EXISTS `usuario_votos_selfie` (
  `id_usuario_votos_selfie` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_selfie` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_votos_selfie`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_selfie` (`id_selfie`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `usuario_votos_selfie`
--

INSERT INTO `usuario_votos_selfie` (`id_usuario_votos_selfie`, `id_usuario`, `id_selfie`) VALUES
(33, 1, 7),
(32, 1, 6),
(31, 1, 5),
(30, 1, 4),
(29, 1, 3),
(28, 1, 2),
(27, 1, 1),
(26, 1, 1),
(34, 7, 8),
(35, 7, 9),
(36, 8, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
