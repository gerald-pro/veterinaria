-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2024 a las 16:02:47
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
-- Base de datos: `dbveterinaria5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_usuario_v` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `inicio`, `fin`, `id_mascota`, `id_usuario_v`, `estado`) VALUES
(1, '2024-08-22 11:00:00', '2024-08-22 11:30:00', 6, 2, 1),
(2, '2024-08-22 14:00:00', '2024-08-22 14:30:00', 9, 6, 1),
(3, '2024-08-22 10:00:00', '2024-08-22 10:30:00', 10, 4, 1),
(4, '2024-08-22 13:00:00', '2024-08-22 13:30:00', 11, 4, 1),
(6, '2024-11-05 08:00:00', '2024-11-05 08:30:00', 5, 2, 1),
(10, '2024-11-05 18:00:00', '2024-11-05 18:30:00', 12, 8, 1),
(12, '2024-11-06 00:00:00', '2024-11-07 00:00:00', 13, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `celular` text NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `documento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `celular`, `direccion`, `documento`) VALUES
(1, 'Daniela', 'Alvarez', '65864741', 'Villa 1 de Mayo', '6034532 SC'),
(2, 'Roberto', 'Castro', '65864919', 'Calle Murillo', '6023467 SC'),
(3, 'Genesis', 'Padilla', '658475', 'Plan 300', '5674534 SC'),
(4, 'Gerardo', 'Duran', '65748124', 'Villa 1 de Mayo', '6854345 SC'),
(5, 'Sonia', 'Flores', '65864459', '8 Anillo', '4854545 SC'),
(6, 'Salomeo', 'Paredes', '76619614', 'Warnes', '8547858 SC'),
(7, 'Geral', 'Antezana', '6587415', 'El quior', '4832723 SC'),
(8, 'Maria', 'Estrada', '65864542', 'San Aurelio', '9654737 SC'),
(9, 'Guisela Andrea', 'Gonzales ', '65474587', '3 Pasos al Frente', '6834323 SC'),
(10, 'Nicol andrea', 'Justiniando Rivera', '65471257', 'Calle Sucre', '6043343 SC'),
(11, 'Andrea', 'Hsieh Justiniano', '65847123', 'Av Independencia', '3428345 SC'),
(12, 'Camila', 'Nuñez', '748574', 'La Guardia', '7845332 SC'),
(13, 'Emilia', 'Vargas', '65864542', 'Plan 3000', '6937483 SC'),
(14, 'Sonia', 'Cabrera', '75573241', 'Plan 3000', '6938748 SC'),
(15, 'Miguel', 'Aguilar', '72265776', 'Urb Guapuru', '6038234 SC'),
(16, 'David', 'Carrasco', '77656900', 'Urb el Quior', '6032834 SC'),
(17, 'Daira', 'Perez', '75776686', 'Villa 1 de Mayo', '5773623 SC'),
(18, 'Daniela', 'Ovando', '67865321', '3 Pasos al Frente', '6843734 SC'),
(19, 'Kevin', 'Banega', '69285182', 'Av Cumavil', '6038342 SC'),
(20, 'Ezequiel', 'Segovia', '69145405', 'Radial 10', '6784732 SC'),
(21, 'Paula', 'Velasquez', '75538341', 'Villa 1 de Mayo', '1288334 SC'),
(22, 'Alexandra', 'Fernandez', '71089943', 'Villa 1 de Mayo', '6954785 SC'),
(23, 'Raul', 'Gonzales', '65864727', '16 de Julio', '6784373 SC'),
(24, 'Sara', 'Antezana', '62732716', 'Villa 1 de Mayo', '6884732 SC'),
(25, 'Marcelo', 'Lopez', '61357919', 'Villa 1 de Mayo', '6847734 SC'),
(26, 'Jorge', 'Vargas', '77345791', 'Villa 1 de Mayo', ''),
(27, 'Ricardo', 'Martinez', '6586421', 'Virgen de Lujan', ''),
(29, 'CAMILO ', 'ESTRADA ANTEZANA', '65878915', 'CALLE LA PAZ', ''),
(30, 'CARMEN', 'AGILAR', '7895418', 'CALLE LA PAZ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `diagnostico` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `tratamiento` varchar(200) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_usuario_v` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pago_o_servicio`
--

CREATE TABLE `detalle_pago_o_servicio` (
  `cantidad` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_pago_servicio` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pago_o_servicio`
--

INSERT INTO `detalle_pago_o_servicio` (`cantidad`, `precio`, `id_pago_servicio`, `id_servicio`) VALUES
('1', 50.00, 1, 1),
('1', 50.00, 2, 1),
('1', 100.00, 3, 2),
('1', 100.00, 4, 2),
('1', 50.00, 5, 1),
('1', 100.00, 6, 2),
('1', 50.00, 7, 1),
('1', 450.00, 7, 4),
('1', 450.00, 8, 4),
('1', 100.00, 9, 5),
('1', 100.00, 10, 2),
('1', 50.00, 11, 1),
('1', 450.00, 12, 4),
('1', 50.00, 13, 1),
('1', 50.00, 14, 1),
('1', 100.00, 14, 2),
('1', 50.00, 14, 3),
('1', 50.00, 15, 7),
('1', 50.00, 16, 1),
('1', 50.00, 17, 1),
('1', 100.00, 17, 2),
('1', 50.00, 17, 3),
('1', 450.00, 17, 4),
('1', 100.00, 17, 5),
('1', 50.00, 17, 6),
('1', 40.00, 17, 10),
('1', 50.00, 17, 9),
('1', 50.00, 17, 7),
('1', 50.00, 18, 1),
('2', 50.00, 19, 1),
('1', 100.00, 20, 2),
('1', 50.00, 20, 7),
('1', 40.00, 20, 10),
('1', 50.00, 21, 3),
('1', 100.00, 21, 5),
('1', 50.00, 21, 7),
('1', 100.00, 22, 2),
('1', 50.00, 22, 6),
('2', 40.00, 22, 10),
('1', 50.00, 24, 3),
('2', 450.00, 24, 4),
('1', 100.00, 24, 5),
('3', 50.00, 24, 6),
('1', 50.00, 25, 15),
('1', 50.00, 26, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Medicina Interna', 'Diagnóstico y tratamiento de enfermedades que afectan los órganos internos como el corazón, riñones, hígado, y sistema digestivo.'),
(5, 'Oncología', 'Estudio y tratamiento del cáncer en animales, incluyendo la quimioterapia y otros métodos terapéuticos.'),
(7, 'Neurología', 'Manejo de trastornos del sistema nervioso, como epilepsia, problemas de la columna vertebral y enfermedades degenerativas.'),
(8, 'Odontología', 'Cuidado de la salud dental, incluyendo limpiezas, extracciones y tratamiento de enfermedades periodontales.'),
(9, 'Anestesiología', 'Administración de anestesia durante procedimientos quirúrgicos y manejo del dolor postoperatorio.'),
(10, 'Reproducción y Obstetricia', 'Enfoque en la salud reproductiva, incluyendo fertilización, seguimiento de gestación, y manejo de partos complicados.'),
(11, 'Urgencias y Cuidados Críticos', 'Atención a animales en situaciones de emergencia y manejo de casos críticos que requieren cuidados intensivos.'),
(12, 'Medicina Preventiva', 'Incluye la vacunación, desparasitación y programas de salud para prevenir enfermedades.'),
(13, 'Exóticos', 'Especialidad en el cuidado y tratamiento de animales no convencionales, como reptiles, aves, y pequeños mamíferos.'),
(14, 'Etología', 'Estudio del comportamiento animal, abordando problemas de conducta como la agresividad o la ansiedad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `entrada` time NOT NULL,
  `salida` time NOT NULL,
  `dia` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `raza` varchar(50) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `nombre`, `sexo`, `raza`, `especie`, `fechanacimiento`, `id_cliente`) VALUES
(3, 'Polar', 'Macho', 'Pitbull', 'Canino', '2018-06-15', 2),
(4, 'Toby', 'Macho', 'Doberman', 'Canino', '2021-01-08', 4),
(5, 'Minino', 'Macho', 'Mestizo', 'Felino', '2021-02-12', 5),
(6, 'Reina', 'Hembra', 'Mestizo', 'Canino', '2020-06-10', 3),
(9, 'Gaspar', 'Macho', 'Pitbull', 'Canino', '2023-06-16', 1),
(10, 'Max', 'Macho', 'Pitbull', 'Canino', '2022-02-14', 12),
(11, 'Loky', 'Macho', 'Cocker', 'Canino', '2021-11-20', 26),
(12, 'Bandida', 'Hembra', 'Pequines', 'Canino', '2009-07-12', 1),
(13, 'PELUSA', 'Hembra', 'MESTIZO', 'Gatuno', '2024-08-07', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_servicio`
--

CREATE TABLE `pago_servicio` (
  `idpagoservicio` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idcliente` int(11) NOT NULL,
  `metodo_pago` text NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `idcajera` int(11) NOT NULL,
  `idmedico` int(11) NOT NULL,
  `numeroPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago_servicio`
--

INSERT INTO `pago_servicio` (`idpagoservicio`, `fecha`, `idcliente`, `metodo_pago`, `total`, `idcajera`, `idmedico`, `numeroPago`) VALUES
(1, '2024-06-12 17:36:25', 1, 'Efectivo', 50.00, 1, 2, 1001),
(2, '2024-06-12 19:34:50', 2, 'Efectivo', 50.00, 1, 2, 1002),
(3, '2024-06-12 22:48:57', 3, 'Efectivo', 100.00, 1, 2, 1003),
(4, '2024-06-13 00:42:08', 4, 'Efectivo', 100.00, 1, 2, 1004),
(5, '2024-06-13 00:53:22', 2, 'Efectivo', 50.00, 1, 2, 1005),
(6, '2024-06-13 01:33:39', 5, 'Efectivo', 100.00, 1, 2, 1006),
(7, '2024-06-13 08:48:18', 6, 'Efectivo', 500.00, 1, 2, 1007),
(8, '2024-06-13 08:51:16', 3, 'Efectivo', 450.00, 1, 2, 1008),
(9, '2024-06-13 08:53:58', 7, 'Efectivo', 100.00, 1, 2, 1009),
(10, '2024-06-13 09:00:28', 1, 'Efectivo', 100.00, 1, 2, 1010),
(11, '2024-06-13 09:03:31', 8, 'Efectivo', 50.00, 1, 2, 1011),
(12, '2024-06-13 09:23:23', 9, 'Efectivo', 450.00, 1, 2, 1012),
(13, '2024-06-13 09:25:39', 10, 'Efectivo', 50.00, 1, 2, 1013),
(14, '2024-06-13 10:16:52', 11, 'Efectivo', 200.00, 1, 2, 1014),
(15, '2024-06-14 16:35:55', 12, 'Efectivo', 50.00, 1, 2, 1015),
(16, '2024-06-14 16:49:23', 11, 'Efectivo', 50.00, 3, 4, 1016),
(17, '2024-06-14 16:51:16', 1, 'Efectivo', 940.00, 5, 2, 1017),
(18, '2024-06-14 16:57:11', 26, 'Efectivo', 50.00, 3, 2, 1018),
(19, '2024-06-28 14:21:13', 27, 'Efectivo', 100.00, 1, 2, 1019),
(20, '2024-09-26 09:12:12', 21, 'Efectivo', 190.00, 3, 6, 1020),
(21, '2024-09-26 09:20:03', 7, 'Efectivo', 200.00, 3, 7, 1021),
(22, '2024-09-26 17:51:09', 5, 'Efectivo', 230.00, 3, 8, 1022),
(24, '2024-09-27 10:32:09', 8, 'Efectivo', 1200.00, 1, 4, 1023),
(25, '2024-11-05 18:45:39', 27, 'Efectivo', 50.00, 1, 2, 1024),
(26, '2024-11-05 19:12:59', 29, 'Efectivo', 50.00, 1, 2, 1025);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idservicio`, `nombre`, `precio`) VALUES
(1, 'consulta general', 50.00),
(2, 'limpieza dental', 100.00),
(3, 'DESPARACITACION', 50.00),
(4, 'FISOTERAPIA', 450.00),
(5, 'OFTAMOLOGIA', 100.00),
(6, 'VACUNA', 50.00),
(7, 'lavado de pelo', 50.00),
(9, 'ESTERILIZACION', 50.00),
(10, 'corte de garra', 40.00),
(15, 'gastroenteritis', 50.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vacuna`
--

CREATE TABLE `tipo_vacuna` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_vacuna`
--

INSERT INTO `tipo_vacuna` (`id`, `nombre`) VALUES
(1, 'Rinotraqueitis viral felina (herpesvirus)'),
(3, 'Moquillo canino distemper'),
(4, 'Hepatitis infecciosa canina'),
(5, 'Parvovirus canino'),
(6, 'Leptospirosis'),
(8, 'Parainfluenza'),
(9, 'Coronavirus Canino'),
(10, 'Rabia'),
(11, 'Bordetella bronchiseptica'),
(12, 'Panleucopenia Felina'),
(13, 'Chlamydophila Felis'),
(14, 'Virus de la Inmunodeficiencia Felina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_v`
--

CREATE TABLE `usuario_v` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL,
  `ultimo_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_v`
--

INSERT INTO `usuario_v` (`id`, `nombre`, `password`, `perfil`, `usuario`, `estado`, `ultimo_login`) VALUES
(1, 'Julieta Ramirez', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Secretaria', 'juli12', 1, '2024-11-06 13:44:41'),
(2, 'Omar perez', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Veterinario', 'omar', 1, '2024-06-13 06:02:13'),
(3, 'Carla Vargas', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Secretaria', 'carla11', 1, '2024-09-26 12:12:06'),
(4, 'Roberto Aguilar', '$2a$07$asxx54ahjppf45sd87a5auBoYjNMoP3m.rqYEoDZuWcXkvfARiYYC', 'Veterinario', 'roberto11', 1, '2024-07-15 00:24:40'),
(5, 'Administrador', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'admin', 1, '2024-11-05 11:43:22'),
(6, 'Vanesa Soledad', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Veterinario', 'vanesa', 1, '2024-08-22 11:26:36'),
(7, 'Maria Sonia Mendienta', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Veterinario', 'maria', 1, '2024-08-21 20:58:54'),
(8, 'Boris Savedra', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Veterinario', 'boris', 1, '2024-08-21 21:04:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunacion`
--

CREATE TABLE `vacunacion` (
  `id` int(11) NOT NULL,
  `fecha_vacunacion` datetime NOT NULL,
  `id_vacuna` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vacunacion`
--

INSERT INTO `vacunacion` (`id`, `fecha_vacunacion`, `id_vacuna`, `id_mascota`, `id_veterinario`) VALUES
(4, '2024-07-30 10:20:00', 1, 6, 2),
(5, '2024-10-14 16:57:35', 8, 9, 7),
(6, '2024-10-14 16:58:17', 10, 3, 8),
(7, '2024-11-05 19:12:34', 14, 13, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vmedicos`
--

CREATE TABLE `vmedicos` (
  `id_relacion` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `telefono` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vmedicos`
--

INSERT INTO `vmedicos` (`id_relacion`, `id`, `id_especialidad`, `telefono`, `email`, `color`) VALUES
(1, 2, 1, '69904534', 'omarperez@gmail.com', 'c11669');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_usuario_v` (`id_usuario_v`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_usuario_v` (`id_usuario_v`);

--
-- Indices de la tabla `detalle_pago_o_servicio`
--
ALTER TABLE `detalle_pago_o_servicio`
  ADD KEY `id_pago_servicio` (`id_pago_servicio`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `pago_servicio`
--
ALTER TABLE `pago_servicio`
  ADD PRIMARY KEY (`idpagoservicio`),
  ADD KEY `id_cliente` (`idcliente`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `tipo_vacuna`
--
ALTER TABLE `tipo_vacuna`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_v`
--
ALTER TABLE `usuario_v`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacunacion`
--
ALTER TABLE `vacunacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_veterinario` (`id_veterinario`),
  ADD KEY `id_vacuna` (`id_vacuna`);

--
-- Indices de la tabla `vmedicos`
--
ALTER TABLE `vmedicos`
  ADD PRIMARY KEY (`id_relacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pago_servicio`
--
ALTER TABLE `pago_servicio`
  MODIFY `idpagoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipo_vacuna`
--
ALTER TABLE `tipo_vacuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario_v`
--
ALTER TABLE `usuario_v`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vacunacion`
--
ALTER TABLE `vacunacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `vmedicos`
--
ALTER TABLE `vmedicos`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_usuario_v`) REFERENCES `usuario_v` (`id`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_usuario_v`) REFERENCES `usuario_v` (`id`);

--
-- Filtros para la tabla `detalle_pago_o_servicio`
--
ALTER TABLE `detalle_pago_o_servicio`
  ADD CONSTRAINT `detalle_pago_o_servicio_ibfk_1` FOREIGN KEY (`id_pago_servicio`) REFERENCES `pago_servicio` (`idpagoservicio`),
  ADD CONSTRAINT `detalle_pago_o_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`idservicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `pago_servicio`
--
ALTER TABLE `pago_servicio`
  ADD CONSTRAINT `pago_servicio_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `vacunacion`
--
ALTER TABLE `vacunacion`
  ADD CONSTRAINT `vacunacion_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`),
  ADD CONSTRAINT `vacunacion_ibfk_2` FOREIGN KEY (`id_veterinario`) REFERENCES `usuario_v` (`id`),
  ADD CONSTRAINT `vacunacion_ibfk_3` FOREIGN KEY (`id_vacuna`) REFERENCES `tipo_vacuna` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
