-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2018 a las 15:04:05
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica_1.0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL COMMENT 'Clave primaria',
  `user` varchar(20) NOT NULL COMMENT 'usuario comprador',
  `order_date` varchar(9) NOT NULL COMMENT 'Fecha de la compra',
  `total_price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `user`, `order_date`, `total_price`) VALUES
(60, 'IANDO', '02.09.18', '10382.25'),
(61, 'GIOVANI', '02.09.18', '4558.17'),
(62, 'GIOVANI', '02.09.18', '460.00'),
(63, 'GIOVANI', '02.15.18', '1672.46'),
(64, 'GIOVANI', '02.15.18', '240.00'),
(65, 'GIOVANI', '02.15.18', '240.00'),
(66, 'GIOVANI', '02.15.18', '18090.00'),
(67, 'GIOVANI', '02.15.18', '18090.00'),
(68, 'GIOVANI', '02.15.18', '90.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `cod_pro` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT 'NULL',
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `product_type` varchar(50) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `combustible` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `avatar` char(150) NOT NULL,
  `date_today` date NOT NULL,
  `price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`cod_pro`, `user_name`, `title`, `country`, `province`, `city`, `address`, `phone`, `email`, `description`, `product_type`, `brand`, `model`, `year`, `combustible`, `color`, `avatar`, `date_today`, `price`) VALUES
