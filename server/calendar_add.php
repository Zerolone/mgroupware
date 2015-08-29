<?php
/*
页面功能：calendar添加前台
创建日期：2008年5月7日22:34:00
修改日期：
作    者：Zerolone
主    页：http://www.zerolone.com/
*/

require('include/common.inc.php');
$page_name	= 'calendar_add.php';

//默认id
$id=0;

//默认标题
$title='';

//默认关键度
$import=3;

//方式
$mode				= 'add';
$mode_title = ' 添 加 (Alt +Y) ';

require($page_name.'.php');
require('include/debug.inc.php');
?>