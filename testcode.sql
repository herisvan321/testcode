-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2019 at 02:44 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_models`
--

CREATE TABLE `menu_models` (
  `id_menu` int(10) UNSIGNED NOT NULL,
  `nama_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_models`
--

INSERT INTO `menu_models` (`id_menu`, `nama_menu`, `type`, `status`, `harga`, `foto_menu`, `created_at`, `updated_at`) VALUES
(6, 'Nasi Goreng Telur Asin', 0, 0, '12000', 'IMG_nasi_goreng_telur_as_2019_02_05_12_55_41.jpg', '2019-02-05 05:41:55', '2019-02-05 05:41:55'),
(7, 'Nasi Goreng Teri Udang', 0, 0, '15000', 'IMG_nasi_goreng_teri_uda_2019_02_05_12_07_43.jpg', '2019-02-05 05:43:07', '2019-02-05 05:43:07'),
(8, 'Nasi Goreng Kembang Kol', 0, 0, '10000', 'IMG_nasi_goreng_kembang_2019_02_05_12_42_43.jpg', '2019-02-05 05:43:42', '2019-02-05 05:43:42'),
(9, 'Jus Alpukat', 1, 0, '8000', 'IMG_jus_alpukat_2019_02_05_12_09_44.jpg', '2019-02-05 05:44:09', '2019-02-05 05:44:09'),
(10, 'Jus Buah Naga', 1, 0, '15000', 'IMG_jus_buah_naga_2019_02_05_12_32_44.jpg', '2019-02-05 05:44:32', '2019-02-05 05:44:32'),
(11, 'Pisang Goreng Kipas', 0, 0, '8000', 'IMG_pisang_goreng_kipas_2019_02_05_12_21_45.jpg', '2019-02-05 05:45:21', '2019-02-05 05:45:21'),
(12, 'Roti bakar ice cream', 0, 0, '15000', 'IMG_roti_bakar_ice_cream_2019_02_05_12_09_46.jpg', '2019-02-05 05:46:09', '2019-02-05 05:46:09'),
(13, 'Jus buah naga yakult', 1, 0, '18000', 'IMG_jus_buah_naga_yakult_2019_02_05_12_43_47.jpg', '2019-02-05 05:47:43', '2019-02-05 05:47:43');

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
(3, '2019_02_04_150019_create_menu_models_table', 2),
(4, '2019_02_05_025000_create_pesanan_models_table', 3),
(5, '2019_02_05_061353_create_penghasilan_models_table', 4);

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
-- Table structure for table `penghasilan_models`
--

CREATE TABLE `penghasilan_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_meja` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kembalian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pesanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penghasilan_models`
--

