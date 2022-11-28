-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 04:01:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accesostec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(9) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `domicilio` varchar(150) NOT NULL,
  `id_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id_dispositivo` int(9) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `numero_posicion` int(11) NOT NULL,
  `id_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`id_dispositivo`, `descripcion`, `numero_posicion`, `id_usuario`) VALUES
(1, 'Dispositivo usado para la entrada del lado del chedrahui', 1, 'DIS1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `matricula` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) NOT NULL,
  `carrera` varchar(40) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `numero_telefonico` varchar(12) NOT NULL,
  `numero_emergencia` varchar(12) NOT NULL,
  `domicilio` varchar(150) NOT NULL,
  `foto` longblob DEFAULT NULL,
  `codigoqr` longblob DEFAULT NULL,
  `id_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`matricula`, `nombre`, `apellido1`, `apellido2`, `carrera`, `correo`, `numero_telefonico`, `numero_emergencia`, `domicilio`, `foto`, `codigoqr`, `id_usuario`) VALUES
('17161161', 'Jorge', 'martines', 'Gomez', 'nada', 'jorge@jemplo.correo', '3233', '3233', 'En mi casa', 0x4e554c4c, 0x4e554c4c, '17161161'),
('17161162', 'Efrain', 'Lopez', 'Sanchez', 'Ingenieria en Sistemas Computacionales', 'efrainlpzsnchz@gmail.com', '7768668678', '7867867866', 'En mi casa', 0x4e554c4c, 0x4e554c4c, '17161162');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_registros` int(11) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `dispositivo` int(9) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo_registro` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre_usuario` varchar(15) NOT NULL,
  `contrasenia` varchar(15) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `contrasenia`, `tipo`) VALUES
('17161161', '1234', 'estudiante'),
('17161162', '1234', 'estudiante'),
('ADM100', 'admin', 'avanzado'),
('DIS1', '1234', 'dispositivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `fk_administrador_usuario` (`id_usuario`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id_dispositivo`),
  ADD KEY `fk_dispositivo_usuario` (`id_usuario`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `fk_estudiante_usuario` (`id_usuario`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_registros`),
  ADD KEY `fk_registros_estudiantes` (`matricula`),
  ADD KEY `fk_registros_dispositivos` (`dispositivo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id_registros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `fk_dispositivo_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_registros_dispositivos` FOREIGN KEY (`dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registros_estudiantes` FOREIGN KEY (`matricula`) REFERENCES `estudiante` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
