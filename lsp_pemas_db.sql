-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2023 pada 16.40
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp_pemas_db`
--

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
-- Struktur dari tabel `masyarakats`
--

CREATE TABLE `masyarakats` (
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masyarakats`
--

INSERT INTO `masyarakats` (`nik`, `nama`, `username`, `telp`, `password`, `created_at`, `updated_at`) VALUES
('11', 'Regar', 'regawr', 1234, '$2y$10$i0quQIpbYuvox9Xfifc67eu.IqSEDnSNiZ.i18Rkp14PwSeOrLNga', '2023-03-06 17:45:24', '2023-03-06 17:45:24'),
('647403170305001', 'Esra Fernanda Siregar', 'esra', 123, '$2y$10$zV6AyUDY4B.C2RW7JoBJ0uJbBvlV7G6U3x1n5NnvY9feSRv/wfSJ2', NULL, NULL),
('64789768234234', 'Nazriel', 'alir', 787485784, '$2y$10$FW.kzUKuj4TU6aSSUF2D/OLaMTjuI8gBWQ7JkgoM8oscRYIcnURri', '2023-03-06 19:38:02', '2023-03-06 19:38:02');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_07_010438_create_masyarakats_table', 2),
(6, '2023_03_07_015144_create_pengaduans_table', 3),
(7, '2023_03_07_051855_create_tanggapans_table', 4);

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
-- Struktur dari tabel `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik_masyarakat` bigint(20) UNSIGNED NOT NULL,
  `judul_pengaduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pengaduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_pengaduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `tgl_pengaduan`, `nik_masyarakat`, `judul_pengaduan`, `isi_pengaduan`, `foto_pengaduan`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-03-07', 647403170305001, 'asdfafasdf', 'asfasdfasfasdfasdfasdf', 'C3-wbZPWYAIfXo7.jpg', 'selesai', '2023-03-06 19:19:30', '2023-03-06 21:43:07'),
(2, '2023-03-07', 647403170305001, 'Laporan 2', 'adlfhashjkdgfasjf;asjkdf', 'Screenshot_20230224-164740-851.png', 'selesai', '2023-03-06 19:30:06', '2023-03-06 21:51:17'),
(3, '2023-03-07', 647403170305001, 'Laporannnn tigaaaa', 'osdfgjkgioshosdsgf', 'Ra6VjNZn6z.jpg', '0', '2023-03-06 19:36:03', '2023-03-06 21:54:46'),
(4, '2023-03-07', 64789768234234, 'Lelgar', 'hahahaa stress', 'IMG_20230214_180218.jpg', 'selesai', '2023-03-06 21:54:11', '2023-03-07 01:32:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapans`
--

CREATE TABLE `tanggapans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengaduan` bigint(20) UNSIGNED NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggapans`
--

INSERT INTO `tanggapans` (`id`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-07', 'bruh bruh bruh', 1, '2023-03-06 21:42:30', '2023-03-06 21:42:30'),
(2, 2, '2023-03-07', 'PLASTIQUE', 1, '2023-03-06 21:51:14', '2023-03-06 21:51:14'),
(4, 4, '2023-03-07', 'bruhhhhhhh', 1, '2023-03-07 00:07:05', '2023-03-07 00:07:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `telp`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '1', 'admin', '$2y$10$fvPP4oWrUvJB/cPlVM4w8efDYQ9QpmeQeDNqGkivn4iWkxM1UTv6O', NULL, '2023-03-06 16:51:29', '2023-03-06 16:51:29'),
(2, 'Petugas', 'petugas', '987', 'petugas', '$2y$10$e2Y1HLjwu29.wK4UR7U7duB7D6zXbeIMWuffYik2VJq.dCVcejqFC', NULL, '2023-03-06 17:47:42', '2023-03-06 17:47:42'),
(3, 'Petguas21', 'petugas2', '232', 'petugas', '$2y$10$3aP.gizWNdwD3llxcCBf4OdPDZ13RgVImInS6L8d1Wsb7Vxf8RW/O', NULL, '2023-03-07 07:18:28', '2023-03-07 07:18:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD PRIMARY KEY (`nik`);

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
-- Indeks untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tanggapans`
--
ALTER TABLE `tanggapans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tanggapans`
--
ALTER TABLE `tanggapans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
