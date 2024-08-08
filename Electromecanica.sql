-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 05:01:55
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleorden`
--

CREATE TABLE `detalleorden` (
  `idorden` int(11) NOT NULL,
  `idsubservicio` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalleorden`
--

INSERT INTO `detalleorden` (`idorden`, `idsubservicio`, `estado`) VALUES
(1, 2, 1),
(1, 3, 1),
(1, 5, 1),
(2, 11, 1),
(2, 12, 1),
(2, 13, 1),
(2, 14, 1),
(3, 13, 1),
(3, 14, 1),
(4, 10, 1),
(4, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `idorden` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`idorden`, `idusuario`, `direccion`, `fecha`, `estado`) VALUES
(1, 2, 'Ciudad Satélite Santa Rosa, Calle X', '2023-12-10 20:48:52', 2),
(2, 3, 'Parque Los Santos, 402', '2023-12-10 14:55:46', 1),
(3, 2, 'Ciudad Satélite Santa Rosa, Calle X', '2023-12-10 15:53:38', 2),
(4, 2, 'Ciudad Satélite Santa Rosa, Calle X', '2023-12-10 15:54:41', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `dni` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `apellido`, `celular`, `direccion`, `dni`) VALUES
(1, 'Pedro ', 'Gonzales', '997111666', 'Calle Manzanita 402 - dpta 902', '99887744'),
(2, 'Roberto', 'Varillas', '111444777', 'Calle XYZ', '11447722'),
(3, 'Diego', 'Martinez', '999999999', 'Alguna Calle XYZ', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango`
--

CREATE TABLE `rango` (
  `idrango` int(11) NOT NULL,
  `descipcion` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rango`
--

INSERT INTO `rango` (`idrango`, `descipcion`, `estado`) VALUES
(1, 'Cliente', 1),
(2, 'Empleado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idservicio`, `descripcion`, `estado`) VALUES
(1, ' Electricidad Industrial', 1),
(2, 'Electromecánica', 1),
(3, 'Estructuras Metálicas', 1),
(4, 'Energías Menores', 1),
(5, 'Acabados en la Construcción', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subservicio`
--

CREATE TABLE `subservicio` (
  `idsubservicio` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subservicio`
--

INSERT INTO `subservicio` (`idsubservicio`, `idservicio`, `descripcion`, `estado`) VALUES
(1, 1, 'Instalación Eléctrica para la Industria y Edificaciones', 1),
(2, 2, 'Instalación Sistema de Agua contra Incendio', 1),
(3, 2, 'Instalación Sistema de Agua Potable', 1),
(4, 2, 'Instalación Sistema de Agua para Piscinas', 1),
(5, 2, 'Sistemas de Refrigeración y Aire Acondicionado', 1),
(6, 3, 'Carpintería Metalica', 1),
(7, 3, 'Trabajo en Acero', 1),
(8, 3, 'Fabricación de Puertas Enrollables y Contra Placadas', 1),
(9, 3, 'Instalación de Techos', 1),
(10, 3, 'Pintado de Estructuras', 1),
(11, 3, 'Mantenimiento General', 1),
(12, 4, 'Cableado Estructurado', 1),
(13, 4, 'Alarmas', 1),
(14, 4, 'Video Vigilancia', 1),
(15, 5, 'Sistema de Drywall', 1),
(16, 5, 'Pintura de Paredes, Maderas y Estructuras', 1),
(17, 5, 'Carpintería en Madera y Melamina', 1),
(18, 5, 'Pisos Cerámicos y Porcelanatos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idrango` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idpersona`, `idrango`, `correo`, `password`) VALUES
(1, 1, 2, 'pedrog@gmail.com', 'pedro123'),
(2, 2, 1, 'robertov@gmail.com', 'Admin123'),
(3, 3, 1, 'diegom@gmail.com', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalleorden`
--
ALTER TABLE `detalleorden`
  ADD KEY `dorden` (`idorden`),
  ADD KEY `dsub` (`idsubservicio`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`idorden`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `rango`
--
ALTER TABLE `rango`
  ADD PRIMARY KEY (`idrango`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `subservicio`
--
ALTER TABLE `subservicio`
  ADD PRIMARY KEY (`idsubservicio`),
  ADD KEY `subser` (`idservicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `idrango` (`idrango`),
  ADD KEY `idpersona` (`idpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `idorden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subservicio`
--
ALTER TABLE `subservicio`
  MODIFY `idsubservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleorden`
--
ALTER TABLE `detalleorden`
  ADD CONSTRAINT `dorden` FOREIGN KEY (`idorden`) REFERENCES `orden` (`idorden`),
  ADD CONSTRAINT `dsub` FOREIGN KEY (`idsubservicio`) REFERENCES `subservicio` (`idsubservicio`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `subservicio`
--
ALTER TABLE `subservicio`
  ADD CONSTRAINT `subser` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idservicio`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `idpersona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `idrango` FOREIGN KEY (`idrango`) REFERENCES `rango` (`idrango`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
