-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2026 at 08:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livewire-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', '2026-03-11 23:02:50', '2026-03-11 23:02:50'),
(2, 'iPhone', '2026-03-12 00:15:54', '2026-03-12 00:15:54'),
(3, 'Sony', '2026-04-05 04:48:31', '2026-04-05 04:48:31'),
(4, 'vivo', '2026-04-06 00:00:51', '2026-04-06 00:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `customer_sales`
--

CREATE TABLE `customer_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_sales`
--

INSERT INTO `customer_sales` (`id`, `sale_id`, `user_id`, `created_at`, `updated_at`) VALUES
(43, 184, 15, '2026-04-13 05:56:52', '2026-04-13 05:56:52'),
(44, 183, 16, '2026-04-13 06:02:16', '2026-04-13 06:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(39, '2026_03_12_043023_change_product_name_to_product_id_in_order_details_table', 1),
(51, '2014_10_12_000000_create_users_table', 2),
(52, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(53, '2019_08_19_000000_create_failed_jobs_table', 2),
(54, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(55, '2026_03_03_085546_create_permission_tables', 2),
(56, '2026_03_08_052110_create_brands_table', 2),
(57, '2026_03_08_062009_create_products_table', 2),
(58, '2026_03_08_070838_create_stocks_table', 2),
(59, '2026_03_09_074544_create_orders_table', 2),
(60, '2026_03_09_084634_create_order_details_table', 2),
(61, '2026_03_10_090545_create_admins_table', 2),
(62, '2026_03_12_044918_change_product_name_to_product_id_in_order_details_table', 2),
(63, '2026_03_15_045653_add_default_order_status_to_orders_table', 3),
(64, '2026_03_16_045647_create_sales_table', 4),
(65, '2026_04_07_062010_create_customer_sales_table', 5),
(66, '2026_04_09_082536_create_customer_sales_table', 6),
(67, '2026_04_09_083545_create_customer_sales_table', 7),
(69, '2026_04_13_044319_create_user_mappings_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 12),
(5, 'App\\Models\\User', 13),
(5, 'App\\Models\\User', 14),
(5, 'App\\Models\\User', 15),
(5, 'App\\Models\\User', 16),
(5, 'App\\Models\\User', 17),
(5, 'App\\Models\\User', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_status`, `created_at`, `updated_at`) VALUES
(13, 1, 'pending', '2026-03-30 00:40:25', '2026-03-30 00:40:25'),
(15, 12, 'confirmed', '2026-03-30 22:52:38', '2026-04-05 22:24:42'),
(16, 1, 'pending', '2026-04-01 06:01:49', '2026-04-01 06:01:49'),
(17, 1, 'pending', '2026-04-05 04:52:01', '2026-04-05 04:52:01'),
(18, 1, 'pending', '2026-04-05 23:50:27', '2026-04-05 23:50:27'),
(19, 12, 'pending', '2026-04-05 23:56:56', '2026-04-05 23:56:56'),
(20, 1, 'pending', '2026-04-06 00:02:39', '2026-04-06 00:02:39'),
(21, 2, 'confirmed', '2026-04-06 23:01:31', '2026-04-06 23:01:57'),
(22, 1, 'confirmed', '2026-04-07 03:50:23', '2026-04-07 03:50:45'),
(23, 1, 'confirmed', '2026-04-08 02:15:16', '2026-04-08 02:15:24'),
(24, 1, 'pending', '2026-04-08 03:57:25', '2026-04-08 03:57:25'),
(25, 2, 'pending', '2026-04-08 05:22:59', '2026-04-08 05:22:59'),
(26, 2, 'confirmed', '2026-04-08 05:49:00', '2026-04-08 22:29:27'),
(27, 2, 'confirmed', '2026-04-08 22:39:58', '2026-04-09 00:15:17'),
(28, 2, 'confirmed', '2026-04-08 22:42:52', '2026-04-09 00:15:24'),
(29, 2, 'pending', '2026-04-09 00:19:53', '2026-04-09 00:19:53'),
(30, 2, 'pending', '2026-04-11 22:41:06', '2026-04-11 22:41:06'),
(35, 2, 'pending', '2026-04-11 22:54:27', '2026-04-11 22:54:27'),
(36, 2, 'confirmed', '2026-04-11 23:04:09', '2026-04-11 23:12:11'),
(37, 2, 'pending', '2026-04-11 23:14:58', '2026-04-11 23:14:58'),
(38, 2, 'pending', '2026-04-11 23:28:14', '2026-04-11 23:28:14'),
(39, 2, 'pending', '2026-04-11 23:29:14', '2026-04-11 23:29:14'),
(40, 1, 'pending', '2026-04-12 00:23:19', '2026-04-12 00:23:19'),
(41, 2, 'confirmed', '2026-04-12 00:28:27', '2026-04-19 03:19:31'),
(42, 2, 'pending', '2026-04-12 02:17:20', '2026-04-12 02:17:20'),
(44, 2, 'confirmed', '2026-04-12 05:22:03', '2026-04-19 00:31:31'),
(46, 2, 'confirmed', '2026-04-16 04:03:49', '2026-04-16 04:04:03'),
(47, 2, 'confirmed', '2026-04-16 04:04:21', '2026-04-16 04:04:43'),
(48, 2, 'confirmed', '2026-04-19 02:57:42', '2026-04-19 03:16:09'),
(49, 1, 'confirmed', '2026-04-19 03:17:08', '2026-04-19 03:34:57'),
(50, 1, 'confirmed', '2026-04-19 03:43:31', '2026-04-19 03:48:55'),
(51, 1, 'confirmed', '2026-04-19 03:54:33', '2026-04-20 00:01:03'),
(53, 1, 'confirmed', '2026-04-19 23:52:35', '2026-04-19 23:53:13'),
(54, 2, 'confirmed', '2026-04-19 23:53:03', '2026-04-19 23:53:28'),
(55, 2, 'confirmed', '2026-04-20 00:05:41', '2026-04-20 00:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_quantity`, `created_at`, `updated_at`, `product_id`) VALUES
(16, 13, 1, '2026-03-30 00:40:25', '2026-03-30 00:40:25', 3),
(18, 15, 2, '2026-03-30 22:52:38', '2026-03-30 22:52:38', 4),
(19, 15, 1, '2026-03-30 22:52:38', '2026-03-30 22:52:38', 3),
(20, 16, 2, '2026-04-01 06:01:49', '2026-04-01 06:01:49', 1),
(21, 16, 1, '2026-04-01 06:01:49', '2026-04-01 06:01:49', 3),
(22, 17, 3, '2026-04-05 04:52:01', '2026-04-05 04:52:01', 5),
(23, 17, 1, '2026-04-05 04:52:01', '2026-04-05 04:52:01', 2),
(24, 18, 5, '2026-04-05 23:50:27', '2026-04-05 23:50:27', 6),
(25, 19, 3, '2026-04-05 23:56:56', '2026-04-05 23:56:56', 5),
(26, 20, 10, '2026-04-06 00:02:39', '2026-04-06 00:02:39', 7),
(27, 21, 2, '2026-04-06 23:01:31', '2026-04-06 23:01:31', 5),
(28, 22, 2, '2026-04-07 03:50:23', '2026-04-07 03:50:23', 3),
(29, 23, 3, '2026-04-08 02:15:16', '2026-04-08 02:15:16', 4),
(30, 24, 2, '2026-04-08 03:57:25', '2026-04-08 03:57:25', 4),
(31, 25, 2, '2026-04-08 05:22:59', '2026-04-08 05:22:59', 6),
(32, 26, 1, '2026-04-08 05:49:00', '2026-04-08 05:49:00', 4),
(33, 27, 2, '2026-04-08 22:39:58', '2026-04-08 22:39:58', 5),
(34, 28, 2, '2026-04-08 22:42:52', '2026-04-08 22:42:52', 6),
(35, 29, 2, '2026-04-09 00:19:53', '2026-04-09 00:19:53', 1),
(36, 30, 1, '2026-04-11 22:41:06', '2026-04-11 22:41:06', 4),
(37, 30, 1, '2026-04-11 22:41:06', '2026-04-11 22:41:06', 1),
(42, 35, 2, '2026-04-11 22:54:27', '2026-04-11 22:54:27', 3),
(43, 36, 2, '2026-04-11 23:04:09', '2026-04-11 23:04:09', 3),
(44, 37, 1, '2026-04-11 23:14:59', '2026-04-11 23:14:59', 3),
(45, 38, 1, '2026-04-11 23:28:14', '2026-04-11 23:28:14', 3),
(46, 39, 2, '2026-04-11 23:29:14', '2026-04-11 23:29:14', 3),
(47, 40, 1, '2026-04-12 00:23:19', '2026-04-12 00:23:19', 1),
(48, 41, 2, '2026-04-12 00:28:27', '2026-04-12 00:28:27', 6),
(49, 42, 2, '2026-04-12 02:17:20', '2026-04-12 02:17:20', 3),
(51, 44, 2, '2026-04-12 05:22:03', '2026-04-12 05:22:03', 2),
(52, 44, 2, '2026-04-12 05:22:03', '2026-04-12 05:22:03', 7),
(54, 46, 1, '2026-04-16 04:03:49', '2026-04-16 04:03:49', 2),
(55, 47, 1, '2026-04-16 04:04:21', '2026-04-16 04:04:21', 2),
(56, 48, 2, '2026-04-19 02:57:42', '2026-04-19 02:57:42', 5),
(57, 48, 3, '2026-04-19 02:57:42', '2026-04-19 02:57:42', 2),
(58, 48, 2, '2026-04-19 02:57:42', '2026-04-19 02:57:42', 6),
(59, 49, 2, '2026-04-19 03:17:08', '2026-04-19 03:17:08', 3),
(60, 49, 2, '2026-04-19 03:17:08', '2026-04-19 03:17:08', 2),
(61, 50, 2, '2026-04-19 03:43:31', '2026-04-19 03:43:31', 6),
(62, 51, 2, '2026-04-19 03:54:33', '2026-04-19 03:54:33', 6),
(63, 51, 2, '2026-04-19 03:54:33', '2026-04-19 03:54:33', 6),
(65, 53, 3, '2026-04-19 23:52:35', '2026-04-19 23:52:35', 5),
(66, 54, 2, '2026-04-19 23:53:03', '2026-04-19 23:53:03', 5),
(67, 55, 2, '2026-04-20 00:05:41', '2026-04-20 00:05:41', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('customer@gmail.com', '$2y$12$KlnndSNSxC8KLRgw9nBjT.RmNgM/rVqF5kJUO8rRlki1kjyIrJBme', '2026-03-30 05:26:56'),
('distributor@gmail.com', '$2y$12$WISLE/4McnSGaIHZfkW9UOsoUWdXXJPAPSnD5vz23zIcUM9wQ.7yS', '2026-04-09 03:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit', 'web', '2026-03-11 23:02:39', '2026-03-11 23:02:39'),
(3, 'delete', 'web', '2026-03-12 01:02:55', '2026-03-12 01:02:55'),
(4, 'brand_menu', 'web', '2026-03-15 01:54:34', '2026-03-15 01:54:34'),
(5, 'Products_menu', 'web', '2026-03-15 02:06:05', '2026-03-15 02:06:05'),
(6, 'stock_menu', 'web', '2026-03-15 02:08:05', '2026-03-15 02:08:05'),
(7, 'permissions_menu', 'web', '2026-03-15 02:13:49', '2026-03-15 02:14:25'),
(8, 'role_menu', 'web', '2026-03-15 02:15:14', '2026-03-15 02:15:14'),
(9, 'user_menu', 'web', '2026-03-15 02:16:37', '2026-03-15 02:16:37'),
(12, 'name_column', 'web', '2026-03-30 23:30:31', '2026-03-30 23:30:31'),
(13, 'upload_button', 'web', '2026-03-30 23:37:14', '2026-03-30 23:37:14'),
(14, 'sale_report_menu', 'web', '2026-04-05 22:33:10', '2026-04-05 22:33:10'),
(15, 'order_confirm_button', 'web', '2026-04-06 23:03:28', '2026-04-06 23:03:28'),
(16, 'order_cancel_button', 'web', '2026-04-06 23:04:08', '2026-04-06 23:04:08'),
(17, 'order_distributor_button', 'web', '2026-04-08 23:02:17', '2026-04-08 23:02:17'),
(18, 'user_mapping_menu', 'web', '2026-04-12 22:37:23', '2026-04-12 22:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Samsung s24 Ultra', '2026-03-11 23:03:01', '2026-03-11 23:03:01'),
(2, 1, 'iPhone 15 Pro Max', '2026-03-12 00:16:14', '2026-04-05 03:48:52'),
(3, 1, 'Tecno Camon 50', NULL, NULL),
(4, 2, 'Product 1', '2026-03-28 23:11:23', '2026-03-28 23:11:23'),
(5, 3, 'Xperia 1 VII | Ultra-Wide Camera + Xperia Intelligence | Long Battery Life', '2026-04-05 04:50:47', '2026-04-19 23:52:03'),
(6, 3, 'Sony Xperia 11', '2026-04-05 23:49:10', '2026-04-05 23:49:10'),
(7, 4, 'vivo X200 Pro', '2026-04-06 00:01:47', '2026-04-06 00:01:47'),
(8, 4, 'Vivo Y31d (8/128GB)', '2026-04-20 00:04:33', '2026-04-20 00:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-03-11 23:02:31', '2026-03-11 23:02:31'),
(3, 'distributor', 'web', '2026-03-12 01:38:24', '2026-04-06 23:23:19'),
(5, 'customer', 'web', '2026-04-06 23:25:40', '2026-04-06 23:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 3),
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `stock_id`, `created_at`, `updated_at`) VALUES
(183, 2, 20, '2026-04-13 05:54:47', '2026-04-13 05:54:47'),
(184, 2, 21, '2026-04-13 05:54:47', '2026-04-13 05:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `serial_number`, `created_at`, `updated_at`) VALUES
(7, 4, '1', '2026-03-28 23:11:54', '2026-03-28 23:11:54'),
(8, 3, '100', '2026-03-30 00:39:47', '2026-03-30 00:39:47'),
(9, 1, '1000', '2026-04-02 00:22:21', '2026-04-02 00:22:21'),
(10, 1, '101', '2026-04-02 06:03:59', '2026-04-02 06:03:59'),
(11, 5, '7', '2026-04-05 04:51:29', '2026-04-05 04:51:29'),
(12, 5, '102', '2026-04-05 23:11:43', '2026-04-05 23:11:43'),
(13, 6, '103', '2026-04-05 23:50:01', '2026-04-05 23:50:01'),
(14, 6, '104', '2026-04-05 23:58:14', '2026-04-05 23:58:14'),
(15, 7, '105', '2026-04-06 00:02:18', '2026-04-06 00:02:18'),
(16, 7, '106', '2026-04-06 00:06:04', '2026-04-06 00:06:04'),
(17, 3, '50', '2026-04-12 00:24:13', '2026-04-12 00:24:13'),
(18, 6, '11', '2026-04-12 00:25:39', '2026-04-12 00:25:39'),
(19, 6, '12', '2026-04-12 00:25:39', '2026-04-12 00:25:39'),
(20, 2, '155', '2026-04-12 05:26:48', '2026-04-12 05:26:48'),
(21, 2, '156', '2026-04-12 05:33:28', '2026-04-12 05:33:28'),
(22, 6, '13', '2026-04-19 04:15:37', '2026-04-19 04:15:37'),
(23, 8, '31', '2026-04-20 00:05:08', '2026-04-20 00:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ibrahim Khan', 'admin@gmail.com', '2026-03-11 23:01:41', '$2y$12$0gbUY/bsIG3VhtVVqGY2ieap7tC1AIBAStcKt7yGhTLDyCDX5aeKW', 'fm0YP7NgdFl499P6N2n7s1rwNSQ9UsQGX5dmAe1OBLU9R4uLbTidXJ6nodoj', '2026-03-11 23:01:42', '2026-04-08 22:28:04'),
(2, 'distributor', 'distributor@gmail.com', '2026-03-11 23:01:42', '$2y$12$4EDH5SJGhVcCf.3NwfllWum5S9rVxK7v/OJkxsiK6XhK9Wgc3SKOm', 'GEKuiKItEx2yoD5hu6jSfSK0pSY5YsVtLVrITcd3Z4DwHJa1HSSoyushRufv', '2026-03-11 23:01:42', '2026-04-08 23:13:58'),
(12, 'milon', 'milon@gmail.com', '2026-04-01 10:27:30', '$2y$12$IHNGROUvT8fsrO.i/VkPv.JNDwVX6OGFXbLFn8scFSZfYtoS.Zi5G', NULL, '2026-03-30 22:51:27', '2026-04-08 22:28:34'),
(13, 'customer', 'customer@gmail.com', NULL, '$2y$12$19RhF1ZMxSh55oFiP3eq7.PkajsLNendGD/JfMlA2cFnns34gbL.C', NULL, '2026-04-06 23:26:21', '2026-04-08 23:07:27'),
(14, 'Ibrahim Khan', 'mribrahimkhan360@gmail.com', NULL, '$2y$12$KK/UKqFl4pEH4oNmpCL6.uusj2Gah9jQ7fqPYAt.lh21Qazk16qte', 'ecMgRB6rMmBPoxVkWUasifX5eQxYJQMBpn3FQ4xzhuc3eK4Svxh85lCqbhE0', '2026-04-09 03:24:28', '2026-04-09 03:25:42'),
(15, 'customer 2', 'customer2@gmail.com', NULL, '$2y$12$BrOHEMSTg2w0Wsx9KoPOjOdhyjs66gyNMT4j1Y9VwH/JVYF3SVIP.', NULL, '2026-04-12 03:15:57', '2026-04-12 03:37:10'),
(16, 'customer3', 'customer3@gmail.com', NULL, '$2y$12$IgXvOTPXFnR5i975dYfcQul6uZ7wHq1DKIhUpm.e07GWa4eaopPrC', NULL, '2026-04-12 03:36:39', '2026-04-12 03:36:39'),
(17, 'customer 4', 'customer4@gmail.com', NULL, '$2y$12$s1niDPeRxnjMB/ASyNk4C.zKKkjUDMNdSPmIcR7R2f.UDSpgy04T2', NULL, '2026-04-19 03:44:30', '2026-04-19 03:44:30'),
(18, 'customer 5', 'customer5@gmail.com', NULL, '$2y$12$geGnQl.FRvAPQV0FKL8fpOPVddA46XgpcIPZF4jP4Gnjwux1IvV6O', NULL, '2026-04-20 00:07:28', '2026-04-20 00:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_mappings`
--

CREATE TABLE `user_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `distributor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_mappings`
--

INSERT INTO `user_mappings` (`id`, `customer_id`, `distributor_id`, `created_at`, `updated_at`) VALUES
(11, 13, 2, '2026-04-15 02:13:48', '2026-04-15 02:13:48'),
(13, 14, 2, '2026-04-19 03:21:35', '2026-04-19 03:21:35'),
(14, 15, 2, '2026-04-19 03:21:47', '2026-04-19 03:21:47'),
(17, 16, 2, '2026-04-19 03:30:36', '2026-04-19 03:30:36'),
(20, 17, 2, '2026-04-19 03:44:44', '2026-04-19 03:44:44'),
(23, 18, 2, '2026-04-20 00:08:10', '2026-04-20 00:08:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `customer_sales`
--
ALTER TABLE `customer_sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_sales_sale_id_unique` (`sale_id`),
  ADD KEY `customer_sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`),
  ADD KEY `sales_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stocks_serial_number_unique` (`serial_number`),
  ADD KEY `stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_mappings`
--
ALTER TABLE `user_mappings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_mappings_customer_id_unique` (`customer_id`),
  ADD KEY `user_mappings_distributor_id_foreign` (`distributor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_sales`
--
ALTER TABLE `customer_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_mappings`
--
ALTER TABLE `user_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_sales`
--
ALTER TABLE `customer_sales`
  ADD CONSTRAINT `customer_sales_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_mappings`
--
ALTER TABLE `user_mappings`
  ADD CONSTRAINT `user_mappings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_mappings_distributor_id_foreign` FOREIGN KEY (`distributor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
