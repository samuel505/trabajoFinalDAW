-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-04-2023 a las 21:56:36
-- Versión del servidor: 10.6.7-MariaDB-2ubuntu1.1
-- Versión de PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proxecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(99) NOT NULL,
  `filecode` varchar(99) NOT NULL,
  `id_usuario` int(99) NOT NULL,
  `ruta_local` varchar(99) NOT NULL,
  `nombre_archivo` varchar(99) NOT NULL,
  `fecha_subida` date NOT NULL,
  `fecha_borrado` date DEFAULT NULL,
  `type` longtext NOT NULL,
  `size` bigint(99) DEFAULT NULL,
  `borrado` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id_plan` int(99) NOT NULL,
  `nombre_plan` varchar(99) NOT NULL,
  `almacenamiento` bigint(99) NOT NULL,
  `GB` int(99) NOT NULL,
  `precio` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `nombre_plan`, `almacenamiento`, `GB`, `precio`) VALUES
(0, 'Free', 2147483648, 2, 0),
(1, 'Pro Lite', 10737418240, 10, 5),
(2, 'Pro', 21474836480, 20, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `nombre` varchar(99) NOT NULL,
  `apellidos` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `genero` varchar(999) DEFAULT NULL,
  `pais` varchar(2) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `image` varchar(99) DEFAULT NULL,
  `id_plan` int(99) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `nombre`, `apellidos`, `password`, `genero`, `pais`, `fecha_nacimiento`, `image`, `id_plan`) VALUES
(0, 'test@test.com', 'test', 'test', '$2y$10$QGVnkbY1FgHyZakmvfsuQuZoHM6RMfacq.eHTpC4v19KV1HRZoc9u', 'hombre', 'ES', NULL, 'profiles/64453538812a9.jpg', 0),
(1, 'test2@test.com', 'test2', 'test2', '$2y$10$A/zMuHx63ZHk6cre6p7zXerh0J7idJ8mFlqocQsfxvc2IhBlkVZu.', 'NULL', 'PT', '0000-00-00', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD UNIQUE KEY `filecode` (`filecode`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id_plan` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
