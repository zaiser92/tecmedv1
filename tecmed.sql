-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2023 a las 16:22:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecmed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `id_rol` tinyint(4) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `password` varchar(220) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `reset` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `id_rol`, `nombres`, `apellido`, `ci`, `password`, `cargo`, `estado`, `reset`, `fecha_alta`, `fecha_edit`, `telefono`, `login`) VALUES
(1, 1, 'Admin', 'Tecmed', '9875528', '$2y$10$jCdI2KyXOWYsxpuk079.Ve7XGopxSCFMgsio5JSd2Ok2qtZDbqrqy', 'Auxiliar Oficina', 1, 0, '2023-04-04', '2023-08-08', 67059020, '9875528A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria_docencia`
--

CREATE TABLE `convocatoria_docencia` (
  `id` int(11) NOT NULL,
  `id_administrador` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `id_mencion` tinyint(4) NOT NULL,
  `archivo` varchar(254) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `materia` varchar(200) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `fecha_entrega_doc` date NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_seminarios`
--

CREATE TABLE `cursos_seminarios` (
  `id` int(11) NOT NULL,
  `id_administrador` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `id_mencion` tinyint(4) DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT 0.00,
  `tema` text NOT NULL,
  `lugar` varchar(200) DEFAULT NULL,
  `modalidad` varchar(100) NOT NULL,
  `archivo` varchar(254) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `tema` varchar(200) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `modalidad` varchar(200) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date DEFAULT NULL,
  `fecha_edit` date DEFAULT NULL,
  `fecha_alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_academia`
--

CREATE TABLE `experiencia_academia` (
  `id` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `id_mencion` tinyint(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `prep_academica` tinyint(4) NOT NULL,
  `plan_estudios` tinyint(4) NOT NULL,
  `asignaturas` tinyint(4) NOT NULL,
  `equipamento` tinyint(4) NOT NULL,
  `infraestructura` tinyint(4) NOT NULL,
  `biblioteca` tinyint(4) NOT NULL,
  `tutoria_docente` tinyint(4) NOT NULL,
  `actividades_academicas` tinyint(4) NOT NULL,
  `actividades_extracurriculares` tinyint(4) NOT NULL,
  `sociedad_cientifica` tinyint(4) NOT NULL,
  `internado_rotatorio` tinyint(4) NOT NULL,
  `perfil_profesional` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_docente`
--

CREATE TABLE `experiencia_docente` (
  `id` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `materia` varchar(200) NOT NULL,
  `universidad` varchar(200) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `ciudad` varchar(150) NOT NULL,
  `pais` varchar(150) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral`
--

CREATE TABLE `experiencia_laboral` (
  `id` int(11) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `pais` varchar(200) NOT NULL,
  `empresa_institucion` varchar(200) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `actividades` text NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_academica`
--

CREATE TABLE `formacion_academica` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `institucion_academica` varchar(255) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `gestion_titulacion` int(11) NOT NULL,
  `fecha_edit` date DEFAULT NULL,
  `fecha_alta` date NOT NULL,
  `id_profesional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mencion`
--

CREATE TABLE `mencion` (
  `id` tinyint(4) NOT NULL,
  `mencion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mencion`
--

INSERT INTO `mencion` (`id`, `mencion`) VALUES
(1, 'Bioimagenología'),
(2, 'Fisioterapia y Kinesiología'),
(3, 'Laboratorio Clínico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `id_administrador` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `id_mencion` tinyint(4) NOT NULL,
  `archivo` varchar(254) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `titulo` varchar(200) NOT NULL,
  `referencia` text NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios_distinciones`
--

CREATE TABLE `premios_distinciones` (
  `id` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `id_profesional` int(11) NOT NULL,
  `id_rol` tinyint(4) NOT NULL DEFAULT 3,
  `cedula` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `img_profesional` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) NOT NULL,
  `ap_paterno` varchar(50) DEFAULT NULL,
  `ap_materno` varchar(50) DEFAULT NULL,
  `nacionalidad` varchar(30) DEFAULT NULL,
  `ciudad` varchar(200) NOT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(10) NOT NULL,
  `reset` tinyint(4) NOT NULL DEFAULT 1,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `colaboracion` varchar(150) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `anio_publicacion` int(11) NOT NULL,
  `nombre_revista` varchar(150) DEFAULT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` tinyint(4) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Administrador', '2023-04-11', '2023-04-11'),
(2, 'Colaborador', '2023-04-11', '2023-04-11'),
(3, 'Titulado', '2023-04-11', '2023-04-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titula`
--

CREATE TABLE `titula` (
  `id` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `id_mencion` tinyint(4) NOT NULL,
  `ingreso` int(11) NOT NULL,
  `egreso` int(11) NOT NULL,
  `modalidad` varchar(200) NOT NULL,
  `titulacion` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `fk_administrador_rol` (`id_rol`);

--
-- Indices de la tabla `convocatoria_docencia`
--
ALTER TABLE `convocatoria_docencia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `fk_convdocencia_administrador` (`id_administrador`),
  ADD KEY `fk_convdocencia_mencion` (`id_mencion`);

--
-- Indices de la tabla `cursos_seminarios`
--
ALTER TABLE `cursos_seminarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `fk_curso_administrador` (`id_administrador`),
  ADD KEY `fk_curso_mencion` (`id_mencion`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evento_profesional` (`id_profesional`);

--
-- Indices de la tabla `experiencia_academia`
--
ALTER TABLE `experiencia_academia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exp_academica_profesional` (`id_profesional`),
  ADD KEY `fk_exp_academica_mencion` (`id_mencion`);

--
-- Indices de la tabla `experiencia_docente`
--
ALTER TABLE `experiencia_docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docente_profesional` (`id_profesional`);

--
-- Indices de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_laboral_profesional` (`id_profesional`);

--
-- Indices de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_academica_profesional` (`id_profesional`);

--
-- Indices de la tabla `mencion`
--
ALTER TABLE `mencion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `fk_noticia_administrador` (`id_administrador`),
  ADD KEY `fk_noticia_mencion` (`id_mencion`);

--
-- Indices de la tabla `premios_distinciones`
--
ALTER TABLE `premios_distinciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_premios_profesional` (`id_profesional`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id_profesional`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `fk_profesional_rol` (`id_rol`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_publicaciones_profesional` (`id_profesional`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `titula`
--
ALTER TABLE `titula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_titula_mencion` (`id_mencion`),
  ADD KEY `fk_titula_profesional` (`id_profesional`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `convocatoria_docencia`
--
ALTER TABLE `convocatoria_docencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos_seminarios`
--
ALTER TABLE `cursos_seminarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `experiencia_academia`
--
ALTER TABLE `experiencia_academia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `experiencia_docente`
--
ALTER TABLE `experiencia_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mencion`
--
ALTER TABLE `mencion`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `premios_distinciones`
--
ALTER TABLE `premios_distinciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id_profesional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `titula`
--
ALTER TABLE `titula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `convocatoria_docencia`
--
ALTER TABLE `convocatoria_docencia`
  ADD CONSTRAINT `fk_convdocencia_administrador` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_convdocencia_mencion` FOREIGN KEY (`id_mencion`) REFERENCES `mencion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos_seminarios`
--
ALTER TABLE `cursos_seminarios`
  ADD CONSTRAINT `fk_curso_administrador` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_curso_mencion` FOREIGN KEY (`id_mencion`) REFERENCES `mencion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_evento_profesional` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia_academia`
--
ALTER TABLE `experiencia_academia`
  ADD CONSTRAINT `fk_exp_academica_mencion` FOREIGN KEY (`id_mencion`) REFERENCES `mencion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_exp_academica_profesional` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia_docente`
--
ALTER TABLE `experiencia_docente`
  ADD CONSTRAINT `fk_docente_profesional` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD CONSTRAINT `fk_laboral_profesional` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD CONSTRAINT `fk_academica_profesional` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticia_administrador` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_noticia_mencion` FOREIGN KEY (`id_mencion`) REFERENCES `mencion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `premios_distinciones`
--
ALTER TABLE `premios_distinciones`
  ADD CONSTRAINT `fk_premios_profesional` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `fk_profesional_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `fk_publicaciones_profesional` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `titula`
--
ALTER TABLE `titula`
  ADD CONSTRAINT `fk_titula_mencion` FOREIGN KEY (`id_mencion`) REFERENCES `mencion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_titula_profesional` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
