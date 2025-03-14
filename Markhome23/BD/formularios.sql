-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2025 a las 01:53:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formularios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `id_catalogo` int(11) NOT NULL,
  `nom_producto` varchar(20) NOT NULL,
  `inf_producto` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id_catalogo`, `nom_producto`, `inf_producto`, `precio`, `imagen`) VALUES
(4, 'Papaaaa', 'papa ', 12000.00, '3946.jpg'),
(6, 'Huevos', 'Huevos ricos', 200000.00, '5808.jpg'),
(8, 'Yuca', 'Bajo la yuca', 150000.00, 'Yuca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` char(25) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `telefono`, `correo`, `contraseña`) VALUES
(15, 'Holaaaa', '', 2147483647, 'Esteban@gmail.com', ''),
(16, 'Esteban', '', 3, 'Esteban@gmail.com', ''),
(27, 'Abuela', '', 2147483647, 'Esteban@gmail.com', '34343'),
(30, 'Abuela', '', 2147483647, 'Esteban@gmail.com', '3434'),
(31, 'sdsad', '', 2147483647, 'Esteban@gmail.com', '23423'),
(32, 'sdsad', '', 2147483647, 'Esteban@gmail.com', '23423'),
(33, 'sdsad', '', 2147483647, 'Esteban@gmail.com', '23423'),
(34, 'sdsad', '', 2147483647, 'Esteban@gmail.com', '23423'),
(35, 'Esteban', '', 43432523, 'Diego@gmail.com', '213423'),
(36, 'Abuela', '', 2147483647, 'leidy@gmail.com', '453'),
(37, 'Leidy', '', 2147483647, 'leidy@gmail.com', '4343'),
(38, 'Estebannnn', '', 2147483647, 'Esteban@gmail.com', '1212'),
(39, 'David', '', 2147483647, 'David@gmail.com', '1212'),
(40, 'Daniela', '', 2147483647, 'Daniela@gmail.com', '1212'),
(41, 'Estebannnn', '', 2147483647, 'EstebanMoraHerrera82@gmail.com', '3434'),
(42, 'sdsad', '', 23423, 'Esteban@gmail.com', '4545'),
(43, 'Leidy', '', 2147483647, 'leidy@gmail.com', '6767'),
(44, 'Moraa', '', 2147483647, 'Mora@gmail.com', '5656');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_cliente`, `nombre`, `telefono`, `correo`, `direccion`, `producto`, `cantidad`, `total`, `fecha`) VALUES
(1, 15, NULL, NULL, NULL, NULL, '', 1, 10.00, '2025-03-10 05:59:03'),
(2, 16, NULL, NULL, NULL, NULL, 'esteban', 0, 0.00, '2025-03-10 05:59:07'),
(3, 16, NULL, NULL, NULL, NULL, 'eweew', 0, 0.00, '2025-03-10 05:59:13'),
(4, 16, NULL, NULL, NULL, NULL, 'esteban', 0, 0.00, '2025-03-10 05:59:50'),
(5, 16, NULL, NULL, NULL, NULL, 'esteban', 0, 0.00, '2025-03-10 06:01:20'),
(6, 16, NULL, NULL, NULL, NULL, 'esteban', 0, 0.00, '2025-03-10 06:04:17'),
(7, 16, NULL, NULL, NULL, NULL, 'esteban', 0, 0.00, '2025-03-10 06:04:49'),
(8, 16, NULL, NULL, NULL, NULL, 'esteban', 0, 0.00, '2025-03-10 06:05:42'),
(9, 16, NULL, NULL, NULL, NULL, 'esteban', 0, 0.00, '2025-03-10 06:06:00'),
(10, 15, NULL, NULL, NULL, NULL, '', 1, 10.00, '2025-03-10 06:08:05'),
(11, 16, NULL, NULL, NULL, NULL, 'esteban', 0, 0.00, '2025-03-10 06:08:15'),
(12, 16, NULL, NULL, NULL, NULL, 'eweew', 0, 0.00, '2025-03-10 06:08:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envios` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(25) NOT NULL,
  `barrio` varchar(25) NOT NULL,
  `calle_av` varchar(25) NOT NULL,
  `ciudad` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id_catalogo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envios`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
