-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2021 a las 00:41:53
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
-- Base de datos: `sistemaeducativo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `curso` varchar(80) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `curso`, `idProfesor`, `eliminado`) VALUES
(37, 'ADSI', 11, 1),
(38, 'Ingles', 12, 1),
(39, 'frances', 11, 0),
(40, 'Fisica', 11, 0),
(41, 'Matematicas', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `tipoDocumento` char(2) NOT NULL,
  `documentoIdentidad` varchar(15) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(30) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `tipoDocumento`, `documentoIdentidad`, `nombres`, `apellidos`, `direccion`, `telefono`, `eliminado`) VALUES
(15, 'CC', '91612166', 'Alejandra', 'Perez', 'Crr 18 n 24 a 34', '3115609456', 0),
(16, 'CC', '	91612166', 'Angel', 'Perez', 'crr 18 n 24 a 34', '3204995486', 0),
(17, 'CC', '41242518', 'Olga ', 'Perez', 'Crr 18 n 24 a 3', '3115609456', 0),
(18, 'CC', '1000002159', 'Carolina', 'Sanchez', 'Crr 18 n 24 a 34', '7777775', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `Observaciones` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id`, `idCurso`, `curso`, `idEstudiante`, `Observaciones`, `eliminado`) VALUES
(20, 37, '', 15, 0, 0),
(21, 37, '', 16, 0, 0),
(22, 38, '', 15, 0, 0),
(23, 39, '', 15, 0, 0),
(24, 39, '', 16, 0, 0),
(25, 40, '', 15, 0, 0),
(26, 39, '', 17, 0, 1),
(27, 40, '', 18, 0, 0),
(28, 41, '', 17, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nombreModulo` varchar(50) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id`, `nombreModulo`, `eliminado`) VALUES
(5, 'Modulo1', 1),
(6, 'Modulo2', 1),
(7, 'Modulo4', 1),
(8, 'Modulo2', 1),
(9, 'Modulo4', 1),
(10, 'Modulo3', 1),
(11, 'Modulo4', 1),
(12, 'Modulo3', 1),
(13, 'Modulo3', 1),
(14, 'Modulo3', 1),
(15, 'Administrador', 0),
(16, 'Estudiante', 0),
(17, 'Profesor', 0),
(18, 'Curso', 0),
(19, 'Inicio', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `idMatricula` int(11) NOT NULL,
  `nota1` float NOT NULL,
  `nota2` float NOT NULL,
  `nota3` float NOT NULL,
  `promedio` float NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `idMatricula`, `nota1`, `nota2`, `nota3`, `promedio`, `eliminado`) VALUES
