-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2019 年 11 月 22 日 07:18
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `web_mid_exam`
--

-- --------------------------------------------------------

--
-- 資料表結構 `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sticker_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `stickers`
--

CREATE TABLE `stickers` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `author` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `price` tinyint(4) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `stickers`
--

INSERT INTO `stickers` (`id`, `title`, `author`, `description`, `price`, `created_at`) VALUES
(1, '自由之翼貼圖特輯 第一彈', 'TT', '最可愛及搞笑的資管系童鞋們，讓我們看看他們在宿營有什麼有趣的模樣吧！', 60, '2019-10-28'),
(2, '自由之翼貼圖特輯 第二彈', 'TINY', '大家最愛的自由之翼小夥伴又來啦！這群認真又不失搞笑的士官長們這次又會帶來什麼可愛的表現呢？', 60, '2019-11-11'),
(3, '資管小棒槌 貼圖特輯', '踢妮', '可愛的士官長第三彈！不用多說自己看ㄅ❤︎', 60, '2019-11-11');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` char(1) NOT NULL,
  `account` varchar(30) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `seat` int(11) DEFAULT NULL,
  `credit` int(11) NOT NULL DEFAULT '0',
  `wish_list` text,
  `purchase_list` text,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `role`, `account`, `name`, `seat`, `credit`, `wish_list`, `purchase_list`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'M', '405401372', '伍庭儀', 22, 500, '[]', '[]', '2019-10-27', '2019-11-22 15:09:31', NULL),
