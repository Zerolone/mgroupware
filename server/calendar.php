<?php
/*
页面功能：calendar 
创建日期：2008年5月19日22:10:40
修改日期：
作    者：Zerolone
主    页：http://www.zerolone.com/
*/
require('include/common.inc.php');

$page_name	= 'calendar.php';

//所有未完成任务数
$SqlStr = ' SELECT COUNT( * ) FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
$SqlStr.= ' AND `isdone`=0';
$temp_query 	= query($SqlStr);
$DB_Record = nqfetch($temp_query);
//总记录
$calendar_list_count	= $DB_Record[0];

//所有未完成任务列表
//-------------------0------1---------2
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

//所有已完成任务数
$SqlStr = ' SELECT COUNT( * ) FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
$SqlStr.= ' AND `isdone`=1';
$temp_query 	= query($SqlStr);
$DB_Record = nqfetch($temp_query);
//总记录
$calendar_list_done_count	= $DB_Record[0];

//所有已完成任务
//-------------------0------1---------2
$SqlStr = ' SELECT `id`, `title`, `import` FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
$SqlStr.= ' AND `isdone`=1';
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
	
	$calendar_list_done[] = array(
	'0' 					=> $DB_Record[0],
	'id' 					=> $DB_Record[0],
	'1' 					=> $calendar_title,
	'title'				=> $calendar_title,
	'2' 					=> $calendar_import_str,
	'import'			=> $calendar_import_str
	);
}

//所有已删除任务数
$SqlStr = ' SELECT COUNT( * ) FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
$SqlStr.= ' AND `isdone`=2';
$temp_query 	= query($SqlStr);
$DB_Record = nqfetch($temp_query);
//总记录
$calendar_list_delete_count	= $DB_Record[0];

//所有已删除任务
//-------------------0------1---------2
$SqlStr = ' SELECT `id`, `title`, `import` FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
$SqlStr.= ' AND `isdone`=2';
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
	
	$calendar_list_delete[] = array(
	'0' 					=> $DB_Record[0],
	'id' 					=> $DB_Record[0],
	'1' 					=> $calendar_title,
	'title'				=> $calendar_title,
	'2' 					=> $calendar_import_str,
	'import'			=> $calendar_import_str
	);
}

//所有任务数
$SqlStr = ' SELECT COUNT( * ) FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
$temp_query 	= query($SqlStr);
$DB_Record = nqfetch($temp_query);
//总记录
$calendar_list_all_count	= $DB_Record[0];

//所有任务
//-------------------0------1---------2---------3
$SqlStr = ' SELECT `id`, `title`, `import`, `isdone` FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
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
	
	//任务是否完成
	$calendar_is_done	= $DB_Record[3];
	switch ($calendar_is_done)
	{
	case 0:
		$calendar_is_done=	'未';
		break;
	case 1:
		$calendar_is_done=	'完';
		break;
	case 2:
		$calendar_is_done=	'删';
		break;
	}		
	
	$calendar_import_str	= '<font color='.$calendar_import_color.'>【'.$calendar_import.'】'.$calendar_is_done.'</font>';
	
	$calendar_list_all[] = array(
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