INSERT INTO `penghasilan_models` (`id`, `no_meja`, `nama_pelanggan`, `total`, `bayar`, `kembalian`, `id_user`, `id_pesanan`, `tanggal`, `created_at`, `updated_at`) VALUES
(7, '1', 'rika', '18000', '20000', '2000', '1', 'ERP05022019-001', '2019-02-05', '2019-02-05 05:57:18', '2019-02-05 05:57:18'),
(8, '6', 'husen', '8000', '10000', '2000', '1', 'ERP05022019-005', '2019-02-05', '2019-02-05 05:57:53', '2019-02-05 05:57:53'),
(9, '7', 'reni', '12000', '15000', '3000', '1', 'ERP05022019-006', '2019-02-05', '2019-02-05 05:58:12', '2019-02-05 05:58:12'),
(10, '5', 'serli', '15000', '20000', '5000', '2', 'ERP05022019-012', '2019-02-05', '2019-02-05 06:04:17', '2019-02-05 06:04:17'),
(11, '5', 'rudi', '10000', '10000', '0', '2', 'ERP05022019-011', '2019-02-05', '2019-02-05 06:04:35', '2019-02-05 06:04:35'),
(12, '3', 'rina', '30000', '50000', '20000', '2', 'ERP05022019-009', '2019-02-05', '2019-02-05 06:04:50', '2019-02-05 06:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_models`
--

CREATE TABLE `pesanan_models` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_meja` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_models`
--

INSERT INTO `pesanan_models` (`id`, `id_pesanan`, `no_meja`, `nama_pelanggan`, `harga`, `jumlah`, `total`, `status`, `id_menu`, `id_user`, `created_at`, `updated_at`) VALUES
(11, 'ERP05022019-001', '1', 'rika', '18000', '1', '18000', '2', '13', '1', '2019-02-05 05:53:09', '2019-02-05 05:57:18'),
(12, 'ERP05022019-002', '2', 'riri', '15000', '1', '15000', '0', '12', '1', '2019-02-05 05:53:27', '2019-02-05 05:53:27'),
(13, 'ERP05022019-003', '3', 'serli', '8000', '1', '8000', '0', '11', '1', '2019-02-05 05:53:44', '2019-02-05 05:53:44'),
(14, 'ERP05022019-004', '5', 'aldi', '15000', '1', '15000', '0', '10', '1', '2019-02-05 05:54:55', '2019-02-05 05:54:55'),
(15, 'ERP05022019-005', '6', 'husen', '8000', '1', '8000', '2', '9', '1', '2019-02-05 05:55:11', '2019-02-05 05:57:53'),
(16, 'ERP05022019-006', '7', 'reni', '12000', '1', '12000', '2', '6', '1', '2019-02-05 05:56:08', '2019-02-05 05:58:12'),
(17, 'ERP05022019-007', '2', 'aldi', '15000', '1', '15000', '0', '7', '1', '2019-02-05 05:56:28', '2019-02-05 05:56:28'),
(18, 'ERP05022019-008', '1', 'ami', '18000', '1', '18000', '0', '13', '2', '2019-02-05 06:01:39', '2019-02-05 06:01:39'),
(19, 'ERP05022019-009', '3', 'rina', '15000', '2', '30000', '2', '12', '2', '2019-02-05 06:01:59', '2019-02-05 06:04:50'),
(20, 'ERP05022019-010', '4', 'randi', '8000', '3', '24000', '0', '11', '2', '2019-02-05 06:02:26', '2019-02-05 06:02:26'),
(21, 'ERP05022019-011', '5', 'rudi', '10000', '1', '10000', '2', '8', '2', '2019-02-05 06:02:42', '2019-02-05 06:04:35'),
(22, 'ERP05022019-012', '5', 'serli', '15000', '1', '15000', '2', '7', '2', '2019-02-05 06:03:01', '2019-02-05 06:04:17'),
(23, 'ERP05022019-013', '3', 'sumi', '8000', '2', '16000', '0', '9', '2', '2019-02-05 06:03:45', '2019-02-05 06:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'herisvan', 'herisvan@herisvan.com', NULL, '$2y$10$jCQe2ftNumKpKwP80joWJ.M7u5hBOVOtBz25PE7Kg.Exd5V/LuPga', '1', '09ewUzj4Xda3VV35HnknWpEJK43jBliEnlMBRHXSou1VwcxjIXkj7ndzepuL', '2019-02-04 07:46:54', '2019-02-04 07:46:54'),
(2, 'hendra', 'hendra@hendra.com', NULL, '$2y$10$eXvNVNPGvii7CkrHpj/R/.JFKSPmeHxI82rKilUREBnapegkq9nV6', '2', 'sttYrjVOlta1cmrHA1A5jyUvOGQL0FaJFX1LsDTGOCVniE4oUKKIFbgq2Vak', '2019-02-04 07:47:27', '2019-02-04 07:47:27'),
(3, 'rivan', 'rivan@rivan.com', NULL, '$2y$10$.L1GHyIzAp4NjnoY.xjfu.QgrLP43LNfTP5C8mQUWoCvxri/4IRoa', '0', 'QIyrEWv7NzfC099wYwZMj0ZYTfzKojNpovUPLqPkTshNIP9HT4szIrJqbxH9', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_models`
--
ALTER TABLE `menu_models`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penghasilan_models`
--
ALTER TABLE `penghasilan_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_models`
--
ALTER TABLE `pesanan_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_models`
--
ALTER TABLE `menu_models`
  MODIFY `id_menu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penghasilan_models`
--
ALTER TABLE `penghasilan_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesanan_models`
--
ALTER TABLE `pesanan_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
