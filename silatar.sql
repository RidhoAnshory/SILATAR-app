-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 05:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silatar`
--

-- --------------------------------------------------------

--
-- Table structure for table `akunrt`
--

CREATE TABLE `akunrt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `Jenis_laporan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Waktu` date NOT NULL,
  `Lokasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Penjelasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Unggah_Foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_Unggah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_user`, `Jenis_laporan`, `Waktu`, `Lokasi`, `Penjelasan`, `Unggah_Foto`, `url_Unggah`, `Status`, `Keterangan`, `created_at`, `updated_at`) VALUES
(22, 7, 'Kependudukan', '2021-05-04', 'awaw', 'awa', '1621780080343.WhatsApp Image 2021-04-12 at 14.32.59.jpeg', 'http://127.0.0.1:8000/img/1621780080343.WhatsApp Image 2021-04-12 at 14.32.59.jpeg', 'Diterima', NULL, '2021-05-23 06:28:00', '2021-06-09 07:35:47'),
(26, 9, '', '2021-05-22', 'Lingkungan RT 15', 'Bersih bersih', '1621998650527.Kantor_Kecamatan_Balikpapan_Timur,_Balikpapan.jpg', '', '', NULL, '2021-05-25 19:10:50', '2021-05-25 19:10:50'),
(27, 10, '', '2021-06-18', 'Pos', 'begini', '1622534905995.—Pngtree—ramadan mubarak greeting with islamic_6222003.png', '', '', NULL, '2021-06-01 00:08:25', '2021-06-01 00:08:25'),
(28, 10, '', '2021-07-15', 'aaa', 'aqwqe', '1622534927238.Debora_Christina_Br.Tinjak_02181009_Matematika-removebg-preview.png', '', '', NULL, '2021-06-01 00:08:47', '2021-06-01 00:08:47'),
(29, 11, '', '2021-06-14', 'qweq', 'qweqe', '1622534978500.Amabella_Charita_Smaradhina_Santosa_08181005_PWK-removebg-preview.png', '', '', NULL, '2021-06-01 00:09:38', '2021-06-01 00:09:38'),
(30, 11, '', '2021-04-13', 'qweqwe', 'qweq', '1622534998697.Shoffi_Akmalunnisaa_08181075_Perencanaan_Wilayah_dan_Kota_1_-removebg-preview.png', '', '', NULL, '2021-06-01 00:09:58', '2021-06-01 00:09:58'),
(31, 12, '', '2021-06-17', 'aweqwqe', 'qweqe', '1622535065705.Shoffi_Akmalunnisaa_08181075_Perencanaan_Wilayah_dan_Kota_1_-removebg-preview.png', '', '', NULL, '2021-06-01 00:11:05', '2021-06-01 00:11:05'),
(32, 12, '', '2021-06-18', 'qwe', 'qweq', '1622535093306.Strutur.png', '', '', NULL, '2021-06-01 00:11:33', '2021-06-01 00:11:33'),
(33, 10, '', '2021-09-23', 'drhrty', 'erytey', '1622645603955.—Pngtree—ramadan mubarak greeting with islamic_6222003.png', '', '', NULL, '2021-06-02 06:53:23', '2021-06-02 06:53:23'),
(34, 10, '', '2021-06-30', 'ty', 'rety', '1622645823695.rhmd.jpg', '', '', NULL, '2021-06-02 06:57:03', '2021-06-02 06:57:03'),
(35, 10, '', '2021-07-01', 'ery', 'ery', '1622645841800.Debora_Christina_Br.Tinjak_02181009_Matematika-removebg-preview.png', '', '', NULL, '2021-06-02 06:57:21', '2021-06-02 06:57:21'),
(36, 13, '', '2021-06-16', 'qweq', 'qwe', '1622646114507.rhmd.jpg', '', '', NULL, '2021-06-02 07:01:54', '2021-06-02 07:01:54'),
(38, 10, '', '2021-06-26', 'qweqe', 'qweqe', '1622646385814.buat ta(5).png', '', '', NULL, '2021-06-02 07:06:25', '2021-06-02 07:06:25'),
(39, 10, '', '2021-06-08', 'qweqw', 'qweqwr', '1622646565448.admin1.png', '', '', NULL, '2021-06-02 07:09:25', '2021-06-02 07:09:25'),
(40, 9, '', '2021-06-23', 'qwe', 'qg', '1622649967224.59196.jpg', '', '', NULL, '2021-06-02 08:06:07', '2021-06-02 08:06:07'),
(41, 9, '', '2021-06-24', 'ghmgm', 'ghmm', '1622649986950.—Pngtree—ramadan mubarak greeting with islamic_6222003.png', '', '', NULL, '2021-06-02 08:06:26', '2021-06-02 08:06:26'),
(42, 14, '', '2021-09-08', 'dsfs', 'sdfds', '1622727207439.59196.jpg', '', '', NULL, '2021-06-03 05:33:27', '2021-06-03 05:33:27'),
(43, 14, '', '2021-09-24', 'sdfsdf', 'sdfsdf', '1622727231385.WhatsApp Image 2021-04-04 at 14.33.53.jpeg', '', '', NULL, '2021-06-03 05:33:51', '2021-06-03 05:33:51'),
(44, 15, '', '2021-05-12', 'sdf', 'sdf', '1622730100295.rhmd.jpg', '', '', NULL, '2021-06-03 06:21:40', '2021-06-03 06:21:40'),
(45, 15, '', '2021-06-26', 'weg', 'weg', '1622730120562.admin1.png', '', '', NULL, '2021-06-03 06:22:00', '2021-06-03 06:22:00'),
(47, 7, 'Lingkungan Hidup', '2021-06-23', 'fty', 'ftyty', '1623074283659.59196.jpg', '', 'Terima', NULL, '2021-06-07 05:58:03', '2021-06-07 11:17:28'),
(48, 7, 'Sosial Kemasyarakatan', '2021-06-16', 'wer', 'wer', '1623091235596.59196.jpg', '', 'Diperbaiki', 'jadi gambarnya gajelas', '2021-06-07 10:40:35', '2021-06-08 01:23:03'),
(49, 7, 'Lingkungan Hidup', '2021-06-17', 'qwdqw', 'qwed', '1623092477368.WhatsApp Image 2021-04-12 at 14.32.59.jpeg', '', 'Diperbaiki', 'fhfgh trhthrh', '2021-06-07 11:01:17', '2021-06-08 01:33:38'),
(50, 7, 'Sosial Kemasyarakatan', '2021-06-25', 'esrfwef', 'fwewe', '1623096293141.Shoffi_Akmalunnisaa_08181075_Perencanaan_Wilayah_dan_Kota_1_-removebg-preview.png', '', 'Diterima', NULL, '2021-06-07 12:04:53', '2021-06-07 21:31:54'),
(51, 7, 'Lingkungan Hidup', '2021-06-22', 'erge', 'erggre', '1623144903746.WhatsApp Image 2021-04-12 at 14.32.59.jpeg', '', 'Belum Diverifikasi', NULL, '2021-06-08 01:35:03', '2021-06-08 01:35:03'),
(52, 7, 'Kependudukan', '2021-07-01', 'jm,', 'hj,h', '1623158555519.SILATAR.png', '', 'Belum Diverifikasi', NULL, '2021-06-08 05:22:35', '2021-06-08 05:22:35'),
(53, 7, 'Pembangunan', '2021-06-23', 'jkkj', 'jkjk', '1623160599371.idul fitri.png', '', 'Belum Diverifikasi', NULL, '2021-06-08 05:56:39', '2021-06-08 05:56:39'),
(55, 13, 'Pembangunan', '2021-06-18', '3', '3', '1623252395753.(Mandatory Class) ILT CC 15 ACE Exam Review - Ridho.JPG', 'http://127.0.0.1:8000/img/1623252395753.(Mandatory Class) ILT CC 15 ACE Exam Review - Ridho.JPG', 'Diterima', NULL, '2021-06-09 07:26:35', '2021-06-09 07:28:10'),
(56, 9, 'Kependudukan', '2021-06-15', '3', '3', '1623252456788.(Mandatory Class) ILT CC 15 ACE Exam Review - Ridho.JPG', 'http://127.0.0.1:8000/img/1623252456788.(Mandatory Class) ILT CC 15 ACE Exam Review - Ridho.JPG', 'Diterima', NULL, '2021-06-09 07:27:36', '2021-06-09 07:28:12'),
(57, 14, 'Kependudukan', '2021-03-24', '3', '3\r\n3\r\n3\r\n3\r\n3\r\n3\r\n3\r\n3', '1623252652861.(Mandatory Class) ILT CC 15 ACE Exam Review - Ridho.JPG', 'http://127.0.0.1:8000/img/1623252652861.(Mandatory Class) ILT CC 15 ACE Exam Review - Ridho.JPG', 'Diterima', NULL, '2021-06-09 07:30:52', '2021-06-09 07:31:16');

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
(79, '2021_04_24_091032_create_laporan_table', 1),
(80, '2021_04_29_072057_create_users_table', 1),
(81, '2021_04_29_074334_create_password_resets_table', 1),
(82, '2021_05_03_080554_create_akunrt_table', 1),
(83, '2021_05_17_093008_add_column_to_users_table', 1),
(86, '2021_06_07_122938_add_column_to_laporan_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `nama`, `kelurahan`, `no_telepon`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'RT', 'RT 20 Manggar', 'Manggar', '00000000', 'rt20manggar', '$2y$10$LfE4TBoSHmjrSXn1kcOmsukMDEcwdpxExUp0T2hQQf9zBVSBwfXy.', NULL, NULL, '2021-05-24 02:42:20'),
(8, 'Kecamatan/Kelurahan', 'Kecamatan Balikpapan Timur', 'Manggar', '12345', 'kecamatanbalikpapantimur', '$2y$10$vJ.db1xgwTkCzZKFtsmFNuoIMpL0A21Ot0QF0796.DwCQuqYQCV3e', NULL, NULL, NULL),
(9, 'RT', 'RT 15 Manggar', 'Manggar', '123456', 'rt15manggar', '$2y$10$Wfg0eOtJ0YOXbvS9Bhc42eRzYIkfW2bVFDMYeLbWeM6c/OGs54c1K', NULL, NULL, NULL),
(10, 'RT', 'RT 12 Lamaru', 'Lamaru', '1111111', 'rt12lamaru', '$2y$10$MuBdJ.86z4Jxa4WjMtkDvup8AqFvycbIsrSAFXbpzk56ZQtV7p1uS', NULL, NULL, NULL),
(11, 'RT', 'RT 02 Manggar Baru', 'Manggar Baru', '343434', 'rt02manggarbaru', '$2y$10$q60PEUSoVh2IbYIvHkQGA.KwQhHTA/egQBZawvvzV8rdoaOcO9ug6', NULL, NULL, NULL),
(12, 'RT', 'RT 01 Teritip', 'Teritip', '1213123', 'rt01teritip', '$2y$10$ysOUhiQVNuAKLDyZTb7QX.jyU3rld6s/R6hrIM6Qv1zTOm9YknSde', NULL, NULL, NULL),
(13, 'RT', 'RT 05 Lamaru', 'Lamaru', '112124', 'rt05lamaru', '$2y$10$N.dzVx1ne/VQcWnVff5oiecjeLjVMQMjCujiwG.nz32Zyy2Z4ppnG', NULL, NULL, NULL),
(14, 'RT', 'RT 50 Manggar', 'Manggar', '01010101', 'rt50manggar', '$2y$10$WEA4.OQU0Jn4gBvvP2Unw.95UUYzzhj5No63fgWup.Mn6qIqBViwe', NULL, NULL, NULL),
(15, 'RT', 'RT 11 Lamaru', 'Lamaru', '11111111', 'rt11lamaru', '$2y$10$29kbiGJZPoQpqAg9sjkxaOadeuacA.V4zOmjnvd3/08gLvdegJSrm', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akunrt`
--
ALTER TABLE `akunrt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akunrt`
--
ALTER TABLE `akunrt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
