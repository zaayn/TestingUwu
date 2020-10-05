-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2020 pada 14.01
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

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
-- Struktur dari tabel `aplikasi`
--

CREATE TABLE `aplikasi` (
  `a_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `a_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aplikasi`
--

INSERT INTO `aplikasi` (`a_id`, `id`, `a_nama`, `a_total`, `created_at`, `updated_at`) VALUES
(1, 7, 'Integra', 0.00, '2020-06-17 19:51:07', '2020-06-17 19:51:07'),
(2, 7, 'MyITS', 0.00, '2020-06-17 20:37:56', '2020-06-17 20:37:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasilkuesioner`
--

CREATE TABLE `hasilkuesioner` (
  `ps_id` int(10) UNSIGNED NOT NULL,
  `r_id` int(10) UNSIGNED NOT NULL,
  `hk_nilai` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karakteristik`
--

CREATE TABLE `karakteristik` (
  `k_id` int(10) UNSIGNED NOT NULL,
  `k_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_bobot` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karakteristik`
--

INSERT INTO `karakteristik` (`k_id`, `k_nama`, `k_bobot`) VALUES
(1, 'Functional Suitability', 0.21),
(2, 'Performance Efficiency', 0.24),
(3, 'Compatibility', 0.05),
(4, 'Usability', 0.12),
(5, 'Reliability', 0.08),
(6, 'Security', 0.20),
(7, 'Maintainability', 0.05),
(8, 'Portability', 0.05);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_02_034720_create_users_table', 2),
(11, '2020_06_15_142816_create_aplikasi_table', 3),
(12, '2020_06_15_155458_create_karakteristik_table', 3),
(13, '2020_06_15_160759_create_subkarakteristik_table', 3),
(14, '2020_06_16_063408_create_penilaiankarakteristik_table', 4),
(15, '2020_06_16_064444_create_penilaiansubkarakteristik_table', 5),
(17, '2020_06_17_071219_create_responden_table', 6),
(19, '2020_06_17_071750_create_hasilkuesioner_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin1@gmail.com', '$2y$10$wPt7.KXFiuyQqvKZH.RjHOZZZ3xLzOlPu2eqzhrVZ79C5U12QnWo6', '2020-06-01 20:53:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaiankarakteristik`
--

CREATE TABLE `penilaiankarakteristik` (
  `pk_id` int(10) UNSIGNED NOT NULL,
  `a_id` int(10) UNSIGNED NOT NULL,
  `k_id` int(10) UNSIGNED NOT NULL,
  `pk_nilai` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaiansubkarakteristik`
--

CREATE TABLE `penilaiansubkarakteristik` (
  `ps_id` int(10) UNSIGNED NOT NULL,
  `pk_id` int(10) UNSIGNED NOT NULL,
  `ps_bobot_relatif` double(8,2) NOT NULL,
  `ps_nilai` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `responden`
--

CREATE TABLE `responden` (
  `r_id` int(10) UNSIGNED NOT NULL,
  `r_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkarakteristik`
--

CREATE TABLE `subkarakteristik` (
  `sk_id` int(10) UNSIGNED NOT NULL,
  `k_id` int(10) UNSIGNED NOT NULL,
  `sk_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_relatif` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `subkarakteristik`
--

INSERT INTO `subkarakteristik` (`sk_id`, `k_id`, `sk_nama`, `bobot_relatif`) VALUES
(1, 1, 'Functional Completeness', 0.37),
(2, 1, 'Functional Correctness', 0.32),
(3, 1, 'Functional Appropriateness', 0.31),
(4, 2, 'Time Behaviour', 0.40),
(5, 2, 'Resource Utilization', 0.20),
(6, 2, 'Capacity', 0.40),
(7, 3, 'Co-Existence', 0.45),
(8, 3, 'Interoperability', 0.55),
(9, 4, 'Appropriateness Recognizability', 0.19),
(10, 4, 'Learnability', 0.15),
(11, 4, 'Operability', 0.22),
(12, 4, 'User Error Protection', 0.16),
(13, 4, 'User Interface Aesthetics', 0.08),
(14, 4, 'Accessibility', 0.20),
(15, 5, 'Maturity', 0.20),
(16, 5, 'Availability', 0.25),
(17, 5, 'Fault-Tolerance', 0.30),
(18, 5, 'Recoverability', 0.25),
(19, 6, 'Confidentiality', 0.15),
(20, 6, 'Integrity', 0.25),
(21, 6, 'Non-repudiation', 0.15),
(22, 6, 'Authenticity', 0.25),
(23, 6, 'Accountability', 0.20),
(24, 7, 'Modularity', 0.15),
(25, 7, 'Reusability', 0.25),
(26, 7, 'Analysability', 0.15),
(27, 7, 'Modifiability', 0.25),
(28, 7, 'Testability', 0.20),
(29, 8, 'Adaptability', 0.32),
(30, 8, 'Installability', 0.27),
(31, 8, 'Replaceability', 0.41);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `instansi`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'admin3', 'admin', '', 'admin3@gmail.com', '$2y$10$EDS4AUZbRjwtzsruE38QZ.XfsLVOkos2pHawiNt//m0qca18VgHFi', 'noQTnNT0GvCYOr8cUYHUixDxClg13E55BPH8hYyS1MTzMpazd7ynY8mRZvYn', '2020-06-01 21:41:23', '2020-06-01 21:41:23'),
(4, 'admin4', 'admin', '', 'admin4@gmail.com', '$2y$10$.oZENjbmN0BnmhSQ1n75OuNizaHnPkqg5CQyWHJ96jD1VFshXuEwa', 'OtBBzwFdkNoFplVKEWcqHC5lNIl24DFxn4TUOpx3w7UZ7tgfRIS50SRDNtkk', '2020-06-01 21:47:39', '2020-06-01 21:47:39'),
(5, 'admin5', 'admin', '', 'admin5@gmail.com', '$2y$10$sljzYraduOYxS/vNq4BKHOHVsUiUKTimYstLycmEN1YNwm.xcOTXW', 'IShidUGXGbw95zMcY8jllRNqmiD95zkrraoFNoNE7oLJJbdaVd5eOUiH4gRo', '2020-06-01 21:50:05', '2020-06-01 21:50:05'),
(7, 'Ulfatuz Z', 'softwaretester', 'ITS', 'zzz@gmail.com', '$2y$10$MMh1qmoY3ByQtt6SFexYOelawB68DD5oI2Ky.luGFitLLZRsvBF8W', 'y3r4ilUWuSt4aBhBXzc8l5vNcICooR4o2mlBYNRIjFwINXNWm6shhVn9kYku', '2020-06-01 22:40:45', '2020-06-01 22:40:45'),
(11, 'admin8', 'admin', '', 'admin8@gmail.com', '$2y$10$./tQpq3nwgbjH8NeyIgUQOqxfjPbk5ZzRvH.LzbO5JB58PiDu0.Z.', 'stXFsTsrTHyq6uEw3dZPTqdAKMtgN1pKFZdh5Sm0pFd3fTtdbCmV314NQ00y', NULL, NULL),
(12, 'admin9', 'admin', '', 'admin9@gmail.com', '$2y$10$QuCI1CkYDvUlf/8fjSoua..TzD6DDJ6LnmKsCfbPP9Eyn/BRurjF2', 'Tv8wfVThFUH2yzlivPK7jLeX2ofaTTlby3kdNnldlZQjQqsGe8X7BCZEvGmg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `aplikasi_a_id_unique` (`a_id`),
  ADD KEY `aplikasi_id_foreign` (`id`);

--
-- Indeks untuk tabel `hasilkuesioner`
--
ALTER TABLE `hasilkuesioner`
  ADD KEY `hasilkuesioner_ps_id_foreign` (`ps_id`),
  ADD KEY `hasilkuesioner_r_id_foreign` (`r_id`);

--
-- Indeks untuk tabel `karakteristik`
--
ALTER TABLE `karakteristik`
  ADD PRIMARY KEY (`k_id`),
  ADD UNIQUE KEY `karakteristik_k_id_unique` (`k_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penilaiankarakteristik`
--
ALTER TABLE `penilaiankarakteristik`
  ADD PRIMARY KEY (`pk_id`),
  ADD UNIQUE KEY `penilaiankarakteristik_pk_id_unique` (`pk_id`),
  ADD KEY `penilaiankarakteristik_a_id_foreign` (`a_id`),
  ADD KEY `penilaiankarakteristik_k_id_foreign` (`k_id`);

--
-- Indeks untuk tabel `penilaiansubkarakteristik`
--
ALTER TABLE `penilaiansubkarakteristik`
  ADD PRIMARY KEY (`ps_id`),
  ADD UNIQUE KEY `penilaiansubkarakteristik_ps_id_unique` (`ps_id`),
  ADD KEY `penilaiansubkarakteristik_pk_id_foreign` (`pk_id`);

--
-- Indeks untuk tabel `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`r_id`),
  ADD UNIQUE KEY `responden_r_id_unique` (`r_id`);

--
-- Indeks untuk tabel `subkarakteristik`
--
ALTER TABLE `subkarakteristik`
  ADD PRIMARY KEY (`sk_id`),
  ADD UNIQUE KEY `subkarakteristik_sk_id_unique` (`sk_id`),
  ADD KEY `subkarakteristik_k_id_foreign` (`k_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `a_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `karakteristik`
--
ALTER TABLE `karakteristik`
  MODIFY `k_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `penilaiankarakteristik`
--
ALTER TABLE `penilaiankarakteristik`
  MODIFY `pk_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaiansubkarakteristik`
--
ALTER TABLE `penilaiansubkarakteristik`
  MODIFY `ps_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `responden`
--
ALTER TABLE `responden`
  MODIFY `r_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subkarakteristik`
--
ALTER TABLE `subkarakteristik`
  MODIFY `sk_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD CONSTRAINT `aplikasi_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasilkuesioner`
--
ALTER TABLE `hasilkuesioner`
  ADD CONSTRAINT `hasilkuesioner_ps_id_foreign` FOREIGN KEY (`ps_id`) REFERENCES `penilaiansubkarakteristik` (`ps_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasilkuesioner_r_id_foreign` FOREIGN KEY (`r_id`) REFERENCES `responden` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaiankarakteristik`
--
ALTER TABLE `penilaiankarakteristik`
  ADD CONSTRAINT `penilaiankarakteristik_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `aplikasi` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaiankarakteristik_k_id_foreign` FOREIGN KEY (`k_id`) REFERENCES `karakteristik` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaiansubkarakteristik`
--
ALTER TABLE `penilaiansubkarakteristik`
  ADD CONSTRAINT `penilaiansubkarakteristik_pk_id_foreign` FOREIGN KEY (`pk_id`) REFERENCES `penilaiankarakteristik` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `subkarakteristik`
--
ALTER TABLE `subkarakteristik`
  ADD CONSTRAINT `subkarakteristik_k_id_foreign` FOREIGN KEY (`k_id`) REFERENCES `karakteristik` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
