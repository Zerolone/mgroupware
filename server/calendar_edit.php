<?php
/*
页面功能：calendar编辑前台
创建日期：2008年5月7日22:57:56
修改日期：
作    者：Zerolone
主    页：http://www.zerolone.com/
*/
require('include/common.inc.php');
$page_name	= 'calendar_add.php';

//获取id
$id=0;
if (isset($_GET['id']))
{
	$id=$_GET['id'];
}

//--------------------0---------1---------2
$SqlStr = ' SELECT `title`, `import` FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
$SqlStr.= ' AND `id`='.$id;
$temp_query = query($SqlStr);
$i=0;
if($DB_Record = nqfetch($temp_query))
{
	$title	=	$DB_Record[0];
	$import	=	$DB_Record[1];
}

//方式
$mode				= 'edit';
$mode_title = ' 修 改 (Alt +Y) ';

require($page_name.'.php');
require('include/debug.inc.php');
?>