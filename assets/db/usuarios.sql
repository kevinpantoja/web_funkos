-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3310
-- Tiempo de generación: 08-08-2022 a las 01:30:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desarollo_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL DEFAULT 'cliente',
  `nombre` varchar(50) NOT NULL,
  `aPaterno` varchar(50) NOT NULL,
  `aMaterno` varchar(50) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `estado`, `rol`, `nombre`, `aPaterno`, `aMaterno`, `genero`, `email`, `telefono`, `direccion`) VALUES
('chris123', '6b34fe24ac2ff8103f6fce1f0da2ef57', 1, 'cliente', 'Christopher', 'Ramos', 'Cosinga', 'femenino', 'chriss@gmail.com', '923165123', 'avenida peru lote 52'),
('christopher', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'cliente', 'Christopher', 'Ramos', 'Cosinga', 'femenino', 'chris@gmail.com', '926631261', 'las lomas'),
('chris_ramos', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'cliente', 'Christopher', 'Ramos', 'Cosinga', 'masculino', 'christopher@gmail.com', ' 92663126', ' avenida peru lote 52'),
('diego', '078c007bd92ddec308ae2f5115c1775d', 1, 'cliente', 'Diego', 'Tinoco', 'Galarza', 'femenino', 'diego@gmail.comm', '923135121', 'las lomas'),
('estefano', 'f20267a36bd8399c676061f2296d90ef', 1, 'cliente', 'Estefano', 'Carbajal', 'Munoz', 'masculino', 'estefano@gmail.com', '912312323', 'chosica lote 100'),
('juan', 'a94652aa97c7211ba8954dd15a3cf838', 1, 'cliente', 'Juan', 'Castillo', 'Bartolo', 'masculino', 'juan@gmail.com', '912569234', 'miraflores'),
('usuario1', '24c9e15e52afc47c225b757e7bee1f9d', 1, 'cliente', '', '', '', '', 'usuario1@gmail.com', '', ''),
('usuario2', '7e58d63b60197ceb55a1c487989a3720', 1, 'administrador', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
