

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



--

-- --------------------------------------------------------

--
-- Struktura tabulky `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf16_czech_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_czech_ci AUTO_INCREMENT=31 ;

--
-- Vypisuji data pro tabulku `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Harvey, Dickinson and Lakin', '1977-06-21 15:29:09', '2000-10-21 01:11:57'),
(2, 'Waters Ltd', '1983-09-03 01:52:00', '1980-07-16 18:09:39'),
(3, 'Wiza-Blanda', '2003-10-10 21:58:10', '1985-04-15 01:23:13'),
(4, 'Smith-Heidenreich', '1992-09-30 14:07:15', '2004-12-16 09:42:54'),
(5, 'Senger, Hayes and Goyette', '1992-06-27 01:26:00', '2021-12-20 23:57:47'),
(6, 'Zboncak, Cartwright and White', '1995-08-19 07:23:02', '1980-09-11 22:29:36'),
(7, 'Stroman-Kihn', '2004-08-03 09:02:48', '2020-03-10 19:26:40'),
(8, 'Morar-Ledner', '1989-05-18 10:06:15', '2008-03-08 21:42:35'),
(9, 'Mante-DuBuque', '2021-07-30 04:11:48', '1989-07-27 11:07:00'),
(10, 'Muller, Rau and Nicolas', '1990-01-28 07:43:04', '2019-12-18 00:28:23'),
(11, 'Hoeger, Altenwerth and Kutch', '2016-11-15 01:12:09', '2002-08-13 18:48:32'),
(12, 'Hilpert-Yundt', '1976-07-04 23:58:07', '2018-11-01 14:11:28'),
(13, 'Nader, Huels and Wisoky', '2016-05-07 23:08:06', '2022-09-28 06:13:53'),
(14, 'Vandervort-Fisher', '1972-05-20 23:43:45', '1977-11-07 00:54:16'),
(15, 'Boehm Inc', '2015-02-06 17:15:39', '1999-03-16 16:14:37'),
(16, 'Stracke-Streich', '1988-03-02 04:51:38', '2009-10-15 10:42:54'),
(17, 'Blick, Koepp and Gutmann', '1985-05-04 14:53:30', '1991-05-07 23:09:10'),
(18, 'Carter PLC', '1991-06-23 01:37:27', '2019-12-23 19:53:06'),
(19, 'Deckow, Shanahan and Hagenes', '1983-05-07 09:30:29', '1987-07-04 00:42:00'),
(20, 'Gulgowski PLC', '1995-10-12 00:19:03', '2018-12-20 12:52:42'),
(21, 'Hickle Group', '1975-09-01 06:54:45', '1998-05-14 22:47:33'),
(22, 'Nikolaus Inc', '1972-07-15 09:12:03', '1975-08-13 03:53:36'),
(23, 'Walker-Reynolds', '1978-04-02 00:09:49', '1978-09-11 11:13:32'),
(24, 'Streich, Blanda and Homenick', '1998-10-04 12:57:42', '1978-06-25 21:23:29'),
(25, 'Fay-Leuschke', '1974-02-26 04:19:22', '1979-07-07 08:00:46'),
(26, 'Moore and Sons', '2021-12-07 12:38:18', '2009-12-07 16:18:33'),
(27, 'Greenholt-Mertz', '1987-12-24 22:04:44', '2013-08-11 21:08:01'),
(28, 'Paucek, Rosenbaum and Mayert', '1971-03-18 20:04:39', '2006-02-15 13:36:21'),
(29, 'McGlynn, Haley and Gleichner', '2011-04-06 13:23:36', '1972-09-27 18:44:08'),
(30, 'McCullough, Oberbrunner and Wolf', '2018-02-24 04:47:45', '2016-01-31 18:47:32');

-- --------------------------------------------------------

