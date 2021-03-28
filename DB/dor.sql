-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 06:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `ciudades_envio`
--

CREATE TABLE `ciudades_envio` (
  `id_ciudad` int(3) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `envio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ciudades_envio`
--

INSERT INTO `ciudades_envio` (`id_ciudad`, `ciudad`, `envio`) VALUES
(1, 'Aguachica', 12000),
(2, 'Aguachica', 12000),
(3, 'Apartadó', 12000),
(4, 'Arauca', 12000),
(5, 'Armenia', 12000),
(6, 'Barrancabermeja', 12000),
(7, 'Barranquilla', 12000),
(8, 'Bello', 12000),
(9, 'Bogotá DC', 6000),
(10, 'Bucaramanga', 12000),
(11, 'Buga', 12000),
(12, 'Cali', 12000),
(13, 'Cartago', 12000),
(14, 'Cartagena', 12000),
(15, 'Caucasia', 12000),
(16, 'Coreté', 12000),
(17, 'Chia', 12000),
(18, 'Ciénaga', 12000),
(19, 'Cúcuta', 12000),
(20, 'Dosquebradas', 12000),
(21, 'Duitama', 12000),
(22, 'Envigado', 12000),
(23, 'Facatativá', 12000),
(24, 'Florencia', 12000),
(25, 'Floridablanca', 12000),
(26, 'Fusagasugá', 12000),
(27, 'Girardot', 12000),
(28, 'Girón', 12000),
(29, 'Ibagué', 12000),
(30, 'Ipales', 12000),
(31, 'Itaguí', 12000),
(32, 'Jamundí', 12000),
(33, 'Lorica', 12000),
(34, 'Los patios', 12000),
(35, 'Magangué', 12000),
(36, 'Maicao', 12000),
(37, 'Malambo', 12000),
(38, 'Manizales', 12000),
(39, 'Medellín', 12000),
(40, 'Melgar', 12000),
(41, 'Montería', 12000),
(42, 'Neiva', 12000),
(43, 'Ocaño', 12000),
(44, 'Paipa', 12000),
(45, 'Aguachica', 12000),
(46, 'Palmira', 12000),
(47, 'Pamplona', 12000),
(48, 'Pasto', 12000),
(49, 'Pereira', 12000),
(50, 'Piedecuesta', 12000),
(51, 'Pitalito', 12000),
(52, 'Popayán', 12000),
(53, 'Quibdó', 12000),
(54, 'Riohacha', 12000),
(55, 'Rionegro', 12000),
(56, 'Sabanalarga', 12000),
(57, 'Sahandú', 12000),
(58, 'San Andrés', 12000),
(59, 'Santa Marta', 12000),
(60, 'Sincelejo', 12000),
(61, 'Soacha', 6000),
(62, 'Sogamoso', 12000),
(63, 'Soledad', 12000),
(64, 'Tibú', 12000),
(65, 'Tuluá', 12000),
(66, 'Tumaco', 12000),
(67, 'Tunja', 12000),
(68, 'Turbo', 12000),
(69, 'Valledupar', 12000),
(70, 'Villa de Leyva', 12000),
(71, 'Villa del Rosario', 12000),
(72, 'Villavicencio', 12000),
(73, 'Yopal', 12000),
(74, 'Yumbo', 12000),
(75, 'Zipaquirá', 12000);

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
(2, 4, 'Cama para perro', 'Camas', '../img/productos/71X6wpupVKL._AC_SX522_.jpg', 'Perros', 'xcvqwevqw', 120000, '2021-02-05', 'Creado'),
(3, 5, 'Collar morado | Plac', 'Collares', '../img/productos/image5.jpeg', 'Perros', 'Collar morado para perro', 45000, '2021-03-14', 'Creado'),
(4, 5, 'Collar morado | Plac', 'Perros', '../img/productos/image5.png', 'Perros', 'Collar morado para perro', 45000, '2021-03-14', 'Actualizado'),
(5, 5, 'Collar morado | Plac', 'Perros', '../img/productos/image5.png', 'Perros', 'Collar morado para perro', 45000, '2021-03-14', 'Actualizado'),
(6, 5, 'Collar morado | Plac', 'Perros', '../img/productos/image5.png', 'Perros', 'Collar morado para perro', 45000, '2021-03-14', 'Actualizado'),
(7, 5, 'Collar morado | Plac', 'Perros', '../img/productos/image5.png', 'Perros', 'Collar morado para perro', 45000, '2021-03-14', 'Eliminado'),
(8, 6, 'Collar morado | Plac', 'Collares', '../img/productos/image5.png', 'Perros', 'Collar morado para perros', 45000, '2021-03-14', 'Creado'),
(9, 6, 'Collar morado | Plac', 'Perros', '../img/productos/image5.png', 'Perros', 'Collar morado para perros', 45000, '2021-03-14', 'Actualizado'),
(10, 4, 'Collar para gato | P', 'Gatos', '../img/productos/imagen2.png', 'Perros', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(11, 4, 'Collar para gato | P', 'Perros', '../img/productos/imagen2.png', 'Perros', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(12, 4, 'Collar para gato | P', 'Gatos', '../img/productos/imagen2.png', 'Perros', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(13, 4, 'Collar para gato | P', 'Collares', '../img/productos/imagen2.png', 'Perros', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(14, 6, 'Collar morado | Plac', 'Collares', '../img/productos/image5.png', 'Perros', 'Collar morado para perros', 45000, '2021-03-14', 'Actualizado'),
(15, 4, 'Collar para gato | P', 'Gatos', '../img/productos/imagen2.png', 'Perros', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(16, 4, 'Collar para gato | P', 'Gatos', '../img/productos/imagen2.png', 'Gatos', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(17, 4, 'Collar para gato | P', 'Collares', '../img/productos/imagen2.png', 'Gatos', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(18, 4, 'Collar para gato | P', 'Gatos', '../img/productos/imagen2.png', 'Gatos', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(19, 4, 'Collar para gato | P', 'Gatos', '../img/productos/imagen2.png', 'Gatos', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(20, 4, 'Collar para gato | P', 'Gatos', '../img/productos/imagen2.png', 'Gatos', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(21, 4, 'Collar para gato | P', 'Perros', '../img/productos/imagen2.png', 'Gatos', 'Collar para gato ', 115000, '2021-03-14', 'Actualizado'),
(22, 4, 'Collar para gato | P', 'Perros', '../img/productos/imagen2.png', 'Gatos', 'Collar para gato ', 115000, '2021-03-14', 'Eliminado'),
(23, 7, 'Collar negro | Placa', 'Collares', '../img/productos/imagen2.png', 'Gatos', 'Collar para gto', 52500, '2021-03-14', 'Creado'),
(24, 7, 'Collar negro | Placa', 'Perros', '../img/productos/imagen2.png', 'Gatos', 'Collar para gto', 52500, '2021-03-14', 'Actualizado'),
(25, 7, 'Collar negro | Placa', 'Collares', '../img/productos/imagen2.png', 'Gatos', 'Collar para gto', 52500, '2021-03-14', 'Actualizado'),
(26, 1, 'Collar negro | Placa', 'Collares', '../img/productos/image3.png', 'Perros', 'Collar para perro', 120000, '2021-03-15', 'Actualizado'),
(27, 2, 'Collar negro | Placa', 'Collares', '../img/productos/imagen4.png', 'Gatos', 'Colla de gato ', 55000, '2021-03-15', 'Actualizado'),
(28, 2, 'Collar negro | Placa', 'Collares', '../img/productos/imagen4.png', 'Gatos', 'Colla de gato ', 55000, '2021-03-15', 'Actualizado'),
(29, 2, 'Collar negro | Placa', 'Collares', '../img/productos/imagen2.png', 'Gatos', 'Colla de gato ', 55000, '2021-03-15', 'Actualizado'),
(30, 2, 'Collar negro | Placa', 'Collares', '../img/productos/imagen4.png', 'Gatos', 'Colla de gato ', 55000, '2021-03-15', 'Actualizado'),
(31, 6, 'Collar morado | Plac', 'Collares', '../img/productos/image5.png', 'Perros', 'Collar morado para perros', 45000, '2021-03-15', 'Actualizado'),
(32, 6, 'Collar negro | Placa', 'Collares', '../img/productos/image5.png', 'Perros', 'Collar morado para perros', 45000, '2021-03-15', 'Actualizado'),
(33, 6, 'Collar morado | Plac', 'Collares', '../img/productos/image5.png', 'Perros', 'Collar morado para perros', 45000, '2021-03-15', 'Actualizado');

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
(8, 'Luis Alberto Vasquez ', 'luis.vasquez@uniagustiniana.edu.co', 3115132734, '2', '2021-02-15', 'Actualizado', 6),
(8, 'Sandra Gimena', 'luis.vasquez@uniagustiniana.edu.co', 3102202183, '2', '2021-03-12', 'Actualizado', 7),
(9, 'Andres Zepeda', 'magara42@hotmail.com', 752431968, '2', '2021-03-14', 'Creado', 8),
(8, 'Sandra ', 'luis.vasquez@uniagustiniana.edu.co', 3102202183, '2', '2021-03-17', 'Actualizado', 9),
(8, 'Luis Alberto Vasquez', 'luis.vasquez@uniagustiniana.edu.co', 3102202183, '2', '2021-03-17', 'Actualizado', 10);

-- --------------------------------------------------------

--
-- Table structure for table `historial_ventas`
--

CREATE TABLE `historial_ventas` (
  `id_registro` int(200) NOT NULL,
  `id_venta` int(200) NOT NULL,
  `id_usuario` int(200) NOT NULL,
  `productos` varchar(4000) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `cp` int(11) NOT NULL,
  `total` int(7) NOT NULL,
  `metodo` varchar(15) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `accion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Collar negro | Placa Perro', 'Collares', '../img/productos/image3.png', 'Perros', 'Collar para perro', 120000),
(2, 'Collar negro | Placa Gato', 'Collares', '../img/productos/imagen4.png', 'Gatos', 'Colla de gato ', 55000),
(6, 'Collar morado | Placa ', 'Collares', '../img/productos/image5.png', 'Perros', 'Collar morado para perros', 45000),
(7, 'Collar negro | Placa Gato', 'Collares', '../img/productos/imagen2.png', 'Gatos', 'Collar para gto', 52500);

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
(8, 'Luis Alberto Vasquez', 'luis.vasquez@uniagustiniana.edu.co', 3102202183, '$2y$12$67wTMv4mKMTPc2np.UX7eezioeBBa9sDY819yYTGV0wt/a6OIlKPq', 2),
(9, 'Andres Zepeda', 'magara42@hotmail.com', 752431968, '$2y$12$0rrklH1cP.AgQ/AIxzD6YO6r44PI.4dvNWTHPl7UdLzqYhci.Jec2', 2);

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
  `productos` varchar(4000) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `cp` varchar(11) NOT NULL,
  `total` int(7) NOT NULL,
  `metodo` varchar(15) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `ventas`
--
DELIMITER $$
CREATE TRIGGER `Actualizacion_Ventas` AFTER UPDATE ON `ventas` FOR EACH ROW BEGIN
INSERT INTO
historial_ventas(id_venta, id_usuario, productos, direccion, ciudad, cp, total, metodo ,estado, fecha, accion) VALUES (new.id_venta, new.id_usuario, new.productos, new.direccion, new.ciudad, new.cp, new.total,new.metodo ,new.estado, NOW(), 'Actualizado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Eliminar_Ventas` BEFORE DELETE ON `ventas` FOR EACH ROW BEGIN
INSERT INTO
historial_ventas(id_venta, id_usuario, productos, direccion, ciudad, cp, total, estado, metodo, fecha, accion) VALUES (old.id_venta, old.id_usuario, old.productos, old.direccion, old.ciudad, old.cp, old.total, old.metodo,old.estado, NOW(), 'Eliminado');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Nuevas_Ventas` AFTER INSERT ON `ventas` FOR EACH ROW BEGIN
INSERT INTO
historial_ventas(id_venta, id_usuario, productos, direccion, ciudad, cp, total, metodo ,estado, fecha, accion) VALUES (new.id_venta, new.id_usuario, new.productos, new.direccion, new.ciudad, new.cp, new.total, new.metodo ,new.estado, NOW(), 'Creado');
END
$$
DELIMITER ;

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
-- Indexes for table `ciudades_envio`
--
ALTER TABLE `ciudades_envio`
  ADD PRIMARY KEY (`id_ciudad`);

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
-- Indexes for table `historial_ventas`
--
ALTER TABLE `historial_ventas`
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
-- AUTO_INCREMENT for table `ciudades_envio`
--
ALTER TABLE `ciudades_envio`
  MODIFY `id_ciudad` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `historial_usuarios`
--
ALTER TABLE `historial_usuarios`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `historial_ventas`
--
ALTER TABLE `historial_ventas`
  MODIFY `id_registro` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(200) NOT NULL AUTO_INCREMENT;

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
