-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-02-2021 a las 17:48:36
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `mvm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `register`
--

CREATE TABLE `register` (
                            `idreg` int(6) NOT NULL,
                            `idrol` int(6) NOT NULL,
                            `empresa` varchar(100) DEFAULT NULL,
                            `user` varchar(100) DEFAULT NULL,
                            `email` varchar(100) DEFAULT NULL,
                            `password` varchar(20) DEFAULT NULL,
                            `observations` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `register`
--

INSERT INTO `register` (`idreg`, `idrol`, `empresa`, `user`, `email`, `password`, `observations`) VALUES
(11, 2, 'Energy SL', 'Juan', 'juan@energy.com', '1234', 'rrhh'),
(12, 2, 'Moon SL', 'Jose', 'pepe@moon.com', '1234', 'ventas'),
(13, 1, '', 'rick', 'rick12@gmail.com', '1234', 'Asix'),
(14, 2, 'Mars ORG', 'laura', 'laura@mars.com', '1234', 'Directora'),
(15, 3, '', 'Jose', 'jose12@gmail.com', '1234', 'DAW'),
(16, 3, '', 'Desire', 'desire@gmail.com', '1234', 'DevOps'),
(17, 2, 'Jupyter ORG', 'ian', 'ian@jupyter.com', '1234', 'rrhh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
                         `idrol` int(6) NOT NULL,
                         `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `description`) VALUES
(1, 'Alumne'),
(2, 'Empresa'),
(3, 'Ex alumne');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovacante`
--

CREATE TABLE `tipovacante` (
                               `idtipovacante` int(2) NOT NULL,
                               `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipovacante`
--

INSERT INTO `tipovacante` (`idtipovacante`, `descripcion`) VALUES
(1, 'FCT'),
(2, 'DUAL'),
(3, 'LABORAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes`
--

CREATE TABLE `vacantes` (
                            `idvacante` int(6) NOT NULL,
                            `idtipovacante` int(2) NOT NULL,
                            `idreg` int(6) NOT NULL,
                            `titulo` varchar(100) NOT NULL,
                            `descripcion` varchar(7000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vacantes`
--

INSERT INTO `vacantes` (`idvacante`, `idtipovacante`, `idreg`, `titulo`, `descripcion`) VALUES
(86, 2, 14, 'Administrador de Sistemas Junior', '80000€'),
(88, 3, 11, 'Administrador de Sistemas TIC TAC', '88'),
(89, 3, 11, 'Administrador de Sistemas', '123'),
(90, 1, 11, 'Administrador de sistemas', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `register`
--
ALTER TABLE `register`
    ADD PRIMARY KEY (`idreg`,`idrol`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `idrol_idx` (`idrol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
    ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tipovacante`
--
ALTER TABLE `tipovacante`
    ADD PRIMARY KEY (`idtipovacante`);

--
-- Indices de la tabla `vacantes`
--
ALTER TABLE `vacantes`
    ADD PRIMARY KEY (`idvacante`,`idtipovacante`,`idreg`),
  ADD KEY `idtipovacante_idx` (`idtipovacante`),
  ADD KEY `idreg_idx` (`idreg`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `register`
--
ALTER TABLE `register`
    MODIFY `idreg` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipovacante`
--
ALTER TABLE `tipovacante`
    MODIFY `idtipovacante` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vacantes`
--
ALTER TABLE `vacantes`
    MODIFY `idvacante` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `register`
--
ALTER TABLE `register`
    ADD CONSTRAINT `idrolfk` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacantes`
--
ALTER TABLE `vacantes`
    ADD CONSTRAINT `idreg` FOREIGN KEY (`idreg`) REFERENCES `register` (`idreg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idtipovacante` FOREIGN KEY (`idtipovacante`) REFERENCES `tipovacante` (`idtipovacante`) ON DELETE NO ACTION ON UPDATE NO ACTION;
