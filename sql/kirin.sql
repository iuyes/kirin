-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 27 日 07:57
-- 服务器版本: 5.0.51b-log
-- PHP 版本: 5.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `kirin`
--
CREATE DATABASE IF NOT EXISTS `kirin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kirin`;

-- --------------------------------------------------------

--
-- 表的结构 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `collect_id` int(11) NOT NULL auto_increment COMMENT '收藏id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `goods_id` int(11) NOT NULL COMMENT '货物id',
  `collect_at` int(11) NOT NULL COMMENT '收藏添加时间',
  `collect_status` int(11) NOT NULL COMMENT '收藏状态，0正常，1被删除',
  PRIMARY KEY  (`collect_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL auto_increment,
  `comment_by` int(11) NOT NULL COMMENT '评论人',
  `comment_at` int(11) NOT NULL COMMENT '评论时间',
  `goods_id` int(11) NOT NULL COMMENT '评论商品id',
  `comment_content` varchar(255) NOT NULL COMMENT '评论内容',
  PRIMARY KEY  (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `goods_id` int(11) NOT NULL auto_increment,
  `goods_type` int(11) NOT NULL COMMENT '货物类型,1蔬菜 2水果',
  `goods_name` varchar(255) NOT NULL COMMENT '商品名称',
  `goods_price` varchar(32) NOT NULL COMMENT '商品价格',
  `goods_img` varchar(255) NOT NULL COMMENT '商品图片',
  `goods_add_by` int(11) NOT NULL COMMENT '商品添加人',
  `goods_add_at` int(11) NOT NULL COMMENT '商品添加时间',
  `goods_edit_at` int(11) NOT NULL COMMENT '最后一次编辑时间',
  `goods_total_comment` int(11) default '0',
  `goods_score` varchar(32) default '4',
  `goods_status` int(11) NOT NULL COMMENT '0正常 非零为删除时间',
  PRIMARY KEY  (`goods_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goods_id`, `goods_type`, `goods_name`, `goods_price`, `goods_img`, `goods_add_by`, `goods_add_at`, `goods_edit_at`, `goods_total_comment`, `goods_score`, `goods_status`) VALUES
(1, 1, '123213', '123.2', 'static/upload/20130627/1372317718-3344.png', 0, 1372313342, 1372317718, 0, '4', 0),
(2, 1, '1232135555555555555', '666661236666666666', 'static/upload/20130627/1372317586-3384.run', 0, 1372313439, 1372317586, 0, '4', 0),
(3, 2, '123213', '123', 'static/upload/20130627/1372313680-2079.txt', 0, 1372313680, 0, 0, '4', 0),
(4, 2, '123213', '123', 'static/upload/20130627/1372313719-9819.txt', 9, 1372313719, 0, 0, '4', 0),
(5, 2, '123213', '123', 'static/upload/20130627/1372314186-9462.txt', 9, 1372314186, 0, 0, '4', 0),
(6, 2, '123213', '123', 'static/upload/20130627/1372314235-7836.txt', 9, 1372314235, 0, 0, '4', 0),
(7, 2, '123213', '123', 'static/upload/20130627/1372314243-4900.txt', 9, 1372314243, 0, 0, '4', 0),
(8, 2, '你好，测试i', '9', 'static/upload/20130627/1372314571-2973.txt', 9, 1372314571, 1372318724, 0, '4', 0),
(9, 2, '123213', '123', '', 9, 1372316378, 0, 0, '4', 1372318704);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL auto_increment COMMENT '自增主键',
  `order_add_by` int(11) NOT NULL COMMENT '订单添加人',
  `order_add_at` int(11) NOT NULL COMMENT '订单添加时间 ',
  `order_status` int(11) NOT NULL COMMENT '订单状态，0正常，1已经删除',
  `order_send_to` varchar(255) NOT NULL COMMENT '收获地址',
  PRIMARY KEY  (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `order_goods`
--

CREATE TABLE IF NOT EXISTS `order_goods` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `goods_price` int(11) NOT NULL COMMENT '货物价格',
  `goods_info` varchar(255) NOT NULL COMMENT '货物具体信息',
  `status` int(11) NOT NULL COMMENT '状态，0正常，1已经删除',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL auto_increment COMMENT '用户id',
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `user_password` varchar(255) NOT NULL COMMENT '用户密码',
  `user_address` varchar(255) NOT NULL COMMENT '用户住址',
  `user_phone` varchar(64) NOT NULL COMMENT '联系电话',
  `user_add_at` int(11) NOT NULL COMMENT '用户注册时间',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_address`, `user_phone`, `user_add_at`) VALUES
(1, '1111', '123', '123', '1231231231', 1372145458),
(2, '1111', '123', '123', '1231231231', 1372145614),
(3, '1111', '123', '12312', '123123', 1372145758),
(4, '111144444', '123', '12312312312', '123123123', 1372211539),
(5, '11114444', '123', '5', '5', 1372212668),
(6, '111144443333', '123', '5', '5', 1372212785),
(7, '111133333', '123', '1123', '333', 1372212903),
(8, '11114444444', '123', '1231231', '123123', 1372213025),
(9, 'niujiaming', 'niujiaming', 'niujiaming', 'niujiaming', 1372216929);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
