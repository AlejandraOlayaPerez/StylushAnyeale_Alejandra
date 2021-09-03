-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2021 a las 06:08:17
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
(1, NULL, 1),
(2, NULL, 1),
(3, NULL, 1),
(4, NULL, 1),
(5, NULL, 1),
(6, NULL, 1),
(7, NULL, 1),
(8, NULL, 1),
(9, NULL, 1),
(10, NULL, 1),
(11, NULL, 1),
(12, NULL, 1),
(13, NULL, 1),
(14, NULL, 1),
(15, NULL, 1),
(16, NULL, 1),
(17, NULL, 1),
(18, NULL, 1),
(19, NULL, 1),
(20, NULL, 1),
(21, NULL, 1),
(22, NULL, 1),
(23, NULL, 1),
(24, NULL, 1),
(25, 2, 1),
(26, NULL, 1),
(27, NULL, 1),
(28, 409358848, 0),
(29, NULL, 1),
(34, 2, 0),
(35, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
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

INSERT INTO `cliente` (`idCliente`, `idEmpleado`, `tipoDocumento`, `documentoIdentidad`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `fechaNacimiento`, `genero`, `direccion`, `barrio`, `email`, `contrasena`, `telefono`, `eliminado`) VALUES
(1, 0, 'CC', 1006700633, 'jimena', 'Alejandra', 'Olaya', 'Perez', '2001-11-14', 'F', 'CRR 18 N 24 A 34', 'Progreso', 'aleja@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', '3204495486', 0),
(2, NULL, 'TI', 123456789, 'mariana', '', '', '', '0000-00-00', '', '', '', 'Mariana@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', '', 0),
(3, NULL, '', 0, '', '', '', '', '0000-00-00', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0),
(4, NULL, '', 0, 'carlos', '', '', '', '0000-00-00', '', '', '', 'cjsarasty@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 0);

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
  `codigoProducto` varchar(30) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`idDetalleFactura`, `idProducto`, `idFactura`, `idPedido`, `IdServicio`, `codigoProducto`, `producto`, `cantidad`, `precio`, `eliminado`) VALUES
(1, 1, NULL, 277952570, NULL, '', 'locion', 3, 0.00, 1),
(2, 2, NULL, 277952570, NULL, '', 'Silla', 4, 0.00, 1),
(6, 2, NULL, NULL, 267687805, 'U1', 'Crema', 1, 1.00, 0),
(7, 6, NULL, NULL, 409358848, 'U2', 'Cera', 6, 9999.99, 0),
(8, 5, NULL, NULL, 409358848, 'V3', 'Acondicionador', 2, 9999.99, 0),
(9, 6, NULL, NULL, 820772169, 'U2', 'Cera', 6, 9999.99, 1),
(10, 5, NULL, NULL, 820772169, 'V3', 'Acondicionador', 2, 9999.99, 1),
(11, 1, NULL, NULL, 38801601, 'V1', 'locion', 1, 1.00, 0),
(12, 4, NULL, NULL, 721804413, 'V3', 'Acondicionador', 2, 9999.99, 0),
(13, 4, NULL, 564924075, NULL, 'V3', 'Acondicionador', 1, 9999.99, 1),
(14, 4, NULL, 674162799, NULL, 'V3', 'Acondicionador', 1, 9999.99, 0),
(15, 4, NULL, 50704385, NULL, 'V3', 'Acondicionador', 1, 9999.99, 0),
(16, 2, NULL, 686774842, NULL, 'U1', 'Crema', 1, 1.00, 0),
(17, 3, NULL, 564924075, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(18, 6, NULL, 564924075, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(19, 3, NULL, 564924075, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(20, 6, NULL, 564924075, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(21, 3, NULL, 564924075, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(22, 6, NULL, 564924075, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(23, 3, NULL, 564924075, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(24, 6, NULL, 564924075, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(25, 3, NULL, 564924075, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(26, 6, NULL, 564924075, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(27, 3, NULL, 564924075, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(28, 6, NULL, 564924075, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(29, 2, NULL, 992933774, NULL, 'U1', 'Crema', 1, 1.00, 1),
(30, 3, NULL, NULL, 522676893, 'V2', 'Tratamiento', 1, 1.00, 0),
(31, 4, NULL, 88328668, NULL, 'V3', 'Acondicionador', 5, 9999.99, 1),
(32, 2, NULL, 88328668, NULL, 'U1', 'Crema', 4, 1.00, 1),
(33, 2, NULL, 88328668, NULL, 'U1', 'Crema', 8, 1.00, 0),
(34, 4, NULL, 88328668, NULL, 'V3', 'Acondicionador', 9, 9999.99, 0),
(35, 4, NULL, 55016541, NULL, 'V3', 'Acondicionador', 4, 9999.99, 1),
(36, 6, NULL, 55016541, NULL, 'U2', 'Cera', 6, 9999.99, 1),
(37, 2, NULL, 55016541, NULL, 'U1', 'Crema', 1, 1.00, 1);

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
  `fotoProducto1` varchar(300) NOT NULL,
  `fotoProducto2` varchar(300) NOT NULL,
  `fotoProducto3` varchar(300) NOT NULL,
  `fotoProducto4` varchar(300) NOT NULL,
  `fotoProducto5` varchar(300) NOT NULL,
  `fotoServicio1` varchar(300) NOT NULL,
  `fotoPerfilUsuario` varchar(300) NOT NULL,
  `fotoBiografiaUsuario` varchar(300) NOT NULL,
  `fotoPerfilCliente` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallefoto`
--

INSERT INTO `detallefoto` (`idFoto`, `idProducto`, `IdServicios`, `idUser`, `idCliente`, `fotoProducto1`, `fotoProducto2`, `fotoProducto3`, `fotoProducto4`, `fotoProducto5`, `fotoServicio1`, `fotoPerfilUsuario`, `fotoBiografiaUsuario`, `fotoPerfilCliente`) VALUES
(1, NULL, NULL, 2, NULL, '', '', '', '', '', '', '/image/perfilUsuario/2/perfilUsuario.jpg', '', ''),
(2, NULL, NULL, 12, NULL, '', '', '', '', '', '', 'img/prueba.jpg', '', '');

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
(2, 'Empresa3', 'NIT121', 'Crr 18 n 24 a 3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idServicio` int(11) DEFAULT NULL,
  `codigoFactura` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `documentoIdentidad` int(11) NOT NULL,
  `responsableFactura` varchar(50) NOT NULL,
  `fechaFactura` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iva` decimal(6,2) NOT NULL,
  `valorUnitario` decimal(6,2) NOT NULL,
  `valorTotal` decimal(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `idProducto`, `idServicio`, `codigoFactura`, `idUser`, `idCliente`, `documentoIdentidad`, `responsableFactura`, `fechaFactura`, `cantidad`, `iva`, `valorUnitario`, `valorTotal`, `eliminado`) VALUES
(1, 2, NULL, '24072021', 6, 1, 1006700633, 'jimena olaya', '2021-08-17', 1, '6.00', '1200.00', '2000.00', 0),
(2, 4, NULL, '23072021', 1, 1, 1006700633, 'jimena olaya', '2021-07-23', 1, '6.00', '1.00', '2000.00', 0);

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
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idModulo`, `nombreModulo`, `eliminado`) VALUES
(1, 'Modulo3', 1),
(2, 'Administrador', 1),
(3, 'Modulo2', 1),
(4, 'Modulo2', 1),
(5, 'hello world', 1),
(6, 'Modulo1', 1),
(7, 'Modul2', 1),
(8, 'Sin Modulofff', 1);

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
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`idPagina`, `idModulo`, `nombrePagina`, `enlace`, `requireSession`, `eliminado`) VALUES
(1, 2, 'Pagina1', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 1, 0),
(2, 2, 'Pagina1', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 0, 1),
(3, 2, 'Pagina2', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 0, 0),
(4, 2, 'Pagina3', 'regdfgvd', 1, 0),
(5, 8, 'Pagina2', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 1, 0),
(6, 6, 'Pagina2', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 0, 1),
(7, 8, 'Pagina3', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 1, 0);

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
(111101, 1, 1006700633, 'Alejandra Perez', '', 'Empresa x', 'CRR', '2021-08-17', 0, 1),
(50704385, 1, 5435345, 'Aleja pedraza', 'NIT123', 'Empresa1', 'crr', '2021-08-17', 0, 1),
(55016541, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-26', 0, 0),
(88328668, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-26', 0, 0),
(179821511, 1, 0, 'Aleja ', 'NIT123', 'Empresa1', 'crr', '2021-08-17', 1, 1),
(239250622, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
(246812793, 1, 64739, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-26', 0, 0),
(277952570, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 1, 0),
(464080926, 2, 5435345, 'Aleja pedraza', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-17', 0, 0),
(564924075, 2, 5435345, 'Aleja pedraza', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-17', 0, 1),
(591311444, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
(674162799, 2, 5435345, 'Aleja pedraza', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-17', 0, 0),
(686774842, 2, 5435345, 'Aleja pedraza', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-08-17', 0, 1),
(705061606, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 1, 0),
(934417953, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
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
(1, 2, 1),
(1, 2, 3),
(7, 2, 1),
(7, 2, 3),
(11, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `codigoProducto` varchar(100) NOT NULL,
  `tipoProducto` varchar(20) NOT NULL,
  `nombreProducto` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `recomendaciones` varchar(100) NOT NULL,
  `valorUnitario` decimal(6,2) NOT NULL,
  `costoProducto` double(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `codigoProducto`, `tipoProducto`, `nombreProducto`, `cantidad`, `recomendaciones`, `valorUnitario`, `costoProducto`, `eliminado`) VALUES
(1, 'sddssd', 'Venta', 'locion', 14, 'Recomendaciones', '1.28', 1.00, 1),
(2, 'U1', 'Uso(Servicio)', 'Crema', 13, 'recomendacion', '1.00', 1.00, 0),
(3, 'V2', 'Venta', 'Tratamiento', 31, 'recomendacion', '1.00', 1.00, 0),
(4, 'V3', 'Venta', 'Acondicionador', 13, 'Recomendaciones', '3000.00', 9999.99, 0),
(5, 'V3', 'Venta', 'Acondicionador', 0, 'Recomendaciones', '3000.00', 9999.99, 0),
(6, 'U2', 'Uso(Servicios)', 'Cera', 30, 'Recomendaciones', '3000.00', 9999.99, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `idReservacion` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` int(12) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `estilista` varchar(25) NOT NULL,
  `fechaReservacion` date NOT NULL,
  `horaReservacion` time NOT NULL,
  `domicilio` tinyint(1) NOT NULL,
  `validar` tinyint(1) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `precio` double(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`idReservacion`, `idCliente`, `idUser`, `nombres`, `apellidos`, `telefono`, `servicio`, `estilista`, `fechaReservacion`, `horaReservacion`, `domicilio`, `validar`, `direccion`, `precio`, `eliminado`) VALUES
(2, 1, NULL, '', '', 0, 'corte', 'empleado', '2021-07-01', '09:03:00', 0, 1, '', 521.00, 0),
(3, 1, NULL, '', '', 0, 'tratamiento', 'empleado', '2021-07-19', '00:06:30', 1, 1, 'CRR 18 N 24 A 34', 432.00, 0),
(4, 1, NULL, 'jimena Perez', 'jimena Perez', 2147483647, '544456873', '8', '2021-08-21', '21:48:00', 0, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(86300113, 1, NULL, 'jimena Perez', 'jimena Perez', 2147483647, 'Planchado', 'Olga Perez', '2021-08-21', '21:48:00', 0, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(104338865, 1, NULL, 'jimena Perez', 'jimena Perez', 2147483647, 'Planchado', 'Olga Perez', '2021-08-21', '08:48:00', 1, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(146252120, 2, 8, 'jimena Perez', 'jimena Perez', 2147483647, 'Planchado', 'Olga Perez', '2021-08-21', '09:30:00', 0, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(156974791, 1, NULL, 'jimena Perez', 'jimena Perez', 2147483647, '', '8', '2021-08-21', '21:48:00', 0, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(345563877, 1, 8, 'jimena Perez', 'jimena Perez', 2147483647, 'Planchado', 'Olga Perez', '2021-08-21', '21:48:00', 0, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(503126050, 1, NULL, 'jimena Perez', 'jimena Perez', 2147483647, 'Planchado', '8', '2021-08-21', '21:48:00', 0, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(666806411, 1, NULL, 'jimena Perez', 'jimena Perez', 2147483647, 'Planchado', 'Alejandra ', '2021-08-19', '16:18:00', 0, 0, 'Crr 18 n 24 a 3', 0.00, 0),
(810512422, 1, NULL, 'jimena Perez', 'jimena Perez', 2147483647, '', '8', '2021-08-21', '21:48:00', 0, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(814176324, 1, NULL, 'jimena Perez', 'jimena Perez', 2147483647, 'Planchado', 'Olga Perez', '2021-08-21', '21:48:00', 0, 0, 'Crr 18 n 24 a 34', 0.00, 0),
(920539297, 1, NULL, 'jimena Perez', 'jimena Perez', 2147483647, '', '8', '2021-08-21', '21:48:00', 0, 0, 'Crr 18 n 24 a 34', 0.00, 0);

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
(1, 'Gerente', 1),
(2, 'Recepcionista', 1),
(3, 'Rol3', 1),
(4, 'Cajero', 1),
(5, 'Rol5', 1),
(6, 'Tecnicos', 1),
(7, 'Vendedor', 1),
(8, 'Nuevo Usuario', 1),
(9, 'Nuevo usuario', 0),
(10, '', 1),
(11, 'Admin', 1),
(12, 'Rol1', 1),
(13, 'Roles1', 1),
(14, 'Rol1', 1),
(15, 'Secretario', 1),
(16, 'Usuario sin Rol', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `idSeguimiento` int(11) NOT NULL,
  `IdPedido` int(11) DEFAULT NULL,
  `idFactura` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `fechaSeguimiento` date NOT NULL,
  `horaSeguimiento` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`idSeguimiento`, `IdPedido`, `idFactura`, `idUser`, `observacion`, `fechaSeguimiento`, `horaSeguimiento`) VALUES
(1, 179821511, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-11', '18:41:12'),
(2, 179821511, NULL, 2, 'Ha validado un pedido', '2021-08-11', '18:45:23'),
(3, 111101, NULL, 2, 'Ha cancelado un pedido', '2021-08-11', '18:57:09'),
(4, 179821511, NULL, 2, 'Ha cancelado un pedido', '2021-08-11', '18:58:09'),
(5, NULL, 1, 2, 'Ha cancelado una factura', '2021-08-14', '18:21:43'),
(6, 564924075, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:25:58'),
(7, 674162799, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:26:11'),
(8, 50704385, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:27:42'),
(9, 686774842, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:28:08'),
(10, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:35:56'),
(11, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:45'),
(12, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:46'),
(13, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:47'),
(14, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:48'),
(15, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:48'),
(16, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:37:36'),
(17, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:38:36'),
(18, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:38:37'),
(19, 564924075, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:41:25'),
(20, 686774842, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:41:44'),
(21, 50704385, NULL, 2, 'Ha cancelado un pedido', '2021-08-17', '22:52:46'),
(22, 564924075, NULL, 2, 'Ha cancelado un pedido', '2021-08-17', '22:54:00'),
(23, 277952570, NULL, 2, 'Ha validado un pedido', '2021-08-17', '22:54:23'),
(24, 705061606, NULL, 2, 'Ha validado un pedido', '2021-08-17', '22:54:35'),
(25, 464080926, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:56:27'),
(26, 992933774, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:56:53'),
(27, 992933774, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:57:09'),
(28, 992933774, NULL, 2, 'Ha validado un pedido', '2021-08-17', '22:57:47'),
(29, 686774842, NULL, 2, 'Ha cancelado un pedido', '2021-08-17', '22:58:05'),
(30, 674162799, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:58:22'),
(31, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:20:40'),
(32, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:20:56'),
(33, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:21:13'),
(34, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:22:17'),
(35, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:22:43'),
(36, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:23:27'),
(37, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:24:05'),
(38, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:24:48'),
(39, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:30:42'),
(40, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:31:11'),
(41, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:38:07'),
(42, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:38:22'),
(43, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:38:33'),
(44, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:40:09'),
(45, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:41:08'),
(46, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:41:33'),
(47, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:59:40'),
(48, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:00:18'),
(49, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:01:13'),
(50, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:07:33'),
(51, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:08:05'),
(52, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:08:25'),
(53, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:13:06'),
(54, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:13:33'),
(55, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:14:13'),
(56, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:14:44'),
(57, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:15:03'),
(58, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:16:01'),
(59, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:16:32'),
(60, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:16:59'),
(61, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:17:35'),
(62, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:17:49'),
(63, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:18:23'),
(64, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:18:38'),
(65, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:21:45'),
(66, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:25:35'),
(67, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:26:23'),
(68, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:26:33'),
(69, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:27:25'),
(70, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:27:40'),
(71, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:27:50'),
(72, 88328668, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-26', '15:09:02'),
(73, 88328668, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '15:21:34'),
(74, 88328668, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '15:22:44'),
(75, 88328668, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '15:25:37'),
(76, 88328668, NULL, 2, 'Ha validado un pedido', '2021-08-26', '15:26:58'),
(77, 88328668, NULL, 2, 'Ha cancelado un pedido', '2021-08-26', '15:27:51'),
(78, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-26', '18:15:13'),
(79, 55016541, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-26', '18:27:01'),
(80, 55016541, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:28:39'),
(81, 55016541, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:29:36'),
(82, 55016541, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:50:48'),
(83, 55016541, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:51:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `IdServicio` int(11) NOT NULL,
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

INSERT INTO `servicios` (`IdServicio`, `codigoServicio`, `nombreServicio`, `detalleServicio`, `tiempoDuracion`, `costo`, `eliminado`) VALUES
(1, '512', 'Corte', 'Detalle2', 55, '9999.99', 0),
(2, 'S2', 'Planchado', 'Detalle3', 25, '9999.99', 1),
(3, 'S5', 'Planchado', 'Detalle2', 40, '9999.99', 0),
(38801601, '567u', 'cfvgbhnjm', 't678', 0, '3467.00', 1),
(267687805, 'S5', 'Planchado', 'Detalle2', 0, '9999.99', 1),
(293275022, 'S2', 'Planchado', 'Detalle2', 0, '9999.99', 1),
(409358848, 'S7', 'Planchado', 'Detalle2', 0, '9999.99', 1),
(522676893, '88', 'Alisado', 'Detalle2', 15, '4321.00', 0),
(544456873, 'S5', 'Planchado', 'Detalle2', 35, '9999.99', 1),
(721804413, 'dsfds', 'sdfsdf', 'dsfsdf', 0, '9999.99', 1),
(820772169, 'S7', 'Planchado', 'Detalle2', 0, '9999.99', 1);

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
(1, 11, 28, 'CC', 1006700633, 'Harley', '', 'Mendoza', '', '0000-00-00', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, '', '', '', '', 1),
(2, 16, 28, 'CC', 2147483647, 'Alejandra', 'Alejandra', 'Perez', 'olaya', '2001-01-01', 'aleja@gmail.com', 'dc13ae48d185bf2dbad46c1005f46eca', 7777775, 'Femenino', 'Soltero', 'crr', 'piguanza', 0),
(3, 16, 28, '', 0, 'Jimena_Olaya', '0', '', '', '0000-00-00', 'jimenaolaya@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 0, '', '', '', '', 0),
(4, 16, 28, '', 0, 'Olaya', '0', '', '', '0000-00-00', 'Olaya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(5, 9, 28, '', 0, 'Alejandra', '0', '', '', '0000-00-00', 'alejandra@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(6, 9, NULL, '', 0, 'Administrador', '0', '', '', '0000-00-00', 'carlos@', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(7, 9, 25, 'CC', 1120563510, 'Miguel', 'Angel', 'Olaya', 'Perez', '2021-07-22', 'miguelolaya@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 7777775, 'Masculino', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 0),
(8, 9, 25, 'CC', 41242518, 'Olga', 'Patricia', 'Perez', 'MontaÃ±ez', '2021-07-12', 'Olgaperez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 7777775, 'Femenino', 'Casado', 'Crr 18 n 24 a 34', 'Progreso', 0),
(9, 9, NULL, 'CC', 1000002159, 'Leidy', 'Patricia', 'Sanchez', 'Fonseca', '2000-03-07', 'carolinasanchez@gmail.com', '25f9e794323b453885f5181f1b624d0b', 7777775, 'Femenino', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 0),
(10, 9, 28, 'CE', 1006700633, 'Miguel', '', 'Perez', '', '2001-03-19', 'hh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2147483647, '', '', '', '', 0),
(11, 9, 28, 'CE', 100670063, 'Miguel', '', 'Perez', '', '2001-03-19', 'tt@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 2147483647, '', '', '', '', 0),
(12, 9, 28, 'CE', 1006700463, 'Miguel', '', 'Perez', '', '2001-03-19', 'ttf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(13, 9, NULL, 'CE', 10060463, 'Miguel', '', 'Perez', '', '2001-03-19', 'attf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(14, 9, NULL, 'CE', 1006063, 'Miguel', '', 'Perez', '', '2001-03-19', 'fattf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(15, 9, NULL, 'CE', 10067063, 'Miguel', '', 'Perez', '', '2001-03-19', 'sdastt@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(16, 9, NULL, 'CE', 1067063, 'Miguel', '', 'Perez', '', '2001-03-19', 'seddastt@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(17, 9, NULL, 'CE', 10657063, 'Miguel', '', 'Perez', '', '2001-03-19', 'sedastt@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0);

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
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idDetalleFactura`),
  ADD KEY `idProducto` (`idProducto`,`idFactura`),
  ADD KEY `idFactura` (`idFactura`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `IdServicio` (`IdServicio`);

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
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idServicio` (`idServicio`);

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
  ADD PRIMARY KEY (`IdProducto`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`idReservacion`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `reservacionUsuario` (`idUser`);

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
  ADD KEY `seguimientoUser` (`idUser`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`IdServicio`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `idUser` (`idUser`);

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
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalleFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `detallefoto`
--
ALTER TABLE `detallefoto`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `IdInventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `detalle_ibfk_3` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`),
  ADD CONSTRAINT `detalle_ibfk_4` FOREIGN KEY (`IdServicio`) REFERENCES `servicios` (`IdServicio`);

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
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `factura_ibfk_5` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`IdServicio`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `EmpresaPedido` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`IdPagina`) REFERENCES `pagina` (`idPagina`),
  ADD CONSTRAINT `permiso_ibfk_3` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacionUsuario` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`),
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `SeguimientoPedido` FOREIGN KEY (`IdPedido`) REFERENCES `pedido` (`idPedido`),
  ADD CONSTRAINT `seguimientoFactura` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `seguimientoUser` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
