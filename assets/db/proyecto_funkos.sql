-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2022 a las 22:35:40
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
-- Base de datos: `proyecto_funkos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `idPrivilegio` int(11) NOT NULL,
  `pathPrivilegio` varchar(100) NOT NULL,
  `labelPrivilegio` varchar(100) NOT NULL,
  `iconPrivilegio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`idPrivilegio`, `pathPrivilegio`, `labelPrivilegio`, `iconPrivilegio`) VALUES
(1, '../view/RegistrarUsuario.php', 'registrar usuario', 'reguser.png'),
(2, '../view/EmitirProforma.php', 'emitir proforma', 'proforma.png'),
(3, '../view/EditarUsuario.php', 'editar usuario', 'edituser.png'),
(4, '../view/productos.php', 'ver lista de productos', 'Info.png'),
(5, '../view/comprar.php', 'comprar productos', 'Info.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioprivilegios`
--

CREATE TABLE `usuarioprivilegios` (
  `idUp` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `idPrivilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarioprivilegios`
--

INSERT INTO `usuarioprivilegios` (`idUp`, `rol`, `idPrivilegio`) VALUES
(1, 'administrador', 1),
(5, 'administrador', 2),
(6, 'administrador', 3),
(9, 'administrador', 4),
(10, 'administrador', 5),
(11, 'cliente', 4),
(12, 'cliente', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `estado`, `rol`) VALUES
('usuario1', '24c9e15e52afc47c225b757e7bee1f9d', 1, 'cliente'),
('usuario2', '7e58d63b60197ceb55a1c487989a3720', 1, 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`idPrivilegio`);

--
-- Indices de la tabla `usuarioprivilegios`
--
ALTER TABLE `usuarioprivilegios`
  ADD PRIMARY KEY (`idUp`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `idPrivilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarioprivilegios`
--
ALTER TABLE `usuarioprivilegios`
  MODIFY `idUp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
