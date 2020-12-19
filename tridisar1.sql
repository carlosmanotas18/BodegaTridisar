-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2020 a las 00:52:15
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tridisar1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `box`
--

CREATE TABLE `box` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `box`
--

INSERT INTO `box` (`id`, `created_at`) VALUES
(1, '2020-11-30 12:42:35'),
(2, '2020-11-30 14:43:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `image`, `name`, `description`, `created_at`) VALUES
(1, NULL, 'DULCES', '', '2020-11-30 12:32:23'),
(2, NULL, 'CHEETOS', '', '2020-11-30 12:32:29'),
(3, NULL, 'CHOCOLATES', '', '2020-11-30 12:32:42'),
(4, NULL, 'ASEO', '', '2020-12-02 14:59:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `short` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kind` int(11) NOT NULL,
  `val` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuration`
--

INSERT INTO `configuration` (`id`, `short`, `name`, `kind`, `val`) VALUES
(1, 'title', 'Titulo del Sistema', 2, 'Inventio Lite'),
(2, 'use_image_product', 'Utilizar Imagenes en los productos', 1, '0'),
(3, 'active_clients', 'Activar clientes', 1, '0'),
(4, 'active_providers', 'Activar proveedores', 1, '0'),
(5, 'active_categories', 'Activar categorias', 1, '0'),
(6, 'active_reports_word', 'Activar reportes en Word', 1, '0'),
(7, 'active_reports_excel', 'Activar reportes en Excel', 1, '0'),
(8, 'active_reports_pdf', 'Activar reportes en PDF', 1, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `q` float NOT NULL,
  `operation_type_id` int(11) NOT NULL,
  `sell_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operation`
--

INSERT INTO `operation` (`id`, `product_id`, `q`, `operation_type_id`, `sell_id`, `created_at`) VALUES
(4, 2, 25, 1, NULL, '2020-11-30 14:41:49'),
(5, 2, 12, 2, 3, '2020-11-30 14:43:00'),
(7, 3, 50, 1, NULL, '2020-12-02 15:00:51'),
(8, 1, 20, 1, 4, '2020-12-02 15:01:45'),
(9, 2, 40, 1, 5, '2020-12-02 15:03:25'),
(10, 1, 5, 2, 6, '2020-12-02 15:06:16'),
(11, 2, 6, 2, 6, '2020-12-02 15:06:16'),
(12, 2, 40, 2, 7, '2020-12-03 10:05:41'),
(13, 2, 5, 2, 8, '2020-12-03 10:07:56'),
(14, 2, 2, 2, 9, '2020-12-03 10:08:22'),
(15, 2, 39, 1, 10, '2020-12-03 10:09:12'),
(16, 1, 16, 2, 11, '2020-12-07 12:56:02'),
(17, 1, 3, 2, 12, '2020-12-08 10:55:05'),
(18, 1, 40, 1, 13, '2020-12-08 10:55:48'),
(19, 3, 15, 2, 14, '2020-12-12 13:35:31'),
(20, 2, 10, 2, 15, '2020-12-12 13:42:30'),
(21, 2, 9, 2, 16, '2020-12-12 14:01:03'),
(22, 1, 12, 2, 17, '2020-12-12 21:53:14'),
(23, 1, 10, 2, 18, '2020-12-13 17:37:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation_type`
--

CREATE TABLE `operation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operation_type`
--

INSERT INTO `operation_type` (`id`, `name`) VALUES
(1, 'entrada'),
(2, 'salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `kind` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`id`, `image`, `name`, `lastname`, `company`, `address1`, `address2`, `phone1`, `phone2`, `email1`, `email2`, `kind`, `created_at`) VALUES
(1, '', 'Luis alberto', 'Castro martinez', '', 'av 10 # 14-38 ', '', '3333333', '', 'c.manotas@gmail.com', '', 1, '2020-11-30 12:35:19'),
(2, '', 'Juan Andres', 'Perez Guerrero', '', 'av 19 calle 12 motilones', '', '222222222', '', 'user@gmai.com', '', 1, '2020-12-02 14:57:33'),
(3, '', 'Camilo Andres', 'Lopez Guerrero', '', 'calle 30 # 22-37 ceiba', '', '3156768879', '', 'usuario2@gmail.com', '', 1, '2020-12-02 14:58:18'),
(4, '', 'Julian esteban', 'Molina Moreno', '', 'calle 16 #0-77 motilones', '', '320930303', '', 'usuario3@gmail.com', '', 1, '2020-12-02 14:58:51'),
(5, '', 'LUIS FERNANDO', 'CASTRO MOLINA', '', 'amsmmsmsmsmsm', '', '12445556', '', 'proveedor1@gmail.com', '', 2, '2020-12-02 15:02:55'),
(6, '', 'Juan camilo', 'lopez castro', '', 'calle 14 # 23-67 b guaimaral', '', '3445544444', '', 'hhsss@jdld.com', '', 1, '2020-12-03 10:31:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `barcode` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `inventary_min` int(11) NOT NULL DEFAULT '10',
  `price_in` float NOT NULL,
  `price_out` float DEFAULT NULL,
  `unit` varchar(255) NOT NULL,
  `presentation` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `image`, `barcode`, `name`, `description`, `inventary_min`, `price_in`, `price_out`, `unit`, `presentation`, `user_id`, `category_id`, `created_at`, `is_active`) VALUES
(1, NULL, '', 'chocolatina jet', 'Chocolatinas jet de 50gr', 5, 5000, 7000, '500', 'empaque', 1, 3, '2020-11-30 12:34:03', 1),
(2, NULL, '', 'cheetos', '', 10, 15000, 25000, '1200', '', 1, 2, '2020-11-30 14:41:49', 1),
(3, NULL, '', 'Leche', '', 5, 20000, 25000, '1200', '500 ml', 1, 4, '2020-12-02 15:00:51', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `operation_type_id` int(11) DEFAULT '2',
  `box_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sell`
--

INSERT INTO `sell` (`id`, `person_id`, `user_id`, `operation_type_id`, `box_id`, `created_at`) VALUES
(3, 1, 1, 2, 2, '2020-11-30 14:43:00'),
(4, NULL, 1, 1, NULL, '2020-12-02 15:01:45'),
(5, 5, 1, 1, NULL, '2020-12-02 15:03:24'),
(6, 2, 3, 2, NULL, '2020-12-02 15:06:16'),
(7, 1, 1, 2, NULL, '2020-12-03 10:05:41'),
(8, 2, 3, 2, NULL, '2020-12-03 10:07:56'),
(9, 2, 3, 2, NULL, '2020-12-03 10:08:22'),
(10, 5, 1, 1, NULL, '2020-12-03 10:09:12'),
(11, 6, 1, 2, NULL, '2020-12-07 12:56:01'),
(12, 4, 1, 2, NULL, '2020-12-08 10:55:05'),
(13, 5, 1, 1, NULL, '2020-12-08 10:55:48'),
(14, 3, 1, 2, NULL, '2020-12-12 13:35:31'),
(15, 4, 1, 2, NULL, '2020-12-12 13:42:30'),
(16, 3, 3, 2, NULL, '2020-12-12 14:01:02'),
(17, 1, 1, 2, NULL, '2020-12-12 21:53:14'),
(18, 4, 1, 2, NULL, '2020-12-13 17:37:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `username`, `email`, `password`, `image`, `is_active`, `is_admin`, `created_at`) VALUES
(1, 'Administrador', '', NULL, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 1, '2020-11-30 12:27:32'),
(2, 'carlos arturo', 'manotas molina', 'cmanotas', 'carlos.breyckom19@hotmail.com', 'a3725a8227eba1e2e3b1ec771b87227470d3469d', NULL, 1, 0, '2020-11-30 12:31:24'),
(3, 'luis', 'perez', 'Lperez', 'vendedor1@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', NULL, 1, 0, '2020-12-02 15:05:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short` (`short`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `operation_type_id` (`operation_type_id`),
  ADD KEY `sell_id` (`sell_id`);

--
-- Indices de la tabla `operation_type`
--
ALTER TABLE `operation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `box_id` (`box_id`),
  ADD KEY `operation_type_id` (`operation_type_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `box`
--
ALTER TABLE `box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `operation_type`
--
ALTER TABLE `operation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`operation_type_id`) REFERENCES `operation_type` (`id`),
  ADD CONSTRAINT `operation_ibfk_3` FOREIGN KEY (`sell_id`) REFERENCES `sell` (`id`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`box_id`) REFERENCES `box` (`id`),
  ADD CONSTRAINT `sell_ibfk_2` FOREIGN KEY (`operation_type_id`) REFERENCES `operation_type` (`id`),
  ADD CONSTRAINT `sell_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `sell_ibfk_4` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
