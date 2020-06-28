-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2020 pada 11.44
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dishub`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pass` varchar(70) DEFAULT NULL,
  `updated_at` varchar(25) NOT NULL,
  `created_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`, `updated_at`, `created_at`) VALUES
(2, 'admin', '$2y$10$yXN5XEp7yJf.eXkBSL/0ROOKJEPZnfLQYHWcotzO25Hqwy3nZ3AzK', '2020-06-27 13:53:03', '2020-06-27 13:53:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` int(10) NOT NULL,
  `nopol` varchar(20) DEFAULT NULL,
  `nouji` varchar(20) DEFAULT NULL,
  `merk` varchar(20) DEFAULT NULL,
  `thpembuatan` varchar(20) DEFAULT NULL,
  `norangka` varchar(20) DEFAULT NULL,
  `nomesin` varchar(20) DEFAULT NULL,
  `dayaangkutorang` varchar(20) DEFAULT NULL,
  `dayaangkutbarang` varchar(20) DEFAULT NULL,
  `trayek` varchar(20) DEFAULT NULL,
  `namaperusahaan` varchar(20) DEFAULT NULL,
  `alamatperusahaan` varchar(20) DEFAULT NULL,
  `namapemilik` varchar(20) DEFAULT NULL,
  `nosk` varchar(20) DEFAULT NULL,
  `kodeperusahaan` varchar(20) DEFAULT NULL,
  `masaberlaku` varchar(20) DEFAULT NULL,
  `tglawalsk` varchar(20) DEFAULT NULL,
  `tglakhirsk` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `nopol`, `nouji`, `merk`, `thpembuatan`, `norangka`, `nomesin`, `dayaangkutorang`, `dayaangkutbarang`, `trayek`, `namaperusahaan`, `alamatperusahaan`, `namapemilik`, `nosk`, `kodeperusahaan`, `masaberlaku`, `tglawalsk`, `tglakhirsk`, `updated_at`, `created_at`) VALUES
(19, '3', '4', '4', '4', '4', '5', '4', '4', '4', '4', '4', 'HasanLL', '4', '4', '0000-00-00', '0004-04-04', '0044-04-04', '2020-06-26 03:16:51', '2020-06-25 10:18:04'),
(20, '1', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'LOLLL', '4', '4', '0000-00-00', '0004-04-04', '0044-04-04', '2020-06-26 00:31:46', '2020-06-25 10:18:45'),
(23, '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', 'TaYO', '9', '9', '0000-00-00', '0009-09-09', '0009-09-09', '2020-06-26 00:32:06', '2020-06-25 11:00:32'),
(25, '12', '9', '9', '9', '9', '00', '9', '9', '9', '9', '9', 'HAHAL', '99', '9', '0000-00-00', '0009-09-09', '0009-09-09', '2020-06-26 03:17:42', '2020-06-25 23:32:20'),
(26, '109', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', 'LOL', '8', '8', '0000-00-00', '0008-08-08', '0008-08-08', '2020-06-27 15:46:42', '2020-06-26 03:18:34'),
(27, '26', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '0000-00-00', '0009-09-09', '0009-09-09', '2020-06-26 03:19:07', '2020-06-26 03:19:07'),
(29, '1221', '1221', 'dc', '2010', '1221', '1221', '1221 orang', '1221', 'sumbawa', 'tes', 'eev', 'sdcscd', '1212', '111', '0000-00-00', '2020-06-27', '2020-06-30', '2020-06-27 07:46:31', '2020-06-27 07:46:31'),
(30, '1010', '1010', 'bjhb', '1010', '1010', '1010', '10 org', '10 KG', 'SUMBAWA', 'XXX', 'ANCJAN', 'Gusde', '1010101', 'SCNIDJ', '2020-06-28', '2020-06-09', '2020-06-28', '2020-06-27 09:08:22', '2020-06-27 07:51:41'),
(31, '100', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '88', '2020-06-28', '2020-06-29', '2020-06-30', '2020-06-27 08:26:34', '2020-06-27 08:26:34'),
(32, '78', '8', '8', '8', '8', '8', '9', '8', '8', '8', '8', '8', '8', '8', '2020-06-26', '0000-00-00', '0000-00-00', '2020-06-27 08:45:26', '2020-06-27 08:45:26'),
(33, '199', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '2020-09-09', '2020-09-09', '2020-09-09', '2020-06-27 09:00:58', '2020-06-27 09:00:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'I Gede Bagus Wirawan', 'changgusde@yahoo.com', NULL, '$2y$10$PVOqS9KJkLe0B4KbtzOauuVnB7NlDeXUGiByHz4Xh02AaKTLzxfNS', 'xAMJ1Iii0gQdUxrorDZkv8qWOfPIxXs305kZGuqxNIm38WLgxiSLxdKC61Ih', '2020-06-27 16:40:36', '2020-06-27 16:40:36'),
(2, 'I Gede Bagus Wirawan', 'gusdechang24@gmail.com', NULL, '$2y$10$Cke/jKwitwO1Q9l64MJgn.ppcFMtamOygCEABCLMn6ZZ.6hLq0Zpi', '7epcRYA96MVuPPtxfPwq2BzAYB7ORLidVTRlcHBKhOmykuccgog29IxoVFhq', '2020-06-27 17:46:30', '2020-06-27 17:46:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
