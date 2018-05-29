-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 06:27 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byhanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `time` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `message`, `time`) VALUES
(1, 3, 'ádsadsad', 1526395304),
(2, 3, 'ádasd', 1526395419),
(3, 3, 'adasdsad', 1526401171),
(4, 3, 'SDASD', 1526533501),
(5, 3, 'SADSAD', 1526533503),
(6, 3, 'SADSAD', 1526533504),
(7, 3, 'ÁDSAD', 1526533506),
(8, 3, 'SADSAD', 1526533507),
(9, 3, 'SADSAD', 1526533508),
(10, 3, 'ÁDSAD', 1526533509),
(11, 3, 'SADSAD', 1526533510),
(12, 3, 'SADSAD', 1526533511),
(13, 3, 'adsdsfddfdddddddfsdfsdfdsfdsfsdfff', 1526540182),
(14, 3, 'dsfds', 1526540184),
(15, 3, 'df', 1526540186),
(16, 3, 'ddfd', 1526540187),
(17, 3, 'ddddddddf', 1526540188),
(18, 3, 'fffffffffd', 1526540189),
(19, 3, 'dddddddddddf', 1526540190),
(20, 3, 'dddddddddddd', 1526540192),
(21, 3, 'fffffffffffff', 1526540193),
(22, 3, 'ddfd', 1526540194),
(23, 3, 'dssdf', 1526540196),
(24, 3, 'f', 1526540196),
(25, 3, 'fsdfsdf', 1526549135),
(26, 3, 'sdfsdf', 1526549137),
(27, 3, 'sdfsdfsd', 1526549139),
(28, 3, 'adssadsad', 1526830635),
(29, 3, 'sadsad', 1526830636),
(30, 3, 'sadsadsa', 1526830637),
(31, 3, 'sadsad', 1526830638),
(32, 3, 'sadsadsa', 1526830640),
(33, 3, 'sadsad', 1526830641),
(34, 3, 'sadsad', 1526830643),
(35, 3, 'sadsad', 1526830643),
(36, 3, 'sadsadsa', 1526830645),
(37, 3, 'sadsadsa', 1526830645),
(38, 3, 'hgjg', 1526832728),
(39, 3, 'hgjg', 1526832728),
(40, 3, 'hghhgghh', 1526832739),
(41, 3, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1526832747),
(42, 3, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1526832747),
(43, 3, 'sadsadasdsad', 1526832964),
(44, 3, 'ádasdasdasdasdas', 1526832967),
(45, 3, 'ádasdasdasd', 1526832971),
(46, 3, 'sadsadasdasdasdas', 1526832975),
(47, 3, 'sadasdasdasd', 1526832978),
(48, 3, 'jghjgjhghjg', 1526837417),
(49, 3, 'sdfdsgdsg', 1526837421),
(50, 3, 'fdsfsdfsd', 1526837423),
(51, 3, 'dsfsdfsdf', 1526837425),
(52, 3, 'dsfsdfsdfsfdsaas', 1526837429);

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `key` tinytext NOT NULL,
  `val` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`key`, `val`) VALUES
