-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 �?05 �?04 �?10:20
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pj`
--

-- --------------------------------------------------------

--
-- 表的结构 `demo_addclasspt`
--

CREATE TABLE IF NOT EXISTS `demo_addclasspt` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `sfinfo` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT '2',
  `addtime` varchar(255) DEFAULT NULL,
  `classtype` varchar(255) DEFAULT NULL,
  `px` varchar(255) DEFAULT '0',
  `bianhao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `demo_addclasspt`
--

INSERT INTO `demo_addclasspt` (`id`, `name`, `sex`, `tel`, `price`, `info`, `sfinfo`, `sh`, `addtime`, `classtype`, `px`, `bianhao`) VALUES
(38, '张辉', '1', '15184126523', '789', '这里是普通班收费介绍', '这里是普通收费明细', '1', '2017-08-28 15:38:03', '2', '0', '60'),
(39, '都是 打', '1', '13639195394', '13', '123', '回来就睡了', '2', '2017-10-19 16:36:15', '2', '012', '67');

-- --------------------------------------------------------

--
-- 表的结构 `demo_addclassvip`
--

CREATE TABLE IF NOT EXISTS `demo_addclassvip` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `sfinfo` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT '2',
  `addtime` varchar(255) DEFAULT NULL,
  `classtype` varchar(255) DEFAULT NULL,
  `px` varchar(255) DEFAULT '0',
  `bianhao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `demo_addclassvip`
--

INSERT INTO `demo_addclassvip` (`id`, `name`, `sex`, `tel`, `price`, `info`, `sfinfo`, `sh`, `addtime`, `classtype`, `px`, `bianhao`) VALUES
(29, '张辉', '1', '15184126523', '78', '这里是vip班介绍', '这里是vip班收费明细', '1', '2017-08-28 15:36:36', '1', '0', '60'),
(32, '张辉', '1', '15184126523', '12', '这里是版型介绍', '收费明细', '1', '2017-12-13 09:05:24', '1', '0', '75');

-- --------------------------------------------------------

--
-- 表的结构 `demo_adver`
--

CREATE TABLE IF NOT EXISTS `demo_adver` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `advers` varchar(255) DEFAULT NULL,
  `content` text,
  `updatedate` varchar(255) DEFAULT NULL,
  `url` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `demo_adver`
--

INSERT INTO `demo_adver` (`id`, `title`, `advers`, `content`, `updatedate`, `url`) VALUES
(2, '新司机欢迎您！为您的安全用心用力。', '2017121105493150.jpg', '<p>新司机欢迎您！安全陪伴你每一天。</p>', '2017-08-25 13:55:18', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `demo_article`
--

CREATE TABLE IF NOT EXISTS `demo_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `show` varchar(255) DEFAULT '0',
  `fbdate` varchar(255) DEFAULT NULL,
  `content` text,
  `pic` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `demo_article`
--

INSERT INTO `demo_article` (`id`, `title`, `show`, `fbdate`, `content`, `pic`, `type`) VALUES
(24, '火狐浏览器测试', '12', '2017-12-19 13:48:31', '<p>发的两个ID分看看我们的<br/></p>', '2017121913483150.jpg', '2');

-- --------------------------------------------------------

--
-- 表的结构 `demo_banner`
--

CREATE TABLE IF NOT EXISTS `demo_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `qufen` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `dk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `demo_banner`
--

INSERT INTO `demo_banner` (`id`, `type`, `qufen`, `title`, `banner`, `dk`) VALUES
(27, '1', '2', 'banner3', '2017072909204550.jpg', '2'),
(56, '1', '2', NULL, '2017121108141750.gif', '2'),
(23, '1', '1', 'banner4', '2017072908500950.jpg', '2'),
(30, '1', '4', '领证', '2017080207595350.jpg', '2'),
(31, '1', '4', '领证', '2017080208000850.jpg', '2'),
(33, '1', '3', '圈子', '2017080307024750.jpg', '2'),
(34, '1', '3', '圈子', '2017080307030750.jpg', '2'),
(35, '1', '3', '圈子', '2017080307031850.jpg', '2'),
(50, '2', '5', NULL, '2017121009044750.jpg', '2');

-- --------------------------------------------------------

--
-- 表的结构 `demo_btj`
--

CREATE TABLE IF NOT EXISTS `demo_btj` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `xnickname` varchar(255) DEFAULT NULL,
  `lnickname` varchar(255) DEFAULT NULL,
  `xname` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `jifen` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `demo_btj`
--

INSERT INTO `demo_btj` (`id`, `xnickname`, `lnickname`, `xname`, `tel`, `jifen`, `lname`) VALUES
(2, '15911704571', '15184126523', '张辉', NULL, NULL, '张辉'),
(3, '15184126523', '15911704571', '张辉', NULL, NULL, '张辉'),
(4, '15911704571', NULL, '张辉', NULL, NULL, NULL),
(5, '15911704571', '15812003911', '张辉', NULL, NULL, NULL),
(6, '15911704571', '18988484593', '张辉', NULL, NULL, NULL),
(7, '15911704571', '13346662349', '张辉', NULL, NULL, NULL),
(8, '18988484593', '13639195394', '陈小华', NULL, NULL, '都是 打'),
(9, '15911704571', '18285802357', '张辉', NULL, NULL, NULL),
(10, '15911704571', '18200770069', '张辉', NULL, NULL, NULL),
(11, '18988484593', '18984420737', '陈小华', NULL, NULL, '陈小华');

-- --------------------------------------------------------

--
-- 表的结构 `demo_contact`
--

CREATE TABLE IF NOT EXISTS `demo_contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `itemId` int(11) DEFAULT NULL,
  `userinfo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `fbdate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `demo_contact`
--

INSERT INTO `demo_contact` (`id`, `itemId`, `userinfo`, `content`, `fbdate`) VALUES
(1, 41, '15911704571', '好咯哦了', ''),
(2, 41, '15911704571', '你好这里是评论测试', '2017-10-10'),
(3, 41, '15184126523', '是的', '2017-10-10'),
(4, 41, '15085856552', '聚聚不luck', '2017-10-12'),
(5, 41, '18984420737', '发还给黑寡妇', '2017-10-12'),
(6, 31, '18984420737', '打大大大大神', '2017-10-12'),
(7, 41, '18984420737', '竟然不能发表情', '2017-10-12'),
(8, 41, '18984420737', '竟然不能发表情', '2017-10-12'),
(9, 41, '18984420737', '竟然不能发表情', '2017-10-12'),
(10, 41, '18984420737', '竟然不能发表情', '2017-10-12'),
(11, 41, '15911704571', '好咯饿的', '2017-10-12'),
(12, 41, '13639195394', '说的说的撒打算打大', '2017-10-12'),
(13, 41, '13639195394', '阿SAS', '2017-10-16'),
(14, 41, '15085856552', '来咯弄', '2017-10-18'),
(15, 41, '15085856552', '来咯弄', '2017-10-18'),
(16, 41, '15085856552', '热加工', '2017-10-18'),
(17, 40, '15085856552', '哈哈', '2017-10-18'),
(18, 41, '15085856552', '竟然', '2017-10-18'),
(19, 41, '13639195394', '11111', '2017-11-06'),
(20, 35, '15911704571', 'n您好', '2017-12-09');

-- --------------------------------------------------------

--
-- 表的结构 `demo_forum`
--

CREATE TABLE IF NOT EXISTS `demo_forum` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `info` text,
  `fj` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT '2',
  `px` varchar(255) DEFAULT '0',
  `show` varchar(255) DEFAULT '0',
  `fbdate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `demo_forum`
