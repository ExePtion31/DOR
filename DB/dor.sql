-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2021 at 11:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dor`
--

-- --------------------------------------------------------

--
-- Table structure for table `animales`
--

CREATE TABLE `animales` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animales`
--

INSERT INTO `animales` (`id`, `nombre`, `img`) VALUES
(5, 'Gatos', '../img/animales/cat.png'),
(6, 'Perros', '../img/animales/dog.png');

--
-- Triggers `animales`
--
DELIMITER $$
CREATE TRIGGER `Actualizacion_Animales` AFTER UPDATE ON `animales` FOR EACH ROW BEGIN
INSERT INTO
historial_animales(id, nombre, img, fecha, Estado) VALUES (new.id, new.nombre, new.img, NOW(), 'Actualizado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Eliminar_Animales` AFTER DELETE ON `animales` FOR EACH ROW BEGIN
INSERT INTO
historial_animales(id, nombre, img, fecha, Estado) VALUES (old.id, old.nombre, old.img, NOW(), 'Eliminado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Nuevos_Animales` AFTER INSERT ON `animales` FOR EACH ROW BEGIN
INSERT INTO
historial_animales(id, nombre, img, fecha, Estado) VALUES (new.id, new.nombre, new.img, NOW(), 'Creado');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(2) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `img` varchar(130) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `img`) VALUES
(11, 'Collares', '../img/categorias/collares.jpg'),
(12, 'Camas', '../img/categorias/camas.jpg');

--
-- Triggers `categorias`
--
DELIMITER $$
CREATE TRIGGER `Actualizacion_Categorias` AFTER UPDATE ON `categorias` FOR EACH ROW BEGIN
INSERT INTO
historial_categorias(id, nombre, img, fecha, Estado) VALUES (new.id, new.nombre, new.img, NOW(), 'Actualizado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Eliminar_categoria` AFTER DELETE ON `categorias` FOR EACH ROW BEGIN
INSERT INTO
historial_categorias(id, nombre, img, fecha, Estado) VALUES (old.id, old.nombre, old.img, NOW(), 'Eliminado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Nuevas_Categorias` AFTER INSERT ON `categorias` FOR EACH ROW BEGIN
INSERT INTO
historial_categorias(id, nombre, img, fecha, Estado) VALUES (new.id, new.nombre, new.img, NOW(), 'Creado');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `historial_animales`
--

CREATE TABLE `historial_animales` (
  `id_registro` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `img` varchar(130) NOT NULL,
  `fecha` date NOT NULL,
  `Estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historial_animales`
--

INSERT INTO `historial_animales` (`id_registro`, `id`, `nombre`, `img`, `fecha`, `Estado`) VALUES
(1, 3, 'Perros', '../img/categorias/perro.jpg', '2021-02-05', 'Eliminado'),
(2, 4, 'Gatos', '../img/animales/gato-m.jpg', '2021-02-05', 'Eliminado'),
(3, 5, 'Gatos', '../img/animales/cat.png', '2021-02-05', 'Creado'),
(4, 6, 'Perros', '../img/animales/dog.png', '2021-02-05', 'Creado');

-- --------------------------------------------------------

--
-- Table structure for table `historial_categorias`
--

CREATE TABLE `historial_categorias` (
  `id_registro` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `img` varchar(130) NOT NULL,
  `fecha` date NOT NULL,
  `Estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historial_categorias`
--

INSERT INTO `historial_categorias` (`id_registro`, `id`, `nombre`, `img`, `fecha`, `Estado`) VALUES
(1, 12, 'Camas2', '../img/categorias/camas.jpg', '2021-02-01', 'Actualizado'),
(2, 12, 'Camas', '../img/categorias/camas.jpg', '2021-02-01', 'Actualizado');

-- --------------------------------------------------------

--
-- Table structure for table `historial_productos`
--

CREATE TABLE `historial_productos` (
  `id_registro` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `animal` varchar(15) NOT NULL,
  `descripcion` varchar(700) NOT NULL,
  `valor` int(7) NOT NULL,
  `fecha` date NOT NULL,
  `Estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historial_productos`
--

INSERT INTO `historial_productos` (`id_registro`, `id`, `nombre`, `categoria`, `img`, `animal`, `descripcion`, `valor`, `fecha`, `Estado`) VALUES
(1, 3, 'Cama para perro', 'Camas', '../img/productos/71X6wpupVKL._AC_SX522_.jpg', 'Perros', 'Cama para perro', 45200, '2021-02-05', 'Eliminado'),
(2, 4, 'Cama para perro', 'Camas', '../img/productos/71X6wpupVKL._AC_SX522_.jpg', 'Perros', 'xcvqwevqw', 120000, '2021-02-05', 'Creado');

-- --------------------------------------------------------

--
-- Table structure for table `historial_usuarios`
--

CREATE TABLE `historial_usuarios` (
  `idUsuario` int(10) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `correoUsuario` varchar(50) NOT NULL,
  `telefonoUsuario` bigint(10) NOT NULL,
  `rolUsuario` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `id_registro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historial_usuarios`
--

INSERT INTO `historial_usuarios` (`idUsuario`, `nombreUsuario`, `correoUsuario`, `telefonoUsuario`, `rolUsuario`, `fecha`, `Estado`, `id_registro`) VALUES
(8, 'Luis Alberto Vasquez ', 'luis.vasquez@uniagustiniana.edu.co', 3115132734, '2', '2021-02-15', 'Actualizado', 1),
(8, 'Luis Alberto Vasquez ', 'luis.vasquez@uniagustiniana.edu.co', 3115132734, '2', '2021-02-15', 'Actualizado', 2),
(8, 'Luis Alberto Vasquez ', 'luis.vasquez@uniagustiniana.edu.co', 3102202183, '2', '2021-02-15', 'Actualizado', 3),
(8, 'Giovanni Baquero Vargas', 'luis.vasquez@uniagustiniana.edu.co', 3102202183, '2', '2021-02-15', 'Actualizado', 4),
(8, 'Luis Alberto Vasquez ', 'luis.vasquez@uniagustiniana.edu.co', 3102202183, '2', '2021-02-15', 'Actualizado', 5),
(8, 'Luis Alberto Vasquez ', 'luis.vasquez@uniagustiniana.edu.co', 3115132734, '2', '2021-02-15', 'Actualizado', 6);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `img` varchar(130) NOT NULL,
  `animal` varchar(20) NOT NULL,
  `descripcion` varchar(700) NOT NULL,
  `valor` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `img`, `animal`, `descripcion`, `valor`) VALUES
(1, 'Collar negro | Placa Perro', 'Collares', '../img/productos/image3.jpg', 'Perros', 'Collar para perro', 120000),
(2, 'Collar negro | Placa Gato', 'Collares', '../img/productos/image4.jpg', 'Gatos', 'Colla de gato ', 55000),
(4, 'Cama para perro', 'Camas', '../img/productos/71X6wpupVKL._AC_SX522_.jpg', 'Perros', 'xcvqwevqw', 120000);

--
-- Triggers `productos`
--
DELIMITER $$
CREATE TRIGGER `Actualizacion_Productos` AFTER UPDATE ON `productos` FOR EACH ROW BEGIN
INSERT INTO
historial_productos(id, nombre, categoria, img, animal, descripcion, valor, fecha, Estado) VALUES (new.id, new.nombre, new.categoria, new.img, new.animal, new.descripcion, new.valor, NOW(), 'Actualizado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Eliminar_Productos` AFTER DELETE ON `productos` FOR EACH ROW BEGIN
INSERT INTO
historial_productos(id, nombre, categoria, img, animal, descripcion, valor, fecha, Estado) VALUES (old.id, old.nombre, old.categoria, old.img, old.animal, old.descripcion, old.valor, NOW(), 'Eliminado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Nuevos_Productos` AFTER INSERT ON `productos` FOR EACH ROW BEGIN
INSERT INTO
historial_productos(id, nombre, categoria, img, animal, descripcion, valor, fecha, Estado) VALUES (new.id, new.nombre, new.categoria, new.img, new.animal, new.descripcion, new.valor, NOW(), 'Creado');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRol` int(1) NOT NULL,
  `nombreRol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRol`, `nombreRol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `correoUsuario` varchar(50) NOT NULL,
  `telefonoUsuario` bigint(10) NOT NULL,
  `passUsuario` varchar(60) NOT NULL,
  `rolUsuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `correoUsuario`, `telefonoUsuario`, `passUsuario`, `rolUsuario`) VALUES
(5, 'Giovanni Baquero', 'giovanni.baquero@uniagustiniana.edu.co', 3115132734, '$2y$12$RGPKxkYks/oMC/oxcZNRPe3NAU6lwGjaXy5xnVy2Cs9N5y6IitOhm', 1),
(8, 'Luis Alberto Vasquez ', 'luis.vasquez@uniagustiniana.edu.co', 3115132734, '$2y$12$67wTMv4mKMTPc2np.UX7eezioeBBa9sDY819yYTGV0wt/a6OIlKPq', 2);

--
-- Triggers `usuarios`
--
DELIMITER $$
CREATE TRIGGER `Actualizacion_Usuarios` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
INSERT INTO
historial_usuarios(idUsuario, nombreUsuario, correoUsuario, telefonoUsuario, rolUsuario, fecha, Estado) VALUES (new.idUsuario, new.nombreUsuario, new.correoUsuario, new.telefonoUsuario, new.rolUsuario, NOW(), 'Actualizado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Eliminar_usuario` BEFORE DELETE ON `usuarios` FOR EACH ROW BEGIN
INSERT INTO
historial_usuarios(idUsuario, nombreUsuario, correoUsuario, telefonoUsuario, rolUsuario, fecha, Estado) VALUES (old.idUsuario, old.nombreUsuario, old.correoUsuario, old.telefonoUsuario, old.rolUsuario, NOW(), 'Eliminado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Nuevos_Usuarios` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
INSERT INTO
historial_usuarios(idUsuario, nombreUsuario, correoUsuario, telefonoUsuario, rolUsuario, fecha, Estado) VALUES (new.idUsuario, new.nombreUsuario, new.correoUsuario, new.telefonoUsuario, new.rolUsuario, NOW(), 'Creado');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(200) NOT NULL,
  `id_usuario` int(200) NOT NULL,
  `productos` varchar(700) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `cp` varchar(11) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_usuario`, `productos`, `direccion`, `ciudad`, `cp`, `estado`, `fecha`) VALUES
(1, 8, 'a:1:{i:0;a:6:{s:2:\"id\";s:1:\"2\";s:6:\"Nombre\";s:25:\"Collar negro | Placa Gato\";s:5:\"Talla\";s:1:\"M\";s:8:\"Cantidad\";s:1:\"2\";s:6:\"Precio\";s:5:\"55000\";s:3:\"img\";s:27:\"../img/productos/image4.jpg\";}}', 'CLL 33#39-39', 'Bucaramanga', '73636262', 'En proceso', '2021-03-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historial_animales`
--
ALTER TABLE `historial_animales`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indexes for table `historial_categorias`
--
ALTER TABLE `historial_categorias`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indexes for table `historial_productos`
--
ALTER TABLE `historial_productos`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indexes for table `historial_usuarios`
--
ALTER TABLE `historial_usuarios`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `Rol` (`rolUsuario`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animales`
--
ALTER TABLE `animales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `historial_animales`
--
ALTER TABLE `historial_animales`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `historial_categorias`
--
ALTER TABLE `historial_categorias`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `historial_productos`
--
ALTER TABLE `historial_productos`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `historial_usuarios`
--
ALTER TABLE `historial_usuarios`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `Rol` FOREIGN KEY (`rolUsuario`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
