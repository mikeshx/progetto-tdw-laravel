-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 26, 2019 alle 12:33
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.0

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
-- Struttura della tabella `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Struttura della tabella `carousel_info`
--

CREATE TABLE `carousel_info` (
  `id` int(11) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT '1',
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
(1, 0, 0, 'asdadasd');

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
(1, 1, '', 'bg'),
(2, 1, 'asdadasd', 'en');

-- --------------------------------------------------------

--
-- Struttura della tabella `company_descriptions`
--

CREATE TABLE `company_descriptions` (
  `id` int(11) NOT NULL,
  `text` varchar(3600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 12, '', '0000-00-00 00:00:00'),
(3, 56, '', '0000-00-00 00:00:00'),
(4, 23, '', '0000-00-00 00:00:00'),
(5, 9999, '', '0000-00-00 00:00:00'),
(6, 12, '', '0000-00-00 00:00:00'),
(7, 121, '3XWBC146AO', '0000-00-00 00:00:00'),
(8, 23, 'JQCZ939ROW', '0000-00-00 00:00:00'),
(9, 56, '5VFNRHRMQA', '0000-00-00 00:00:00'),
(10, 12, '3H3SK940WO', '2019-04-14 09:37:29'),
(11, 23, '3WD7MAHTEP', '2019-04-17 14:17:43'),
(12, 12, 'LXR8Q9T6DJ', '2019-05-06 08:07:26');

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
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0'
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
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(30) NOT NULL,
  `products` varchar(255) NOT NULL COMMENT 'serialized array',
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `time_created`, `type`, `products`, `status`) VALUES
(1, 1, '2019-04-26 08:25:47', 'cash_on_delivery', 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"1\";s:8:\"quantity\";s:1:\"3\";}}', 0),
(2, 2, '2019-04-26 08:33:06', 'cash_on_delivery', 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"1\";s:8:\"quantity\";s:1:\"5\";}}', 0),
(12, 3, '2019-04-26 10:29:08', 'cash_on_delivery', 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"1\";s:8:\"quantity\";s:2:\"16\";}}', 0),
(13, 4, '2019-04-26 10:30:40', 'cash_on_delivery', 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"1\";s:8:\"quantity\";s:1:\"1\";}}', 0),
(14, 5, '2019-04-26 10:32:07', 'cash_on_delivery', 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"1\";s:8:\"quantity\";s:1:\"2\";}}', 0);

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

--
-- Dump dei dati per la tabella `orders_clients`
--

INSERT INTO `orders_clients` (`id`, `for_order`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `post_code`, `notes`, `total_price`) VALUES
(1, 1, 'asd', 'adasdasd', 'asdasd', 'asdasd', 'asdasdasd', 'asdasdas', 'asdasda', 'dsadad', 0),
(2, 2, 'asdasd', 'asdasdas', 'dasdasd', 'asdasdsad', 'asdasdas', 'asdsada', 'asdasdasd', 'asdsadad', 0),
(3, 12, 'asdasd', 'asdasd', 'asdasdas', 'dasdas', 'dasdasd', 'asdas', 'dasdasd', 'asdasdsa', 512),
(4, 13, 'asdooooo', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 32),
(5, 14, 'asdad', 'asdasd', 'asdasdas', 'dasdasd', 'asdasd', 'adasdas', 'dasdas', 'sdasdad', 56);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'category id',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `link_to` varchar(255) DEFAULT NULL,
  `order_position` int(10) UNSIGNED NOT NULL,
  `procurements` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tags` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`id`, `image`, `folder`, `created_at`, `updated_at`, `category_id`, `quantity`, `url`, `link_to`, `order_position`, `procurements`, `tags`, `hidden`) VALUES
(1, 'images/tC7CtdU1qvXZz5k3OMlMf7Hj1WhOrLNJvNHmXl3T.png', 1547726874, '2019-01-17 12:07:55', '2019-01-17 11:10:05', 1, 1, 'adsadasda-1', NULL, 1, 0, 'lol', 0);

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
  `locale` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `products_translations`
--

INSERT INTO `products_translations` (`id`, `for_id`, `name`, `description`, `price`, `locale`) VALUES
(1, 1, '', '', '', 'bg'),
(2, 1, 'adsadasda', 'asdadasd', '32', 'en');

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
  `tipo` varchar(30) NOT NULL,
  `social_link` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `social_contacts`
--

INSERT INTO `social_contacts` (`id`, `tipo`, `social_link`) VALUES
(1, 'facebook', 'https://www.facebook.com/'),
(2, 'instagram', 'https://www.instagram.com/'),
(3, 'twitter', 'https://www.twitter.com/');

-- --------------------------------------------------------

--
-- Struttura della tabella `support_message`
--

