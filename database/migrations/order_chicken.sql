-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 09:25 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_chicken`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tables`
--

CREATE TABLE `cart_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special_instruction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_tables`
--

INSERT INTO `cart_tables` (`id`, `product_id`, `name`, `price`, `quantity`, `order_id`, `created_at`, `updated_at`, `special_instruction`) VALUES
(6, 3, '1/4 Chicken Dark Meat', 8.49, 1, 7, '2019-02-21 08:00:30', '2019-02-21 08:00:30', NULL),
(7, 8, '1/2 Chicken (No Sides)', 9.49, 2, 7, '2019-02-21 08:00:30', '2019-02-21 08:00:30', NULL),
(8, 4, '1/4 Chicken White Meat', 8.99, 1, 8, '2019-02-21 09:40:07', '2019-02-21 09:40:07', NULL),
(9, 7, '1/4 Chicken (No Sides)', 5.79, 2, 9, '2019-02-21 10:38:14', '2019-02-21 10:38:14', NULL);

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
(1, '2018_09_29_060608_users', 1),
(2, '2018_10_01_111015_login__activities', 1),
(3, '2018_10_02_062250_categories__for__products', 1),
(4, '2018_10_02_062636_product__categories', 1),
(6, '2018_10_03_084057_products__images', 1),
(7, '2018_10_03_084147_products__s_e_o_options', 1),
(8, '2018_10_06_100259_store__settings', 1),
(9, '2018_10_10_064207_store__images', 1),
(10, '2018_10_24_105420_orders', 1),
(11, '2018_10_24_140629_store__social__links', 1),
(12, '2018_11_18_164842_order__invoices', 1),
(13, '2018_10_03_083948_products', 2),
(14, '2019_02_15_193727_create_new_user_table', 3),
(15, '2014_10_12_000000_create_users_table', 4),
(16, '2019_02_17_005856_create_shop_tables_table', 5),
(17, '2019_02_20_152358_create_tbl_orders_table', 6),
(18, '2019_02_20_233451_create_cart_tables_table', 7),
(19, '2019_02_20_234133_alter_order_table', 8),
(20, '2019_02_20_235707_del_col_from_order', 9),
(21, '2019_02_21_000645_del_orderno_to_tablorder', 10),
(22, '2019_02_21_092555_move_special_to_cart', 11),
(23, '2019_02_21_092803_add_instruction', 12),
(24, '2019_02_21_094324_remove_cart_id', 13),
(25, '2019_02_21_132810_add_user_order', 14),
(26, '2019_02_21_141718_shop_add', 15);

-- --------------------------------------------------------

--
-- Table structure for table `shop_tables`
--

CREATE TABLE `shop_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories_for_products`
--

CREATE TABLE `tbl_categories_for_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_categories_for_products`
--

