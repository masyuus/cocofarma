-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Sep 2025 pada 08.02
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
-- Database: `bolopadb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id` int(11) NOT NULL,
  `master_bahan_id` int(11) NOT NULL,
  `kode_bahan` varchar(50) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_per_satuan` decimal(15,2) NOT NULL DEFAULT 0.00,
  `stok` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tanggal_masuk` date NOT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `master_bahan_id`, `kode_bahan`, `nama_bahan`, `satuan`, `harga_per_satuan`, `stok`, `tanggal_masuk`, `tanggal_kadaluarsa`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'BB001', 'Tempurung Kelapa Kering Batch 001', 'kg', 5000.00, 2500.00, '2025-09-19', '2026-03-19', 'aktif', '2025-09-18 22:18:46', '2025-09-18 22:18:46'),
(2, 1, 'BB002', 'Tempurung Kelapa Kering Batch 002', 'kg', 4800.00, 1800.00, '2025-08-20', '2026-02-19', 'aktif', '2025-09-18 22:18:46', '2025-09-18 22:18:46'),
(3, 2, 'BB003', 'Kayu Bakar Jati Batch 001', 'kg', 8000.00, 1200.00, '2025-09-19', '2026-09-19', 'aktif', '2025-09-18 22:18:46', '2025-09-18 22:18:46'),
(4, 3, 'BB004', 'Bahan Pengikat Kimia Batch 001', 'kg', 12000.00, 500.00, '2025-09-19', '2026-05-19', 'aktif', '2025-09-18 22:18:46', '2025-09-18 22:18:46'),
(5, 2, 'BB005', 'Kayu Bakar Mahoni Batch 002', 'kg', 7500.00, 800.00, '2025-09-04', '2026-08-19', 'aktif', '2025-09-18 22:18:46', '2025-09-18 22:18:46'),
(6, 1, 'BB006', 'Tempurung Kelapa Kering Premium', 'kg', 5500.00, 950.00, '2025-09-12', '2026-04-19', 'aktif', '2025-09-18 22:18:46', '2025-09-18 22:18:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_bahan_baku`
--

CREATE TABLE `master_bahan_baku` (
  `id` int(11) NOT NULL,
  `kode_bahan` varchar(50) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_per_satuan` decimal(15,2) NOT NULL DEFAULT 0.00,
  `deskripsi` text DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_bahan_baku`
--

INSERT INTO `master_bahan_baku` (`id`, `kode_bahan`, `nama_bahan`, `satuan`, `harga_per_satuan`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MBB001', 'Tempurung Kelapa Kering', 'kg', 5000.00, 'Tempurung kelapa yang sudah dikeringkan untuk bahan baku arang', 'aktif', '2025-09-19 04:58:08', '2025-09-19 04:58:08'),
(2, 'MBB002', 'Kayu Bakar', 'kg', 8000.00, 'Kayu bakar untuk proses pembakaran', 'aktif', '2025-09-19 04:58:08', '2025-09-19 04:58:08'),
(3, 'MBB003', 'Bahan Pengikat', 'kg', 12000.00, 'Bahan pengikat untuk proses produksi', 'aktif', '2025-09-19 04:58:08', '2025-09-19 04:58:08');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '2025_09_14_204433_create_personal_access_tokens_table', 2),
(6, '2025_09_16_042914_create_produks_table', 2),
(7, '2025_09_16_042918_create_bahan_bakus_table', 2),
(8, '2025_09_16_042922_create_pesanans_table', 2),
(9, '2025_09_16_042927_create_pesanan_items_table', 2),
(10, '2025_09_16_042931_create_produksis_table', 2),
(11, '2025_09_16_042935_create_produksi_bahans_table', 2),
(12, '2025_09_16_042940_create_transaksis_table', 2),
(13, '2025_09_16_042944_create_transaksi_items_table', 2),
(14, '2025_09_16_042948_create_pengaturans_table', 2),
(15, '2025_09_16_043136_add_role_to_users_table', 2),
(16, '2025_09_19_045738_update_database_structure_for_cocofarma', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` int(11) NOT NULL,
  `nama_pengaturan` varchar(255) NOT NULL,
  `nilai` text DEFAULT NULL,
  `tipe` varchar(50) DEFAULT 'string',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` int(11) NOT NULL,
  `kode_pesanan` varchar(50) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `status` enum('pending','diproses','selesai','dibatalkan') DEFAULT 'pending',
  `total_harga` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_items`
--

CREATE TABLE `pesanan_items` (
  `id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `harga_satuan` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_jual` decimal(15,2) NOT NULL DEFAULT 0.00,
  `deskripsi` text DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `kode_produk`, `nama_produk`, `satuan`, `harga_jual`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRD001', 'Arang Tempurung Premium', 'kg', 25000.00, 'Arang tempurung kelapa berkualitas premium', 'aktif', '2025-09-19 04:58:08', '2025-09-19 04:58:08'),
(2, 'PRD002', 'Arang Tempurung Ekonomis', 'kg', 18000.00, 'Arang tempurung kelapa untuk kebutuhan sehari-hari', 'aktif', '2025-09-19 04:58:08', '2025-09-19 04:58:08'),
(3, 'PRD003', 'Briket Arang', 'kg', 20000.00, 'Briket arang dari tempurung kelapa', 'aktif', '2025-09-19 04:58:08', '2025-09-19 04:58:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksis`
--

CREATE TABLE `produksis` (
  `id` int(11) NOT NULL,
  `kode_produksi` varchar(50) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah_produksi` decimal(15,2) NOT NULL,
  `status` enum('pending','diproses','selesai','dibatalkan') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_bahans`
--

CREATE TABLE `produksi_bahans` (
  `id` int(11) NOT NULL,
  `produksi_id` int(11) NOT NULL,
  `bahan_baku_id` int(11) NOT NULL,
  `jumlah_digunakan` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
('2jjOX5t4PDGj3U85hMoPYACVxBVHjHObMhxtRvAJ', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieXhBZ1ljeU5WRVV0OFJja25OZVdmN2dJN2g1WlE0YVhwOG9sWnpWViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758248146),
('2MZZgjCjrhAltqFmxWTMW2M7ZkHlrm2ACHI73ih8', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU1hoNXRHSGM0MmRYdkFLdVBhcWQ2bHZQZkNZUldJOHY1OHRTc2pqdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9sb2NhbGhvc3QvY29jb2Zhcm1hL3B1YmxpYy9iYWNrb2ZmaWNlL2JhaGFuYmFrdSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJyb2xlIjtzOjExOiJzdXBlcl9hZG1pbiI7fQ==', 1758259204),
('6qmVxqQKiNDgPSrXkwnxULcUKE1GNjiQIWMpxUov', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkRYN0lnR2xLUHlXZDNZOTFURHMxMkNIelRLR28ybDBCZHV5bmFrQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL21hc3Rlci1iYWhhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758258723),
('7rTW4uMl6uKUJY8Edo6CN0euB6lnqZD7Av8nBId2', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGVlQlN0WlJicUlQTHdEeUE0TjFZZkZMN1lpNGRnRG1MRXRPeEx2NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0LW9wZXJhdGlvbmFsLWJhaGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758259173),
('a7cJgD3JZLQQlCouaqxxwIlzO1mAfJYqfO645CMh', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNlNHcGFDd1NXMkR5akVxdVFmMXRac1JmTHMyVTJzVG53MUY4ajk0TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL21hc3Rlci1iYWhhbj9kZWJ1Zz0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758258806),
('aLVItW0fOtjRPUyaV3pH6oO74Jp0MzF13govPiEp', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiM21wSmpKMTI2SkYzekdqZXk3Ym9CRVpzeXlEa2xGVklDUTFLMmZxaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758248146),
('AnsTVbMX3BGd5YAmKwEiR198zu19j8WXbt5ZNfFH', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlFibzZ1eFVDUE92Mks3OGJJUjNSUXZ6ZXBlcEVHUXp3cVA0REpwMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL2JhaGFuYmFrdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758247511),
('bwRKBBPTelfvn7s95nD727WvatLSHy4oQjZmWWUs', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlU5RlVNeFRlWFJOSjZ4Szh1QVhlZXJmVXR0R2lSWUpic2QzcUdZcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL2JhaGFuYmFrdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758259136),
('EayVwQZDjSJ1iwXgPak6VbDJwwBZr46t2SSpSrG7', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieGExV01PMWdpdWpORTZBRFFOV2ZHa0s2dzNGckFRTVBRaWltU2VNTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758248114),
('gzoyY2WYOytbqMZl53fElQpovFJLNcvEIPIdMSPw', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibUtkcUhwWHFtdUl4VzVPZjNzNDc2eTJXUkZBSW14RmVTSXJIQnBvSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758253930),
('kKLyaagBq2RG6NPaGU37LWjUFZjCvCLgxZ8fv8do', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWtkUEJEdjJ5a3JJVER4NXNqRlZMNTNpU1JUNkxTbDg1TElNOVdvNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL21hc3Rlci1iYWhhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758258678),
('KKmAUUpsPDgugwdR9MB2iSuclJ5ttI2v5RATucng', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDJTTzhjRVhpUFowWnV5MUV1WWlXTDBHT1VDWkJsVDN3MmdhaktrTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758245306),
('MDsWl0X4Hwxi8RUM9xqGhNDQQvztM3VpxFLBMLKp', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2EzUm1XRUF5T3docU9XR3dQVU42ckJ6OG9NZ0YyTGMwMjFscUs2aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9taW1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758258716),
('mq1SeIydtaMZTh5YFuDINQ2xjMfUPh2L486keUU8', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUzFPNk0wU1QwQ1BXbzJyU1lIM2hiNkJyaGRxUlRiY0lCbUJzSFVadyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758250722),
('OZukEqlhjbDuxtLnmftskReYoCADXE38TeD9XuMJ', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmFWb2RsVkFWU3l0akZKaUd4RlV3dFdsR0NHc1RMeVNxVzFMUUVvbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL2JhaGFuYmFrdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758246467),
('pc8CTmwtZQJCXMhneMNLSUJl3D6d9j3LALD6Wh7H', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWE2QmpRWWNMQlkxbTBZQ3Y1UG44VVRKb0JSbUhLOVNIS0Y3aEx2WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0LW1hc3Rlci1iYWhhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758258939),
('qLiQsrrDEZh4g5QpuTgT0gf10Rxvtz7XWh4XybtX', NULL, '::1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoicGRjVjdKT0trSm40S3BmQjRGMFVnNU1YOU5jb05CN3daWVVFbDZZZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758247881),
('TyJ4OcTq1wlv21gCRqtqUvjOexdjK3qLm6SRK7rl', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYUdRcmVjWmxsTGU1MDVYOTkzYXN6VngwRmVGTURLMVdhU1hXOWtoNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758248117),
('umdvzFtDEh5x31sUFnhftzmA5mbkdWmSHD19FoNF', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiSXV2cUNEVE5NeEFQR0gyOWJTTnBuNllCYVhDYXFPSHlXM2FlQm83USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758252751),
('UZARZxL5kiqsYnLDsmBoGZZsq6wFTDeERNEFcAVs', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0hBQzBhdUZQOVNEa1hybE0zSElHb2dSZk13Y2xQM0xGWFpnWmk2NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9taW1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758258730),
('V7FsOZqKjz0r8yZBnaln0rUgetVykwPKGpKjhS8q', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYkRIODF5c1hwWWl1amJyN0RzRXJVUmJyYXZzVEIyN2NnRXVSZ2FSMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758250531),
('VcL9t3t1WyL9531Vbwz6UqCmzanCwwYvmZ34Uq3Q', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielhISHl4Ujdrek9xMmx6WlBtQXFzZ1RLcWhjQVJOZ0dkenhhUU4zciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL3Rlc3QtbWFzdGVyLWJhaGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758258917),
('wsOVGV3up5OQP4ELShlZY9LdhgH7NHhRBtCDUM1o', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNFJNeEJlalRKcld6NlRzSmc2SmdlT0UyM2RCbGxvaVVLVlJidnpqSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758255605),
('xhD6VUXlfS2M2aKA5efA8W1JNRxoWQBByfzR0rG2', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZTBpbEZjSUJuMDJmV0Nlcmg5WmZsdHNYd1BOR1J5TmV6QlRvVjBmZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758248086),
('XmNx8TcWzrKHmws82xDXZ7exPDMRfJWrXde2Evvn', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZ3p0S1JINWExcTFxYmtqTTZ3dHdPZW01WFkzcVJpSWhKaUtXbzhtMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758249466),
('xSGIXbluJ2xfhu9VxCuttYCJjgXBWvM8dZDHYap2', NULL, '127.0.0.1', 'curl/8.14.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWjFvVnVqRUhOV0c2TFBhWjVIUm1oREtNeldNZzNTQnhtNUI3ZGVpTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758248150),
('Y7vDBrsIvRNiBaa7RxUakRreQkkG2r33Up4Qo6zd', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidFk0VzdjNWx1dGl4bXZLNnJWZnR6c0NCTVZNYWZ4cFBGd1U4MWt3QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL2JhaGFuYmFrdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758259146),
('yfkpea5qhZSy9s4TDwnyrP8VeVWEoiNoqyHHM3AE', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUW42S0xVemluTWhMcVVaWUZjazY5NEp5Q0ZhMGlZRnNlWVRnNVlqMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL21hc3Rlci1iYWhhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758258730),
('YLRbCmPFMUrpFLb0TK78sBo0U9GCUHMlOSw4vSVE', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzhqMXdkOEp6WmNDeW9vekNpNjl3V2JpZXBBcm5VMkZ2R0x4amFXNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL3Rlc3QtbWFzdGVyLWJhaGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758258911),
('YslOQyJuws4CStTHZNWMC4ySXKstAps8OJJVBLGM', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWN2V2NGc1daa0V4ZDBIdzIxdU5XWDJRbFZlVk5LMjh3azJhbW55ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL2JhaGFuYmFrdSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758247691),
('Zs9WuHAL5mX1F70vdr7SmrafIemR5r9VyT0gzbGW', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHNaUVFrNEN6eU15amJJYTVWVEhLSThsQXZkQUt5OFNBQ0x5NmpUeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0LW9wZXJhdGlvbmFsLWJhaGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1758259165),
('ZzwLAUYTC8c8rW5lTpRbbGsJjILUAACJnpoPuEQE', NULL, '127.0.0.1', 'curl/8.14.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmhhSW9FanBva3FYQTROMG9NTk91U3NjMmZHM3hkS0U0TWllWXBwayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL2JhaGFuYmFrdS9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1758245343);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_bahan_baku`
--

CREATE TABLE `stok_bahan_baku` (
  `id` int(11) NOT NULL,
  `bahan_baku_id` int(11) NOT NULL,
  `jumlah_masuk` decimal(15,2) NOT NULL DEFAULT 0.00,
  `jumlah_keluar` decimal(15,2) NOT NULL DEFAULT 0.00,
  `sisa_stok` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jenis_transaksi` enum('penjualan','pembelian') NOT NULL,
  `total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `keterangan` text DEFAULT NULL,
  `status` enum('pending','selesai','dibatalkan') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_items`
--

CREATE TABLE `transaksi_items` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `bahan_baku_id` int(11) DEFAULT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `harga_satuan` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'lopa123', 'lopa123@cocofarma.com', NULL, '$2y$12$tfMjYERiGFUVLxF2.s/Z9ee9ZNpmOxJt0ro79/KLLyojlLgdQMhJ2', 'super_admin', 1, NULL, '2025-09-17 09:49:27', '2025-09-17 10:08:49');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_laporan_produksi_harian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_laporan_produksi_harian` (
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_stok_bahan_baku`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_stok_bahan_baku` (
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_stok_produk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_stok_produk` (
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_laporan_produksi_harian`
--
DROP TABLE IF EXISTS `v_laporan_produksi_harian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan_produksi_harian`  AS SELECT `bp`.`tanggal_produksi` AS `tanggal_produksi`, `bp`.`nomor_batch` AS `nomor_batch`, `p`.`nama_produk` AS `nama_produk`, `hp`.`quantity_hasil` AS `quantity_hasil`, `hp`.`grade_kualitas` AS `grade_kualitas`, `hp`.`biaya_produksi` AS `biaya_produksi`, `bp`.`status` AS `status` FROM ((`batch_produksi` `bp` join `hasil_produksi` `hp` on(`bp`.`id` = `hp`.`batch_produksi_id`)) join `produk` `p` on(`hp`.`produk_id` = `p`.`id`)) ORDER BY `bp`.`tanggal_produksi` DESC ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_stok_bahan_baku`
--
DROP TABLE IF EXISTS `v_stok_bahan_baku`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stok_bahan_baku`  AS SELECT `bb`.`id` AS `id`, `bb`.`kode_bahan` AS `kode_bahan`, `bb`.`nama_bahan` AS `nama_bahan`, `bb`.`satuan` AS `satuan`, coalesce(sum(`sbb`.`quantity`),0) AS `stok_tersedia`, `bb`.`stok_minimum` AS `stok_minimum`, CASE WHEN coalesce(sum(`sbb`.`quantity`),0) <= `bb`.`stok_minimum` THEN 'RENDAH' WHEN coalesce(sum(`sbb`.`quantity`),0) <= `bb`.`stok_minimum` * 1.5 THEN 'SEDANG' ELSE 'AMAN' END AS `status_stok` FROM (`bahan_baku` `bb` left join `stok_bahan_baku` `sbb` on(`bb`.`id` = `sbb`.`bahan_baku_id` and `sbb`.`tersedia` = 1)) WHERE `bb`.`status` = 1 GROUP BY `bb`.`id` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_stok_produk`
--
DROP TABLE IF EXISTS `v_stok_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stok_produk`  AS SELECT `p`.`id` AS `id`, `p`.`kode_produk` AS `kode_produk`, `p`.`nama_produk` AS `nama_produk`, `p`.`satuan` AS `satuan`, coalesce(sum(`sp`.`quantity`),0) AS `stok_tersedia`, `p`.`stok_minimum` AS `stok_minimum`, CASE WHEN coalesce(sum(`sp`.`quantity`),0) <= `p`.`stok_minimum` THEN 'RENDAH' WHEN coalesce(sum(`sp`.`quantity`),0) <= `p`.`stok_minimum` * 1.5 THEN 'SEDANG' ELSE 'AMAN' END AS `status_stok` FROM (`produk` `p` left join `stok_produk` `sp` on(`p`.`id` = `sp`.`produk_id` and `sp`.`tersedia` = 1)) WHERE `p`.`status` = 1 GROUP BY `p`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_bahan_master_id` (`master_bahan_id`),
  ADD KEY `idx_bahan_kode` (`kode_bahan`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_bahan_baku`
--
ALTER TABLE `master_bahan_baku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_bahan` (`kode_bahan`),
  ADD KEY `idx_master_bahan_kode` (`kode_bahan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_pengaturan` (`nama_pengaturan`),
  ADD KEY `idx_pengaturan_nama` (`nama_pengaturan`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pesanan` (`kode_pesanan`),
  ADD KEY `idx_pesanan_kode` (`kode_pesanan`),
  ADD KEY `idx_pesanan_status` (`status`);

--
-- Indeks untuk tabel `pesanan_items`
--
ALTER TABLE `pesanan_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`),
  ADD KEY `idx_produk_kode` (`kode_produk`);

--
-- Indeks untuk tabel `produksis`
--
ALTER TABLE `produksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_produksi` (`kode_produksi`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `idx_produksi_kode` (`kode_produksi`),
  ADD KEY `idx_produksi_status` (`status`);

--
-- Indeks untuk tabel `produksi_bahans`
--
ALTER TABLE `produksi_bahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produksi_id` (`produksi_id`),
  ADD KEY `bahan_baku_id` (`bahan_baku_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `stok_bahan_baku`
--
ALTER TABLE `stok_bahan_baku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_stok_bahan_id` (`bahan_baku_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `idx_transaksi_kode` (`kode_transaksi`),
  ADD KEY `idx_transaksi_jenis` (`jenis_transaksi`);

--
-- Indeks untuk tabel `transaksi_items`
--
ALTER TABLE `transaksi_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `bahan_baku_id` (`bahan_baku_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_bahan_baku`
--
ALTER TABLE `master_bahan_baku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan_items`
--
ALTER TABLE `pesanan_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produksis`
--
ALTER TABLE `produksis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produksi_bahans`
--
ALTER TABLE `produksi_bahans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok_bahan_baku`
--
ALTER TABLE `stok_bahan_baku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_items`
--
ALTER TABLE `transaksi_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`master_bahan_id`) REFERENCES `master_bahan_baku` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_items`
--
ALTER TABLE `pesanan_items`
  ADD CONSTRAINT `pesanan_items_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_items_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produksis`
--
ALTER TABLE `produksis`
  ADD CONSTRAINT `produksis_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produksi_bahans`
--
ALTER TABLE `produksi_bahans`
  ADD CONSTRAINT `produksi_bahans_ibfk_1` FOREIGN KEY (`produksi_id`) REFERENCES `produksis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produksi_bahans_ibfk_2` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_baku` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok_bahan_baku`
--
ALTER TABLE `stok_bahan_baku`
  ADD CONSTRAINT `stok_bahan_baku_ibfk_1` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_baku` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_items`
--
ALTER TABLE `transaksi_items`
  ADD CONSTRAINT `transaksi_items_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_items_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaksi_items_ibfk_3` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_baku` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
