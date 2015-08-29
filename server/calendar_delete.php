<?php
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
$mode				= 'delete';
$mode_title = ' 删 除 (Alt +Y) ';


require($page_name.'.php');
require('include/debug.inc.php');
?>