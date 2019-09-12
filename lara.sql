-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Set 12, 2019 alle 09:27
-- Versione del server: 10.3.17-MariaDB
-- Versione PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `blog`
--

CREATE TABLE `blog` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_user_id` varchar(60) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `post_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `blog`
--

INSERT INTO `blog` (`post_id`, `post_title`, `post_content`, `post_user_id`, `post_date`, `post_url`) VALUES
(1, 'merda', 'asd', 'id', '', ''),
(2, 'yoyo', 'yoyo', '3', '', ''),
(3, 'asdasd', 'asdasd', '3', '', ''),
(4, 'asd', 'asd', '3', '', ''),
(5, 'asdasd', 'adasdasd', '3', '', ''),
(6, 'asdasd', 'adasdasd', '3', '', ''),
(7, 'asdasd', 'adasdasd', '3', '', ''),
(8, 'asdad', 'asdasdasd', '3', '', ''),
(9, 'yoyoyo', 'testing', '3', '', ''),
(10, 'testing123', 'testing123', '3', '2019-08-29 11:52:53', ''),
(11, 'yoyoyoyo', 'sfsdfsfsdf', '3', '2019-08-29', ''),
(12, 'Uscita la nuova birra DI MERDA', '<h2> questo è un titolo </h2>\r\n\r\n<p>non ce ne frega un cazzo di niente</p>\r\n<p>non ce ne frega un cazzo di niente</p>\r\n<p>non ce ne frega un cazzo di niente</p>\r\n<p>non ce ne frega un cazzo di niente</p>\r\n<p>non ce ne frega un cazzo di niente</p>\r\n<p>non ce ne frega un cazzo di niente</p>', '3', '2019-08-31', 'testing-vaffanculo'),
(15, 'vaffabculo', 'sadadasd', '3', '2019-09-11', 'vaffabculo');

-- --------------------------------------------------------

