-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2021 a las 17:50:56
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

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
(16, 'Cargo2', 'Descripcion2', 0),
(17, 'Cargo1', 'Descripcion1', 1),
(18, 'Cargo1', 'Descripcion1', 1),
(19, 'Cargo1', 'Descripcion1', 1),
(20, 'Cargo1', 'Descripcion1', 1),
(21, 'Cargo1', 'Descripcion1', 1),
(22, 'Cargo1', 'Descripcion1', 1),
(23, 'Cargo1', 'Descripcion1', 1),
(24, 'Cargo3', 'Descripcion3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(50) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `detalle`, `eliminado`) VALUES
(1, 'Maquinas', 'Maquinas', 1),
(2, 'Productos', 'Productos', 1);

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
  `telefono` varchar(12) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `idEmpleado`, `tipoDocumento`, `documentoIdentidad`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `fechaNacimiento`, `genero`, `direccion`, `barrio`, `email`, `telefono`, `eliminado`) VALUES
(1, 0, 'CC', 1006700633, 'jimena', 'Alejandra', 'Olaya', 'Perez', '2001-11-14', 'F', 'CRR 18 N 24 A 34', 'Progreso', 'aleja@gmail.com', '32044', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idDetalleFactura` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `idCargo` int(11) DEFAULT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `documentoIdentidad` int(15) NOT NULL,
  `primerNombre` varchar(25) NOT NULL,
  `segundoNombre` varchar(25) NOT NULL,
  `primerApellido` varchar(25) NOT NULL,
  `segundoApellido` varchar(25) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `barrio` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hojaDeVida` tinyint(1) NOT NULL,
  `telefono` int(12) NOT NULL,
  `nivelEstudio` varchar(20) NOT NULL,
  `experienciaLaboral` varchar(20) NOT NULL,
  `estadoCivil` varchar(10) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `idCargo`, `tipoDocumento`, `documentoIdentidad`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `fechaNacimiento`, `genero`, `direccion`, `barrio`, `email`, `hojaDeVida`, `telefono`, `nivelEstudio`, `experienciaLaboral`, `estadoCivil`, `eliminado`) VALUES
