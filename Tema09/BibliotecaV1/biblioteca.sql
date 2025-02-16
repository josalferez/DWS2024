-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2025 a las 20:32:21
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
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escriben`
--

CREATE TABLE `escriben` (
  `idLibro` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `escriben`
--

INSERT INTO `escriben` (`idLibro`, `idPersona`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `numPaginas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `titulo`, `genero`, `pais`, `ano`, `numPaginas`) VALUES
(1, 'Cien años de soledad', 'Ficción', 'Colombia', '1967', 471),
(2, 'Harry Potter y la piedra filosofal', 'Fantasía', 'Reino Unido', '1997', 223),
(3, 'Fundación', 'Ciencia ficción', 'EE.UU.', '1951', 255),
(4, 'El Aleph', 'Ficción', 'Argentina', '1945', 320),
(5, 'Diez negritos', 'Misterio', 'Reino Unido', '1939', 256),
(6, 'El resplandor', 'Terror', 'EE.UU.', '1977', 447),
(7, 'Así habló Zaratustra', 'Filosofía', 'Alemania', '0000', 368),
(8, 'El viejo y el mar', 'Ficción', 'EE.UU.', '1952', 127),
(9, 'Al faro', 'Ficción', 'Reino Unido', '1927', 209),
(10, '1984', 'Distopía', 'Reino Unido', '1949', 328);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `nombre`, `apellido`) VALUES
(1, 'Gabriel', 'García Márquez'),
(2, 'J.K.', 'Rowling'),
(3, 'Isaac', 'Asimov'),
(4, 'Jorge', 'Luis Borges'),
(5, 'Agatha', 'Christie'),
(6, 'Stephen', 'King'),
(7, 'Friedrich', 'Nietzsche'),
(8, 'Ernest', 'Hemingway'),
(9, 'Virginia', 'Woolf'),
(10, 'George', 'Orwell');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `escriben`
--
ALTER TABLE `escriben`
  ADD PRIMARY KEY (`idLibro`,`idPersona`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `escriben`
--
ALTER TABLE `escriben`
  ADD CONSTRAINT `escriben_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`) ON DELETE CASCADE,
  ADD CONSTRAINT `escriben_ibfk_2` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idPersona`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
