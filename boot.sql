-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-04-18 17:38:14
-- 服务器版本： 5.7.21-log
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boot`
--

-- --------------------------------------------------------

--
-- 表的结构 `boot_admin`
--

CREATE TABLE IF NOT EXISTS `boot_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `login_num` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `last_login_time` int(11) NOT NULL,
  `last_login_ip` varchar(18) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `head_image` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_admin`
--

INSERT INTO `boot_admin` (`id`, `user`, `pass`, `nickname`, `login_num`, `create_time`, `update_time`, `last_login_time`, `last_login_ip`, `status`, `head_image`) VALUES
(1, 'admin', '632581fc3c88929b90692783d4072eba4e89549c', '老张', 0, 1502960972, 1502960972, 0, '0', 0, '20170829\\3c73284788f108fdf179b7b31ac221d2.png');

-- --------------------------------------------------------

--
-- 表的结构 `boot_advert`
--

CREATE TABLE IF NOT EXISTS `boot_advert` (
  `id` int(10) unsigned NOT NULL,
  `cate_id` int(5) unsigned NOT NULL,
  `title` varchar(300) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(1) DEFAULT '0',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20055 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `boot_advert_cate`
--

CREATE TABLE IF NOT EXISTS `boot_advert_cate` (
  `id` int(10) NOT NULL,
  `name` varchar(16) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `order` int(2) NOT NULL DEFAULT '50'
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `boot_article`
--

CREATE TABLE IF NOT EXISTS `boot_article` (
  `id` int(10) unsigned NOT NULL,
  `cate_id` int(5) unsigned NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `views` int(10) NOT NULL COMMENT '浏览量',
  `keywords` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `is_tui` int(1) DEFAULT '0',
  `status` int(1) DEFAULT '0',
  `ip` varchar(16) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=200513 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_article`
--

INSERT INTO `boot_article` (`id`, `cate_id`, `title`, `content`, `author`, `photo`, `views`, `keywords`, `description`, `is_tui`, `status`, `ip`, `create_time`, `update_time`) VALUES
(200505, 34, 'Boot-CMS 今天正式上线了', '<p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">Boot-CMS地址：</span></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;"><a href="https://www.boot-z.com">https://www.boot-z.com</a></span></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;"> </span><br/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">测试地址：暂无</span></p><p><font face="微软雅黑, Verdana, sans-serif, 宋体"><span style="font-size: 18px;">源码下载: 进入官网下载 或者 &nbsp;加群:172020040 (免费)下载</span></font></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">做一个简单的企业网站&nbsp;只需要简单的进行前端模板嵌套&nbsp;30分钟即可做一个企业网站</span><br/><br/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">手册:看云(&quot;https://www.kancloud.cn/zjh852952656/test/583448&quot;)</span><br/><img src="/ueditor/php/upload/image/20180418/1524043806172232.png" title="1524043806172232.png" alt="11.png" width="1447" height="525"/></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;"><br/></span></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;"><img src="/ueditor/php/upload/image/20180418/1524043844746440.png" title="1524043844746440.png" alt="22.png"/></span></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">本次更新（20180418）：</span><br/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 13px;"><strong>功能清单</strong></span><br/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">系统管理</span><br/><img src="/ueditor/php/upload/image/20180418/1524043856523627.png" title="1524043856523627.png" alt="1.png"/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">权限管理</span><br/><img src="/ueditor/php/upload/image/20180418/1524043865927119.png" title="1524043865927119.png" alt="2.png"/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">会员管理</span><br/><br/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">文章管理</span><br/><br/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">广告管理</span><br/><br/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">菜单管理</span><br/><br/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">留言管理</span><br/><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">模板管理</span></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;"><br/></span></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">以下为示例:</span></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;</span></p><p><img src="/ueditor/php/upload/image/20180418/1524043899230540.png" title="1524043899230540.png"/></p><p><img src="/ueditor/php/upload/image/20180418/1524043899963426.png" title="1524043899963426.png"/></p><p><img src="/ueditor/php/upload/image/20180418/1524043899890599.png" title="1524043899890599.png"/></p><p><img src="/ueditor/php/upload/image/20180418/1524043900821816.png" title="1524043900821816.png"/></p><p><img src="/ueditor/php/upload/image/20180418/1524043901777533.png" title="1524043901777533.png"/></p><p><img src="/ueditor/php/upload/image/20180418/1524043901123546.png" title="1524043901123546.png"/></p><p><img src="/ueditor/php/upload/image/20180418/1524043901687635.png" title="1524043901687635.png"/></p><p><span style="font-family: 微软雅黑, Verdana, sans-serif, 宋体; font-size: 18px;"><br/></span><br/></p>', '老张', '20180418\\41ed029de582dfdc5e2210df4afde8b8.jpg', 15631, 'Boot-CMS ,正式,上线', 'Boot-CMS 今天正式上线了', 1, 1, '123.124.209.98', 1523944416, 1524043984);

