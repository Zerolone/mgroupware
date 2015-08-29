-- phpMyAdmin SQL Dump
-- version 2.11.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2008 年 05 月 04 日 22:34
-- 服务器版本: 4.1.22
-- PHP 版本: 4.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `mgw`
--

-- --------------------------------------------------------

--
-- 表的结构 `mgw_calendar`
--

CREATE TABLE IF NOT EXISTS `mgw_calendar` (
  `id` int(11) NOT NULL default '0',
  `userid` int(11) unsigned NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `startime` varchar(8) NOT NULL default '',
  `endtime` varchar(8) NOT NULL default '',
  `content` text NOT NULL,
  `creatime` varchar(8) NOT NULL default '',
  `modifytime` varchar(8) NOT NULL default '',
  `date` varchar(8) NOT NULL default '',
  `isrepeat` tinyint(1) unsigned NOT NULL default '0',
  `repeatmode` tinyint(1) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='个人工作计划安排';

--
-- 导出表中的数据 `mgw_calendar`
--

