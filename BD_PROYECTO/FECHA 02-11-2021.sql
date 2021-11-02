-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2021 a las 17:01:07
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
(1, 67898463, 0),
(2, 253732436, 0),
(3, 465617173, 0),
(4, 776220398, 0);

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
(1, 'Barberia', 0),
(2, 'Cortes', 0),
(3, 'Cuidado cabello', 0),
(4, 'Tintes', 0),
(5, 'Decoloracion', 0),
(6, 'Cosmeticos', 0),
(7, 'Manicura', 0),
(8, 'Pericure', 0),
(9, 'Cremas', 0),
(10, 'Shampoo', 0),
(11, 'Locion', 0),
(12, 'Tratamientos', 0),
(13, 'Depilacion', 0),
(14, 'maquillaje', 0),
(15, 'pielBonita', 0);

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
(1, 'CC', 1006700633, 'Jimena', 'Alejandra', 'Olaya', 'Perez', '2001-11-14', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'alejandra@gmail.com', 'cdf556a23ca4ec4a1bdaa15abd729dbd', '3204495486', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idPregunta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `pregunta` varchar(100) NOT NULL,
  `idRespuesta` int(11) DEFAULT NULL,
  `fechaComentario` date NOT NULL,
  `horaComentario` time NOT NULL
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
  `precio` double(7,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`idDetalleFactura`, `idProducto`, `idFactura`, `idPedido`, `IdServicio`, `idReservacion`, `codigoProducto`, `producto`, `cantidad`, `precio`, `eliminado`) VALUES
(1, 764196012, NULL, NULL, 253732436, NULL, '000023', 'Kativa Alisado Brasileño Cabello Natural', 2, 61000.00, 0),
(2, 15652646, NULL, NULL, 253732436, NULL, '000014', 'Youthair Crema Cabello Anti Canas Oscurece De Mane', 2, 34900.00, 0),
(3, 112073075, NULL, NULL, 776220398, NULL, '000041', 'Crema Para Peinar Elvive Acido Hialuronic - mL a $', 2, 11200.00, 0),
(4, 916795615, NULL, NULL, 961923468, NULL, '000043', 'Crema Para Peinar Elvive Reparación Tota - mL a $3', 2, 9000.00, 0),
(5, 916795615, NULL, NULL, 956180931, NULL, '000043', 'Crema Para Peinar Elvive Reparación Tota - mL a $3', 2, 9000.00, 0),
(6, 916795615, NULL, NULL, 189709214, NULL, '000043', 'Crema Para Peinar Elvive Reparación Tota - mL a $3', 2, 9000.00, 0),
(7, 916795615, NULL, NULL, 411304110, NULL, '000043', 'Crema Para Peinar Elvive Reparación Tota - mL a $3', 2, 9000.00, 0),
(8, 916795615, NULL, NULL, 657083085, NULL, '000043', 'Crema Para Peinar Elvive Reparación Tota - mL a $3', 2, 9000.00, 0),
(9, 916795615, NULL, NULL, 465617173, NULL, '000043', 'Crema Para Peinar Elvive Reparación Tota - mL a $3', 2, 9000.00, 0),
(10, 711652868, NULL, NULL, 67898463, NULL, '000044', 'Crema Para Peinar Termoprotect Liss Unl - mL a $58', 1, 88000.00, 0),
(11, 101364696, NULL, NULL, 273466604, NULL, '000038', '(recomendado) Lápiz Delineador Ojos Do - g a $1490', 1, 14900.00, 0),
(12, 101364696, NULL, 45001408, NULL, NULL, '000038', '(recomendado) Lápiz Delineador Ojos Do - g a $1490', 6, 14900.00, 1),
(13, 268916690, NULL, 45001408, NULL, NULL, '000001', 'Color Gel Semipermanente Uñas', 4, 20000.00, 0),
(14, 16360263, NULL, 45001408, NULL, NULL, '000002', 'Base Y Top Coat Para Semipermanente', 3, 30000.00, 0),
(15, 480392225, NULL, 45001408, NULL, NULL, '000003', 'Base Forti Uñas', 1, 10000.00, 0),
(16, 268916690, 528922499, NULL, NULL, NULL, '000001', 'Color Gel Semipermanente Uñas', 4, 99999.99, 1),
(17, 16360263, 528922499, NULL, NULL, NULL, '000002', 'Base Y Top Coat Para Semipermanente', 2, 30000.00, 0),
(18, 480392225, 528922499, NULL, NULL, NULL, '000003', 'Base Forti Uñas', 3, 10000.00, 0);

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
  `fotoPerfil` varchar(300) NOT NULL,
  `fotoBiografiaUsuario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallefoto`
--

INSERT INTO `detallefoto` (`idFoto`, `idProducto`, `IdServicios`, `idUser`, `idCliente`, `fotoProducto`, `fotoServicio1`, `fotoPerfil`, `fotoBiografiaUsuario`) VALUES
(2, NULL, NULL, 2, NULL, '', '', 'image/perfilusuario/2/perfilusuario.jpg', ''),
(3, 268916690, NULL, NULL, NULL, 'image/268916690/1.jpg', '', '', ''),
(4, 268916690, NULL, NULL, NULL, 'image/268916690/2.jpg', '', '', ''),
(5, 268916690, NULL, NULL, NULL, 'image/268916690/3.jpg', '', '', ''),
(6, 268916690, NULL, NULL, NULL, 'image/268916690/4.jpg', '', '', ''),
(7, 268916690, NULL, NULL, NULL, 'image/268916690/5.jpg', '', '', ''),
(8, 16360263, NULL, NULL, NULL, 'image/16360263/1.jpg', '', '', ''),
(9, 16360263, NULL, NULL, NULL, 'image/16360263/2.jpg', '', '', ''),
(10, 16360263, NULL, NULL, NULL, 'image/16360263/3.jpg', '', '', ''),
(11, 16360263, NULL, NULL, NULL, 'image/16360263/4.jpg', '', '', ''),
(12, 16360263, NULL, NULL, NULL, 'image/16360263/5.jpg', '', '', ''),
(13, 480392225, NULL, NULL, NULL, 'image/480392225/1.jpg', '', '', ''),
(14, 480392225, NULL, NULL, NULL, 'image/480392225/2.jpg', '', '', ''),
(15, 480392225, NULL, NULL, NULL, 'image/480392225/3.jpg', '', '', ''),
(16, 480392225, NULL, NULL, NULL, 'image/480392225/4.jpg', '', '', ''),
(17, 480392225, NULL, NULL, NULL, 'image/480392225/5.jpg', '', '', ''),
(18, 822314731, NULL, NULL, NULL, 'image/822314731/1.jpg', '', '', ''),
(19, 822314731, NULL, NULL, NULL, 'image/822314731/2.jpg', '', '', ''),
(20, 822314731, NULL, NULL, NULL, 'image/822314731/3.jpg', '', '', ''),
(21, 822314731, NULL, NULL, NULL, 'image/822314731/4.jpg', '', '', ''),
(22, 822314731, NULL, NULL, NULL, 'image/822314731/5.jpg', '', '', ''),
(23, 759726823, NULL, NULL, NULL, 'image/759726823/1.jpg', '', '', ''),
(24, 759726823, NULL, NULL, NULL, 'image/759726823/2.jpg', '', '', ''),
(25, 759726823, NULL, NULL, NULL, 'image/759726823/3.jpg', '', '', ''),
(26, 759726823, NULL, NULL, NULL, 'image/759726823/4.jpg', '', '', ''),
(27, 759726823, NULL, NULL, NULL, 'image/759726823/5.jpg', '', '', ''),
(28, 404242146, NULL, NULL, NULL, 'image/404242146/1.jpg', '', '', ''),
(29, 404242146, NULL, NULL, NULL, 'image/404242146/2.jpg', '', '', ''),
(30, 404242146, NULL, NULL, NULL, 'image/404242146/3.jpg', '', '', ''),
(31, 404242146, NULL, NULL, NULL, 'image/404242146/4.jpg', '', '', ''),
(32, 404242146, NULL, NULL, NULL, 'image/404242146/5.jpg', '', '', ''),
(33, 19790671, NULL, NULL, NULL, 'image/19790671/1.jpg', '', '', ''),
(34, 19790671, NULL, NULL, NULL, 'image/19790671/2.jpg', '', '', ''),
(35, 19790671, NULL, NULL, NULL, 'image/19790671/3.jpg', '', '', ''),
(36, 19790671, NULL, NULL, NULL, 'image/19790671/4.jpg', '', '', ''),
(37, 19790671, NULL, NULL, NULL, 'image/19790671/5.jpg', '', '', ''),
(38, 805973408, NULL, NULL, NULL, 'image/805973408/1.jpg', '', '', ''),
(39, 805973408, NULL, NULL, NULL, 'image/805973408/2.jpg', '', '', ''),
(40, 805973408, NULL, NULL, NULL, 'image/805973408/3.jpg', '', '', ''),
(41, 805973408, NULL, NULL, NULL, 'image/805973408/4.jpg', '', '', ''),
(42, 805973408, NULL, NULL, NULL, 'image/805973408/5.jpg', '', '', ''),
(43, 233977974, NULL, NULL, NULL, 'image/233977974/1.jpg', '', '', ''),
(44, 233977974, NULL, NULL, NULL, 'image/233977974/2.jpg', '', '', ''),
(45, 233977974, NULL, NULL, NULL, 'image/233977974/3.jpg', '', '', ''),
(46, 233977974, NULL, NULL, NULL, 'image/233977974/4.jpg', '', '', ''),
(47, 233977974, NULL, NULL, NULL, 'image/233977974/5.jpg', '', '', ''),
(48, 649030980, NULL, NULL, NULL, 'image/649030980/1.jpg', '', '', ''),
(49, 649030980, NULL, NULL, NULL, 'image/649030980/2.jpg', '', '', ''),
(50, 649030980, NULL, NULL, NULL, 'image/649030980/3.jpg', '', '', ''),
(51, 649030980, NULL, NULL, NULL, 'image/649030980/4.jpg', '', '', ''),
(52, 940295018, NULL, NULL, NULL, 'image/940295018/1.jpg', '', '', ''),
(53, 940295018, NULL, NULL, NULL, 'image/940295018/2.jpg', '', '', ''),
(54, 940295018, NULL, NULL, NULL, 'image/940295018/3.jpg', '', '', ''),
(55, 940295018, NULL, NULL, NULL, 'image/940295018/4.jpg', '', '', ''),
(56, 940295018, NULL, NULL, NULL, 'image/940295018/5.jpg', '', '', ''),
(57, 603660015, NULL, NULL, NULL, 'image/603660015/1.jpg', '', '', ''),
(58, 603660015, NULL, NULL, NULL, 'image/603660015/2.jpg', '', '', ''),
(59, 603660015, NULL, NULL, NULL, 'image/603660015/3.jpg', '', '', ''),
(60, 603660015, NULL, NULL, NULL, 'image/603660015/4.jpg', '', '', ''),
(61, 603660015, NULL, NULL, NULL, 'image/603660015/5.jpg', '', '', ''),
(62, 336409946, NULL, NULL, NULL, 'image/336409946/1.jpg', '', '', ''),
(63, 336409946, NULL, NULL, NULL, 'image/336409946/2.jpg', '', '', ''),
(64, 336409946, NULL, NULL, NULL, 'image/336409946/3.jpg', '', '', ''),
(65, 336409946, NULL, NULL, NULL, 'image/336409946/4.jpg', '', '', ''),
(66, 336409946, NULL, NULL, NULL, 'image/336409946/5.jpg', '', '', ''),
(67, 15652646, NULL, NULL, NULL, 'image/15652646/1.jpg', '', '', ''),
(68, 15652646, NULL, NULL, NULL, 'image/15652646/2.jpg', '', '', ''),
(69, 15652646, NULL, NULL, NULL, 'image/15652646/3.jpg', '', '', ''),
(70, 15652646, NULL, NULL, NULL, 'image/15652646/4.jpg', '', '', ''),
(71, 15652646, NULL, NULL, NULL, 'image/15652646/5.jpg', '', '', ''),
(72, 808515809, NULL, NULL, NULL, 'image/808515809/1.jpg', '', '', ''),
(73, 808515809, NULL, NULL, NULL, 'image/808515809/2.jpg', '', '', ''),
(74, 808515809, NULL, NULL, NULL, 'image/808515809/3.jpg', '', '', ''),
(75, 808515809, NULL, NULL, NULL, 'image/808515809/4.jpg', '', '', ''),
(76, 808515809, NULL, NULL, NULL, 'image/808515809/5.jpg', '', '', ''),
(77, 439363406, NULL, NULL, NULL, 'image/439363406/1.jpg', '', '', ''),
(78, 439363406, NULL, NULL, NULL, 'image/439363406/2.jpg', '', '', ''),
(79, 439363406, NULL, NULL, NULL, 'image/439363406/3.jpg', '', '', ''),
(80, 439363406, NULL, NULL, NULL, 'image/439363406/4.jpg', '', '', ''),
(81, 439363406, NULL, NULL, NULL, 'image/439363406/5.jpg', '', '', ''),
(82, 24525899, NULL, NULL, NULL, 'image/24525899/1.jpg', '', '', ''),
(83, 24525899, NULL, NULL, NULL, 'image/24525899/2.jpg', '', '', ''),
(84, 24525899, NULL, NULL, NULL, 'image/24525899/3.jpg', '', '', ''),
(85, 24525899, NULL, NULL, NULL, 'image/24525899/4.jpg', '', '', ''),
(86, 24525899, NULL, NULL, NULL, 'image/24525899/5.jpg', '', '', ''),
(87, 290156737, NULL, NULL, NULL, 'image/290156737/1.jpg', '', '', ''),
(88, 290156737, NULL, NULL, NULL, 'image/290156737/2.jpg', '', '', ''),
(89, 290156737, NULL, NULL, NULL, 'image/290156737/3.jpg', '', '', ''),
(90, 290156737, NULL, NULL, NULL, 'image/290156737/4.jpg', '', '', ''),
(91, 188361335, NULL, NULL, NULL, 'image/188361335/1.jpg', '', '', ''),
(92, 188361335, NULL, NULL, NULL, 'image/188361335/2.jpg', '', '', ''),
(93, 188361335, NULL, NULL, NULL, 'image/188361335/3.jpg', '', '', ''),
(94, 188361335, NULL, NULL, NULL, 'image/188361335/4.jpg', '', '', ''),
(95, 760262571, NULL, NULL, NULL, 'image/760262571/1.jpg', '', '', ''),
(96, 760262571, NULL, NULL, NULL, 'image/760262571/2.jpg', '', '', ''),
(97, 760262571, NULL, NULL, NULL, 'image/760262571/3.jpg', '', '', ''),
(98, 760262571, NULL, NULL, NULL, 'image/760262571/4.jpg', '', '', ''),
(99, 760262571, NULL, NULL, NULL, 'image/760262571/5.jpg', '', '', ''),
(100, 59932937, NULL, NULL, NULL, 'image/59932937/1.jpg', '', '', ''),
(101, 59932937, NULL, NULL, NULL, 'image/59932937/2.jpg', '', '', ''),
(102, 59932937, NULL, NULL, NULL, 'image/59932937/3.jpg', '', '', ''),
(103, 59932937, NULL, NULL, NULL, 'image/59932937/4.jpg', '', '', ''),
(104, 59932937, NULL, NULL, NULL, 'image/59932937/5.jpg', '', '', ''),
(105, 949116310, NULL, NULL, NULL, 'image/949116310/1.jpg', '', '', ''),
(106, 949116310, NULL, NULL, NULL, 'image/949116310/2.jpg', '', '', ''),
(107, 949116310, NULL, NULL, NULL, 'image/949116310/3.jpg', '', '', ''),
(108, 949116310, NULL, NULL, NULL, 'image/949116310/4.jpg', '', '', ''),
(109, 949116310, NULL, NULL, NULL, 'image/949116310/5.jpg', '', '', ''),
(110, 764196012, NULL, NULL, NULL, 'image/764196012/1.jpg', '', '', ''),
(111, 764196012, NULL, NULL, NULL, 'image/764196012/2.jpg', '', '', ''),
(112, 764196012, NULL, NULL, NULL, 'image/764196012/3.jpg', '', '', ''),
(113, 764196012, NULL, NULL, NULL, 'image/764196012/4.jpg', '', '', ''),
(114, 764196012, NULL, NULL, NULL, 'image/764196012/5.jpg', '', '', ''),
(115, 292736654, NULL, NULL, NULL, 'image/292736654/1.jpg', '', '', ''),
(116, 292736654, NULL, NULL, NULL, 'image/292736654/2.jpg', '', '', ''),
(117, 292736654, NULL, NULL, NULL, 'image/292736654/3.jpg', '', '', ''),
(118, 292736654, NULL, NULL, NULL, 'image/292736654/4.jpg', '', '', ''),
(119, 292736654, NULL, NULL, NULL, 'image/292736654/5.jpg', '', '', ''),
(120, 929558207, NULL, NULL, NULL, 'image/929558207/1.jpg', '', '', ''),
(121, 929558207, NULL, NULL, NULL, 'image/929558207/2.jpg', '', '', ''),
(122, 929558207, NULL, NULL, NULL, 'image/929558207/3.jpg', '', '', ''),
(123, 929558207, NULL, NULL, NULL, 'image/929558207/4.jpg', '', '', ''),
(124, 929558207, NULL, NULL, NULL, 'image/929558207/5.jpg', '', '', ''),
(125, 487160427, NULL, NULL, NULL, 'image/487160427/1.jpg', '', '', ''),
(126, 487160427, NULL, NULL, NULL, 'image/487160427/2.jpg', '', '', ''),
(127, 487160427, NULL, NULL, NULL, 'image/487160427/3.jpg', '', '', ''),
(128, 487160427, NULL, NULL, NULL, 'image/487160427/4.jpg', '', '', ''),
(129, 487160427, NULL, NULL, NULL, 'image/487160427/5.jpg', '', '', ''),
(130, 441210504, NULL, NULL, NULL, 'image/441210504/1.jpg', '', '', ''),
(131, 441210504, NULL, NULL, NULL, 'image/441210504/2.jpg', '', '', ''),
(132, 441210504, NULL, NULL, NULL, 'image/441210504/3.jpg', '', '', ''),
(133, 441210504, NULL, NULL, NULL, 'image/441210504/4.jpg', '', '', ''),
(134, 441210504, NULL, NULL, NULL, 'image/441210504/5.jpg', '', '', ''),
(135, 15069579, NULL, NULL, NULL, 'image/15069579/1.jpg', '', '', ''),
(136, 15069579, NULL, NULL, NULL, 'image/15069579/2.jpg', '', '', ''),
(137, 15069579, NULL, NULL, NULL, 'image/15069579/3.jpg', '', '', ''),
(138, 15069579, NULL, NULL, NULL, 'image/15069579/4.jpg', '', '', ''),
(139, 15069579, NULL, NULL, NULL, 'image/15069579/5.jpg', '', '', ''),
(140, 712381516, NULL, NULL, NULL, 'image/712381516/1.jpg', '', '', ''),
(141, 712381516, NULL, NULL, NULL, 'image/712381516/2.jpg', '', '', ''),
(142, 712381516, NULL, NULL, NULL, 'image/712381516/3.jpg', '', '', ''),
(143, 712381516, NULL, NULL, NULL, 'image/712381516/4.jpg', '', '', ''),
(144, 712381516, NULL, NULL, NULL, 'image/712381516/5.jpg', '', '', ''),
(145, 516771158, NULL, NULL, NULL, 'image/516771158/1.jpg', '', '', ''),
(146, 516771158, NULL, NULL, NULL, 'image/516771158/2.jpg', '', '', ''),
(147, 516771158, NULL, NULL, NULL, 'image/516771158/3.jpg', '', '', ''),
(148, 516771158, NULL, NULL, NULL, 'image/516771158/4.jpg', '', '', ''),
(149, NULL, NULL, NULL, 1, '', '', 'image/perfilcliente/1/perfilCliente.jpg', ''),
(150, 689669391, NULL, NULL, NULL, 'image/689669391/1.jpg', '', '', ''),
(151, 689669391, NULL, NULL, NULL, 'image/689669391/2.jpg', '', '', ''),
(152, 689669391, NULL, NULL, NULL, 'image/689669391/3.jpg', '', '', ''),
(153, 689669391, NULL, NULL, NULL, 'image/689669391/4.jpg', '', '', ''),
(154, 689669391, NULL, NULL, NULL, 'image/689669391/5.jpg', '', '', ''),
(155, 605416737, NULL, NULL, NULL, 'image/605416737/1.jpg', '', '', ''),
(156, 605416737, NULL, NULL, NULL, 'image/605416737/2.jpg', '', '', ''),
(157, 605416737, NULL, NULL, NULL, 'image/605416737/3.jpg', '', '', ''),
(158, 605416737, NULL, NULL, NULL, 'image/605416737/4.jpg', '', '', ''),
(159, 605416737, NULL, NULL, NULL, 'image/605416737/5.jpg', '', '', ''),
(160, 981813107, NULL, NULL, NULL, 'image/981813107/1.jpg', '', '', ''),
(161, 981813107, NULL, NULL, NULL, 'image/981813107/2.jpg', '', '', ''),
(162, 981813107, NULL, NULL, NULL, 'image/981813107/3.jpg', '', '', ''),
(163, 981813107, NULL, NULL, NULL, 'image/981813107/4.jpg', '', '', ''),
(164, 981813107, NULL, NULL, NULL, 'image/981813107/5.jpg', '', '', ''),
(165, 595948074, NULL, NULL, NULL, 'image/595948074/1.jpg', '', '', ''),
(166, 595948074, NULL, NULL, NULL, 'image/595948074/2.jpg', '', '', ''),
(167, 595948074, NULL, NULL, NULL, 'image/595948074/3.jpg', '', '', ''),
(168, 595948074, NULL, NULL, NULL, 'image/595948074/4.jpg', '', '', ''),
(169, 595948074, NULL, NULL, NULL, 'image/595948074/5.jpg', '', '', ''),
(170, 629323921, NULL, NULL, NULL, 'image/629323921/1.jpg', '', '', ''),
(171, 629323921, NULL, NULL, NULL, 'image/629323921/2.jpg', '', '', ''),
(172, 629323921, NULL, NULL, NULL, 'image/629323921/3.jpg', '', '', ''),
(173, 629323921, NULL, NULL, NULL, 'image/629323921/4.jpg', '', '', ''),
(174, 629323921, NULL, NULL, NULL, 'image/629323921/5.jpg', '', '', ''),
(175, 272384215, NULL, NULL, NULL, 'image/272384215/1.jpg', '', '', ''),
(176, 272384215, NULL, NULL, NULL, 'image/272384215/2.jpg', '', '', ''),
(177, 272384215, NULL, NULL, NULL, 'image/272384215/3.jpg', '', '', ''),
(178, 272384215, NULL, NULL, NULL, 'image/272384215/4.jpg', '', '', ''),
(179, 272384215, NULL, NULL, NULL, 'image/272384215/5.jpg', '', '', ''),
(180, 709687183, NULL, NULL, NULL, 'image/709687183/1.jpg', '', '', ''),
(181, 709687183, NULL, NULL, NULL, 'image/709687183/2.jpg', '', '', ''),
(182, 709687183, NULL, NULL, NULL, 'image/709687183/3.jpg', '', '', ''),
(183, 709687183, NULL, NULL, NULL, 'image/709687183/4.jpg', '', '', ''),
(184, 709687183, NULL, NULL, NULL, 'image/709687183/5.jpg', '', '', ''),
(185, 962330095, NULL, NULL, NULL, 'image/962330095/1.jpg', '', '', ''),
(186, 962330095, NULL, NULL, NULL, 'image/962330095/2.jpg', '', '', ''),
(187, 962330095, NULL, NULL, NULL, 'image/962330095/3.jpg', '', '', ''),
(188, 962330095, NULL, NULL, NULL, 'image/962330095/4.jpg', '', '', ''),
(189, 962330095, NULL, NULL, NULL, 'image/962330095/5.jpg', '', '', ''),
(190, 101364696, NULL, NULL, NULL, 'image/101364696/1.jpg', '', '', ''),
(191, 101364696, NULL, NULL, NULL, 'image/101364696/2.jpg', '', '', ''),
(192, 101364696, NULL, NULL, NULL, 'image/101364696/3.jpg', '', '', ''),
(193, 101364696, NULL, NULL, NULL, 'image/101364696/4.jpg', '', '', ''),
(194, 101364696, NULL, NULL, NULL, 'image/101364696/5.jpg', '', '', ''),
(195, 519970258, NULL, NULL, NULL, 'image/519970258/1.jpg', '', '', ''),
(196, 519970258, NULL, NULL, NULL, 'image/519970258/2.jpg', '', '', ''),
(197, 519970258, NULL, NULL, NULL, 'image/519970258/3.jpg', '', '', ''),
(198, 519970258, NULL, NULL, NULL, 'image/519970258/4.jpg', '', '', ''),
(199, 519970258, NULL, NULL, NULL, 'image/519970258/5.jpg', '', '', ''),
(200, 764053446, NULL, NULL, NULL, 'image/764053446/1.jpg', '', '', ''),
(201, 764053446, NULL, NULL, NULL, 'image/764053446/2.jpg', '', '', ''),
(202, 764053446, NULL, NULL, NULL, 'image/764053446/3.jpg', '', '', ''),
(203, 764053446, NULL, NULL, NULL, 'image/764053446/4.jpg', '', '', ''),
(204, 764053446, NULL, NULL, NULL, 'image/764053446/5.jpg', '', '', ''),
(205, 232776728, NULL, NULL, NULL, 'image/232776728/1.jpg', '', '', ''),
(206, 232776728, NULL, NULL, NULL, 'image/232776728/2.jpg', '', '', ''),
(207, 232776728, NULL, NULL, NULL, 'image/232776728/3.jpg', '', '', ''),
(208, 232776728, NULL, NULL, NULL, 'image/232776728/4.jpg', '', '', ''),
(209, 267263324, NULL, NULL, NULL, 'image/267263324/1.jpg', '', '', ''),
(210, 267263324, NULL, NULL, NULL, 'image/267263324/2.jpg', '', '', ''),
(211, 267263324, NULL, NULL, NULL, 'image/267263324/3.jpg', '', '', ''),
(212, 267263324, NULL, NULL, NULL, 'image/267263324/4.jpg', '', '', ''),
(213, 267263324, NULL, NULL, NULL, 'image/267263324/5.jpg', '', '', ''),
(214, NULL, 253732436, NULL, NULL, 'image/253732436/1.jpg', '', '', ''),
(215, NULL, 253732436, NULL, NULL, 'image/253732436/2.jpg', '', '', ''),
(216, NULL, 253732436, NULL, NULL, 'image/253732436/3.jpg', '', '', ''),
(217, NULL, 253732436, NULL, NULL, 'image/253732436/4.jpg', '', '', ''),
(218, 112073075, NULL, NULL, NULL, 'image/112073075/1.jpg', '', '', ''),
(219, 112073075, NULL, NULL, NULL, 'image/112073075/2.jpg', '', '', ''),
(220, 112073075, NULL, NULL, NULL, 'image/112073075/3.jpg', '', '', ''),
(221, 112073075, NULL, NULL, NULL, 'image/112073075/4.jpg', '', '', ''),
(222, 112073075, NULL, NULL, NULL, 'image/112073075/5.jpg', '', '', ''),
(223, 248950189, NULL, NULL, NULL, 'image/248950189/1.jpg', '', '', ''),
(224, 248950189, NULL, NULL, NULL, 'image/248950189/2.jpg', '', '', ''),
(225, 248950189, NULL, NULL, NULL, 'image/248950189/3.jpg', '', '', ''),
(226, 248950189, NULL, NULL, NULL, 'image/248950189/4.jpg', '', '', ''),
(227, 248950189, NULL, NULL, NULL, 'image/248950189/5.jpg', '', '', ''),
(228, 327905705, NULL, NULL, NULL, 'image/327905705/1.jpg', '', '', ''),
(229, 327905705, NULL, NULL, NULL, 'image/327905705/2.jpg', '', '', ''),
(230, 327905705, NULL, NULL, NULL, 'image/327905705/3.jpg', '', '', ''),
(231, 327905705, NULL, NULL, NULL, 'image/327905705/4.jpg', '', '', ''),
(232, 327905705, NULL, NULL, NULL, 'image/327905705/5.jpg', '', '', ''),
(233, 916795615, NULL, NULL, NULL, 'image/916795615/1.jpg', '', '', ''),
(234, 916795615, NULL, NULL, NULL, 'image/916795615/2.jpg', '', '', ''),
(235, 916795615, NULL, NULL, NULL, 'image/916795615/3.jpg', '', '', ''),
(236, 916795615, NULL, NULL, NULL, 'image/916795615/4.jpg', '', '', ''),
(237, 916795615, NULL, NULL, NULL, 'image/916795615/5.jpg', '', '', ''),
(238, 85878949, NULL, NULL, NULL, 'image/85878949/1.jpg', '', '', ''),
(239, 85878949, NULL, NULL, NULL, 'image/85878949/2.jpg', '', '', ''),
(240, 85878949, NULL, NULL, NULL, 'image/85878949/3.jpg', '', '', ''),
(241, 85878949, NULL, NULL, NULL, 'image/85878949/4.jpg', '', '', ''),
(242, 85878949, NULL, NULL, NULL, 'image/85878949/5.jpg', '', '', ''),
(243, 872574928, NULL, NULL, NULL, 'image/872574928/1.jpg', '', '', ''),
(244, 872574928, NULL, NULL, NULL, 'image/872574928/2.jpg', '', '', ''),
(245, 872574928, NULL, NULL, NULL, 'image/872574928/3.jpg', '', '', ''),
(246, 872574928, NULL, NULL, NULL, 'image/872574928/4.jpg', '', '', ''),
(247, 872574928, NULL, NULL, NULL, 'image/872574928/5.jpg', '', '', ''),
(248, 324890283, NULL, NULL, NULL, 'image/324890283/1.jpg', '', '', ''),
(249, 324890283, NULL, NULL, NULL, 'image/324890283/2.jpg', '', '', ''),
(250, 324890283, NULL, NULL, NULL, 'image/324890283/3.jpg', '', '', ''),
(251, 324890283, NULL, NULL, NULL, 'image/324890283/4.jpg', '', '', ''),
(252, 711652868, NULL, NULL, NULL, 'image/711652868/1.jpg', '', '', ''),
(253, 711652868, NULL, NULL, NULL, 'image/711652868/2.jpg', '', '', ''),
(254, 711652868, NULL, NULL, NULL, 'image/711652868/3.jpg', '', '', ''),
(255, 711652868, NULL, NULL, NULL, 'image/711652868/4.jpg', '', '', ''),
(256, NULL, 776220398, NULL, NULL, 'image/776220398/1.jpg', '', '', ''),
(257, NULL, 776220398, NULL, NULL, 'image/776220398/2.jpg', '', '', ''),
(258, NULL, 776220398, NULL, NULL, 'image/776220398/3.jpg', '', '', ''),
(259, NULL, 776220398, NULL, NULL, 'image/776220398/4.jpg', '', '', ''),
(260, NULL, 961923468, NULL, NULL, 'image/961923468/1.jpg', '', '', ''),
(261, NULL, 961923468, NULL, NULL, 'image/961923468/2.jpg', '', '', ''),
(262, NULL, 961923468, NULL, NULL, 'image/961923468/3.jpg', '', '', ''),
(263, NULL, 961923468, NULL, NULL, 'image/961923468/4.jpg', '', '', ''),
(264, NULL, 956180931, NULL, NULL, 'image/956180931/1.jpg', '', '', ''),
(265, NULL, 956180931, NULL, NULL, 'image/956180931/2.jpg', '', '', ''),
(266, NULL, 956180931, NULL, NULL, 'image/956180931/3.jpg', '', '', ''),
(267, NULL, 956180931, NULL, NULL, 'image/956180931/4.jpg', '', '', ''),
(268, NULL, 189709214, NULL, NULL, 'image/189709214/1.jpg', '', '', ''),
(269, NULL, 189709214, NULL, NULL, 'image/189709214/2.jpg', '', '', ''),
(270, NULL, 189709214, NULL, NULL, 'image/189709214/3.jpg', '', '', ''),
(271, NULL, 189709214, NULL, NULL, 'image/189709214/4.jpg', '', '', ''),
(272, NULL, 411304110, NULL, NULL, 'image/411304110/1.jpg', '', '', ''),
(273, NULL, 411304110, NULL, NULL, 'image/411304110/2.jpg', '', '', ''),
(274, NULL, 411304110, NULL, NULL, 'image/411304110/3.jpg', '', '', ''),
(275, NULL, 411304110, NULL, NULL, 'image/411304110/4.jpg', '', '', ''),
(276, NULL, 657083085, NULL, NULL, 'image/657083085/1.jpg', '', '', ''),
(277, NULL, 657083085, NULL, NULL, 'image/657083085/2.jpg', '', '', ''),
(278, NULL, 657083085, NULL, NULL, 'image/657083085/3.jpg', '', '', ''),
(279, NULL, 657083085, NULL, NULL, 'image/657083085/4.jpg', '', '', ''),
(280, NULL, 465617173, NULL, NULL, 'image/465617173/1.jpg', '', '', ''),
(281, NULL, 465617173, NULL, NULL, 'image/465617173/2.jpg', '', '', ''),
(282, NULL, 465617173, NULL, NULL, 'image/465617173/3.jpg', '', '', ''),
(283, NULL, 465617173, NULL, NULL, 'image/465617173/4.jpg', '', '', ''),
(284, NULL, 67898463, NULL, NULL, 'image/67898463/1.jpg', '', '', ''),
(285, NULL, 67898463, NULL, NULL, 'image/67898463/2.jpg', '', '', ''),
(286, NULL, 67898463, NULL, NULL, 'image/67898463/3.jpg', '', '', ''),
(287, NULL, 67898463, NULL, NULL, 'image/67898463/4.jpg', '', '', ''),
(288, NULL, 273466604, NULL, NULL, 'image/273466604/1.jpg', '', '', ''),
(289, NULL, 273466604, NULL, NULL, 'image/273466604/2.jpg', '', '', ''),
(290, NULL, 273466604, NULL, NULL, 'image/273466604/3.jpg', '', '', ''),
(291, NULL, 273466604, NULL, NULL, 'image/273466604/4.jpg', '', '', ''),
(292, 318919605, NULL, NULL, NULL, 'image/318919605/1.jpg', '', '', ''),
(293, 318919605, NULL, NULL, NULL, 'image/318919605/2.jpg', '', '', ''),
(294, 318919605, NULL, NULL, NULL, 'image/318919605/3.jpg', '', '', ''),
(295, 318919605, NULL, NULL, NULL, 'image/318919605/4.jpg', '', '', ''),
(296, 152994751, NULL, NULL, NULL, 'image/152994751/1.jpg', '', '', ''),
(297, 152994751, NULL, NULL, NULL, 'image/152994751/2.jpg', '', '', ''),
(298, 152994751, NULL, NULL, NULL, 'image/152994751/3.jpg', '', '', ''),
(299, 152994751, NULL, NULL, NULL, 'image/152994751/4.jpg', '', '', ''),
(300, 293304731, NULL, NULL, NULL, 'image/293304731/1.jpg', '', '', ''),
(301, 293304731, NULL, NULL, NULL, 'image/293304731/2.jpg', '', '', ''),
(302, 293304731, NULL, NULL, NULL, 'image/293304731/3.jpg', '', '', ''),
(303, 293304731, NULL, NULL, NULL, 'image/293304731/4.jpg', '', '', ''),
(304, NULL, NULL, 3, NULL, '', '', 'image/perfilpreterminado.png', ''),
(305, 575604567, NULL, NULL, NULL, 'image/575604567/1.jpg', '', '', ''),
(306, 575604567, NULL, NULL, NULL, 'image/575604567/2.jpg', '', '', ''),
(307, 575604567, NULL, NULL, NULL, 'image/575604567/3.jpg', '', '', ''),
(308, 575604567, NULL, NULL, NULL, 'image/575604567/4.jpg', '', '', ''),
(309, NULL, NULL, 4, NULL, '', '', 'image/perfilpreterminado.png', ''),
(310, NULL, NULL, 5, NULL, '', '', 'image/perfilpreterminado.png', '');

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
(1, 'Loreal', 'Loreal114', 'Paris', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idReservacion` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaModificar` date NOT NULL DEFAULT '2021-10-25',
  `horaCreacion` time NOT NULL,
  `horaModificar` time NOT NULL DEFAULT '02:39:00',
  `valorTotal` decimal(7,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `idReservacion`, `idUser`, `idCliente`, `fechaCreacion`, `fechaModificar`, `horaCreacion`, `horaModificar`, `valorTotal`, `eliminado`, `estado`) VALUES
(379151525, 274801758, 2, 1, '2021-11-02', '2021-11-02', '00:32:09', '00:32:09', '5000.00', 0, 3),
(528922499, NULL, NULL, 1, '2021-11-02', '2021-11-02', '02:52:40', '02:52:40', '0.00', 0, 1);

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
(9, 'Reservaciones', 'fas fa-calendar-plus', 0),
(14, 'prueba2', 'fas fa-clipboard-check', 1),
(15, 'prueba1', 'fas fa-users-cog', 1),
(16, 'prueba1', 'fas fa-users-cog', 1),
(17, 'sssssdsfdsfsdf', 'fas fa-home', 1),
(18, 'Ingreso', 'fas fa-home', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `idPagina` int(11) NOT NULL,
  `idModulo` int(11) DEFAULT NULL,
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
(1, 3, 'Cajero', 'view/cajero.php', 1, 1, 0),
(2, 3, 'Facturas', 'view/listarfacturas.php', 1, 1, 0),
(3, 3, 'Estados Facturas', 'view/estadofactura.php', 1, 0, 0),
(4, 7, 'Nuevo Cargo', 'view/nuevocargo.php', 1, 0, 0),
(5, 7, 'Cargos', 'view/listarcargo.php', 1, 1, 0),
(6, 7, 'Actualizar Cargo', 'view/formularioeditarcargo.php', 1, 0, 0),
(7, 7, 'Usuario Cargo', 'view/mostrarusuariocargo.php', 1, 0, 0),
(8, 5, 'Clientes', 'view/listarcliente.php', 1, 1, 0),
(9, 5, 'Galeria', 'view/galeria.php', 0, 0, 0),
(10, 5, 'Vista Producto', 'view/vistaproducto.php', 0, 0, 0),
(11, 5, 'Detalle Producto', 'view/detalleProducto.php', 1, 0, 0),
(12, 5, 'Pedido Cliente', 'view/pedidocliente.php', 1, 0, 0),
(13, 5, 'Compras Recientes', 'view/comprasrecientes.php', 1, 0, 0),
(14, 5, 'Vista Servicio', 'view/vistaservicio.php', 0, 0, 0),
(15, 5, 'Reservaciones', 'view/listarreservacion.php', 1, 0, 0),
(16, 5, 'Nueva Rerservacion', 'view/nuevareservacion.php', 1, 0, 0),
(17, 5, 'Editar Reservacion', 'view/formularioeditarreservacion.php', 1, 0, 0),
(18, 5, 'Perfil Cliente', 'view/perfilcliente.php', 1, 0, 0),
(19, 1, 'Nuevo Modulo', 'view/nuevomodulo.php', 1, 0, 0),
(20, 1, 'Editar Modulo', 'view/formularioeditarmodulo.php', 1, 0, 0),
(21, 1, 'Modulos', 'view/listarmodulo.php', 1, 1, 0),
(22, 1, 'Nueva Pagina', 'view/nuevapagina.php', 1, 0, 0),
(23, 1, 'Editar Pagina', 'view/formularioeditarpagina.php', 1, 0, 0),
(24, 1, 'Pagina', 'view/listarpagina.php', 1, 1, 1),
(25, 1, 'Pagina', 'view/listarpagina.php', 1, 0, 0),
(26, 1, 'Nuevo Rol', 'view/nuevorol.php', 1, 0, 0),
(27, 1, 'Editar Rol', 'view/formularioeditarrol.php', 1, 0, 0),
(28, 1, 'Roles', 'view/listarrol.php', 1, 1, 0),
(29, 1, 'Detalle Rol', 'view/listardetallerol.php', 1, 0, 0),
(30, 1, 'Usuarios', 'view/listarusuario.php', 1, 1, 0),
(31, 1, 'Perfil Empleado', 'view/perfilempleado.php', 1, 0, 0),
(32, 2, 'Nueva Empresa', 'view/nuevaempresa.php', 1, 0, 0),
(33, 2, 'Editar Empresa', 'view/formularioeditarempresa.php', 1, 0, 0),
(34, 2, 'Empresa', 'view/listarempresa.php', 1, 1, 0),
(35, 2, 'Pedido', 'view/listarpedido.php', 1, 1, 0),
(36, 2, 'Nuevo Pedido', 'view/nuevopedido.php', 1, 0, 0),
(37, 2, 'Editar Pedido', 'view/formularioeditarpedido.php', 1, 0, 0),
(38, 2, 'Detalle Pedido', 'view/detallepedido.php', 1, 0, 0),
(39, 2, 'Inventario', 'view/listarinventario.php', 1, 1, 0),
(40, 4, 'Productos', 'view/listarproducto.php', 1, 1, 0),
(41, 4, 'Nuevo Producto', 'view/nuevoproducto.php', 1, 0, 0),
(42, 4, 'Editar Producto', 'view/formularioeditarproducto.php', 1, 0, 0),
(43, 9, 'Mostrar Reservaciones', 'view/mostrarreservacion.php', 1, 1, 0),
(44, 9, 'Crear Reservacion', 'view/crearreservacion.php', 1, 0, 0),
(45, 9, 'Editar Reservacion', 'view/editarreservacion.php', 1, 0, 0),
(46, 8, 'Servicios', 'view/listarservicio.php', 1, 1, 0),
(47, 8, 'Nuevo Servicio', 'view/nuevoservicio.php', 1, 0, 0),
(48, 8, 'Editar Servicio', 'view/formularioeditarservicio.php', 1, 0, 0),
(49, 4, 'Etiquetas(Tags)', 'view/tags.php', 1, 0, 0),
(50, 4, 'Nueva Tags', 'view/nuevatags.php', 1, 0, 0),
(51, 4, 'Editar Tags', 'view/formularioeditartags.php', 1, 0, 0),
(52, 4, 'Categoria', 'view/categoria.php', 1, 0, 0),
(53, 4, 'Editar Categoria', 'view/formularioeditarcategoria.php', 1, 0, 0),
(54, 4, 'Nueva Categoria', 'view/nuevacategoria.php', 1, 0, 0),
(55, 4, 'Detalle Categoria', 'view/detallecategoria.php', 1, 0, 0),
(56, 18, 'Login Cliente', 'view/logincliente.php', 0, 0, 0);

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
(1, 268916690, NULL, 8, 0),
(2, 268916690, NULL, 9, 0),
(3, 16360263, NULL, 8, 0),
(4, 16360263, NULL, 9, 0),
(5, 480392225, NULL, 8, 0),
(6, 480392225, NULL, 9, 0),
(7, 480392225, NULL, 11, 0),
(8, 480392225, NULL, 12, 0),
(9, 480392225, NULL, 13, 0),
(10, 822314731, NULL, 8, 0),
(11, 822314731, NULL, 11, 0),
(12, 822314731, NULL, 12, 0),
(13, 822314731, NULL, 13, 0),
(14, 759726823, NULL, 11, 0),
(15, 759726823, NULL, 12, 0),
(16, 759726823, NULL, 13, 0),
(17, 404242146, NULL, 11, 0),
(18, 404242146, NULL, 12, 0),
(19, 404242146, NULL, 13, 0),
(20, 19790671, NULL, 9, 0),
(21, 19790671, NULL, 11, 0),
(22, 805973408, NULL, 9, 0),
(23, 805973408, NULL, 11, 0),
(24, 233977974, NULL, 8, 0),
(25, 233977974, NULL, 11, 0),
(26, 649030980, NULL, 9, 0),
(27, 649030980, NULL, 11, 0),
(28, 940295018, NULL, 8, 0),
(29, 940295018, NULL, 9, 0),
(30, 603660015, NULL, 4, 0),
(31, 603660015, NULL, 6, 0),
(32, 336409946, NULL, 5, 0),
(33, 336409946, NULL, 6, 0),
(34, 15652646, NULL, 2, 0),
(35, 15652646, NULL, 15, 0),
(36, 808515809, NULL, 14, 0),
(37, 808515809, NULL, 15, 0),
(38, 439363406, NULL, 4, 0),
(39, 439363406, NULL, 10, 0),
(40, 24525899, NULL, 14, 0),
(41, 24525899, NULL, 15, 0),
(42, 290156737, NULL, 14, 0),
(43, 188361335, NULL, 14, 0),
(44, 760262571, NULL, 14, 0),
(45, 59932937, NULL, 2, 0),
(46, 59932937, NULL, 4, 0),
(47, 59932937, NULL, 5, 0),
(48, 949116310, NULL, 2, 0),
(49, 949116310, NULL, 5, 0),
(50, 764196012, NULL, 2, 0),
(51, 764196012, NULL, 6, 0),
(52, 292736654, NULL, 4, 0),
(53, 929558207, NULL, 10, 0),
(54, 487160427, NULL, 2, 0),
(55, 441210504, NULL, 4, 0),
(56, 15069579, NULL, 4, 0),
(57, 712381516, NULL, 2, 0),
(58, 516771158, NULL, 4, 0),
(59, 689669391, NULL, 3, 0),
(60, 689669391, NULL, 10, 0),
(61, 605416737, NULL, 3, 0),
(62, 981813107, NULL, 10, 0),
(63, 595948074, NULL, 3, 0),
(64, 629323921, NULL, 2, 0),
(65, 629323921, NULL, 3, 0),
(66, 272384215, NULL, 3, 0),
(67, 709687183, NULL, 3, 0),
(68, 962330095, NULL, 7, 0),
(69, 101364696, NULL, 3, 0),
(70, 519970258, NULL, 3, 0),
(71, 764053446, NULL, 1, 0),
(72, 232776728, NULL, 2, 0),
(73, 267263324, NULL, 1, 0),
(74, NULL, 253732436, 6, 0),
(75, 112073075, NULL, 2, 0),
(76, 248950189, NULL, 2, 0),
(77, 327905705, NULL, 6, 0),
(78, 916795615, NULL, 4, 0),
(79, 85878949, NULL, 2, 0),
(80, 872574928, NULL, 1, 0),
(81, 324890283, NULL, 6, 0),
(82, 711652868, NULL, 2, 0),
(83, NULL, 776220398, 5, 0),
(84, NULL, 961923468, 4, 0),
(85, NULL, 956180931, 4, 0),
(86, NULL, 189709214, 4, 0),
(87, NULL, 411304110, 4, 0),
(88, NULL, 657083085, 4, 0),
(89, NULL, 465617173, 4, 0),
(90, NULL, 67898463, 4, 0),
(91, NULL, 273466604, 2, 0),
(92, 318919605, NULL, 2, 0),
(93, 152994751, NULL, 2, 0),
(94, 293304731, NULL, 3, 0),
(95, 575604567, NULL, 3, 0);

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
(45001408, 1, 1006700633, 'Jimena Olaya', 'Loreal114', 'Loreal', 'Paris', '2021-11-01', 0, 0);

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
(1, 1, 19),
(1, 1, 20),
(1, 1, 21),
(1, 1, 22),
(1, 1, 23),
(1, 1, 25),
(1, 1, 26),
(1, 1, 27),
(1, 1, 28),
(1, 1, 29),
(1, 1, 30),
(1, 1, 31),
(1, 2, 32),
(1, 2, 33),
(1, 2, 34),
(1, 2, 35),
(1, 2, 36),
(1, 2, 37),
(1, 2, 38),
(1, 2, 39),
(1, 3, 1),
(1, 3, 2),
(1, 3, 3),
(1, 4, 40),
(1, 4, 41),
(1, 4, 42),
(1, 4, 49),
(1, 4, 50),
(1, 4, 51),
(1, 4, 52),
(1, 4, 53),
(1, 4, 54),
(1, 4, 55),
(1, 5, 8),
(1, 7, 4),
(1, 7, 5),
(1, 7, 6),
(1, 7, 7),
(1, 8, 46),
(1, 8, 47),
(1, 8, 48),
(1, 9, 43),
(1, 9, 44),
(1, 9, 45);

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
  `valorUnitario` decimal(7,2) NOT NULL,
  `costoProducto` decimal(7,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `idCategoria`, `codigoProducto`, `nombreProducto`, `descripcionProducto`, `cantidad`, `caracteristicas`, `valorUnitario`, `costoProducto`, `eliminado`) VALUES
(15069579, 1, '000028', 'Fibras Capilares Queratina 27.5gr. Toppik ', 'Toppik es una forma segura, natural e indetectable para mejorar la apariencia de adelgazamiento del cabello sin drogas nocivas, productos químicos o cirugía. Toppik Hair Building Fibers están hechas d', 0, 'Efectos: FIBRAS CAPILARES\r\nFormato: FIBRAS CAPILARES\r\nPresentación: Pote\r\nCantidad: 28\r\nTipo de unidad: g', '23000.00', '26000.00', 0),
(15652646, 9, '000014', 'Youthair Crema Cabello Anti Canas Oscurece De Mane', 'Crema Anticanas Youthair 473 ml\r\n\r\nCon el uso diario, Youthair devolverá gradualmente el cabello a su color natural juvenil, sin tintes. Su fórmula única proporciona resultados naturales de larga dura', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '34900.00', '38900.00', 0),
(16360263, 8, '000002', 'Base Y Top Coat Para Semipermanente', 'La base, como su nombre lo indica se aplica antes de sobreponer cualquier color para que este se fije y sobre todo, para hidratar las uñas, mientras que el top se aplica posteriormente para darle dura', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '30000.00', '26000.00', 0),
(19790671, 7, '000007', 'Esmaltes Checo', 'Esmaltes y brillos checo\r\n\r\n\r\ntonos disponibles en tornasol\r\n158, 153,159,301, 157, 156, 305, 124, 50D, 49P,......\r\n\r\nESMALTES\r\n6, 133, 5, 151, 150, 148, 1B, 163, 99, 35, 7,2, 3.......\r\n\r\n\r\nANTERIOR P', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '55000.00', '60000.00', 0),
(24525899, 4, '000017', 'Loreal Tinte Majicontrast Rojo', 'LOREAL TINTE DE CABELLO MAJICONTRAST ROJO 50ml\r\n\r\n(ANTIGUA O NUEVA PRESENTACIÓN DEPENDIENDO DE DISPONIBILIDAD, MISMO PRODUCTO)\r\n\r\nCon Majicontrast puedes aplicarte mechas a medida para morenas en un s', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '19300.00', '22000.00', 0),
(59932937, 12, '000021', 'Skala Mais Cachos', 'Tratamiento capilar para cabellos crespos, rico en nutrientes que hidratan y desenredan todo tipo de cabellos rizados, crespos y ondulados. Puede ser utilizado como acondicionador, mais cachos hidrata', 0, 'Efectos: Pelo crespo,pelo rizo\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 1000\r\nTipo de unidad: g', '29000.00', '32000.00', 0),
(85878949, 4, '000045', 'Crema Para Peinar Head & Shoulders Hidratación 300', 'Crema Para Peinar Head & Shoulders Hidratación, 7500435142588\r\n\r\n\"Potencia el poder de tu shampoo head&shoulders con su primera crema para peinar control caspa y anti-frizz.\r\n\r\nLa Crema para Peinar Hi', 0, 'Cantidad: 1\r\nTipo de unidad: mL', '18300.00', '22000.00', 0),
(101364696, 14, '000038', '(recomendado) Lápiz Delineador Ojos Do - g a $1490', 'Somos Ventas Inteligentes Colombia.\r\n\r\nRevisa las calificaciones y comentarios de nuestros clientes y compra con tranquilidad. Nuestros clientes nos recomiendan.\r\n\r\nLápiz Delineador de Ojos Líquido Do', 3, 'Es de larga duración: Sí\r\nEs a prueba de agua: Sí\r\nCantidad: 1\r\nTipo de unidad: g', '14900.00', '20000.00', 0),
(112073075, 3, '000041', 'Crema Para Peinar Elvive Acido Hialuronic - mL a $', 'crema de cabello para risos', 0, 'Marca	Elvive\r\nFormato de venta	Elvive Hidra Hialuronico\r\nUnidades por envase	6\r\n\r\nCantidad: 300\r\nTipo de unidad: mL', '11200.00', '15000.00', 0),
(152994751, 10, '000001', 'kkckkkdk', 'kdfjdfnjdfnjdjn', 0, 'kfkngfkgkkn', '20000.00', '22000.00', 1),
(188361335, 4, '000018', 'Tinte Keraton 7.62 R', 'Coloración capilar permanente en crema que proporciona una completa protección al cabello duran el proceso de coloración, gracias a su formulación con: ACEITE DE ARGAN rico en acido grasos como el ome', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '9900.00', '12000.00', 0),
(232776728, 12, '000001', 'holaaaaaaaaaaaaa', 'hollllllllllllllllla', 0, 'holaaaaaaaaaaaaaaa', '10000.00', '22000.00', 1),
(233977974, 8, '000009', 'Brillo Acrílico Slendy 25 Mililitros', '¡Secado extra rápido! Seca en segundos y da máxima duración al esmalte en tus uñas. Su exclusiva fórmula especialmente desarrollada para reducir al máximo el tiempo de secado después de maquillar las ', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '16000.00', '20000.00', 0),
(248950189, 9, 'jjjjjjjjj', 'hhbouhjih', 'nhffvuhijolnl', 0, 'uvjbsijgpirdrkjx', '15000.00', '10000.00', 1),
(267263324, 13, '000001', 'hplaplkd,okl', 'olszkjfhngvkzsjghbnij', 0, 'ijkdhnzfivkjdnb', '10000.00', '10000.00', 1),
(268916690, 8, '000001', 'Color Gel Semipermanente Uñas', 'Excelentes esmaltes semipermanentes marca SHEENIA, disponibles en más de 25 hermosos colores.\r\nPresentación por 8 ml\r\nNecesita uso de lámpara UV / Led\r\nDuración de hasta 30 días.', 0, 'Tipo de esmalte: Color\r\nEs un producto hipoalergénico: Sí\r\nEs libre de crueldad: Sí\r\nEs fortalecedor: Sí\r\nEs secado rápido: Sí\r\nCantidad de packs: 20\r\nEs inflamable: Sí', '20000.00', '99999.99', 0),
(272384215, 15, '000036', 'Kit Labial Líquido Nailen - g a $1304', 'Kit Labiales Liquidos Nailen x 3 Und Gratis Tula Nailen x 1 Und\r\n\r\nKit Labial Nailen Liquido Cacao Tubo 6 Gramos + Labial Nailen Liquido Doncella Tubo 6 Gramos + Labial Nailen Liquido Pastel Tubo 6 Gr', 0, 'Es de larga duración: Sí\r\nCantidad: 6\r\nTipo de unidad: g', '23900.00', '25000.00', 0),
(290156737, 4, '000019', 'Tinte Keraton 7.62 R', 'Coloración capilar permanente en crema que proporciona una completa protección al cabello duran el proceso de coloración, gracias a su formulación con: ACEITE DE ARGAN rico en acido grasos como el ome', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '99999.99', '99999.99', 0),
(292736654, 3, '000024', 'Shampo Sin Sal + Mascarilla French Gold 500ml Post', 'Kit De Mantenimiento Keratina Shampo y Mascarilla\r\n\r\nEl Kit Post Keratina Frenchs Gold, Contiene:\r\n\r\n1 Shampo Libre de Sal y Parabenos de 500ml\r\n1 Mascarilla Restauradora y Selladora de 500ml\r\n\r\n- Sha', 0, 'Efectos: Mantenimiento Keratina,Cuidado de Liso y Restauracion\r\nFormato: Crema\r\nPresentación: Pote\r\nEs hipoalergénica: Sí\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 1000\r\nTipo de unidad: mL', '40000.00', '50000.00', 0),
(293304731, 12, '000001', 'mjcjcjdjdkidjm', 'njfcjnsnjfnjfnjfjn', 0, 'njdvnjdknfknfkn', '35000.00', '30000.00', 1),
(318919605, 11, '00001', 'Loreal Tinte Majicontrast Rojo', 'ofokgfoppfogkgfpklñ', 0, 'ldlldfmdkfdm', '10000.00', '40000.00', 1),
(324890283, 15, '000048', 'Crema Para Peinar Elvive Oleo Extraordin - mL a $3', 'Crema para peinar que mejora tu cabello', 0, 'Cantidad: 300\r\nTipo de unidad: mL', '9000.00', '13000.00', 0),
(327905705, 3, '000042', 'Crema Termoprotectora Reparación Absolut 150ml', 'FÓRMULA PROFESIONAL Con una infusión de QUÍNOA DORADA + PROTEÍNA. La crema protege el cabello del quiebre y la temperatura hasta 230 °C/450 °F*. Permite un secado más fácil incluso en cabellos muy dañ', 0, 'Marca	SERIE EXPERT\r\nUnidades por envase	1\r\n\r\nTipo de unidad: mL', '30000.00', '40000.00', 0),
(336409946, 4, '000013', 'Tinte Keraton 9.998 Violeta Profundo', 'Coloración capilar permanente en crema que proporciona una completa protección al cabello duran el proceso de coloración, gracias a su formulación con: ACEITE DE ARGAN rico en acido grasos como el ome', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '9900.00', '15000.00', 0),
(404242146, 8, '000006', 'Matificante De Color Para Uñas Esmalte Uv Led', 'Color: Transparente\r\nAdecuado para lámpara: UV/LED Lámpara\r\nVolumen: 10 ml/0,33 fl. oz\r\nArtículo incluido: 1 x 10 ml), parte superior coat mate\r\nrenders han sido mostrado, pls echar un vistazo a la iz', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '99999.99', '99999.99', 0),
(439363406, 4, '000016', 'Tinte Igora Vital 8-77 Cobrizo Claro', 'Descubre la exclusiva fórmula del NUEVO Igora Vital con máximo cuidado y máximo color que reúne todo lo que necesitas para conseguir un look único y natural. Gracias a la coloración permanente del NUE', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '10900.00', '15000.00', 0),
(441210504, 1, '000027', 'Recarga 25gr Fibras Capilares Toppik - G A $ 1036', 'Fibras Capilares Recarga Queratina es una forma segura, natural e indetectable para mejorar la apariencia de adelgazamiento del cabello sin drogas nocivas, productos químicos o cirugía. Toppik sevich ', 0, 'Efectos: FIBRAS CAPILARES\r\nFormato: FIBRAS CAPILARES\r\nPresentación: Sachet\r\nCantidad: 25\r\nTipo de unidad: g', '15000.00', '20000.00', 0),
(480392225, 7, '000003', 'Base Forti Uñas', 'Ideal para fortalecer y dar crecimiento.\r\nPara Uñas maltratadas que no crecen, se doblan,frágiles o quebradizas, enfermas y con rayas.\r\n\r\nModo de uso\r\nAplíquese todos los días, en especial las puntas ', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '10000.00', '15000.00', 0),
(487160427, 9, '000026', 'Tónico Para Barba X3 Unidades', 'Minoxidil Forte Mk Solución Tópica 5% Frasco x 60 ML\r\n\r\nTratamiento para prevenir y controlar la caída del cabello. Coadyuvante en el tratamiento de la alopecia androgénica.\r\n\r\nBeneficios:\r\n• Controla', 0, 'Efectos: No produce efectos secundarios y no tiene contra indicaciones medicas.\r\nFormato: BARBA\r\nPresentación: Dosificador\r\nEs hipoalergénica: No\r\nEs libre de crueldad: Sí\r\nCon fragancia: No\r\nEs vegano: No\r\nCantidad: 30\r\nTipo de unidad: mL', '60000.00', '70000.00', 0),
(516771158, 3, '000030', 'Rizos Y Afro Termoprotector Lec', 'izos y Afro Termoprotector Leche Pal Pelo 250mL\r\n\r\n\r\n\r\n\r\n#QuedateEnCasa | Pagas por un solo envío y te despachamos hasta 20kgs de producto variado, Despacho inmediato desde Cali.\r\nSomos una tienda fís', 0, 'Efectos: Facilita el cepillado y moldeo Ayuda a disminuir el frizz Hidrata,suaviza,disminuye las puntas abiertas Protege de las altas temperatura No genera peso cosmético No requiere de enjuague Ideal para utilizar en la piscina y el mar De uso diario. Aplicar d\r\nFormato: Crema\r\nPresentación: Botella\r\nEs hipoalergénica: Sí\r\nCon fragancia: Sí\r\nCantidad: 250\r\nTipo de unidad: mL', '23500.00', '26000.00', 0),
(519970258, 14, '000040', 'Jabon Fijador De Cejas Organico Con Cepillo Origin', 'Jabon Fijador Organico para Cejas kiss beauty Original.\r\n\r\n\r\nEL PRECIO ES POR 1 UNIDAD, INCLUYE EL CEPILLO PARA APLICAR EL PRODUCTO\r\n\r\nModo de uso:\r\nPonle de 1 a 2 gotas de fijador de maquillaje, agua', 0, 'Marca	Kiss Beauty\r\nLínea	Eyebrow\r\nModelo	Three Dimensional\r\nFormato del delineador	Gel', '10900.00', '25000.00', 0),
(569787989, 4, '000017', 'Loreal Tinte Majicontrast Rojo', 'LOREAL TINTE DE CABELLO MAJICONTRAST ROJO 50ml (ANTIGUA O NUEVA PRESENTACIÓN DEPENDIENDO DE DISPONIBILIDAD, MISMO PRODUCTO) Con Majicontrast puedes aplicarte mechas a medida para morenas en un sólo pa', 0, 'Tipo de producto: Tintura permanente Marca:LOréal Paris\r\nVolumen neto: 50 mL\r\n', '19300.00', '22000.00', 1),
(575604567, 12, 'KKKKKKKjjjsssw', 'hfhfhfhfhfh', 'hhfhfhfhfhhfh', 0, 'hdhdhhdhdhd', '12000.00', '12000.00', 0),
(595948074, 14, '000033', 'Base De maquillaje Mayor Cubrimiento - mL a $316', 'Base De Maquillaje Mayor Cubrimiento x 25 Ml\r\n\r\nCon textura liviana para dejar una apariencia natural.\r\n\r\nTextura ligera y confortable Proporciona una cobertura media a construible: Su fórmula contien', 0, 'Consistencia: Cremoso\r\nAcabado: Mate\r\nCantidad: 25\r\nTipo de unidad: mL', '8000.00', '12000.00', 0),
(603660015, 4, '000012', 'Tonico Capilar Flash Cubre Canas Y Shamp', 'Un (1) Tonico Capilar Flash Cubre Canas de la marca Herbacol es un Tinte natural especial para cubrir canas, libre de amoniaco y peróxido, cubre las canas permanentemente y recupera el cabello maltrat', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '38500.00', '41000.00', 0),
(605416737, 14, '000032', 'Base Nailen Efecto Selfie # 3 - G A $33 - g a $396', 'Base Nailen Efecto Selfie x 30 Gr\r\n\r\nLa base líquida Efecto Selfie es un producto multi beneficios, posee una textura ligera que suaviza la piel, dejando un acabado mate natural. Su fórmula contiene p', 0, 'Consistencia: Cremoso\r\nAcabado: Mate Natural\r\nCantidad: 30\r\nTipo de unidad: g', '11000.00', '15000.00', 0),
(629323921, 15, '000035', 'Combo Labiales Nailen Larga Duración ', 'Es de larga duración: Sí\r\nCantidad: 2\r\nTipo de unidad: g', 0, 'Combo Labiales Nailen Larga Duración x 4 Und Gratis Agenda Nailen x 1 Und\r\n\r\nCombo Labial Nailen Larga Duración Caramel Tubo 2 Gramos + Labial Nailen Larga Duración Frambuesa Tubo 2 Gramos + Labial Nailen Larga Duración Fresa Dulce Tubo 2 Gramos + Labial Nailen Larga Duración Frutos Rojos Tubo 2 Gramos\r\n\r\nLarga duración por más de 8 horas e hidratación con vitamina E y C. Perfectos para el día a día, se combinan con maquillajes naturales o de ojos bien marcados.\r\n\r\nSi observa alguna reacción des', '26000.00', '30000.00', 0),
(649030980, 7, '000010', 'Masglo Gel Evolution Esmalte ', 'SECADO EXTRA RÁPIDO\r\n5 minutos al tacto (Puede variar de un cliente a otro)\r\nEFECTO GEL\r\nColor intenso y duradero, mayor brillo sobre las uñas sin necesidad de lámpara.\r\nDURACIÓN\r\nHasta 12 días.\r\nPORT', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '11900.00', '13000.00', 0),
(689669391, 11, '000031', 'Crema Facial Bb Cream Smart - g ', 'Crema Facial BB Cream Smart x 30 Gr\r\n\r\nBB Cream es una crema con la que es posible obtener la apariencia de rostro perfecto y natural al instante. Es ideal para el día a día.\r\n\r\nAyuda a proteger la pi', 0, 'Formato: Crema\r\nEs un producto hipoalergénico: Sí\r\nCon protección solar: Sí\r\nEs libre de parabenos: Sí\r\nEs testeado dermatológicamente: Sí\r\nFunciones: Apariencia Perfecta & Natural,Protege De Los Rayos Del Sol,Con Ácido Hialurónico,Factor De Protección Solar 19,Con Vitamina E & Colageno\r\nCantidad: 30\r\nTipo de unidad: g', '15000.00', '20000.00', 0),
(709687183, 14, '000037', 'Polvo Compacto Satinado - g a $519', 'Polvo Compacto Satinado Nailen x 14 Gr\r\n\r\nCon perlas micro pulverizadas que le dan un toque satinado a tu piel.\r\n\r\nUn polvo iluminador sedoso que se funde sin esfuerzo sobre la piel. Tiene perlas con ', 0, 'Marca: Nailen\r\nCantidad: 14\r\nTipo de unidad: g', '7000.00', '12000.00', 0),
(711652868, 10, '000044', 'Crema Para Peinar Termoprotect Liss Unl - mL a $58', 'Crema para peinar ', 0, 'Cantidad: 150\r\nTipo de unidad: mL', '88000.00', '91000.00', 0),
(712381516, 3, '000029', 'Hair Protector Laviore By Pyt', 'TERMOPROTECTOR LAVIORE by PYT\r\n\r\n*Protege tu cabello de:\r\nEléctricos (Planchas, Rizadores o Secadores) - Luz artificial y natural – Polución - Radicales libres\r\n\r\n*Te aporta:\r\nBrillo al cabello - Faci', 0, 'Efectos: Genera un escudo para el cabello protegiéndolo del calor y radicales libres.\r\nPresentación: Spray\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: Sí\r\nCantidad: 120\r\nTipo de unidad: mL', '64000.00', '70000.00', 0),
(759726823, 8, '000005', 'Matificante De Color Para Uñas Esmalte Uv Led', 'Color: Transparente\r\nAdecuado para lámpara: UV/LED Lámpara\r\nVolumen: 10 ml/0,33 fl. oz\r\nArtículo incluido: 1 x 10 ml), parte superior coat mate\r\nrenders han sido mostrado, pls echar un vistazo a la iz', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '17000.00', '22000.00', 0),
(760262571, 4, '000020', 'Tinte Inoa Permanente - mL a', 'noa, de LOréal Professionnel, es el sistema revolucionario de coloración permanente a base de aceite y sin amoniaco\r\nLos tintes Inoa Loreal no contienen olor ni amoniaco. Aportan un confort óptimo al ', 0, 'Tipo de producto: Tinte permanente\r\nMarca: Loreal\r\nPresentación: Pomo\r\nIncluye activador: Sí\r\nVolumen neto: 60 mL\r\nPeso neto: 60 g\r\nUnidades por envase: 1\r\nCantidad: 60\r\nTipo de unidad: mL', '27900.00', '32000.00', 0),
(764053446, 11, '000001', 'holaaaaaaaaaaaa', 'holaaaaaaaaaaaaaaaaaaaa', 0, 'holaaaaaaaaaaaaaaaaaaa', '1000.00', '1000.00', 1),
(764196012, 3, '000023', 'Kativa Alisado Brasileño Cabello Natural', 'Kativa Alisado Brasileño Cabello Natural - Despacho Inmediato\r\n\r\nTratamiento de alisado, sin formol, con resultado profesional, que restaura y recupera la fortaleza del cabello, gracias a su fórmula m', 0, 'Otros\r\nEfectos: Alisante\r\nFormato: Multiple\r\nPresentación: Caja\r\nEs hipoalergénica: No\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: No', '61000.00', '70000.00', 0),
(805973408, 7, '000008', 'Base Uñas Rodher Extracto Ajo', 'Base Esmalte Rodher Con Extracto De Ajo x 10 Ml\r\n\r\nBase de uñas con activos especializados que estimulan el crecimiento de tus uñas.\r\n\r\nModo De Uso: Agitar bien antes de usar. Deslice suavemente el pi', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '3400.00', '6000.00', 0),
(808515809, 4, '000015', 'Igora Tinte Rojo Cobrizo', 'IGORA ROYAL cubre hasta un 100% de las canas y proporciona una retención del color y una intensidad máximas. IGORA ROYAL ecualiza el color de manera uniforme, incluso el poroso. Gracias a que sus tono', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '17900.00', '21000.00', 0),
(822314731, 8, '000004', 'Brillo Matificante Vogue Fantastic', 'Brillo Matificante Vogue Fantastic x 10 Ml\r\n\r\nBrillo Fantastic que proporciona brillo mate a tus uñas, de rápido secado y con nuevo pincel plano.\r\n\r\nAgitar bien antes de usar. Deslice suavemente el pi', 0, '<ul class=\"ui-pdp-list__wrapper\" style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; color: rgba(0, 0, 0, 0.9); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"ui-pdp-list__item\" style=\"-webkit-font-smoothing: antialiased; list-style: none; font-size: 12px; padding-bottom: 12px; padding-left: 0px; padding-right: 24px; width: 334px;\"><p ', '3400.00', '6000.00', 0),
(872574928, 3, '000046', 'Desodorante Anti Transpirante Roll-on Piel Sensibl', 'Desodorante de Vichy anti-transpirante Roll-on, pieles sensibles o depiladas. Para mujeres con piel sensible y depilada que busquen un anti-transpirante eficaz y ultra-tolerante. Una suave fórmula esp', 0, 'Otras características\r\nZona de aplicación: Axilas\r\nGénero: Mujer\r\nEs antitranspirante: Sí\r\nCon alcohol: Sí\r\nEs testeado dermatológicamente: Sí\r\nEs apto para piel sensible: Sí\r\nEs anti-manchas: No\r\nCantidad: 50\r\nTipo de unidad: mL', '56000.00', '60000.00', 0),
(916795615, 12, '000043', 'Crema Para Peinar Elvive Reparación Tota - mL a $3', 'Cremas para peinar y dar vida a tu cabello', 0, 'Marca_300	Elvive\r\nUnidades por envase	1\r\n\r\nTipo de unidad: mL', '9000.00', '13000.00', 0),
(929558207, 13, '000025', 'Cera Fría Capilar + Shampo De Litro', 'Cera Fría Capilar Para Cabellos Crespos y Rebeldes (Sirve Para Cabellos Ondulados Con Mucho Frizz) Totalmente Sellada y Garantizada de litro con su shampo antiresiduos\r\n\r\nAlisa las ebras hasta un 100%', 0, 'Efectos: Alisado\r\nFormato: Sérum\r\nPresentación: litro\r\nEs hipoalergénica: No\r\nEs libre de crueldad: Sí\r\nCon fragancia: Sí\r\nEs vegano: No\r\nTipo de unidad: mL', '51000.00', '51000.00', 0),
(940295018, 7, '000011', 'Arobell Remobedor De Callos ', 'Marca	Arobell\r\nModelo	Ablandador\r\nFormato del removedor de cutículas	Crema\r\nVolumen de la unidad	170 mL\r\nPeso de la unidad	170 g', 0, '<table class=\"andes-table\" style=\"-webkit-font-smoothing: antialiased; width: 716.703px; border: 0px; border-spacing: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 14px; padding: 0px;\"><tbody class=\"andes-table__body\" style=\"-webkit-font-smoothing: antialiased;\"><tr class=\"andes-table__row\" rowspan=\"\" style=\"-webkit-font-smoothing: antialiased; border-style: initial; border-color:', '10900.00', '13000.00', 0),
(949116310, 12, '000022', 'Tónico Para Barba', 'La especialidad del tónico es activar el nacimiento y crecimiento en nuevas zonas. Adicional mente fortalece, engrosa y mejora la barba que ya se tiene.\r\nSi vas a empezar desde 0, sin nada de barba el', 0, 'Efectos: No produce efectos secundarios y no tiene contra indicaciones medicas.\r\nPresentación: Dosificador\r\nEs hipoalergénica: No\r\nEs libre de crueldad: Sí\r\nCantidad: 30\r\nTipo de unidad: mL', '30000.00', '40000.00', 0),
(962330095, 14, '000039', 'Lápiz Delineador Ojos Sepia Nailen', 'Lápiz Delineador Ojos Sepia Nailen x 1 Und\r\n\r\nTextura suave, mayor fijación y fácil aplicación en ojos.\r\n\r\nBeneficios:\r\n• Contiene ceras y emolientes que aportan una textura cremosa. Color intenso des', 0, 'Es de larga duración: Sí\r\nEs a prueba de agua: No\r\nCantidad: 1\r\nTipo de unidad: g', '6000.00', '12000.00', 0),
(981813107, 15, '000034', 'Polvos Compacto Nailen No 1 - g a $500', 'Polvos Compactos Nailen x 14 Gr\r\n\r\nPolvo de alta cobertura, de aspecto natural y piel perfecta. Su acabado mate elimina el exceso de grasa y brillo al instante. Deja un aspecto uniforme y perfecto en ', 0, 'Marca: Nailen\r\nCantidad: 14\r\nTipo de unidad: g', '99999.99', '99999.99', 0);

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
  `precio` double(7,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`idReservacion`, `idCliente`, `idUser`, `idServicio`, `nombres`, `apellidos`, `telefono`, `fechaReservacion`, `horaReservacion`, `horaFinal`, `domicilio`, `validar`, `direccion`, `precio`, `eliminado`) VALUES
(274801758, 1, 3, 67898463, 'Alejandra ', 'Perez ', 2147483647, '2021-11-02', '09:20:00', '09:29:00', 0, 1, '', 5000.00, 0),
(358560380, 1, 5, 67898463, 'Jimena Olaya', 'Perez ', 2147483647, '2021-11-03', '10:00:00', '10:39:00', 1, 0, 'Crr 18 n 24 a 34', 5000.00, 0),
(473758741, 1, 3, 67898463, 'Alejandra ', 'Perez ', 2147483647, '2021-11-03', '10:20:00', '10:59:00', 1, 0, 'Crr 18 n 24 a 34', 5000.00, 0),
(587858024, 1, 4, 253732436, 'Jimena Olaya', 'Perez ', 2147483647, '2021-11-03', '09:40:00', '09:49:00', 0, 0, '', 10000.00, 0),
(737184602, 1, 3, 67898463, 'Alejandra ', 'Perez ', 2147483647, '2021-11-02', '10:40:00', '10:49:00', 0, 0, '', 5000.00, 0),
(974815650, 1, 3, 67898463, 'Alejandra ', 'Perez ', 2147483647, '2021-11-03', '10:20:00', '10:59:00', 1, 0, 'Crr 18 n 24 a 34', 5000.00, 0);

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
(2, 'Recepcionista', 0),
(3, 'Cajero', 0);

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
(11, NULL, 404242146, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '19:09:25'),
(28, NULL, 24525899, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '19:49:06'),
(29, NULL, 569787989, NULL, NULL, 2, 'Se ha eliminado el producto', '2021-11-01', '19:49:53'),
(30, NULL, 290156737, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '19:52:14'),
(31, NULL, 188361335, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '19:52:14'),
(32, NULL, 290156737, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '19:56:26'),
(33, NULL, 760262571, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:01:33'),
(34, NULL, 59932937, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:05:22'),
(35, NULL, 949116310, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:06:56'),
(36, NULL, 764196012, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:08:30'),
(37, NULL, 292736654, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:10:06'),
(38, NULL, 929558207, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:11:51'),
(39, NULL, 487160427, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:13:08'),
(40, NULL, 441210504, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:14:44'),
(41, NULL, 15069579, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:15:54'),
(42, NULL, 712381516, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:36:32'),
(43, NULL, 516771158, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:38:08'),
(44, NULL, 689669391, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:51:27'),
(45, NULL, 605416737, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:53:06'),
(46, NULL, 981813107, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:54:37'),
(47, NULL, 595948074, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '20:56:11'),
(48, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '20:56:26'),
(49, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '20:56:41'),
(50, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '20:57:36'),
(51, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '20:57:56'),
(52, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '20:58:55'),
(53, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:00:09'),
(54, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:01:35'),
(55, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:02:12'),
(56, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:02:32'),
(57, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:03:28'),
(58, NULL, 981813107, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:04:16'),
(59, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:05:38'),
(60, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:06:05'),
(61, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:06:18'),
(62, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:06:25'),
(63, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:07:07'),
(64, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:09:05'),
(65, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:10:49'),
(66, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:10:56'),
(67, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:11:16'),
(68, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:12:04'),
(69, NULL, 268916690, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:12:11'),
(70, NULL, 629323921, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '21:15:12'),
(71, NULL, 272384215, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '21:16:33'),
(72, NULL, 709687183, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '21:17:47'),
(73, NULL, 962330095, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '21:19:12'),
(74, NULL, 101364696, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '21:20:41'),
(75, NULL, 962330095, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '21:20:58'),
(76, NULL, 519970258, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '21:22:52'),
(77, NULL, 764053446, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '21:32:37'),
(78, NULL, 764053446, NULL, NULL, 2, 'Se ha eliminado el producto', '2021-11-01', '21:33:37'),
(79, NULL, 232776728, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '21:34:14'),
(80, NULL, 232776728, NULL, NULL, 2, 'Se ha eliminado el producto', '2021-11-01', '21:35:29'),
(81, NULL, 267263324, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '21:36:09'),
(82, NULL, 267263324, NULL, NULL, 2, 'Se ha eliminado el producto', '2021-11-01', '21:38:03'),
(83, NULL, NULL, 253732436, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '21:47:51'),
(84, NULL, 112073075, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:00:22'),
(85, NULL, 248950189, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:03:12'),
(86, NULL, 248950189, NULL, NULL, 2, 'Se ha eliminado el producto', '2021-11-01', '22:05:23'),
(87, NULL, 327905705, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:08:38'),
(88, NULL, 112073075, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '22:08:56'),
(89, NULL, 916795615, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:10:56'),
(90, NULL, 85878949, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:12:17'),
(91, NULL, 872574928, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:13:30'),
(92, NULL, 324890283, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:15:53'),
(93, NULL, 711652868, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:17:36'),
(94, NULL, NULL, 776220398, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '22:19:06'),
(95, NULL, NULL, 961923468, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '22:21:25'),
(96, NULL, NULL, 956180931, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '22:21:57'),
(97, NULL, NULL, 189709214, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '22:22:20'),
(98, NULL, NULL, 411304110, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '22:22:29'),
(99, NULL, NULL, 657083085, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '22:23:12'),
(100, NULL, NULL, 465617173, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '22:23:36'),
(101, NULL, NULL, 657083085, NULL, 2, 'Se ha eliminado el servicio', '2021-11-01', '22:23:50'),
(102, NULL, NULL, 189709214, NULL, 2, 'Se ha eliminado el servicio', '2021-11-01', '22:23:56'),
(103, NULL, NULL, 411304110, NULL, 2, 'Se ha eliminado el servicio', '2021-11-01', '22:24:01'),
(104, NULL, NULL, 956180931, NULL, 2, 'Se ha eliminado el servicio', '2021-11-01', '22:24:06'),
(105, NULL, NULL, 961923468, NULL, 2, 'Se ha eliminado el servicio', '2021-11-01', '22:24:10'),
(106, NULL, NULL, 776220398, NULL, 2, 'Ha modificado la informacion del servicio', '2021-11-01', '22:24:25'),
(107, NULL, NULL, 67898463, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '22:27:01'),
(108, NULL, NULL, 465617173, NULL, 2, 'Ha modificado la informacion del servicio', '2021-11-01', '22:28:27'),
(109, NULL, NULL, 465617173, NULL, 2, 'Ha modificado la informacion del servicio', '2021-11-01', '22:28:47'),
(110, NULL, NULL, 465617173, NULL, 2, 'Ha modificado la informacion del servicio', '2021-11-01', '22:29:04'),
(111, NULL, NULL, 273466604, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-01', '22:29:45'),
(112, NULL, NULL, 273466604, NULL, 2, 'Se ha eliminado el servicio', '2021-11-01', '22:30:23'),
(113, NULL, 318919605, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:34:03'),
(114, NULL, 318919605, NULL, NULL, 2, 'Se ha eliminado el producto', '2021-11-01', '22:34:32'),
(115, NULL, 152994751, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:34:53'),
(116, NULL, 152994751, NULL, NULL, 2, 'Se ha eliminado el producto', '2021-11-01', '22:35:40'),
(117, NULL, 293304731, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-01', '22:40:11'),
(118, NULL, 16360263, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-01', '22:41:49'),
(119, NULL, 293304731, NULL, NULL, 2, 'Se ha eliminado el producto', '2021-11-01', '22:42:28'),
(120, 45001408, NULL, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-11-01', '23:34:42'),
(121, 45001408, NULL, NULL, NULL, 2, 'Ha validado un pedido', '2021-11-01', '23:35:17'),
(122, NULL, 101364696, NULL, NULL, 2, 'Se han dañado 3 productos', '2021-11-01', '23:37:51'),
(123, NULL, NULL, 514517558, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-02', '08:03:48'),
(124, NULL, NULL, 886990781, NULL, 2, 'Ha creado un nuevo servicio', '2021-11-02', '08:06:14'),
(125, NULL, 575604567, NULL, NULL, 2, 'Ha creado un nuevo producto', '2021-11-02', '08:14:21'),
(126, NULL, 575604567, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-02', '08:15:33'),
(127, NULL, 575604567, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-02', '08:15:54'),
(128, NULL, 575604567, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-02', '08:19:15'),
(129, NULL, 575604567, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-02', '08:21:41'),
(130, NULL, 575604567, NULL, NULL, 2, 'Ha modificado la informacion del producto', '2021-11-02', '08:21:52');

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
  `costo` decimal(7,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`IdServicio`, `idCategoria`, `codigoServicio`, `nombreServicio`, `detalleServicio`, `tiempoDuracion`, `costo`, `eliminado`) VALUES
(67898463, 2, 'S0003', 'cortes ', 'Cortes segun la exigencia del cabellero', 10, '5000.00', 0),
(189709214, 2, 'S0003', 'corte en “v” o pico', 'Como la palabra indica consiste en cortar la forma', 10, '11.00', 1),
(253732436, 2, 'S0001', 'Corte recto o cuadrado.', 'Se trata de un corte totalmente recto, es recomend', 10, '10000.00', 0),
(273466604, 7, 'S0004', 'kkfkfkfk``', 'kfjfkfikfkfkf', 10, '2000.00', 1),
(411304110, 2, 'S0003', 'corte en “v” o pico', 'Como la palabra indica consiste en cortar la forma', 10, '11.00', 1),
(465617173, 2, 'S0004', 'corte en “v” o pico', 'Como la palabra indica consiste en cortar la forma', 10, '8000.00', 0),
(514517558, 11, 'ffffffffffffffff', 'jjjfjfjfjfj', 'jfjfjfjfjfj', 15, '10000.00', 0),
(657083085, 2, 'S0003', 'corte en “v” o pico', 'Como la palabra indica consiste en cortar la forma', 10, '11.00', 1),
(776220398, 2, 'S0002', 'Corte circular o redondeado.', 'La forma más clásica y más recomendad para los cab', 10, '10000.00', 0),
(886990781, 11, 'hhhhhh', 'jjjfjfjfjfj', 'jfjfjfjfjfj', 15, '10000.00', 0),
(956180931, 2, 'S0003', 'corte en “v” o pico', 'Como la palabra indica consiste en cortar la forma', 10, '11.00', 1),
(961923468, 2, 'S0003', 'corte en “v” o pico', 'Como la palabra indica consiste en cortar la forma', 10, '11.00', 1);

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
(1, 'Belleza', 0),
(2, 'tratamientos', 0),
(3, 'Maquillajes', 0),
(4, 'CuidadoCapilar', 0),
(5, 'CuidadoCabello', 0),
(6, 'CabelloBonito', 0),
(7, 'PielBonita', 0),
(8, 'pericure', 0),
(9, 'manicure', 0),
(10, 'BellezaNatural', 0),
(11, 'uñas', 0),
(12, 'uñasLargas', 0),
(13, 'uñasBonitas', 0),
(14, 'tintes', 0),
(15, 'cabelloColorido', 0);

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
  `habilitar` tinyint(1) NOT NULL DEFAULT 1,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `idRol`, `idCargo`, `tipoDocumento`, `documentoIdentidad`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `fechaNacimiento`, `correoElectronico`, `contrasena`, `telefono`, `genero`, `estadoCivil`, `direccion`, `barrio`, `habilitar`, `eliminado`) VALUES
(2, 1, NULL, 'CC', 1006700633, 'Jimena', 'Alejandra', 'Olaya', 'Perez', '2001-11-14', 'aleja@gmail.com', 'cdf556a23ca4ec4a1bdaa15abd729dbd', 2147483647, 'Femenino', '', 'CRR 18 N 24 A 34', 'Progreso', 1, 0),
(3, 2, 1, 'CC', 41242518, 'Olga', 'Patricia', 'Perez', 'Montañez', '1989-12-30', 'Olgaperez@gmail.com', '5e8224b5768cec92368afd4ab46d32a3', 2147483647, 'Femenino', 'Casado', 'Crr 18 n 24 a 34', 'Progreso', 1, 0),
(4, 2, 2, 'CC', 97612166, 'Miguel', '', 'Olaya', '', '1996-01-02', 'miguelolaya@gmail.com', 'f3b17a9dd0b6c707fd10c8a078d5df95', 2147483647, 'Masculino', 'Casado', 'Crr 18 n 24 a 34', 'Progreso', 1, 0),
(5, 2, 1, 'CC', 1120563510, 'Miguel', '', 'Olaya', '', '2001-07-25', 'angelolaya@gmail.com', '32e5eb90c645fb62276a508017354181', 2147483647, 'Masculino', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 1, 0);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalleFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detallefoto`
--
ALTER TABLE `detallefoto`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `palabrasclaves`
--
ALTER TABLE `palabrasclaves`
  MODIFY `idPalabraClave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `idTags` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

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
