-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2021 a las 05:34:45
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
(8, 'CC', 30741453, 'flor', 'maria', 'montañez', 'vida', '2001-10-05', 'Femenino', 'Crr 18 n 24 a 34', 'Progreso', 'flor@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '3132902616', 0),
(9, 'CC', 1000002159, 'Carolina', '', 'Sanchez', '', '0000-00-00', '', 'Crr 18 n 24 a 3', '', 'carolinasanchez@gmail.com', '123456789', '3204495486', 0),
(10, 'TI', 1120563510, 'miguel', '', 'Perez', '', '0000-00-00', '', 'Crr 18 n 24 a 34', '', 'miguelPerez@gmail.com', '25f9e794323b453885f5181f1b624d0b', '3204495486', 0);

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
(17, 3, NULL, 564924075, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(18, 6, NULL, 564924075, NULL, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(19, 3, NULL, 564924075, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(20, 6, NULL, 564924075, NULL, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(21, 3, NULL, 564924075, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
(22, 6, NULL, 564924075, NULL, NULL, 'U2', 'Cera', 5, 9999.99, 1),
(23, 3, NULL, 564924075, NULL, NULL, 'V2', 'Tratamiento', 3, 1.00, 0),
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
(39, 6, NULL, NULL, 959073078, NULL, 'U2', 'Cera', 1, 9999.99, 0);

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
(2, NULL, NULL, 12, NULL, '', '', '', '', '', '', 'img/prueba.jpg', '', ''),
(3, 12, NULL, NULL, NULL, '/image/unnamed.jpg', 'image/igora-royal-pearlescence-coloracion-60-ml.jpg', '/image/Colorworks.jpg', '/image/descarga.jpg', '/image/tintura-igora-vital-schwarzkopf.jpg', '', '', '', ''),
(4, NULL, NULL, NULL, 8, '', '', '', '', '', '', '', '', '/image/perfilCliente/8/perfilCliente.jpg'),
(5, NULL, NULL, NULL, 1, '', '', '', '', '', '', '', '', '/imagen');

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
(56, 3, 'Mostrar Reservaciones', 'view/mostrarReservaciones.php', 1, 1, 0);

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
(106533512, 2, 2147483647, 'Alejandra Perez', 'NIT121', 'Empresa3', 'Crr 18 n 24 a 3', '2021-09-08', 1, 0),
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
  `codigoProducto` varchar(100) NOT NULL,
  `nombreProducto` varchar(20) NOT NULL,
  `descripcionProducto` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `recomendaciones` varchar(500) NOT NULL,
  `valorUnitario` decimal(6,2) NOT NULL,
  `costoProducto` double(6,2) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `codigoProducto`, `nombreProducto`, `descripcionProducto`, `cantidad`, `recomendaciones`, `valorUnitario`, `costoProducto`, `eliminado`) VALUES
(1, 'sddssd', 'locion', '', 9, 'Recomendaciones', '1.28', 1.00, 0),
(2, 'U1', 'Crema', '', 8, 'recomendacion', '1.00', 1.00, 0),
(3, 'V2', 'Tratamiento', '', 31, 'recomendacion', '1.00', 1.00, 0),
(4, 'V3', 'Acondicionador', '', 13, 'Recomendaciones', '3000.00', 9999.99, 0),
(5, 'V3', 'Acondicionador', '', 0, 'Recomendaciones', '3000.00', 9999.99, 0),
(6, 'U2', 'Cera', '', 30, 'Recomendaciones', '3000.00', 9999.99, 0),
(12, 'Vital222', 'Igora Vital', 'El NUEVO Igora Vital contiene un tratamiento de 7 aceites y el Hair Resistant Complex, los aliados perfectos para disminuir el daño en cada coloración, gracias a esta nueva fórmula tendrás menos punta', 46, 'Descubre la exclusiva fórmula del NUEVO Igora Vital con máximo cuidado y máximo color que reúne todo lo que necesitas para conseguir un look único y natural. Gracias a la coloración permanente del NUEVO Igora Vital con protección extra que cuida mientras da color, tendrás un cabello más resistente al quiebre con un color intenso y duradero.\r\n\r\n¡El color y todo el cuidado se quedan en tu cabello!', '15.00', 1.00, 0);

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
(3, 1, 8, 409358848, 'Jimena', 'Olaya', 2147483647, '2021-09-05', '08:00:00', '09:59:00', 0, 0, '', 400.00, 0),
(86300113, 1, NULL, 267687805, 'jimena Perez', 'jimena Perez', 2147483647, '2021-08-21', '19:30:00', '00:00:00', 0, 0, '', 6765.00, 0),
(135202147, 5, NULL, 1, 'Maria ', 'Lopez ', 123456789, '2021-08-31', '11:00:00', '00:00:00', 0, 0, 'Crr 18 n 24 a 34', 3434.00, 0),
(156974791, 1, NULL, 409358848, 'jimena Perez', 'jimena Perez', 2147483647, '2021-08-21', '14:30:00', '00:00:00', 0, 0, '', 7543.00, 0),
(345563877, 1, 8, 267687805, 'jimena Perez', 'jimena Perez', 2147483647, '2021-08-21', '18:30:00', '00:00:00', 0, 0, '', 7643.00, 0),
(362914484, 5, 3, 3, 'Maria ', 'Lopez ', 123456789, '2021-09-05', '10:30:00', '10:59:00', 0, 0, '', 0.00, 1),
(401390042, 5, 1, 409358848, 'Maria ', 'Lopez ', 123456789, '2021-09-02', '19:30:00', '19:59:00', 0, 0, '', 0.00, 0),
(441675660, 5, 1, 409358848, 'Maria ', 'Lopez ', 123456789, '2021-09-05', '10:30:00', '10:59:00', 0, 0, '', 0.00, 1),
(666806411, 1, NULL, 820772169, 'jimena Perez', 'jimena Perez', 2147483647, '2021-08-19', '16:18:00', '00:00:00', 0, 0, '', 9876.00, 0),
(746347683, 5, 2, 409358848, 'Maria ', 'Lopez ', 123456789, '2021-09-03', '15:30:00', '15:59:00', 0, 0, '', 0.00, 1),
(779494089, 5, NULL, 409358848, 'Maria ', 'Lopez ', 123456789, '2021-09-02', '19:00:00', '19:59:00', 0, 0, 'Crr 18 n 24 a 3', 0.00, 0),
(814176324, 8, NULL, 38801601, 'jimena Perez', 'jimena Perez', 2147483647, '2021-08-21', '16:30:00', '00:00:00', 0, 1, '', 9999.99, 0);

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
  `idFactura` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `fechaSeguimiento` date NOT NULL,
  `horaSeguimiento` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`idSeguimiento`, `IdPedido`, `idProducto`, `idFactura`, `idUser`, `observacion`, `fechaSeguimiento`, `horaSeguimiento`) VALUES
(1, 179821511, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-11', '18:41:12'),
(2, 179821511, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-11', '18:45:23'),
(3, 111101, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-11', '18:57:09'),
(4, 179821511, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-11', '18:58:09'),
(5, NULL, NULL, 1, 2, 'Ha cancelado una factura', '2021-08-14', '18:21:43'),
(6, 564924075, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:25:58'),
(7, 674162799, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:26:11'),
(8, 50704385, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:27:42'),
(9, 686774842, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:28:08'),
(10, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:35:56'),
(11, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:45'),
(12, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:46'),
(13, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:47'),
(14, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:48'),
(15, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:36:48'),
(16, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:37:36'),
(17, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:38:36'),
(18, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:38:37'),
(19, 564924075, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:41:25'),
(20, 686774842, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:41:44'),
(21, 50704385, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-17', '22:52:46'),
(22, 564924075, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-17', '22:54:00'),
(23, 277952570, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-17', '22:54:23'),
(24, 705061606, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-17', '22:54:35'),
(25, 464080926, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:56:27'),
(26, 992933774, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-17', '22:56:53'),
(27, 992933774, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:57:09'),
(28, 992933774, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-17', '22:57:47'),
(29, 686774842, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-17', '22:58:05'),
(30, 674162799, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-17', '22:58:22'),
(31, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:20:40'),
(32, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:20:56'),
(33, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:21:13'),
(34, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:22:17'),
(35, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:22:43'),
(36, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:23:27'),
(37, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:24:05'),
(38, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:24:48'),
(39, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:30:42'),
(40, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:31:11'),
(41, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:38:07'),
(42, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:38:22'),
(43, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-23', '10:38:33'),
(44, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:40:09'),
(45, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:41:08'),
(46, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:41:33'),
(47, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '19:59:40'),
(48, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:00:18'),
(49, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:01:13'),
(50, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:07:33'),
(51, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:08:05'),
(52, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:08:25'),
(53, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:13:06'),
(54, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:13:33'),
(55, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:14:13'),
(56, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:14:44'),
(57, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:15:03'),
(58, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:16:01'),
(59, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:16:32'),
(60, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:16:59'),
(61, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:17:35'),
(62, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:17:49'),
(63, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:18:23'),
(64, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:18:38'),
(65, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:21:45'),
(66, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:25:35'),
(67, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:26:23'),
(68, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:26:33'),
(69, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:27:25'),
(70, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:27:40'),
(71, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-24', '20:27:50'),
(72, 88328668, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-26', '15:09:02'),
(73, 88328668, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '15:21:34'),
(74, 88328668, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '15:22:44'),
(75, 88328668, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '15:25:37'),
(76, 88328668, NULL, NULL, 2, 'Ha validado un pedido', '2021-08-26', '15:26:58'),
(77, 88328668, NULL, NULL, 2, 'Ha cancelado un pedido', '2021-08-26', '15:27:51'),
(78, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-08-26', '18:15:13'),
(79, 55016541, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-08-26', '18:27:01'),
(80, 55016541, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:28:39'),
(81, 55016541, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:29:36'),
(82, 55016541, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:50:48'),
(83, 55016541, NULL, NULL, 2, 'Ha modificado un pedido', '2021-08-26', '18:51:33'),
(84, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:46:34'),
(85, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:46:48'),
(86, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:47:17'),
(87, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:47:39'),
(88, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:48:00'),
(89, NULL, NULL, NULL, 2, 'Ha cambiado su contraseña', '2021-09-02', '18:49:15'),
(90, 106533512, NULL, NULL, 2, 'Ha creado un nuevo pedido', '2021-09-08', '21:12:41'),
(91, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:12:49'),
(92, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:23'),
(93, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:38'),
(94, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:39'),
(95, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:57'),
(96, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:13:57'),
(97, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:14:53'),
(98, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:09'),
(99, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:29'),
(100, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:32'),
(101, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:50'),
(102, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:15:51'),
(103, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:16:12'),
(104, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:18:26'),
(105, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:18:40'),
(106, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:18:55'),
(107, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:19:22'),
(108, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:19:40'),
(109, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:23:24'),
(110, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:24:59'),
(111, 106533512, NULL, NULL, 2, 'Ha validado un pedido', '2021-09-08', '21:25:37'),
(112, NULL, 1, NULL, 2, 'Esta actualizacion es debido a pruebas', '2021-09-09', '22:57:10'),
(113, NULL, 1, NULL, 2, 'Esta actualizacion es debido a pruebas', '2021-09-09', '22:57:47'),
(114, NULL, 2, NULL, 2, 'Actualizacin de prueba', '2021-09-09', '23:01:12');

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
(1, '512', 'Corte', 'Detalle2', 55, '9999.99', 1),
(2, 'S2', 'Planchado', 'Detalle3', 25, '9999.99', 1),
(3, 'S5', 'Planchado', 'Detalle2', 60, '9999.99', 1),
(38801601, '567u', 'cfvgbhnjm', 't678', 0, '3467.00', 1),
(267687805, 'S5', 'Planchado', 'Detalle2', 0, '9999.99', 1),
(293275022, 'S2', 'Planchado', 'Detalle2', 0, '9999.99', 1),
(409358848, 'S7', 'Planchado', 'Detalle2', 30, '9999.99', 1),
(522676893, '88', 'Alisado', 'Detalle2', 15, '4321.00', 1),
(544456873, 'S5', 'Planchado', 'Detalle2', 35, '9999.99', 0),
(721804413, 'dsfds', 'sdfsdf', 'dsfsdf', 0, '9999.99', 1),
(820772169, 'S7', 'Planchado', 'Detalle2', 0, '9999.99', 1),
(959073078, 'S3', 'Depilado', 'Detalle2', 25, '9999.99', 0);

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
(1, NULL, NULL, 'CC', 1006700633, 'Harley', '', 'Mendoza', '', '0000-00-00', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, '', '', '', '', 0),
(2, 1, NULL, 'CC', 2147483647, 'Alejandra', 'Alejandra', 'Perez', 'olaya', '2000-12-31', 'aleja@gmail.com', 'dc13ae48d185bf2dbad46c1005f46eca', 453434563, 'Femenino', 'Divorciado', 'Crr 18 n 24 a 34', 'piguanza', 0),
(3, 3, NULL, '', 0, 'Jimena_Olaya', '0', '', '', '0000-00-00', 'jimenaolaya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(4, NULL, NULL, '', 0, 'Olaya', '0', '', '', '0000-00-00', 'Olaya@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(5, NULL, NULL, '', 0, 'Alejandra', '0', '', '', '0000-00-00', 'alejandra@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(6, NULL, NULL, '', 0, 'Administrador', '0', '', '', '0000-00-00', 'carlos@', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '', '', 0),
(7, NULL, NULL, 'CC', 1120563510, 'Miguel', 'Angel', 'Olaya', 'Perez', '2021-07-22', 'miguelolaya@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 7777775, 'Masculino', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 0),
(8, NULL, NULL, 'CC', 41242518, 'Olga', 'Patricia', 'Perez', 'MontaÃ±ez', '2021-07-12', 'Olgaperez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 7777775, 'Femenino', 'Casado', 'Crr 18 n 24 a 34', 'Progreso', 0),
(9, NULL, NULL, 'CC', 1000002159, 'Leidy', 'Patricia', 'Sanchez', 'Fonseca', '2000-03-07', 'carolinasanchez@gmail.com', '25f9e794323b453885f5181f1b624d0b', 7777775, 'Femenino', 'Soltero', 'Crr 18 n 24 a 34', 'Progreso', 0),
(10, NULL, NULL, 'CE', 1006700633, 'Miguel', '', 'Perez', '', '2001-03-19', 'hh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2147483647, '', '', '', '', 0),
(11, NULL, NULL, 'CE', 100670063, 'Miguel', '', 'Perez', '', '2001-03-19', 'tt@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 2147483647, '', '', '', '', 0),
(12, NULL, NULL, 'CE', 1006700463, 'Miguel', '', 'Perez', '', '2001-03-19', 'ttf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(13, NULL, NULL, 'CE', 10060463, 'Miguel', '', 'Perez', '', '2001-03-19', 'attf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(14, NULL, NULL, 'CE', 1006063, 'Miguel', '', 'Perez', '', '2001-03-19', 'fattf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
(15, NULL, NULL, 'CE', 10067063, 'Miguel', '', 'Perez', '', '2001-03-19', 'sdastt@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, '', '', '', '', 0),
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
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

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
  ADD KEY `seguimientoProducto` (`idProducto`);

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
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalleFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `detallefoto`
--
ALTER TABLE `detallefoto`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
