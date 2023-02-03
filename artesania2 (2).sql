-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2022 a las 14:29:34
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `artesania2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `pk_id_catalogo` int(11) NOT NULL,
  `nombre_catalogo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`pk_id_catalogo`, `nombre_catalogo`) VALUES
(12, 'madera'),
(13, 'arcilla'),
(14, 'piedra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `pk_codigo_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `valor_compra` int(11) NOT NULL,
  `correo` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fk_comprador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`pk_codigo_compra`, `fecha_compra`, `valor_compra`, `correo`, `fk_comprador`) VALUES
(34, '2022-10-03', 0, 'mildret@gmail.com', 1234),
(35, '2022-10-03', 0, 'mildret@gmail.com', 1234),
(36, '2022-10-04', 638400, 'aguileraaraquea@gmail.com', 1234),
(37, '2022-10-04', 0, 'mildret@gmail.com', 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `pk_id_detalle` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `fk_pdto` int(11) NOT NULL,
  `fk_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`pk_id_detalle`, `cantidad`, `precio_unitario`, `total`, `fk_pdto`, `fk_compra`) VALUES
(51, 1, 45600, 45600, 41, 34),
(52, 1, 54300, 54300, 51, 34),
(53, 1, 12300, 12300, 48, 34),
(54, 1, 45000, 45000, 46, 34),
(55, 1, 36547, 36547, 42, 35),
(56, 1, 45000, 45000, 46, 35),
(57, 14, 45600, 638400, 41, 36),
(59, 1, 23000, 23000, 46, 37),
(61, 1, 23000, 23000, 46, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `pk_codigo_pdto` int(11) NOT NULL,
  `nombre_pdto` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `desc_pdto` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `valor_pdto` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` enum('disponible','separado','agotado','') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `catalogo` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `imagenes` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pk_codigo_pdto`, `nombre_pdto`, `desc_pdto`, `valor_pdto`, `stock`, `estado`, `catalogo`, `proveedor`, `imagenes`) VALUES
(41, 'producto de prueba ', 'artesanias ', 45600, 12, 'disponible', 12, 12345, '../img/20501447.jpg'),
(42, 'producto de prueba', ' producto de prueba ', 36547, 987, 'disponible', 12, 12345, '../img/20501447.jpg'),
(46, 'producto de prueba ', 'producto de prueba 34', 45000, 12, 'disponible', 12, 12345, '../img/20501447.jpg'),
(48, 'producto de prueba', 'usuario de prueba ', 12300, 1212, 'disponible', 14, 321, '../img/20501447.jpg'),
(49, 'producto de prueba', 'producto de prueba', 12000, 412, 'disponible', 13, 321, '../img/20501447.jpg'),
(51, 'producto de prueba', 'producto de prueba', 54300, 13, 'disponible', 14, 12345, '../img/20501447.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `pk_identificacion` int(11) NOT NULL,
  `nombre_user` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono_user` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo_usuario` enum('artesano','comprador','administrador','') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion_user` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password_u` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`pk_identificacion`, `nombre_user`, `telefono_user`, `correo`, `tipo_usuario`, `direccion_user`, `password_u`) VALUES
(123, 'James Santiago Ordoñez Quinayas', '3223562765', 'dbhd@gamil.com', 'administrador', 'san agustin', '123'),
(321, 'artesano de prueba', '45353', 'artesano@hotmail.com', 'artesano', 'san agustin', '321'),
(1234, 'Mildreth Lorena Papamija', '3223562765', 'mildret@gmail.com', 'comprador', 'Pitalito', '123'),
(12345, 'Alejandra Cardozo', '3157299947', 'dbhd@gamil.com', 'artesano', 'Acevedo', '123'),
(123456, 'Nicolas', '3333333335', 'sumama@gmail.com', 'comprador', 'aun no se jajajaaj', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`pk_id_catalogo`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`pk_codigo_compra`),
  ADD KEY `produce` (`fk_comprador`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`pk_id_detalle`),
  ADD KEY `genera` (`fk_pdto`),
  ADD KEY `realiza` (`fk_compra`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`pk_codigo_pdto`),
  ADD KEY `contiene` (`catalogo`),
  ADD KEY `provee` (`proveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`pk_identificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `pk_id_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `pk_codigo_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `pk_id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `pk_codigo_pdto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `produce` FOREIGN KEY (`fk_comprador`) REFERENCES `usuario` (`pk_identificacion`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `genera` FOREIGN KEY (`fk_pdto`) REFERENCES `producto` (`pk_codigo_pdto`),
  ADD CONSTRAINT `realiza` FOREIGN KEY (`fk_compra`) REFERENCES `compra` (`pk_codigo_compra`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `contiene` FOREIGN KEY (`catalogo`) REFERENCES `catalogo` (`pk_id_catalogo`),
  ADD CONSTRAINT `provee` FOREIGN KEY (`proveedor`) REFERENCES `usuario` (`pk_identificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
