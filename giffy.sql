-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2013 at 11:12 AM
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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2721 ;

--
-- Dumping data for table `gifs`
--

INSERT INTO `gifs` (`id`, `url`, `thumb`, `created_at`, `updated_at`) VALUES
(2620, 'http://i.imgur.com/lPeIEti.gif', '/thumbs/lPeIEti.gif', '2013-11-11 05:17:15', '2013-11-11 05:17:15'),
(2621, 'http://i.imgur.com/Et6nhGo.gif', '/thumbs/Et6nhGo.gif', '2013-11-11 05:17:18', '2013-11-11 05:17:18'),
(2622, 'http://i.imgur.com/wAuwF.gif', '/thumbs/wAuwF.gif', '2013-11-11 05:17:20', '2013-11-11 05:17:20'),
(2623, 'http://i.imgur.com/B2B8nrl.gif', '/thumbs/B2B8nrl.gif', '2013-11-11 05:17:23', '2013-11-11 05:17:23'),
(2624, 'http://i.imgur.com/GHVtpG6.gif', '/thumbs/GHVtpG6.gif', '2013-11-11 05:17:25', '2013-11-11 05:17:25'),
(2625, 'http://i.imgur.com/02Eq84q.gif', '/thumbs/02Eq84q.gif', '2013-11-11 05:17:35', '2013-11-11 05:17:35'),
(2626, 'http://i.imgur.com/6bP8Lr0.gif', '/thumbs/6bP8Lr0.gif', '2013-11-11 05:17:36', '2013-11-11 05:17:36'),
(2627, 'http://i.imgur.com/agOSvFS.gif', '/thumbs/agOSvFS.gif', '2013-11-11 05:17:37', '2013-11-11 05:17:37'),
(2628, 'http://i.imgur.com/UdU5UwY.gif', '/thumbs/UdU5UwY.gif', '2013-11-11 05:17:44', '2013-11-11 05:17:44'),
(2629, 'http://i.imgur.com/UjJHsxz.gif', '/thumbs/UjJHsxz.gif', '2013-11-11 05:17:46', '2013-11-11 05:17:46'),
(2630, 'http://i.imgur.com/EKdNcV0.gif', '/thumbs/EKdNcV0.gif', '2013-11-11 05:17:51', '2013-11-11 05:17:51'),
(2631, 'http://i.imgur.com/HZYyxCX.gif', '/thumbs/HZYyxCX.gif', '2013-11-11 05:17:52', '2013-11-11 05:17:52'),
(2632, 'http://i.imgur.com/vsuaR3x.gif', '/thumbs/vsuaR3x.gif', '2013-11-11 05:17:58', '2013-11-11 05:17:58'),
(2633, 'http://i.imgur.com/CxJCp.gif', '/thumbs/CxJCp.gif', '2013-11-11 05:18:02', '2013-11-11 05:18:02'),
(2634, 'http://i.imgur.com/191IWVU.gif', '/thumbs/191IWVU.gif', '2013-11-11 05:18:05', '2013-11-11 05:18:05'),
(2635, 'http://i.imgur.com/6K5MtaT.gif', '/thumbs/6K5MtaT.gif', '2013-11-11 05:18:07', '2013-11-11 05:18:07'),
(2636, 'http://i.imgur.com/LhfWuCi.gif', '/thumbs/LhfWuCi.gif', '2013-11-11 05:18:12', '2013-11-11 05:18:12'),
(2637, 'http://i.imgur.com/NW9VlRN.gif', '/thumbs/NW9VlRN.gif', '2013-11-11 05:18:16', '2013-11-11 05:18:16'),
(2638, 'http://i.imgur.com/W7cGJNj.gif', '/thumbs/W7cGJNj.gif', '2013-11-11 05:18:18', '2013-11-11 05:18:18'),
(2639, 'http://i.imgur.com/vjbLQFB.gif', '/thumbs/vjbLQFB.gif', '2013-11-11 05:18:23', '2013-11-11 05:18:23'),
(2640, 'http://i.imgur.com/IJEPzoR.gif', '/thumbs/IJEPzoR.gif', '2013-11-11 05:18:23', '2013-11-11 05:18:23'),
(2641, 'http://i.imgur.com/s4sNQZ7.gif', '/thumbs/s4sNQZ7.gif', '2013-11-11 05:18:25', '2013-11-11 05:18:25'),
(2642, 'http://i.imgur.com/EYU481A.gif', '/thumbs/EYU481A.gif', '2013-11-11 05:18:28', '2013-11-11 05:18:28'),
(2643, 'http://i.imgur.com/Nm5AisU.gif', '/thumbs/Nm5AisU.gif', '2013-11-11 05:18:29', '2013-11-11 05:18:29'),
(2644, 'http://i.imgur.com/r7F1RQP.gif', '/thumbs/r7F1RQP.gif', '2013-11-11 05:18:31', '2013-11-11 05:18:31'),
(2645, 'http://i.imgur.com/EdHSexx.gif', '/thumbs/EdHSexx.gif', '2013-11-11 05:18:32', '2013-11-11 05:18:32'),
(2646, 'http://i.imgur.com/E7joytj.gif', '/thumbs/E7joytj.gif', '2013-11-11 05:18:34', '2013-11-11 05:18:34'),
(2647, 'http://i.imgur.com/HmyJlp4.gif', '/thumbs/HmyJlp4.gif', '2013-11-11 05:18:39', '2013-11-11 05:18:39'),
(2648, 'http://i.imgur.com/sk3vyhp.gif', '/thumbs/sk3vyhp.gif', '2013-11-11 05:18:41', '2013-11-11 05:18:41'),
(2649, 'http://i.imgur.com/WSQLhcE.gif', '/thumbs/WSQLhcE.gif', '2013-11-11 05:18:43', '2013-11-11 05:18:43'),
(2650, 'http://i.imgur.com/2DsfXvf.gif', '/thumbs/2DsfXvf.gif', '2013-11-11 05:18:46', '2013-11-11 05:18:46'),
(2651, 'http://i.imgur.com/vrXKq06.gif', '/thumbs/vrXKq06.gif', '2013-11-11 05:18:48', '2013-11-11 05:18:48'),
(2652, 'http://i.imgur.com/1yVIoxB.gif', '/thumbs/1yVIoxB.gif', '2013-11-11 05:18:49', '2013-11-11 05:18:49'),
(2653, 'http://i.imgur.com/bkwKq.gif', '/thumbs/bkwKq.gif', '2013-11-11 05:18:51', '2013-11-11 05:18:51'),
(2654, 'http://i.imgur.com/Lbz3tkr.gif', '/thumbs/Lbz3tkr.gif', '2013-11-11 05:18:54', '2013-11-11 05:18:54'),
(2655, 'http://i.imgur.com/XFMpArY.gif', '/thumbs/XFMpArY.gif', '2013-11-11 05:18:58', '2013-11-11 05:18:58'),
(2656, 'http://i.imgur.com/1fcEM0p.gif', '/thumbs/1fcEM0p.gif', '2013-11-11 05:19:03', '2013-11-11 05:19:03'),
(2657, 'http://i.imgur.com/xoXNkU2.gif', '/thumbs/xoXNkU2.gif', '2013-11-11 05:19:04', '2013-11-11 05:19:04'),
(2658, 'http://i.imgur.com/kYUyLNQ.gif', '/thumbs/kYUyLNQ.gif', '2013-11-11 05:19:05', '2013-11-11 05:19:05'),
(2660, 'http://i.imgur.com/Ee5DReB.gif', '/thumbs/Ee5DReB.gif', '2013-11-11 23:28:18', '2013-11-11 23:28:18'),
(2662, 'http://i.imgur.com/zEEsLlz.gif', '/thumbs/zEEsLlz.gif', '2013-11-12 09:10:54', '2013-11-12 09:10:54'),
(2663, 'http://i.imgur.com/mRiQnsu.gif', '/thumbs/mRiQnsu.gif', '2013-11-12 09:10:56', '2013-11-12 09:10:56'),
(2664, 'http://i.imgur.com/hkpFLa7.gif', '/thumbs/hkpFLa7.gif', '2013-11-12 09:10:57', '2013-11-12 09:10:57'),
(2665, 'http://i.imgur.com/ubvi7Bz.gif', '/thumbs/ubvi7Bz.gif', '2013-11-12 09:10:58', '2013-11-12 09:10:58'),
(2666, 'http://i.imgur.com/CZmW7u3.gif', '/thumbs/CZmW7u3.gif', '2013-11-12 09:10:59', '2013-11-12 09:10:59'),
(2667, 'http://i.imgur.com/0tIW1eQ.gif', '/thumbs/0tIW1eQ.gif', '2013-11-12 09:11:01', '2013-11-12 09:11:01'),
(2668, 'http://i.imgur.com/tkAhpX3.gif', '/thumbs/tkAhpX3.gif', '2013-11-12 09:11:05', '2013-11-12 09:11:05'),
(2669, 'http://i.imgur.com/1ANMIhh.gif', '/thumbs/1ANMIhh.gif', '2013-11-12 09:11:07', '2013-11-12 09:11:07'),
(2670, 'http://i.imgur.com/i9fPA.gif', '/thumbs/i9fPA.gif', '2013-11-12 09:11:08', '2013-11-12 09:11:08'),
(2671, 'http://i.imgur.com/gHbBAVJ.gif', '/thumbs/gHbBAVJ.gif', '2013-11-12 09:11:09', '2013-11-12 09:11:09'),
(2672, 'http://i.imgur.com/TshSXOQ.gif', '/thumbs/TshSXOQ.gif', '2013-11-12 09:11:10', '2013-11-12 09:11:10'),
(2673, 'http://i.imgur.com/6v3Q6AQ.gif', '/thumbs/6v3Q6AQ.gif', '2013-11-12 09:11:10', '2013-11-12 09:11:10'),
(2674, 'http://i.imgur.com/bmNROS6.gif', '/thumbs/bmNROS6.gif', '2013-11-12 09:11:12', '2013-11-12 09:11:12'),
(2675, 'http://i.imgur.com/KVrJ9VF.gif', '/thumbs/KVrJ9VF.gif', '2013-11-12 09:11:13', '2013-11-12 09:11:13'),
(2676, 'http://i.imgur.com/674UMzb.gif', '/thumbs/674UMzb.gif', '2013-11-12 09:11:15', '2013-11-12 09:11:15'),
(2677, 'http://i.imgur.com/MbaVe5p.gif', '/thumbs/MbaVe5p.gif', '2013-11-12 09:11:20', '2013-11-12 09:11:20'),
(2678, 'http://i.imgur.com/PANOJaU.gif', '/thumbs/PANOJaU.gif', '2013-11-12 09:11:24', '2013-11-12 09:11:24'),
(2679, 'http://i.imgur.com/jdqtEHs.gif', '/thumbs/jdqtEHs.gif', '2013-11-12 09:11:25', '2013-11-12 09:11:25'),
(2680, 'http://i.imgur.com/Dz3nk.gif', '/thumbs/Dz3nk.gif', '2013-11-12 09:17:39', '2013-11-12 09:17:39'),
(2681, 'http://i.imgur.com/k6sAKqj.gif', '/thumbs/k6sAKqj.gif', '2013-11-12 09:18:31', '2013-11-12 09:18:31'),
(2682, 'http://i.imgur.com/6uFgNaO.gif', '/thumbs/6uFgNaO.gif', '2013-11-12 09:18:35', '2013-11-12 09:18:35'),
(2683, 'http://i.imgur.com/LXkZUhv.gif', '/thumbs/LXkZUhv.gif', '2013-11-12 09:19:30', '2013-11-12 09:19:30'),
(2684, 'http://i.imgur.com/QCukyT3.gif', '/thumbs/QCukyT3.gif', '2013-11-12 09:19:33', '2013-11-12 09:19:33'),
(2685, 'http://i.imgur.com/igWznGs.gif', '/thumbs/igWznGs.gif', '2013-11-12 09:19:36', '2013-11-12 09:19:36'),
(2686, 'http://i.imgur.com/F4kmVBI.gif', '/thumbs/F4kmVBI.gif', '2013-11-12 09:19:39', '2013-11-12 09:19:39'),
(2687, 'http://i.imgur.com/sWZ0Btf.gif', '/thumbs/sWZ0Btf.gif', '2013-11-12 09:19:44', '2013-11-12 09:19:44'),
(2688, 'http://i.imgur.com/u6N2PkZ.gif', '/thumbs/u6N2PkZ.gif', '2013-11-12 09:19:47', '2013-11-12 09:19:47'),
(2689, 'http://i.imgur.com/A3jc6hx.gif', '/thumbs/A3jc6hx.gif', '2013-11-12 09:19:50', '2013-11-12 09:19:50'),
(2690, 'http://i.imgur.com/g28E0.gif', '/thumbs/g28E0.gif', '2013-11-12 09:19:53', '2013-11-12 09:19:53'),
(2691, 'http://i.imgur.com/NL9iDRX.gif', '/thumbs/NL9iDRX.gif', '2013-11-12 09:24:48', '2013-11-12 09:24:48'),
(2692, 'http://i.imgur.com/KDlX9oM.gif', '/thumbs/KDlX9oM.gif', '2013-11-12 21:36:56', '2013-11-12 21:36:56'),
(2693, 'http://i.imgur.com/w28wE2Z.gif', '/thumbs/w28wE2Z.gif', '2013-11-12 21:38:25', '2013-11-12 21:38:25'),
(2694, 'http://i.imgur.com/YtQPTnw.gif', '/thumbs/YtQPTnw.gif', '2013-11-12 21:49:01', '2013-11-12 21:49:01'),
(2695, 'http://i.imgur.com/xd91Y.gif', '/thumbs/xd91Y.gif', '2013-11-12 21:49:44', '2013-11-12 21:49:44'),
(2696, 'http://i.imgur.com/ceJGE8Y.gif', '/thumbs/ceJGE8Y.gif', '2013-11-12 21:50:17', '2013-11-12 21:50:17'),
(2697, 'http://i.imgur.com/md3SWrg.gif', '/thumbs/md3SWrg.gif', '2013-11-12 21:50:23', '2013-11-12 21:50:23'),
(2698, 'http://i.imgur.com/v5W8Wo1.gif', '/thumbs/v5W8Wo1.gif', '2013-11-12 21:50:30', '2013-11-12 21:50:30'),
(2699, 'http://i.imgur.com/CQmbYQi.gif', '/thumbs/CQmbYQi.gif', '2013-11-12 21:50:46', '2013-11-12 21:50:46'),
(2700, 'http://i.imgur.com/psu515W.gif', '/thumbs/psu515W.gif', '2013-11-12 21:51:51', '2013-11-12 21:51:51'),
(2701, 'http://i.imgur.com/M2Xbv4T.gif', '/thumbs/M2Xbv4T.gif', '2013-11-12 21:52:15', '2013-11-12 21:52:15'),
(2702, 'http://i.imgur.com/i3xntHX.gif', '/thumbs/i3xntHX.gif', '2013-11-12 21:52:34', '2013-11-12 21:52:34'),
(2703, 'http://i.imgur.com/h0zZe6j.gif', '/thumbs/h0zZe6j.gif', '2013-11-12 21:52:50', '2013-11-12 21:52:50'),
(2704, 'http://i.imgur.com/TYep1.gif', '/thumbs/TYep1.gif', '2013-11-12 21:53:18', '2013-11-12 21:53:18'),
(2705, 'http://i.imgur.com/I0sLFiX.gif', '/thumbs/I0sLFiX.gif', '2013-11-12 21:54:45', '2013-11-12 21:54:45'),
(2706, 'http://i.imgur.com/4x5cHv2.gif', '/thumbs/4x5cHv2.gif', '2013-11-12 21:55:36', '2013-11-12 21:55:36'),
(2707, 'http://i.imgur.com/jwrZoAl.gif', '/thumbs/jwrZoAl.gif', '2013-11-12 21:56:39', '2013-11-12 21:56:39'),
(2708, 'http://i.imgur.com/UF1gnnE.gif', '/thumbs/UF1gnnE.gif', '2013-11-13 04:59:50', '2013-11-13 04:59:50'),
(2709, 'http://i.imgur.com/iFzwzlE.gif', '/thumbs/iFzwzlE.gif', '2013-11-13 04:59:56', '2013-11-13 04:59:56'),
(2710, 'http://i.imgur.com/DceyprW.gif', '/thumbs/DceyprW.gif', '2013-11-13 04:59:59', '2013-11-13 04:59:59'),
(2711, 'http://i.imgur.com/x1CzPkQ.gif', '/thumbs/x1CzPkQ.gif', '2013-11-13 05:00:01', '2013-11-13 05:00:01'),
(2712, 'http://i.imgur.com/GNCku2R.gif', '/thumbs/GNCku2R.gif', '2013-11-13 05:00:03', '2013-11-13 05:00:03'),
(2713, 'http://i.imgur.com/6rcXjuh.gif', '/thumbs/6rcXjuh.gif', '2013-11-13 05:00:08', '2013-11-13 05:00:08'),
(2714, 'http://i.imgur.com/1QNFl8d.gif', '/thumbs/1QNFl8d.gif', '2013-11-13 05:00:14', '2013-11-13 05:00:14'),
(2715, 'http://i.imgur.com/cqkVYIB.gif', '/thumbs/cqkVYIB.gif', '2013-11-13 05:35:55', '2013-11-13 05:35:55'),
(2716, 'http://i.imgur.com/ORmeoTW.gif', '/thumbs/ORmeoTW.gif', '2013-11-13 06:37:54', '2013-11-13 06:37:54'),
(2717, 'http://i.imgur.com/ojI4Fji.gif', '/thumbs/ojI4Fji.gif', '2013-11-13 06:37:57', '2013-11-13 06:37:57'),
(2718, 'http://i.imgur.com/GZUKvFD.gif', '/thumbs/GZUKvFD.gif', '2013-11-13 16:02:42', '2013-11-13 16:02:42'),
(2719, 'http://i.imgur.com/4smKaiE.gif', '/thumbs/4smKaiE.gif', '2013-11-14 01:30:40', '2013-11-14 01:30:40'),
(2720, 'http://i.imgur.com/27Ej4ta.gif', '/thumbs/27Ej4ta.gif', '2013-11-14 01:34:52', '2013-11-14 01:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `gif_user`
--

CREATE TABLE IF NOT EXISTS `gif_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gif_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `gif_user`
--

INSERT INTO `gif_user` (`id`, `gif_id`, `user_id`, `created_at`, `updated_at`) VALUES
(32, 2716, 1, '2013-11-14 20:51:26', '2013-11-14 20:51:26'),
(34, 2718, 1, '2013-11-14 20:51:34', '2013-11-14 20:51:34'),
(35, 2714, 1, '2013-11-14 20:51:35', '2013-11-14 20:51:35'),
(42, 2719, 1, '2013-11-14 20:52:32', '2013-11-14 20:52:32');

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
('2013_10_23_022607_create_gif_table', 1),
('2013_11_10_204839_create_users_table', 1),
('2013_11_13_192748_create_gif_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'connor', '$2y$08$JwUJSXlgRARjQko6F3lwn.EyIBBHe0jqeJxYqmv0NVdCRPVSD43cm', '2013-11-11 10:51:54', '2013-11-11 10:51:54'),
(2, 'jessie', '$2y$08$CBbFJkxUKczA1qwdR7O4f.uohnYv07dyZVsb4utoQDcsZzi06vgQm', '2013-11-11 10:51:55', '2013-11-11 10:51:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
