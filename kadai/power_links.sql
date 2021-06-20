-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `power_links`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `details` text NOT NULL,
  `tag` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `title`, `url`, `details`, `tag`, `indate`) VALUES
(1, 'AAA', 'www.test2.co.jp', '三次調整力②', 'VPP', '2021-06-20 06:36:46'),
(2, 'BBB', 'www.bbb.co.jp', '再エネ発電量予測', '再エネ', '2021-06-20 06:38:20'),
(3, 'CCC', 'www.denki.co.jp', '自家発電設備', 'リソース', '2021-06-20 06:48:34'),
(4, 'DDD', 'www.denkidesuyo.co.jp', '', '', '2021-06-20 08:55:54'),
(5, 'EEE', 'www.eee.co.jp', '市場参加者一覧', 'VPP', '2021-06-20 08:56:39'),
(6, 'FFF', 'www.meti.co.jp', '調整可能量計算方法', 'VPP', '2021-06-20 08:57:16'),
(7, '経産省資料', 'www.meti.useful.co.jp', '三次調整力②結果概要', 'VPP', '2021-06-20 18:11:35'),
(8, 'FIT概要', 'www.solar.co.jp', 'FIT事業者が知るべき内容', '再エネ', '2021-06-20 18:12:20'),
(9, '調整力参加者', 'www.demand-response.co.jp', '調整力市場参加者の記載あり', 'リソース', '2021-06-20 18:52:48');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
