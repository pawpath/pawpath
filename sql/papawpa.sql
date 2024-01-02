-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Oca 2024, 14:34:57
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `pawpath`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `content`, `image`, `created_at`) VALUES
(4, 'blog sayfam', 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', NULL, '2023-12-30 23:20:43'),
(5, 'merhaba burası blog sayfası ', 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', NULL, '2023-12-30 23:21:02'),
(6, 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', NULL, '2023-12-30 23:23:57'),
(7, 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', 'Adsız4.png', '2023-12-30 23:24:00'),
(8, 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', 'Adsız.png', '2023-12-30 23:24:05'),
(9, 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', 'merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası merhaba burası blog sayfası ', 'Adsız2.png', '2023-12-30 23:33:14'),
(10, 'blog blog blog blog blog blog blog ', 'blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog ', 'Adsız3.png', '2023-12-30 23:33:27'),
(11, 'blog blog blog blog blog blog blog ', 'blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog blog ', 'banner.png', '2024-01-02 11:14:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_type` varchar(50) NOT NULL,
  `pet_breed` varchar(50) NOT NULL,
  `pet_age` varchar(50) NOT NULL,
  `pet_gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `pets`
--

INSERT INTO `pets` (`pet_id`, `user_id`, `pet_name`, `pet_type`, `pet_breed`, `pet_age`, `pet_gender`) VALUES
(1, 3, 'betül', 'kedi', 'golden', '12', 'D'),
(2, 3, 'yusuf', 'köpek', 'kurt', '20', 'E'),
(3, 3, 'melo', 'kedi', 'golden', '3', 'E');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pet_info`
--

CREATE TABLE `pet_info` (
  `pet_id` int(50) NOT NULL,
  `info_type` varchar(50) NOT NULL,
  `info_name` varchar(50) NOT NULL,
  `info_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `pet_info`
--

INSERT INTO `pet_info` (`pet_id`, `info_type`, `info_name`, `info_date`) VALUES
(1, 'allergy', 'kendisine', '2024-01-02'),
(1, 'disease', 'yusufa', '2024-01-09'),
(1, 'vaccine', 'kuduz', '2024-01-04'),
(2, 'vaccine', 'parazit', '2024-01-03'),
(2, 'allergy', 'betüle', '2024-01-17'),
(2, 'disease', 'kendisine', '2024-01-24'),
(1, 'allergy', 'asdas', '2024-01-04'),
(1, 'vaccine', 'sadasdasd', '2024-01-03'),
(1, 'vaccine', 'sadasdas', '2024-01-24'),
(1, 'allergy', 'sadasdasd', '2024-01-20'),
(1, 'disease', 'asdasda', '2024-01-19'),
(1, 'disease', 'dfgdfgdfg', '2024-02-05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL COMMENT 'user',
  `approved` int(11) NOT NULL,
  `banned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `mail`, `name`, `surname`, `password`, `role`, `approved`, `banned`) VALUES
(1, 'yz3ro', 'yusufolgn03@gmail.com', 'yusuf', 'olgun', '$2y$10$z9TR5U98iWGteJgcxQPbR.lUeKzrbXwtkHseCc923tozrzfc6FlUy', 'admin', 1, 0),
(2, 'yz3ro1', 'yz3ro123@gmail.com', 'yusuf', 'olgun', '$2y$10$hu8qw1X1nPZXgQc0fYLpauKA/cZKnNGc08yK4joIl7PErFHXrftRq', 'veterinarian', 1, 0),
(3, 'yz3ro2', 'yz3ro1232@gmail.com', 'yusuf', 'olgun', '$2y$10$QA9VF9SpQUkLex.yL./PNebi3tm9/7fXg.yJXrV/cZyw0dbfYgvL6', 'user', 1, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Tablo için indeksler `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
