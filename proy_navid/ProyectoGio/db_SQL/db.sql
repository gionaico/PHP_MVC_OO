CREATE TABLE IF NOT EXISTS `usuario2` (
`user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
`first_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
`last_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
`dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
`birthdate` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
`genere` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
`country` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
`address` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
`zip` int(5) NOT NULL,
`phone` int(9) NOT NULL,
`email` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
`password` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
`cmpy` varchar(200) COLLATE utf8_spanish_ci NOT NULL,

`hobbies` varchar(200) COLLATE utf8_spanish_ci NOT NULL,

PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_[...]



INSERT INTO `usuario2` (`user`,`first_name`, `last_name`,`dni`,`birthdate`,`genere`, `country`,
 `address`, `zip`, `phone`, `email`, `password`, `cmpy`, `hobbies`) VALUES('gioando','gioando','gioando',
 '48986542S', '01/10/1989', 'Man', 18, 'ES', 'sssssssdddss', 54659, 654654654, 'ssss@sssss.ccc', 321654, 
 'ACSA', 'natacion');




 -- TABLE PRODUCTS---------------------------------------------------------------------------------------
 -- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2018 a las 13:12:09
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
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `user_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
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
  `date_today` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`user_name`, `title`, `country`, `province`, `city`, `address`, `phone`, `email`, `description`, `product_type`, `brand`, `model`, `year`, `combustible`, `color`, `avatar`, `date_today`) VALUES
('DDDDDDDDDDDDDDDD', 'Sdfgsdgsdg', 'ES', '34', 'SALAMANQUINOS, LOS', 'sdklmfgklsdfngkln', 645654654, 'sdfsdf@dgdfg.cv', 'sdsssssssssssssssssssseeeeeeeeeee', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/18819-11.png', '01.10.18'),
('DOMINA', 'Kkkkkkkkkkkkkkk', 'ES', '37', 'SAELICES EL CHICO', 'dfgjknsdfgdkjfg', 654654654, 'dfgdsfg@fgdfgdf.sdfsdf', 'dfgdfgdfhfghfghfghgfhsdfsdfsdsssssssss', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '01.10.18'),
('FINAA', 'Assssssssssssssss', 'ES', '37', 'SALMORAL', 'dsfsfddddd', 654654654, 'sdfsdf@sdfgsdfg.ccc', 'sssssssssssssssssssssssssssssss', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '01.10.18'),
('GIOGIO', 'Dkfjgnksdfngkjn', 'ES', '34', 'ABARCA DE CAMPOS', 'safdnsdkfjgnkjn', 654654654, 'sdfsdf@dfsgsf.ccc', 'sdfsdfgklgfknhfghnhnjnknknkjbjhvjv', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/30046-kokokooko.jpg', '01.09.18'),
('IANDO', 'Perro en venta', 'ES', '01', 'VALDEGOVIA', 'sssssssss df4 8', 654654654, 'fgfgd@fghfg.coco', 'precio muy economico preguntalo ya corre sssssssssssssssssssssssss', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/30046-kokokooko.jpg', '01.10.18'),
('MARCOS', 'Sdfsdfsdfsdfsd', 'ES', '26', 'SAJAZARRA', 'asssssssssssssssssb', 987987145, 'sdffsdfsd@sdfsdf.ccc', 'zdfdfsdfsdf sssssssssssssssssssssssssssssssssssssss', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/18880-11.png', '01.10.18'),
('OOOOOOOOOOOOOOO', 'Koniniunuinui', 'ES', '34', 'ABARCA DE CAMPOS', 'sssssssssssss', 654654654, 'dsfsd@sdfgsdfg.ccx', 'sfdddddddddddddddddddddddddddd', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, '', '01.10.18'),
('PAPAPA', 'Dfsjbhkfbjhbfsbdfjh', 'ES', '24', 'OCEJA DE VALDELLORMA', 'asaaaaaaaaaaaaaaaaa', 989989985, 'sdfasdfs@sdfsdf.cccc', 'jdfhsdvfjvbjsdfvb bbbbbbbbbbbbbbbbbbbbbbbb', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '01.10.18'),
('PATRICIO', 'Sdfsdfjknkjnjk', 'ES', '37', 'ABUSEJO', 'sdfdsfsd454', 654654654, 'asdasdf@sdfsdf.csdsd', 'dfffffffffffffffffffffffffwsssssssssssssss', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/8821-11.png', '01.10.18'),
('POLEN', 'SDFBJSBFJBSDF', 'ES', '01', 'ABERASTURI', 'DDDDDDDDDDD', 654654654, 'DFGDFNGFGH@DFSGDFG.CKJKJ', 'DFFFFFFFFFFFFFFDFDDDDDDDRGGGGGGGGG', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/18819-11.png', '01.10.18'),
('POTOTO', 'Dfsfjkbfdbkj', 'ES', '34', 'SALAMANQUINOS, LOS', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 989989987, 'aaaaaaaaaaaaa@dddddddddddd.cccc', 'jkgbsdfgbjkbdfgmkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/15444-11.png', '01.10.18'),
('PPPPP', 'Hbjjhbjbjhbjhbjh', 'ES', '46', 'GANDIA', 'ssssssssssssss', 654654987, 'sdfsf@sdfsdf.cxv', 'dplfdplsdfp dfgmfkgm fgmkfkgm sdkmfgksg', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/30046-kokokooko.jpg', '01.10.18'),
('PPPPPPPPPP', 'Fdjklnfgnk', 'ES', '34', 'SALAMANQUINOS, LOS', 'dfsmdfklsdmfklm', 654654654, 'sdfgdfgdfgAA@sdfsdf.sdfsd', 'sdssssssssssddssssssssssssssssssssssssssss', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/7312-11.png', '01.10.18'),
('PRADO', 'KDFNGKLNDG', 'ES', '37', 'SAELICES EL CHICO', 'DKFJGNKJDFGJK', 654654654, 'sdfdfg@sgsdf.czxvc', 'sdffffffffffffffffffffffffffdddddddddd', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/18819-11.png', '01.10.18'),
('PROMETEO', 'Sdfgdkjfgbkdbgk', 'ES', '34', 'SALAMANQUINOS, LOS', 'sssssssssssssssssss', 987412365, 'dsfsdfsdf@sdfsdfsd.dddd', 'ssssssssssssssssssssssssssssssssssssssssssssssss', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '01.10.18'),
('PROMETEO2', 'Sdfdddddddddddddd', 'ES', '37', 'SAELICES EL CHICO', 'saddddddddddddddddddddd', 987987987, 'dsfsdf@fsdgdfg.ccc', 'dddddddddddddddddddddddddddddddd', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/28072-11.png', '01.10.18'),
('PROROR', 'Sdfssssssssss', 'ES', '34', 'SALAMANQUINOS, LOS', 'ssssssssssssssssssssss', 989989989, 'aaaaaaaaaaaa@dddddddddddd.cc', 'ssssssssssssssssssssssssssssssssss', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '01.10.18'),
('VICENT', 'Sdflkgnldkfngkldfnlk', 'ES', '37', 'SAELICES EL CHICO', 'fsdklgnldfngkldnfl', 654654654, 'sdfsdfsfd@sdfgdfg.sdfsdf', 'dffffffffffffffffffffffffffffffffffffffffffffffff', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/18819-11.png', '01.10.18'),
('VICENTICO', 'Sdfnsdkfjnksdjfnjksdfn', 'ES', '37', 'RACHITA, LA', 'jkbdfkjgbkgb', 989963145, 'sdsdfsdf@sdfgdfg.cccc', 'sdffffffffffffffffffffff cfffffffffffffffffffffff', 'Car spare parts', NULL, NULL, NULL, NULL, NULL, 'media/products/default-potho.jpg', '01.10.18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`user_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