-- --------------------------------------------------------

--
-- 表的结构 `boot_article_cate`
--

CREATE TABLE IF NOT EXISTS `boot_article_cate` (
  `id` int(10) NOT NULL,
  `name` varchar(16) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `order` int(2) NOT NULL DEFAULT '50',
  `p_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_article_cate`
--

INSERT INTO `boot_article_cate` (`id`, `name`, `create_time`, `update_time`, `status`, `order`, `p_id`) VALUES
(34, '更新日志', 1523933236, 1524038688, 1, 30, 0),
(38, '程序笔记', 1524041058, 1524041058, 1, 20, 0);

-- --------------------------------------------------------

--
-- 表的结构 `boot_auth_group`
--

CREATE TABLE IF NOT EXISTS `boot_auth_group` (
  `id` mediumint(8) unsigned NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(500) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_auth_group`
--

INSERT INTO `boot_auth_group` (`id`, `title`, `status`, `rules`, `create_time`, `update_time`) VALUES
(1, '超级管理员', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120', 1506335119, 1506335119);

-- --------------------------------------------------------

--
-- 表的结构 `boot_auth_group_access`
--

CREATE TABLE IF NOT EXISTS `boot_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_auth_group_access`
--

INSERT INTO `boot_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(2, 14);

-- --------------------------------------------------------

--
-- 表的结构 `boot_auth_rule`
--

CREATE TABLE IF NOT EXISTS `boot_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `p_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_auth_rule`
--

INSERT INTO `boot_auth_rule` (`id`, `name`, `title`, `type`, `status`, `condition`, `p_id`, `sort`, `create_time`, `update_time`) VALUES
(1, 'config', '系统管理', 1, 1, '', 0, 90, 0, 1523365018),
(2, 'article', '文章管理', 1, 1, '', 0, 70, 0, 1502951706),
(3, 'advert', '广告管理', 1, 1, '', 0, 50, 0, 1502951665),
(63, 'admin/member/update_cate', '编辑类型', 1, 1, '', 57, 50, 1503280589, 1503280589),
(5, 'menu', '菜单管理', 1, 1, '', 0, 40, 0, 1502951633),
(6, 'message', '留言管理', 1, 1, '', 0, 30, 0, 1502951613),
(7, 'admin/config/seo', '优化设置', 1, 1, '', 1, 0, 0, 1502948881),
(8, 'admin/config/sms', '短信设置', 1, 1, '', 1, 0, 0, 1502939199),
(9, 'admin/config/email', '邮件设置', 1, 1, '', 1, 0, 0, 1502939407),
(10, 'admin/config/administrator', '个人中心', 1, 1, '', 1, 0, 0, 1502939410),
(11, 'admin/article/list_article', '文章列表', 1, 1, '', 2, 1, 0, 1508472058),
(12, 'admin/article/insert_article', '发布文章', 1, 1, '', 11, 0, 0, 1502951700),
(13, 'admin/article/update_article', '编辑文章', 1, 1, '', 11, 0, 0, 1502951696),
(14, 'admin/article/delete_article', '删除文章', 1, 1, '', 11, 0, 0, 1502951693),
(15, 'admin/article/status_article', '文章状态', 1, 1, '', 11, 0, 0, 1502951690),
(16, 'admin/article/istui_article', '推荐文章', 1, 1, '', 11, 0, 0, 1502951687),
(17, 'admin/article/list_cate', '分类列表', 1, 1, '', 2, 0, 0, 1502951684),
(18, 'admin/article/insert_cate', '发布分类', 1, 1, '', 17, 0, 0, 1502951681),
(19, 'admin/article/update_cate', '编辑分类', 1, 1, '', 17, 0, 0, 1502951677),
(21, 'admin/article/status_cate', '分类状态', 1, 1, '', 17, 0, 0, 1502951675),
(20, 'admin/article/delete_cate', '删除分类', 1, 1, '', 17, 0, 0, 1502951671),
(22, 'admin/advert/list_advert', '广告列表', 1, 1, '', 3, 0, 0, 1502951650),
(23, 'admin/advert/insert_advert', '发布广告', 1, 1, '', 22, 0, 0, 1502951636),
(24, 'admin/advert/update_advert', '更新广告', 1, 1, '', 22, 0, 0, 1502951639),
(25, 'admin/advert/delete_advert', '删除广告', 1, 1, '', 22, 0, 0, 1502951642),
(26, 'admin/advert/status_advert', '广告状态', 1, 1, '', 22, 0, 0, 1502951644),
(27, 'admin/advert/istui_advert', '推荐广告', 1, 1, '', 22, 0, 0, 1502951647),
(28, 'admin/advert/list_cate', '广告组列表', 1, 1, '', 3, 0, 0, 1502951663),
(29, 'admin/advert/insert_cate', '发布广告组', 1, 1, '', 28, 0, 0, 1502951652),
(30, 'admin/advert/update_cate', '更新广告组', 1, 1, '', 28, 0, 0, 1514186888),
(31, 'admin/advert/delete_cate', '删除广告组', 1, 1, '', 28, 0, 0, 1502951657),
(32, 'admin/advert/status_cate', '广告组状态', 1, 1, '', 28, 0, 0, 1502951660),
(35, 'admin/message/list_message', '留言列表', 1, 1, '', 6, 0, 0, 1502951611),
(36, 'admin/message/delete_message', '删除留言', 1, 1, '', 35, 0, 0, 1502951608),
(37, 'admin/message/status_message', '留言状态', 1, 1, '', 35, 0, 0, 1502950596),
(38, 'admin/menu_home/list_menu', '前端菜单', 1, 1, '', 5, 0, 0, 1502951630),
(39, 'admin/menu_home/insert_menu', '添加菜单', 1, 1, '', 38, 0, 0, 1502951628),
(40, 'admin/menu_home/delete_menu', '删除菜单', 1, 1, '', 38, 0, 0, 1502951624),
(41, 'admin/menu_home/status_menu', '菜单状态', 1, 1, '', 38, 0, 0, 1502951622),
(42, 'admin/menu_home/update_menu', '更新菜单', 1, 1, '', 38, 0, 0, 1502951619),
(43, 'admin/menu_home/insert_page', '上传单页', 1, 1, '', 38, 0, 0, 1502951616),
(55, 'member', '会员管理', 1, 1, '', 0, 50, 1503280213, 1503280213),
(56, 'admin/member/list_member', '会员列表', 1, 1, '', 55, 50, 1503280270, 1503280270),
(57, 'admin/member/list_cate', '会员类型', 1, 1, '', 55, 50, 1503280300, 1503280300),
(58, 'admin/member/insert_member', '添加会员', 1, 1, '', 56, 50, 1503280363, 1503280363),
(59, 'admin/member/update_member', '编辑会员', 1, 1, '', 56, 50, 1503280419, 1503280419),
(60, 'admin/member/delete_member', '删除会员', 1, 1, '', 56, 50, 1503280476, 1503280476),
(61, 'admin/member/status_member', '会员状态', 1, 1, '', 56, 50, 1503280504, 1503280504),
(62, 'admin/member/insert_cate', '添加类型', 1, 1, '', 57, 50, 1503280537, 1503280537),
(64, 'admin/member/delete_cate', '删除类型', 1, 1, '', 57, 50, 1503280626, 1503280626),
(65, 'admin/member/status_cate	', '类型状态', 1, 1, '', 57, 50, 1503280658, 1503280658),
(66, 'auth', '权限管理', 1, 1, '', 0, 50, 1503329535, 1503329535),
(67, 'admin/auth/list_menu', '权限菜单', 1, 1, '', 66, 50, 1503329574, 1503329574),
(68, 'admin/auth/list_user', '用户管理', 1, 1, '', 66, 50, 1503329598, 1503329598),
(69, 'admin/auth/list_group', '角色管理', 1, 1, '', 66, 50, 1503329650, 1503329650),
(70, 'admin/auth/status_auth', '权限状态', 1, 1, '', 67, 50, 1503329714, 1503329714),
(71, 'admin/auth/delete_auth', '权限删除', 1, 1, '', 67, 50, 1503329756, 1503329756),
(72, 'admin/auth/insert_auth', '权限添加', 1, 1, '', 67, 50, 1503329756, 1503329756),
(73, 'admin/auth/update_auth', '权限编辑', 1, 1, '', 67, 50, 1503329756, 1503329756),
(74, 'admin/auth/insert_group', '角色添加', 1, 1, '', 68, 50, 1503329756, 1503329756),
(75, 'admin/auth/update_group', '角色编辑', 1, 1, '', 68, 50, 1503329756, 1503329756),
(76, 'admin/auth/status_group', '角色状态', 1, 1, '', 68, 50, 1503329756, 1503329756),
(78, 'admin/auth/delete_group', '角色删除', 1, 1, '', 68, 50, 1503329765, 1150332975),
(79, 'admin/auth/status_user', '用户状态', 1, 1, '', 69, 50, 1503329765, 1503329765),
(80, 'admin/auth/delete_user', '用户删除', 1, 1, '', 69, 50, 1503329765, 1503329765),
(81, 'admin/auth/insert_user', '用户添加', 1, 1, '', 69, 50, 1503329765, 1503329765),
(82, 'admin/auth/update_user', '用户编辑', 1, 1, '', 69, 50, 1503329765, 1503329765),
(83, 'admin/menu_admin/list_menu', '后端菜单', 1, 1, '', 5, 50, 1503543188, 1503543188),
(84, 'admin/menu_admin/insert_menu', '添加菜单', 1, 1, '', 83, 50, 1503543242, 1503543242),
(85, 'admin/menu_admin/delete_menu', '删除菜单', 1, 1, '', 83, 50, 1503543266, 1503543266),
(86, 'admin/menu_admin/update_menu', '编辑菜单', 1, 1, '', 83, 50, 1503543286, 1503543286),
(87, 'template', '模板管理', 1, 1, '', 0, 20, 1517452693, 1517452693),
(88, 'admin/template/list_template', '模板列表', 1, 1, '', 87, 50, 1517452790, 1517452790),
(89, 'admin/template/list_cate', '模板类型', 1, 1, '', 87, 50, 1517452841, 1517452841),
(90, 'admin/template/insert_template', '添加模板', 1, 1, '', 88, 50, 1517452933, 1517452933),
(91, 'admin/template/update_template', '更新模板', 1, 1, '', 88, 50, 1517452950, 1517452950),
(92, 'admin/template/delete_template', '删除模板', 1, 1, '', 88, 50, 1517452962, 1517452962),
(97, 'admin/auth/give_auth', '分配权限', 1, 1, '', 69, 50, 1517453375, 1517453375),
(94, 'admin/template/insert_cate', '添加类型', 1, 1, '', 89, 50, 1517453101, 1517453101),
(95, 'admin/template/update_cate', '编辑类型', 1, 1, '', 89, 50, 1517453118, 1517453118),
(96, 'admin/template/delete_cate', '删除类型', 1, 1, '', 89, 50, 1517453139, 1517453139),
(98, 'product', '产品管理', 1, 1, '', 0, 50, 1518075646, 1518075646),
(99, 'admin/product/list_product', '产品列表', 1, 1, '', 98, 50, 1518076128, 1518076128),
(100, 'admin/product/insert_product', '添加产品', 1, 1, '', 99, 50, 1518077017, 1518077017),
(101, 'admin/product/list_cate', '分类列表', 1, 1, '', 98, 50, 1518077314, 1518077314),
(102, 'admin/product/insert_cate', '添加分类', 1, 1, '', 101, 50, 1518077461, 1518077461),
(103, 'admin/product/delete_product', '删除产品', 1, 1, '', 99, 50, 1518078081, 1518078081),
(104, 'admin/product/update_product', '编辑产品', 1, 1, '', 99, 50, 1518078111, 1518078111),
(105, 'admin/product/status_product', '产品状态', 1, 1, '', 99, 50, 1518078133, 1518078133),
(106, 'admin/product/isTui_product', '推荐产品', 1, 1, '', 99, 50, 1518078154, 1518078154),
(107, 'admin/product/delete_cate', '删除分类', 1, 1, '', 101, 50, 1518078202, 1518078202),
(108, 'admin/product/update_cate', '编辑分类', 1, 1, '', 101, 50, 1518078222, 1518078222),
(109, 'admin/product/status_cate', '分类状态', 1, 1, '', 101, 50, 1518078279, 1518078279),
(110, 'admin/menu_home/findTemplateLink', '选择模板', 1, 1, '', 90, 50, 1518146524, 1518146524);

-- --------------------------------------------------------

--
-- 表的结构 `boot_config`
--

CREATE TABLE IF NOT EXISTS `boot_config` (
  `id` int(2) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `value` varchar(500) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_config`
--

INSERT INTO `boot_config` (`id`, `name`, `value`) VALUES
(1, 'web_title', 'Boot-cms'),
(2, 'web_keywords', 'Boot-cms'),
(3, 'web_description', 'Boot-cms'),
(4, 'web_icp', '京ICP备17044002号-2'),
(5, 'web_statis', ''),
(6, 'web_logo', '20180418\\dc1112a6f402ff99c6b8e70260fda0b2.png'),
(7, 'web_author', '1'),
(8, 'web_aliappkey', 'Test'),
(9, 'web_alisecretkey', 'Test'),
(10, 'web_email_name', 'Test'),
(11, 'web_email_server_address', 'Test'),
(12, 'web_email_address', 'Test'),
(13, 'web_email_account', 'Test'),
(14, 'web_email_password', 'Test');

-- --------------------------------------------------------

--
-- 表的结构 `boot_member`
--

CREATE TABLE IF NOT EXISTS `boot_member` (
  `id` int(10) unsigned NOT NULL,
  `cate_id` int(5) unsigned NOT NULL,
  `account` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `login_num` int(10) NOT NULL COMMENT '浏览量',
  `status` int(1) DEFAULT '0',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `reg_ip` varchar(22) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20026 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `boot_member_cate`
--

CREATE TABLE IF NOT EXISTS `boot_member_cate` (
  `id` int(10) NOT NULL,
  `name` varchar(16) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `order` int(2) NOT NULL DEFAULT '50'
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `boot_menu_admin`
--

CREATE TABLE IF NOT EXISTS `boot_menu_admin` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `ico` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_menu_admin`
--

INSERT INTO `boot_menu_admin` (`id`, `pid`, `name`, `url`, `ico`, `sort`, `create_time`, `update_time`) VALUES
(1, 0, '系统管理', 'config', 'fa fa-gear', 10, 0, 0),
(2, 1, '优化设置', 'admin/config/seo', '', 0, 0, 0),
(3, 1, '短信设置', 'admin/config/sms', '', 0, 0, 0),
(4, 1, '邮件设置', 'admin/config/email', '', 0, 0, 0),
(5, 1, '个人中心', 'admin/config/administrator', '', 0, 0, 0),
(6, 0, '文章管理', 'article', 'fa fa-book', 28, 0, 0),
(7, 6, '文章列表', 'admin/article/list_article', '', 20, 0, 0),
(8, 6, '分类列表', 'admin/article/list_cate', '', 30, 0, 0),
(9, 0, '广告管理', 'advert', 'fa fa-image', 30, 0, 0),
(10, 9, '广告组', 'admin/advert/list_cate', '', 0, 0, 0),
(11, 9, '广告列表', 'admin/advert/list_advert', '', 0, 0, 0),
(12, 0, '菜单管理', 'menu', 'fa fa-reorder', 30, 0, 0),
(13, 12, '前端菜单', 'admin/menu_home/list_menu', '', 0, 0, 0),
(14, 12, '后端菜单', 'admin/menu_admin/list_menu', '', 0, 0, 0),
(15, 0, '留言管理', 'message', 'fa fa-envelope-o', 50, 0, 0),
(16, 15, '留言列表', 'admin/message/list_message', '', 0, 0, 0),
(17, 0, '权限管理', 'auth', 'fa fa-expeditedssl', 20, 0, 0),
(18, 17, '权限菜单', 'admin/auth/list_menu', '', 0, 0, 0),
(19, 17, '用户管理', 'admin/auth/list_user', '', 0, 0, 0),
(20, 17, '角色管理', 'admin/auth/list_group', '', 2, 0, 0),
(21, 0, '会员管理', 'member', 'fa fa-user', 25, 0, 0),
(22, 21, '会员类型', 'admin/member/list_cate', '', 0, 0, 0),
(23, 21, '会员列表', 'admin/member/list_member', '', 0, 0, 0),
(25, 0, '模板管理', 'template', 'fa fa-columns', 40, 1508473384, 1508473384),
(26, 25, '模板列表', 'admin/template/list_template', '', 10, 0, 0),
(27, 25, '模板类型', 'admin/template/list_cate', '', 20, 0, 0),
(28, 0, '产品管理', 'product', 'fa fa-laptop', 29, 1518075608, 1518075608),
(29, 28, '产品列表', 'admin/product/list_product', '', 50, 1518076085, 1518076085),
(30, 28, '分类列表', 'admin/product/list_cate', '', 50, 1518077428, 1518077428);

-- --------------------------------------------------------

--
-- 表的结构 `boot_menu_home`
--

CREATE TABLE IF NOT EXISTS `boot_menu_home` (
  `id` int(10) NOT NULL,
  `name` varchar(16) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `order` int(2) NOT NULL DEFAULT '50',
  `p_id` int(2) unsigned NOT NULL,
  `template_cate` int(11) NOT NULL,
  `template_link` varchar(30) NOT NULL,
  `is_list` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_menu_home`
--

INSERT INTO `boot_menu_home` (`id`, `name`, `keywords`, `description`, `content`, `create_time`, `update_time`, `status`, `order`, `p_id`, `template_cate`, `template_link`, `is_list`) VALUES
(31, '首页', '首页', '首页', '', 1523932696, 1523932696, 1, 10, 0, 1, '/index/index/index', 0),
(34, '更新日志', '技术笔记,更新日志', '技术笔记更新日志', '', 1523933236, 1524038688, 1, 30, 0, 2, '/index/article/lists/page/34', 1),
(35, '程序笔记', '程序笔记', '程序笔记', NULL, 1524041058, 1524041058, 1, 20, 0, 2, '/index/article/lists/page/38', 1),
(36, '联系我们', '联系我们', '联系我们', '', 1523936914, 1523936914, 1, 60, 0, 9, '/index/page/us/page/36', 0);

-- --------------------------------------------------------

--
-- 表的结构 `boot_message`
--

CREATE TABLE IF NOT EXISTS `boot_message` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(30) NOT NULL,
  `nick_name` varchar(25) NOT NULL,
  `content` varchar(500) NOT NULL,
  `is_ok` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_message`
--

INSERT INTO `boot_message` (`id`, `email`, `nick_name`, `content`, `is_ok`, `create_time`, `update_time`, `ip`) VALUES
(16, '', '', '', 0, 1523947588, 1523947588, '127.0.0.1'),
(17, '', '', '', 0, 1523947657, 1523947657, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `boot_product`
--

CREATE TABLE IF NOT EXISTS `boot_product` (
  `id` int(10) unsigned NOT NULL,
  `cate_id` int(5) unsigned NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `views` int(10) NOT NULL COMMENT '浏览量',
  `keywords` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `is_tui` int(1) DEFAULT '0',
  `status` int(1) DEFAULT '0',
  `ip` varchar(16) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=200506 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `boot_product_cate`
--

CREATE TABLE IF NOT EXISTS `boot_product_cate` (
  `id` int(10) NOT NULL,
  `name` varchar(16) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `order` int(2) NOT NULL DEFAULT '50',
  `p_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `boot_template`
--

CREATE TABLE IF NOT EXISTS `boot_template` (
  `id` int(10) unsigned NOT NULL,
  `cate_id` int(5) unsigned NOT NULL,
  `title` varchar(300) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(1) DEFAULT '0',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_template`
--

INSERT INTO `boot_template` (`id`, `cate_id`, `title`, `url`, `status`, `create_time`, `update_time`) VALUES
(1, 1, '首页模板', '/index/index/index', 0, 1508752156, 1508752156),
(2, 2, '文章模板', '/index/article/lists', 0, 1508752267, 1508752267),
(3, 3, '图片模板', '/index/photo/lists', 0, 1508752310, 1508752310),
(4, 2, '详情模板（文章）', '/index/article/index', 0, 1508752338, 1508752338),
(5, 5, '单页模板', '/index/page/index', 0, 1508752378, 1508752378),
(6, 7, '产品模板', '/index/product/lists', 0, 1508752378, 1508752378),
(7, 7, '详情模板（产品）', '/index/product/index', 0, 1508752378, 1508752378),
(11, 9, '服务展示', '/index/page/server', 0, 1523936747, 1523936747),
(12, 9, '联系我们', '/index/page/us', 0, 1523936897, 1523936897);

-- --------------------------------------------------------

--
-- 表的结构 `boot_template_cate`
--

CREATE TABLE IF NOT EXISTS `boot_template_cate` (
  `id` int(10) NOT NULL,
  `name` varchar(16) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `order` int(2) NOT NULL DEFAULT '50'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `boot_template_cate`
--

INSERT INTO `boot_template_cate` (`id`, `name`, `create_time`, `update_time`, `status`, `order`) VALUES
(1, '首页类', 1508751684, 1508751684, 1, 10),
(2, '文章类', 1508751699, 1508751699, 1, 20),
(3, '图片类', 1508751710, 1508751715, 1, 30),
(5, '单页类', 1508751736, 1508751736, 1, 50),
(6, '外链类', 1510111311, 1510111319, 1, 60),
(7, '产品类', 1510111311, 1510111319, 1, 70),
(9, '活动类', 1523936695, 1523936695, 1, 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boot_admin`
--
ALTER TABLE `boot_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_advert`
--
ALTER TABLE `boot_advert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_advert_cate`
--
ALTER TABLE `boot_advert_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_article`
--
ALTER TABLE `boot_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_article_cate`
--
ALTER TABLE `boot_article_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_auth_group`
--
ALTER TABLE `boot_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_auth_group_access`
--
ALTER TABLE `boot_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `boot_auth_rule`
--
ALTER TABLE `boot_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `boot_config`
--
ALTER TABLE `boot_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_member`
--
ALTER TABLE `boot_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_member_cate`
--
ALTER TABLE `boot_member_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_menu_admin`
--
ALTER TABLE `boot_menu_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_menu_home`
--
ALTER TABLE `boot_menu_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_message`
--
ALTER TABLE `boot_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_product`
--
ALTER TABLE `boot_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_product_cate`
--
ALTER TABLE `boot_product_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_template`
--
ALTER TABLE `boot_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boot_template_cate`
--
ALTER TABLE `boot_template_cate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boot_admin`
--
ALTER TABLE `boot_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `boot_advert`
--
ALTER TABLE `boot_advert`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20055;
--
-- AUTO_INCREMENT for table `boot_advert_cate`
--
ALTER TABLE `boot_advert_cate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `boot_article`
--
ALTER TABLE `boot_article`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=200513;
--
-- AUTO_INCREMENT for table `boot_article_cate`
--
ALTER TABLE `boot_article_cate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `boot_auth_group`
--
ALTER TABLE `boot_auth_group`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `boot_auth_rule`
--
ALTER TABLE `boot_auth_rule`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `boot_config`
--
ALTER TABLE `boot_config`
  MODIFY `id` int(2) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `boot_member`
--
ALTER TABLE `boot_member`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20026;
--
-- AUTO_INCREMENT for table `boot_member_cate`
--
ALTER TABLE `boot_member_cate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `boot_menu_admin`
--
ALTER TABLE `boot_menu_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `boot_menu_home`
--
ALTER TABLE `boot_menu_home`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `boot_message`
--
ALTER TABLE `boot_message`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `boot_product`
--
ALTER TABLE `boot_product`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=200506;
--
-- AUTO_INCREMENT for table `boot_product_cate`
--
ALTER TABLE `boot_product_cate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `boot_template`
--
ALTER TABLE `boot_template`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `boot_template_cate`
--
ALTER TABLE `boot_template_cate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
