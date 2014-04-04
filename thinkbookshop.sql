-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 04 月 03 日 09:45
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `thinkbookshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_admin`
--

CREATE TABLE IF NOT EXISTS `think_admin` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `think_admin`
--

INSERT INTO `think_admin` (`id`, `admin`, `pw`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `think_items`
--

CREATE TABLE IF NOT EXISTS `think_items` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `name` varchar(50) NOT NULL COMMENT '商品name',
  `price` int(8) NOT NULL COMMENT '商品价钱',
  `image` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `think_items`
--

INSERT INTO `think_items` (`id`, `name`, `price`, `image`, `create_time`) VALUES
(7, '谷歌眼镜', 999, '533d0a891a14c.jpg', 1396509321),
(6, 'R-book', 99, '533d0a579ba3a.jpg', 1396509271);

-- --------------------------------------------------------

--
-- 表的结构 `think_order`
--

CREATE TABLE IF NOT EXISTS `think_order` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `in` varchar(255) NOT NULL,
  `no` int(8) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `think_order`
--

INSERT INTO `think_order` (`id`, `user`, `in`, `no`, `image`) VALUES
(21, 'gg', '谷歌眼镜', 999, '533d0a891a14c.jpg'),
(22, 'gg', 'R-book', 99, '533d0a579ba3a.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE IF NOT EXISTS `think_user` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`id`, `user`, `pw`) VALUES
(14, 'gg', 'gg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