INSERT INTO `tbl_categories_for_products` (`id`, `user_id`, `parent_categories`, `name`, `slug`, `meta_keywords`, `meta_description`, `status`, `created_date`, `created_time`) VALUES
(2, 1, '0', 'Chicken Broast', 'chicken-broast', 'broast', 'chicken broast', 0, '2018-12-31', '16:10:09'),
(3, 1, '0', 'Sandwiches', 'sandwiche', '123', '123', 0, '2018-12-31', '16:14:38'),
(4, 1, '0', 'Burgers', 'burger', 'abc', 'abc', 0, '2018-12-31', '16:15:35'),
(5, 1, '0', 'Charcoal Chicken', 'Charcoal-Chicken', 'abc', 'abc', 0, '2018-12-31', '16:43:01'),
(6, 1, '0', 'Subs', 'subs', 'subs', 'subs', 0, '2018-12-31', '18:31:41'),
(7, 1, '', 'new-dry-rice-kamran', 'rice', 'rice', 'rice dish', 0, '2019-02-22', '00:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_activities`
--

CREATE TABLE `tbl_login_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_login_activities`
--

INSERT INTO `tbl_login_activities` (`id`, `user_id`, `status`, `date`, `time`) VALUES
(1, 1, 0, '2018-12-31', '12:04:10'),
(2, 1, 0, '2019-02-08', '21:51:34'),
(3, 1, 0, '2019-02-09', '10:34:09'),
(4, 1, 0, '2019-02-09', '23:30:40'),
(5, 5, 0, '2019-02-20', '12:18:59'),
(6, 5, 0, '2019-02-20', '12:22:50'),
(7, 1, 0, '2019-02-20', '12:36:14'),
(8, 1, 0, '2019-02-20', '15:33:26'),
(9, 0, 1, '2019-02-20', '23:23:20'),
(10, 1, 0, '2019-02-20', '23:23:37'),
(11, 0, 1, '2019-02-21', '13:12:14'),
(12, 1, 0, '2019-02-21', '13:12:27'),
(13, 1, 0, '2019-02-22', '00:12:14'),
(14, 0, 1, '2019-02-22', '02:47:44'),
(15, 1, 0, '2019-02-22', '02:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_method` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tax` double NOT NULL,
  `tip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `later_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double NOT NULL,
  `total_tax` double NOT NULL,
  `total` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `payment_method`, `status`, `created_at`, `updated_at`, `tax`, `tip`, `later_date`, `subtotal`, `total_tax`, `total`, `user_id`, `shop_id`) VALUES
(7, 0, 1, '2019-02-21 08:00:30', '2019-02-21 08:00:30', 0, '5', '22,5,1', 27.47, 4.1205, 31.5905, 7, 1),
(8, 0, 1, '2019-02-21 09:40:06', '2019-02-21 09:40:06', 0, '5', '22,5,1', 8.99, 1.3485, 15.3385, 7, 1),
(9, 0, 1, '2019-02-21 10:38:14', '2019-02-21 10:38:14', 0, '2', '21,4,1', 11.58, 1.7369999999999999, 15.317, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_invoices`
--

CREATE TABLE `tbl_order_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `payer_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `featured_image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `regural_price` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_sale` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `user_id`, `featured_image`, `name`, `slug`, `description`, `regural_price`, `sale_price`, `on_sale`, `status`, `created_date`, `created_time`) VALUES
(3, 1, '', '1/4 Chicken Dark Meat', '1/4 Chicken-Dark-Meat', 'unnamed', '$8.49', '', 1, 0, '2018-12-31', '16:44:37'),
(4, 1, '', '1/4 Chicken White Meat', '1/4 Chicken-WhiteMeat', 'unnamed', '$8.99', '', 1, 0, '2018-12-31', '16:45:28'),
(5, 1, '', '1/2 Chicken', '1/2-Chicken', 'unnamed', '$10.7', '', 1, 0, '2018-12-31', '16:46:17'),
(6, 1, '', 'Whole Chicken', 'Whole-Chicken', 'unnamed', '$11.1', '', 1, 0, '2018-12-31', '16:46:51'),
(10, 1, '', '8\" CHICKEN SUB', '8\"-CHICKEN SUB', 'unnamed', '$7.99', '', 1, 0, '2018-12-31', '18:32:34'),
(11, 1, '', '8\" CHICKEN STEAK SUB', '8\"-CHICKEN-STEAK-SUB', 'unnamed', '$8.49', '', 1, 0, '2018-12-31', '18:33:15'),
(12, 1, '', '8\" STEAK & CHEESE SUB', '8\"-STEAK-&-CHEESE-SUB', 'unnamed', '$8.99', '', 1, 0, '2018-12-31', '18:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_images`
--

CREATE TABLE `tbl_products_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_seo_options`
--

CREATE TABLE `tbl_products_seo_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products_seo_options`
--

INSERT INTO `tbl_products_seo_options` (`id`, `user_id`, `product_id`, `meta_keywords`, `meta_description`) VALUES
(3, 1, 3, 'darkmeat', 'darkmeat'),
(4, 1, 4, 'unnamed', 'unnamed'),
(5, 1, 5, 'unnamed', 'unnamed'),
(6, 1, 6, 'unnamed', 'unnamed'),
(10, 1, 10, 'unnamed', 'unnamed'),
(11, 1, 11, 'unnamed', 'unnamed'),
(12, 1, 12, 'unnamed', 'unnamed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_categories`
--

CREATE TABLE `tbl_product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product_categories`
--

INSERT INTO `tbl_product_categories` (`id`, `user_id`, `product_id`, `category_id`) VALUES
(5, 1, 3, 5),
(6, 1, 4, 5),
(7, 1, 5, 5),
(8, 1, 6, 5),
(12, 1, 10, 6),
(13, 1, 11, 6),
(14, 1, 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store_images`
--

CREATE TABLE `tbl_store_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `header_image` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_image` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon_image` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store_settings`
--

CREATE TABLE `tbl_store_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `country_code_1` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_number1` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code_2` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_number2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store_social_links`
--

CREATE TABLE `tbl_store_social_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_number1` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `address`, `cell_number1`, `email`, `password`, `role`, `status`, `created_date`, `created_time`) VALUES
(1, 'admin', 'admin', 'asdasdasdasd', '232332323', 'admin@admin.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 0, 0, '2018-12-31', '11:54:05'),
(2, 'sohaib', 'ahmed', '', NULL, 'sohaib@sohaib.com', '12345', 1, 0, '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_number1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `cell_number1`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'matulprojectpusher new', NULL, '', NULL, 'matulprojectpushernew@gmail.com', '$2y$10$eOeOV6nao/TDQ.fA7Tr.lOMArayAKvz.LEDClLjotf98dD7PQM64K', 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tables`
--
ALTER TABLE `cart_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_tables`
--
ALTER TABLE `shop_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories_for_products`
--
ALTER TABLE `tbl_categories_for_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login_activities`
--
ALTER TABLE `tbl_login_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_invoices`
--
ALTER TABLE `tbl_order_invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_order_invoices_order_id_unique` (`order_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_products_name_unique` (`name`),
  ADD UNIQUE KEY `tbl_products_slug_unique` (`slug`);

--
-- Indexes for table `tbl_products_images`
--
ALTER TABLE `tbl_products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products_seo_options`
--
ALTER TABLE `tbl_products_seo_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_categories`
--
ALTER TABLE `tbl_product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_store_images`
--
ALTER TABLE `tbl_store_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_store_settings`
--
ALTER TABLE `tbl_store_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_store_settings_owner_name_unique` (`owner_name`),
  ADD UNIQUE KEY `tbl_store_settings_store_address_unique` (`store_address`),
  ADD UNIQUE KEY `tbl_store_settings_cell_number1_unique` (`cell_number1`),
  ADD UNIQUE KEY `tbl_store_settings_cell_number2_unique` (`cell_number2`),
  ADD UNIQUE KEY `tbl_store_settings_email1_unique` (`email1`),
  ADD UNIQUE KEY `tbl_store_settings_email2_unique` (`email2`);

--
-- Indexes for table `tbl_store_social_links`
--
ALTER TABLE `tbl_store_social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_users_cell_number1_unique` (`cell_number1`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tables`
--
ALTER TABLE `cart_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `shop_tables`
--
ALTER TABLE `shop_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories_for_products`
--
ALTER TABLE `tbl_categories_for_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_login_activities`
--
ALTER TABLE `tbl_login_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order_invoices`
--
ALTER TABLE `tbl_order_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_products_images`
--
ALTER TABLE `tbl_products_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products_seo_options`
--
ALTER TABLE `tbl_products_seo_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_product_categories`
--
ALTER TABLE `tbl_product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_store_images`
--
ALTER TABLE `tbl_store_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_store_settings`
--
ALTER TABLE `tbl_store_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_store_social_links`
--
ALTER TABLE `tbl_store_social_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