(13, 21, 41, 42, 35, 39.3, 0),
(14, 20, 45, 40, 35, 40, 0),
(15, 23, 4.5, 4.1, 4, 4.2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `requireSession` tinyint(1) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id`, `idModulo`, `nombre`, `enlace`, `requireSession`, `eliminado`) VALUES
(19, 5, 'Pagina1', 'phpCRUD', 1, 1),
(21, 8, 'Pagina2', 'phpCRUD', 1, 1),
(22, 5, 'Pagina3', 'phpCRUD', 1, 1),
(23, 5, 'miguel', 'phpCRUD', 1, 1),
(24, 5, 'Pagina1', 'phpCRUD', 1, 1),
(25, 5, 'Pagina2', 'phpCRUD', 1, 1),
(26, 5, 'Pagina33', 'phpCRUD', 1, 1),
(27, 5, 'Pagina3', 'phpCRUD', 1, 1),
(28, 5, 'Pagina4', 'phpCRUD', 1, 1),
(29, 8, 'Pagina2', 'phpCRUD', 1, 1),
(30, 16, 'Crear estudiante', 'CRUD_estudiante/crearEstudiante.php', 1, 0),
(31, 16, 'Editar estudiante', 'CRUD_estudiante/editarEstudiante.php', 1, 0),
(32, 16, 'Eliminar estudiante', 'CRUD_estudiante/eliminarEstudiante.php', 1, 0),
(33, 16, 'Listar estudiante', 'CRUD_estudiante/listarEstudiante.php', 1, 0),
(34, 16, 'Fomulario editar estudiante', 'CRUD_estudiante/formularioEditar.php', 1, 0),
(35, 16, 'Detalle estudiante', 'CRUD_estudiante/detalleEstudiante.php', 1, 0),
(36, 16, 'Nuevo estudiante', 'CRUD_estudiante/nuevoEstudiante.php', 1, 0),
(37, 17, 'Crear profesor', 'CRUD_profesor/crearProfesor.php', 1, 0),
(38, 17, 'Editar profesor', 'CRUD_profesor/editarProfesor.php', 1, 0),
(39, 17, 'Listar profesor', 'CRUD_profesor/listarProfesor.php', 1, 0),
(40, 17, 'Eliminar profesor', 'CRUD_profesor/eliminarProfesor.php', 1, 0),
(41, 17, 'Detalle profesor', 'CRUD_profesor/detalleProfesor.php', 1, 0),
(42, 17, 'Nuevo profesor', 'CRUD_profesor/nuevoProfesor.php', 1, 0),
(43, 17, 'Formulario editar pr', 'CRUD_profesor/formularioEditarProfesor.php', 1, 0),
(44, 18, 'Crear curso', 'CRUD_curso/crearCurso.php', 1, 0),
(45, 18, 'Editar curso', 'CRUD_curso/editarCurso.php', 1, 0),
(46, 18, 'Eliminar curso', 'CRUD_curso/eliminarCurso.php', 1, 0),
(47, 18, 'Listar curso', 'CRUD_curso/listarCurso.php', 1, 0),
(48, 18, 'Formulario editar curso', 'CRUD_curso/formularioEditarCurso.php', 1, 0),
(49, 18, 'Nuevo curso', 'CRUD_curso/nuevoCurso.php', 1, 0),
(50, 18, 'Crear matricula', 'CRUD_matricula/crearMatricula.php', 1, 0),
(51, 18, 'Editar matricula', 'CRUD_matricula/editarMatricula.php', 1, 0),
(52, 18, 'eliminar matricula', 'CRUD_matricula/eliminarMatricula.php', 1, 0),
(53, 18, 'Formulario editar matricula', 'CRUD_matricula/formularioEditarMatricula.php', 1, 0),
(54, 18, 'Listar matricula', 'CRUD_matricula/listarMatricula.php', 1, 0),
(55, 18, 'Nuevo matricula', 'CRUD_matricula/nuevoMatricula.php', 1, 0),
(56, 18, 'Crear nota', 'CRUD_nota/crearNota.php', 1, 0),
(57, 18, 'Editar nota', 'CRUD_nota/editarNota.php', 1, 0),
(58, 18, 'Eliminar nota', 'CRUD_nota/eliminarNota.php', 1, 0),
(59, 18, 'Formulario editar nota', 'CRUD_nota/formularioEditarNota.php', 1, 0),
(60, 18, 'Listar nota', 'CRUD_nota/listarNota.php', 1, 0),
(61, 18, 'Nueva nota', 'CRUD_nota/nuevoNota.php', 1, 0),
(62, 15, 'Crear usuario', 'CRUD_administrador/crearUsuario.php', 0, 1),
(63, 15, 'Listar usuario', 'CRUD_administrador/listarUsuario.php', 1, 0),
(64, 15, 'Nuevo usuario', 'CRUD_administrador/nuevoUsuarios.php', 1, 0),
(65, 15, 'Crear rol', 'CRUD_roles/crearRol.php', 1, 0),
(66, 15, 'Editar rol', 'CRUD_roles/editarRol.php', 1, 0),
(67, 15, 'Eliminar rol', 'CRUD_roles/EliminarRol.php', 1, 0),
(68, 15, 'Formulario editar rol', 'CRUD_roles/formularioEditarRol.php', 1, 0),
(69, 15, 'Listar detalle rol', 'CRUD_roles/listarDetalleRol.php', 1, 0),
(70, 15, 'Listar rol', 'CRUD_roles/listarRol.php', 1, 0),
(71, 15, 'Nuevo rol', 'CRUD_roles/nuevoRol.php', 1, 0),
(72, 15, 'Nuevo detalle rol', 'CRUD_roles/nuevoDetalleRol.php', 1, 0),
(73, 15, 'Crear modulo', 'CRUD_modulo/crearModulo.php', 1, 0),
(74, 15, 'Editar modulo', 'CRUD_modulo/editarModulo.php', 1, 0),
(75, 15, 'Eliminar modulo', 'CRUD_modulo/eliminarModulo.php', 1, 0),
(76, 15, 'Formulario editar modulo', 'CRUD_modulo/formularioEditarModulo.php', 1, 0),
(77, 15, 'Nuevo modulo', 'CRUD_modulo/nuevoModulo.php', 1, 0),
(78, 15, 'Crear pagina', 'CRUD_pagina/crearPagina.php', 1, 0),
(79, 15, 'Editar pagina', 'CRUD_pagina/editarPagina.php', 1, 0),
(80, 15, 'Eliminar pagina', 'CRUD_pagina/eliminarPagina.php', 1, 0),
(81, 15, 'Formulario editar pagina', 'CRUD_pagina/formularioEditarPagina.php', 1, 0),
(82, 15, 'Listar pagina', 'CRUD_pagina/listarPagina.php', 1, 0),
(83, 15, 'Nueva pagina', 'CRUD_pagina/nuevoPagina.php', 1, 0),
(84, 19, 'Index', '/', 1, 0),
(85, 19, 'Pagina1', 'phpCRUD', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idRol` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `idPagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idRol`, `idModulo`, `idPagina`) VALUES
(13, 16, 35),
(14, 17, 38),
(14, 17, 39),
(14, 17, 41),
(14, 18, 56),
(14, 18, 57),
(14, 18, 58),
(14, 18, 59),
(14, 18, 60),
(14, 18, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `tipoDocumento` varchar(2) NOT NULL,
  `documentoIdentidad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `tipoDocumento`, `documentoIdentidad`, `nombre`, `apellido`, `direccion`, `telefono`, `eliminado`) VALUES
(11, 'CC', 1006700633, 'Luis', 'Parra', '88888888', '3204995486', 0),
(12, 'CC', 1120563510, 'Angel', 'Perez', 'Crr 18 n 24 a 34', '3115609456', 0),
(13, 'CC', 369258, 'Olga', 'Perez', 'ffff8', '3113878501', 0),
(14, 'CC', 1120563510, 'FFF', 'FFF', 'FFF', '277777', 0),
(15, 'CC', 41242518, 'Olga', 'Perez', 'CRR 18 N 24 A 34', '3113878501', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombreRol` varchar(30) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombreRol`, `eliminado`) VALUES
(1, 'Administrador', 0),
(2, 'Vendedor', 1),
(3, 'Rol3', 1),
(4, 'Rol2', 1),
(5, 'Secretari@', 1),
(6, 'Secretario(a)', 1),
(7, 'Secretario(a)', 1),
(8, 'Secretario(a)', 1),
(9, 'Secretario(a)', 1),
(10, 'Gerente', 1),
(11, 'Gerente', 1),
(12, 'Rol2', 1),
(13, 'Estudiante', 0),
(14, 'Profesor', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` varchar(36) NOT NULL,
  `idUser` int(11) NOT NULL,
  `estadoSolicitud` tinyint(1) NOT NULL,
  `limiteTiempo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `idUser`, `estadoSolicitud`, `limiteTiempo`) VALUES
('60da6a74403e3', 2, 1, '2021-06-28 19:33:56'),
('60da6af72e5b3', 2, 1, '2021-06-28 19:36:07'),
('60da6b05f3e2f', 2, 1, '2021-06-28 19:36:21'),
('60da6b207beb7', 2, 1, '2021-06-28 19:36:48'),
('60dbacba02ab6', 2, 1, '2021-06-29 18:28:58'),
('60dbada4b8907', 2, 1, '2021-06-29 18:32:52'),
('60dbc54306aa6', 2, 1, '2021-06-29 20:13:39'),
('60dbcc2c5e5c0', 2, 1, '2021-06-29 20:43:08'),
('60dcfa8316c60', 2, 1, '2021-06-30 18:13:07'),
('60dcfa91868f9', 2, 1, '2021-06-30 18:13:21'),
('60dcfa9b09e57', 2, 1, '2021-06-30 18:13:31'),
('60dcfaad69357', 8, 0, '2021-07-01 18:10:49'),
('60dcfb234d72f', 11, 0, '2021-07-01 18:20:33'),
('60de160549c7f', 3, 1, '2021-07-01 14:22:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `correoElectronico` varchar(100) NOT NULL,
  `contrasena` char(35) NOT NULL,
  `resetContrasena` tinyint(1) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `nombre`, `correoElectronico`, `contrasena`, `resetContrasena`, `idRol`, `eliminado`) VALUES
(1, 'administrador', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 1, 0),
(2, 'Aleja', 'aleja@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 0, 1, 0),
(3, 'Olga Perez', 'Olgaperez@gmail.com', '141101', 0, 13, 0),
(8, 'Patricia Perez', 'patriciaperez@gmail.com', '577b9b41fc4b13ff1ff65618b5437570', 0, 13, 0),
(9, 'Erika Ballen', 'erikaballen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 13, 0),
(10, 'Miguel Olaya', 'miguelolaya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 14, 0),
(11, 'Jimena Olaya', 'jimenaolaya@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 0, 14, 0),
(12, 'Carolina Sanchez', 'carolinasanchez@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 0, 13, 0),
(13, 'Vanessa Perez', 'vanessa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 13, 0),
(14, 'Alejandra Olaya', 'AlejandraOlaya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 13, 0),
(15, 'Olaya', 'Olaya@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 0, 13, 0),
(16, 'Jimena Olaya Perez', 'jimenaalejandraolayap@gmail.com', 'c4bde75c71d0154c00f415b1e4aef592', 0, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursoprofesor` (`idProfesor`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unicoidentificacion` (`documentoIdentidad`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursoMatricula` (`idCurso`),
  ADD KEY `estudianteMatricula` (`idEstudiante`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notaMatricula` (`idMatricula`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idModulo` (`idModulo`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD KEY `idModulo` (`idModulo`),
  ADD KEY `idPagina` (`idPagina`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `usuarioSolicitud` (`idUser`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursoprofesor` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`id`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `cursoMatricula` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `estudianteMatricula` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notaMatricula` FOREIGN KEY (`idMatricula`) REFERENCES `matricula` (`id`);

--
-- Filtros para la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `pagina_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`id`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`idPagina`) REFERENCES `pagina` (`id`),
  ADD CONSTRAINT `permiso_ibfk_3` FOREIGN KEY (`idRol`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `permiso_ibfk_4` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `usuarioSolicitud` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