CREATE TABLE `support_message` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `support_request`
--

CREATE TABLE `support_request` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `obj` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`, `isAdmin`) VALUES
(1, 'User4u', 'kiro@dev.bg', '$2y$10$lKcdQgqvk40/iQ3wIkH9ou/p30fhueK/WQmKuEAXYbU0yzRAONoX6', '2017-09-14 03:06:28', '2017-09-14 03:06:28', 'RRpAZYrZBs2A4eBuV5NBaNNubZpOXaJFG2OI4nLbRVsLIYMwtuPEcX74Nf3r', 1),
(2, 'Admin', 'admin@admin.admin', '$2y$10$lKcdQgqvk40/iQ3wIkH9ou/p30fhueK/WQmKuEAXYbU0yzRAONoX6', '2019-01-17 12:24:20', '2019-01-17 12:24:20', 'Ha3ltU8e8tcchdCSw1jjH7mcMQd7ceGLYegFiD5M2fI0TWA8OydOVbtk2T2S', 1),
(3, 'asd', 'dio@ca.ne', '$2y$10$yhB2C6NNn2yRuLXS39B8a.qBYyZ4Pcbfo5iOcJnNyy7923lSCmLhO', '2019-01-17 12:24:20', '2019-01-17 12:24:20', 'Ha3ltU8e8tcchdCSw1jjH7mcMQd7ceGLYegFiD5M2fI0TWA8OydOVbtk2T2S', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

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
-- Indici per le tabelle `company_descriptions`
--
ALTER TABLE `company_descriptions`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`);

--
-- Indici per le tabelle `fast_orders`
--
ALTER TABLE `fast_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `img_product`
--
ALTER TABLE `img_product`
  ADD KEY `id_product` (`id_product`);

--
-- Indici per le tabelle `img_user`
--
ALTER TABLE `img_user`
  ADD PRIMARY KEY (`id_img_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indici per le tabelle `orders_clients`
--
ALTER TABLE `orders_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `social_contacts`
--
ALTER TABLE `social_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `support_message`
--
ALTER TABLE `support_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_message_ibfk_1` (`id_ticket`),
  ADD KEY `support_message_ibfk_2` (`id_user`);

--
-- Indici per le tabelle `support_request`
--
ALTER TABLE `support_request`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `categories_translations`
--
ALTER TABLE `categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `company_descriptions`
--
ALTER TABLE `company_descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `orders_clients`
--
ALTER TABLE `orders_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `products_translations`
--
ALTER TABLE `products_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `support_message`
--
ALTER TABLE `support_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `support_request`
--
ALTER TABLE `support_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `expeditions`
--
ALTER TABLE `expeditions`
  ADD CONSTRAINT `expeditions_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Limiti per la tabella `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `img_product`
--
ALTER TABLE `img_product`
  ADD CONSTRAINT `img_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Limiti per la tabella `img_user`
--
ALTER TABLE `img_user`
  ADD CONSTRAINT `img_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `producers`
--
ALTER TABLE `producers`
  ADD CONSTRAINT `producers_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Limiti per la tabella `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `refunds_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `support_message`
--
ALTER TABLE `support_message`
  ADD CONSTRAINT `support_message_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `support_request` (`id`),
  ADD CONSTRAINT `support_message_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Limiti per la tabella `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

--
-- Dump dei dati per la tabella `carousel`
--

INSERT INTO `carousel` (`id`, `position`, `link`) VALUES
(1, 1, '');

--
-- Dump dei dati per la tabella `carousel_info`
--
INSERT INTO `carousel_info` (`id`, `position`, `link`) VALUES
(1, 1, ''),
(2, 2, '');

--
-- Dump dei dati per la tabella `carousel_translations`
--

INSERT INTO `carousel_translations` (`id`, `for_id`, `image`, `locale`, `title1`, `title2`) VALUES
(1, 1, 'carousel/36wQ3i2JyUIbLbrywQlGVwt3sBpE4CK4wNuCZtmy.jpeg', 'en', 'Over one hundred flavours of', 'Specially Crafted Beer');

--
-- Dump dei dati per la tabella `carousel_translations_info`
--

INSERT INTO `carousel_translations_info` (`id`, `for_id`, `image`, `locale`, `title1`, `title2`, `text`) VALUES
(1, 1, 'carousel_info/Sf96Rg1AhreuaDJEvYB2KFHy3ubhPtwDxXVQra5H.jpeg', 'en', 'Titolo1', 'titolo2', 'Testo'),
(2, 2, 'carousel_info/xfl0tjCLnbt8BpUYYbbEfY5ZTCP1KsgsaJWGHTWB.jpeg', 'en', 'Titolo1', 'Titolo2', 'Testo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