('active', '1'),
('admp', 'admin'),
('antiflood', 'a:5:{s:4:\"mode\";i:2;s:3:\"day\";i:5;s:5:\"night\";i:15;s:7:\"dayfrom\";i:10;s:5:\"dayto\";i:22;}'),
('clean_time', '1483879975'),
('copyright', 'Phố Nhỏ'),
('email', 'hanh94hut@gmail.com'),
('flsz', '2048'),
('gzip', '1'),
('lng', 'vi'),
('lng_list', 'a:2:{s:2:\"en\";s:7:\"English\";s:2:\"vi\";s:10:\"Việt Nam\";}'),
('meta_desc', 'Diễn đàn thảo luận wap/web'),
('meta_key', 'giải trí, chat chit, chém gió, kết bạn, wapmaster, webmaster, johncms, wapego'),
('mod_forum', '2'),
('mod_lib', '2'),
('mod_lib_comm', '1'),
('mod_reg', '1'),
('offer', '0'),
('theme_wap', 'wap'),
('site_access', '2'),
('chat_last', '1483878800'),
('news', 'a:8:{s:4:\"view\";i:1;s:4:\"size\";i:255;s:8:\"quantity\";i:2;s:4:\"days\";i:0;s:6:\"breaks\";b:1;s:7:\"smileys\";b:1;s:4:\"tags\";b:1;s:3:\"kom\";b:1;}'),
('theme_touch', 'bootstrap'),
('theme_web', 'bootstrap');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `refid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `is_active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `name`, `type`, `refid`, `slug`, `description`, `is_active`) VALUES
(1, 'hanh', 'f', 0, 'hanh', 'hanh', ''),
(2, 'hanh2', 'm', 1, 'smj3', 'hanh3', '0'),
(3, 'hanh2', 'm', 1, 'hanh2', 'hanh2', '0'),
(4, 'hanh', 'f', 0, 'hanh', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `last_seen`
--

CREATE TABLE `last_seen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_seen`
--

INSERT INTO `last_seen` (`id`, `user_id`, `message_id`) VALUES
(1, 1, 3),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `is_read`, `time`) VALUES
(1, 2, 1, 'sadasdas', '1', '2018-05-12 09:30:33'),
(2, 2, 1, 'ádsad', '1', '2018-05-12 09:30:34'),
(3, 2, 1, 'sadasdasd', '1', '2018-05-12 09:33:31'),
(4, 1, 2, 'sadsad', '1', '2018-05-12 09:34:11'),
(5, 1, 2, 'ádasdsad', '1', '2018-05-12 09:53:52'),
(6, 1, 2, 'sadsad', '0', '2018-05-13 08:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `forum_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `name`, `slug`, `forum_id`) VALUES
(1, 'jdfsf', 'dsfdsfds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `rights` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fullname` varchar(50) NOT NULL DEFAULT '',
  `sex` enum('?','m','f') NOT NULL DEFAULT '?',
  `coin` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `gold` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `vip_exp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `dayb` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `monthb` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `yearb` int(4) UNSIGNED NOT NULL DEFAULT '0',
  `about` text NOT NULL,
  `city` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `status` varchar(100) NOT NULL DEFAULT '',
  `datereg` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ip` bigint(11) NOT NULL DEFAULT '0',
  `ip_via_proxy` bigint(11) NOT NULL DEFAULT '0',
  `browser` text NOT NULL,
  `total_on_site` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `failed_login` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `rights`, `fullname`, `sex`, `coin`, `gold`, `vip_exp`, `dayb`, `monthb`, `yearb`, `about`, `city`, `address`, `mobile`, `status`, `datereg`, `ip`, `ip_via_proxy`, `browser`, `total_on_site`, `failed_login`) VALUES
(3, 'admin', 'hanh1997', 'hanh@gmail.com', 9, 'Hanh     Cho  Dha', '', 1555, 2131232, 0, 2, 5, 1997, 'aboutsadadasd', '', 'Hải Dương', '1235', 'tam trangád\'\'\'\'\'111', 0, 0, 0, '', 0, 0),
(13, 'admin2', 'hanh1997', 'hanh2@gmail.com', 9, 'Hạnh Chợ Đọ', 'f', 1555, 2131232, 0, 2, 5, 1997, 'aboutsadadasd', '', 'Hải Dương', '1235', 'tam trangád', 0, 0, 0, '', 0, 0),
(14, 'hanh', 'hanh1997', '', 0, 'hanhhhhh', '?', 0, 0, 0, 0, 0, 0, '', '', '', '', '', 1526840389, 0, 0, 'Chrome', 0, 0),
(15, 'admin66666', 'hanh1997', '', 0, 'ssssssssssssssss', '?', 0, 0, 0, 0, 0, 0, '', '', '', '', '', 1526842572, 0, 0, 'Chrome', 0, 0),
(16, 'hanh55', 'hanh1997', '', 0, 'nguyen   va   hanh', '?', 0, 0, 0, 0, 0, 0, '', '', '', '', '', 1526999356, 1270, 1270, 'Chrome', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`key`(30));

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_seen`
--
ALTER TABLE `last_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `last_seen`
--
ALTER TABLE `last_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
