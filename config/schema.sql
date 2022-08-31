-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2020 a las 04:42:54
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `micredito`
--

CREATE DATABASE IF NOT EXISTS micredito;
USE micredito;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `clientes` (
  `cli_id` int(10) NOT NULL,
  `cli_documento` varchar(30)  NOT NULL,
  `cli_nombre` varchar(50)  NOT NULL,
  `cli_apellido` varchar(50)  NOT NULL,
  `cli_telefono` varchar(20)  NOT NULL,
  `cli_direccion` varchar(200)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalles` (
  `det_id` int(100) NOT NULL,
  `det_cantidad` int(10) NOT NULL,
  `det_formato` varchar(20) NOT NULL,
  `det_tiempo` int(7) NOT NULL,
  `det_costo_tiempo` decimal(30,2) NOT NULL,
  `det_descripcion` varchar(150) NOT NULL,
  `cre_codigo` varchar(200) NOT NULL,
  `art_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `emp_id` int(2) NOT NULL,
  `emp_nombre` varchar(90) NOT NULL,
  `emp_email` varchar(70) NOT NULL,
  `emp_telefono` varchar(20) NOT NULL,
  `emp_direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `articulos` (
  `art_id` int(10) NOT NULL,
  `art_codigo` varchar(50) NOT NULL,
  `art_nombre` varchar(150) NOT NULL,
  `art_stock` int(10) NOT NULL,
  `art_estado` varchar(20) NOT NULL,
  `art_detalle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pagos` (
  `pag_id` int(20) NOT NULL,
  `pag_total` decimal(30,2) NOT NULL,
  `pag_fecha` date NOT NULL,
  `cre_codigo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `creditos` (
  `cre_id` int(50) NOT NULL,
  `cre_codigo` varchar(200) NOT NULL,
  `cre_fecha_inicio` date NOT NULL,
  `cre_hora_inicio` varchar(15) NOT NULL,
  `cre_fecha_final` date NOT NULL,
  `cre_hora_final` varchar(15) NOT NULL,
  `cre_cantidad` int(10) NOT NULL,
  `cre_total` decimal(30,2) NOT NULL,
  `cre_pagado` decimal(30,2) NOT NULL,
  `cre_estado` varchar(20) NOT NULL,
  `cre_observacion` varchar(535) NOT NULL,
  `usu_id` int(10) NOT NULL,
  `cli_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuarios` (
  `usu_id` int(10) NOT NULL,
  `usu_cedula` varchar(20) NOT NULL,
  `usu_nombre` varchar(50) NOT NULL,
  `usu_apellido` varchar(50) NOT NULL,
  `usu_telefono` varchar(20) NOT NULL,
  `usu_direccion` varchar(200) NOT NULL,
  `usu_email` varchar(150) NOT NULL,
  `usu_usuario` varchar(50) NOT NULL,
  `usu_clave` varchar(535) NOT NULL,
  `usu_estado` varchar(17) NOT NULL,
  `usu_privilegio` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`det_id`),
  ADD KEY `art_id` (`art_id`),
  ADD KEY `cre_codigo` (`cre_codigo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`art_id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`pag_id`),
  ADD KEY `cre_codigo` (`cre_codigo`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`cre_id`),
  ADD UNIQUE KEY `cre_codigo` (`cre_codigo`),
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `cli_id` (`cli_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `clientes`
  MODIFY `cli_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalles`
  MODIFY `det_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `emp_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `articulos`
  MODIFY `art_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pagos`
  MODIFY `pag_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `creditos`
  MODIFY `cre_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `det_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `articulos` (`art_id`),
  ADD CONSTRAINT `det_ibfk_2` FOREIGN KEY (`cre_codigo`) REFERENCES `creditos` (`cre_codigo`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pag_ibfk_1` FOREIGN KEY (`cre_codigo`) REFERENCES `creditos` (`cre_codigo`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `creditos`
  ADD CONSTRAINT `cre_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `clientes` (`cli_id`),
  ADD CONSTRAINT `cre_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`usu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