--
-- Struttura della tabella `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `carousel_info`
--

CREATE TABLE `carousel_info` (
  `id` int(11) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `carousel_translations`
--

CREATE TABLE `carousel_translations` (
  `id` int(11) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `locale` varchar(5) NOT NULL,
  `title1` varchar(150) NOT NULL,
  `title2` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `carousel_translations_info`
--

CREATE TABLE `carousel_translations_info` (
  `id` int(11) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `locale` varchar(5) NOT NULL,
  `title1` varchar(150) NOT NULL,
  `title2` varchar(150) NOT NULL,
  `text` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`id`, `parent`, `position`, `url`) VALUES
(2, 0, 0, 'Brown-Ale'),
(3, 0, 0, 'Pale-ale'),
(4, 0, 0, 'Stout'),
(5, 0, 0, 'Wheat-beer');

-- --------------------------------------------------------

--
-- Struttura della tabella `categories_translations`
--

CREATE TABLE `categories_translations` (
  `id` int(11) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `locale` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `categories_translations`
--

INSERT INTO `categories_translations` (`id`, `for_id`, `name`, `locale`) VALUES
(3, 2, 'Brown Ale', 'en'),
(4, 3, 'Pale ale', 'en'),
(5, 4, 'Stout', 'en'),
(6, 5, 'Wheat beer', 'en');

-- --------------------------------------------------------

--
-- Struttura della tabella `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `position`, `telephone`, `email`) VALUES
(1, 'Via x, 13', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCzbEe1YItOGVa3h_gT66MTFP056M0xQyo', '333 3333333', 'beerify@test.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `percentage_value` int(11) NOT NULL,
  `coupon_string` varchar(10) NOT NULL,
  `expire_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `coupon`
--

INSERT INTO `coupon` (`id`, `percentage_value`, `coupon_string`, `expire_date`) VALUES
(1, 67, 'A3FZ6Q1YYX', '2019-09-20 12:45:59'),
(2, 78, 'PVY7O3ROV0', '2019-09-09 16:22:02'),
(3, 45, 'DKRHDFLIEI', '2019-09-16 13:48:11');

-- --------------------------------------------------------

--
-- Struttura della tabella `expeditions`
--

CREATE TABLE `expeditions` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `fast_orders`
--

CREATE TABLE `fast_orders` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `names` varchar(100) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `favorites`
--

INSERT INTO `favorites` (`id`, `id_product`, `id_user`) VALUES
(1, 12, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `img_product`
--

CREATE TABLE `img_product` (
  `id_img_prodotto` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `directory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `img_user`
--

CREATE TABLE `img_user` (
  `id_img_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `directory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` varchar(3600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(30) NOT NULL,
  `products` varchar(255) NOT NULL COMMENT 'serialized array',
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `orders_clients`
--

CREATE TABLE `orders_clients` (
  `id` int(11) NOT NULL,
  `for_order` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `notes` text NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `our_beer_carousel`
--

CREATE TABLE `our_beer_carousel` (
  `id` int(11) NOT NULL,
  `text_container_1` varchar(100) DEFAULT NULL,
  `text_container_2` varchar(100) DEFAULT NULL,
  `text_container_3` varchar(100) DEFAULT NULL,
  `text_container_4` varchar(100) DEFAULT NULL,
  `slider_1` varchar(600) DEFAULT NULL,
  `counter_1` int(100) DEFAULT NULL,
  `counter_2` int(100) DEFAULT NULL,
  `counter_3` int(100) DEFAULT NULL,
  `counter_4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `our_beer_carousel`
--

INSERT INTO `our_beer_carousel` (`id`, `text_container_1`, `text_container_2`, `text_container_3`, `text_container_4`, `slider_1`, `counter_1`, `counter_2`, `counter_3`, `counter_4`) VALUES
(1, 'asd', 'ad', 'asd', 'asd', 'asd', 4, 8, 4, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `producers`
--

CREATE TABLE `producers` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `brewery` varchar(600) NOT NULL,
  `link` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `folder` int(10) UNSIGNED NOT NULL COMMENT 'product_id is name of folder',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'category id',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `url` varchar(255) NOT NULL,
  `link_to` varchar(255) DEFAULT NULL,
  `order_position` int(10) UNSIGNED NOT NULL,
  `procurements` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `tags` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0,
  `our_beer` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`id`, `image`, `folder`, `created_at`, `updated_at`, `category_id`, `quantity`, `url`, `link_to`, `order_position`, `procurements`, `tags`, `hidden`, `our_beer`) VALUES
(1, 'images/r6PlNR3FLk3pwe3LyjFnBJ9ZJ5VdNMJJYkcTNY9f.jpeg', 1561800926, '2019-06-29 09:35:27', NULL, 1, 5, 'Birra-1', 'Birra1', 1, 0, 'Birra', 0, 0),
(11, '', 1563782387, '2019-07-22 07:59:47', NULL, 1, 10, 'birra-2', NULL, 0, 0, '', 0, 0),
(12, '', 1563782468, '2019-07-22 08:01:08', NULL, 1, 10, 'birra-12', NULL, 0, 0, '', 0, 0),
(13, '', 1563782521, '2019-07-22 08:02:01', NULL, 1, 10, 'birra-13', NULL, 0, 0, '', 0, 0),
(14, '', 1563782588, '2019-07-22 08:03:08', NULL, 1, 10, 'birra-14', NULL, 0, 0, '', 0, 0),
(15, '', 1563782603, '2019-07-22 08:03:23', NULL, 1, 10, 'birra-15', NULL, 0, 0, '', 0, 0),
(16, '', 1563782702, '2019-07-22 08:05:02', NULL, 1, 10, 'birra-16', NULL, 0, 0, '', 0, 0),
(17, '', 1563782750, '2019-07-22 08:05:50', NULL, 1, 55, 'birra-17', NULL, 0, 0, '', 0, 0),
(18, '', 1563782826, '2019-07-22 08:07:06', NULL, 1, 55, 'birra-18', NULL, 0, 0, '', 0, 0),
(19, '', 1563783935, '2019-07-22 08:25:35', NULL, 2, 10, 'Duff-Beer-19', NULL, 0, 0, '', 0, 0),
(20, '', 1563783974, '2019-07-22 08:26:14', NULL, 5, 51, 'Orzata-20', NULL, 0, 0, '', 0, 0),
(21, '', 1563784005, '2019-07-22 08:26:45', NULL, 4, 22, 'Espana-21', NULL, 0, 0, '', 0, 0),
(22, 'images/dtyvoXi0cgaPMYzpOg4JaJmNRnt2KEqh9PIhfv4F.png', 1568123638, '2019-09-10 13:53:58', NULL, 2, 5, 'Test-22', 'beer_xxx', 1, 0, 'asd,lol', 0, 0),
(23, '', 1568126400, '2019-09-10 14:40:00', NULL, 2, 3, 'SSA-23', 'SSA', 1, 0, 'asd', 0, 1),
(24, '', 1568126722, '2019-09-10 14:45:22', NULL, 2, 33, 'bbb-24', 'bbb', 12, 0, '', 0, 0),
(25, '', 1568126769, '2019-09-10 14:46:09', NULL, 2, 55, 'ccc-25', NULL, 22, 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `products_translations`
--

CREATE TABLE `products_translations` (
  `id` int(11) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL COMMENT 'id of product',
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `ml` varchar(20) NOT NULL,
  `alchool` varchar(20) NOT NULL,
  `quickdescription` text NOT NULL,
  `locale` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `products_translations`
--

INSERT INTO `products_translations` (`id`, `for_id`, `name`, `description`, `price`, `ml`, `alchool`, `quickdescription`, `locale`) VALUES
(10, 19, 'Duff Beer', 'Descrizione molto lunga', '4.5', '330', '4.5', 'Descrizione molto breve', 'en'),
(11, 20, 'Orzata', 's è come il caffe d\' orzo', '3', '500', '2', 'orzo', 'en'),
(12, 21, 'Espana', 'La birra spagnoleggiante', '5', '660', '6', 'spagna', 'en'),
(13, 22, 'Test', 'asdsadadasd', '67', '33cl', '7', 'asdasda', 'en'),
(14, 23, 'SSA', 'AS', '89', '66cl', '13', 'AS', 'en'),
(15, 24, 'bbb', 'bbb', '89', '33cl', '45', 'bbbb', 'en'),
(16, 25, 'ccc', 'ccc', '78', '33cl', '12', 'ccc', 'en');

-- --------------------------------------------------------

--
-- Struttura della tabella `refunds`
--

CREATE TABLE `refunds` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `social_contacts`
--

CREATE TABLE `social_contacts` (
  `id` int(11) NOT NULL,
  `instagram_desc` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `facebook_desc` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_desc` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `google_plus_desc` varchar(255) NOT NULL,
  `google_plus_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `social_contacts`
--

INSERT INTO `social_contacts` (`id`, `instagram_desc`, `instagram_link`, `facebook_desc`, `facebook_link`, `twitter_desc`, `twitter_link`, `google_plus_desc`, `google_plus_link`) VALUES
(1, 'Use the hashtag #beerify to see all of our content on Instagram!', 'https://instagram.com', 'Like our Facebook Page for special offers', 'https://facebook.com', 'Use the hashtag #beerify to see all of our content on Twitter!', 'https://twitter.com', ':(', 'google.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` varchar(500) NOT NULL,
  `locale` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `story`
--

INSERT INTO `story` (`id`, `date`, `title`, `text`, `locale`) VALUES
(1, '2019-09-04', 'qweqeqweqwe', 'qeqweeqweqweqwe', 'en');

-- --------------------------------------------------------

--
-- Struttura della tabella `story_carousel`
--

CREATE TABLE `story_carousel` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `story_carousel`
--

INSERT INTO `story_carousel` (`id`, `link`, `position`) VALUES
(1, 'asd.com', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `story_carousel_translations`
--

CREATE TABLE `story_carousel_translations` (
  `id` int(11) NOT NULL,
  `for_id` int(11) NOT NULL,
  `locale` varchar(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title1` varchar(30) NOT NULL,
  `title2` varchar(30) NOT NULL,
  `text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `story_carousel_translations`
--

INSERT INTO `story_carousel_translations` (`id`, `for_id`, `locale`, `image`, `title1`, `title2`, `text`) VALUES
(1, 1, 'en', 'carousel_story/HcjDwKuaBpJCP3ELQeOveYz8ALwK099F3WUjld4E.jpeg', 'asdasd', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Struttura della tabella `story_info`
--

CREATE TABLE `story_info` (
  `id` int(11) NOT NULL,
  `flavours` int(11) NOT NULL,
  `outlets` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `story_info`
--

INSERT INTO `story_info` (`id`, `flavours`, `outlets`, `years`, `day`) VALUES
(1, 206, 140, 90, 21);

-- --------------------------------------------------------

--
-- Struttura della tabella `support_message`
--

CREATE TABLE `support_message` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `support_message`
--

INSERT INTO `support_message` (`id`, `id_ticket`, `id_user`, `text`, `time`) VALUES
(1, 1, 1, 'in una forte epistassi', '2019-07-20 10:36:17'),
(2, 1, 3, 'assurdo', '2019-09-04 14:22:31'),
(3, 1, 3, 'comuqnue in quanto admin, non me ne frega un cazzo', '2019-09-04 14:22:48'),
(4, 1, 3, 'asdsad', '2019-09-11 11:49:35'),
(5, 2, 3, 'fdfdfdfdffd', '2019-09-11 17:42:36'),
(6, 2, 3, 'vaffanculo', '2019-09-11 17:42:59');

-- --------------------------------------------------------

--
-- Struttura della tabella `support_request`
--

CREATE TABLE `support_request` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `obj` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `support_request`
--

INSERT INTO `support_request` (`id`, `id_user`, `obj`, `time`, `status`) VALUES
(1, 1, 'ho perso il mio nome', '2019-07-20 10:36:17', 0),
(2, 3, 'fgfgfggfgf', '2019-09-11 17:42:36', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`, `isAdmin`) VALUES
(1, 'Admin', 'admin@admin.admin', '$2y$10$lKcdQgqvk40/iQ3wIkH9ou/p30fhueK/WQmKuEAXYbU0yzRAONoX6', '2019-06-24 19:30:35', '2019-06-24 19:30:35', 'rnRcPEiCHfrrSRE0TmhQsYQsimzwW5vkMT6apoCFLFcisLpZE5L6JiiicmGA', 1),
(2, 'asd', 'dio@ca.ne', '$2y$10$yhB2C6NNn2yRuLXS39B8a.qBYyZ4Pcbfo5iOcJnNyy7923lSCmLhO', '2019-06-24 19:30:35', '2019-06-24 19:30:35', 'wqSGiiCPWijGFZzh7ldRv6HhglrErOQvsIpCsJzN3UUO9j3mxn8FghacrqYp', 0),
(3, 'User4u', 'kiro@dev.bg', '$2y$10$lKcdQgqvk40/iQ3wIkH9ou/p30fhueK/WQmKuEAXYbU0yzRAONoX6', '2019-06-24 19:30:35', '2019-06-24 19:30:35', 'cskjgxYOSI8ZlS9VISLmy3FLBzGcKqJq86tmvbBJ3yIn2KUjXKkHwYeGxuNi', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(35) NOT NULL,
  `post_cod` varchar(10) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `address`, `city`, `post_cod`, `country`) VALUES
(6, 1, 'tests', 'City', '0555', 'Country');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`post_id`);

--
-- Indici per le tabelle `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `carousel_info`
--
ALTER TABLE `carousel_info`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `carousel_translations`
--
ALTER TABLE `carousel_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `carousel_translations_info`
--
ALTER TABLE `carousel_translations_info`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indici per le tabelle `categories_translations`
--
ALTER TABLE `categories_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `expeditions`
--
ALTER TABLE `expeditions`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `fast_orders`
--
ALTER TABLE `fast_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id_img_prodotto`);

--
-- Indici per le tabelle `img_user`
--
ALTER TABLE `img_user`
  ADD PRIMARY KEY (`id_img_user`);

--
-- Indici per le tabelle `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `orders_clients`
--
ALTER TABLE `orders_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `products_translations`
--
ALTER TABLE `products_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `social_contacts`
--
ALTER TABLE `social_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `story_carousel`
--
ALTER TABLE `story_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `story_carousel_translations`
--
ALTER TABLE `story_carousel_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `story_info`
--
ALTER TABLE `story_info`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `support_message`
--
ALTER TABLE `support_message`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `support_request`
--
ALTER TABLE `support_request`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `blog`
--
ALTER TABLE `blog`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `carousel_info`
--
ALTER TABLE `carousel_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `carousel_translations`
--
ALTER TABLE `carousel_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `carousel_translations_info`
--
ALTER TABLE `carousel_translations_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `categories_translations`
--
ALTER TABLE `categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `expeditions`
--
ALTER TABLE `expeditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `fast_orders`
--
ALTER TABLE `fast_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id_img_prodotto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `img_user`
--
ALTER TABLE `img_user`
  MODIFY `id_img_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `orders_clients`
--
ALTER TABLE `orders_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT per la tabella `products_translations`
--
ALTER TABLE `products_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `social_contacts`
--
ALTER TABLE `social_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `story_carousel`
--
ALTER TABLE `story_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `story_carousel_translations`
--
ALTER TABLE `story_carousel_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `story_info`
--
ALTER TABLE `story_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `support_message`
--
ALTER TABLE `support_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `support_request`
--
ALTER TABLE `support_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