(46, 'IANDO', 'Volante coche Honda', 'ES', '01', 'ABERASTURI', 'super 1', 951357456, 'ddd@gg.com', 'Lo vendo ya que me he comprado un coche nuevo', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/10859-volante.png', '2002-05-18', '90.00'),
(47, 'IANDO', 'Volante de ford', 'ES', '46', 'VALENCIA', 'plonte 5', 654978741, 'aaaa@ggg.com', 'Volante seminuevo de ford focus', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/23137-volante2.png', '2002-05-18', '150.00'),
(48, 'IANDO', 'Coche ford', 'ES', '46', 'VALENCIA', 'lorca 85', 951357852, 'pli@ddd.com', 'Coche 7 plazas seminuevo con ruedas nuevas', 'Sale Vehicle', NULL, NULL, NULL, NULL, NULL, 'media/products/31872-Toyota.png', '2002-06-18', '7500.00'),
(49, 'IANDO', 'Coche fiat', 'ES', '01', 'ABERASTURI', 'plol95', 987563145, 'ddd@sss.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Tempore maxime', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/31715-fiat.png', '2002-07-18', '10000.00'),
(50, 'IANDO', 'Coche ford', 'ES', '01', 'ABERASTURI', 'plomimo', 951357852, 'plomino@xxx.cpm', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Tempore maxime', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/29746-ford.png', '2002-08-18', '18000.00'),
(51, 'IANDO', 'Coche ford', 'ES', '01', 'ABERASTURI', 'renera85', 852357412, 'fff@ccc.com', 'fugone en venta con muy poca antiguedad', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/8885-ford5.png', '2002-09-18', '8000.00'),
(52, 'IANDO', 'Coche ford focus', 'ES', '01', 'ABERASTURI', 'PLOMARESD 85', 951235774, 'OMIU@DDD.COM', 'ford focus con ruedas y espape nuevos', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/7498-ford1.png', '2002-09-18', '3500.00'),
(53, 'IANDO', 'Coche ford scort', 'IS', 'NULL', NULL, 'promesa 85', 987456321, 'plomert@fff.vo', 'Ford scort con asientos nuevos ', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/43-ford4.png', '2002-09-18', '1500.00'),
(54, 'IANDO', 'Asiento de piel ford', 'ES', '46', 'GANDIA', 'plorrr 85', 852469752, 'plor@fff.com', 'asento seminuevo de ford focus', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/1849-asiento.png', '2002-09-18', '180.00'),
(55, 'IANDO', 'Asiento para nino', 'ES', '46', 'ONTINYENT', 'rotova 85', 963258741, 'ddddpl@fp.vf', 'Asiento para ninos mayores de 5 anos', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/29849-asiento_boy.png', '2009-02-18', '30.00'),
(56, 'IANDO', 'Protector de asiento negro', 'ES', '46', 'XATIVA', 'polima 89', 852258852, 'plop@dd.com', 'Cubreasiento color negro muy comodo', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/29534-asiento5.png', '2002-09-18', '20.00'),
(57, 'IANDO', 'Asientos delanteros', 'ES', '46', 'ONTINYENT', 'pronova 85', 963258741, 'plo@ddd.cvbn', 'Asiento delanteros de ford mondeo ', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/13617-asiento5.png', '2002-09-18', '250.00'),
(58, 'IANDO', 'Asiento Bebe', 'ES', '46', 'VALENCIA', 'madri 56', 987654320, 'prtm@dfg.dd', 'Asiento de bebe para tesla 859', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/22239-asiento9.png', '2002-09-18', '500.00'),
(59, 'IANDO', 'Cubreasiento', 'ES', '46', 'ONTINYENT', 'portillo 76', 951357986, 'pdks@cdw.cdq', 'Cubreasiento de plastico para asientos delanteros', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/17430-cubre_asiento.png', '2002-09-18', '15.99'),
(60, 'IANDO', 'Cubreasiento', 'ES', '46', 'ONTINYENT', 'llorco 12', 745283987, 'loe@ddd.pop', 'Cubreasiento trasero de tela color negro', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/24983-cubreasiento2.png', '2002-09-18', '22.50'),
(61, 'IANDO', 'Organizador para asiento', 'ES', '28', 'MADARCOS', 'malaga 4', 852369741, 'plos@gmail.com', 'Organizador de tela negro con  12 estancias', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/24053-organizador_asiento.png', '2002-09-18', '12.86'),
(62, 'IANDO', 'Fundas asientos bmw serie 5', 'ES', '28', 'MADRID', 'madrid 987', 98765432, 'dron@gmail.com', 'Fundas de tela para asientos delanteros y traseros color gris y negro', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/507-fundas-asientos-coche.png', '2002-09-18', '59.75'),
(63, 'IANDO', 'GPS con mapa europa del este', 'ES', '08', 'FALS', 'plenor 76', 672907163, 'fero@gmail.com', 'gps marca tomton actializado radio incorporada y sistema que detecta radares', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '2002-09-18', '250.00'),
(64, 'IANDO', 'GPS Tomtom', 'ES', '46', 'XATIVA', 'xar 67', 856974569, 'froe@dd.ca', 'gps comprado hace dos anos con sistema radar y sensor de luz activo infrarrojos para asiento', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '2002-09-18', '354.68'),
(65, 'GIOVANI', 'Aro rueda coche', 'ES', '10', 'ABADIA', 'plomar 21', 852369741, 'poloer@gmail.com', 'vendo aros porque he comprado unas nuevas y estas no las uso', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/6053-aroRuedas.png', '2018-02-19', '59.35'),
(66, 'GIOVANI', 'Moto nueva', 'ES', '37', 'ABUSEJO', 'proper 85', 852136547, 'gmcv.l@gmail.com', 'producto en perfectas condiciones y con acabados de primera calidad No esperes mas y compralo', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '2018-02-16', '3500.00'),
(67, 'GIOVANI', 'Bicicleta ', 'ES', '01', 'ABERASTURI', 'redonde 54', 856974123, 'dfg@gmail.com', 'If you need to use decimals numbers please use a DOT to mark them The number has to be greater than and less than ', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '2018-02-22', '180.00'),
(68, 'GIOVANI', 'Coche toyota', 'ES', '01', 'ABETXUKO', 'pronderas 85', 789987789, 'pro@gmzil.cp', 'If you need to use decimals numbers please use a DOT to mark them The number has to be greater than and less than', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '2018-02-22', '15000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_comprados`
--

CREATE TABLE `prod_comprados` (
  `id_pedido` int(11) NOT NULL COMMENT 'codigo pedido',
  `cod_pro` int(11) NOT NULL COMMENT 'codigo producto',
  `quantity` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prod_comprados`
--

INSERT INTO `prod_comprados` (`id_pedido`, `cod_pro`, `quantity`) VALUES
(60, 46, 3),
(60, 49, 1),
(60, 55, 1),
(60, 60, 1),
(60, 62, 1),
(61, 52, 1),
(61, 54, 1),
(61, 58, 1),
(61, 59, 5),
(61, 61, 2),
(61, 60, 1),
(61, 63, 1),
(62, 47, 1),
(62, 56, 5),
(62, 55, 1),
(62, 54, 1),
(63, 47, 5),
(63, 58, 1),
(63, 59, 4),
(63, 62, 6),
(64, 46, 1),
(64, 47, 1),
(66, 46, 1),
(66, 50, 1),
(68, 46, 1),
(0, 58, 1),
(0, 59, 5),
(0, 61, 10),
(0, 62, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recoverpass`
--

CREATE TABLE `recoverpass` (
  `user` char(20) DEFAULT NULL,
  `codigo` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recover_pass`
--

CREATE TABLE `recover_pass` (
  `user` char(20) DEFAULT NULL,
  `codigo` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recover_pass`
--

INSERT INTO `recover_pass` (`user`, `codigo`) VALUES
('giovani', 'bg1CyvMigj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `birthdate` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `genere` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `age` int(2) NOT NULL,
  `country` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Address` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `zip` int(5) NOT NULL,
  `email` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `company` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `hobbies` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user`, `name`, `pass`, `last_name`, `dni`, `birthdate`, `genere`, `age`, `country`, `Address`, `zip`, `email`, `password`, `company`, `hobbies`, `avatar`) VALUES
('', 'iando', '123456', 'pepe', '48986542S', '01/10/1989', 'Man', 18, 'ES', 'sssssssss', 54659, 'ssss@sssss.ccc', '321654', 'ACSA', 'natacion', '/media/esq'),
('gio', 'iando', '123456', 'pepe', '48986542S', '01/10/1989', 'Man', 18, 'ES', 'sssssssss', 54659, 'ssss@sssss.ccc', '321654', 'ACSA', 'natacion', '/media/esq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario2`
--

CREATE TABLE `usuario2` (
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `birthdate` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `genere` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `country` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` int(9) NOT NULL,
  `email` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cmpy` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `hobbies` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `user_type` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario2`
--

INSERT INTO `usuario2` (`user`, `first_name`, `last_name`, `dni`, `birthdate`, `genere`, `country`, `address`, `zip`, `phone`, `email`, `password`, `cmpy`, `hobbies`, `user_type`) VALUES
('ANASTASIA', 'SSSSSSSSS', 'DDDDDDD', '98798765A', '05/05/1999', 'Man', 'PORTUGAL', 'AAAAAAAAAAA', 6547, 654123654, 'AAAAAAAA@GGGGGGGGG.VVVVV', 'xcvzxv65656aaaa666A', 'AAAAAAAAAA', 'Trucks:', 0),
('FFFFFFFFF', 'IAN', 'IAN', '98741565S', '05/05/1995', 'Man', 'PORTUGAL', 'IANON', 7777, 602240448, 'WWWWWW@PPPP.AAAA', 'ddddddddddd6565A', 'IANON', 'Motorbike:', 0),
('gioando', 'gioando', 'gioando', '48986542S', '01/10/1989', 'Man', 'ES', 'sssssssdddss', 54659, 654654654, 'ssss@sssss.ccc', '321654', 'ACSA', 'natacion', 0),
('GIOGIO', 'GIOGIO', 'GIOGIO', '20974308X', '05/05/1987', 'Man', 'PORTUGAL', 'AAAAAA', 6545, 951159357, 'AAAAAAAA@PLPLP.OIJ', '$2y$10$upQOozNA3rBDlifQBXr8VOrihFojNJ7NorGEQ.bod12McxaYLCx5a', 'QQQQQQQQQ', 'Motorbike:', 0),
('GIOVANI', 'Giovanny', 'Coque', '31982923C', '03/21/1984', 'Man', 'SPAIN', 'ALICANTE', 4689, 602458796, 'gmc.yanez@gmail.com', '$2y$10$evGyaLV3lGbT8lZI6yIcXuuauiSsEq7f8uhMywRCozvE0z9EPDmjO', 'UNACUQUIERA', 'Motorbike:', 1),
('GOIOIOI', 'SOISOIS', 'SOJSJN', '95770846L', '05/14/1997', 'Man', 'SPAIN', 'PKLPLPL', 6547, 654654528, 'SDFJSDKFJ@DDD.BND', 'DFSF545a', 'SDFSPPL', 'Motorbike:', 0),
('IANDO', 'IANDO', 'IANDO', '01998672H', '05/12/1981', 'Man', 'SPAIN', 'SDFGSFGDFGDFGDF', 6545, 951357456, 'PORPE@FGH.COJD', '$2y$10$BgDWM8WgHTpTdd0yJGT/tue2biQbr4PvITbNXA6mfuJgYSKyl1vRK', 'PROPROPRO', 'Trucks:', 0),
('JUANLUIS', 'JUAN', 'PEREZ', '15824733C', '05/20/1980', 'Man', 'PORTUGAL', 'CALLECUBA', 8541, 951235745, 'GMC.ERC@GMAIL.COM', '$2y$10$XyIilJiV1oz/pKAtbRgBCORcdKtieLf4sZmddpFpIkz/qa7wqtaBe', 'ISWL', 'Trucks:', 0),
('PEDRO', 'PEDRO', 'PEDRO', '32165454A', '05/05/1999', 'Man', 'SPAIN', 'AAAAAAAAAAA', 6547, 658974565, 'AAAAAAAAA@DDDDDDDDDD.CS', 'AAAAAAAAA5656a', 'SSSSSSS', 'Trucks:', 0),
('SSSSSSSSS', 'AAAAAAAAAAAAAA', 'PPPPPPPPPPPP', '98765463A', '05/05/1999', 'Man', 'SPAIN', 'AAAAAAAAAAA', 6547, 654987987, 'AAAAAAAAAA@SSSSSSSSSS.CCCC', 'SSSSSSSSSS6564a', 'AAAAAAAAAAA', 'Motorbike:', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`cod_pro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `usuario2`
--
ALTER TABLE `usuario2`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria', AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `cod_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
