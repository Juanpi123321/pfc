-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2017 a las 01:52:22
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pcgamer_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_categoria` int(11) NOT NULL,
  `descripcion_categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_categoria`, `descripcion_categoria`) VALUES
(1, 'Desktop-Escritorio'),
(2, 'Notebook');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `Id_consulta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `comentarios` text NOT NULL,
  `respuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`Id_consulta`, `fecha`, `hora`, `nombre_completo`, `email`, `telefono`, `comentarios`, `respuesta`) VALUES
(1, '2017-06-08', '01:41:54', 'Juanpi Gallardo', 'juanpi@hotmail.com', '', 'Hola queria saber cuando tendrian stock de la \"Pc Bronze Ultra\" muchas gracias.', ''),
(2, '2017-06-08', '01:43:34', 'Damian', 'dami@hotmail.com', '3794-234467', 'holaa muy buena la pagina!!', 'Gracias Damian!!'),
(3, '2017-06-08', '01:45:23', 'Donald Trump', 'donald-trump@hotmail.com', '-', 'Your website is amazing, Congratulations!!', ''),
(4, '2017-06-08', '02:33:55', 'Marshmello', 'marshmellodj@gmail.com', '011221234', '.', ''),
(5, '2017-06-08', '14:57:55', 'Pedro Alfonzo', 'pedro@gmail.com', '', 'tienen en stock una notebook core i5 Intel. ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `Id_factura` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `forma_pago_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Id_factura`, `cliente_id`, `fecha`, `hora`, `forma_pago_id`) VALUES
(1, 3, '2017-06-06', '00:00:00', 3),
(2, 1, '2017-06-07', '00:01:44', 1),
(3, 1, '2017-06-07', '01:19:19', 3),
(4, 1, '2017-06-07', '01:19:36', 1),
(5, 2, '2017-06-08', '02:40:55', 5),
(6, 1, '2017-06-08', '15:13:13', 5),
(7, 3, '2017-06-17', '00:27:30', 1),
(8, 3, '2017-06-17', '00:28:58', 1),
(9, 8, '2017-06-18', '01:16:31', 5),
(10, 4, '2017-06-18', '03:47:11', 3),
(11, 5, '2017-06-18', '06:17:54', 1),
(12, 4, '2017-06-21', '02:33:24', 3),
(13, 10, '2017-06-21', '03:04:28', 1),
(14, 11, '2017-06-21', '04:35:09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle`
--

