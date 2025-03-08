-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 07:19 AM
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
-- Database: `tardes`
--

-- --------------------------------------------------------

--
-- Table structure for table `banjar`
--

CREATE TABLE `banjar` (
  `banjar_id` bigint(20) NOT NULL,
  `nama_banjar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banjar`
--

INSERT INTO `banjar` (`banjar_id`, `nama_banjar`) VALUES
(1, 'Banjar Dinas Semadi'),
(2, 'Banjar Dharma Yadnya'),
(3, 'Banjar Dharma Yasa'),
(4, 'Banjar Dharma Kerti'),
(5, 'Banjar Banyualit'),
(6, 'Banjar Kalibukbuk'),
(7, 'Banjar Lebah'),
(8, 'Banjar Asah');

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `bantuan_id` bigint(20) NOT NULL,
  `operator_id` bigint(20) NOT NULL,
  `choices` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`choices`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`bantuan_id`, `operator_id`, `choices`, `created_at`, `updated_at`) VALUES
(6, 2, '\"[\\\"PKH\\\",\\\"KIP\\\"]\"', '2025-01-05 20:24:38', '2025-01-05 20:24:38'),
(7, 2, '\"[\\\"KIS\\\",\\\"KIP\\\"]\"', '2025-01-05 22:13:57', '2025-01-05 22:13:57'),
(8, 2, '\"[\\\"PBI\\\",\\\"KIS\\\"]\"', '2025-01-05 22:14:00', '2025-01-05 22:14:00'),
(9, 2, '\"[\\\"KIS\\\"]\"', '2025-01-05 22:16:41', '2025-01-05 22:16:41'),
(10, 2, '\"[\\\"KIP\\\"]\"', '2025-01-05 22:18:30', '2025-01-05 22:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` bigint(20) NOT NULL,
  `operator_id` bigint(20) NOT NULL,
  `nama_kepala_keluarga` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `pekerjaan_id` bigint(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `komunitas_id` bigint(20) NOT NULL,
  `banjar_id` bigint(20) NOT NULL,
  `bantuan_id` bigint(20) DEFAULT NULL,
  `foto_kk` varchar(255) DEFAULT NULL,
  `foto_rumah` varchar(255) DEFAULT NULL,
  `jumlah_anggota` int(11) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `operator_id`, `nama_kepala_keluarga`, `nik`, `kk`, `pekerjaan_id`, `alamat`, `komunitas_id`, `banjar_id`, `bantuan_id`, `foto_kk`, `foto_rumah`, `jumlah_anggota`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(3, 2, 'Komang Sudaji', '13123', '132312', 3, '<p>Jln. A Yani</p>', 2, 1, 6, NULL, NULL, 3, '-8.11008', '115.1041536', '2025-01-05 20:24:30', '2025-01-05 20:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datkel`
--

CREATE TABLE `datkel` (
  `datkel_id` int(11) NOT NULL,
  `komunitas_id` int(11) NOT NULL,
  `nama_kpl` varchar(100) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `Pekerjaan` varchar(50) NOT NULL,
  `No_KK` varchar(16) NOT NULL,
  `jmh_anggota` int(11) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_rumah` int(11) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `gambar_rumah` varchar(225) NOT NULL,
  `gambar_kk` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `komunitas_id` bigint(20) NOT NULL,
  `komunitas_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`komunitas_id`, `komunitas_nama`) VALUES
(1, 'Krama Desa Adat'),
(2, 'Krama Tamiu'),
(3, 'Tamiu');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_22_011742_create_operators_table', 1),
(5, '2024_12_22_014211_add_is_operator_to_users_table', 1),
(6, '2025_01_02_100038_add_username_to_users_table', 2),
(7, '2025_01_02_161136_add_level_to_operators_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `operator_id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`operator_id`, `username`, `password`, `created_at`, `updated_at`, `level`) VALUES
(1, 'operator123', '$2y$12$RtO0exZH1reCJYt8NR7u4.H.MJgO05UbVz1EycnD11rInphvwX0Gm', '2024-12-26 04:08:14', '2024-12-26 04:08:14', 2),
(2, 'Anon47', '$2y$12$hZ2DTO98M/PKA0fZ8GOZleOhuKic3CvF841k57KoqydBVHmFl8ona', '2025-01-02 08:24:04', '2025-01-02 08:24:04', 1),
(3, 'Trueman446', '$2y$12$AmB.2877xk0ItolUgtXpL.eh8Qxu04zRcbEGsy0c45V5nagdAJi1G', '2025-01-02 16:24:51', '2025-01-02 16:24:51', 1);

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
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `pekerjaan_id` bigint(20) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`pekerjaan_id`, `nama_pekerjaan`) VALUES
(1, 'PNS'),
(2, 'Guru/Dosen'),
(3, 'Dokter/Perawat'),
(4, 'Wiraswasta'),
(5, 'Karyawan Swasta'),
(6, 'Petani'),
(7, 'Nelayan'),
(8, 'Pelajar/Mahasiswa'),
(9, 'Ibu Rumah Tangga'),
(10, 'Pensiunan');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DpEU3zqJEV8exxfQ8EvXW8Mn4BHuPT0GbbHPZ5f0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmpQcDVHZ0pkWFk3Z3ZibjlLWXhLVUR3bTVZV0xvcnRnMllRTkk1RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736144331);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_operator` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banjar`
--
ALTER TABLE `banjar`
  ADD PRIMARY KEY (`banjar_id`);

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`bantuan_id`),
  ADD KEY `fk_operator_id_2` (`operator_id`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_operator_id` (`operator_id`),
  ADD KEY `fk_pekerjaan_id` (`pekerjaan_id`),
  ADD KEY `fk_komunitas_id` (`komunitas_id`),
  ADD KEY `fk_banjar_id` (`banjar_id`),
  ADD KEY `bantuan_id` (`bantuan_id`);

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
-- Indexes for table `datkel`
--
ALTER TABLE `datkel`
  ADD PRIMARY KEY (`datkel_id`),
  ADD UNIQUE KEY `komunitas_id` (`komunitas_id`);

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
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`komunitas_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`operator_id`),
  ADD UNIQUE KEY `operators_username_unique` (`username`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`pekerjaan_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banjar`
--
ALTER TABLE `banjar`
  MODIFY `banjar_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `bantuan_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datkel`
--
ALTER TABLE `datkel`
  MODIFY `datkel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `komunitas_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `operator_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `pekerjaan_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD CONSTRAINT `fk_operator_id_2` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`operator_id`);

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`bantuan_id`) REFERENCES `bantuan` (`bantuan_id`),
  ADD CONSTRAINT `fk_banjar_id` FOREIGN KEY (`banjar_id`) REFERENCES `banjar` (`banjar_id`),
  ADD CONSTRAINT `fk_komunitas_id` FOREIGN KEY (`komunitas_id`) REFERENCES `komunitas` (`komunitas_id`),
  ADD CONSTRAINT `fk_operator_id` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`operator_id`),
  ADD CONSTRAINT `fk_pekerjaan_id` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaan` (`pekerjaan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
