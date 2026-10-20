/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : zrdh/zrdh.sql
 * @Copyright (c) Cumin All Rights Reserved.
 */

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:3306
-- 生成日期： 2021-01-17 12:37:42
-- 服务器版本： 5.6.49
-- PHP 版本： 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `zrdh`（导入前请修改为你的库名）
--

-- --------------------------------------------------------

--
-- 表的结构 `zzdh_apply`
--

CREATE TABLE `zzdh_apply` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `sortname` text NOT NULL,
  `url` text NOT NULL,
  `keywords` text NOT NULL,
  `introduce` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- 表的结构 `zzdh_config`
--

CREATE TABLE `zzdh_config` (
  `name` varchar(255) NOT NULL,
  `main` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zzdh_config`
--

INSERT INTO `zzdh_config` (`name`, `main`) VALUES
('admin_user', 'admin'),
('admin_pwd', '123456'),
('qq', '2937978586'),
('email', '2937978586@qq.com'),
('name', '孜然导航网-专注与分享'),
('title', '孜然导航网-专注与分享'),
('keywords', '孜然导航网,技术导航网,自动收录,自动收录大全,导航大全,网址导航网,导航系统,导航源码,自动收录网'),
('description', '孜然导航网是最具权威的免费收录网址导航,中文网址导航,技术导航,上网导航,汇集最优秀的网站及资源。及时收录影视,音乐,小说,论坛,游戏等分类的网址和内容,让您的网络生活更简单精彩。 '),
('icp', ''),
('time', '2021-01-04'),
('api', 'https://blinky.nemui.org/shot/xlarge?'),
('info', ''),
('submit', '修改');

-- --------------------------------------------------------

--
-- 表的结构 `zzdh_list`
--

CREATE TABLE `zzdh_list` (
  `id` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `sortname` text NOT NULL,
  `url` text NOT NULL,
  `alias` text NOT NULL,
  `introduce` text NOT NULL,
  `time` text NOT NULL,
  `addtime` text NOT NULL,
  `view_date` datetime DEFAULT NULL COMMENT '最后点击时间',
  `view` int(20) NOT NULL,
  `view_month` int(20) NOT NULL COMMENT '月点击数',
  `view_week` int(20) DEFAULT '0' COMMENT '周点击数',
  `view_day` int(20) DEFAULT '0' COMMENT '日点击数',
  `love` text NOT NULL,
  `tui` int(2) NOT NULL DEFAULT '0',
  `dj` int(2) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zzdh_list`
--

INSERT INTO `zzdh_list` (`id`, `lid`, `name`, `img`, `sortname`, `url`, `alias`, `introduce`, `time`, `addtime`, `view_date`, `view`, `view_month`, `view_week`, `view_day`, `love`, `tui`, `dj`) VALUES
(2, 1, '孜然导航网', 'http://zrv7.com/assets/images/logo.png', '导航大全', 'http://zrv7.com', '站长QQ2937978586', '免费收录，各大平台的网站', '1610540020', '1609241595', '2021-01-17 10:23:01', 10000, 1752, 43, 28, '', 1, 5);

-- --------------------------------------------------------

--
-- 表的结构 `zzdh_nav`
--

CREATE TABLE `zzdh_nav` (
  `id` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `icon` text NOT NULL,
  `name` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zzdh_nav`
--

INSERT INTO `zzdh_nav` (`id`, `nid`, `icon`, `name`, `url`) VALUES
(1, 1, 'fa fa-home', '导航首页', './'),
(3, 2, 'fa fa-plus-square', '申请收录', 'apply.html '),
(5, 4, 'fa fa-bar-chart', '网站排名', 'top.html'),
(6, 5, 'fa-adjust', '本站源码', 'http://wpa.qq.com/msgrd?v=3&uin=2937978586&site=qq&menu=yes'),
(7, 10, 'fa fa-info-circle', '关于我们', 'about.php'),
(9, 6, 'fa-paw', '登录后台', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `zzdh_notice`
--

CREATE TABLE `zzdh_notice` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zzdh_notice`
--

INSERT INTO `zzdh_notice` (`id`, `content`) VALUES
(1, '欢迎使用孜然导航系统，有不会的可以加QQ2937978586询问，或者访问官网www.zrv7.com');
-- --------------------------------------------------------

--
-- 表的结构 `zzdh_sort`
--

CREATE TABLE `zzdh_sort` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `icon` text NOT NULL,
  `sortname` text NOT NULL,
  `alias` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zzdh_sort`
--

INSERT INTO `zzdh_sort` (`id`, `sid`, `icon`, `sortname`, `alias`) VALUES
(1, 1, 'fa fa-book fa-fw', '博客功略', ''),
(2, 2, 'fa-paper-plane', '导航大全', ''),
(3, 3, 'fa fa-cubes fa-fw', '资源教程', ''),
(4, 4, 'fa-windows', '主机互联', ''),
(5, 5, 'fa fa-gavel fa-fw', '工具网站', ''),
(7, 9, 'fa-cog', '其他分类', ''),
(11, 6, 'fa-money ', '支付专栏', ''),
(10, 7, 'fa-comments-o', '论坛社区', ''),
(12, 8, 'fa-youtube-play', '影视小说', '');

--
-- 转储表的索引
--

--
-- 表的索引 `zzdh_apply`
--
ALTER TABLE `zzdh_apply`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `zzdh_config`
--
ALTER TABLE `zzdh_config`
  ADD PRIMARY KEY (`name`);

--
-- 表的索引 `zzdh_list`
--
ALTER TABLE `zzdh_list`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `zzdh_nav`
--
ALTER TABLE `zzdh_nav`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `zzdh_notice`
--
ALTER TABLE `zzdh_notice`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `zzdh_sort`
--
ALTER TABLE `zzdh_sort`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `zzdh_apply`
--
ALTER TABLE `zzdh_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- 使用表AUTO_INCREMENT `zzdh_list`
--
ALTER TABLE `zzdh_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- 使用表AUTO_INCREMENT `zzdh_nav`
--
ALTER TABLE `zzdh_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `zzdh_notice`
--
ALTER TABLE `zzdh_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `zzdh_sort`
--
ALTER TABLE `zzdh_sort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