--

INSERT INTO `demo_forum` (`id`, `name`, `nickname`, `sex`, `title`, `info`, `fj`, `sh`, `px`, `show`, `fbdate`) VALUES
(28, '张辉', '15184126523', '1', '这里是测试一', '内容', '2017080714003950.jpg', '1', '0', '7', '2017-08-07 14:00:39'),
(29, '张辉', '15184126523', '1', '这里是测试二', '内容', '2017080714005050.jpg', '1', '0', '6', '2017-08-07 14:00:50'),
(30, '张辉', '15184126523', '1', '这里是测试三', '内容', '2017080714005750.jpg', '1', '0', '21', '2017-08-07 14:00:57'),
(32, '荣基', '18206722101', '1', '地方个', '地方', '2017090614055050.png', '1', '0', '1', '2017-09-06 14:05:50'),
(33, NULL, '18984420737', NULL, '学车没文化，不可怕！我有办法', '年纪大，文化低，学车难！不用担心，有了新司机，驾校教练任你挑剔！', '', '1', '0', '1', '2017-09-14 09:48:04'),
(34, NULL, '18984420737', NULL, '学车没文化，不可怕！我有办法', '年纪大，文化低，学车难！不用担心，有了新司机，驾校教练任你挑剔！', '', '1', '0', '0', '2017-09-14 09:48:36'),
(35, NULL, '18984420737', NULL, '学车没文化，不可怕！我有办法', '年纪大，文化低，学车难！不用担心，有了新司机，驾校教练任你挑剔！', '', '1', '0', '38', '2017-09-14 09:48:59'),
(36, '荣基', '18206722101', '1', '回来', '回来', '2017092614361650.jpg', '1', '0', '1', '2017-09-26 14:36:16'),
(37, '荣基', '18206722101', '1', 'ill哦哦OK了', 'ill咯哦里咯啦咯啦咯', '2017092614365750.jpg', '1', '0', '1', '2017-09-26 14:36:57'),
(38, '荣基', '18206722101', '1', '金', '回来', '2017092614373350.jpg', '1', '0', '1', '2017-09-26 14:37:33'),
(39, '张辉', '15184126523', '1', '哈可口可乐了', '回家咯哦哦哦哦', '', '1', '0', '2', '2017-09-26 14:38:39'),
(40, '张辉', '15184126523', '1', '好咯哦哦哦哦', '干净利落可口可乐', '', '1', '0', '10', '2017-09-26 14:39:05'),
(42, NULL, '13639195394', '2', '你就看看', '就来看看', '', '3', '0', '0', '2017-10-16 00:57:12');

-- --------------------------------------------------------

--
-- 表的结构 `demo_forumset`
--

CREATE TABLE IF NOT EXISTS `demo_forumset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forumset_pic` varchar(255) DEFAULT NULL,
  `info` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `demo_forumset`
--

INSERT INTO `demo_forumset` (`id`, `forumset_pic`, `info`) VALUES
(1, '2017080703251850.jpg', '适合一些网站新手提问交流的平台，可以让新手迅速的成长起来。');

-- --------------------------------------------------------

--
-- 表的结构 `demo_grrz`
--

CREATE TABLE IF NOT EXISTS `demo_grrz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `older` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sfzh` varchar(255) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `jlzpic` varchar(255) DEFAULT NULL,
  `sfzpicz` varchar(255) DEFAULT NULL,
  `jszpicz` varchar(255) DEFAULT NULL,
  `jlcxszpic` varchar(255) DEFAULT NULL,
  `jlcpic` varchar(255) DEFAULT NULL,
  `grpic` varchar(255) DEFAULT NULL,
  `bianhao` varchar(255) DEFAULT NULL,
  `qufen` varchar(255) DEFAULT '2',
  `dppic` varchar(255) DEFAULT NULL,
  `grsfzpicz` varchar(255) DEFAULT NULL,
  `grsfzpicf` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `lxrs` varchar(255) DEFAULT NULL,
  `fbdate` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `jlolder` varchar(255) DEFAULT NULL,
  `szjxname` varchar(255) DEFAULT NULL,
  `jxaddress` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fwdq` varchar(255) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT NULL,
  `time2` varchar(255) DEFAULT NULL,
  `time3` varchar(255) DEFAULT NULL,
  `time1` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `qf` varchar(255) DEFAULT '0',
  `sha` varchar(255) DEFAULT '2',
  `px` varchar(255) DEFAULT '0',
  `jpprice` varchar(255) DEFAULT NULL,
  `shdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- 转存表中的数据 `demo_grrz`
--

