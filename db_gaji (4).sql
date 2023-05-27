-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2023 at 12:09 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `bulan` int NOT NULL,
  `tahun` int NOT NULL,
  `hadir` int NOT NULL,
  `tidak_hadir` int NOT NULL,
  `izin` int NOT NULL,
  `lembur` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `karyawan_id`, `bulan`, `tahun`, `hadir`, `tidak_hadir`, `izin`, `lembur`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 2023, 10, 15, 5, 0, '2023-05-22 06:29:54', '2023-05-22 21:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int UNSIGNED NOT NULL,
  `kd_akun` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `kd_akun`, `nama_akun`) VALUES
(1, '101', 'Kas Masuk'),
(2, '111', 'Peralatan'),
(3, '112', 'Akumulasi Penyusutan Peralatan'),
(4, '113', 'Kendaraan'),
(5, '114', 'Akumulasi Penyusutan Kendaraan'),
(6, '115', 'Bangunan'),
(7, '116', 'Akumulasi Penyusutan Bangunan'),
(8, '202', 'Utang Gaji'),
(9, '300', 'Modal Pemilik'),
(10, '501', 'Gaji Karyawan'),
(11, '613', 'Pendapatan Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int UNSIGNED NOT NULL,
  `kd_jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tunjangan_jabatan` int NOT NULL,
  `gaji_pokok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `kd_jabatan`, `nm_jabatan`, `tunjangan_jabatan`, `gaji_pokok`, `created_at`, `updated_at`) VALUES
(1, 'MA-10', 'Manage', 600000, 2000000, NULL, NULL),
(2, 'KA-102', 'Kasir', 200000, 1500000, NULL, NULL),
(3, 'SO-103', 'Sopir', 350000, 3150000, NULL, NULL),
(4, 'BM-104', 'Bongkar Muat', 300000, 2400000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int UNSIGNED NOT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL,
  `nik` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `jabatan_id`, `nik`, `nama`, `ttl`, `jenis_kelamin`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, '3328156729051997', 'Anna', '1997-05-29', 'Perempuan', '082110867348', 'Desa Wangandawa Rt 02 Rw 07', '2022-12-23 11:23:34', '2023-05-21 19:21:30'),
(2, 2, '3328149307112002', 'Yasinta', '2002-11-07', 'Perempuan', '085864357811', 'Desa Dampyak Rt 02 Rw 08', '2022-12-23 11:26:28', '2022-12-23 11:26:28'),
(3, 2, '3328151324061998', 'Cantika Sari', '1998-06-24', 'Perempuan', '083809126773', 'Desa Talang Rt 10 Rw 03', '2022-12-23 11:28:12', '2022-12-23 11:28:12'),
(4, 2, '3328156780120001', 'Rania', '2002-09-13', 'Perempuan', '085266730841', 'Desa Kemantran Rt 03 Rw 05', '2022-12-23 11:30:07', '2022-12-23 11:30:07'),
(5, 2, '3328160872990535', 'Santi', '1999-04-24', 'Perempuan', '087756028345', 'Desa Talang Rt 08 Rw 02', '2022-12-23 11:32:58', '2022-12-23 11:32:58'),
(6, 3, '3328167715101990', 'Supratman', '1990-10-15', 'Laki-Laki', '085725890012', 'Desa Jatilawang Rt 03 Rw 01', '2022-12-23 11:35:32', '2022-12-23 11:35:32'),
(7, 3, '3328167713031989', 'Rasidi', '1989-03-13', 'Laki-Laki', '082388910211', 'Desa Wangandawa Rt 07 Rw 07', '2022-12-23 11:37:43', '2022-12-23 11:37:43'),
(8, 3, '3328186238190723', 'Zafra', '1995-05-15', 'Laki-Laki', '082308763421', 'Desa Kedokansayang Rt 04 Rw 03', '2022-12-23 11:39:58', '2022-12-23 11:39:58'),
(9, 3, '3328152391073648', 'Fajar', '1997-08-21', 'Laki-Laki', '085624508739', 'Desa Babakan Rt 10 Rw 05', '2022-12-23 11:42:06', '2022-12-23 11:42:06'),
(10, 4, '3328159928081995', 'Wahyu Ilham', '1995-08-28', 'Laki-Laki', '083815640370', 'Desa Cangkring Rt 03 Rw 01', '2022-12-23 11:43:56', '2022-12-23 11:43:56'),
(11, 4, '3328156405121997', 'Miftahudin', '1997-12-05', 'Laki-Laki', '085725110890', 'Desa Talang Rt 11 Rw 09', '2022-12-23 11:45:32', '2022-12-23 11:45:32'),
(12, 4, '3328132393027883', 'Adam', '1998-07-25', 'Laki-Laki', '083817892037', 'Desa Pacul Rt 05 Rw 02', '2022-12-23 11:47:29', '2022-12-23 11:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `master_gaji`
--

CREATE TABLE `master_gaji` (
  `id` int UNSIGNED NOT NULL,
  `absensi_id` bigint UNSIGNED NOT NULL,
  `total_gaji` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_gaji`
--

INSERT INTO `master_gaji` (`id`, `absensi_id`, `total_gaji`, `created_at`, `updated_at`) VALUES
(3, 2, 2200000, '2023-05-22 18:34:49', '2023-05-22 21:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2022_12_06_082543_create_karyawan_table', 3),
(7, '2022_12_06_104303_create_jabatan_table', 5),
(8, '2022_12_13_064327_create_karyawan_table', 6),
(21, '2014_10_12_000000_create_users_table', 7),
(22, '2014_10_12_100000_create_password_resets_table', 7),
(23, '2019_08_19_000000_create_failed_jobs_table', 7),
(24, '2022_12_06_004808_create_akun_table', 7),
(25, '2022_12_13_071117_create_karyawan_table', 7),
(26, '2022_12_13_075937_create_jabatan_table', 7),
(27, '2023_05_08_032406_create_absensi_table', 7),
(28, '2023_05_08_043046_create_master_gaji_table', 7);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rosita', 'rositarst28@gmail.com', NULL, '$2y$10$nNG.An4xWxFjf542rkhoR.65WuANPm2kQYDPDxxv0d14vnNLoby6O', NULL, '2022-11-14 14:34:47', '2023-05-21 19:19:44'),
(2, 'Rizka Indah Melyani', 'rizkaindahmelyani@gmail.com', NULL, '$2y$10$35VI1Lt50MpgHxLIEflkUeQl8tuFL/GQ9slDGsMgb8kcAVuq.DQOi', NULL, '2022-12-18 19:37:31', '2023-05-21 19:21:08'),
(4, 'aldiui', 'aldikakabow28@gmail.com', NULL, '$2y$10$kV7O5WfR/MdQ4Mkp8y3GZelfMLaVItnThAnBkT4hNWFZ7l6qDBoKa', NULL, '2023-05-21 17:51:56', '2023-05-21 17:51:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_gaji`
--
ALTER TABLE `master_gaji`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `master_gaji`
--
ALTER TABLE `master_gaji`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
