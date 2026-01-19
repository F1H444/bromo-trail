-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2026 at 12:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bromotrail`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Owner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$tC2V7o5mewZwErvbg5X8Suo0doA7LVeNe4RdqAARTjsAmNyBal1Py', 'Admin', NULL, '2026-01-18 17:14:14', '2026-01-18 17:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cek_kondisi`
--

CREATE TABLE `cek_kondisi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_penyewaan` bigint UNSIGNED NOT NULL,
  `id_admin` bigint UNSIGNED NOT NULL,
  `waktu_cek` enum('Ambil','Kembali') COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_kondisi_fisik` text COLLATE utf8mb4_unicode_ci,
  `foto_kondisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_sewa`
--

CREATE TABLE `detail_sewa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_penyewaan` bigint UNSIGNED NOT NULL,
  `id_tambahan` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `subtotal_harga` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_sewa`
--

INSERT INTO `detail_sewa` (`id`, `id_penyewaan`, `id_tambahan`, `jumlah`, `subtotal_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '25000.00', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(2, 2, 1, 1, '25000.00', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(3, 4, 1, 3, '150000.00', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(4, 5, 1, 1, '75000.00', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(5, 7, 1, 1, '75000.00', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(6, 7, 3, 1, '30000.00', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(7, 8, 1, 1, '50000.00', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(8, 8, 3, 1, '20000.00', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(9, 9, 1, 1, '100000.00', '2026-01-18 11:49:09', '2026-01-18 11:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_17_000001_create_bromotrail_tables', 1),
(5, '2026_01_18_092357_add_tgl_bayar_and_timestamps_to_pembayaran_table', 2),
(6, '2026_01_18_092658_add_catatan_to_pembayaran_table', 3),
(7, '2026_01_18_093346_update_status_enums_in_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id` bigint UNSIGNED NOT NULL,
  `merk_tipe` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_nomor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_sewa_per_hari` decimal(12,2) NOT NULL,
  `status_motor` enum('Tersedia','Disewa','Maintenance') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tersedia',
  `gambar_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_singkat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spek_mesin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapasitas_tangki` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp_sim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_darurat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_asal` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_lengkap`, `email`, `password`, `no_wa`, `no_ktp_sim`, `kontak_darurat`, `alamat_asal`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fiha Aridhoi', 'customer1@example.com', 'hash_password_disini', '083215316', '542654', NULL, 'adgfad', NULL, '2026-01-18 11:22:13', '2026-01-18 11:22:13'),
(2, 'Fiha Aridhoi', NULL, NULL, '083215316', '542654', NULL, 'adgfad', NULL, '2026-01-18 11:22:13', '2026-01-18 11:22:13'),
(3, 'ASGDYFGSA', NULL, NULL, '2846723', '4662546', NULL, 'sahduasuid', NULL, '2026-01-18 11:22:13', '2026-01-18 11:22:13'),
(4, 'fiha', NULL, NULL, '097823623', '543625', NULL, 'hasdvhvdvh', NULL, '2026-01-18 11:22:13', '2026-01-18 11:22:13'),
(5, 'fiha', NULL, NULL, '082128573839', '3578051710070001', NULL, 'jl. kedung klinter 4 / 30', NULL, '2026-01-18 11:22:13', '2026-01-18 11:22:13'),
(6, 'fiha', NULL, NULL, '082128573839', '3578051710070001', NULL, 'jl. kedung klinter 4 / 30', NULL, '2026-01-18 11:22:13', '2026-01-18 11:22:13'),
(7, 'fiha aridhoi', NULL, NULL, '082128573839', '3578051710070001', NULL, 'jl. kedung klinter', NULL, '2026-01-18 11:22:13', '2026-01-18 11:22:13'),
(8, 'fiha', NULL, NULL, '082128573839', '3578051710070001', NULL, 'surabaya', NULL, '2026-01-18 11:22:13', '2026-01-18 11:22:13'),
(9, 'fiha', NULL, NULL, '082128573839', '3578051710070001', NULL, 'surabaya', NULL, '2026-01-18 11:22:13', '2026-01-18 11:22:13'),
(10, 'fiha aridhoi', 'fihaaridhoi@gmail.com', '$2y$12$ovevRdfB0GXL33WNPkmGRuBPdON1SpgzaSfnNpNQXx6QdIr0saq5q', '082128573839', '3578051710070001', NULL, 'jl. kedung klinter 4 / 30', 'prHIFhhMU6rGPdV5rtE5CiuNGnxMRXnHPUJKEjGzRxuoU6rMoAwNsr2WXblR', '2026-01-18 04:40:08', '2026-01-19 00:45:49'),
(11, 'fiha aridhoi', 'liabachroni@gmail.com', '$2y$12$CFbcOoZVwo8CwkN7NO.uVunT.0dx0zuagZdaty.RgIPN5XDx8KrNe', '082128573839', '3578051710070001', NULL, 'jl kedung', NULL, '2026-01-18 04:47:30', '2026-01-18 04:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `id_penyewaan` bigint UNSIGNED NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `id_admin` bigint UNSIGNED DEFAULT NULL,
  `metode_bayar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bayar` decimal(15,2) NOT NULL,
  `status_pembayaran` enum('Pending','Menunggu Verifikasi','Lunas','Gagal') COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `bukti_bayar_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_penyewaan`, `tgl_bayar`, `id_admin`, `metode_bayar`, `jumlah_bayar`, `status_pembayaran`, `bukti_bayar_url`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 7, '2026-01-18', NULL, 'Transfer BCA', '555000.00', 'Menunggu Verifikasi', 'bukti_bayar/bukti_1768731116_7.png', NULL, '2026-01-18 03:11:56', '2026-01-18 03:11:56'),
(2, 8, '2026-01-18', NULL, 'Transfer BCA', '570000.00', 'Menunggu Verifikasi', 'bukti_bayar/bukti_1768731249_8.png', NULL, '2026-01-18 03:14:09', '2026-01-18 03:14:09'),
(3, 9, '2026-01-18', NULL, 'Transfer BCA', '1100000.00', 'Menunggu Verifikasi', 'bukti_bayar/bukti_1768731603_9.png', NULL, '2026-01-18 03:20:03', '2026-01-18 03:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pelanggan` bigint UNSIGNED NOT NULL,
  `id_motor` bigint UNSIGNED NOT NULL,
  `id_admin` bigint UNSIGNED DEFAULT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `total_biaya` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status_sewa` enum('Booking','Proses Verifikasi','Aktif','Selesai','Dibatalkan') COLLATE utf8mb4_unicode_ci DEFAULT 'Booking',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id`, `id_pelanggan`, `id_motor`, `id_admin`, `tgl_mulai`, `tgl_kembali`, `total_biaya`, `status_sewa`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2026-01-17 00:00:00', '2026-01-18 00:00:00', '175000.00', 'Proses Verifikasi', '2026-01-18 11:49:09', '2026-01-18 17:21:51'),
(2, 2, 1, NULL, '2026-01-17 00:00:00', '2026-01-18 00:00:00', '175000.00', 'Booking', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(3, 3, 2, NULL, '2026-01-23 00:00:00', '2026-01-24 00:00:00', '160000.00', 'Booking', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(4, 4, 2, NULL, '2026-01-21 00:00:00', '2026-01-22 00:00:00', '470000.00', 'Booking', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(5, 5, 2, NULL, '2026-01-18 00:00:00', '2026-01-20 00:00:00', '555000.00', 'Booking', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(6, 6, 1, NULL, '2026-01-21 00:00:00', '2026-01-23 00:00:00', '450000.00', 'Booking', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(7, 7, 1, NULL, '2026-01-29 00:00:00', '2026-01-31 00:00:00', '555000.00', 'Proses Verifikasi', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(8, 8, 4, NULL, '2026-01-18 00:00:00', '2026-01-19 00:00:00', '570000.00', 'Proses Verifikasi', '2026-01-18 11:49:09', '2026-01-18 11:49:09'),
(9, 9, 4, NULL, '2026-01-27 00:00:00', '2026-01-30 00:00:00', '1100000.00', 'Proses Verifikasi', '2026-01-18 11:49:09', '2026-01-18 11:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0I4WPVm0IsajPcdJWozIOQy3wndi9vrow5Qmijtz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmRDVlNIbURwSldwUjhPaTZrTXp6Q2xGa2luTDVQdHM4cWdrOWxJSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768783315),
('3VNWSIj4baVTyBkx1PtihVOkXpa4wpSmQUthM6vW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkZtY1pDaU9UNjF0TTNvalhsaVZzSTlXN0xHSFhYSUhZdnFQVTBVeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7czo1OiJyb3V0ZSI7czoxMToiYWRtaW4ubG9naW4iO319', 1768783559),
('aHMuyYYvCRg4zsILo4DJ8vP9uOod3ZQvUMAj7PaI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjBPbUVBekY2a2pMYnZDVjBRc21VZEhnVmtCYjN1dmY5YkUyV2hnNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768783315),
('HaXO0dk6bEW3OUsA423sD2GlKNdN6Sw48eM8EukT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXNIYkd6bHVIMzlrT2gxeW12TVRORFBMTnBGMVU2dGdyT2pBZDNDdSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768783314),
('J3g9bJY7Ayu1fx8BdE2tb0fx26uzXuVxAk3PlYTq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzVqQnFSV0NPZUxVNURJS1VHM3BPVElwU0pDcGdJV25VU0lwNlFQdiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768783313),
('LTuKb6EFsQsy88Dmy03yD6BSHduhvVLh8rElBVJJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianJDS1BvUjVaZ29TaHJtQm1kNW1ST1BDMEpPaFJ1elFKVXF6NXpJdyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768783314),
('NVcyjL2deXbd1Lef4f9O3cldhSX3g752Di9D62qW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHZySE1kaDR6anNHd0F2S21PWVR4bDBSc0Jnd2FHZXQ5WDZhZW84ZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768783316),
('pHEmtKyaezlWzSKpqxrURBEW3yEnXjbzeZgQIRNh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXJ4QjRxS296VVNkcTV5YmlISUJvU2d5dG5HM0E5S0VaQllJSFBYTiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768783315);

-- --------------------------------------------------------

--
-- Table structure for table `tambahan`
--

CREATE TABLE `tambahan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_item` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_total` int NOT NULL DEFAULT '0',
  `harga_satuan` decimal(12,2) NOT NULL,
  `gambar_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cek_kondisi`
--
ALTER TABLE `cek_kondisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cek_kondisi_id_penyewaan_foreign` (`id_penyewaan`),
  ADD KEY `cek_kondisi_id_admin_foreign` (`id_admin`);

--
-- Indexes for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_sewa_id_penyewaan_foreign` (`id_penyewaan`),
  ADD KEY `detail_sewa_id_tambahan_foreign` (`id_tambahan`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `motor_slug_unique` (`slug`),
  ADD UNIQUE KEY `motor_plat_nomor_unique` (`plat_nomor`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_id_penyewaan_foreign` (`id_penyewaan`),
  ADD KEY `pembayaran_id_admin_foreign` (`id_admin`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyewaan_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `penyewaan_id_motor_foreign` (`id_motor`),
  ADD KEY `penyewaan_id_admin_foreign` (`id_admin`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tambahan`
--
ALTER TABLE `tambahan`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cek_kondisi`
--
ALTER TABLE `cek_kondisi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tambahan`
--
ALTER TABLE `tambahan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cek_kondisi`
--
ALTER TABLE `cek_kondisi`
  ADD CONSTRAINT `cek_kondisi_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `cek_kondisi_id_penyewaan_foreign` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD CONSTRAINT `detail_sewa_id_penyewaan_foreign` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_sewa_id_tambahan_foreign` FOREIGN KEY (`id_tambahan`) REFERENCES `tambahan` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `pembayaran_id_penyewaan_foreign` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `penyewaan_id_motor_foreign` FOREIGN KEY (`id_motor`) REFERENCES `motor` (`id`),
  ADD CONSTRAINT `penyewaan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
