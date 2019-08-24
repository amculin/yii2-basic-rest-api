-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2019 pada 17.14
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pretest_privy`
--
CREATE DATABASE IF NOT EXISTS `pretest_privy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `pretest_privy`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`, `enable`) VALUES
(1, 'Handphone', 1),
(2, 'Laptop/Notebook', 1),
(3, 'Kamera', 1),
(4, 'Headset', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_product`
--

CREATE TABLE `category_product` (
  `product_id` smallint(4) UNSIGNED NOT NULL,
  `category_id` tinyint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_product`
--

INSERT INTO `category_product` (`product_id`, `category_id`) VALUES
(1, 4),
(2, 4),
(3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `id` mediumint(6) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image`
--

INSERT INTO `image` (`id`, `name`, `file`, `enable`) VALUES
(1, 'iSK HP-580', 'isk_580red.jpg', 1),
(2, 'iSK HP-580', 'HTB1hpjmIVXXXXXvXXXXq6xXFXXX0.jpg', 1),
(3, 'Bose Quiet Comfort 35 Wireless Headphone II', 'BOSE-QC35-2.jpg', 1),
(4, 'Bose Quiet Comfort 35 Wireless Headphone II', 'BOSE-QC35-3.jpg', 1),
(5, 'Bose Quiet Comfort 35 Wireless Headphone II', 'BOSE-QC35-4.jpg', 1),
(6, 'Asus Zenfone Max M2 ZB633KL (4GB/64GB) - Midnight Black', 'zenfone-max-_m2_-zb633kl-midnight-black_1_1_2.jpg', 1),
(7, 'Asus Zenfone Max M2 ZB633KL (4GB/64GB) - Midnight Black', 'zenfone-max-_m2_-zb633kl-midnight-black_4_1_2.jpg', 1),
(8, 'Asus Zenfone Max M2 ZB633KL (4GB/64GB) - Midnight Black', 'zenfone-max-_m2_-zb633kl-midnight-black_6_1_2.jpg', 1),
(9, 'Asus Zenfone Max M2 ZB633KL (4GB/64GB) - Midnight Black', 'zenfone-max-_m2_-zb633kl-midnight-black_8_1_2.jpg', 1),
(10, 'Asus Zenfone Max M2 ZB633KL (4GB/64GB) - Midnight Black', 'zenfone-max-_m2_-zb633kl-midnight-black_9_1_2.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` smallint(4) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `enable`) VALUES
(1, 'ISK HP-580', 'Satu-satunya headphone monitoring semi-open di kelas harganya dan mempunyai kualitas suara begitu rapi. Jangan tertipu dengan tampilan warna merahnya iSK HP-580, justru headphone ini malah mengejutkan dari suara yang dihasilkannya. Full body bass, midrange yang jernih dan cukup forward, serta treble yang cring tapi gak nusuk.', 1),
(2, 'Bose Quiet Comfort 35 Wireless H', 'Headphone wireless yang bisa dipakai untuk travel yang dilengkapi dengan noise canceling dan suara yang balance membuat headphone ini boleh jadi pertimbangan kalian.', 1),
(3, 'Asus Zenfone Max M2 ZB633KL (4GB/64GB) - Midnight Black', 'ZenFone Max M2 terbaru didesain dengan ukuran layar all screen 6.3 inci dan juga menggunakan prosesor Qualcomm Snapdragon 632 yang membuatnya lebih cepat, ditambah lagi dengan stamina baterai besar yang membuatmu dapat menikmati hidup. Dengan sistem dual-camera berkualitas tinggi unguk hasil foto yang bagus dan juga kualitas audio yang powerful, ZenFone Max adalah sahabat terbaikmu setiap saat.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_image`
--

CREATE TABLE `product_image` (
  `product_id` smallint(4) UNSIGNED NOT NULL,
  `image_id` mediumint(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_image`
--

INSERT INTO `product_image` (`product_id`, `image_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`product_id`,`category_id`);

--
-- Indeks untuk tabel `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_id`,`image_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `image`
--
ALTER TABLE `image`
  MODIFY `id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
