<?php
/*
ҳ�湦�ܣ����˹����ƻ�������ʾҳ��
�������ڣ�2008��5��7��23:15:05
�޸����ڣ�
��    �ߣ�Zerolone
��    ҳ��http://www.zerolone.com/
*/
require('include/common.inc.php');
$page_name	= 'calendar_show.php';

//��ȡid
$id=0;
if (isset($_GET['id']))
{
	$id=$_GET['id'];
}

//-------------------0------1---------2----------3--------------4-----------5
$SqlStr = ' SELECT `id`, `title`, `import`, `createtime`, `modifytime`, `content` FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
$SqlStr.= ' AND `id`='.$id;
$temp_query = query($SqlStr);
if($DB_Record = nqfetch($temp_query))
{
	$title			= subString($DB_Record[1],90);
	$import			= $DB_Record[2];
	$createtime = $DB_Record[3];
	$modifytime	= $DB_Record[4];
	$content		= $DB_Record[5];
	
	
	//�ؼ�����ɫ
	switch ($import)
	{
	case 1:
		$calendar_import_color="#000000";
		break;
	case 2:
		$calendar_import_color="#00FF00";
		break;
	case 3:
		$calendar_import_color="#0000FF";
		break;
	case 4:
		$calendar_import_color="#FF9966";
		break;
	case 5:
		$calendar_import_color="#FF0000";
		break;
	}		
	
	$import	= '<font color='.$calendar_import_color.'>��'.$import.'��</font>';
	
}




require($page_name.'.php');
//require('include/debug.inc.php');
?>