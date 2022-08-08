-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 02:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desarrollo_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_prod` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_producto`, `id_user`, `nombre`, `precio_prod`, `cantidad`, `imagen`) VALUES
(8, 102, 'usuario1', 'WILL - STRANGER THINGS SEASON 4', 18, 3, 'funkoST02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(50) NOT NULL,
  `descCategoria` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria_producto`
--

INSERT INTO `categoria_producto` (`idCategoria`, `nombreCategoria`, `descCategoria`) VALUES
(1, 'Acción & Aventura', NULL),
(2, 'Anime', NULL),
(3, 'Cartoon Classics', NULL),
(4, 'DC Comics', NULL),
(5, 'Disney', NULL),
(6, 'Marvel', NULL),
(7, 'Deportes', NULL),
(8, 'Star Wars', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `estadopedido`
--

CREATE TABLE `estadopedido` (
  `idPedido` varchar(20) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orden_compra`
--

CREATE TABLE `orden_compra` (
  `idOrdenCompra` int(10) NOT NULL,
  `fechaDePedido` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `idCliente` varchar(20) DEFAULT NULL,
  `productos` varchar(500) DEFAULT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orden_compra`
--

INSERT INTO `orden_compra` (`idOrdenCompra`, `fechaDePedido`, `estado`, `idCliente`, `productos`, `monto`) VALUES
(1, '10/05/2022', 'entregado', 'christopher', '12', 0),
(2, '11/07/2022', 'entregado', 'juan', '13', 0),
(3, '02/07/2022', 'en proceso de entreg', 'christopher', '16', 0),
(4, '05/08/2022', 'en almacen', 'christopher', '17', 0),
(5, '05/08/2022', 'entregado', 'diego', '18', 0),
(7, '08/08/2022', 'en almacen', 'juan', '1', 18);

-- --------------------------------------------------------

--
-- Table structure for table `privilegios`
--

CREATE TABLE `privilegios` (
  `idPrivilegio` int(11) NOT NULL,
  `pathPrivilegio` varchar(100) NOT NULL,
  `labelPrivilegio` varchar(100) NOT NULL,
  `iconPrivilegio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privilegios`
--

INSERT INTO `privilegios` (`idPrivilegio`, `pathPrivilegio`, `labelPrivilegio`, `iconPrivilegio`) VALUES
(1, '../view/RegistrarUsuario.php', 'registrar usuario', 'reguser.png'),
(2, '../view/EmitirProforma.php', 'emitir proforma', 'proforma.png'),
(3, '../view/EditarUsuario.php', 'editar usuario', 'edituser.png'),
(4, '../view/productos.php', 'ver lista de productos', 'Info.png'),
(5, '../view/comprar.php', 'comprar productos', 'Info.png'),
(6, '../view/formMantenerInfoProveedor.php', 'mantener información de proveedor', 'edituser.png');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `precioProducto` float NOT NULL,
  `stockProducto` int(11) NOT NULL,
  `tipoProducto` int(11) DEFAULT NULL,
  `categoriaProducto` int(11) DEFAULT NULL,
  `serieProducto` int(11) DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `imgProducto` varchar(50) DEFAULT NULL,
  `descripcionProducto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `precioProducto`, `stockProducto`, `tipoProducto`, `categoriaProducto`, `serieProducto`, `idProveedor`, `imgProducto`, `descripcionProducto`) VALUES
(101, 'ELEVEN - STRANGER THINGS SEASON 4', 20, 25, 5, 1, NULL, 1, 'funkoST01.jpg', NULL),
(102, 'WILL - STRANGER THINGS SEASON 4', 18, 25, 2, 1, NULL, 1, 'funkoST02.jpg', NULL),
(10000, 'BELLA (GOLD) CON PIN - COLECCIÓN PRINCESAS', 15, 50, 2, 5, 109, 1, 'belle.png', 'Disney organiza la Celebración de las Princesas Definitivas para inspirarte y empoderarte a ti y a tus seres queridos con historias de valor y fuerza. Colecciona tus princesas Disney favoritas en forma de figuras Funko Pop! y completa tu colección Disney Ultimate Princess con el exclusivo Funko Pop! Belle con un vestido dorado y un pin de esmalte a juego.'),
(10001, 'DARTH VADER - STAR WARS: OBI-WAN KENOBI', 12, 50, 2, 5, 110, 1, 'darth_vader.png', 'Tras las Guerras Clon, la esperanza sobrevive oculta al Imperio. ¡Restablece el equilibrio en tu colección de Star Wars™ con la ayuda de Pop! Darth Vader de la serie Obi-Wan Kenobi. El bobblehead de vinilo mide aproximadamente 1,5 cm de alto.'),
(10003, 'SURFER BOY PIZZA TEE - STRANGER THINGS', 20, 30, 1, 1, 103, 1, 'ropa1.png', '¡Una entrega especial bien caliente está en orden! Súbete a la ola de la cuarta temporada de Stranger Things con esta camiseta Surfer Boy Pizza Funko Tee. En la parte delantera de esta cómoda camiseta de color margarita, encontrarás la versión Pop! del logotipo del Chico Surfista Pizza, que muestra a un surfista cogiendo una ola sobre una porción de pizza. Esta camiseta de manga corta y cuello redondo es perfecta para descubrir misterios sobrenaturales, o para llevarla a diario.'),
(10004, 'EVIL QUEEN ON THRONE - DISNEY VILLAINS', 30, 50, 5, 5, 101, 1, 'villains_evilQueenOnThrone.png', 'La reina Grimhilde ha escuchado la noticia de que Blancanieves es la más bella de tu colección Disney y sus celos la han llevado a formular un siniestro plan. ¡Añade la Reina Malvada Pop! La Reina Malvada en el Trono a tu colección Disney para completar tu set de Villanos. La figura de vinilo mide aproximadamente 5 pulgadas de alto'),
(10005, 'EAGLY - PEACEMAKER', 12, 50, 2, 4, 104, 1, 'eagly_peacemaker.png', '¡Toma a Pop! Eagly para ampliar tu colección de DC Peacemaker. ¡Pop! Eagly, con una bandera americana en su garra, es la fiel y querida mascota de Peacemaker. ¡Ten a este fiel compañero cerca para completar tu colección de DC Pop! TV Series. El muñeco de vinilo mide 7,5 cm de alto.');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `ruc` varchar(12) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`ruc`, `nombre`, `correo`, `telefono`) VALUES
('12345678901', 'empresaSAC', 'empresa1@gmail.com', 123456789),
('12345678902', 'nuevaEmpresaSAC', 'empresa2@gmail.com', 111222333),
('12345678903', 'empresadobleSAC', 'empresa3@gmail.com', 123456781);

