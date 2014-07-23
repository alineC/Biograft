-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-07-2014 a las 15:49:04
-- Versión del servidor: 5.0.96-community
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `humanke2_biograft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(255) NOT NULL auto_increment,
  `nombre` varchar(255) default NULL,
  `orden` int(255) default NULL,
  `color` varchar(255) default NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `orden`, `color`, `fecha`) VALUES
(1, 'BioSponge', 1, 'cat_azul', '2014-07-18 22:32:37'),
(2, 'BioDBM', 2, 'cat_azul', '2014-07-18 23:33:01'),
(3, 'Hueso Esponjoso', 3, 'cat_morado', '2014-07-19 15:28:34'),
(4, 'CuÃ±a Ã“sea', 4, 'cat_azul', '2014-07-18 23:32:35'),
(5, 'Bloques y Tiras', 5, 'cat_azul', '2014-07-18 23:32:17'),
(6, 'DiÃ¡fisis y HemidiÃ¡fisis', 6, 'cat_azul', '2014-07-18 23:31:58'),
(7, 'Cabeza Femoral sin cartÃ­lago', 7, 'cat_azul', '2014-07-18 23:31:31'),
(8, 'Tendones', 8, 'cat_azul', '2014-07-19 22:50:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cproductos`
--

CREATE TABLE IF NOT EXISTS `cproductos` (
  `id` int(255) NOT NULL auto_increment,
  `producto_id` int(255) default NULL,
  `cproducto` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cproductos`
--

INSERT INTO `cproductos` (`id`, `producto_id`, `cproducto`) VALUES
(1, 1, '00001'),
(2, 1, '00002'),
(3, 1, '00003'),
(4, 1, '00005'),
(5, 1, '00006'),
(6, 2, '00001'),
(7, 2, '00003'),
(8, 2, '00005');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargas`
--

CREATE TABLE IF NOT EXISTS `descargas` (
  `id` int(255) NOT NULL auto_increment,
  `imagen` varchar(255) default NULL,
  `archivo` varchar(255) default NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `descargas`
--

INSERT INTO `descargas` (`id`, `imagen`, `archivo`, `fecha`) VALUES
(10, 'descargas_img/a62c9d_Biograft-Estudio.png', 'descargas_file/a62c9d_Biograft-Estudio.pdf', '2014-07-15 19:48:37'),
(11, 'descargas_img/194b09_Catalogo-Biograft-Dental.png', 'descargas_file/194b09_Catalogo-Biograft-Dental.pdf', '2014-07-15 19:49:31'),
(12, 'descargas_img/8a2a81_Catalogo-Biograft-BioDBM.png', 'descargas_file/8a2a81_Catalogo-Biograft-BioDBM.pdf', '2014-07-15 19:49:43'),
(13, 'descargas_img/d0589c_Catalogo-Biograft-BioSponge.png', 'descargas_file/d0589c_Catalogo-Biograft-BioSponge.pdf', '2014-07-15 19:49:56'),
(14, 'descargas_img/6fa21c_Catalogo-Biograft.png', 'descargas_file/6fa21c_Catalogo-Biograft.pdf', '2014-07-15 19:50:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(255) NOT NULL auto_increment,
  `titulo` varchar(500) default NULL,
  `subtitulo` varchar(500) default NULL,
  `cuerpo` text,
  `foto` varchar(500) default NULL,
  `pdf` text,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `subtitulo`, `cuerpo`, `foto`, `pdf`, `fecha`) VALUES
(5, 'Aqui agrego noticia', '<p>Lorem ipsum dolor sit amet, consectetur</p>', '<p>Curabitur ac nisl eros. Maecenas ut nulla a leo malesuada mattis. Curabitur iaculis bibendum consequat. Donec sapien justo, scelerisque in elementum nec, porta eget nunc. Nulla vulputate tristique massa sit amet porta. Phasellus vel ipsum non sapien semper dictum. Mauris dictum convallis blandit. Aliquam laoreet sem sem, vitae suscipit urna facilisis aliquet. Ut at arcu tempor, tempor dui at, pulvinar nisi. Donec ut ullamcorper libero. Nullam a risus semper, dictum mauris nec, scelerisque orci. Nullam gravida vitae neque at ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam et dapibus eros.</p>', 'noticias_img/f83707_enlace_eventos_fotoGrande_muestra.jpg', NULL, '2014-07-12 04:46:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(255) NOT NULL auto_increment,
  `categoria` int(1) NOT NULL,
  `nombre` varchar(255) character set utf8 default NULL,
  `foto` varchar(255) default NULL,
  `registro` varchar(255) default NULL,
  `descripcion` text,
  `aplicaciones` text,
  `cproducto` text,
  `activo` int(200) default NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `nombre`, `foto`, `registro`, `descripcion`, `aplicaciones`, `cproducto`, `activo`, `fecha`) VALUES
(5, 1, 'BioSponge', 'productos_img/643a62_001-biograft-biosponge.png', '0956C2013SSA', '<ul>\r\n<li><strong>BioSponge&reg;</strong> implante innovador que se comprime como una esponja hasta en 1/3 de su tama&ntilde;o.</li>\r\n<li>Gracias a su capacidad de memoria pl&aacute;stica regresa a su forma original sin comprometer su estructura; no se rasga, no se rompe.</li>\r\n<li><strong>BioSponge&reg;</strong> tiene potencial osteoinductor; se procesa utilizando m&eacute;todos que permiten la preservaci&oacute;n de las prote&iacute;nas &oacute;seas morfogen&eacute;ticas; encargadas de inducir a las c&eacute;lulas mesenquimales a diferenciarse en c&eacute;lulas &oacute;seas.</li>\r\n<li>Tiene capacidad osteoconductora; su estructura trabecular le permite actuar como un andamiaje o como una estructura que cuenta con una porosidad interconectada capaz de apoyar a la neovascularizaci&oacute;n, la formaci&oacute;n de la unidad osteoide<br />y el desarrollo de nuevo hueso.</li>\r\n<li><strong>BioSponge&reg;</strong> es un implante derivado de tejido &oacute;seo humano,<br />es est&eacute;ril y est&aacute; libre de pir&oacute;genos. Se obtiene a partir del procesamiento de tejido &oacute;seo cadav&eacute;rico que ha sido tratado con una sustancia &aacute;cida desmineralizante que genera un material compresible.</li>\r\n<li>Es un producto liofilizado que puede almacenarse a temperatura ambiente por un periodo prolongado aguardando su requerimiento quir&uacute;rgico.</li>\r\n</ul>', '<p><span lang="ES-TRAD"><strong>BioSponge&reg;</strong> est&aacute; indicado como una ayuda en procedimientos quir&uacute;rgicos<span style="mso-spacerun: yes;"><br /></span>del &aacute;rea dental, ortopedia, traumatolog&iacute;a, neurolog&iacute;a, maxilofacial, dental, como<br />en los siguientes procedimientos:</span></p>\r\n<ul>\r\n<li><span lang="ES-TRAD">En la reconstrucci&oacute;n de defectos mandibulares o perdidas de tejido &oacute;seo en mand&iacute;bula o maxilar.</span></li>\r\n<li><span lang="ES-TRAD">Relleno de cavidades producidas por osteomielitis, tumores.</span></li>\r\n<li><span lang="ES-TRAD">En defectos de tibia, f&eacute;mur y cadera en pr&oacute;tesis de revisi&oacute;n.</span></li>\r\n<li><span lang="ES-TRAD">Relleno en defectos de pr&oacute;tesis primarias.</span></li>\r\n<li><span lang="ES-TRAD">Artrodesis de columna cervical, lumbar, tor&aacute;cica.</span></li>\r\n<li><span lang="ES-TRAD">Relleno de cajas cervicales.</span></li>\r\n<li><span lang="ES-TRAD">Relleno de cajas lumbares.</span></li>\r\n<li><span lang="ES-TRAD">Seudoartrosis de cualquier hueso.</span></li>\r\n<li><span lang="ES-TRAD">Consolidaci&oacute;n viciosa y osteotom&iacute;as correctivas.</span></li>\r\n<li><span lang="ES-TRAD">Artrodesis de mu&ntilde;eca, hombro, codo, cadera, rodilla, tobillo, metatarsianos, metacarpianos, falanges de los dedos de la mano<br />y pies.</span></li>\r\n<li><span lang="ES-TRAD">Relleno de defectos de fracturas.</span></li>\r\n<li><span lang="ES-TRAD">Relleno de fracturas de los cuerpos vertebrales cervicales, tor&aacute;cicas y lumbares.</span></li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16100510- Bloque de hueso desmineralizado &gt;&nbsp;10 x &gt;&nbsp;10 mm</li>\r\n<li>16100515- Bloque de hueso desmineralizado &gt;&nbsp;15 x &gt;&nbsp;15 mm</li>\r\n<li>16100501- Bloque de hueso desmineralizado &gt;&nbsp;10 x &gt;&nbsp;25 mm</li>\r\n</ul>', 1, '2014-07-15 18:44:56'),
(6, 2, 'MatrÃ­z Ã“sea Desmineralizada', 'productos_img/226468_002-biograft-biodbm.png', '1607C2011', '<ul>\r\n<li><strong>BioDBM&reg;</strong> es una matriz &oacute;sea desmineralizada obtenida de hueso cortical humano con Potencial Osteoinductivo.</li>\r\n<li><strong>BioDBM&reg;</strong> es un producto seguro, preparado mediante un proceso as&eacute;ptico con esterilizaci&oacute;n terminal y es presentado&nbsp; como polvo liofilizado en un contenedor para su f&aacute;cil preparaci&oacute;n. Esta presentaci&oacute;n permite que pueda ser preparado en gel o masilla (putty) de acuerdo<br />a las necesidades&nbsp; del cirujano, inclusive en el mismo evento quir&uacute;rgico.</li>\r\n<li><strong>BioDBM&reg;</strong> tiene una caducidad de 36 meses y se conserva a temperatura ambiente (16 a 37&deg;C).</li>\r\n</ul>', '<p>El <strong>BioDBM&reg;</strong> est&aacute; indicado como una&nbsp; ayuda en procedimientos quir&uacute;rgicos<br />del &aacute;rea dental, ortopedia, traumatolog&iacute;a, neurolog&iacute;a, maxilofacial, dental, como<br />en los siguientes procedimientos:</p>\r\n<ul>\r\n<li>En tratamiento de tumores &oacute;seos que provocan defectos en los huesos o cavidades que requieran su relleno.</li>\r\n<li>En tratamientos de fracturas que provocan perdida de tejido &oacute;seo debido al traumatismo que la provoco.</li>\r\n<li>En la reconstrucci&oacute;n de defectos mandibulares o perdidas de tejido &oacute;seo en mand&iacute;bula o maxilar.</li>\r\n<li>En los defectos alveolares en maxilares o mand&iacute;bula que requiera un apoyo mayor de tejido &oacute;seo.</li>\r\n<li>En el tratamiento de defectos de cr&aacute;neo posterior a traumatismo<br />y perdida de tejido &oacute;seo.</li>\r\n<li>Como complemento a las<br />cirug&iacute;as de columna en las instrumentaciones posteriores<br />o anteriores y que se busca<br />artrodesar esos segmentos.</li>\r\n</ul>', '<ul>\r\n<li>16100650- Matriz &Oacute;sea Desmineralizada 0.5cc</li>\r\n<li>16100601- Matriz &Oacute;sea Desmineralizada 1cc</li>\r\n<li>16100602- Matriz &Oacute;sea Desmineralizada 2cc&nbsp;&nbsp;&nbsp;</li>\r\n<li>16100600- Matriz &Oacute;sea Desmineralizada 2.5cc&nbsp;&nbsp;&nbsp;</li>\r\n<li>16100603- Matriz &Oacute;sea Desmineralizada 3cc&nbsp;&nbsp;&nbsp;</li>\r\n<li>16100605- Matriz &Oacute;sea Desmineralizada 5cc&nbsp;&nbsp;&nbsp;</li>\r\n<li>16100610- Matriz &Oacute;sea Desmineralizada 10cc&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:45:52'),
(7, 3, 'Chip Granulado Esponjoso', 'productos_img/941515_003-biograft-chipgranulado.png', '1374C2005 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Constituido en un 70% de sales inorg&aacute;nicas y en un 30% de matriz org&aacute;nica. La parte org&aacute;nica est&aacute; conformada en m&aacute;s de 90% por fibras de col&aacute;geno, que se agrupan en forma especializada para originar la matriz &oacute;sea. La parte inorg&aacute;nica est&aacute; formada por cristales de calcio y f&oacute;sforo conocidos como hidroxiapatita (HTA).</li>\r\n<li>Esterilizado mediante radiaci&oacute;n Gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso Clearant&reg;.</li>\r\n<li>Hueso esponjoso con un tama&ntilde;o de part&iacute;cula<br />de 1 a 4 mm.</li>\r\n<li>Producto Liofilizado con una caducidad de 48 meses y que<br />puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li><span lang="ES-TRAD">Indicado para relleno de defectos &oacute;seos y cavidades &oacute;seas en procedimientos quir&uacute;rgicos en el &aacute;rea de traumatolog&iacute;a y ortopedia. <br /></span></li>\r\n<li><span lang="ES-TRAD">Tumores.</span></li>\r\n<li><span lang="ES-TRAD">Quistes.</span></li>\r\n<li><span lang="ES-TRAD">Cirug&iacute;a de columna.</span></li>\r\n<li><span lang="ES-TRAD">Retardo de consolidaci&oacute;n.</span></li>\r\n<li><span lang="ES-TRAD">Pseudoartrosis.</span></li>\r\n</ul>', '<ul>\r\n<li>16100010- Granulado de Esponjoso ( &lt;4 mm) 10cc</li>\r\n<li>16100015- Granulado de Esponjoso ( &lt;4 mm) 15cc</li>\r\n<li>16100030- Granulado de Esponjoso ( &lt;4 mm) 30cc</li>\r\n<li>16100060- Granulado de Esponjoso ( &lt;4 mm) 60cc</li>\r\n<li>16100090- Granulado de Esponjoso ( &lt;4 mm) 90cc</li>\r\n</ul>', 1, '2014-07-15 18:46:23'),
(8, 3, 'Chip Cubos de Esponjosa', 'productos_img/5e81b7_004-biograft-chipcubos.png', '1374C2005 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, productos est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Constituido en un 70% de sales inorg&aacute;nicas y en un 30% de matriz org&aacute;nica. La parte org&aacute;nica est&aacute; conformada en m&aacute;s de 90% por fibras de col&aacute;geno, que se agrupan en forma especializada para originar la matriz &oacute;sea. La parte inorg&aacute;nica est&aacute; formada por cristales de calcio y f&oacute;sforo conocidos como hidroxiapatita (HTA).</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso Clearant&reg;.</li>\r\n<li>Hueso esponjoso con un tama&ntilde;o<br />de part&iacute;cula de 4 a 6 mmm.</li>\r\n<li>Producto Liofilizado con una caducidad de 48 meses<br />y que puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li>Indicado para relleno de defectos &oacute;seos y cavidades &oacute;seas en procedimientos quir&uacute;rgicos en el &aacute;rea de traumatolog&iacute;a y ortopedia.</li>\r\n<li>Tumores.</li>\r\n<li>Quistes.</li>\r\n<li>Cirug&iacute;a de columna.</li>\r\n<li>Retardo de consolidaci&oacute;n.</li>\r\n<li>Pseudoartrosis.</li>\r\n</ul>', '<ul>\r\n<li>16100205- Chips cubos de esponjoso (4-6 mm) 5cc</li>\r\n<li>16100210- Chips cubos de esponjoso (4-6 mm) 10cc&nbsp;&nbsp;&nbsp;</li>\r\n<li>16100215- Chips cubos de esponjoso (4-6 mm) 15cc</li>\r\n<li>16100230- Chips cubos de esponjoso (4-6 mm) 30cc</li>\r\n<li>16100260- Chips cubos de esponjoso (4-6 mm) 60cc&nbsp;&nbsp;&nbsp;</li>\r\n<li>16100290- Chips cubos de esponjoso (4-6 mm) 90cc&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:46:54'),
(9, 3, 'Polvo de Hueso', 'productos_img/0d0783_005-biograft-polvohueso.png', '1374C2005 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, productos est&eacute;ril.</li>\r\n<li>Constituido en un 70% de sales inorg&aacute;nicas y en un 30% de matriz org&aacute;nica. La parte org&aacute;nica est&aacute; conformada en m&aacute;s de 90% por fibras de col&aacute;geno, que se agrupan en forma especializada para originar la matriz &oacute;sea. La parte inorg&aacute;nica est&aacute; formada por cristales de calcio y f&oacute;sforo conocidos como hidroxiapatita (HTA).</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso <strong>Clearant&reg;</strong>.</li>\r\n<li>Hueso en polvo con un tama&ntilde;o<br />de part&iacute;cula de 500 a 800 um.</li>\r\n<li>Producto liofilizado con una caducidad de 24 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li>Indicado para relleno de defectos &oacute;seos y cavidades &oacute;seas en procedimientos quir&uacute;rgicos del &aacute;rea dental y maxilofacial.</li>\r\n</ul>', '<ul>\r\n<li>16140300- Hueso en polvo cortical 1cc (0.5/0.5)</li>\r\n</ul>', 1, '2014-07-15 18:47:21'),
(10, 3, 'Bloque Esponjoso', 'productos_img/a4452a_006-biograft-bloquesponjoso.png', '1374C2005 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, productos est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Constituido en un 70% de sales inorg&aacute;nicas y en un 30% de matriz org&aacute;nica. La parte org&aacute;nica est&aacute; conformada en m&aacute;s de 90% por fibras de col&aacute;geno, que se agrupan en forma especializada para originar la matriz &oacute;sea. La parte inorg&aacute;nica est&aacute; formada por cristales de calcio y f&oacute;sforo conocidos como hidroxiapatita (HTA).</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso <strong>Clearant&reg;</strong>.</li>\r\n<li>Bloque &oacute;seo conformado por hueso trabecular obtenido generalmente de las ep&iacute;fisis de huesos largos: femur, h&uacute;mero, tibia.</li>\r\n<li>Producto liofilizado con una caducidad de 48 meses y que<br />puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li>Indicado para relleno de defectos &oacute;seos y cavidades &oacute;seas en procedimientos quir&uacute;rgicos en el &aacute;rea de traumatolog&iacute;a y ortopedia.</li>\r\n<li>Tumores.</li>\r\n<li>Quistes.</li>\r\n<li>Retardo de consolidaci&oacute;n.</li>\r\n<li>Pseudoartrosis.</li>\r\n</ul>', '<ul>\r\n<li>16260130- Bloque de esponjoso 13-17 mm x 13-17 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16260230- Bloque de esponjoso &gt;18-22 mm x &gt;18-22 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16260330- Bloque de esponjoso &gt;23-27 mm x &gt;23-27 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16260399- Bloque de esponjoso &gt;&nbsp;24mm</li>\r\n</ul>', 1, '2014-07-15 18:47:57'),
(11, 4, 'CuÃ±as Ã“seas', 'productos_img/4b3633_007-biograft-cunasoseas.png', '1297C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, productos est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso <strong>Clearant&reg;</strong>.</li>\r\n<li>Hueso cortical obtenido a partir<br />de la di&aacute;fisis de hueso de femur, peron&eacute;, radio y c&uacute;bito.</li>\r\n<li>Producto liofilizado con una caducidad de 48 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li>Cirug&iacute;a de columna.</li>\r\n<li>Elongaciones.</li>\r\n</ul>', '<ul>\r\n<li>16631012- Cu&ntilde;a femoral 12 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16631014- Cu&ntilde;a femoral 14 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16631015- Cu&ntilde;a femoral 15 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16631016- Cu&ntilde;a femoral 16 mm</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>16661106- Cu&ntilde;a peron&eacute; 5.5 - 6.4 mm</li>\r\n<li>16661107- Cu&ntilde;a peron&eacute; 6.5 - 7.4 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16661108- Cu&ntilde;a peron&eacute; 7.5 - 8.4 mm</li>\r\n<li>16661109- Cu&ntilde;a peron&eacute; 8.5 - 9.4 mm</li>\r\n<li>16661110- Cu&ntilde;a peron&eacute; 9.5 - 10.4 mm</li>\r\n<li>16661111- Cu&ntilde;a peron&eacute; 10.5-12.0 mm&nbsp;&nbsp;&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>16751006- Cu&ntilde;a radial 6 mm</li>\r\n<li>16751008- Cu&ntilde;a radial 8 mm</li>\r\n<li>16751010- Cu&ntilde;a radial 10 mm</li>\r\n<li>16751012- Cu&ntilde;a radial 12 mm</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>16791006- Cu&ntilde;a de c&uacute;bito 6 mm</li>\r\n<li>16791008- Cu&ntilde;a de c&uacute;bito 8 mm</li>\r\n<li>16791010- Cu&ntilde;a de c&uacute;bito 10 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16791012- Cu&ntilde;a de c&uacute;bito 12 mm</li>\r\n</ul>', 1, '2014-07-15 19:01:34'),
(12, 5, 'Bloque de Iliaco Tricortical', 'productos_img/79f6c0_008-biograft-bloque-iliaco-tricortical.png', '0196C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Constituido en su mayor parte por sustancia &oacute;sea, con matriz de hueso esponjoso y superficie de hueso cortical proveniente de la cresta iliaca.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso <strong>Clearant&reg;</strong>.</li>\r\n<li>Producto liofilizado con una caducidad de 48 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li>Indicado para relleno de defectos y cavidades &oacute;seas en procedimientos quir&uacute;rgicos, en traumatolog&iacute;a, ortopedia y cirug&iacute;a maxilofacial.</li>\r\n<li>Espaciador para cuerpo vertebral.</li>\r\n<li>Adelantamiento patelar.</li>\r\n<li>Reconstrucci&oacute;n de meseta tibial.</li>\r\n<li>Fracturas por colapso.</li>\r\n<li>Osteotom&iacute;a p&eacute;lvica.</li>\r\n</ul>', '<ul>\r\n<li>16310101- Bloque iliaco tricortical 7-10 x &gt;15 x &ge;8mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16310102- Bloque iliaco tricortical &gt;&nbsp;11-16 x &gt;15x &ge;8mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16310103- Bloque iliaco tricortical &gt;&nbsp;17-20 x &gt;15x &ge;8mm&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:49:34'),
(13, 5, 'Tira de Iliaco Tricortical', 'productos_img/f619ae_009-biograft-tira-iliaco-tricortical.png', '1359C2005 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Constituido en su mayor parte por sustancia &oacute;sea, con matriz de hueso esponjoso y superficie de hueso cortical proveniente de la cresta iliaca.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso <strong>Clearant&reg;</strong>.</li>\r\n<li>Producto liofilizado con una caducidad de 36 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li>Indicado para relleno de defectos y cavidades &oacute;seas en procedimientos quir&uacute;rgicos, en traumatolog&iacute;a y ortopedia.</li>\r\n<li>Espaciador para cuerpo vertebral.</li>\r\n<li>Adelantamiento patelar.</li>\r\n<li>Reconstrucci&oacute;n de meseta tibial.</li>\r\n<li>Fracturas por colapso.</li>\r\n<li>Osteotom&iacute;a p&eacute;lvica.</li>\r\n</ul>', '<ul>\r\n<li>16330030- Tira iliaco tricortical 28 - 45 x &ge;24 x &gt;8mm&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:50:03'),
(14, 5, 'Tira de Iliaco Bicortical', 'productos_img/83da35_010-biograft-tira-iliaco-bicortical.png', '1359C2005 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Constituido en su mayor parte por sustancia &oacute;sea, con matriz de hueso esponjoso y superficie de hueso cortical proveniente de la cresta iliaca.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso <strong>Clearant&reg;</strong>.</li>\r\n<li>Producto liofilizado con una caducidad de 36 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li>Indicado para relleno de defectos y cavidades &oacute;seas en procedimientos quir&uacute;rgicos, en traumatolog&iacute;a y Ortopedia.</li>\r\n<li>Adelantamiento patelar.</li>\r\n<li>Reconstrucci&oacute;n de meseta tibial.</li>\r\n<li>Fracturas por colapso.</li>\r\n<li>Osteotom&iacute;a p&eacute;lvica.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16320101- Tira Iliaco bicortical 8 - 15 x &ge;15 x &ge; 10mm</li>\r\n<li>16320102- Tira Iliaco bicortical &ge;16 - 25 x &ge; 15 x &ge; 10mm</li>\r\n<li>16320103- Tira Iliaco bicortical &ge; 25 x &ge;15 x &ge; 10mm</li>\r\n</ul>', 1, '2014-07-15 18:50:27'),
(15, 5, 'Tira Barra Cortical', 'productos_img/c41616_011-biograft-tira-barra-cortical.png', '1359C2005 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Obtenido principalmente de la zona diafisiaria del hueso tibial.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso <strong>Clearant&reg;</strong>.</li>\r\n<li>Producto liofilizado con una caducidad de 36 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li>Indicado para relleno de defectos y cavidades &oacute;seas en procedimientos quir&uacute;rgicos, en traumatolog&iacute;a y Ortopedia.</li>\r\n<li>Reconstrucci&oacute;n de fracturas por perdida de sustancia &oacute;sea.</li>\r\n<li>Cirug&iacute;a revisi&oacute;n de cadera.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16272210- Tira (barra) cortical 90-110L x 9-11W&nbsp; mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16272215- Tira (barra) cortical &ge;111-160L x 9-11W mm</li>\r\n<li>16272220- Tira (barra) cortical &ge;161-220L x 9-11W&nbsp; mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16272410- Tira (barra) cortical 90-110L x 14-16W mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16272415- Tira (barra) cortical &ge;111-160L x 14-16W mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16272420- Tira (barra) cortical &ge;161-220L x 14-16W mm</li>\r\n<li>16272610- Tira (barra) cortical 90-110L x 18-20W mm</li>\r\n<li>16272615- Tira (barra) cortical &ge;111-160L x 18-20W mm</li>\r\n<li>16272620- Tira (barra) cortical &ge;161-220L x 18-20W mm</li>\r\n</ul>', 1, '2014-07-15 18:50:44'),
(16, 6, 'DiÃ¡fisis Femoral', 'productos_img/9af6e2_012-biograft-diafisis-femoral.png', '0888C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Obtenido de la zona diafisiaria del hueso femoral.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso <strong>Clearant&reg;</strong>.</li>\r\n<li>Producto con una longitud hasta 113 mm: Producto liofilizado con una caducidad de 48 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n<li>Producto con una longitud superior a 113mm: Producto congelado con una caducidad de 48 meses.</li>\r\n<li>Contactar a la empresa con el fin de obtener informaci&oacute;n sobre su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>Reconstrucci&oacute;n de fracturas por perdida de sustancia &oacute;sea.</li>\r\n<li>Tumores: Perdida masiva de tejido.</li>\r\n<li>Clavo centromedular.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16631040- Di&aacute;fisis femoral 38-42 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16631050- Di&aacute;fisis femoral 48-52 mm</li>\r\n<li>16631060- Di&aacute;fisis femoral 58-62 mm</li>\r\n<li>16631070- Di&aacute;fisis femoral 68-77 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16631080- Di&aacute;fisis femoral 78-87 mm</li>\r\n<li>16631090- Di&aacute;fisis femoral 88-97 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16632010- Di&aacute;fisis femoral 98-102 mm</li>\r\n<li>16632012- Di&aacute;fisis femoral 103-113 mm</li>\r\n<li>16632014- Di&aacute;fisis femoral 114-147 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16632015- Di&aacute;fisis femoral 148-152 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16632016- Di&aacute;fisis femoral 153-197 mm</li>\r\n<li>16632020- Di&aacute;fisis femoral 198-202 mm</li>\r\n</ul>', 1, '2014-07-15 18:51:01'),
(17, 6, 'HemidiÃ¡fisis Femoral', 'productos_img/a5b3b2_013-biograft-hemidiafisis-femoral.png', '0888C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Obtenido de la zona diafisiaria del hueso femoral.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el Proceso Clearant&reg;.</li>\r\n<li>Producto con una longitud hasta 120mm: Producto liofilizado con una caducidad de 48 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n<li>Producto con una longitud superior a 120mm: Producto congelado con una caducidad de 48 meses.</li>\r\n<li>Contactar a la empresa con el fin<br />de obtener informaci&oacute;n sobre su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>Reconstrucci&oacute;n de fracturas por perdida de sustancia &oacute;sea</li>\r\n<li>Cirug&iacute;a de revisi&oacute;n.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16632110- Hemidi&aacute;fisis med/lat 98-102 mm</li>\r\n<li>16632113- Hemidi&aacute;fisis med/lat 103-147 mm</li>\r\n<li>16632115- Hemidi&aacute;fisis med/lat 148-152 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16632118- Hemidi&aacute;fisis med/lat 153-197 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16632120- Hemidi&aacute;fisis med/lat 198-202 mm&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:51:53'),
(18, 6, 'DiÃ¡fisis Tibial', 'productos_img/d0dd65_014-biograft-diafisis-tibial.png', '0888C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.<br />Obtenido de la zona diafisiaria del hueso de la tibia.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el <strong>Proceso Clearant&reg;</strong>.</li>\r\n<li>Producto con una longitud hasta 113 mm: Producto liofilizado con una caducidad de 48 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n<li>Producto con una longitud superior a 1113 mm: Producto congelado con una caducidad de 48 meses.</li>\r\n<li>Contactar a la empresa con el fin de obtener informaci&oacute;n sobre su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>Reconstrucci&oacute;n de fracturas por perdida de sustancia &oacute;sea.</li>\r\n<li>Tumores: perdida masiva de tejido.</li>\r\n<li>Clavo centromedular.</li>\r\n</ul>', '<ul>\r\n<li>16781040- Di&aacute;fisis tibial 38-42 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16781050- Di&aacute;fisis tibial 48-52 mm</li>\r\n<li>16781060- Di&aacute;fisis tibial 58-62 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16781070- Di&aacute;fisis tibial 68-77 mm</li>\r\n<li>16781080- Di&aacute;fisis tibial 78-87 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16781090- Di&aacute;fisis tibial 88-97 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16782010- Di&aacute;fisis tibial 98-102 mm</li>\r\n<li>16782012- Di&aacute;fisis tibial 103-113 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16782015- Di&aacute;fisis tibial 148-152 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16782017- Di&aacute;fisis tibial 153-197 mm&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:51:25'),
(19, 6, 'DiÃ¡fisis Humeral', 'productos_img/02a008_015-biograft-diafisis-humeral.png', '0888C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.<br />Obtenido de la zona diafisiaria del hueso humeral.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el <strong>Proceso Clearant&reg;</strong>.</li>\r\n<li>Producto con una longitud hasta 120mm: Producto liofilizado con una caducidad de 48 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n<li>Producto con una longitud superior a 120mm: Producto congelado con una caducidad de 48 meses.</li>\r\n<li>Contactar a la empresa con el fin de<br />obtener informaci&oacute;n sobre su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>Reconstrucci&oacute;n de fracturas por perdida de sustancia &oacute;sea</li>\r\n<li>Tumores: perdida masiva de tejido.</li>\r\n<li>Cirug&iacute;a de revisi&oacute;n.</li>\r\n<li>Clavo centromedular.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16691060- Di&aacute;fisis humeral 58-62 mm</li>\r\n<li>16691070- Di&aacute;fisis humeral 68-77 mm</li>\r\n<li>16691080- Di&aacute;fisis humeral 78-87 mm</li>\r\n<li>16691090- Di&aacute;fisis humeral 88-97 mm</li>\r\n<li>16692010- Di&aacute;fisis humeral 98-147 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16692015- Di&aacute;fisis humeral &gt;148 mm&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:52:11'),
(20, 6, 'DiÃ¡fisis de PeronÃ©', 'productos_img/11b9ba_016-biograft-diafisis-perone.png', '0888C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Obtenido de la zona diafisiaria del hueso de peron&eacute;.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el <strong>Proceso Clearant&reg;</strong>.</li>\r\n<li>Producto con una longitud hasta 120mm: Producto liofilizado con una caducidad de 48 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n<li>Producto con una longitud superior a 120mm: Producto congelado con una caducidad de 48 meses.</li>\r\n<li>Contactar a la empresa con el fin</li>\r\n<li>de obtener informaci&oacute;n sobre su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>Reconstrucci&oacute;n de fracturas por perdida de sustancia &oacute;sea</li>\r\n<li>Cirug&iacute;a columna: corperectomia.</li>\r\n<li>Tumores: perdida masiva de tejido.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16661030- Di&aacute;fisis peron&eacute; 28-32 mm</li>\r\n<li>16661040- Di&aacute;fisis peron&eacute; 38-42 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16661045- Di&aacute;fisis peron&eacute; 43-47 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16661050- Di&aacute;fisis peron&eacute; 48-52 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16661060- Di&aacute;fisis peron&eacute; 58-62 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16661070- Di&aacute;fisis peron&eacute; 63-77 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16661080- Di&aacute;fisis peron&eacute; 78-82 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16661090- Di&aacute;fisis peron&eacute; 83-97 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16662010- Di&aacute;fisis peron&eacute; 98-105 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16662012- Di&aacute;fisis peron&eacute; 106-120 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16662014- Di&aacute;fisis peron&eacute; 121-147 mm&nbsp;&nbsp; &nbsp;</li>\r\n<li>16662015- Di&aacute;fisis peron&eacute; 148-155 mm</li>\r\n</ul>', 1, '2014-07-15 18:52:29'),
(21, 6, 'DiÃ¡fisis Radial', 'productos_img/5b0ef8_017-biograft-diafisis-radial.png', '0888C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Obtenido de la zona diafisiaria del hueso del radio.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de<br />50 kg y mediante el <strong>Proceso Clearant&reg;</strong>.</li>\r\n<li>Producto con una longitud hasta 120mm: Producto liofilizado con una caducidad de 48 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n<li>Producto con una longitud superior a 120mm: Producto congelado con una caducidad de 48 meses.</li>\r\n<li>Contactar a la empresa con el fin<br />de obtener informaci&oacute;n sobre su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>Reconstrucci&oacute;n de fracturas por perdida de sustancia &oacute;sea.</li>\r\n<li>Cirug&iacute;a columna: corperectomia.</li>\r\n<li>Tumores: perdida masiva de tejido.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16751060- Di&aacute;fisis radial 58-62 mm</li>\r\n<li>16751070- Di&aacute;fisis radial 68-77 mm</li>\r\n<li>16751080- Di&aacute;fisis radial 78-87 mm</li>\r\n<li>16751090- Di&aacute;fisis radial 88-97 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16752010- Di&aacute;fisis radial 98-147 mm</li>\r\n</ul>', 1, '2014-07-15 18:52:42'),
(22, 6, 'DiÃ¡fisis de CÃºbito', 'productos_img/ffa0b3_018-biograft-diafisis-cubito.png', '0888C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Obtenido de la zona diafisiaria del hueso del c&uacute;bito.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de 50 kg y mediante el <strong>Proceso Clearant&reg;</strong>.</li>\r\n<li>Producto con una longitud hasta 120mm: Producto liofilizado con una caducidad de 48 meses y que puede ser almacenado a temperatura ambiente.</li>\r\n<li>Producto con una longitud superior a 120mm: Producto congelado con una caducidad de 48 meses.</li>\r\n<li>Contactar a la empresa con el fin<br />de obtener informaci&oacute;n sobre su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>Reconstrucci&oacute;n de fracturas por perdida de sustancia &oacute;sea</li>\r\n<li>Cirug&iacute;a columna: corperectomia.</li>\r\n<li>Tumores: perdida masiva de tejido.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16791060- Di&aacute;fisis de c&uacute;bito 58-62 mm</li>\r\n<li>16791070- Di&aacute;fisis de c&uacute;bito 68-77 mm</li>\r\n<li>16791080- Di&aacute;fisis de c&uacute;bito 78-87 mm</li>\r\n<li>16791090- Di&aacute;fisis de c&uacute;bito 88-97 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16792010- Di&aacute;fisis de c&uacute;bito 98-147 mm</li>\r\n<li>16792015- Di&aacute;fisis de c&uacute;bito &gt;147 mm</li>\r\n</ul>', 1, '2014-07-15 18:52:54'),
(23, 7, 'Cabeza Femoral sin cartÃ­lago', 'productos_img/78dedc_019-biograft-cabeza-femoral-sincartilago.png', '0067C2006 SSA', '<ul>\r\n<li>Implante osteoconductor derivado de tejido &oacute;seo humano, clase III, producto est&eacute;ril, libre de pir&oacute;genos.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de<br />50 kg y mediante el <strong>Proceso Clearant&reg;</strong>.</li>\r\n<li>Constituido en su mayor parte por sustancia &oacute;sea, con matriz de hueso esponjoso y superficie de hueso cortical proveniente de la cabeza femoral.</li>\r\n<li>Producto congelado con una caducidad de 36 meses.</li>\r\n<li>Contactar a la empresa con el fin<br />de obtener informaci&oacute;n sobre su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>Revisi&oacute;n de cadera.</li>\r\n</ul>', '<ul>\r\n<li>16620100- Cabeza femoral sin cart&iacute;lago&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:53:10'),
(24, 8, 'TendÃ³n Procesado Biograft', 'productos_img/cab38c_020-biograft-tendon-procesado.png', '0746C2007 SSA', '<ul>\r\n<li>El tend&oacute;n procesado <strong>Biograft&reg;</strong> es un dispositivo m&eacute;dico, clase III, derivados de tejido tendinoso humano, es est&eacute;ril y libre de pir&oacute;genos.</li>\r\n<li>Compuesto por 90% de col&aacute;geno<br />y 10% de Elastina.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de<br />50 kg y mediante el <strong>Proceso Clearant&reg;.</strong></li>\r\n<li>Producto congelado con una caducidad de 48 meses almacenado a -40&ordm;C.</li>\r\n<li>Contactar a la empresa con el fin<br />de obtener informaci&oacute;n sobre las medidas del producto, su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>&nbsp;Reconstrucci&oacute;n de ligamento cruzado.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16002993- Tend&oacute;n tibial anterior&nbsp;&nbsp;&nbsp;</li>\r\n<li>16002994- Tend&oacute;n tibial posterior&nbsp;&nbsp;&nbsp;</li>\r\n<li>16560000- Tend&oacute;n semitendinoso&nbsp;&nbsp;&nbsp;</li>\r\n<li>16570000- Tend&oacute;n gracilis&nbsp;&nbsp;&nbsp;</li>\r\n<li>16580000- Tend&oacute;n peroneal largo&nbsp;&nbsp;&nbsp;</li>\r\n<li>16590000- Tend&oacute;n peroneal corto&nbsp;&nbsp;&nbsp;</li>\r\n<li>16600000- Tend&oacute;n flexor com&uacute;n de los dedos&nbsp;&nbsp;&nbsp;</li>\r\n<li>16610000- Tend&oacute;n flexor de Halux&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:53:23'),
(25, 8, 'TendÃ³n de Aquiles', 'productos_img/63c169_021-biograft-tendon-aquiles.png', '0746C2007 SSA', '<ul>\r\n<li>El tend&oacute;n de aquiles es un dispositivo m&eacute;dico, clase III, derivado de tejido tendinoso humano, es est&eacute;ril y libre de pir&oacute;genos.</li>\r\n<li>Compuesto por una pastilla &oacute;sea<br />del hueso calc&aacute;neo y una secci&oacute;n tendinosa compuesta por 90%<br />de col&aacute;geno y 10% de elastina.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de<br />50 kg y mediante el <strong>Proceso Clearant&reg;</strong>.</li>\r\n<li>Producto congelado con una caducidad de 48 meses<br />almacenado a -40&ordm;C.</li>\r\n<li>Contactar a la empresa con el<br />fin de obtener informaci&oacute;n sobre<br />las medidas del producto, su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>Reconstrucci&oacute;n de ligamento cruzado.</li>\r\n<li>Reconstrucci&oacute;n de ligamento colateral.</li>\r\n<li>Reconstrucci&oacute;n de aquiles.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16450101- Tend&oacute;n de aquiles con calc&aacute;neo T=&gt;180 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16450102- Hemitend&oacute;n de aquiles con calc&aacute;neo BO modelado&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:53:37'),
(26, 8, 'TendÃ³n Hueso HTH', 'productos_img/2260fe_022-biograft-tendon-hueso-hth.png', '0746C2007 SSA', '<ul>\r\n<li>El tend&oacute;n HTH es un dispositivo m&eacute;dico, clase III, derivado de tejido tendinoso humano, es est&eacute;ril y libre de pir&oacute;genos.</li>\r\n<li>Compuesto por dos pastillas &oacute;seas, una del hueso tibial y otra del hueso patelar unidas por una secci&oacute;n tendinosa del tend&oacute;n patelar.</li>\r\n<li>La secci&oacute;n tendinosa est&aacute; compuesta por 90% de col&aacute;geno<br />y 10% de elastina.<br />Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de<br />50 kg y mediante el <strong>Proceso Clearant&reg;</strong>.</li>\r\n<li>Producto congelado con una caducidad de 48 meses<br />almacenado a -40&ordm;C.</li>\r\n<li>Contactar a la empresa con<br />el fin de obtener informaci&oacute;n<br />sobre las medidas del producto,<br />su conservaci&oacute;n y log&iacute;stica de transporte.</li>\r\n</ul>', '<ul>\r\n<li>Reconstrucci&oacute;n de ligamento cruzado.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16500101- Tend&oacute;n hemipatelar (HTH)</li>\r\n</ul>', 1, '2014-07-15 18:53:47'),
(27, 8, 'Fascia Lata', 'productos_img/b1c986_023-biograft-fascia-lata.png', '0746C2007 SSA', '<ul>\r\n<li>La fascia lata es un dispositivo m&eacute;dico, clase III, derivado de tejido de fascia lata humano, es est&eacute;ril y libre de pir&oacute;genos.</li>\r\n<li>Esterilizado mediante radiaci&oacute;n gamma a una dosis m&iacute;nima de<br />50 kg y mediante el <strong>Proceso Clearant&reg;</strong>.</li>\r\n<li>Producto liofilizado con una caducidad de 48 meses y que<br />puede ser almacenado a temperatura ambiente.</li>\r\n</ul>', '<ul>\r\n<li>Indicado para en procedimientos quir&uacute;rgicos en el &aacute;rea dental, maxilofacial, ortopedia y traumatolog&iacute;a.</li>\r\n<li>Como membrana biol&oacute;gica.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<ul>\r\n<li>16480000- Fascia lata&nbsp;&nbsp;&nbsp;</li>\r\n<li>16481520- Fascia lata &ge;15 X &ge;20 mm</li>\r\n<li>16482130- Fascia lata &ge;21 X &ge;30 mm&nbsp;&nbsp;&nbsp;</li>\r\n<li>16483140- Fascia lata &ge;31 X &ge;40 mm&nbsp;&nbsp;&nbsp;</li>\r\n</ul>', 1, '2014-07-15 18:53:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_aplicaciones`
--

CREATE TABLE IF NOT EXISTS `prod_aplicaciones` (
  `id` int(255) NOT NULL auto_increment,
  `producto_id` int(255) default NULL,
  `aplicacion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Volcado de datos para la tabla `prod_aplicaciones`
--

INSERT INTO `prod_aplicaciones` (`id`, `producto_id`, `aplicacion`) VALUES
(1, 2, 'app00001'),
(2, 2, 'app00002'),
(3, 2, 'app00003'),
(4, 2, 'app00004'),
(5, 2, 'app00005'),
(7, 1, 'app00001'),
(8, 1, 'app00002'),
(9, 1, 'app00003'),
(10, 1, 'app00004'),
(11, 1, 'app00005'),
(12, 1, 'app00006'),
(13, 3, 'app00001'),
(14, 3, 'app00002'),
(15, 3, 'app00006'),
(27, 27, 'Como membrana biolÃ³gica'),
(28, 27, 'Relleno de defectos Ã³seos y cavidades Ã³seas en procedimientos quirÃºrgicos de Ãrea Dental y Maxilofacial'),
(29, 26, 'ReconstrucciÃ³n de Ligamento Cruzado'),
(30, 25, 'ReconstrucciÃ³n de Ligamento Cruzado'),
(31, 24, 'ReconstrucciÃ³n de Ligamento Cruzado'),
(32, 23, 'CirugÃ­a de RevisiÃ³n de cadera'),
(33, 22, 'ReconstrucciÃ³n de Fracturas por pÃ©rdida de sustancia Ã³sea'),
(34, 22, 'CirugÃ­a Columna: Corperectomia'),
(35, 22, 'Tumores: PÃ©rdida Masiva de Tejido'),
(36, 21, 'CirugÃ­a Columna: Corperectomia'),
(37, 21, 'ReconstrucciÃ³n de Fracturas por pÃ©rdida de sustancia Ã³sea'),
(38, 21, 'Tumores: PÃ©rdida Masiva de Tejido'),
(39, 20, 'CirugÃ­a Columna: Corperectomia'),
(40, 20, 'ReconstrucciÃ³n de Fracturas por pÃ©rdida de sustancia Ã³sea'),
(41, 20, 'Tumores: PÃ©rdida Masiva de Tejido'),
(42, 19, 'CirugÃ­a de RevisiÃ³n de rodilla'),
(43, 19, 'Clavo Centromedular'),
(44, 19, 'ReconstrucciÃ³n de Fracturas por pÃ©rdida de sustancia Ã³sea'),
(45, 19, 'Tumores: PÃ©rdida Masiva de Tejido'),
(46, 18, 'Clavo Centromedular'),
(47, 18, 'ReconstrucciÃ³n de Fracturas por pÃ©rdida de sustancia Ã³sea'),
(48, 18, 'Tumores: PÃ©rdida Masiva de Tejido'),
(49, 17, 'CirugÃ­a de RevisiÃ³n de rodilla'),
(50, 17, 'ReconstrucciÃ³n de Fracturas por pÃ©rdida de sustancia Ã³sea'),
(51, 16, 'Clavo Centromedular'),
(52, 16, 'ReconstrucciÃ³n de Fracturas por pÃ©rdida de sustancia Ã³sea'),
(53, 16, 'Tumores: PÃ©rdida Masiva de Tejido'),
(54, 15, 'CirugÃ­a de RevisiÃ³n de cadera'),
(55, 15, 'ReconstrucciÃ³n de Fracturas por pÃ©rdida de sustancia Ã³sea'),
(56, 15, 'Relleno de defectos Ã³seos y cavidades Ã³seas en procedimientos quirÃºrgicos en Ortopedia y TraumatologÃ­a'),
(57, 14, 'Fracturas por colapso'),
(58, 14, 'OsteotomÃ­a PÃ©lvica'),
(59, 14, 'ReconstrucciÃ³n de Meseta Tibial'),
(60, 14, 'Relleno de defectos Ã³seos y cavidades Ã³seas en procedimientos quirÃºrgicos en Ortopedia y TraumatologÃ­a'),
(61, 13, 'Espaciador para Cuerpo Vertebral'),
(62, 13, 'Fracturas por colapso'),
(63, 13, 'OsteotomÃ­a PÃ©lvica'),
(64, 13, 'ReconstrucciÃ³n de Meseta Tibial'),
(65, 13, 'Relleno de defectos Ã³seos y cavidades Ã³seas en procedimientos quirÃºrgicos en Ortopedia y TraumatologÃ­a'),
(66, 12, 'Espaciador para Cuerpo Vertebral'),
(67, 12, 'Fracturas por colapso'),
(68, 12, 'OsteotomÃ­a PÃ©lvica'),
(69, 12, 'ReconstrucciÃ³n de Meseta Tibial'),
(70, 12, 'Relleno de defectos Ã³seos y cavidades Ã³seas en procedimientos quirÃºrgicos en Ortopedia y TraumatologÃ­a'),
(71, 11, 'CirugÃ­a de Columna'),
(72, 11, 'Elongaciones'),
(73, 10, 'Quistes Ã³seos'),
(74, 10, 'Relleno de defectos Ã³seos y cavidades Ã³seas en procedimientos quirÃºrgicos en Ortopedia y TraumatologÃ­a'),
(75, 10, 'Retardo de ConsolidaciÃ³n'),
(76, 10, 'Tumores'),
(77, 9, 'Relleno de defectos Ã³seos y cavidades Ã³seas en procedimientos quirÃºrgicos de Ãrea Dental y Maxilofacial'),
(78, 8, 'CirugÃ­a de Columna'),
(79, 8, 'Quistes Ã³seos'),
(80, 8, 'Relleno de defectos Ã³seos y cavidades Ã³seas en procedimientos quirÃºrgicos en Ortopedia y TraumatologÃ­a'),
(81, 8, 'Retardo de ConsolidaciÃ³n'),
(82, 8, 'Tumores'),
(83, 7, 'CirugÃ­a de Columna'),
(84, 7, 'Quistes Ã³seos'),
(85, 7, 'Relleno de defectos Ã³seos y cavidades Ã³seas en procedimientos quirÃºrgicos en Ortopedia y TraumatologÃ­a'),
(86, 7, 'Retardo de ConsolidaciÃ³n'),
(87, 7, 'Tumores'),
(88, 6, 'Como complemento a las cirugÃ­as de columna en las instrumentaciones posteriores o anteriores y que se busca artrodesar esos segmentos'),
(89, 6, 'En el tratamiento de defectos de crÃ¡neo posterior a traumatismo y pÃ©rdida de tejido Ã³seo'),
(90, 6, 'En la reconstrucciÃ³n de defectos manipulares o pÃ©rdidas de tejido Ã³seo en mandÃ­bula o maxilar'),
(91, 6, 'En los defectos alveolares en maxilares o mandÃ­bula que requiera un apoyo mayor de tejido Ã³seo'),
(92, 6, 'En tratamiento de tumores Ã³seos que provocan defectos en los huesos o cavidades que requieran su relleno'),
(93, 6, 'En tratamientos de fracturas que provocan pÃ©rdida de tejido Ã³seo debido al traumatismo que la provocÃ³'),
(94, 5, 'Artrodesis de muÃ±eca'),
(95, 5, ' de hombro'),
(96, 5, ' de codo'),
(97, 5, ' cadera'),
(98, 5, ' rodilla'),
(99, 5, ' tobillo'),
(100, 5, ' metatarsianos'),
(101, 5, ' metacarpianos'),
(102, 5, ' falanges de los dedos de la mano y pies'),
(103, 5, 'ConsolidaciÃ³n viciosa y osteotomÃ­as correctivas'),
(104, 5, 'En defectos de tibia'),
(105, 5, ' fÃ©mur y cadera en prÃ³tesis de revisiÃ³n'),
(106, 5, 'En la reconstrucciÃ³n de defectos manipulares o pÃ©rdidas de tejido Ã³seo en mandÃ­bula o maxilar'),
(107, 5, 'Relleno de cajas cervicales'),
(108, 5, 'Relleno de cajas lumbares'),
(109, 5, 'Relleno de cavidades producidas por osteomielitis'),
(110, 5, ' tumores'),
(111, 5, 'Relleno de defectos de fracturas'),
(112, 5, 'Relleno de fracturas de los cuerpos vertebrales cervicales'),
(113, 5, ' torÃ¡cicas y lumbares'),
(114, 5, 'Relleno en defectos de prÃ³tesis primarias'),
(115, 5, 'Seudoartrosis de cualquier hueso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologia`
--

CREATE TABLE IF NOT EXISTS `tecnologia` (
  `id` int(255) NOT NULL auto_increment,
  `titulo` varchar(255) default NULL,
  `foto` varchar(255) default NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `tecnologia`
--

INSERT INTO `tecnologia` (`id`, `titulo`, `foto`, `fecha`) VALUES
(18, 'Biograft de MÃ©xico', 'tec_img/a4eee2_biograft-instalaciones-foto1.png', '2014-07-15 16:36:03'),
(19, 'Biograft de MÃ©xico', 'tec_img/b4ee36_biograft-instalaciones-foto2.png', '2014-07-15 16:36:51'),
(20, 'Biograft de MÃ©xico', 'tec_img/2ef6d0_biograft-instalaciones-foto3.png', '2014-07-15 16:36:58'),
(21, 'Biograft de MÃ©xico', 'tec_img/4dc000_biograft-instalaciones-foto4.png', '2014-07-15 16:37:05'),
(22, 'Biograft de MÃ©xico', 'tec_img/7d8f6d_biograft-instalaciones-foto5.png', '2014-07-15 16:37:13'),
(23, 'Biograft de MÃ©xico', 'tec_img/be784e_biograft-instalaciones-foto6.png', '2014-07-15 16:37:30'),
(24, 'Biograft de MÃ©xico', 'tec_img/d160e3_biograft-instalaciones-foto7.png', '2014-07-15 16:37:36'),
(25, 'Biograft de MÃ©xico', 'tec_img/b89f35_biograft-instalaciones-foto8.png', '2014-07-15 16:37:44'),
(26, 'Biograft de MÃ©xico', 'tec_img/b183c6_biograft-instalaciones-foto9.png', '2014-07-15 16:37:52'),
(27, 'Biograft de MÃ©xico', 'tec_img/739ec7_biograft-instalaciones-foto10.png', '2014-07-15 16:38:02'),
(28, 'Biograft de MÃ©xico', 'tec_img/d35b32_biograft-instalaciones-foto11.png', '2014-07-15 16:38:17'),
(29, 'Biograft de MÃ©xico', 'tec_img/b015d1_biograft-instalaciones-foto12.png', '2014-07-15 16:38:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL auto_increment,
  `usuario` varchar(255) default NULL,
  `password` varchar(255) default NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `fecha`) VALUES
(1, 'admin', 'admini', '2014-07-13 03:36:45'),
(2, 'alin', 'aline', '2014-07-13 03:36:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
