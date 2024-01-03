-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Oca 2024, 20:21:25
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

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
(12, 'Köpekler: Sadakatin ve Sevginin Maskotları', 'Köpekler, insanlık tarihinde en yakın dostlarımızdan biri olmuştur. Sadık bakışları, sevgi dolu tavırları ve enerjik kişilikleriyle, köpekler evlerimize neşe ve canlılık katmaktadır.\r\n\r\nKöpeklerin insanlarla olan ilişkisi binlerce yıl öncesine dayanır. İlk başlarda avcılık yardımcıları olarak kullanılan köpekler, zamanla farklı ırklara ve görevlere adapte olmuşlardır. Günümüzde ise dostluğun, korumanın ve terapi desteğinin mükemmel temsilcileridir.\r\n\r\nHer köpek biricik bir karaktere sahiptir. Büyüklerinden küçüklerine, Chihuahua\'dan Büyük Dane\'ye kadar farklı ırklar, her türlü yaşam tarzına uyum sağlar. Köpekler, sahipleriyle kurdukları güçlü bağlarla bilinir; bu bağlar, köpek sahiplerini zor anlarda destekleyen, mutlu anlarda ise paylaşımı seven dostlar haline getirir.\r\n\r\nKöpeklerin sağlıklı bir yaşam sürmeleri için düzenli egzersiz, dengeli beslenme ve sevgi dolu bir çevre önemlidir. Veteriner kontrolü, aşılar ve iyi bir bakım, köpeklerin yaşam kalitesini artırmak için önemlidir.\r\n\r\nKöpekler, duygusal zekalarıyla da öne çıkarlar. Sahiplerinin hissiyatlarını anlayabilir ve onlara duygusal destek sağlayabilirler. Bu özellikleri, köpekleri terapi hayvanları haline getirir ve çeşitli insan grupları için tedavi destek aracı olarak kullanılmalarına olanak tanır.\r\n\r\nSonuç olarak, köpekler sadece evcil hayvanlar değil, aynı zamanda yaşamımıza anlam ve sevinç katan sadık dostlardır. Onlarla geçirilen zaman, sevgi dolu anılar ve bir ömür boyu sürecek dostluklar demektir.', 'Adsız.png', '2024-01-03 19:16:25'),
(13, 'Köpek Sağlığı: Sadakatinizi Daha Uzun Süre Paylaşmanın Anahtarı', 'Köpekler, evimizi renklendiren ve hayatımıza sevgi katan sadık dostlarımızdır. Onların sağlığına özen göstermek, uzun, mutlu bir yaşam süreçleri için önemlidir. İşte köpek sağlığıyla ilgili bazı temel noktalar:\r\n\r\nDüzenli Veteriner Kontrolleri:\r\nKöpeğinizin sağlığını takip etmek için düzenli veteriner kontrolleri önemlidir. Aşıları güncellemek, parazit kontrolünü sağlamak ve genel sağlık durumunu kontrol etmek, potansiyel sorunların erken teşhisini sağlar.\r\n\r\nDenge Beslenme:\r\nKöpeğinizin sağlıklı bir diyetle beslenmesi, genel sağlık durumunu etkiler. Yaşına, ırkına ve aktivite seviyesine uygun bir beslenme planı oluşturun. Taze suyun her zaman erişilebilir olduğundan emin olun.\r\n\r\nFiziksel Aktivite:\r\nKöpeklerin fiziksel aktiviteye ihtiyacı vardır. Günde en az birkaç kez dışarı çıkarak yürüyüş yapmalarını sağlamak, kilo kontrolü ve zihinsel sağlık açısından önemlidir.\r\n\r\nDiş Sağlığı:\r\nDiş sağlığına dikkat etmek, köpeklerin genel sağlığını olumlu yönde etkiler. Diş fırçalama, diş oyuncağı kullanma ve düzenli diş kontrolü, diş sorunlarını önlemeye yardımcı olabilir.\r\n\r\nParazit Kontrolü:\r\nPireler, kene ve iç parazitler köpeklerin sağlığını olumsuz etkileyebilir. Düzenli olarak parazit kontrolü uygulayarak, bu sorunların önüne geçebilirsiniz.\r\n\r\nDuygusal İhtiyaçlar:\r\nKöpekler sadece fiziksel değil, aynı zamanda duygusal ihtiyaçlara da sahiptir. Onlara zaman ayırın, sevgi gösterin ve etkileşimde bulunun. Bu, köpeğinizin mutluluğunu ve stres seviyelerini olumlu yönde etkiler.\r\n\r\nÇevre Düzenlemesi:\r\nKöpeğinizin yaşam alanını temiz tutun. Zehirli bitkilerden uzak durun, zararlı maddelere erişimini engelleyin ve güvenli bir çevre oluşturun.\r\n\r\nKöpeğinizin sağlığını ön planda tutmak, onunla geçireceğiniz yılları daha sağlıklı ve mutlu kılacaktır. Unutmayın ki bir köpek, size verdiği sevgiye karşılık olarak en iyi sağlık ve bakımı hak eder.', 'Adsız2.png', '2024-01-03 19:18:46'),
(14, 'Köpek Beslenmesi: Sadık Dostlarımızın Sağlıklı Yolu', 'Köpekler, sağlıklı bir yaşam sürmeleri için dengeli ve uygun bir beslenmeye ihtiyaç duyarlar. Doğru beslenme, enerjik, mutlu ve uzun bir yaşam sürecinin anahtarıdır. İşte köpek beslenmesiyle ilgili bazı önemli noktalar:\r\n\r\nYaşa ve İrka Uygun Beslenme:\r\nKöpeklerin yaşına, ırkına, cinsine ve fiziksel aktivite düzeyine uygun bir beslenme planı oluşturmak önemlidir. Büyük ırk köpeklerin ihtiyaçları ile küçük ırk köpeklerin ihtiyaçları farklı olabilir.\r\n\r\nKaliteli Köpek Maması:\r\nKöpeklere özel olarak formüle edilmiş kaliteli bir köpek maması seçmek, temel beslenme ihtiyaçlarını karşılamada önemlidir. Mamada et, sebze ve tahıl gibi dengeli bileşenlerin bulunmasına dikkat edilmelidir.\r\n\r\nProtein İhtiyacı:\r\nProtein, köpekler için hayati öneme sahip bir besin maddesidir. Et, tavuk, balık gibi hayvansal kaynaklı proteinler, kas gelişimi ve enerji sağlamak için önemlidir.\r\n\r\nSu Temini:\r\nKöpeklerin her zaman temiz suya erişimleri olmalıdır. Su, sindirim, vücut sıcaklığının düzenlenmesi ve genel sağlık için kritik bir rol oynar.\r\n\r\nÖlçülü Besleme:\r\nKöpeklerin kilo kontrolü önemlidir. Aşırı kilo, çeşitli sağlık sorunlarına yol açabilir. Ambalaj üzerindeki beslenme yönergelerini takip ederek ve köpeğinizi düzenli olarak tartarak doğru porsiyonları belirlemek önemlidir.\r\n\r\nLezzetli ve Güvenli İkramlar:\r\nKöpekler, sağlıklı ikramlarla ödüllendirilebilir. Ancak, insan yiyecekleri arasında zararlı maddeler olabileceğinden, onlara uygun köpek ikramları seçmek önemlidir.\r\n\r\nDiş Sağlığına Dikkat:\r\nÇiğneme aktiviteleri, köpeklerin diş sağlığını destekler. Özel diş oyuncağı kullanımı ve düzenli diş kontrolü, diş sorunlarını önlemeye yardımcı olabilir.\r\n\r\nÖzel Gereksinimlere Saygı:\r\nBazı köpekler alerji veya intoleranslara sahip olabilir. Bu durumda özel beslenme ihtiyaçlarına saygı göstermek ve uygun bir diyet planı oluşturmak önemlidir.\r\n\r\nKöpek beslenmesi, genel sağlığı etkileyen kilit bir unsurdur. Sağlıklı bir diyetle beslenen köpekler, daha uzun ve mutlu bir yaşam sürebilirler. Ancak her durumda, köpeğinizin bireysel ihtiyaçlarını ve sağlık durumunu göz önünde bulundurmak en iyisi olacaktır.', 'Adsız3.png', '2024-01-03 19:20:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`user_id`, `name`, `surname`, `mail`, `message`) VALUES
(3, 'yusuf', 'olgun', 'yusufolgn03@gmail.com', 'merhaba sitenizi çok beğendim bunu bildirmek istedim iyi günler dilerim. :D'),
(3, 'yusuf', 'olgun', 'yusufolgn03@gmail.com', 'adasdasdasdasdasdasdasdas');

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
(3, 3, 'melo', 'kedi', 'golden', '3', 'E'),
(4, 4, 'balım', 'kedi', 'golden', '3', 'E');

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
(3, 'yz3ro2', 'fleaudie@gmail.com', 'betül', 'kansu', '$2y$10$QA9VF9SpQUkLex.yL./PNebi3tm9/7fXg.yJXrV/cZyw0dbfYgvL6', 'user', 1, 0),
(4, 'yz3ro3', 'yz3ro1234@gmail.com', 'yusuf', 'olgun', '$2y$10$Y9Z9Esz7RbVgBno7NCzYzusimBrEgQDbgph9wpoJzG5P.B.TfRm6O', 'user', 1, 0);

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
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
