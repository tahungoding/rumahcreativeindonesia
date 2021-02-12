-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Feb 2021 pada 13.35
-- Versi server: 5.7.24
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_awal` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id`, `nama_agenda`, `tanggal_awal`, `tanggal_akhir`, `tempat`, `deskripsi`, `penyelenggara`, `gambar`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Vale Vale', '2021-10-21 00:00:00', '2021-01-30 00:00:00', 'Sumedang', 'Hhaaia', 'RCI', 'public/images/agendas/Eibs3KKZKyVuTbikouc4UtuLUID5dzhAzAeIDHXm.jpg', 'aktif', '2021-01-30 05:28:51', '2021-01-30 05:28:51', 'vale-vale'),
(2, 'Di Atas Luka', '2021-01-28 00:00:00', '2021-01-30 00:00:00', 'Rutee', 'Bagiann', 'RCI', 'public/images/agendas/imW3dcKqzSh6slfHmiLRAY3Hwo4Gv08bo6WZQ2de.jpg', 'aktif', '2021-01-30 05:32:40', '2021-01-30 05:32:40', 'di-atas-luka'),
(3, 'Sebatas', '2020-12-30 00:00:00', '2021-01-28 00:00:00', 'Dan', 'Bercerita', 'RCI', 'public/images/agendas/mEXuoAFAgdpJnkat235TNLHdxrqq71q7mY9tTMkc.jpg', 'aktif', '2021-01-30 05:33:06', '2021-01-30 05:33:06', 'sebatas'),
(4, 'Bersama Namun', '2021-01-28 00:00:00', '2021-01-30 00:00:00', 'Untuk', 'Apoa', 'Cepat', 'public/images/agendas/2aSCaVEaHN5kYHTh93cMcyQeW5iCUo7AIzQS3F2J.jpg', 'aktif', '2021-01-30 05:33:35', '2021-01-30 05:33:35', 'bersama-namun'),
(5, 'Hahay', '2021-01-21 00:00:00', '2021-01-30 00:00:00', 'Dengnden', 'Test', 'RCI', 'public/images/agendas/nwZ4HXxGCmDMJOhJE1dw0HkvIxFLUrXI2nhOr4vf.jpg', 'tidak aktif', '2021-01-30 05:34:24', '2021-01-30 05:34:24', 'hahay'),
(6, 'Menantang', '2021-01-21 00:00:00', '2021-01-27 00:00:00', 'Cakrawala', 'Tutup', 'Mata', 'public/images/agendas/FCqOrrCwSxUUIjOMQb8dCWUmlqIjJRKU11gmLWDR.jpg', 'tidak aktif', '2021-01-30 05:34:56', '2021-01-30 05:34:56', 'menantang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori_artikel` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `hits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0x',
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `gambar`, `konten`, `id_kategori_artikel`, `slug`, `id_user`, `hits`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bismillahi', 'public/images/articles/uozeiCzzh7HotYUJJWXResow1EIQbC9iY81onfP8.jpg', '<p>Tawakaltu</p>', 1, 'bismillahi', 2, '0x', 'aktif', '2021-01-31 07:52:11', '2021-01-31 07:52:11'),
(2, 'Haikuuu', 'public/images/articles/ImymKTDyXx8Kz8lvLFTVFzRGQBqhbU3YZbO62KtS.jpg', '<p>Haikyuuuu</p>', 1, 'haikuuu', 2, '0x', 'aktif', '2021-01-31 07:54:45', '2021-01-31 07:54:45'),
(3, 'Bambang', 'public/images/articles/NuUyWbn6JeYbHzOHmDfJUECh6MHXRW10NL9YwNzX.jpg', '<p>Tampanss</p>', 1, 'bambang', 2, '0x', 'aktif', '2021-01-31 07:58:15', '2021-01-31 07:58:15'),
(4, 'Kannku', 'public/images/articles/i80KyHDJLkPB9cRlCyzTttP1XxQaTZpOyxZoxvp0.jpg', '<p>KANGKUNG</p>', 2, 'kannku', 2, '0x', 'aktif', '2021-01-31 07:58:47', '2021-01-31 07:58:47'),
(5, 'HITAM', 'public/images/articles/xakJlIALQSkJ8IUoQCum5HCvZc3qveCTkM8IbbvH.jpg', '<p>BAMBANGG</p>', 2, 'hitam', 2, '0x', 'aktif', '2021-01-31 07:59:03', '2021-01-31 07:59:34'),
(6, 'Mreka', 'public/images/articles/UuzFtvbV9OEZqRV90P9WShoiDdcvwy0sYyIAlktQ.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 'mreka', 2, '0x', 'aktif', '2021-01-31 08:07:27', '2021-01-31 08:07:27'),
(8, 'dawdad', 'public/images/articles/4QRuiyu2yzaPGJwWqChmT2CkF4bFTxIsEXRcKehE.jpg', '<p>dawdadwad</p>', 1, 'dawdad', 2, '0x', 'aktif', '2021-02-03 21:08:22', '2021-02-03 21:08:22'),
(9, 'dawdasdawdawd', 'public/images/articles/n0oDV29xa88wlFX0CJhnk7ThHprpC6aElg1h6fAK.jpg', '<p>lorem psadawddawd</p>\r\n<p>dawdadwad</p>\r\n<p>dawdawdawd</p>\r\n<p><img src=\"/photos/2/Artikel/responden3.jpg\" alt=\"\" width=\"100\" /></p>', 2, 'dawdasdawdawd', 2, '0x', 'aktif', '2021-02-03 21:09:11', '2021-02-03 21:09:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Siapa', 'aktif', '2021-01-22 03:45:04', '2021-01-22 03:45:04'),
(2, 'Ramah', 'aktif', '2021-01-31 07:58:25', '2021-01-31 07:58:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_mitra`
--

CREATE TABLE `kategori_mitra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_mitra`
--

INSERT INTO `kategori_mitra` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Baik', '2021-02-02 02:24:23', '2021-02-02 02:24:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_umkm`
--

CREATE TABLE `kategori_umkm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_umkm`
--

INSERT INTO `kategori_umkm` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Jasa', '2021-02-08 18:05:06', '2021-02-08 18:05:06');

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
(4, '2021_01_18_095546_create_profile_table', 1),
(5, '2021_01_18_100250_create_struktur_tim_table', 1),
(6, '2021_01_18_100410_create_program_table', 1),
(7, '2021_01_18_100558_create_agenda_table', 1),
(8, '2021_01_18_101101_create_kategori_mitra_table', 1),
(9, '2021_01_18_102107_create_mitra_table', 1),
(10, '2021_01_18_102251_create_kategori_artikel_table', 2),
(11, '2021_01_18_102406_create_artikel_table', 2),
(12, '2021_01_18_102710_create_user_level_table', 2),
(13, '2021_01_18_102851_add_level_to_users_table', 3),
(14, '2021_01_19_020940_create_kategori_umkm_table', 4),
(15, '2021_01_19_021016_create_umkm_table', 4),
(16, '2021_01_19_021239_create_testimoni_table', 4),
(17, '2021_01_20_040350_add_foto_column_into_users', 5),
(18, '2021_01_20_041005_add_foto_column_into_struktur_tim', 5),
(19, '2021_01_22_033745_add_konten_column_into_artikel', 6),
(20, '2021_01_22_040512_set_hits_default_on_artikel', 7),
(21, '2021_01_24_123514_drop_tgl_publish_column', 7),
(22, '2021_01_29_235703_add_somecolumn2_to_program_table', 7),
(23, '2021_01_30_225918_add_slug_to_agenda_table', 8),
(24, '2021_02_01_002058_add_gambar_to_struktur_tim_table', 9),
(25, '2021_02_01_012845_add_urutan_to_struktur_tim_table', 10),
(26, '2021_02_01_014523_add_urutan_to_struktur_tim_table', 11),
(27, '2021_02_01_024432_add_socialmedia_to_strutur_tim_table', 12),
(28, '2021_02_01_045206_add_somecolumns_to_profile_table', 13),
(29, '2021_02_01_133948_add_jamkerja_to_profile_table', 14),
(30, '2021_02_02_092938_add_link_to_mitra_table', 15),
(31, '2021_02_03_012411_create_slide_table', 16),
(32, '2021_02_03_013647_add_image_to_slide_table', 17),
(33, '2021_02_03_014539_add_status_to_slide_table', 18),
(34, '2021_02_03_020537_add_gambar_to_slide_table', 19),
(35, '2021_02_03_113357_add_gambar_to_slide_table', 20),
(36, '2021_02_09_005426_add_gambar_to_umkm_table', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori_mitra` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id`, `id_kategori_mitra`, `nama`, `logo`, `status`, `created_at`, `updated_at`, `link`) VALUES
(4, 1, 'Google', 'public/mitra/OJg0jgJd0NY4K69SUjKRDowfsiSYxhqJYwiHYZFm.png', 'aktif', '2021-02-02 02:38:29', '2021-02-02 02:38:29', '/'),
(5, 1, 'Facebook', 'public/mitra/4KBndZVbbO9Z4FlYaAlzlF1XCYbxzG2cEQYnGyUs.png', 'aktif', '2021-02-02 02:39:53', '2021-02-02 02:39:53', '/'),
(6, 1, 'IBM', 'public/mitra/wjNSTwvAYDyrNFzgBtvRCI9WgciWpqBqzM8eItTM.png', 'aktif', '2021-02-02 02:40:07', '2021-02-02 02:40:07', '/');

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
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latar_belakang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_konsep` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kekuatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fokus_wilayah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latar_belakang_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visi_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misi_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_konsep_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `latar_belakang`, `visi`, `misi`, `model_konsep`, `kekuatan`, `fokus_wilayah`, `alamat`, `telepon`, `email`, `instagram`, `facebook`, `youtube`, `created_at`, `updated_at`, `latar_belakang_img`, `visi_img`, `misi_img`, `model_konsep_img`, `embed`, `jam_kerja`) VALUES
(1, '<p>&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut sollicitudin quam, ut sollicitudin metus. Mauris efficitur posuere justo, a rutrum mauris. Donec vulputate lectus vitae purus accumsan luctus. Donec enim sem, consequat non viverra sed, sollicitudin non turpis. Donec quis tristique risus. Donec sem urna, bibendum sed leo sed, accumsan ornare ante. Proin vehicula condimentum nulla at venenatis. Morbi quis tincidunt nisi, non convallis sapien. Etiam cursus urna ex, a finibus nisl viverra quis. Nunc eu lectus in elit facilisis interdum quis vitae tellus. Praesent convallis eu diam in varius. Nulla posuere, lorem in interdum aliquet, nulla sem varius eros, non mollis massa eros non sapien.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In posuere quis nunc nec porta. Phasellus facilisis, ipsum non tincidunt fringilla, ipsum velit ultricies elit, sit amet accumsan metus urna iaculis erat. Curabitur imperdiet sem non metus scelerisque, sed pellentesque elit venenatis. Nulla condimentum quam id nunc faucibus, ut tincidunt neque suscipit. Praesent lobortis elit sed erat posuere, eu porttitor nulla rutrum. Quisque ac placerat metus. Duis nec congue nisl, non ultricies enim. Morbi feugiat augue porta dignissim accumsan. Nam posuere, magna in faucibus pulvinar, mauris sapien feugiat nulla, quis dictum ipsum urna id tortor. Duis quis felis nunc. Nullam fermentum ultricies aliquet. Sed consequat luctus tempus.</p>\r\n<p>Cras dignissim commodo arcu, non consequat enim sagittis sit amet. Sed lacinia leo quis risus fermentum sodales. Suspendisse potenti. Curabitur fermentum ligula non felis tempor porta. Sed accumsan, sem eget fermentum sagittis, lacus justo euismod lacus, sed elementum ipsum quam vel neque. Proin a dolor sed mi tempus facilisis. Vestibulum consectetur metus vitae leo elementum, vel mollis sem posuere. Aenean ullamcorper nunc et lacus tristique, vel tincidunt sapien pellentesque. Ut sed dolor aliquet, congue arcu in, lobortis justo. Sed ac neque fringilla, ornare lacus sed, consequat arcu. Suspendisse tincidunt, est eget convallis placerat, nunc diam sodales odio, sed pretium augue neque sed arcu.&nbsp;</p>', '<p>&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae fermentum mauris. Nulla facilisi. Proin ut accumsan nulla. Nam vehicula massa sed orci commodo vulputate. Nulla sed sapien eget tellus vehicula interdum vitae a metus. Proin vitae nisl eleifend, malesuada orci a, euismod urna. Nam accumsan laoreet iaculis. Curabitur vel mi est. Donec quis accumsan odio. Vivamus maximus turpis eu tincidunt porttitor. Praesent ut condimentum metus. Maecenas quis placerat libero. Proin vitae est ac nulla feugiat luctus at non tellus.</p>\r\n<p>Vestibulum ac ornare ante. Fusce bibendum felis velit, sit amet condimentum urna porttitor eget. Sed pretium volutpat leo, eget tincidunt quam euismod a. Donec condimentum, ante quis accumsan imperdiet, nisl dui pharetra nulla, ut mattis est mauris eu mauris. Integer venenatis risus ut congue ultricies. Morbi nec rhoncus augue. Duis metus augue, auctor vitae dui nec, sollicitudin varius lacus. Pellentesque in tempor neque, vel accumsan quam. Quisque sed rhoncus metus. Duis semper gravida ex at pharetra. Vivamus efficitur gravida arcu, quis accumsan justo molestie eu. Fusce ut nisi sem. Sed facilisis ornare nunc eget lacinia. Praesent rhoncus, ante id gravida iaculis, orci turpis imperdiet nisi, a aliquam dolor est et neque. Sed aliquam magna eget convallis porta.&nbsp;</p>', '<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n<li>Phasellus suscipit diam ut massa sagittis, quis fringilla justo eleifend.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Nam sed est laoreet, porttitor sem a, ultricies enim.</li>\r\n<li>Phasellus iaculis elit a mauris volutpat auctor.</li>\r\n<li>Donec scelerisque purus quis pellentesque commodo.</li>\r\n<li>Vestibulum eget purus aliquet, elementum magna dapibus, blandit mi.</li>\r\n<li>Fusce vestibulum nunc eu orci congue, id aliquet turpis accumsan.</li>\r\n<li>Donec sed purus ultricies nulla viverra pellentesque pretium vitae tellus.</li>\r\n</ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sit amet massa ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur condimentum orci non odio aliquam lobortis. Proin quis lacus vel risus laoreet tincidunt ac sed metus. Donec congue vitae mi volutpat lobortis. Nullam eget vehicula augue. Sed mattis ultrices finibus. Sed pellentesque nulla tincidunt lectus sodales convallis vitae eget ligula. In vitae libero ut nibh semper sollicitudin. Integer mattis quis lorem sit amet pretium. Ut ac maximus ante.&nbsp;</p>', '<p>Nullam at nulla ante. Aenean auctor neque erat, convallis congue purus lobortis eget. Integer ut nulla quis felis porttitor dictum a bibendum lectus. Aliquam sit amet rutrum lacus, id venenatis dui. Phasellus vitae neque malesuada, varius nisl ut, vulputate mauris. Vivamus imperdiet quis arcu quis molestie. Sed ut nulla nisl. Maecenas tellus lorem, tincidunt at massa vitae, convallis commodo orci.</p>\r\n<p>Ut ultrices suscipit ultricies. Nunc a rutrum odio. Sed pellentesque pretium tincidunt. Nulla molestie libero nec porta blandit. Etiam dignissim et velit vel iaculis. Vivamus dictum tortor enim, quis consequat sapien vestibulum vel. Sed fringilla tortor quis finibus imperdiet. Aenean ultricies aliquet nisl, eu laoreet enim viverra vitae. Duis id porta risus, quis ultricies leo. Sed velit sapien, sagittis non eros quis, luctus dapibus turpis. Quisque et libero condimentum, euismod ante ut, varius lectus. Cras quis interdum elit, vitae maximus massa. Nam gravida, nibh ut ultricies pulvinar, nulla ante hendrerit orci, at imperdiet lacus dolor eget massa. Duis fringilla sem non metus ornare egestas.&nbsp;</p>', '<p>Praesent aliquam posuere faucibus. In hac habitasse platea dictumst. Ut diam mi, mollis in egestas vel, venenatis a nunc. Aliquam justo neque, auctor in fermentum et, fermentum quis ipsum. Aliquam erat volutpat. Aliquam erat volutpat. Nulla sagittis faucibus dolor nec tincidunt. Nulla fermentum ipsum vitae efficitur euismod. Aliquam erat volutpat. Curabitur lobortis vehicula urna vitae dictum. Quisque rutrum et risus eu varius. Aliquam ullamcorper fermentum blandit. Aliquam eleifend nunc vitae neque lobortis molestie. Donec pellentesque, sem eu faucibus ornare, ante risus tempor orci, non condimentum elit nunc sed magna. Vivamus hendrerit tempor orci sit amet varius.</p>', 'Vivamus cursus luctus odio sit amet consectetur. In nulla lectus, tempus nec egestas eget, sagittis eu enim. Vestibulum et blandit nibh. Etiam sagittis aliquam euismod.', '0877123', 'rci@indonesia.com', 'rci', 'rci', 'rci', NULL, '2021-02-02 04:58:16', 'public/images/profile/FZ5JlPqLJWPgiP6jTmXNA0ObaQiIkBAVgjNwMOyW.jpg', 'public/images/profile/BOJI44RildbqdsG9anbqDaHzOH2LSspbaMRNrWcI.jpg', 'public/images/profile/ZmLznx94zHuJau9d4EJEpEmEjHnc1HUOR19itzFZ.jpg', 'public/images/profile/oKZr52X3kcUyTzZWcdJhH38areDM2knVi0CBVAfa.jpg', NULL, 'Senin - Selasa\r\n09:00 - 10:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `nama_program`, `gambar`, `deskripsi`, `status`, `created_at`, `updated_at`, `icon`, `tanda`) VALUES
(2, 'Usaha Mikro, Kecil,& Menengah', 'public/images/programs/uMPKFH2IDAQEaVwZ1gCvIQyfNo3t2TyYJBkR323u.jpg', '<p><strong>Haha Hihi,</strong></p>\r\n<p>Hehe Hoho....<br /></p>', 'aktif', '2021-01-29 22:00:24', '2021-01-29 22:00:24', 'public/images/programs/icon/61i2dcEsBD6TpIsEBizvddXxbY2XAPg5TiFvRcQN.png', 'Merupakan Program .....');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id`, `judul`, `deskripsi`, `link`, `created_at`, `updated_at`, `status`, `gambar`) VALUES
(2, '<h1 style=\"color: #ff0000;\"><span class=\"example1\" style=\"background-color: #ecf0f1; color: #34495e;\">Rumah </span></h1>\r\n<h1 style=\"color: #ff0000;\"><span class=\"example1\" style=\"background-color: #ecf0f1; color: #34495e;\">Creativepreneur </span></h1>\r\n<h1 style=\"color: #ff0000;\"><span class=\"example1\" style=\"background-color: #ecf0f1; color: #34495e;\">Indonesia</span></h1>', 'You Just To Be', 'https://google.com/', '2021-02-03 05:34:00', '2021-02-03 05:41:36', 'aktif', 'public/images/slider/atJT1CzF2iJzcxByfvCXZ3gaoxHDPCxieW3SeN82.jpg'),
(3, '<h1 style=\"color: #ff0000;\"><span class=\"example1\">Bakayrro</span></h1>', 'adasd', 'https:/fb.com/', '2021-02-03 05:45:04', '2021-02-03 05:45:04', 'aktif', 'public/images/slider/ObtZa1d1kqRY35CMRyfNV5kr8MUjpNFNG7veVbUQ.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_tim`
--

CREATE TABLE `struktur_tim` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `struktur_tim`
--

INSERT INTO `struktur_tim` (`id`, `foto`, `nama`, `jabatan`, `status`, `created_at`, `updated_at`, `urutan`, `facebook`, `twitter`, `linkedin`, `instagram`) VALUES
(6, 'public/images/struktur_tim/TlpEbljX2HdlkhCkliEErcjKKDGzMyCFYgGlBApb.jpg', 'Muhamad Iqbal Rivaldi', 'Marbot Masjid', 'aktif', '2021-01-31 20:13:30', '2021-01-31 20:13:30', '0', 'muhamadiqbalriv', 'muhamadiqbalriv', 'muhamadiqbalriv', 'muhamadiqbalriv'),
(7, 'public/images/struktur_tim/RUkpgtidlMWVFCrUkSVzvmw1E8ql24F9WHaYFGcG.jpg', 'Jeff Bezos', 'CEO Warung Kita', 'aktif', '2021-02-01 08:32:23', '2021-02-01 08:32:23', '0', 'jeff', 'jeff', 'jeff', 'jeff'),
(8, 'public/images/strutur_tim/bbse7aK0cW3lFwmCb6FwKkzsHpUyFPccAy4l2y3g.jpg', 'John Chena', 'CTO Warung Ane', 'aktif', '2021-02-01 08:32:59', '2021-02-01 08:49:00', '0', 'john', 'john', 'john', 'john');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `responden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `responden`, `asal`, `isi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Dony Ahmad Munir', 'Bupati Sumedang', 'RCI MANTAPPPPSS', 'public/images/testimoni/EWDxXvBXE9OCFku1QV22KIzhDwKrOcbfxt5I5Kr4.jpg', '2021-01-31 17:11:50', '2021-01-31 17:11:50'),
(2, 'Mark Zuckerberg', 'Pendiri Facebook', 'RCI KEREN', 'public/images/testimoni/VNkjX0eCiWWTbj3ySDjDhCrdhobLHjuFkzKsBqvH.jpg', '2021-01-31 17:12:29', '2021-01-31 17:12:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkm`
--

CREATE TABLE `umkm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori_umkm` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokopedia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukalapak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `umkm`
--

INSERT INTO `umkm` (`id`, `id_kategori_umkm`, `nama`, `alamat`, `telepon`, `instagram`, `pemilik`, `shopee`, `tokopedia`, `bukalapak`, `created_at`, `updated_at`, `gambar`) VALUES
(1, 1, 'TAHUNGODING', 'Sumedang', '088823', 'tahungoding', 'tahungoding corp', 'tahungoding', 'tahungoding', 'tahungoding', '2021-02-08 18:07:08', '2021-02-08 18:07:08', 'public/images/umkm/GQQk85oSrnlzAZFecCzaIbq4N7JFE58tlez2lVJF.jpg'),
(2, 1, 'IMCREATIVE', 'SUMEDANG', '08213123', 'imcreative', 'imcreative corp', 'imcreative', 'imcreative', 'imcreative', '2021-02-08 18:09:04', '2021-02-08 18:09:04', 'public/images/umkm/oU0V9kgxs0mLLdfrMdtyuk6bA2QY3aELsnONq7Td.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level` bigint(20) UNSIGNED NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `foto`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `id_level`, `status`) VALUES
(2, 'public/images/users/opwbcDZoaRHICamZUpiOj1j8c7K4QZ9Otg8dhB0f.jpg', 'X6r67BLgMq', 'l86eJXak7X@gmail.com', NULL, '$2y$10$K6fY77Q.dGSJ9eSul4IJNe93TweZ/R/DnU1pZTOKF1Bnv0LU2Yyla', NULL, NULL, '2021-02-07 22:05:59', 'c2DQDg3qaB1', 1, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'aktif', NULL, NULL),
(2, 'User', 'aktif', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_id_kategori_artikel_foreign` (`id_kategori_artikel`),
  ADD KEY `artikel_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_mitra`
--
ALTER TABLE `kategori_mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_umkm`
--
ALTER TABLE `kategori_umkm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mitra_id_kategori_mitra_foreign` (`id_kategori_mitra`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `struktur_tim`
--
ALTER TABLE `struktur_tim`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umkm_id_kategori_umkm_foreign` (`id_kategori_umkm`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_mitra`
--
ALTER TABLE `kategori_mitra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_umkm`
--
ALTER TABLE `kategori_umkm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `struktur_tim`
--
ALTER TABLE `struktur_tim`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_id_kategori_artikel_foreign` FOREIGN KEY (`id_kategori_artikel`) REFERENCES `kategori_artikel` (`id`),
  ADD CONSTRAINT `artikel_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `mitra_id_kategori_mitra_foreign` FOREIGN KEY (`id_kategori_mitra`) REFERENCES `kategori_mitra` (`id`);

--
-- Ketidakleluasaan untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `umkm_id_kategori_umkm_foreign` FOREIGN KEY (`id_kategori_umkm`) REFERENCES `kategori_umkm` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
