-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2021 pada 15.50
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employe_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `employes`
--

CREATE TABLE `employes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noduk` int(11) DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `golongan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmtgolongan` date DEFAULT NULL,
  `jeniskelamin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statuskepegawaian` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmtjabatan` date DEFAULT NULL,
  `unitkerja` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `universitas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahunlulus` date DEFAULT NULL,
  `tempatlahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nokk` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bpjskesehatan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bpjsketenagakerjaan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namabank` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `norekening` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terbitstr` date DEFAULT NULL,
  `str` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berlakustr` date DEFAULT NULL,
  `terbitsip` date DEFAULT NULL,
  `sip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berlakusip` date DEFAULT NULL,
  `pelatihan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `portal` int(11) DEFAULT NULL,
  `guest` int(11) DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employes`
--

INSERT INTO `employes` (`id`, `noduk`, `nama`, `nip`, `golongan`, `tmtgolongan`, `jeniskelamin`, `jabatan`, `statuskepegawaian`, `tmtjabatan`, `unitkerja`, `universitas`, `jurusan`, `tahunlulus`, `tempatlahir`, `tanggallahir`, `nik`, `nokk`, `status`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `npwp`, `bpjskesehatan`, `bpjsketenagakerjaan`, `phonenumber`, `email`, `namabank`, `norekening`, `terbitstr`, `str`, `berlakustr`, `terbitsip`, `sip`, `berlakusip`, `pelatihan`, `active`, `portal`, `guest`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'dr. Ameri Yahya', NULL, NULL, NULL, 'Laki-laki', 'Dokter Muda ( Kepala Puskesmas )', 'PNS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stey67647hfjgyy', NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, '2021-01-18 06:42:22', '2021-11-03 07:46:39'),
(3, 8, 'Sadri, A.MK', NULL, NULL, NULL, 'Laki-laki', 'Perawat Mahir', 'Pegawai Kontrak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fgtdyfuyf', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2021-01-18 06:44:17', '2021-11-03 07:47:52'),
(5, 9, 'Sinta Novita', NULL, NULL, NULL, 'Perempuan', 'Bidan', 'Pegawai Kontrak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24ewtd464', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, '2021-01-18 06:45:52', '2021-11-03 07:47:26'),
(7, 7, 'drg. agus', NULL, NULL, NULL, 'Laki-laki', 'Dokter Gigi', 'PNS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vjtuut774869ihk', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, '2021-01-18 06:48:07', '2021-11-03 07:47:01'),
(9, 2, 'Novi Niagawantri', NULL, NULL, NULL, 'Perempuan', 'Kepala Tata Usaha', 'PNS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, '2021-01-18 06:44:17', '2021-11-03 07:45:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` int(11) DEFAULT NULL,
  `pangkat` int(11) DEFAULT NULL,
  `jeniskelamin` int(11) DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `unitkerja` int(11) DEFAULT NULL,
  `pendidikan` int(11) DEFAULT NULL,
  `lahir` int(11) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `nokk` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `alamat` int(11) DEFAULT NULL,
  `npwp` int(11) DEFAULT NULL,
  `bpjs` int(11) DEFAULT NULL,
  `kontak` int(11) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `str` int(11) DEFAULT NULL,
  `sip` int(11) DEFAULT NULL,
  `pelatihan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guests`
--

INSERT INTO `guests` (`id`, `nip`, `pangkat`, `jeniskelamin`, `jabatan`, `unitkerja`, `pendidikan`, `lahir`, `nik`, `nokk`, `status`, `alamat`, `npwp`, `bpjs`, `kontak`, `bank`, `str`, `sip`, `pelatihan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-11-01 07:35:45');

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
(31, '2021_01_08_162304_create_patients_table', 2),
(32, '2021_01_08_162932_create_servicecenters_table', 2),
(33, '2021_01_08_163012_create_villages_table', 2),
(34, '2021_01_08_163254_create_servicecenterusers_table', 2),
(35, '2021_01_08_163412_create_servicesubunits_table', 2),
(36, '2021_01_08_163543_create_servicesubunitusers_table', 2),
(37, '2021_01_08_163613_create_records_table', 2),
(38, '2021_01_08_163731_create_diags_table', 2),
(42, '2014_10_12_000000_create_users_table', 3),
(43, '2014_10_12_100000_create_password_resets_table', 3),
(44, '2019_08_19_000000_create_failed_jobs_table', 3),
(45, '2020_11_23_135041_create_employes_table', 3),
(46, '2020_11_26_115011_create_guests_table', 3),
(47, '2020_11_26_115123_create_documents_table', 3),
(51, '2021_06_23_102830_create_reports_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employe_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `employe_id`, `username`, `email`, `email_verified_at`, `password`, `image`, `expired`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 1, 'ameri', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '2021-01-18 06:42:42', '2021-02-06 00:41:47'),
(5, 3, 'sadri', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '2021-01-18 06:44:34', '2021-01-21 01:22:33'),
(9, 7, 'agus', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'images/profil/ID-7-photo-1635777781.png', NULL, NULL, '2021-01-18 06:48:28', '2021-11-01 07:43:02'),
(14, 9, 'Novi', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '2021-01-18 06:48:28', '2021-05-21 15:46:01'),
(15, NULL, 'guest', NULL, NULL, '$2y$10$VerSE2qKUUAvehk3nE3i2OpQ8P7yC7K9WdlbWXhpgaLNIJpQFCB66', NULL, '2021-11-30', NULL, '2021-01-18 06:42:42', '2021-11-01 07:44:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `employes`
--
ALTER TABLE `employes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
