-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 02:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id_absensi` int(3) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `hadir` int(3) DEFAULT NULL,
  `izin` int(3) DEFAULT NULL,
  `alpa` int(3) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id_absensi`, `nisn`, `hadir`, `izin`, `alpa`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '0023972966', 15, 1, 0, NULL, '2023-12-20 01:35:13', '2024-01-04 09:06:15'),
(2, '0030976572', 15, 0, 1, NULL, '2023-12-20 01:35:27', '2024-01-01 23:33:04'),
(3, '0031291719', 16, 0, 0, NULL, '2023-12-20 01:35:38', '2023-12-28 08:21:34'),
(4, '0033163507', 14, 2, 0, NULL, '2023-12-20 01:35:50', '2024-01-01 23:33:20'),
(5, '0033163509', 14, 2, 0, 'SAKIT, SAKIT', '2024-01-01 23:43:34', '2024-01-05 16:26:43'),
(6, '0033163891', 16, 0, 0, NULL, '2024-01-05 16:26:01', '2024-01-05 16:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `alamat_siswas`
--

CREATE TABLE `alamat_siswas` (
  `id_alamatsiswa` int(5) NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `kelurahan_desa` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten_kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat_siswas`
--

INSERT INTO `alamat_siswas` (`id_alamatsiswa`, `nisn`, `kelurahan_desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `created_at`, `updated_at`) VALUES
(1, '0023972966', 'Handil Jaya', 'Jelutung', 'Jambi', 'Jambi', NULL, NULL),
(3, '0031291719', 'Bandar Jaya', 'Rantau Rasau', 'Tanjung Jabung Timur', 'Jambi', NULL, '2024-01-05 15:05:10'),
(4, '0033163507', 'Tebo Jaya', 'Limbur Lubuk Mengkuang', 'Bungo', 'Jambi', NULL, NULL),
(6, '0033163891', 'Rantau Api', 'Tengah Ilir', 'Tebo', 'Jambi', '2024-01-05 16:15:41', '2024-01-05 16:15:41'),
(7, '0033165507', 'Paal Lima', 'Kota Baru', 'Kota Jambi', 'Jambi', '2024-01-05 16:24:14', '2024-01-05 16:24:14'),
(8, '0033163509', 'Pematang Lumut', 'Betara', 'Tanjung Jabung Timur', 'Jambi', '2024-01-06 03:42:06', '2024-01-06 03:42:06'),
(9, '0033163679', 'Pematang Lumut', 'Betara', 'Tanjung Jabung Timur', 'Jambi', '2024-01-06 10:23:43', '2024-01-06 10:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `alamat_walikelas`
--

CREATE TABLE `alamat_walikelas` (
  `id_alamatwalas` int(5) NOT NULL,
  `nip_walikelas` varchar(10) DEFAULT NULL,
  `kelurahan_desa` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten_kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat_walikelas`
--

INSERT INTO `alamat_walikelas` (`id_alamatwalas`, `nip_walikelas`, `kelurahan_desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `created_at`, `updated_at`) VALUES
(1, '8040210051', 'Sulanjana', 'Jambi Timur', 'Kota Jambi', 'Jambi', '2024-01-05 17:09:42', '2024-01-05 17:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kepala_sekolahs`
--

CREATE TABLE `kepala_sekolahs` (
  `nip_kepalasekolah` varchar(10) NOT NULL,
  `nama_kepalasekolah` varchar(100) NOT NULL,
  `alamat_kepalasekolah` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(13) DEFAULT NULL,
  `gambar_ttd_tangan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala_sekolahs`
--

INSERT INTO `kepala_sekolahs` (`nip_kepalasekolah`, `nama_kepalasekolah`, `alamat_kepalasekolah`, `nomor_telepon`, `gambar_ttd_tangan`, `created_at`, `updated_at`) VALUES
('1984011920', 'Ahmad Ruslani', 'Jln. Mawar Kembang, Kelurahan Tambak Sari, Jambi Selatan, Kota Jambi', '083172633231', '1704238249.png', '2024-01-02 23:25:09', '2024-01-05 06:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_03_232411_add_role_to_users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mapels`
--

CREATE TABLE `nilai_mapels` (
  `kode_nilai_mapel` int(5) NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `kode_mapel` varchar(6) DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_mapels`
--

INSERT INTO `nilai_mapels` (`kode_nilai_mapel`, `nisn`, `kode_mapel`, `nilai`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, '0031291719', '101PAI', 91, 'Sangat Baik', '2023-12-29 09:24:47', '2023-12-29 13:13:16'),
(5, '0023972966', '101PAI', 90, 'Sangat Baik', '2023-12-29 09:27:08', '2024-01-06 10:28:15'),
(6, '0030976572', '101PAI', 80, 'Sangat Baik', '2023-12-29 09:27:15', '2023-12-29 12:29:40'),
(7, '0033163507', '101PAI', 75, 'Sangat Baik', '2023-12-29 09:42:28', '2024-02-24 06:54:21'),
(8, '0023972966', '102PKN', 90, 'Sangat Baik', '2023-12-29 09:45:10', '2023-12-29 09:45:10'),
(9, '0023972966', '103MTK', 78, 'Baik', '2023-12-29 12:24:27', '2023-12-29 12:24:27'),
(10, '0023972966', '104BHS', 81, 'Sangat Baik', '2023-12-29 12:24:48', '2023-12-29 12:24:48'),
(11, '0023972966', '105FSK', 75, 'Baik', '2023-12-29 12:25:06', '2023-12-29 12:25:06'),
(12, '0023972966', '106KMA', 74, 'Baik', '2023-12-29 12:25:41', '2023-12-29 12:25:41'),
(13, '0023972966', '107BGI', 77, 'Baik', '2023-12-29 12:25:58', '2023-12-29 12:25:58'),
(14, '0023972966', '108SJR', 78, 'Baik', '2023-12-29 12:26:14', '2023-12-29 12:26:14'),
(15, '0023972966', '109EKO', 71, 'Baik', '2023-12-29 12:26:35', '2023-12-29 12:26:35'),
(16, '0023972966', '110GEO', 75, 'Baik', '2023-12-29 12:26:50', '2023-12-29 12:26:50'),
(17, '0023972966', '111SIO', 77, 'Baik', '2023-12-29 12:27:12', '2023-12-29 12:27:12'),
(18, '0023972966', '112BHI', 80, 'Sangat Baik', '2023-12-29 12:28:01', '2023-12-29 12:28:01'),
(19, '0023972966', '113PJO', 80, 'Sangat Baik', '2023-12-29 12:28:26', '2023-12-29 12:28:26'),
(20, '0023972966', '114INF', 81, 'Sangat Baik', '2023-12-29 12:28:44', '2023-12-29 12:28:44'),
(21, '0023972966', '115SNP', 85, 'Sangat Baik', '2023-12-29 12:29:07', '2023-12-29 12:29:07'),
(22, '0030976572', '102PKN', 78, 'Baik', '2023-12-29 12:29:21', '2023-12-29 12:29:21'),
(23, '0030976572', '103MTK', 77, 'Baik', '2023-12-29 13:11:41', '2023-12-29 13:11:41'),
(24, '0030976572', '104BHS', 80, 'Sangat Baik', '2023-12-29 13:12:35', '2023-12-29 13:12:35'),
(25, '0030976572', '105FSK', 80, 'Sangat Baik', '2023-12-29 13:12:52', '2023-12-29 13:12:52'),
(26, '0033163507', '102PKN', 81, 'Sangat Baik', '2023-12-29 13:13:39', '2023-12-29 13:13:39'),
(27, '0031291719', '102PKN', 79, 'Baik', '2023-12-29 13:13:55', '2023-12-29 13:13:55'),
(28, '0031291719', '103MTK', 77, 'Baik', '2023-12-29 13:14:21', '2023-12-29 13:14:21'),
(29, '0031291719', '104BHS', 87, 'Sangat Baik', '2023-12-29 13:14:35', '2023-12-29 13:14:35'),
(30, '0031291719', '105FSK', 80, 'Sangat Baik', '2023-12-29 13:14:57', '2023-12-29 13:14:57'),
(32, '0033163507', '108SJR', 77, 'Baik', '2023-12-30 01:27:55', '2023-12-30 01:27:55'),
(33, '0033163507', '105FSK', 77, 'Baik', '2023-12-30 01:33:10', '2023-12-30 01:33:10'),
(39, '0033163507', '103MTK', 80, 'Sangat Baik', '2023-12-30 01:39:55', '2023-12-30 01:39:55'),
(40, '0033163891', '101PAI', 87, 'Sangat Baik', '2024-01-02 00:01:53', '2024-01-02 00:01:53'),
(43, '0033163891', '102PKN', 80, 'Sangat Baik', '2024-01-02 00:07:19', '2024-01-02 00:07:19'),
(44, '0033163891', '103MTK', 89, 'Sangat Baik', '2024-01-02 00:07:50', '2024-01-02 00:07:50'),
(45, '0033163891', '104BHS', 91, 'Sangat Baik', '2024-01-02 00:07:58', '2024-01-02 00:07:58'),
(46, '0033163891', '105FSK', 76, 'Baik', '2024-01-02 00:08:09', '2024-01-02 00:08:09'),
(47, '0033163891', '106KMA', 70, 'Baik', '2024-01-02 00:08:28', '2024-01-02 00:08:28'),
(48, '0033163891', '107BGI', 74, 'Baik', '2024-01-02 00:08:41', '2024-01-02 00:08:41'),
(49, '0033163891', '108SJR', 78, 'Baik', '2024-01-02 00:13:50', '2024-01-02 00:13:50'),
(50, '0033163891', '109EKO', 80, 'Sangat Baik', '2024-01-02 00:14:10', '2024-01-02 00:14:10'),
(51, '0033163891', '110GEO', 78, 'Baik', '2024-01-02 00:15:42', '2024-01-02 00:15:42'),
(52, '0033163891', '111SIO', 70, 'Baik', '2024-01-02 00:18:00', '2024-01-02 00:18:00'),
(53, '0033163891', '112BHI', 78, 'Baik', '2024-01-02 00:19:01', '2024-01-02 00:19:01'),
(54, '0033163891', '113PJO', 90, 'Sangat Baik', '2024-01-02 00:22:15', '2024-01-02 00:22:15'),
(55, '0033163891', '114INF', 76, 'Baik', '2024-01-02 00:22:53', '2024-01-02 00:22:53'),
(56, '0033163891', '115SNP', 80, 'Sangat Baik', '2024-01-02 00:23:58', '2024-01-02 00:23:58'),
(57, '0033163507', '104BHS', 80, 'Sangat Baik', '2024-01-02 00:25:57', '2024-01-02 00:25:57'),
(58, '0033163507', '106KMA', 83, 'Sangat Baik', '2024-01-02 00:26:56', '2024-01-02 00:26:56'),
(59, '0033163507', '107BGI', 83, 'Sangat Baik', '2024-01-02 00:27:04', '2024-01-02 00:27:04'),
(60, '0030976572', '106KMA', 78, 'Baik', '2024-01-03 05:14:11', '2024-01-03 05:14:11'),
(61, '0030976572', '107BGI', 80, 'Sangat Baik', '2024-01-03 05:15:13', '2024-01-03 05:15:13'),
(62, '0030976572', '108SJR', 80, 'Sangat Baik', '2024-01-03 05:15:56', '2024-01-03 05:15:56'),
(63, '0030976572', '109EKO', 75, 'Baik', '2024-01-03 05:17:32', '2024-01-03 05:17:32'),
(64, '0030976572', '110GEO', 85, 'Sangat Baik', '2024-01-03 05:18:05', '2024-01-03 05:18:05'),
(65, '0030976572', '111SIO', 85, 'Sangat Baik', '2024-01-03 05:18:21', '2024-01-03 05:18:21'),
(66, '0030976572', '112BHI', 100, 'Sangat Baik', '2024-01-03 05:18:41', '2024-01-03 05:18:41'),
(67, '0030976572', '113PJO', 80, 'Sangat Baik', '2024-01-03 05:19:03', '2024-01-03 05:19:03'),
(68, '0030976572', '114INF', 80, 'Sangat Baik', '2024-01-03 05:19:16', '2024-01-03 05:19:16'),
(69, '0030976572', '115SNP', 75, 'Baik', '2024-01-03 05:19:43', '2024-01-03 05:19:43'),
(70, '0031291719', '106KMA', 75, 'Baik', '2024-01-03 05:20:34', '2024-01-03 05:20:34'),
(71, '0031291719', '107BGI', 80, 'Baik', '2024-01-03 05:20:54', '2024-01-03 05:20:54'),
(72, '0031291719', '108SJR', 80, 'Sangat Baik', '2024-01-03 05:21:10', '2024-01-03 05:21:10'),
(73, '0031291719', '109EKO', 80, 'Sangat Baik', '2024-01-03 05:21:42', '2024-01-03 05:21:42'),
(74, '0031291719', '110GEO', 86, 'Sangat Baik', '2024-01-03 05:21:56', '2024-01-03 05:21:56'),
(75, '0031291719', '111SIO', 84, 'Sangat Baik', '2024-01-03 05:22:10', '2024-01-03 05:22:10'),
(76, '0031291719', '112BHI', 78, 'Baik', '2024-01-03 05:22:36', '2024-01-03 05:22:36'),
(77, '0031291719', '113PJO', 71, 'Baik', '2024-01-03 05:22:51', '2024-01-03 05:22:51'),
(78, '0031291719', '114INF', 90, 'Sangat Baik', '2024-01-03 05:23:08', '2024-01-03 05:23:08'),
(79, '0031291719', '115SNP', 90, 'Sangat Baik', '2024-01-03 05:23:17', '2024-01-03 05:23:17'),
(80, '0033163507', '109EKO', 79, 'Baik', '2024-01-03 05:24:11', '2024-01-03 05:24:11'),
(81, '0033163507', '110GEO', 91, 'Sangat Baik', '2024-01-03 05:24:24', '2024-01-03 05:24:24'),
(82, '0033163507', '111SIO', 70, 'Baik', '2024-01-03 05:24:36', '2024-01-03 05:24:36'),
(83, '0033163507', '112BHI', 75, 'Baik', '2024-01-03 05:24:45', '2024-01-03 05:24:45'),
(84, '0033163507', '113PJO', 79, 'Baik', '2024-01-03 05:24:54', '2024-01-03 05:24:54'),
(85, '0033163507', '114INF', 83, 'Sangat Baik', '2024-01-03 05:25:04', '2024-01-03 05:25:04'),
(86, '0033163507', '115SNP', 87, 'Sangat Baik', '2024-01-03 05:25:15', '2024-01-03 05:25:15'),
(87, '0033163509', '101PAI', 87, 'Sangat Baik', '2024-01-05 16:28:05', '2024-01-05 16:28:05'),
(88, '0033163509', '102PKN', 89, 'Sangat Baik', '2024-01-05 16:28:12', '2024-01-05 16:28:12'),
(89, '0033163509', '103MTK', 78, 'Baik', '2024-01-05 16:28:25', '2024-01-05 16:28:25'),
(90, '0033163509', '104BHS', 80, 'Sangat Baik', '2024-01-05 16:28:36', '2024-01-05 16:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raports`
--

CREATE TABLE `raports` (
  `nomor_raport` int(5) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `kode_tahunajaran` int(3) DEFAULT NULL,
  `npsn` varchar(10) DEFAULT NULL,
  `id_absensi` int(3) DEFAULT NULL,
  `nip_walikelas` varchar(10) DEFAULT NULL,
  `nip_kepalasekolah` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raports`
--

INSERT INTO `raports` (`nomor_raport`, `nisn`, `kode_tahunajaran`, `npsn`, `id_absensi`, `nip_walikelas`, `nip_kepalasekolah`, `created_at`, `updated_at`) VALUES
(3, '0033163891', 1, '10505109', 5, '8040210051', '1984011920', '2024-01-02 00:32:38', '2024-01-02 00:32:38'),
(8, '0023972966', 1, '10505109', 1, '8040210051', '1984011920', '2024-01-06 14:17:29', '2024-01-06 14:17:29'),
(9, '0030976572', 1, '10505109', 1, '8040210051', '1984011920', '2024-01-06 14:18:53', '2024-01-06 14:18:53'),
(10, '0031291719', 1, '10505109', 1, '8040210051', '1984011920', '2024-01-06 14:18:58', '2024-01-06 14:18:58'),
(11, '0033163507', 1, '10505109', 1, '8040210051', '1984011920', '2024-01-06 14:19:03', '2024-01-06 14:19:03'),
(12, '0033163509', 1, '10505109', 1, '8040210051', '1984011920', '2024-01-06 14:19:06', '2024-01-06 14:19:06'),
(15, '0033165507', 1, '10505109', 1, '8040210051', '1984011920', '2024-01-06 14:19:21', '2024-01-06 14:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `npsn` varchar(10) NOT NULL,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `alamat_sekolah` varchar(100) DEFAULT NULL,
  `kontak_telepon` varchar(15) DEFAULT NULL,
  `gambar_sekolah` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`npsn`, `nama_sekolah`, `alamat_sekolah`, `kontak_telepon`, `gambar_sekolah`, `created_at`, `updated_at`) VALUES
('10505109', 'SMA Xaverius 1 Kota Jambi', 'Jln. Marsda Abdurahman Saleh No.19', '074-1572410', '1704236869.JPG', '2024-01-02 23:07:49', '2024-01-05 06:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(13) DEFAULT NULL,
  `nomor_kontak` varchar(13) DEFAULT NULL,
  `nama_wali_siswa` varchar(100) DEFAULT NULL,
  `gambar_ttd_tanganwalisiswa` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`nisn`, `nama_siswa`, `jenis_kelamin`, `nomor_kontak`, `nama_wali_siswa`, `gambar_ttd_tanganwalisiswa`, `created_at`, `updated_at`) VALUES
('0023972966', 'Agnes Virginia Tamara', 'Perempuan', '089516560065', 'Fulan 1', '1703940928.png', '2023-12-19 08:34:57', '2024-01-03 05:08:06'),
('0030976572', 'Metta Dhammadinna', 'Perempuan', '087892326435', 'Fulan 2', '1703941101.png', '2023-12-19 22:43:08', '2024-01-03 05:08:53'),
('0031291719', 'Sri Muliani Nurrohmah', 'Perempuan', '081374554193', 'Fulan 3', '1703941122.png', '2023-12-19 22:46:17', '2024-01-03 05:10:45'),
('0033163507', 'Ahmad Akbar', 'Laki-Laki', '083172633234', 'Fulan 4', '1703941135.png', '2023-12-19 11:11:16', '2024-01-03 05:11:17'),
('0033163509', 'Rahmat Wijaya', 'Laki-Laki', '089533258919', 'Fulan 6', '1704455110.png', '2024-01-05 11:45:10', '2024-01-05 11:45:10'),
('0033163679', 'Ucok', 'Laki-Laki', '089533258901', 'Fulan 5', '1704536603.png', '2024-01-06 10:23:23', '2024-01-06 10:24:59'),
('0033163891', 'Adi Wibowo', 'Laki-Laki', '085166271132', 'Fulan 5', '1704152558.png', '2024-01-01 23:42:38', '2024-01-03 05:12:06'),
('0033165507', 'Rizky Harun', 'Laki-Laki', '083133258901', 'Fulan 7', '1704471822.png', '2024-01-05 16:23:42', '2024-01-05 16:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_matapelajarans`
--

CREATE TABLE `tabel_matapelajarans` (
  `kode_mapel` varchar(6) NOT NULL,
  `nama_mapel` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_matapelajarans`
--

INSERT INTO `tabel_matapelajarans` (`kode_mapel`, `nama_mapel`, `created_at`, `updated_at`) VALUES
('101PAI', 'Pendidikan Agama Islam dan Budi Pekerti', '2023-12-27 05:25:49', '2023-12-27 12:59:42'),
('102PKN', 'Pendidikan Pancasila', '2023-12-27 12:17:31', '2023-12-27 12:59:56'),
('103MTK', 'Matematika', '2023-12-27 12:46:09', '2023-12-27 13:00:07'),
('104BHS', 'Bahasa Indonesia', '2023-12-27 12:46:25', '2023-12-27 13:01:06'),
('105FSK', 'Ilmu Pengetahuan Alam - Fisika', '2023-12-27 12:53:29', '2023-12-27 13:01:43'),
('106KMA', 'Ilmu Pengetahuan Alam - Kimia', '2023-12-27 12:53:58', '2023-12-27 13:01:55'),
('107BGI', 'Ilmu Pengetahuan Alam - Biologi', '2023-12-27 12:54:30', '2023-12-27 13:02:14'),
('108SJR', 'Ilmu Pengetahuan Sosial - Sejarah', '2023-12-27 12:55:42', '2023-12-27 13:02:37'),
('109EKO', 'Ilmu Pengetahuan Sosial - Ekonomi', '2023-12-27 12:59:04', '2023-12-27 13:02:54'),
('110GEO', 'Ilmu Pengetahuan Sosial - Geografi', '2023-12-27 12:56:03', '2024-01-02 00:17:29'),
('111SIO', 'Ilmu Pengetahuan Sosial - Sosiologi', '2023-12-27 12:56:32', '2023-12-27 13:03:15'),
('112BHI', 'Bahasa Inggris', '2023-12-27 12:47:35', '2023-12-27 13:03:29'),
('113PJO', 'Pendidikan Jasmani dan Olahraga', '2023-12-27 12:48:04', '2023-12-27 13:03:38'),
('114INF', 'Informatika', '2023-12-27 12:48:22', '2023-12-27 13:04:12'),
('115SNP', 'Seni Budaya dan Prakarya', '2023-12-27 12:52:21', '2023-12-30 02:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajarans`
--

CREATE TABLE `tahun_ajarans` (
  `kode_tahunajaran` int(3) NOT NULL,
  `tahun1` datetime(4) DEFAULT NULL,
  `tahun2` datetime(4) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajarans`
--

INSERT INTO `tahun_ajarans` (`kode_tahunajaran`, `tahun1`, `tahun2`, `semester`, `created_at`, `updated_at`) VALUES
(1, '2023-06-05 00:00:00.0000', '2024-01-08 00:00:00.0000', 2, '2023-12-26 07:52:40', '2024-01-06 10:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'siswa',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konfirmasi_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `gambar`, `konfirmasi_password`) VALUES
(1, 'Admin A2', '8040210091', NULL, '$2y$10$QwZgegjStVnQIpBhnPrwfOU19cqvdXwNz3JGvMd2DgDjOx3EUwGu.', 'admin', NULL, '2024-01-01 08:29:24', '2024-01-01 08:29:24', NULL, NULL),
(2, 'Ahmad Ruslan', '1984011920', NULL, '$2y$10$3BjkLKUKCseQmBAJG.pgjeItBuo7WOeaUPVpRXTyzhUfgTW7kq.9O', 'kepsek', NULL, '2024-01-01 16:19:32', '2024-01-01 16:19:32', NULL, NULL),
(3, 'Ayu Ratnaningsih', '1996782101', NULL, '$2y$10$FVDIBm053FJINznwMaSHsOdnKODp80efAkUV/yKQXkU58xDecO/q2', 'walas', NULL, '2024-01-03 16:28:44', '2024-01-03 16:28:44', NULL, NULL),
(4, 'Ahmad Akbar', '0033163507', NULL, '$2y$10$I5tesPK4fTtvtqQpnVLXC.JVuSI7FzxJb3mqHRr.YOVp4PXRib5uC', 'siswa', NULL, '2024-01-03 16:47:35', '2024-01-03 16:47:35', NULL, NULL),
(5, 'Agnes Virginia Tamara', '0023972966', NULL, '$2y$10$yI2QlGJDKnuyw9mZwkqXm.73mth/r3luM.sP21wsirl6BKTwt7GJe', 'siswa', NULL, '2024-01-03 16:56:28', '2024-01-03 16:56:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `nip_walikelas` varchar(10) NOT NULL,
  `nama_walikelas` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(13) DEFAULT NULL,
  `gmbr_ttd_wali_kelas` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`nip_walikelas`, `nama_walikelas`, `nomor_telepon`, `gmbr_ttd_wali_kelas`, `created_at`, `updated_at`) VALUES
('8040210051', 'Ayu Ratnaningsih', '087892326435', '1703925169.png', '2023-12-30 08:28:32', '2024-01-03 05:44:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `alamat_siswas`
--
ALTER TABLE `alamat_siswas`
  ADD PRIMARY KEY (`id_alamatsiswa`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `alamat_walikelas`
--
ALTER TABLE `alamat_walikelas`
  ADD PRIMARY KEY (`id_alamatwalas`),
  ADD KEY `nip_walikelas` (`nip_walikelas`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kepala_sekolahs`
--
ALTER TABLE `kepala_sekolahs`
  ADD PRIMARY KEY (`nip_kepalasekolah`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_mapels`
--
ALTER TABLE `nilai_mapels`
  ADD PRIMARY KEY (`kode_nilai_mapel`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `raports`
--
ALTER TABLE `raports`
  ADD PRIMARY KEY (`nomor_raport`),
  ADD KEY `kode_tahunajaran` (`kode_tahunajaran`),
  ADD KEY `npsn` (`npsn`),
  ADD KEY `nip_walikelas` (`nip_walikelas`),
  ADD KEY `nip_kepalasekolah` (`nip_kepalasekolah`),
  ADD KEY `id_absensi` (`id_absensi`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`npsn`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tabel_matapelajarans`
--
ALTER TABLE `tabel_matapelajarans`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  ADD PRIMARY KEY (`kode_tahunajaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`nip_walikelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id_absensi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `alamat_siswas`
--
ALTER TABLE `alamat_siswas`
  MODIFY `id_alamatsiswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `alamat_walikelas`
--
ALTER TABLE `alamat_walikelas`
  MODIFY `id_alamatwalas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_mapels`
--
ALTER TABLE `nilai_mapels`
  MODIFY `kode_nilai_mapel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raports`
--
ALTER TABLE `raports`
  MODIFY `nomor_raport` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  MODIFY `kode_tahunajaran` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absens`
--
ALTER TABLE `absens`
  ADD CONSTRAINT `absens_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswas` (`nisn`);

--
-- Constraints for table `alamat_siswas`
--
ALTER TABLE `alamat_siswas`
  ADD CONSTRAINT `alamat_siswas_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswas` (`nisn`);

--
-- Constraints for table `alamat_walikelas`
--
ALTER TABLE `alamat_walikelas`
  ADD CONSTRAINT `alamat_walikelas_ibfk_1` FOREIGN KEY (`nip_walikelas`) REFERENCES `wali_kelas` (`nip_walikelas`);

--
-- Constraints for table `nilai_mapels`
--
ALTER TABLE `nilai_mapels`
  ADD CONSTRAINT `nilai_mapels_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswas` (`nisn`),
  ADD CONSTRAINT `nilai_mapels_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `tabel_matapelajarans` (`kode_mapel`);

--
-- Constraints for table `raports`
--
ALTER TABLE `raports`
  ADD CONSTRAINT `raports_ibfk_1` FOREIGN KEY (`kode_tahunajaran`) REFERENCES `tahun_ajarans` (`kode_tahunajaran`),
  ADD CONSTRAINT `raports_ibfk_2` FOREIGN KEY (`npsn`) REFERENCES `sekolahs` (`npsn`),
  ADD CONSTRAINT `raports_ibfk_4` FOREIGN KEY (`nip_walikelas`) REFERENCES `wali_kelas` (`nip_walikelas`),
  ADD CONSTRAINT `raports_ibfk_5` FOREIGN KEY (`nip_kepalasekolah`) REFERENCES `kepala_sekolahs` (`nip_kepalasekolah`),
  ADD CONSTRAINT `raports_ibfk_6` FOREIGN KEY (`id_absensi`) REFERENCES `absens` (`id_absensi`),
  ADD CONSTRAINT `raports_ibfk_7` FOREIGN KEY (`nisn`) REFERENCES `siswas` (`nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