(2, 'M', '405401607', '高子軒', 66, 0, NULL, '[]', '2019-10-27', '2019-11-22 13:30:30', NULL),
(3, 'C', '403401299', NULL, NULL, 60, NULL, NULL, '2019-11-25', NULL, NULL),
(4, 'C', '404402082', NULL, NULL, 0, NULL, NULL, '2019-11-25', NULL, NULL),
(5, 'C', '404402264', NULL, NULL, 171, NULL, NULL, '2019-11-25', NULL, NULL),
(6, 'C', '404402305', NULL, NULL, 117, NULL, NULL, '2019-11-25', NULL, NULL),
(7, 'C', '405031622', NULL, NULL, 66, NULL, NULL, '2019-11-25', NULL, NULL),
(8, 'C', '406401161', NULL, NULL, 140, NULL, NULL, '2019-11-25', NULL, NULL),
(9, 'C', '406401288', NULL, NULL, 155, NULL, NULL, '2019-11-25', NULL, NULL),
(10, 'C', '406401587', NULL, NULL, 113, NULL, NULL, '2019-11-25', NULL, NULL),
(11, 'C', '406401599', NULL, NULL, 209, NULL, NULL, '2019-11-25', NULL, NULL),
(12, 'C', '406401616', NULL, NULL, 180, NULL, NULL, '2019-11-25', NULL, NULL),
(13, 'C', '406401628', NULL, NULL, 210, NULL, NULL, '2019-11-25', NULL, NULL),
(14, 'C', '406401678', NULL, NULL, 179, NULL, NULL, '2019-11-25', NULL, NULL),
(15, 'C', '406402335', NULL, NULL, 158, NULL, NULL, '2019-11-25', NULL, NULL),
(16, 'C', '406402476', NULL, NULL, 153, NULL, NULL, '2019-11-25', NULL, NULL),
(17, 'C', '406402567', NULL, NULL, 57, NULL, NULL, '2019-11-25', NULL, NULL),
(18, 'C', '407040172', NULL, NULL, 180, NULL, NULL, '2019-11-25', NULL, NULL),
(19, 'C', '407402033', NULL, NULL, 146, NULL, NULL, '2019-11-25', NULL, NULL),
(20, 'C', '407402045', NULL, NULL, 131, NULL, NULL, '2019-11-25', NULL, NULL),
(21, 'C', '407402057', NULL, NULL, 123, NULL, NULL, '2019-11-25', NULL, NULL),
(22, 'C', '407402069', NULL, NULL, 185, NULL, NULL, '2019-11-25', NULL, NULL),
(23, 'C', '407402071', NULL, NULL, 191, NULL, NULL, '2019-11-25', NULL, NULL),
(24, 'C', '407402083', NULL, NULL, 204, NULL, NULL, '2019-11-25', NULL, NULL),
(25, 'C', '407402095', NULL, NULL, 210, NULL, NULL, '2019-11-25', NULL, NULL),
(26, 'C', '407402100', NULL, NULL, 201, NULL, NULL, '2019-11-25', NULL, NULL),
(27, 'C', '407402112', NULL, NULL, 209, NULL, NULL, '2019-11-25', NULL, NULL),
(28, 'C', '407402124', NULL, NULL, 177, NULL, NULL, '2019-11-25', NULL, NULL),
(29, 'C', '407402136', NULL, NULL, 105, NULL, NULL, '2019-11-25', NULL, NULL),
(30, 'C', '407402148', NULL, NULL, 174, NULL, NULL, '2019-11-25', NULL, NULL),
(31, 'C', '407402150', NULL, NULL, 204, NULL, NULL, '2019-11-25', NULL, NULL),
(32, 'C', '407402162', NULL, NULL, 195, NULL, NULL, '2019-11-25', NULL, NULL),
(33, 'C', '407402174', NULL, NULL, 134, NULL, NULL, '2019-11-25', NULL, NULL),
(34, 'C', '407402186', NULL, NULL, 209, NULL, NULL, '2019-11-25', NULL, NULL),
(35, 'C', '407402203', NULL, NULL, 192, NULL, NULL, '2019-11-25', NULL, NULL),
(36, 'C', '407402215', NULL, NULL, 186, NULL, NULL, '2019-11-25', NULL, NULL),
(37, 'C', '407402227', NULL, NULL, 102, NULL, NULL, '2019-11-25', NULL, NULL),
(38, 'C', '407402239', NULL, NULL, 183, NULL, NULL, '2019-11-25', NULL, NULL),
(39, 'C', '407402241', NULL, NULL, 197, NULL, NULL, '2019-11-25', NULL, NULL),
(40, 'C', '407402253', NULL, NULL, 206, NULL, NULL, '2019-11-25', NULL, NULL),
(41, 'C', '407402265', NULL, NULL, 179, NULL, NULL, '2019-11-25', NULL, NULL),
(42, 'C', '407402277', NULL, NULL, 209, NULL, NULL, '2019-11-25', NULL, NULL),
(43, 'C', '407402289', NULL, NULL, 197, NULL, NULL, '2019-11-25', NULL, NULL),
(44, 'C', '407402291', NULL, NULL, 180, NULL, NULL, '2019-11-25', NULL, NULL),
(45, 'C', '407402306', NULL, NULL, 156, NULL, NULL, '2019-11-25', NULL, NULL),
(46, 'C', '407402318', NULL, NULL, 192, NULL, NULL, '2019-11-25', NULL, NULL),
(47, 'C', '407402320', NULL, NULL, 194, NULL, NULL, '2019-11-25', NULL, NULL),
(48, 'C', '407402332', NULL, NULL, 138, NULL, NULL, '2019-11-25', NULL, NULL),
(49, 'C', '407402344', NULL, NULL, 210, NULL, NULL, '2019-11-25', NULL, NULL),
(50, 'C', '407402356', NULL, NULL, 141, NULL, NULL, '2019-11-25', NULL, NULL),
(51, 'C', '407402368', NULL, NULL, 177, NULL, NULL, '2019-11-25', NULL, NULL),
(52, 'C', '407402370', NULL, NULL, 173, NULL, NULL, '2019-11-25', NULL, NULL),
(53, 'C', '407402394', NULL, NULL, 210, NULL, NULL, '2019-11-25', NULL, NULL),
(54, 'C', '407402409', NULL, NULL, 155, NULL, NULL, '2019-11-25', NULL, NULL),
(55, 'C', '407402411', NULL, NULL, 191, NULL, NULL, '2019-11-25', NULL, NULL),
(56, 'C', '407402423', NULL, NULL, 203, NULL, NULL, '2019-11-25', NULL, NULL),
(57, 'C', '407402447', NULL, NULL, 189, NULL, NULL, '2019-11-25', NULL, NULL),
(58, 'C', '407402459', NULL, NULL, 164, NULL, NULL, '2019-11-25', NULL, NULL),
(59, 'C', '407402461', NULL, NULL, 186, NULL, NULL, '2019-11-25', NULL, NULL),
(60, 'C', '407402473', NULL, NULL, 117, NULL, NULL, '2019-11-25', NULL, NULL),
(61, 'C', '407402485', NULL, NULL, 189, NULL, NULL, '2019-11-25', NULL, NULL),
(62, 'C', '407402497', NULL, NULL, 194, NULL, NULL, '2019-11-25', NULL, NULL),
(63, 'C', '407402502', NULL, NULL, 104, NULL, NULL, '2019-11-25', NULL, NULL),
(64, 'C', '407402514', NULL, NULL, 207, NULL, NULL, '2019-11-25', NULL, NULL),
(65, 'C', '407402538', NULL, NULL, 167, NULL, NULL, '2019-11-25', NULL, NULL),
(66, 'C', '407402540', NULL, NULL, 180, NULL, NULL, '2019-11-25', NULL, NULL),
(67, 'C', '407402552', NULL, NULL, 198, NULL, NULL, '2019-11-25', NULL, NULL),
(68, 'C', '407402564', NULL, NULL, 194, NULL, NULL, '2019-11-25', NULL, NULL),
(69, 'C', '407402576', NULL, NULL, 179, NULL, NULL, '2019-11-25', NULL, NULL),
(70, 'C', '407402590', NULL, NULL, 161, NULL, NULL, '2019-11-25', NULL, NULL),
(71, 'C', '407402605', NULL, NULL, 189, NULL, NULL, '2019-11-25', NULL, NULL),
(72, 'C', '407492076', NULL, NULL, 155, NULL, NULL, '2019-11-25', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `wishes`
--

CREATE TABLE `wishes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sticker_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stickers`
--
ALTER TABLE `stickers`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `wishes`
--
ALTER TABLE `wishes`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `stickers`
--
ALTER TABLE `stickers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `wishes`
--
ALTER TABLE `wishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
