-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 12:16 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumen`
--

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
(1, '2018_12_11_102014_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Christelle Adams Sr.', 'qwiza@gmail.com', '$2y$10$sMryJDTSAshz6Qga6jCrver4qM6SoZ0.pK9ZamaaSmq4CGSk.HBSq', '2018-12-11 10:38:19', '2018-12-11 10:38:19'),
(2, 'Prof. Roscoe Kling', 'schiller.elva@gmail.com', '$2y$10$ZxzXlb56vCG4rGvd9TmRp.3GeEPf05NAyVfEhZNYm.wUFjnD1caAm', '2018-12-11 10:38:19', '2018-12-11 10:38:19'),
(3, 'Lisa Prosacco', 'dino.king@yahoo.com', '$2y$10$X4TsLOQHXcGGZIj2I69NR.cwS/O6hX7oz8//9ulBGlFPL8jW3yP3K', '2018-12-11 10:38:19', '2018-12-11 10:38:19'),
(4, 'Anjali Terry', 'greenholt.alvina@gorczany.biz', '$2y$10$2GxImNN2zcs9lvd8rJEdA.ajOBKBwJz5NiuOxjjg3c.swL4sHgi2q', '2018-12-11 10:38:19', '2018-12-11 10:38:19'),
(5, 'Madelynn Huel', 'von.antonetta@luettgen.com', '$2y$10$dAhfOtw7665xihO42Kdt9O.0e2hjGtDFR9/0J1A/mtRPa/Q6DoQ3G', '2018-12-11 10:38:19', '2018-12-11 10:38:19'),
(6, 'Mrs. Ernestine Marvin PhD', 'utremblay@hoppe.info', '$2y$10$UAZ5YNkTJWjdTAlFcvk9VOqy6W3pR64kBuSeH8t2BI4mblZJth/Ga', '2018-12-11 10:38:19', '2018-12-11 10:38:19'),
(7, 'Savannah Gutmann', 'heaven22@kassulke.com', '$2y$10$9BA01sXdmaw/iMb5CV3Bse0AiqCpW.gLXssHjbme74claPHvn7RPi', '2018-12-11 10:38:19', '2018-12-11 10:38:19'),
(8, 'Mr. Marcus McKenzie IV', 'rhettinger@yahoo.com', '$2y$10$77e3cb04fXLuKZg1Lq8WE.n77iV.ZenhsuH2IIdMYFtkvHmlwZejy', '2018-12-11 10:38:19', '2018-12-11 10:38:19'),
(9, 'Mrs. Beth Reynolds PhD', 'myrtis90@yahoo.com', '$2y$10$VmCqcfaIzUfjMmlAIJkHDeSULiVBccJYmzyNpvm7O9o3w8QK0mx5.', '2018-12-11 10:38:19', '2018-12-11 10:38:19'),
(10, 'Delbert Miller', 'deckow.ariane@yahoo.com', '$2y$10$tL5fPaFLgsdx4fh4IxVAfOXpIp0SnPuY88gyF1H8plwzxCY5l7hHe', '2018-12-11 10:38:19', '2018-12-11 10:38:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