-- --------------------------------------------------------

--
-- Table structure for table `serie_producto`
--

CREATE TABLE `serie_producto` (
  `idSerie` int(11) NOT NULL,
  `nombreSerie` varchar(50) NOT NULL,
  `descSerie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serie_producto`
--

INSERT INTO `serie_producto` (`idSerie`, `nombreSerie`, `descSerie`) VALUES
(100, 'Batman', ''),
(101, 'Villanos Disney', ''),
(103, 'Doctor Strange In The Multiverse Of Madness', ''),
(104, 'Five Nights At Freddy\'s', ''),
(105, 'Funko', ''),
(106, 'Harry Potter', ''),
(107, 'NBA', ''),
(108, 'Pokemon', ''),
(109, 'Colección Princesas', ''),
(110, 'Star Wars', '');

-- --------------------------------------------------------

--
-- Table structure for table `tarjeta`
--

CREATE TABLE `tarjeta` (
  `idTarjeta` bigint(20) NOT NULL,
  `clave` int(11) NOT NULL,
  `propietario` varchar(50) NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarjeta`
--

INSERT INTO `tarjeta` (`idTarjeta`, `clave`, `propietario`, `monto`) VALUES
(4557880561812912, 2022, 'Pepe Lucas', 5),
(123456789012, 123456, 'kevin pantoja pimentel', 57);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `idTipo` int(11) NOT NULL,
  `nombreTipo` varchar(50) NOT NULL,
  `descTipo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo_producto`
--

INSERT INTO `tipo_producto` (`idTipo`, `nombreTipo`, `descTipo`) VALUES
(1, 'Ropa', NULL),
(2, 'Pop!', NULL),
(3, 'Figuras de acción', NULL),
(4, 'Mochilas', NULL),
(5, 'Pop! Deluxe', NULL),
(6, 'Vinilo DORADO', NULL),
(7, 'Popsies', NULL),
(8, 'Pop! & Pin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarioprivilegios`
--

CREATE TABLE `usuarioprivilegios` (
  `idUp` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `idPrivilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarioprivilegios`
--

INSERT INTO `usuarioprivilegios` (`idUp`, `rol`, `idPrivilegio`) VALUES
(1, 'administrador', 1),
(5, 'administrador', 2),
(6, 'administrador', 3),
(9, 'administrador', 4),
(10, 'administrador', 5),
(11, 'cliente', 4),
(12, 'cliente', 5),
(13, 'administrador', 6);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `estado`, `rol`, `nombre`, `aPaterno`, `aMaterno`, `genero`, `email`, `telefono`, `direccion`) VALUES
('chris123', '6b34fe24ac2ff8103f6fce1f0da2ef57', 1, 'cliente', 'Christopher', 'Ramos', 'Cosinga', 'femenino', 'chriss@gmail.com', '923165123', 'avenida peru lote 52'),
('christopher', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'cliente', 'Christopher', 'Ramos', 'Cosinga', 'femenino', 'chris@gmail.com', '926631261', 'las lomas'),
('chris_ramos', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'cliente', 'Christopher', 'Ramos', 'Cosinga', 'masculino', 'christopher@gmail.com', ' 92663126', ' avenida peru lote 52'),
('diego', '078c007bd92ddec308ae2f5115c1775d', 1, 'cliente', 'Diego', 'Tinoco', 'Galarza', 'femenino', 'diego@gmail.comm', '923135121', 'las lomas'),
('estefano', 'f20267a36bd8399c676061f2296d90ef', 1, 'cliente', 'Estefano', 'Carbajal', 'Munoz', 'masculino', 'estefano@gmail.com', '912312323', 'chosica lote 100'),
('juan', 'a94652aa97c7211ba8954dd15a3cf838', 1, 'cliente', 'Juan', 'Castillo', 'Bartolo', 'masculino', 'juan@gmail.com', '912569234', 'miraflores'),
('usuario1', '24c9e15e52afc47c225b757e7bee1f9d', 1, 'cliente', '', '', '', '', 'usuario1@gmail.com', '', ''),
('usuario2', '7e58d63b60197ceb55a1c487989a3720', 1, 'administrador', '', '', '', '', '', '', ''),
('nuevo', 'e26c062fedf6b32834e4de93f9c8b644', 1, 'cliente', 'nuevo', 'nuevo', 'nuevo', 'masculino', 'nuevo@nuevo.com', '123456789', 'dsdsadsadsdasdsad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indexes for table `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indexes for table `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD PRIMARY KEY (`idOrdenCompra`);

--
-- Indexes for table `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`idPrivilegio`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `producto_tipo` (`tipoProducto`),
  ADD KEY `producto_categoria` (`categoriaProducto`),
  ADD KEY `producto_serie` (`serieProducto`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ruc`);

--
-- Indexes for table `serie_producto`
--
ALTER TABLE `serie_producto`
  ADD PRIMARY KEY (`idSerie`);

--
-- Indexes for table `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indexes for table `usuarioprivilegios`
--
ALTER TABLE `usuarioprivilegios`
  ADD PRIMARY KEY (`idUp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orden_compra`
--
ALTER TABLE `orden_compra`
  MODIFY `idOrdenCompra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `idPrivilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarioprivilegios`
--
ALTER TABLE `usuarioprivilegios`
  MODIFY `idUp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria` FOREIGN KEY (`categoriaProducto`) REFERENCES `categoria_producto` (`idCategoria`),
  ADD CONSTRAINT `producto_serie` FOREIGN KEY (`serieProducto`) REFERENCES `serie_producto` (`idSerie`),
  ADD CONSTRAINT `producto_tipo` FOREIGN KEY (`tipoProducto`) REFERENCES `tipo_producto` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
