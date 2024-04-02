-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2024 a las 06:51:52
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
-- Base de datos: `app_cinema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_categorys`
--

CREATE TABLE `cm_categorys` (
  `id_category` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_slug` varchar(50) NOT NULL,
  `ip_registered_cat` varchar(20) NOT NULL,
  `date_registered_cat` datetime NOT NULL,
  `client_registered_cat` text NOT NULL,
  `ip_modified_cat` varchar(20) DEFAULT NULL,
  `date_modified_cat` datetime DEFAULT NULL,
  `client_modified_cat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_categorys`
--

INSERT INTO `cm_categorys` (`id_category`, `id_status`, `category_name`, `category_slug`, `ip_registered_cat`, `date_registered_cat`, `client_registered_cat`, `ip_modified_cat`, `date_modified_cat`, `client_modified_cat`) VALUES
(1, 1, 'Películas', 'peliculas', '::1', '2017-07-29 00:29:38', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_cat_mov`
--

CREATE TABLE `cm_cat_mov` (
  `id_category` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_cat_mov`
--

INSERT INTO `cm_cat_mov` (`id_category`, `id_movie`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 2),
(1, 6),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_contacts`
--

CREATE TABLE `cm_contacts` (
  `id_contact` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `contact_firstname` varchar(25) NOT NULL,
  `contact_lastname` varchar(25) NOT NULL,
  `contact_sex` varchar(30) NOT NULL,
  `contact_date_birthday` date NOT NULL,
  `ip_registered_cnt` varchar(20) NOT NULL,
  `date_registered_cnt` datetime NOT NULL,
  `client_registered_cnt` text NOT NULL,
  `ip_modified_cnt` varchar(20) DEFAULT NULL,
  `date_modified_cnt` datetime DEFAULT NULL,
  `client_modified_cnt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_contacts`
--

INSERT INTO `cm_contacts` (`id_contact`, `id_status`, `contact_firstname`, `contact_lastname`, `contact_sex`, `contact_date_birthday`, `ip_registered_cnt`, `date_registered_cnt`, `client_registered_cnt`, `ip_modified_cnt`, `date_modified_cnt`, `client_modified_cnt`) VALUES
(1, 1, 'Joan', 'Sebastián', 'Hombre', '1970-06-10', '::1', '2017-07-29 00:26:52', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_genders`
--

CREATE TABLE `cm_genders` (
  `id_gender` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `gender_name` varchar(50) NOT NULL,
  `gender_slug` varchar(50) NOT NULL,
  `ip_registered_gds` varchar(20) NOT NULL,
  `date_registered_gds` datetime NOT NULL,
  `client_registered_gds` text NOT NULL,
  `ip_modified_gds` varchar(20) DEFAULT NULL,
  `date_modified_gds` datetime DEFAULT NULL,
  `client_modified_gds` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_genders`
--

INSERT INTO `cm_genders` (`id_gender`, `id_status`, `gender_name`, `gender_slug`, `ip_registered_gds`, `date_registered_gds`, `client_registered_gds`, `ip_modified_gds`, `date_modified_gds`, `client_modified_gds`) VALUES
(1, 1, 'Acción', 'accion', '::1', '2017-07-29 00:29:38', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(2, 1, 'Aventura', 'aventura', '::1', '2017-07-29 00:29:38', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(3, 1, 'Animación', 'animacion', '::1', '2017-07-29 00:49:33', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(4, 1, 'Ciencia Ficción', 'ciencia-ficcion', '::1', '2017-07-29 01:10:32', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(5, 1, 'Drama', 'drama', '::1', '2017-07-31 21:40:14', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(6, 1, 'Comedia', 'comedia', '::1', '2017-08-01 00:34:35', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(7, 1, 'Crimen', 'crimen', '::1', '2017-08-01 00:34:50', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(8, 1, 'Fantasía', 'fantasia', '::1', '2017-08-01 00:34:58', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(9, 1, 'Terror', 'terror', '::1', '2017-08-01 00:35:41', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(10, 1, 'Suspenso', 'suspenso', '::1', '2017-08-01 00:35:55', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_gen_mov`
--

CREATE TABLE `cm_gen_mov` (
  `id_gender` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_gen_mov`
--

INSERT INTO `cm_gen_mov` (`id_gender`, `id_movie`) VALUES
(3, 1),
(1, 3),
(2, 3),
(3, 3),
(3, 4),
(3, 5),
(2, 7),
(3, 7),
(3, 8),
(1, 9),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(2, 14),
(3, 14),
(5, 15),
(6, 16),
(9, 16),
(10, 16),
(5, 17),
(6, 17),
(5, 18),
(6, 18),
(3, 19),
(2, 19),
(6, 20),
(3, 20),
(9, 21),
(4, 2),
(2, 2),
(1, 2),
(3, 6),
(8, 22),
(6, 22),
(3, 23),
(4, 24),
(5, 24),
(1, 24),
(4, 25),
(1, 25),
(8, 26),
(3, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_movies`
--

CREATE TABLE `cm_movies` (
  `id_movie` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_quality` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_slug` varchar(255) NOT NULL,
  `movie_description` text NOT NULL,
  `movie_release_date` year(4) NOT NULL,
  `movie_duration` time NOT NULL,
  `movie_country_origin` varchar(50) NOT NULL,
  `movie_cover` text NOT NULL,
  `movie_reproductions` int(11) NOT NULL,
  `movie_play` text NOT NULL,
  `is_premiere` int(11) NOT NULL,
  `ip_registered_mov` varchar(20) NOT NULL,
  `date_registered_mov` datetime NOT NULL,
  `client_registered_mov` text NOT NULL,
  `ip_modified_mov` varchar(20) DEFAULT NULL,
  `date_modified_mov` datetime DEFAULT NULL,
  `client_modified_mov` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_movies`
--

INSERT INTO `cm_movies` (`id_movie`, `id_status`, `id_quality`, `movie_name`, `movie_slug`, `movie_description`, `movie_release_date`, `movie_duration`, `movie_country_origin`, `movie_cover`, `movie_reproductions`, `movie_play`, `is_premiere`, `ip_registered_mov`, `date_registered_mov`, `client_registered_mov`, `ip_modified_mov`, `date_modified_mov`, `client_modified_mov`) VALUES
(1, 1, 1, 'Cars 3', 'cars-3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2017', '01:49:00', 'Estados Unidos (United States)', 'storage/images/movies/1_cover.jpg', 1, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-29 00:49:33', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-08-01 00:29:12', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(2, 1, 3, 'Jurassic World', 'jurassic-world', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2015', '02:04:00', 'Estados Unidos (United States)', 'storage/images/movies/2_cover.jpg', 1, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-29 01:21:18', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-08-03 02:28:06', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(3, 1, 1, 'Toy Story 2', 'toy-story-2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1999', '01:32:00', 'Estados Unidos (United States)', 'storage/images/movies/3_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-29 03:00:04', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-07-31 18:01:52', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(4, 1, 3, 'Tarzan', 'tarzan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1999', '01:28:00', 'Estados Unidos (United States)', 'storage/images/movies/4_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 17:44:21', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-07-31 18:00:46', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(5, 1, 4, 'Mi Villano Favorito 2', 'mi-villano-favorito-2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2013', '01:38:00', 'Estados Unidos (United States)', 'storage/images/movies/5_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 17:54:42', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-07-31 17:58:54', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(6, 1, 3, 'El Extrano Mundo de Jack', 'el-extrano-mundo-de-jack', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1993', '01:13:00', 'Estados Unidos (United States)', 'storage/images/movies/6_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 18:06:06', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-08-03 02:30:24', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(7, 1, 3, 'Toy Story 3', 'toy-story-3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2010', '01:53:00', 'Estados Unidos (United States)', 'storage/images/movies/7_cover.jpg', 4, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 18:10:05', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(8, 1, 3, 'La Bella y la Bestia', 'la-bella-y-la-bestia', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1991', '01:29:00', 'Estados Unidos (United States)', 'storage/images/movies/8_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 18:19:47', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(9, 1, 3, 'Monsters vs Aliens', 'monsters-vs-aliens', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2009', '01:35:00', 'Estados Unidos (United States)', 'storage/images/movies/9_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 18:23:23', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(10, 1, 3, 'Up: Una Aventura de Altura', 'up-una-aventura-de-altura', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2009', '01:36:00', 'Estados Unidos (United States)', 'storage/images/movies/10_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 18:28:33', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(11, 1, 3, 'Antz', 'antz', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1998', '01:23:00', 'Estados Unidos (United States)', 'storage/images/movies/11_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 18:33:23', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(12, 1, 3, 'Toy Story de Terror', 'toy-story-de-terror', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2013', '00:22:00', 'Estados Unidos (United States)', 'storage/images/movies/12_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 18:42:02', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(13, 1, 3, 'Coraline', 'coraline', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2009', '01:50:00', 'Estados Unidos (United States)', 'storage/images/movies/13_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 18:47:32', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-07-31 18:52:30', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(14, 1, 3, 'Shrek', 'shrek', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2001', '01:32:00', 'Estados Unidos (United States)', 'storage/images/movies/14_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 18:54:09', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(15, 1, 4, 'Amarte Duele', 'amarte-duele', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2002', '01:44:00', 'México', 'storage/images/movies/15_cover.jpg', 3, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-07-31 21:45:31', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(16, 1, 4, 'El Demonio 2', 'el-demonio-2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2003', '01:54:00', 'Estados Unidos (United States)', 'storage/images/movies/16_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-01 00:33:41', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-08-01 00:37:36', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(17, 1, 2, 'El Lobo de Wall Street', 'el-lobo-de-wall-street', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2013', '03:00:00', 'Estados Unidos (United States)', 'storage/images/movies/17_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-01 01:03:03', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(18, 1, 4, 'El Diablo Viste a la Moda', 'el-diablo-viste-a-la-moda', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2006', '01:49:00', 'Estados Unidos (United States)', 'storage/images/movies/18_cover.jpg', 2, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-01 01:12:43', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(19, 1, 4, 'Los Increibles', 'los-increibles', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2004', '01:50:00', 'Estados Unidos (United States)', 'storage/images/movies/19_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-02 03:14:20', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(20, 1, 4, 'Ratatouille', 'ratatouille', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2007', '01:50:00', 'Estados Unidos (United States)', 'storage/images/movies/20_cover.jpg', 1, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-02 03:23:25', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(21, 1, 4, 'El Despertar del Diablo', 'el-despertar-del-diablo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2006', '01:45:00', 'Estados Unidos (United States)', 'storage/images/movies/21_cover.jpg', 1, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-02 03:28:17', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(22, 1, 4, 'Pixels', 'pixels', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2015', '01:05:00', 'Estados Unidos (United States)', 'storage/images/movies/22_cover.jpg', 3, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-03 18:10:23', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(23, 1, 2, 'Buscando a Dory', 'buscando-a-dory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2016', '01:37:00', 'Estados Unidos (United States)', 'storage/images/movies/23_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-03 18:31:02', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(24, 1, 6, 'Power Rangers', 'power-rangers', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2017', '02:04:00', 'Estados Unidos (United States)', 'storage/images/movies/24_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-03 19:33:26', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(25, 1, 5, 'Escuadrón Suicida', 'escuadron-suicida', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2017', '01:23:00', 'Estados Unidos (United States)', 'storage/images/movies/25_cover.jpg', 0, 'https://www.youtube.com/embed/yZ9KbIvWjcc', 0, '::1', '2017-08-03 19:42:18', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_newsletters`
--

CREATE TABLE `cm_newsletters` (
  `id_newsletter` int(11) NOT NULL,
  `newsletter_name` varchar(130) DEFAULT NULL,
  `newsletter_email` varchar(120) NOT NULL,
  `ip_registered_nlt` varchar(20) NOT NULL,
  `date_registered_nlt` datetime NOT NULL,
  `client_registered_nlt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_newsletters`
--

INSERT INTO `cm_newsletters` (`id_newsletter`, `newsletter_name`, `newsletter_email`, `ip_registered_nlt`, `date_registered_nlt`, `client_registered_nlt`) VALUES
(1, 'Luis Linares', 'dev.lalinaresr@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(2, 'Nancy Alavez ', '02.nnah@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(3, 'Maria Del Rosario Barrera ', 'rosybar52@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(4, 'Oscar Raul Lopez Sanchez', 'oscarlopez_62@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(5, 'Nancy Tlacomulco', 'ocananancy28@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(6, 'Jorge Vivara Santiago', 'Vivara.santiago@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(7, 'Cecilia Sofia Rivera Cruz', 'marcovich_rr@yahoo.com.mx', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(8, 'Gerardo Miranda ', 'mentemo76@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(9, 'Stephanie Vega', 'fan_y_812@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(10, 'Paula Garcia', 'kass_ks@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(11, 'Edith Balbina Jaime Leon', 'hola_crayolita@yahoo.com.mx', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(12, 'Hector Machado', 'saijanexplocion@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(13, 'Edgar Montes', 'edgar_ivan92@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(14, 'Jesus Emmanuel Segura Perez', 'jesp9205@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(15, 'Nanci Escobar', 'alebonbona._92@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(16, 'Guadalupe Balderas', 'eduardobalderasgutierrez@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(17, 'Marcos Palacios ', 'palacios.miguel_0388@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(18, 'Roberto Rodriguez', 'smashin20@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(19, 'Adolfo Resendiz', 'adolfo.resendiz@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(20, 'Ana Paulina Arellano', 'pau0205@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(21, 'Erica Sanchez', 'ericasanchez0204@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(22, 'Juan Antonio Pozos', 'pozval_ant@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(23, 'Gloria Rosales', 'glorialoore@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(24, 'Francisco Javier Pacheco Garcia', 'javito.pacheco.garcia@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(25, 'Agustina Hernandez Salazar', 'tinahdez@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(26, 'Hector Manuel Lopez Morales', 'hectormanuellopezmorales@outlook.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(27, 'Fermin Gutierrez Enciso Fermin', 'fgutierrez@miguelhidalgo.gob.mx', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(28, 'Rodrigo Morales', 'dizzy.dc@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(29, '', 'dgarciaserrato@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(30, 'Mayra Alonso', 'mayralonso93@gmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(31, 'Vanessa Rios', 'vanerios@me.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(32, 'Xochitl Alvarado', 'xochitl.alvarado@posadas.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(33, 'Alejandra Martinez', 'aleejandra.martinez@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(34, 'Janeth Ramirez', 'janeth_ramirez92@hotmail.com', '::1', '2017-08-03 04:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_productors`
--

CREATE TABLE `cm_productors` (
  `id_productor` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `productor_name` text NOT NULL,
  `productor_slug` text NOT NULL,
  `productor_image_logo` text NOT NULL,
  `ip_registered_pro` varchar(20) NOT NULL,
  `date_registered_pro` datetime NOT NULL,
  `client_registered_pro` text NOT NULL,
  `ip_modified_pro` varchar(20) DEFAULT NULL,
  `date_modified_pro` datetime DEFAULT NULL,
  `client_modified_pro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_productors`
--

INSERT INTO `cm_productors` (`id_productor`, `id_status`, `productor_name`, `productor_slug`, `productor_image_logo`, `ip_registered_pro`, `date_registered_pro`, `client_registered_pro`, `ip_modified_pro`, `date_modified_pro`, `client_modified_pro`) VALUES
(1, 1, 'Pixar Animation Studios', 'pixar-animation-studios', 'storage/images/productors/1_logo.png', '::1', '2017-07-29 00:34:26', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(2, 1, 'DreamWorks Animation', 'dreamworks-animation', 'storage/images/productors/2_logo.png', '::1', '2017-07-29 00:34:26', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(3, 1, 'Universal Pictures', 'universal-pictures', 'storage/images/productors/3_logo.jpg', '::1', '2017-07-29 01:08:56', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(4, 1, 'Walt Disney Pictures', 'walt-disney-pictures', 'storage/images/productors/4_logo.jpg', '::1', '2017-07-31 17:43:14', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-07-31 18:02:17', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(5, 1, 'Illumination Entertainment', 'illumination-entertainment', 'storage/images/productors/5_logo.jpg', '::1', '2017-07-31 17:57:02', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(6, 1, 'Pandemonium LLC', 'pandemonium-llc', 'storage/images/productors/6_logo.jpg', '::1', '2017-07-31 18:49:45', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(7, 1, 'Altavista Films', 'altavista-films', 'storage/images/productors/7_logo.png', '::1', '2017-07-31 21:41:46', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(8, 1, '20th Century Fox', '20th-century-fox', 'storage/images/productors/8_logo.jpg', '::1', '2017-08-01 00:36:35', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(9, 1, 'Paramount Pictures', 'paramount-pictures', 'storage/images/productors/9_logo.PNG', '::1', '2017-08-01 01:00:52', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(10, 1, 'Touchstone Pictures', 'touchstone-pictures', 'storage/images/productors/10_logo.jpg', '::1', '2017-08-01 23:31:19', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(11, 1, 'Fox Searchlight Pictures', 'fox-searchlight-pictures', 'storage/images/productors/11_logo.jpg', '::1', '2017-08-02 03:26:29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(12, 1, 'Sony Pictures Home Entertainment', 'sony-pictures-home-entertainment', 'storage/images/productors/12_logo.jpg', '::1', '2017-08-03 18:07:50', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(13, 1, 'Columbia Pictures', 'columbia-pictures', 'storage/images/productors/13_logo.jpg', '::1', '2017-08-03 18:08:28', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(14, 1, 'SCG Films', 'scg-films', 'storage/images/productors/14_logo.png', '::1', '2017-08-03 19:28:08', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(15, 1, 'Toei Company', 'toei-company', 'storage/images/productors/15_logo.png', '::1', '2017-08-03 19:28:55', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(16, 1, 'Temple Hill Productions', 'temple-hill-productions', 'storage/images/productors/16_logo.jpg', '::1', '2017-08-03 19:29:15', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(17, 1, 'Lionsgate Films', 'lionsgate-films', 'storage/images/productors/17_logo.jpg', '::1', '2017-08-03 19:29:40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(18, 1, 'TIK Films Limited', 'tik-films-limited', 'storage/images/productors/18_logo.jpg', '::1', '2017-08-03 19:30:32', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(19, 1, 'DC Entertainment', 'dc-entertainment', 'storage/images/productors/19_logo.jpg', '::1', '2017-08-03 19:36:40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(20, 1, 'RatPac-Dune Entertainment', 'ratpac-dune-entertainment', 'storage/images/productors/20_logo.png', '::1', '2017-08-03 19:37:30', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(21, 1, 'Atlas Entertainment', 'atlas-entertainment', 'storage/images/productors/21_logo.jpg', '::1', '2017-08-03 19:39:10', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_pro_mov`
--

CREATE TABLE `cm_pro_mov` (
  `id_productor` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_pro_mov`
--

INSERT INTO `cm_pro_mov` (`id_productor`, `id_movie`) VALUES
(1, 1),
(4, 1),
(1, 3),
(4, 3),
(4, 4),
(5, 5),
(4, 7),
(1, 7),
(4, 8),
(2, 9),
(4, 10),
(1, 10),
(2, 11),
(4, 12),
(1, 12),
(6, 13),
(2, 14),
(7, 15),
(8, 16),
(9, 17),
(8, 18),
(4, 19),
(1, 19),
(4, 20),
(1, 20),
(11, 21),
(3, 2),
(4, 6),
(10, 6),
(12, 22),
(13, 22),
(4, 23),
(1, 23),
(15, 24),
(16, 24),
(18, 24),
(14, 24),
(20, 25),
(19, 25),
(21, 25),
(15, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_qualities`
--

CREATE TABLE `cm_qualities` (
  `id_quality` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `quality_name` varchar(20) NOT NULL,
  `quality_slug` varchar(20) NOT NULL,
  `ip_registered_qlt` varchar(20) NOT NULL,
  `date_registered_qlt` datetime NOT NULL,
  `client_registered_qlt` text NOT NULL,
  `ip_modified_qlt` varchar(20) DEFAULT NULL,
  `date_modified_qlt` datetime DEFAULT NULL,
  `client_modified_qlt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_qualities`
--

INSERT INTO `cm_qualities` (`id_quality`, `id_status`, `quality_name`, `quality_slug`, `ip_registered_qlt`, `date_registered_qlt`, `client_registered_qlt`, `ip_modified_qlt`, `date_modified_qlt`, `client_modified_qlt`) VALUES
(1, 1, 'CAM', 'cam', '::1', '2017-07-29 00:34:26', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '', '0000-00-00 00:00:00', ''),
(2, 1, 'Telesync', 'telesync', '::1', '2017-07-29 00:34:26', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '', '0000-00-00 00:00:00', ''),
(3, 1, 'Blu-ray', 'blu-ray', '::1', '2017-07-29 00:58:46', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '::1', '2017-07-29 00:59:30', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'),
(4, 1, 'DVD', 'dvd', '::1', '2017-07-29 01:26:24', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(5, 1, 'HD-1080p', 'hd-1080p', '::1', '2017-08-03 18:29:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(6, 1, 'HD-720p', 'hd-720p', '::1', '2017-08-03 18:29:14', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(7, 1, '4k', '4k', '127.0.0.1', '2024-03-30 15:20:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '127.0.0.1', '2024-03-30 15:27:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_roles`
--

CREATE TABLE `cm_roles` (
  `id_rol` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `rol_name` varchar(30) NOT NULL,
  `rol_slug` varchar(30) NOT NULL,
  `ip_registered_rol` varchar(20) NOT NULL,
  `date_registered_rol` datetime NOT NULL,
  `client_registered_rol` text NOT NULL,
  `ip_modified_rol` varchar(20) DEFAULT NULL,
  `date_modified_rol` datetime DEFAULT NULL,
  `client_modified_rol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_roles`
--

INSERT INTO `cm_roles` (`id_rol`, `id_status`, `rol_name`, `rol_slug`, `ip_registered_rol`, `date_registered_rol`, `client_registered_rol`, `ip_modified_rol`, `date_modified_rol`, `client_modified_rol`) VALUES
(1, 1, 'Administrador', 'administrador', '::1', '2017-07-29 00:24:27', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(2, 1, 'Usuario', 'usuario', '::1', '2017-07-29 00:24:27', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(3, 1, 'Capturista', 'capturista', '::1', '2017-07-29 00:24:27', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_sessions`
--

CREATE TABLE `cm_sessions` (
  `id_session` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `session_browser_used` varchar(20) NOT NULL,
  `session_os_used` varchar(20) NOT NULL,
  `session_browser_version` varchar(25) NOT NULL,
  `ip_registered_ses` varchar(20) NOT NULL,
  `date_registered_ses` datetime NOT NULL,
  `client_registered_ses` text NOT NULL,
  `ip_modified_ses` varchar(20) DEFAULT NULL,
  `date_modified_ses` datetime DEFAULT NULL,
  `client_modified_ses` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_sessions`
--

INSERT INTO `cm_sessions` (`id_session`, `id_user`, `session_browser_used`, `session_os_used`, `session_browser_version`, `ip_registered_ses`, `date_registered_ses`, `client_registered_ses`, `ip_modified_ses`, `date_modified_ses`, `client_modified_ses`) VALUES
(1, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-07-29 00:54:20', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(2, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-07-31 10:23:59', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(3, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-07-31 16:54:35', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(4, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-07-31 17:11:52', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(5, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-08-01 00:22:37', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(6, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-08-01 00:24:57', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(7, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-08-01 09:56:31', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(8, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-08-01 13:43:54', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(9, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-08-02 13:08:31', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(10, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-08-02 22:30:21', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(11, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-08-03 02:24:57', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(12, 1, 'Chrome', 'Win', '59.0.3071.115', '::1', '2017-08-03 11:28:03', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_status`
--

CREATE TABLE `cm_status` (
  `id_status` int(11) NOT NULL,
  `status_name` varchar(30) NOT NULL,
  `status_slug` varchar(30) NOT NULL,
  `ip_registered_sts` varchar(20) NOT NULL,
  `date_registered_sts` datetime NOT NULL,
  `client_registered_sts` text NOT NULL,
  `ip_modified_sts` varchar(20) DEFAULT NULL,
  `date_modified_sts` datetime DEFAULT NULL,
  `client_modified_sts` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_status`
--

INSERT INTO `cm_status` (`id_status`, `status_name`, `status_slug`, `ip_registered_sts`, `date_registered_sts`, `client_registered_sts`, `ip_modified_sts`, `date_modified_sts`, `client_modified_sts`) VALUES
(1, 'Activo', 'activo', '::1', '2017-07-28 23:53:50', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL),
(2, 'Inactivo', 'inactivo', '::1', '2017-07-28 23:53:50', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_suggestions`
--

CREATE TABLE `cm_suggestions` (
  `id_suggestion` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `suggestion_name` varchar(50) NOT NULL,
  `suggestion_email` varchar(120) NOT NULL,
  `suggestion_description` text NOT NULL,
  `suggestion_key` varchar(50) NOT NULL,
  `ip_registered_sug` varchar(20) NOT NULL,
  `date_registered_sug` datetime NOT NULL,
  `client_registered_sug` text NOT NULL,
  `ip_modified_sug` varchar(20) DEFAULT NULL,
  `date_modified_sug` datetime DEFAULT NULL,
  `client_modified_sug` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_suggestions`
--

INSERT INTO `cm_suggestions` (`id_suggestion`, `id_status`, `suggestion_name`, `suggestion_email`, `suggestion_description`, `suggestion_key`, `ip_registered_sug`, `date_registered_sug`, `client_registered_sug`, `ip_modified_sug`, `date_modified_sug`, `client_modified_sug`) VALUES
(1, 1, 'Julio Najera', 'rock87@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1', '::1', '2017-07-31 01:28:00', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_users`
--

CREATE TABLE `cm_users` (
  `id_user` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `user_username` varchar(60) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_avatar` text NOT NULL,
  `ip_registered_usr` varchar(20) NOT NULL,
  `date_registered_usr` datetime NOT NULL,
  `client_registered_usr` text NOT NULL,
  `ip_modified_usr` varchar(20) DEFAULT NULL,
  `date_modified_usr` datetime DEFAULT NULL,
  `client_modified_usr` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cm_users`
--

INSERT INTO `cm_users` (`id_user`, `id_contact`, `id_rol`, `id_status`, `user_username`, `user_email`, `user_password`, `user_avatar`, `ip_registered_usr`, `date_registered_usr`, `client_registered_usr`, `ip_modified_usr`, `date_modified_usr`, `client_modified_usr`) VALUES
(1, 1, 1, 1, 'Joan Sebastián', 'joan_sebastian@yopmail.com', '$2y$10$wduookvf/ZPOqrNYNiYSAOAIJuad9L5amWa9vuuDRzuwUVUnDvHKm', 'storage/images/users/1_avatar.png', '::1', '2017-07-29 00:29:38', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cm_categorys`
--
ALTER TABLE `cm_categorys`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `cm_cat_mov`
--
ALTER TABLE `cm_cat_mov`
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indices de la tabla `cm_contacts`
--
ALTER TABLE `cm_contacts`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `cm_genders`
--
ALTER TABLE `cm_genders`
  ADD PRIMARY KEY (`id_gender`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `cm_gen_mov`
--
ALTER TABLE `cm_gen_mov`
  ADD KEY `id_gender` (`id_gender`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indices de la tabla `cm_movies`
--
ALTER TABLE `cm_movies`
  ADD PRIMARY KEY (`id_movie`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_quality` (`id_quality`);

--
-- Indices de la tabla `cm_newsletters`
--
ALTER TABLE `cm_newsletters`
  ADD PRIMARY KEY (`id_newsletter`);

--
-- Indices de la tabla `cm_productors`
--
ALTER TABLE `cm_productors`
  ADD PRIMARY KEY (`id_productor`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `cm_pro_mov`
--
ALTER TABLE `cm_pro_mov`
  ADD KEY `id_productor` (`id_productor`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indices de la tabla `cm_qualities`
--
ALTER TABLE `cm_qualities`
  ADD PRIMARY KEY (`id_quality`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `cm_roles`
--
ALTER TABLE `cm_roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `cm_sessions`
--
ALTER TABLE `cm_sessions`
  ADD PRIMARY KEY (`id_session`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `cm_status`
--
ALTER TABLE `cm_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `cm_suggestions`
--
ALTER TABLE `cm_suggestions`
  ADD PRIMARY KEY (`id_suggestion`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `cm_users`
--
ALTER TABLE `cm_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_contact` (`id_contact`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cm_categorys`
--
ALTER TABLE `cm_categorys`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cm_contacts`
--
ALTER TABLE `cm_contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cm_genders`
--
ALTER TABLE `cm_genders`
  MODIFY `id_gender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cm_movies`
--
ALTER TABLE `cm_movies`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `cm_newsletters`
--
ALTER TABLE `cm_newsletters`
  MODIFY `id_newsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `cm_productors`
--
ALTER TABLE `cm_productors`
  MODIFY `id_productor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `cm_qualities`
--
ALTER TABLE `cm_qualities`
  MODIFY `id_quality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cm_roles`
--
ALTER TABLE `cm_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cm_sessions`
--
ALTER TABLE `cm_sessions`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cm_status`
--
ALTER TABLE `cm_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cm_suggestions`
--
ALTER TABLE `cm_suggestions`
  MODIFY `id_suggestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cm_users`
--
ALTER TABLE `cm_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cm_categorys`
--
ALTER TABLE `cm_categorys`
  ADD CONSTRAINT `clv_sta_cat_fk` FOREIGN KEY (`id_status`) REFERENCES `cm_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_cat_mov`
--
ALTER TABLE `cm_cat_mov`
  ADD CONSTRAINT `clv_cat_mov_fk` FOREIGN KEY (`id_category`) REFERENCES `cm_categorys` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clv_mov_cat_fk` FOREIGN KEY (`id_movie`) REFERENCES `cm_movies` (`id_movie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_contacts`
--
ALTER TABLE `cm_contacts`
  ADD CONSTRAINT `clv_sta_con_fk` FOREIGN KEY (`id_status`) REFERENCES `cm_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_genders`
--
ALTER TABLE `cm_genders`
  ADD CONSTRAINT `clv_sta_gen_fk` FOREIGN KEY (`id_status`) REFERENCES `cm_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_gen_mov`
--
ALTER TABLE `cm_gen_mov`
  ADD CONSTRAINT `clv_gen_mov_fk` FOREIGN KEY (`id_gender`) REFERENCES `cm_genders` (`id_gender`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clv_mov_gen_fk` FOREIGN KEY (`id_movie`) REFERENCES `cm_movies` (`id_movie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_movies`
--
ALTER TABLE `cm_movies`
  ADD CONSTRAINT `clv_qua_mov_fk` FOREIGN KEY (`id_quality`) REFERENCES `cm_qualities` (`id_quality`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clv_sta_mov_fk` FOREIGN KEY (`id_status`) REFERENCES `cm_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_productors`
--
ALTER TABLE `cm_productors`
  ADD CONSTRAINT `clv_sta_pro_fk` FOREIGN KEY (`id_status`) REFERENCES `cm_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_pro_mov`
--
ALTER TABLE `cm_pro_mov`
  ADD CONSTRAINT `clv_mov_pro_fk` FOREIGN KEY (`id_movie`) REFERENCES `cm_movies` (`id_movie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clv_pro_mov_fk` FOREIGN KEY (`id_productor`) REFERENCES `cm_productors` (`id_productor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_qualities`
--
ALTER TABLE `cm_qualities`
  ADD CONSTRAINT `clv_sta_qua_fk` FOREIGN KEY (`id_status`) REFERENCES `cm_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_roles`
--
ALTER TABLE `cm_roles`
  ADD CONSTRAINT `clv_sta_rol_fk` FOREIGN KEY (`id_status`) REFERENCES `cm_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_sessions`
--
ALTER TABLE `cm_sessions`
  ADD CONSTRAINT `clv_use_ses_fk` FOREIGN KEY (`id_user`) REFERENCES `cm_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_suggestions`
--
ALTER TABLE `cm_suggestions`
  ADD CONSTRAINT `clv_sta_sug_fk` FOREIGN KEY (`id_status`) REFERENCES `cm_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cm_users`
--
ALTER TABLE `cm_users`
  ADD CONSTRAINT `clv_con_use_fk` FOREIGN KEY (`id_contact`) REFERENCES `cm_contacts` (`id_contact`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clv_rol_use_fk` FOREIGN KEY (`id_rol`) REFERENCES `cm_roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clv_sta_use_fk` FOREIGN KEY (`id_status`) REFERENCES `cm_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
