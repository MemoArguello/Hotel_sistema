-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2023 a las 02:14:22
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Recepcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `piso` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `piso`) VALUES
(28, 'matrimonial DOBLE', 'primero'),
(37, 'individual', 'segundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

CREATE TABLE `eventoscalendar` (
  `id` int(11) NOT NULL,
  `evento` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventoscalendar`
--

INSERT INTO `eventoscalendar` (`id`, `evento`, `color_evento`, `fecha_inicio`, `fecha_fin`) VALUES
(51, 'Mi Primera Prueba', 'teal', '2021-07-07', '2021-07-08'),
(52, 'Mi Segunda Prueba', 'amber', '2021-07-17', '2021-07-18'),
(53, 'Mi Tercera Prueba', 'orange', '2021-07-03', '2021-07-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_habitaciones` int(11) NOT NULL,
  `nombre_habitacion` varchar(250) NOT NULL,
  `detalles` varchar(250) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `precio` int(250) NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_habitaciones`, `nombre_habitacion`, `detalles`, `id_categoria`, `precio`, `estado`) VALUES
(35, 'A03', 'aire', 28, 100000, ' ocupado'),
(37, 'A04', 'aire', 28, 50000, ' ocupado'),
(45, 'Individual01', 'cama individual, tv, aire', 28, 50000, ' ocupado'),
(46, 'ewrew', 'TV, AIRE, Agua', 28, 100000, ' ocupado'),
(53, 'ASDAD', 'TV, cama doble, aire acondicionado', 37, 30000, ' ocupado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(250) NOT NULL,
  `nombre_producto` varchar(250) NOT NULL,
  `stock_inicial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo`, `nombre_producto`, `stock_inicial`) VALUES
(23, '1234567', 'pan', ' 11'),
(29, '12232', 'Coca Cola', ' 20'),
(30, '1234567', 'Agua', ' 10'),
(31, '21312', 'Toallas', ' 20'),
(32, '888', 'Pepsi', ' 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion`
--

CREATE TABLE `recepcion` (
  `id_recepcion` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recepcion`
--

INSERT INTO `recepcion` (`id_recepcion`, `id_reserva`, `id_habitacion`, `fecha_inicio`, `fecha_fin`) VALUES
(136, 97, 35, '2023-01-25', '2023-01-29'),
(144, 98, 35, '2023-01-18', '2023-01-21'),
(145, 73, 37, '2023-01-10', '2023-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `cedula` text NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `telefono` int(250) NOT NULL,
  `procedencia` text CHARACTER SET utf8 NOT NULL,
  `factura` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `cedula`, `nombre`, `telefono`, `procedencia`, `factura`) VALUES
(73, '12222222', 'Micaela Bustamante', 21319, 'Ayolas', '212'),
(86, '1234', 'Carlos Barbozaa', 12345678, 'Ayolas', '234234'),
(97, '1234567', 'Leo Messi', 123123, 'Rosario', '23123'),
(98, '1234567', 'Richar Balbuena', 234324, 'fsfds', '34234'),
(99, '1234567', 'werwer', 34, 'werwer', '3244'),
(100, '1444', 'dsfsdf', 32443, 'sdfsdf', '3434324');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `codigo` varchar(250) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `correo`, `usuario`, `codigo`, `id_cargo`) VALUES
(1, 'elmemozac6@gmail.com', 'Guillermo', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'lourdes12@gmail.com', 'lourdes', 'b59c67bf196a4758191e42f76670ceba', 1),
(14, 'ronaldo7@gmail.com', 'ronaldo', '81dc9bdb52d04dc20036dbd8313ed055', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `precio` varchar(100) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `total_pagar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_producto`, `id_cliente`, `precio`, `cantidad`, `total_pagar`) VALUES
(9, 23, 86, '1000', '2', '2000'),
(10, 29, 86, '10000', '2', '20000'),
(15, 29, 98, '10000', '2', '20000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_habitaciones`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  ADD PRIMARY KEY (`id_recepcion`),
  ADD KEY `id_reserva` (`id_reserva`,`id_habitacion`),
  ADD KEY `recepcion_habitacion` (`id_habitacion`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_producto` (`id_producto`,`id_cliente`),
  ADD KEY `cliente_venta` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_habitaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  MODIFY `id_recepcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recepcion`
--
ALTER TABLE `recepcion`
  ADD CONSTRAINT `recepcion_habitacion` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id_habitaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `recepcion_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `cliente_venta` FOREIGN KEY (`id_cliente`) REFERENCES `reserva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `producto_venta` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);
COMMIT;