(8, 1, 'TI', 1006700633, 'Jimena', '', 'Olaya', 'Perez', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 7777775, 'bachillerato', '5 aÃ±os', 'soltero', 1),
(9, 1, 'CC', 1006700633, 'Jimena', 'Perez', 'Olaya', 'Perez', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 7777775, 'bachillerato', '5 aÃ±os', 'soltero', 1),
(10, 1, 'CC', 1006700633, 'Jimena', 'Alejandra', 'Olaya', 'Perez', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 7777775, 'bachillerato', '5 aÃ±os', 'soltero', 1),
(11, 1, 'TI', 1006700633, 'Jimena', 'Alejandra', 'Olaya', 'Perez', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 7777775, 'bachillerato', '5 años', 'soltero', 1),
(12, 1, 'TI', 1006700633, 'Jimena', 'Alejandra', 'Olaya', 'Perez', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 7777775, 'bachillerato', '5 aÃ±os', 'soltero', 1),
(13, 2, 'CC', 1006700633, 'Jimena', 'Alejandra', 'Olaya', 'Perez', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 2147483647, 'tecnico', '5 aÃ±os', 'soltero', 1),
(14, 2, 'CC', 1006700633, 'Jimena', 'Alejandra', 'perez', 'Olaya', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 7777775, 'bachillerato', '5 aÃ±os', 'soltero', 1),
(15, 1, 'CC', 1006700633, 'Alejandra', 'Jimena', 'Perez', 'Olaya', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 77777, 'bachillerato', '5 aÃ±os', 'soltero', 1),
(16, 1, 'CC', 1006700633, 'Alejandra', 'Jimena', 'Olaya', 'Perez', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 77777, 'bachillerato', '4 a', 'soltero', 1),
(17, 9, 'CC', 1006700633, 'Leidy', 'Carolina', 'Sanchez', 'Fonseca', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 0, 7777775, 'tecnologo', 'Menos de 2 aÃ±os', 'Soltero', 1),
(18, 9, 'CC', 1006700633, 'Leidy', 'Carolina', 'Sanchez', 'Fonseca', '0000-00-00', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'aleja@gmail.com', 1, 7777775, 'tecnologo', 'Menos de 2 aÃ±os', 'Soltero', 1),
(19, 16, 'CC', 41242518, 'Olga', 'Patricia', 'Perez', 'MontaÃ±ez', '2021-07-07', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'olga@gmail.com', 0, 7777775, 'tecnico', 'Menos de un 1 aÃ±o', 'Casado', 0),
(20, 11, 'CC', 5555, 'pepito', '', 'perez', '', '2021-07-22', 'Masculino', 'Crr 18 n 24 a 34', 'Progreso', 'pepito@gmail', 0, 44444, 'tecnico', 'Menos de un 1 aÃ±o', 'Casado', 1),
(21, NULL, 'CC', 5555, 'pepito', '', 'perez', '', '2021-07-22', 'Masculino', 'Crr 18 n 24 a 34', 'Progreso', 'pepito@gmail', 0, 44444, 'tecnico', 'Menos de un 1 aÃ±o', 'Casado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `codigoFactura` varchar(50) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
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

INSERT INTO `factura` (`idFactura`, `codigoFactura`, `idEmpleado`, `idCliente`, `documentoIdentidad`, `responsableFactura`, `fechaFactura`, `cantidad`, `iva`, `valorUnitario`, `valorTotal`, `eliminado`) VALUES
(1, '24072021', 14, 1, 1006700633, 'jimena olaya', '2021-07-24', 1, '6.00', '1200.00', '2000.00', 0),
(2, '23072021', 14, 1, 1006700633, 'jimena olaya', '2021-07-23', 1, '6.00', '1.00', '2000.00', 0);

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
(2, 'Modulo1', 0),
(3, 'Modulo2', 0),
(4, 'Modulo2', 1);

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
(1, 2, 'Pagina1', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 0, 0),
(2, 2, 'Pagina1', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 0, 1),
(3, 2, 'Pagina2', '/anyeale_proyecto/StylushAnyeale_Alejandra/', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `documentoIdentidad` int(11) NOT NULL,
  `responsablePedido` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `codigoProducto` varchar(100) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `entregaPedido` tinyint(1) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idProducto`, `documentoIdentidad`, `responsablePedido`, `empresa`, `direccion`, `codigoProducto`, `producto`, `cantidad`, `fechaPedido`, `entregaPedido`, `eliminado`) VALUES
(111101, NULL, 1006700633, 'Alejandra Perez', 'Empresa x', 'CRR', 'V1', 'Locion', 5, '2021-07-14', 0, 0);

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
(7, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `codigoProducto` varchar(100) NOT NULL,
  `tipoProducto` varchar(20) NOT NULL,
  `nombreProducto` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `recomendaciones` varchar(100) NOT NULL,
  `valorUnitario` decimal(6,2) NOT NULL,
  `costoProducto` double(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `idCategoria`, `codigoProducto`, `tipoProducto`, `nombreProducto`, `cantidad`, `detalle`, `recomendaciones`, `valorUnitario`, `costoProducto`, `eliminado`) VALUES
(1, 2, 'V1', 'venta', 'locion', 12, 'locion para el cuerpo', '[value-8]', '1.00', 1.00, 0),
(2, 1, 'M1', 'Maquina', 'Silla', 4, 'detalle', 'recomendacion', '1.00', 1.00, 0),
(3, 2, 'V2', 'Venta', 'Tratamiento', 13, 'detalle', 'recomendacion', '1.00', 1.00, 0);

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
(10, '', 1);

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
  `nombreUser` varchar(50) NOT NULL,
  `correoElectronico` varchar(100) NOT NULL,
  `contrasena` char(35) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `nombreUser`, `correoElectronico`, `contrasena`, `idRol`, `eliminado`) VALUES
(1, 'Administrador', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0),
(2, 'Aleja', 'aleja@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 2, 0),
(3, 'Jimena_Olaya', 'jimenaolaya@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', NULL, 1),
(4, 'Olaya', 'Olaya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0),
(5, 'Alejandra', 'alejandra@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0),
(6, 'Administrador', 'carlos@', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0);

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
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

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
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `idCargo` (`idCargo`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idEmpleado` (`idEmpleado`,`idCliente`),
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
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `IdInventario` (`idProducto`);

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
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

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
  ADD KEY `idRol` (`idRol`);

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
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalleFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `idReservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `detalle_ibfk_3` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`IdPagina`) REFERENCES `pagina` (`idPagina`),
  ADD CONSTRAINT `permiso_ibfk_3` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`IdProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
