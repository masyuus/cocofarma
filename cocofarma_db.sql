-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2025 pada 10.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cocofarma_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_info` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact_info`) VALUES
(1, 'PT Total Carbon Magelang', '081234567890');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_09_12_084337_create_sessions_table', 1),
(2, '2025_09_13_080006_add_columns_to_products_table', 2),
(3, '2025_09_13_080123_add_timestamps_to_products_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operational_costs`
--

CREATE TABLE `operational_costs` (
  `id` int(11) NOT NULL,
  `cost_name` varchar(255) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `cost_date` date NOT NULL,
  `production_log_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `status` enum('pending','processing','completed','cancelled') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price_at_order` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `production_inputs`
--

CREATE TABLE `production_inputs` (
  `id` int(11) NOT NULL,
  `production_log_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `quantity_used` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `production_logs`
--

CREATE TABLE `production_logs` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` enum('planned','in_progress','completed') NOT NULL DEFAULT 'planned',
  `notes` text DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `production_outputs`
--

CREATE TABLE `production_outputs` (
  `id` int(11) NOT NULL,
  `production_log_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_produced` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` enum('arang_kelapa','produk_hexa','bahan_baku') NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `unit` varchar(20) NOT NULL,
  `weight_per_unit` decimal(8,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `specifications` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`specifications`)),
  `minimum_stock` decimal(8,2) NOT NULL DEFAULT 0.00,
  `price_per_unit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `current_stock` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `description`, `category`, `price`, `stock_quantity`, `unit`, `weight_per_unit`, `image`, `status`, `specifications`, `minimum_stock`, `price_per_unit`, `current_stock`, `created_at`, `updated_at`) VALUES
(3, 'Arang Kelapa Premium', 'AK001', 'Arang kelapa berkualitas tinggi dengan kadar air rendah, cocok untuk industri dan rumah tangga.', 'arang_kelapa', 4250000.00, 50, 'ton', 1000.00, NULL, 'active', '{\"Kadar Air\":\"< 8%\",\"Kadar Abu\":\"< 3%\",\"Nilai Kalor\":\"> 7000 kcal\\/kg\",\"Ukuran\":\"2-5 cm\"}', 10.00, 0.00, 0.00, '2025-09-13 01:14:34', '2025-09-13 01:14:34'),
(4, 'Arang Kelapa Grade A', 'AK002', 'Arang kelapa grade A dengan kualitas standar ekspor.', 'arang_kelapa', 3850000.00, 75, 'ton', 1000.00, NULL, 'active', '{\"Kadar Air\":\"< 10%\",\"Kadar Abu\":\"< 4%\",\"Nilai Kalor\":\"> 6500 kcal\\/kg\",\"Ukuran\":\"3-8 cm\"}', 15.00, 0.00, 0.00, '2025-09-13 01:14:34', '2025-09-13 01:14:34'),
(5, 'Produk Hexa Briket', 'PH001', 'Briket berbentuk hexagonal dari arang kelapa, mudah terbakar dan tahan lama.', 'produk_hexa', 15000.00, 500, 'kg', 1.00, NULL, 'active', '{\"Bentuk\":\"Hexagonal\",\"Diameter\":\"5 cm\",\"Panjang\":\"10 cm\",\"Kadar Air\":\"< 6%\",\"Waktu Bakar\":\"2-3 jam\"}', 100.00, 0.00, 0.00, '2025-09-13 01:14:34', '2025-09-13 01:14:34'),
(6, 'Produk Hexa Mini', 'PH002', 'Briket hexa ukuran mini, cocok untuk BBQ dan keperluan rumah tangga.', 'produk_hexa', 18000.00, 300, 'kg', 1.00, NULL, 'active', '{\"Bentuk\":\"Hexagonal Mini\",\"Diameter\":\"3 cm\",\"Panjang\":\"6 cm\",\"Kadar Air\":\"< 5%\",\"Waktu Bakar\":\"1-2 jam\"}', 50.00, 0.00, 0.00, '2025-09-13 01:14:34', '2025-09-13 01:14:34'),
(7, 'Tempurung Kelapa Kering', 'BB001', 'Tempurung kelapa kering sebagai bahan baku pembuatan arang.', 'bahan_baku', 1500000.00, 100, 'ton', 1000.00, NULL, 'active', '{\"Kadar Air\":\"< 15%\",\"Ukuran\":\"Utuh\\/Pecahan\",\"Kebersihan\":\"Bebas kotoran\",\"Asal\":\"Kelapa lokal\"}', 20.00, 0.00, 0.00, '2025-09-13 01:14:34', '2025-09-13 01:14:34'),
(8, 'Serbuk Arang Kelapa', 'BB002', 'Serbuk arang kelapa untuk campuran briket dan keperluan industri.', 'bahan_baku', 2800000.00, 25, 'ton', 1000.00, NULL, 'active', '{\"Mesh Size\":\"80-100\",\"Kadar Air\":\"< 12%\",\"Kadar Abu\":\"< 5%\",\"Warna\":\"Hitam pekat\"}', 5.00, 0.00, 0.00, '2025-09-13 01:14:34', '2025-09-13 01:14:34'),
(9, 'Perekat Tapioka', 'BB003', 'Perekat alami dari tapioka untuk pembuatan briket.', 'bahan_baku', 8500.00, 200, 'kg', 1.00, NULL, 'active', '{\"Jenis\":\"Tapioka murni\",\"Kemurnian\":\"> 95%\",\"Warna\":\"Putih\",\"Tekstur\":\"Bubuk halus\"}', 50.00, 0.00, 0.00, '2025-09-13 01:14:34', '2025-09-13 01:14:34'),
(10, 'Arang Kelapa Export Quality', 'AK003', 'Arang kelapa kualitas ekspor dengan standar internasional.', 'arang_kelapa', 4750000.00, 30, 'ton', 1000.00, NULL, 'active', '{\"Kadar Air\":\"< 6%\",\"Kadar Abu\":\"< 2.5%\",\"Nilai Kalor\":\"> 7500 kcal\\/kg\",\"Fixed Carbon\":\"> 80%\",\"Sertifikat\":\"SNI, ISO\"}', 8.00, 0.00, 0.00, '2025-09-13 01:14:34', '2025-09-13 01:14:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_transactions`
--

CREATE TABLE `product_transactions` (
  `id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transaction_type` enum('production_result','sale','adjustment') NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `related_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `current_stock` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `name`, `unit`, `current_stock`) VALUES
(1, 'Tempurung Kelapa', 'ton', 10.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `raw_material_transactions`
--

CREATE TABLE `raw_material_transactions` (
  `id` bigint(20) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `transaction_type` enum('stock_in','production_use','adjustment') NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `related_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1NnmJ3VlGXgdiDKc4g0FgWazX7rU7NYU9GjoEPHH', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWXJmeE83YWxrZG1SZ3VpMEMwSUFTQ0l5aUpjNEZTZkdGZDFsdEVlZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MzoiaHR0cDovL2xvY2FsaG9zdC9jb2NvZmFybWEvcHVibGljL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM5OiJodHRwOi8vbG9jYWxob3N0L2NvY29mYXJtYS9wdWJsaWMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757690010),
('g0SF1UaszsXCNP86hMXhXdYeaGoxmRrZeQK2clIv', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaGJyb0RKQVlqT0tFME5sWUtYMGVRMW5ZQmhRZTFRR1pyRzlPaldmWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3QvY29jb2Zhcm1hL3B1YmxpYy9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1757752210),
('jYzVKNDgDT3DPFalMKgQ5c16B3rX3vMvKg3nkJj0', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2xCajkycGpQN0lUNlVjN2F2eDVkclpFTkI3dWllSVlYZ0g0TDdFeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3QvY29jb2Zhcm1hL3B1YmxpYy9sb2dpbiI7fX0=', 1757735234),
('Kq480B6jOQGPNLbhJTfrADycIUPEMOVnx0wpZbJi', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVTE1dXBjdHhiTW42ZUhBbURKR0dVSTc2STcyaGRNdlp5MGFxYWw4NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly9sb2NhbGhvc3QvY29jb2Zhcm1hL3B1YmxpYy9hZG1pbi9wcm9kdWN0cz9jYXRlZ29yeT1iYWhhbl9iYWt1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1757752963),
('oieqCorv2SAGzQ4Twy88wmvTNNXXi43RtNbxbAhx', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVGNTMU96MFNtRFNiNU1OaVpOaHJ2cmZEcnhJdUF1M2RXOFJkbmIyUSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vbG9jYWxob3N0L2NvY29mYXJtYS9wdWJsaWMvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1757687106),
('ZHFIlrqwj4Ea1nRKdjmWBbrLTprHBjrJf7DAU5z3', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ0VEZ0I5Q1BuRHZra2JXWG5yakJHWFZyeHVDTHZEUTcxRnJ2N1RPSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly9sb2NhbGhvc3QvY29jb2Zhcm1hL3B1YmxpYy9hZG1pbi9wcm9kdWN0cy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1757752258);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` enum('owner','operator') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `role`, `created_at`) VALUES
(1, 'lopa123', '$2y$12$wzdtuVo4VQHl0g0TyK1GIOg3eW4GSKtw4xduXlyBrfDksnx1W8PDO', 'Pemilik Cocofarma', 'owner', '2025-09-12 09:17:02'),
(2, 'op1', '$2y$12$A4T5rGUju/JPpghHp/PNi.WBhiUTNfI14MCCsVczsKdUKBDvNhKA2', 'Staf Produksi', 'operator', '2025-09-12 09:17:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `operational_costs`
--
ALTER TABLE `operational_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_log_id` (`production_log_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `production_inputs`
--
ALTER TABLE `production_inputs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_log_id` (`production_log_id`),
  ADD KEY `raw_material_id` (`raw_material_id`);

--
-- Indeks untuk tabel `production_logs`
--
ALTER TABLE `production_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `production_outputs`
--
ALTER TABLE `production_outputs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_log_id` (`production_log_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_transactions`
--
ALTER TABLE `product_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `raw_material_transactions`
--
ALTER TABLE `raw_material_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raw_material_id` (`raw_material_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `operational_costs`
--
ALTER TABLE `operational_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `production_inputs`
--
ALTER TABLE `production_inputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `production_logs`
--
ALTER TABLE `production_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `production_outputs`
--
ALTER TABLE `production_outputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `product_transactions`
--
ALTER TABLE `product_transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `raw_material_transactions`
--
ALTER TABLE `raw_material_transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `operational_costs`
--
ALTER TABLE `operational_costs`
  ADD CONSTRAINT `operational_costs_ibfk_1` FOREIGN KEY (`production_log_id`) REFERENCES `production_logs` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `production_inputs`
--
ALTER TABLE `production_inputs`
  ADD CONSTRAINT `production_inputs_ibfk_1` FOREIGN KEY (`production_log_id`) REFERENCES `production_logs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_inputs_ibfk_2` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_materials` (`id`);

--
-- Ketidakleluasaan untuk tabel `production_logs`
--
ALTER TABLE `production_logs`
  ADD CONSTRAINT `production_logs_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `production_logs_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `production_outputs`
--
ALTER TABLE `production_outputs`
  ADD CONSTRAINT `production_outputs_ibfk_1` FOREIGN KEY (`production_log_id`) REFERENCES `production_logs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_outputs_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `product_transactions`
--
ALTER TABLE `product_transactions`
  ADD CONSTRAINT `product_transactions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `raw_material_transactions`
--
ALTER TABLE `raw_material_transactions`
  ADD CONSTRAINT `raw_material_transactions_ibfk_1` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_materials` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