INSERT INTO `demo_grrz` (`id`, `older`, `name`, `sfzh`, `sex`, `type`, `jlzpic`, `sfzpicz`, `jszpicz`, `jlcxszpic`, `jlcpic`, `grpic`, `bianhao`, `qufen`, `dppic`, `grsfzpicz`, `grsfzpicf`, `price`, `lxrs`, `fbdate`, `time`, `jlolder`, `szjxname`, `jxaddress`, `address`, `fwdq`, `addtime`, `sh`, `time2`, `time3`, `time1`, `tel`, `nickname`, `info`, `qf`, `sha`, `px`, `jpprice`, `shdate`) VALUES
(62, '564', '李四', '5301131996042784666', 1, 3, '', '', '', '', '', '', NULL, '2', '2017082808013750.jpg', '2017082808013750.jpg', '2017082808013750.jpg', NULL, '0', NULL, NULL, NULL, NULL, NULL, '云南省坤高密市', '云南省', '2017-08-28 16:01:37', '1', NULL, NULL, NULL, '15184126523', '15184126523', NULL, '0', '1', '0', NULL, '0000-00-00 00:00:00'),
(68, '28', '陈小华', '520330199008156191', 1, 2, '', '', '', '', '', '', NULL, '2', '2017101114475850.png', NULL, NULL, NULL, '0', NULL, NULL, '28', NULL, NULL, '贵州省六盘水', '贵州省六盘水', '2017-10-11 22:47:58', '1', NULL, NULL, NULL, '18988484593', '13639195394', NULL, '0', '1', '0', NULL, '0000-00-00 00:00:00'),
(69, '46', '高健永', '530122197110032652', 1, 1, NULL, NULL, NULL, NULL, '2017120107414050.jpg', NULL, NULL, '2', '', '', '', NULL, '0', NULL, NULL, '15', '昌鸿驾校晋城分校', '晋宁区晋城镇', NULL, NULL, '2017-11-11 12:35:26', '1', NULL, NULL, NULL, '13888650579', '13888650579', NULL, '0', '1', '0', '1000-5000', '0000-00-00 00:00:00'),
(70, '32', '蒋忠文', '532122198512132839', 1, 1, NULL, NULL, NULL, NULL, '2017120107411950.jpg', NULL, NULL, '2', '', '', '', NULL, '0', NULL, NULL, '5', '良俊驾校', '大学城', NULL, NULL, '2017-11-12 14:34:30', '1', NULL, NULL, NULL, '13888216654', '13888216654', NULL, '0', '1', '0', '1000-5000', '0000-00-00 00:00:00'),
(74, '22', 'zhang hui', '530113199604274677', 1, 2, '', '', '', '', '', '', NULL, '2', '2017120103574350.jpeg', '2017120103574350.jpeg', '2017120103574350.jpeg', NULL, '0', NULL, NULL, NULL, NULL, NULL, '云南昆明', '哈哈', '2017-12-01 11:57:43', '1', NULL, NULL, NULL, '15184126523', '15184126523', NULL, '0', '1', '0', NULL, '0000-00-00 00:00:00'),
(75, '12', '张辉', '530113199604274622', 1, 1, '2017120706291150.jpeg', '2017120706291150.jpeg', '2017120706291150.jpeg', '2017120706291150.jpeg', '2017120706291250.png', '2017120706291250.jpeg', NULL, '2', '', '', '', '12.00', '2', '2017-12-07', '8:30-12:30', '12', '康生驾校', '云南昆明', NULL, NULL, '2017-12-07 14:29:12', '1', NULL, NULL, '13:30-17:30', '15184126523', '15184126523', NULL, '1', '1', '0', '100-200', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `demo_lessionfour`
--

CREATE TABLE IF NOT EXISTS `demo_lessionfour` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `lxrs` varchar(255) DEFAULT NULL,
  `cartype` varchar(255) DEFAULT NULL,
  `fbdate` varchar(255) DEFAULT NULL,
  `seltime` varchar(255) DEFAULT NULL,
  `lxtel` varchar(255) DEFAULT NULL,
  `lxaddress` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT '2',
  `px` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `demo_lessionfour`
--

INSERT INTO `demo_lessionfour` (`id`, `name`, `sex`, `tel`, `price`, `lxrs`, `cartype`, `fbdate`, `seltime`, `lxtel`, `lxaddress`, `sh`, `px`) VALUES
(8, '张辉', '1', '15184126523', '23', '2', 'c1', '2017-08-02', '8:30-12:30,13:30-17:30,,', '323', '32323', '1', '0');

-- --------------------------------------------------------

--
-- 表的结构 `demo_lessionone`
--

CREATE TABLE IF NOT EXISTS `demo_lessionone` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `lxrs` varchar(255) DEFAULT NULL,
  `cartype` varchar(255) DEFAULT NULL,
  `fbdate` varchar(255) DEFAULT NULL,
  `seltime` varchar(255) DEFAULT NULL,
  `lxtel` varchar(255) DEFAULT NULL,
  `lxaddress` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT '2',
  `px` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `demo_lessionone`
--

INSERT INTO `demo_lessionone` (`id`, `name`, `sex`, `tel`, `price`, `lxrs`, `cartype`, `fbdate`, `seltime`, `lxtel`, `lxaddress`, `sh`, `px`) VALUES
(4, '张辉', '1', '15184126523', '20', '4', '保时捷', '2017-07-31', '8:30-12:30,13:30-17:30,,', '15911704571', '云南省昆明市', '1', '0'),
(5, '张辉', '1', '15184126523', '20', '4', '保时捷', '2017-07-31', '8:30-12:30,13:30-17:30,,', '15911704571', '云南省昆明市', '1', '0'),
(6, '张辉', '1', '15184126523', '20', '4', '保时捷', '2017-07-31', '8:30-12:30,13:30-17:30,,', '15911704571', '云南省昆明市', '1', '123');

-- --------------------------------------------------------

--
-- 表的结构 `demo_lessionthree`
--

CREATE TABLE IF NOT EXISTS `demo_lessionthree` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `seltime1` varchar(255) DEFAULT NULL,
  `seltime2` varchar(255) DEFAULT NULL,
  `seltime3` varchar(255) DEFAULT NULL,
  `seltime4` varchar(255) DEFAULT NULL,
  `lxrs` varchar(255) DEFAULT NULL,
  `cartype` varchar(255) DEFAULT NULL,
  `lxmodel` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `lcaddress` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT '2',
  `px` varchar(255) DEFAULT '0',
  `fbdate` varchar(255) DEFAULT NULL,
  `sjid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- 表的结构 `demo_lessiontwo`
--

CREATE TABLE IF NOT EXISTS `demo_lessiontwo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `seltime1` varchar(255) DEFAULT NULL,
  `seltime2` varchar(255) DEFAULT NULL,
  `seltime3` varchar(255) DEFAULT NULL,
  `seltime4` varchar(255) DEFAULT NULL,
  `lxrs` varchar(255) DEFAULT NULL,
  `cartype` varchar(255) DEFAULT NULL,
  `lxmodel` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `lcaddress` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT '2',
  `px` varchar(255) DEFAULT '0',
  `fbdate` varchar(255) DEFAULT NULL,
  `sjid` varchar(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT '0',
  `nickname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `demo_lessiontwo`
--

INSERT INTO `demo_lessiontwo` (`id`, `name`, `sex`, `seltime1`, `seltime2`, `seltime3`, `seltime4`, `lxrs`, `cartype`, `lxmodel`, `tel`, `lcaddress`, `sh`, `px`, `fbdate`, `sjid`, `type`, `nickname`) VALUES
(28, '张辉', '1', '100', '200', '300', '400', '3', 'c1', '2', '15184126523', '云南昆明', '1', '0', '2017-12-07', '75', '2', '15184126523');

-- --------------------------------------------------------

--
-- 表的结构 `demo_lzjszfw`
--

CREATE TABLE IF NOT EXISTS `demo_lzjszfw` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `shopname` varchar(255) DEFAULT NULL,
  `fwitem` varchar(255) DEFAULT NULL,
  `fwprice` varchar(255) DEFAULT NULL,
  `shopaddress` varchar(255) DEFAULT NULL,
  `iteminfo` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT '2',
  `addtime` varchar(255) DEFAULT NULL,
  `px` varchar(255) DEFAULT '0',
  `bianhao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `demo_lzjszfw`
--

INSERT INTO `demo_lzjszfw` (`id`, `name`, `sex`, `tel`, `nickname`, `shopname`, `fwitem`, `fwprice`, `shopaddress`, `iteminfo`, `sh`, `addtime`, `px`, `bianhao`) VALUES
(11, '张辉', '1', '15184126523', '15184126523', '陈小华', '办驾驶证', '45', '云南省狂秘书呢会', '这里是办驾驶项目介绍', '1', '2017-08-28 16:03:59', '0', NULL),
(12, '张辉', '1', '15184126523', '15184126523', '张辉', '修车', '5566', '群魔', '是咯哦哦哦', '1', '2017-10-21 15:10:28', '0', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `demo_lzqcfw`
--

CREATE TABLE IF NOT EXISTS `demo_lzqcfw` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `shopname` varchar(255) DEFAULT NULL,
  `fwitem` varchar(255) DEFAULT NULL,
  `fwprice` varchar(255) DEFAULT NULL,
  `shopaddress` varchar(255) DEFAULT NULL,
  `iteminfo` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT '2',
  `addtime` varchar(255) DEFAULT NULL,
  `px` varchar(255) DEFAULT '0',
  `bianhao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `demo_lzqcfw`
--

INSERT INTO `demo_lzqcfw` (`id`, `name`, `sex`, `tel`, `nickname`, `shopname`, `fwitem`, `fwprice`, `shopaddress`, `iteminfo`, `sh`, `addtime`, `px`, `bianhao`) VALUES
(17, '张辉', '1', '15184126523', '15184126523', '陈小华', '保险服务', '78', '云南省昆明市', '这里保险服务项目介绍', '1', '2017-08-28 16:09:00', '0', NULL),
(18, NULL, '2', '13639195394', '13639195394', '你送礼物', '违章处理', '23', '云南昆明', '磨破呜呜呜呜呜', '1', '2017-10-11 22:54:05', '0', NULL),
(19, NULL, '2', '13639195394', '13639195394', '李峻三队', '恢复资格', '20', '云南昆明', '不求得介绍', '1', '2017-10-11 22:57:21', '0', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `demo_root`
--

CREATE TABLE IF NOT EXISTS `demo_root` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `money` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `yhkh` varchar(255) DEFAULT NULL,
  `khh` varchar(255) DEFAULT NULL,
  `integral` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `demo_root`
--

INSERT INTO `demo_root` (`id`, `name`, `sex`, `address`, `type`, `pass`, `money`, `nickname`, `tel`, `pic`, `yhkh`, `khh`, `integral`) VALUES
(1, '张辉', 1, '云南省昆明市', 2, 'e256356', NULL, '15911704571', '15911704571', '2017080907414750.jpg', '123456', '中国人民银行', '1250'),
(2, '张辉', 1, '云南省昆明市东川区', 1, 'e256356', NULL, '15184126523', '15184126523', '2017092908012850.jpg', '12345678910', '中国建设银行', NULL),
(5, '张三', 2, '云南省昆明市东川区', 1, 'e256356', NULL, '13888956398', '13888956398', '2017080806420050.jpg', '', '', NULL),
(7, '荣基', 1, '宋家沟', 2, '123456t', NULL, '18206722101', '18206722101', '2017090606192050.jpg', '', '', NULL),
(10, '都是 打', 1, '昆明彩云北路', 1, '123456', NULL, '13639195394', '13639195394', '2017090804342450.png', '', '', NULL),
(13, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(14, '陈小华', 1, '云南昆明', 2, '123456', NULL, '18984420737', '18984420737', '2017101101210350.JPG', '', '', NULL),
(15, NULL, NULL, NULL, 2, '123456', NULL, '13668588225', '13668588225', NULL, '', '', NULL),
(16, '哈哈', 1, '云南', 2, 'baidu..2', NULL, '15085856552', '15085856552', '2017103018532250.jpg', '', '', NULL),
(17, NULL, NULL, NULL, 2, 'e256356', NULL, '18487275861', '18487275861', NULL, '', '', NULL),
(18, NULL, NULL, NULL, 2, '123456', NULL, '15198707271', '15198707271', NULL, '', '', NULL),
(19, NULL, NULL, NULL, 1, '12345678', NULL, '15887878023', '15887878023', NULL, '', '', NULL),
(25, NULL, NULL, NULL, 2, 'nj861010861025**', NULL, '18288791311', '18288791311', NULL, '', '', NULL),
(26, NULL, NULL, NULL, 1, '123456', NULL, '13320536544', '13320536544', NULL, '', '', NULL),
(27, '王振林', 2, '啊扣扣空间里', 1, '123456', NULL, '15911733009', '15911733009', NULL, '', '', NULL),
(28, NULL, NULL, NULL, 1, '197161', NULL, '13888650579', '13888650579', NULL, '', '', NULL),
(29, NULL, NULL, NULL, 2, '123456', NULL, '13888260736', '13888260736', NULL, '', '', NULL),
(30, NULL, NULL, NULL, 1, '123456', NULL, '13888216654', '13888216654', NULL, '', '', NULL),
(31, '杨朱兵', 2, '云南省昆明市官渡区', 1, '123456', NULL, '18388108480', '18388108480', '2017112807045050.jpeg', '1234567890', '中国建设银行', NULL),
(32, NULL, 1, NULL, 1, '123456', NULL, '15911733009', '15911733009', NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, 1, '123456', NULL, '18085806611', '18085806611', NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, 1, '123457', NULL, '15812003911', '15812003911', NULL, NULL, NULL, '0'),
(36, '陈小华', 1, NULL, 1, '123456', NULL, '18988484593', '18988484593', '2017121907200450.jpg', '6227007172030109865', '中国建设银行六盘水支行', '100'),
(37, NULL, NULL, NULL, 2, '13462270246', NULL, '13346662349', '13346662349', NULL, NULL, NULL, '0'),
(38, NULL, NULL, NULL, 2, '123456', NULL, '18285802357', '18285802357', NULL, NULL, NULL, '0'),
(39, NULL, NULL, NULL, 2, 'q15016420598', NULL, '18200770069', '18200770069', NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- 表的结构 `demo_setinfo`
--

CREATE TABLE IF NOT EXISTS `demo_setinfo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zfsm` longtext,
  `ptsysm` longtext,
  `jszsysm` longtext,
  `qcfwsysm` longtext,
  `txsm` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `demo_setinfo`
--

INSERT INTO `demo_setinfo` (`id`, `zfsm`, `ptsysm`, `jszsysm`, `qcfwsysm`, `txsm`) VALUES
(1, '<p><span style="color: rgb(127, 127, 127);">1、预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；如果用户不满意的话可以在订单中申请退款。</span></p><p><span style="color: rgb(127, 127, 127);">2、全额支付说明：一次性支付全部费用（包含报名费、补考费）。<br/></span></p><p><span style="color: rgb(127, 127, 127);">3、客服热线：18988484593。</span></p>', '<p><span style="color: rgb(34, 34, 34); font-size: 12px;">预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；预约金说明：支付200元费用，教练会带用户去参观练习地点、环境等；</span><span style="color: rgb(34, 34, 34);"></span></p>', '<p><span style="color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 13.3333px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">1.领取确认书</span></p><p><span style="color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 13.3333px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;"><span style="color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 13.3333px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">2.驾驶证原件</span><br/></span></p><p><span style="color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 13.3333px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;"><span style="color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 13.3333px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">3.罚款缴纳</span><br/></span></p>', '<p><span style="color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 13.3333px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">1.领取确认书</span></p><p><span style="color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 13.3333px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">2.驾驶证原件</span><br/></p><p><span style="color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 13.3333px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">3.罚款缴纳</span><br/></p>', '<p><span style="color: rgb(165, 165, 165);">1、提现时请输入不要大于您现在所拥有的佣金金额；</span></p><p><span style="color: rgb(165, 165, 165);">2、提现填写时请输入您真实的账号跟姓名，否则后果自负；</span></p><p><br/></p>'),
(2, 'hhhh', '<p>这里是平台使用说明设置</p>', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `demo_sjrz`
--

CREATE TABLE IF NOT EXISTS `demo_sjrz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `older` varchar(255) DEFAULT NULL,
  `sfzh` varchar(255) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `cldate` varchar(255) DEFAULT NULL,
  `jxname` varchar(255) DEFAULT NULL,
  `jxaddress` varchar(255) DEFAULT NULL,
  `yyzzpic` varchar(255) DEFAULT NULL,
  `frsfzpicz` varchar(255) DEFAULT NULL,
  `frsfzpicf` varchar(255) DEFAULT NULL,
  `jlcpic` varchar(255) DEFAULT NULL,
  `xlcdpic1` varchar(255) DEFAULT NULL,
  `xlcdpic2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dpzpic` varchar(255) DEFAULT NULL,
  `fwdq` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `grsfzpicz` varchar(255) DEFAULT NULL,
  `grsfzpicf` varchar(255) DEFAULT NULL,
  `qufen` int(11) DEFAULT '1',
  `tel` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `sh` int(11) DEFAULT '0',
  `bianhao` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `brief` text,
  `pic` varchar(255) DEFAULT NULL,
  `xlcdpic11` text,
  `bghj` text,
  `price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `demo_sjrz`
--

INSERT INTO `demo_sjrz` (`id`, `name`, `older`, `sfzh`, `sex`, `cldate`, `jxname`, `jxaddress`, `yyzzpic`, `frsfzpicz`, `frsfzpicf`, `jlcpic`, `xlcdpic1`, `xlcdpic2`, `address`, `dpzpic`, `fwdq`, `type`, `grsfzpicz`, `grsfzpicf`, `qufen`, `tel`, `addtime`, `sh`, `bianhao`, `nickname`, `brief`, `pic`, `xlcdpic11`, `bghj`, `price`) VALUES
(68, '张辉', '21', NULL, 1, '2017-02-23', '康盛驾校', '云南昆明', '2017120712312550.jpeg', '2017120712312550.jpeg', '2017120712312550.jpeg', '2017120906440150.jpg', '2017120712312550.jpeg', '2017120712312650.jpeg', NULL, '', NULL, '1', '', '', 1, '15911704571', '2017-12-07 20:31:26', 1, '171207123132608', '15184126523', NULL, '2017120712330450.jpeg', NULL, '<p><img src="/ueditor/php/upload/image/20171207/1512649978708690.jpg" title="1512649978708690.jpg"/></p><p><img src="/ueditor/php/upload/image/20171207/1512649979544567.jpg" title="1512649979544567.jpg"/></p><p><br/></p>', '1000-8000'),
(69, '陈小华', '28', '520203199101043919', 1, '11年8月9日', '驾考快易通理论班', '昆明市彩云北路朱家村交警五大队旁公路局小区', '', '', '', '', '', '', NULL, '', NULL, '1', '', '', 1, '18988484593', '2017-12-15 16:32:35', 1, '171219061459300', '18988484593', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `demo_tg`
--

CREATE TABLE IF NOT EXISTS `demo_tg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `content` text,
  `nickname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL,
  `cl` varchar(255) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `demo_tg`
--

INSERT INTO `demo_tg` (`id`, `title`, `content`, `nickname`, `name`, `pic`, `tel`, `addtime`, `cl`) VALUES
(4, '这里是投稿标题', '这里是投稿内容', '15184126523', '张辉', '2017072819314550.jpg', '15184126523', '2017-07-28 19:31:45', '1');

-- --------------------------------------------------------

--
-- 表的结构 `demo_tj`
--

CREATE TABLE IF NOT EXISTS `demo_tj` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `xnickname` varchar(255) DEFAULT NULL,
  `lnickname` varchar(255) DEFAULT NULL,
  `xname` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `jifen` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `demo_tj`
--

INSERT INTO `demo_tj` (`id`, `xnickname`, `lnickname`, `xname`, `tel`, `jifen`, `lname`) VALUES
(3, '15911704571', NULL, '张辉', NULL, NULL, NULL),
(4, '15184126523', NULL, '张辉', NULL, NULL, NULL),
(5, '18988484593', NULL, '陈小华', NULL, NULL, NULL),
(6, '13639195394', NULL, '都是 打', NULL, NULL, NULL),
(7, '18984420737', NULL, '陈小华', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `demo_tsjb`
--

CREATE TABLE IF NOT EXISTS `demo_tsjb` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `fj` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `demo_tsjb`
--

INSERT INTO `demo_tsjb` (`id`, `name`, `sex`, `tel`, `fj`, `content`) VALUES
(8, '张辉', '1', '15911704571', '2017080909270050.jpg', '额外热无若'),
(9, '张辉', '1', '15911704571', '2017080909314250.jpg', '特为人人');

-- --------------------------------------------------------

--
-- 表的结构 `demo_txgl`
--

CREATE TABLE IF NOT EXISTS `demo_txgl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `money` varchar(255) DEFAULT NULL,
  `kh` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT '2',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `demo_txgl`
--

INSERT INTO `demo_txgl` (`id`, `nickname`, `name`, `money`, `kh`, `type`, `date`) VALUES
(1, '15911704571', '张辉', '5', '0', '2', '2017-12-12 09:46:51'),
(2, '15911704571', '张辉', '5', '0', '2', '2017-12-12 09:57:41'),
(3, '15911704571', '张辉', '5', '0', '2', '2017-12-12 09:58:09'),
(4, '15911704571', '张辉', '5', '0', '2', '2017-12-12 09:59:42'),
(5, '15911704571', '张辉', '5', '0', '2', '2017-12-12 10:02:08'),
(6, '15911704571', '张辉', '5', '0', '2', '2017-12-12 10:02:16'),
(7, '15911704571', '张辉', '5', '0', '1', '2017-12-12 10:18:49');

-- --------------------------------------------------------

--
-- 表的结构 `demo_user`
--

CREATE TABLE IF NOT EXISTS `demo_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `type` varchar(10) DEFAULT '0',
  `origne` varchar(15) DEFAULT '0',
  `money` varchar(50) DEFAULT '0',
  `laozhuangbi` varchar(50) DEFAULT '0',
  `tel` varchar(30) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `benjinchi` varchar(255) DEFAULT NULL,
  `bianhao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- 转存表中的数据 `demo_user`
--

INSERT INTO `demo_user` (`id`, `name`, `sex`, `nickname`, `pass`, `address`, `email`, `type`, `origne`, `money`, `laozhuangbi`, `tel`, `addtime`, `benjinchi`, `bianhao`) VALUES
(55, '陈小华', '1', '18988484593', '18988484593lt', '昆明市彩云北路朱家村交警五大队旁公路局小区', NULL, '2', '0', '0', '0', '18988484593', '2017-12-19 14:14:59', NULL, '171219061459300'),
(53, 'admin', NULL, 'admin', 'admin', NULL, NULL, '1', '0', '0', '0', NULL, NULL, NULL, '201711231731'),
(54, '张辉', '1', '15911704571', '15911704571lt', '云南昆明', NULL, '2', '0', '0', '0', '15911704571', '2017-12-07 20:31:32', NULL, '171207123132608');

-- --------------------------------------------------------

--
-- 表的结构 `demo_xqfb`
--

CREATE TABLE IF NOT EXISTS `demo_xqfb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `lctime` varchar(255) DEFAULT NULL,
  `szaddress` varchar(255) DEFAULT NULL,
  `hkaddress` varchar(255) DEFAULT NULL,
  `selitem` varchar(255) DEFAULT NULL,
  `kecartype` varchar(255) DEFAULT NULL,
  `infocontent` text,
  `kescartype` varchar(255) DEFAULT NULL,
  `keitem` varchar(255) DEFAULT NULL,
  `lcdate` varchar(255) DEFAULT NULL,
  `keitem1` varchar(255) DEFAULT NULL,
  `fbdate` varchar(255) DEFAULT NULL,
  `zhuangtai` varchar(255) DEFAULT '2',
  `nickname` varchar(255) DEFAULT NULL,
  `keitem3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `demo_xqfb`
--

INSERT INTO `demo_xqfb` (`id`, `name`, `sex`, `tel`, `title`, `lctime`, `szaddress`, `hkaddress`, `selitem`, `kecartype`, `infocontent`, `kescartype`, `keitem`, `lcdate`, `keitem1`, `fbdate`, `zhuangtai`, `nickname`, `keitem3`) VALUES
(15, '张辉', '1', '15184126523', '科目二发布测试', '2017', '云南罗尼', '山西省  晋城市  陵川县', '2', 'c5', '测试', NULL, '2', '2017-12-14', NULL, '2017-12-14', '2', '15911704571', '0'),
(16, '都是 打', '1', NULL, NULL, NULL, NULL, '省  市  区/县', '0', NULL, NULL, NULL, '0', NULL, NULL, '2017-12-26', '2', '13639195394', '0');

-- --------------------------------------------------------

--
-- 表的结构 `demo_xq_order`
--

CREATE TABLE IF NOT EXISTS `demo_xq_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `xname` varchar(255) DEFAULT NULL,
  `xsex` varchar(255) DEFAULT NULL,
  `xtel` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `lctime` varchar(255) DEFAULT NULL,
  `selitem` varchar(255) DEFAULT NULL,
  `itemtype` varchar(255) DEFAULT NULL,
  `itemtype1` varchar(255) DEFAULT NULL,
  `cartype` varchar(255) DEFAULT NULL,
  `zt` varchar(255) DEFAULT '2',
  `payzt` varchar(255) DEFAULT NULL,
  `paytype` varchar(255) DEFAULT NULL,
  `lcaddress` varchar(255) DEFAULT NULL,
  `jddate` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- 表的结构 `demo_znx`
--

CREATE TABLE IF NOT EXISTS `demo_znx` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shid` int(11) DEFAULT NULL,
  `info` text,
  `type` varchar(255) DEFAULT NULL,
  `sha` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `qf` varchar(255) DEFAULT NULL,
  `fbdate` varchar(255) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=160 ;

--
-- 转存表中的数据 `demo_znx`
--

INSERT INTO `demo_znx` (`id`, `shid`, `info`, `type`, `sha`, `nickname`, `qf`, `fbdate`, `content`) VALUES
(149, NULL, NULL, NULL, NULL, '18206722101', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(147, NULL, NULL, NULL, NULL, '', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(145, NULL, NULL, NULL, NULL, '13668588225', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(144, NULL, NULL, NULL, NULL, '15085856552', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(143, NULL, NULL, NULL, NULL, '18487275861', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(142, NULL, NULL, NULL, NULL, '15198707271', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(141, NULL, NULL, NULL, NULL, '15887878023', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(140, NULL, NULL, NULL, NULL, '18288791311', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(139, NULL, NULL, NULL, NULL, '13320536544', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(138, NULL, NULL, NULL, NULL, '15911733009', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(133, NULL, NULL, NULL, NULL, '15911733009', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(134, NULL, NULL, NULL, NULL, '18388108480', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(135, NULL, NULL, NULL, NULL, '13888216654', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(136, NULL, NULL, NULL, NULL, '13888260736', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(137, NULL, NULL, NULL, NULL, '13888650579', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>'),
(156, 209, '亲爱的~15911704571客户，您好！您的订单正在处理中', '4', NULL, '15911704571', NULL, '2017-12-09 16:13:12', NULL),
(154, NULL, NULL, NULL, NULL, '13888650579', '5', '2017-12-07 11:07:45', '<p>选择性群发测试中........<br/></p>'),
(153, NULL, NULL, NULL, NULL, '18388108480', '5', '2017-12-07 11:07:45', '<p>选择性群发测试中........<br/></p>'),
(158, NULL, '尊敬的张辉先生/女士,您申请的提现金额5元，已审核通过。我们会尽快处理。', NULL, NULL, '15911704571', '11', NULL, NULL),
(150, NULL, NULL, NULL, NULL, '13888956398', '5', '2017-12-07 11:06:24', '<p>正在测试群发消息.....群发功能测试中.......<br/></p>');

-- --------------------------------------------------------

--
-- 表的结构 `demo_zzfb`
--

CREATE TABLE IF NOT EXISTS `demo_zzfb` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jxname` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `content` text,
  `xlcd` text,
  `bghj` text,
  `px` varchar(255) DEFAULT '0',
  `fbdate` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `bh` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `demo_zzfb`
--

INSERT INTO `demo_zzfb` (`id`, `jxname`, `pic`, `name`, `address`, `content`, `xlcd`, `bghj`, `px`, `fbdate`, `tel`, `bh`, `price`) VALUES
(22, '驾考快易通理论班', '2017121907053850.jpg', '陈小华', '彩云北路朱家村立交桥交警五大队旁', '本培训班专业培训科目一，科目四，满分学习，延期未审，等驾考理论考试，不识文化都能教会，有基础更快搞定，一次收费，直至教会。', '<p><img src="/ueditor/php/upload/image/20171219/1513666444942568.jpg" title="1513666444942568.jpg" alt="素材中国sccnn.com_2016052623_01101-(7).jpg"/></p>', '<p><img src="/ueditor/php/upload/image/20171219/1513666467301136.jpg" title="1513666467301136.jpg" alt="素材中国sccnn.com_2016052623_01101-(10).jpg"/></p>', '0', '2017-12-19 14:54:35', '18988484593', '171219807', '599-1999');

-- --------------------------------------------------------

--
-- 表的结构 `demo_zzfbclass`
--

CREATE TABLE IF NOT EXISTS `demo_zzfbclass` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classtype` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `info` text,
  `fyinfo` varchar(255) DEFAULT NULL,
  `bh` varchar(255) DEFAULT NULL,
  `jid` int(11) DEFAULT NULL,
  `fbdate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `demo_zzfbclass`
--

INSERT INTO `demo_zzfbclass` (`id`, `classtype`, `price`, `info`, `fyinfo`, `bh`, `jid`, `fbdate`) VALUES
(1, '1', '23800', '这里是vip班型介绍', '这里是费用明细', '170812427', 13, '2017-08-12 17:39:21'),
(10, '1', '1200', '这里是vip班型介绍', '这里是vip班型费用明细', '170812892', 14, '2017-08-14 11:47:17'),
(4, '2', '2380', '这里是是班型介绍', '这里是费用明细', '170812427', 13, '2017-08-12 17:39:21'),
(9, '1', '12378', '这里是班型介绍', '这里是费用明细', '170812621', 1, '2017-08-12 18:15:59'),
(6, '1', '12378', '这里是班型介绍', '这里是费用明细', '170812621', 1, '2017-08-12 18:11:09'),
(7, '1', '12378', '这里是班型介绍', '这里是费用明细', '170812621', 1, '2017-08-12 18:11:14'),
(8, '1', '12378', '这里是班型介绍', '这里是费用明细', '170812621', 1, '2017-08-12 18:11:18'),
(11, '2', '1200', '这里是普通班型介绍', '这里是普通班型费用明细', '170812892', 14, '2017-08-14 11:47:37'),
(12, '1', '1230', '这里是hivip班介绍', '这里是hivip班费用明细', '170808045857768', 50, '2017-08-16 09:40:00'),
(13, '2', '43434', '434343', '434343', NULL, 51, '2017-08-16 09:52:11'),
(14, '1', '54545', '545454', '54545454', NULL, 52, '2017-08-16 09:57:00'),
(15, '1', '3434', '433434', '434343', '170816020215504', 51, '2017-08-16 10:02:25'),
(16, '2', '123800', '这里是普通班班型介绍', '这里是普通班班费用明细', '170808045857768', 50, '2017-08-16 11:52:57'),
(17, '1', '12500', '第二个vip班介绍', '第二个vip班费用明细', '170808045857768', 50, '2017-08-16 11:54:20'),
(18, '1', '23', 'dfsadfasdfsadfas', 'fsdfsadfsadfasdfsdafa', '17082802490515', 54, '2017-08-28 11:38:11'),
(19, '1', '123', '1.自主约车；\r\n2.单人单车训练，每次练车2小时；\r\n3.不限课时，免补考费；\r\n注：（须持有学生证等有效证件）', '2.单人单车训练，每次练车2小时；', '170828119', 19, '2017-08-28 14:19:26'),
(20, '2', '789', '1.自主约车；\r\n2.单人单车训练，每次练车2小时；\r\n3.不限课时，免补考费；', '2.单人单车训练，每次练车2小时；', '170828119', 19, '2017-08-28 14:19:59'),
(26, '1', '12', '2', '2', '171017123830498', 61, '2017-10-17 21:07:35'),
(27, '1', '12', '2', '2', '171017123830498', 61, '2017-10-17 21:07:37'),
(28, '1', '13', '33', '33', '171017123830498', 61, '2017-10-17 21:08:02'),
(29, '2', '13', '33', '33', '170828072711699', 56, '2017-10-17 21:14:19'),
(30, '1', '13', '44', NULL, '170828072711699', 56, '2017-10-17 21:15:19'),
(31, '1', '20', '12', '12', '170828063014680', 55, '2017-10-19 15:26:36'),
(32, '2', '20', 'C1(手动）', '包含一次性都补考费', '170828063014680', 55, '2017-10-19 15:26:52'),
(23, '2', '19', 'C2（小型自动挡）', '包含一次性考试费用，站住证', '170828063014680', 55, '2017-08-28 14:58:23'),
(33, '2', '13', 'C3', 'iuU币uu', '170828063014680', 55, '2017-10-19 15:40:25'),
(24, '2', '1', '能更好的保障学员权益，让学员学车无风险；自备长春市交警支队指定考场和公安医院指定校内体检中心，让学员体检、报名、考试一站到位。“到丰源驾校(原金达洲驾校)学车是正确的选择”是学员给我校中肯的评价。完善的教学设施、宽敞明亮的学员休息大厅、经济实惠的校园餐厅、优惠服务不断的会员俱乐部必将给您带来无与伦比的学车体验', '2.提供全市班车免费接送，其他驾校尚未提供此项服务，个别驾校收取班车费用从中获利； 3.驾校场地为100万平方米，提供科二科三场地训练，其他驾校均不提供科三校内练车，在实际路面进行练车，大大增加了安全隐患的发生，也违反了现行交通法规法则，是对学员生命安全极其不负责任的行为；', '170828063014680', 55, '2017-08-28 15:00:06'),
(34, '1', '1000', '这里是vip班介绍', '这里是费用明细', '171201010458226', 66, '2017-12-01 09:08:39'),
(35, '2', '2000', '这里是普通班介绍', '这里是普通班费用明细', '171201010458226', 66, '2017-12-01 09:09:18'),
(36, '1', '200', '这里是vip办介绍', '这里是vip班收费明细', '171207123132608', 68, '2017-12-07 20:34:31'),
(37, '2', '300', '这里是普通办介绍', '这里是普通班收费明细', '171207123132608', 68, '2017-12-07 20:35:16'),
(38, '1', '123', '54343', '654564566', '171207123132608', 68, '2017-12-08 13:44:39'),
(39, '1', '543545', '张辉', '54354325', '171207123132608', 68, '2017-12-08 14:02:14'),
(40, '1', '100', '这里是vip班型介绍', '这里是VIP费用明细', '171209117', 21, '2017-12-09 16:11:06'),
(41, '2', '100', '这里是普通班介绍', '这里是普通班费用明细介绍', '171209117', 21, '2017-12-09 16:11:41'),
(42, '1', '1000', '20171225VIP班介绍', '20171225VIP班介绍费用明细介绍', '171207123132608', 68, '2017-12-25 15:18:25');

-- --------------------------------------------------------

--
-- 表的结构 `dingdan`
--

CREATE TABLE IF NOT EXISTS `dingdan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `e` varchar(500) NOT NULL,
  `f` varchar(500) NOT NULL,
  `g` varchar(500) NOT NULL,
  `h` varchar(500) NOT NULL,
  `i` varchar(500) NOT NULL,
  `j` varchar(500) NOT NULL,
  `k` varchar(500) NOT NULL,
  `l` varchar(500) NOT NULL,
  `m` varchar(500) NOT NULL,
  `n` varchar(500) NOT NULL,
  `o` varchar(255) NOT NULL,
  `p` varchar(255) NOT NULL,
  `q` varchar(255) NOT NULL,
  `r` varchar(255) NOT NULL,
  `s` varchar(255) NOT NULL,
  `t` varchar(255) NOT NULL,
  `fp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=216 ;

--
-- 转存表中的数据 `dingdan`
--

INSERT INTO `dingdan` (`id`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `fp`) VALUES
(210, '康盛驾校', '2', '3', '68', '300', '支付宝支付', '1', '1712132690718870', '2017120712330450.jpeg', '2', '37', '2017-12-13 09:01:47', '15911704571', '1', '171207123132608', '', '', '', '', '', ''),
(209, '红旗驾校', '2', '1', '21', '100', '支付宝支付', '1', '1712132670809240', '2017120916093050.jpg', '2', '41', '2017-12-13 08:58:28', '15911704571', '1', '171209117', '', '', '', '', '', ''),
(211, '康盛驾校', '2', '3', '68', '300', '支付宝支付', '1', '1712132691834509', '2017120712330450.jpeg', '2', '37', '2017-12-13 09:01:58', '15911704571', '1', '171207123132608', '', '', '', '', '', ''),
(212, '康盛驾校', '1', '3', '68', '123', '支付宝支付', '1', '1712141984052393', '2017120712330450.jpeg', '2', '38', '2017-12-14 10:50:40', '15911704571', '1', '171207123132608', '', '', '', '', '', ''),
(213, '康盛驾校', '1', '3', '68', '123', '支付宝支付', '1', '1712141985011787', '2017120712330450.jpeg', '2', '38', '2017-12-14 10:50:50', '15911704571', '1', '171207123132608', '', '', '', '', '', ''),
(214, '康盛驾校', '1', '3', '68', '123', '支付宝支付', '1', '1712150936112349', '2017120712330450.jpeg', '2', '38', '2017-12-15 11:42:41', '15911704571', '1', '171207123132608', '', '', '', '', '', ''),
(215, '康盛驾校', '1', '3', '68', '123', '支付宝支付', '1', '1712151097813384', '2017120712330450.jpeg', '2', '38', '2017-12-15 12:09:38', '15911704571', '1', '171207123132608', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `dingdan1`
--

CREATE TABLE IF NOT EXISTS `dingdan1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `e` varchar(500) NOT NULL,
  `f` varchar(500) NOT NULL,
  `g` varchar(500) NOT NULL,
  `h` varchar(500) NOT NULL,
  `i` varchar(500) NOT NULL,
  `j` varchar(500) NOT NULL,
  `k` varchar(500) NOT NULL,
  `l` varchar(500) NOT NULL,
  `m` varchar(500) NOT NULL,
  `n` varchar(500) NOT NULL,
  `o` varchar(255) NOT NULL,
  `p` varchar(255) NOT NULL,
  `q` varchar(255) NOT NULL,
  `r` varchar(255) NOT NULL,
  `s` varchar(255) NOT NULL,
  `t` varchar(255) NOT NULL,
  `fp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=65 ;

--
-- 转存表中的数据 `dingdan1`
--

INSERT INTO `dingdan1` (`id`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `fp`) VALUES
(58, '12', '张辉', '群魔', '5566', '支付宝支付', '2', '', '18206722101', '', '1712196228544314', '', '2017-12-19 13:44:45', '', '2', '', '', '', '', '', '', ''),
(59, '11', '陈小华', '云南省狂秘书呢会', '45', '支付宝支付', '2', '', '18206722101', '', '1712196230088074', '', '2017-12-19 13:45:00', '', '2', '', '', '', '', '', '', ''),
(60, '11', '陈小华', '云南省狂秘书呢会', '45', '支付宝支付', '2', '', '18206722101', '', '1712196233145906', '', '2017-12-19 13:45:31', '', '2', '', '', '', '', '', '', ''),
(61, '12', '张辉', '群魔', '5566', '支付宝支付', '2', '', '18206722101', '', '1712196234306851', '', '2017-12-19 13:45:43', '', '2', '', '', '', '', '', '', ''),
(62, '12', '张辉', '群魔', '5566', '支付宝支付', '2', '', '18206722101', '', '1712196234850605', '', '2017-12-19 13:45:48', '', '2', '', '', '', '', '', '', ''),
(63, '11', '陈小华', '云南省狂秘书呢会', '45', '支付宝支付', '2', '', '15911704571', '', '1712248468349552', '', '2017-12-24 11:04:43', '', '2', '', '', '', '', '', '', ''),
(64, '11', '???????????', '?o???????????????1|???????', '45', '支付宝支付', '2', '', '15911704571', '', '1712248474409082', '', '2017-12-24 11:05:44', '', '2', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `dingdan2`
--

CREATE TABLE IF NOT EXISTS `dingdan2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `e` varchar(500) NOT NULL,
  `f` varchar(500) NOT NULL,
  `g` varchar(500) NOT NULL,
  `h` varchar(500) NOT NULL,
  `i` varchar(500) NOT NULL,
  `j` varchar(500) NOT NULL,
  `k` varchar(500) NOT NULL,
  `l` varchar(500) NOT NULL,
  `m` varchar(500) NOT NULL,
  `n` varchar(500) NOT NULL,
  `o` varchar(255) NOT NULL,
  `p` varchar(255) NOT NULL,
  `q` varchar(255) NOT NULL,
  `r` varchar(255) NOT NULL,
  `s` varchar(255) NOT NULL,
  `t` varchar(255) NOT NULL,
  `fp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `dingdan2`
--

INSERT INTO `dingdan2` (`id`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `fp`) VALUES
(49, '8:30-12:30??13:30-17:30??18:30-21:30??全天', '1000', '28', '2', '2', '云南昆明', '15911704571', '支付宝支付', '2', '1712132696061126', '', '2017-12-13 09:02:40', '', '3', '', '', '', '', '', '', ''),
(50, '8:30-12:30??13:30-17:30??18:30-21:30??全天', '1000', '28', '2', '2', '云南昆明', '15911704571', '支付宝支付', '2', '1712132697143952', '', '2017-12-13 09:02:51', '', '3', '', '', '', '', '', '', ''),
(51, '8:30-12:30??????', '200', '29', '2', '2', '朱家村立交桥螺蛳湾故地', '13639195394', '微信支付', '2', '1712269119966139', '', '2017-12-26 20:26:39', '', '3', '', '', '', '', '', '', ''),
(52, '8:30-12:30??????', '200', '29', '2', '2', '朱家村立交桥螺蛳湾故地', '13639195394', '支付宝支付', '2', '1712269120792706', '', '2017-12-26 20:26:47', '', '3', '', '', '', '', '', '', ''),
(53, '????18:30-21:30??', '300', '28', '2', '2', '云南昆明', '18988484593', '微信支付', '2', '1712275272783244', '', '2017-12-27 13:32:07', '', '3', '', '', '', '', '', '', ''),
(54, '??????全天', '400', '28', '2', '2', '云南昆明', '18984420737', '微信支付', '2', '1801034973360997', '', '2018-01-03 11:22:13', '', '3', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `dingdan3`
--

CREATE TABLE IF NOT EXISTS `dingdan3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `e` varchar(500) NOT NULL,
  `f` varchar(500) NOT NULL,
  `g` varchar(500) NOT NULL,
  `h` varchar(500) NOT NULL,
  `i` varchar(500) NOT NULL,
  `j` varchar(500) NOT NULL,
  `k` varchar(500) NOT NULL,
  `l` varchar(500) NOT NULL,
  `m` varchar(500) NOT NULL,
  `n` varchar(500) NOT NULL,
  `o` varchar(255) NOT NULL,
  `p` varchar(255) NOT NULL,
  `q` varchar(255) NOT NULL,
  `r` varchar(255) NOT NULL,
  `s` varchar(255) NOT NULL,
  `t` varchar(255) NOT NULL,
  `fp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=69 ;

--
-- 转存表中的数据 `dingdan3`
--

INSERT INTO `dingdan3` (`id`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `fp`) VALUES
(57, '75', '15911704571', '', '1', '12', '5', '支付宝支付', '2', '康生驾校', '32', '1712132715581688', '2017-12-13 09:05:55', '', '4', '', '', '', '', '', '', ''),
(58, '75', '15911704571', '', '1', '12', '5', '支付宝支付', '2', '康生驾校', '32', '1712132716639514', '2017-12-13 09:06:06', '', '4', '', '', '', '', '', '', ''),
(59, '75', '15911704571', '', '1', '12', '5', '支付宝支付', '2', '康生驾校', '32', '1712141978630414', '2017-12-14 10:49:46', '', '4', '', '', '', '', '', '', ''),
(60, '75', '15911704571', '', '1', '12', '5', '支付宝支付', '2', '康生驾校', '32', '1712141979621058', '2017-12-14 10:49:56', '', '4', '', '', '', '', '', '', ''),
(61, '75', '15911704571', '', '1', '12', '5', '支付宝支付', '2', '康生驾校', '32', '1712141981166400', '2017-12-14 10:50:11', '', '4', '', '', '', '', '', '', ''),
(62, '75', '15911704571', '', '1', '12', '5', '支付宝支付', '2', '康生驾校', '32', '1712142042700785', '2017-12-14 11:00:27', '', '4', '', '', '', '', '', '', ''),
(63, '75', '15911704571', '', '1', '12', '5', '支付宝支付', '2', '康生驾校', '32', '1712142097303786', '2017-12-14 11:09:33', '', '4', '', '', '', '', '', '', ''),
(64, '73', '15911704571', '', '1', '100', '5', '支付宝支付', '2', '安通驾校', '32', '1712142115883830', '2017-12-14 11:12:38', '', '4', '', '', '', '', '', '', ''),
(67, '75', '18988484593', '', '1', '12', '5', '微信支付', '2', '康生驾校', '32', '1712275282120803', '2017-12-27 13:33:41', '', '4', '', '', '', '', '', '', ''),
(66, '75', '15911704571', '', '1', '12', '5', '支付宝支付', '2', '康生驾校', '32', '1712142122902715', '2017-12-14 11:13:49', '', '4', '', '', '', '', '', '', ''),
(68, '75', '18988484593', '', '1', '12', '5', '支付宝支付', '2', '康生驾校', '32', '1712275284453631', '2017-12-27 13:34:04', '', '4', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
