-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-12-15 14:15:44
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `profile`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `stars_table`
--

CREATE TABLE `stars_table` (
  `id` int(12) NOT NULL,
  `indate` datetime NOT NULL,
  `text` text NOT NULL,
  `level` varchar(11) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `stars_table`
--

INSERT INTO `stars_table` (`id`, `indate`, `text`, `level`, `date`) VALUES
(2, '2022-12-14 16:44:57', 'とても楽しかった', '3', '2022-12-15'),
(3, '2022-12-14 18:25:58', '楽しかった', '1', '2022-12-15'),
(4, '2022-12-14 20:15:31', '課題頑張った', '1', '2022-12-15'),
(5, '2022-12-14 20:32:37', 'テスト', '2', '2022-12-08');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `stars_table`
--
ALTER TABLE `stars_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `stars_table`
--
ALTER TABLE `stars_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
