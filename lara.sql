-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2019 at 02:05 PM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.2.15

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
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `carousel_translations`
--

CREATE TABLE `carousel_translations` (
  `id` int(11) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `locale` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent`, `position`, `url`) VALUES
(1, 0, 0, 'asdadasd');

-- --------------------------------------------------------

--
-- Table structure for table `categories_translations`
--

CREATE TABLE `categories_translations` (
  `id` int(11) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `locale` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_translations`
--

INSERT INTO `categories_translations` (`id`, `for_id`, `name`, `locale`) VALUES
(1, 1, '', 'bg'),
(2, 1, 'asdadasd', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fast_orders`
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
-- Table structure for table `img_prodotto`
--

CREATE TABLE `img_prodotto` (
  `id_img_prodotto` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `directory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `img_utente`
--

CREATE TABLE `img_utente` (
  `id_img_utente` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `directory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
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
-- Table structure for table `orders_clients`
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
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `preferiti`
--

CREATE TABLE `preferiti` (
  `id_preferiti` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
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
  `hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `folder`, `created_at`, `updated_at`, `category_id`, `quantity`, `url`, `link_to`, `order_position`, `procurements`, `tags`, `hidden`) VALUES
(1, 'images/tC7CtdU1qvXZz5k3OMlMf7Hj1WhOrLNJvNHmXl3T.png', 1547726874, '2019-01-17 12:07:55', '2019-01-17 11:10:05', 1, 1, 'adsadasda-1', NULL, 1, 0, 'lol', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_translations`
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
-- Dumping data for table `products_translations`
--

INSERT INTO `products_translations` (`id`, `for_id`, `name`, `description`, `price`, `locale`) VALUES
(1, 1, '', '', '', 'bg'),
(2, 1, 'adsadasda', 'asdadasd', '32', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `recapiti`
--

CREATE TABLE `recapiti` (
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rimborsi`
--

CREATE TABLE `rimborsi` (
  `id_rimborso` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `approvato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`, `isAdmin`) VALUES
(1, 'User4u', 'kiro@dev.bg', '$2y$10$lKcdQgqvk40/iQ3wIkH9ou/p30fhueK/WQmKuEAXYbU0yzRAONoX6', '2017-09-14 03:06:28', '2017-09-14 03:06:28', 'brDBgCEFcZ3BDzAall8LxmHOV41HX4H4ZzC4KTnHIJ6qR5Z7z5ECKIfUWeoC', 0),
(2, 'asd', 'dio@ca.ne', '$2y$10$yhB2C6NNn2yRuLXS39B8a.qBYyZ4Pcbfo5iOcJnNyy7923lSCmLhO', '2019-01-17 12:24:20', '2019-01-17 12:24:20', 'Ha3ltU8e8tcchdCSw1jjH7mcMQd7ceGLYegFiD5M2fI0TWA8OydOVbtk2T2S', 0),
(3, 'ff', 'fff@f.f', '$2y$10$CD/daBpKDfFqQILzzxkpxeIXDvHe0xtJnpVIr67uHMpSf3LLNrCxK', '2019-03-13 13:04:30', '2019-03-13 13:04:30', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel_translations`
--
ALTER TABLE `carousel_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `categories_translations`
--
ALTER TABLE `categories_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fast_orders`
--
ALTER TABLE `fast_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_utente`
--
ALTER TABLE `img_utente`
  ADD PRIMARY KEY (`id_img_utente`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `orders_clients`
--
ALTER TABLE `orders_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferiti`
--
ALTER TABLE `preferiti`
  ADD PRIMARY KEY (`id_preferiti`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_translations`
--
ALTER TABLE `products_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rimborsi`
--
ALTER TABLE `rimborsi`
  ADD PRIMARY KEY (`id_rimborso`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carousel_translations`
--
ALTER TABLE `carousel_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories_translations`
--
ALTER TABLE `categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fast_orders`
--
ALTER TABLE `fast_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_utente`
--
ALTER TABLE `img_utente`
  MODIFY `id_img_utente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_clients`
--
ALTER TABLE `orders_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferiti`
--
ALTER TABLE `preferiti`
  MODIFY `id_preferiti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products_translations`
--
ALTER TABLE `products_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rimborsi`
--
ALTER TABLE `rimborsi`
  MODIFY `id_rimborso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
