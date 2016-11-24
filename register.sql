-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 11 月 24 日 15:15
-- 服务器版本: 5.5.40
-- PHP 版本: 5.4.33

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `register`
--

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `sort` varchar(10) NOT NULL,
  `photo` varchar(120) NOT NULL,
  `qq` varchar(20) NOT NULL COMMENT '微信号',
  `company` varchar(30) NOT NULL,
  `summary_co` text NOT NULL,
  `summary_own` text NOT NULL,
  `time` int(14) NOT NULL,
  `vote` int(10) NOT NULL DEFAULT '0',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0未审核,1审核',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=153 ;

--
-- 触发器 `user_info`
--
DROP TRIGGER IF EXISTS `people`;
DELIMITER //
CREATE TRIGGER `people` AFTER INSERT ON `user_info`
 FOR EACH ROW begin
update vote_index set vote_index.people=vote_index.people+1;

end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `votes`;
DELIMITER //
CREATE TRIGGER `votes` AFTER UPDATE ON `user_info`
 FOR EACH ROW begin

update vote_index set vote_index.votes=vote_index.votes+1;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `vote_index`
--

CREATE TABLE IF NOT EXISTS `vote_index` (
  `people` int(11) NOT NULL COMMENT '总报名人数',
  `votes` int(11) NOT NULL COMMENT '总投票总数',
  `visits` int(11) NOT NULL COMMENT '总访问总数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `vote_ip`
--

CREATE TABLE IF NOT EXISTS `vote_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(20) NOT NULL,
  `vote_for` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31314 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
