-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-04-2023 a las 01:26:45
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
  `borrado` int(2) NOT NULL DEFAULT 0,
  `favorito` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivo`, `filecode`, `id_usuario`, `ruta_local`, `nombre_archivo`, `fecha_subida`, `fecha_borrado`, `type`, `size`, `borrado`, `favorito`) VALUES
(324, '6449c1cf1894f', 182, 'uploads/6449c1cf1894f', 'logo (1) (1)', '2023-04-27', NULL, '', 217295, 0, 0),
(326, '644ae766de567', 0, 'uploads/644ae766de567.jpeg', 'image (6) (1).jpeg', '2023-04-27', NULL, 'jpeg', 48705, 0, 0),
(327, '644af1306d10c', 0, 'uploads/644af1306d10c.jpeg', 'image (6) (1).jpeg', '2023-04-27', NULL, 'jpeg', 48705, 0, 0),
(328, '644af17a6575d', 0, 'uploads/644af17a6575d.png', 'Valores-calidad (1).png', '2023-04-27', NULL, 'png', 82568, 0, 0),
(329, '644af2eb6167c', 0, 'uploads/644af2eb6167c.png', 'Valores-calidad (1).png', '2023-04-27', NULL, 'png', 82568, 0, 0),
(330, '644af42340c36', 0, 'uploads/644af42340c36', 'logo (1) (1) (5)', '2023-04-27', NULL, '', 217295, 0, 0);

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
(0, 'test@test.com', 'test', 'test', '$2y$10$EyyT5.TW7YtszI7/2pdfsOZ7.n27RqmHEyIzegDmVFVQ27EP3AJV6', 'hombre', 'ES', '2024-01-26', 'profiles/644addc38f543.jpg', 0),
(1, 'test2@test.com', 'test2', 'test2', '$2y$10$A/zMuHx63ZHk6cre6p7zXerh0J7idJ8mFlqocQsfxvc2IhBlkVZu.', 'NULL', 'PT', '0000-00-00', '', 0),
(182, 'test3@test.com', 'test3', 'test3', '$2y$10$T7P9Z/D6BFj/NJxEk4UQM.nHmZTC9ZS.nu74.M0nwRDR4QJVgy9aq', 'hombre', NULL, NULL, 'profiles/6449b25945969.png', 0);

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
  MODIFY `id_archivo` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id_plan` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
