-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2019 年 11 月 18 日 00:42
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
-- 資料表結構 `todo_list`
--

CREATE TABLE `todo_list` (
  `id` int(11) NOT NULL,
  `student_id` varchar(9) NOT NULL,
  `name` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `todo_list`
--

INSERT INTO `todo_list` (`id`, `student_id`, `name`, `gender`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '405401372', 'Tiny', 'F', '2019-11-18', '2019-11-18 03:20:05', NULL),
(2, '405401617', '高子軒', 'M', '2019-11-18', '2019-11-18 08:41:08', NULL),
(3, '406402000', '乙班學生1', 'M', '2019-11-18', '2019-11-18 08:41:34', NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
