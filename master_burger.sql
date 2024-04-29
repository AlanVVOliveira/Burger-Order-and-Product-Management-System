-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/04/2024 às 19:31
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `master_burger`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_07_185817_create_products_table', 2),
(6, '2024_03_14_132727_add_image_to_products', 3),
(7, '2024_03_14_160600_create_orders_table', 4),
(8, '2024_03_27_213455_add_is_active_to_orders', 5),
(9, '2024_04_05_132704_create_expenses_table', 6),
(10, '2024_04_05_132754_create_cash_registers__table', 6),
(11, '2024_04_05_181007_add_expenses_id_to_cash_registers_', 7),
(12, '2024_04_05_181332_add_orders_id_to_cash_registers_', 8),
(13, '2024_04_09_154728_create_cash_register._table', 9),
(14, '2024_04_09_173751_create_cash_registers._table', 10),
(15, '2024_04_13_040531_add_is_active_to_expenses._table', 11),
(16, '2024_04_13_060037_add_cash_registeres_id_to_orders._table', 12),
(17, '2024_04_13_060107_add_cash_registers_id_to_expenses._table', 13),
(18, '2024_04_13_160600_create_orders_table', 14),
(19, '2024_04_13_213455_add_is_active_to_orders', 15),
(20, '2024_04_13_132704_create_expenses_table', 16),
(21, '2024_04_13_061757_add_is_active_to_expenses._table', 17),
(22, '2024_04_13_062043_add_cash_registers_id_to_orders._table', 18),
(23, '2024_04_13_062438_add_cash_registers_id_to_expenses._table', 19),
(24, '2024_04_13_151612_add_expenses_id_to_cash_registers._table', 20),
(25, '2024_04_13_162706_create_cash_register_expenses._table', 21),
(26, '2024_04_13_162811_create_cash_register_orders._table', 21),
(27, '2024_04_14_180752_create_order_product_table', 22),
(28, '2024_04_19_132216_add_status_to_orders_table', 23);

-- --------------------------------------------------------

