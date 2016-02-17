-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 08-02-2016 a las 19:28:03
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `fastwer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `pk_answer` int(11) NOT NULL,
  `fk_question` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `answer`
--

INSERT INTO `answer` (`pk_answer`, `fk_question`, `answer`) VALUES
(1, 1, 'Si'),
(2, 1, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friends`
--

CREATE TABLE `friends` (
  `id_user` int(11) NOT NULL,
  `id_friend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `friends`
--

INSERT INTO `friends` (`id_user`, `id_friend`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `question` varchar(120) NOT NULL,
  `votes` int(11) NOT NULL,
  `image_question` varchar(100) NOT NULL,
  `date_create` date NOT NULL,
  `date_delete` date NOT NULL,
  `fk_user` int(11) NOT NULL,
  `is_simple` varchar(1) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `question`
--

INSERT INTO `question` (`id_question`, `question`, `votes`, `image_question`, `date_create`, `date_delete`, `fk_user`, `is_simple`, `views`) VALUES
(1, 'Que quieres hacer', 12, 'JJJ', '2016-02-02', '2016-02-03', 1, '0', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_avatar` varchar(100) DEFAULT NULL,
  `user_state` tinyint(1) DEFAULT NULL,
  `user_first_log` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `user_avatar`, `user_state`, `user_first_log`) VALUES
(1, 'algibe', 'algibe', 'albertgb@hotmail.es', 'hola', 0, '2016-02-03'),
(2, 'rubikoh', '123', 'robukohLH', 'hi', 0, '2016-02-03'),
(3, 'Oriol', 'tupadre', 'holaKase', 'eee', 0, '2016-02-03'),
(4, '', '', '', NULL, NULL, '2016-02-07'),
(5, '', '', '', NULL, NULL, '2016-02-07'),
(6, '', '', '', NULL, NULL, '2016-02-07'),
(7, '', '', '', NULL, NULL, '2016-02-07'),
(8, '', '', '', NULL, NULL, '2016-02-07'),
(9, '', '', '', NULL, NULL, '2016-02-07'),
(10, '', '', '', NULL, NULL, '2016-02-07'),
(11, '', '', '', NULL, NULL, '2016-02-08'),
(12, '', '', '', NULL, NULL, '2016-02-08'),
(13, '', '', '', NULL, NULL, '2016-02-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_answer`
--

CREATE TABLE `user_answer` (
  `pk_fk_answer` int(11) NOT NULL,
  `pk_fk_id_user` int(11) NOT NULL,
  `date_answer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_answer`
--

INSERT INTO `user_answer` (`pk_fk_answer`, `pk_fk_id_user`, `date_answer`) VALUES
(1, 2, '2016-02-01'),
(1, 3, '2016-02-16'),
(2, 2, '0000-00-00'),
(2, 3, '2016-02-08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`pk_answer`);

--
-- Indices de la tabla `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id_user`,`id_friend`);

--
-- Indices de la tabla `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`pk_fk_answer`,`pk_fk_id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `pk_answer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;