<?php
/*
页面功能：首页
创建日期：2008年5月7日21:28:16
修改日期：
作    者：Zerolone
主    页：http://www.zerolone.com/
*/
require('include/common.inc.php');
$page_name	= 'index.php';

$SqlStr = ' SELECT `id`, `title`, `import` FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
$SqlStr.= ' AND `isdone`=0';
$SqlStr.= ' ORDER BY `import` DESC , `createtime` ASC';
$SqlStr.= ' LIMIT 0,  10 ';
$temp_query = query($SqlStr);
$i=0;
while($DB_Record = nqfetch($temp_query))
{
	$calendar_title		= subString($DB_Record[1],52);
	
	//关键度颜色
	$calendar_import	= $DB_Record[2];
	switch ($calendar_import)
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
	
	$calendar_import_str	= '<font color='.$calendar_import_color.'>【'.$calendar_import.'】</font>';
	
	$calendar_list[] = array(
	'0' 					=> $DB_Record[0],
	'id' 					=> $DB_Record[0],
	'1' 					=> $calendar_title,
	'title'				=> $calendar_title,
	'2' 					=> $calendar_import_str,
	'import'			=> $calendar_import_str
	);
}




require('head.php.php');
require($page_name.'.php');
require('include/debug.inc.php');
?>