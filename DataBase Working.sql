-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2020 at 11:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ahsan_local_ahsanapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `created_by`, `coupon_type`, `coupon_value`, `status`, `extra_field`, `created_at`, `updated_at`) VALUES
(1, '1', 'percentage', '25', 'off', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(2, '3', 'percentage', '10', 'off', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(3, '3', 'percentage', '25', 'on', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `products` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `created_by`, `title`, `description`, `image`, `products`, `price`, `service_charges`, `extra_field`, `created_at`, `updated_at`) VALUES
(1, '2', 'Macie Botsford', 'Delectus omnis vel accusamus voluptatibus error. Eius praesentium et enim.', 'default.png', '5', NULL, '200', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(2, '3', 'Dr. Josiah Lebsack Jr.', 'Eos et qui praesentium commodi culpa consequuntur assumenda.', 'default.png', '3', NULL, '250', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(3, '1', 'Mrs. Mariana Bradtke Sr.', 'Quo minima recusandae voluptatibus asperiores voluptatem sit.', 'default.png', '5', NULL, '100', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(4, '1', 'Mac Schultz', 'Sunt voluptas aut rerum commodi alias aut deleniti.', 'default.png', '5', NULL, '100', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `gmaps_geocache`
--

CREATE TABLE `gmaps_geocache` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `google_maps`
--

CREATE TABLE `google_maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `extra_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_maps`
--

INSERT INTO `google_maps` (`id`, `created_by`, `lat`, `long`, `distance`, `extra_field`, `created_at`, `updated_at`) VALUES
(1, '1', '31.511765928092984', '74.32874508972168', '100', NULL, '2020-02-13 05:22:16', '2020-02-13 05:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_07_084657_create_roles_table', 1),
(4, '2019_09_07_085150_create_user_role_table', 1),
(5, '2019_09_07_092654_create_user_details_table', 1),
(6, '2019_09_07_183406_create_orders_table', 1),
(7, '2019_09_07_183419_create_products_table', 1),
(8, '2019_09_07_183438_create_product_categories_table', 1),
(9, '2019_09_07_183723_create_invoices_table', 1),
(10, '2019_09_17_112947_create_services_table', 1),
(11, '2019_09_17_134905_create_deals_table', 1),
(12, '2019_10_14_151134_create_order_chats_table', 1),
(13, '2019_11_07_141227_create_coupons_table', 1),
(14, '2020_01_27_142509_create_gmaps_geocache_table', 1),
(15, '2020_02_06_133015_create_service_categories_table', 1),
(16, '2020_02_07_132846_create_google_maps_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deal_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_chats`
--

CREATE TABLE `order_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciver_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sizes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'featured',
  `on_sale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'on_sale',
  `regular_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'available',
  `service_charges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_by`, `name`, `description`, `brand`, `discount`, `total_amount`, `quantity`, `sizes`, `expire_date`, `is_featured`, `on_sale`, `regular_price`, `sale_price`, `product_image`, `category_id`, `tags`, `status`, `service_charges`, `created_at`, `updated_at`) VALUES
(1, '5', 'Vinnie Legros', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2707', NULL, 'default.png', '1', NULL, NULL, '82', '2020-02-13 05:22:16', '2020-02-13 05:25:24'),
(2, '1', 'Ora Rutherford', 'Incidunt molestiae quis quo qui voluptatem.', 'Est odit.', '610', '764', '582', '903', '22', 'featured', 'not_on_sale', '5290', '25', 'default.png', '5', NULL, 'not_available', '584', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(3, '3', 'Cassidy Hansen PhD', 'Rerum atque sequi explicabo rerum.', 'Possimus.', '11', '481', '217', '349', '958', 'not_featured', 'not_on_sale', '3460', '86', 'default.png', '3', NULL, 'not_available', '521', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(4, '4', 'Della Gaylord', 'Et doloribus quia deleniti illo itaque aut officiis quam.', 'Magnam.', '729', '653', '146', '441', '638', 'not_featured', 'not_on_sale', '464', '96', 'default.png', '2', NULL, 'not_available', '558', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(5, '1', 'Derrick Sporer', 'Nam sequi voluptates pariatur quia recusandae sint.', 'Atque.', '151', '544', '774', '593', '374', 'featured', 'on_sale', '6690', '41', 'default.png', '1', NULL, 'available', '934', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(6, '4', 'Ahmad Volkman', 'Quae porro rem natus laboriosam officiis.', 'Vero quia.', '746', '160', '519', '785', '140', 'not_featured', 'on_sale', '7166', '17', 'default.png', '3', NULL, 'available', '467', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(7, '4', 'Theodora Hessel MD', 'Excepturi rerum officiis assumenda.', 'Fugit.', '644', '368', '643', '291', '580', 'featured', 'not_on_sale', '595', '46', 'default.png', '3', NULL, 'available', '980', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(8, '3', 'Ms. Kirsten Abernathy MD', 'Officia voluptas deleniti vitae provident aperiam quia voluptatem incidunt.', 'Explicabo.', '296', '448', '64', '234', '864', 'not_featured', 'not_on_sale', '2431', '36', 'default.png', '4', NULL, 'available', '894', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(9, '1', 'Tremaine Terry', 'Libero vel voluptatem deserunt adipisci. Dolor esse debitis occaecati totam.', 'Tenetur.', '614', '313', '535', '481', '593', 'not_featured', 'on_sale', '3379', '86', 'default.png', '3', NULL, 'available', '245', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(10, '5', 'Grover Murazik', 'Porro iure ducimus quo ea quasi.', 'At maxime.', '617', '653', '976', '97', '257', 'not_featured', 'on_sale', '8847', '36', 'default.png', '3', NULL, 'available', '981', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(11, '1', 'asdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, '', '1', NULL, NULL, '213', '2020-02-13 05:26:12', '2020-02-13 05:26:12'),
(12, '1', 'dsadsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, '', '1', NULL, NULL, '213', '2020-02-13 05:26:24', '2020-02-13 05:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `created_by`, `name`, `description`, `category_image`, `created_at`, `updated_at`) VALUES
(1, '1', 'Amari Walker', 'Sint distinctio velit voluptatem quisquam quibusdam sit deleniti.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(2, '1', 'Prof. Amya McCullough III', 'Impedit aspernatur facilis esse unde neque.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(3, '4', 'Mrs. Emmy Schoen DVM', 'Temporibus tempora reiciendis quidem quis nostrum rerum.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(4, '5', 'Miss Audrey Hegmann', 'Esse qui facere optio. Omnis ut et aut incidunt culpa omnis enim.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(5, '2', 'Merl Sauer', 'Atque rerum voluptatem dolores adipisci molestias.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Admin User', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(2, 'Admin', 'Admin User', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(3, 'Rider', 'Rider User', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(4, 'Customer', 'Customer User', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(5, 'Service Provider', 'Service Provider User', '2020-02-13 05:22:16', '2020-02-13 05:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `title`, `description`, `image`, `time`, `price`, `location`, `category_id`, `extra_field`, `created_at`, `updated_at`) VALUES
(1, '3', 'Prof. Desiree Muller Jr.', 'Voluptatem non et voluptas id.', 'user.png', '15', '2000', 'islamabad', '3', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(2, '2', 'Natalie Hettinger', 'Repellendus minus aut nihil et laboriosam ea fugiat.', 'user.png', '15', '1500', 'islamabad', '4', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(3, '2', 'Madisyn Crona', 'Voluptas nihil sed repellendus sapiente dignissimos ut saepe dolore.', 'user.png', '10', '2500', 'sind', '2', NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `created_by`, `name`, `description`, `category_image`, `created_at`, `updated_at`) VALUES
(1, '5', 'Sheldon Stanton', 'Ut sed aperiam quia. Iusto voluptate consequatur eius quos laborum.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(2, '2', 'Miss Amya Blanda', 'Eos quis natus alias iusto aperiam eius.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(3, '4', 'Stella Stehr', 'Illo nemo fugit enim voluptatem excepturi.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(4, '2', 'Mrs. Alice Larkin V', 'Sit recusandae nostrum quia velit deserunt ducimus quaerat.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(5, '3', 'Miss Makenzie Weber I', 'Iure ipsa reprehenderit rerum in.', 'default.png', '2020-02-13 05:22:16', '2020-02-13 05:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token_expireIn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `is_active`, `created_by`, `api_token`, `api_token_expireIn`, `fcm_token`, `fcm_token_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin User', 'superadmin@project.com', NULL, NULL, '$2y$10$WPssFP4oqthO5/qx6MilZejgUzzv2yZOLwCiJvAWnYF8lfIfOYIIq', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(2, 'Admin User', 'admin@project.com', NULL, NULL, '$2y$10$J7qNnCgrUaVnTjxunSZ50.2qZVoSqbSZK0hnCsuiemVXg/u.skg9W', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(3, 'Rider User', 'rider@project.com', NULL, NULL, '$2y$10$9dxjShbEpfMHHHUaPobCtuGSFdk2ol6MtMegPDZeX.dw9ZcM8K2XW', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(4, 'Customer User', 'customer@project.com', NULL, NULL, '$2y$10$eBHKZRj45Fi04xOZ2qY52.thIBTyink363H2n2Ygsa2923Ahq2SZ.', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(5, 'Service Provider User', 'serviceprovider@project.com', NULL, NULL, '$2y$10$3TX4aWlPydc/WZoKJKCmoOR/oFRUWUWZQH.rL/.OT12r7YAr03aJq', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_front` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_back` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'user.png',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `phone_number`, `address`, `cnic`, `cnic_front`, `cnic_back`, `profile_image`, `location`, `city`, `latitude`, `longitude`, `skills`, `occupation`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 0, 'First Name', 'Last Name', NULL, 'address', 'CNIC', NULL, NULL, 'user.png', 'Location', 'City', '31.5204', '74.3587', 'Skills', 'Occupation', 'User Type', '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(2, 1, 'Super Admin', NULL, NULL, NULL, NULL, NULL, NULL, 'user.png', NULL, 'Lahore', '31.5204', '74.3587', NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(3, 2, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, 'user.png', NULL, 'city', '51.5074', '-0.1278', NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(4, 3, 'Rider', NULL, NULL, NULL, NULL, NULL, NULL, 'user.png', NULL, 'city', '1.3521', '103.8198', NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(5, 4, 'Customer', NULL, NULL, NULL, NULL, NULL, NULL, 'user.png', NULL, 'city', '24.8607', '67.0011', NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16'),
(6, 5, 'Service Provider', NULL, NULL, NULL, NULL, NULL, NULL, 'user.png', NULL, 'city', '33.6844', '73.0479', NULL, NULL, NULL, '2020-02-13 05:22:16', '2020-02-13 05:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, '2', '2', NULL, NULL),
(3, '3', '3', NULL, NULL),
(4, '4', '4', NULL, NULL),
(5, '5', '5', NULL, NULL),
(6, '1', '1', NULL, NULL),
(7, '1', '2', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_maps`
--
ALTER TABLE `google_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_chats`
--
ALTER TABLE `order_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_maps`
--
ALTER TABLE `google_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_chats`
--
ALTER TABLE `order_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