--
-- Struktura tabulky `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabulky `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `white_id` int(11) NOT NULL,
  `black_id` int(11) NOT NULL,
  `moves` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  `loser_id` int(11) NOT NULL,
  `draw` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `player_id` (`white_id`),
  KEY `opponent` (`black_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_czech_ci AUTO_INCREMENT=245 ;

--
-- Vypisuji data pro tabulku `matches`
--

INSERT INTO `matches` (`id`, `white_id`, `black_id`, `moves`, `winner_id`, `loser_id`, `draw`, `date`) VALUES
(1, 1, 2, 24, 1, 2, NULL, '2023-05-17 18:19:07'),
(2, 1, 2, 25, 1, 2, NULL, '2023-05-10 21:53:46'),
(3, 1, 2, 24, 2, 1, NULL, '2023-10-10 23:53:46'),
(4, 1, 2, 23, 2, 1, NULL, '2023-05-10 20:53:46'),
(6, 2, 1, 22, 2, 1, NULL, '2023-12-10 07:53:46'),
(7, 1, 2, 21, 0, 0, 1, '2023-05-10 08:53:46'),
(8, 2, 1, 22, 2, 1, NULL, '2023-05-10 10:50:46'),
(9, 2, 1, 22, 2, 1, NULL, '2023-05-10 13:53:46'),
(10, 1, 3, 30, 3, 1, NULL, '2023-05-17 16:52:40'),
(11, 1, 3, 23, 3, 1, NULL, '2023-05-17 18:19:07'),
(12, 1, 3, 40, 3, 1, NULL, '2023-05-17 18:19:07'),
(13, 1, 2, 50, 1, 2, NULL, '2023-05-17 18:19:07'),
(14, 1, 2, 35, 1, 2, NULL, '2023-05-17 18:19:07'),
(15, 1, 2, 31, 1, 2, NULL, '2023-05-17 18:19:07'),
(133, 1, 2, 32, 1, 2, NULL, '2023-03-24 02:08:23'),
(134, 1, 3, 32, 1, 3, NULL, '2023-08-11 14:04:48'),
(135, 1, 4, 36, 4, 1, NULL, '2023-11-15 09:03:14'),
(136, 1, 5, 48, 5, 1, NULL, '2023-03-17 07:11:00'),
(137, 1, 6, 14, 1, 6, NULL, '2023-05-09 10:27:02'),
(138, 1, 7, 26, 1, 7, NULL, '2023-02-20 11:08:58'),
(139, 1, 8, 54, 8, 1, NULL, '2023-12-31 22:58:51'),
(140, 1, 9, 50, 9, 1, NULL, '2023-11-18 21:41:33'),
(141, 1, 10, 32, 10, 1, NULL, '2023-07-20 11:17:21'),
(142, 1, 11, 36, 11, 1, NULL, '2023-03-11 04:50:28'),
(143, 2, 1, 58, 2, 1, NULL, '2023-08-02 04:11:01'),
(144, 2, 3, 25, 2, 3, NULL, '2023-06-04 21:55:44'),
(145, 2, 4, 14, 2, 4, NULL, '2023-10-23 07:30:05'),
(146, 2, 5, 15, 5, 2, NULL, '2023-11-30 22:17:29'),
(147, 2, 6, 33, 6, 2, NULL, '2023-11-15 00:20:48'),
(148, 2, 7, 60, 2, 7, NULL, '2023-06-25 11:57:18'),
(149, 2, 8, 66, 2, 8, NULL, '2023-11-21 05:51:03'),
(150, 2, 9, 15, 2, 9, NULL, '2023-10-09 05:08:54'),
(151, 2, 10, 19, 10, 2, NULL, '2023-10-01 04:16:14'),
(152, 2, 11, 59, 11, 2, NULL, '2023-10-02 15:32:55'),
(153, 3, 1, 67, 3, 1, NULL, '2023-07-23 16:26:36'),
(154, 3, 2, 27, 3, 2, NULL, '2023-09-22 08:26:41'),
(155, 3, 4, 39, 4, 3, NULL, '2023-03-06 06:50:20'),
(156, 3, 5, 41, 3, 5, NULL, '2023-07-03 03:38:20'),
(157, 3, 6, 36, 3, 6, NULL, '2023-05-16 16:58:02'),
(158, 3, 7, 46, 3, 7, NULL, '2023-03-16 18:33:54'),
(159, 3, 8, 28, 8, 3, NULL, '2023-09-16 05:51:53'),
(160, 3, 9, 33, 3, 9, NULL, '2023-01-07 12:53:30'),
(161, 3, 10, 64, 3, 10, NULL, '2023-06-14 00:19:23'),
(162, 3, 11, 20, 11, 3, NULL, '2023-05-25 21:05:10'),
(163, 4, 1, 25, 4, 1, NULL, '2023-07-16 06:31:03'),
(164, 4, 2, 45, 4, 2, NULL, '2023-01-01 04:42:15'),
(165, 4, 3, 43, 3, 4, NULL, '2023-08-14 01:52:03'),
(166, 4, 5, 13, 4, 5, NULL, '2023-07-24 13:39:23'),
(167, 4, 6, 24, 6, 4, NULL, '2023-02-26 07:29:07'),
(168, 4, 7, 41, 4, 7, NULL, '2023-02-12 21:59:05'),
(169, 4, 8, 68, 4, 8, NULL, '2023-10-09 23:39:11'),
(170, 4, 9, 40, 9, 4, NULL, '2023-10-22 06:04:21'),
(171, 4, 10, 47, 4, 10, NULL, '2023-12-28 04:22:09'),
(172, 4, 11, 67, 4, 11, NULL, '2023-08-11 09:40:54'),
(173, 5, 1, 21, 1, 5, NULL, '2023-01-30 19:18:53'),
(174, 5, 2, 26, 2, 5, NULL, '2023-04-09 09:50:25'),
(175, 5, 3, 17, 5, 3, NULL, '2023-02-12 07:00:58'),
(176, 5, 4, 59, 5, 4, NULL, '2023-11-01 18:05:05'),
(177, 5, 6, 13, 5, 6, NULL, '2023-08-23 19:40:24'),
(178, 5, 7, 16, 5, 7, NULL, '2023-08-13 23:18:51'),
(179, 5, 8, 65, 5, 8, NULL, '2023-10-06 19:09:13'),
(180, 5, 9, 23, 5, 9, NULL, '2023-04-06 16:06:55'),
(181, 5, 10, 47, 5, 10, NULL, '2023-12-06 23:13:39'),
(182, 5, 11, 29, 5, 11, NULL, '2023-12-30 10:52:19'),
(183, 6, 1, 27, 6, 1, NULL, '2023-02-25 08:52:21'),
(184, 6, 2, 38, 2, 6, NULL, '2023-10-12 09:14:56'),
(185, 6, 3, 76, 6, 3, NULL, '2023-11-27 22:13:55'),
(186, 6, 4, 79, 4, 6, NULL, '2023-04-23 17:39:08'),
(187, 6, 5, 57, 5, 6, NULL, '2023-12-24 16:24:00'),
(188, 6, 7, 28, 6, 7, NULL, '2023-02-28 09:40:19'),
(189, 6, 8, 56, 6, 8, NULL, '2023-12-31 11:08:12'),
(190, 6, 9, 80, 9, 6, NULL, '2023-07-24 12:01:22'),
(191, 6, 10, 34, 6, 10, NULL, '2023-06-24 11:41:32'),
(192, 6, 11, 33, 6, 11, NULL, '2023-03-30 20:46:59'),
(193, 7, 1, 37, 1, 7, NULL, '2023-11-09 11:11:56'),
(194, 7, 2, 25, 2, 7, NULL, '2023-02-20 09:45:05'),
(195, 7, 3, 58, 3, 7, NULL, '2023-09-14 21:32:59'),
(196, 7, 4, 37, 4, 7, NULL, '2023-02-18 20:14:47'),
(197, 7, 5, 34, 7, 5, NULL, '2023-02-13 15:00:12'),
(198, 7, 6, 68, 7, 6, NULL, '2023-08-28 19:27:30'),
(199, 7, 8, 38, 7, 8, NULL, '2023-12-13 18:58:53'),
(200, 7, 9, 75, 7, 9, NULL, '2023-06-23 17:11:18'),
(201, 7, 10, 42, 10, 7, NULL, '2023-06-04 05:09:09'),
(202, 7, 11, 69, 7, 11, NULL, '2023-09-06 11:25:01'),
(203, 8, 1, 17, 1, 8, NULL, '2023-01-07 14:45:50'),
(204, 8, 2, 74, 2, 8, NULL, '2023-06-12 09:03:29'),
(205, 8, 3, 23, 8, 3, NULL, '2023-07-19 15:41:44'),
(206, 8, 4, 23, 4, 8, NULL, '2023-10-17 04:34:54'),
(207, 8, 5, 60, 5, 8, NULL, '2023-11-25 18:14:53'),
(208, 8, 6, 24, 8, 6, NULL, '2023-05-09 11:48:54'),
(209, 8, 7, 77, 8, 7, NULL, '2023-09-11 15:47:21'),
(210, 8, 9, 36, 8, 9, NULL, '2023-08-11 03:52:19'),
(211, 8, 10, 30, 10, 8, NULL, '2023-03-15 03:23:47'),
(212, 8, 11, 16, 11, 8, NULL, '2023-04-30 21:02:13'),
(213, 9, 1, 55, 9, 1, NULL, '2023-11-21 07:19:04'),
(214, 9, 2, 29, 9, 2, NULL, '2023-07-24 22:32:32'),
(215, 9, 3, 46, 9, 3, NULL, '2023-03-17 02:12:31'),
(216, 9, 4, 22, 4, 9, NULL, '2023-12-04 13:07:17'),
(217, 9, 5, 34, 9, 5, NULL, '2023-04-06 09:02:19'),
(218, 9, 6, 36, 9, 6, NULL, '2023-08-21 18:44:59'),
(219, 9, 7, 51, 7, 9, NULL, '2023-08-09 16:41:46'),
(220, 9, 8, 67, 9, 8, NULL, '2023-02-12 11:41:28'),
(221, 9, 10, 79, 10, 9, NULL, '2023-12-15 20:26:27'),
(222, 9, 11, 18, 9, 11, NULL, '2023-08-07 06:31:59'),
(223, 10, 1, 44, 1, 10, NULL, '2023-12-09 14:27:22'),
(224, 10, 2, 74, 2, 10, NULL, '2023-07-12 22:04:26'),
(225, 10, 3, 40, 10, 3, NULL, '2023-09-26 15:13:55'),
(226, 10, 4, 16, 4, 10, NULL, '2023-03-12 20:01:45'),
(227, 10, 5, 34, 5, 10, NULL, '2023-10-04 19:33:59'),
(228, 10, 6, 59, 10, 6, NULL, '2023-11-04 16:47:41'),
(229, 10, 7, 63, 10, 7, NULL, '2023-02-20 13:40:45'),
(230, 10, 8, 13, 8, 10, NULL, '2023-08-09 01:20:36'),
(231, 10, 9, 49, 9, 10, NULL, '2023-05-07 23:38:21'),
(232, 10, 11, 75, 11, 10, NULL, '2023-08-14 23:44:54'),
(233, 11, 1, 19, 11, 1, NULL, '2023-12-09 10:59:59'),
(234, 11, 2, 21, 11, 2, NULL, '2023-10-30 10:55:15'),
(235, 11, 3, 65, 3, 11, NULL, '2023-12-17 09:58:22'),
(236, 11, 4, 19, 4, 11, NULL, '2023-07-01 06:58:19'),
(237, 11, 5, 70, 11, 5, NULL, '2023-01-18 03:57:17'),
(238, 11, 6, 70, 6, 11, NULL, '2023-12-03 20:42:50'),
(239, 11, 7, 78, 7, 11, NULL, '2023-07-27 19:01:26'),
(240, 11, 8, 60, 8, 11, NULL, '2023-10-01 03:20:54'),
(241, 11, 9, 12, 11, 9, NULL, '2023-04-22 16:27:58'),
(242, 11, 10, 51, 10, 11, NULL, '2023-09-08 05:38:07'),
(243, 3, 2, 90, 2, 3, NULL, '2023-05-21 00:35:34'),
(244, 3, 2, 80, 3, 2, NULL, '2023-05-21 22:08:26');

-- --------------------------------------------------------

--
-- Struktura tabulky `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabulky `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf16_czech_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf16_czech_ci NOT NULL,
  `club_id` int(11) NOT NULL,
  `city` varchar(50) COLLATE utf16_czech_ci NOT NULL,
  `country` varchar(50) COLLATE utf16_czech_ci NOT NULL,
  `joined` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_czech_ci AUTO_INCREMENT=122 ;

--
-- Vypisuji data pro tabulku `players`
--

INSERT INTO `players` (`id`, `name`, `mobile`, `club_id`, `city`, `country`, `joined`) VALUES
(1, 'Mikayla Kerluke MD', '+92(0)9151940197', 9, 'Lavonbury', 'Belgium', '1995-09-03 01:09:22'),
(2, 'Glennie Koelpin', '1-691-527-4101', 8, 'Freidaberg', 'Bouvet Island (Bouve', '2023-05-18 13:40:10'),
(3, 'Maud Bayer', '04218368456', 12, 'Daveview', 'Nauru', '1995-07-09 12:33:10'),
(4, 'Patricia Wuckert V', '(580)952-3851x7392', 17, 'Clayhaven', 'Myanmar', '1988-02-09 21:39:33'),
(5, 'Rita Reynolds', '911-513-9087x06882', 21, 'Boehmshire', 'Turkmenistan', '2000-06-02 10:36:01'),
(6, 'Liza Williamson', '686-513-9653', 2, 'East Archbury', 'French Polynesia', '1992-04-17 16:02:00'),
(7, 'Prof. Emery Lehner', '(898)239-2260', 16, 'New Etha', 'Indonesia', '2017-06-29 12:45:37'),
(8, 'Albert Oberbrunner', '602-729-88835k', 4, 'South Anastacio1a', 'Bahrain', '2023-05-18 13:27:09'),
(9, 'Leonel Cassinn', '05459604079', 5, 'East Wilmerbury1', 'Yemen', '2023-05-21 17:41:17'),
(10, 'Rocky Hermiston', '998-465-7153x7073', 24, 'South Cleoraview', 'Martinique', '1982-06-26 12:01:25'),
(11, 'Kacie Brakus', '+52(6)0659974444', 15, 'Kovacekville5', 'Burkina Faso', '1997-02-08 12:22:56'),
(12, 'Sadye Johns I', '(634)461-2075x0061', 21, 'Micahstad', 'Christmas Island', '1977-08-30 17:02:37'),
(13, 'Ollie Mertz DDS', '(734)189-7510', 7, 'West Cara', 'Brunei Darussalam', '1981-11-13 12:55:12'),
(14, 'Griffin Dicki DDS', '(391)361-8509x19623', 5, 'Port Aglaechester', 'Montserrat', '1996-02-02 05:41:47'),
(15, 'Ulises Greenfelder', '989-537-2165x456', 23, 'New Esteban', 'Wallis and Futuna', '1997-07-22 23:09:15'),
(16, 'Arvel Hirthe', '292-204-2213', 13, 'West Vernon', 'Estonia', '2002-01-01 19:14:37'),
(17, 'Bernadette Hessel', '926.377.1972x964', 11, 'North Brennonfort', 'Ghana', '2003-11-14 08:59:35'),
(18, 'Wyman Rohan', '225-914-1887x639', 8, 'Borerfurt', 'Ghana', '1998-06-08 17:27:36'),
(19, 'Broderick Ziemann', '(610)789-2891', 1, 'South Trenton', 'United States of Ame', '1970-07-01 18:49:43'),
(20, 'Kimberly Watsica', '601.255.1341', 13, 'Dessieville', 'Nauru', '1990-06-17 02:34:15'),
(21, 'Magnus Conn', '1-530-232-6492x21033', 2, 'East Nelliemouth', 'Guyana', '2019-07-14 12:39:56'),
(22, 'Mrs. Verna Kiehn', '375-593-3326x1983', 4, 'South Rylanshire', 'Turkmenistan', '1995-04-28 23:44:44'),
(23, 'Winnifred Harvey', '1-773-528-5334x38239', 29, 'Shanieberg', 'Guyana', '2019-01-30 22:04:30'),
(24, 'Clarabelle Mueller', '(935)592-6274x7296', 5, 'South Skylar', 'Bahamas', '1991-03-29 03:28:35'),
(25, 'Quincy Hermann', '1-226-299-6996', 24, 'West Eribertomouth', 'Solomon Islands', '1987-01-14 19:53:43'),
(26, 'Mrs. Angelica Grant PhD', '234-045-0259x37270', 11, 'Morarfurt', 'Christmas Island', '2008-09-07 03:50:15'),
(27, 'Jakayla Sawayn', '1-746-093-0543x1770', 2, 'North Miguelborough', 'Armenia', '2021-11-23 19:15:49'),
(28, 'Dr. Carlo Rath III', '576-376-5398x44801', 21, 'Port Rebaburgh', 'Brunei Darussalam', '2016-08-05 09:02:47'),
(29, 'Casey Sanford', '1-364-415-0086x1667', 9, 'Barrowsshire', 'Cyprus', '1992-08-25 18:06:58'),
(30, 'Corene Mertz', '1-694-151-4617x5314', 26, 'West Dominichaven', 'Indonesia', '1987-02-03 02:39:42'),
(31, 'Christa Schamberger', '630-997-7861x054', 1, 'West Euna', 'Poland', '2002-07-14 23:41:45'),
(32, 'Nathanael Weissnat', '1-339-508-7947', 27, 'Deckowside', 'Saint Pierre and Miq', '1985-04-23 22:26:37'),
(33, 'Dr. Hank Buckridge II', '915-984-3192x93538', 22, 'Elijahton', 'Somalia', '2017-01-19 04:08:26'),
(34, 'Ladarius Murray', '(725)680-4466', 15, 'Watersbury', 'Ireland', '2005-06-28 21:18:53'),
(35, 'Antonia Wolff', '179-678-2952x45771', 18, 'Monteview', 'Saint Martin', '1993-03-11 17:19:11'),
(36, 'Dr. Krystel Quitzon', '1-442-907-6378x10522', 5, 'Garettbury', 'Switzerland', '1983-12-01 18:56:27'),
(37, 'Floyd Rippin', '688.612.1994x975', 3, 'Tremblayton', 'Montenegro', '1995-05-25 16:37:06'),
(38, 'Timmothy Orn', '1-230-669-2547x22869', 27, 'Marciaport', 'Belarus', '2002-11-23 00:59:09'),
(39, 'Mr. Blake Greenholt', '+49(8)3808821204', 9, 'North Vernicestad', 'Bahrain', '2008-06-16 14:19:22'),
(40, 'Prof. Joey Kunze', '846-202-5824x072', 13, 'Davisberg', 'Burundi', '1997-08-04 09:53:55'),
(41, 'Gisselle Schultz DDS', '+60(5)5799787526', 26, 'North Drewbury', 'Bosnia and Herzegovi', '2020-10-03 01:49:21'),
(42, 'Robin DuBuque', '(941)926-0556', 26, 'New Masonburgh', 'Belize', '1978-03-27 12:33:17'),
(43, 'Gudrun Krajcik', '064-616-0133x5297', 26, 'Heathcoteshire', 'Nigeria', '1988-08-05 08:50:06'),
(44, 'May Bergstrom', '575-522-6664x13219', 28, 'Trantowport', 'Falkland Islands (Ma', '1984-11-06 02:44:03'),
(45, 'Ashley Stiedemann', '629-521-1482x35066', 3, 'West Arch', 'Antigua and Barbuda', '1991-09-05 10:28:39'),
(46, 'Dr. Kirsten Hoeger V', '+13(0)6303376936', 29, 'Paigeberg', 'Oman', '2013-02-04 09:29:08'),
(47, 'Prof. Kailyn Dicki III', '(784)098-5109x7942', 27, 'East Nikolaschester', 'Gambia', '1971-09-01 09:04:05'),
(48, 'Keith Stehr', '(766)018-8897x026', 19, 'New Ahmad', 'Argentina', '1984-04-10 06:48:59'),
(49, 'Rickey Farrell PhD', '1-759-528-7046x37994', 14, 'Yasminview', 'Slovenia', '2015-04-20 09:59:34'),
(50, 'Miss Orpha Jacobson DDS', '(702)142-8278x3751', 18, 'West Jacey', 'Senegal', '1982-02-19 22:42:36'),
(51, 'Clarissa Ward', '1-838-916-8679x96107', 14, 'Ricefurt', 'Austria', '1993-11-06 21:17:00'),
(52, 'Brooks Nikolaus', '1-968-426-2833x9795', 5, 'Pagacmouth', 'Ukraine', '1973-03-23 12:54:03'),
(53, 'Michale Purdy', '+65(3)9014310929', 8, 'New Rosalindafurt', 'Puerto Rico', '2019-02-13 05:13:10'),
(54, 'Ryleigh Grady I', '+96(8)1024241195', 9, 'Hollieland', 'Brazil', '1994-09-29 10:25:42'),
(55, 'Yasmin Bartoletti', '658.127.7817x0632', 18, 'Pietrochester', 'Zambia', '2022-10-22 15:26:50'),
(56, 'Lucius Aufderhar', '(399)637-0498x865', 6, 'Millstown', 'Guyana', '1975-12-05 15:02:16'),
(57, 'Emmie Prosacco', '302.689.6018x506', 23, 'Vaughntown', 'Senegal', '1998-01-07 00:31:16'),
(58, 'Omer Friesen', '(854)676-7196', 2, 'South Eriberto', 'Venezuela', '2003-11-10 07:43:25'),
(59, 'Alfredo Mayer', '253.727.8934x0891', 15, 'North Aileen', 'Mexico', '2017-11-07 10:56:34'),
(60, 'Betsy Walsh', '1-541-470-9191', 11, 'Fisherstad', 'Trinidad and Tobago', '1980-06-23 03:08:28'),
(61, 'Tia Stehr', '828-888-1502', 25, 'North Elbertborough', 'Iran', '2006-11-20 12:20:11'),
(62, 'Zita Wuckert I', '1-782-239-5859', 5, 'Lake Marguerite', 'Saint Helena', '2015-05-24 11:33:26'),
(63, 'Graham Spencer', '829.077.7010x2639', 11, 'Boehmton', 'Guernsey', '2001-09-25 03:40:34'),
(64, 'Reva Blanda', '1-511-618-2747x8041', 10, 'Stromanbury', 'Slovakia (Slovak Rep', '1972-02-12 10:49:41'),
(65, 'Mrs. Grace Haag', '188.840.0226', 13, 'Jamarshire', 'Grenada', '2005-12-06 02:34:55'),
(66, 'Freddie Beahan', '161-656-5232x1811', 16, 'Lilaborough', 'Grenada', '1984-10-13 12:11:56'),
(67, 'Margaret Rodriguez PhD', '+00(4)3070242437', 11, 'Schneidertown', 'Malaysia', '2003-03-29 12:30:49'),
(68, 'Abdul Schumm', '(091)845-6450', 22, 'Goodwinfurt', 'Venezuela', '1991-05-23 09:57:08'),
(69, 'Jamal Wolf', '+17(1)5534701325', 19, 'Christinaside', 'Georgia', '1974-02-07 23:51:40'),
(70, 'Rickie Hyatt', '483-803-2333x517', 9, 'Port Vito', 'Syrian Arab Republic', '1978-12-02 10:33:01'),
(71, 'Meredith Ziemann', '+62(7)4915039037', 22, 'North Lucious', 'Mozambique', '2021-01-11 10:30:21'),
(72, 'Dave Ryan', '358-450-7187', 14, 'West Friedashire', 'Guinea-Bissau', '1995-12-14 04:12:05'),
(73, 'Sienna Weber', '620.977.2182x85500', 17, 'Port Finn', 'Austria', '1990-12-19 14:14:22'),
(74, 'Dr. Alexzander Crona I', '851-086-6310x087', 26, 'Rosannaville', 'Guadeloupe', '1983-05-21 17:27:29'),
(75, 'Nico Keeling', '832.233.9616x8695', 9, 'Port Georgianatown', 'El Salvador', '1975-09-03 05:18:18'),
(76, 'Prof. Clemens Schultz', '653.153.5587x578', 2, 'Lake Roslynberg', 'Greece', '1989-09-14 14:19:48'),
(77, 'Prof. Tristin Fahey Jr.', '324-955-2977x17619', 24, 'West Josianne', 'South Africa', '2004-02-14 14:25:41'),
(78, 'Tomas Satterfield Jr.', '121-813-9912', 9, 'North Augustineland', 'Niue', '2001-10-04 22:21:20'),
(79, 'Hulda Blanda IV', '932-395-5840x276', 13, 'Port Earnestberg', 'Congo', '2008-01-16 15:00:57'),
(80, 'Oran Braun', '134-915-0882', 8, 'North Juneborough', 'American Samoa', '2001-12-31 13:31:20'),
(81, 'Vena Sipes', '1-673-503-0126', 30, 'Boehmbury', 'Ecuador', '2003-01-20 19:06:42'),
(82, 'Norene Walter DVM', '067.141.6254x787', 4, 'Faheyfort', 'Germany', '2019-10-23 07:37:20'),
(83, 'Luther Zulauf', '1-116-240-3169', 4, 'Jasttown', 'Egypt', '1993-02-11 02:38:40'),
(84, 'Jaren Hilll', '904-790-5927x80888', 11, 'Candelarioville', 'Jamaica', '1988-03-09 18:52:59'),
(85, 'Prof. Jordan Corkery', '674-864-9052', 10, 'Williamsonchester', 'Spain', '1985-06-26 16:24:39'),
(86, 'Gracie Larson', '307-236-4022', 11, 'Gorczanyview', 'Armenia', '1977-10-11 23:17:44'),
(87, 'Ms. Ayana Frami', '1-800-259-2945x130', 8, 'Lake Lucasland', 'Korea', '2004-05-30 05:43:32'),
(88, 'Tony Bradtke', '294-017-4468', 17, 'Buckridgefort', 'Cyprus', '1972-10-02 05:28:03'),
(89, 'Cleveland Lockman DVM', '(446)788-7804x42429', 22, 'North Charity', 'Yemen', '1977-05-22 14:41:03'),
(90, 'Winona Cummerata', '744-014-7465', 30, 'Lake Carmelotown', 'Norway', '1998-12-09 22:23:19'),
(91, 'Mr. Sheridan Klein V', '1-019-989-2020x64768', 4, 'Lake Christophervill', 'Serbia', '2004-10-12 21:17:39'),
(92, 'Ms. Cynthia Zieme', '+32(2)3556459389', 5, 'Balistrerichester', 'Jordan', '1981-05-12 14:41:35'),
(93, 'Beaulah Stokes', '+59(3)1185911756', 10, 'Vernonbury', 'Belize', '2023-03-24 18:38:09'),
(94, 'Amely West', '(200)191-1834', 17, 'Port Elsieshire', 'Puerto Rico', '1983-11-11 11:12:43'),
(95, 'Rosalee Jacobs', '1-547-105-7609', 8, 'West Lorenzville', 'Venezuela', '1989-02-28 12:52:19'),
(96, 'Delpha Dickinson', '073-357-1247', 3, 'Lake Edwinashire', 'Svalbard & Jan Mayen', '1995-08-18 20:43:20'),
(97, 'Mr. Everardo Mante', '752-549-8910', 7, 'South Leatha', 'Guadeloupe', '2004-08-29 18:14:05'),
(98, 'Dr. Florencio Robel', '1-286-948-1390x30203', 19, 'South Kaileehaven', 'Iraq', '2004-05-26 01:58:21'),
(99, 'Cameron Hirthe', '+68(8)8417555613', 22, 'Rohanside', 'Taiwan', '2009-11-13 00:01:45'),
(100, 'Giovanny Gleason', '1-119-036-2192x85056', 13, 'Port Maevemouth', 'United States of Ame', '1978-02-04 08:02:48'),
(101, 'Brandy Kulas I', '(809)928-2751x2513', 13, 'North Hesterland', 'Spain', '2008-08-18 08:58:54'),
(102, 'Keshawn Heller', '005-338-8925x34386', 2, 'Bryanaberg', 'Botswana', '2000-05-01 17:24:08'),
(103, 'Tyrell Rempel', '267.599.3046x958', 10, 'Berryport', 'Palau', '2015-08-17 16:57:58'),
(104, 'Amya Rodriguez', '160-404-2053', 1, 'Joshuaborough', 'Bhutan', '2017-12-18 05:14:55'),
(105, 'Prof. Alfred Russel IV', '718-627-6463', 27, 'Gastonmouth', 'New Zealand', '2019-06-13 03:56:18'),
(106, 'Kennith Schowalter', '895-614-5872x019', 4, 'Ebertbury', 'Uruguay', '1995-04-02 17:52:14'),
(107, 'Kallie Wintheiser MD', '033.375.9392', 22, 'Ornberg', 'Lithuania', '1997-06-23 09:43:56'),
(108, 'Nikita Bartoletti', '763.729.9446', 28, 'North Bobbyton', 'Uruguay', '1994-09-27 10:56:08'),
(109, 'Flo Sauer', '+87(3)0255423084', 4, 'Moenside', 'Gabon', '2000-06-23 09:47:23'),
(110, 'Rose Bins', '1-342-259-1573x22402', 10, 'Melisamouth', 'Turks and Caicos Isl', '1998-11-03 09:05:38'),
(111, 'Keaton Harvey', '+16(9)6428258467', 14, 'Lake Hildamouth', 'Qatar', '1983-10-24 17:21:56'),
(112, 'Ima Bogisich', '1-553-422-5375x96756', 8, 'Vanessashire', 'Myanmar', '1989-02-24 03:48:38'),
(113, 'Eugene Berge', '+96(6)7806570275', 5, 'Gunnartown', 'Turkey', '1982-01-13 10:11:14'),
(114, 'Kirstin Grimes', '(549)115-6678x607', 18, 'Lebsackfurt', 'Tajikistan', '2017-03-03 18:35:30'),
(115, 'Dr. Ambrose Hyatt V', '1-731-993-8286x018', 3, 'Lake Courtney', 'Sierra Leone', '1972-09-25 04:44:22'),
(116, 'Dr. Luella Sawayn MD', '1-250-111-7458x82000', 15, 'Port Alexandrineberg', 'Zimbabwe', '1970-04-18 06:45:46'),
(117, 'Jaquelin Schroeder', '1-100-840-5582x05872', 5, 'Lake Wallaceton', 'Canada', '1999-12-11 03:15:42'),
(118, 'Olaf Dach', '1-148-487-6901', 16, 'Jamalberg', 'American Samoa', '1973-07-19 03:51:24'),
(119, 'Prof. Davonte Yundt I', '1-832-565-5674', 6, 'East Itzel', 'Timor-Leste', '2003-12-05 15:05:55'),
(120, 'Frances Spinka', '932-210-0903x195', 6, 'East Ebba', 'Cocos (Keeling) Isla', '1972-03-23 07:15:43'),
(121, 'Peter', 'Novák', 27, 'Prague', 'CZ', '2023-05-21 00:35:54');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`white_id`) REFERENCES `players` (`id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`black_id`) REFERENCES `players` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
