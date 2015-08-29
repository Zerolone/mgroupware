<?php
/*
页面功能：前台公共包含文件
创建日期：07-05-07
修改日期：2007年9月20日15:32:30
作    者：Zerolone
主    页：http://www.zerolone.com/
*/

//session函数
require('include/sessions.inc.php');

//配置函数
require('include/config.inc.php');

//连接数据库
require('include/mysql.inc.php');

//函数地址
require("include/function.inc.php");

//用户登录验证
require('include/checklogin.inc.php');

//当前页名
$ThisPage	= $_SERVER['PHP_SELF'];
?>