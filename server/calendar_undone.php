<?php
/*
ҳ�湦�ܣ�calendar���ǰ̨
�������ڣ�2008��5��7��22:34:17
�޸����ڣ�
��    �ߣ�Zerolone
��    ҳ��http://www.zerolone.com/
*/
require('include/common.inc.php');
$page_name	= 'calendar_add.php';

//��ȡid
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

//��ʽ
$mode				= 'undone';
$mode_title = ' �� �� δ �� �� (Alt +Y) ';
$back_page	= 'calendar.php';

require($page_name.'.php');
require('include/debug.inc.php');
?>