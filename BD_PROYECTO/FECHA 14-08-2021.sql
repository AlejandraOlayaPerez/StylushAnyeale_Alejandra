-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2021 a las 06:20:12
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
  `cargo` varchar(50) NOT NULL,
  `descripcionCargo` varchar(200) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `cargo`, `descripcionCargo`, `eliminado`) VALUES
(1, 'Cargo1', 'Descripcion1', 1),
(2, 'Cargo1', 'Descripcion1', 1),
(3, 'Cargo1', 'Descripcion1', 1),
(4, 'Cargo1', 'Descripcion1', 1),
(5, 'Cargo1', 'Descripcion1', 1),
(6, 'Cargo1', 'Descripcion1', 1),
(7, 'Cargo1', 'Descripcion1', 1),
(8, 'Cargo1', 'Descripcion1', 1),
(9, 'Cargo1', 'Descripcion1', 1),
(10, 'Cargo1', 'Descripcion1', 1),
(11, 'Cargo1', 'Descripcion1', 1),
(12, 'Cargo1', 'Descripcion1', 1),
(13, 'Cargo1', 'Descripcion1', 1),
(14, 'Cargo1', 'Descripcion1', 1),
(15, 'Cargo1', 'Descripcion1', 1),
(16, 'Cargo2', 'Descripcion2', 1),
(17, 'Cargo1', 'Descripcion1', 1),
(18, 'Cargo1', 'Descripcion1', 1),
(19, 'Cargo1', 'Descripcion1', 1),
(20, 'Cargo1', 'Descripcion1', 1),
(21, 'Cargo1', 'Descripcion1', 1),
(22, 'Cargo1', 'Descripcion1', 1),
(23, 'Cargo1', 'Descripcion1', 1),
(24, 'Cargo3', 'Descripcion3', 1),
(25, 'Peluquero1', 'El encargado', 0),
(26, 'f', 'r', 1),
(27, 'Cargo1', 'Descripcion1', 1);

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
(1, 0, 'CC', 1006700633, 'jimena', 'Alejandra', 'Olaya', 'Perez', '2001-11-14', 'F', 'CRR 18 N 24 A 34', 'Progreso', 'aleja@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', '32044', 0),
(2, NULL, '', 0, 'mariana', '', '', '', '0000-00-00', '', '', '', 'Mariana@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', '', 0);

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
(1, 1, NULL, 277952570, 1, '', 'locion', 3, 0.00, 1),
(2, 2, NULL, 277952570, 1, '', 'Silla', 4, 0.00, 1),
(6, 2, NULL, NULL, 267687805, 'U1', 'Crema', 1, 1.00, 0),
(7, 6, NULL, NULL, 409358848, 'U2', 'Cera', 6, 9999.99, 0),
(8, 5, NULL, NULL, 409358848, 'V3', 'Acondicionador', 2, 9999.99, 0),
(9, 6, NULL, NULL, 820772169, 'U2', 'Cera', 6, 9999.99, 1),
(10, 5, NULL, NULL, 820772169, 'V3', 'Acondicionador', 2, 9999.99, 1);

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
(1, 'Empresa1', 'NIT123', 'crr', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
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

INSERT INTO `factura` (`idFactura`, `idProducto`, `codigoFactura`, `idUser`, `idCliente`, `documentoIdentidad`, `responsableFactura`, `fechaFactura`, `cantidad`, `iva`, `valorUnitario`, `valorTotal`, `eliminado`) VALUES
(1, 2, '24072021', 6, 1, 1006700633, 'jimena olaya', '2021-07-24', 1, '6.00', '1200.00', '2000.00', 0),
(2, 4, '23072021', 1, 1, 1006700633, 'jimena olaya', '2021-07-23', 1, '6.00', '1.00', '2000.00', 0);

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
(6, 'Modulo1', 0),
(7, 'Modul2', 1),
(8, 'Sin Modulo', 0);

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
(5, 6, 'Pagina2', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 1, 0),
(6, 6, 'Pagina2', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 0, 1),
(7, 8, 'Pagina3', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 0, 0);

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
(111101, 1, 1006700633, 'Alejandra Perez', '', 'Empresa x', 'CRR', '2021-08-14', 0, 0),
(179821511, 1, 0, 'Aleja ', 'NIT123', 'Empresa1', 'crr', '2021-08-11', 1, 1),
(239250622, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
(246812793, 1, 64739, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-26', 0, 0),
(277952570, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
(591311444, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
(705061606, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0),
(934417953, 1, 1006700633, 'Alejandra Perez', '', 'empresa', 'Crr 18 n 24 a 34', '2021-07-27', 0, 0);

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
(1, 'V1', 'Venta', 'locion', 14, 'Recomendaciones', '1.28', 1.00, 0),
(2, 'U1', 'Uso(Servicio)', 'Crema', 4, 'recomendacion', '1.00', 1.00, 0),
(3, 'V2', 'Venta', 'Tratamiento', 13, 'recomendacion', '1.00', 1.00, 0),
(4, 'V3', 'Venta', 'Acondicionador', 4, 'Recomendaciones', '3000.00', 9999.99, 0),
(5, 'V3', 'Venta', 'Acondicionador', 0, 'Recomendaciones', '3000.00', 9999.99, 0),
(6, 'U2', 'Uso(Servicios)', 'Cera', 0, 'Recomendaciones', '3000.00', 9999.99, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `idReservacion` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `servicio` varchar(50) NOT NULL,
  `detalleServicio` varchar(100) NOT NULL,
  `estilista` varchar(25) NOT NULL,
  `fechaReservacion` date NOT NULL,
  `horaReservacion` time NOT NULL,
  `domicilio` tinyint(1) NOT NULL,
  `validar` tinyint(1) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`idReservacion`, `idCliente`, `servicio`, `detalleServicio`, `estilista`, `fechaReservacion`, `horaReservacion`, `domicilio`, `validar`, `direccion`, `eliminado`) VALUES
(2, 1, 'corte', 'detalle', 'empleado', '2021-07-01', '09:03:00', 0, 1, 'crr', 0),
(3, 1, 'tratamiento', 'detalle', 'empleado', '2021-07-19', '00:06:30', 1, 1, 'CRR 18 N 24 A 34', 0);

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
(5, NULL, 1, 2, 'Ha cancelado una factura', '2021-08-14', '18:21:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `IdServicio` int(11) NOT NULL,
  `codigoServicio` varchar(50) NOT NULL,
  `nombreServicio` varchar(50) NOT NULL,
  `detalleServicio` varchar(50) NOT NULL,
  `costo` decimal(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`IdServicio`, `codigoServicio`, `nombreServicio`, `detalleServicio`, `costo`, `eliminado`) VALUES
(0, 'S5', 'Planchado', 'Detalle2', '9999.99', 1),
(1, '512', 'Corte', 'Detalle2', '9999.99', 0),
(2, 'S2', 'Planchado', 'Detalle3', '9999.99', 0),
(3, 'S5', 'Planchado', 'Detalle2', '9999.99', 0),
(267687805, 'S5', 'Planchado', 'Detalle2', '9999.99', 0),
(409358848, 'S7', 'Planchado', 'Detalle2', '9999.99', 0),
(544456873, 'S5', 'Planchado', 'Detalle2', '9999.99', 0),
(820772169, 'S7', 'Planchado', 'Detalle2', '9999.99', 0);

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
(1, 11, 25, 'CC', 1006700633, 'Harley', '', 'Mendoza', '', '0000-00-00', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, '', '', '', '', 1),
(2, 16, NULL, '', 0, 'Aleja', '0', '', '', '0000-00-00', 'aleja@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 0, '', '', '', '', 0),
(3, 16, NULL, '', 0, 'Jimena_Olaya', '0', '', '', '0000-00-00', 'jimenaolaya@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 0, '', '', '', '', 0),
(4, 16, NULL, '', 0, 'Olaya', '0', '', '', '0000-00-00', 'Olaya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(5, 9, NULL, '', 0, 'Alejandra', '0', '', '', '0000-00-00', 'alejandra@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(6, 9, NULL, '', 0, 'Administrador', '0', '', '', '0000-00-00', 'carlos@', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(7, 9, 25, 'CC', 1120563510, 'Miguel', 'Angel', 'Olaya', 'Perez', '2021-07-22', 'miguelolaya@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 7777775, 'Masculino', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 0),
(8, 9, NULL, 'CC', 41242518, 'Olga', 'Patricia', 'Perez', 'MontaÃ±ez', '2021-07-12', 'Olgaperez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 7777775, 'Femenino', 'Casado', 'Crr 18 n 24 a 34', 'Progreso', 0),
(9, 9, NULL, 'CC', 1000002159, 'Leidy', 'Patricia', 'Sanchez', 'Fonseca', '2000-03-07', 'carolinasanchez@gmail.com', '25f9e794323b453885f5181f1b624d0b', 7777775, 'Femenino', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 0);

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
  ADD PRIMARY KEY (`idCargo`);

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
  ADD KEY `idProducto` (`idProducto`);

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
  ADD KEY `idCliente` (`idCliente`);

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
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalleFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `idReservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `detalle_ibfk_3` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`),
  ADD CONSTRAINT `detalle_ibfk_4` FOREIGN KEY (`IdServicio`) REFERENCES `servicios` (`IdServicio`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`);

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