--
-- Estrutura para tabela `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `bill` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `orders`
--

INSERT INTO `orders` (`id`, `client_name`, `bill`, `created_at`, `updated_at`, `is_active`, `status`) VALUES
(1, 'uli', 55.00, '2024-04-13 19:44:18', '2024-04-15 15:44:47', 0, 'active'),
(2, 'vinicius', 47.00, '2024-04-13 19:59:23', '2024-04-15 15:44:46', 0, 'active'),
(3, 'uli', 10.00, '2024-04-15 15:58:53', '2024-04-17 16:35:09', 0, 'active'),
(4, 'asdasd', 58.00, '2024-04-17 16:45:05', '2024-04-17 20:19:56', 0, 'active'),
(5, 'alan', 58.00, '2024-04-17 20:34:55', '2024-04-17 20:44:48', 0, 'active'),
(6, 'mel', 58.00, '2024-04-17 20:44:59', '2024-04-18 18:27:29', 0, 'active'),
(7, 'marcia', 70.00, '2024-04-17 20:50:46', '2024-04-18 18:32:49', 0, 'active'),
(8, 'alan', 77.00, '2024-04-17 20:53:52', '2024-04-19 15:39:04', 0, 'active'),
(9, 'qweqwe', 18.00, '2024-04-17 20:56:20', '2024-04-19 15:39:03', 0, 'active'),
(10, 'ailson', 47.00, '2024-04-17 21:23:39', '2024-04-19 15:39:02', 0, 'active'),
(11, 'julia', 121.00, '2024-04-17 21:32:58', '2024-04-19 15:39:01', 0, 'active'),
(12, 'uli', 58.00, '2024-04-19 15:49:22', '2024-04-19 16:35:30', 0, 'delivered'),
(13, 'asdasd', 103.00, '2024-04-19 15:49:40', '2024-04-19 16:35:44', 0, 'canceled'),
(14, 'mel', 80.00, '2024-04-19 15:49:50', '2024-04-19 16:36:16', 0, 'delivered'),
(15, 'uli', 18.00, '2024-04-19 18:53:11', '2024-04-19 18:53:28', 0, 'delivered'),
(16, 'ana', 38.00, '2024-04-19 18:53:18', '2024-04-19 19:01:27', 0, 'delivered'),
(17, 'uli', 40.00, '2024-04-19 19:01:34', '2024-04-19 19:03:39', 0, 'delivered'),
(18, 'ana', 44.00, '2024-04-19 19:03:33', '2024-04-19 19:11:55', 0, 'delivered'),
(19, 'uli', 18.00, '2024-04-19 19:18:57', '2024-04-19 19:20:54', 0, 'delivered'),
(20, 'uli', 38.00, '2024-04-19 19:21:12', '2024-04-19 19:22:30', 0, 'delivered'),
(21, 'ana', 25.00, '2024-04-19 19:22:37', '2024-04-22 21:54:52', 0, 'delivered'),
(22, 'asdasd', 74.00, '2024-04-22 21:48:08', '2024-04-22 21:58:21', 0, 'delivered'),
(23, 'vinicius', 55.00, '2024-04-22 21:54:40', '2024-04-23 20:29:39', 0, 'canceled'),
(24, 'uli', 31.50, '2024-04-23 00:55:52', '2024-04-23 20:29:39', 0, 'canceled'),
(25, 'mel', 58.00, '2024-04-23 20:09:36', '2024-04-23 20:09:45', 0, 'canceled'),
(26, 'comprador', 18.00, '2024-04-23 20:30:35', '2024-04-23 20:34:59', 0, 'delivered'),
(27, 'compradorB', 36.00, '2024-04-23 20:30:57', '2024-04-23 20:31:10', 0, 'canceled'),
(28, 'uli', 56.00, '2024-04-23 20:36:15', '2024-04-23 20:38:37', 0, 'delivered'),
(29, 'ana', 47.00, '2024-04-23 20:43:01', '2024-04-23 20:47:15', 0, 'canceled'),
(30, 'vinicius', 54.00, '2024-04-23 20:44:19', '2024-04-23 20:46:57', 0, 'delivered'),
(31, 'mel', 40.00, '2024-04-24 19:42:22', '2024-04-24 21:27:47', 0, 'canceled'),
(32, 'alan oliveira', 18.00, '2024-04-24 19:56:54', '2024-04-24 21:28:00', 0, 'delivered'),
(33, 'ana', 51.00, '2024-04-24 20:54:33', '2024-04-24 21:32:56', 0, 'delivered'),
(34, 'mel', 18.00, '2024-04-24 20:55:28', '2024-04-24 21:48:11', 0, 'canceled'),
(35, 'alan', 18.00, '2024-04-24 20:56:13', '2024-04-24 21:40:01', 0, 'canceled'),
(36, 'marcia', 22.00, '2024-04-24 20:58:16', '2024-04-25 15:51:56', 0, 'delivered'),
(37, 'ana', 18.00, '2024-04-24 21:03:41', '2024-04-26 01:11:22', 0, 'delivered'),
(38, 'alan', 18.00, '2024-04-24 21:06:00', '2024-04-26 01:11:26', 0, 'canceled'),
(39, 'uli', 18.00, '2024-04-24 21:07:16', '2024-04-25 15:47:53', 0, 'canceled'),
(40, 'asdasd', 36.00, '2024-04-24 21:17:56', '2024-04-24 21:51:26', 0, 'canceled'),
(41, 'andeson', 52.00, '2024-04-24 21:19:46', '2024-04-24 21:50:38', 0, 'canceled'),
(42, 'joao', 22.00, '2024-04-26 01:11:53', '2024-04-26 01:12:29', 0, 'delivered'),
(43, 'mel', 60.00, '2024-04-26 01:12:08', '2024-04-26 01:12:31', 0, 'canceled'),
(44, 'julia', 65.00, '2024-04-25 22:14:48', '2024-04-25 22:15:03', 0, 'delivered'),
(45, 'lucas', 47.00, '2024-04-29 14:31:35', '2024-04-29 14:31:35', 1, 'active');

-- --------------------------------------------------------

--
-- Estrutura para tabela `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 2, NULL, NULL),
(2, 6, 2, 1, NULL, NULL),
(3, 7, 4, 1, NULL, NULL),
(4, 7, 2, 1, NULL, NULL),
(5, 7, 1, 1, NULL, NULL),
(6, 8, 4, 1, NULL, NULL),
(7, 8, 3, 1, NULL, NULL),
(8, 8, 2, 1, NULL, NULL),
(9, 9, 1, 1, NULL, NULL),
(10, 10, 17, 1, NULL, NULL),
(11, 10, 15, 1, NULL, NULL),
(12, 10, 1, 2, NULL, NULL),
(13, 11, 12, 1, '2024-04-17 18:32:58', '2024-04-17 18:32:58'),
(14, 11, 8, 1, '2024-04-17 18:32:58', '2024-04-17 18:32:58'),
(15, 11, 4, 3, '2024-04-17 18:32:58', '2024-04-17 18:32:58'),
(16, 12, 1, 2, '2024-04-19 12:49:22', '2024-04-19 12:49:22'),
(17, 12, 2, 1, '2024-04-19 12:49:22', '2024-04-19 12:49:22'),
(18, 13, 1, 1, '2024-04-19 12:49:40', '2024-04-19 12:49:40'),
(19, 13, 2, 1, '2024-04-19 12:49:40', '2024-04-19 12:49:40'),
(20, 13, 5, 1, '2024-04-19 12:49:40', '2024-04-19 12:49:40'),
(21, 13, 3, 1, '2024-04-19 12:49:40', '2024-04-19 12:49:40'),
(22, 14, 3, 2, '2024-04-19 12:49:50', '2024-04-19 12:49:50'),
(23, 14, 4, 1, '2024-04-19 12:49:50', '2024-04-19 12:49:50'),
(24, 15, 1, 1, '2024-04-19 15:53:11', '2024-04-19 15:53:11'),
(25, 16, 5, 1, '2024-04-19 15:53:18', '2024-04-19 15:53:18'),
(26, 17, 1, 1, '2024-04-19 16:01:34', '2024-04-19 16:01:34'),
(27, 17, 2, 1, '2024-04-19 16:01:34', '2024-04-19 16:01:34'),
(28, 18, 8, 1, '2024-04-19 16:03:33', '2024-04-19 16:03:33'),
(29, 18, 6, 1, '2024-04-19 16:03:33', '2024-04-19 16:03:33'),
(30, 18, 1, 1, '2024-04-19 16:03:33', '2024-04-19 16:03:33'),
(31, 19, 1, 1, '2024-04-19 16:18:57', '2024-04-19 16:18:57'),
(32, 20, 6, 1, '2024-04-19 16:21:12', '2024-04-19 16:21:12'),
(33, 20, 4, 1, '2024-04-19 16:21:12', '2024-04-19 16:21:12'),
(34, 21, 3, 1, '2024-04-19 16:22:37', '2024-04-19 16:22:37'),
(35, 22, 1, 2, '2024-04-22 18:48:08', '2024-04-22 18:48:08'),
(36, 22, 5, 1, '2024-04-22 18:48:08', '2024-04-22 18:48:08'),
(37, 23, 4, 1, '2024-04-22 18:54:40', '2024-04-22 18:54:40'),
(38, 23, 3, 1, '2024-04-22 18:54:40', '2024-04-22 18:54:40'),
(39, 24, 8, 1, '2024-04-22 21:55:52', '2024-04-22 21:55:52'),
(40, 24, 19, 1, '2024-04-22 21:55:52', '2024-04-22 21:55:52'),
(41, 24, 14, 2, '2024-04-22 21:55:52', '2024-04-22 21:55:52'),
(42, 25, 1, 2, '2024-04-23 17:09:36', '2024-04-23 17:09:36'),
(43, 25, 2, 1, '2024-04-23 17:09:36', '2024-04-23 17:09:36'),
(44, 26, 1, 1, '2024-04-23 17:30:35', '2024-04-23 17:30:35'),
(45, 27, 10, 1, '2024-04-23 17:30:57', '2024-04-23 17:30:57'),
(46, 27, 7, 1, '2024-04-23 17:30:57', '2024-04-23 17:30:57'),
(47, 27, 6, 1, '2024-04-23 17:30:57', '2024-04-23 17:30:57'),
(48, 28, 1, 1, '2024-04-23 17:36:15', '2024-04-23 17:36:15'),
(49, 28, 8, 1, '2024-04-23 17:36:15', '2024-04-23 17:36:15'),
(50, 28, 12, 1, '2024-04-23 17:36:15', '2024-04-23 17:36:15'),
(51, 28, 11, 1, '2024-04-23 17:36:15', '2024-04-23 17:36:15'),
(52, 29, 2, 1, '2024-04-23 17:43:01', '2024-04-23 17:43:01'),
(53, 29, 3, 1, '2024-04-23 17:43:01', '2024-04-23 17:43:01'),
(54, 30, 1, 3, '2024-04-23 17:44:19', '2024-04-23 17:44:19'),
(55, 31, 1, 1, '2024-04-24 16:42:22', '2024-04-24 16:42:22'),
(56, 31, 2, 1, '2024-04-24 16:42:22', '2024-04-24 16:42:22'),
(57, 32, 1, 1, '2024-04-24 16:56:54', '2024-04-24 16:56:54'),
(58, 33, 5, 1, '2024-04-24 17:54:33', '2024-04-24 17:54:33'),
(59, 33, 6, 1, '2024-04-24 17:54:33', '2024-04-24 17:54:33'),
(60, 33, 18, 1, '2024-04-24 17:54:33', '2024-04-24 17:54:33'),
(61, 34, 1, 1, '2024-04-24 17:55:28', '2024-04-24 17:55:28'),
(62, 35, 1, 1, '2024-04-24 17:56:13', '2024-04-24 17:56:13'),
(63, 36, 7, 1, '2024-04-24 17:58:16', '2024-04-24 17:58:16'),
(64, 36, 6, 1, '2024-04-24 17:58:16', '2024-04-24 17:58:16'),
(65, 37, 1, 1, '2024-04-24 18:03:41', '2024-04-24 18:03:41'),
(66, 38, 1, 1, '2024-04-24 18:06:00', '2024-04-24 18:06:00'),
(67, 39, 1, 1, '2024-04-24 18:07:16', '2024-04-24 18:07:16'),
(68, 40, 1, 2, '2024-04-24 18:17:57', '2024-04-24 18:17:57'),
(69, 41, 5, 1, '2024-04-24 18:19:46', '2024-04-24 18:19:46'),
(70, 41, 10, 1, '2024-04-24 18:19:46', '2024-04-24 18:19:46'),
(71, 42, 2, 1, '2024-04-25 22:11:53', '2024-04-25 22:11:53'),
(72, 43, 4, 2, '2024-04-25 22:12:08', '2024-04-25 22:12:08'),
(73, 44, 5, 1, '2024-04-25 22:14:48', '2024-04-25 22:14:48'),
(74, 44, 2, 1, '2024-04-25 22:14:48', '2024-04-25 22:14:48'),
(75, 44, 14, 1, '2024-04-25 22:14:48', '2024-04-25 22:14:48'),
(76, 45, 2, 1, '2024-04-29 14:31:35', '2024-04-29 14:31:35'),
(77, 45, 3, 1, '2024-04-29 14:31:35', '2024-04-29 14:31:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'burger', '80g carne, salada e molho especial', 18.00, 0, '2024-03-14 14:00:00', '2024-04-23 20:25:55'),
(2, 'x-burger', '100g carne, 30g cheddar, salada e molho especial', 22.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(3, 'x-egg-burger', '100g carne, 30g cheddar, ovo, salada e molho especial', 25.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(4, 'duplo x-burger', '2x 100g carne, 40g cheddar, salada e molho especial', 30.00, 1, '2024-03-14 14:00:00', '2024-04-19 16:02:10'),
(5, 'x-tudo', '150g carne, 60g cheddar, salsicha, ovo, bacon, salada e molho especial', 38.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(6, 'batata P', '80g de batata inglesa frita', 8.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(7, 'batata M', '140g de batata inglesa frita', 14.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(8, 'batata G', '200g de batata inglesa frita', 18.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(9, 'Refrigerante', '1L', 10.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(10, 'Refrigerante', '2L', 14.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(11, 'Suco Copo', '300ml', 7.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(12, 'Suco Jarra', '700ml', 13.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(13, 'Sobremesa I', 'sorvete de doce de leite', 5.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(14, 'Sobremesa II', 'doce de goiaba', 5.00, 1, '2024-03-14 14:00:00', '2024-03-14 14:00:00'),
(15, 'agua', '500ml', 3.00, 1, '2024-03-14 14:00:00', '2024-03-27 22:52:09'),
(17, 'agua', '1L', 8.00, 1, '2024-03-27 01:19:12', '2024-03-27 01:34:09'),
(18, 'Coca-cola 300ml', 'Lata 300ml', 5.00, 1, '2024-04-11 18:16:32', '2024-04-24 20:11:53'),
(19, 'Fanta uva 250ml', 'Lata 250ml', 3.50, 1, '2024-04-11 19:21:00', '2024-04-25 15:52:48'),
(20, 'teste1', 'teste1', 10.00, 0, '2024-04-11 19:28:46', '2024-04-24 21:23:21'),
(21, 'teste2', 'teste2', 8.00, 0, '2024-04-11 19:29:14', '2024-04-25 15:52:30'),
(22, 'teste3', 'teste3', 10.00, 0, '2024-04-12 20:44:49', '2024-04-23 20:25:55'),
(23, 'teste4', 'teste4', 10.00, 0, '2024-04-12 20:57:40', '2024-04-23 20:18:17'),
(24, 'a', 'a', 1.00, 0, '2024-04-12 21:06:10', '2024-04-23 20:17:51'),
(25, 'a', 'a', 1.00, 0, '2024-04-23 01:07:08', '2024-04-23 20:17:09'),
(26, '0', '0', 0.00, 0, '2024-04-23 01:10:24', '2024-04-23 20:14:44'),
(27, 'teste 5', 'teste', 5.00, 0, '2024-04-24 21:22:51', '2024-04-24 21:23:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alan victor valenca de oliveira', 'alan_victor_16@hotmail.com', NULL, '$2y$12$U9tiZE/DfI8j.mjDvpZpIeRM8j4QxJj.uunlz9lSt7IUdJz3R41XC', NULL, '2024-03-06 19:39:58', '2024-03-06 19:39:58');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
