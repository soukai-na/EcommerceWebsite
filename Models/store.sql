-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 22 nov. 2022 à 20:40
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `store`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(8, 'Printers', '', '2022-11-07 14:26:36'),
(9, 'Smartphones', '', '2022-11-08 16:25:47'),
(11, 'Speakers', '', '2022-11-07 14:27:42'),
(17, 'Laptops', '', '2022-11-08 16:25:05'),
(18, 'Mouses', '', '2022-11-08 16:25:11'),
(19, 'Camera', '', '2022-11-22 16:16:45'),
(20, 'Headphones', '', '2022-11-08 16:36:51'),
(21, 'Earbuds', '', '2022-11-09 16:54:29');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `email`, `message`, `created_at`) VALUES
(2, 'soukaina bendaoud', 'bendaouds62@gmail.com', 'Hi i love your store ', '2022-11-17 10:20:22'),
(3, 'sou sou', 'sousou@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pellentesque sit amet porttitor eget dolor morbi non arcu.', '2022-11-17 10:28:36'),
(4, 'ok ok', 'ok@gmail', 'ok ojokokokook', '2022-11-18 14:41:34'),
(5, 'test contact', 'contact@gmail.com', 'Hi how are you?', '2022-11-21 14:15:37'),
(7, 'contact test', 'contact@gmail.com', 'hi how are you?', '2022-11-22 16:14:14');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `fname`, `phone`, `address`, `product`, `quantity`) VALUES
(1, 'soukaina', '0650879758', 'ANASSI 35 CASABLANCA', 'Apple Air pods', '1'),
(3, 'test', '6188276636728', 'HAJZJZ67BAHHZUA', 'Microsoft Bluetooth Mouse', '3'),
(4, 'LAKKEZ HEJKZKZ', '6281098267', 'HAKKA 676 HAIUZU87', 'Beats Headphone', '2'),
(5, 'test alert', '0657563412', 'HA HTN89 PAII77', 'Canon Camera', '1'),
(6, 'last one', '072678028', 'ANHDI 7 JIDEK8', 'JBL Headphone', '2'),
(7, 'sou sou', '0876543467', 'Alous 8 london', 'Microsoft Bluetooth Mouse', '5'),
(8, 'test test', '0689766889', 'hahyuujdiols', 'JBL Speaker', '2'),
(10, 'test order', '67839936673', 'DEELKL 785 HJ', 'Beats Headphone', '2');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `category`, `created_at`) VALUES
(9, 'd41d8cd98f00b204e9800998ecf8427e1668010839.png', 'JBL Headphone', 'Aliquet enim tortor at auctor urna nunc id cursus. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Aliquam malesuada bibendum arcu vitae. Mauris ultrices eros in cursus turpis massa tincidunt dui ut. Facilisi cras fermentum odio eu feugiat. Sit amet mattis vulputate enim nulla. Sagittis orci a scelerisque purus semper eget duis at tellus. Ornare lectus sit amet est placerat in. Maecenas accumsan lacus vel facilisis volutpat est velit egestas. Arcu risus quis varius quam quisque id diam vel quam. Fames ac turpis egestas sed. Interdum consectetur libero id faucibus nisl tincidunt eget nullam. Arcu cursus euismod quis viverra nibh. Commodo odio aenean sed adipiscing diam. Suscipit adipiscing bibendum est ultricies integer quis auctor elit sed. Mauris ultrices eros in cursus turpis massa tincidunt dui ut.', 99.95, 'Headphones', '2022-11-15 12:02:38'),
(10, 'd41d8cd98f00b204e9800998ecf8427e1668854879.png', 'Canon Camera', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Etiam sit amet nisl purus in mollis nunc. A lacus vestibulum sed arcu non. Id faucibus nisl tincidunt eget nullam non nisi est. Amet commodo nulla facilisi nullam. Amet volutpat consequat mauris nunc congue. Sapien eget mi proin sed. Aenean euismod elementum nisi quis eleifend. Quis risus sed vulputate odio ut enim blandit volutpat maecenas. Id nibh tortor id aliquet lectus.   ', 700, 'Autres', '2022-11-22 16:17:17'),
(12, 'd41d8cd98f00b204e9800998ecf8427e1668012926.png', 'ha ha ha', ' HJA HEJZKJE HJHJZKDN KJNED ', 200, 'Headphones', '2022-11-18 17:39:20'),
(13, 'd41d8cd98f00b204e9800998ecf8427e1668012979.png', 'JBL Speaker', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Etiam sit amet nisl purus in mollis nunc. A lacus vestibulum sed arcu non. Id faucibus nisl tincidunt eget nullam non nisi est. Amet commodo nulla facilisi nullam. Amet volutpat consequat mauris nunc congue. Sapien eget mi proin sed. Aenean euismod elementum nisi quis eleifend. Quis risus sed vulputate odio ut enim blandit volutpat maecenas. Id nibh tortor id aliquet lectus.', 73.99, 'Speakers', '2022-11-15 12:04:57'),
(14, 'd41d8cd98f00b204e9800998ecf8427e1668495544.png', 'Beats Headphone', 'Beats Solo3 Wireless On-Ear Headphones - Apple W1 Headphone Chip, Class 1 Bluetooth, 40 Hours of Listening Time, Built-in Microphone - Blue (Latest Model)', 161.49, 'Headphones', '2022-11-15 06:59:04'),
(15, 'd41d8cd98f00b204e9800998ecf8427e1668495606.png', 'Microsoft Bluetooth Mouse', 'Microsoft Bluetooth Mouse - Black. Comfortable design, Right/Left Hand Use, 4-Way Scroll Wheel, Wireless Bluetooth Mouse for PC/Laptop/Desktop, works with for Mac/Windows Computers', 11, 'Mouses', '2022-11-15 07:00:06');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fname`) VALUES
(1, 'admin', 'password0000', 'Louis Cooper');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
