-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Kas 2023, 00:18:46
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
(1, 'sa', 'sa', NULL, '2023-11-27 23:14:10'),
(2, 'sa', 'sa', NULL, '2023-11-27 23:14:12'),
(3, 'başlık', 'içerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerikiçerik', NULL, '2023-11-27 23:14:35');

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
  `approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `mail`, `name`, `surname`, `password`, `role`, `approved`) VALUES
(1, 'yz3ro', 'yusufolgn03@gmail.com', 'yusuf', 'olgun', '$2y$10$z9TR5U98iWGteJgcxQPbR.lUeKzrbXwtkHseCc923tozrzfc6FlUy', 'admin', 1),
(2, 'yz3ro1', 'yz3ro123@gmail.com', 'yusuf', 'olgun', '$2y$10$hu8qw1X1nPZXgQc0fYLpauKA/cZKnNGc08yK4joIl7PErFHXrftRq', 'veterinarian', 0),
(3, 'yz3ro2', 'yz3ro1232@gmail.com', 'yusuf', 'olgun', '$2y$10$QA9VF9SpQUkLex.yL./PNebi3tm9/7fXg.yJXrV/cZyw0dbfYgvL6', 'user', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

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
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
