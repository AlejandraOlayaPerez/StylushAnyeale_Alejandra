-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2021 a las 22:11:45
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectostylushanyeale`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `IdServicio` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `IdServicio`, `eliminado`) VALUES
(1, 544456873, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(50) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `eliminado`) VALUES
(2, 'maquillaje', 0),
(3, 'cremas', 0),
(4, 'tratamientos', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `documentoIdentidad` int(15) NOT NULL,
  `primerNombre` varchar(25) NOT NULL,
  `segundoNombre` varchar(25) NOT NULL,
  `primerApellido` varchar(25) NOT NULL,
  `segundoApellido` varchar(25) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `barrio` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` char(35) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `tipoDocumento`, `documentoIdentidad`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `fechaNacimiento`, `genero`, `direccion`, `barrio`, `email`, `contrasena`, `telefono`, `eliminado`) VALUES
(1, 'CC', 1006700633, 'jimena', 'Alejandra', 'Olaya', 'Perez', '2001-11-14', 'F', 'CRR 18 N 24 A 34', 'Progreso', 'aleja@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', '3204495486', 0),
(2, 'TI', 123456789, 'mariana', '', '', '', '0000-00-00', '', '', '', 'Mariana@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', '', 0),
(3, '', 0, '', '', '', '', '0000-00-00', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(4, '', 0, 'carlos', '', '', '', '0000-00-00', '', '', '', 'cjsarasty@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1),
(5, 'CC', 123456789, 'Maria', '', 'Lopez', '', '0000-00-00', '', '', '', 'maria@gmail.com', 'dc13ae48d185bf2dbad46c1005f46eca', '123456789', 0),
(6, 'CE', 1006700633, 'jimena', '', 'olaya', '', '0000-00-00', '', 'Crr 18 n 24 a 34', '', 'jimenaolaya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '32367482920', 0),
(7, 'CC', 97612166, 'miguel', '', 'olaya', '', '0000-00-00', '', 'Crr 18 n 24 a 34', '', 'miguelolaya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '3204995486', 0),
(8, 'CC', 30741453, 'flor', 'maria', 'montañez', 'vida', '2001-10-24', 'Femenino', 'fgdfg', 'progreso', 'flor@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '3132902616', 0),
(9, 'CC', 1000002159, 'Carolina', '', 'Sanchez', '', '0000-00-00', '', 'Crr 18 n 24 a 3', '', 'carolinasanchez@gmail.com', '123456789', '3204495486', 0),
(10, 'TI', 1120563510, 'miguel', '', 'Perez', '', '0000-00-00', '', 'Crr 18 n 24 a 34', '', 'miguelPerez@gmail.com', '25f9e794323b453885f5181f1b624d0b', '3204495486', 0),
(11, 'CC', 987654321, 'pepito', '', 'Olaya', '', '0000-00-00', '', 'Crr 18 n 24 a 34', '', 'pepito@gmail.com', '25d55ad283aa400af464c76d713c07ad', '777778764888', 0),
(12, 'TI', 987654321, 'carlos', '', 'PeReZ', '', '1994-01-12', '', 'Crr 18 n 24 a 3', '', 'carlos@gmail.com', '25f9e794323b453885f5181f1b624d0b', '534645654', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idPregunta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `idRespuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idDetalleFactura` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idFactura` int(11) DEFAULT NULL,
  `idPedido` int(11) DEFAULT NULL,
  `IdServicio` int(11) DEFAULT NULL,
  `idReservacion` int(11) DEFAULT NULL,
  `codigoProducto` varchar(30) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`idDetalleFactura`, `idProducto`, `idFactura`, `idPedido`, `IdServicio`, `idReservacion`, `codigoProducto`, `producto`, `cantidad`, `precio`, `eliminado`) VALUES
(1, 1, NULL, 277952570, NULL, NULL, '', 'locion', 3, 0.00, 1),
(2, 2, NULL, 277952570, NULL, NULL, '', 'Silla', 4, 0.00, 1),
(6, 2, NULL, NULL, 267687805, NULL, 'U1', 'Crema', 1, 1.00, 0),
(7, 6, NULL, NULL, 409358848, NULL, 'U2', 'Cera', 6, 9999.99, 0),
(8, 5, NULL, NULL, 409358848, NULL, 'V3', 'Acondicionador', 2, 9999.99, 0),
(9, 6, NULL, NULL, 820772169, NULL, 'U2', 'Cera', 6, 9999.99, 1),
(10, 5, NULL, NULL, 820772169, NULL, 'V3', 'Acondicionador', 2, 9999.99, 1),
(11, 1, NULL, NULL, 38801601, NULL, 'V1', 'locion', 1, 1.00, 0),
(12, 4, NULL, NULL, 721804413, NULL, 'V3', 'Acondicionador', 2, 9999.99, 0),
(13, 4, NULL, 564924075, NULL, NULL, 'V3', 'Acondicionador', 1, 9999.99, 1),
(14, 4, NULL, 674162799, NULL, NULL, 'V3', 'Acondicionador', 1, 9999.99, 0),
(15, 4, NULL, 50704385, NULL, NULL, 'V3', 'Acondicionador', 1, 9999.99, 0),
(16, 2, NULL, 686774842, NULL, NULL, 'U1', 'Crema', 1, 1.00, 0),
(17, 3, NULL, 564924075, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 1),
(18, 6, NULL, 564924075, NULL, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(19, 3, NULL, 564924075, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 1),
(20, 6, NULL, 564924075, NULL, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(21, 3, NULL, 564924075, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 1),
(22, 6, NULL, 564924075, NULL, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(23, 3, NULL, 564924075, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 1),
(24, 6, 1, NULL, NULL, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(25, 3, 2, NULL, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(26, 6, 3, NULL, NULL, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(27, 3, 4, NULL, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(28, 6, 5, NULL, NULL, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(29, 2, NULL, 992933774, NULL, NULL, 'U1', 'Crema', 1, 1.00, 1),
(30, 3, NULL, NULL, 522676893, NULL, 'V2', 'Tratamiento', 1, 1.00, 0),
(31, 4, NULL, 88328668, NULL, NULL, 'V3', 'Acondicionador', 5, 9999.99, 1),
(32, 2, NULL, 88328668, NULL, NULL, 'U1', 'Crema', 4, 1.00, 1),
(33, 2, NULL, 88328668, NULL, NULL, 'U1', 'Crema', 8, 1.00, 0),
(34, 4, NULL, 88328668, NULL, NULL, 'V3', 'Acondicionador', 9, 9999.99, 0),
(35, 4, NULL, 55016541, NULL, NULL, 'V3', 'Acondicionador', 4, 9999.99, 1),
(36, 6, NULL, 55016541, NULL, NULL, 'U2', 'Cera', 6, 9999.99, 1),
(37, 2, NULL, 55016541, NULL, NULL, 'U1', 'Crema', 1, 1.00, 1),
(38, 12, NULL, 106533512, NULL, NULL, 'Vital222', 'Igora Vital', 20, 1.00, 0),
(39, 6, NULL, NULL, 959073078, NULL, 'U2', 'Cera', 1, 9999.99, 0),
(40, 1, NULL, 363921012, NULL, NULL, 'sddssd', 'locion', 5, 1.00, 0),
(41, 6, NULL, 571370830, NULL, NULL, 'U2', 'Cera', 9, 9999.99, 0),
(42, 3, NULL, 96510647, NULL, NULL, 'V2', 'Tratamiento', 7, 1.00, 0),
(43, 738517277, NULL, 564924075, NULL, NULL, 'hh8', 'Shampo Matizante Lum', 5, 7500.00, 0),
(44, 528300964, NULL, 564924075, NULL, NULL, 'hh8', 'Removedor Semiperman', 6, 9999.99, 0),
(45, 1, NULL, 564924075, NULL, NULL, 'll88', 'Loción Tónica Capila', 3, 1.28, 0),
(49, 1, NULL, 296492338, NULL, NULL, 'll88', 'Loción Tónica Capila', 1, 1.28, 0),
(50, 6, NULL, 296492338, NULL, NULL, 'U2', 'Cera', 1, 3000.00, 0),
(51, 3, NULL, 296492338, NULL, NULL, 'V2', 'Tratamiento', 1, 1.00, 0),
(53, 465728268, NULL, 702719052, NULL, NULL, 'V111', 'Valmy Brillo Esmalte', 6, 9999.99, 0),
(55, 1, NULL, 702719052, NULL, NULL, 'll88', 'Loción Tónica Capila', 6, 1.28, 1),
(56, 738517277, NULL, 132436115, NULL, NULL, 'hh8', 'Shampo Matizante Lum', 10, 7500.00, 0),
(57, 528300964, NULL, 132436115, NULL, NULL, 'hh8', 'Removedor Semiperman', 10, 9999.99, 0),
(58, 1, NULL, 111101, NULL, NULL, 'll88', 'Loción Tónica Capila', 5, 1.28, 0),
(59, 6, NULL, 111101, NULL, NULL, 'U2', 'Cera', 10, 3000.00, 0),
(60, 1, NULL, 338879597, NULL, NULL, 'll88', 'Loción Tónica Capila', 4, 1.28, 0),
(61, 1, NULL, 968382738, NULL, NULL, 'll88', 'Loción Tónica Capila', 1, 1.28, 0),
(62, 3, NULL, 968382738, NULL, NULL, 'V2', 'Tratamiento', 1, 1.00, 0),
(63, 4, NULL, 968382738, NULL, NULL, 'V3', 'Acondicionador', 1, 3000.00, 0),
(64, 6, NULL, 968382738, NULL, NULL, 'U2', 'Cera', 1, 3000.00, 0),
(65, 12, NULL, 968382738, NULL, NULL, 'Vital222', 'Igora Vital', 1, 15.00, 0),
(66, 465728268, NULL, 968382738, NULL, NULL, 'V111', 'Valmy Brillo Esmalte', 1, 9999.99, 0),
(67, 528300964, NULL, 968382738, NULL, NULL, 'hh8', 'Removedor Semiperman', 1, 9999.99, 0),
(68, 696970008, NULL, 968382738, NULL, NULL, 'hh8', 'Removedor Semiperman', 1, 9999.99, 0),
(69, 722924519, NULL, 968382738, NULL, NULL, 'hh8', 'Removedor Semiperman', 1, 9999.99, 0),
(70, 738517277, NULL, 968382738, NULL, NULL, 'hh8', 'Shampo Matizante Lum', 1, 7500.00, 0),
(71, 953965891, NULL, 968382738, NULL, NULL, 'hh8', 'Removedor Semiperman', 1, 9999.99, 0),
(72, 991965191, NULL, 968382738, NULL, NULL, 'kkk2', 'Removerdor Color Salerm Kit Color Revers', 1, 9999.99, 0),
(73, 3, NULL, 907177851, NULL, NULL, 'V2', 'Tratamiento', 1, 1.00, 0),
(74, 4, NULL, 907177851, NULL, NULL, 'V3', 'Acondicionador', 1, 3000.00, 0),
(75, 1, NULL, 907177851, NULL, NULL, 'll88', 'Loción Tónica Capila', 1, 1.28, 0),
(79, 1, NULL, NULL, 605795521, NULL, 'll88', 'Loción Tónica Capila', 1, 1.28, 0),
(80, 3, NULL, NULL, 605795521, NULL, 'V2', 'Tratamiento', 1, 1.00, 0),
(81, 4, NULL, NULL, 605795521, NULL, 'V3', 'Acondicionador', 1, 3000.00, 0),
(82, 61444201, NULL, NULL, 871097643, NULL, 'se333', 'logo sena', 1, 1.00, 0),
(83, 1, NULL, 823579301, NULL, NULL, 'll88', 'Loción Tónica Capila', 5, 1.28, 1),
(84, 2, NULL, 823579301, NULL, NULL, 'U1', 'Hidratante Seboregul', 2, 1.00, 1),
(85, 3, NULL, 823579301, NULL, NULL, 'V2', 'Tratamiento', 2, 1.00, 0),
(86, 4, NULL, 823579301, NULL, NULL, 'V3', 'Acondicionador', 2, 3000.00, 0),
(93, 2147483647, NULL, NULL, 681370733, NULL, 'h666', 'hello word', 3, 23.46, 1),
(94, 991965191, NULL, NULL, 681370733, NULL, 'kkk2', 'Removerdor Color Salerm Kit Color Revers', 3, 9999.99, 1),
(95, 991965191, NULL, 823579301, NULL, NULL, 'kkk2', 'Removerdor Color Salerm Kit Color Revers', 3, 9999.99, 0),
(96, 2147483647, NULL, 823579301, NULL, NULL, 'h666', 'hello word', 3, 23.46, 0),
(97, 2, NULL, NULL, 681370733, NULL, 'U1', 'Hidratante Seboregul', 3, 1.00, 1),
(98, 3, NULL, NULL, 681370733, NULL, 'V2', 'Tratamiento', 3, 1.00, 1),
(99, 886548893, NULL, NULL, 681370733, NULL, 'V3', ' jl´mplpo', 5, 22.34, 0),
(100, 953965891, NULL, NULL, 681370733, NULL, 'hh8', 'Removedor Semiperman', 3, 9999.99, 0),
(101, 5, NULL, 313334542, NULL, NULL, 'V3', 'Acondicionador', 10, 3000.00, 1),
(102, 4, NULL, 313334542, NULL, NULL, 'V3', 'Acondicionador', 1, 3000.00, 1),
(103, 2, NULL, 313334542, NULL, NULL, 'U1', 'Hidratante Seboregul', 5555, 1.00, 1),
(104, 80422484, NULL, 313334542, NULL, NULL, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 1, 39.00, 1),
(105, 1, NULL, 313334542, NULL, NULL, 'll88', 'Loción Tónica Capila', 1, 1.28, 1),
(106, 3, NULL, 91094119, NULL, NULL, 'V2', 'Tratamiento', 5, 1.00, 0),
(107, 4, NULL, 91094119, NULL, NULL, 'V3', 'Acondicionador', 4, 1000.00, 0),
(108, 5, NULL, 91094119, NULL, NULL, 'V3', 'Acondicionador', 7, 1000.00, 0),
(109, 6, NULL, 91094119, NULL, NULL, 'U2', 'Cera', 1, 1000.00, 0),
(110, 3, NULL, 558810812, NULL, NULL, 'V2', 'Tratamiento', 1, 1.00, 0),
(111, 229738038, NULL, 354755849, NULL, NULL, '56780', 'personas', 1, 20.00, 1),
(112, 230711700, NULL, 354755849, NULL, NULL, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 1, 39.00, 1),
(113, 237176892, NULL, 354755849, NULL, NULL, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 4, 39.00, 0),
(114, 886548893, NULL, NULL, 221325555, NULL, 'V3', ' jl´mplpo', 1, 555.00, 0),
(115, 843931083, NULL, NULL, 221325555, NULL, 'V3', ' jl´mplpo', 1, 22.34, 0),
(116, 529712970, NULL, 354755849, NULL, NULL, 'holke', 'Alisado Kativa Sin Plancha Xtreme Care', 4, 39.00, 0),
(117, 843931083, NULL, 354755849, NULL, NULL, 'V3', ' jl´mplpo', 1, 22.34, 0),
(118, 886548893, NULL, 523580918, NULL, NULL, 'V3', ' jl´mplpo', 2, 555.00, 0),
(119, 886548893, NULL, 100298830, NULL, NULL, 'V3', ' jl´mplpo', 5, 555.00, 0),
(120, 843931083, NULL, 100298830, NULL, NULL, 'V3', ' jl´mplpo', 5, 22.34, 0),
(121, 4, NULL, 100298830, NULL, NULL, 'V3', 'Acondicionador', 5, 1000.00, 0),
(122, 5, NULL, 100298830, NULL, NULL, 'V3', 'Acondicionador', 5, 1000.00, 0),
(123, 80422484, NULL, 102553640, NULL, NULL, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 10, 39.00, 0),
(124, 851030242, NULL, 102553640, NULL, NULL, 'dddddddddddddddddddd', 'dddddddddddddddddddddddddddddddddddddddddddddddddd', 10, 1000.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefoto`
--

CREATE TABLE `detallefoto` (
  `idFoto` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `IdServicios` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `fotoProducto` varchar(300) NOT NULL,
  `fotoServicio1` varchar(300) NOT NULL,
  `fotoPerfilUsuario` varchar(300) NOT NULL,
  `fotoBiografiaUsuario` varchar(300) NOT NULL,
  `fotoPerfilCliente` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallefoto`
--

INSERT INTO `detallefoto` (`idFoto`, `idProducto`, `IdServicios`, `idUser`, `idCliente`, `fotoProducto`, `fotoServicio1`, `fotoPerfilUsuario`, `fotoBiografiaUsuario`, `fotoPerfilCliente`) VALUES
(1, NULL, NULL, 2, NULL, '', '', '/image/perfilUsuario/2/perfilUsuario.jpg', '', ''),
(2, NULL, NULL, 12, NULL, '', '', 'img/prueba.jpg', '', ''),
(3, 1, NULL, NULL, NULL, 'image/465728268/1.jpg', '', '', '', ''),
(4, NULL, NULL, NULL, 8, '', '', '', '', '/image/perfilCliente/8/perfilCliente.jpg'),
(5, NULL, NULL, NULL, 1, '', '', '', '', '/imagen'),
(27, 465728268, NULL, NULL, NULL, 'image/465728268/1.jpg', '', '', '', ''),
(28, 465728268, NULL, NULL, NULL, 'image/465728268/2.jpg', '', '', '', ''),
(29, 465728268, NULL, NULL, NULL, 'image/465728268/3.jpg', '', '', '', ''),
(30, 465728268, NULL, NULL, NULL, 'image/465728268/4.jpg', '', '', '', ''),
(31, 465728268, NULL, NULL, NULL, 'image/465728268/5.jpg', '', '', '', ''),
(32, 738517277, NULL, NULL, NULL, 'image/738517277/1.jpg', '', '', '', ''),
(33, 738517277, NULL, NULL, NULL, 'image/738517277/2.jpg', '', '', '', ''),
(34, 738517277, NULL, NULL, NULL, 'image/738517277/3.jpg', '', '', '', ''),
(35, 738517277, NULL, NULL, NULL, 'image/738517277/4.jpg', '', '', '', ''),
(36, 738517277, NULL, NULL, NULL, 'image/738517277/5.jpg', '', '', '', ''),
(37, 696970008, NULL, NULL, NULL, 'image/696970008/1.jpg', '', '', '', ''),
(38, 696970008, NULL, NULL, NULL, 'image/696970008/2.jpg', '', '', '', ''),
(39, 696970008, NULL, NULL, NULL, 'image/696970008/3.jpg', '', '', '', ''),
(40, 696970008, NULL, NULL, NULL, 'image/696970008/4.jpg', '', '', '', ''),
(41, 696970008, NULL, NULL, NULL, 'image/696970008/5.jpg', '', '', '', ''),
(42, 953965891, NULL, NULL, NULL, 'image/953965891/1.jpg', '', '', '', ''),
(43, 953965891, NULL, NULL, NULL, 'image/953965891/2.jpg', '', '', '', ''),
(44, 953965891, NULL, NULL, NULL, 'image/953965891/3.jpg', '', '', '', ''),
(45, 953965891, NULL, NULL, NULL, 'image/953965891/4.jpg', '', '', '', ''),
(46, 953965891, NULL, NULL, NULL, 'image/953965891/5.jpg', '', '', '', ''),
(47, 528300964, NULL, NULL, NULL, 'image/528300964/1.jpg', '', '', '', ''),
(48, 528300964, NULL, NULL, NULL, 'image/528300964/2.jpg', '', '', '', ''),
(49, 528300964, NULL, NULL, NULL, 'image/528300964/3.jpg', '', '', '', ''),
(50, 528300964, NULL, NULL, NULL, 'image/528300964/4.jpg', '', '', '', ''),
(51, 528300964, NULL, NULL, NULL, 'image/528300964/5.jpg', '', '', '', ''),
(52, 722924519, NULL, NULL, NULL, 'image/722924519/1.jpg', '', '', '', ''),
(53, 722924519, NULL, NULL, NULL, 'image/722924519/2.jpg', '', '', '', ''),
(54, 722924519, NULL, NULL, NULL, 'image/722924519/3.jpg', '', '', '', ''),
(55, 722924519, NULL, NULL, NULL, 'image/722924519/4.jpg', '', '', '', ''),
(56, 722924519, NULL, NULL, NULL, 'image/722924519/5.jpg', '', '', '', ''),
(57, 991965191, NULL, NULL, NULL, 'image/991965191/1.jpg', '', '', '', ''),
(58, 991965191, NULL, NULL, NULL, 'image/991965191/2.jpg', '', '', '', ''),
(59, 991965191, NULL, NULL, NULL, 'image/991965191/3.jpg', '', '', '', ''),
(60, 991965191, NULL, NULL, NULL, 'image/991965191/4.jpg', '', '', '', ''),
(61, 991965191, NULL, NULL, NULL, 'image/991965191/5.jpg', '', '', '', ''),
(62, 240663579, NULL, NULL, NULL, 'image/240663579/1.jpg', '', '', '', ''),
(63, 240663579, NULL, NULL, NULL, 'image/240663579/2.jpg', '', '', '', ''),
(64, 240663579, NULL, NULL, NULL, 'image/240663579/3.jpg', '', '', '', ''),
(65, 240663579, NULL, NULL, NULL, 'image/240663579/4.jpg', '', '', '', ''),
(66, 240663579, NULL, NULL, NULL, 'image/240663579/5.jpg', '', '', '', ''),
(67, 229738038, NULL, NULL, NULL, 'image/229738038/1.jpg', '', '', '', ''),
(68, 229738038, NULL, NULL, NULL, 'image/229738038/2.jpg', '', '', '', ''),
(69, 229738038, NULL, NULL, NULL, 'image/229738038/3.jpg', '', '', '', ''),
(70, 229738038, NULL, NULL, NULL, 'image/229738038/4.jpg', '', '', '', ''),
(71, 742622966, NULL, NULL, NULL, 'image/742622966/1.jpg', '', '', '', ''),
(72, 742622966, NULL, NULL, NULL, 'image/742622966/2.jpg', '', '', '', ''),
(73, 742622966, NULL, NULL, NULL, 'image/742622966/3.jpg', '', '', '', ''),
(74, 742622966, NULL, NULL, NULL, 'image/742622966/4.jpg', '', '', '', ''),
(75, 539238410, NULL, NULL, NULL, 'image/539238410/1.jpg', '', '', '', ''),
(76, 539238410, NULL, NULL, NULL, 'image/539238410/2.jpg', '', '', '', ''),
(77, 539238410, NULL, NULL, NULL, 'image/539238410/3.jpg', '', '', '', ''),
(78, 539238410, NULL, NULL, NULL, 'image/539238410/4.jpg', '', '', '', ''),
(79, 758643294, NULL, NULL, NULL, 'image/758643294/1.jpg', '', '', '', ''),
(80, 758643294, NULL, NULL, NULL, 'image/758643294/2.jpg', '', '', '', ''),
(81, 758643294, NULL, NULL, NULL, 'image/758643294/3.jpg', '', '', '', ''),
(82, 758643294, NULL, NULL, NULL, 'image/758643294/4.jpg', '', '', '', ''),
(83, 873966367, NULL, NULL, NULL, 'image/873966367/1.jpg', '', '', '', ''),
(84, 873966367, NULL, NULL, NULL, 'image/873966367/2.jpg', '', '', '', ''),
(85, 873966367, NULL, NULL, NULL, 'image/873966367/3.jpg', '', '', '', ''),
(86, 873966367, NULL, NULL, NULL, 'image/873966367/4.jpg', '', '', '', ''),
(87, 374915030, NULL, NULL, NULL, 'image/374915030/1.jpg', '', '', '', ''),
(88, 374915030, NULL, NULL, NULL, 'image/374915030/2.jpg', '', '', '', ''),
(89, 374915030, NULL, NULL, NULL, 'image/374915030/3.jpg', '', '', '', ''),
(90, 374915030, NULL, NULL, NULL, 'image/374915030/4.jpg', '', '', '', ''),
(91, 795219212, NULL, NULL, NULL, 'image/795219212/1.jpg', '', '', '', ''),
(92, 795219212, NULL, NULL, NULL, 'image/795219212/2.jpg', '', '', '', ''),
(93, 795219212, NULL, NULL, NULL, 'image/795219212/3.jpg', '', '', '', ''),
(94, 795219212, NULL, NULL, NULL, 'image/795219212/4.jpg', '', '', '', ''),
(95, 795219212, NULL, NULL, NULL, 'image/795219212/5.jpg', '', '', '', ''),
(96, 428348885, NULL, NULL, NULL, 'image/428348885/1.jpg', '', '', '', ''),
(97, 428348885, NULL, NULL, NULL, 'image/428348885/2.jpg', '', '', '', ''),
(98, 428348885, NULL, NULL, NULL, 'image/428348885/3.jpg', '', '', '', ''),
(99, 428348885, NULL, NULL, NULL, 'image/428348885/4.jpg', '', '', '', ''),
(100, 428348885, NULL, NULL, NULL, 'image/428348885/5.jpg', '', '', '', ''),
(101, 793528947, NULL, NULL, NULL, 'image/793528947/1.jpg', '', '', '', ''),
(102, 793528947, NULL, NULL, NULL, 'image/793528947/2.jpg', '', '', '', ''),
(103, 793528947, NULL, NULL, NULL, 'image/793528947/3.jpg', '', '', '', ''),
(104, 793528947, NULL, NULL, NULL, 'image/793528947/4.jpg', '', '', '', ''),
(105, 80422484, NULL, NULL, NULL, 'image/80422484/1.jpg', '', '', '', ''),
(106, 80422484, NULL, NULL, NULL, 'image/80422484/2.jpg', '', '', '', ''),
(107, 80422484, NULL, NULL, NULL, 'image/80422484/3.jpg', '', '', '', ''),
(108, 80422484, NULL, NULL, NULL, 'image/80422484/4.jpg', '', '', '', ''),
(109, 529712970, NULL, NULL, NULL, 'image/529712970/1.jpg', '', '', '', ''),
(110, 529712970, NULL, NULL, NULL, 'image/529712970/2.jpg', '', '', '', ''),
(111, 529712970, NULL, NULL, NULL, 'image/529712970/3.jpg', '', '', '', ''),
(112, 529712970, NULL, NULL, NULL, 'image/529712970/4.jpg', '', '', '', ''),
(113, 367684771, NULL, NULL, NULL, 'image/367684771/1.jpg', '', '', '', ''),
(114, 367684771, NULL, NULL, NULL, 'image/367684771/2.jpg', '', '', '', ''),
(115, 367684771, NULL, NULL, NULL, 'image/367684771/3.jpg', '', '', '', ''),
(116, 367684771, NULL, NULL, NULL, 'image/367684771/4.jpg', '', '', '', ''),
(117, 304722426, NULL, NULL, NULL, 'image/304722426/1.jpg', '', '', '', ''),
(118, 304722426, NULL, NULL, NULL, 'image/304722426/2.jpg', '', '', '', ''),
(119, 304722426, NULL, NULL, NULL, 'image/304722426/3.jpg', '', '', '', ''),
(120, 304722426, NULL, NULL, NULL, 'image/304722426/4.jpg', '', '', '', ''),
(121, 237176892, NULL, NULL, NULL, 'image/237176892/1.jpg', '', '', '', ''),
(122, 237176892, NULL, NULL, NULL, 'image/237176892/2.jpg', '', '', '', ''),
(123, 237176892, NULL, NULL, NULL, 'image/237176892/3.jpg', '', '', '', ''),
(124, 237176892, NULL, NULL, NULL, 'image/237176892/4.jpg', '', '', '', ''),
(125, 230711700, NULL, NULL, NULL, 'image/230711700/1.jpg', '', '', '', ''),
(126, 230711700, NULL, NULL, NULL, 'image/230711700/2.jpg', '', '', '', ''),
(127, 230711700, NULL, NULL, NULL, 'image/230711700/3.jpg', '', '', '', ''),
(128, 230711700, NULL, NULL, NULL, 'image/230711700/4.jpg', '', '', '', ''),
(129, 111209124, NULL, NULL, NULL, 'image/111209124/1.jpg', '', '', '', ''),
(130, 111209124, NULL, NULL, NULL, 'image/111209124/2.jpg', '', '', '', ''),
(131, 111209124, NULL, NULL, NULL, 'image/111209124/3.jpg', '', '', '', ''),
(132, 111209124, NULL, NULL, NULL, 'image/111209124/4.jpg', '', '', '', ''),
(133, 454322855, NULL, NULL, NULL, 'image/454322855/1.jpg', '', '', '', ''),
(134, 454322855, NULL, NULL, NULL, 'image/454322855/2.jpg', '', '', '', ''),
(135, 454322855, NULL, NULL, NULL, 'image/454322855/3.jpg', '', '', '', ''),
(136, 454322855, NULL, NULL, NULL, 'image/454322855/4.jpg', '', '', '', ''),
(137, 469312493, NULL, NULL, NULL, 'image/469312493/1.jpg', '', '', '', ''),
(138, 469312493, NULL, NULL, NULL, 'image/469312493/2.jpg', '', '', '', ''),
(139, 469312493, NULL, NULL, NULL, 'image/469312493/3.jpg', '', '', '', ''),
(140, 469312493, NULL, NULL, NULL, 'image/469312493/4.jpg', '', '', '', ''),
(141, 469312493, NULL, NULL, NULL, 'image/469312493/5.jpg', '', '', '', ''),
(142, 843931083, NULL, NULL, NULL, 'image/843931083/1.jpg', '', '', '', ''),
(143, 843931083, NULL, NULL, NULL, 'image/843931083/2.jpg', '', '', '', ''),
(144, 843931083, NULL, NULL, NULL, 'image/843931083/3.jpg', '', '', '', ''),
(145, 843931083, NULL, NULL, NULL, 'image/843931083/4.jpg', '', '', '', ''),
(146, 886548893, NULL, NULL, NULL, 'image/886548893/1.jpg', '', '', '', ''),
(147, 886548893, NULL, NULL, NULL, 'image/886548893/2.jpg', '', '', '', ''),
(148, 886548893, NULL, NULL, NULL, 'image/886548893/3.jpg', '', '', '', ''),
(149, 886548893, NULL, NULL, NULL, 'image/886548893/4.jpg', '', '', '', ''),
(150, 583244064, NULL, NULL, NULL, 'image/583244064/1.jpg', '', '', '', ''),
(151, 583244064, NULL, NULL, NULL, 'image/583244064/2.jpg', '', '', '', ''),
(152, 583244064, NULL, NULL, NULL, 'image/583244064/3.jpg', '', '', '', ''),
(153, 583244064, NULL, NULL, NULL, 'image/583244064/4.jpg', '', '', '', ''),
(154, 571803423, NULL, NULL, NULL, 'image/571803423/1.jpg', '', '', '', ''),
(155, 571803423, NULL, NULL, NULL, 'image/571803423/2.jpg', '', '', '', ''),
(156, 571803423, NULL, NULL, NULL, 'image/571803423/3.jpg', '', '', '', ''),
(157, 571803423, NULL, NULL, NULL, 'image/571803423/4.jpg', '', '', '', ''),
(158, 343607908, NULL, NULL, NULL, 'image/343607908/1.jpg', '', '', '', ''),
(159, 343607908, NULL, NULL, NULL, 'image/343607908/2.jpg', '', '', '', ''),
(160, 343607908, NULL, NULL, NULL, 'image/343607908/3.jpg', '', '', '', ''),
(161, 343607908, NULL, NULL, NULL, 'image/343607908/4.jpg', '', '', '', ''),
(162, 633945696, NULL, NULL, NULL, 'image/633945696/1.jpg', '', '', '', ''),
(163, 633945696, NULL, NULL, NULL, 'image/633945696/2.jpg', '', '', '', ''),
(164, 633945696, NULL, NULL, NULL, 'image/633945696/3.jpg', '', '', '', ''),
(165, 633945696, NULL, NULL, NULL, 'image/633945696/4.jpg', '', '', '', ''),
(170, 61444201, NULL, NULL, NULL, 'image/61444201/1.jpg', '', '', '', ''),
(171, 61444201, NULL, NULL, NULL, 'image/61444201/2.jpg', '', '', '', ''),
(172, 61444201, NULL, NULL, NULL, 'image/61444201/3.jpg', '', '', '', ''),
(173, 61444201, NULL, NULL, NULL, 'image/61444201/4.jpg', '', '', '', ''),
(174, 61444201, NULL, NULL, NULL, 'image/61444201/5.jpg', '', '', '', ''),
(175, NULL, 414781051, NULL, NULL, 'image/414781051/1.jpg', '', '', '', ''),
(176, NULL, 414781051, NULL, NULL, 'image/414781051/2.jpg', '', '', '', ''),
(177, NULL, 414781051, NULL, NULL, 'image/414781051/3.jpg', '', '', '', ''),
(178, NULL, 414781051, NULL, NULL, 'image/414781051/4.jpg', '', '', '', ''),
(179, NULL, 430397162, NULL, NULL, 'image/430397162/1.jpg', '', '', '', ''),
(180, NULL, 430397162, NULL, NULL, 'image/430397162/2.jpg', '', '', '', ''),
(181, NULL, 430397162, NULL, NULL, 'image/430397162/3.jpg', '', '', '', ''),
(182, NULL, 430397162, NULL, NULL, 'image/430397162/4.jpg', '', '', '', ''),
(183, NULL, 973137042, NULL, NULL, 'image/973137042/1.jpg', '', '', '', ''),
(184, NULL, 973137042, NULL, NULL, 'image/973137042/2.jpg', '', '', '', ''),
(185, NULL, 973137042, NULL, NULL, 'image/973137042/3.jpg', '', '', '', ''),
(186, NULL, 973137042, NULL, NULL, 'image/973137042/4.jpg', '', '', '', ''),
(187, NULL, 863499110, NULL, NULL, 'image/863499110/1.jpg', '', '', '', ''),
(188, NULL, 863499110, NULL, NULL, 'image/863499110/2.jpg', '', '', '', ''),
(189, NULL, 863499110, NULL, NULL, 'image/863499110/3.jpg', '', '', '', ''),
(190, NULL, 863499110, NULL, NULL, 'image/863499110/4.jpg', '', '', '', ''),
(191, NULL, 863499110, NULL, NULL, 'image/863499110/1.jpg', '', '', '', ''),
(192, NULL, 706987728, NULL, NULL, 'image/706987728/1.jpg', '', '', '', ''),
(193, NULL, 706987728, NULL, NULL, 'image/706987728/2.jpg', '', '', '', ''),
(194, NULL, 706987728, NULL, NULL, 'image/706987728/3.jpg', '', '', '', ''),
(195, NULL, 706987728, NULL, NULL, 'image/706987728/4.jpg', '', '', '', ''),
(196, NULL, 109170837, NULL, NULL, 'image/109170837/1.jpg', '', '', '', ''),
(197, NULL, 109170837, NULL, NULL, 'image/109170837/2.jpg', '', '', '', ''),
(198, NULL, 109170837, NULL, NULL, 'image/109170837/3.jpg', '', '', '', ''),
(199, NULL, 109170837, NULL, NULL, 'image/109170837/4.jpg', '', '', '', ''),
(200, NULL, 681370733, NULL, NULL, 'image/681370733/1.jpg', '', '', '', ''),
(201, NULL, 681370733, NULL, NULL, 'image/681370733/2.jpg', '', '', '', ''),
(202, NULL, 681370733, NULL, NULL, 'image/681370733/3.jpg', '', '', '', ''),
(203, NULL, 681370733, NULL, NULL, 'image/681370733/4.jpg', '', '', '', ''),
(204, NULL, 605795521, NULL, NULL, 'image/605795521/1.jpg', '', '', '', ''),
(205, NULL, 605795521, NULL, NULL, 'image/605795521/2.jpg', '', '', '', ''),
(206, NULL, 605795521, NULL, NULL, 'image/605795521/3.jpg', '', '', '', ''),
(207, NULL, 605795521, NULL, NULL, 'image/605795521/4.jpg', '', '', '', ''),
(208, NULL, 871097643, NULL, NULL, 'image/871097643/1.jpg', '', '', '', ''),
(209, NULL, 871097643, NULL, NULL, 'image/871097643/2.jpg', '', '', '', ''),
(210, NULL, 871097643, NULL, NULL, 'image/871097643/3.jpg', '', '', '', ''),
(211, NULL, 871097643, NULL, NULL, 'image/871097643/4.jpg', '', '', '', ''),
(212, 420848004, NULL, NULL, NULL, 'image/420848004/1.jpg', '', '', '', ''),
(213, 420848004, NULL, NULL, NULL, 'image/420848004/2.jpg', '', '', '', ''),
(214, 420848004, NULL, NULL, NULL, 'image/420848004/3.jpg', '', '', '', ''),
(215, 420848004, NULL, NULL, NULL, 'image/420848004/4.jpg', '', '', '', ''),
(216, 851030242, NULL, NULL, NULL, 'image/851030242/1.jpg', '', '', '', ''),
(217, 851030242, NULL, NULL, NULL, 'image/851030242/2.jpg', '', '', '', ''),
(218, 851030242, NULL, NULL, NULL, 'image/851030242/3.jpg', '', '', '', ''),
(219, 851030242, NULL, NULL, NULL, 'image/851030242/4.jpg', '', '', '', ''),
(220, 519784866, NULL, NULL, NULL, 'image/519784866/1.jpg', '', '', '', ''),
(221, 519784866, NULL, NULL, NULL, 'image/519784866/2.jpg', '', '', '', ''),
(222, 519784866, NULL, NULL, NULL, 'image/519784866/3.jpg', '', '', '', ''),
(223, 519784866, NULL, NULL, NULL, 'image/519784866/4.jpg', '', '', '', ''),
(224, NULL, 221325555, NULL, NULL, 'image/221325555/1.jpg', '', '', '', ''),
(225, NULL, 221325555, NULL, NULL, 'image/221325555/2.jpg', '', '', '', ''),
(226, NULL, 221325555, NULL, NULL, 'image/221325555/3.jpg', '', '', '', ''),
(227, NULL, 221325555, NULL, NULL, 'image/221325555/4.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nombreEmpresa` varchar(50) NOT NULL,
  `Nit` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombreEmpresa`, `Nit`, `direccion`, `eliminado`) VALUES
(1, 'Empresa1', 'NIT123', 'crr', 0),
(2, 'Empresa3', 'NIT121', 'Crr 18 n 24 a 3', 1),
(3, 'caliche', '5665565', '3', 0),
(4, 'Coca cola', '4568', 'crr 18 n 24 a 34', 0),
(5, 'FabricaFrutaa', 'lo45687458', 'crr 18 n 24 a 34', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idReservacion` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `codigoFactura` varchar(50) NOT NULL,
  `documentoIdentidad` int(11) NOT NULL,
  `responsableFactura` varchar(50) NOT NULL,
  `fechaFactura` date NOT NULL,
  `horaFactura` time NOT NULL,
  `valorTotal` decimal(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `idReservacion`, `idUser`, `idCliente`, `codigoFactura`, `documentoIdentidad`, `responsableFactura`, `fechaFactura`, `horaFactura`, `valorTotal`, `eliminado`) VALUES
(0, 1, 8, 1, '232435454', 1006700633, 'Aleja', '2021-09-01', '11:05:00', '457.00', 0),
(1, NULL, 6, 1, '24072021', 1006700633, 'jimena olaya', '2021-08-17', '00:00:00', '2000.00', 0),
(2, NULL, 1, 1, '23072021', 1006700633, 'jimena olaya', '2021-07-23', '00:00:00', '2000.00', 0),
(3, 814176324, 2, 1, '160750023', 2147483647, 'Alejandra Perez', '2021-08-28', '21:03:40', '0.00', 0),
(4, 814176324, 2, 1, '428832960', 2147483647, 'Alejandra Perez', '2021-08-28', '21:03:40', '0.00', 0),
(5, 814176324, 2, 1, '246643855', 2147483647, 'Alejandra Perez', '2021-08-28', '21:03:40', '0.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `IdInventario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `ingresos` double(6,2) NOT NULL,
  `gastos` double(6,2) NOT NULL,
  `montaje` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idModulo` int(11) NOT NULL,
  `nombreModulo` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idModulo`, `nombreModulo`, `icono`, `eliminado`) VALUES
(1, 'Configuraciones', 'fas fa-users-cog', 0),
(2, 'Inventario', 'fas fa-clipboard-check', 0),
(3, 'Cajero', 'fas fa-dollar-sign', 0),
(4, 'Productos', 'fas fa-dolly-flatbed', 0),
(5, 'Cliente', 'fas fa-users', 0),
(6, 'PRUEBA', '', 1),
(7, 'Cargos', 'fas fa-id-card-alt', 0),
(8, 'Servicios', 'fas fa-cut', 0),
(9, 'Reservaciones', 'fas fa-calendar-plus', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `idPagina` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `nombrePagina` varchar(50) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `requireSession` tinyint(1) NOT NULL,
  `menu` tinyint(1) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`idPagina`, `idModulo`, `nombrePagina`, `enlace`, `requireSession`, `menu`, `eliminado`) VALUES
(2, 3, 'Cajero', 'view/cajero.php', 1, 1, 0),
(3, 5, 'Inicio', 'view/', 0, 0, 0),
(4, 5, 'Galeria', 'view/', 0, 0, 0),
(5, 5, 'Productos', 'view/', 1, 0, 0),
(6, 5, 'Servicios', 'view/', 1, 0, 0),
(7, 5, 'Listar_reservaciones', 'view/listarReservacion.php', 1, 0, 0),
(8, 5, 'Crear_reservacion', 'view/nuevaReservacion.php', 1, 0, 0),
(9, 5, 'Editar_reservacion', 'view/formularioEditarReservacion.php', 1, 0, 0),
(10, 5, 'Perfil_cliente', 'view/perfilCliente.php', 1, 0, 0),
(18, 6, 'cajero', 'view/cajero.php', 1, 0, 0),
(21, 1, 'Mostrar Pagina', 'view/listarPagina.php', 1, 0, 0),
(22, 1, 'Crear Usuario', 'view/nuevoUsuario.php', 1, 0, 0),
(23, 1, 'Crear Rol', 'view/nuevoRol.php', 1, 0, 0),
(24, 1, 'Actualizar Rol', 'view/formularioEditarRol.php', 1, 0, 0),
(25, 1, 'Crear Modulo', 'view/nuevoModulo.php', 1, 0, 0),
(26, 1, 'Actualizar Modulo', 'view/formularioEditarModulo.php', 1, 0, 0),
(27, 1, 'Rol Detalle', 'view/listarDetalleRol.php', 1, 0, 0),
(28, 1, 'Actualizar Pagina', 'view/formularioEditarPagina.php', 1, 0, 0),
(29, 1, 'Modulos', 'view/listarModulo.php', 1, 1, 0),
(30, 1, 'Usuarios', 'view/listarUsuario.php', 1, 1, 0),
(31, 1, 'Roles', 'view/listarRol.php', 1, 1, 0),
(33, 1, 'Seguimiento', 'view/seguimiento.php', 1, 1, 0),
(34, 1, 'Clientes', 'view/listarCliente.php', 1, 1, 0),
(35, 2, 'inventario', 'view/listarInventario.php', 1, 1, 0),
(36, 2, 'Empresa', 'view/listarEmpresa.php', 1, 1, 0),
(37, 2, 'Crear Empresa', 'view/nuevaEmpresa', 1, 0, 0),
(38, 2, 'Actuarlizar Empresa', 'View/formularioEditarEmpresa.php', 1, 0, 0),
(39, 2, 'Pedido', 'view/listarPedido.php', 1, 1, 0),
(41, 2, 'Crear Pedido', 'view/nuevoPedido.php', 1, 0, 0),
(42, 2, 'Actualizar Pedido', 'view/formularioEditarPedido.php', 1, 0, 0),
(43, 2, 'Detalle Pedido', 'view/detallePedido.php', 1, 0, 0),
(44, 2, 'Factura', 'view/listarFacturas.php', 1, 1, 0),
(45, 7, 'Crear Cargo', 'view/nuevoCargo.php', 1, 0, 0),
(46, 7, 'Cargos', 'view/listarCargo.php', 1, 1, 0),
(47, 7, 'Actualizar Cargo', 'view/formularioEditarCargo.php', 1, 0, 0),
(48, 4, 'Crear Producto', 'view/nuevoProducto.php', 1, 0, 0),
(49, 4, 'Producto', 'view/listarProducto.php', 1, 1, 0),
(50, 4, 'Actualizar Producto', 'view/formularioEditarProducto.php', 1, 0, 0),
(51, 8, 'Crear Servicios', 'view/nuevoServicio.php', 1, 0, 0),
(52, 8, 'Servicios', 'view/listarServicio.php', 1, 1, 0),
(53, 8, 'Actualizar Servicios', 'view/formularioEditarServicio.php', 1, 0, 0),
(54, 3, 'Factura', 'view/listarFacturas.php', 1, 1, 0),
(55, 3, 'Clientes', 'view/listarCliente.php', 1, 1, 0),
(56, 3, 'Mostrar Reservaciones', 'view/mostrarReservacion.php', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabrasclaves`
--

CREATE TABLE `palabrasclaves` (
  `idPalabraClave` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `IdServicios` int(11) DEFAULT NULL,
  `idTags` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `palabrasclaves`
--

INSERT INTO `palabrasclaves` (`idPalabraClave`, `idProducto`, `IdServicios`, `idTags`, `eliminado`) VALUES
(51, 111209124, NULL, 1, 0),
(52, 111209124, NULL, 2, 0),
(53, 111209124, NULL, 4, 0),
(54, 454322855, NULL, 3, 0),
(55, 454322855, NULL, 4, 0),
(56, 454322855, NULL, 5, 0),
(57, 469312493, NULL, 2, 0),
(58, 469312493, NULL, 4, 0),
(59, 843931083, NULL, 2, 0),
(61, 583244064, NULL, 2, 0),
(62, 571803423, NULL, 2, 0),
(64, 633945696, NULL, 2, 0),
(66, 61444201, NULL, 1, 0),
(67, 61444201, NULL, 2, 0),
(68, 61444201, NULL, 3, 0),
(69, 61444201, NULL, 4, 0),
(70, 61444201, NULL, 6, 0),
(71, NULL, 414781051, 3, 0),
(72, NULL, 414781051, 10, 0),
(73, NULL, 430397162, 3, 0),
(74, NULL, 430397162, 10, 0),
(75, NULL, 973137042, 3, 0),
(76, NULL, 973137042, 10, 0),
(77, NULL, 863499110, 2, 0),
(78, NULL, 863499110, 3, 0),
(79, NULL, 706987728, 3, 0),
(80, NULL, 706987728, 10, 0),
(81, NULL, 109170837, 3, 0),
(82, NULL, 109170837, 10, 0),
(85, NULL, 605795521, 2, 0),
(86, NULL, 605795521, 3, 0),
(87, NULL, 871097643, 2, 0),
(112, NULL, 681370733, 2, 0),
(113, NULL, 681370733, 3, 0),
(117, 343607908, NULL, 2, 0),
(118, 343607908, NULL, 3, 0),
(119, 343607908, NULL, 4, 0),
(120, 343607908, NULL, 9, 0),
(124, 886548893, NULL, 2, 0),
(125, 886548893, NULL, 3, 0),
(126, 886548893, NULL, 11, 0),
(127, 420848004, NULL, 2, 0),
(128, 420848004, NULL, 4, 0),
(129, 851030242, NULL, 1, 0),
(130, 851030242, NULL, 2, 0),
(131, 851030242, NULL, 3, 0),
(132, 851030242, NULL, 4, 0),
(133, 851030242, NULL, 8, 0),
(134, 851030242, NULL, 9, 0),
(135, 851030242, NULL, 10, 0),
(136, 851030242, NULL, 11, 0),
(137, 519784866, NULL, 2, 0),
(138, 519784866, NULL, 8, 0),
(139, 519784866, NULL, 9, 0),
(140, NULL, 221325555, 1, 0),
(141, NULL, 221325555, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `documentoIdentidad` int(11) NOT NULL,
  `responsablePedido` varchar(100) NOT NULL,
  `Nit` varchar(50) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fechaPedido` date NOT NULL,
  `entregaPedido` tinyint(1) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idEmpresa`, `documentoIdentidad`, `responsablePedido`, `Nit`, `empresa`, `direccion`, `fechaPedido`, `entregaPedido`, `eliminado`) VALUES
(111101, 1, 1006700633, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-22', 1, 0),
(50704385, 1, 5435345, 'Aleja pedraza', 'NIT123', 'Empresa1', 'crr', '2021-08-17', 0, 1),
(55016541, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-26', 0, 0),
(88328668, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-26', 0, 0),
(91094119, 3, 21474836, 'Alejandra Perez', '5665565', 'caliche', '3', '2021-10-14', 0, 0),
(96510647, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-09-13', 0, 0),
(100298830, 3, 21474836, 'Alejandra Perez', '5665565', 'caliche', '3', '2021-10-15', 1, 0),
(102553640, 1, 21474836, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-10-15', 1, 0),
(106533512, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-09-08', 1, 0),
(132436115, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-21', 1, 0),
(179821511, 1, 0, 'Aleja ', 'NIT123', 'Empresa1', 'crr', '2021-08-17', 1, 1),
(211800008, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-16', 0, 0),
(239250622, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
(246812793, 1, 64739, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-26', 0, 0),
(269095276, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-21', 0, 0),
(277952570, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 1, 0),
(296492338, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-20', 0, 0),
(307530109, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-20', 0, 0),
(313334542, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-10-14', 0, 0),
(338879597, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-09-22', 0, 0),
(354755849, 4, 21474836, 'Alejandra Perez', '4568', 'Coca cola', 'crr 18 n 24 a 34', '2021-10-15', 1, 0),
(363921012, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-13', 1, 0),
(464080926, 2, 5435345, 'Aleja pedraza', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-17', 0, 0),
(523580918, 4, 21474836, 'Alejandra Perez', '4568', 'Coca cola', 'crr 18 n 24 a 34', '2021-10-15', 1, 0),
(558810812, 1, 21474836, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-10-14', 0, 0),
(564924075, 2, 5435345, 'Aleja pedraza', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-09-20', 0, 0),
(571370830, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-09-13', 0, 1),
(591311444, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
(594031540, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-16', 0, 0),
(674162799, 2, 5435345, 'Aleja pedraza', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-17', 0, 0),
(686774842, 2, 5435345, 'Aleja pedraza', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-17', 0, 1),
(702719052, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-21', 0, 0),
(705061606, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 1, 0),
(823579301, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-10-13', 0, 0),
(907177851, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-25', 1, 0),
(934417953, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
(968382738, 1, 2147483647, 'Alejandra Perez', 'NIT123', 'Empresa1', 'crr', '2021-09-22', 0, 0),
(992933774, 2, 5435345, 'Aleja pedraza', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-17', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idRol` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `IdPagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idRol`, `idModulo`, `IdPagina`) VALUES
(1, 1, 21),
(1, 1, 22),
(1, 1, 23),
(1, 1, 24),
(1, 1, 25),
(1, 1, 26),
(1, 1, 27),
(1, 1, 28),
(1, 1, 29),
(1, 1, 30),
(1, 1, 31),
(1, 1, 33),
(1, 1, 34),
(1, 2, 35),
(1, 2, 36),
(1, 2, 37),
(1, 2, 38),
(1, 2, 39),
(1, 2, 41),
(1, 2, 42),
(1, 2, 43),
(1, 2, 44),
(1, 3, 2),
(1, 3, 54),
(1, 3, 55),
(1, 3, 56),
(1, 4, 48),
(1, 4, 49),
(1, 4, 50),
(1, 5, 3),
(1, 5, 4),
(1, 5, 5),
(1, 5, 6),
(1, 5, 7),
(1, 5, 8),
(1, 5, 9),
(1, 5, 10),
(1, 7, 45),
(1, 7, 46),
(1, 7, 47),
(1, 8, 51),
(1, 8, 52),
(1, 8, 53),
(2, 3, 2),
(2, 3, 54),
(2, 3, 55),
(2, 3, 56),
(3, 2, 35),
(3, 2, 36),
(3, 2, 37),
(3, 2, 38),
(3, 2, 39),
(3, 2, 41),
(3, 2, 42),
(3, 2, 43),
(3, 2, 44),
(3, 4, 48),
(3, 4, 49),
(3, 4, 50),
(3, 8, 51),
(3, 8, 52),
(3, 8, 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `codigoProducto` varchar(100) NOT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `descripcionProducto` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `caracteristicas` varchar(500) NOT NULL,
  `valorUnitario` decimal(6,2) NOT NULL,
  `costoProducto` decimal(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `idCategoria`, `codigoProducto`, `nombreProducto`, `descripcionProducto`, `cantidad`, `caracteristicas`, `valorUnitario`, `costoProducto`, `eliminado`) VALUES
(1, 2, 'll88', 'Loción Tónica Capila', 'La Loción Tónica Capilar tiene extractos naturales de coco, romero, quina y sauce, que ayudan a nutrir y revitalizar el folículo piloso. Además contiene glicerina que ayuda a disminuir la resequedad d', 1, 'Marca	Maria Salome\nLínea	Prevención Caída\nTipo de tratamiento	Prevención Caída\nEs kit	No\nFormato de venta	Unidad\nUnidades por envase	1', '1.28', '0.00', 0),
(2, 2, 'U1', 'Hidratante Seboregul', 'Hidratante seboreguladora matificante, anribrillo, nti poros dilatados. Reduce los poros y el flujo de sebo, manteniendo a piel mate. Ideal para piel grasa con brillo persistente.', 0, 'Formato: Crema ligera no grasosa\nEs un producto hipoalergénico: Sí\nCon protección solar: No\nEs libre de parabenos: Sí\nEs testeado dermatológicamente: No\nFunciones: Efecto matificante inmediato y duraderoDía tras día,actúa en el origen para lograr un doble resultado en un solo gesto: acción anti-brillo + anti-poros dilatados. Hidrata hasta 8 horas.\nCantidad: 40\nTipo de unidad: mL', '1.00', '0.00', 0),
(3, 3, 'V2', 'Tratamiento', '', 1, 'recomendacion', '1.00', '0.00', 0),
(4, NULL, 'V3', 'Acondicionador', '', 10, 'Recomendaciones', '1000.00', '0.00', 0),
(5, NULL, 'V3', 'Acondicionador', '', 10, 'Recomendaciones', '1000.00', '0.00', 0),
(6, NULL, 'U2', 'Cera', '', 10, 'Recomendaciones', '1000.00', '0.00', 0),
(12, 3, 'Vital222', 'Igora Vital', 'El NUEVO Igora Vital contiene un tratamiento de 7 aceites y el Hair Resistant Complex, los aliados perfectos para disminuir el daño en cada coloración, gracias a esta nueva fórmula tendrás menos punta', 0, 'Descubre la exclusiva fórmula del NUEVO Igora Vital con máximo cuidado y máximo color que reúne todo lo que necesitas para conseguir un look único y natural. Gracias a la coloración permanente del NUEVO Igora Vital con protección extra que cuida mientras da color, tendrás un cabello más resistente al quiebre con un color intenso y duradero.\r\n\r\n¡El color y todo el cuidado se quedan en tu cabello!', '15.00', '0.00', 0),
(61444201, 2, 'se333', 'logo sena', 'gihndfojgnofjgno', 0, 'odjfgoldjfholkm', '1.00', '0.00', 0),
(80422484, NULL, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 'El Kit Anti-Frizz Keratin Alisado sin Plancha, un secador de pelo con boquilla concentradora, un cepillo plano, un peine de cerdas delgadas y una toalla.\r\nPaso 1: Dividir en dos partes el cabello lava', 11, 'Efectos: Alisado,Hidratar,Reparar\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 150\r\nTipo de unidad: mL\r\n', '39.00', '0.00', 0),
(111209124, NULL, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 'El Kit Anti-Frizz Keratin Alisado sin Plancha, un secador de pelo con boquilla concentradora, un cepillo plano, un peine de cerdas delgadas y una toalla.\r\nPaso 1: Dividir en dos partes el cabello lava', 0, 'Efectos: Alisado,Hidratar,Reparar\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 150\r\nTipo de unidad: mL\r\n', '39.00', '0.00', 0),
(123563392, 3, '3456789', 'dfghjklñ', 'dfghjklñcvbinm', 0, 'ertyuiklñmliugyftd', '1000.00', '0.00', 0),
(229738038, NULL, '56780', 'personas', 'color azul pitufo', 0, 'alto BAJOS', '20.00', '0.00', 0),
(230711700, 3, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 'El Kit Anti-Frizz Keratin Alisado sin Plancha, un secador de pelo con boquilla concentradora, un cepillo plano, un peine de cerdas delgadas y una toalla.\r\nPaso 1: Dividir en dos partes el cabello lava', 0, 'Efectos: Alisado,Hidratar,Reparar\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 150\r\nTipo de unidad: mL\r\n', '39.00', '0.00', 0),
(237176892, NULL, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 'El Kit Anti-Frizz Keratin Alisado sin Plancha, un secador de pelo con boquilla concentradora, un cepillo plano, un peine de cerdas delgadas y una toalla.\r\nPaso 1: Dividir en dos partes el cabello lava', 0, 'Efectos: Alisado,Hidratar,Reparar\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 150\r\nTipo de unidad: mL\r\n', '39.00', '0.00', 0),
(240663579, 3, '73849', 'Foco', 'Color negro, gris y blanco', 0, 'Grande, ancho', '3.00', '0.00', 0),
(304722426, NULL, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 'El Kit Anti-Frizz Keratin Alisado sin Plancha, un secador de pelo con boquilla concentradora, un cepillo plano, un peine de cerdas delgadas y una toalla.\r\nPaso 1: Dividir en dos partes el cabello lava', 0, 'Efectos: Alisado,Hidratar,Reparar\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 150\r\nTipo de unidad: mL\r\n', '39.00', '0.00', 0),
(343607908, 3, '65hLKKNDF', 'HHHHaJKLN', '', 0, 'klSNZmgipgesjmLMND KLÑGNH', '22.34', '0.00', 0),
(367684771, NULL, 'tt2w67', 'Alisado Kativa Sin Plancha Xtreme Care', 'El Kit Anti-Frizz Keratin Alisado sin Plancha, un secador de pelo con boquilla concentradora, un cepillo plano, un peine de cerdas delgadas y una toalla.\r\nPaso 1: Dividir en dos partes el cabello lava', 0, 'Efectos: Alisado,Hidratar,Reparar\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 150\r\nTipo de unidad: mL\r\n', '39.00', '0.00', 0),
(374915030, NULL, 'aaa2', 'Letra a', 'primera letras del abecedario y vocales', 0, 'mayuscula y mimiscula', '40.00', '0.00', 0),
(420848004, 3, 'zzzzzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 0, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '1000.00', '0.00', 0),
(428348885, NULL, '67hjsl', 'Loción Igora Oxigent', 'Reveladora Cremosa 20 Vol 6% X50Ml', 0, 'Marca:\r\nIgora\r\nRegistro Invima:\r\nNSOC56377-13CO\r\nPresentación del Producto:\r\nFrasco\r\nCantidad:\r\n50 ml\r\nProfundidad ITEM:\r\n4.2 cm\r\nAncho ITEM:\r\n5.5 cm\r\nAltura ITEM\r\n15.9 cm', '4.80', '0.00', 0),
(454322855, NULL, '456ghj', 'Tinte Kuul Fantasia', 'Sistema de coloración que incorpora en su fórmula componentes nutritivos como la proteína de trigo y aceite mineral que brindan ingredientes esenciales para la regeneración del cabello, dando como res', 0, 'Tipo de producto: Tinte semipermanente\r\nMarca: Kuul\r\nPresentación: Pomo\r\nVolumen neto: 90 mL\r\nUnidades por envase: 1', '12.90', '0.00', 0),
(465728268, NULL, 'V111', 'Valmy Brillo Esmalte', 'Valmy Brillo Esmalte Anti-Mordidas 14ml\r\nFuerza de voluntad en una botella, para que tus uñas no sean esclavas de la ansiedad. Formulado especialmente para evitar la mordida de las uñas, mientras esti', 0, 'Tipo de esmalte: Tratamiento\r\nAcabado: Mate Natural\r\nEs un producto hipoalergénico: No\r\nEs libre de crueldad: Sí\r\nEs fortalecedor: No\r\nEs secado rápido: Sí\r\nCantidad de packs: 1\r\nCantidad: 14\r\nTipo de unidad: mL\r\nEs inflamable: Sí', '1000.00', '0.00', 0),
(469312493, 3, 'rtyuhijmo,', 'cvbnkml ,', 'fc hbjklñijhbni', 0, 'fygvhbknlñm,', '33.33', '0.00', 0),
(519784866, 2, 'ññl', 'Cera Depilatoria Elástica, Calent', '', 0, 'Efecty\r\nConoce otros medios de pago\r\nProductos promocionados Anuncia aquí\r\nOlla Calentadora Cera Depilatoria - Unidad a $36900\r\n$ 36.900\r\n12x3075 pesos$3.075\r\nEnvío gratis\r\nOlla Calentadora Cera Depilatoria - Unidad a $36900\r\nOlla Para Cera Depiladora, Olla - Unidad a $30500\r\n$ 30.500\r\n12x2541 pesos con 67 centavos$2.541,67\r\nOlla Para Cera Depiladora, Olla - Unidad a $30500\r\nKit Olla Depilatoria Incluye Cera - Unidad a $59900\r\n$ 59', '390.00', '9999.99', 0),
(528300964, NULL, 'hh8', 'Removedor Semiperman', 'Masglo Plus se convertirá en el aliado perfecto para las mujeres, ya que les dará a sus uñas todo lo que ellas desean, una gran variedad de colores y brillo perfecto por dos semanas*, ideal para combi', 10, 'Línea: Esmalte Semipermanente\r\nFormato del quitaesmalte: Líquido\r\nUnidades por envase: 1\r\nCon acetona: Sí\r\nCantidad: 60\r\nTipo de unidad: mL', '1000.00', '0.00', 0),
(529712970, NULL, 'holke', 'Alisado Kativa Sin Plancha Xtreme Care', '', 0, 'Efectos: Alisado,Hidratar,Reparar\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 150\r\nTipo de unidad: mL\r\n', '39.00', '0.00', 0),
(539238410, NULL, '56780', 'personas', 'color azul pitufo', 0, 'alto BAJOS', '20.00', '0.00', 0),
(571803423, 4, 'V3', ' jl´mplpo', 'km pkdmsiokmsf', 5, 'komdsfipkvm', '22.34', '0.00', 1),
(583244064, 4, 'V3', ' jl´mplpo', 'km pkdmsiokmsf', 8, 'komdsfipkvm', '22.34', '0.00', 1),
(633945696, 4, 'V3', ' jl´mplpo', 'km pkdmsiokmsf', 12, 'komdsfipkvm', '22.34', '0.00', 1),
(681604896, NULL, '2585', 'robot', 'robot metalico', 45, 'tiene latas y es gris', '55.56', '0.00', 0),
(696970008, NULL, 'hh8', 'Removedor Semiperman', 'Masglo Plus se convertirá en el aliado perfecto para las mujeres, ya que les dará a sus uñas todo lo que ellas desean, una gran variedad de colores y brillo perfecto por dos semanas*, ideal para combi', 0, 'Línea: Esmalte Semipermanente\r\nFormato del quitaesmalte: Líquido\r\nUnidades por envase: 1\r\nCon acetona: Sí\r\nCantidad: 60\r\nTipo de unidad: mL', '1000.00', '0.00', 0),
(715141768, 3, 'tttttttttttttttttttt', 'ttttttttttttttttttttt', 'ttttttttttttttttttttt', 0, 'ttttttttttttttttttttttttttt', '1000.00', '0.00', 0),
(722924519, NULL, 'hh8', 'Removedor Semiperman', 'Masglo Plus se convertirá en el aliado perfecto para las mujeres, ya que les dará a sus uñas todo lo que ellas desean, una gran variedad de colores y brillo perfecto por dos semanas*, ideal para combi', 0, 'Línea: Esmalte Semipermanente\r\nFormato del quitaesmalte: Líquido\r\nUnidades por envase: 1\r\nCon acetona: Sí\r\nCantidad: 60\r\nTipo de unidad: mL', '1000.00', '0.00', 0),
(738517277, NULL, 'hh8', 'Shampo Matizante Lum', 'Shampoo matizador para cabello rubio o blanco:\r\n\r\nShampoo matizador para cabello cano, rubio o plateado. Su pigmento violeta neutraliza las tonalidades amarillas. Enriquecido con TRICONE y TRICOERBA, ', 0, 'Tipo de cabello: color\r\nTipo de cuidado: Matizador\r\nEs hipoalergénico: Sí\r\nEs vegano: No\r\nEs libre de gluten: Sí\r\nEs libre de crueldad: Sí\r\nEs testeado dermatológicamente: Sí\r\nUnidades por envase: 1\r\nCantidad: 300\r\nTipo de unidad: mL', '1000.00', '0.00', 0),
(742622966, NULL, '56780', 'personas', 'color azul pitufo', 0, 'alto BAJOS', '20.00', '0.00', 0),
(758643294, NULL, 'h666', 'hello word', 'Hello word es usada en programacion', 0, 'Es lo primero que se imprime', '23.46', '0.00', 0),
(793528947, NULL, '34vghbjn', 'Esmaltes Semipermanentes Ur Sugar', 'Esmaltes semipermanentes UR Sugar de 7.5 ml, envase plástico, mas de 80 referencias para escoger, excelente calidad y cubrimiento', 0, 'Tipo de esmalte: Color\r\nAcabado: Brillante\r\nEs un producto hipoalergénico: Sí\r\nEs libre de crueldad: Sí\r\nEs fortalecedor: No\r\nEs secado rápido: Sí\r\nCantidad de packs: 10\r\nCantidad: 7\r\nTipo de unidad: mL', '12.00', '0.00', 0),
(795219212, NULL, 'uj413m', 'Dermapen Tratamiento De Acne Cicatrices Limpiador ', 'Utiliza múltiples agujas que perforan la piel verticalmente. Esto mejora los resultados de rejuvenecimiento y es mucho más seguro para el cliente porque hay mucho menos daño epidérmico. La función aut', 0, 'Fabricante	Dermapen\r\nMarca	Derma Pen\r\nLínea	Belleza Facial\r\nNombre	Dermapen Tratamiento De Acne Cicatrices Limpiador Facial\r\nUnidades por envase	1', '89.90', '0.00', 0),
(843931083, 4, 'V3', ' jl´mplpo', 'km pkdmsiokmsf', 12, 'komdsfipkvm', '22.34', '0.00', 0),
(851030242, 3, 'dddddddddddddddddddd', 'dddddddddddddddddddddddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddddddddd', 10, 'ddddddddddddddddddddddddddddddddddddddddd', '1000.00', '5000.00', 0),
(873966367, NULL, '544468', 'drdtfyguhjk', 'xddxfgyhujklñ', 0, 'tgfhjklñkjbj', '55.56', '0.00', 0),
(886548893, 2, 'V3', ' jl´mplpo', '', 8, 'komdsfipkvm', '555.00', '0.00', 0),
(953965891, NULL, 'hh8', 'Removedor Semiperman', 'Masglo Plus se convertirá en el aliado perfecto para las mujeres, ya que les dará a sus uñas todo lo que ellas desean, una gran variedad de colores y brillo perfecto por dos semanas*, ideal para combi', 0, 'Línea: Esmalte Semipermanente\r\nFormato del quitaesmalte: Líquido\r\nUnidades por envase: 1\r\nCon acetona: Sí\r\nCantidad: 60\r\nTipo de unidad: mL', '1000.00', '0.00', 0),
(991965191, NULL, 'kkk2', 'Removerdor Color Salerm Kit Color Revers', 'Color Reverse es una formulación que atenúa y elimina los pigmentos artificiales del cabello sin afectar al color natural. Es el tratamiento más seguro y delicado a la hora de eliminar un tinte de oxi', 0, 'Efectos: Color Reverse es una formulación que atenúa y elimina los pigmentos artificiales del cabello sin afectar al color natural. Es el tratamiento más seguro y delicado a la hora de eliminar un tinte de oxidación del cabello.\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 400\r\nTipo de unidad: mL', '1000.00', '0.00', 0),
(2147483647, NULL, 'h666', 'hello word', 'Hello word es usada en programacion', 0, 'Es lo primero que se imprime', '23.46', '0.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `idReservacion` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idServicio` int(11) DEFAULT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` int(12) NOT NULL,
  `fechaReservacion` date NOT NULL,
  `horaReservacion` time NOT NULL,
  `horaFinal` time NOT NULL,
  `domicilio` tinyint(1) NOT NULL,
  `validar` tinyint(1) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `precio` double(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`idReservacion`, `idCliente`, `idUser`, `idServicio`, `nombres`, `apellidos`, `telefono`, `fechaReservacion`, `horaReservacion`, `horaFinal`, `domicilio`, `validar`, `direccion`, `precio`, `eliminado`) VALUES
(3, 8, 2, 2, 'flor maria', 'montañez vida', 2147483647, '2021-09-26', '17:55:00', '18:59:00', 1, 0, 'Crr 18 n 24 a 34', 0.00, 1),
(4236659, 8, 1, 1, 'flor maria', 'montañez vida', 2147483647, '2021-10-05', '08:00:00', '09:04:00', 1, 0, 'dfsdfs', 0.00, 1),
(25363031, 8, 2, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-10-18', '09:45:00', '10:49:00', 1, 0, 'Crr 18 n 24 a 3', 9999.99, 0),
(46005515, 8, 2, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-09-30', '16:45:00', '17:19:00', 0, 0, '', 9999.99, 0),
(73048568, 8, 2, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-10-18', '09:45:00', '10:49:00', 1, 0, 'Crr 18 n 24 a 3', 9999.99, 0),
(86300113, 8, 2, 2, 'flor maria', 'montañez vida', 2147483647, '2021-09-27', '17:20:00', '18:24:00', 1, 0, 'Crr 18 n 24 a 34', 0.00, 1),
(132415342, 1, 3, 544456873, 'jimena Alejandra', 'Olaya Perez', 2147483647, '2021-09-30', '10:20:00', '10:54:00', 0, 0, '', 9999.99, 0),
(135202147, 5, NULL, 1, 'Maria ', 'Lopez ', 123456789, '2021-08-31', '11:00:00', '00:00:00', 1, 0, 'Crr 18 n 24 a 34', 3434.00, 1),
(156974791, 8, NULL, 409358848, 'jimena Perez', 'jimena Perez', 2147483647, '2021-09-13', '14:30:00', '00:00:00', 0, 0, '', 7543.00, 0),
(204501608, 8, 2, 2, 'flor maria', 'montañez vida', 2147483647, '2021-09-14', '13:50:00', '14:54:00', 1, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(282319845, 8, 1, 1, 'flor maria', 'montañez vida', 2147483647, '2021-10-05', '09:45:00', '10:49:00', 1, 0, '  mbhjgh', 0.00, 0),
(315968261, 8, 3, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-09-30', '16:45:00', '17:49:00', 1, 0, 'Crr 18 n 24 a 34', 9999.99, 0),
(329637512, 11, 1, 544456873, 'pepito ', 'Olaya ', 2147483647, '2021-09-30', '15:35:00', '16:09:00', 0, 0, '', 0.00, 0),
(345563877, 8, 8, 267687805, 'jimena Perez', 'jimena Perez', 2147483647, '2021-09-13', '18:30:00', '00:00:00', 0, 0, '', 7643.00, 0),
(362914484, 5, 3, 3, 'Maria ', 'Lopez ', 123456789, '2021-09-05', '10:30:00', '10:59:00', 0, 0, '', 0.00, 1),
(364300315, 8, 2, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-10-18', '09:45:00', '10:49:00', 1, 0, 'Crr 18 n 24 a 3', 9999.99, 0),
(401390042, 5, 1, 409358848, 'Maria ', 'Lopez ', 123456789, '2021-09-02', '19:30:00', '19:59:00', 0, 0, '', 0.00, 0),
(405591494, 1, 2, 544456873, 'jimena Alejandra', 'Olaya Perez', 2147483647, '2021-10-01', '17:20:00', '17:54:00', 0, 0, '', 9999.99, 0),
(416037050, 8, 3, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-10-20', '16:10:00', '16:44:00', 0, 0, '', 9999.99, 0),
(441675660, 5, 1, 409358848, 'Maria ', 'Lopez ', 123456789, '2021-09-05', '10:30:00', '10:59:00', 0, 1, '', 0.00, 0),
(479717826, 8, 2, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-10-18', '09:45:00', '10:49:00', 1, 0, 'Crr 18 n 24 a 3', 9999.99, 0),
(479866411, 8, 1, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-09-14', '17:55:00', '18:29:00', 0, 0, '', 0.00, 0),
(490297774, 8, 1, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-09-14', '16:45:00', '17:19:00', 1, 0, '', 0.00, 0),
(615036743, 12, 1, 1, 'carlos ', 'PeReZ ', 534645654, '2021-09-14', '08:00:00', '08:34:00', 0, 0, '', 0.00, 1),
(621705957, 1, 3, 544456873, 'jimena Alejandra', 'Olaya Perez', 2147483647, '2021-09-30', '10:20:00', '10:54:00', 0, 0, '', 9999.99, 0),
(666806411, 8, NULL, 820772169, 'jimena Perez', 'jimena Perez', 2147483647, '2021-09-13', '16:18:00', '00:00:00', 0, 0, '', 9876.00, 0),
(738621058, 8, 1, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-10-05', '09:10:00', '09:44:00', 0, 0, '', 9999.99, 0),
(746347683, 5, 2, 409358848, 'Maria ', 'Lopez ', 123456789, '2021-09-03', '15:30:00', '15:59:00', 0, 0, '', 0.00, 1),
(757305160, 1, 3, 544456873, 'jimena Alejandra', 'Olaya Perez', 2147483647, '2021-09-30', '15:00:00', '15:34:00', 0, 0, '', 9999.99, 0),
(779494089, 5, NULL, 409358848, 'Maria ', 'Lopez ', 123456789, '2021-09-02', '19:00:00', '19:59:00', 1, 0, 'Crr 18 n 24 a 3', 0.00, 0),
(814176324, 8, NULL, 38801601, 'jimena Perez', 'jimena Perez', 2147483647, '2021-09-13', '16:30:00', '00:00:00', 0, 1, '', 9999.99, 0),
(841324238, 8, 2, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-10-18', '09:45:00', '10:49:00', 1, 0, 'Crr 18 n 24 a 3', 9999.99, 0),
(848014849, 8, 1, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-09-14', '17:55:00', '18:29:00', 0, 0, '', 0.00, 0),
(895040676, 8, 1, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-09-14', '17:55:00', '18:29:00', 0, 0, '', 0.00, 1),
(920602276, 8, 1, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-09-15', '12:40:00', '13:44:00', 1, 0, 'la plaza de don pepito', 0.00, 0),
(952095725, 8, 2, 544456873, 'flor maria', 'montañez vida', 2147483647, '2021-10-18', '09:45:00', '10:49:00', 1, 0, 'Crr 18 n 24 a 3', 9999.99, 0),
(985919361, 1, 3, 544456873, 'jimena Alejandra', 'Olaya Perez', 2147483647, '2021-09-30', '15:00:00', '15:34:00', 0, 0, '', 9999.99, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(50) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `eliminado`) VALUES
(1, 'Gerente', 0),
(2, 'Cajero', 0),
(3, 'Recepcionista', 0),
(4, 'Personal', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `idSeguimiento` int(11) NOT NULL,
  `IdPedido` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idServicio` int(11) DEFAULT NULL,
  `idFactura` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `fechaSeguimiento` date NOT NULL,
  `horaSeguimiento` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`idSeguimiento`, `IdPedido`, `idProducto`, `idServicio`, `idFactura`, `idUser`, `observacion`, `fechaSeguimiento`, `horaSeguimiento`) VALUES
(1, 179821511, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-11', '18:41:12'),
(2, 179821511, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-11', '18:45:23'),
(3, 111101, NULL, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-11', '18:57:09'),
(4, 179821511, NULL, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-11', '18:58:09'),
(5, NULL, NULL, NULL, 1, 2, 'Ha cancelado una factura', '2021-08-14', '18:21:43'),
(6, 564924075, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:25:58'),
(7, 674162799, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:26:11'),
(8, 50704385, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:27:42'),
(9, 686774842, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:28:08'),
(10, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:35:56'),
(11, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:45'),
(12, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:46'),
(13, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:47'),
(14, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:48'),
(15, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:48'),
(16, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:37:36'),
(17, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:38:36'),
(18, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:38:37'),
(19, 564924075, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:41:25'),
(20, 686774842, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:41:44'),
(21, 50704385, NULL, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-17', '22:52:46'),
(22, 564924075, NULL, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-17', '22:54:00'),
(23, 277952570, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-17', '22:54:23'),
(24, 705061606, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-17', '22:54:35'),
(25, 464080926, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:56:27'),
(26, 992933774, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:56:53'),
(27, 992933774, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:57:09'),
(28, 992933774, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-17', '22:57:47'),
(29, 686774842, NULL, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-17', '22:58:05'),
(30, 674162799, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:58:22'),
(31, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:20:40'),
(32, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:20:56'),
(33, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:21:13'),
(34, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:22:17'),
(35, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:22:43'),
(36, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:23:27'),
(37, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:24:05'),
(38, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:24:48'),
(39, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:30:42'),
(40, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:31:11'),
(41, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:38:07'),
(42, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:38:22'),
(43, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:38:33'),
(44, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:40:09'),
(45, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:41:08'),
(46, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:41:33'),
(47, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:59:40'),
(48, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:00:18'),
(49, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:01:13'),
(50, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:07:33'),
(51, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:08:05'),
(52, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:08:25'),
(53, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:13:06'),
(54, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:13:33'),
(55, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:14:13'),
(56, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:14:44'),
(57, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:15:03'),
(58, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:16:01'),
(59, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:16:32'),
(60, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:16:59'),
(61, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:17:35'),
(62, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:17:49'),
(63, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:18:23'),
(64, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:18:38'),
(65, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:21:45'),
(66, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:25:35'),
(67, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:26:23'),
(68, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:26:33'),
(69, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:27:25'),
(70, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:27:40'),
(71, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:27:50'),
(72, 88328668, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-26', '15:09:02'),
(73, 88328668, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '15:21:34'),
(74, 88328668, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '15:22:44'),
(75, 88328668, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '15:25:37'),
(76, 88328668, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-26', '15:26:58'),
(77, 88328668, NULL, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-26', '15:27:51'),
(78, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-26', '18:15:13'),
(79, 55016541, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-26', '18:27:01'),
(80, 55016541, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:28:39'),
(81, 55016541, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:29:36'),
(82, 55016541, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:50:48'),
(83, 55016541, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:51:33'),
(84, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:46:34'),
(85, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:46:48'),
(86, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:47:17'),
(87, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:47:39'),
(88, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:48:00'),
(89, NULL, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:49:15'),
(90, 106533512, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-08', '21:12:41'),
(91, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:12:49'),
(92, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:23'),
(93, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:38'),
(94, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:39'),
(95, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:57'),
(96, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:57'),
(97, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:14:53'),
(98, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:09'),
(99, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:29'),
(100, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:32'),
(101, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:50'),
(102, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:51'),
(103, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:16:12'),
(104, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:18:26'),
(105, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:18:40'),
(106, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:18:55'),
(107, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:19:22'),
(108, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:19:40'),
(109, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:23:24'),
(110, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:24:59'),
(111, 106533512, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:25:37'),
(112, NULL, 1, NULL, NULL, 2, 'Esta actualizacion es debido a pruebas', '2021-09-09', '22:57:10'),
(113, NULL, 1, NULL, NULL, 2, 'Esta actualizacion es debido a pruebas', '2021-09-09', '22:57:47'),
(114, NULL, 2, NULL, NULL, 2, 'Actualizacin de prueba', '2021-09-09', '23:01:12'),
(115, 363921012, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-13', '21:20:35'),
(116, 363921012, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-13', '21:21:07'),
(117, NULL, 1, NULL, NULL, 2, 'Restar prueba', '2021-09-13', '21:22:39'),
(118, 571370830, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-13', '21:24:51'),
(119, 571370830, NULL, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-09-13', '21:24:58'),
(120, 96510647, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-13', '21:25:33'),
(121, 594031540, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-15', '23:00:24'),
(122, 211800008, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-16', '14:17:44'),
(123, 111101, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-09-20', '18:22:41'),
(124, 269095276, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-20', '20:57:58'),
(125, 307530109, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-20', '20:59:20'),
(126, 702719052, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-20', '21:03:14'),
(127, 296492338, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-20', '21:04:11'),
(128, 132436115, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-21', '15:28:25'),
(129, 338879597, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-22', '20:53:03'),
(130, 96510647, NULL, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-09-22', '22:17:15'),
(131, 132436115, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-22', '22:23:18'),
(132, 968382738, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-22', '23:21:05'),
(133, 907177851, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-25', '23:03:15'),
(134, 907177851, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-01', '20:10:50'),
(135, 111101, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-04', '20:28:09'),
(138, NULL, 633945696, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-10-12', '08:49:54'),
(139, NULL, 583244064, NULL, NULL, 2, 'Se ha eliminado el producto', '2021-10-12', '08:50:53'),
(140, NULL, NULL, 544456873, NULL, 2, 'Se ha eliminado el servicio', '2021-10-12', '10:08:00'),
(148, NULL, NULL, 414781051, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-12', '13:57:23'),
(149, NULL, NULL, 430397162, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-12', '13:57:55'),
(150, NULL, NULL, 973137042, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-12', '13:59:03'),
(151, NULL, NULL, 863499110, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-12', '13:59:17'),
(152, NULL, NULL, 706987728, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-12', '14:00:16'),
(153, NULL, NULL, 109170837, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-12', '14:00:29'),
(154, NULL, NULL, 681370733, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-12', '14:00:56'),
(155, NULL, NULL, 605795521, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-12', '14:01:39'),
(156, NULL, NULL, 871097643, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-12', '14:03:18'),
(157, 823579301, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-10-13', '15:54:38'),
(158, NULL, 886548893, NULL, NULL, 2, 'hhhhhhhhhhhhhhhh', '2021-10-14', '13:46:55'),
(159, 313334542, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-10-14', '13:56:58'),
(160, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '13:59:25'),
(161, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '13:59:45'),
(162, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:00:41'),
(163, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:01:04'),
(164, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:01:11'),
(165, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:01:30'),
(166, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:01:48'),
(167, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:01:48'),
(168, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:02:20'),
(169, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:03:50'),
(170, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:04:02'),
(171, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:04:50'),
(172, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:05:37'),
(173, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:10:12'),
(174, 313334542, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '14:11:30'),
(175, 313334542, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-14', '14:18:06'),
(186, 91094119, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-10-14', '17:52:19'),
(187, 558810812, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-10-14', '17:52:30'),
(188, 91094119, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-14', '17:53:27'),
(189, 91094119, NULL, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-10-14', '17:54:02'),
(190, 558810812, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-14', '17:54:22'),
(191, 354755849, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-10-15', '18:43:52'),
(192, 354755849, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-15', '19:25:58'),
(193, 354755849, NULL, NULL, NULL, 2, 'Ha modificado un pedido', '2021-10-15', '19:26:05'),
(194, NULL, NULL, 221325555, NULL, 2, 'Ha creado un nuevo servicio', '2021-10-15', '20:16:32'),
(195, 523580918, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-10-15', '20:26:49'),
(196, 523580918, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:28:25'),
(197, 523580918, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:28:49'),
(198, 523580918, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:29:29'),
(199, 354755849, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:32:02'),
(200, 354755849, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:36:36'),
(201, 354755849, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:40:02'),
(202, 354755849, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:45:49'),
(203, 354755849, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:46:05'),
(204, 354755849, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:47:16'),
(205, 354755849, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:47:17'),
(206, 100298830, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-10-15', '20:47:49'),
(207, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:47:57'),
(208, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:48:40'),
(209, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:50:40'),
(210, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:50:41'),
(211, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:50:55'),
(212, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:50:56'),
(213, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:51:13'),
(214, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:51:41'),
(215, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:54:11'),
(216, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:54:38'),
(217, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:55:00'),
(218, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:55:32'),
(219, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:55:52'),
(220, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:56:57'),
(221, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:57:17'),
(222, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:57:34'),
(223, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:57:56'),
(224, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:58:06'),
(225, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:58:31'),
(226, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:58:45'),
(227, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:58:52'),
(228, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '20:59:55'),
(229, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:00:06'),
(230, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:00:32'),
(231, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:00:44'),
(232, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:00:50'),
(233, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:00:50'),
(234, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:00:52'),
(235, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:01:00'),
(236, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:01:16'),
(237, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:06:47'),
(238, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:07:27'),
(239, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:08:46'),
(240, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:08:47'),
(241, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:08:59'),
(242, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:12:21'),
(243, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:14:05'),
(244, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:23:40'),
(245, 100298830, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:24:21'),
(246, 102553640, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-10-15', '21:27:27'),
(247, 102553640, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-10-15', '21:27:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `IdServicio` int(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `codigoServicio` varchar(50) NOT NULL,
  `nombreServicio` varchar(50) NOT NULL,
  `detalleServicio` varchar(50) NOT NULL,
  `tiempoDuracion` int(15) NOT NULL,
  `costo` decimal(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`IdServicio`, `idCategoria`, `codigoServicio`, `nombreServicio`, `detalleServicio`, `tiempoDuracion`, `costo`, `eliminado`) VALUES
(0, 2, '23456', 'Manicure', 'Cuidamos tus uñas con los mejores productos, esmal', 20, '10.00', 0),
(1, NULL, '512', 'Corte', 'Detalle2', 55, '9999.99', 1),
(2, NULL, 'S2', 'Planchado', 'Detalle3', 25, '9999.99', 1),
(3, NULL, 'S5', 'Planchado', 'Detalle2', 60, '9999.99', 1),
(38801601, NULL, '567u', 'cfvgbhnjm', 't678', 0, '3467.00', 1),
(109170837, 2, '34eggs', 'logo sena', 'djhdcgkjmghl,jbl.bn ', 40, '12.00', 0),
(221325555, 3, 'lñ´.zs,cmskn,', 'klsnf vlmn ', 'lkdzn bkm ', 15, '10.00', 0),
(267687805, NULL, 'S5', 'Planchado', 'Detalle2', 0, '9999.99', 1),
(293275022, NULL, 'S2', 'Planchado', 'Detalle2', 0, '9999.99', 1),
(409358848, NULL, 'S7', 'Planchado', 'Detalle2', 30, '9999.99', 1),
(414781051, 2, '34eggs', 'logo sena', 'djhdcgkjmghl,jbl.bn ', 40, '12.00', 0),
(430397162, 2, '34eggs', 'logo sena', 'djhdcgkjmghl,jbl.bn ', 40, '12.00', 0),
(522676893, NULL, '88', 'Alisado', 'Detalle2', 15, '4321.00', 1),
(544456873, NULL, 'S5', 'Planchado', 'Detalle2', 35, '9999.99', 0),
(605795521, 4, 'xrcfgvhbjn', 'uovhbwijdiojknlm', 'jwskndvfojñl m', 35, '10.00', 0),
(681370733, 2, '34eggs', '', 'djhdcgkjmghl,jbl.bn ', 40, '1200.00', 0),
(706987728, 2, '34eggs', 'logo sena', 'djhdcgkjmghl,jbl.bn ', 40, '12.00', 0),
(721804413, NULL, 'dsfds', 'sdfsdf', 'dsfsdf', 0, '9999.99', 1),
(820772169, NULL, 'S7', 'Planchado', 'Detalle2', 0, '9999.99', 1),
(863499110, 4, 'xrcfgvhbjn', 'uovhbwijdiojknlm', 'jwskndvfojñl m', 35, '10.00', 0),
(871097643, 2, '34643', 'logo sena', 'logo de la intitucion', 50, '12.00', 0),
(959073078, NULL, 'S3', 'Depilado', 'Detalle2', 25, '9999.99', 1),
(973137042, 2, 'tttttt', 'sena', 'f7uhjbasfddjbsn ', 20, '9999.99', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `estadoSolicitud` tinyint(1) NOT NULL,
  `limiteTiempo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `idTags` int(11) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`idTags`, `tags`, `eliminado`) VALUES
(1, 'maquillaje', 0),
(2, 'bellezas', 0),
(3, 'perfumes', 0),
(4, 'manicure', 0),
(5, 'pericure', 0),
(6, 'tratamientos', 0),
(7, 'piel', 0),
(8, 'crema', 0),
(9, 'tintes', 0),
(10, 'esmaltes', 0),
(11, 'cuidadopiel', 0),
(12, 'cuidadopiel', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  `idCargo` int(11) DEFAULT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `documentoIdentidad` int(15) NOT NULL,
  `primerNombre` varchar(25) NOT NULL,
  `segundoNombre` varchar(25) NOT NULL,
  `primerApellido` varchar(25) NOT NULL,
  `segundoApellido` varchar(25) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `correoElectronico` varchar(100) NOT NULL,
  `contrasena` char(35) NOT NULL,
  `telefono` int(12) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `estadoCivil` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `barrio` varchar(25) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `idRol`, `idCargo`, `tipoDocumento`, `documentoIdentidad`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `fechaNacimiento`, `correoElectronico`, `contrasena`, `telefono`, `genero`, `estadoCivil`, `direccion`, `barrio`, `eliminado`) VALUES
(1, 1, 1, 'CC', 1006700633, 'Harley', '', 'Mendoza', '', '0000-00-00', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, '', '', '', '', 0),
(2, 1, 1, 'CC', 21474836, 'Alejandra', 'Alejandra', 'Perez', 'olaya', '2000-12-31', 'aleja@gmail.com', 'dc13ae48d185bf2dbad46c1005f46eca', 453434563, 'Femenino', 'Divorciado', 'Crr 18 n 24 a 34', 'piguanza', 0),
(3, 3, 1, '', 0, 'Jimena_Olaya', '0', '', '', '0000-00-00', 'jimenaolaya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(4, 1, 1, '', 0, 'Olaya', '0', '', '', '0000-00-00', 'Olaya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(5, NULL, 1, '', 0, 'Alejandra', '0', '', '', '0000-00-00', 'alejandra@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(6, NULL, 1, '', 0, 'Administrador', '0', '', '', '0000-00-00', 'carlos@', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(7, NULL, NULL, 'CC', 1120563510, 'Miguel', 'Angel', 'Olaya', 'Perez', '2021-07-22', 'miguelolaya@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 7777775, 'Masculino', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 0),
(8, 1, NULL, 'CC', 41242518, 'Olga', 'Patricia', 'Perez', 'MontaÃ±ez', '2021-07-12', 'Olgaperez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 7777775, 'Femenino', 'Casado', 'Crr 18 n 24 a 34', 'Progreso', 0),
(9, NULL, NULL, 'CC', 1000002159, 'Leidy', 'Patricia', 'Sanchez', 'Fonseca', '2000-03-07', 'carolinasanchez@gmail.com', '25f9e794323b453885f5181f1b624d0b', 7777775, 'Femenino', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 0),
(10, NULL, NULL, 'CE', 1006700633, 'Miguel', '', 'Perez', '', '2001-03-19', 'hh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2147483647, '', '', '', '', 0),
(11, NULL, NULL, 'CE', 100670063, 'Miguel', '', 'Perez', '', '2001-03-19', 'tt@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 2147483647, '', '', '', '', 0),
(12, NULL, NULL, 'CE', 1006700463, 'Miguel', '', 'Perez', '', '2001-03-19', 'ttf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(13, NULL, NULL, 'CE', 10060463, 'Miguel', '', 'Perez', '', '2001-03-19', 'attf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(14, NULL, NULL, 'CE', 1006063, 'Miguel', '', 'Perez', '', '2001-03-19', 'fattf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(15, NULL, 1, 'CE', 10067063, 'Miguel', '', 'Perez', '', '2001-03-19', 'sdastt@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(16, NULL, NULL, 'CE', 1067063, 'Miguel', '', 'Perez', '', '2001-03-19', 'seddastt@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(17, NULL, NULL, 'CE', 10657063, 'Miguel', '', 'Perez', '', '2001-03-19', 'sedastt@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(21, 2, NULL, 'CE', 123456789, 'Pruebas', '', 'Permiso', '', '2001-01-17', 'pruebas@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 2147483647, 'Otro', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVentas` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `fechaVenta` date NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IdVentas`, `idProducto`, `idCliente`, `fechaVenta`, `cantidadProducto`, `eliminado`) VALUES
(1, 1, 1, '2021-07-01', 3, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`),
  ADD KEY `IdServicio` (`IdServicio`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `respuestaPregunta` (`idRespuesta`),
  ADD KEY `preguntaProducto` (`idProducto`),
  ADD KEY `preguntaUsuario` (`idUser`),
  ADD KEY `preguntaCliente` (`idCliente`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idDetalleFactura`),
  ADD KEY `idProducto` (`idProducto`,`idFactura`),
  ADD KEY `idFactura` (`idFactura`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `IdServicio` (`IdServicio`),
  ADD KEY `idReservacion` (`idReservacion`);

--
-- Indices de la tabla `detallefoto`
--
ALTER TABLE `detallefoto`
  ADD PRIMARY KEY (`idFoto`),
  ADD KEY `fotoProducto` (`idProducto`),
  ADD KEY `fotoServicio` (`IdServicios`),
  ADD KEY `fotoUsuario` (`idUser`),
  ADD KEY `fotoCliente` (`idCliente`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idEmpleado` (`idUser`,`idCliente`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`IdInventario`),
  ADD KEY `idProducto` (`idProducto`,`idFactura`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idModulo`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`idPagina`),
  ADD KEY `idModulo` (`idModulo`);

--
-- Indices de la tabla `palabrasclaves`
--
ALTER TABLE `palabrasclaves`
  ADD PRIMARY KEY (`idPalabraClave`),
  ADD KEY `palabrasClavesProducto` (`idProducto`),
  ADD KEY `palabrasClavesServicios` (`IdServicios`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `EmpresaPedido` (`idEmpresa`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD KEY `idRol` (`idRol`,`idModulo`,`IdPagina`),
  ADD KEY `IdPagina` (`IdPagina`),
  ADD KEY `idModulo` (`idModulo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`idReservacion`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `reservacionUsuario` (`idUser`),
  ADD KEY `idServicio` (`idServicio`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`idSeguimiento`),
  ADD KEY `SeguimientoPedido` (`IdPedido`),
  ADD KEY `seguimientoFactura` (`idFactura`),
  ADD KEY `seguimientoUser` (`idUser`),
  ADD KEY `seguimientoProducto` (`idProducto`),
  ADD KEY `seguimientoServicio` (`idServicio`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`IdServicio`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`idTags`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idCargo` (`idCargo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVentas`),
  ADD KEY `idProducto` (`idProducto`,`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalleFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `detallefoto`
--
ALTER TABLE `detallefoto`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `IdInventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `palabrasclaves`
--
ALTER TABLE `palabrasclaves`
  MODIFY `idPalabraClave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `idTags` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `CargoServicio` FOREIGN KEY (`IdServicio`) REFERENCES `servicios` (`IdServicio`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `preguntaCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `preguntaProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `preguntaUsuario` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`),
  ADD CONSTRAINT `respuestaPregunta` FOREIGN KEY (`idRespuesta`) REFERENCES `comentario` (`idPregunta`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `detalle_ibfk_3` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`),
  ADD CONSTRAINT `detalle_ibfk_4` FOREIGN KEY (`IdServicio`) REFERENCES `servicios` (`IdServicio`),
  ADD CONSTRAINT `detalle_ibfk_5` FOREIGN KEY (`idReservacion`) REFERENCES `reservacion` (`idReservacion`);

--
-- Filtros para la tabla `detallefoto`
--
ALTER TABLE `detallefoto`
  ADD CONSTRAINT `fotoCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `fotoProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `fotoServicio` FOREIGN KEY (`IdServicios`) REFERENCES `servicios` (`IdServicio`),
  ADD CONSTRAINT `fotoUsuario` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `palabrasclaves`
--
ALTER TABLE `palabrasclaves`
  ADD CONSTRAINT `palabrasClavesProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `palabrasClavesServicios` FOREIGN KEY (`IdServicios`) REFERENCES `servicios` (`IdServicio`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `EmpresaPedido` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`IdPagina`) REFERENCES `pagina` (`idPagina`),
  ADD CONSTRAINT `permiso_ibfk_3` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`),
  ADD CONSTRAINT `permiso_ibfk_4` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacionUsuario` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`),
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`IdServicio`);

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `SeguimientoPedido` FOREIGN KEY (`IdPedido`) REFERENCES `pedido` (`idPedido`),
  ADD CONSTRAINT `seguimientoFactura` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `seguimientoProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `seguimientoServicio` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`IdServicio`),
  ADD CONSTRAINT `seguimientoUser` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
