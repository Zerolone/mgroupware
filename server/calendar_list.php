<?php
/*
页面功能：calendar_list
创建日期：2008年5月20日20:44:43
修改日期：
作    者：Zerolone
主    页：http://www.zerolone.com/
*/
require('include/common.inc.php');

$page_name	= 'calendar_list.php';

$isdone=3;
if (isset($_GET['isdone']))
{
	$isdone	= $_GET['isdone'];
}

//isdone_text
//显示文字
switch ($isdone)
{
	case 0:
		$isdone_text='未完成';
		break;
	case 1:
		$isdone_text='已完成';
		break;
	case 2:
		$isdone_text='已删除';
		break;
	case 3:
		$isdone_text='所有计划安排';
		break;
}

//读取页数
$pagenum 	= 1;
if (isset($_GET['pagenum']))
{
	$pagenum 	= $_GET['pagenum'] ;
}

//当前页
$thispagenum	= $pagenum;

//页面记录数
$pagesize 	= 24 ;

//显示翻页数
$showrs			= 5;

//最大翻页数
$maxpagelimit = 50;

/*
计算总记录数
//如果改为读取数据库改栏目记录数则估计更快
//*/

//-------------------0------1---------2
$SqlStr = 'SELECT COUNT( * ) FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
if ($isdone <> 3)
{
	$SqlStr.= ' AND `isdone`='. $isdone;
}

$temp_query 	= query($SqlStr);
$DB_Record = nqfetch($temp_query);

//总记录
$recordcount	= $DB_Record[0];

//总页数
$pagecount		= ceil($recordcount / $pagesize);
//*/

//最大移动数
$pagend	= $pagenum+$maxpagelimit;
if($pagend > $pagecount)
{
	$pagend	= $pagecount;
}

/*
显示前后分页
非空显示
为空隐藏
//*/

if (isset($_GET['pagenum']))
{
	$pagenum 	= $_GET['pagenum'] ;
	if($pagenum==1)
	{
		$pagenum_up	= 1;
	}
	else
	{
		$pagenum_up = $pagenum-1;
	}
	//		$articleid = $articleid - $pagenum*$pagesize;
}
else
{
	$pagenum 	= 1;
	$pagenum_up	= 1;
}

$pagenum_down	= $pagenum+1;
if ($pagenum > $pagecount)
{
	$pagenum_down	= $pagenum + 1;
}

//任务列表
//-------------------0------1---------2
$SqlStr = ' SELECT `id`, `title`, `import` FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
if ($isdone <> 3)
{
	$SqlStr.= ' AND `isdone`='. $isdone;
}
$SqlStr.= ' ORDER BY `import` DESC , `createtime` ASC';
$SqlStr.= ' LIMIT '. $pagesize * ($pagenum-1) .' ,'.$pagesize.';';
$temp_query = query($SqlStr);
while($DB_Record = nqfetch($temp_query))
{
	$calendar_title		= subString($DB_Record[1],126);

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

//显示前数
if ($pagenum>1)
{
	$pagenum_end = $pagenum - 1;
	if(($pagenum - $showrs)>1)
	{
		$pagenum_begin	= $pagenum - $showrs;
	}
	else
	{
		$pagenum_begin	= 1;
	}

	for($i=$pagenum_begin;$i<=$pagenum_end;$i++)
	{
		$beginlist[]= array( $i );
	}

}

//显示后面的
if($pagecount>$pagenum)
{
	$pagenum_begin	= $pagenum + 1;
	if($pagecount>($pagenum_begin + $showrs))
	{
		$pagenum_end	= $pagenum_begin + $showrs;
	}
	else
	{
		$pagenum_end	= $pagecount;
	}

	for($i=$pagenum_begin;$i<=$pagenum_end;$i++)
	{
		$endlist[]= array( $i );
	}
}

require('head.php.php');
require($page_name.'.php');
require('include/debug.inc.php');
?>