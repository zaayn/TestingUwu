-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 04:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testingiso`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `a_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `a_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_nilai` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`a_id`, `id`, `a_nama`, `a_url`, `a_file`, `a_nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bobot Patokan', 'none', 'none', '0.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karakteristik`
--

CREATE TABLE `karakteristik` (
  `k_id` int(10) UNSIGNED NOT NULL,
  `a_id` int(10) UNSIGNED NOT NULL,
  `k_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_bobot` decimal(8,2) NOT NULL,
  `k_nilai` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karakteristik`
--

INSERT INTO `karakteristik` (`k_id`, `a_id`, `k_nama`, `k_bobot`, `k_nilai`) VALUES
(1, 1, 'Functional Suitability', '0.21', '0.00'),
(2, 1, 'Performance Efficiency', '0.24', '0.00'),
(3, 1, 'Compatibility', '0.05', '0.00'),
(4, 1, 'Usability', '0.12', '0.00'),
(5, 1, 'Reliability', '0.08', '0.00'),
(6, 1, 'Security', '0.20', '0.00'),
(7, 1, 'Maintainability', '0.05', '0.00'),
(8, 1, 'Portability', '0.05', '0.00');

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
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2020_06_02_034720_create_users_table', 1),
(8, '2020_06_15_142816_create_aplikasi_table', 1),
(9, '2020_12_23_011145_create_karakteristik_table', 1),
(10, '2020_12_23_011435_create_subkarakteristik_table', 1);

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
-- Table structure for table `subkarakteristik`
--

CREATE TABLE `subkarakteristik` (
  `sk_id` int(10) UNSIGNED NOT NULL,
  `k_id` int(10) UNSIGNED NOT NULL,
  `sk_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_relatif` decimal(8,2) NOT NULL,
  `bobot_absolut` decimal(8,2) NOT NULL,
  `nilai_subfaktor` decimal(8,2) NOT NULL,
  `nilai_absolut` decimal(8,2) NOT NULL,
  `jml_res` int(11) NOT NULL,
  `total_per_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkarakteristik`
--

INSERT INTO `subkarakteristik` (`sk_id`, `k_id`, `sk_nama`, `bobot_relatif`, `bobot_absolut`, `nilai_subfaktor`, `nilai_absolut`, `jml_res`, `total_per_sub`) VALUES
(1, 1, 'Functional Completeness', '0.37', '0.00', '0.00', '0.00', 0, 0),
(2, 1, 'Functional Correctness', '0.32', '0.00', '0.00', '0.00', 0, 0),
(3, 1, 'Functional Appropriateness', '0.31', '0.00', '0.00', '0.00', 0, 0),
(4, 2, 'Time Behaviour', '0.40', '0.00', '0.00', '0.00', 0, 0),
(5, 2, 'Resource Utilization', '0.20', '0.00', '0.00', '0.00', 0, 0),
(6, 2, 'Capacity', '0.40', '0.00', '0.00', '0.00', 0, 0),
(7, 3, 'Co-Existence', '0.45', '0.00', '0.00', '0.00', 0, 0),
(8, 3, 'Interoperability', '0.55', '0.00', '0.00', '0.00', 0, 0),
(9, 4, 'Appropriateness Recognizability', '0.19', '0.00', '0.00', '0.00', 0, 0),
(10, 4, 'Learnability', '0.15', '0.00', '0.00', '0.00', 0, 0),
(11, 4, 'Operability', '0.22', '0.00', '0.00', '0.00', 0, 0),
(12, 4, 'User Error Protection', '0.16', '0.00', '0.00', '0.00', 0, 0),
(13, 4, 'User Interface Aesthetics', '0.08', '0.00', '0.00', '0.00', 0, 0),
(14, 4, 'Accessibility', '0.20', '0.00', '0.00', '0.00', 0, 0),
(15, 5, 'Maturity', '0.20', '0.00', '0.00', '0.00', 0, 0),
(16, 5, 'Availability', '0.25', '0.00', '0.00', '0.00', 0, 0),
(17, 5, 'Fault-Tolerance', '0.30', '0.00', '0.00', '0.00', 0, 0),
(18, 5, 'Recoverability', '0.25', '0.00', '0.00', '0.00', 0, 0),
(19, 6, 'Confidentiality', '0.15', '0.00', '0.00', '0.00', 0, 0),
(20, 6, 'Integrity', '0.25', '0.00', '0.00', '0.00', 0, 0),
(21, 6, 'Non-repudiation', '0.15', '0.00', '0.00', '0.00', 0, 0),
(22, 6, 'Authenticity', '0.25', '0.00', '0.00', '0.00', 0, 0),
(23, 6, 'Accountability', '0.20', '0.00', '0.00', '0.00', 0, 0),
(24, 7, 'Modularity', '0.15', '0.00', '0.00', '0.00', 0, 0),
(25, 7, 'Reusability', '0.25', '0.00', '0.00', '0.00', 0, 0),
(26, 7, 'Analysability', '0.15', '0.00', '0.00', '0.00', 0, 0),
(27, 7, 'Modifiability', '0.25', '0.00', '0.00', '0.00', 0, 0),
(28, 7, 'Testability', '0.20', '0.00', '0.00', '0.00', 0, 0),
(29, 8, 'Adaptability', '0.32', '0.00', '0.00', '0.00', 0, 0),
(30, 8, 'Installability', '0.27', '0.00', '0.00', '0.00', 0, 0),
(31, 8, 'Replaceability', '0.41', '0.00', '0.00', '0.00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `instansi`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '', 'admin@gmail.com', '$2y$10$EDS4AUZbRjwtzsruE38QZ.XfsLVOkos2pHawiNt//m0qca18VgHFi', 'noQTnNT0GvCYOr8cUYHUixDxClg13E55BPH8hYyS1MTzMpazd7ynY8mRZvYn', '2020-06-01 14:41:23', '2020-06-01 14:41:23'),
(4, 'admin4', 'admin', '', 'admin4@gmail.com', '$2y$10$.oZENjbmN0BnmhSQ1n75OuNizaHnPkqg5CQyWHJ96jD1VFshXuEwa', 'OtBBzwFdkNoFplVKEWcqHC5lNIl24DFxn4TUOpx3w7UZ7tgfRIS50SRDNtkk', '2020-06-01 14:47:39', '2020-06-01 14:47:39'),
(5, 'admin5', 'admin', '', 'admin5@gmail.com', '$2y$10$sljzYraduOYxS/vNq4BKHOHVsUiUKTimYstLycmEN1YNwm.xcOTXW', 'IShidUGXGbw95zMcY8jllRNqmiD95zkrraoFNoNE7oLJJbdaVd5eOUiH4gRo', '2020-06-01 14:50:05', '2020-06-01 14:50:05'),
(7, 'Ulfatuz Z', 'softwaretester', 'ITS', 'zzz@gmail.com', '$2y$10$MMh1qmoY3ByQtt6SFexYOelawB68DD5oI2Ky.luGFitLLZRsvBF8W', 'y3r4ilUWuSt4aBhBXzc8l5vNcICooR4o2mlBYNRIjFwINXNWm6shhVn9kYku', '2020-06-01 15:40:45', '2020-06-01 15:40:45'),
(11, 'admin8', 'admin', '', 'admin8@gmail.com', '$2y$10$./tQpq3nwgbjH8NeyIgUQOqxfjPbk5ZzRvH.LzbO5JB58PiDu0.Z.', 'stXFsTsrTHyq6uEw3dZPTqdAKMtgN1pKFZdh5Sm0pFd3fTtdbCmV314NQ00y', NULL, NULL),
(12, 'admin9', 'admin', '', 'admin9@gmail.com', '$2y$10$QuCI1CkYDvUlf/8fjSoua..TzD6DDJ6LnmKsCfbPP9Eyn/BRurjF2', 'Tv8wfVThFUH2yzlivPK7jLeX2ofaTTlby3kdNnldlZQjQqsGe8X7BCZEvGmg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `aplikasi_a_id_unique` (`a_id`),
  ADD KEY `aplikasi_id_foreign` (`id`);

--
-- Indexes for table `karakteristik`
--
ALTER TABLE `karakteristik`
  ADD PRIMARY KEY (`k_id`),
  ADD UNIQUE KEY `karakteristik_k_id_unique` (`k_id`),
  ADD KEY `karakteristik_a_id_foreign` (`a_id`);

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
-- Indexes for table `subkarakteristik`
--
ALTER TABLE `subkarakteristik`
  ADD PRIMARY KEY (`sk_id`),
  ADD UNIQUE KEY `subkarakteristik_sk_id_unique` (`sk_id`),
  ADD KEY `subkarakteristik_k_id_foreign` (`k_id`);

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
-- AUTO_INCREMENT for table `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `a_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karakteristik`
--
ALTER TABLE `karakteristik`
  MODIFY `k_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subkarakteristik`
--
ALTER TABLE `subkarakteristik`
  MODIFY `sk_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD CONSTRAINT `aplikasi_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karakteristik`
--
ALTER TABLE `karakteristik`
  ADD CONSTRAINT `karakteristik_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `aplikasi` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkarakteristik`
--
ALTER TABLE `subkarakteristik`
  ADD CONSTRAINT `subkarakteristik_k_id_foreign` FOREIGN KEY (`k_id`) REFERENCES `karakteristik` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
