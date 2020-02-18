-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2020 pada 17.12
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ujis2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Saisyah', 'reno@gmail.com', '$2y$10$gk9c8PJYBiDipcdzrDdCk.cF0QvfsX/Jhmvc/w483RWx/afGiYY9u', NULL, '2020-01-22 00:46:57', '2020-01-22 00:46:57'),
(3, 'andi', 'aay@gmail.com', '$2y$10$xVZRyo2NRjwZcH9j5A/lg.xAXqcztRT4yjoAXSmjVuNuQiCcu3Iw2', NULL, '2020-01-22 00:49:46', '2020-01-22 00:49:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masternilai`
--

CREATE TABLE `masternilai` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_siswa` int(10) UNSIGNED NOT NULL,
  `id_penguji` int(10) UNSIGNED NOT NULL,
  `status_penguji` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_8` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_9` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_10` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_11` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkat_12` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_subkat_1` double DEFAULT NULL,
  `total_subkat_2` double DEFAULT NULL,
  `total_subkat_3` double DEFAULT NULL,
  `total_subkat_4` double DEFAULT NULL,
  `total_subkat_5` double DEFAULT NULL,
  `total_subkat_6` double DEFAULT NULL,
  `total_subkat_7` double DEFAULT NULL,
  `total_subkat_8` double DEFAULT NULL,
  `total_subkat_9` double DEFAULT NULL,
  `total_subkat_10` double DEFAULT NULL,
  `total_subkat_11` double DEFAULT NULL,
  `total_subkat_12` double DEFAULT NULL,
  `total_nilai_subkat` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masternilai`
--

INSERT INTO `masternilai` (`id`, `id_siswa`, `id_penguji`, `status_penguji`, `nilai_subkat_1`, `nilai_subkat_2`, `nilai_subkat_3`, `nilai_subkat_4`, `nilai_subkat_5`, `nilai_subkat_6`, `nilai_subkat_7`, `nilai_subkat_8`, `nilai_subkat_9`, `nilai_subkat_10`, `nilai_subkat_11`, `nilai_subkat_12`, `total_subkat_1`, `total_subkat_2`, `total_subkat_3`, `total_subkat_4`, `total_subkat_5`, `total_subkat_6`, `total_subkat_7`, `total_subkat_8`, `total_subkat_9`, `total_subkat_10`, `total_subkat_11`, `total_subkat_12`, `total_nilai_subkat`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '3', '90', '90', '90', '90', '90', '90', '90', '70', '80', '80', '90', '90', 2.25, 2.25, 9, 9, 9, 9, 4.5, 7, 8, 4, 9, 13.5, 86.5, '2020-02-14 17:00:00', '2020-02-15 19:56:24'),
(2, 3, 4, '2', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', 2.5, 2.5, 10, 10, 10, 10, 5, 10, 10, 5, 10, 15, 100, NULL, '2020-02-15 19:56:24'),
(4, 3, 4, '1', '80', '80', '80', '90', '80', '80', '70', '80', '80', '80', '70', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-16 09:06:09', '2020-02-16 09:06:09');

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
(3, '2020_01_22_070705_create_admins_table', 1),
(4, '2020_01_22_100042_create_pengujis_table', 2),
(5, '2020_01_29_042206_create_siswas_table', 3),
(6, '2020_02_15_032838_create_masternilais_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguji`
--

CREATE TABLE `penguji` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penguji`
--

INSERT INTO `penguji` (`id`, `nama`, `jabatan`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'si udin', 'direksi', 'plnudin', '$2y$10$HQA/QPSqcichGPgjDuuks.FttExJSW7QUJu2mnpxt/.LRP92hxF4.', NULL, '2020-01-27 18:51:03', '2020-01-27 18:51:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` double DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `notest`, `nilai`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ANINDITYO BASKORO AJI', '1901/ICE/65/S2-MAN/10257', NULL, NULL, NULL, '2020-02-10 20:44:11', '2020-02-10 20:44:11'),
(2, 'AKBAR DWIYOGA NUGRAHA', '1901/ICE/65/S2-SI/10414', NULL, NULL, NULL, '2020-02-10 20:48:39', '2020-02-10 20:48:39'),
(3, 'ABDI SURYA', '1901/ICE/65/S2-OIL/10388', 87.85000000000001, 'LULUS', NULL, '2020-02-10 20:51:17', '2020-02-15 20:40:32'),
(4, 'ALGHIFARY', '1901/ICE/65/S2-MAN/10249', NULL, NULL, NULL, '2020-02-10 20:51:49', '2020-02-10 20:51:49'),
(5, 'Andi Ahmad Fauzan', '1901/ICE/65/S2-MAN/10253', NULL, NULL, NULL, '2020-02-10 20:52:17', '2020-02-10 20:52:17'),
(6, 'BAYU ARDIYANTO', '1901/ICE/65/S2-EBT/10009', NULL, NULL, NULL, '2020-02-10 20:52:37', '2020-02-10 20:52:37'),
(7, 'DHIA ATIKAH ALIYYU', '1901/ICE/65/S2-LIN/10204', NULL, NULL, NULL, '2020-02-10 20:53:00', '2020-02-10 20:53:00'),
(8, 'FAISAL AHMAD', '1901/ICE/65/S2-EBT/10013', NULL, NULL, NULL, '2020-02-10 20:53:18', '2020-02-10 20:53:18'),
(9, 'FARIS HIBATULAZIZ', '1901/ICE/65/S2-ELE/10059', NULL, NULL, NULL, '2020-02-10 20:53:35', '2020-02-10 20:53:35'),
(10, 'FAVIAN FIRWAN FIRDAUS', '1901/ICE/65/S2-MAN/10276', NULL, NULL, NULL, '2020-02-10 20:53:59', '2020-02-10 20:53:59'),
(11, 'FRANSISCUS XAVERIUS GUWOWIJOYO', '1901/ICE/65/S2-EBT/10016', NULL, NULL, NULL, '2020-02-10 20:54:22', '2020-02-10 20:54:22'),
(12, 'GALING SIWI', '1901/ICE/65/S2-MAN/10282', NULL, NULL, NULL, '2020-02-10 20:54:44', '2020-02-10 20:54:44'),
(13, 'GITA MAYA LUCIANA', '1901/ICE/65/S2-MES/10362', NULL, NULL, NULL, '2020-02-10 20:55:03', '2020-02-10 20:55:03'),
(14, 'HENDRO EKO PRABOWO', '1901/ICE/65/S2-INF/10160', NULL, NULL, NULL, '2020-02-10 20:55:29', '2020-02-10 20:55:29'),
(15, 'IDA AYU PUTU KRISTIANTARI', '1901/ICE/65/S2-SI/10432', NULL, NULL, NULL, '2020-02-10 20:55:44', '2020-02-10 20:55:44'),
(16, 'IDA BAGUS GEDE KRESNA ADI JAYA', '1901/ICE/65/S2-ILKOM/10142', NULL, NULL, NULL, '2020-02-10 20:55:59', '2020-02-10 20:55:59'),
(17, 'LUTHFI PRIYANTO AJI', '1901/ICE/65/S2-ILKOM/10143', NULL, NULL, NULL, '2020-02-10 20:56:14', '2020-02-10 20:56:14'),
(18, 'LUTHFIA RAHMAN', '1901/ICE/65/S2-INF/10165', NULL, NULL, NULL, '2020-02-10 20:56:56', '2020-02-10 20:56:56'),
(19, 'M HERU KURNIA', '1901/ICE/65/S2-ELE/10079', NULL, NULL, NULL, '2020-02-10 20:57:19', '2020-02-10 20:57:19'),
(20, 'MUHAMAD SONY BINTANG PRADANA', '1901/ICE/65/S2-EBT/10026', NULL, NULL, NULL, '2020-02-10 20:57:37', '2020-02-10 20:57:37'),
(21, 'NADIRA OCTAVIA WISESA', '1901/ICE/65/S2-EBT/10028', NULL, NULL, NULL, '2020-02-10 20:57:52', '2020-02-10 20:57:52'),
(22, 'NURCAHYO MAULANA', '1901/ICE/65/S2-LIN/10221', NULL, NULL, NULL, '2020-02-10 20:58:08', '2020-02-10 20:58:08'),
(23, 'SITI ADINTYA ARIKA DESARI', '1901/ICE/65/S2-INF/10180', NULL, NULL, NULL, '2020-02-10 20:58:24', '2020-02-10 20:58:24'),
(24, 'SUHENDRA AMKA PUTRA', '1901/ICE/65/S2-LIN/10230', NULL, NULL, NULL, '2020-02-10 20:58:42', '2020-02-10 20:58:42'),
(25, 'TIA WULAN SARI', '1901/ICE/65/S2-IESP/10137', NULL, NULL, NULL, '2020-02-10 20:59:05', '2020-02-10 20:59:05'),
(26, 'TUBAGUS FAKHRI MUHAMMAD', '1901/ICE/65/S2-EBT/10036', NULL, NULL, NULL, '2020-02-10 20:59:30', '2020-02-10 20:59:30'),
(27, 'WAHYU UTOMO', '1901/ICE/65/S2-OIL/10410', NULL, NULL, NULL, '2020-02-10 20:59:46', '2020-02-10 20:59:46'),
(28, 'WIDHIYAKSA SAVEEDRA', '1901/ICE/65/S2-EBT/10037', NULL, NULL, NULL, '2020-02-10 21:00:01', '2020-02-10 21:00:01'),
(29, 'YOKEU RADITYATAMA', '1901/ICE/65/S2-MAN/10335', NULL, NULL, NULL, '2020-02-10 21:00:17', '2020-02-10 21:00:17'),
(30, 'YOSUA HAMONANGAN', '1901/ICE/65/S2-ELE/10099', NULL, NULL, NULL, '2020-02-10 21:00:32', '2020-02-10 21:00:32'),
(31, 'ZULNIO RIZQY HAFIZH BANJARANSARI', '1901/ICE/65/S2-TAM/10477', NULL, NULL, NULL, '2020-02-10 21:00:48', '2020-02-10 21:00:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masternilai`
--
ALTER TABLE `masternilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masternilai_id_siswa_foreign` (`id_siswa`),
  ADD KEY `masternilai_id_penguji_foreign` (`id_penguji`);

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
-- Indeks untuk tabel `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `masternilai`
--
ALTER TABLE `masternilai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `masternilai`
--
ALTER TABLE `masternilai`
  ADD CONSTRAINT `masternilai_id_penguji_foreign` FOREIGN KEY (`id_penguji`) REFERENCES `penguji` (`id`),
  ADD CONSTRAINT `masternilai_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
