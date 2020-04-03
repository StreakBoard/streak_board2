-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 02:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getstreak`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invitation_token` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2020_01_28_081539_add_columns_to_users', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(7, '2014_10_12_100000_create_password_resets_table', 2),
(8, '2019_08_19_000000_create_failed_jobs_table', 2),
(9, '2020_01_25_091346_create_tasks_table', 2),
(10, '2020_01_28_104747_create_teams_table', 3),
(11, '2020_01_28_105717_add_columns_to_users', 4),
(12, '2020_01_28_123300_add_columns_to_users', 5),
(13, '2020_01_28_123430_add_columns_to_tasks', 5),
(14, '2020_01_28_131257_create_team_members_table', 6),
(15, '2016_03_29_140408_create_invitation_user_table', 7),
(16, '2020_01_29_095953_create_invitations_table', 8),
(17, '2020_01_31_093235_add_columns_to_team_members', 8),
(18, '2020_01_31_114102_add_columns_to_team_members', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `task_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `user_id`, `team_id`, `created_at`, `updated_at`, `task_status`) VALUES
(38, 'task by zulqarnain', 16, 23, '2020-02-04 03:17:46', '2020-02-04 03:17:46', 1),
(41, 'RT1', 18, 23, '2020-02-04 04:11:45', '2020-02-04 04:11:45', 0),
(42, 'RT2', 18, 23, '2020-02-04 04:11:58', '2020-02-04 04:11:58', 0),
(44, 'RT3', 18, 23, '2020-02-04 04:12:31', '2020-02-04 04:12:31', 1),
(46, 'RT4', 18, 23, '2020-02-04 04:12:44', '2020-02-04 04:12:44', 1),
(47, 'RT5', 18, 23, '2020-02-04 04:12:59', '2020-02-04 04:12:59', 0),
(48, 'ZT1', 16, 23, '2020-02-04 04:14:19', '2020-02-04 04:14:19', 1),
(49, 'ZT1', 16, 23, '2020-02-04 04:14:19', '2020-02-04 04:14:19', 1),
(50, 'ZT2', 16, 23, '2020-02-04 04:14:30', '2020-02-04 04:14:30', 1),
(52, 'ZT3', 16, 23, '2020-02-04 04:14:35', '2020-02-04 04:14:35', 1),
(53, 'ZT2', 16, 23, '2020-02-04 04:14:38', '2020-02-04 04:14:38', 1),
(54, 'ZT4', 16, 23, '2020-02-04 04:14:41', '2020-02-04 04:14:41', 1),
(55, '123', 16, 6, '2020-02-04 08:19:29', '2020-02-04 08:19:29', 0),
(56, '123', 16, 16, '2020-02-04 08:19:41', '2020-02-04 08:19:41', 0),
(57, '10', 16, 16, '2020-02-04 08:19:58', '2020-02-04 08:19:58', 0),
(58, '123', 16, 18, '2020-02-04 08:20:19', '2020-02-04 08:20:19', 0),
(59, 'zulqarnain Qasim', 16, 16, '2020-02-04 08:24:56', '2020-02-04 08:24:56', 0),
(60, 'aaa', 16, 16, '2020-02-04 08:31:16', '2020-02-04 08:31:16', 0),
(61, 'aaaa', 16, 18, '2020-02-04 08:33:10', '2020-02-04 08:33:10', 0),
(62, 'aaa', 16, 18, '2020-02-04 08:33:13', '2020-02-04 08:33:13', 0),
(63, 'asxascxas', 16, 10, '2020-02-04 08:33:34', '2020-02-04 08:33:34', 0),
(64, 'asd', 16, 23, '2020-02-04 08:36:37', '2020-02-04 08:36:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'baba ji', 2, '2020-01-29 02:25:04', '2020-01-29 02:25:04'),
(2, 'ZULQARNAIN', 3, '2020-01-29 02:29:03', '2020-01-29 02:29:03'),
(3, 'ZULQARNAIN', 4, '2020-01-29 02:32:55', '2020-01-29 02:32:55'),
(4, 'ecer', 5, '2020-01-29 02:33:45', '2020-01-29 02:33:45'),
(5, 'ecer', 6, '2020-01-29 02:43:32', '2020-01-29 02:43:32'),
(6, 'qqqqqq', 12, '2020-01-29 02:55:38', '2020-01-29 02:55:38'),
(7, 'qqqqqq', 13, '2020-01-29 02:59:42', '2020-01-29 02:59:42'),
(8, 'qqqqqq', 14, '2020-01-29 03:00:28', '2020-01-29 03:00:28'),
(9, 'qqqqqq', 15, '2020-01-29 03:00:48', '2020-01-29 03:00:48'),
(10, 'Team by zulqarnain', 16, '2020-01-29 03:02:32', '2020-01-29 03:02:32'),
(11, 'WP Coders', 17, '2020-01-29 09:35:14', '2020-01-29 09:35:14'),
(18, '2nd Team by zulqarnain', 16, '2020-01-30 07:03:55', '2020-01-30 07:03:55'),
(19, '3rd team created by Zulqarnain', 16, '2020-01-30 07:04:04', '2020-01-30 07:04:04'),
(20, '4th team created by zulqarnain', 16, '2020-01-30 07:04:08', '2020-01-30 07:04:08'),
(21, '4th team', 16, '2020-01-30 07:06:13', '2020-01-30 07:06:13'),
(22, '5th team', 16, '2020-01-30 07:07:03', '2020-01-30 07:07:03'),
(23, 'Roshan Team', 18, '2020-01-31 04:26:43', '2020-01-31 04:26:43'),
(24, 'team check', 19, '2020-02-01 02:15:46', '2020-02-01 02:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `team_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 10, 2, '2020-01-29 02:25:04', '2020-01-29 02:25:04'),
(2, 10, 3, '2020-01-29 02:29:03', '2020-01-29 02:29:03'),
(3, 11, 4, '2020-01-29 02:32:55', '2020-01-29 02:32:55'),
(4, 1, 5, '2020-01-29 02:33:45', '2020-01-29 02:33:45'),
(5, 1, 6, '2020-01-29 02:43:32', '2020-01-29 02:43:32'),
(6, 13, 12, '2020-01-29 02:55:38', '2020-01-29 02:55:38'),
(7, 13, 13, '2020-01-29 02:59:42', '2020-01-29 02:59:42'),
(8, 13, 14, '2020-01-29 03:00:28', '2020-01-29 03:00:28'),
(9, 13, 15, '2020-01-29 03:00:48', '2020-01-29 03:00:48'),
(10, 10, 16, '2020-01-29 03:02:32', '2020-01-29 03:02:32'),
(11, 22, 16, '2020-01-29 09:35:14', '2020-01-29 09:35:14'),
(15, 18, 16, '2020-01-30 07:03:55', '2020-01-30 07:03:55'),
(16, 19, 16, '2020-01-30 07:04:04', '2020-01-30 07:04:04'),
(17, 20, 16, '2020-01-30 07:04:08', '2020-01-30 07:04:08'),
(18, 21, 16, '2020-01-30 07:06:14', '2020-01-30 07:06:14'),
(19, 23, 16, '2020-01-30 07:07:03', '2020-01-30 07:07:03'),
(20, 23, 18, '2020-01-31 04:26:43', '2020-01-31 04:26:43'),
(21, 24, 19, '2020-02-01 02:15:46', '2020-02-01 02:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `team_name`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'ZULQARNAIN', 'Salman', 'd@gmail.com', NULL, '$2y$10$xjbvg5.zWgFFDzgyIyDWge.LhW3migCq4EajTTHQaJaMmT9ON/YQG', NULL, '2020-01-29 02:23:26', '2020-01-29 02:23:26', '0'),
(2, 'baba ji', 'Obaid Chawla', 'Qd@gmail.com', NULL, '$2y$10$B5rQp.GE5DEo7AqMTwqbNueTg9XJWTBsEnmQ5y/KwHIBztPE3ak/C', NULL, '2020-01-29 02:25:04', '2020-01-29 02:25:04', '0'),
(3, 'Team by zulqarnain', 'Salman ', 'abc@gmail.com', NULL, '$2y$10$oME/8/U1SE8A/4fsxY56O.elm7c8saFsXrhp0zRfbJLoqRYlkZ1sK', NULL, '2020-01-29 02:29:02', '2020-01-29 02:29:02', '0'),
(4, 'ZULQARNAIN', 'ZULQARNAIN', 'abeddc@gmail.com', NULL, '$2y$10$vATRJKIVmhd/uDTERziLxOnQhz9PqF8bC03k4WB5FdlD0mF7Ej/bK', NULL, '2020-01-29 02:32:55', '2020-01-29 02:32:55', '0'),
(5, 'ecer', 'cc', 'usmaeeeeeeeeeen@gmail.com', NULL, '$2y$10$STHZJ0SlnCYvJ2II4eevq.H.DFnSJUWCQ/LvpOXZ8CBEBrqFTnwDG', NULL, '2020-01-29 02:33:45', '2020-01-29 02:33:45', '0'),
(6, 'ecer', 'cc', 'usmaeeeeweeeeeen@gmail.com', NULL, '$2y$10$kVKyAGlpBKpdtvFImNAXkOQDNboIsAsHG6u8vqhns2OCgNKI2AnWi', NULL, '2020-01-29 02:43:32', '2020-01-29 02:43:32', '0'),
(7, 'ecer', 'cc', 'usmasdeeeeweeeeeen@gmail.com', NULL, '$2y$10$CuudETuAwzvEOyLCL3iVR.dLsvJkltVjCWKAQcEdMjC4BRFpAJQsi', NULL, '2020-01-29 02:47:27', '2020-01-29 02:47:27', '0'),
(8, 'ecer', 'cc', 'usmasdeeaeeweeeeeen@gmail.com', NULL, '$2y$10$CSyeBD0gy.z/qDBd.vG2COBzO0pcZrw6rRC8KZK3KKOGI66pOKJn2', NULL, '2020-01-29 02:48:24', '2020-01-29 02:48:24', '0'),
(9, 'ecer', 'cc', 'usmasdeeaeeweeeeeen@gmail.coma', NULL, '$2y$10$jtKnpzsCSrl.mncQGplJieVoCy2DxcskyYwrE414cRyTcdIZCWY2.', NULL, '2020-01-29 02:49:15', '2020-01-29 02:49:15', '0'),
(10, 'ecer', 'cc', 'usmasdeeaeeweeeeeen@gmasddil.coma', NULL, '$2y$10$U6UTVeHaGAlPAt/vtViix.qdUaZx5X1F9C5qVoYRhFeLX0947wb16', NULL, '2020-01-29 02:53:16', '2020-01-29 02:53:16', '0'),
(11, 'ecer', 'cc', 'usmasdeqweaeeweeeeeen@gmasddil.coma', NULL, '$2y$10$0MyUp8/p9HC4T5a1GB42cuCSQ9157l6LAuwI73WN6DfTcQ9agz7z6', NULL, '2020-01-29 02:53:50', '2020-01-29 02:53:50', '0'),
(12, 'qqqqqq', 'qqqqqq', 'usmaaaaaaaaan@gmail.com', NULL, '$2y$10$I6ixa9krN6ohpTM01EQYBuINge7nXhrgsGvxeBVIKQV2Dx8pq9yF.', NULL, '2020-01-29 02:55:38', '2020-01-29 02:55:38', '0'),
(13, 'qqqqqq', 'qqqqqq', 'usmaaaaaaaswwwaan@gmail.com', NULL, '$2y$10$LvRUQA0j9RnQC2PxTGnOousporX03SzoM3AjHOtM0TimHRzTjXmMm', NULL, '2020-01-29 02:59:42', '2020-01-29 02:59:42', '0'),
(14, 'qqqqqq', 'qqqqqq', 'jjjjj@gmail.com', NULL, '$2y$10$D2fPhIZaSRY6uP0IF00FR.LZnWIXsTI6CkUeS5WdoOKG8XBKPBa6i', NULL, '2020-01-29 03:00:28', '2020-01-29 03:00:28', '0'),
(15, 'qqqqqq', 'qqqqqq', 'jjjjqqqj@gmail.comtrt', NULL, '$2y$10$mFShYhiP57.j1Jit78UWv.YY/UWQeLv5Cl./bjCgQGV/FvInO/Qhm', NULL, '2020-01-29 03:00:47', '2020-01-29 03:00:47', '0'),
(16, 'Team by zulqarnain', 'Zulqarnain Qasim', 'zulqi99@gmail.com', NULL, '$2y$10$ZOfT.6FIdPBWtN/nR3CuOO7nCAxlQoMvesrm1BJdoHraPQ5zkDbgu', NULL, '2020-01-29 03:02:32', '2020-01-29 03:02:32', '0'),
(17, 'Team by zulqarnain', 'Muhammad Furqan', 'johnny99@yopmail.com', NULL, '$2y$10$OMaaNK7//mrXMYOMZC1o3u7PQDRk5BkQcx5.IFOKpYHWdm7p40bna', NULL, '2020-01-29 09:35:14', '2020-01-29 09:35:14', '0'),
(18, 'Roshan Team', 'Roshan', 'roshan@gmail.com', NULL, '$2y$10$FzOKOlSF0bKl5srvwvpvJ.1X4erKha.cPlXSbWHTyzVgEOZ.ih6bu', NULL, '2020-01-31 04:26:43', '2020-01-31 04:26:43', '0'),
(19, 'team check', 'team check', 'teamcheck@gmail.com', NULL, '$2y$10$KzHUG.XZpOGGgEA/tt/Vge7HKoHD49WQIve4Lx2PLgroLdHrKrC.O', NULL, '2020-02-01 02:15:45', '2020-02-01 02:15:45', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_invitations`
--

CREATE TABLE `user_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','successful','canceled','expired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `valid_till` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invitations_email_unique` (`email`),
  ADD UNIQUE KEY `invitations_invitation_token_unique` (`invitation_token`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_invitations`
--
ALTER TABLE `user_invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_invitations_code_index` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_invitations`
--
ALTER TABLE `user_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
