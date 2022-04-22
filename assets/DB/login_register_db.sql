-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2022 a las 23:54:32
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_register_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(45, 9, 'Panadol', 15, 1, 'panadol.png'),
(46, 9, 'Paracetamol', 12, 2, 'paracetamol.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 9, 'Germán', 'g@gmaill.com', 910139937, 'Este es un mensaje'),
(2, 11, 'User01', 'user01@gmail.com', 2147483647, 'Reclamo1'),
(3, 9, 'user', 'user@gmail.com', 910139973, 'Reclamo '),
(4, 11, 'User01', 'user01@gmail.com', 912341234, 'Reclamo4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `method` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` int(20) NOT NULL,
  `placed_on` varchar(30) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(7, 9, 'user1', 1231234, 'user1@gmail.com', 'Cash', 'Lot.12-lugarX-distritoX-Lima-Perú,15', ', Panadol (1), Nine (1), Amoxicilina (1), Alcohol (1)', 76, '18-Apr-2022', 'completado'),
(10, 11, 'User01', 2147483647, 'user01@gmail.com', 'Paypal', 'Lot.11-Calle01-Dis01-Ciudad01-Perú,15', ', Panadol (2), Paracetamol (1), Ibuprofeno (1)', 52, '22-Apr-2022', 'pendiente'),
(11, 12, 'User02', 2147483647, 'user02@gmail.com', 'Paypal', 'Lot.12-Calle02-DIs02-Ciudad02-Perú,15', ', Panadol (2), Paracetamol (1), Ibuprofeno (1)', 52, '22-Apr-2022', 'pendiente'),
(12, 9, 'user', 910139973, 'user@gmail.com', 'Credit Card', 'Lot.11-Street-Dist-City-Perú,15', ', Panadol (1), Paracetamol (1), Alcohol (1)', 42, '22-Apr-2022', 'completado'),
(13, 12, 'user', 912312341, 'user@gmail.com', 'Cash', 'Lot.11-CalleX-DistrX-CiudadX-Perú,20', ', Amoxicilina (1)', 24, '22-Apr-2022', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `name`, `details`, `price`, `image`) VALUES
(72, 'Panadol', '1 tableta', 15, 'panadol.png'),
(73, 'Amoxicilina', '1 caja', 24, 'amox.png'),
(74, 'Alcohol', '1 botella', 15, 'alcohol.png'),
(77, 'Pañal Ninet', 'Tableta', 40, 'ninet.png'),
(78, 'Paracetamol', '1 jarabe', 12, 'paracetamol.png'),
(79, 'Ibuprofeno', '1 jarabe', 10, 'ibuprofeno.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(8) NOT NULL,
  `full_name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `user_type` varchar(40) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `full_name`, `email`, `user`, `pass`, `user_type`) VALUES
(6, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(9, 'user', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(11, 'user01', 'user01@gmail.com', 'user01', 'b75705d7e35e7014521a46b532236ec3', 'user'),
(12, 'user02', 'user02@gmail.com', 'user02', '8bd108c8a01a892d129c52484ef97a0d', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
