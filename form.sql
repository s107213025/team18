-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `stuid` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subsidy` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `men` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sec` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `form`
--

INSERT INTO `form` (`id`, `stuid`, `name`, `parent`, `subsidy`, `men`, `sec`, `amount`, `status`) VALUES
(16, 107213025, '汪冠儀', '汪媽媽', '低收', '', '12345', 3000, 3),
(17, 107213011, '張晏菘', '張爸爸', '中低收', 'not ok', '', 0, 1),
(18, 107213012, '詹佳旻', '詹嬤嬤', '家庭因素', '', '', 0, 0),
(19, 107213028, '陳侑萱', 'parent', '低收', '老師不同意', '', 0, 1),
(20, 107213001, '王小明', '王先生', '中低收', '', '', 0, 0),
(21, 107213002, '張小美', '張嬤嬤', '家庭因素', '阿嬤突然去世', '', 0, 1),
(22, 107213006, '王一一', '王爺爺', '低收', '緊急', '可以通過', 9999, 2),
(23, 107213008, '戴二二', '戴爸爸', '中低收', '他越來越窮', '2345', 600, 3),
(24, 107213073, '林顆顆', '林祖母', '家庭因素', '', '', 0, 0),
(25, 107213093, '呂阿醜', '呂媽媽', '中低收', '', '', 0, 0),
(26, 107213074, '李小胖', '李太太', '家庭因素', '', '', 0, 0),
(27, 107213048, '袁世凱', '袁先生', '中低收', '同意', '111', 400, 2),
(28, 0, 'name', 'parent', '中低收', '', '', 0, 0),
(29, 107213003, '張宸瑜', '張預計', '家庭因素', 'yes', '', 0, 1),
(30, 107213000, '方三三', '方爸爸', '中低收', '', '', 0, 0),
(31, 107213077, '林佐佐', '林小姐', '家庭因素', '接受', '43244', 9000, 4),
(32, 107213099, '賴皮鬼', '賴爺爺', '家庭因素', '', '', 0, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
