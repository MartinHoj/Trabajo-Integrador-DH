-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2020 a las 22:31:54
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redsocial`
--
CREATE DATABASE IF NOT EXISTS `redsocial` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `redsocial`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Comentario 1', 3, 1, '2020-03-21 21:58:03', '2020-03-21 21:58:03'),
(2, 'd', 4, 4, '2020-03-21 22:12:29', '2020-03-21 22:12:29'),
(7, 'j', 3, 1, '2020-03-31 01:55:14', '2020-03-31 01:55:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id_actual` bigint(20) UNSIGNED NOT NULL,
  `user_id_friend` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`friend_id`),
  KEY `friends_user_id_actual_foreign` (`user_id_actual`),
  KEY `friends_user_id_friend_foreign` (`user_id_friend`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `friends`
--

INSERT INTO `friends` (`friend_id`, `user_id_actual`, `user_id_friend`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 4, NULL, NULL, 0),
(3, 2, 4, '2020-03-25 02:32:01', '2020-03-25 02:32:01', 0),
(7, 5, 1, '2020-03-30 04:16:13', '2020-03-30 04:16:39', 1),
(8, 1, 2, '2020-03-30 05:11:26', '2020-03-30 05:14:59', 1),
(11, 3, 1, '2020-03-30 05:27:52', '2020-03-30 05:28:20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2020_02_23_062045_create_roles_table', 1),
(13, '2020_02_24_204812_create_amigos_table', 1),
(14, '2020_02_24_204813_create_users_table', 1),
(15, '2020_02_25_071200_create_administradores_table', 1),
(16, '2020_02_25_071357_create_posts_table', 1),
(17, '2020_02_25_071410_create_posteos_table', 1),
(18, '2020_02_25_072245_create_clientes_table', 1),
(19, '2020_02_26_072559_drop_date_column', 1),
(20, '2020_02_26_074129_rename_role_column', 1),
(21, '2020_03_01_171335_create_avatar_column', 1),
(22, '2020_03_04_135906_create_friends_table', 1),
(23, '2020_03_11_051000_create_comments_table', 1),
(24, '2020_03_24_042402_create_status_column', 2),
(25, '2020_03_26_225831_table_reset_column', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `body`, `img_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'wqerwqerqewrg', 'werewrwer', 'Imagen Posteo.jpg', 1, '2020-03-09 23:44:26', '2020-03-30 01:42:46'),
(2, '12313', '123123', 'hipertextual-estas-son-imagenes-que-se-juegan-premio-mejor-astrofotografo-ano-2019530966.jpg', 4, '2020-03-10 00:32:53', '2020-03-21 22:12:46'),
(3, 'asdasd', 'asdasdas', 'hipertextual-estas-son-imagenes-que-se-juegan-premio-mejor-astrofotografo-ano-2019530966.jpg', 1, '2020-03-10 00:58:19', '2020-03-30 01:42:59'),
(4, '|1dsdsd', 'ddfgfdgdf', 'noDisponible.jpg', 4, '2020-03-21 22:05:10', '2020-03-21 22:05:10'),
(5, 'Orueba', 'ASDSA', 'hipertextual-estas-son-imagenes-que-se-juegan-premio-mejor-astrofotografo-ano-2019530966.jpg', 6, '2020-03-29 03:01:26', '2020-03-29 03:01:26'),
(9, 'Titular', 'Contenido', 'noDisponible.jpg', 1, '2020-04-01 21:04:03', '2020-04-01 21:04:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Cliente', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `hobbie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `email`, `username`, `password`, `phone`, `hobbie`, `country`, `role_id`, `created_at`, `updated_at`, `avatar_name`, `reset_password`) VALUES
(1, 'laravel', 'laravelBootstrap', 'laravel@gmail.com', 'laravelaguante', '$2y$10$ipbvmrBdSTXu9SCE68/KYuuOlUHBlXHbtbavxMqEYAJMqhNRaAW96', 123123, 'Programar', 'Argentina', 1, '2020-03-09 23:43:52', '2020-03-27 02:51:14', 'fotos-perfil-whatsapp_16.jpg', ''),
(2, '12312321', 'Mercury', 'queen@gmail.com', 'FreddyMer', '$2y$10$ohvjkK7FMVuev8xdpISp1O5pDnABebIrTWI63DY8gNNFFh5fzmQQS', 21312321, '12312', 'Argentina', 1, '2020-03-10 00:41:41', '2020-03-25 02:25:05', 'Paisaje 1.jpg', ''),
(3, 'Marcos', 'Pinardi', 'marcospinardi@gmail.com', 'marcospin', '$2y$10$CH.QquJXwI8bF5Q.NUG1/eR9hzQMRtpWS6vR5eipZHpq4UTLwA43S', 123213, 'Programar en Laravel', 'Canadá', 2, '2020-03-10 02:21:19', '2020-03-30 05:20:25', 'Paisaje 2.jpg', ''),
(4, 'Hola', 'Hola', 'hola@gmail.com', 'holahola', '$2y$10$Wlte33K5SoMt9Ge.W3830eYGdp0f2ppyaprGGILHH2LEpd.E8PDYq', 21313, 'ddssd', 'Austria', 1, '2020-03-21 21:46:55', '2020-03-27 05:01:41', 'hipertextual-estas-son-imagenes-que-se-juegan-premio-mejor-astrofotografo-ano-2019530966.jpg', ''),
(5, 'Silvia', '2', 'fer@fer.com', '123123', '$2y$10$3Za4kU74RxsZNqrAYhLpzOPInsAEC7q6k3Bsqy7/L6gckWKU2OBj.', 123123, '123123', 'Birmania', 2, '2020-03-23 10:13:45', '2020-03-30 04:15:19', 'noDisponible.jpg', ''),
(6, 'prueba', 'pruebita', 'prueba@gmail.com', 'pruebaABorrar', '$2y$10$6.9WfAUAr8pPPBfJ.uilxObeobQQWOBPPIlUg/Wog2QrlS4W7jDc6', 1231231221, 'Nada', 'Brasil', 2, '2020-03-29 01:56:35', '2020-03-29 01:56:35', 'noDisponible.jpg', '');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_user_id_actual_foreign` FOREIGN KEY (`user_id_actual`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `friends_user_id_friend_foreign` FOREIGN KEY (`user_id_friend`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
