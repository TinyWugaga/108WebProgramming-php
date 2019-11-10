-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2019 年 11 月 10 日 13:25
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `practice`
--

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
(1, '自由之翼貼圖特輯 第一彈', 'TINY', '最可愛及搞笑的資管系童鞋們，讓我們看看他們在宿營有什麼有趣的模樣吧！', 60, '2019-10-28'),
(2, '自由之翼貼圖特輯 第二彈', 'TINY', '大家最愛的自由之翼小夥伴又來啦！這群認真又不失搞笑的士官長們這次又會帶來什麼可愛的表現呢？', 60, '2019-11-11'),
(3, '自由之翼貼圖特輯 第三彈', 'TINY', '可愛的士官長第三彈！不用多說自己看ㄅ❤︎', 60, '2019-11-11');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` char(1) NOT NULL,
  `account` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `role`, `account`, `password`, `name`, `created_at`, `updated_at`) VALUES
(1, 'M', 'tiny@gmail.com', 'tiny', 'Tiny', '2019-10-27', '2019-11-10 12:05:03'),
(2, 'M', 'me.5487@gmail.com', '5487', '子軒', '2019-10-27', NULL),
(3, 'C', 'student1@gmail.com', '1', 'student1', '2019-11-03', NULL),
(4, 'C', 'student2@gmail.com', '2', 'student2', '2019-11-03', NULL),
(5, 'C', 'student3@gmail.com', '3', 'student3', '2019-11-03', '2019-11-09 20:05:54');

--
-- 已傾印資料表的索引
--

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
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `stickers`
--
ALTER TABLE `stickers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
