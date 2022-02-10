-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 2 月 10 日 01:35
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db3`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `age`, `email`, `content`, `indate`) VALUES
(1, '山崎大助', 40, 'test0@test.jp', '教室ちょっと暑いです。', '2022-02-05 16:03:25'),
(2, '織田信長', 20, 'test1@test.jp', 'メモ', '2022-02-05 16:03:46'),
(3, '徳川家康', 30, 'test2@test.jp', 'メモ', '2020-09-22 16:06:42'),
(4, '伊達政宗', 30, 'test4@test.jp', 'メモ', '2020-09-22 16:07:48'),
(5, 'デンゼル・ワシントン', 40, 'test5@test.jp', 'メモ', '2020-09-22 16:07:48'),
(6, 'ディカプリオ', 40, 'test6@test.jp', 'メモ', '2020-09-22 16:07:48'),
(7, '山田太郎', 20, 'test7@test.jp', 'テスト', '2020-09-22 17:14:36'),
(8, '服部半蔵', 10, 'test8@test.jp', '服部くん', '2020-09-22 17:59:31'),
(9, 'テスト９', 20, 'test9@test.jp', '自分', '2020-09-22 18:13:28'),
(10, 'TEST10', 20, 'test10@test.jp', 'ウイスキー', '2022-02-05 16:03:40'),
(11, 'TEST11', 20, 'test11@test.jp', 'テスト', '2020-09-29 05:20:05');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
