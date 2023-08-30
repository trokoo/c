-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2023 a las 22:08:40
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chivochop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `talla` varchar(250) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `id_producto`, `id_user`, `cantidad`, `talla`, `estado`) VALUES
(11, 24, 2, 1, 'L', 'carrito'),
(12, 9, 4, 2, 'L', 'carrito'),
(14, 4, 4, 1, 'XL', 'carrito'),
(22, 16, 2, 4, '', 'espera'),
(23, 16, 2, 7, '', 'espera'),
(27, 24, 5, 1, 'L', 'carrito'),
(30, 5, 6, 2, 'S', 'carrito'),
(40, 34, 7, 3, '', 'espera'),
(41, 3, 7, 1, 'M', 'carrito'),
(44, 4, 3, 1, 'XS', 'carrito'),
(45, 4, 3, 3, 'M', 'carrito'),
(51, 7, 2, 8, 'XL', 'espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `comentario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `correo`, `comentario`) VALUES
(1, 'Marcelo José Almendárez Ramírez', 'marcelo@gmail.com', 'Hola, he tenido una muy buena experiencia con su pagina la recomendare con mis amigos.'),
(2, 'Mayra', 'mayra@gmail.com', 'Me gusto mucho esta pagina web.'),
(3, 'Yenny', 'yenny@gmail.com', 'Me gusto la pagina, muy bonita'),
(4, 'Cotuza', 'cotuza@gmail.com', 'Me gusto la pagina, esta muy bonita'),
(5, '21321', '12312312@gmail.com', '123213131');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `img`, `tipo`) VALUES
(1, '503 hoodie', 15.00, 'Hoodie con temática de El Salvador 100% algodón ', '503hodie.png', 'hoodie'),
(3, 'I LOVE EL SALVADOR', 19.99, 'Solo para amantes de este pais llamado El Salvador', 'ilovehodiee.png', 'hoodie'),
(4, 'ChivoChop Hoodie ', 24.99, 'Hoodie original de nuestra marca ChivoChop, hecha con los materiales de mayor calidad en el mercado', 'chivochophodie.png', 'hoodie'),
(5, 'Chrome Hearts Sivar', 9.99, 'Camisa tipo callejera blanca con el escudo de El Salvador en el lado del frente', 'chromeback1.png', 'camisa'),
(6, 'Chrome Hearts SIVAR', 7.99, 'Gorra estilo sivar callejera comoda para el uso diario', 'chromecap.png', 'gorra'),
(7, 'El Salvador Map', 6.99, 'Para que no te pierdas ni se te olviden los 14 departamentos de este lindo pais', 'esashirt.png', 'camisa'),
(8, 'Hay Pupusas', 14.50, 'Hay pupusassssss, de que las va a querer?, Hoddie 100% algodon negro', 'haypupusashodie.png', 'hoodie'),
(9, 'Salvador del mundo', 10.99, 'Hoodie con El Salvador del mundo en el centro', 'salvadordelmundo.png', 'hoodie'),
(10, 'PUPUSA POWER', 10.99, 'El poder de las pupusas, hoodie azul 100% algodon ', 'pupusapowerhodie.png', 'hoodie'),
(11, 'I LOVE EL SALVADOR', 6.99, 'Solo para amantes de este pais llamado El Salvador, camisa color azul 100% algodon', 'ilovesv.png', 'camisa'),
(12, 'NAMBE CHELE', 6.99, 'NAMBE CHELE, camisa negra 100% algodon comodisima para el uso diario', 'nambechele.png', 'camisa'),
(13, 'SIVAR GOOD', 9.99, 'Camisa negra 90% algondon 10% poliester comoda para todo tipo de actividades', 'sivargoodshirt.png', 'camisa'),
(14, 'SIVAR IS THE SH*T', 8.99, 'Camisa negra, que esperas para que todos te envidien con este diseño unico de nuestra camisa extra comoda 100%', 'sivaristhedront3.png', 'camisa'),
(15, 'YoYo de madera', 3.00, 'Regresemos un par de años atras y recordemos como jugaban nuestros padres, abuelos, tios, etc con este espectacular YoYo de madera', 'WhatsApp Image 2023-07-15 at 5.12.05 PM.jpeg', 'otro'),
(16, 'YoYo Sivariano', 3.50, 'Recordemos como era la forma de divertirse de nuestros antepasados con este increible YoYo de madera', 'WhatsApp Image 2023-07-15 at 5.12.04 PM.jpeg', 'otro'),
(17, 'YoYo Shield', 2.75, 'Que mas que un simple YoYo para divertirnos y pasarla bien un rato', 'WhatsApp Image 2023-07-15 at 5.12.04 PM (1).jpeg', 'otro'),
(18, 'Summer Vibes', 12.99, 'Ya se siente el verano, y que mas que pasarlo con esta hermosa gorra SUMMER VIBES', 'sumercap2.png', 'gorra'),
(19, 'SUMMER CAP', 12.50, 'Ya se siente el verano, y que mas que pasarlo con esta hermosa gorra SUMMER CAP', 'summercap.png', 'gorra'),
(20, 'MADE IN', 8.99, 'Hecho adonde? Camisa MADE IN lista para que todos tus amigos te envidien al verte con esta hermosa camisa', 'madein.png', 'camisa'),
(21, 'menos trabajo MAS PUPUSAS', 8.50, 'Nada que un par de pupusitas no arreglen, camisa 100% algodon morada', 'menostrabajo.png', 'camisa'),
(22, 'Life Is Better', 8.50, 'Increible diseño de camisa LIFE IS BETTER WITH PUPUSAS, comodisima para el uso diario', 'lifeisbetter.png', 'camisa'),
(23, 'SUPREMA', 8.50, 'Nada mejor que ir a la playa y pasarla supremo con una suprema, camisa hecha en el Tunco 100% algodon', 'suprema.png', 'camisa'),
(24, 'SIVAR GOOD', 12.99, 'Sivar es bueno, pero se siente mejor con este increible hoodie negro que te da un estilo unico, 100% algodon', 'sivargoodhodie.png', 'hoodie'),
(25, 'Gorra Placa de El Salvador', 9.99, 'Gorra blanca con el escudo de El Salvador a solo $9.99, hecha en Los Planes', 'cap1.png', 'gorra'),
(26, 'El Salvador Hoodie', 9.99, 'Hoodie estilo sencillo pero comodisimo para el uso diario, calientito y 100% algodon', 'svhodie.png', 'hoodie'),
(27, 'SiVAr', 8.50, 'Que mejor que fusionar la qumica con tu propio pais, SiVAr lo hace. Camisa diseño unico con el nombre de El Salvador hecha con elementos de la tabla periodica ', 'tablaperiodica.png', 'camisa'),
(28, 'Chrome', 7.50, 'Camisa blanca 100% algodon con el escudo de El Salvador en la parte superior izquierda hecha en Olocuilta, a tan solo 8.50', 'chromefront.png', 'camisa'),
(29, 'SOY DE SIVAR', 8.50, 'De donde sos? Soy de sivar, camisa negra 100% algodon lista para el uso diario', 'soydesivar.png', 'camisa'),
(31, 'Billetera', 3.99, 'Billetera hecha en Santa Ana', 'WhatsApp Image 2023-08-24 at 9.37.39 AM (1).jpeg', 'otro'),
(32, 'Trompongo', 3.99, 'Trompo con los colores de nuestra bandera nacional hecho por los mejores artesanos de Los Planes de Renderos', 'trompongo.jpeg', 'otro'),
(33, 'YoYo multicolor', 1.99, 'YoYo de madera multicolor hecho en Olocuilta', 'YoYo Multicolor.jpeg', 'otro'),
(34, 'Capirucho Playero', 2.99, 'Capirucho Hecho en La Libertad playa El Tunco', 'Capirucho playero.jpeg', 'otro'),
(35, 'Capirucho Sivariano', 2.25, 'Capirucho con los colores representativos de El Salvador hecho por los mejores artesanos de la mejor \"CALIDAD\"', 'WhatsApp Image 2023-08-24 at 9.49.48 AM.jpeg', 'otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `email`, `pass`, `rol`) VALUES
(1, 'Marcelo', 'marcelo@gmail.com', '12345', 'admin'),
(2, 'Rodrigo', 'rodrigo@gmail.com', '123', 'user'),
(3, 'Rene', 'rene@gmail.com', '12345', 'user'),
(4, 'Mayra', 'mayra@gmail.com', '12345', 'user'),
(5, 'Henry', 'henry@gmail.com', '123', 'user'),
(7, 'Lola Mento', 'lola@gmail.com', '12345', 'user'),
(8, 'Cotuza', 'cotuza@gmail.com', '12345', 'user'),
(9, 'Lidia', 'lidia@gmail.com', '12345', 'user'),
(10, 'Paleta', 'paleta@gmail.com', '12345', 'user'),
(11, '13131', '```@gmail.com', '123123', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