CREATE TABLE `factura_detalle` (
  `Id_factura_detalle` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura_detalle`
--

INSERT INTO `factura_detalle` (`Id_factura_detalle`, `factura_id`, `producto_id`, `cantidad`, `precio_unit`) VALUES
(1, 1, 2, 1, 7999.99),
(2, 1, 1, 10, 8999.99),
(3, 2, 2, 1, 7999.99),
(4, 3, 6, 5, 27999.99),
(5, 4, 3, 3, 9499.99),
(6, 5, 5, 1, 20499.99),
(7, 6, 4, 4, 9999.99),
(8, 6, 3, 1, 9499.99),
(9, 6, 5, 1, 20499.99),
(10, 7, 2, 1, 7999.99),
(11, 8, 2, 17, 7999.99),
(12, 9, 4, 6, 9999.99),
(13, 9, 3, 1, 9499.99),
(14, 10, 6, 1, 27999.99),
(15, 10, 5, 3, 20499.99),
(16, 11, 6, 1, 27999.99),
(17, 12, 12, 2, 19999.99),
(18, 12, 13, 1, 28999.99),
(19, 13, 3, 1, 9499.99),
(20, 14, 6, 1, 27999.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `Id_forma_pago` int(11) NOT NULL,
  `descripcion_formapago` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`Id_forma_pago`, `descripcion_formapago`) VALUES
(1, 'Efectivo'),
(2, 'Transferencia o Deposito Bancario'),
(3, 'Tarjeta de Credito'),
(4, 'Tarjeta de Debito'),
(5, 'MercadoPago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `Id_persona` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `dni` int(8) NOT NULL,
  `imagen` text NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`Id_persona`, `nombres`, `apellidos`, `email`, `direccion`, `dni`, `imagen`, `rol_id`) VALUES
(1, 'Juanpi', 'Gallardo', 'juanpigallardo007@hotmail.com', 'B° Molina Punta', 35061219, 'juanpi.jpg', 1),
(2, 'Andrea', 'Monzon', 'am@hotmail.com', 'B° Loma Alta', 42888666, 'andrea.jpg', 2),
(3, 'Damian', 'Gonzalez', 'dami@hotmail.com', 'B° Santa Maria calle falsa 123', 39444555, 'damian.jpg', 3),
(4, 'Donald', 'Trump', 'donald-trump@hotmail.com', 'Queens - New York (USA)', 16240123, 'donald-trump.jpg', 2),
(5, 'Julian', 'Velazquez', 'julian@hotmail.com', 'Avellaneda Bs. As.', 39123444, 'julian.jpg', 2),
(6, 'Harley', 'Quinn', 'harley@hotmail.com', 'Joker\'s House', 39000111, 'harley_quinn.jpg', 2),
(7, 'Marcelo', 'Gallardo', 'marcelo@hotmail.com', 'B° Nuñez Buenos Aires', 25333222, 'marcelo.jpg', 3),
(8, 'Pity', 'Martinez', 'pity@gmail.com', 'Guaymallén Mendonza', 39888555, 'pity.jpg', 2),
(9, 'Romina', 'Monzon', 'romi@gmail.com', 'B° 17 de Agosto', 42888777, 'romina.png', 2),
(10, 'fabian  horacio', 'gallardo', 'fabiangallardo2016@yahoo.com', 'mi csa', 36481621, 'fabian-gallardo.jpg', 2),
(11, 'Candelaria', 'Gallardo', 'candelaria@hotmail.com', 'B° Jardin', 46321123, 'candelaria.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `caracteristica` varchar(350) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `nombre`, `caracteristica`, `precio`, `stock`, `categoria_id`, `imagen`, `estado`) VALUES
(1, 'Pc Bronze Ultra', '• Intel Core i5 3.0GHz<br>\r\n• Seagate BarraCuda 3.5\" 1TB<br>\r\n• MSI GTX 1060 GAMING GDDR5 <br>\r\n• G.Skill Aegis DDR4 2133 16GB<br>', 8999.99, 0, 1, 'pc-bronze-ultra.jpg', 1),
(2, 'Pc Bronze', '• Intel Core i3-6100 3.7GHz<br>\r\n• WD Blue 1TB SATA3<br>\r\n• Asus GeForce GTX 1060 OC Dual 3GB GDDR5<br>\r\n• G.Skill Aegis DDR4 2133 8GB<br>', 7999.99, 5, 1, 'pc-bronze.jpg', 1),
(3, 'Pc RaidMax Viper', '• AMD APU Series A10 7860k<br>\r\n• Gigabyte Chipset A68 - USB3.0<br>\r\n• ATI Radeon Rx 480 8GB DDR5<br>\r\n• HyperX 8GB DDR3 1866Mhz<br>\r\n• Atx Seasonic S12ii 520w<br>', 9499.99, 24, 1, 'gamer-raidmax-viper.jpg', 1),
(4, 'Pc RaidMax Cobra', '• AMD FX8320<br>\r\n• Motherboard ASUS M578L-M<br>\r\n• ASUS Radeon R9 Strix 4GB<br>\r\n• HyperX 8GB DDR3 1866Mhz<br>\r\n• Sentey Xcp630 630w<br>', 9999.99, 30, 1, 'gamer-raidmax-cobra-z-black-red.jpg', 1),
(5, 'Acer Aspire E 15', '• Procesador Intel Core I5-7200U<br>\r\n• Memoria RAM 8Gb DDR4 (Max 16Gb)<br>\r\n• Disco Rigido SSD de 128 Gb<br>\r\n• Nvidia GT940 2Gb<br>', 20499.99, 45, 2, 'Acer_Aspire_E_15.jpg', 1),
(6, 'Hp Gamer Omen', '• Procesador Intel Core i7 de 2,8 Ghz  Turbo Boost<br>\r\n• RAM integrada de 12 GB DDR4<br>\r\n• Disco Rigido SSD de 256 Gb<br>\r\n• GeForce GTX 1050 4 GB<br>', 27999.99, 12, 2, 'Gamer-Hp-Omen-15-ax205la.jpg', 1),
(8, 'Pc Bangho Gamer', '• Intel Core i5 3.0GHz<br>\r\n• Western Digital 1TB<br>\r\n• Nvidia GeForce GTX 950 2GB GDDR5<br>\r\n• HyperX  DDR4 2133 8GB<br>', 17999.99, 20, 1, 'Pc_Bangho_Gamer.jpg', 1),
(9, 'Pc Master Race', '• INTEL CORE I7 7700<br>\r\n• HD 1TB - SATA WD BLUE<br>\r\n• VGA ASUS DUAL GTX1050-2GB<br>\r\n• Memoria DDR4 8GB 2133 Mhz<br>', 13799.99, 10, 1, 'gabinete-sentey.png', 1),
(10, 'Pc NZXT Guardian', '• INTEL i3 7100 3.9GHZ<br>\r\n• 1TB SATA3 TOSHIBA<br>\r\n• NVIDIA GEFORCE GTX 1050 TI 4GB DDR5<br>\r\n• 4GB 2133 DDR4<br>', 9999.99, 25, 1, 'nzxt-guardian.png', 1),
(11, 'Pc Circuit Planet', '• AMD A10 7870k<br>\r\n• 1 TB Sata WD<br>\r\n• Placa de Video R7 250 Gigabyte 2GB<br>\r\n• DDR3 16GB - 1866MHZ<br>', 8999.99, 15, 1, 'circuit-planet.png', 1),
(12, 'Bangho-X', '• Intel Core I7-7500<br>\r\n• Ram 16GB DDR4<br>\r\n• 1TB Sata 3<br>\r\n• Pantalla 15,6\" LED Retroiluminado<br>', 19999.99, 23, 2, 'notebook-bangho.png', 1),
(13, 'Acer Vx15', '• Intel Core I7-7700<br>\r\n• RAM 16GB<br>\r\n• 1TB + 256GB SSD<br>\r\n• Tarjeta grafica GeForce GTX-1050<br>', 28999.99, 9, 2, 'Acer-Gamer-Vx15.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Id_rol` int(11) NOT NULL,
  `tipo_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Id_rol`, `tipo_rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(15) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `usuario`, `contrasena`, `persona_id`, `estado`) VALUES
(1, 'admin', 'YWRtaW4xMjM=', 1, 1),
(2, 'andrea', 'YW5kcmVhMTI=', 2, 1),
(3, 'damian', 'ZGFtaWFuMTI=', 3, 1),
(4, 'donald-trump', 'ZG9uYWxkMTI=', 4, 1),
(5, 'julian', 'anVsaWFuMTIz', 5, 1),
(6, 'harley', 'aGFybGV5MTI=', 6, 1),
(7, 'marcelo', 'bWFyY2VsbzE=', 7, 1),
(8, 'pity', 'cGl0eTEyMzQ=', 8, 1),
(9, 'romi', 'cm9taTEyMzQ=', 9, 1),
(10, 'fabiang', 'MTIzY2hpcnU=', 10, 1),
(11, 'Candelaria', 'Y2FuZGVsYXJpYQ=', 11, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`Id_consulta`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Id_factura`),
  ADD KEY `Id_cliente` (`cliente_id`),
  ADD KEY `forma_pago_id` (`forma_pago_id`);

--
-- Indices de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD PRIMARY KEY (`Id_factura_detalle`),
  ADD KEY `Id_prod` (`producto_id`),
  ADD KEY `factura_id` (`factura_id`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`Id_forma_pago`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`Id_persona`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `persona_id` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `Id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  MODIFY `Id_factura_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `Id_forma_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `Id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `personas` (`Id_persona`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pago` (`Id_forma_pago`);

--
-- Filtros para la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD CONSTRAINT `factura_detalle_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`Id_producto`),
  ADD CONSTRAINT `factura_detalle_ibfk_2` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`Id_factura`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`Id_rol`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`Id_categoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`Id_persona`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
