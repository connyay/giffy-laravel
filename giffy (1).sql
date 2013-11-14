-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2013 at 08:38 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.6-1ubuntu1.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `giffy`
--

-- --------------------------------------------------------

--
-- Table structure for table `gifs`
--

CREATE TABLE IF NOT EXISTS `gifs` (
  `gif_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`gif_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2662 ;

--
-- Dumping data for table `gifs`
--

INSERT INTO `gifs` (`gif_id`, `url`, `thumb`, `created_at`, `updated_at`) VALUES
(2620, 'http://i.imgur.com/lPeIEti.gif', '/thumbs/lPeIEti.gif', '2013-11-11 00:17:15', '2013-11-11 00:17:15'),
(2621, 'http://i.imgur.com/Et6nhGo.gif', '/thumbs/Et6nhGo.gif', '2013-11-11 00:17:18', '2013-11-11 00:17:18'),
(2622, 'http://i.imgur.com/wAuwF.gif', '/thumbs/wAuwF.gif', '2013-11-11 00:17:20', '2013-11-11 00:17:20'),
(2623, 'http://i.imgur.com/B2B8nrl.gif', '/thumbs/B2B8nrl.gif', '2013-11-11 00:17:23', '2013-11-11 00:17:23'),
(2624, 'http://i.imgur.com/GHVtpG6.gif', '/thumbs/GHVtpG6.gif', '2013-11-11 00:17:25', '2013-11-11 00:17:25'),
(2625, 'http://i.imgur.com/02Eq84q.gif', '/thumbs/02Eq84q.gif', '2013-11-11 00:17:35', '2013-11-11 00:17:35'),
(2626, 'http://i.imgur.com/6bP8Lr0.gif', '/thumbs/6bP8Lr0.gif', '2013-11-11 00:17:36', '2013-11-11 00:17:36'),
(2627, 'http://i.imgur.com/agOSvFS.gif', '/thumbs/agOSvFS.gif', '2013-11-11 00:17:37', '2013-11-11 00:17:37'),
(2628, 'http://i.imgur.com/UdU5UwY.gif', '/thumbs/UdU5UwY.gif', '2013-11-11 00:17:44', '2013-11-11 00:17:44'),
(2629, 'http://i.imgur.com/UjJHsxz.gif', '/thumbs/UjJHsxz.gif', '2013-11-11 00:17:46', '2013-11-11 00:17:46'),
(2630, 'http://i.imgur.com/EKdNcV0.gif', '/thumbs/EKdNcV0.gif', '2013-11-11 00:17:51', '2013-11-11 00:17:51'),
(2631, 'http://i.imgur.com/HZYyxCX.gif', '/thumbs/HZYyxCX.gif', '2013-11-11 00:17:52', '2013-11-11 00:17:52'),
(2632, 'http://i.imgur.com/vsuaR3x.gif', '/thumbs/vsuaR3x.gif', '2013-11-11 00:17:58', '2013-11-11 00:17:58'),
(2633, 'http://i.imgur.com/CxJCp.gif', '/thumbs/CxJCp.gif', '2013-11-11 00:18:02', '2013-11-11 00:18:02'),
(2634, 'http://i.imgur.com/191IWVU.gif', '/thumbs/191IWVU.gif', '2013-11-11 00:18:05', '2013-11-11 00:18:05'),
(2635, 'http://i.imgur.com/6K5MtaT.gif', '/thumbs/6K5MtaT.gif', '2013-11-11 00:18:07', '2013-11-11 00:18:07'),
(2636, 'http://i.imgur.com/LhfWuCi.gif', '/thumbs/LhfWuCi.gif', '2013-11-11 00:18:12', '2013-11-11 00:18:12'),
(2637, 'http://i.imgur.com/NW9VlRN.gif', '/thumbs/NW9VlRN.gif', '2013-11-11 00:18:16', '2013-11-11 00:18:16'),
(2638, 'http://i.imgur.com/W7cGJNj.gif', '/thumbs/W7cGJNj.gif', '2013-11-11 00:18:18', '2013-11-11 00:18:18'),
(2639, 'http://i.imgur.com/vjbLQFB.gif', '/thumbs/vjbLQFB.gif', '2013-11-11 00:18:23', '2013-11-11 00:18:23'),
(2640, 'http://i.imgur.com/IJEPzoR.gif', '/thumbs/IJEPzoR.gif', '2013-11-11 00:18:23', '2013-11-11 00:18:23'),
(2641, 'http://i.imgur.com/s4sNQZ7.gif', '/thumbs/s4sNQZ7.gif', '2013-11-11 00:18:25', '2013-11-11 00:18:25'),
(2642, 'http://i.imgur.com/EYU481A.gif', '/thumbs/EYU481A.gif', '2013-11-11 00:18:28', '2013-11-11 00:18:28'),
(2643, 'http://i.imgur.com/Nm5AisU.gif', '/thumbs/Nm5AisU.gif', '2013-11-11 00:18:29', '2013-11-11 00:18:29'),
(2644, 'http://i.imgur.com/r7F1RQP.gif', '/thumbs/r7F1RQP.gif', '2013-11-11 00:18:31', '2013-11-11 00:18:31'),
(2645, 'http://i.imgur.com/EdHSexx.gif', '/thumbs/EdHSexx.gif', '2013-11-11 00:18:32', '2013-11-11 00:18:32'),
(2646, 'http://i.imgur.com/E7joytj.gif', '/thumbs/E7joytj.gif', '2013-11-11 00:18:34', '2013-11-11 00:18:34'),
(2647, 'http://i.imgur.com/HmyJlp4.gif', '/thumbs/HmyJlp4.gif', '2013-11-11 00:18:39', '2013-11-11 00:18:39'),
(2648, 'http://i.imgur.com/sk3vyhp.gif', '/thumbs/sk3vyhp.gif', '2013-11-11 00:18:41', '2013-11-11 00:18:41'),
(2649, 'http://i.imgur.com/WSQLhcE.gif', '/thumbs/WSQLhcE.gif', '2013-11-11 00:18:43', '2013-11-11 00:18:43'),
(2650, 'http://i.imgur.com/2DsfXvf.gif', '/thumbs/2DsfXvf.gif', '2013-11-11 00:18:46', '2013-11-11 00:18:46'),
(2651, 'http://i.imgur.com/vrXKq06.gif', '/thumbs/vrXKq06.gif', '2013-11-11 00:18:48', '2013-11-11 00:18:48'),
(2652, 'http://i.imgur.com/1yVIoxB.gif', '/thumbs/1yVIoxB.gif', '2013-11-11 00:18:49', '2013-11-11 00:18:49'),
(2653, 'http://i.imgur.com/bkwKq.gif', '/thumbs/bkwKq.gif', '2013-11-11 00:18:51', '2013-11-11 00:18:51'),
(2654, 'http://i.imgur.com/Lbz3tkr.gif', '/thumbs/Lbz3tkr.gif', '2013-11-11 00:18:54', '2013-11-11 00:18:54'),
(2655, 'http://i.imgur.com/XFMpArY.gif', '/thumbs/XFMpArY.gif', '2013-11-11 00:18:58', '2013-11-11 00:18:58'),
(2656, 'http://i.imgur.com/1fcEM0p.gif', '/thumbs/1fcEM0p.gif', '2013-11-11 00:19:03', '2013-11-11 00:19:03'),
(2657, 'http://i.imgur.com/xoXNkU2.gif', '/thumbs/xoXNkU2.gif', '2013-11-11 00:19:04', '2013-11-11 00:19:04'),
(2658, 'http://i.imgur.com/kYUyLNQ.gif', '/thumbs/kYUyLNQ.gif', '2013-11-11 00:19:05', '2013-11-11 00:19:05'),
(2660, 'http://i.imgur.com/Ee5DReB.gif', '/thumbs/Ee5DReB.gif', '2013-11-11 18:28:18', '2013-11-11 18:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2013_10_23_014551_update_users', 2),
('2013_10_23_022607_create_gif_table', 3),
('2013_10_23_081950_create_user_gif_table', 4),
('2013_11_10_204839_create_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userhash` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userhash`, `created_at`, `updated_at`) VALUES
(1, 'connor', '$2y$08$JwUJSXlgRARjQko6F3lwn.EyIBBHe0jqeJxYqmv0NVdCRPVSD43cm', '$2y$08$pnTCO3OEfJMp7ZaWK0qE4Ol75RenBwMnXBFTFdnNdVstaiUCSD0vm', '2013-11-11 01:51:54', '2013-11-11 01:51:54'),
(2, 'jessie', '$2y$08$CBbFJkxUKczA1qwdR7O4f.uohnYv07dyZVsb4utoQDcsZzi06vgQm', '$2y$08$jFWQOkQAf9GpBv/ViilCZ.jv3eF.oJJgcaUWyx.N6uMDkC2xBXWJ.', '2013-11-11 01:51:55', '2013-11-11 01:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_gifs`
--

CREATE TABLE IF NOT EXISTS `user_gifs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gif_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user_gifs`
--

INSERT INTO `user_gifs` (`id`, `gif_id`, `user_id`, `created_at`, `updated_at`) VALUES
(15, 2658, 5, '2013-11-11 00:44:17', '2013-11-11 00:44:17'),
(16, 2657, 5, '2013-11-11 00:45:41', '2013-11-11 00:45:41'),
(17, 2656, 5, '2013-11-11 00:45:50', '2013-11-11 00:45:50'),
(23, 2645, 1, '2013-11-11 18:22:22', '2013-11-11 18:22:22'),
(24, 2657, 1, '2013-11-11 18:25:23', '2013-11-11 18:25:23'),
(25, 2656, 1, '2013-11-11 18:25:26', '2013-11-11 18:25:26'),
(26, 2648, 2, '2013-11-11 18:36:04', '2013-11-11 18:36:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
