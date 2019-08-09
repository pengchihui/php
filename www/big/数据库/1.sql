-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-08-08 09:41:31
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `singer`
--

CREATE TABLE `singer` (
  `id` char(55) CHARACTER SET utf8 NOT NULL,
  `titile` char(100) CHARACTER SET utf8 NOT NULL,
  `singer` char(55) CHARACTER SET utf8 NOT NULL,
  `picture` char(255) CHARACTER SET utf8 NOT NULL,
  `music` char(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `singer`
--

INSERT INTO `singer` (`id`, `titile`, `singer`, `picture`, `music`) VALUES
('1235d4be5070dea8', 'aef', 'dfae', './uploads/1565254935b_1365994595210.jpg', './uploads/1565254919Math10movie.mp3'),
('1235d4be4f643df0', 'sa', 'ew', './uploads/1565254902Math21363923223953.jpg', './uploads/1565254902Math12movie.mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
