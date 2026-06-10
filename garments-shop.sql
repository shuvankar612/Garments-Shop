-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2026 at 05:23 PM
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
-- Database: `garments-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_name`, `price`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kids T-Shirt', 799.00, 2, '1780758114.jpg', '2026-06-06 10:58:52', '2026-06-07 08:36:43'),
(3, 'Men\'s Jeans', 899.00, 2, '1780764532.jpg', '2026-06-06 11:23:27', '2026-06-07 08:36:54'),
(4, 'Men\'s Hoodies', 500.00, 2, '1780849114.jpg', '2026-06-07 10:49:34', '2026-06-08 08:48:11'),
(5, 'Women\'s Kurtis', 500.00, 2, '1780925583.jpg', '2026-06-08 08:06:38', '2026-06-08 08:48:14'),
(6, 'Women\'s Palazzo', 100.00, 2, '1780926809.jpg', '2026-06-08 08:24:51', '2026-06-08 08:48:18'),
(7, 'Jacket', 1000.00, 2, '1780927870.jpg', '2026-06-08 08:47:24', '2026-06-08 08:48:33'),
(8, 'Men\'s Formal Shirt', 1200.00, 2, '1780928075.jpg', '2026-06-08 08:47:53', '2026-06-08 08:48:29'),
(9, 'Men\'s Polo T-Shirt', 600.00, 2, '1780928198.jpg', '2026-06-08 08:47:58', '2026-06-08 08:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Kids T-Shirt', '2026-06-06 09:35:42', '2026-06-06 09:35:42'),
(7, 'Men\'s Jeans', '2026-06-06 11:22:58', '2026-06-06 11:22:58'),
(8, 'Men\'s Hoodies', '2026-06-07 10:50:18', '2026-06-07 10:50:18'),
(9, 'Women\'s Kurtis', '2026-06-08 08:04:13', '2026-06-08 08:04:13'),
(10, 'Women\'s Palazzo', '2026-06-08 08:24:13', '2026-06-08 08:24:13'),
(11, 'Jacket', '2026-06-08 08:49:18', '2026-06-08 08:49:18'),
(12, 'Men\'s Formal Shirt', '2026-06-08 08:50:16', '2026-06-08 08:50:16'),
(13, 'Men\'s Polo T-Shirt', '2026-06-08 08:50:37', '2026-06-08 08:50:37');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_05_15_071919_create_categories_table', 2),
(6, '2026_05_15_072015_create_products_table', 2),
(7, '2026_06_05_140330_create_orders_table', 3),
(8, '2026_06_05_141527_create_orders_table', 4),
(9, '2026_06_06_160459_create_carts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `email`, `phone`, `address`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shuvankar Chakraborty', 'shuvankarchakraborty49@gmail.com', '9830916122', '2/1 T.ROAD DASNAGAR Haora Corporation Haora West Bengal - 711105', 16000.00, 'Pending', '2026-06-05 09:23:47', '2026-06-05 10:53:39'),
(2, 'John Doe', 'john@gmail.com', '9876543210', 'Country, London', 16000.00, 'Pending', '2026-06-06 10:58:25', '2026-06-06 10:58:25'),
(3, 'Virat Kohli', 'virat@gmail.com', '7418529630', 'London, UK', 16000.00, 'Pending', '2026-06-08 08:53:45', '2026-06-08 08:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `image`, `size`, `color`, `created_at`, `updated_at`) VALUES
(7, 6, 'Kids T-Shirt', 799, 'Demo Description', '1780758114.jpg', 'M', 'Black', '2026-06-06 09:31:55', '2026-06-06 11:05:06'),
(8, 1, 'Men\'s Jeans', 899, 'Demo Description', '1780764532.jpg', 'M', 'Black', '2026-06-06 11:18:52', '2026-06-06 11:18:52'),
(10, 1, 'Men\'s Hoodies', 500, 'Demo Description', '1780849114.jpg', 'M', 'Black', '2026-06-07 10:48:34', '2026-06-07 10:48:34'),
(11, 1, 'Women\'s Kurtis', 500, 'Demo Description', '1780925583.jpg', 'M', 'Black', '2026-06-08 08:03:03', '2026-06-08 08:03:03'),
(13, 6, 'Women\'s Palazzo', 100, 'Demo Description', '1780926809.jpg', 'M', 'Black', '2026-06-08 08:23:29', '2026-06-08 08:23:29'),
(14, 6, 'Jacket', 1000, 'Demo Description', '1780927870.jpg', 'M', 'Black', '2026-06-08 08:41:10', '2026-06-08 08:41:10'),
(15, 6, 'Men\'s Formal Shirt', 1200, 'Demo Description', '1780928075.jpg', 'M', 'Black', '2026-06-08 08:44:35', '2026-06-08 08:44:35'),
(16, 6, 'Men\'s Polo T-Shirt', 600, 'Demo Description', '1780928198.jpg', 'M', 'Black', '2026-06-08 08:46:38', '2026-06-08 08:46:38');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
